<?php

namespace App\Http\Controllers;

use App\Models\OutwardOfficer;
use App\Models\GateIn;
use App\Models\Gateout;
use App\Models\MasterTransport;
use App\Models\MasterLine;


use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\Validator;
use \stdClass;

class OutwardOfficerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('outward.view');
    }
    public function manage()
    {
        return view('outward.create');
    }

    public function invoice_view(){
        return view('invoice.view');
    }

    public function centeral_view(){
        return view('invoice.central');
    }


    public function outward_print(){
        return view('print.outward');
    }

    public function thirdparty(Request $request){
        $gateInid = $request->gatein;
        $invoice_type = $request->type;

        if($invoice_type == "lolo"){
            $final_invoice_type= "LIFT-OFF";
            $hsnCode = "9967";
        }else if($invoice_type == "parking"){
            $final_invoice_type= "PARKING";
            $hsnCode = "9987";
        }
        else if($invoice_type == "washing"){
            $final_invoice_type= "WASHING";
            $hsnCode = "9987";
        }else if($invoice_type == "repair"){
            $final_invoice_type= "REPAIR";
            $hsnCode = "9987";
        }

        $getGetInData = GateIn::where('id',$gateInid)->first();
        $transporter = MasterTransport::where('id', $getGetInData->transport_id)->first();
        $line = MasterLine::where('id', $getGetInData->line_id)->where('containerSize',$getGetInData->container_size)->first();

        $data['invoice_data'] = array(
            'invoice_type' => $final_invoice_type,
            'buyer_name' =>$transporter->name,
            'buyer_address' =>$transporter->address,
            'buyer_gst' =>$transporter->gst,
            'buyer_pan' =>$transporter->pan,
            'buyer_state' =>$transporter->state,
            'buyer_state_code' =>$transporter->state_code,
            'line_name' => $line->name,
            'line_address' => $line->line_address,
            'line_gst' => $line->gst,
            'line_pan' => $line->pan,
            'line_state' => $line->gst_state,
            'line_state_code' => $line->state_code,
            'container_no' =>$getGetInData->container_no,
            'container_size' =>$getGetInData->container_size,
            'sub_type' =>$getGetInData->sub_type,
            'hsn_code' => $hsnCode,
        );
        return view('print.thirdparty',$data);
    }

    public function line(){
        return view('print.linebill');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOutwardOfficerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $getGetInData = GateIn::where('id',$request->gate_in_id)->first();

        if($request->gate_out_id == ''){
            return response()->json([
                'status' => "error",
                'message' => 'Driver Contact No Is Required!'
            ], 500);
        }else{
            if($request->vehical_no == ''){
                return response()->json([
                    'status' => "error",
                    'message' => 'Vehicle Number Is Required'
                ], 500);   
            }
        }

        if($getGetInData->third_party == "yes"){
            if($request->receipt == ''){
                return response()->json([
                    'status' => "error",
                    'message' => 'Receipt Is Required'
                ], 500);
            }
            if($request->cash == ''){
                return response()->json([
                    'status' => "error",
                    'message' => 'Cash Amount Is Required'
                ], 500);
            }
        }


        if ($request->hasFile('do_image')) {
            $do_image = $request->file('do_image');
            $do_image_name = time() . '_' . $do_image->getClientOriginalName();
            $do_image->move(public_path('uploads/outward'), $do_image_name);
        }else{
            $do_image_name = '';
        }

        if ($request->hasFile('driver_license_image')) {
            $driver_license_image = $request->file('driver_license_image');
            $driver_license_image_name = time() . '_' . $driver_license_image->getClientOriginalName();
            $driver_license_image->move(public_path('uploads/outward'), $driver_license_image_name);
        }else{
            $driver_license_image_name = '';
        }

        if ($request->hasFile('driver_aadhar_image')) {
            $driver_aadhar_image = $request->file('driver_aadhar_image');
            $driver_aadhar_image_name = time() . '_' . $driver_aadhar_image->getClientOriginalName();
            $driver_aadhar_image->move(public_path('uploads/outward'), $driver_aadhar_image_name);
        }else{
            $driver_aadhar_image_name = '';
        }


        $createLine = OutwardOfficer::create([
            'gate_in_id'=> $request->gate_in_id,
            'gate_out_id'=> $request->gate_out_id,
            'do_number'=> $request->do_number,
            'driver_license'=> $request->driver_license,
            'driver_aadhar'=> $request->driver_aadhar,
            'Transporter_name'=> $request->transport_id,
            'destination'=> $request->destination,
            'shippers'=> $request->shippers,
            'vessel'=> $request->vessel,
            'voyage'=> $request->voyage,
            'port_name'=> $request->port_name,
            'seal_no'=> $request->seal_no,
            'vent_seal_no'=> $request->vent_seal_no,
            'temprature'=> $request->temprature,
            'receipt_no'=> $request->receipt,
            'cash'=> $request->cash,
            'remark'=> $request->remarks,
            'createdby' => $request->user_id,
            'depo_id' => $request->depo_id,
            'do_image' => $do_image_name,
            'driver_aadhar_image' => $driver_aadhar_image_name,
            'driver_license_image' =>$driver_license_image_name
        ]);

        $gateoutDetails = Gateout::find($request->gate_out_id);
        $gateoutDetails->vehicle_number = is_null($request->vehical_no) ? $gateoutDetails->vehicle_number : $request->vehical_no;
        $gateoutDetails->status = '1';
        $gateoutDetails  = $gateoutDetails->save();

        
        if($createLine){
            return response()->json([
                'status' => "success",
                'message' => "Added Successfully"
            ], 200);
        }else{
            return response()->json([
                'status' => "error",
                'message' => "Error in submission!"
            ], 500);
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OutwardOfficer  $outwardOfficer
     * @return \Illuminate\Http\Response
     */
    public function show(OutwardOfficer $outwardOfficer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOutwardOfficerRequest  $request
     * @param  \App\Models\OutwardOfficer  $outwardOfficer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOutwardOfficerRequest $request, OutwardOfficer $outwardOfficer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OutwardOfficer  $outwardOfficer
     * @return \Illuminate\Http\Response
     */
    public function destroy(OutwardOfficer $outwardOfficer)
    {
        //
    }
}

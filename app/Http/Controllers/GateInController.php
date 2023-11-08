<?php

namespace App\Http\Controllers;

use App\Models\GateIn;
use App\Models\MasterTransport;
use App\Models\MasterLine;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\Validator;
use \stdClass;

class GateInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use Helpers;
    public function index()
    {
        return view('gatein.create');
    }

    public function inspection()
    {
        return view('surveyor.inspection');
    }

    public function getDataById(Request $request){
        return GateIn::where('id',$request->id)->first();
    }

    public function getInspectionData(Request $request){
        
        if($request->user_id == 1){
            return GateIn::get();
        }else{
            return GateIn::where('depo_id',$request->depo_id)->get();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGateInRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules=[
            'container_no'=>[
                'unique:master_categories,gate_ins'
            ],
        ];


        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            $messages = $validator->errors();
            $validationFormate = new stdClass();
            
            if ($messages->has('container_no')){
                $validationFormate->container_no = $messages->first('container_no');
            }

            $validationError[] = $validationFormate;

            return response()->json([
                'status' => "error",
                'message' => $validationError
            ], 400);
        }

        if ($request->hasFile('container_img')) {
            $container_img = $request->file('container_img');
            $container_img_name = time() . '_' . $container_img->getClientOriginalName();
            $container_img->move(public_path('uploads/gatein'), $container_img_name);
        }else{
            $container_img_name = '';
        }

        if ($request->hasFile('vehicle_img')) {
            $vehicle_img = $request->file('vehicle_img');
            $vehicle_img_name = time() . '_' . $vehicle_img->getClientOriginalName();
            $vehicle_img->move(public_path('uploads/gatein'), $vehicle_img_name);
        }else{
            $vehicle_img_name = '';
        }

        if($request->vehicle_number == ''  && $vehicle_img_name == ''){
            return response()->json([
                'status' => "error",
                'message' => "Please Fill at least one thing for vhicle"
            ], 500);
        }

        if($request->container_no == ''  && $container_img_name == ''){
            $gateintype = "without container";
        }else{
            $gateintype = "with container";
        }

        $createGatein = GateIn::create([
            'container_img' => $container_img_name,
            'vehicle_img' => $vehicle_img_name,
            'container_no'=> $request->container_no,
            'container_type'=> $request->container_type,
            'container_size'=> $request->container_size,
            'driver_name'=> $request->driver_name,
            'vehicle_number'=> $request->vehicle_number,
            'contact_number'=> $request->contact_number,
            'depo_id' => $request->depo_id,
            'createdby' => $request->user_id,
            'gateintype' => $gateintype
        ]);


        if($createGatein){
            return response()->json([
                'status' => "success",
                'message' => "Entered Successfully"
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
     * @param  \App\Models\GateIn  $gateIn
     * @return \Illuminate\Http\Response
     */
    public function show(GateIn $gateIn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGateInRequest  $request
     * @param  \App\Models\GateIn  $gateIn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if($request->line_id == ''){
            return response()->json([
                'status' => "error",
                'message' => "Line is required"
            ], 500);
        }

        $gateInDetails = GateIn::find($request->id);

        if ($request->hasFile('driver_photo')) {
            $driver_photo = $request->file('driver_photo');
            $driver_photo_name = time() . '_' . $driver_photo->getClientOriginalName();
            $driver_photo->move(public_path('uploads/gatein'), $driver_photo_name);
        }else{
            $driver_photo_name = $gateInDetails->driver_photo;
        }

        if ($request->hasFile('challan')) {
            $challan = $request->file('challan');
            $challan_name = time() . '_' . $challan->getClientOriginalName();
            $challan->move(public_path('uploads/gatein'), $challan_name);
        }else{
            $challan_name = $gateInDetails->challan;
        }

        if ($request->hasFile('driver_license')) {
            $driver_license = $request->file('driver_license');
            $driver_license_name = time() . '_' . $driver_license->getClientOriginalName();
            $driver_license->move(public_path('uploads/gatein'), $driver_license_name);
        }else{
            $driver_license_name = $gateInDetails->driver_license;
        }

        if ($request->hasFile('do_copy')) {
            $do_copy = $request->file('do_copy');
            $do_copy_name = time() . '_' . $do_copy->getClientOriginalName();
            $do_copy->move(public_path('uploads/gatein'), $do_copy_name);
        }else{
            $do_copy_name = $gateInDetails->do_copy;
        }

        if ($request->hasFile('aadhar')) {
            $aadhar = $request->file('aadhar');
            $aadhar_name = time() . '_' . $aadhar->getClientOriginalName();
            $aadhar->move(public_path('uploads/gatein'), $aadhar_name);
        }else{
            $aadhar_name = $gateInDetails->aadhar;
        }

        if ($request->hasFile('pan')) {
            $pan = $request->file('pan');
            $pan_name = time() . '_' . $pan->getClientOriginalName();
            $pan->move(public_path('uploads/gatein'), $pan_name);
        }else{
            $pan_name = $gateInDetails->pan;
        }



        if($gateInDetails->container_no != $request->container_no){
            $gateIndata = GateIn::where('container_no',$request->container_no)->get();
            if(count($gateIndata) > 0){
                return response()->json([
                    'status' => "success",
                    'message' => "Container No Already Exist!"
                ], 200);
            }

            $gateInDetails->container_no = is_null($request->container_no) ? $gateInDetails->container_no : $request->container_no;
        }

        $gateInDetails->container_size = is_null($request->container_size) ? $gateInDetails->container_size : $request->container_size;
        $gateInDetails->container_type = is_null($request->container_type) ? $gateInDetails->container_type : $request->container_type;
        $gateInDetails->transport_id = is_null($request->transport_id) ? $gateInDetails->transport_id : $request->transport_id;
        $gateInDetails->inward_date = is_null($request->inward_date) ? $gateInDetails->inward_date : $request->inward_date;
        $gateInDetails->inward_time = is_null($request->inward_time) ? $gateInDetails->inward_time : $request->inward_time;
        $gateInDetails->driver_name = is_null($request->driver_name) ? $gateInDetails->driver_name : $request->driver_name;
        $gateInDetails->vehicle_number = is_null($request->vehicle_number) ? $gateInDetails->vehicle_number : $request->vehicle_number;
        $gateInDetails->contact_number = is_null($request->contact_number) ? $gateInDetails->contact_number : $request->contact_number;
        $gateInDetails->third_party = is_null($request->third_party) ? $gateInDetails->third_party : $request->third_party;
        $gateInDetails->line_id = is_null($request->line_id) ? $gateInDetails->line_id : $request->line_id;
        $gateInDetails->arrive_from = is_null($request->arrive_from) ? $gateInDetails->arrive_from : $request->arrive_from;
        $gateInDetails->port_name = is_null($request->port_name) ? $gateInDetails->port_name : $request->port_name;
        $gateInDetails->driver_photo = $driver_photo_name;
        $gateInDetails->challan = $challan_name;
        $gateInDetails->driver_license = $driver_license_name;
        $gateInDetails->do_copy = $do_copy_name;
        $gateInDetails->aadhar = $aadhar_name;
        $gateInDetails->pan = $pan_name;

        $gateInDetails->updatedby = $request->user_id;
        $gateInDetails->updated_at = date('Y-m-d H:i:s');

        $gateInDetails  = $gateInDetails->save();

        if($gateInDetails){
            return response()->json([
                'status' => "success",
                'message' => "Gate In Updated Successfully"
            ], 200);
        }else{
            return response()->json([
                'status' => "error",
                'message' => "Error in submission!"
            ], 500);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GateIn  $gateIn
     * @return \Illuminate\Http\Response
     */
    public function destroy(GateIn $gateIn)
    {
        //
    }
}

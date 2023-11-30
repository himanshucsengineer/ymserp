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

    public function get(Request $request)
    {
        if($request->user_id == 1){
            return OutwardOfficer::get();
        }else{
            return OutwardOfficer::where('depo_id',$request->depo_id)->get();
        }
    }

    public function gatepass_print(Request $request){
        $id = $request->id;
        $outwardData = OutwardOfficer::where('id',$id)->first();
        $linedata = MasterLine::where('id',$outwardData->line_id)->first();
        $transporter = MasterTransport::where('id',$outwardData->transport_id)->first();

        $data['gate_pass'] = array(
            'transporter' => $transporter->name,
            'licence_no' => $outwardData->licence_no,
            'aadhar_no' => $outwardData->aadhar_no,
            'line_name' => $linedata->name,

            'shippers' => $outwardData->shippers,
            'pan_no' => $outwardData->pan_no,
            'seal_no' => $outwardData->seal_no,

        );

        return view('print.gatepass',$data);
    }

    public function outward_print(Request $request){
        $id = $request->id;
        $outwardData = OutwardOfficer::where('id',$id)->first();
        $linedata = MasterLine::where('id',$outwardData->line_id)->first();
        $transporter = MasterTransport::where('id',$outwardData->transport_id)->first();

        $data['receipt_data'] = array(
            'do_no' => $outwardData->do_no,
            'challan_no' => $outwardData->challan_no,
            'line_name' => $linedata->name,
            'transporter' => $transporter->name,
            'container_type' => $outwardData->container_type,
            'container_size' => $outwardData->container_size,
            'grade' => $outwardData->grade,
            'status' => $outwardData->status_name,
            'container_no' => $outwardData->container_no,

        );

        return view('print.outward',$data);
    }

    public function numberToWord($num = ''){
        $num    = ( string ) ( ( int ) $num );
        if( ( int ) ( $num ) && ctype_digit( $num ) ){
            $words  = array( );
            $num    = str_replace( array( ',' , ' ' ) , '' , trim( $num ) );
            $list1  = array('','one','two','three','four','five','six','seven',
                'eight','nine','ten','eleven','twelve','thirteen','fourteen',
                'fifteen','sixteen','seventeen','eighteen','nineteen');
            $list2  = array('','ten','twenty','thirty','forty','fifty','sixty',
                'seventy','eighty','ninety','hundred');
            $list3  = array('','thousand','million','billion','trillion',
                'quadrillion','quintillion','sextillion','septillion',
                'octillion','nonillion','decillion','undecillion',
                'duodecillion','tredecillion','quattuordecillion',
                'quindecillion','sexdecillion','septendecillion',
                'octodecillion','novemdecillion','vigintillion');
            $num_length = strlen( $num );
            $levels = ( int ) ( ( $num_length + 2 ) / 3 );
            $max_length = $levels * 3;
            $num    = substr( '00'.$num , -$max_length );
            $num_levels = str_split( $num , 3 );
    
            foreach( $num_levels as $num_part ){
                $levels--;
                $hundreds   = ( int ) ( $num_part / 100 );
                $hundreds   = ( $hundreds ? ' ' . $list1[$hundreds] . ' Hundred' . ( $hundreds == 1 ? '' : 's' ) . ' ' : '' );
                $tens       = ( int ) ( $num_part % 100 );
                $singles    = '';
                if( $tens < 20 ) { $tens = ( $tens ? ' ' . $list1[$tens] . ' ' : '' ); } else { $tens = ( int ) ( $tens / 10 ); $tens = ' ' . $list2[$tens] . ' '; $singles = ( int ) ( $num_part % 10 ); $singles = ' ' . $list1[$singles] . ' '; } $words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_part ) ) ? ' ' . $list3[$levels] . ' ' : '' ); } $commas = count( $words ); if( $commas > 1 ){
                    $commas = $commas - 1;
                }
                $words  = implode( ', ' , $words );
                $words  = trim( str_replace( ' ,' , ',' , ucwords( $words ) )  , ', ' );
                if( $commas ){
                    $words  = str_replace( ',' , ' and' , $words );
                }
                return $words;
            }else if( ! ( ( int ) $num ) ){
                return 'Zero';
            }
            return '';
        }


    public function thirdparty(Request $request){
        $gateInid = $request->gatein;
        $invoice_type = $request->type;
        $payment_type = $request->p_type;
        
        $getGetInData = GateIn::where('id',$gateInid)->first();
        $transporter = MasterTransport::where('id', $getGetInData->transport_id)->first();
        $line = MasterLine::where('id', $getGetInData->line_id)->where('containerSize',$getGetInData->container_size)->first();


        if($invoice_type == "lolo"){
            $final_invoice_type= "LIFT-OFF";
            $hsnCode = "9967";
            $charges = $line->lolo_charges;
        }else if($invoice_type == "parking"){
            $final_invoice_type= "PARKING";
            $hsnCode = "9987";
            $charges = $line->parking_charges;
        }
        else if($invoice_type == "washing"){
            $final_invoice_type= "WASHING";
            $hsnCode = "9987";
            $charges = $line->washing_charges;
        }else if($invoice_type == "repair"){
            $final_invoice_type= "REPAIR";
            $hsnCode = "9987";
        }

        $sgst = (9/100)*$charges;
        $cgst = (9/100)*$charges;

        $totalGst = $cgst + $sgst;
        $final_amount = $totalGst + $charges;

        $finalAmountInWords = $this->numberToWord($final_amount);;

        $data['invoice_data'] = array(
            'invoice_id' => $getGetInData->id,
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
            'quantity' => 1,
            'amount' => number_format($charges, 2),
            'sgst' => number_format($sgst,2),
            'cgst' => number_format($cgst,2),
            'totalgst' => number_format($totalGst,2),
            'final_amount' => number_format($final_amount,2),
            'final_amount_in_words' => $finalAmountInWords,
            'payment_type' => $payment_type
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

        $rules=[
            'do_no'=>[
                'required',
                'unique:outward_officers,do_no'
            ],
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            $messages = $validator->errors();
            
            $validationFormate = new stdClass();
            
            if ($messages->has('do_no')){
                $validationFormate->do_no = $messages->first('do_no');
            }

            $validationError[] = $validationFormate;

            return response()->json([
                'status' => "error",
                'message' => $validationError
            ], 400);
        }


        if ($request->hasFile('do_copy')) {
            $do_copy = $request->file('do_copy');
            $do_copy_name = time() . '_' . $do_copy->getClientOriginalName();
            $do_copy->move(public_path('uploads/outward'), $do_copy_name);
        }else{
            $do_copy_name = '';
        }

        if ($request->hasFile('challan_copy')) {
            $challan_copy = $request->file('challan_copy');
            $challan_copy_name = time() . '_' . $challan_copy->getClientOriginalName();
            $challan_copy->move(public_path('uploads/outward'), $challan_copy_name);
        }else{
            $challan_copy_name = '';
        }

        if ($request->hasFile('driver_copy')) {
            $driver_copy = $request->file('driver_copy');
            $driver_copy_name = time() . '_' . $driver_copy->getClientOriginalName();
            $driver_copy->move(public_path('uploads/outward'), $driver_copy_name);
        }else{
            $driver_copy_name = '';
        }


        $createLine = OutwardOfficer::create([
            'do_no'=> $request->do_no,
            'challan_no'=> $request->challan_no,
            'line_id'=> $request->line_id,
            'transport_id'=> $request->transport_id,
            'container_type'=> $request->container_type,
            'container_size'=> $request->container_size,
            'sub_type'=> $request->sub_type,
            'grade'=> $request->grade,
            'status_name'=> $request->status_name,
            'driver_name'=> $request->driver_name,
            'vehicle_no'=> $request->vehicle_no,
            'container_no'=> $request->container_no,
            
            'createdby' => $request->user_id,
            'depo_id' => $request->depo_id,
            'do_copy' => $do_copy_name,
            'challan_copy' => $challan_copy_name,
            'driver_copy' =>$driver_copy_name
        ]);

        // $gateoutDetails = Gateout::find($request->gate_out_id);
        // $gateoutDetails->vehicle_number = is_null($request->vehical_no) ? $gateoutDetails->vehicle_number : $request->vehical_no;
        // $gateoutDetails->status = '1';
        // $gateoutDetails  = $gateoutDetails->save();

        
        if($createLine){
            return response()->json([
                'status' => "success",
                'message' => "Added Successfully",
                'data' => $createLine
            ], 200);
        }else{
            return response()->json([
                'status' => "error",
                'message' => "Error in submission!"
            ], 500);
        }



    }


    public function genrateGatePass(Request $request){
        if ($request->hasFile('licence_copy')) {
            $licence_copy = $request->file('licence_copy');
            $licence_copy_name = time() . '_' . $licence_copy->getClientOriginalName();
            $licence_copy->move(public_path('uploads/outward'), $licence_copy_name);
        }else{
            $licence_copy_name = '';
        }

        if ($request->hasFile('aadhar_copy')) {
            $aadhar_copy = $request->file('aadhar_copy');
            $aadhar_copy_name = time() . '_' . $aadhar_copy->getClientOriginalName();
            $aadhar_copy->move(public_path('uploads/outward'), $aadhar_copy_name);
        }else{
            $challan_copy_name = '';
        }

        if ($request->hasFile('pan_copy')) {
            $pan_copy = $request->file('pan_copy');
            $pan_copy_name = time() . '_' . $pan_copy->getClientOriginalName();
            $pan_copy->move(public_path('uploads/outward'), $pan_copy_name);
        }else{
            $pan_copy_name = '';
        }


        $gateoutDetails = OutwardOfficer::find($request->receipt_no);
        $gateoutDetails->consignee_id = is_null($request->consignee_id) ? $gateoutDetails->consignee_id : $request->consignee_id;
        $gateoutDetails->shippers = is_null($request->shippers) ? $gateoutDetails->shippers : $request->shippers;
        $gateoutDetails->licence_no = is_null($request->licence_no) ? $gateoutDetails->licence_no : $request->licence_no;
        $gateoutDetails->aadhar_no = is_null($request->aadhar_no) ? $gateoutDetails->aadhar_no : $request->aadhar_no;
        $gateoutDetails->pan_no = is_null($request->pan_no) ? $gateoutDetails->pan_no : $request->pan_no;
        $gateoutDetails->line_id_2 = is_null($request->line_id_2) ? $gateoutDetails->line_id_2 : $request->line_id_2;
        $gateoutDetails->seal_no = is_null($request->seal_no) ? $gateoutDetails->seal_no : $request->seal_no;
        $gateoutDetails->updatedby = is_null($request->user_id) ? $gateoutDetails->updatedby : $request->user_id;
        $gateoutDetails->updatedby = is_null($request->user_id) ? $gateoutDetails->updatedby : $request->user_id;
        $gateoutDetails->updated_at = date('Y-m-d H:i:s');
        
        $gateoutDetails->licence_copy = $licence_copy_name;
        $gateoutDetails->aadhar_copy = $aadhar_copy_name;
        $gateoutDetails->pan_copy = $pan_copy_name;
        $gateoutDetails  = $gateoutDetails->save();

        if($gateoutDetails){
            return response()->json([
                'status' => "success",
                'message' => "Genrated Successfully",
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

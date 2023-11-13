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

    public function reports(){
        return view('surveyor.report');
    }

    public function getDataById(Request $request){
        return GateIn::where('id',$request->id)->first();
    }


    public function filterByDate(Request $request){
        
        $datalimit = '';

        if($request->page == "*"){
            $datalimit= 999999999;
        }else{
            $datalimit = 1;
        }

        if($request->search == "undefined" || $request->search == "null" || $request->search == "NULL" || $request->search == "true" || $request->search == "TRUE" || $request->search == "false" || $request->search == "FALSE"){
            return response()->json([
                'status' => "error",
                'message' => 'Search Value Can not be undefined, null and boolean!'
            ], 400);
        }

        if($request->page == "undefined" || $request->page == "null" || $request->page == "NULL" || $request->page == "true" || $request->page == "TRUE" || $request->page == "false" || $request->page == "FALSE"){
            return response()->json([
                'status' => "error",
                'message' => 'Page Value Can not be undefined, null and boolean!'
            ], 400);
        }

        if($request->startDate != '' && $request->endDate ==  ''){
            $startDate = $request->startDate;
            $endDate = date('Y-m-d');
        }else if($request->startDate == '' && $request->endDate !=  ''){
            $endDate = $request->endDate;
            $startDate = date('Y-m-d');
        }else if($request->startDate != '' && $request->endDate !=  ''){
            $startDate = $request->startDate;
            $endDate = $request->endDate;
        }

        if($request->user_id == 1){

            $gateInData = GateIn::where([
                ['status','In']
            ])->whereBetween('inward_date', [$startDate, $endDate])->orderby('created_at','desc')->paginate($datalimit);
        }else{

            $gateInData = GateIn::where([
                ['status','In'],
                ['depo_id',$request->depo_id],
            ])->whereBetween('inward_date', [$startDate, $endDate])->orderby('created_at','desc')->paginate($datalimit);
        }
        
       

        $formetedData = [];

        foreach($gateInData as $gateIn){
            $formetedData[] = [
                'container_no' => $gateIn->container_no,
                'container_type' => $gateIn->container_type,
                'container_size' => $gateIn->container_size,
                'vehicle_number' => $gateIn->vehicle_number,
                'contact_number' => $gateIn->contact_number,
                'driver_name' => $gateIn->driver_name,
                'container_img' => $gateIn->container_img,
                'vehicle_img' => $gateIn->vehicle_img,
                'id' => $gateIn->id,
            ];
            
        }
    	return response()->json([
            'data' => $formetedData,
            'pagination' => [
                'current_page' => $gateInData->currentPage(),
                'per_page' => $gateInData->perPage(),
                'total' => $gateInData->total(),
                'last_page' => $gateInData->lastPage(),
                'from' => $gateInData->firstItem(),
                'to' => $gateInData->lastItem(),
                'links' => [
                    'prev' => $gateInData->previousPageUrl(),
                    'next' => $gateInData->nextPageUrl(),
                    'all_pages' => $gateInData->getUrlRange(1, $gateInData->lastPage()),
                ],
            ],
        ]); 
    }



    public function getInspectionData(Request $request){
        
        


        $datalimit = '';

        if($request->page == "*"){
            $datalimit= 999999999;
        }else{
            $datalimit = 1;
        }

        if($request->search == "undefined" || $request->search == "null" || $request->search == "NULL" || $request->search == "true" || $request->search == "TRUE" || $request->search == "false" || $request->search == "FALSE"){
            return response()->json([
                'status' => "error",
                'message' => 'Search Value Can not be undefined, null and boolean!'
            ], 400);
        }

        if($request->page == "undefined" || $request->page == "null" || $request->page == "NULL" || $request->page == "true" || $request->page == "TRUE" || $request->page == "false" || $request->page == "FALSE"){
            return response()->json([
                'status' => "error",
                'message' => 'Page Value Can not be undefined, null and boolean!'
            ], 400);
        }

        if($request->user_id == 1){

            $gateInData = GateIn::where([
                [function ($query) use ($request) {
                    if (($search = $request->search)) {
                        $query->orWhere('container_no', 'LIKE', '%' . $search . '%')
                            ->orWhere('container_type', 'LIKE', '%' . $search . '%')
                            ->orWhere('container_size', 'LIKE', '%' . $search . '%')
                            ->orWhere('driver_name', 'LIKE', '%' . $search . '%')
                            ->orWhere('vehicle_number', 'LIKE', '%' . $search . '%')
                            ->orWhere('contact_number', 'LIKE', '%' . $search . '%')
                            ->orWhere('inward_date', 'LIKE', '%' . $search . '%')
                            ->orWhere('inward_time', 'LIKE', '%' . $search . '%')
                            ->get();
                    }
                }],
                ['status','In']
            ])->orderby('created_at','desc')->paginate($datalimit);
        }else{

            $gateInData = GateIn::where([
                [function ($query) use ($request) {
                    if (($search = $request->search)) {
                        $query->orWhere('container_no', 'LIKE', '%' . $search . '%')
                            ->orWhere('container_type', 'LIKE', '%' . $search . '%')
                            ->orWhere('container_size', 'LIKE', '%' . $search . '%')
                            ->orWhere('driver_name', 'LIKE', '%' . $search . '%')
                            ->orWhere('vehicle_number', 'LIKE', '%' . $search . '%')
                            ->orWhere('contact_number', 'LIKE', '%' . $search . '%')
                            ->orWhere('inward_date', 'LIKE', '%' . $search . '%')
                            ->orWhere('inward_time', 'LIKE', '%' . $search . '%')
                            ->get();
                    }
                }],
                ['status','In'],
                ['depo_id',$request->depo_id],
            ])->orderby('created_at','desc')->paginate($datalimit);
        }
        
       

        $formetedData = [];

        foreach($gateInData as $gateIn){
            $formetedData[] = [
                'container_no' => $gateIn->container_no,
                'container_type' => $gateIn->container_type,
                'container_size' => $gateIn->container_size,
                'vehicle_number' => $gateIn->vehicle_number,
                'contact_number' => $gateIn->contact_number,
                'driver_name' => $gateIn->driver_name,
                'container_img' => $gateIn->container_img,
                'vehicle_img' => $gateIn->vehicle_img,
                'id' => $gateIn->id,
            ];
            
        }
    	return response()->json([
            'data' => $formetedData,
            'pagination' => [
                'current_page' => $gateInData->currentPage(),
                'per_page' => $gateInData->perPage(),
                'total' => $gateInData->total(),
                'last_page' => $gateInData->lastPage(),
                'from' => $gateInData->firstItem(),
                'to' => $gateInData->lastItem(),
                'links' => [
                    'prev' => $gateInData->previousPageUrl(),
                    'next' => $gateInData->nextPageUrl(),
                    'all_pages' => $gateInData->getUrlRange(1, $gateInData->lastPage()),
                ],
            ],
        ]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGateInRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        if($request->container_no){
            $getInContainer = GateIn::where('status','In')->where('container_no',$request->container_no)->get();
            if(count($getInContainer)>0){
                return response()->json([
                    'status' => "error",
                    'message' => "Container Is Already In Yard!"
                ], 500);
            }
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
            'gateintype' => $gateintype,
            'status' => 'In',
            'inward_date' => date('Y-m-d'),
            'inward_time' => date('H:i:s'),
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
            $gateIndata = GateIn::where('container_no',$request->container_no)->where('status','In')->get();
            if(count($gateIndata) > 0){
                return response()->json([
                    'status' => "error",
                    'message' => "Container No Already Exist!"
                ], 500);
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

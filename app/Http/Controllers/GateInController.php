<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\MasterEmployee;
// use App\Models\ContainerVerify;
use App\Models\Transaction;
use App\Models\MasterTarrif;
use App\Models\MasterRepair;
use App\Models\MasterDamage;
use App\Models\MasterMaterial;
use App\Models\LocationCode;

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

    public function gateoutindex()
    {
        return view('gateout.create');
    }

    public function containershow(){
        return view('surveyor.containershow');
    }
    
    public function inspection()
    {
        return view('surveyor.inspection');
    }

    public function supervisor_inspection()
    {
        return view('supervisor.inspection');
    }

    public function masterserveyor(){
        return view('surveyor.master');
    }

    public function maintenance_view(){
        return view('maintenance.view');
    }

    public function maintenance_manage(){
        return view('maintenance.manage');
    }

    public function reports(){
        return view('surveyor.report');
    }

    public function executiveshow(){
        return view('surveyor.inwardShow');
    }

    public function inward_executive(){
        return view('surveyor.inwardExexutive');
    }

    public function inward_reports(){
        return view('surveyor.inwardReport');
    }

    public function getRefferContainer(Request $request){
        if($request->user_id == 1){
            $gateInData = GateIn::where([
                ['container_type','REEFER'],
                ['status','!=','Out']
            ])->orderby('created_at','desc')->get();
        }else{
            $gateInData = GateIn::where([
                ['depo_id',$request->depo_id],
                ['container_type','REEFER'],
                ['status','!=','Out']
            ])->orderby('created_at','desc')->get();
        }
        return $gateInData;
    }

    public function printestimate(Request $request){
        $transactionData = Transaction::where('gatein_id',$request->gatein_id)->get();
        $getInData = GateIn::where('id',$request->gatein_id)->first();
        $lineData = MasterLine::where('id',$getInData->line_id)->first();
        // $containerVerifyData = ContainerVerify::where('gate_in_id',$request->gatein_id)->orderby('created_at','desc')->first();
        $userData = User::where('id',$getInData->updatedby)->first();
        $survayorDoneName = MasterEmployee::where('id',$userData->employee_id)->first(); 

        $data['container_no'] = $getInData->container_no;
        $data['line_name'] = $lineData->name;
        $data['survey_date'] = $getInData->survayor_date;
        $data['survey_time'] = $getInData->survayor_time;
        $data['survey_done_by'] = $survayorDoneName->firstname . ' ' . $survayorDoneName->lastname;
        
        $formetedData = [];

        foreach($transactionData as $transaction){
            $tarrifData = MasterTarrif::where('id',$transaction->tarrif_id)->first();
            $damageData = MasterDamage::where('id',$tarrifData->damade_id)->first();
            $repairData = MasterRepair::where('id',$tarrifData->repair_id)->first();
            $materialData = MasterMaterial::where('id',$tarrifData->material_id)->first();
            $locationData = LocationCode::where('id',$tarrifData->repai_location_code)->first();

            $formetedData[] = [
                'component_code' => $tarrifData->component_code,
                'location_code' => $locationData->code,
                'unit_of_mesure' => $tarrifData->unit_of_measure,
                'length' => $tarrifData->dimension_l,
                'width' => $tarrifData->dimension_w,
                'height' => $tarrifData->dimension_h,
                'damage_code' => $damageData->code,
                'repair_code' => $repairData->repair_code,
                'material_code' => $materialData->material_code,

                'qty' => $transaction->qty,
                'labour_hr' => $transaction->labour_hr,
                'labour_cost' => number_format($transaction->labour_cost, 2),
                'material_cost' => number_format($transaction->material_cost, 2),
                'sab_total' => number_format($transaction->sab_total, 2),
                'gst' => $transaction->gst,
                'total' => number_format($transaction->total, 2),
                'desc' => $tarrifData->desc
            ];
        }

        $data['main_data'] = $formetedData;

        return view('print.astimate',$data);

    }

    public function getDataById(Request $request){
        return GateIn::where('id',$request->id)->first();
    }

    public function get(){
        return GateIn::get();
    }

    public function getReadyContainers(){
        $get_container = GateIn::where([
            ['status','Ready']
        ])->get();
        return $get_container;
    }

    public function getInVehicle(){
        $get_vehicle = GateIn::where([
            ['status', '!=' , 'Out']
        ])->get();
        return $get_vehicle;
    }

    public function geVhicle(Request $request){
        if($request->user_id == 1){
            $gateInData = GateIn::where([
                ['status','!=','Out'],
                ['gateintype','Without Container']
            ])->orderby('created_at','desc')->get();
        }else{
            $gateInData = GateIn::where([
                ['status','!=','Out'],
                ['depo_id',$request->depo_id],
                ['gateintype','Without Container']
            ])->orderby('created_at','desc')->get();
        }
        return $gateInData;
    }

    public function getbycontainer(Request $request){
        $gateindata = GateIn::where('container_no',$request->container_no)->where('status','!=','Out')->first();
        $line_data = MasterLine::where('id',$gateindata->line_id)->first();

        $data = array(
            'line_name' => $line_data->name,
            'gateindata' => $gateindata,
        );
        return $data;
    }

    public function getPreAdviceContainer(Request $request){
        return GateIn::where([
            ['line_id',$request->line_id],
            ['container_size',$request->container_size],
            ['container_type',$request->container_type],
            ['sub_type',$request->sub_type],
            // ['vessel_name',$request->vessel],
            // ['voyage',$request->voyage],
            ['status','Ready'],
            ['grade',$request->grade]
        ])->orderby('created_at','asc')->get();
    }


    public function getContainerList(Request $request){

        $getIndata =  GateIn::where('depo_id',$request->depo_id)->where('line_id',$request->line_id)->where('container_type',$request->container_type)->where('container_size',$request->container_size)->where('sub_type',$request->sub_type)->get();

        $formetedData = [];

        foreach($getIndata as $gateIn){
            // $containerVarify = ContainerVerify::where('gate_in_id',$gateIn->id)->where('grade',$request->grade)->where('status_name',$request->status_name)->get();

            if(count($containerVarify)>0){
                $formetedData[] = [
                    'container_no' => $gateIn->container_no,
                    'id' => $gateIn->id,
                ];
            }
        }
        return $formetedData;

    }



    public function getDataByIdOutward(Request $request){
        $getIndata =  GateIn::where('id',$request->id)->get();
        $formetedData = [];

        foreach($getIndata as $gateIn){

            $getInwardDone = User::where('id',$gateIn->createdby)->first();
            
            $getInwardDoneName = MasterEmployee::where('id',$getInwardDone->employee_id)->first(); 
            $survayorDone = User::where('id',$gateIn->estimate_updatedby)->first();
            $survayorDoneName = MasterEmployee::where('id',$survayorDone->employee_id)->first(); 

            $repairDone = User::where('id',$gateIn->repair_updatedby)->first();
            $repairDoneName = MasterEmployee::where('id',$repairDone->employee_id)->first(); 

            $formetedData[] = [
                'container_no' => $gateIn->container_no,
                'container_type' => $gateIn->container_type,
                'sub_type' => $gateIn->sub_type,
                'container_size' => $gateIn->container_size,
                'inward_date' => $gateIn->inward_date,
                'inward_time' => $gateIn->inward_time,
                'inward_done_by' => $getInwardDoneName->firstname . ' ' . $getInwardDoneName->lastname,
                'survayor_date' => $gateIn->estimate_updated_at,
                'survayor_done_by' => $survayorDoneName->firstname . ' ' . $survayorDoneName->lastname,
                'repair_complete' => $gateIn->repair_updatedat,
                'repair_done_by' => $repairDoneName->firstname . ' ' . $repairDoneName->lastname,
                'id' => $gateIn->id,
            ];
            
        }
        return $formetedData;

    }
    


    public function filterByDateSupervisor(Request $request){
        
        $datalimit = '';

        if($request->page == "*"){
            $datalimit= 999999999;
        }else{
            $datalimit = 25;
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

            $gateInData = GateIn::whereBetween('inward_date', [$startDate, $endDate])->orderby('created_at','desc')->paginate($datalimit);
        }else{

            $gateInData = GateIn::where([
                ['depo_id',$request->depo_id],
            ])->whereBetween('inward_date', [$startDate, $endDate])->orderby('created_at','desc')->paginate($datalimit);
        }
        
       

        $formetedData = [];

        foreach($gateInData as $gateIn){
            $line = MasterLine::where('id',$gateIn->line_id)->first();
            $consignee = MasterTransport::where('id',$gateIn->consignee_id)->first();
            $transporter = MasterTransport::where('id',$gateIn->transport_id)->first();


            if($consignee){
                $consinee_name = $consignee->name;
            }else{
                $consinee_name = '';
            }

            if($transporter){
                $transporter_name = $transporter->name;
            }else{
                $transporter_name = '';
            }

            if($line){
                $line_name = $line->name;
                $is_assigned = "Assigned";
            }else{
                $line_name = '';
                $is_assigned = "Not Assigned";
            }

            

            $formetedData[] = [
                'inward_no' => $gateIn->inward_no,
                'inward_date' => $gateIn->inward_date,
                'inward_time' => $gateIn->inward_time,
                'survayor_date' => $gateIn->survayor_date,
                'survayor_time' => $gateIn->survayor_time,
                'container_img' => $gateIn->container_img,
                'container_no' => $gateIn->container_no,
                'vehicle_number' => $gateIn->vehicle_number,
                'vehicle_img' => $gateIn->vehicle_img,
                'container_type' => $gateIn->container_type,
                'container_size' => $gateIn->container_size,
                'sub_type' => $gateIn->sub_type,
                'gross_weight' => $gateIn->gross_weight,
                'tare_weight' => $gateIn->tare_weight,
                'mfg_date' => $gateIn->mfg_date,
                'csc_details' => $gateIn->csc_details,

                'line_name' => $line_name,
                'grade' => $gateIn->grade,
                'status_name' => $gateIn->status_name,
                'rftype' => $gateIn->rftype,
                'make' => $gateIn->make,
                'model_no' => $gateIn->model_no,
                'serial_no' => $gateIn->serial_no,
                'machine_mfg_date' => $gateIn->machine_mfg_date,
                'device_status' => $gateIn->device_status,
                'third_party' => $gateIn->third_party,
                'consinee_name' => $consinee_name,
                'transaction_mode' => $gateIn->transaction_mode,
                'transaction_ref_no' => $gateIn->transaction_ref_no,
                'transporter_name' => $transporter_name,
                'driver_name' => $gateIn->driver_name,
                'contact_number' => $gateIn->contact_number,
                'vessel_name' => $gateIn->vessel_name,
                'voyage' => $gateIn->voyage,
                'port_name' => $gateIn->port_name,
                'er_no' => $gateIn->er_no,
                'empty_latter' => $gateIn->empty_latter,
                'challan' => $gateIn->challan,
                'empty_repositioning' => $gateIn->empty_repositioning,
                'return' => $gateIn->return,
                'tracking_device' => $gateIn->tracking_device,
                'remarks' => $gateIn->remarks,
                'is_repaired' => $gateIn->is_repaired,

                'is_assigned' => $is_assigned, 
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


    public function filterByDateInward(Request $request){
        
        $datalimit = '';

        if($request->page == "*"){
            $datalimit= 999999999;
        }else{
            $datalimit = 25;
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
                ['status','In'],
                ['return','!=', null],
                ['is_approve','0'],
                ['is_repaired','0'],
                ['gateintype','!=','Without Container']
            ])->whereBetween('inward_date', [$startDate, $endDate])->orderby('created_at','desc')->paginate($datalimit);
        }else{
            $gateInData = GateIn::where([
                ['status','In'],
                ['return','!=', null],
                ['is_approve','0'],
                ['is_repaired','0'],
                ['gateintype','!=','Without Container'],
                ['depo_id',$request->depo_id],
            ])->whereBetween('inward_date', [$startDate, $endDate])->orderby('created_at','desc')->paginate($datalimit);
            
        }
        
    
        $formetedData = [];

        foreach($gateInData as $gateIn){

            $line = MasterLine::where('id',$gateIn->line_id)->first();
            $consignee = MasterTransport::where('id',$request->consignee_id)->first();
            $transporter = MasterTransport::where('id',$request->transport_id)->first();


            if($consignee){
                $consinee_name = $consignee->name;
            }else{
                $consinee_name = '';
            }

            if($transporter){
                $transporter_name = $transporter->name;
            }else{
                $transporter_name = '';
            }

            if($line){
                $line_name = $line->name;
                $is_assigned = "Assigned";
            }else{
                $line_name = '';
                $is_assigned = "Not Assigned";
            }

            

            $formetedData[] = [
                'inward_no' => $gateIn->inward_no,
                'inward_date' => $gateIn->inward_date,
                'inward_time' => $gateIn->inward_time,
                'survayor_date' => $gateIn->survayor_date,
                'survayor_time' => $gateIn->survayor_time,
                'container_img' => $gateIn->container_img,
                'container_no' => $gateIn->container_no,
                'vehicle_number' => $gateIn->vehicle_number,
                'vehicle_img' => $gateIn->vehicle_img,
                'container_type' => $gateIn->container_type,
                'container_size' => $gateIn->container_size,
                'sub_type' => $gateIn->sub_type,
                'gross_weight' => $gateIn->gross_weight,
                'tare_weight' => $gateIn->tare_weight,
                'mfg_date' => $gateIn->mfg_date,
                'csc_details' => $gateIn->csc_details,

                'line_name' => $line_name,
                'grade' => $gateIn->grade,
                'status_name' => $gateIn->status_name,
                'rftype' => $gateIn->rftype,
                'make' => $gateIn->make,
                'model_no' => $gateIn->model_no,
                'serial_no' => $gateIn->serial_no,
                'machine_mfg_date' => $gateIn->machine_mfg_date,
                'device_status' => $gateIn->device_status,
                'third_party' => $gateIn->third_party,
                'consinee_name' => $consinee_name,
                'transaction_mode' => $gateIn->transaction_mode,
                'transaction_ref_no' => $gateIn->transaction_ref_no,
                'transporter_name' => $transporter_name,
                'driver_name' => $gateIn->driver_name,
                'contact_number' => $gateIn->contact_number,
                'vessel_name' => $gateIn->vessel_name,
                'voyage' => $gateIn->voyage,
                'port_name' => $gateIn->port_name,
                'er_no' => $gateIn->er_no,
                'empty_latter' => $gateIn->empty_latter,
                'challan' => $gateIn->challan,
                'empty_repositioning' => $gateIn->empty_repositioning,
                'return' => $gateIn->return,
                'tracking_device' => $gateIn->tracking_device,
                'remarks' => $gateIn->remarks,


                'is_assigned' => $is_assigned, 
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

    public function filterByDateSurvey(Request $request){
        
        $datalimit = '';

        if($request->page == "*"){
            $datalimit= 999999999;
        }else{
            $datalimit = 25;
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
                ['status','In'],
                ['return', null],
                ['is_approve','0'],
                ['is_repaired','0'],
                ['gateintype','!=','Without Container']
            ])->whereBetween('inward_date', [$startDate, $endDate])->orderby('created_at','desc')->paginate($datalimit);
        }else{
            $gateInData = GateIn::where([
                ['status','In'],
                ['return', null],
                ['is_approve','0'],
                ['is_repaired','0'],
                ['gateintype','!=','Without Container'],
                ['depo_id',$request->depo_id],
            ])->whereBetween('inward_date', [$startDate, $endDate])->orderby('created_at','desc')->paginate($datalimit);
            
        }
        
    
        $formetedData = [];

        foreach($gateInData as $gateIn){

            $line = MasterLine::where('id',$gateIn->line_id)->first();

            if($line){
                $line_name = $line->name;
                $is_assigned = "Assigned";
            }else{
                $line_name = '';
                $is_assigned = "Not Assigned";
            }

            

            $formetedData[] = [
                'inward_date' => $gateIn->inward_date,
                'inward_time' => $gateIn->inward_time,
                'survayor_date' => $gateIn->survayor_date,
                'survayor_time' => $gateIn->survayor_time,
                'container_img' => $gateIn->container_img,
                'container_no' => $gateIn->container_no,
                'vehicle_number' => $gateIn->vehicle_number,
                'vehicle_img' => $gateIn->vehicle_img,
                'container_type' => $gateIn->container_type,
                'container_size' => $gateIn->container_size,
                'sub_type' => $gateIn->sub_type,
                'gross_weight' => $gateIn->gross_weight,
                'tare_weight' => $gateIn->tare_weight,
                'mfg_date' => $gateIn->mfg_date,
                'csc_details' => $gateIn->csc_details,
                'is_assigned' => $is_assigned, 
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


    public function filterByDateSurveyor(Request $request){
        $datalimit = '';

        if($request->page == "*"){
            $datalimit= 999999999;
        }else{
            $datalimit = 25;
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
                ['status','In'],
                ['is_estimate_done','1'],
                ['is_approve','0'],
                ['is_repaired','0'],
                ['gateintype','!=','Without Conatiner']
            ])->whereBetween('inward_date', [$startDate, $endDate])->orderby('created_at','desc')->paginate($datalimit);
        }else{

            $gateInData = GateIn::where([
                ['status','In'],
                ['is_estimate_done','1'],
                ['is_approve','0'],
                ['is_repaired','0'],
                ['gateintype','!=','Without Conatiner'],
                ['depo_id',$request->depo_id],
            ])->whereBetween('inward_date', [$startDate, $endDate])->orderby('created_at','desc')->paginate($datalimit);
        }
        
       

        $formetedData = [];

        foreach($gateInData as $gateIn){
            $formetedData[] = [
                'inward_no' => $gateIn->inward_no,
                'container_no' => $gateIn->container_no,
                'container_img' => $gateIn->container_img,
                'vehicle_number' => $gateIn->vehicle_number,
                'vehicle_img' => $gateIn->vehicle_img,
                'inward_date' => $gateIn->inward_date,
                'inward_time' => $gateIn->inward_time,
                'survayor_date' => $gateIn->survayor_date,
                'survayor_time' => $gateIn->survayor_time,
                'container_type' => $gateIn->container_type,
                'container_size' => $gateIn->container_size,
                'sub_type' => $gateIn->sub_type,
                'gross_weight' => $gateIn->gross_weight,
                'tare_weight' => $gateIn->tare_weight,
                'mfg_date' => $gateIn->mfg_date,
                'csc_details' => $gateIn->csc_details,
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

    public function filterByDate(Request $request){
        
        $datalimit = '';

        if($request->page == "*"){
            $datalimit= 999999999;
        }else{
            $datalimit = 25;
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
                ['status','In'],
                ['is_estimate_done','0'],
                ['is_approve','0'],
                ['is_repaired','0'],
                ['gateintype','!=','Without Conatiner']
            ])->whereBetween('inward_date', [$startDate, $endDate])->orderby('created_at','desc')->paginate($datalimit);
        }else{

            $gateInData = GateIn::where([
                ['status','In'],
                ['is_estimate_done','0'],
                ['is_approve','0'],
                ['is_repaired','0'],
                ['gateintype','!=','Without Conatiner'],
                ['depo_id',$request->depo_id],
            ])->whereBetween('inward_date', [$startDate, $endDate])->orderby('created_at','desc')->paginate($datalimit);
        }
        
       

        $formetedData = [];

        foreach($gateInData as $gateIn){
            $formetedData[] = [
                'container_no' => $gateIn->container_no,
                'vehicle_number' => $gateIn->vehicle_number,
                'inward_no' => $gateIn->inward_no,
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

    public function filterByDateRepair(Request $request){
        
        $datalimit = '';

        if($request->page == "*"){
            $datalimit= 999999999;
        }else{
            $datalimit = 25;
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
                ['status','In'],
                ['is_repaired','0'],
                ['is_approve','1']
            ])->whereBetween('inward_date', [$startDate, $endDate])->orderby('created_at','desc')->paginate($datalimit);
        }else{
            $gateInData = GateIn::where([
                ['status','In'],
                ['is_approve','1'],
                ['is_repaired','0'],
                ['depo_id',$request->depo_id],
            ])->whereBetween('inward_date', [$startDate, $endDate])->orderby('created_at','desc')->paginate($datalimit);
        }
        
        $formetedData = [];

        foreach($gateInData as $gateIn){
            $formetedData[] = [
                'container_no' => $gateIn->container_no,
                'container_type' => $gateIn->container_type,
                'sub_type' => $gateIn->sub_type,
                'container_size' => $gateIn->container_size,
                'vehicle_number' => $gateIn->vehicle_number,
                'contact_number' => $gateIn->contact_number,
                'driver_name' => $gateIn->driver_name,
                'inward_no' => $gateIn->inward_no,
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

    public function filterByOutStatus(Request $request){
        
        $datalimit = '';

        if($request->page == "*"){
            $datalimit= 999999999;
        }else{
            $datalimit = 25;
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
                ['status','Out'],
            ])->whereBetween('inward_date', [$startDate, $endDate])->orderby('created_at','desc')->paginate($datalimit);
        }else{
            $gateInData = GateIn::where([
                ['status','Out'],
                ['depo_id',$request->depo_id],
            ])->whereBetween('inward_date', [$startDate, $endDate])->orderby('created_at','desc')->paginate($datalimit);
        }
        
        $formetedData = [];

        foreach($gateInData as $gateIn){
            $formetedData[] = [
                'container_no' => $gateIn->container_no,
                'container_type' => $gateIn->container_type,
                'sub_type' => $gateIn->sub_type,
                'container_size' => $gateIn->container_size,
                'vehicle_number' => $gateIn->vehicle_number,
                'contact_number' => $gateIn->contact_number,
                'driver_name' => $gateIn->driver_name,
                'inward_no' => $gateIn->inward_no,
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

    public function getContainerReport(Request $request){
        
        $datalimit = '';

        if($request->page == "*"){
            $datalimit= 999999999;
        }else{
            $datalimit = 25;
        }

        if($request->report_type == "available"){
            $field1 = "status";
            $value1 = "Ready";
            $field2 = "is_estimate_done";
            $value2 = "1";
            $field3 = "is_approve";
            $value3 = "1";
            $field4 = "is_repaired";
            $value4 = "1";
        }else if($request->report_type == "pending"){
            $field1 = "status";
            $value1 = "Ready";
            $field2 = "is_estimate_done";
            $value2 = "0";
            $field3 = "is_approve";
            $value3 = "0";
            $field4 = "is_repaired";
            $value4 = "0";
        }else if($request->report_type == "done_survey"){
            $field1 = "status";
            $value1 = "In";
            $field2 = "is_estimate_done";
            $value2 = "1";
            $field3 = "is_approve";
            $value3 = "0";
            $field4 = "is_repaired";
            $value4 = "0";
        }
        else if($request->report_type == "pending_survey"){
            $field1 = "status";
            $value1 = "In";
            $field2 = "is_estimate_done";
            $value2 = "0";
            $field3 = "is_approve";
            $value3 = "0";
            $field4 = "is_repaired";
            $value4 = "0";
        }
        else if($request->report_type == "pending_repair"){
            $field1 = "status";
            $value1 = "In";
            $field2 = "is_estimate_done";
            $value2 = "1";
            $field3 = "is_approve";
            $value3 = "1";
            $field4 = "is_repaired";
            $value4 = "0";
        }
        else if($request->report_type == "done_repair"){
            $field1 = "status";
            $value1 = "In";
            $field2 = "is_estimate_done";
            $value2 = "1";
            $field3 = "is_approve";
            $value3 = "1";
            $field4 = "is_repaired";
            $value4 = "1";
        }


        if($request->user_id == 1){
            $lineData = MasterLine::where('name',$request->line_name)->get();
            $lineId = [];
            if(count($lineData)>0){
                foreach($lineData as $lineget){
                    array_push($lineId, $lineget->id);
                }
            }

            if($request->report_type == "pending"){
                $gateInData = GateIn::where([
                    [$field1,'!=',$value1],
                    [$field2,$value2],
                    [$field3,$value3],
                    [$field4,$value4],
                ])->WhereIn('line_id',$lineId)->orderby('created_at','desc')->paginate($datalimit);
            }else{
                $gateInData = GateIn::where([
                    [$field1,$value1],
                    [$field2,$value2],
                    [$field3,$value3],
                    [$field4,$value4],
    
                ])->WhereIn('line_id',$lineId)->orderby('created_at','desc')->paginate($datalimit);
            }
        }else{
            $lineData = MasterLine::where('name',$request->line_name)->where('depo_id',$request->depo_id)->get();
            $lineId = [];
            if(count($lineData)>0){
                foreach($lineData as $lineget){
                    array_push($lineId, $lineget->id);
                }
            }
            if($request->report_type == "pending"){
                $gateInData = GateIn::where([
                    [$field1,'!=',$value1],
                    [$field2,$value2],
                    [$field3,$value3],
                    [$field4,$value4],
                    ['depo_id',$request->depo_id],
                ])->orWhereIn('line_id',$lineId)->orderby('created_at','desc')->paginate($datalimit);
            }else{
                $gateInData = GateIn::where([
                    [$field1,$value1],
                    [$field2,$value2],
                    [$field3,$value3],
                    [$field4,$value4],
                    ['depo_id',$request->depo_id],
                ])->orWhereIn('line_id',$lineId)->orderby('created_at','desc')->paginate($datalimit);
            }
            
        }
 
        $formetedData = [];

        foreach($gateInData as $gateIn){
            $line = MasterLine::where('id',$gateIn->line_id)->first();
            $consignee = MasterTransport::where('id',$gateIn->consignee_id)->first();
            $transporter = MasterTransport::where('id',$gateIn->transport_id)->first();

            if($consignee){
                $consinee_name = $consignee->name;
            }else{
                $consinee_name = '';
            }

            if($transporter){
                $transporter_name = $transporter->name;
            }else{
                $transporter_name = '';
            }

            if($line){
                $line_name = $line->name;
            }else{
                $line_name = '';
            }

            

            $formetedData[] = [
                'inward_no' => $gateIn->inward_no,
                'inward_date' => $gateIn->inward_date,
                'inward_time' => $gateIn->inward_time,
                'survayor_date' => $gateIn->survayor_date,
                'survayor_time' => $gateIn->survayor_time,
                'container_img' => $gateIn->container_img,
                'container_no' => $gateIn->container_no,
                'vehicle_number' => $gateIn->vehicle_number,
                'vehicle_img' => $gateIn->vehicle_img,
                'container_type' => $gateIn->container_type,
                'container_size' => $gateIn->container_size,
                'sub_type' => $gateIn->sub_type,
                'gross_weight' => $gateIn->gross_weight,
                'tare_weight' => $gateIn->tare_weight,
                'mfg_date' => $gateIn->mfg_date,
                'csc_details' => $gateIn->csc_details,

                'line_name' => $line_name,
                'grade' => $gateIn->grade,
                'status_name' => $gateIn->status_name,
                'rftype' => $gateIn->rftype,
                'make' => $gateIn->make,
                'model_no' => $gateIn->model_no,
                'serial_no' => $gateIn->serial_no,
                'machine_mfg_date' => $gateIn->machine_mfg_date,
                'device_status' => $gateIn->device_status,
                'third_party' => $gateIn->third_party,
                'consinee_name' => $consinee_name,
                'transaction_mode' => $gateIn->transaction_mode,
                'transaction_ref_no' => $gateIn->transaction_ref_no,
                'transporter_name' => $transporter_name,
                'driver_name' => $gateIn->driver_name,
                'contact_number' => $gateIn->contact_number,
                'vessel_name' => $gateIn->vessel_name,
                'voyage' => $gateIn->voyage,
                'port_name' => $gateIn->port_name,
                'er_no' => $gateIn->er_no,
                'empty_latter' => $gateIn->empty_latter,
                'challan' => $gateIn->challan,
                'empty_repositioning' => $gateIn->empty_repositioning,
                'return' => $gateIn->return,
                'tracking_device' => $gateIn->tracking_device,
                'remarks' => $gateIn->remarks,
                'is_repaired' => $gateIn->is_repaired,
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

    public function filterbystatus(Request $request){
        
        $datalimit = '';

        if($request->page == "*"){
            $datalimit= 999999999;
        }else{
            $datalimit = 25;
        }

        if($request->status == "Gate In"){
            $field1 = "status";
            $value1 = "In";
            $field2 = "is_estimate_done";
            $value2 = "0";
            $field3 = "is_approve";
            $value3 = "0";
            $field4 = "is_repaired";
            $value4 = "0";
        }else if($request->status == "Gate Out"){
            $field1 = "status";
            $value1 = "Out";
            $field2 = "is_estimate_done";
            $value2 = "1";
            $field3 = "is_approve";
            $value3 = "1";
            $field4 = "is_repaired";
            $value4 = "1";
        }else if($request->status == "Inspection Done"){
            $field1 = "status";
            $value1 = "In";
            $field2 = "is_estimate_done";
            $value2 = "1";
            $field3 = "is_approve";
            $value3 = "0";
            $field4 = "is_repaired";
            $value4 = "0";
        }
        else if($request->status == "Inspection Approved"){
            $field1 = "status";
            $value1 = "In";
            $field2 = "is_estimate_done";
            $value2 = "1";
            $field3 = "is_approve";
            $value3 = "1";
            $field4 = "is_repaired";
            $value4 = "0";
        }
        else if($request->status == "Inspection Pending"){
            $field1 = "status";
            $value1 = "In";
            $field2 = "is_estimate_done";
            $value2 = "0";
            $field3 = "is_approve";
            $value3 = "0";
            $field4 = "is_repaired";
            $value4 = "0";
        }
        else if($request->status == "Repair Pending"){
            $field1 = "status";
            $value1 = "In";
            $field2 = "is_estimate_done";
            $value2 = "1";
            $field3 = "is_approve";
            $value3 = "1";
            $field4 = "is_repaired";
            $value4 = "0";
        }
        else if($request->status == "Repair Done"){
            $field1 = "status";
            $value1 = "In";
            $field2 = "is_estimate_done";
            $value2 = "1";
            $field3 = "is_approve";
            $value3 = "1";
            $field4 = "is_repaired";
            $value4 = "1";
        }


        if($request->user_id == 1){
            if($request->status == "All"){
                $gateInData = GateIn::where([
                ])->orderby('created_at','desc')->paginate($datalimit);
            }else{
                $gateInData = GateIn::where([
                    [$field1,$value1],
                    [$field2,$value2],
                    [$field3,$value3],
                    [$field4,$value4],

                ])->orderby('created_at','desc')->paginate($datalimit);
            }
        }else{
            if($request->status == "All"){
                $gateInData = GateIn::where([
                    ['depo_id',$request->depo_id],
                ])->orderby('created_at','desc')->paginate($datalimit);
            }else{
                $gateInData = GateIn::where([
                    [$field1,$value1],
                    [$field2,$value2],
                    [$field3,$value3],
                    [$field4,$value4],
                    ['depo_id',$request->depo_id],
                ])->orderby('created_at','desc')->paginate($datalimit);
            }
            
        }
        
       
 
        $formetedData = [];

        foreach($gateInData as $gateIn){
            $line = MasterLine::where('id',$gateIn->line_id)->first();
            $consignee = MasterTransport::where('id',$gateIn->consignee_id)->first();
            $transporter = MasterTransport::where('id',$gateIn->transport_id)->first();


            if($consignee){
                $consinee_name = $consignee->name;
            }else{
                $consinee_name = '';
            }

            if($transporter){
                $transporter_name = $transporter->name;
            }else{
                $transporter_name = '';
            }

            if($line){
                $line_name = $line->name;
                $is_assigned = "Assigned";
            }else{
                $line_name = '';
                $is_assigned = "Not Assigned";
            }

            

            $formetedData[] = [
                'inward_no' => $gateIn->inward_no,
                'inward_date' => $gateIn->inward_date,
                'inward_time' => $gateIn->inward_time,
                'survayor_date' => $gateIn->survayor_date,
                'survayor_time' => $gateIn->survayor_time,
                'container_img' => $gateIn->container_img,
                'container_no' => $gateIn->container_no,
                'vehicle_number' => $gateIn->vehicle_number,
                'vehicle_img' => $gateIn->vehicle_img,
                'container_type' => $gateIn->container_type,
                'container_size' => $gateIn->container_size,
                'sub_type' => $gateIn->sub_type,
                'gross_weight' => $gateIn->gross_weight,
                'tare_weight' => $gateIn->tare_weight,
                'mfg_date' => $gateIn->mfg_date,
                'csc_details' => $gateIn->csc_details,

                'line_name' => $line_name,
                'grade' => $gateIn->grade,
                'status_name' => $gateIn->status_name,
                'rftype' => $gateIn->rftype,
                'make' => $gateIn->make,
                'model_no' => $gateIn->model_no,
                'serial_no' => $gateIn->serial_no,
                'machine_mfg_date' => $gateIn->machine_mfg_date,
                'device_status' => $gateIn->device_status,
                'third_party' => $gateIn->third_party,
                'consinee_name' => $consinee_name,
                'transaction_mode' => $gateIn->transaction_mode,
                'transaction_ref_no' => $gateIn->transaction_ref_no,
                'transporter_name' => $transporter_name,
                'driver_name' => $gateIn->driver_name,
                'contact_number' => $gateIn->contact_number,
                'vessel_name' => $gateIn->vessel_name,
                'voyage' => $gateIn->voyage,
                'port_name' => $gateIn->port_name,
                'er_no' => $gateIn->er_no,
                'empty_latter' => $gateIn->empty_latter,
                'challan' => $gateIn->challan,
                'empty_repositioning' => $gateIn->empty_repositioning,
                'return' => $gateIn->return,
                'tracking_device' => $gateIn->tracking_device,
                'remarks' => $gateIn->remarks,
                'is_repaired' => $gateIn->is_repaired,

                'is_assigned' => $is_assigned, 
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






    public function getInspectionDataSupervisor(Request $request){
        
        $datalimit = '';

        if($request->page == "*"){
            $datalimit= 999999999;
        }else{
            $datalimit = 25;
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
                ['depo_id',$request->depo_id],
            ])->orderby('created_at','desc')->paginate($datalimit);
        }
        
       

        $formetedData = [];

        foreach($gateInData as $gateIn){
            $line = MasterLine::where('id',$gateIn->line_id)->first();
            $consignee = MasterTransport::where('id',$gateIn->consignee_id)->first();
            $transporter = MasterTransport::where('id',$gateIn->transport_id)->first();
            
            if($consignee){
                $consinee_name = $consignee->name;
            }else{
                $consinee_name = '';
            }

            if($transporter){
                $transporter_name = $transporter->name;
            }else{
                $transporter_name = '';
            }

            if($line){
                $line_name = $line->name;
                $is_assigned = "Assigned";
            }else{
                $line_name = '';
                $is_assigned = "Not Assigned";
            }

            

            $formetedData[] = [
                'inward_no' => $gateIn->inward_no,
                'inward_date' => $gateIn->inward_date,
                'inward_time' => $gateIn->inward_time,
                'survayor_date' => $gateIn->survayor_date,
                'survayor_time' => $gateIn->survayor_time,
                'container_img' => $gateIn->container_img,
                'container_no' => $gateIn->container_no,
                'vehicle_number' => $gateIn->vehicle_number,
                'vehicle_img' => $gateIn->vehicle_img,
                'container_type' => $gateIn->container_type,
                'container_size' => $gateIn->container_size,
                'sub_type' => $gateIn->sub_type,
                'gross_weight' => $gateIn->gross_weight,
                'tare_weight' => $gateIn->tare_weight,
                'mfg_date' => $gateIn->mfg_date,
                'csc_details' => $gateIn->csc_details,

                'line_name' => $line_name,
                'grade' => $gateIn->grade,
                'status_name' => $gateIn->status_name,
                'rftype' => $gateIn->rftype,
                'make' => $gateIn->make,
                'model_no' => $gateIn->model_no,
                'serial_no' => $gateIn->serial_no,
                'machine_mfg_date' => $gateIn->machine_mfg_date,
                'device_status' => $gateIn->device_status,
                'third_party' => $gateIn->third_party,
                'consinee_name' => $consinee_name,
                'transaction_mode' => $gateIn->transaction_mode,
                'transaction_ref_no' => $gateIn->transaction_ref_no,
                'transporter_name' => $transporter_name,
                'driver_name' => $gateIn->driver_name,
                'contact_number' => $gateIn->contact_number,
                'vessel_name' => $gateIn->vessel_name,
                'voyage' => $gateIn->voyage,
                'port_name' => $gateIn->port_name,
                'er_no' => $gateIn->er_no,
                'empty_latter' => $gateIn->empty_latter,
                'challan' => $gateIn->challan,
                'empty_repositioning' => $gateIn->empty_repositioning,
                'return' => $gateIn->return,
                'tracking_device' => $gateIn->tracking_device,
                'remarks' => $gateIn->remarks,
                'is_repaired' => $gateIn->is_repaired,
 
                'is_assigned' => $is_assigned, 
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


    public function getInspectionDataSurveyor(Request $request){
        
        $datalimit = '';

        if($request->page == "*"){
            $datalimit= 999999999;
        }else{
            $datalimit = 25;
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
                            ->orWhere('vehicle_number', 'LIKE', '%' . $search . '%')
                            ->orWhere('inward_date', 'LIKE', '%' . $search . '%')
                            ->orWhere('inward_time', 'LIKE', '%' . $search . '%')
                            ->get();
                    }
                }],
                ['status','In'],
                ['is_estimate_done','1'],
                ['is_approve','0'],
                ['is_repaired','0'],
                ['gateintype','!=','Without Conatiner']
            ])->orderby('created_at','desc')->paginate($datalimit);
        }else{

            $gateInData = GateIn::where([
                [function ($query) use ($request) {
                    if (($search = $request->search)) {
                        $query->orWhere('container_no', 'LIKE', '%' . $search . '%')
                            ->orWhere('vehicle_number', 'LIKE', '%' . $search . '%')
                            ->orWhere('inward_date', 'LIKE', '%' . $search . '%')
                            ->orWhere('inward_time', 'LIKE', '%' . $search . '%')
                            ->get();
                    }
                }],
                ['depo_id',$request->depo_id],
                ['status','In'],
                ['is_estimate_done','1'],
                ['is_approve','0'],
                ['is_repaired','0'],
                ['gateintype','!=','Without Conatiner']
            ])->orderby('created_at','desc')->paginate($datalimit);
        }
        
        $formetedData = [];

        foreach($gateInData as $gateIn){
            $formetedData[] = [
                'inward_no' => $gateIn->inward_no,
                'container_no' => $gateIn->container_no,
                'container_img' => $gateIn->container_img,
                'vehicle_number' => $gateIn->vehicle_number,
                'vehicle_img' => $gateIn->vehicle_img,
                'inward_date' => $gateIn->inward_date,
                'inward_time' => $gateIn->inward_time,
                'survayor_date' => $gateIn->survayor_date,
                'survayor_time' => $gateIn->survayor_time,
                'container_type' => $gateIn->container_type,
                'container_size' => $gateIn->container_size,
                'sub_type' => $gateIn->sub_type,
                'gross_weight' => $gateIn->gross_weight,
                'tare_weight' => $gateIn->tare_weight,
                'mfg_date' => $gateIn->mfg_date,
                'csc_details' => $gateIn->csc_details,
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
            $datalimit = 25;
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
                            ->orWhere('vehicle_number', 'LIKE', '%' . $search . '%')
                            ->orWhere('inward_date', 'LIKE', '%' . $search . '%')
                            ->orWhere('inward_time', 'LIKE', '%' . $search . '%')
                            ->get();
                    }
                }],
                ['status','In'],
                ['is_estimate_done','0'],
                ['is_approve','0'],
                ['is_repaired','0'],
                ['gateintype','!=','Without Conatiner']
            ])->orderby('created_at','desc')->paginate($datalimit);
        }else{

            $gateInData = GateIn::where([
                [function ($query) use ($request) {
                    if (($search = $request->search)) {
                        $query->orWhere('container_no', 'LIKE', '%' . $search . '%')
                            ->orWhere('vehicle_number', 'LIKE', '%' . $search . '%')
                            ->orWhere('inward_date', 'LIKE', '%' . $search . '%')
                            ->orWhere('inward_time', 'LIKE', '%' . $search . '%')
                            ->get();
                    }
                }],
                ['depo_id',$request->depo_id],
                ['status','In'],
                ['is_estimate_done','0'],
                ['is_approve','0'],
                ['is_repaired','0'],
                ['gateintype','!=','Without Conatiner']
            ])->orderby('created_at','desc')->paginate($datalimit);
        }
        
        $formetedData = [];

        foreach($gateInData as $gateIn){
            $formetedData[] = [
                'container_no' => $gateIn->container_no,
                'vehicle_number' => $gateIn->vehicle_number,
                'inward_no' => $gateIn->inward_no,
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



    public function getInspectionDataInward(Request $request){
        
        $datalimit = '';

        if($request->page == "*"){
            $datalimit= 999999999;
        }else{
            $datalimit = 25;
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
                            ->orWhere('vehicle_number', 'LIKE', '%' . $search . '%')
                            ->orWhere('inward_date', 'LIKE', '%' . $search . '%')
                            ->orWhere('inward_time', 'LIKE', '%' . $search . '%')
                            ->get();
                    }
                }],
                ['status','In'],
                ['return','!=', null],
                ['is_approve','0'],
                ['is_repaired','0'],
                ['gateintype','!=','Without Container']
            ])->orderby('created_at','desc')->paginate($datalimit);
        }else{

            $gateInData = GateIn::where([
                [function ($query) use ($request) {
                    if (($search = $request->search)) {
                        $query->orWhere('container_no', 'LIKE', '%' . $search . '%')
                            ->orWhere('vehicle_number', 'LIKE', '%' . $search . '%')
                            ->orWhere('inward_date', 'LIKE', '%' . $search . '%')
                            ->orWhere('inward_time', 'LIKE', '%' . $search . '%')
                            ->get();
                    }
                }],
                ['depo_id',$request->depo_id],
                ['status','In'],
                ['return','!=', null],
                ['is_approve','0'],
                ['is_repaired','0'],
                ['gateintype','!=','Without Container']
            ])->orderby('created_at','desc')->paginate($datalimit);
        }
        
        $formetedData = [];

        foreach($gateInData as $gateIn){
            $line = MasterLine::where('id',$gateIn->line_id)->first();
            $consignee = MasterTransport::where('id',$request->consignee_id)->first();
            $transporter = MasterTransport::where('id',$request->transport_id)->first();


            if($consignee){
                $consinee_name = $consignee->name;
            }else{
                $consinee_name = '';
            }

            if($transporter){
                $transporter_name = $transporter->name;
            }else{
                $transporter_name = '';
            }

            if($line){
                $line_name = $line->name;
                $is_assigned = "Assigned";
            }else{
                $line_name = '';
                $is_assigned = "Not Assigned";
            }

            

            $formetedData[] = [
                'inward_no' => $gateIn->inward_no,
                'inward_date' => $gateIn->inward_date,
                'inward_time' => $gateIn->inward_time,
                'survayor_date' => $gateIn->survayor_date,
                'survayor_time' => $gateIn->survayor_time,
                'container_img' => $gateIn->container_img,
                'container_no' => $gateIn->container_no,
                'vehicle_number' => $gateIn->vehicle_number,
                'vehicle_img' => $gateIn->vehicle_img,
                'container_type' => $gateIn->container_type,
                'container_size' => $gateIn->container_size,
                'sub_type' => $gateIn->sub_type,
                'gross_weight' => $gateIn->gross_weight,
                'tare_weight' => $gateIn->tare_weight,
                'mfg_date' => $gateIn->mfg_date,
                'csc_details' => $gateIn->csc_details,

                'line_name' => $line_name,
                'grade' => $gateIn->grade,
                'status_name' => $gateIn->status_name,
                'rftype' => $gateIn->rftype,
                'make' => $gateIn->make,
                'model_no' => $gateIn->model_no,
                'serial_no' => $gateIn->serial_no,
                'machine_mfg_date' => $gateIn->machine_mfg_date,
                'device_status' => $gateIn->device_status,
                'third_party' => $gateIn->third_party,
                'consinee_name' => $consinee_name,
                'transaction_mode' => $gateIn->transaction_mode,
                'transaction_ref_no' => $gateIn->transaction_ref_no,
                'transporter_name' => $transporter_name,
                'driver_name' => $gateIn->driver_name,
                'contact_number' => $gateIn->contact_number,
                'vessel_name' => $gateIn->vessel_name,
                'voyage' => $gateIn->voyage,
                'port_name' => $gateIn->port_name,
                'er_no' => $gateIn->er_no,
                'empty_latter' => $gateIn->empty_latter,
                'challan' => $gateIn->challan,
                'empty_repositioning' => $gateIn->empty_repositioning,
                'return' => $gateIn->return,
                'tracking_device' => $gateIn->tracking_device,
                'remarks' => $gateIn->remarks,


                'is_assigned' => $is_assigned, 
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

    public function getInspectionDataSurvey(Request $request){
        
        $datalimit = '';

        if($request->page == "*"){
            $datalimit= 999999999;
        }else{
            $datalimit = 25;
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
                ['status','In'],
                ['return', null],
                ['is_approve','0'],
                ['is_repaired','0'],
                ['gateintype','!=','Without Container']
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
                ['return', null],
                ['is_approve','0'],
                ['is_repaired','0'],
                ['gateintype','!=','Without Container'],
                ['depo_id',$request->depo_id],
            ])->orderby('created_at','desc')->paginate($datalimit);
            
        }
        
        $formetedData = [];

        foreach($gateInData as $gateIn){
            $line = MasterLine::where('id',$gateIn->line_id)->first();

            $formetedData[] = [
                'inward_date' => $gateIn->inward_date,
                'inward_time' => $gateIn->inward_time,
                'survayor_date' => $gateIn->survayor_date,
                'survayor_time' => $gateIn->survayor_time,
                'container_img' => $gateIn->container_img,
                'container_no' => $gateIn->container_no,
                'vehicle_number' => $gateIn->vehicle_number,
                'vehicle_img' => $gateIn->vehicle_img,
                'container_type' => $gateIn->container_type,
                'container_size' => $gateIn->container_size,
                'sub_type' => $gateIn->sub_type,
                'gross_weight' => $gateIn->gross_weight,
                'tare_weight' => $gateIn->tare_weight,
                'mfg_date' => $gateIn->mfg_date,
                'csc_details' => $gateIn->csc_details,
                'is_assigned' => $is_assigned, 
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


    public function getInspectionDataOutStatus(Request $request){
        
        $datalimit = '';

        if($request->page == "*"){
            $datalimit= 999999999;
        }else{
            $datalimit = 25;
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
                ['status','Out'],
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
                ['status','Out'],
                ['depo_id',$request->depo_id],
            ])->orderby('created_at','desc')->paginate($datalimit);
        }
    
        $formetedData = [];

        foreach($gateInData as $gateIn){
            $formetedData[] = [
                'container_no' => $gateIn->container_no,
                'container_type' => $gateIn->container_type,
                'sub_type' => $gateIn->sub_type,
                'container_size' => $gateIn->container_size,
                'vehicle_number' => $gateIn->vehicle_number,
                'contact_number' => $gateIn->contact_number,
                'driver_name' => $gateIn->driver_name,
                'inward_no' => $gateIn->inward_no,
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


    public function getInspectionDataRepair(Request $request){
        $datalimit = '';

        if($request->page == "*"){
            $datalimit= 999999999;
        }else{
            $datalimit = 25;
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
                ['status','In'],
                ['is_repaired','0'],
                ['is_approve','1']
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
                ['is_repaired','0'],
                ['is_approve','1'],
                ['depo_id',$request->depo_id]
            ])->orderby('created_at','desc')->paginate($datalimit);
        }
        
       

        $formetedData = [];

        foreach($gateInData as $gateIn){
            $formetedData[] = [
                'container_no' => $gateIn->container_no,
                'container_type' => $gateIn->container_type,
                'sub_type' => $gateIn->sub_type,
                'container_size' => $gateIn->container_size,
                'vehicle_number' => $gateIn->vehicle_number,
                'contact_number' => $gateIn->contact_number,
                'driver_name' => $gateIn->driver_name,
                'inward_no' => $gateIn->inward_no,
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

        if($request->vehicle_number && $request->type != '2nd_with'){
            $getInContainer = GateIn::where('status','In')->where('vehicle_number',$request->vehicle_number)->get();
            if(count($getInContainer)>0){
                return response()->json([
                    'status' => "error",
                    'message' => "Vehicle Is Already In Yard!"
                ], 500);
            }
        }

        if($request->vehicle_number && $request->type == '2nd_with'){
            $getInContainer = GateIn::where('status','In')->where('vehicle_number',$request->vehicle_number)->get();
            if(count($getInContainer)>2){
                return response()->json([
                    'status' => "error",
                    'message' => "Vehicle Is Already In Yard!"
                ], 500);
            }
        }

        if($request->container_no){
            $getInContainer = GateIn::where('status','In')->where('container_no',$request->container_no)->get();
            if(count($getInContainer)>0){
                return response()->json([
                    'status' => "error",
                    'message' => "Container Is Already In Yard!"
                ], 500);
            }
        }

        if($request->two_container_no){
            $getInContainer = GateIn::where('status','In')->where('container_no',$request->two_container_no)->get();
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

        if ($request->hasFile('2nd_container_img')) {
            $container_img_2 = $request->file('2nd_container_img');
            $container_img_2_name = time() . '_' . $container_img_2->getClientOriginalName();
            $container_img_2->move(public_path('uploads/gatein'), $container_img_2_name);
        }else{
            $container_img_2_name = '';
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

        if($request->type == 'without'){
            $currentDateTime = new \DateTime();
            $formattedDateTime = $currentDateTime->format('YmdHisu');
    
            $inwardNo = $request->depo_id.$formattedDateTime;
    
            $createGatein = GateIn::create([
                'vehicle_img' => $vehicle_img_name,
                'vehicle_number'=> $request->vehicle_number,
                'depo_id' => $request->depo_id,
                'createdby' => $request->user_id,
                'gateintype' => "Without Container",
                'inward_no' => $inwardNo,
                'status' => 'In',
                'is_approve' => '0',
                'is_repaired' => '0',
                'is_estimate_done' => '0',
                'inward_date' => date('Y-m-d'),
                'inward_time' => date('H:i:s'),
            ]);
        }else if($request->type == '2nd_with'){
            $currentDateTime = new \DateTime();
            $formattedDateTime = $currentDateTime->format('YmdHisu');

            $inwardNo = $request->depo_id.$formattedDateTime;

            $createGatein = GateIn::create([
                'container_img' => $container_img_name,
                'vehicle_img' => $vehicle_img_name,
                'container_no'=> $request->container_no,
                'vehicle_number'=> $request->vehicle_number,
                'depo_id' => $request->depo_id,
                'createdby' => $request->user_id,
                'gateintype' => "2 Conatiner",
                'inward_no' => $inwardNo,
                'status' => 'In',
                'is_approve' => '0',
                'is_repaired' => '0',
                'is_estimate_done' => '0',
                'inward_date' => date('Y-m-d'),
                'inward_time' => date('H:i:s'),
            ]);

            if($createGatein){
                $currentDateTime2 = new \DateTime();
            $formattedDateTime2 = $currentDateTime2->format('YmdHisu');

            $inwardNo2 = $request->depo_id.$formattedDateTime2;
                $createGatein2 = GateIn::create([
                    'container_img' => $container_img_2_name,
                    'vehicle_img' => $vehicle_img_name,
                    'container_no'=> $request->two_container_no,
                    'vehicle_number'=> $request->vehicle_number,
                    'depo_id' => $request->depo_id,
                    'createdby' => $request->user_id,
                    'gateintype' => "2 Conatiner",
                    'inward_no' => $inwardNo2,
                    'status' => 'In',
                    'is_approve' => '0',
                    'is_repaired' => '0',
                    'is_estimate_done' => '0',
                    'inward_date' => date('Y-m-d'),
                    'inward_time' => date('H:i:s'),
                ]);
            }
        }else{
            $currentDateTime = new \DateTime();
            $formattedDateTime = $currentDateTime->format('YmdHisu');

            $inwardNo = $request->depo_id.$formattedDateTime;

            $createGatein = GateIn::create([
                'container_img' => $container_img_name,
                'vehicle_img' => $vehicle_img_name,
                'container_no'=> $request->container_no,
                'vehicle_number'=> $request->vehicle_number,
                'depo_id' => $request->depo_id,
                'createdby' => $request->user_id,
                'gateintype' => "With Conatiner",
                'inward_no' => $inwardNo,
                'status' => 'In',
                'is_approve' => '0',
                'is_repaired' => '0',
                'is_estimate_done' => '0',
                'inward_date' => date('Y-m-d'),
                'inward_time' => date('H:i:s'),
            ]);
        }

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

        if($request->is_gate_out == 1){
            $vhicleDetails = GateIn::find($request->vhichle_id);
            $vhicleDetails->status = "Out";

            $containerDetails = GateIn::find($request->container_no_id);
            $containerDetails->status = "Out";
            $containerDetails->is_gate_out_checked = $request->is_gate_out_checked;
            $containerDetails->gate_out_check_by = $request->check_by;
            $containerDetails->gate_out_date = date('Y-m-d H:i:s');

            $vhicleDetails  = $vhicleDetails->save();
            $containerDetails  = $containerDetails->save();

            if($vhicleDetails && $containerDetails){
                return response()->json([
                    'status' => "success",
                    'message' => "Gate Out Successfully"
                ], 200);
            }else{
                return response()->json([
                    'status' => "error",
                    'message' => "Error in submission!"
                ], 406);
            }

        }


        if($request->line_id == ''){
            return response()->json([
                'status' => "error",
                'message' => "Line is required"
            ], 500);
        }

        $gateInDetails = GateIn::find($request->id);

        

        if ($request->hasFile('challan')) {
            $challan = $request->file('challan');
            $challan_name = time() . '_' . $challan->getClientOriginalName();
            $challan->move(public_path('uploads/gatein'), $challan_name);
        }else{
            $challan_name = $gateInDetails->challan;
        }

        if ($request->hasFile('empty_latter')) {
            $empty_latter = $request->file('empty_latter');
            $empty_latter_name = time() . '_' . $empty_latter->getClientOriginalName();
            $empty_latter->move(public_path('uploads/gatein'), $empty_latter_name);
        }else{
            $empty_latter_name = $gateInDetails->empty_latter;
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

        $gateInDetails->inward_no = is_null($request->inward_no) ? $gateInDetails->inward_no : $request->inward_no;
        $gateInDetails->vehicle_number = is_null($request->vehicle_number) ? $gateInDetails->vehicle_number : $request->vehicle_number;
    
        $gateInDetails->inward_date = is_null($request->inward_date) ? $gateInDetails->inward_date : $request->inward_date;
        $gateInDetails->inward_time = is_null($request->inward_time) ? $gateInDetails->inward_time : $request->inward_time;
        $gateInDetails->survayor_date = is_null($request->survayor_date) ? $gateInDetails->survayor_date : $request->survayor_date;
        $gateInDetails->survayor_time = is_null($request->survayor_time) ? $gateInDetails->survayor_time : $request->survayor_time;
        $gateInDetails->container_type = is_null($request->container_type) ? $gateInDetails->container_type : $request->container_type;
        $gateInDetails->container_size = is_null($request->container_size) ? $gateInDetails->container_size : $request->container_size;
        $gateInDetails->sub_type = is_null($request->sub_type) ? $gateInDetails->sub_type : $request->sub_type;
        $gateInDetails->gross_weight = is_null($request->gross_weight) ? $gateInDetails->gross_weight : $request->gross_weight;
        $gateInDetails->tare_weight = is_null($request->tare_weight) ? $gateInDetails->tare_weight : $request->tare_weight;
        $gateInDetails->mfg_date = is_null($request->mfg_date) ? $gateInDetails->mfg_date : $request->mfg_date;
        $gateInDetails->csc_details = is_null($request->csc_details) ? $gateInDetails->csc_details : $request->csc_details;
        $gateInDetails->line_id = is_null($request->line_id) ? $gateInDetails->line_id : $request->line_id;
        $gateInDetails->grade = is_null($request->grade) ? $gateInDetails->grade : $request->grade;
        $gateInDetails->status_name = is_null($request->status_name) ? $gateInDetails->status_name : $request->status_name;
        $gateInDetails->rftype = is_null($request->rftype) ? $gateInDetails->rftype : $request->rftype;


        $gateInDetails->make = is_null($request->make) ? $gateInDetails->make : $request->make;
        $gateInDetails->model_no = is_null($request->model_no) ? $gateInDetails->model_no : $request->model_no;
        $gateInDetails->serial_no = is_null($request->serial_no) ? $gateInDetails->serial_no : $request->serial_no;
        $gateInDetails->machine_mfg_date = is_null($request->machine_mfg_date) ? $gateInDetails->machine_mfg_date : $request->machine_mfg_date;
        $gateInDetails->device_status = is_null($request->device_status) ? $gateInDetails->device_status : $request->device_status;
        $gateInDetails->third_party = is_null($request->third_party) ? $gateInDetails->third_party : $request->third_party;
        $gateInDetails->consignee_id = is_null($request->consignee_id) ? $gateInDetails->consignee_id : $request->consignee_id;
        $gateInDetails->transaction_mode = is_null($request->transaction_mode) ? $gateInDetails->transaction_mode : $request->transaction_mode;
        $gateInDetails->transaction_ref_no = is_null($request->transaction_ref_no) ? $gateInDetails->transaction_ref_no : $request->transaction_ref_no;
        $gateInDetails->arrive_from = is_null($request->arrive_from) ? $gateInDetails->arrive_from : $request->arrive_from;
        $gateInDetails->transport_id = is_null($request->transport_id) ? $gateInDetails->transport_id : $request->transport_id;
        $gateInDetails->driver_name = is_null($request->driver_name) ? $gateInDetails->driver_name : $request->driver_name;
        $gateInDetails->contact_number = is_null($request->contact_number) ? $gateInDetails->contact_number : $request->contact_number;
        $gateInDetails->vessel_name = is_null($request->vessel_name) ? $gateInDetails->vessel_name : $request->vessel_name;
        $gateInDetails->voyage = is_null($request->voyage) ? $gateInDetails->voyage : $request->voyage;
        $gateInDetails->port_name = is_null($request->port_name) ? $gateInDetails->port_name : $request->port_name;
        $gateInDetails->er_no = is_null($request->er_no) ? $gateInDetails->er_no : $request->er_no;
        $gateInDetails->empty_latter = $empty_latter_name;
        $gateInDetails->challan = $challan_name;
        $gateInDetails->empty_repositioning = is_null($request->empty_repositioning) ? $gateInDetails->empty_repositioning : $request->empty_repositioning;
        $gateInDetails->return = is_null($request->return) ? $gateInDetails->return : $request->return;
        $gateInDetails->tracking_device = is_null($request->tracking_device) ? $gateInDetails->tracking_device : $request->tracking_device;
        $gateInDetails->remarks = is_null($request->remarks) ? $gateInDetails->remarks : $request->remarks;

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


    public function updateestimate(Request $request){
        $gateInDetails = GateIn::find($request->gateinid);
        $gateInDetails->is_estimate_done = '1';
        $gateInDetails->estimate_updatedby = $request->user_id;
        $gateInDetails->estimate_updated_at = date('Y-m-d H:i:s');

        $gateInDetails  = $gateInDetails->save();

        if($gateInDetails){
            return response()->json([
                'status' => "success",
                'message' => "Updated Successfully"
            ], 200);
        }else{
            return response()->json([
                'status' => "error",
                'message' => "Error in submission!"
            ], 500);
        }
    }

    public function updateapprove(Request $request){
        $gateInDetails = GateIn::find($request->gateinid);
        $gateInDetails->is_approve = '1';
        $gateInDetails->approve_updatedby = $request->user_id;
        $gateInDetails->approve_updatedat = date('Y-m-d H:i:s');
        $gateInDetails  = $gateInDetails->save();

        if($gateInDetails){
            return response()->json([
                'status' => "success",
                'message' => "Updated Successfully"
            ], 200);
        }else{
            return response()->json([
                'status' => "error",
                'message' => "Error in submission!"
            ], 500);
        }
    }


    public function updaterepair(Request $request){
        $gateInDetails = GateIn::find($request->gateinid);
        $gateInDetails->is_repaired = '1';
        $gateInDetails->repair_updatedby = $request->user_id;
        $gateInDetails->repair_updatedat = date('Y-m-d H:i:s');
        $gateInDetails  = $gateInDetails->save();

        if($gateInDetails){
            return response()->json([
                'status' => "success",
                'message' => "Updated Successfully"
            ], 200);
        }else{
            return response()->json([
                'status' => "error",
                'message' => "Error in submission!"
            ], 500);
        }
    }


    public function updateout(Request $request){
        $gateInDetails = GateIn::find($request->gateinid);
        $gateInDetails->status = $request->out_status;
        $gateInDetails->status_updatedby = $request->user_id;
        $gateInDetails->status_updatedat = date('Y-m-d H:i:s');
        $gateInDetails  = $gateInDetails->save();

        if($gateInDetails){
            return response()->json([
                'status' => "success",
                'message' => "Updated Successfully"
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

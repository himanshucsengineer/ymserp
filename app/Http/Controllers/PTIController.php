<?php

namespace App\Http\Controllers;

use App\Models\PTI;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\Validator;
use \stdClass;
use App\Models\GateIn;

class PTIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use Helpers;
    public function index()
    {
        return view('pti.create');
    }

    public function all()
    {
        return view('pti.view');
    }
    public function get(Request $request)
    {
        if($request->user_id == 1){
            return PTI::get();
        }else{
            return PTI::where('depo_id',$request->depo_id)->get();
        }
    }
    public function getbyid(Request $request){
        return PTI::where('id',$request->id)->first();
    }

    public function getPtiData(Request $request){
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
        if($request->search){
            $gateinData =  GateIn::where('container_no', 'LIKE', '%' . $request->search . '%')->get();
            
            $gateinId = [];
            if(count($gateinData)>0){
                foreach($gateinData as $gatein){
                    array_push($gateinId, $gatein->id);
                }
            }

        }else{
            $gateinId = [];
        }
        if($request->user_id == 1){

            $PtiData = PTI::where([
                [function ($query) use ($request) {
                    if (($search = $request->search)) {
                        $query->orWhere('party_name', 'LIKE', '%' . $search . '%')
                            ->orWhereIn('container_no',$gateinId)
                            ->orWhere('size_type', 'LIKE', '%' . $search . '%')
                            ->orWhere('transporter_name', 'LIKE', '%' . $search . '%')
                            ->orWhere('vehicle_no', 'LIKE', '%' . $search . '%')
                            ->orWhere('survey_place', 'LIKE', '%' . $search . '%')
                            ->orWhere('survey_date', 'LIKE', '%' . $search . '%')
                            ->orWhere('pti_date', 'LIKE', '%' . $search . '%')
                            ->orWhere('set_temprature', 'LIKE', '%' . $search . '%')
                            ->orWhere('partlow', 'LIKE', '%' . $search . '%')
                            ->orWhere('length_460_cable', 'LIKE', '%' . $search . '%')
                            ->orWhere('machine_checking', 'LIKE', '%' . $search . '%')
                            ->orWhere('supply_temp', 'LIKE', '%' . $search . '%')
                            ->orWhere('return_temp', 'LIKE', '%' . $search . '%')
                            ->orWhere('iso_plug', 'LIKE', '%' . $search . '%')
                            ->orWhere('container_fit', 'LIKE', '%' . $search . '%')
                            ->orWhere('washing_carrid', 'LIKE', '%' . $search . '%')
                            ->get();
                    }
                }],
            ])->orderby('created_at','desc')->paginate($datalimit);
        }else{

            $PtiData = PTI::where([
                [function ($query) use ($request) {
                    if (($search = $request->search)) {
                        $query->orWhere('party_name', 'LIKE', '%' . $search . '%')
                            ->orWhereIn('container_no',$gateinId)
                            ->orWhere('size_type', 'LIKE', '%' . $search . '%')
                            ->orWhere('transporter_name', 'LIKE', '%' . $search . '%')
                            ->orWhere('vehicle_no', 'LIKE', '%' . $search . '%')
                            ->orWhere('survey_place', 'LIKE', '%' . $search . '%')
                            ->orWhere('survey_date', 'LIKE', '%' . $search . '%')
                            ->orWhere('pti_date', 'LIKE', '%' . $search . '%')
                            ->orWhere('set_temprature', 'LIKE', '%' . $search . '%')
                            ->orWhere('partlow', 'LIKE', '%' . $search . '%')
                            ->orWhere('length_460_cable', 'LIKE', '%' . $search . '%')
                            ->orWhere('machine_checking', 'LIKE', '%' . $search . '%')
                            ->orWhere('supply_temp', 'LIKE', '%' . $search . '%')
                            ->orWhere('return_temp', 'LIKE', '%' . $search . '%')
                            ->orWhere('iso_plug', 'LIKE', '%' . $search . '%')
                            ->orWhere('container_fit', 'LIKE', '%' . $search . '%')
                            ->orWhere('washing_carrid', 'LIKE', '%' . $search . '%')
                            ->get();
                    }
                }],
                ['depo_id',$request->depo_id],
            ])->orderby('created_at','desc')->paginate($datalimit);
        }
        
        $formetedData = [];

        foreach($PtiData as $pti){
            $containerData = GateIn::where('id',$pti->container_no)->first();

            $formetedData[] = [
                'party_name' => $pti->party_name,
                'container_no' => $containerData->container_no,
                'size_type' => $pti->size_type,
                'transporter_name' => $pti->transporter_name,
                'vehicle_no' => $pti->vehicle_no,
                'survey_place' => $pti->survey_place,
                'survey_date' => $pti->survey_date,
                'pti_date' => $pti->pti_date,
                'set_temprature' => $pti->set_temprature,
                'partlow' => $pti->partlow,
                'length_460_cable' => $pti->length_460_cable,
                'machine_checking' => $pti->machine_checking,
                'supply_temp' => $pti->supply_temp,
                'return_temp' => $pti->return_temp,
                'iso_plug' => $pti->iso_plug,
                'container_fit' => $pti->container_fit,
                'washing_carrid' => $pti->washing_carrid,
                'id' => $pti->id,
            ];
            
        } 
    	return response()->json([
            'data' => $formetedData,
            'pagination' => [
                'current_page' => $PtiData->currentPage(),
                'per_page' => $PtiData->perPage(),
                'total' => $PtiData->total(),
                'last_page' => $PtiData->lastPage(),
                'from' => $PtiData->firstItem(),
                'to' => $PtiData->lastItem(),
                'links' => [
                    'prev' => $PtiData->previousPageUrl(),
                    'next' => $PtiData->nextPageUrl(),
                    'all_pages' => $PtiData->getUrlRange(1, $PtiData->lastPage()),
                ],
            ],
        ]); 
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePTIRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $createDamage = PTI::create([
            'party_name'=> $request->party_name,
            'container_no'=> $request->container_no,
            'size_type'=> $request->size_type,
            'transporter_name'=> $request->transporter_name,
            'vehicle_no'=> $request->vehicle_no,
            'survey_place'=> $request->survey_place,
            'survey_date'=> $request->survey_date,
            'pti_date'=> $request->pti_date,
            'set_temprature'=> $request->set_temprature,
            'partlow'=> $request->partlow,
            'length_460_cable'=> $request->length_460_cable,
            'machine_checking'=> $request->machine_checking,
            'supply_temp'=> $request->supply_temp,
            'return_temp'=> $request->return_temp,
            'iso_plug'=> $request->iso_plug,
            'container_fit'=> $request->container_fit,
            'washing_carrid'=> $request->washing_carrid,
            'createdby' => $request->user_id,
            'depo_id' => $request->depo_id
        ]);


        if($createDamage){
            return response()->json([
                'status' => "success",
                'message' => "PTI Added Successfully"
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
     * @param  \App\Models\PTI  $pTI
     * @return \Illuminate\Http\Response
     */
    public function show(PTI $pTI)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePTIRequest  $request
     * @param  \App\Models\PTI  $pTI
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $contractorDetails = PTI::find($request->id);

        $contractorDetails->party_name =  is_null($request->party_name) ? $contractorDetails->party_name : $request->party_name;
        $contractorDetails->container_no =  is_null($request->container_no) ? $contractorDetails->container_no : $request->container_no;
        $contractorDetails->size_type =  is_null($request->size_type) ? $contractorDetails->size_type : $request->size_type;
        $contractorDetails->transporter_name =  is_null($request->transporter_name) ? $contractorDetails->transporter_name : $request->transporter_name;
        $contractorDetails->vehicle_no =  is_null($request->vehicle_no) ? $contractorDetails->vehicle_no : $request->vehicle_no;
        $contractorDetails->survey_place =  is_null($request->survey_place) ? $contractorDetails->survey_place : $request->survey_place;
        $contractorDetails->survey_date =  is_null($request->survey_date) ? $contractorDetails->survey_date : $request->survey_date;
        $contractorDetails->pti_date =  is_null($request->pti_date) ? $contractorDetails->pti_date : $request->pti_date;
        $contractorDetails->set_temprature =  is_null($request->set_temprature) ? $contractorDetails->set_temprature : $request->set_temprature;
        $contractorDetails->partlow =  is_null($request->partlow) ? $contractorDetails->partlow : $request->partlow;
        $contractorDetails->length_460_cable =  is_null($request->length_460_cable) ? $contractorDetails->length_460_cable : $request->length_460_cable;
        $contractorDetails->machine_checking =  is_null($request->machine_checking) ? $contractorDetails->machine_checking : $request->machine_checking;
        $contractorDetails->supply_temp =  is_null($request->supply_temp) ? $contractorDetails->supply_temp : $request->supply_temp;
        $contractorDetails->return_temp =  is_null($request->return_temp) ? $contractorDetails->return_temp : $request->return_temp;
        $contractorDetails->iso_plug =  is_null($request->iso_plug) ? $contractorDetails->iso_plug : $request->iso_plug;
        $contractorDetails->container_fit =  is_null($request->container_fit) ? $contractorDetails->container_fit : $request->container_fit;
        $contractorDetails->washing_carrid =  is_null($request->washing_carrid) ? $contractorDetails->washing_carrid : $request->washing_carrid;
        $contractorDetails->updatedby = $request->user_id;
        $contractorDetails->updated_at = date('Y-m-d H:i:s');

        $contractorDetails  = $contractorDetails->save();

        if($contractorDetails){
            return response()->json([
                'status' => "success",
                'message' => "PTI Updated Successfully"
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
     * @param  \App\Models\PTI  $pTI
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $contractor = PTI::find($request->id);

        
        if (is_null($contractor)) {
            throw new NotFoundHttpException('Invalid PTI Id!');
        }else{
            
            $deletecontractor= $contractor->delete();
            if($deletecontractor){
                return response()->json([
                    'status'=> "success",
                    'message' => "PTI Deleted Successfully"
                ], 200);
            }else{
                return response()->json([
                    'status'=> "error",
                    'message' => "Error In Deletion"
                ], 500);
            }
        }
    }
}

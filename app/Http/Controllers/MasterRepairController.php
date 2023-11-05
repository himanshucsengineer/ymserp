<?php

namespace App\Http\Controllers;

use App\Models\MasterRepair;
use App\Models\MasterDamage;
use App\Models\MasterMaterial;
use App\Models\MasterTarrif;

use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\Validator;
use \stdClass;


class MasterRepairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use Helpers;
    public function index()
    {
        return view('repair.create');
    }

    public function all()
    {
        return view('repair.view');
    }

    public function getData(){
        $repairData = MasterRepair::get();
        $formattedEmployee = [];
        foreach($repairData as $repair){
            $damageData = MasterDamage::where('id',$repair->damage_id)->first();

            $formattedEmployee[] = [
                'id'=> (int) $repair->id,
                'repair_code' => $repair->repair_code,
                'desc' => $repair->desc,
                'damage_id' => $damageData->code,
            ];
        }
        return $formattedEmployee;
    }

    public function get(Request $request)
    {
        return MasterRepair::where('damage_id', $request->id)->get();
    }

    public function getbyid(Request $request){
        return MasterRepair::where('id',$request->id)->get();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMasterRepairRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'repair_code'=>[
                'required',
                'unique:master_repairs,repair_code'
            ],
            'desc' => [
                'required'
            ],
            'damage_id' => [
                'required'
            ]
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            $messages = $validator->errors();
            $validationFormate = new stdClass();
            
            if ($messages->has('repair_code')){
                $validationFormate->repair_code = $messages->first('repair_code');
            }

            if ($messages->has('desc')){
                $validationFormate->desc = $messages->first('desc');
            }

            if ($messages->has('damage_id')){
                $validationFormate->damage_id = $messages->first('damage_id');
            }

            $validationError[] = $validationFormate;

            return response()->json([
                'status' => "error",
                'message' => $validationError
            ], 400);
        }

        
        $createRepair = MasterRepair::create([
            'repair_code'=> $request->repair_code,
            'desc'=> $request->desc,
            'damage_id'=> $request->damage_id,
            'createdby' => $request->user_id,
            'depo_id' => $request->depo_id
        ]);


        if($createRepair){
            return response()->json([
                'status' => "success",
                'message' => "Repair Added Successfully"
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
     * @param  \App\Models\MasterRepair  $masterRepair
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rules=[
            'repair_code'=>[
                'required',
            ],
            'desc' => [
                'required'
            ],
            'damage_id' => [
                'required'
            ]
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            $messages = $validator->errors();
            $validationFormate = new stdClass();
            
            if ($messages->has('repair_code')){
                $validationFormate->repair_code = $messages->first('repair_code');
            }

            if ($messages->has('desc')){
                $validationFormate->desc = $messages->first('desc');
            }

            if ($messages->has('damage_id')){
                $validationFormate->damage_id = $messages->first('damage_id');
            }

            $validationError[] = $validationFormate;

            return response()->json([
                'status' => "error",
                'message' => $validationError
            ], 400);
        }


        
        $getContractor = MasterRepair::where('id',$request->id)->first();
        
        $contractorDetails = MasterRepair::find($request->id);

        if($getContractor->repair_code != $request->repair_code ){

            $repair_code = MasterRepair::where('repair_code',$request->repair_code)->get();
            if(count($repair_code) > 0){
                return response()->json([
                    'status' => "error",
                    'message' => "Repair Code is already Taken"
                ], 500);
            }
            $contractorDetails->repair_code = is_null($request->repair_code) ? $contractorDetails->repair_code : $request->repair_code;
        }


        $contractorDetails->damage_id =  is_null($request->damage_id) ? $contractorDetails->damage_id : $request->damage_id;
        $contractorDetails->desc = is_null($request->desc) ? $contractorDetails->desc : $request->desc;


        $contractorDetails  = $contractorDetails->save();

        if($contractorDetails){
            return response()->json([
                'status' => "success",
                'message' => "Repair Code Updated Successfully"
            ], 200);
        }else{
            return response()->json([
                'status' => "error",
                'message' => "Error in submission!"
            ], 500);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMasterRepairRequest  $request
     * @param  \App\Models\MasterRepair  $masterRepair
     * @return \Illuminate\Http\Response
     */
    public function show(UpdateMasterRepairRequest $request, MasterRepair $masterRepair)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterRepair  $masterRepair
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       
        $geteMaterial = MasterMaterial::orWhere('repiar_id', 'LIKE', '%' . $request->id . '%')->get();

        if(count($geteMaterial) > 0){
            return response()->json([
                'status'=> "error",
                'message' => "Repair code is assigned to Material Code can not delete this"
            ], 500);
        }

        $geteTarrif = MasterTarrif::orWhere('repair_id', 'LIKE', '%' . $request->id . '%')->get();

        if(count($geteTarrif) > 0){
            return response()->json([
                'status'=> "error",
                'message' => "Repair code is assigned to Tarrif can not delete this"
            ], 500);
        }

        $contractor = MasterRepair::find($request->id);

        
        if (is_null($contractor)) {
            throw new NotFoundHttpException('Invalid Workshop Id!');
        }else{
            
            $deletecontractor= $contractor->delete();
            if($deletecontractor){
                return response()->json([
                    'status'=> "success",
                    'message' => "Repair Code Deleted Successfully"
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

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

class MasterMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use Helpers;
    public function index()
    {
        return view('material.create');
    }

    public function all()
    {
        return view('material.view');
    }


    public function getData(Request $request){


        if($request->user_id == 1){
            $repairData = MasterMaterial::get();
        }else{
            $repairData = MasterMaterial::where('depo_id',$request->depo_id)->get();
        }

        $formattedEmployee = [];
        foreach($repairData as $repair){
            $damageData = MasterDamage::where('id',$repair->damage_id)->first();
            $repairData = MasterRepair::where('id',$repair->repiar_id)->first();

            $formattedEmployee[] = [
                'id'=> (int) $repair->id,
                'damage_id' => $damageData->code,
                'repiar_id' => $repairData->repair_code,
                'material_code' => $repair->material_code,
                'desc' => $repair->desc 
            ];
        }
        return $formattedEmployee;
    }


    public function get(Request $request)
    {
        return MasterMaterial::where('damage_id',$request->damage_id)->where('repiar_id',$request->repair_id)->get();
    }


    public function getbyid(Request $request){
        return MasterMaterial::where('id',$request->id)->first();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMasterMaterialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'material_code'=>[
                'required',
            ],
            'desc' => [
                'required'
            ],
            'damage_id' => [
                'required'
            ],
            'repiar_id' => [
                'required'
            ]
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            $messages = $validator->errors();
            $validationFormate = new stdClass();
            
            if ($messages->has('material_code')){
                $validationFormate->material_code = $messages->first('material_code');
            }

            if ($messages->has('desc')){
                $validationFormate->desc = $messages->first('desc');
            }

            if ($messages->has('damage_id')){
                $validationFormate->damage_id = $messages->first('damage_id');
            }
            if ($messages->has('repiar_id')){
                $validationFormate->repiar_id = $messages->first('repiar_id');
            }

            $validationError[] = $validationFormate;

            return response()->json([
                'status' => "error",
                'message' => $validationError
            ], 400);
        }


        $createMaterial = MasterMaterial::create([
            'material_code'=> $request->material_code,
            'desc'=> $request->desc,
            'damage_id'=> $request->damage_id,
            'repiar_id'=> $request->repiar_id,
            'createdby' => $request->user_id,
            'depo_id' => $request->depo_id
        ]);


        if($createMaterial){
            return response()->json([
                'status' => "success",
                'message' => "Material Added Successfully"
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
     * @param  \App\Models\MasterMaterial  $masterMaterial
     * @return \Illuminate\Http\Response
     */
    public function show(MasterMaterial $masterMaterial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMasterMaterialRequest  $request
     * @param  \App\Models\MasterMaterial  $masterMaterial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rules=[
            'material_code'=>[
                'required',
            ],
            'desc' => [
                'required'
            ],
            'damage_id' => [
                'required'
            ],
            'repiar_id' => [
                'required'
            ]
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            $messages = $validator->errors();
            $validationFormate = new stdClass();
            
            if ($messages->has('material_code')){
                $validationFormate->material_code = $messages->first('material_code');
            }

            if ($messages->has('desc')){
                $validationFormate->desc = $messages->first('desc');
            }

            if ($messages->has('damage_id')){
                $validationFormate->damage_id = $messages->first('damage_id');
            }
            if ($messages->has('repiar_id')){
                $validationFormate->repiar_id = $messages->first('repiar_id');
            }

            $validationError[] = $validationFormate;

            return response()->json([
                'status' => "error",
                'message' => $validationError
            ], 400);
        }


        $contractorDetails = MasterMaterial::find($request->id);

        $contractorDetails->material_code = is_null($request->material_code) ? $contractorDetails->material_code : $request->material_code;

        $contractorDetails->desc = is_null($request->desc) ? $contractorDetails->desc : $request->desc;
        $contractorDetails->damage_id = is_null($request->damage_id) ? $contractorDetails->damage_id : $request->damage_id;
        $contractorDetails->repiar_id = is_null($request->repiar_id) ? $contractorDetails->repiar_id : $request->repiar_id;

        $contractorDetails->updatedby = $request->user_id;
        $contractorDetails->updated_at = date('Y-m-d H:i:s');

        $contractorDetails  = $contractorDetails->save();

        if($contractorDetails){
            return response()->json([
                'status' => "success",
                'message' => "Material Code Updated Successfully"
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
     * @param  \App\Models\MasterMaterial  $masterMaterial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       

        $geteTarrif = MasterTarrif::orWhere('material_id', 'LIKE', '%' . $request->id . '%')->get();

        if(count($geteTarrif) > 0){
            return response()->json([
                'status'=> "error",
                'message' => "Repair code is assigned to Tarrif can not delete this"
            ], 500);
        }

        $contractor = MasterMaterial::find($request->id);

        
        if (is_null($contractor)) {
            throw new NotFoundHttpException('Invalid Workshop Id!');
        }else{
            
            $deletecontractor= $contractor->delete();
            if($deletecontractor){
                return response()->json([
                    'status'=> "success",
                    'message' => "Material Code Deleted Successfully"
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

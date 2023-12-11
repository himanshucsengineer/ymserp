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
            $damageData =  MasterDamage::where('code', 'LIKE', '%' . $request->search . '%')->get();
            $repairData =  MasterRepair::where('repair_code', 'LIKE', '%' . $request->search . '%')->get();

            $damageId = [];
            if(count($damageData)>0){
                foreach($damageData as $damage){
                    array_push($damageId, $damage->id);
                }
            }

            $repairId = [];
            if(count($repairData)>0){
                foreach($repairData as $repair){
                    array_push($repairId, $repair->id);
                }
            }
        }else{
            $damageId = [];
            $repairId = [];
        }

        if($request->user_id == 1){
            $materialData = MasterMaterial::where([
                [function ($query) use ($request,$damageId,$repairId) {
                    if (($search = $request->search)) {
                        $query->orWhere('material_code', 'LIKE', '%' . $search . '%')
                            ->orWhere('desc', 'LIKE', '%' . $search . '%')
                            ->orWhereIn('damage_id',$damageId)
                            ->orWhereIn('repiar_id',$repairId)
                            ->get();
                    }
                }],
            ])->orderby('created_at','desc')->paginate($datalimit);
        }else{
            $materialData = MasterMaterial::where([
                [function ($query) use ($request,$damageId,$repairId) {
                    if (($search = $request->search)) {
                        $query->orWhere('material_code', 'LIKE', '%' . $search . '%')
                            ->orWhere('desc', 'LIKE', '%' . $search . '%')
                            ->orWhereIn('damage_id',$damageId)
                            ->orWhereIn('repiar_id',$repairId)
                            ->get();
                    }
                }],
                ['depo_id',$request->depo_id],
            ])->orderby('created_at','desc')->paginate($datalimit);
        }

        $formetedData = [];
        foreach($materialData as $material){
            $damageData = MasterDamage::where('id',$material->damage_id)->first();
            $repairData = MasterRepair::where('id',$material->repiar_id)->first();

            $formetedData[] = [
                'id'=> (int) $material->id,
                'damage_id' => $damageData->code,
                'repiar_id' => $repairData->repair_code,
                'material_code' => $material->material_code,
                'desc' => $material->desc 
            ];
        }
        return response()->json([
            'data' => $formetedData,
            'pagination' => [
                'current_page' => $materialData->currentPage(),
                'per_page' => $materialData->perPage(),
                'total' => $materialData->total(),
                'last_page' => $materialData->lastPage(),
                'from' => $materialData->firstItem(),
                'to' => $materialData->lastItem(),
                'links' => [
                    'prev' => $materialData->previousPageUrl(),
                    'next' => $materialData->nextPageUrl(),
                    'all_pages' => $materialData->getUrlRange(1, $materialData->lastPage()),
                ],
            ],
        ]); 
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

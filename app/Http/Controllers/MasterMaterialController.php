<?php

namespace App\Http\Controllers;

use App\Models\MasterMaterial;
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

    public function get(Request $request)
    {
        return MasterMaterial::where('damage_id',$request->damage_id)->where('repiar_id',$request->repair_id)->get();
    }


    public function getbyid(Request $request){
        return MasterMaterial::where('id',$request->id)->get();
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
                'unique:master_materials,material_code'
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
    public function update(UpdateMasterMaterialRequest $request, MasterMaterial $masterMaterial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterMaterial  $masterMaterial
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterMaterial $masterMaterial)
    {
        //
    }
}

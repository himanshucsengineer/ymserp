<?php

namespace App\Http\Controllers;

use App\Models\MasterRepair;
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
    public function show(MasterRepair $masterRepair)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMasterRepairRequest  $request
     * @param  \App\Models\MasterRepair  $masterRepair
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMasterRepairRequest $request, MasterRepair $masterRepair)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterRepair  $masterRepair
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterRepair $masterRepair)
    {
        //
    }
}

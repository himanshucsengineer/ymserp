<?php

namespace App\Http\Controllers;

use App\Models\MasterDamage;
use App\Models\MasterRepair;
use App\Models\MasterMaterial;
use App\Models\MasterTarrif;

use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\Validator;
use \stdClass;

class MasterDamageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use Helpers;
    public function index()
    {
        return view('damage.create');
    }

    public function all()
    {
        return view('damage.view');
    }


    public function get()
    {
        return MasterDamage::get();
    }

    public function getbyid(Request $request){
        return MasterDamage::where('id',$request->id)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMasterDamageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'code'=>[
                'required',
                'unique:master_damages,code'
            ],
            'desc' => [
                'required'
            ]
        ];

        
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            $messages = $validator->errors();
            $validationFormate = new stdClass();
            
            if ($messages->has('code')){
                $validationFormate->code = $messages->first('code');
            }

            if ($messages->has('desc')){
                $validationFormate->desc = $messages->first('desc');
            }

            $validationError[] = $validationFormate;

            return response()->json([
                'status' => "error",
                'message' => $validationError
            ], 400);
        }

        
        $createDamage = MasterDamage::create([
            'code'=> $request->code,
            'desc'=> $request->desc,
            'createdby' => $request->user_id,
            'depo_id' => $request->depo_id
        ]);


        if($createDamage){
            return response()->json([
                'status' => "success",
                'message' => "Damage Added Successfully"
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
     * @param  \App\Models\MasterDamage  $masterDamage
     * @return \Illuminate\Http\Response
     */
    public function show(MasterDamage $masterDamage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMasterDamageRequest  $request
     * @param  \App\Models\MasterDamage  $masterDamage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rules=[
            'code'=>[
                'required',
            ],
            'desc' => [
                'required'
            ]
        ];

        
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            $messages = $validator->errors();
            $validationFormate = new stdClass();
            
            if ($messages->has('code')){
                $validationFormate->code = $messages->first('code');
            }

            if ($messages->has('desc')){
                $validationFormate->desc = $messages->first('desc');
            }

            $validationError[] = $validationFormate;

            return response()->json([
                'status' => "error",
                'message' => $validationError
            ], 400);
        }


        $getContractor = MasterDamage::where('id',$request->id)->first();
        
        $contractorDetails = MasterDamage::find($request->id);

        if($getContractor->code != $request->code ){

            $code = MasterDamage::where('code',$request->code)->get();
            if(count($code) > 0){
                return response()->json([
                    'status' => "error",
                    'message' => "Damage Code is already Taken"
                ], 500);
            }
            $contractorDetails->code = is_null($request->code) ? $contractorDetails->code : $request->code;
        }

        $contractorDetails->desc =  is_null($request->desc) ? $contractorDetails->desc : $request->desc;

        $contractorDetails  = $contractorDetails->save();

        if($contractorDetails){
            return response()->json([
                'status' => "success",
                'message' => "Damage Code Updated Successfully"
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
     * @param  \App\Models\MasterDamage  $masterDamage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
  
        $geteRepair = MasterRepair::orWhere('damage_id', 'LIKE', '%' . $request->id . '%')->get();

        if(count($geteRepair) > 0){
            return response()->json([
                'status'=> "error",
                'message' => "Damage code is assigned to Repair Code can not delete this"
            ], 500);
        }

        $geteMaterial = MasterMaterial::orWhere('damage_id', 'LIKE', '%' . $request->id . '%')->get();

        if(count($geteMaterial) > 0){
            return response()->json([
                'status'=> "error",
                'message' => "Damage code is assigned to Material Code can not delete this"
            ], 500);
        }

        $geteTarrif = MasterTarrif::orWhere('damade_id', 'LIKE', '%' . $request->id . '%')->get();

        if(count($geteTarrif) > 0){
            return response()->json([
                'status'=> "error",
                'message' => "Damage code is assigned to Tarrif can not delete this"
            ], 500);
        }

        $contractor = MasterDamage::find($request->id);

        
        if (is_null($contractor)) {
            throw new NotFoundHttpException('Invalid Workshop Id!');
        }else{
            
            $deletecontractor= $contractor->delete();
            if($deletecontractor){
                return response()->json([
                    'status'=> "success",
                    'message' => "Damage Code Deleted Successfully"
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

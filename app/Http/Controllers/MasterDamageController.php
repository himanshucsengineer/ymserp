<?php

namespace App\Http\Controllers;

use App\Models\MasterDamage;
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
    public function update(UpdateMasterDamageRequest $request, MasterDamage $masterDamage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterDamage  $masterDamage
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterDamage $masterDamage)
    {
        //
    }
}

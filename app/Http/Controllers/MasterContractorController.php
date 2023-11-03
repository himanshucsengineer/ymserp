<?php

namespace App\Http\Controllers;

use App\Models\MasterContractor;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\Validator;
use \stdClass;

class MasterContractorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use Helpers;
    public function index()
    {
        return view('contractor.create');
    }

    public function get()
    {
        return MasterContractor::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMasterContractorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules=[
            'contractorcode'=>[
                'required',
                'unique:master_contractors,contractor_code'
            ],
            'fullname' => [
                'required'
            ],
            'company' =>[
                'required'
            ],
            'contact' => [
                'unique:master_contractors,contact'
            ],
            'gst' => [
                'unique:master_contractors,gst'
            ]
        ];


        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            $messages = $validator->errors();
            $validationFormate = new stdClass();
            
            if ($messages->has('contractorcode')){
                $validationFormate->contractorcode = $messages->first('contractorcode');
            }

            if ($messages->has('fullname')){
                $validationFormate->fullname = $messages->first('fullname');
            }

            if ($messages->has('company')){
                $validationFormate->company = $messages->first('company');
            }

            if ($messages->has('contact')){
                $validationFormate->contact = $messages->first('contact');
            }

            if ($messages->has('gst')){
                $validationFormate->gst = $messages->first('gst');
            }

            $validationError[] = $validationFormate;

            return response()->json([
                'status' => "error",
                'message' => $validationError
            ], 400);
        }


        $contractor = MasterContractor::create([
            'contractor_code'=> $request->contractorcode,
            'fullname'=> $request->fullname,
            'company'=> $request->company,
            'address'=> $request->address,
            'pincode'=> $request->pincode,
            'contact'=> $request->contact,
            'license'=> $request->license,
            'gst'=> $request->gst,
            'createdby' => $request->user_id,
            'depo_id' => $request->depo_id
        ]);


        if($contractor){
            return response()->json([
                'status' => "success",
                'message' => "Contractor Added Successfully"
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
     * @param  \App\Models\MasterContractor  $masterContractor
     * @return \Illuminate\Http\Response
     */
    public function show(MasterContractor $masterContractor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMasterContractorRequest  $request
     * @param  \App\Models\MasterContractor  $masterContractor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMasterContractorRequest $request, MasterContractor $masterContractor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterContractor  $masterContractor
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterContractor $masterContractor)
    {
        //
    }
}

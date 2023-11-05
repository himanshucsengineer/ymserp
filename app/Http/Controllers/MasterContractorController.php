<?php

namespace App\Http\Controllers;

use App\Models\MasterContractor;
use App\Models\MasterEmployee;

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

    public function all()
    {
        return view('contractor.view');
    }

    public function get()
    {
        return MasterContractor::get();
    }

    public function getbyid(Request $request){
        return MasterContractor::where('id',$request->id)->first();
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
    public function update(Request $request)
    {


        $rules=[
            'contractor_code'=>[
                'required',
            ],
            'fullname' => [
                'required'
            ],
            'company' =>[
                'required'
            ],
            
        ];


        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            $messages = $validator->errors();
            $validationFormate = new stdClass();
            
            if ($messages->has('contractor_code')){
                $validationFormate->contractor_code = $messages->first('contractor_code');
            }

            if ($messages->has('fullname')){
                $validationFormate->fullname = $messages->first('fullname');
            }

            if ($messages->has('company')){
                $validationFormate->company = $messages->first('company');
            }

            $validationError[] = $validationFormate;

            return response()->json([
                'status' => "error",
                'message' => $validationError
            ], 400);
        }

        

        $getContractor = MasterContractor::where('id',$request->id)->first();
        
        $contractorDetails = MasterContractor::find($request->id);

        if($getContractor->contractor_code != $request->contractor_code){

            $contractor_code = MasterContractor::where('contractor_code',$request->contractor_code)->get();
            if(count($contractor_code) > 0){
                return response()->json([
                    'status' => "error",
                    'message' => "Contractor Code is already Taken"
                ], 500);
            }

            $contractorDetails->contractor_code = is_null($request->contractor_code) ? $contractorDetails->contractor_code : $request->contractor_code;
        }

        if($getContractor->contact != $request->contact){
            $contact = MasterContractor::where('contact',$request->contact)->get();
            if(count($contact) > 0){
                return response()->json([
                    'status' => "error",
                    'message' => "Contact is already Taken"
                ], 500);
            }
            $contractorDetails->contact = is_null($request->contact) ? $contractorDetails->contact : $request->contact;
        }

        if($getContractor->gst != $request->gst){
            $gst = MasterContractor::where('gst',$request->gst)->get();
            if(count($gst) > 0){
                return response()->json([
                    'status' => "error",
                    'message' => "gst is already Taken"
                ], 500);
            }
            $contractorDetails->gst = is_null($request->gst) ? $contractorDetails->gst : $request->contact;
        }

        $contractorDetails->address =  is_null($request->address) ? $contractorDetails->address : $request->address;
        $contractorDetails->company = is_null($request->company) ? $contractorDetails->company : $request->company;
        $contractorDetails->fullname = is_null($request->fullname) ? $contractorDetails->fullname : $request->fullname;
        $contractorDetails->license = is_null($request->license) ? $contractorDetails->license : $request->license;
        $contractorDetails->pincode = is_null($request->pincode) ? $contractorDetails->pincode : $request->pincode;

        $contractorDetails  = $contractorDetails->save();

        if($contractorDetails){
            return response()->json([
                'status' => "success",
                'message' => "Contractor Updated Successfully"
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
     * @param  \App\Models\MasterContractor  $masterContractor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $geteEmployee = MasterEmployee::where('contractor_id',$request->id)->get();

        if(count($geteEmployee) > 0){
            return response()->json([
                'status'=> "error",
                'message' => "Contractore is assigned to employee you can not delete this Contractor!"
            ], 500);
        }
        $contractor = MasterContractor::find($request->id);

        
        if (is_null($contractor)) {
            throw new NotFoundHttpException('Invalid Workshop Id!');
        }else{
            
            $deletecontractor= $contractor->delete();
            if($deletecontractor){
                return response()->json([
                    'status'=> "success",
                    'message' => "contractor Deleted Successfully"
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

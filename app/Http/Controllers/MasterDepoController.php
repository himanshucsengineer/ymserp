<?php

namespace App\Http\Controllers;

use App\Models\MasterDepo;
use App\Models\User;

use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\Validator;
use \stdClass;
  
class MasterDepoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use Helpers;

    public function index()
    {
        return view('depo.create');
    }
    public function all()
    {
        return view('depo.view');
    }

    public function get()
    {
        return MasterDepo::get();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMasterDepoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'name'=>[
                'required',
            ],
            'address' => [
                'required'
            ],
            'status' =>[
                'required'
            ],
            'phone' => [
                'required',
                'unique:master_depos,phone'
            ],
            'email' => [
                'required',
                'unique:master_depos,email'
            ],
            'tan' => [
                'required',
                'unique:master_depos,tan'
            ],
            'pan' => [
                'required',
                'unique:master_depos,pan'
            ],
            'service_tax' => [
                'required',
            ],
            'vattin' => [
                'required',
            ],
            'gst' => [
                'required',
                'unique:master_depos,gst'
            ],
            'state_code' => [
                'required'
            ],
            'state' => [
                'required',
            ],
            'billing_name' => [
                'required',
            ],
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            $messages = $validator->errors();
            $validationFormate = new stdClass();
            if ($messages->has('name')){
                $validationFormate->name = $messages->first('name');
            }
            if ($messages->has('address')){
                $validationFormate->address = $messages->first('address');
            }
            if ($messages->has('status')){
                $validationFormate->status = $messages->first('status');
            }
            if ($messages->has('phone')){
                $validationFormate->phone = $messages->first('phone');
            }
            if ($messages->has('email')){
                $validationFormate->email = $messages->first('email');
            }
            if ($messages->has('tan')){
                $validationFormate->tan = $messages->first('tan');
            }
            if ($messages->has('pan')){
                $validationFormate->pan = $messages->first('pan');
            }
            if ($messages->has('service_tax')){
                $validationFormate->service_tax = $messages->first('service_tax');
            }
            if ($messages->has('vattin')){
                $validationFormate->vattin = $messages->first('vattin');
            }
            if ($messages->has('gst')){
                $validationFormate->gst = $messages->first('gst');
            }
            if ($messages->has('state_code')){
                $validationFormate->state_code = $messages->first('state_code');
            }
            if ($messages->has('state')){
                $validationFormate->state = $messages->first('state');
            }
            if ($messages->has('billing_name')){
                $validationFormate->billing_name = $messages->first('billing_name');
            }
            $validationError[] = $validationFormate;

            return response()->json([
                'status' => "error",
                'message' => $validationError
            ], 400);
        }

        $createDepo = MasterDepo::create([
            'name'=> $request->name,
            'address'=> $request->address,
            'status'=> $request->status,
            'phone'=> $request->phone,
            'email'=> $request->email,
            'tan'=> $request->tan,
            'pan'=> $request->pan,
            'service_tax'=> $request->service_tax,

            'vattin'=> $request->vattin,
            'gst'=> $request->gst,
            'state_code'=> $request->state_code,
            'state'=> $request->state,
            'billing_name'=> $request->billing_name,
            'company_email'=> $request->company_email,
            'company_name'=> $request->company_name,
            'company_address'=> $request->company_address,
            'company_phone'=> $request->company_phone,
            'created_by' => $request->created_by,
            'depo_id' => $request->depo_id
        ]);


        if($createDepo){
            return response()->json([
                'status' => "success",
                'message' => "Depo Added Successfully"
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
     * @param  \App\Models\MasterDepo  $masterDepo
     * @return \Illuminate\Http\Response
     */
    public function show(MasterDepo $masterDepo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMasterDepoRequest  $request
     * @param  \App\Models\MasterDepo  $masterDepo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $getContractor = MasterDepo::where('id',$request->id)->first();
        $contractorDetails = MasterDepo::find($request->id);

        if($getContractor->phone != $request->phone){
            $phone = MasterDepo::where('phone',$request->phone)->get();
            if(count($phone) > 0){
                return response()->json([
                    'status' => "error",
                    'message' => "phone no. is already Taken"
                ], 500);
            }
            $contractorDetails->phone = is_null($request->phone) ? $contractorDetails->phone : $request->phone;
        }
        if($getContractor->email != $request->email){
            $email = MasterDepo::where('email',$request->email)->get();
            if(count($email) > 0){
                return response()->json([
                    'status' => "error",
                    'message' => "email is already Taken"
                ], 500);
            }
            $contractorDetails->email = is_null($request->email) ? $contractorDetails->email : $request->email;
        }
        if($getContractor->tan != $request->tan){
            $tan = MasterDepo::where('tan',$request->tan)->get();
            if(count($tan) > 0){
                return response()->json([
                    'status' => "error",
                    'message' => "tan no. is already Taken"
                ], 500);
            }
            $contractorDetails->tan = is_null($request->tan) ? $contractorDetails->tan : $request->tan;
        }
        if($getContractor->pan != $request->pan){
            $pan = MasterDepo::where('pan',$request->pan)->get();
            if(count($pan) > 0){
                return response()->json([
                    'status' => "error",
                    'message' => "Pan NO. is already Taken"
                ], 500);
            }
            $contractorDetails->pan = is_null($request->pan) ? $contractorDetails->pan : $request->pan;
        }
        if($getContractor->gst != $request->gst){
            $getgst = MasterDepo::where('gst',$request->gst)->get();
            if(count($getgst) > 0){
                return response()->json([
                    'status' => "error",
                    'message' => "Gst NO. is already Taken"
                ], 500);
            }
            $contractorDetails->gst = is_null($request->gst) ? $contractorDetails->gst : $request->gst;
        }

        $contractorDetails->name = is_null($request->name) ? $contractorDetails->name : $request->name;
        $contractorDetails->address = is_null($request->address) ? $contractorDetails->address : $request->address;
        $contractorDetails->status = is_null($request->status) ? $contractorDetails->status : $request->status;
        $contractorDetails->service_tax = is_null($request->service_tax) ? $contractorDetails->service_tax : $request->service_tax;
        $contractorDetails->vattin = is_null($request->vattin) ? $contractorDetails->vattin : $request->vattin;
        $contractorDetails->state = is_null($request->state) ? $contractorDetails->state : $request->state;
        $contractorDetails->state_code = is_null($request->state_code) ? $contractorDetails->state_code : $request->state_code;
        $contractorDetails->billing_name = is_null($request->billing_name) ? $contractorDetails->billing_name : $request->billing_name;
        $contractorDetails->company_name = is_null($request->company_name) ? $contractorDetails->company_name : $request->company_name;
        $contractorDetails->company_address = is_null($request->company_address) ? $contractorDetails->company_address : $request->company_address;
        $contractorDetails->company_phone = is_null($request->company_phone) ? $contractorDetails->company_phone : $request->company_phone;
        $contractorDetails->company_email = is_null($request->company_email) ? $contractorDetails->company_email : $request->company_email;


        $contractorDetails  = $contractorDetails->save();

        if($contractorDetails){
            return response()->json([
                'status' => "success",
                'message' => "Depo Updated Successfully"
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
     * @param  \App\Models\MasterDepo  $masterDepo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $geteEmployee = User::orWhere('depo_id', 'LIKE', '%' . $request->id . '%')->get();

        if(count($geteEmployee) > 0){
            return response()->json([
                'status'=> "error",
                'message' => "Depo is assigned to user can not delete"
            ], 500);
        }
        $contractor = MasterDepo::find($request->id);

        
        if (is_null($contractor)) {
            throw new NotFoundHttpException('Invalid Workshop Id!');
        }else{
            
            $deletecontractor= $contractor->delete();
            if($deletecontractor){
                return response()->json([
                    'status'=> "success",
                    'message' => "Depo Deleted Successfully"
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

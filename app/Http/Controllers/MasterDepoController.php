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

    public function get(Request $request)
    {
        if($request->user_id == 1){
            return MasterDepo::get();
        }else{
            return MasterDepo::where('depo_id',$request->depo_id)->get();
        }
    }

    public function getbyid(Request $request){
        return MasterDepo::where('id',$request->id)->first();
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
           
           
            $validationError[] = $validationFormate;

            return response()->json([
                'status' => "error",
                'message' => $validationError
            ], 400);
        }


        $contractorDetails = MasterDepo::find($request->id);

        $contractorDetails->phone = is_null($request->phone) ? $contractorDetails->phone : $request->phone;
        $contractorDetails->email = is_null($request->email) ? $contractorDetails->email : $request->email;
        $contractorDetails->tan = is_null($request->tan) ? $contractorDetails->tan : $request->tan;
        $contractorDetails->pan = is_null($request->pan) ? $contractorDetails->pan : $request->pan;       
        $contractorDetails->gst = is_null($request->gst) ? $contractorDetails->gst : $request->gst;
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

        $contractorDetails->updatedby = $request->user_id;
        $contractorDetails->updated_at = date('Y-m-d H:i:s');;



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

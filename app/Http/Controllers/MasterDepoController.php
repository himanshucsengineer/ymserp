<?php

namespace App\Http\Controllers;

use App\Models\MasterDepo;
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
    public function update(UpdateMasterDepoRequest $request, MasterDepo $masterDepo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterDepo  $masterDepo
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterDepo $masterDepo)
    {
        //
    }
}

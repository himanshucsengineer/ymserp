<?php

namespace App\Http\Controllers;

use App\Models\MasterEmployee;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\Validator;
use \stdClass;

class MasterEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use Helpers;
    public function index()
    {
        return view('employee.create');
    }

    public function all()
    {
        return view('employee.view');
    }

    public function get()
    {
        return MasterEmployee::get();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMasterEmployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $rules=[
            'employee_code'=>[
                'required',
                'unique:master_employees,employee_code'
            ],
            'firstname' => [
                'required'
            ],
            'lastname' =>[
                'required'
            ],
            'contractor_id' => [
                'required',
            ],
            'contact' => [
                'required',
                'unique:master_employees,contact'
            ],
            'aadhar' => [
                'required',
                'unique:master_employees,aadhar'
            ]
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            $messages = $validator->errors();
            $validationFormate = new stdClass();
            if ($messages->has('employee_code')){
                $validationFormate->employee_code = $messages->first('employee_code');
            }
            if ($messages->has('firstname')){
                $validationFormate->firstname = $messages->first('firstname');
            }
            if ($messages->has('lastname')){
                $validationFormate->lastname = $messages->first('lastname');
            }
            if ($messages->has('contractor_id')){
                $validationFormate->contractor_id = $messages->first('contractor_id');
            }
            if ($messages->has('contact')){
                $validationFormate->contact = $messages->first('contact');
            }
            if ($messages->has('aadhar')){
                $validationFormate->aadhar = $messages->first('aadhar');
            }
        
            $validationError[] = $validationFormate;

            return response()->json([
                'status' => "error",
                'message' => $validationError
            ], 400);
        }

        $CreateEmployee = MasterEmployee::create([
            'employee_code'=> $request->employee_code,
            'firstname'=> $request->firstname,
            'middlename'=> $request->middlename,
            'lastname'=> $request->lastname,
            'contractor_id'=> $request->contractor_id,
            'address'=> $request->address,
            'pincode'=> $request->pincode,
            'contact'=> $request->contact,
            'aadhar'=> $request->aadhar,
            'createdby' => $request->user_id,
            'depo_id' => $request->depo_id
        ]);


        if($CreateEmployee){
            return response()->json([
                'status' => "success",
                'message' => "Employee Added Successfully"
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
     * @param  \App\Models\MasterEmployee  $masterEmployee
     * @return \Illuminate\Http\Response
     */
    public function show(MasterEmployee $masterEmployee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMasterEmployeeRequest  $request
     * @param  \App\Models\MasterEmployee  $masterEmployee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMasterEmployeeRequest $request, MasterEmployee $masterEmployee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterEmployee  $masterEmployee
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterEmployee $masterEmployee)
    {
        //
    }
}

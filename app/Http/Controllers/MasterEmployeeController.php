<?php

namespace App\Http\Controllers;

use App\Models\MasterEmployee;
use App\Models\MasterContractor;
use App\Models\User;

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

    public function get(Request $request)
    {

        if($request->user_id == 1){
            return MasterEmployee::get();
        }else{
            return MasterEmployee::where('depo_id',$request->depo_id)->get();
        }
    }

    public function getbyid(Request $request)
    {
        return MasterEmployee::where('id',$request->id)->first();
    }

    public function getdata(Request $request){
        if($request->user_id == 1){
            $employeeData = MasterEmployee::get();
        }else{
            $employeeData = MasterEmployee::where('depo_id',$request->depo_id)->get();
        }

        $formattedEmployee = [];
        foreach($employeeData as $employee){
            $contractorData = MasterContractor::where('id',$employee->contractor_id)->first();

            $formattedEmployee[] = [
                'id'=> (int) $employee->id,
                'employee_code' => $employee->employee_code,
                'firstname' => $employee->firstname,
                'middlename' => $employee->middlename,
                'lastname' => $employee->lastname,
                'address' => $employee->address,
                'pincode' => $employee->pincode,
                'contact' => $employee->contact,
                'aadhar' => $employee->aadhar,
                'contractor' => $contractorData->fullname,
            ];
        }
        return $formattedEmployee;

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
    public function update(Request $request)
    {

        $rules=[
            'employee_code'=>[
                'required',

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
           
            $validationError[] = $validationFormate;

            return response()->json([
                'status' => "error",
                'message' => $validationError
            ], 400);
        }

        
        $getContractor = MasterEmployee::where('id',$request->id)->first();
        
        $contractorDetails = MasterEmployee::find($request->id);

        if($getContractor->employee_code != $request->employee_code ){

            $employee_code = MasterEmployee::where('employee_code',$request->employee_code)->get();
            if(count($employee_code) > 0){
                return response()->json([
                    'status' => "error",
                    'message' => "Employee Code is already Taken"
                ], 500);
            }
            $contractorDetails->employee_code = is_null($request->employee_code) ? $contractorDetails->employee_code : $request->employee_code;
        }

        
        $contractorDetails->contact = is_null($request->contact) ? $contractorDetails->contact : $request->contact;
        $contractorDetails->aadhar = is_null($request->aadhar) ? $contractorDetails->aadhar : $request->aadhar;

        $contractorDetails->firstname =  is_null($request->firstname) ? $contractorDetails->firstname : $request->firstname;
        $contractorDetails->middlename = is_null($request->middlename) ? $contractorDetails->middlename : $request->middlename;
        $contractorDetails->lastname = is_null($request->lastname) ? $contractorDetails->lastname : $request->lastname;
        $contractorDetails->contractor_id = is_null($request->contractor_id) ? $contractorDetails->contractor_id : $request->contractor_id;
        $contractorDetails->address = is_null($request->address) ? $contractorDetails->address : $request->address;
        $contractorDetails->pincode = is_null($request->pincode) ? $contractorDetails->pincode : $request->pincode;
        $contractorDetails->updatedby = $request->user_id;
        $contractorDetails->updated_at = date('Y-m-d H:i:s');


        $contractorDetails  = $contractorDetails->save();

        if($contractorDetails){
            return response()->json([
                'status' => "success",
                'message' => "Employee Updated Successfully"
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
     * @param  \App\Models\MasterEmployee  $masterEmployee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $geteEmployee = User::where('employee_id',$request->id)->get();

        if(count($geteEmployee) > 0){
            return response()->json([
                'status'=> "error",
                'message' => "Employee is assigned to user can not delete this Employee"
            ], 500);
        }
        $contractor = MasterEmployee::find($request->id);

        
        if (is_null($contractor)) {
            throw new NotFoundHttpException('Invalid Workshop Id!');
        }else{
            
            $deletecontractor= $contractor->delete();
            if($deletecontractor){
                return response()->json([
                    'status'=> "success",
                    'message' => "Employee Deleted Successfully"
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

<?php

namespace App\Http\Controllers;

use App\Models\MasterUser;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use App\Models\User;
use \stdClass;

class MasterUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use Helpers;
    public function index()
    {
        return view('user.create');
    }

    public function all()
    {
        return view('user.view');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMasterUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'employee_id'=>[
                'required',
            ],
            'role_id' => [
                'required'
            ],
            'category_id' =>[
                'required'
            ],
            'depot_id' => [
                'required'
            ],
            'username' => [
                'required',
                'unique:users,username'
            ],
            'password'=>[
                'required',
            ],
            'recovery_number' => [
                'required'
            ],
            'ans1' =>[
                'required'
            ],
            'ans2' => [
                'required'
            ],
            'ans3' => [
                'required'
            ],
            'status'=>[
                'required'
            ],
            'createdby' => [
                'required'
            ]
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            $messages = $validator->errors();
            $validationFormate = new stdClass();
            if ($messages->has('createdby')){
                $validationFormate->createdby = $messages->first('createdby');
            }
            
            if ($messages->has('employee_id')){
                $validationFormate->employee_id = $messages->first('employee_id');
            }

            if ($messages->has('role_id')){
                $validationFormate->role_id = $messages->first('role_id');
            }

            if ($messages->has('category_id')){
                $validationFormate->category_id = $messages->first('category_id');
            }

            if ($messages->has('depot_id')){
                $validationFormate->depot_id = $messages->first('depot_id');
            }

            if ($messages->has('username')){
                $validationFormate->username = $messages->first('username');
            }

            if ($messages->has('password')){
                $validationFormate->password = $messages->first('password');
            }

            if ($messages->has('recovery_number')){
                $validationFormate->recovery_number = $messages->first('recovery_number');
            }

            if ($messages->has('ans1')){
                $validationFormate->ans1 = $messages->first('ans1');
            }

            if ($messages->has('ans2')){
                $validationFormate->ans2 = $messages->first('ans2');
            }

            if ($messages->has('ans3')){
                $validationFormate->ans3 = $messages->first('ans3');
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

        $roleDetails = Role::find($request->role_id);
      
        $user = User::create([
            'employee_id'=> $request->employee_id,
            'category_id' => implode(', ', $request->category_id),
            'depot_id' => implode(', ', $request->depot_id),
            'username' => $request->username,
            'password' => $request->password,
            'recovery_number'=> $request->recovery_number,
            'ans1' => $request->ans1,
            'ans2' => $request->ans2,
            'ans3' => $request->ans3,
            'status' => $request->status,
            'createdby' => $request->createdby,
            'depo_id' => $request->depo_id
        ]);

        if($user && $user->assignRole($roleDetails->name)){
            return response()->json([
                'status' => "success",
                'message' => "User Created Successfully"
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
     * @param  \App\Models\MasterUser  $masterUser
     * @return \Illuminate\Http\Response
     */
    public function show(MasterUser $masterUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMasterUserRequest  $request
     * @param  \App\Models\MasterUser  $masterUser
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMasterUserRequest $request, MasterUser $masterUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterUser  $masterUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterUser $masterUser)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Models\MasterEmployee;

use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Roles;
use App\Transformers\PermissionTransformer;
use Illuminate\Support\Facades\Hash;
use \stdClass;
use App\Models\MasterDepo;
// use Illuminate\Support\Facades\Password;
/**
 * Class AuthController
 * @package  App\Http\Controllers\Auth
 */


class AuthController extends Controller
{
    use Helpers;

    public function checkUser(Request $request){
        $rules=[
            'username'=>[
                'required'
            ],
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            $messages = $validator->errors();
            $validationFormate = new stdClass();
            
            if ($messages->has('username')){
                $validationFormate->username = $messages->first('username');
            }

            $validationError[] = $validationFormate;

            return response()->json([
                'status' => "error",
                'message' => $validationError
            ], 400);
        }

        $getUser = User::where('username', $request->username)->first();

        if($getUser){
            if($getUser->status != 1){
                return response()->json([
                    'status' => "error",
                    'message' => "User is not active please contact admin!",
                ], 400);
            }else{
                $explodeDepoid = explode(',',$getUser->depot_id);
                $getTotalDepo = array();

                for($i=0; $i<count($explodeDepoid); $i++){
                    $getDepo = MasterDepo::where('id', $explodeDepoid[$i])->first();
                    array_push($getTotalDepo,$getDepo);
                }   
                return response()->json([
                    'status' => "success",
                    'data' => $getTotalDepo,
                ], 200);
            }
        }else{
            return response()->json([
                'status' => "error",
                'message' => "User Not Found",
            ], 400);
        }


    }

    public function login(Request $request){
        $rules=[
            'username'=>[
                'required',
            ],

            'password' => [
                'required',
            ]
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            $messages = $validator->errors();
            $validationFormate = new stdClass();
            
            if ($messages->has('username')){
                $validationFormate->username = $messages->first('username');
            }

            if ($messages->has('password')){
                $validationFormate->password = $messages->first('password');
            }

            $validationError[] = $validationFormate;

            return response()->json([
                'status' => "error",
                'message' => $validationError
            ], 400);
        }
 
        $credentials = $request->only('username', 'password');

        $getUser = User::where('username', $request->username)->get();

        if($getUser->all()){
            if(Hash::check($request->password, $getUser[0]->password)){
                try {
                    if(!$token = auth()->attempt($credentials)){
                        return response()->json([
                            'status' => "error",
                            'message' => "Something Went Wrong!",
                        ], 402);
                    }  
                } catch (JWTException $error) {
                    throw $error;
                }
            }else{
                return response()->json([
                    'status' => "error",
                    'message' => "Incorrect Password!",
                ], 402);
            }
        }else{
            return response()->json([
                'status' => "error",
                'message' => "User Not Registered",
            ], 402);
        }

        $loggedInUser = Auth::user();
        $currentUser = User::where('id', $loggedInUser->id)->with('roles.permissions')->first();
        $getToken = $this->respondWithToken($token);
        $permission = $currentUser->roles[0]->permissions;

        $employeeDetails = MasterEmployee::where('id',$currentUser->employee_id)->first();

        $userPermissions = new stdClass();
        for($i=0; $i < count($permission); $i++){
            $permissionKey = $permission[$i]->name;
            $userPermissions->$permissionKey = $permission[$i]->name;
        }
        $formatePermission = $userPermissions;

        $employeeName = $employeeDetails->firstname . ' ' .$employeeDetails->lastname;

        $transformoutput = [
            'user_id' =>  $currentUser->id,
            'employeeName' => $employeeName,
            'username' => $currentUser->username,
            'role_id' => $currentUser->roles[0]->id,
            'role_name' => $currentUser->roles[0]->name,
            'permissions' => $formatePermission
        ];

        return response()->json([
            'token' => $getToken,
            'currentUser' => $transformoutput,
        ], 200);
        
    }


    public function refreshtoken(){

        try {
            if(!$token = auth()->getToken()){
                throw new NotFoundHttpException('Token Does Not Exist!');
            }
            return $this->respondWithToken(auth()->refresh($token));
        } catch (JWTException $error) {
            throw $error;
        }
        
    }

    public function logout(){
        try {
            auth()->logout();
        } catch (JWTException $error) {
            throw $error;
        }

        return response()->json(['message' => 'User Logged Out Successfully!'], 200);
    }


    private function respondWithToken($token){
        return response()->json([
            'access_token' => $token
        ],200);
    }


    public function changepassword(Request $request){

        $user = Auth::user();


        $rules=[
            'current_password'=>[
                'required'
            ],

            'new_password' => [
                'required',
                'string',
                Password::min(8)
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
            ],
            'confirm_password' => [
                'required'
            ],
            'name' => [
                'required',
                'string',
                'min:3',
                'max:30'
            ]
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            $messages = $validator->errors();
            $validationFormate = new stdClass();
            
            if ($messages->has('current_password')){
                $validationFormate->current_password = $messages->first('current_password');
            }

            if ($messages->has('new_password')){
                $validationFormate->new_password = $messages->first('new_password');
            }

            if ($messages->has('confirm_password')){
                $validationFormate->confirm_password = $messages->first('confirm_password');
            }

            if ($messages->has('name')){
                $validationFormate->name = $messages->first('name');
            }

            $validationError[] = $validationFormate;

            return response()->json([
                'status' => "error",
                'message' => $validationError
            ], 400);
        }

        if(Hash::check($request->current_password, $user->password)){
            if($request->new_password == $request->confirm_password){

                $user->password = $request->new_password;
                $user->name = $request->name;
                $user->save();

                if($user){
                    return response()->json([
                        'status'=> "success",
                        'message' => "Password Updated Successfully"
                    ], 200);
                }else{
                    return response()->json([
                        'status'=> "error",
                        'message' => "Error In submission"
                    ], 500);
                }

            }else{
                return response()->json([
                    'status' => "error",
                    'message' => "confirm password not matched!"
                ], 500);
            }
        }else{
            return response()->json([
                'status' => "error",
                'message' => "incorrect current password!"
            ], 500);
        }
    }
}
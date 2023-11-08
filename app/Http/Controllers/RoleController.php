<?php

namespace App\Http\Controllers;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Transformers\RoleTransformer;
use App\Models\User;
use App\Models\Permission;
use Spatie\Permission\Models\Role;
use \stdClass;




/**
 * Class RolesController
 * @package  App\Http\Controllers
 */


 /**
 * @OAS\SecurityScheme(
 *      securityScheme="bearer_token",
 *      type="http",
 *      scheme="bearer"
 * )
 */

class RoleController extends Controller
{
    
    use Helpers;

     public function index(){
        return view('role.create');
     }

     public function all(){
        return view('role.view');
     }

    public function get(){
        return Role::where('id','!=', 1)->get();
    }

    public function getwithpermissions(Request $request){

        
        $datalimit = '';

        if($request->page == "*"){
            $datalimit= 999999999;
        }else{
            $datalimit = 25;
        }

        if($request->search == "undefined" || $request->search == "null" || $request->search == "NULL" || $request->search == "true" || $request->search == "TRUE" || $request->search == "false" || $request->search == "FALSE"){
            return response()->json([
                'status' => "error",
                'message' => 'Search Value Can not be undefined, null and boolean!'
            ], 400);
        }

        if($request->page == "undefined" || $request->page == "null" || $request->page == "NULL" || $request->page == "true" || $request->page == "TRUE" || $request->page == "false" || $request->page == "FALSE"){
            return response()->json([
                'status' => "error",
                'message' => 'Page Value Can not be undefined, null and boolean!'
            ], 400);
        }


        
        $roles = Role::where([
            ['name', '!=', Null],
            [function ($query) use ($request) {
                if (($search = $request->search)) {
                    $query->orWhere('name', 'LIKE', '%' . $search . '%')
                        ->get();
                }
            }],
            ['id','!=', 1]
        ])->paginate($datalimit);

        $rolesWithPermissions = [];

        foreach($roles as $role){
            $permissions = $role->permissions()->pluck('name')->toArray();
            $rolesWithPermissions[] = [
                'role' => $role->name,
                'role_id' => $role->id,
                'permissions' => $permissions,
            ];
            
        }
    	return response()->json([
            'data' => $rolesWithPermissions,
            'pagination' => [
                'current_page' => $roles->currentPage(),
                'per_page' => $roles->perPage(),
                'total' => $roles->total(),
                'last_page' => $roles->lastPage(),
                'from' => $roles->firstItem(),
                'to' => $roles->lastItem(),
                'links' => [
                    'prev' => $roles->previousPageUrl(),
                    'next' => $roles->nextPageUrl(),
                    'all_pages' => $roles->getUrlRange(1, $roles->lastPage()),
                ],
            ],
        ]); 


    }

    public function getbyid(Request $request){
        if($request->id == 1){
            redirect('/role/all');
        }
        $rolesWithPermissions = [];

        $roles = Role::where('id', $request->id)->get();

        foreach ($roles as $role) {
            $permissions = $role->permissions()->pluck('name')->toArray();
            
            $rolesWithPermissions[] = [
                'role' => $role->name,
                'role_id' => $role->id,
                'permissions' => $permissions,
            ];
        }
        return response()->json($rolesWithPermissions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRolesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $rules = [
            'name' => [
                'required',
                'string',
                'min:5',
                'max:255',
                'unique:roles,name'
            ],
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            $messages = $validator->errors();
            $validationFormate = new stdClass();
            
            if ($messages->has('name')){
                $validationFormate->role_name = $messages->first('name');
            }

            $validationError[] = $validationFormate;

            return response()->json([
                'status' => "error",
                'message' => $validationError
            ], 400);
        }

        $role = Role::create([
            'name'=> $request->name,
            'guard_name' => "api"
        ]);

        $role->givePermissionTo($request->permission);

        if($role){
            return response()->json([
                'status' => "success",
                'message' => "Role Created Successfully"
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
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rolesWithPermissions = [];

        if(!$roles = Role::where('id',$id)->get()){
            throw new NotFoundHttpException('Roles Not Found!');
        } 

        foreach ($roles as $role) {
            $permissions = $role->permissions()->pluck('name')->toArray();
            
            $rolesWithPermissions[] = [
                'role' => $role->name,
                'role_id' => $role->id,
                'permissions' => $permissions,
            ];
        }
        return response()->json($rolesWithPermissions);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRolesRequest  $request
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rules = [
            'name' => [
                'required',
                'string',
                'min:5',
                'max:255',
            ],
            
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            $messages = $validator->errors();
            $validationFormate = new stdClass();
            
            if ($messages->has('name')){
                $validationFormate->role_name = $messages->first('name');
            }

            $validationError[] = $validationFormate;

            return response()->json([
                'status' => "error",
                'message' => $validationError
            ], 400);
        }

   
        

        $role = Role::find($request->id);    
        $role->name = is_null($request->name) ? $role->name : $request->name;
        $role->save();

        $role->syncPermissions($request->permission);

        if($role){
            return response()->json([
                'status' => "success",
                'message' => "Role Updated Successfully"
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
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request){
        
        $roles = Role::find($request->id);
       
        if($roles->users()->count() > 0){
            return response()->json([
                'status'=> "error",
                'message' => "Role Is assigned to users, Please unassigned this role first!"
            ], 500);
        }
        
        if (is_null($roles)) {
            throw new NotFoundHttpException('Invalid Role Id!');
        }else{
            $deleteRole = $roles->delete();
            if($deleteRole){
                return response()->json([
                    'status'=> "success",
                    'message' => "Role Deleted Successfully"
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
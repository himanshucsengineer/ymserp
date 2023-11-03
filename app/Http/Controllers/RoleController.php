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

    /**
     * @OA\Get(
     *  path="/roles/get",
     *  operationId="indexRoles",
     *  tags={"Roles"},
     *  summary="Get list of Roles",
     *  description="Returns list of Roles",
     *  security={{"bearer_token":{}}},
     *  @OA\Response(response=200, description="Successful operation"
     *  ),
     * )
     *
     * Display a listing of Book.
     * @return JsonResponse
     */

    // public function index(Request $request){

    //     $datalimit = '';

    //     if($request->page == "*"){
    //         $datalimit= 999999999;
    //     }else{
    //         $datalimit = 10;
    //     }

    //     if($request->search == "undefined" || $request->search == "null" || $request->search == "NULL" || $request->search == "true" || $request->search == "TRUE" || $request->search == "false" || $request->search == "FALSE"){
    //         return response()->json([
    //             'status' => "error",
    //             'message' => 'Search Value Can not be undefined, null and boolean!'
    //         ], 400);
    //     }

    //     if($request->page == "undefined" || $request->page == "null" || $request->page == "NULL" || $request->page == "true" || $request->page == "TRUE" || $request->page == "false" || $request->page == "FALSE"){
    //         return response()->json([
    //             'status' => "error",
    //             'message' => 'Page Value Can not be undefined, null and boolean!'
    //         ], 400);
    //     }

    //     $rolesWithPermissions = Role::with('permissions')->where([
    //         ['name', '!=', Null],
    //         [function ($query) use ($request) {
    //             if (($search = $request->search)) {
    //                 $query->orWhere('name', 'LIKE', '%' . $search . '%')
    //                     ->get();
    //             }
    //         }]
    //     ])->paginate($datalimit); // You can adjust the number of items per page as needed
        
    //     if(!$rolesWithPermissions){
    //         throw new NotFoundHttpException('Roles Not Found!');
    //     } 

    //     $formattedRoles = [];

    //     foreach ($rolesWithPermissions as $role) {
    //         $permissions = $role->permissions->pluck('name')->toArray();
    //         $formattedRoles[] = [
    //             'role' => $role->name,
    //             'role_id' => $role->id,
    //             'permissions' => $permissions,
    //         ];
    //     }

    //     return response()->json([
    //         'data' => $formattedRoles,
    //         'pagination' => [
    //             'current_page' => $rolesWithPermissions->currentPage(),
    //             'per_page' => $rolesWithPermissions->perPage(),
    //             'total' => $rolesWithPermissions->total(),
    //             'last_page' => $rolesWithPermissions->lastPage(),
    //             'from' => $rolesWithPermissions->firstItem(),
    //             'to' => $rolesWithPermissions->lastItem(),
    //             'links' => [
    //                 'prev' => $rolesWithPermissions->previousPageUrl(),
    //                 'next' => $rolesWithPermissions->nextPageUrl(),
    //                 'all_pages' => $rolesWithPermissions->getUrlRange(1, $rolesWithPermissions->lastPage()),
    //             ],
    //         ],
    //     ]);
    // }


    public function get(){
        return Role::where('id','!=', 1)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRolesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $rules = [
            'role_name' => [
                'required',
                'string',
                'min:5',
                'max:255',
                'unique:roles,name'
            ],
            'permissions' => [
                'required'
            ]
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            $messages = $validator->errors();
            $validationFormate = new stdClass();
            
            if ($messages->has('role_name')){
                $validationFormate->role_name = $messages->first('role_name');
            }

            if ($messages->has('permissions')){
                $validationFormate->permissions = $messages->first('permissions');
            }

            $validationError[] = $validationFormate;

            return response()->json([
                'status' => "error",
                'message' => $validationError
            ], 400);
        }

        $role = Role::create([
            'name'=> $request->role_name,
            'guard_name' => "api"
        ]);

        $role->givePermissionTo($request->permissions);

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
    public function update(Request $request, $id)
    {
        $rules = [
            'role_name' => [
                // 'required',
                'string',
                'min:5',
                'max:255',
                'unique:roles,name'
            ],
            'permissions' => [
                'required'
            ]
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            $messages = $validator->errors();
            $validationFormate = new stdClass();
            
            if ($messages->has('role_name')){
                $validationFormate->role_name = $messages->first('role_name');
            }

            if ($messages->has('permissions')){
                $validationFormate->permissions = $messages->first('permissions');
            }

            $validationError[] = $validationFormate;

            return response()->json([
                'status' => "error",
                'message' => $validationError
            ], 400);
        }

   
        

        $role = Role::find($id);    
        $role->name = is_null($request->role_name) ? $role->name : $request->role_name;
        $role->save();

        $role->syncPermissions($request->permissions);

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
    public function destroy($id){
        
        $roles = Role::find($id);
       
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
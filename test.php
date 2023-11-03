<?php

namespace App\Http\Controllers;

use App\Models\WorkshopManagement;
use App\Models\EntityManagement;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use \stdClass;
use Illuminate\Support\Str;

class WorkshopManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use Helpers;
         /**
     * @OA\GET(
     *     path="/api/workshop/get",
     *     tags={"Workshop"},
     * security={{ "bearerAuth": {} }},
     *     summary="List users with customization",
     *     @OA\Response(response="200", description="workshop show successful"),
     *     @OA\Response(response="401", description="Invalid credentials")
     * )
     */
    public function index(Request $request)
    {
        $datalimit = '';

        if($request->page == "*"){
            $datalimit= 999999999;
        }else{
            $datalimit = 10;
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


        if($request->entity){
            $entityId= $request->entity;
            $getWorkshops = WorkshopManagement::where('entity_id', $entityId)->paginate($datalimit);

        }else{
            $getWorkshops = WorkshopManagement::where([
                ['name', '!=', Null],
                [function ($query) use ($request) {
                    if (($search = $request->search)) {
                        $query->orWhere('name', 'LIKE', '%' . $search . '%')
                            ->get();
                    }
                }]
            ])->paginate($datalimit);
        }

        $formattedWorkshop = [];

        foreach($getWorkshops as $workshop){

            $file_path = url('/') . "/uploads/workshop/" . $workshop->file;
            $pid = url('/') . "/uploads/workshop/" . $workshop->pid;

            $entityDetails = EntityManagement::where('id',$workshop->entity_id)->first();
      
            $formattedWorkshop[] = [
                'id'=> (int) $workshop->id,
                'name' => $workshop->name,
                'entity' =>$entityDetails,
                'file' =>  $file_path,
                'pid' =>  $pid,
                'coordinates' => json_decode($workshop->coordinates)
            ];
        }

    	return response()->json([
            'data' => $formattedWorkshop,
            'pagination' => [
                'current_page' => $getWorkshops->currentPage(),
                'per_page' => $getWorkshops->perPage(),
                'total' => $getWorkshops->total(),
                'last_page' => $getWorkshops->lastPage(),
                'from' => $getWorkshops->firstItem(),
                'to' => $getWorkshops->lastItem(),
                'links' => [
                    'prev' => $getWorkshops->previousPageUrl(),
                    'next' => $getWorkshops->nextPageUrl(),
                    'all_pages' => $getWorkshops->getUrlRange(1, $getWorkshops->lastPage()),
                ],
            ],
        ]);     
    }

    /**
     * Store a newly created resource in storage.
     */

        /**
 * @OA\Post(
 *     path="/api/workshop/create",
 *     summary="Create a new workshop",
 *     tags={"Workshop"},
 * security={{ "bearerAuth": {} }},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="multipart/form-data",
 *             @OA\Schema(
 *             @OA\Property(property="name", type="string", example="workshop Name"),
 *             @OA\Property(property="file", type="string", format="binary", example="file content here"),
 *             @OA\Property(property="entity_id", type="integer", example="1"),
 *         ),
 *     ), 
 *     ),
 *     @OA\Response(response="200", description="Workshop Created Successfully"),
 *     @OA\Response(response="400", description="Validation Error"),
 *     @OA\Response(response="500", description="Server Error")
 * )
 */
    public function store(Request $request)
    {
        $rules=[
            'name'=>[
                'required',
                'string',
                'min:3',
                'max:30'
            ],

            'coordinates' => [
                'required',
            ],

            'entity_id'=>[
                'required',
            ]
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            $messages = $validator->errors();
            
            $validationFormate = new stdClass();
            
            if ($messages->has('name')){
                $validationFormate->name = $messages->first('name');
            }

          
            if ($messages->has('coordinates')){
                $validationFormate->coordinates = $messages->first('coordinates');
            }
            if ($messages->has('entity_id')){
                $validationFormate->entity_id = $messages->first('entity_id');
            }

            $validationError[] = $validationFormate;

            return response()->json([
                'status' => "error",
                'message' => $validationError
            ], 400);
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/workshop'), $fileName);
        }else{
            $fileName = '';
        }

        if ($request->hasFile('pid')) {
            $pidfile = $request->file('pid');
            $pidfileName = time() . '_' . $pidfile->getClientOriginalName();
            $pidfile->move(public_path('uploads/workshop'), $pidfileName);
        }else{
            $pidfileName = '';
        }

        $createWorkshop = WorkshopManagement::create([
            'name'=> $request->name,
            'file' =>  $fileName,
            'pid' => $pidfileName,
            'entity_id' => $request->entity_id,
            'coordinates' => json_encode($request->coordinates)
        ]);

        if($createWorkshop){
            return response()->json([
                'status' => "success",
                'message' => "Workshop Created Successfully"
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
     */

         /**
 * @OA\Get(
 *     path="/api/workshop/get/{id}",
 *     summary="Get workshop details by ID",
 *     tags={"Workshop"},
 * security={{ "bearerAuth": {} }},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="workshop ID",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *  
 *     @OA\Response(response="200", description="workshop details retrieved successfully"),
 *     @OA\Response(response="404", description="workshop not found"),
 * )
 */

    public function show($id)
    {
        $getWorkshop = WorkshopManagement::find($id);

        if (is_null($getWorkshop)) {
            throw new NotFoundHttpException('Workshop Not Found!');
        }else{

            $file_path = url('/') . "/uploads/workshop/" . $getWorkshop->file;
            $pid = url('/') . "/uploads/workshop/" . $getWorkshop->pid;


            $entityDetails = EntityManagement::where('id',$getWorkshop->entity_id)->first();
            return response()->json([
                'id'=> (int) $getWorkshop->id,
                'name' => $getWorkshop->name,
                'file' => $file_path,
                'pid' => $pid,
                'entity' => $entityDetails,
                'coordinates' => json_decode($getWorkshop->coordinates)
            ], 200);
        }
    }

    /**
     * Update the specified resource in storage.
     */

          /**
 * @OA\Put(
 *     path="/api/workshop/update/{id}",
 *     summary="Update workshop details by ID",
 *     tags={"Workshop"},
 * security={{ "bearerAuth": {} }},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="workshop ID",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             @OA\Property(property="name", type="string", example="New workshop")
 *         )
 *     ),
 *     @OA\Response(response="200", description="Workshop updated successfully"),
 *     @OA\Response(response="400", description="Validation Error"),
 *     @OA\Response(response="500", description="Error in submission")
 * )
 */
    public function update(Request $request,  $id)
    {
        $rules=[
            'name'=>[
                'string',
                'min:3',
                'max:30'
            ],
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            $messages = $validator->errors();
            
            $validationFormate = new stdClass();
            
            if ($messages->has('name')){
                $validationFormate->name = $messages->first('name');
            }

            $validationError[] = $validationFormate;

            return response()->json([
                'status' => "error",
                'message' => $validationError
            ], 400);
        }

        $workshopDetails = WorkshopManagement::find($id);


        if ($request->hasFile('file')) {

            $filePath = public_path('uploads/workshop/'.$workshopDetails->file);
            if (file_exists($filePath)) {
                unlink($filePath);
            }

            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/workshop'), $workshopDetails);
        }else{
            $fileName =  $workshopDetails->file;
        }

        $workshopDetails->name = is_null($request->name) ? $workshopDetails->name : $request->name;
        $workshopDetails->file = $fileName;
        $workshopDetails->entity_id = is_null($request->entity_id) ? $workshopDetails->entity_id : $request->entity_id;
        $workshopDetails->coordinates = is_null($request->coordinates) ? $workshopDetails->coordinates : json_encode($request->coordinates);
        $updateWorkshop  = $workshopDetails->save();

        if($updateWorkshop){
            return response()->json([
                'status' => "success",
                'message' => "Workshop Updated Successfully"
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
     */

/**
 * @OA\Delete(
 *     path="/api/workshop/delete/{id}",
 *     summary="Delete workshop ID",
 *     tags={"Workshop"},
 * security={{ "bearerAuth": {} }},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="workshop ID",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(response="200", description="workshop Deleted Successfully"),
 *     @OA\Response(response="500", description="Error in submission")
 * )
 */

    public function destroy($id)
    {
        $workshop = WorkshopManagement::find($id);
        
        if (is_null($workshop)) {
            throw new NotFoundHttpException('Invalid Workshop Id!');
        }else{
            $filePath = public_path('uploads/workshop/'.$workshop->file);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $deleteWorkshop = $workshop->delete();
            if($deleteWorkshop){
                return response()->json([
                    'status'=> "success",
                    'message' => "Workshop Deleted Successfully"
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

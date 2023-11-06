<?php

namespace App\Http\Controllers;

use App\Models\MasterCategory;
use App\Models\User;

use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\Validator;
use \stdClass;

class MasterCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use Helpers;
    public function index()
    {
        return view('category.create');
    }

    public function all()
    {
        return view('category.view');
    }
 

    public function get(Request $request)
    {
        if($request->user_id == 1){
            return MasterCategory::get();
        }else{
            return MasterCategory::where('depo_id',$request->depo_id)->get();
        }
    }
    public function getbyid(Request $request)
    {
        return MasterCategory::where('id',$request->id)->first();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMasterCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'name'=>[
                'required',
                'unique:master_categories,name'
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


        $contractor = MasterCategory::create([
            'name'=> $request->name,
            'createdby' => $request->user_id,
            'depo_id' => $request->depo_id
        ]);


        if($contractor){
            return response()->json([
                'status' => "success",
                'message' => "Category Added Successfully"
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
     * @param  \App\Models\MasterCategory  $masterCategory
     * @return \Illuminate\Http\Response
     */
    public function show(MasterCategory $masterCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMasterCategoryRequest  $request
     * @param  \App\Models\MasterCategory  $masterCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $rules=[
            'name'=>[
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

            $validationError[] = $validationFormate;

            return response()->json([
                'status' => "error",
                'message' => $validationError
            ], 400);
        }

        $getContractor = MasterCategory::where('id',$request->id)->first();
        
        $contractorDetails = MasterCategory::find($request->id);

        if($getContractor->name != $request->name){
            $contractorDetails->name = is_null($request->name) ? $contractorDetails->name : $request->name;
        }
        $contractorDetails->updatedby = $request->user_id;
        $contractorDetails->updated_at = date('Y-m-d H:i:s');;

        $contractorDetails  = $contractorDetails->save();

        if($contractorDetails){
            return response()->json([
                'status' => "success",
                'message' => "Category Updated Successfully"
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
     * @param  \App\Models\MasterCategory  $masterCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $geteEmployee = User::orWhere('category_id', 'LIKE', '%' . $request->id . '%')->get();

        if(count($geteEmployee) > 0){
            return response()->json([
                'status'=> "error",
                'message' => "Category is assigned to user can not delete"
            ], 500);
        }
        $contractor = MasterCategory::find($request->id);

        
        if (is_null($contractor)) {
            throw new NotFoundHttpException('Invalid Workshop Id!');
        }else{
            
            $deletecontractor= $contractor->delete();
            if($deletecontractor){
                return response()->json([
                    'status'=> "success",
                    'message' => "Category Deleted Successfully"
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

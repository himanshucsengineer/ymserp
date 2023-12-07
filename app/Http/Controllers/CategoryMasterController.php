<?php

namespace App\Http\Controllers;

use App\Models\CategoryMaster;
use App\Http\Requests\StoreCategoryMasterRequest;
use App\Http\Requests\UpdateCategoryMasterRequest;

use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\Validator;
use \stdClass;

class CategoryMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product_category.create');
    }

    public function all()
    {
        return view('product_category.view');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryMasterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('category_img')) {
            $category_img = $request->file('category_img');
            $category_img_name = time() . '_' . $category_img->getClientOriginalName();
            $category_img->move(public_path('uploads/category'), $category_img_name);
        }else{
            $category_img_name = '';
        }

        $createCategory = CategoryMaster::create([
            'name'=> $request->name,
            'desc'=> $request->desc,
            'image' => $category_img_name
        ]);

        if($createCategory){
            return response()->json([
                'status' => "success",
                'message' => "Category Added Successfully"
            ], 201);
        }else{
            return response()->json([
                'status' => "error",
                'message' => "Error in submission!"
            ], 406);
        }
    }

    public function getCategoryData(Request $request){
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
            ], 406);
        }

        if($request->page == "undefined" || $request->page == "null" || $request->page == "NULL" || $request->page == "true" || $request->page == "TRUE" || $request->page == "false" || $request->page == "FALSE"){
            return response()->json([
                'status' => "error",
                'message' => 'Page Value Can not be undefined, null and boolean!'
            ], 406);
        }

        $categoryData = CategoryMaster::where([
            [function ($query) use ($request) {
                if (($search = $request->search)) {
                    $query->orWhere('name', 'LIKE', '%' . $search . '%')
                        ->get();
                }
            }],
        ])->orderby('created_at','desc')->paginate($datalimit);
        
        $formetedData = [];

        foreach($categoryData as $category){
            $formetedData[] = [
                'name' => $category->name,
                'desc' => $category->desc,
                'image' => $category->image,
                'id' => $category->id,
            ];
            
        } 
    	return response()->json([
            'data' => $formetedData,
            'pagination' => [
                'current_page' => $categoryData->currentPage(),
                'per_page' => $categoryData->perPage(),
                'total' => $categoryData->total(),
                'last_page' => $categoryData->lastPage(),
                'from' => $categoryData->firstItem(),
                'to' => $categoryData->lastItem(),
                'links' => [
                    'prev' => $categoryData->previousPageUrl(),
                    'next' => $categoryData->nextPageUrl(),
                    'all_pages' => $categoryData->getUrlRange(1, $categoryData->lastPage()),
                ],
            ],
        ]); 
    }

    public function getbyid(Request $request){
        return CategoryMaster::where('id',$request->id)->first();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryMaster  $categoryMaster
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryMaster $categoryMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryMasterRequest  $request
     * @param  \App\Models\CategoryMaster  $categoryMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if($request->id == ''){
            return response()->json([
                'status' => "error",
                'message' => "ID is required"
            ], 406);
        }
        
        $categoryDetails = CategoryMaster::find($request->id);

        if ($request->hasFile('category_img')) {
            $category_img = $request->file('category_img');
            $category_img_name = time() . '_' . $category_img->getClientOriginalName();
            $category_img->move(public_path('uploads/category'), $category_img_name);
        }else{
            $category_img_name = $categoryDetails->image;
        }

        $categoryDetails->name = is_null($request->name) ? $categoryDetails->name : $request->name;
        $categoryDetails->desc = is_null($request->desc) ? $categoryDetails->desc : $request->desc;
        $categoryDetails->image = $category_img_name;
        $categoryDetails  = $categoryDetails->save();

        if($categoryDetails){
            return response()->json([
                'status' => "success",
                'message' => "Category Updated Successfully"
            ], 200);
        }else{
            return response()->json([
                'status' => "error",
                'message' => "Error in submission!"
            ], 406);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryMaster  $categoryMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $category = CategoryMaster::find($request->id);

        $deleteCategory= $category->delete();

        if($deleteCategory){
            return response()->json([
                'status'=> "success",
                'message' => "Category Deleted Successfully"
            ], 200);
        }else{
            return response()->json([
                'status'=> "error",
                'message' => "Error In Deletion"
            ], 406);
        }
    }
}

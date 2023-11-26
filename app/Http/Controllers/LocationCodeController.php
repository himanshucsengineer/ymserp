<?php

namespace App\Http\Controllers;

use App\Models\LocationCode;
use App\Http\Requests\StoreLocationCodeRequest;
use App\Http\Requests\UpdateLocationCodeRequest;

use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\Validator;
use \stdClass;

class LocationCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use Helpers;

    public function index()
    {
        return view('location.create');
    }

    public function view()
    {
        return view('location.view');
    }
 

    public function get(Request $request)
    {
        if($request->user_id == 1){
            return LocationCode::get();
        }else{
            return LocationCode::where('depo_id',$request->depo_id)->get();
        }
    }

    public function getbyid(Request $request){
        return LocationCode::where('id',$request->id)->first();
    }

    public function getLocationData(Request $request){
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

        if($request->user_id == 1){

            $locationData = LocationCode::where([
                [function ($query) use ($request) {
                    if (($search = $request->search)) {
                        $query->orWhere('code', 'LIKE', '%' . $search . '%')
                            ->get();
                    }
                }],
            ])->orderby('created_at','desc')->paginate($datalimit);
        }else{

            $locationData = LocationCode::where([
                [function ($query) use ($request) {
                    if (($search = $request->search)) {
                        $query->orWhere('code', 'LIKE', '%' . $search . '%')
                            ->get();
                    }
                }],
                ['depo_id',$request->depo_id],
            ])->orderby('created_at','desc')->paginate($datalimit);
        }
        
        $formetedData = [];

        foreach($locationData as $location){
            $formetedData[] = [
                'code' => $location->code,
                'desc' => $location->desc,
                'id' => $location->id,
            ];
            
        } 
    	return response()->json([
            'data' => $formetedData,
            'pagination' => [
                'current_page' => $locationData->currentPage(),
                'per_page' => $locationData->perPage(),
                'total' => $locationData->total(),
                'last_page' => $locationData->lastPage(),
                'from' => $locationData->firstItem(),
                'to' => $locationData->lastItem(),
                'links' => [
                    'prev' => $locationData->previousPageUrl(),
                    'next' => $locationData->nextPageUrl(),
                    'all_pages' => $locationData->getUrlRange(1, $locationData->lastPage()),
                ],
            ],
        ]); 
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLocationCodeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'code'=>[
                'required',
                'unique:location_codes,code'
            ]
        ];

        
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            $messages = $validator->errors();
            $validationFormate = new stdClass();
            
            if ($messages->has('code')){
                $validationFormate->code = $messages->first('code');
            }

            $validationError[] = $validationFormate;

            return response()->json([
                'status' => "error",
                'message' => $validationError
            ], 400);
        }

        
        $createLocation = LocationCode::create([
            'code'=> $request->code,
            'desc'=> $request->desc,
            'createdby' => $request->user_id,
            'depo_id' => $request->depo_id
        ]);


        if($createLocation){
            return response()->json([
                'status' => "success",
                'message' => "Location Added Successfully"
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
     * @param  \App\Models\LocationCode  $locationCode
     * @return \Illuminate\Http\Response
     */
    public function show(LocationCode $locationCode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLocationCodeRequest  $request
     * @param  \App\Models\LocationCode  $locationCode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rules=[
            'code'=>[
                'required',
            ]
        ];

        
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            $messages = $validator->errors();
            $validationFormate = new stdClass();
            
            if ($messages->has('code')){
                $validationFormate->code = $messages->first('code');
            }

            $validationError[] = $validationFormate;

            return response()->json([
                'status' => "error",
                'message' => $validationError
            ], 400);
        }


        $getContractor = LocationCode::where('id',$request->id)->first();
        
        $contractorDetails = LocationCode::find($request->id);

        if($getContractor->code != $request->code ){

            $code = LocationCode::where('code',$request->code)->get();
            if(count($code) > 0){
                return response()->json([
                    'status' => "error",
                    'message' => "Location Code is already Taken"
                ], 500);
            }
            $contractorDetails->code = is_null($request->code) ? $contractorDetails->code : $request->code;
        }

        $contractorDetails->desc =  is_null($request->desc) ? $contractorDetails->desc : $request->desc;
        $contractorDetails->updatedby = $request->user_id;
        $contractorDetails->updated_at = date('Y-m-d H:i:s');

        $contractorDetails  = $contractorDetails->save();

        if($contractorDetails){
            return response()->json([
                'status' => "success",
                'message' => "Location Code Updated Successfully"
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
     * @param  \App\Models\LocationCode  $locationCode
     * @return \Illuminate\Http\Response
     */
    public function destroy(LocationCode $locationCode)
    {
        //
    }
}

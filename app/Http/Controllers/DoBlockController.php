<?php

namespace App\Http\Controllers;

use App\Models\DoBlock;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\Validator;
use \stdClass;

class DoBlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use Helpers;
    public function index()
    {
        return view('doblock.create');
    }

    public function all()
    {
        return view('doblock.view');
    }

    public function get(Request $request)
    {
        if($request->user_id == 1){
            return DoBlock::get();
        }else{
            return DoBlock::where('depo_id',$request->depo_id)->get();
        }
    }

    public function getbyid(Request $request){
        return DoBlock::where('id',$request->id)->first();
    }

    public function getDoBlockData(Request $request){
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

            $doData = DoBlock::where([
                [function ($query) use ($request) {
                    if (($search = $request->search)) {
                        $query->orWhere('do_no', 'LIKE', '%' . $search . '%')
                            ->orWhere('status', 'LIKE', '%' . $search . '%')
                            ->get();
                    }
                }],
            ])->orderby('created_at','desc')->paginate($datalimit);
        }else{

            $doData = DoBlock::where([
                [function ($query) use ($request) {
                    if (($search = $request->search)) {
                        $query->orWhere('do_no', 'LIKE', '%' . $search . '%')
                            ->orWhere('status', 'LIKE', '%' . $search . '%')
                            ->get();
                    }
                }],
                ['depo_id',$request->depo_id],
            ])->orderby('created_at','desc')->paginate($datalimit);
        }
        
        $formetedData = [];

        foreach($doData as $do){
            $formetedData[] = [
                'do_no' => $do->do_no,
                'status' => $do->status,
                'id' => $do->id,
            ];
            
        } 
    	return response()->json([
            'data' => $formetedData,
            'pagination' => [
                'current_page' => $doData->currentPage(),
                'per_page' => $doData->perPage(),
                'total' => $doData->total(),
                'last_page' => $doData->lastPage(),
                'from' => $doData->firstItem(),
                'to' => $doData->lastItem(),
                'links' => [
                    'prev' => $doData->previousPageUrl(),
                    'next' => $doData->nextPageUrl(),
                    'all_pages' => $doData->getUrlRange(1, $doData->lastPage()),
                ],
            ],
        ]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDoBlockRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'do_no'=>[
                'required',
                'unique:do_blocks,do_no'
            ],
            'status' => [
                'required'
            ]
        ];

        
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            $messages = $validator->errors();
            $validationFormate = new stdClass();
            
            if ($messages->has('do_no')){
                $validationFormate->do_no = $messages->first('do_no');
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

        
        $createDo = DoBlock::create([
            'do_no'=> $request->do_no,
            'status'=> $request->status,
            'createdby' => $request->user_id,
            'depo_id' => $request->depo_id
        ]);


        if($createDo){
            return response()->json([
                'status' => "success",
                'message' => "DO Registered Successfully"
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
     * @param  \App\Models\DoBlock  $doBlock
     * @return \Illuminate\Http\Response
     */
    public function show(DoBlock $doBlock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDoBlockRequest  $request
     * @param  \App\Models\DoBlock  $doBlock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rules=[
            'do_no'=>[
                'required',
            ],
            'status' => [
                'required'
            ]
        ];

        
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            $messages = $validator->errors();
            $validationFormate = new stdClass();
            
            if ($messages->has('do_no')){
                $validationFormate->do_no = $messages->first('do_no');
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


        $getContractor = DoBlock::where('id',$request->id)->first();
        
        $contractorDetails = DoBlock::find($request->id);

        if($getContractor->do_no != $request->do_no ){

            $do_no = DoBlock::where('code',$request->do_no)->get();
            if(count($do_no) > 0){
                return response()->json([
                    'status' => "error",
                    'message' => "DO No. is already Taken"
                ], 500);
            }
            $contractorDetails->do_no = is_null($request->do_no) ? $contractorDetails->do_no : $request->do_no;
        }

        $contractorDetails->status =  is_null($request->status) ? $contractorDetails->status : $request->status;
        $contractorDetails->updatedby = $request->user_id;
        $contractorDetails->updated_at = date('Y-m-d H:i:s');

        $contractorDetails  = $contractorDetails->save();

        if($contractorDetails){
            return response()->json([
                'status' => "success",
                'message' => "Do Updated Successfully"
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
     * @param  \App\Models\DoBlock  $doBlock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $contractor = DoBlock::find($request->id);

        
        if (is_null($contractor)) {
            throw new NotFoundHttpException('Invalid DO!');
        }else{
            
            $deletecontractor= $contractor->delete();
            if($deletecontractor){
                return response()->json([
                    'status'=> "success",
                    'message' => "DO No. Deleted Successfully"
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

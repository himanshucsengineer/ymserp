<?php

namespace App\Http\Controllers;

use App\Models\MasterLine;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\Validator;
use \stdClass;

class MasterLineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use Helpers;
    public function index()
    {
        return view('line.create');
    }

    public function all()
    {
        return view('line.view');
    }

    public function get(Request $request)
    {
        if($request->user_id == 1){
            return MasterLine::get();
        }else{
            return MasterLine::where('depo_id',$request->depo_id)->get();
        }
    }

    public function getall(){
        return MasterLine::get();
    }

    public function getbyid(Request $request)
    {
        return MasterLine::where('id',$request->id)->first();
    }

    public function getLineData(Request $request){
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
            $lineData = MasterLine::where([
                [function ($query) use ($request) {
                    if (($search = $request->search)) {
                        $query->orWhere('name', 'LIKE', '%' . $search . '%')
                            ->orWhere('alise', 'LIKE', '%' . $search . '%')
                            ->orWhere('free_days', 'LIKE', '%' . $search . '%')
                            ->orWhere('labour_rate', 'LIKE', '%' . $search . '%')
                            ->orWhere('line_address', 'LIKE', '%' . $search . '%')
                            ->orWhere('email', 'LIKE', '%' . $search . '%')
                            ->orWhere('phone', 'LIKE', '%' . $search . '%')
                            ->orWhere('mobile', 'LIKE', '%' . $search . '%')
                            ->orWhere('gst', 'LIKE', '%' . $search . '%')
                            ->orWhere('pan', 'LIKE', '%' . $search . '%')
                            ->orWhere('gst_state', 'LIKE', '%' . $search . '%')
                            ->orWhere('state_code', 'LIKE', '%' . $search . '%')
                            ->orWhere('containerSize', 'LIKE', '%' . $search . '%')
                            ->orWhere('containerType', 'LIKE', '%' . $search . '%')
                            ->orWhere('line_budget', 'LIKE', '%' . $search . '%')
                            ->orWhere('parking_charges', 'LIKE', '%' . $search . '%')
                            ->orWhere('washing_charges', 'LIKE', '%' . $search . '%')
                            ->orWhere('lolo_charges', 'LIKE', '%' . $search . '%')
                            ->orWhere('tracking_device', 'LIKE', '%' . $search . '%')
                            ->get();
                    }
                }],
            ])->orderby('created_at','desc')->paginate($datalimit);
        }else{
            $lineData = MasterLine::where([
                [function ($query) use ($request) {
                    if (($search = $request->search)) {
                        $query->orWhere('name', 'LIKE', '%' . $search . '%')
                            ->orWhere('alise', 'LIKE', '%' . $search . '%')
                            ->orWhere('free_days', 'LIKE', '%' . $search . '%')
                            ->orWhere('labour_rate', 'LIKE', '%' . $search . '%')
                            ->orWhere('line_address', 'LIKE', '%' . $search . '%')
                            ->orWhere('email', 'LIKE', '%' . $search . '%')
                            ->orWhere('phone', 'LIKE', '%' . $search . '%')
                            ->orWhere('mobile', 'LIKE', '%' . $search . '%')
                            ->orWhere('gst', 'LIKE', '%' . $search . '%')
                            ->orWhere('pan', 'LIKE', '%' . $search . '%')
                            ->orWhere('gst_state', 'LIKE', '%' . $search . '%')
                            ->orWhere('state_code', 'LIKE', '%' . $search . '%')
                            ->orWhere('containerSize', 'LIKE', '%' . $search . '%')
                            ->orWhere('containerType', 'LIKE', '%' . $search . '%')
                            ->orWhere('line_budget', 'LIKE', '%' . $search . '%')
                            ->orWhere('parking_charges', 'LIKE', '%' . $search . '%')
                            ->orWhere('washing_charges', 'LIKE', '%' . $search . '%')
                            ->orWhere('lolo_charges', 'LIKE', '%' . $search . '%')
                            ->orWhere('tracking_device', 'LIKE', '%' . $search . '%')
                            ->get();
                    }
                }],
                ['depo_id',$request->depo_id],
            ])->orderby('created_at','desc')->paginate($datalimit);
        }
        
        $formetedData = [];

        foreach($lineData as $line){
            $formetedData[] = [
                'tracking_device' => $line->tracking_device,
                'interior_img' => $line->interior_img,
                'door_img' => $line->door_img,
                'front_img' => $line->front_img,
                'left_img' => $line->left_img,
                'right_img' => $line->right_img,
                'bottom_img' => $line->bottom_img,
                'top_img' => $line->top_img,
                'name' => $line->name,
                'alise' => $line->alise,
                'free_days' => $line->free_days,
                'labour_rate' => $line->labour_rate,
                'line_address' => $line->line_address,
                'email' => $line->email,
                'phone' => $line->phone,
                'mobile' => $line->mobile,
                'gst' => $line->gst,
                'pan' => $line->pan,
                'gst_state' => $line->gst_state,
                'state_code' => $line->state_code,
                'containerSize' => $line->containerSize,
                'containerType' => $line->containerType,
                'line_budget' => $line->line_budget,
                'parking_charges' => $line->parking_charges,
                'washing_charges' => $line->washing_charges,
                'lolo_charges' => $line->lolo_charges,
                'id' => $line->id,
            ];
            
        }
    	return response()->json([
            'data' => $formetedData,
            'pagination' => [
                'current_page' => $lineData->currentPage(),
                'per_page' => $lineData->perPage(),
                'total' => $lineData->total(),
                'last_page' => $lineData->lastPage(),
                'from' => $lineData->firstItem(),
                'to' => $lineData->lastItem(),
                'links' => [
                    'prev' => $lineData->previousPageUrl(),
                    'next' => $lineData->nextPageUrl(),
                    'all_pages' => $lineData->getUrlRange(1, $lineData->lastPage()),
                ],
            ],
        ]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMasterLineRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->hasFile('top_img')) {
            $topimgfile = $request->file('top_img');
            $topimgfileName = time() . '_' . $topimgfile->getClientOriginalName();
            $topimgfile->move(public_path('uploads/line'), $topimgfileName);
        }

        if ($request->hasFile('bottom_img')) {
            $bottomimgfile = $request->file('bottom_img');
            $bottomimgfileName = time() . '_' . $bottomimgfile->getClientOriginalName();
            $bottomimgfile->move(public_path('uploads/line'), $bottomimgfileName);
        }

        if ($request->hasFile('right_img')) {
            $rightimgfile = $request->file('right_img');
            $rightimgfileName = time() . '_' . $rightimgfile->getClientOriginalName();
            $rightimgfile->move(public_path('uploads/line'), $rightimgfileName);
        }

        if ($request->hasFile('left_img')) {
            $leftimgfile = $request->file('left_img');
            $leftimgfileName = time() . '_' . $leftimgfile->getClientOriginalName();
            $leftimgfile->move(public_path('uploads/line'), $leftimgfileName);
        }

        if ($request->hasFile('front_img')) {
            $frontimgfile = $request->file('front_img');
            $frontimgfileName = time() . '_' . $frontimgfile->getClientOriginalName();
            $frontimgfile->move(public_path('uploads/line'), $frontimgfileName);
        }

        if ($request->hasFile('door_img')) {
            $doorimgfile = $request->file('door_img');
            $doorimgfileName = time() . '_' . $doorimgfile->getClientOriginalName();
            $doorimgfile->move(public_path('uploads/line'), $doorimgfileName);
        }

        if ($request->hasFile('interior_img')) {
            $interiorimgfile = $request->file('interior_img');
            $interiorimgfileName = time() . '_' . $interiorimgfile->getClientOriginalName();
            $interiorimgfile->move(public_path('uploads/line'), $interiorimgfileName);
        }


        $createLine = MasterLine::create([
            'interior_img'=> $interiorimgfileName,
            'door_img'=> $doorimgfileName,
            'front_img'=> $frontimgfileName,
            'left_img'=> $leftimgfileName,
            'tracking_device' => $request->tracking_device,
            'right_img'=> $rightimgfileName,
            'bottom_img'=> $bottomimgfileName,
            'top_img'=> $topimgfileName,
            'name'=> $request->name,

            'alise'=> $request->alise,
            'free_days'=> $request->free_days,
            'labour_rate'=> $request->labour_rate,
            'line_address'=> $request->line_address,

            'email'=> $request->email,
            'phone'=> $request->phone,
            'mobile'=> $request->mobile,
            'gst'=> $request->gst,

            'pan'=> $request->pan,
            'gst_state' => $request->gst_state,
            'state_code' => $request->state_code,
            'createdby' => $request->user_id,
            'depo_id' => $request->depo_id,
            'containerSize' => $request->containerSize,
            'containerType' => $request->containerType,
            'line_budget' =>$request->line_budget
        ]);


        if($createLine){
            return response()->json([
                'status' => "success",
                'message' => "Line Added Successfully"
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
     * @param  \App\Models\MasterLine  $masterLine
     * @return \Illuminate\Http\Response
     */
    public function show(MasterLine $masterLine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMasterLineRequest  $request
     * @param  \App\Models\MasterLine  $masterLine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $lineDetails = MasterLine::find($request->id);

        if ($request->hasFile('top_img')) {
            $topimgfile = $request->file('top_img');
            $topimgfileName = time() . '_' . $topimgfile->getClientOriginalName();
            $topimgfile->move(public_path('uploads/line'), $topimgfileName);
        }else{
            $topimgfileName = $lineDetails->top_img;
        }

        if ($request->hasFile('bottom_img')) {
            $bottomimgfile = $request->file('bottom_img');
            $bottomimgfileName = time() . '_' . $bottomimgfile->getClientOriginalName();
            $bottomimgfile->move(public_path('uploads/line'), $bottomimgfileName);
        }else{
            $bottomimgfileName = $lineDetails->bottom_img;
        }

        if ($request->hasFile('right_img')) {
            $rightimgfile = $request->file('right_img');
            $rightimgfileName = time() . '_' . $rightimgfile->getClientOriginalName();
            $rightimgfile->move(public_path('uploads/line'), $rightimgfileName);
        }else{
            $rightimgfileName = $lineDetails->right_img;
        }

        if ($request->hasFile('left_img')) {
            $leftimgfile = $request->file('left_img');
            $leftimgfileName = time() . '_' . $leftimgfile->getClientOriginalName();
            $leftimgfile->move(public_path('uploads/line'), $leftimgfileName);
        }else{
            $leftimgfileName = $lineDetails->left_img;
        }

        if ($request->hasFile('front_img')) {
            $frontimgfile = $request->file('front_img');
            $frontimgfileName = time() . '_' . $frontimgfile->getClientOriginalName();
            $frontimgfile->move(public_path('uploads/line'), $frontimgfileName);
        }else{
            $frontimgfileName = $lineDetails->front_img;
        }

        if ($request->hasFile('door_img')) {
            $doorimgfile = $request->file('door_img');
            $doorimgfileName = time() . '_' . $doorimgfile->getClientOriginalName();
            $doorimgfile->move(public_path('uploads/line'), $doorimgfileName);
        }else{
            $doorimgfileName = $lineDetails->door_img;
        }

        if ($request->hasFile('interior_img')) {
            $interiorimgfile = $request->file('interior_img');
            $interiorimgfileName = time() . '_' . $interiorimgfile->getClientOriginalName();
            $interiorimgfile->move(public_path('uploads/line'), $interiorimgfileName);
        }else{
            $interiorimgfileName = $lineDetails->interior_img;
        }

        $lineDetails->name = is_null($request->name) ? $lineDetails->name : $request->name;
        $lineDetails->lolo_charges = is_null($request->lolo_charges) ? $lineDetails->lolo_charges : $request->lolo_charges;
        $lineDetails->washing_charges =  is_null($request->washing_charges) ? $lineDetails->washing_charges : $request->washing_charges;
        $lineDetails->parking_charges = is_null($request->parking_charges) ? $lineDetails->parking_charges : $request->parking_charges;
        $lineDetails->line_budget = is_null($request->line_budget) ? $lineDetails->line_budget : $request->line_budget;
        $lineDetails->containerSize = is_null($request->containerSize) ? $lineDetails->containerSize : $request->containerSize;
        $lineDetails->containerType = is_null($request->containerType) ? $lineDetails->containerType : $request->containerType;
        $lineDetails->alise = is_null($request->alise) ? $lineDetails->alise : $request->alise;
        $lineDetails->free_days = is_null($request->free_days) ? $lineDetails->free_days : $request->free_days;
        $lineDetails->labour_rate = is_null($request->labour_rate) ? $lineDetails->labour_rate : $request->labour_rate;
        $lineDetails->line_address = is_null($request->line_address) ? $lineDetails->line_address : $request->line_address;
        $lineDetails->email = is_null($request->email) ? $lineDetails->email : $request->email;
        $lineDetails->phone = is_null($request->phone) ? $lineDetails->phone : $request->phone;
        $lineDetails->mobile = is_null($request->mobile) ? $lineDetails->mobile : $request->mobile;
        $lineDetails->gst = is_null($request->gst) ? $lineDetails->gst : $request->gst;
        $lineDetails->tracking_device = is_null($request->tracking_device) ? $lineDetails->tracking_device : $request->tracking_device;
        $lineDetails->pan = is_null($request->pan) ? $lineDetails->pan : $request->pan;
        $lineDetails->gst_state = is_null($request->gst_state) ? $lineDetails->gst_state : $request->gst_state;
        $lineDetails->state_code = is_null($request->state_code) ? $lineDetails->state_code : $request->state_code;
        $lineDetails->top_img = $topimgfileName;
        $lineDetails->bottom_img = $bottomimgfileName;
        $lineDetails->right_img = $rightimgfileName;
        $lineDetails->left_img = $leftimgfileName;
        $lineDetails->front_img = $frontimgfileName;
        $lineDetails->door_img = $doorimgfileName;
        $lineDetails->interior_img = $interiorimgfileName;
        $lineDetails->updatedby = $request->user_id;
        $lineDetails->updated_at = date('Y-m-d H:i:s');
        $lineDetails  = $lineDetails->save();

        if($lineDetails){
            return response()->json([
                'status' => "success",
                'message' => "Line Updated Successfully"
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
     * @param  \App\Models\MasterLine  $masterLine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $line = MasterLine::find($id);
        
        if (is_null($line)) {
            throw new NotFoundHttpException('Invalid line Id!');
        }else{
            $top_img = public_path('uploads/line/'.$line->top_img);
            if (file_exists($top_img)) {
                unlink($top_img);
            }

            $bottom_img = public_path('uploads/line/'.$line->bottom_img);
            if (file_exists($bottom_img)) {
                unlink($bottom_img);
            }

            $right_img = public_path('uploads/line/'.$line->right_img);
            if (file_exists($right_img)) {
                unlink($right_img);
            }
            $left_img = public_path('uploads/line/'.$line->left_img);
            if (file_exists($left_img)) {
                unlink($left_img);
            }

            $front_img = public_path('uploads/line/'.$line->front_img);
            if (file_exists($front_img)) {
                unlink($front_img);
            }

            $door_img = public_path('uploads/line/'.$line->door_img);
            if (file_exists($door_img)) {
                unlink($door_img);
            }

            $interior_img = public_path('uploads/line/'.$line->interior_img);
            if (file_exists($interior_img)) {
                unlink($interior_img);
            }
            $deleteline = $line->delete();
            if($deleteline){
                return response()->json([
                    'status'=> "success",
                    'message' => "Line Deleted Successfully"
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

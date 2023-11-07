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

    public function getbyid(Request $request)
    {
        return MasterLine::where('id',$request->id)->first();
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
    public function update(UpdateMasterLineRequest $request, MasterLine $masterLine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterLine  $masterLine
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterLine $masterLine)
    {
        //
    }
}

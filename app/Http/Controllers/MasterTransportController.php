<?php

namespace App\Http\Controllers;

use App\Models\MasterTransport;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\Validator;
use \stdClass;
 

class MasterTransportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use Helpers;
    public function index()
    {
        return view('transport.create');
    }

    public function all()
    {
        return view('transport.view');
    }

    public function get(Request $request)
    {
        if($request->user_id == 1){
            return MasterTransport::get();
        }else{
            return MasterTransport::where('depo_id',$request->depo_id)->get();
        }
    } 

    public function getbyid(Request $request)
    {
        return MasterTransport::where('id',$request->id)->first();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMasterTransportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $createTransport = MasterTransport::create([
            'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'pincode' => $request->pincode,
            'gst' => $request->gst,
            'pan' => $request->pan,
            'gst_state' => $request->gst_state,
            'state_code' => $request->state_code,
            'is_transport' => $request->is_transport,
            'createdby' => $request->user_id,
            'depo_id' => $request->depo_id
        ]);


        if($createTransport){
            return response()->json([
                'status' => "success",
                'message' => "Transport Added Successfully"
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
     * @param  \App\Models\MasterTransport  $masterTransport
     * @return \Illuminate\Http\Response
     */
    public function show(MasterTransport $masterTransport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMasterTransportRequest  $request
     * @param  \App\Models\MasterTransport  $masterTransport
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMasterTransportRequest $request, MasterTransport $masterTransport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterTransport  $masterTransport
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterTransport $masterTransport)
    {
        //
    }
}

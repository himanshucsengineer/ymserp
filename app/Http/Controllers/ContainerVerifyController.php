<?php

namespace App\Http\Controllers;

use App\Models\ContainerVerify;
use App\Models\MasterTransport;
use App\Models\MasterLine;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\Validator;
use \stdClass;

class ContainerVerifyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use Helpers;
    public function index()
    {
        return view('surveyor.containershow');
    }

    public function masterserveyor()
    {
        return view('surveyor.master');
    }


    public function getbyid(Request $request){
        return ContainerVerify::where('gate_in_id', $request->gate_in_id)->orderBy('id','desc')->take(1)->first();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContainerVerifyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $verifyContainer = ContainerVerify::firstOrCreate([
            'status_name' => $request->status_name,
            'job_work_no' => $request->job_work_no,
            'gross_weight' => $request->gross_weight,
            'tare_weight' => $request->tare_weight,
            'vessel_name' => $request->vessel_name,
            'grade' => $request->grade,
            'sub_lease_unity' => $request->sub_lease_unity,
            'voyage' => $request->voyage,
            'consignee' => $request->consignee,
            'region' => $request->region,
            'destuffung' => $request->destuffung,
            'rftype' => $request->rftype,
            'empty_repositioning' => $request->empty_repositioning,
            'er_no' => $request->er_no,
            'remarks' => $request->remarks,
            'createdby' => $request->user_id,
            'depo_id' => $request->depo_id,
            'gate_in_id' => $request->gate_in_id
        ]);


        if($verifyContainer){
            return response()->json([
                'status' => "success",
                'message' => "Updated Successfully"
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
     * @param  \App\Models\ContainerVerify  $containerVerify
     * @return \Illuminate\Http\Response
     */
    public function show(ContainerVerify $containerVerify)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContainerVerifyRequest  $request
     * @param  \App\Models\ContainerVerify  $containerVerify
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContainerVerifyRequest $request, ContainerVerify $containerVerify)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContainerVerify  $containerVerify
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContainerVerify $containerVerify)
    {
        //
    }
}

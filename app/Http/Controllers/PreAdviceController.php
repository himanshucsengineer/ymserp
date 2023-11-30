<?php

namespace App\Http\Controllers;

use App\Models\PreAdvice;
use App\Http\Requests\StorePreAdviceRequest;
use App\Http\Requests\UpdatePreAdviceRequest;
use App\Models\GateIn;
use App\Models\DoContainer;

use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\Validator;
use \stdClass;

class PreAdviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use Helpers;
    public function index()
    {
        return view('preadvice.create');
    }

    public function view()
    {
        return view('preadvice.view');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePreAdviceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $rules=[
            'do_no'=>[
                'required',
                'unique:pre_advice,do_no'
            ],
        ];

        
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            $messages = $validator->errors();
            $validationFormate = new stdClass();
            
            if ($messages->has('do_no')){
                $validationFormate->do_no = $messages->first('do_no');
            }

            $validationError[] = $validationFormate;

            return response()->json([
                'status' => "error",
                'message' => $validationError
            ], 400);
        }

        $createPreadvice = PreAdvice::create([
            'date'=> $request->date,
            'time'=> $request->time,
            'line_id'=> $request->line_id,
            'do_no'=> $request->do_no,
            'validity_period'=> $request->validity_period,
            'validity_date'=> $request->validity_date,
            'shipper_name'=> $request->shipper_name,
            'pod'=> $request->pod,
            'vessel'=> $request->vessel,
            'voyage'=> $request->voyage,
            'do_date'=> $request->do_date,
            'container_size'=> $request->container_size,
            'container_type'=> $request->container_type,
            'sub_type'=> $request->sub_type,
            'container_qty'=> $request->container_qty,
            'remarks'=> $request->remarks,
            'in_cargo'=> $request->in_cargo,
            'temprature_setting'=> $request->temprature_setting,
            'humadity_setting'=> $request->humadity_setting,
            'ventilation_setting'=> $request->ventilation_setting,
            'traxen_unit'=> $request->traxen_unit,
            'createdby' => $request->user_id,
            'depo_id' => $request->depo_id
        ]);

        if($createPreadvice){
            $gateInData = GateIn::where([
                ['line_id',$request->line_id],
                ['container_size',$request->container_size],
                ['container_type',$request->container_type],
                ['sub_type',$request->sub_type],
                ['vessel_name',$request->vessel],
                ['voyage',$request->voyage],
                ['status','Ready'],
                ['grade',$request->grade]
            ])->orderby('created_at','asc')->get();

            foreach($gateInData as $gateIn){
                $createDoContainer = DoContainer::create([
                    'line_id'=> $gateIn->line_id,
                    'container_no'=> $gateIn->container_no,
                    'container_size'=> $gateIn->container_size,
                    'container_type'=> $gateIn->container_type,
                    'sub_type'=> $gateIn->sub_type,
                    'vessel_name'=> $gateIn->vessel_name,
                    'voyage'=> $gateIn->voyage,
                    'status'=> $gateIn->status,
                    'do_no'=> $request->do_no,
                    'grade' => $gateIn->grade,
                    'createdby' => $request->user_id,
                    'depo_id' => $request->depo_id
                ]);
            }
            return response()->json([
                'status' => "success",
                'message' => "Added Successfully"
            ], 200);
        }else{
            return response()->json([
                'status' => "error",
                'message' => "Error in submission!"
            ], 406);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PreAdvice  $preAdvice
     * @return \Illuminate\Http\Response
     */
    public function show(PreAdvice $preAdvice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePreAdviceRequest  $request
     * @param  \App\Models\PreAdvice  $preAdvice
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePreAdviceRequest $request, PreAdvice $preAdvice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PreAdvice  $preAdvice
     * @return \Illuminate\Http\Response
     */
    public function destroy(PreAdvice $preAdvice)
    {
        //
    }
}

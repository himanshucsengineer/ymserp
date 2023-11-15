<?php

namespace App\Http\Controllers;

use App\Models\MasterTarrif;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\Validator;
use \stdClass;

class MasterTarrifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use Helpers;
    public function index()
    {
        return view('tarrif.create');
    }


    public function all()
    {
        return view('tarrif.view');
    }

    public function getbylineid(Request $request){
        return MasterTarrif::where('line_id',$request->line_id)->where('repai_location_code',$request->location_code)->get();
    }
    public function getTarrifByLine(Request $request){
        return MasterTarrif::where('line_id',$request->line_id)->get();
    }

    public function checktarrifbycode(Request $request){
        $getData =  MasterTarrif::where('damade_id',$request->damageCode)->where('repair_id',$request->repairCode)->where('material_id',$request->materialCode)->get();
        if(count($getData)>0){
            return $getData;
        }else{
            return response()->json([
                'status' => "error",
                'message' => "Invalid Damage Code for tariff!"
            ], 500);
        }
    }

    public function checktarrifbydimention(Request $request){
        $getData =  MasterTarrif::where('damade_id',$request->damageCode)->where('repair_id',$request->repairCode)->where('material_id',$request->materialCode)->where('dimension_l',$request->master_length)->where('dimension_w',$request->master_width)->where('dimension_h',$request->master_height)->get();
        if(count($getData)>0){
            return $getData;
        }else{
            return response()->json([
                'status' => "error",
                'message' => "Invalid Diamensions for tariff!"
            ], 500);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMasterTarrifRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $createTarrif = MasterTarrif::firstOrCreate([
            'line_id'=> $request->line_id,
            'damade_id'=> $request->damade_id,
            'repair_id'=> $request->repair_id,
            'material_id'=> $request->material_id,
            'repai_location_code'=> $request->repai_location_code,
            'unit_of_measure'=> $request->unit_of_measure,
            'dimension_l'=> $request->dimension_l,
            'dimension_w'=> $request->dimension_w,
            'sub_total'=> $request->sub_total,
            'dimension_h'=> $request->dimension_h,
            'labour_hour'=> $request->labour_hour,
            'labour_cost'=> $request->labour_cost,
            'material_cost'=> $request->material_cost,
            'tax'=> $request->tax,
            'tax_cost'=> $request->tax_cost,
            'total_cost'=> $request->total_cost,
            'createdby' => $request->user_id,
            'depo_id' => $request->depo_id,
            'component_code' => $request->component_code,
            'desc' => $request->desc,
            'qty' => $request->qty,
            'repair_type' => $request->repair_type,
            'container_side'=>$request->container_side,
            'hotspot_coor_y'=>$request->hotspot_coor_y,
            'hotspot_coor_x'=>$request->hotspot_coor_x,
        ]);


        if($createTarrif){
            return response()->json([
                'status' => "success",
                'message' => "Tarrif Added Successfully"
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
     * @param  \App\Models\MasterTarrif  $masterTarrif
     * @return \Illuminate\Http\Response
     */
    public function show(MasterTarrif $masterTarrif)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMasterTarrifRequest  $request
     * @param  \App\Models\MasterTarrif  $masterTarrif
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMasterTarrifRequest $request, MasterTarrif $masterTarrif)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterTarrif  $masterTarrif
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterTarrif $masterTarrif)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\MasterTarrif;
use App\Models\MasterLine;
use App\Models\MasterDamage;
use App\Models\MasterRepair;
use App\Models\MasterMaterial;
use App\Models\Transaction;
use App\Models\LocationCode;
 
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

    public function getbyid(Request $request){
        return MasterTarrif::where('id',$request->id)->first();
    }


    public function getTarrifData(Request $request){
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
            $tarrifData = MasterTarrif::where([
                [function ($query) use ($request) {
                    if (($search = $request->search)) {
                        $query->orWhere('repai_location_code', 'LIKE', '%' . $search . '%')
                            ->orWhere('unit_of_measure', 'LIKE', '%' . $search . '%')
                            ->orWhere('dimension_l', 'LIKE', '%' . $search . '%')
                            ->orWhere('dimension_w', 'LIKE', '%' . $search . '%')
                            ->orWhere('dimension_h', 'LIKE', '%' . $search . '%')
                            ->orWhere('labour_hour', 'LIKE', '%' . $search . '%')
                            ->orWhere('labour_cost', 'LIKE', '%' . $search . '%')
                            ->orWhere('material_cost', 'LIKE', '%' . $search . '%')
                            ->orWhere('tax', 'LIKE', '%' . $search . '%')
                            ->orWhere('tax_cost', 'LIKE', '%' . $search . '%')
                            ->orWhere('sub_total', 'LIKE', '%' . $search . '%')
                            ->orWhere('total_cost', 'LIKE', '%' . $search . '%')
                            ->orWhere('component_code', 'LIKE', '%' . $search . '%')
                            ->orWhere('qty', 'LIKE', '%' . $search . '%')
                            ->orWhere('repair_type', 'LIKE', '%' . $search . '%')
                            ->orWhere('container_side', 'LIKE', '%' . $search . '%')
                            ->get();
                    }
                }],
            ])->orderby('created_at','desc')->paginate($datalimit);
        }else{
            $tarrifData = MasterTarrif::where([
                [function ($query) use ($request) {
                    if (($search = $request->search)) {
                        $query->orWhere('repai_location_code', 'LIKE', '%' . $search . '%')
                            ->orWhere('unit_of_measure', 'LIKE', '%' . $search . '%')
                            ->orWhere('dimension_l', 'LIKE', '%' . $search . '%')
                            ->orWhere('dimension_w', 'LIKE', '%' . $search . '%')
                            ->orWhere('dimension_h', 'LIKE', '%' . $search . '%')
                            ->orWhere('labour_hour', 'LIKE', '%' . $search . '%')
                            ->orWhere('labour_cost', 'LIKE', '%' . $search . '%')
                            ->orWhere('material_cost', 'LIKE', '%' . $search . '%')
                            ->orWhere('tax', 'LIKE', '%' . $search . '%')
                            ->orWhere('tax_cost', 'LIKE', '%' . $search . '%')
                            ->orWhere('sub_total', 'LIKE', '%' . $search . '%')
                            ->orWhere('total_cost', 'LIKE', '%' . $search . '%')
                            ->orWhere('component_code', 'LIKE', '%' . $search . '%')
                            ->orWhere('qty', 'LIKE', '%' . $search . '%')
                            ->orWhere('repair_type', 'LIKE', '%' . $search . '%')
                            ->orWhere('container_side', 'LIKE', '%' . $search . '%')
                            ->get();
                    }
                }],
                ['depo_id',$request->depo_id],
            ])->orderby('created_at','desc')->paginate($datalimit);
        }

        $formattedData = [];
        foreach($tarrifData as $tarrif){
            $lineData = MasterLine::where('id',$tarrif->line_id)->first();
            $damageData = MasterDamage::where('id',$tarrif->damade_id)->first();
            $repairData = MasterRepair::where('id',$tarrif->repair_id)->first();
            $materialData = MasterMaterial::where('id',$tarrif->material_id)->first();
            $locationcode = LocationCode::where('id',$tarrif->repai_location_code)->first();
            $formattedData[] = [
                'id'=> (int) $tarrif->id,
                'line_name' => $lineData->name,
                'damage' => $damageData->code,
                'repair' => $repairData->repair_code,
                'material' => $materialData->material_code,
                'repai_location_code' => $locationcode->code,
                'unit_of_measure' => $tarrif->unit_of_measure,
                'dimension_l' => $tarrif->dimension_l,
                'dimension_w' => $tarrif->dimension_w,
                'dimension_h' => $tarrif->dimension_h,
                'labour_hour' => $tarrif->labour_hour,
                'labour_cost' => $tarrif->labour_cost,
                'material_cost' => $tarrif->material_cost,
                'tax' => $tarrif->tax,
                'tax_cost' => $tarrif->tax_cost,
                'sub_total' => $tarrif->sub_total,
                'total_cost' => $tarrif->total_cost,
                'component_code' => $tarrif->component_code,
                'desc' => $tarrif->desc,
                'qty' => $tarrif->qty,
                'repair_type' => $tarrif->repair_type,
                'container_side' => $tarrif->container_side,
            ];
        }
        return response()->json([
            'data' => $formattedData,
            'pagination' => [
                'current_page' => $tarrifData->currentPage(),
                'per_page' => $tarrifData->perPage(),
                'total' => $tarrifData->total(),
                'last_page' => $tarrifData->lastPage(),
                'from' => $tarrifData->firstItem(),
                'to' => $tarrifData->lastItem(),
                'links' => [
                    'prev' => $tarrifData->previousPageUrl(),
                    'next' => $tarrifData->nextPageUrl(),
                    'all_pages' => $tarrifData->getUrlRange(1, $tarrifData->lastPage()),
                ],
            ],
        ]); 
    }


    public function getbylineid(Request $request){
        return MasterTarrif::where('line_id',$request->line_id)->where('repai_location_code',$request->location_code)->get();
    }
    public function getTarrifByLine(Request $request){
        $tarrifData = MasterTarrif::where('line_id',$request->line_id)->get();
        $LocationCode = LocationCode::get();
        $data =  array(
            'tarrifData' => $tarrifData,
            'LocationCode' => $LocationCode,
        );
        return $data;
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
    public function update(Request $request)
    {
        $tarrifDetails = MasterTarrif::find($request->id);

        $tarrifDetails->line_id =  is_null($request->line_id) ? $tarrifDetails->line_id : $request->line_id;
        $tarrifDetails->damade_id = is_null($request->damade_id) ? $tarrifDetails->damade_id : $request->damade_id;
        $tarrifDetails->repair_id = is_null($request->repair_id) ? $tarrifDetails->repair_id : $request->repair_id;
        $tarrifDetails->material_id = is_null($request->material_id) ? $tarrifDetails->material_id : $request->material_id;
        $tarrifDetails->repai_location_code = is_null($request->repai_location_code) ? $tarrifDetails->repai_location_code : $request->repai_location_code;
        $tarrifDetails->unit_of_measure = is_null($request->unit_of_measure) ? $tarrifDetails->unit_of_measure : $request->unit_of_measure;
        $tarrifDetails->dimension_l = is_null($request->dimension_l) ? $tarrifDetails->dimension_l : $request->dimension_l;
        $tarrifDetails->dimension_w = is_null($request->dimension_w) ? $tarrifDetails->dimension_w : $request->dimension_w;
        $tarrifDetails->dimension_h = is_null($request->dimension_h) ? $tarrifDetails->dimension_h : $request->dimension_h;
        $tarrifDetails->labour_hour = is_null($request->labour_hour) ? $tarrifDetails->labour_hour : $request->labour_hour;
        $tarrifDetails->labour_cost = is_null($request->labour_cost) ? $tarrifDetails->labour_cost : $request->labour_cost;
        $tarrifDetails->material_cost = is_null($request->material_cost) ? $tarrifDetails->material_cost : $request->material_cost;
        $tarrifDetails->tax = is_null($request->tax) ? $tarrifDetails->tax : $request->tax;
        $tarrifDetails->sub_total = is_null($request->sub_total) ? $tarrifDetails->sub_total : $request->sub_total;
        $tarrifDetails->tax_cost = is_null($request->tax_cost) ? $tarrifDetails->tax_cost : $request->tax_cost;
        $tarrifDetails->total_cost = is_null($request->total_cost) ? $tarrifDetails->total_cost : $request->total_cost;
        $tarrifDetails->component_code = is_null($request->component_code) ? $tarrifDetails->component_code : $request->component_code;
        $tarrifDetails->desc = is_null($request->desc) ? $tarrifDetails->desc : $request->desc;
        $tarrifDetails->qty = is_null($request->qty) ? $tarrifDetails->qty : $request->qty;
        $tarrifDetails->repair_type = is_null($request->repair_type) ? $tarrifDetails->repair_type : $request->repair_type;
        $tarrifDetails->hotspot_coor_y = is_null($request->hotspot_coor_y) ? $tarrifDetails->hotspot_coor_y : $request->hotspot_coor_y;
        $tarrifDetails->hotspot_coor_x = is_null($request->hotspot_coor_x) ? $tarrifDetails->hotspot_coor_x : $request->hotspot_coor_x;
        $tarrifDetails->container_side = is_null($request->container_side) ? $tarrifDetails->container_side : $request->container_side;
        $tarrifDetails->updatedby = $request->user_id;
        $tarrifDetails->updated_at = date('Y-m-d H:i:s');;

        $tarrifDetails  = $tarrifDetails->save();

        if($tarrifDetails){
            return response()->json([
                'status' => "success",
                'message' => "Tariff Updated Successfully"
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
     * @param  \App\Models\MasterTarrif  $masterTarrif
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $geteMaterial = Transaction::where('tarrif_id', $request->id)->get();

        if(count($geteMaterial) > 0){
            return response()->json([
                'status'=> "error",
                'message' => "Tarrif is used in transaction can not delete"
            ], 500);
        }

        

        $contractor = MasterTarrif::find($request->id);

        
        if (is_null($contractor)) {
            throw new NotFoundHttpException('Invalid Workshop Id!');
        }else{
            
            $deletecontractor= $contractor->delete();
            if($deletecontractor){
                return response()->json([
                    'status'=> "success",
                    'message' => "Tarrif Deleted Successfully"
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

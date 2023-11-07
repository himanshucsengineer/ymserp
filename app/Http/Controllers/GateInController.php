<?php

namespace App\Http\Controllers;

use App\Models\GateIn;
use App\Models\MasterTransport;
use App\Models\MasterLine;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\Validator;
use \stdClass;

class GateInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use Helpers;
    public function index()
    {
        return view('gatein.create');
    }

    public function inspection()
    {
        return view('surveyor.inspection');
    }

    public function getDataById(Request $request){
        return GateIn::where('id',$request->id)->first();
    }

    public function getInspectionData(Request $request){
        
        $datalimit= '';
        if($request->limit){
            $datalimit = $request->limit;
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


       
            $getInspection = GateIn::where([
                ['container_no', '!=', Null],
                [function ($query) use ($request) {
                    if (($search = $request->search)) {
                        $query->orWhere('container_no', 'LIKE', '%' . $search . '%')
                            ->get();
                    }
                }]
            ])->paginate($datalimit);

        $formattedInspection = [];

        foreach($getInspection as $inspection){
            $transport = MasterTransport::where('id', $inspection->transport_id)->first();
            $line = MasterLine::where('id', $inspection->line_id)->first();

            $formattedInspection[] = [
                'id'=> (int) $inspection->id,
                'container_no' => $inspection->container_no,
                'container_type' => $inspection->container_type,
                'container_size' => $inspection->container_size,
                'transport' => $transport,
                'inward_date' => $inspection->inward_date,
                'inward_time' => $inspection->inward_time,
                'driver_name' => $inspection->driver_name,
                'vehicle_number' => $inspection->vehicle_number,
                'contact_number' => $inspection->contact_number,
                'third_party' => $inspection->third_party,
                'line' => $line,
                'arrive_from' => $inspection->arrive_from,
                'port_name' => $inspection->port_name,
                'driver_photo' => url('/') . "/uploads/gatein/" . $inspection->driver_photo,
                'challan' => url('/') . "/uploads/gatein/" . $inspection->challan,
                'driver_license' => url('/') . "/uploads/gatein/" . $inspection->driver_license,
                'do_copy' => url('/') . "/uploads/gatein/" . $inspection->do_copy,
                'aadhar' => url('/') . "/uploads/gatein/" . $inspection->aadhar,
                'pan' => url('/') . "/uploads/gatein/" . $inspection->pan,
            ];
        }

    	return response()->json([
            'data' => $formattedInspection,
            'pagination' => [
                'current_page' => $getInspection->currentPage(),
                'per_page' => $getInspection->perPage(),
                'total' => $getInspection->total(),
                'last_page' => $getInspection->lastPage(),
                'from' => $getInspection->firstItem(),
                'to' => $getInspection->lastItem(),
                'links' => [
                    'prev' => $getInspection->previousPageUrl(),
                    'next' => $getInspection->nextPageUrl(),
                    'all_pages' => $getInspection->getUrlRange(1, $getInspection->lastPage()),
                ],
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGateInRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('container_img')) {
            $container_img = $request->file('container_img');
            $container_img_name = time() . '_' . $container_img->getClientOriginalName();
            $container_img->move(public_path('uploads/gatein'), $container_img_name);
        }else{
            $container_img_name = '';
        }

        if ($request->hasFile('vehicle_img')) {
            $vehicle_img = $request->file('vehicle_img');
            $vehicle_img_name = time() . '_' . $vehicle_img->getClientOriginalName();
            $vehicle_img->move(public_path('uploads/gatein'), $vehicle_img_name);
        }else{
            $vehicle_img_name = '';
        }

        if($request->vehicle_number == ''  && $vehicle_img_name == ''){
            return response()->json([
                'status' => "error",
                'message' => "Please Fill at least one thing for vhicle"
            ], 500);
        }

        if($request->container_no == ''  && $container_img_name == ''){
            $gateintype = "without container";
        }else{
            $gateintype = "with container";
        }

        $createGatein = GateIn::create([
            'container_img' => $container_img_name,
            'vehicle_img' => $vehicle_img_name,
            'container_no'=> $request->container_no,
            'container_type'=> $request->container_type,
            'container_size'=> $request->container_size,
            'driver_name'=> $request->driver_name,
            'vehicle_number'=> $request->vehicle_number,
            'contact_number'=> $request->contact_number,
            'depo_id' => $request->depo_id,
            'createdby' => $request->user_id,
            'gateintype' => $gateintype
        ]);


        if($createGatein){
            return response()->json([
                'status' => "success",
                'message' => "Entered Successfully"
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
     * @param  \App\Models\GateIn  $gateIn
     * @return \Illuminate\Http\Response
     */
    public function show(GateIn $gateIn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGateInRequest  $request
     * @param  \App\Models\GateIn  $gateIn
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGateInRequest $request, GateIn $gateIn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GateIn  $gateIn
     * @return \Illuminate\Http\Response
     */
    public function destroy(GateIn $gateIn)
    {
        //
    }
}

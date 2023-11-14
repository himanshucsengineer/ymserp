<?php

namespace App\Http\Controllers;

use App\Models\Gateout;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\Validator;
use \stdClass;

class GateoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('gateout.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGateoutRequest  $request
     * @return \Illuminate\Http\Response
     */
    
     public function get(Request $request)
     {
         if($request->user_id == 1){
             return Gateout::get();
         }else{
             return Gateout::where('depo_id',$request->depo_id)->get();
         }
     }

     public function getbyid(Request $request){
        return Gateout::where('id',$request->id)->first();
     }


     public function truckEntryData(Request $request){

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
            $gateInData = Gateout::where([
                [function ($query) use ($request) {
                    if (($search = $request->search)) {
                        $query->orWhere('driver_name', 'LIKE', '%' . $search . '%')
                            ->orWhere('vehicle_number', 'LIKE', '%' . $search . '%')
                            ->orWhere('contact_number', 'LIKE', '%' . $search . '%')
                            ->orWhere('in_date', 'LIKE', '%' . $search . '%')
                            ->orWhere('in_time', 'LIKE', '%' . $search . '%')
                            ->get();
                    }
                }],
            ])->orderby('created_at','desc')->paginate($datalimit);
        }else{

            $gateInData = Gateout::where([
                [function ($query) use ($request) {
                    if (($search = $request->search)) {
                        $query->orWhere('driver_name', 'LIKE', '%' . $search . '%')
                            ->orWhere('vehicle_number', 'LIKE', '%' . $search . '%')
                            ->orWhere('contact_number', 'LIKE', '%' . $search . '%')
                            ->orWhere('in_date', 'LIKE', '%' . $search . '%')
                            ->orWhere('in_time', 'LIKE', '%' . $search . '%')
                            ->get();
                    }
                }],
                ['depo_id',$request->depo_id],
            ])->orderby('created_at','desc')->paginate($datalimit);
        }
        
       

        $formetedData = [];

        foreach($gateInData as $gateIn){
            $formetedData[] = [
                'vehicle_number' => $gateIn->vehicle_number,
                'contact_number' => $gateIn->contact_number,
                'driver_name' => $gateIn->driver_name,
                'vehicle_img' => $gateIn->vehicle_img,
                'in_date' => $gateIn->in_date,
                'in_time' => $gateIn->in_time,
                'id' => $gateIn->id,
            ];
            
        }
    	return response()->json([
            'data' => $formetedData,
            'pagination' => [
                'current_page' => $gateInData->currentPage(),
                'per_page' => $gateInData->perPage(),
                'total' => $gateInData->total(),
                'last_page' => $gateInData->lastPage(),
                'from' => $gateInData->firstItem(),
                'to' => $gateInData->lastItem(),
                'links' => [
                    'prev' => $gateInData->previousPageUrl(),
                    'next' => $gateInData->nextPageUrl(),
                    'all_pages' => $gateInData->getUrlRange(1, $gateInData->lastPage()),
                ],
            ],
        ]); 
    }


    public function store(Request $request)
    {
        if ($request->hasFile('vehicle_img')) {
            $vehicle_img = $request->file('vehicle_img');
            $vehicle_img_name = time() . '_' . $vehicle_img->getClientOriginalName();
            $vehicle_img->move(public_path('uploads/gateout'), $vehicle_img_name);
        }else{
            $vehicle_img_name = '';
        }

        if($request->vehicle_number == ''  && $vehicle_img_name == ''){
            return response()->json([
                'status' => "error",
                'message' => "Please Fill at least one thing for vhicle"
            ], 500);
        }


        $createGatein = Gateout::create([
            'vehicle_img' => $vehicle_img_name,
            'driver_name'=> $request->driver_name,
            'vehicle_number'=> $request->vehicle_number,
            'contact_number'=> $request->contact_number,
            'depo_id' => $request->depo_id,
            'createdby' => $request->user_id,
            'in_date' => date('Y-m-d'),
            'in_time' => date('H:i:s'),
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
     * @param  \App\Models\Gateout  $gateout
     * @return \Illuminate\Http\Response
     */
    public function show(Gateout $gateout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGateoutRequest  $request
     * @param  \App\Models\Gateout  $gateout
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGateoutRequest $request, Gateout $gateout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gateout  $gateout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gateout $gateout)
    {
        //
    }
}

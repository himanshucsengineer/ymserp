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

    public function getTransporter(Request $request)
    {
        if($request->user_id == 1){
            return MasterTransport::where('is_transport','transport')->get();
        }else{
            return MasterTransport::where('is_transport','transport')->where('depo_id',$request->depo_id)->get();
        }
    } 

    public function getConsignee(Request $request){
        if($request->user_id == 1){
            return MasterTransport::where('is_transport','consignee')->get();
        }else{
            return MasterTransport::where('is_transport','consignee')->where('depo_id',$request->depo_id)->get();
        }
    }

    public function getall(){
        return MasterTransport::get();
    }

    public function getbyid(Request $request)
    {
        return MasterTransport::where('id',$request->id)->first();
    }

    public function getTransportData(Request $request){
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
            $transportData = MasterTransport::where([
                [function ($query) use ($request) {
                    if (($search = $request->search)) {
                        $query->orWhere('name', 'LIKE', '%' . $search . '%')
                            ->orWhere('address', 'LIKE', '%' . $search . '%')
                            ->orWhere('city', 'LIKE', '%' . $search . '%')
                            ->orWhere('state', 'LIKE', '%' . $search . '%')
                            ->orWhere('pincode', 'LIKE', '%' . $search . '%')
                            ->orWhere('gst', 'LIKE', '%' . $search . '%')
                            ->orWhere('pan', 'LIKE', '%' . $search . '%')
                            ->orWhere('gst_state', 'LIKE', '%' . $search . '%')
                            ->orWhere('state_code', 'LIKE', '%' . $search . '%')
                            ->orWhere('is_transport', 'LIKE', '%' . $search . '%')
                            ->get();
                    }
                }],
            ])->orderby('created_at','desc')->paginate($datalimit);
        }else{
            $transportData = MasterTransport::where([
                [function ($query) use ($request) {
                    if (($search = $request->search)) {
                        $query->orWhere('name', 'LIKE', '%' . $search . '%')
                            ->orWhere('address', 'LIKE', '%' . $search . '%')
                            ->orWhere('city', 'LIKE', '%' . $search . '%')
                            ->orWhere('state', 'LIKE', '%' . $search . '%')
                            ->orWhere('pincode', 'LIKE', '%' . $search . '%')
                            ->orWhere('gst', 'LIKE', '%' . $search . '%')
                            ->orWhere('pan', 'LIKE', '%' . $search . '%')
                            ->orWhere('gst_state', 'LIKE', '%' . $search . '%')
                            ->orWhere('state_code', 'LIKE', '%' . $search . '%')
                            ->orWhere('is_transport', 'LIKE', '%' . $search . '%')
                            ->get();
                    }
                }],
                ['depo_id',$request->depo_id],
            ])->orderby('created_at','desc')->paginate($datalimit);
        }

        $formattedData = [];
        foreach($transportData as $transport){
            $formattedData[] = [
                'id'=> (int) $transport->id,
                'name' => $transport->name,
                'address' => $transport->address,
                'city' => $transport->city,
                'state' => $transport->state,
                'pincode' => $transport->pincode,
                'gst' => $transport->gst,
                'pan' => $transport->pan,
                'gst_state' => $transport->gst_state,
                'state_code' => $transport->state_code,
                'is_transport' => $transport->is_transport,
            ];
        }
        return response()->json([
            'data' => $formattedData,
            'pagination' => [
                'current_page' => $transportData->currentPage(),
                'per_page' => $transportData->perPage(),
                'total' => $transportData->total(),
                'last_page' => $transportData->lastPage(),
                'from' => $transportData->firstItem(),
                'to' => $transportData->lastItem(),
                'links' => [
                    'prev' => $transportData->previousPageUrl(),
                    'next' => $transportData->nextPageUrl(),
                    'all_pages' => $transportData->getUrlRange(1, $transportData->lastPage()),
                ],
            ],
        ]); 
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
    public function update(Request $request)
    {
        $transportDetails = MasterTransport::find($request->id);

        $transportDetails->name =  is_null($request->name) ? $transportDetails->name : $request->name;
        $transportDetails->address = is_null($request->address) ? $transportDetails->address : $request->address;
        $transportDetails->city = is_null($request->city) ? $transportDetails->city : $request->city;
        $transportDetails->state = is_null($request->state) ? $transportDetails->state : $request->state;
        $transportDetails->pincode = is_null($request->pincode) ? $transportDetails->pincode : $request->pincode;
        $transportDetails->gst = is_null($request->gst) ? $transportDetails->gst : $request->gst;
        $transportDetails->pan = is_null($request->pan) ? $transportDetails->pan : $request->pan;
        $transportDetails->gst_state = is_null($request->gst_state) ? $transportDetails->gst_state : $request->gst_state;
        $transportDetails->state_code = is_null($request->state_code) ? $transportDetails->state_code : $request->state_code;
        $transportDetails->is_transport = is_null($request->is_transport) ? $transportDetails->is_transport : $request->is_transport;
        $transportDetails->updatedby = $request->user_id;
        $transportDetails->updated_at = date('Y-m-d H:i:s');;

        $transportDetails  = $transportDetails->save();

        if($transportDetails){
            return response()->json([
                'status' => "success",
                'message' => "Transport Updated Successfully"
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
     * @param  \App\Models\MasterTransport  $masterTransport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $contractor = MasterTransport::find($request->id);

        
        if (is_null($contractor)) {
            throw new NotFoundHttpException('Invalid Id!');
        }else{
            
            $deletecontractor= $contractor->delete();
            if($deletecontractor){
                return response()->json([
                    'status'=> "success",
                    'message' => "Transporter Deleted Successfully"
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

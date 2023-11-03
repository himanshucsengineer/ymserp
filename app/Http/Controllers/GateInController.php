<?php

namespace App\Http\Controllers;

use App\Models\GateIn;
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGateInRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('driver_photo')) {
            $driverfile = $request->file('driver_photo');
            $driverfileName = time() . '_' . $driverfile->getClientOriginalName();
            $driverfile->move(public_path('uploads/gatein'), $driverfileName);
        }

        if ($request->hasFile('challan')) {
            $challanfile = $request->file('challan');
            $challanfileName = time() . '_' . $challanfile->getClientOriginalName();
            $challanfile->move(public_path('uploads/gatein'), $challanfileName);
        }

        if ($request->hasFile('driver_license')) {
            $driver_license = $request->file('driver_license');
            $driver_licensename = time() . '_' . $driver_license->getClientOriginalName();
            $driver_license->move(public_path('uploads/gatein'), $driver_licensename);
        }

        if ($request->hasFile('do_copy')) {
            $do_copy = $request->file('do_copy');
            $do_copyname = time() . '_' . $do_copy->getClientOriginalName();
            $do_copy->move(public_path('uploads/gatein'), $do_copyname);
        }

        if ($request->hasFile('aadhar')) {
            $aadhar = $request->file('aadhar');
            $aadharname = time() . '_' . $aadhar->getClientOriginalName();
            $aadhar->move(public_path('uploads/gatein'), $aadharname);
        }

        if ($request->hasFile('pan')) {
            $pan = $request->file('pan');
            $panname = time() . '_' . $pan->getClientOriginalName();
            $pan->move(public_path('uploads/gatein'), $panname);
        }

        $createGatein = GateIn::create([
            'driver_photo'=> $driverfileName,
            'challan'=> $challanfileName,
            'driver_license'=> $driver_licensename,
            'do_copy'=> $do_copyname,

            'aadhar'=> $aadharname,
            'pan'=> $panname,

            'container_no'=> $request->container_no,

            'container_type'=> $request->container_type,
            'container_size'=> $request->container_size,
            'transport_id'=> $request->transport_id,
            'inward_date'=> $request->inward_date,

            'inward_time'=> $request->inward_time,
            'driver_name'=> $request->driver_name,
            'vehicle_number'=> $request->vehicle_number,
            'contact_number'=> $request->contact_number,

            'third_party'=> $request->third_party,
            'line_id' => $request->line_id,
            'arrive_from' => $request->arrive_from,
            'port_name' => $request->port_name,
            'depo_id' => $request->depo_id,
            'createdby' => $request->user_id
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

<?php

namespace App\Http\Controllers;

use App\Models\GatePass;
use App\Http\Requests\StoreGatePassRequest;
use App\Http\Requests\UpdateGatePassRequest;

class GatePassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGatePassRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGatePassRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GatePass  $gatePass
     * @return \Illuminate\Http\Response
     */
    public function show(GatePass $gatePass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGatePassRequest  $request
     * @param  \App\Models\GatePass  $gatePass
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGatePassRequest $request, GatePass $gatePass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GatePass  $gatePass
     * @return \Illuminate\Http\Response
     */
    public function destroy(GatePass $gatePass)
    {
        //
    }
}

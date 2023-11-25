<?php

namespace App\Http\Controllers;

use App\Models\VendorMaster;
use App\Http\Requests\StoreVendorMasterRequest;
use App\Http\Requests\UpdateVendorMasterRequest;

class VendorMasterController extends Controller
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
     * @param  \App\Http\Requests\StoreVendorMasterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVendorMasterRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VendorMaster  $vendorMaster
     * @return \Illuminate\Http\Response
     */
    public function show(VendorMaster $vendorMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVendorMasterRequest  $request
     * @param  \App\Models\VendorMaster  $vendorMaster
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVendorMasterRequest $request, VendorMaster $vendorMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VendorMaster  $vendorMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(VendorMaster $vendorMaster)
    {
        //
    }
}

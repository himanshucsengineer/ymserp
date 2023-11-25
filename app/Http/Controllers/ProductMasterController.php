<?php

namespace App\Http\Controllers;

use App\Models\ProductMaster;
use App\Http\Requests\StoreProductMasterRequest;
use App\Http\Requests\UpdateProductMasterRequest;

class ProductMasterController extends Controller
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
     * @param  \App\Http\Requests\StoreProductMasterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductMasterRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductMaster  $productMaster
     * @return \Illuminate\Http\Response
     */
    public function show(ProductMaster $productMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductMasterRequest  $request
     * @param  \App\Models\ProductMaster  $productMaster
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductMasterRequest $request, ProductMaster $productMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductMaster  $productMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductMaster $productMaster)
    {
        //
    }
}

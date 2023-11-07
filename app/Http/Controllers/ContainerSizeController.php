<?php

namespace App\Http\Controllers;

use App\Models\ContainerSize;
use App\Http\Requests\StoreContainerSizeRequest;
use App\Http\Requests\UpdateContainerSizeRequest;

class ContainerSizeController extends Controller
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
     * @param  \App\Http\Requests\StoreContainerSizeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContainerSizeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContainerSize  $containerSize
     * @return \Illuminate\Http\Response
     */
    public function show(ContainerSize $containerSize)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContainerSizeRequest  $request
     * @param  \App\Models\ContainerSize  $containerSize
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContainerSizeRequest $request, ContainerSize $containerSize)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContainerSize  $containerSize
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContainerSize $containerSize)
    {
        //
    }
}

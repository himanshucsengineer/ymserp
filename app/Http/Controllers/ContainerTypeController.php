<?php

namespace App\Http\Controllers;

use App\Models\ContainerType;
use App\Http\Requests\StoreContainerTypeRequest;
use App\Http\Requests\UpdateContainerTypeRequest;

class ContainerTypeController extends Controller
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
     * @param  \App\Http\Requests\StoreContainerTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContainerTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContainerType  $containerType
     * @return \Illuminate\Http\Response
     */
    public function show(ContainerType $containerType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContainerTypeRequest  $request
     * @param  \App\Models\ContainerType  $containerType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContainerTypeRequest $request, ContainerType $containerType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContainerType  $containerType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContainerType $containerType)
    {
        //
    }
}

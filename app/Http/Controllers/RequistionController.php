<?php

namespace App\Http\Controllers;

use App\Models\Requistion;
use App\Http\Requests\StoreRequistionRequest;
use App\Http\Requests\UpdateRequistionRequest;

class RequistionController extends Controller
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
     * @param  \App\Http\Requests\StoreRequistionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequistionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Requistion  $requistion
     * @return \Illuminate\Http\Response
     */
    public function show(Requistion $requistion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRequistionRequest  $request
     * @param  \App\Models\Requistion  $requistion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequistionRequest $request, Requistion $requistion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Requistion  $requistion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requistion $requistion)
    {
        //
    }
}

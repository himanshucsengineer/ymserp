<?php

namespace App\Http\Controllers;

use App\Models\PreAdvice;
use App\Http\Requests\StorePreAdviceRequest;
use App\Http\Requests\UpdatePreAdviceRequest;

class PreAdviceController extends Controller
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
     * @param  \App\Http\Requests\StorePreAdviceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePreAdviceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PreAdvice  $preAdvice
     * @return \Illuminate\Http\Response
     */
    public function show(PreAdvice $preAdvice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePreAdviceRequest  $request
     * @param  \App\Models\PreAdvice  $preAdvice
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePreAdviceRequest $request, PreAdvice $preAdvice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PreAdvice  $preAdvice
     * @return \Illuminate\Http\Response
     */
    public function destroy(PreAdvice $preAdvice)
    {
        //
    }
}

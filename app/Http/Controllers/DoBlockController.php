<?php

namespace App\Http\Controllers;

use App\Models\DoBlock;
use App\Http\Requests\StoreDoBlockRequest;
use App\Http\Requests\UpdateDoBlockRequest;

class DoBlockController extends Controller
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
     * @param  \App\Http\Requests\StoreDoBlockRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDoBlockRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DoBlock  $doBlock
     * @return \Illuminate\Http\Response
     */
    public function show(DoBlock $doBlock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDoBlockRequest  $request
     * @param  \App\Models\DoBlock  $doBlock
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDoBlockRequest $request, DoBlock $doBlock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DoBlock  $doBlock
     * @return \Illuminate\Http\Response
     */
    public function destroy(DoBlock $doBlock)
    {
        //
    }
}

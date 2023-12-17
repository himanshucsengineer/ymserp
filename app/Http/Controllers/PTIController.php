<?php

namespace App\Http\Controllers;

use App\Models\PTI;
use App\Http\Requests\StorePTIRequest;
use App\Http\Requests\UpdatePTIRequest;

class PTIController extends Controller
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
     * @param  \App\Http\Requests\StorePTIRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePTIRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PTI  $pTI
     * @return \Illuminate\Http\Response
     */
    public function show(PTI $pTI)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePTIRequest  $request
     * @param  \App\Models\PTI  $pTI
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePTIRequest $request, PTI $pTI)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PTI  $pTI
     * @return \Illuminate\Http\Response
     */
    public function destroy(PTI $pTI)
    {
        //
    }
}

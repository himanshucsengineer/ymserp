<?php

namespace App\Http\Controllers;

use App\Models\DoContainer;
use App\Http\Requests\StoreDoContainerRequest;
use App\Http\Requests\UpdateDoContainerRequest;

class DoContainerController extends Controller
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
     * @param  \App\Http\Requests\StoreDoContainerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDoContainerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DoContainer  $doContainer
     * @return \Illuminate\Http\Response
     */
    public function show(DoContainer $doContainer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDoContainerRequest  $request
     * @param  \App\Models\DoContainer  $doContainer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDoContainerRequest $request, DoContainer $doContainer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DoContainer  $doContainer
     * @return \Illuminate\Http\Response
     */
    public function destroy(DoContainer $doContainer)
    {
        //
    }
}

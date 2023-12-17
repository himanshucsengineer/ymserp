<?php

namespace App\Http\Controllers;

use App\Models\CashFlow;
use App\Http\Requests\StoreCashFlowRequest;
use App\Http\Requests\UpdateCashFlowRequest;

class CashFlowController extends Controller
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
     * @param  \App\Http\Requests\StoreCashFlowRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCashFlowRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CashFlow  $cashFlow
     * @return \Illuminate\Http\Response
     */
    public function show(CashFlow $cashFlow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCashFlowRequest  $request
     * @param  \App\Models\CashFlow  $cashFlow
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCashFlowRequest $request, CashFlow $cashFlow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CashFlow  $cashFlow
     * @return \Illuminate\Http\Response
     */
    public function destroy(CashFlow $cashFlow)
    {
        //
    }
}

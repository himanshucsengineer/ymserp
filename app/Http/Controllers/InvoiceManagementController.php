<?php

namespace App\Http\Controllers;

use App\Models\InvoiceManagement;
use App\Http\Requests\StoreInvoiceManagementRequest;
use App\Http\Requests\UpdateInvoiceManagementRequest;

class InvoiceManagementController extends Controller
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
     * @param  \App\Http\Requests\StoreInvoiceManagementRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInvoiceManagementRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InvoiceManagement  $invoiceManagement
     * @return \Illuminate\Http\Response
     */
    public function show(InvoiceManagement $invoiceManagement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInvoiceManagementRequest  $request
     * @param  \App\Models\InvoiceManagement  $invoiceManagement
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInvoiceManagementRequest $request, InvoiceManagement $invoiceManagement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InvoiceManagement  $invoiceManagement
     * @return \Illuminate\Http\Response
     */
    public function destroy(InvoiceManagement $invoiceManagement)
    {
        //
    }
}

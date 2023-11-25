<?php

namespace App\Http\Controllers;

use App\Models\CategoryMaster;
use App\Http\Requests\StoreCategoryMasterRequest;
use App\Http\Requests\UpdateCategoryMasterRequest;

class CategoryMasterController extends Controller
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
     * @param  \App\Http\Requests\StoreCategoryMasterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryMasterRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryMaster  $categoryMaster
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryMaster $categoryMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryMasterRequest  $request
     * @param  \App\Models\CategoryMaster  $categoryMaster
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryMasterRequest $request, CategoryMaster $categoryMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryMaster  $categoryMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryMaster $categoryMaster)
    {
        //
    }
}

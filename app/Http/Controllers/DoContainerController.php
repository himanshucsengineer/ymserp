<?php

namespace App\Http\Controllers;

use App\Models\DoContainer;
use App\Http\Requests\StoreDoContainerRequest;
use App\Http\Requests\UpdateDoContainerRequest;
use App\Models\MasterLine;

use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\Validator;
use \stdClass;

class DoContainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('supervisor.containerlist');
    }

    public function getlist(Request $request){
        $getlist = DoContainer::where('do_no',$request->do_no)->get();

        $formetedData = [];

        foreach($getlist as $list){

            $getLine = MasterLine::where('id',$list->line_id)->first();

            $formetedData[] = [
                'container_size' => $list->container_size,
                'container_type' => $list->container_type,
                'sub_type' => $list->sub_type,
                'container_no' => $list->container_no,
                'vessel' => $list->vessel_name,
                'voyage' => $list->voyage,
                'line_name' => $getLine->name,
                'id' => $list->id,
            ];  
        }
        
        
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

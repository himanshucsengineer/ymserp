<?php

namespace App\Http\Controllers;

use App\Models\PTI;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\Validator;
use \stdClass;
use App\Models\GateIn;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use Helpers;

    public function container_report_view(){
        return view('report.container');
    }
    
    public function dmr_report_view(){
        return view('report.dmr');

    }
  
}

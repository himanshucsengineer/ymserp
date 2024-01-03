<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Exports\CategoryExport;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function($api){

    $api->group(['prefix' => 'auth'], function($api){
        $api->post('/login','App\Http\Controllers\Auth\AuthController@login');
        $api->post('/checkUser','App\Http\Controllers\Auth\AuthController@checkUser');
        $api->post('/getuserbyid', 'App\Http\Controllers\MasterUserController@getbyid');

        $api->group(['middleware' => 'api.auth'], function($api){
            $api->post('/token/refresh','App\Http\Controllers\Auth\AuthController@refreshtoken');
            $api->post('/change-password','App\Http\Controllers\Auth\AuthController@changepassword');
            $api->post('/logout','App\Http\Controllers\Auth\AuthController@logout');
        });
    });


    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'role'], function($api){
        $api->post('/create','App\Http\Controllers\RoleController@store');
        $api->get('/get', 'App\Http\Controllers\RoleController@get');
        $api->get('/getwithpermissions', 'App\Http\Controllers\RoleController@getwithpermissions');
        $api->post('/getbyid', 'App\Http\Controllers\RoleController@getbyid');
        $api->post('/update', 'App\Http\Controllers\RoleController@update');
        $api->post('/delete', 'App\Http\Controllers\RoleController@destroy');
    });


    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'contractor'], function($api){
        $api->post('/create','App\Http\Controllers\MasterContractorController@store');
        $api->post('/get', 'App\Http\Controllers\MasterContractorController@get');
        $api->post('/getContractorData', 'App\Http\Controllers\MasterContractorController@getContractorData');
        $api->post('/getbyid', 'App\Http\Controllers\MasterContractorController@getbyid');
        $api->post('/delete', 'App\Http\Controllers\MasterContractorController@destroy');
        $api->post('/update', 'App\Http\Controllers\MasterContractorController@update');
        $api->get('/getall', 'App\Http\Controllers\MasterContractorController@getall');
    });
    

    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'category'], function($api){
        $api->post('/create','App\Http\Controllers\MasterCategoryController@store');
        $api->post('/get', 'App\Http\Controllers\MasterCategoryController@get');
        $api->post('/getCategoryData', 'App\Http\Controllers\MasterCategoryController@getCategoryData');
        $api->post('/getbyid', 'App\Http\Controllers\MasterCategoryController@getbyid');
        $api->post('/delete', 'App\Http\Controllers\MasterCategoryController@destroy');
        $api->post('/update', 'App\Http\Controllers\MasterCategoryController@update');
    });

    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'depo'], function($api){
        $api->post('/create','App\Http\Controllers\MasterDepoController@store');
        $api->post('/get', 'App\Http\Controllers\MasterDepoController@get');
        $api->post('/getDepoData', 'App\Http\Controllers\MasterDepoController@getDepoData');
        $api->get('/getall', 'App\Http\Controllers\MasterDepoController@getall');
        $api->post('/getbyid', 'App\Http\Controllers\MasterDepoController@getbyid');
        $api->post('/delete', 'App\Http\Controllers\MasterDepoController@destroy');
        $api->post('/update', 'App\Http\Controllers\MasterDepoController@update');
    });

    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'employee'], function($api){
        $api->post('/create','App\Http\Controllers\MasterEmployeeController@store');
        $api->post('/get', 'App\Http\Controllers\MasterEmployeeController@get');
        $api->post('/getbyid', 'App\Http\Controllers\MasterEmployeeController@getbyid');

        $api->post('/getData', 'App\Http\Controllers\MasterEmployeeController@getdata');
        $api->post('/delete', 'App\Http\Controllers\MasterEmployeeController@destroy');
        $api->post('/update', 'App\Http\Controllers\MasterEmployeeController@update');
    });
 
    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'user'], function($api){
        $api->post('/create','App\Http\Controllers\MasterUserController@store');
        $api->get('/get', 'App\Http\Controllers\MasterUserController@index');
        $api->post('/getData', 'App\Http\Controllers\MasterUserController@getData');
        $api->post('/getUserList', 'App\Http\Controllers\MasterUserController@getUserList');
        $api->post('/getbyid', 'App\Http\Controllers\MasterUserController@getbyid');
        $api->post('/getemployee', 'App\Http\Controllers\MasterUserController@getemployee');
        $api->post('/delete', 'App\Http\Controllers\MasterUserController@destroy');
        $api->post('/update', 'App\Http\Controllers\MasterUserController@update');
    });

    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'role'], function($api){
        $api->post('/create','App\Http\Controllers\RoleController@store');
        $api->get('/get', 'App\Http\Controllers\RoleController@get');
    });


    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'damage'], function($api){
        $api->post('/create','App\Http\Controllers\MasterDamageController@store');
        $api->post('/get', 'App\Http\Controllers\MasterDamageController@get');
        $api->post('/getDamageData', 'App\Http\Controllers\MasterDamageController@getDamageData');
        $api->post('/getbyid', 'App\Http\Controllers\MasterDamageController@getbyid');
        $api->post('/delete', 'App\Http\Controllers\MasterDamageController@destroy');
        $api->post('/update', 'App\Http\Controllers\MasterDamageController@update');

    });

    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'location'], function($api){
        $api->post('/create','App\Http\Controllers\LocationCodeController@store');
        $api->post('/get', 'App\Http\Controllers\LocationCodeController@get');
        $api->post('/getLocationData', 'App\Http\Controllers\LocationCodeController@getLocationData');
        $api->post('/getbyid', 'App\Http\Controllers\LocationCodeController@getbyid');
        $api->post('/delete', 'App\Http\Controllers\LocationCodeController@destroy');
        $api->post('/update', 'App\Http\Controllers\LocationCodeController@update');
    });

    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'repair'], function($api){
        $api->post('/create','App\Http\Controllers\MasterRepairController@store');
        $api->post('/get', 'App\Http\Controllers\MasterRepairController@get');
        $api->post('/getData', 'App\Http\Controllers\MasterRepairController@getData');
        $api->post('/getbyid', 'App\Http\Controllers\MasterRepairController@getbyid');
        $api->post('/delete', 'App\Http\Controllers\MasterRepairController@destroy');
        $api->post('/update', 'App\Http\Controllers\MasterRepairController@update');
    });

    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'material'], function($api){
        $api->post('/create','App\Http\Controllers\MasterMaterialController@store');
        $api->post('/get', 'App\Http\Controllers\MasterMaterialController@get');
        $api->post('/getData', 'App\Http\Controllers\MasterMaterialController@getData');

        $api->post('/getbyid', 'App\Http\Controllers\MasterMaterialController@getbyid');
        $api->post('/delete', 'App\Http\Controllers\MasterMaterialController@destroy');
        $api->post('/update', 'App\Http\Controllers\MasterMaterialController@update');
    });

    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'line'], function($api){
        $api->post('/create','App\Http\Controllers\MasterLineController@store');
        $api->post('/get', 'App\Http\Controllers\MasterLineController@get');
        $api->post('/getbyname', 'App\Http\Controllers\MasterLineController@getbyname');
        $api->post('/getLineData', 'App\Http\Controllers\MasterLineController@getLineData');
        $api->post('/getbyid', 'App\Http\Controllers\MasterLineController@getbyid');
        $api->post('/delete', 'App\Http\Controllers\MasterLineController@destroy');
        $api->post('/update', 'App\Http\Controllers\MasterLineController@update');
        $api->get('/getall', 'App\Http\Controllers\MasterLineController@getall');
        $api->post('/getbysizetype', 'App\Http\Controllers\MasterLineController@getbysizetype');

    }); 

    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'tarrif'], function($api){
        $api->post('/create','App\Http\Controllers\MasterTarrifController@store');
        $api->get('/get', 'App\Http\Controllers\MasterTarrifController@get');
        $api->post('/getbyid', 'App\Http\Controllers\MasterTarrifController@getbyid');
        $api->post('/getTarrifData', 'App\Http\Controllers\MasterTarrifController@getTarrifData');
        $api->post('/getbylineid', 'App\Http\Controllers\MasterTarrifController@getbylineid');
        $api->post('/gettarrifdamage', 'App\Http\Controllers\MasterTarrifController@gettarrifdamage');
        $api->post('/gettarrifrepair', 'App\Http\Controllers\MasterTarrifController@gettarrifrepair');
        $api->post('/gettarrifmaterial', 'App\Http\Controllers\MasterTarrifController@gettarrifmaterial');
        $api->post('/gettarriflength', 'App\Http\Controllers\MasterTarrifController@gettarriflength');
        $api->post('/gettarrifheight', 'App\Http\Controllers\MasterTarrifController@gettarrifheight');
        $api->post('/gettarrifwidth', 'App\Http\Controllers\MasterTarrifController@gettarrifwidth');

        $api->post('/getTarrifByLine', 'App\Http\Controllers\MasterTarrifController@getTarrifByLine');
        $api->post('/checktarrifbycode', 'App\Http\Controllers\MasterTarrifController@checktarrifbycode');
        $api->post('/checktarrifbydimention', 'App\Http\Controllers\MasterTarrifController@checktarrifbydimention');

        $api->post('/delete', 'App\Http\Controllers\MasterTarrifController@destroy');
        $api->post('/update', 'App\Http\Controllers\MasterTarrifController@update');
    });

    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'transport'], function($api){
        $api->post('/create','App\Http\Controllers\MasterTransportController@store');
        $api->post('/get', 'App\Http\Controllers\MasterTransportController@get');
        $api->post('/getTransporter', 'App\Http\Controllers\MasterTransportController@getTransporter');
        $api->post('/getConsignee', 'App\Http\Controllers\MasterTransportController@getConsignee');
        $api->post('/getTransportData', 'App\Http\Controllers\MasterTransportController@getTransportData');
        $api->post('/getbyid', 'App\Http\Controllers\MasterTransportController@getbyid');
        $api->post('/delete', 'App\Http\Controllers\MasterTransportController@destroy');
        $api->post('/update', 'App\Http\Controllers\MasterTransportController@update');
        $api->get('/getall', 'App\Http\Controllers\MasterTransportController@getall');

    });
    
    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'gatein'], function($api){
        $api->post('/create','App\Http\Controllers\GateInController@store');
        $api->get('/get', 'App\Http\Controllers\GateInController@get');
        $api->get('/getReadyContainers', 'App\Http\Controllers\GateInController@getReadyContainers');
        $api->get('/getInVehicle', 'App\Http\Controllers\GateInController@getInVehicle');
        $api->post('/getbycontainer', 'App\Http\Controllers\GateInController@getbycontainer');
        $api->get('/genrateastimate', 'App\Http\Controllers\GateInController@genrateastimate');
        $api->post('/getDataById', 'App\Http\Controllers\GateInController@getDataById');
        $api->post('/getDataByIdOutward', 'App\Http\Controllers\GateInController@getDataByIdOutward');
        $api->post('/getContainerList', 'App\Http\Controllers\GateInController@getContainerList');
        $api->post('/update', 'App\Http\Controllers\GateInController@update');
        $api->post('/getInspectionData', 'App\Http\Controllers\GateInController@getInspectionData');
        $api->post('/filterByDate', 'App\Http\Controllers\GateInController@filterByDate');
        $api->post('/updateestimate', 'App\Http\Controllers\GateInController@updateestimate');
        $api->post('/updateapprove', 'App\Http\Controllers\GateInController@updateapprove');
        $api->post('/updaterepair', 'App\Http\Controllers\GateInController@updaterepair');
        $api->post('/updateout', 'App\Http\Controllers\GateInController@updateout');
        $api->post('/getPreAdviceContainer', 'App\Http\Controllers\GateInController@getPreAdviceContainer');
        $api->post('/getContainerReport', 'App\Http\Controllers\GateInController@getContainerReport');
        
        $api->post('/geVhicle', 'App\Http\Controllers\GateInController@geVhicle');
        $api->post('/getRefferContainer', 'App\Http\Controllers\GateInController@getRefferContainer');
        
        $api->post('/filterByDateSurvey', 'App\Http\Controllers\GateInController@filterByDateSurvey');
        $api->post('/getInspectionDataSurvey', 'App\Http\Controllers\GateInController@getInspectionDataSurvey');
        $api->post('/filterByDateSurveyor', 'App\Http\Controllers\GateInController@filterByDateSurveyor');
        $api->post('/getInspectionDataSurveyor', 'App\Http\Controllers\GateInController@getInspectionDataSurveyor');
        $api->post('/filterByDateInward', 'App\Http\Controllers\GateInController@filterByDateInward');
        $api->post('/getInspectionDataInward', 'App\Http\Controllers\GateInController@getInspectionDataInward');
    });

    // $api->group([ 'middleware' => 'api.auth', 'prefix'=>'containerverify'], function($api){
    //     $api->post('/create','App\Http\Controllers\ContainerVerifyController@store');
    //     $api->post('/getbyid','App\Http\Controllers\ContainerVerifyController@getbyid');
    // });

    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'transcation'], function($api){
        $api->post('/create','App\Http\Controllers\TransactionController@store');
        $api->post('/getbytarrif','App\Http\Controllers\TransactionController@getbytarrif');
        $api->post('/getbygatein','App\Http\Controllers\TransactionController@getbygatein');
        $api->post('/update', 'App\Http\Controllers\TransactionController@update');
        $api->post('/delete', 'App\Http\Controllers\TransactionController@destroy');
        $api->post('/getbytype', 'App\Http\Controllers\TransactionController@getbytype');

    });

    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'supervisor'], function($api){
        $api->post('/getInspectionDataSupervisor', 'App\Http\Controllers\GateInController@getInspectionDataSupervisor');
        $api->post('/filterByDateSupervisor', 'App\Http\Controllers\GateInController@filterByDateSupervisor');
        $api->post('/filterbystatus', 'App\Http\Controllers\GateInController@filterbystatus');

    });



    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'maintenance'], function($api){
        $api->post('/getInspectionDataRepair', 'App\Http\Controllers\GateInController@getInspectionDataRepair');
        $api->post('/filterByDateRepair', 'App\Http\Controllers\GateInController@filterByDateRepair');
        $api->post('/filterByDateRepairDone', 'App\Http\Controllers\GateInController@filterByDateRepairDone');
        $api->post('/getInspectionDataRepairDone', 'App\Http\Controllers\GateInController@getInspectionDataRepairDone');

    });

    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'outward'], function($api){
        $api->post('/filterByOutStatus', 'App\Http\Controllers\OutwardOfficerController@filterByOutStatus');
        $api->post('/getInspectionDataOutStatus', 'App\Http\Controllers\OutwardOfficerController@getInspectionDataOutStatus');
        $api->post('/create', 'App\Http\Controllers\OutwardOfficerController@store');
        $api->post('/get', 'App\Http\Controllers\OutwardOfficerController@get');
        $api->post('/getbyid', 'App\Http\Controllers\OutwardOfficerController@getbyid');
        $api->post('/genrateGatePass', 'App\Http\Controllers\OutwardOfficerController@genrateGatePass');
        $api->post('/getGatePass', 'App\Http\Controllers\OutwardOfficerController@getGatePass');
        $api->post('/gateoutdata', 'App\Http\Controllers\OutwardOfficerController@gateoutdata');
        $api->post('/update', 'App\Http\Controllers\OutwardOfficerController@update');

    });

    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'preadvice'], function($api){
        $api->post('/create', 'App\Http\Controllers\PreAdviceController@store');
        $api->post('/getbydo', 'App\Http\Controllers\PreAdviceController@getbydo');
        $api->post('/getbyid', 'App\Http\Controllers\PreAdviceController@getbyid');
    });

    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'docontainer'], function($api){
        $api->post('/getlist', 'App\Http\Controllers\DoContainerController@getlist');
    });

    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'product-category'], function($api){
        $api->post('/create','App\Http\Controllers\CategoryMasterController@store');
        $api->get('/getCategoryData', 'App\Http\Controllers\CategoryMasterController@getCategoryData');
        $api->post('/delete', 'App\Http\Controllers\CategoryMasterController@destroy');
        $api->post('/update', 'App\Http\Controllers\CategoryMasterController@update');
        $api->post('/getbyid', 'App\Http\Controllers\CategoryMasterController@getbyid');

    });

    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'vendor'], function($api){
        $api->post('/create','App\Http\Controllers\VendorMasterController@store');
        $api->get('/getVendorData', 'App\Http\Controllers\VendorMasterController@getVendorData');
        $api->post('/delete', 'App\Http\Controllers\VendorMasterController@destroy');
        $api->post('/update', 'App\Http\Controllers\VendorMasterController@update');
        $api->post('/getbyid', 'App\Http\Controllers\VendorMasterController@getbyid');

    });

    Route::get('/export-category', function () {

        $fileName = date('Y-m-d-H:i:s')."-category-master.xlsx";
        $response = Excel::download(new TagExport,$fileName);
        $response->headers->set('Content-Disposition', 'attachment; filename="' . $fileName . '"');
        return $response;
    });


    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'doblock'], function($api){
        $api->post('/create','App\Http\Controllers\DoBlockController@store');
        $api->post('/get', 'App\Http\Controllers\DoBlockController@get');
        $api->post('/getDoBlockData', 'App\Http\Controllers\DoBlockController@getDoBlockData');
        $api->post('/getbyid', 'App\Http\Controllers\DoBlockController@getbyid');
        $api->post('/delete', 'App\Http\Controllers\DoBlockController@destroy');
        $api->post('/update', 'App\Http\Controllers\DoBlockController@update');
        $api->post('/checkDoNo', 'App\Http\Controllers\DoBlockController@checkDoNo');

    });

    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'pti'], function($api){
        $api->post('/create','App\Http\Controllers\PTIController@store');
        $api->post('/get', 'App\Http\Controllers\PTIController@get');
        $api->post('/getPtiData', 'App\Http\Controllers\PTIController@getPtiData');
        $api->post('/getbyid', 'App\Http\Controllers\PTIController@getbyid');
        $api->post('/delete', 'App\Http\Controllers\PTIController@destroy');
        $api->post('/update', 'App\Http\Controllers\PTIController@update');

    });


    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'account'], function($api){
        $api->post('/create','App\Http\Controllers\AccountManagementController@store');
        $api->post('/get', 'App\Http\Controllers\AccountManagementController@get');
        $api->post('/getAccountData', 'App\Http\Controllers\AccountManagementController@getAccountData');
        $api->post('/getbyid', 'App\Http\Controllers\AccountManagementController@getbyid');
        $api->post('/delete', 'App\Http\Controllers\AccountManagementController@destroy');
        $api->post('/update', 'App\Http\Controllers\AccountManagementController@update');

    });

    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'cashflow'], function($api){
        $api->post('/calculateamount','App\Http\Controllers\CashFlowController@calculateamount');
        $api->post('/create','App\Http\Controllers\CashFlowController@store');
        $api->post('/get', 'App\Http\Controllers\CashFlowController@get');
        $api->post('/getCashflowData', 'App\Http\Controllers\CashFlowController@getCashflowData');
        $api->post('/getbyid', 'App\Http\Controllers\CashFlowController@getbyid');
        $api->post('/delete', 'App\Http\Controllers\CashFlowController@destroy');
        $api->post('/update', 'App\Http\Controllers\CashFlowController@update');

    });

    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'report'], function($api){
        $api->post('/getDmrReport','App\Http\Controllers\ReportController@getDmrReport');
        $api->post('/container_status_report','App\Http\Controllers\ReportController@container_status_report');

    });
});
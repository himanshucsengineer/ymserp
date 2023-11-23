<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
        $api->post('/getbyid', 'App\Http\Controllers\MasterLineController@getbyid');
        $api->post('/delete', 'App\Http\Controllers\MasterLineController@destroy');
        $api->post('/update', 'App\Http\Controllers\MasterLineController@update');

        $api->get('/getall', 'App\Http\Controllers\MasterLineController@getall');

    }); 

    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'tarrif'], function($api){
        $api->post('/create','App\Http\Controllers\MasterTarrifController@store');
        $api->get('/get', 'App\Http\Controllers\MasterTarrifController@get');
        $api->post('/getbylineid', 'App\Http\Controllers\MasterTarrifController@getbylineid');
        $api->post('/getTarrifByLine', 'App\Http\Controllers\MasterTarrifController@getTarrifByLine');
        $api->post('/checktarrifbycode', 'App\Http\Controllers\MasterTarrifController@checktarrifbycode');
        $api->post('/checktarrifbydimention', 'App\Http\Controllers\MasterTarrifController@checktarrifbydimention');

        $api->post('/delete', 'App\Http\Controllers\MasterTarrifController@destroy');
        $api->post('/update', 'App\Http\Controllers\MasterTarrifController@update');
    });

    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'transport'], function($api){
        $api->post('/create','App\Http\Controllers\MasterTransportController@store');
        $api->post('/get', 'App\Http\Controllers\MasterTransportController@get');
        $api->post('/getbyid', 'App\Http\Controllers\MasterTransportController@getbyid');
        $api->post('/delete', 'App\Http\Controllers\MasterTransportController@destroy');
        $api->post('/update', 'App\Http\Controllers\MasterTransportController@update');
        $api->get('/getall', 'App\Http\Controllers\MasterTransportController@getall');

    });
    
    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'gatein'], function($api){
        $api->post('/create','App\Http\Controllers\GateInController@store');
        $api->get('/get', 'App\Http\Controllers\GateInController@get');
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

        $api->post('/filterByDateSurvey', 'App\Http\Controllers\GateInController@filterByDateSurvey');
        $api->post('/getInspectionDataSurvey', 'App\Http\Controllers\GateInController@getInspectionDataSurvey');

    });

    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'containerverify'], function($api){
        $api->post('/create','App\Http\Controllers\ContainerVerifyController@store');
        $api->post('/getbyid','App\Http\Controllers\ContainerVerifyController@getbyid');
    });

    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'transcation'], function($api){
        $api->post('/create','App\Http\Controllers\TransactionController@store');
        $api->post('/getbytarrif','App\Http\Controllers\TransactionController@getbytarrif');
        $api->post('/getbygatein','App\Http\Controllers\TransactionController@getbygatein');
        $api->post('/update', 'App\Http\Controllers\TransactionController@update');
        $api->post('/delete', 'App\Http\Controllers\TransactionController@destroy');

    });

    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'supervisor'], function($api){
        $api->post('/getInspectionDataSupervisor', 'App\Http\Controllers\GateInController@getInspectionDataSupervisor');
        $api->post('/filterByDateSupervisor', 'App\Http\Controllers\GateInController@filterByDateSupervisor');
        $api->post('/filterbystatus', 'App\Http\Controllers\GateInController@filterbystatus');

    });

    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'gateout'], function($api){
        $api->post('/create','App\Http\Controllers\GateoutController@store');
        $api->post('/truckEntryData', 'App\Http\Controllers\GateoutController@truckEntryData');
        $api->post('/get', 'App\Http\Controllers\GateoutController@get');
        $api->post('/getbyid', 'App\Http\Controllers\GateoutController@getbyid');
    
    });


    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'maintenance'], function($api){
        $api->post('/getInspectionDataRepair', 'App\Http\Controllers\GateInController@getInspectionDataRepair');
        $api->post('/filterByDateRepair', 'App\Http\Controllers\GateInController@filterByDateRepair');

    });

    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'outward'], function($api){
        $api->post('/filterByOutStatus', 'App\Http\Controllers\GateInController@filterByOutStatus');
        $api->post('/getInspectionDataOutStatus', 'App\Http\Controllers\GateInController@getInspectionDataOutStatus');
        $api->post('/create', 'App\Http\Controllers\OutwardOfficerController@store');
        $api->post('/get', 'App\Http\Controllers\OutwardOfficerController@get');
        $api->post('/genrateGatePass', 'App\Http\Controllers\OutwardOfficerController@genrateGatePass');

    });

});
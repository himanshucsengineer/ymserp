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
        $api->post('/getbyid', 'App\Http\Controllers\MasterContractorController@getbyid');
        $api->post('/delete', 'App\Http\Controllers\MasterContractorController@destroy');
        $api->post('/update', 'App\Http\Controllers\MasterContractorController@update');
    });


    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'category'], function($api){
        $api->post('/create','App\Http\Controllers\MasterCategoryController@store');
        $api->post('/get', 'App\Http\Controllers\MasterCategoryController@get');
        $api->post('/getbyid', 'App\Http\Controllers\MasterCategoryController@getbyid');
        $api->post('/delete', 'App\Http\Controllers\MasterCategoryController@destroy');
        $api->post('/update', 'App\Http\Controllers\MasterCategoryController@update');
    });

    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'depo'], function($api){
        $api->post('/create','App\Http\Controllers\MasterDepoController@store');
        $api->post('/get', 'App\Http\Controllers\MasterDepoController@get');
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
    });

    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'tarrif'], function($api){
        $api->post('/create','App\Http\Controllers\MasterTarrifController@store');
        $api->get('/get', 'App\Http\Controllers\MasterTarrifController@get');
        $api->post('/getbyid', 'App\Http\Controllers\MasterTarrifController@getbyid');
        $api->post('/getTarrifByLine', 'App\Http\Controllers\MasterTarrifController@getTarrifByLine');
        $api->post('/delete', 'App\Http\Controllers\MasterTarrifController@destroy');
        $api->post('/update', 'App\Http\Controllers\MasterTarrifController@update');
    });

    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'transport'], function($api){
        $api->post('/create','App\Http\Controllers\MasterTransportController@store');
        $api->post('/get', 'App\Http\Controllers\MasterTransportController@get');
        $api->post('/getbyid', 'App\Http\Controllers\MasterTransportController@getbyid');
        $api->post('/delete', 'App\Http\Controllers\MasterTransportController@destroy');
        $api->post('/update', 'App\Http\Controllers\MasterTransportController@update');
    });

    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'gatein'], function($api){
        $api->post('/create','App\Http\Controllers\GateInController@store');
        $api->get('/get', 'App\Http\Controllers\GateInController@get');
        $api->post('/getDataById', 'App\Http\Controllers\GateInController@getDataById');
        $api->post('/update', 'App\Http\Controllers\GateInController@update');

        $api->post('/getInspectionData', 'App\Http\Controllers\GateInController@getInspectionData');
    });

    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'containerverify'], function($api){
        $api->post('/create','App\Http\Controllers\ContainerVerifyController@store');
        $api->post('/getbyid','App\Http\Controllers\ContainerVerifyController@getbyid');
    });

    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'transcation'], function($api){
        $api->post('/create','App\Http\Controllers\TransactionController@store');
        $api->post('/getbytarrif','App\Http\Controllers\TransactionController@getbytarrif');

    });

});
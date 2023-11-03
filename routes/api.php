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


    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'contractor'], function($api){
        $api->post('/create','App\Http\Controllers\MasterContractorController@store');
        $api->get('/get', 'App\Http\Controllers\MasterContractorController@get');
    });


    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'category'], function($api){
        $api->post('/create','App\Http\Controllers\MasterCategoryController@store');
        $api->get('/get', 'App\Http\Controllers\MasterCategoryController@get');
    });

    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'depo'], function($api){
        $api->post('/create','App\Http\Controllers\MasterDepoController@store');
        $api->get('/get', 'App\Http\Controllers\MasterDepoController@get');
    });

    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'employee'], function($api){
        $api->post('/create','App\Http\Controllers\MasterEmployeeController@store');
        $api->get('/get', 'App\Http\Controllers\MasterEmployeeController@get');
    });

    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'user'], function($api){
        $api->post('/create','App\Http\Controllers\MasterUserController@store');
        $api->get('/get', 'App\Http\Controllers\MasterEmployeeController@index');
    });

    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'role'], function($api){
        $api->post('/create','App\Http\Controllers\RoleController@store');
        $api->get('/get', 'App\Http\Controllers\RoleController@get');
    });


    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'damage'], function($api){
        $api->post('/create','App\Http\Controllers\MasterDamageController@store');
        $api->get('/get', 'App\Http\Controllers\MasterDamageController@get');
    });

    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'repair'], function($api){
        $api->post('/create','App\Http\Controllers\MasterRepairController@store');
        $api->post('/get', 'App\Http\Controllers\MasterRepairController@get');
    });

    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'material'], function($api){
        $api->post('/create','App\Http\Controllers\MasterMaterialController@store');
        $api->post('/get', 'App\Http\Controllers\MasterMaterialController@get');
    });

    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'line'], function($api){
        $api->post('/create','App\Http\Controllers\MasterLineController@store');
        $api->get('/get', 'App\Http\Controllers\MasterLineController@get');
    });

    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'tarrif'], function($api){
        $api->post('/create','App\Http\Controllers\MasterTarrifController@store');
        $api->get('/get', 'App\Http\Controllers\MasterTarrifController@get');
    });

    $api->group([ 'middleware' => 'api.auth', 'prefix'=>'transport'], function($api){
        $api->post('/create','App\Http\Controllers\MasterTransportController@store');
        $api->get('/get', 'App\Http\Controllers\MasterTransportController@get');
    });

});
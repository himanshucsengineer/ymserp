<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index');
Route::get('/contractor/create', 'App\Http\Controllers\MasterContractorController@index');
Route::get('/category/create', 'App\Http\Controllers\MasterCategoryController@index');
Route::get('/employee/create', 'App\Http\Controllers\MasterEmployeeController@index');
Route::get('/user/create', 'App\Http\Controllers\MasterUserController@index');
Route::get('/depo/create', 'App\Http\Controllers\MasterDepoController@index');

Route::get('/repair/create', 'App\Http\Controllers\MasterRepairController@index');
Route::get('/material/create', 'App\Http\Controllers\MasterMaterialController@index');
Route::get('/damage/create', 'App\Http\Controllers\MasterDamageController@index');

Route::get('/line/create', 'App\Http\Controllers\MasterLineController@index');
Route::get('/transport/create', 'App\Http\Controllers\MasterTransportController@index');
Route::get('/tarrif/create', 'App\Http\Controllers\MasterTarrifController@index');

Route::get('/gatein/create', 'App\Http\Controllers\GateInController@index');
Route::get('/surveyor/inspection', 'App\Http\Controllers\GateInController@inspection');
Route::get('/surveyor/containershow', 'App\Http\Controllers\ContainerVerifyController@index');







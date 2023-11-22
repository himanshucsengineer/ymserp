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
Route::get('/contractor/all', 'App\Http\Controllers\MasterContractorController@all');

Route::get('/category/create', 'App\Http\Controllers\MasterCategoryController@index');
Route::get('/category/all', 'App\Http\Controllers\MasterCategoryController@all');

Route::get('/employee/create', 'App\Http\Controllers\MasterEmployeeController@index');
Route::get('/employee/all', 'App\Http\Controllers\MasterEmployeeController@all');

Route::get('/user/create', 'App\Http\Controllers\MasterUserController@index');
Route::get('/user/all', 'App\Http\Controllers\MasterUserController@all');

Route::get('/depo/create', 'App\Http\Controllers\MasterDepoController@index');
Route::get('/depo/all', 'App\Http\Controllers\MasterDepoController@all');

Route::get('/repair/create', 'App\Http\Controllers\MasterRepairController@index');
Route::get('/repair/all', 'App\Http\Controllers\MasterRepairController@all');

Route::get('/material/create', 'App\Http\Controllers\MasterMaterialController@index');
Route::get('/material/all', 'App\Http\Controllers\MasterMaterialController@all');

Route::get('/damage/create', 'App\Http\Controllers\MasterDamageController@index');
Route::get('/damage/all', 'App\Http\Controllers\MasterDamageController@all');

Route::get('/line/create', 'App\Http\Controllers\MasterLineController@index');
Route::get('/line/all', 'App\Http\Controllers\MasterLineController@all');

Route::get('/transport/create', 'App\Http\Controllers\MasterTransportController@index');
Route::get('/transport/all', 'App\Http\Controllers\MasterTransportController@all');

Route::get('/tarrif/create', 'App\Http\Controllers\MasterTarrifController@index');
Route::get('/tarrif/all', 'App\Http\Controllers\MasterTarrifController@all');

Route::get('/role/create', 'App\Http\Controllers\RoleController@index');
Route::get('/role/all', 'App\Http\Controllers\RoleController@all');

Route::get('/permission/create', 'App\Http\Controllers\PermissionController@index');
Route::get('/permission/all', 'App\Http\Controllers\PermissionController@all');


Route::get('/gatein/create', 'App\Http\Controllers\GateInController@index');

Route::get('/surveyor/reports', 'App\Http\Controllers\GateInController@reports');
Route::get('/inward/executive', 'App\Http\Controllers\GateInController@inward_executive');

Route::get('/surveyor/inspection', 'App\Http\Controllers\GateInController@inspection');
Route::get('/surveyor/containershow', 'App\Http\Controllers\ContainerVerifyController@index');
Route::get('/inward/executiveshow', 'App\Http\Controllers\ContainerVerifyController@executiveshow');
Route::get('/surveyor/masterserveyor', 'App\Http\Controllers\ContainerVerifyController@masterserveyor');

Route::get('/genrateastimate', 'App\Http\Controllers\PdfController@genrateastimate');
Route::get('/supervisor/inspection', 'App\Http\Controllers\GateInController@supervisor_inspection');

Route::get('/maintenance/view', 'App\Http\Controllers\GateInController@maintenance_view');
Route::get('/maintenance/manage', 'App\Http\Controllers\GateInController@maintenance_manage');

Route::get('/gateout/create', 'App\Http\Controllers\GateoutController@index');

Route::get('/outward/view', 'App\Http\Controllers\OutwardOfficerController@index');
Route::get('/outward/manage', 'App\Http\Controllers\OutwardOfficerController@manage');

Route::get('/print/outward', 'App\Http\Controllers\OutwardOfficerController@outward_print');
Route::get('/print/thirdparty', 'App\Http\Controllers\OutwardOfficerController@thirdparty');
Route::get('/print/line', 'App\Http\Controllers\OutwardOfficerController@line');

Route::get('/print/gatepass', 'App\Http\Controllers\OutwardOfficerController@gatepass_print');

Route::get('/billing/invoice', 'App\Http\Controllers\OutwardOfficerController@invoice_view');
Route::get('/billing/centeral', 'App\Http\Controllers\OutwardOfficerController@centeral_view');








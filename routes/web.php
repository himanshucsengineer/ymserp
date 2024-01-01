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
Route::get('/inward/reports', 'App\Http\Controllers\GateInController@inward_reports');

Route::get('/inward/executive', 'App\Http\Controllers\GateInController@inward_executive');

Route::get('/surveyor/inspection', 'App\Http\Controllers\GateInController@inspection');

Route::get('/surveyor/containershow', 'App\Http\Controllers\GateInController@containershow');
Route::get('/inward/executiveshow', 'App\Http\Controllers\GateInController@executiveshow');
Route::get('/surveyor/masterserveyor', 'App\Http\Controllers\GateInController@masterserveyor');

Route::get('/genrateastimate', 'App\Http\Controllers\PdfController@genrateastimate');
Route::get('/supervisor/inspection', 'App\Http\Controllers\GateInController@supervisor_inspection');

Route::get('/maintenance/view', 'App\Http\Controllers\GateInController@maintenance_view');
Route::get('/maintenance/reports', 'App\Http\Controllers\GateInController@maintenance_report');
Route::get('/maintenance/manage', 'App\Http\Controllers\GateInController@maintenance_manage');

Route::get('/outward/view', 'App\Http\Controllers\OutwardOfficerController@index');
Route::get('/outward/manage', 'App\Http\Controllers\OutwardOfficerController@manage');

Route::get('/print/outward', 'App\Http\Controllers\OutwardOfficerController@outward_print');
Route::get('/print/thirdparty', 'App\Http\Controllers\OutwardOfficerController@thirdparty');
Route::get('/print/line', 'App\Http\Controllers\OutwardOfficerController@line');

Route::get('/print/gatepass', 'App\Http\Controllers\OutwardOfficerController@gatepass_print');

Route::get('/print/printestimate', 'App\Http\Controllers\GateInController@printestimate');


Route::get('/billing/invoice', 'App\Http\Controllers\OutwardOfficerController@invoice_view');
Route::get('/billing/centeral', 'App\Http\Controllers\OutwardOfficerController@centeral_view');

Route::get('/vendor/create', 'App\Http\Controllers\VendorMasterController@index');
Route::get('/vendor/all', 'App\Http\Controllers\VendorMasterController@view');

Route::get('/location/create', 'App\Http\Controllers\LocationCodeController@index');
Route::get('/location/all', 'App\Http\Controllers\LocationCodeController@view');


Route::get('/preadvice/create', 'App\Http\Controllers\PreAdviceController@index');
Route::get('/preadvice/all', 'App\Http\Controllers\PreAdviceController@view');
Route::get('/preadvise/list', 'App\Http\Controllers\DoContainerController@index');

Route::get('/product_category/create', 'App\Http\Controllers\CategoryMasterController@index');
Route::get('/product_category/all', 'App\Http\Controllers\CategoryMasterController@all');

Route::get('/gateout/create', 'App\Http\Controllers\GateInController@gateoutindex');

Route::get('/doblock/create', 'App\Http\Controllers\DoBlockController@index');
Route::get('/doblock/all', 'App\Http\Controllers\DoBlockController@all');

Route::get('/pti/create', 'App\Http\Controllers\PTIController@index');
Route::get('/pti/all', 'App\Http\Controllers\PTIController@all');

Route::get('/report/container', 'App\Http\Controllers\ReportController@container_report_view');
Route::get('/report/dmr', 'App\Http\Controllers\ReportController@dmr_report_view');
Route::get('/report/container-status', 'App\Http\Controllers\ReportController@container_status_report_view');

Route::get('/cashflow/create', 'App\Http\Controllers\CashFlowController@index');
Route::get('/cashflow/all', 'App\Http\Controllers\CashFlowController@all');

Route::get('/account/create', 'App\Http\Controllers\AccountManagementController@index');
Route::get('/account/all', 'App\Http\Controllers\AccountManagementController@all');
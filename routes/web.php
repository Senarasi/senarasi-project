<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('auth.login');
// });

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/dashboard-main', [App\Http\Controllers\DashboardController::class, 'dashboardmain'])->name('dashboard.main');
    Route::get('/dashboard-budget', [App\Http\Controllers\DashboardController::class, 'dashboardbudget'])->name('dashboard.budget');

    Route::resource('budget', 'App\Http\Controllers\BudgetController');
    Route::post('/budget/store', 'App\Http\Controllers\BudgetController@store')->name('budget.store');

    Route::resource('request-budget', 'App\Http\Controllers\RequestBudgetController');
    Route::get('/get-monthly-budget', [App\Http\Controllers\RequestBudgetController::class, 'getMonthlyBudget'])->name('getMonthlyBudget');
    Route::get('/request-budget/performer/{id}', [App\Http\Controllers\RequestBudgetController::class, 'performer'])->name('request-budget.performer');
    Route::get('/request-budget/productioncrew/{id}', [App\Http\Controllers\RequestBudgetController::class, 'productioncrew'])->name('request-budget.productioncrew');
    Route::get('/request-budget/productiontool/{id}', [App\Http\Controllers\RequestBudgetController::class, 'productiontool'])->name('request-budget.productiontool');
    Route::get('/request-budget/operational/{id}', [App\Http\Controllers\RequestBudgetController::class, 'operational'])->name('request-budget.operational');
    Route::get('/request-budget/location/{id}', [App\Http\Controllers\RequestBudgetController::class, 'location'])->name('request-budget.location');
    Route::get('/request-budget/preview/{id}', [App\Http\Controllers\RequestBudgetController::class, 'preview'])->name('request-budget.preview');
    Route::get('/request-budget/preview/{id}/view', [App\Http\Controllers\RequestBudgetController::class, 'report'])->name('request-budget.report');

    Route::resource('performer', 'App\Http\Controllers\PerformerController');
    Route::get('/get-performer-price', [App\Http\Controllers\PerformerController::class, 'getPerformerPrice'])->name('getPerformerPrice');
    Route::resource('production-crew', 'App\Http\Controllers\ProductionCrewController');
    Route::resource('production-tool', 'App\Http\Controllers\ProductionToolController');
    Route::get('/fetch-types', [App\Http\Controllers\ProductionToolController::class, 'fetchTypes'])->name('fetchTypes');
    Route::get('/fetch-tools', [App\Http\Controllers\ProductionToolController::class, 'fetchTools'])->name('fetchTools');
    Route::get('/fetch-price', [App\Http\Controllers\ProductionToolController::class, 'fetchPrice'])->name('fetchPrice');
    Route::get('/fetch-tool-price', 'App\Http\Controllers\ProductionToolControllerr@fetchToolPrice')->name('fetchToolPrice');
    Route::resource('operational', 'App\Http\Controllers\OperationalController');
    Route::resource('location', 'App\Http\Controllers\LocationController');
    Route::resource('preview', 'App\Http\Controllers\PreviewController');


    Route::get('/approval', function () {
        return view('approval.index');
    });

    Route::get('/report', function () {
        return view('report.index');
    });

    Route::get('/approval-detail', function () {
        return view('approval.detail');
    });

    Route::get('/detail-budget', function () {
        return view('requestbudget.index');
    });

    Route::get('/detail-request', function () {
        return view('requestbudget.detail');
    });

    Route::resource('department', 'App\Http\Controllers\DepartmentController');
    Route::post('/department/store', 'App\Http\Controllers\DepartmentController@store')->name('department.store');

    Route::resource('employee', 'App\Http\Controllers\EmployeeController');
    Route::post('/employee/store', 'App\Http\Controllers\EmployeeController@store')->name('employee.store');
    Route::post('/get-current-position', [App\Http\Controllers\AjaxController::class, 'getcurrentposition'])->name('ajax.getcurrentposition');
    Route::post('/get-position-from-department', [App\Http\Controllers\AjaxController::class, 'getpositionfromdepartment'])->name('ajax.getpositionfromdepartment');

    Route::get('/vendor', function () {
        return view('vendor.index');
    });
    Route::resource('vendor', 'App\Http\Controllers\VendorController');

    Route::get('/vendor-edit', function () {
        return view('vendor.edit');
    });

    Route::get('/category', function () {
        return view('category.index');
    });

    Route::get('/transport-request/create', function () {
        return view('transportrequest.create');
    });

    Route::get('/approval-transportvoucher', function () {
        return view('approvaltransportvoucher.index');
    });

    Route::get('approval-transportvoucher/detail', function () {
        return view('approvaltransportvoucher.detail');
    });

    Route::get('/voucher-transportrequest', function () {
        return view('vouchertransportrequest.index');
    });

    Route::get('/voucher-transportrequest/create', function () {
        return view('vouchertransportrequest.create');
    });

    Route::get('/sop', function () {
        return view('sop.index');
    });
    Route::get('/sop-detail', function () {
        return view('sop.detail');
    });

    Route::get('/payment-request', function () {
        return view('paymentrequest.index');
    });

    Route::get('/testhome', function () {
        return view('testhome');
    });

    Route::get('/transport-request', function () {
        return view('transportrequest.index');
    });

    Route::get('/booking-room', function () {
        return view('bookingroom.index');
    });

    Route::get('/booking-room/create', function () {
        return view('bookingroom.create');
    });

    Route::get('/booking-room/list', function () {
        return view('bookingroom.list');
    });

    Route::get('/manage-room', function () {
        return view('bookingroom.manage-room');
    });

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // Other protected routes
});

// Route::get('/dashboard-main', function () {
//     return view('dashboard.main');
// });

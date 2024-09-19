<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApprovalController;
use App\Models\Approval;

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
    Route::get('/map', [App\Http\Controllers\MapController::class, 'index']);

    Route::resource('budget', 'App\Http\Controllers\Budget\BudgetProgramController');
    Route::post('/budget/store', 'App\Http\Controllers\Budget\BudgetProgramController@store')->name('budget.store');



    Route::resource('approval', ApprovalController::class);
    Route::get('/approval/{id}/view', [ApprovalController::class, 'report'])->name('approval.report');
    Route::post('/approval/{id}/approve', [ApprovalController::class, 'approve'])->name('approval.approve');
    Route::get('/approval/{id}/reject-view', [ApprovalController::class, 'rejectview'])->name('approval.rejectview');
    Route::post('/approval/{id}/reject', [ApprovalController::class, 'submitReject'])->name('approval.submitReject');

    Route::resource('request-budget', 'App\Http\Controllers\RequestBudgetController');
    Route::get('/get-monthly-budget', [App\Http\Controllers\RequestBudgetController::class, 'getMonthlyBudget'])->name('getMonthlyBudget');
    Route::get('/get-budget-data', [App\Http\Controllers\RequestBudgetController::class, 'getBudgetData'])->name('get-budget-data');
    Route::get('/request-budget/performer/{id}', [App\Http\Controllers\RequestBudgetController::class, 'performer'])->name('request-budget.performer');
    Route::get('/request-budget/productioncrew/{id}', [App\Http\Controllers\RequestBudgetController::class, 'productioncrew'])->name('request-budget.productioncrew');
    Route::get('/request-budget/productiontool/{id}', [App\Http\Controllers\RequestBudgetController::class, 'productiontool'])->name('request-budget.productiontool');
    Route::get('/request-budget/operational/{id}', [App\Http\Controllers\RequestBudgetController::class, 'operational'])->name('request-budget.operational');
    Route::get('/request-budget/location/{id}', [App\Http\Controllers\RequestBudgetController::class, 'location'])->name('request-budget.location');
    Route::get('/request-budget/preview/{id}', [App\Http\Controllers\RequestBudgetController::class, 'preview'])->name('request-budget.preview');
    Route::get('/request-budget/preview/{id}/view', [App\Http\Controllers\RequestBudgetController::class, 'report'])->name('request-budget.report');
    Route::delete('request-budget/{id}', [App\Http\Controllers\RequestBudgetController::class, 'destroy'])->name('request-budget.destroy');

    Route::get('/requestpayment', function () {
        return view('requestbudget.payment.index');
    });

    Route::get('/requestpayment-create', function () {
        return view('requestbudget.payment.create');
    });

    Route::get('/requestpayment-description', function () {
        return view('requestbudget.payment.description');
    });

    Route::get('/requestpurchase', function () {
        return view('requestbudget.purchase.index');
    });

    Route::get('/requestpurchase-create', function () {
        return view('requestbudget.purchase.create');
    });

    Route::get('/requestpurchase-description', function () {
        return view('requestbudget.purchase.description');
    });

    Route::get('/requestadvance', function () {
        return view('requestbudget.advance.index');
    });

    Route::get('/requestadvance-create', function () {
        return view('requestbudget.advance.create');
    });

    Route::get('/requestadvance-description', function () {
        return view('requestbudget.advance.description');
    });



    Route::resource('performer', 'App\Http\Controllers\PerformerController');
    Route::get('/get-performer-price', [App\Http\Controllers\PerformerController::class, 'getPerformerPrice'])->name('getPerformerPrice');
    Route::resource('production-crew', 'App\Http\Controllers\ProductionCrewController');
    Route::get('/get-position-details/{id}', [App\Http\Controllers\ProductionCrewController::class, 'getPositionDetails']);
    Route::resource('production-tool', 'App\Http\Controllers\ProductionToolController');
    Route::get('/fetch-types', [App\Http\Controllers\ProductionToolController::class, 'fetchTypes'])->name('fetchTypes');
    Route::get('/fetch-tools', [App\Http\Controllers\ProductionToolController::class, 'fetchTools'])->name('fetchTools');
    Route::get('/fetch-price', [App\Http\Controllers\ProductionToolController::class, 'fetchPrice'])->name('fetchPrice');
    Route::get('/fetch-tool-price', 'App\Http\Controllers\ProductionToolControllerr@fetchToolPrice')->name('fetchToolPrice');
    Route::resource('operational', 'App\Http\Controllers\OperationalController');
    Route::resource('location', 'App\Http\Controllers\LocationController');
    Route::resource('preview', 'App\Http\Controllers\PreviewController');

    Route::prefix('company-document')->name('company-document.')->group(function () {
        Route::controller(App\Http\Controllers\CompanyDocumentController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            // Route::get('/dashboard', 'dashboard')->name('dashboard');
            Route::post('/store', 'store')->name('store');
            Route::delete('/{docCategory}', 'destroy')->name('destroy');
        });
        Route::controller(App\Http\Controllers\DocumentController::class)->group(function () {
            Route::get('/{docCategory}/list', 'index')->name('detail');
            Route::get('/{docCategory}/create', 'create')->name('create');
            Route::get('/{docCategory}/{doc}/view', 'view')->name('view');
            Route::post('/{docCategory}/store', 'store')->name('storeUpload');
            Route::get('/{docCategory}/{doc}/edit', 'edit')->name('edit');
            Route::put('/{docCategory}/{doc}/update', 'update')->name('updateFile');
            Route::delete('/{docCategory}/{doc}', 'destroy')->name('destroyFile');
            Route::get('/{docCategory}/{doc}/{supportingDoc}/view', 'supportingView')->name('supporting-doc.view');
        });
    });

    // Route::get('/approval', function () {
    //     return view('approval.index');
    // });

    Route::get('/report', function () {
        return view('report.index');
    });

    Route::get('/approval-detail', function () {
        return view('approval.detail');
    });

    // Route::get('/detail-budget', function () {
    //     return view('requestbudget.program.index');
    // });

    Route::get('/detail-request', function () {
        return view('requestbudget.detail');
    });

    Route::resource('department', 'App\Http\Controllers\DepartmentController');
    Route::post('/department/store', 'App\Http\Controllers\DepartmentController@store')->name('department.store');

    Route::resource('employee', 'App\Http\Controllers\EmployeeController');
    Route::post('/employee/store', 'App\Http\Controllers\EmployeeController@store')->name('employee.store');
    Route::post('/get-current-position', [App\Http\Controllers\AjaxController::class, 'getcurrentposition'])->name('ajax.getcurrentposition');
    Route::post('/get-position-from-department', [App\Http\Controllers\AjaxController::class, 'getpositionfromdepartment'])->name('ajax.getpositionfromdepartment');

    // Route::get('/vendor', function () {
    //     return view('vendor.index');
    // });
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

    Route::get('/payment-request', function () {
        return view('paymentrequest.index');
    });

    Route::get('/testhome', function () {
        return view('testhome');
    });

    Route::get('/transport-request', function () {
        return view('transportrequest.index');
    });

    Route::prefix('manage-rooms')->controller(App\Http\Controllers\RoomController::class)->name('manage-rooms.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{room}/edit', 'edit')->name('edit');
        Route::patch('/{room}/update', 'update')->name('update');
        Route::delete('/{room}', 'destroy')->name('destroy');
    });

    Route::prefix('bookingroom')->controller(App\Http\Controllers\BookingController::class)->name('bookingroom.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/list', 'list')->name('list');
        Route::get('/{room}', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('{booking}/edit', 'edit')->name('edit');
        Route::patch('/{booking}/update', 'update')->name('update');
        Route::get('/{booking}/confirmDelete', 'confirmDelete')->name('confirmDelete');
        Route::delete('/{booking}', 'destroy')->name('destroy');
    });

    Route::get('/getevents', [App\Http\Controllers\CalendarController::class, 'getevents']);
    Route::get('/auth/google/callback', [App\Http\Controllers\GoogleController::class, 'handleProviderCallback'])->name('google.callback');
    Route::get('/google/calendar/auth', [App\Http\Controllers\GoogleController::class, 'startGoogleAuth'])->name('google.calendar.auth');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::prefix('announcement')->controller(App\Http\Controllers\AnnouncementController::class)->name('announcement.')->group(function () {
        // Route::get('/', 'index')->name('index');
        // Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        // Route::get('{announcement}/edit', 'edit')->name('edit');
        Route::patch('/{announcement}/update', 'update')->name('update');
        Route::delete('/{announcement}', 'destroy')->name('destroy');
    });



    // Other protected routes
});

// Route::get('/dashboard-main', function () {
//     return view('dashboard.main');
// });

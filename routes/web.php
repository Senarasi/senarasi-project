<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\DepartmentBudgetController;
use App\Http\Controllers\DepartmentRequestPaymentController;
use App\Http\Controllers\DepartmentPaymentApprovalController;
use App\Http\Controllers\DepartmentRequestPaymentItemController;
use App\Http\Controllers\ReportDepartmentPaymentController;
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

    // Route::resource('', App\Http\Controllers\AuditLaptopController::class);
    Route::resource('audit_laptop', 'App\Http\Controllers\AuditLaptopController');

    Route::get('/admin', function () {
        return view('admin.index');
    })->name('admin');

    Route::get('/announcement', function () {
        return view('admin.hc.announcement.index');
    })->name('announcement');

    Route::get('/announcement-detail', function () {
        return view('admin.hc.announcement.detail');
    })->name('announcementdetail');

    Route::get('/admin-department', function () {
        return view('admin.hc.department.index');
    })->name('department');

    Route::get('/admin-department-edit', function () {
        return view('admin.hc.department.edit');
    })->name('departmentedit');

    Route::get('/admin-employee', function () {
        return view('admin.hc.employee.index');
    })->name('employee');

    Route::get('/admin-procurement', function () {
        return view('admin.procurement.index');
    })->name('procurement');

    Route::get('/admin-procurement-items', function () {
        return view('admin.procurement.itemvendor.index');
    })->name('procurementitems');

    Route::get('/admin-procurement-edit', function () {
        return view('admin.procurement.itemvendor.edit');
    })->name('procurementedit');

    Route::get('/admin-procurement-create', function () {
        return view('admin.procurement.itemvendor.create');
    })->name('procurementcreate');

    Route::get('/admin-finance-department', function () {
        return view('admin.finance.department');
    })->name('financedepartment');

    Route::get('/admin-finance-program', function () {
        return view('admin.finance.program');
    })->name('financeprogram');

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/dashboard-main', [App\Http\Controllers\DashboardController::class, 'dashboardmain'])->name('dashboard.main');
    Route::get('/dashboard-budget', [App\Http\Controllers\DashboardController::class, 'dashboardbudget'])->name('dashboard.budget');

    Route::middleware(['role:admin'])->group(function () {
        Route::get('/map', [App\Http\Controllers\MapController::class, 'index']);
        Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
    });

    Route::middleware(['role:admin, ceo, finance'])->group(function () {
        Route::resource('budget', 'App\Http\Controllers\Budget\BudgetProgramController');
        Route::post('/budget/store', 'App\Http\Controllers\Budget\BudgetProgramController@store')->name('budget.store');
    });

    Route::middleware(['role:admin, ceo, vp, manager'])->group(function () {
        Route::resource('approval', ApprovalController::class)->except(['create', 'edit']);
        Route::get('approval/{id}/view', [ApprovalController::class, 'view'])->name('approval.view');
        Route::post('approval/{id}/approve', [ApprovalController::class, 'approve'])->name('approval.approve');
        Route::get('approval/{id}/reject-view', [ApprovalController::class, 'rejectview'])->name('approval.rejectview');
        Route::post('approval/{id}/reject', [ApprovalController::class, 'submitReject'])->name('approval.submitReject');
    });

    Route::get('/unauthorized', function () {
        return view('errors.unauthorized');
    })->name('unauthorized');

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
    Route::get('/downloadpdf/{id}', [App\Http\Controllers\ReportController::class, 'down'])->name('report.download');

    Route::prefix('budgeting-system')->group(function () {
        Route::prefix('budget-department')->controller(DepartmentBudgetController::class)->name('budget.department.')->group(function () {
            Route::get('/', 'index')->name('index');
            // Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            // Route::get('{departmentYearlyBudget}/edit', 'edit')->name('edit');
            Route::patch('/{departmentYearlyBudget}/update', 'update')->name('update');
            Route::delete('/{departmentYearlyBudget}', 'destroy')->name('destroy');
        });

        // request budget department

        // Route::prefix('request-budget-department')->controller(DepartmentRequestPaymentController::class)->name('request-budget-department.')->group(function () {
        Route::prefix('request-budget-department')->name('request-budget-department.')->group(function () {

            Route::prefix('payment')->controller(DepartmentRequestPaymentController::class)->name('payment.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::get('/{departmentRequestPayment}/edit', 'edit')->name('edit');
                Route::patch('/{departmentRequestPayment}/update', 'update')->name('update');
                Route::post('/store', 'store')->name('store');
                Route::get('/{departmentRequestPayment}/detail', 'detail')->name('detail');
                Route::delete('/{departmentRequestPayment}', 'destroy')->name('destroy');
                // Route::get('/description/{departmentRequestPayment}', 'description')->name('description');
                Route::get('/get-budget-names/{department_id}', 'getBudgetNames')->name('get-budget-names');
                Route::get('/get-budget-code', 'getBudgetCode')->name('get-budget-code');
                Route::get('/{departmentRequestPayment}/view', 'viewPdf')->name('viewPdf');
                Route::get('/{departmentRequestPayment}/export', 'exportPdf')->name('exportPdf');
                Route::post('/{departmentRequestPayment}/duplicate', 'duplicate')->name('duplicate');
            });

            Route::prefix('payment')->controller(DepartmentRequestPaymentItemController::class)->name('payment.')->group(function () {
                Route::get('/description/{departmentRequestPayment}', 'index')->name('description');
                Route::post('/description/store', 'store')->name('description.store');
                Route::patch('/description/{item}/update', 'update')->name('description.update');
                Route::delete('description/{item}', 'destroy')->name('description.destroy');
                Route::patch('{departmentRequestPayment}/submit', 'submit')->name('submit');
                Route::get('/{departmentRequestPayment}/mail', 'mail')->name('mail');
            });
        });

        // approval budget department
        Route::prefix('approval-budget-department')->name('approval-budget-department.')->group(function () {
            Route::prefix('payment')->controller(DepartmentPaymentApprovalController::class)->name('payment.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/reject', function () {
                    return view('approval.department.payment.reject');
                })->name('reject');
                Route::get('{departmentRequestPayment}/detail', 'detail')->name('detail');
                Route::post('{departmentRequestPayment}/approve', 'approve')->name('approve');
                Route::post('{departmentRequestPayment}/reject', 'reject')->name('reject');
            });
        });

        // report budget department
        Route::prefix('report-budget-department')->name('report-budget-department.')->group(function () {
            Route::prefix('payment')->controller(ReportDepartmentPaymentController::class)->name('payment.')->group(function () {
                // Route::get('/', function () { return view('report.department.payment.index'); })->name('index');
                Route::get('/', 'index')->name('index');
                Route::get('/{departmentRequestPayment}/view', 'viewPdf')->name('viewPdf');
            });
        });
    });

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


    // Route::middleware(['role:admin, hc'])->group(function () {
    Route::resource('department', 'App\Http\Controllers\DepartmentController');
    Route::post('/department/store', 'App\Http\Controllers\DepartmentController@store')->name('department.store');

    Route::resource('employee', 'App\Http\Controllers\EmployeeController');
    Route::post('/employee/store', 'App\Http\Controllers\EmployeeController@store')->name('employee.store');
    Route::post('/get-current-position', [App\Http\Controllers\AjaxController::class, 'getcurrentposition'])->name('ajax.getcurrentposition');
    Route::post('/get-position-from-department', [App\Http\Controllers\AjaxController::class, 'getpositionfromdepartment'])->name('ajax.getpositionfromdepartment');
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

    Route::middleware(['role:admin, hc'])->group(function () {
        Route::prefix('announcement')->controller(App\Http\Controllers\AnnouncementController::class)->name('announcement.')->group(function () {
            // Route::get('/', 'index')->name('index');
            // Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            // Route::get('{announcement}/edit', 'edit')->name('edit');
            Route::patch('/{announcement}/update', 'update')->name('update');
            Route::delete('/{announcement}', 'destroy')->name('destroy');
        });
    });

    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    // Other protected routes
});

// Route::get('/dashboard-main', function () {
//     return view('dashboard.main');
// });

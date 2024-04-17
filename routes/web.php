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

    Route::resource('requestbudget', 'App\Http\Controllers\RequestBudgetController');

    Route::get('/create-budget', function () {
        return view('requestbudget.create');
    });

    Route::get('/approval', function () {
        return view('approval.index');
    });

    Route::get('/approval-detail', function () {
        return view('approval.detail');
    });

    Route::get('/detail-budget', function () {
        return view('requestbudget.index');
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

    Route::get('/vendor-edit', function () {
        return view('vendor.edit');
    });



    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // Other protected routes
});

// Route::get('/dashboard-main', function () {
//     return view('dashboard.main');
// });

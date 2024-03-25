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

// Route::get('/dashboard-main', function () {
//     return view('dashboard.main');
// });

Route::get('/dashboard-main', [App\Http\Controllers\DashboardController::class, 'dashboardmain'])->name('dashboard.main');
Route::get('/dashboard-budget', [App\Http\Controllers\DashboardController::class, 'dashboardbudget'])->name('dashboard.budget');

Route::resource('budget', 'App\Http\Controllers\BudgetController');
Route::post('/budget/store', 'App\Http\Controllers\BudgetController@store')->name('budget.store');

// Route::get('/create-budget', function () {
//     return view('budget.create');
// });

Route::get('/approval', function () {
    return view('approval.index');
});

Route::get('/approval-detail', function () {
    return view('approval.detail');
});

Route::get('/detail-budget', function () {
    return view('budget.index');
});

Route::resource('department', 'App\Http\Controllers\DepartmentController');
Route::post('/department/store', 'App\Http\Controllers\DepartmentController@store')->name('department.store');

Route::get('/karyawan', function () {
    return view('employee.index');
});

Route::get('/vendor', function () {
    return view('vendor.index');
});

Route::get('/vendor-edit', function () {
    return view('vendor.edit');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

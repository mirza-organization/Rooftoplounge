<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;
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
Route::middleware('auth')->group(function () {
    Route::middleware('admin_guard')->prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/employees', [AdminController::class, 'employees'])->name('admin.employees');
        Route::get('/order', [AdminController::class, 'orders'])->name('admin.orders');
        Route::resource('/menu-items', ProductController::class);
        Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
        Route::post('/update-admin', [AdminController::class, 'update_admin'])->name('admin.update');
        Route::post('/update-password', [AdminController::class, 'update_admin_password'])->name('admin.update_password');
    });

    Route::middleware('emp_guard')->prefix('emp')->group(function () {
        Route::get('/dashboard', [EmployeeController::class, 'index'])->name('emp.index');
        Route::get('/order', [EmployeeController::class, 'orders'])->name('emp.orders');
        Route::get('/profile', [EmployeeController::class, 'profile'])->name('emp.profile');
        Route::post('/update-employee', [EmployeeController::class, 'update_emp'])->name('emp.update');
        Route::post('/update-password', [EmployeeController::class, 'update_emp_password'])->name('emp.update_password');
    });
});

require __DIR__ . '/auth.php';

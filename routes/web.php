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
        Route::get('/menu-item', [AdminController::class, 'menu_items'])->name('admin.menu-items');
        Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
        Route::post('/update-admin', [AdminController::class, 'update_admin'])->name('admin.update');
        Route::post('/update-password', [AdminController::class, 'update_admin_password'])->name('admin.update_password');
    });

    Route::middleware('emp_guard')->prefix('emp')->group(function () {
        Route::get('/dashboard', [EmployeeController::class, 'index']);
    });

    Route::resource('/products', ProductController::class);
});

require __DIR__ . '/auth.php';

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
// Route::get('register', [RegisteredUserController::class, 'create'])
// ->name('register');

Route::middleware('auth')->group(function () {

    Route::middleware('admin_guard')->prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index']);
    });

    Route::middleware('emp_guard')->prefix('emp')->group(function () {
        Route::get('/dashboard', [EmployeeController::class, 'index']);
    });

    Route::resource('/products', ProductController::class);
});

require __DIR__ . '/auth.php';

<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
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

// Route::get('emp/dashboard', function () {
//     return view('employee/index');
// })->middleware(['auth'])->name('emp.dashboard');

Route::middleware('auth')->group(function () {

    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index']);
    });

    Route::prefix('emp')->group(function () {
        Route::get('/dashboard', [EmployeeController::class, 'index']);
    });

});

require __DIR__.'/auth.php';



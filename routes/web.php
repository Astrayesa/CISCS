<?php

use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\AuthController;
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
    return view('welcome');
});

Route::prefix("/admin")->name('admin.')->group(function () {
    Route::middleware("auth")->group(function () {
        Route::get('/', [AdminDashboard::class, 'index'])->name('dashboard');
        Route::resource("department", DepartmentController::class);
        Route::resource("user", DepartmentController::class);

        Route::post('logout', [AuthController::class, 'destroy'])->name("logout");
    });
});

Route::get("login", [AuthController::class, 'index'])->middleware('guest')->name("login");
Route::post("login", [AuthController::class, 'store'])->middleware('guest');
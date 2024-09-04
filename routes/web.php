<?php

use App\Http\Controllers\{AuthController, DashboardController, RoleController, UserController};
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('login');
});
Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'index'])->name('login.index');
    Route::post('/login', [AuthController::class, 'login'])->name('login');

});
Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');


/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    Route::get('/admin/login', [LoginController::class, 'showLoginForm'])
        ->name('login');

    Route::post('/admin/login', [LoginController::class, 'login'])
        ->name('login.check');

    Route::get('/admin/register', [RegisterController::class, 'showRegisterForm'])
        ->name('register');

    Route::post('/admin/register', [RegisterController::class, 'store'])
        ->name('register.store');
});

/*
|--------------------------------------------------------------------------
| Protected Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/admin/dashboard', function () {
        return view('dashboard/index');
    })->name('dashboard');


    // Logout
    Route::post('/admin/logout', [LogoutController::class, 'logout'])->name('logout');
});

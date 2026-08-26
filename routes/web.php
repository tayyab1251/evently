<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Events\EventController;
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

Route::prefix('admin')->name('admin.')->middleware('guest')->group(function () {

        Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

        Route::post('/login', [LoginController::class, 'login'])->name('login.check');

        Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');

        Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
    });

/*
|--------------------------------------------------------------------------
| Protected Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'loadLatestEvents'])->name('dashboard');

    Route::resource('events', EventController::class);

    // Logout
    Route::post('logout', [LogoutController::class, 'logout'])->name('logout');
});

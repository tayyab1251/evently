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

    Route::get('/dashboard', function () {
        return view('dashboard/index');
    })->name('dashboard');

    // Events
    Route::get('/events', function () {
        return view('dashboard/events/index');
    })->name('events');

    // Logout
    Route::post('logout', [LogoutController::class, 'logout'])->name('logout');
});

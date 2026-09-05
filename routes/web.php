<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Events\EventController;
use App\Http\Controllers\Site\Auth\UserLoginController;
use App\Http\Controllers\Site\Auth\UserLogoutController;
use App\Http\Controllers\Site\Auth\UserRegisterController;
use App\Http\Controllers\Site\HomePageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomePageController::class, 'getFeaturedEvents'])
    ->name('home');

Route::get('/event/details/{id}', [HomePageController::class, 'getEventDetails'])
    ->name('details');


/*
|--------------------------------------------------------------------------
| User Authentication Routes
|--------------------------------------------------------------------------
*/

// User Register
Route::get('/register', [UserRegisterController::class, 'showUserRegisterForm'])
    ->name('user.register');

Route::post('/register', [UserRegisterController::class, 'store'])
    ->name('user.register.store');


// User Login
Route::get('/login', [UserLoginController::class, 'showUserLoginForm'])
    ->name('user.login');

Route::post('/login', [UserLoginController::class, 'userLogin'])
    ->name('user.login.check');


// User Logout
Route::get('/logout', [UserLogoutController::class, 'userLogout'])
    ->name('user.logout');



/*
|--------------------------------------------------------------------------
| Checkout Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::post('/checkout', [HomePageController::class, 'checkout'])
        ->name('checkout');

    // Success page
    Route::get('/checkout/success', [HomePageController::class, 'success'])
        ->name('checkout.success');
});

Route::get('/stripe-test/cancel', function () {
    return 'Payment cancelled!';
});

/*
|--------------------------------------------------------------------------
| User Protected Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/test', function(){
        dd(auth()->user()->role);
    });

    // Admin Dashboard
    Route::get('/dashboard', [DashboardController::class, 'loadLatestEvents'])
        ->name('admin.dashboard');
});


/*
|--------------------------------------------------------------------------
| Admin Authentication Routes
|--------------------------------------------------------------------------
|
| IMPORTANT:
| No "guest" middleware here.
|
| This allows an already authenticated user to open /admin/login
| and switch from user account to admin account.
|
*/

Route::prefix('admin')->name('admin.')->group(function () {

    // Admin Login
    Route::get('/login', [LoginController::class, 'showLoginForm'])
        ->name('login');

    Route::post('/login', [LoginController::class, 'login'])
        ->name('login.check');

    // Admin Register
    Route::get('/register', [RegisterController::class, 'showRegisterForm'])
        ->name('register');

    Route::post('/register', [RegisterController::class, 'store'])
        ->name('register.store');
});


/*
|--------------------------------------------------------------------------
| Admin Protected Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'admin'])
    ->group(function () {

        // Admin Events
        Route::resource('events', EventController::class);

        // Admin Logout
        Route::post('/logout', [LogoutController::class, 'logout'])
            ->name('logout');
    });

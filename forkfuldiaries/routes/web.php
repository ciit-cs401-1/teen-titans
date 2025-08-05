<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\ProfileController;
use Symfony\Component\HttpKernel\Profiler\Profile;

/**
 * TESTING ROUTES
 */
Route::view('/example-page', function() {
    return view('example-page');
})->name('example_page');
Route::view('/example-auth','example-auth');

# Route for Login tisting
Route::view('/login', 'user.layout.pages.auth.login')->name('login');
Route::get('login', [AuthController::class, 'loginForm'])->name('login_form');

# Route for sign up page testing
Route::get('/signup', [AuthController::class, 'signupForm'])->name('signup');
Route::post('/signup', [AuthController::class, 'signupHandler'])->name('user.signup_handler');

Route::get('/', function(){
    return view('back.layout.pages.welcome');
})->name('welcome');

Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
Route::get('/user/dashboard', function() {
    return view('user.layout.pages.dashboard');
})->name('user.dashboard');

Route::get('/user/profile', [UserController::class, 'userProfile'])->name('user.profile');


/**
 * ADMIN ROUTES
 */

Route::prefix('admin')->name('admin.')->group(function () {

    // Routes without auth
    Route::middleware([])->group(function () {
        Route::controller(AuthController::class)->group(function () {
            Route::get('/login', 'loginForm')->name('login');
            Route::post('/admin-login', 'loginHandler')->name('login_handler');
            Route::get('/admin-forgot-password', 'forgotForm')->name('forgot');
            Route::post('/admin-send-password-reset-link', 'sendPasswordResetLink')->name('send_password_reset_link');
            Route::get('/admin-password/reset/{token}', 'resetForm')->name('reset_password_form');
            Route::post('/admin-reset-password-handler', 'resetPasswordHandler')->name('reset_password_handler');
        });
    });

    // Routes that need authentication (add your middleware like 'auth:admin' if needed)
    Route::middleware([])->group(function () {

        // Admin dashboard and logout
        Route::controller(AdminController::class)->group(function () {
            Route::get('/dashboard', 'adminDashboard')->name('dashboard');
            Route::post('/logout', 'logoutHandler')->name("logout");
        });

        // Recipes route handled by its own controller
        Route::controller(ProfileController::class)->group(function () {
            Route::get('/profile', 'adminProfile')->name('profile');
            Route::post('/admin-logout', 'logoutHandler')->name("admin_logout");
        });
    });
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\RecipeController;


Route::get('/', function () {
    return view('back.layout.pages.dashboard');
});

/**
 * TESTING ROUTES
 */
Route::view('/example-page','example-page');
Route::view('/example-auth','example-auth');


/**
 * ADMIN ROUTES
 */

Route::prefix('admin')->name('admin.')->group(function () {

    // Routes without auth
    Route::middleware([])->group(function () {
        Route::controller(AuthController::class)->group(function () {
            Route::get('/login', 'loginForm')->name('login');
            Route::post('/login', 'loginHandler')->name('login_handler');
            Route::get('/forgot-password', 'forgotForm')->name('forgot');
            Route::post('/send-password-reset-link', 'sendPasswordResetLink')->name('send_password_reset_link');
            Route::get('/password/reset/{token}', 'resetForm')->name('reset_password_form');
            Route::post('/reset-password-handler', 'resetPasswordHandler')->name('reset_password_handler');
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
        Route::controller(RecipeController::class)->group(function () {
            Route::get('/recipe', 'adminRecipe')->name('recipe');
            Route::post('/logout', 'logoutHandler')->name("logout");
        });
    });
});
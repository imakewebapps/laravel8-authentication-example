<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Users\DepositController;
use App\Http\Controllers\Users\WithdrawController;
use App\Http\Controllers\Users\DeveloperController;
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

Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');
    Route::get('/test', 'HomeController@wallet')->name('home.test');
    Route::get('/payments/{token}', 'HomeController@depositForm')->name('deposit.form');
    Route::post('/payments', 'HomeController@storeDepositForm')->name('deposit.form.store');

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
        Route::get('/developer/deposit', 'Users\DeveloperController@deposit')->name('developer.deposit');
        Route::get('/developer/withdraw', 'Users\DeveloperController@withdraw')->name('developer.withdraw');

        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    });
});


Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('deposits', DepositController::class);
    Route::resource('withdraws', WithdrawController::class);
    Route::get('/deposites/approve/{deposit}', [DepositController::class, 'approve'])->name('deposit.approve');
    Route::get('/deposites/reject/{deposit}', [DepositController::class, 'reject'])->name('deposit.reject');

    // Route::get('/deposites/approve/{deposit}', 'DepositController@approve')->name('deposits.approve');
    // Route::get('/deposites/approve/{deposit}', 'DepositController@reject')->name('deposits.reject');
    // Route::resource('products', ProductController::class);
});

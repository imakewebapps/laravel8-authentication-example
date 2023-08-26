<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DepositController;
use App\Http\Controllers\Api\WithdrawController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::controller(AuthController::class)->group(function(){
    // Route::post('register', 'register');
    Route::post('login', 'login');
});

Route::controller(DepositController::class)->group(function(){
    Route::post('/deposit/create', 'depositCreate');
    Route::post('/deposit/status', 'depositStatus');
});

Route::controller(WithdrawController::class)->group(function(){
    Route::post('/withdraw/request', 'withdrawRequest');
    Route::post('/withdraw/status', 'withdrawStatus');
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\TokenVerifyMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::post('/user-registration', [UserController::class, 'userRegistration']);
Route::post('/user-login', [UserController::class, 'userLogin']);

Route::post('/SendOtp', [UserController::class, 'SendOtp']);
Route::post('/OtpVerify', [UserController::class, 'OtpVerify']);
Route::post('/ResetPassword', [UserController::class, 'ResetPassword'])->Middleware([TokenVerifyMiddleware::class]);


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
// ==============================================================================================
//                                 Web Api Routes
// ==============================================================================================

Route::post('/user-registration', [UserController::class, 'userRegistration']);
Route::post('/user-login', [UserController::class, 'userLogin']);
Route::post('/Send-Otp', [UserController::class, 'SendOtp']);
Route::post('/Otp-Verify', [UserController::class, 'OtpVerify']);
Route::post('/Reset-Password', [UserController::class, 'ResetPassword'])->Middleware([TokenVerifyMiddleware::class]);





// ==============================================================================================
//                                   Page Routes
// ==============================================================================================
Route::get('/login', [UserController::class, 'loginPage']);
Route::get('/registration', [UserController::class, 'registrationPage']);
Route::get('/sendOtp', [UserController::class, 'SendOtpPage']);
Route::get('/otpVerify', [UserController::class, 'OtpVerifyPage']);
Route::get('/resetPassword', [UserController::class, 'ResetPasswordPage']);
Route::get('/dashboard', [UserController::class, 'dashboardPage']);
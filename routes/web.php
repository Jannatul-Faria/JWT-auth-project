<?php

use App\Http\Controllers\CategoryController;
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
Route::post('/send-Otp', [UserController::class, 'SendOtp']);
Route::post('/Otp-Verify', [UserController::class, 'OtpVerify']);
Route::post('/Reset-Password', [UserController::class, 'ResetPassword'])->Middleware([TokenVerifyMiddleware::class]);
Route::get('/userProfile', [UserController::class, 'userprofile'])->Middleware([TokenVerifyMiddleware::class]);
Route::post('/updateprofile', [UserController::class, 'updateprofile'])->Middleware([TokenVerifyMiddleware::class]);





// ==============================================================================================
//                                  User Page Routes
// ==============================================================================================
Route::get('/login', [UserController::class, 'loginPage']);
Route::get('/registration', [UserController::class, 'registrationPage']);
Route::get('/sendOtp', [UserController::class, 'SendOtpPage']);
Route::get('/otpVerify', [UserController::class, 'OtpVerifyPage']);
Route::get('/resetPassword', [UserController::class, 'ResetPasswordPage'])->Middleware([TokenVerifyMiddleware::class]);
Route::get('/dashboard', [UserController::class, 'dashboardPage'])->Middleware([TokenVerifyMiddleware::class]);
Route::get('/profile', [UserController::class, 'profile'])->Middleware([TokenVerifyMiddleware::class]);
Route::get('/categoryPage', [CategoryController::class, 'CategoryPage'])->Middleware([TokenVerifyMiddleware::class]);


Route::get('/logout', [UserController::class, 'logout']);


// ==============================================================================================
//                                   categories Routes
// ==============================================================================================
Route::post('/create-category', [CategoryController::class, 'CategoryCreate'])->Middleware([TokenVerifyMiddleware::class]);
Route::get('/list-category', [CategoryController::class, 'CategoryList'])->Middleware([TokenVerifyMiddleware::class]);
Route::post('/update-category', [CategoryController::class, 'CategoryUpdate'])->Middleware([TokenVerifyMiddleware::class]);
Route::post('/delete-category', [CategoryController::class, 'CategoryDelete'])->Middleware([TokenVerifyMiddleware::class]);
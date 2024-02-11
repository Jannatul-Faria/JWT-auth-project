<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Middleware\TokenVerifyMiddleware;


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
Route::get('/customerPage', [CustomerController::class, 'CustomerPage'])->Middleware([TokenVerifyMiddleware::class]);
Route::get('/productPage', [ProductController::class, 'ProductPage'])->Middleware([TokenVerifyMiddleware::class]);
Route::get('/invoicePage', [InvoiceController::class, 'InvoicePage'])->Middleware([TokenVerifyMiddleware::class]);
Route::get('/salePage', [InvoiceController::class, 'SalePage'])->Middleware([TokenVerifyMiddleware::class]);

Route::get('/logout', [UserController::class, 'logout']);

// ==============================================================================================
//                                   categories Routes
// ==============================================================================================
Route::post('/create-category', [CategoryController::class, 'CategoryCreate'])->Middleware([TokenVerifyMiddleware::class]);
Route::get('/list-category', [CategoryController::class, 'CategoryList'])->Middleware([TokenVerifyMiddleware::class]);
Route::post('/update-category', [CategoryController::class, 'CategoryUpdate'])->Middleware([TokenVerifyMiddleware::class]);
Route::post('/delete-category', [CategoryController::class, 'CategoryDelete'])->Middleware([TokenVerifyMiddleware::class]);
Route::post('/id-category', [CategoryController::class, 'CategoryId'])->Middleware([TokenVerifyMiddleware::class]);

// ==============================================================================================
//                                   customers Routes
// ==============================================================================================
Route::post('/create-customer', [CustomerController::class, 'CustomerCreate'])->Middleware([TokenVerifyMiddleware::class]);
Route::get('/list-customer', [CustomerController::class, 'CustomerList'])->Middleware([TokenVerifyMiddleware::class]);
Route::post('/update-customer', [CustomerController::class, 'CustomerUpdate'])->Middleware([TokenVerifyMiddleware::class]);
Route::post('/delete-customer', [CustomerController::class, 'CustomerDelete'])->Middleware([TokenVerifyMiddleware::class]);
Route::post('/id-customer', [CustomerController::class, 'CustomerId'])->Middleware([TokenVerifyMiddleware::class]);

// ==============================================================================================
//                                    Routes
// ==============================================================================================
Route::post('/create-product', [ProductController::class, 'ProductCreate'])->Middleware([TokenVerifyMiddleware::class]);
Route::get('/list-product', [ProductController::class, 'ProductList'])->Middleware([TokenVerifyMiddleware::class]);
Route::post('/update-product', [ProductController::class, 'ProductUpdate'])->Middleware([TokenVerifyMiddleware::class]);
Route::post('/delete-product', [ProductController::class, 'ProductDelete'])->Middleware([TokenVerifyMiddleware::class]);
Route::post('/id-product', [ProductController::class, 'ProductId'])->Middleware([TokenVerifyMiddleware::class]);

// ==============================================================================================
//                                   invoive Routes
// ==============================================================================================
Route::post('/create-invoice', [InvoiceController::class, 'InvoiceCreate'])->Middleware([TokenVerifyMiddleware::class]);
Route::post('/details-invoice', [InvoiceController::class, 'InvoiceDetails'])->Middleware([TokenVerifyMiddleware::class]);
Route::get('/list-invoice', [InvoiceController::class, 'InvoiceList'])->Middleware([TokenVerifyMiddleware::class]);
Route::post('/delete-invoice', [InvoiceController::class, 'InvoiceDelete'])->Middleware([TokenVerifyMiddleware::class]);


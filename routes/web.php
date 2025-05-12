<?php

use App\Http\Controllers\Backend\AddressController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProductImageController;
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/kategori/{category:slug}', [\App\Http\Controllers\Frontend\CategoryController::class, 'index']);

Route::get("/giris", [AuthController::class, 'showSignInForm']);
Route::post("/giris", [AuthController::class, 'signIn']);

Route::get("/uye-ol", [AuthController::class, 'showSignUpForm']);
Route::post("/uye-ol", [AuthController::class, 'signUp']);

Route::get("/cikis", [AuthController::class, 'logout']);

Route::resource('users', UserController::class);

Route::get('/users/{user}/change-password', [UserController::class, 'passwordForm'])->name('users.change-password.form');
Route::post('/users/{user}/change-password', [UserController::class, 'changePassword'])->name('users.change-password');

Route::resource('/users/{user}/addresses', AddressController::class);

Route::resource("/categories", CategoryController::class);
Route::resource("/products", ProductController::class);
Route::resource("/products/{product}/images", ProductImageController::class);

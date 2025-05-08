<?php

use App\Http\Controllers\Backend\AddressController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProductImageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'Hello World';
});


Route::resource('users', UserController::class);

Route::get('/users/{user}/change-password', [UserController::class, 'passwordForm'])->name('users.change-password.form');
Route::post('/users/{user}/change-password', [UserController::class, 'changePassword'])->name('users.change-password');

Route::resource('/users/{user}/addresses', AddressController::class);

Route::resource("/categories", CategoryController::class);
Route::resource("/products", ProductController::class);
Route::resource("/products/{product}/images", ProductImageController::class);

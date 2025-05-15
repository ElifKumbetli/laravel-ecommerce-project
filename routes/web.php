<?php

use App\Http\Controllers\Admin\AddressController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\UserController as FrontendUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/kategori/{category:slug}', [\App\Http\Controllers\Frontend\CategoryController::class, 'index']);

Route::get("/giris", [AuthController::class, 'showSignInForm'])->name('login');
Route::post("/giris", [AuthController::class, 'signIn']);

Route::get("/uye-ol", [AuthController::class, 'showSignUpForm']);
Route::post("/uye-ol", [AuthController::class, 'signUp']);

Route::get("/cikis", [AuthController::class, 'logout']);


Route::group(["middleware" => "auth"], function () {
    Route::get("/sepetim", [CartController::class, 'index']);
    Route::get("/sepete-ekle/{product}", [CartController::class, 'add']);
    Route::get("/sepetim/sil/{cartDetails}", [CartController::class, 'remove']);


    Route::get("/satin-al", [CheckoutController::class, 'showCheckoutForm']);
    Route::post("/satin-al", [CheckoutController::class, 'checkout']);
});



Route::group(["middleware" => "auth"], function () {

    Route::resource('users', UserController::class);

    Route::get('/users/{user}/change-password', [UserController::class, 'passwordForm'])->name('users.change-password.form');
    Route::post('/users/{user}/change-password', [UserController::class, 'changePassword'])->name('users.change-password');

    Route::resource('/users/{user}/addresses', AddressController::class);

    Route::resource("/categories", CategoryController::class);
    Route::resource("/products", ProductController::class);
    Route::resource("/products/{product}/images", ProductImageController::class);
});


Route::get('/test', function () {
    return 'GitHub testi başarılı!';
});

<?php

use App\Http\Controllers\AdminCategoryProductController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;




Route::get('/', [ProductController::class, "index"])->name("home");


Route::middleware(["guest:web"])->group(function () {
    Route::get('/login', [UserAuthController::class, "loginShow"])->name("user.show.login");
    Route::post('/login', [UserAuthController::class, "login"])->name("user.login");
    Route::get('/register', [UserAuthController::class, "registerShow"])->name("user.show.register");
    Route::post('/register', [UserAuthController::class, "register"])->name('user.register');
});
Route::middleware(["auth:web"])->group(function () {
    Route::post('/user/logout', [UserAuthController::class, "logout"])->name("user.logout");
});



Route::middleware(["guest:admin"])->group(function () {
    Route::get('/admin/login', [AdminAuthController::class, "adminLoginShow"])->name("admin.show.login");
    Route::post('/admin/login', [AdminAuthController::class, "login"])->name("admin.login");
});
Route::middleware(["auth:admin"])->group(function () {
    Route::post('/admin/logout', [AdminAuthController::class, "logout"])->name("admin.logout");
    Route::get('/admin/home', [AdminAuthController::class, "adminHome"])->name("admin.show.home");
    Route::get("/admin/product-category", [AdminCategoryProductController::class, "index"])->name("index.category");
    Route::post("/admin/product-category", [AdminCategoryProductController::class, "addCategory"])->name("addCategory");
    Route::get("/admin/add-product", [AdminProductController::class, "create"])->name("show.add.product");
});

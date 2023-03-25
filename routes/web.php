<?php

use App\Http\Controllers\AdminCategoryProductController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\CartController;
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
    Route::get("/user/product/{product}", [ProductController::class, "showSingleProduct"])->name("show.single.product");
    Route::get("/user/cart", [CartController::class, "index"])->name("index.cart");
    Route::post("/user/cart/{product}", [CartController::class, "addToCart"])->name("add.to.cart");
    Route::get("/user/cart/{product}", [CartController::class, "delete"])->name("delete.cart");
    Route::delete("/user/cart", [CartController::class, "emptyCart"])->name("delete.cart.all");
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
    Route::post("/admin/add-product", [AdminProductController::class, "storeProduct"])->name("store.product");
});

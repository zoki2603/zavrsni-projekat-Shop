<?php

use App\Http\Controllers\AdminCategoryProductController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;




Route::get('/', [ProductController::class, "index"])->name("home");

Route::get('/admin/login', [AdminAuthController::class, "adminLoginShow"])->name("admin.show.login");
Route::get('/admin/home', [AdminAuthController::class, "adminHome"])->name("admin.show.home");

Route::get('/login', [UserAuthController::class, "loginShow"])->name("user.show.login");
Route::get('/register', [UserAuthController::class, "registerShow"])->name("user.show.register");
Route::post('/register', [UserAuthController::class, "register"])->name('user.register');



Route::get("/admin/product-category", [AdminCategoryProductController::class, "index"])->name("index.category");
Route::post("/admin/product-category", [AdminCategoryProductController::class, "addCategory"])->name("addCategory");

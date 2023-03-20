<?php

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

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\EmployeeApiController;
use App\Http\Controllers\Api\PurchaseApiController;
use App\Http\Controllers\Api\AdminAuthApiController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Public route
Route::post('/login', [AdminAuthApiController::class, 'login']);
Route::get('/coming-soon/products', [ProductController::class, 'comingSoon'])->name("coming.soon");
Route::get('/coming-soon/products/category', [ProductApiController::class, 'searchApiProduct'])->name("searcha.api");


//Protected route
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post("/logout", [AdminAuthApiController::class, 'logout']);
    Route::resource('/product', ProductApiController::class);
    Route::get("/all-category", [CategoryApiController::class, 'index']);
    Route::post("/add-category", [CategoryApiController::class, 'store']);
    Route::post("/register-employee", [EmployeeApiController::class, 'registerEmployee']);
    Route::get("/all-purchases", [PurchaseApiController::class, 'allPurchase']);
    Route::get("/single-purchase/{order_id}", [PurchaseApiController::class, 'singlePurchase']);
});

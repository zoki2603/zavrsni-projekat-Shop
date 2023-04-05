<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminPurchaseController;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\AuthEmployeeController;
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\AdminCategoryProductController;




Route::get('/', [ProductController::class, "index"])->name("home");
Route::get('/coming-soon/products', [ProductController::class, 'comingSoon'])->name("coming.soon");
Route::get('/sort/products', [ProductController::class, 'sort'])->name("sort.products");
Route::get('/search/products', [ProductController::class, 'searchProducts'])->name("search.products");


Route::middleware(["guest:web"])->group(function () {
    Route::get('/login', [UserAuthController::class, "loginShow"])->name("user.show.login");
    Route::post('/login', [UserAuthController::class, "login"])->name("user.login");
    Route::get('/register', [UserAuthController::class, "registerShow"])->name("user.show.register");
    Route::post('/register', [UserAuthController::class, "register"])->name('user.register');
});
Route::middleware(["auth:web,admin"])->group(function () {
    Route::post('/user/logout', [UserAuthController::class, "logout"])->name("user.logout");
    Route::get("/user/product/{product}", [ProductController::class, "showSingleProduct"])->name("show.single.product");
    Route::get("/user/cart-all", [CartController::class, "index"])->name("cart.index");
    Route::post("/user/cart/{product}", [CartController::class, "addToCart"])->name("add.to.cart");
    Route::get("/user/cart/{product}", [CartController::class, "delete"])->name("delete.cart");
});
Route::middleware(["auth:web"])->group(function () {
    Route::get("/user/cart", [ProductController::class, 'buyAllProduct'])->name('buy.product');
    Route::post("/user/cart", [ProductController::class, 'store'])->name('store.buy.product');
});


Route::middleware(["guest:admin"])->group(function () {
    Route::get('/admin/login', [AdminAuthController::class, "adminLoginShow"])->name("admin.show.login");
    Route::post('/admin/login', [AdminAuthController::class, "login"])->name("admin.login");
});
Route::middleware(["auth:admin"])->group(function () {
    Route::get('/admin/search/products', [AdminProductController::class, 'searchProductsAdmin'])->name("search.admin.products");
    Route::post('/admin/logout', [AdminAuthController::class, "logout"])->name("admin.logout");
    Route::get("/admin/product-category", [AdminCategoryProductController::class, "index"])->name("index.category");
    Route::post("/admin/product-category", [AdminCategoryProductController::class, "addCategory"])->name("addCategory");
    Route::get('/admin/home', [AdminProductController::class, "adminIndex"])->name("admin.index");
    Route::get("/admin/add-product", [AdminProductController::class, "create"])->name("show.add.product");
    Route::post("/admin/add-product", [AdminProductController::class, "storeProduct"])->name("store.product");
    Route::get("/admin/edit/{product}", [AdminProductController::class, "edit"])->name("admin.edit");
    Route::patch("/admin/update/{product}", [AdminProductController::class, "update"])->name("admin.update");
    Route::delete("/admin/delete/{product}", [AdminProductController::class, "delete"])->name("admin.delete.product");
    Route::get("/admin/all-purchases", [AdminPurchaseController::class, "allPurchases"])->name("all.purchases");
    Route::get("/admin/purchase/{order_id}", [AdminPurchaseController::class, "singlePurchase"])->name("single.purchase");
    Route::get('/admin/employee-register', [AuthEmployeeController::class, "registerShow"])->name("employee.show.register");
    Route::post('/admin/employee-register', [AuthEmployeeController::class, "register"])->name('employee.register');
    Route::post("/admin/send-mail/{order_id}", [AdminPurchaseController::class, "sendMail"])->name("send.order.mail");
    Route::patch("/admin/order/{order_id}", [EmployeeController::class, "sendOrder"])->name("send.order");
});
Route::middleware(["guest:employee"])->group(function () {
    Route::get('/employee/login', [AuthEmployeeController::class, "showLoginEmployee"])->name("employee.show.login");
    Route::post('/employee/login', [AuthEmployeeController::class, "loginEmployee"])->name("employee.login");
});
Route::middleware(["auth:employee,admin"])->group(function () {
    Route::get("/employee/dashbord", [EmployeeController::class, "employeeDashbord"])->name("dashbord");
    Route::get("/employee/order/{order_id}", [EmployeeController::class, "order"])->name("order");
    Route::patch("/employee/order/{order_id}", [EmployeeController::class, "sendOrder"])->name("send.order.employee");
});
Route::middleware(["auth:employee"])->group(function () {
    Route::post('/employee/logout', [AuthEmployeeController::class, "logoutEmployee"])->name("employee.logout");
});

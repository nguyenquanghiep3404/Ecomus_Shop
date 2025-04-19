<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CategoryController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix("product")
    ->group(function () {
        // http://127.0.0.1:8000/api/product => GET (Yêu cầu xác thực)
        Route::get("/", [ProductController::class, "listProduct"]);
        // http://127.0.0.1:8000/api/product/1 => GET (Yêu cầu xác thực)
        Route::get("/{id}", [ProductController::class, "showProduct"]);
        // http://127.0.0.1:8000/api/product/add => POST (Yêu cầu xác thực)
        Route::post("add", [ProductController::class, "addProduct"]);
        // http://127.0.0.1:8000/api/product/update/1 => PUT (Yêu cầu xác thực)
        Route::put("update/{id}", [ProductController::class, "updateProduct"]);
        // http://127.0.0.1:8000/api/product/delete/1 => DELETE (Yêu cầu xác thực)
        Route::delete("delete/{id}", [ProductController::class, "deleteProduct"]);
    });
    Route::prefix("users")
    // ->middleware('auth:sanctum')
    ->group(function () {
        Route::get("/", [UserController::class, "listUsers"]);
        Route::get("/{id}", [UserController::class, "getUser"]);
        Route::post("add", [UserController::class, "addUser"]);
        Route::put("update/{id}", [UserController::class, "updateUser"]);
        Route::delete("delete/{id}", [UserController::class, "deleteUser"]);
    });
// Category routes
Route::prefix("categories")
    // ->middleware('auth:sanctum')
    ->group(function () {
        Route::get("/", [CategoryController::class, "listCategory"]);
        Route::get("/{id}", [CategoryController::class, "getCategory"]);
        Route::post("add", [CategoryController::class, "addCategory"]);
        Route::put("update/{id}", [CategoryController::class, "updateCategory"]);
        Route::delete("delete/{id}", [CategoryController::class, "deleteCategory"]);
    });
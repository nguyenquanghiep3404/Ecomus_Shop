<?php

use Illuminate\Support\Facades\Route;
// Import các Controller cần thiết
use App\Http\Controllers\Admin\ProductController; // Ví dụ: Đặt ProductController trong namespace Admin
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\AuthenController; // Ví dụ cho trang Dashboard admin
use App\Http\Middleware\CheckAdminMiddleware;

Route::get('login', [AuthenController::class, 'login'])->name('login');
Route::post('login', [AuthenController::class, 'postLogin'])->name('postLogin');
Route::get('logout', [AuthenController::class, 'logout'])->name('logout');
Route::get('signup', [AuthenController::class, 'signup'])->name('signup');
Route::post('signup', [AuthenController::class, 'postSignup'])->name('postSignup');
Route::get('auth/google', [AuthenController::class, 'redirectToGoogle'])->name('redirectToGoogle');
Route::get('auth/google/callback', [AuthenController::class, 'handleGoogleCallback'])->name('handleGoogleCallback');

// admin
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => [CheckAdminMiddleware::class]

], function () {
    // nhom trang quan tri dashbroad
    Route::get('dashbroad', [AuthenController::class, 'dashbroad'])->name('dashbroad');

    // nhom quan ly user
    Route::group([
        'prefix' => 'users',
        'as' => 'users.',
    ], function () {
        Route::get('/', [UserController::class, 'listUsers'])->name('listUsers');
        Route::get('add-user', [UserController::class, 'getAddUser'])->name('getAddUser');
        Route::post('add-user', [UserController::class, 'addUser'])->name('addUser');
        Route::get('update-user/{idUser}', [UserController::class, 'updateUser'])->name('updateUser');
        Route::put('update-user/{idUser}', [UserController::class, 'updatePostUser'])->name('updatePostUser'); // Thêm param idUser
        Route::delete('delete-user/{idUser}', [UserController::class, 'deleteUser'])->name('deleteUser');
    });
    // nhom quan ly category
    Route::group([
        'prefix' => 'category',
        'as' => 'category.',
    ], function () {
        Route::get('/', [CategoryController::class, 'listCategory'])->name('listCategory');
        Route::get('add-category', [CategoryController::class, 'getAddCategory'])->name('getAddCategory');
        Route::post('add-category', [CategoryController::class, 'addCategory'])->name('addCategory');
        Route::get('update-category/{idCategory}', [CategoryController::class, 'updateCategory'])->name('updateCategory');
        Route::patch('update-category/{idCategory}', [CategoryController::class, 'updatePostCategory'])->name('updatePostCategory');
        Route::delete('delete-category/{idCategory}', [CategoryController::class, 'deleteCategory'])->name('deleteCategory');
    });
    // nhom quan ly san pham
    Route::group([
        'prefix' => 'products',
        'as' => 'products.',
    ], function () {
        Route::get('/', [ProductController::class, 'listProduct'])->name('listProduct');
        Route::get('add-product', [ProductController::class, 'addProduct'])->name('addProduct');
        Route::post('add-product', [ProductController::class, 'addPostProduct'])->name('addPostProduct');
        Route::delete('delete-product', [ProductController::class, 'deleteProduct'])->name('deleteProduct');
        Route::get('update-product/{idProduct}', [ProductController::class, 'updateProduct'])->name('updateProduct');
        Route::patch('update-product', [ProductController::class, 'updatePatchProduct'])->name('updatePatchProduct');
        Route::get('/products/{id}', [ProductController::class, 'showProduct'])->name('showProduct');
    });
});

// http://127.0.0.1:8000/
Route::get( '/', function(){
    return redirect()->route('users.home');
});

// user
Route::group([
    'prefix' => 'users',
    'as' => 'users.',
], function(){
    Route::get('home', [HomeController::class, 'home'])->name('home');
    
}


);
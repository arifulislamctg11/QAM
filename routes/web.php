<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('login');
// });



Route::group(['middlewhere' => 'guest'], function () {
    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::get('register', [AuthController::class, 'register_view'])->name('register');
    Route::post('register', [AuthController::class, 'register'])->name('register');
    Route::get('users', [UsersController::class, 'index'])->name('users');
    Route::get('useredit/{id}', [UsersController::class, 'useredit'])->name('useredit');
    Route::put('user-update/{id}', [UsersController::class, 'userupdate'])->name('user-update');
    
    // this is product 
    Route::get('products', [ProductController::class, 'index'])->name('products');
    Route::get('productedit/{id}', [ProductController::class, 'productedit'])->name('productedit');
    Route::get('addproduct', [ProductController::class, 'addproduct'])->name('add-product');
    Route::put('product-update/{id}', [ProductController::class, 'productupdate'])->name('product-update');
    Route::get('productdelete/{id}', [ProductController::class, 'delete'])->name('pruductdelete');
});

Route::group(['middlewhere' => 'auth'], function () {
    Route::get('home', [AuthController::class, 'home'])->name('home');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

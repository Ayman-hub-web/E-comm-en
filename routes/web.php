<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TestController;


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

Route::get('/login', function () {
    return view('login');
});

Route::post("/login", [UserController::class, 'login'])->name('login');
Route::get("/getRegister", [UserController::class, 'getRegister'])->name('getregister');
Route::post("/register", [UserController::class, 'register'])->name('register');
Route::get("/", [ProductController::class, 'index'])->name('products');
Route::get("/logout", [UserController::class, 'logout'])->name('logout');
Route::get("/product_detail/{id}", [ProductController::class, 'detail'])->name('product_detail');
Route::post("/search", [ProductController::class, 'search'])->name('search');
Route::post("addToCart", [ProductController::class, 'addToCart'])->name('addToCart');
Route::get('cartList', [ProductController::class, 'cartList'])->name('cartList');
Route::delete('/deleteItemCart/{id}', [ProductController::class, 'deleteItemCart'])->name('deleteItemCart');
Route::get('/sumPrice', [ProductController::class, 'sumCart']);
Route::get("/orderNow", [ProductController::class, 'orderNow'])->name('orderNow');
Route::post("/orderplace", [ProductController::class, 'orderplace'])->name('orderplace');
Route::get("/orderlist", [ProductController::class, 'orderlist'])->name('orderlist');
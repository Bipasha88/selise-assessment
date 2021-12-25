<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', [AuthController::class,'login'])->name('login');
Route::post('/login-post',[AuthController::class,'login_post'])->name('loginPost');
Route::get('/register', [AuthController::class,'register'])->name('register');
Route::post('/register-post',[AuthController::class,'store'])->name('registerPost');
Route::get('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::get('/', [ProductController::class,'list'])->name('home');
Route::get('/product-details/{id}',[ProductController::class,'detail'])
    ->name('productDetail');
Route::get('/add-to-cart/{id}',[CartController::class,'addToCart'])
    ->name('addToCart');
Route::get('/view-cart',[CartController::class,'viewCart'])
    ->name('viewCart');
Route::get('/checkout',[CartController::class,'checkout'])
    ->name('checkOut')
    ->middleware('auth');
Route::get('/order-list',[OrderController::class,'list'])
    ->name('orderList')
    ->middleware('auth');



<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Controller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;

Route::post('/login', [AuthController::class, 'login']);

Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);
Route::put('/products/{product}', [ProductController::class, 'update']);
Route::delete('/products/{product}', [ProductController::class, 'destroy']);
Route::get('/products/search', [ProductController::class, 'search']);

Route::post('register', [UserController::class,'register']);
Route::post('login', [UserController::class,'login']);

Route::get('api/store', [ProductController::class, 'index']);
Route::get('/products/{product}', [ProductController::class, 'show']);

Route::post('/cart/add', [CartController::class, 'add']);
Route::get('/cart', [CartController::class, 'view']);
Route::delete('/cart/remove/{productId}', [CartController::class, 'remove']);



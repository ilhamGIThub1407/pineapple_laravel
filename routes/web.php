<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', [PageController::class, 'index']);
Route::get('/about', [PageController::class, 'about']);
Route::get('/our-products', [PageController::class, 'products']);
Route::get('/blog', [PageController::class, 'blogs']);
Route::get('/order-our-product', [PageController::class, 'order']);

// Authentifications or User Login
Route::get('login', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);

//Dashboard Page
Route::get('/dashboard', [DashboardController::class, 'index']);

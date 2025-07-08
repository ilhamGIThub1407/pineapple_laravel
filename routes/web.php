<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductManagementController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\PageManagementController;
use App\Http\Controllers\BlogManagementController;

Route::get('/', [PageController::class, 'index']);
Route::get('/about', [PageController::class, 'about']);
Route::get('/products', [PageController::class, 'product']);
Route::get('/products/{id}', [PageController::class, 'productDetail']);
Route::get('/blogs', [PageController::class, 'blogs']);
Route::get('/blog/{slug}', [PageController::class, 'blogDetail']);
Route::get('/order', [PageController::class, 'order']);

// Search Feat.
Route::get('/search', [PageController::class, 'search'])->name('search');

Route::post('submit-order', [OrderController::class, 'submitOrder']);

// Authentifications or User Login
Route::get('login', [AuthController::class, 'index'])->name('login')->middleware('CheckAuth');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Dashboard Page
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/order/detail/{order_id}', [OrderController::class, 'show']);

//Product Management
Route::get('/product-management', [ProductManagementController::class, 'index'])->middleware('CheckAuth');
Route::get('/product-management/create', [ProductManagementController::class, 'create'])->middleware('CheckAuth');
Route::post('/product-management/store', [ProductManagementController::class, 'store']);
Route::get('/product-management/edit/{id}', [ProductManagementController::class, 'edit'])->middleware('CheckAuth');
Route::post('/product-management/update', [ProductManagementController::class, 'update']);
Route::get('/product-management/delete/{id}', [ProductManagementController::class, 'destroy']);

//Navigation Management
Route::get('/navigation-management', [NavigationController::class, 'index'])->middleware('CheckAuth');
Route::get('/navigation-management/create', [NavigationController::class, 'create'])->middleware('CheckAuth');
Route::post('/navigation-management/store', [NavigationController::class, 'store']);
Route::get('/navigation-management/edit/{id}', [NavigationController::class, 'edit'])->middleware('CheckAuth');
Route::post('/navigation-management/update', [NavigationController::class, 'update']);
Route::get('/navigation-management/delete/{id}', [NavigationController::class, 'destroy']);

//User Management
Route::get('/user-management', [UserManagementController::class, 'index'])->middleware('CheckAuth');
Route::get('/user-management/create', [UserManagementController::class, 'create'])->middleware('CheckAuth');
Route::post('/user-management/store', [UserManagementController::class, 'store']);
Route::get('/user-management/edit/{id}', [UserManagementController::class, 'edit'])->middleware('CheckAuth');
Route::post('/user-management/update', [UserManagementController::class, 'update']);
Route::get('/user-management/delete/{id}', [UserManagementController::class, 'destroy']);

//Page Management
Route::get('/page-management', [PageManagementController::class, 'index'])->middleware('CheckAuth');
Route::get('/page-management/create', [PageManagementController::class, 'create'])->middleware('CheckAuth');
Route::post('/page-management/store', [PageManagementController::class, 'store']);
Route::get('/page-management/edit/{id}', [PageManagementController::class, 'edit'])->middleware('CheckAuth');
Route::post('/page-management/update', [PageManagementController::class, 'update']);
Route::get('/page-management/delete/{id}', [PageManagementController::class, 'destroy']);

//Blog Management
Route::get('/blog-management', [BlogManagementController::class, 'index'])->middleware('CheckAuth');
Route::get('/blog-management/create', [BlogManagementController::class, 'create'])->middleware('CheckAuth');
Route::post('/blog-management/store', [BlogManagementController::class, 'store']);
Route::get('/blog-management/edit/{id}', [BlogManagementController::class, 'edit'])->middleware('CheckAuth');
Route::post('/blog-management/update', [BlogManagementController::class, 'update']);
Route::get('/blog-management/delete/{id}', [BlogManagementController::class, 'destroy']);
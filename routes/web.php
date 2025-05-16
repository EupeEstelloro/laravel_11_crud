<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthenticationController;

// Public routes
Route::get('/', function () {
    return view('welcome');
});

// Authentication routes
Route::get('/login', [AuthenticationController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthenticationController::class, 'login'])->middleware('guest');
Route::get('/register', [AuthenticationController::class, 'showRegister'])->name('register')->middleware('guest');
Route::post('/register', [AuthenticationController::class, 'register'])->middleware('guest');
Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout')->middleware('auth');

// Protected routes
Route::middleware('auth')->group(function () {
    Route::resource('products', ProductController::class);
});


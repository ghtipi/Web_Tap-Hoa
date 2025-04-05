<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\PasswordResetController;

/*
|---------------------------------------------------------------------------
| API Routes
|---------------------------------------------------------------------------
| Đăng ký người dùng mới (chỉ có khách đăng ký, mặc định role là customer)
|
*/

// Đăng ký người dùng mới
Route::middleware(['api', 'cors'])->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
    
    // User routes
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/users', [UserController::class, 'index']);
        Route::put('/users/{user}/role', [UserController::class, 'updateRole']);
        Route::put('/users/profile', [UserController::class, 'updateProfile']);
        Route::put('/users/password', [UserController::class, 'changePassword']);
    });
});

// Admin routes
Route::middleware(['api', 'auth:sanctum', 'check.role:admin'])->group(function () {
    Route::get('/admin/users', [UserController::class, 'index']);
});

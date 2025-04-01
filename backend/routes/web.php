<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'] )->name('home');
Route::get('/products/search',[ProductController::class,'search'])->name('products.search');
Route::resource('products',ProductController::class);
Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.show');

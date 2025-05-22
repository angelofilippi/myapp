<?php

use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/product/{product:slug}', [ProductController::class, 'index'])->name('product');

//Rotas do admin

Route::get('/admin/product', [AdminProductController::class, 'index']);

Route::get('/admin/edit', [AdminProductController::class, 'edit']);
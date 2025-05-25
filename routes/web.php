<?php

use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/product/{product:slug}', [ProductController::class, 'index'])->name('product');

//Rotas do admin!

Route::get('/admin/product', [AdminProductController::class, 'index'])->name('admin.product');

Route::get('/admin/product/edit', [AdminProductController::class, 'edit'])->name('admin.product.edit');

Route::get('/admin/product/create', [AdminProductController::class, 'create'])->name('admin.product.create');

Route::post('/admin/product', [AdminProductController::class, 'store'])->name('admin.product.store');


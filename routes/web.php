<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;

// Product detail
Route::view('/product-detail', 'product-detail');

// Product search (ALIAS TO product-search, resolve route issue)
Route::get('/barang/search', [BarangController::class, 'search'])->name('barang.search');
Route::get('/product-search', [BarangController::class, 'search'])->name('product-search');

// Cart: Add product to cart (create the missing route)
Route::post('/cart/add/{id}', [BarangController::class, 'addToCart'])->name('cart.add');

// Explicitly add GET route for /barang to fix MethodNotAllowedHttpException
Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');

// Use resource routes, but skip the index if 'landing' displays the products
Route::resource('barang', BarangController::class)->except(['index']);

Route::get('/', [BarangController::class, 'landing'])->name('landing')->defaults('resource', 'barang');

<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

Route::view('/product-detail', 'product-detail');
Route::view('/product-search', 'product-search');
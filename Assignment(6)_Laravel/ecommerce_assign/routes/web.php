<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/expensive', [ProductController::class, 'expensive']);

Route::get('/customers', [CustomerController::class, 'index']);
Route::get('/customers/cairo', [CustomerController::class, 'fromCairo']);
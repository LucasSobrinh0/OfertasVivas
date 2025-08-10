<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;

Route::get('/ping', fn () => 'pong');
Route::apiResource('products', ProductController::class);
Route::apiResource('categories', CategoryController::class);
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Authentication middleware to check the "x-api-key" header
Route::middleware(['auth.apikey'])->group(function () {

    Route::post('/products', [ProductController::class, 'store']);

    Route::get('/products', [ProductController::class, 'index']);

    Route::get('/products/{id}', [ProductController::class, 'show']);

    Route::put('/products/{id}', [ProductController::class, 'update']);

    Route::delete('/products/{id}', [ProductController::class, 'delete']);
});

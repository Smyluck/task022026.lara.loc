<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::name('api.')->group(function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    })->middleware('auth:sanctum');

    Route::post('/login', [AuthController::class, 'login'])->name("login");

    Route::get('/categories', [CategoryController::class, 'index'])->name("categories.index");
    Route::resource('products', ProductController::class)->only('index', 'store', 'show', 'update', 'destroy');
});

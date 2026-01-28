<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\ProductController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [ProductController::class, 'index'])->name('welcome');
Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');
Route::get('/product', [ProductController::class, 'index'])->name('product.index');

Route::get('/admin', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

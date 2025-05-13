<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CategoryController;

// Beranda (daftar film)
Route::get('/', [MovieController::class, 'index'])->name('home');

// Detail film berdasarkan ID
Route::get('/movies/{id}', [MovieController::class, 'show'])->name('movies.show');

// Daftar film berdasarkan kategori (opsional jika ingin kategori)
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');

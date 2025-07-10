<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FrontendController;

// Landing page
Route::get('/', [FrontendController::class, 'trending']);

Route::get('/categories', [FrontendController::class, 'categories'])->name('categories');


Route::get('/', [FrontendController::class, 'trending'])->name('trending');
Route::get('/categoriesInside', [FrontendController::class, 'categoriesInside'])->name('categoriesInside');


// Auth routes
Route::get('/login', [FrontendController::class, 'login'])->name('login');
// Route::get('/register', [FrontendController::class, 'register'])->name('register');

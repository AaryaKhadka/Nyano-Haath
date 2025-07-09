<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FrontendController;

// Landing page
Route::get('/', [FrontendController::class, 'trending']);

Route::get('/', [FrontendController::class, 'trending'])->name('trending');


// Auth routes
Route::get('/login', [FrontendController::class, 'login'])->name('login');
// Route::get('/register', [FrontendController::class, 'register'])->name('register');

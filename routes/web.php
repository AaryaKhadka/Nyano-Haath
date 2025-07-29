<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FrontendController;

// Landing page
Route::get('/', [FrontendController::class, 'trending']);

Route::get('/categories', [FrontendController::class, 'categories'])->name('categories');


Route::get('/', [FrontendController::class, 'trending'])->name('trending');

// for the categories detail 
Route::get('/category/{type}', [FrontendController::class, 'categoriesDetail'])->name('category.show');


//for the about nyano page
Route::get('/aboutnyano', [FrontendController::class, 'aboutnyano'])->name('aboutnyano');

//for how it work
Route::get('/how', [FrontendController::class, 'how'])->name('how');

// Auth routes
Route::get('/login', [FrontendController::class, 'login'])->name('login');

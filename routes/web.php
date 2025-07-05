<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FrontendController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('trending');
// });

Route::get('/',[FrontendController::class,'trending']);
Route::get('login',[FrontendController::class,'login'])->name('login');


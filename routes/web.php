<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FrontendController;

// Landing page
Route::get('/', [FrontendController::class, 'trending']);

Route::get('/', [FrontendController::class, 'trending'])->name('trending');


// Auth routes
Route::get('/login', [FrontendController::class, 'login'])->name('login');
// Route::get('/register', [FrontendController::class, 'register'])->name('register');
Route::get('/aboutus', [FrontendController::class, 'aboutus'])->name('aboutus');
Route::get('/TermsAndCondition', [FrontendController::class, 'TermsAndCondition'])->name('TermsAndCondition');

Route::get('/campaignpage', [FrontendController::class, 'campaignpage'])->name('campaignpage');

Route::get('/privacypolicy', [FrontendController::class, 'privacypolicy'])->name('privacypolicy');

Route::get('/contactus', [FrontendController::class, 'contactus'])->name('contactus');























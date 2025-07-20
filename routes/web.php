<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DonationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public Landing Page
Route::get('/', function () {
    return view('index');
})->name('home');

// Public Login Page
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// About Us (Public)
Route::get('/aboutus', function () {
    return view('about');
})->name('aboutus');

// Public Campaign List
Route::get('/explore', [CampaignController::class, 'publicIndex'])->name('feed');

// Public Single Campaign View (Make sure this comes BEFORE auth resource routes)
Route::get('/explore/{campaign}', [CampaignController::class, 'publicShow'])->name('user.view');

// ============================
// AUTHENTICATED & VERIFIED USER ROUTES
// ============================
Route::middleware(['auth'])->group(function () {

    // User Dashboard (Campaigns they created)
    Route::get('/dashboard', [CampaignController::class, 'index'])->name('dashboard');

    // Authenticated campaign routes — excluding 'index' and 'show' (to avoid conflict)
    Route::resource('campaigns', CampaignController::class)->except(['index', 'show']);

    // Authenticated user campaign show with route name 'creators.view'
    Route::get('/campaigns/{campaign}/view', [CampaignController::class, 'show'])->name('creators.view');

    // Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ============================
// ADMIN ROUTES
// ============================
Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function () {

    // Admin Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Role Management
    Route::get('/roles', [AdminController::class, 'showRoles'])->name('roles.index');
    Route::put('/roles/{user}', [AdminController::class, 'updateRole'])->name('roles.update');

    // Admin Campaign Management
    Route::get('/campaigns', [AdminController::class, 'campaigns'])->name('campaigns.index');
    Route::post('/campaigns/{campaign}/approve', [AdminController::class, 'approveCampaign'])->name('campaigns.approve');
    Route::post('/campaigns/{campaign}/reject', [AdminController::class, 'rejectCampaign'])->name('campaigns.reject');

    // Admin single campaign show with unique route name to avoid conflict
    Route::get('/campaigns/{campaign}', [AdminController::class, 'showCampaign'])->name('campaigns.show');

    // feature/unfeature 
    Route::post('/campaigns/{campaign}/feature', [AdminController::class, 'featureCampaign'])->name('campaigns.feature');
    Route::post('/campaigns/{campaign}/unfeature', [AdminController::class, 'unfeatureCampaign'])->name('campaigns.unfeature');
});

// ============================
// LOGOUT WITH REDIRECT TO HOME
// ============================
Route::post('/logout-redirect', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('home');
})->name('logout.redirect');

// ============================
// OPTIONAL: Extra RoleController Routes
// ============================
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/roles', [RoleController::class, 'index'])->name('admin.roles.index');
    Route::put('/admin/roles/{user}', [RoleController::class, 'update'])->name('admin.roles.update');
});

// Show donation form for a campaign
Route::get('/campaign/{campaign}/donate', [DonationController::class, 'showForm'])->name('donation.form');

Route::post('/campaign/{campaign}/donate', [DonationController::class, 'store'])->name('donation.store');

Route::post('/khalti/verify', [DonationController::class, 'verifyKhalti'])->name('khalti.verify');
Route::get('/payment/callback', [DonationController::class, 'paymentCallback'])->name('payment.callback');
Route::post('/campaign/{campaign}/khalti/initiate', [DonationController::class, 'initiatePayment'])->name('khalti.initiate');





// ============================
// AUTH ROUTES
// ============================
require __DIR__.'/auth.php';

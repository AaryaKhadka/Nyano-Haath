<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Landing page
Route::get('/', function () {
    return view('index');
})->name('home');

// Login page
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/campaignpage', function () {
    return view('campaignpage');
})->name('campaign.public');

// Authenticated user routes
Route::middleware(['auth', 'verified'])->group(function () {

    // User dashboard showing campaigns list
    Route::get('/dashboard', [CampaignController::class, 'index'])->name('dashboard');

    // Campaign resource routes except index (already covered by dashboard)
    Route::resource('campaigns', CampaignController::class)->except(['index']);

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes, all prefixed by /admin and named with admin.*
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {

    // Admin dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Role Management: show list of users
    Route::get('/roles', [AdminController::class, 'showRoles'])->name('roles.index');

    // Update user role (PUT request)
    Route::put('/roles/{user}', [AdminController::class, 'updateRole'])->name('roles.update');

    // Show campaigns management page
    Route::get('/campaigns', [AdminController::class, 'campaigns'])->name('campaigns.index');

    // Campaign actions (approve, delete, feature, unfeature)
    Route::post('/campaigns/{campaign}/approve', [AdminController::class, 'approveCampaign'])->name('campaigns.approve');
    Route::delete('/campaigns/{campaign}/delete', [AdminController::class, 'deleteCampaign'])->name('campaigns.delete');
    Route::get('/campaigns/{campaign}', [AdminController::class, 'showCampaign'])->name('campaigns.show');
    // Route::post('/campaigns/{campaign}/feature', [AdminController::class, 'featureCampaign'])->name('campaigns.feature');
    // Route::post('/campaigns/{campaign}/unfeature', [AdminController::class, 'unfeatureCampaign'])->name('campaigns.unfeature');
});

// Logout and redirect
Route::post('/logout-redirect', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('home');
})->name('logout.redirect');

// About us page
Route::get('/aboutus', function () {
    return view('about');
})->name('aboutus');

// Load auth routes (Breeze/Fortify/Jetstream)
require __DIR__.'/auth.php';

use App\Http\Controllers\RoleController;

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/roles', [RoleController::class, 'index'])->name('admin.roles.index');
    Route::put('/admin/roles/{user}', [RoleController::class, 'update'])->name('admin.roles.update');
});

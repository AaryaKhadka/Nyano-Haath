<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\WithdrawalController;

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

// Public Single Campaign View
Route::get('/explore/{campaign}', [CampaignController::class, 'publicShow'])->name('user.view');

// ============================
// AUTHENTICATED & VERIFIED USER ROUTES
// ============================
Route::middleware(['auth'])->group(function () {

    // User Dashboard (Campaigns they created)
    Route::get('/dashboard', [CampaignController::class, 'index'])->name('dashboard');

    // Authenticated campaign routes (excluding index & show)
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

    // Feature/unfeature campaigns
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

// ============================
// Categories Routes
// ============================
Route::get('/categories', [CategoryController::class, 'categories'])->name('categories');
Route::get('/categories/{type}', [CategoryController::class, 'categoriesDetail'])->name('categories.detail');


Route::get('/donate/verify', [DonationController::class, 'verifyPayment'])->name('donation.verify');

Route::get('/donate/{campaign}', [DonationController::class, 'showForm'])->name('donation.form');
Route::post('/donate/{campaign}', [DonationController::class, 'initiatePayment'])->name('donation.process');


//route for donor dashboard
Route::get('/donor/dashboard', [DonationController::class, 'donorDashboard'])->name('donor.dashboard');

Route::middleware(['auth'])->group(function () {
    // Show withdraw page with amount, history, and withdraw form
    Route::get('/withdraw', [WithdrawalController::class, 'index'])->name('withdraw.index');

    // Submit withdraw request
    Route::post('/withdraw/request', [WithdrawalController::class, 'store'])->name('withdraw.request');

    // Show transaction history (donations + withdrawals)
    Route::get('/transactions', [WithdrawalController::class, 'transactions'])->name('withdraw.transactions');
});


Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function () {
    // other admin routes ...

    // Admin Withdrawal Management using AdminController
    Route::get('/withdrawals', [AdminController::class, 'withdrawals'])->name('withdrawals.index');
    Route::post('/withdrawals/{withdrawal}/approve', [AdminController::class, 'approveWithdrawal'])->name('withdrawals.approve');
    Route::post('/withdrawals/{withdrawal}/reject', [AdminController::class, 'rejectWithdrawal'])->name('withdrawals.reject');
    Route::post('/withdrawals/{withdrawal}/release', [AdminController::class, 'releaseWithdrawal'])->name('withdrawals.release');
});



require __DIR__.'/auth.php';







<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\WithdrawalController;
use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public Landing Page
Route::get('/', [CampaignController::class, 'publicIndex'])->name('home');

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
// AUTHENTICATED ROUTES WITH ROLE CHECKS
// ============================
Route::middleware(['auth'])->group(function () {

    // FUNDRAISER ROUTES (no prefix)
    Route::get('/dashboard', function () {
        if (Auth::user()->role !== 'fundraiser') abort(403);
        return app()->call('App\Http\Controllers\CampaignController@index');
    })->name('dashboard');

    // MANUAL RESOURCE ROUTES FOR CAMPAIGNS (fundraiser only)
    Route::get('/campaigns', function () {
        if (Auth::user()->role !== 'fundraiser') abort(403);
        return app()->call('App\Http\Controllers\CampaignController@index');
    })->name('campaigns.index');

    Route::get('/campaigns/create', function () {
        if (Auth::user()->role !== 'fundraiser') abort(403);
        return app()->call('App\Http\Controllers\CampaignController@create');
    })->name('campaigns.create');

    Route::post('/campaigns', function (Request $request) {
        if (Auth::user()->role !== 'fundraiser') abort(403);
        return app()->call('App\Http\Controllers\CampaignController@store', ['request' => $request]);
    })->name('campaigns.store');

    Route::get('/campaigns/{campaign}/edit', function ($campaign) {
    if (Auth::user()->role !== 'fundraiser') abort(403);
    $campaignModel = \App\Models\Campaign::findOrFail($campaign);
    return app()->call('App\Http\Controllers\CampaignController@edit', ['campaign' => $campaignModel]);
})->name('campaigns.edit');

    Route::put('/campaigns/{campaign}', function (Request $request, $campaign) {
    if (Auth::user()->role !== 'fundraiser') abort(403);
    $campaignModel = Campaign::findOrFail($campaign);
    return app()->call('App\Http\Controllers\CampaignController@update', ['request' => $request, 'campaign' => $campaignModel]);
})->name('campaigns.update');

    Route::delete('/campaigns/{campaign}', function ($campaign) {
    if (Auth::user()->role !== 'fundraiser') abort(403);
    $campaignModel = Campaign::findOrFail($campaign);
    return app()->call('App\Http\Controllers\CampaignController@destroy', ['campaign' => $campaignModel]);
})->name('campaigns.destroy');

    // Show single campaign view for fundraiser (optional)
    Route::get('/campaigns/{campaign}/view', function ($campaign) {
    if (Auth::user()->role !== 'fundraiser') abort(403);
    $campaignModel = Campaign::findOrFail($campaign);
    return app()->call('App\Http\Controllers\CampaignController@show', ['campaign' => $campaignModel]);
})->name('creators.view');


    Route::get('/withdraw', function () {
        if (Auth::user()->role !== 'fundraiser') abort(403);
        return app()->call('App\Http\Controllers\WithdrawalController@index');
    })->name('withdraw.index');

    Route::post('/withdraw/request', function (Request $request) {
        if (Auth::user()->role !== 'fundraiser') abort(403);
        return app()->call('App\Http\Controllers\WithdrawalController@store', ['request' => $request]);
    })->name('withdraw.request');

    Route::get('/transactions', function () {
        if (Auth::user()->role !== 'fundraiser') abort(403);
        return app()->call('App\Http\Controllers\WithdrawalController@transactions');
    })->name('withdraw.transactions');

    // Profile management (available to all logged-in users)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // DONOR ROUTES (prefix donor)
    Route::prefix('donor')->group(function () {
        Route::get('/dashboard', function () {
            if (Auth::user()->role !== 'donor') abort(403);
            return app()->call('App\Http\Controllers\DonationController@donorDashboard');
        })->name('donor.dashboard');

        Route::get('/feed', function () {
            if (Auth::user()->role !== 'donor') abort(403);
            return app()->call('App\Http\Controllers\CampaignController@publicIndex');
        })->name('donor.feed');

        // Add more donor routes here if needed
    });

    // ADMIN ROUTES (prefix admin + name admin.)
    Route::prefix('admin')->name('admin.')->group(function () {

        Route::get('/dashboard', function () {
            if (Auth::user()->role !== 'admin') abort(403);
            return app()->call('App\Http\Controllers\AdminController@dashboard');
        })->name('dashboard');

        Route::get('/roles', function () {
            if (Auth::user()->role !== 'admin') abort(403);
            return app()->call('App\Http\Controllers\AdminController@showRoles');
        })->name('roles.index');

        Route::put('/roles/{user}', function (Request $request, $user) {
            if (Auth::user()->role !== 'admin') abort(403);
            return app()->call('App\Http\Controllers\AdminController@updateRole', ['request' => $request, 'user' => $user]);
        })->name('roles.update');

        Route::get('/campaigns', function () {
            if (Auth::user()->role !== 'admin') abort(403);
            return app()->call('App\Http\Controllers\AdminController@campaigns');
        })->name('campaigns.index');

        Route::post('/campaigns/{campaign}/approve', function ($campaign) {
    if (Auth::user()->role !== 'admin') abort(403);
    $campaignModel = \App\Models\Campaign::findOrFail($campaign);
    return app()->call('App\Http\Controllers\AdminController@approveCampaign', ['campaign' => $campaignModel]);
})->name('campaigns.approve');

        Route::post('/campaigns/{campaign}/reject', function ($campaign) {
    if (Auth::user()->role !== 'admin') abort(403);
    $campaignModel = \App\Models\Campaign::findOrFail($campaign);
    return app()->call('App\Http\Controllers\AdminController@rejectCampaign', ['campaign' => $campaignModel]);
})->name('campaigns.reject');

        Route::get('/campaigns/{campaign}', function ($campaign) {
    if (Auth::user()->role !== 'admin') abort(403);
    $campaignModel = \App\Models\Campaign::findOrFail($campaign);
    return app()->call('App\Http\Controllers\AdminController@showCampaign', ['campaign' => $campaignModel]);
})->name('campaigns.show');

        Route::post('/campaigns/{campaign}/feature', function ($campaign) {
    if (Auth::user()->role !== 'admin') abort(403);
    $campaignModel = \App\Models\Campaign::findOrFail($campaign);
    return app()->call('App\Http\Controllers\AdminController@featureCampaign', ['campaign' => $campaignModel]);
})->name('campaigns.feature');

        Route::post('/campaigns/{campaign}/unfeature', function ($campaign) {
    if (Auth::user()->role !== 'admin') abort(403);
    $campaignModel = \App\Models\Campaign::findOrFail($campaign);
    return app()->call('App\Http\Controllers\AdminController@unfeatureCampaign', ['campaign' => $campaignModel]);
})->name('campaigns.unfeature');

Route::get('/withdrawals', function () {
    if (Auth::user()->role !== 'admin') abort(403);
    return app()->call('App\Http\Controllers\AdminController@withdrawals'); // or whatever method lists withdrawals
})->name('withdrawals.index');

        Route::post('/withdrawals/{withdrawal}/approve', function ($withdrawal) {
    if (Auth::user()->role !== 'admin') abort(403);
    $withdrawalModel = \App\Models\Withdrawal::findOrFail($withdrawal);
    return app()->call('App\Http\Controllers\AdminController@approveWithdrawal', ['withdrawal' => $withdrawalModel]);
})->name('withdrawals.approve');

Route::post('/withdrawals/{withdrawal}/reject', function ($withdrawal) {
    if (Auth::user()->role !== 'admin') abort(403);
    $withdrawalModel = \App\Models\Withdrawal::findOrFail($withdrawal);
    return app()->call('App\Http\Controllers\AdminController@rejectWithdrawal', ['withdrawal' => $withdrawalModel]);
})->name('withdrawals.reject');

Route::post('/withdrawals/{withdrawal}/release', function ($withdrawal) {
    if (Auth::user()->role !== 'admin') abort(403);
    $withdrawalModel = \App\Models\Withdrawal::findOrFail($withdrawal);
    return app()->call('App\Http\Controllers\AdminController@releaseWithdrawal', ['withdrawal' => $withdrawalModel]);
})->name('withdrawals.release');

    }); // <-- closes Route::prefix('admin')->name('admin.')->group(function () {

}); // <-- closes Route::middleware(['auth'])->group(function () {

// LOGOUT WITH REDIRECT TO HOME
Route::post('/logout-redirect', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('home');
})->name('logout.redirect');

// Categories Routes (public)
Route::get('/categories', [CategoryController::class, 'categories'])->name('categories');
Route::get('/categories/{type}', [CategoryController::class, 'categoriesDetail'])->name('categories.detail');

// Donation Routes (public)
Route::get('/donate/verify', [DonationController::class, 'verifyPayment'])->name('donation.verify');
Route::get('/donate/{campaign}', [DonationController::class, 'showForm'])->name('donation.form');
Route::post('/donate/{campaign}', [DonationController::class, 'initiatePayment'])->name('donation.process');

// Privacy & Contact pages (public)
Route::view('/privacy', 'privacy')->name('privacy');
Route::view('/contactus', 'contactus')->name('contactus');


Route::get('/admin/platform-earnings', [AdminController::class, 'platformEarnings'])->name('admin.earnings');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');

Route::get('/how', function () {
    return view('how');
})->name('how');

Route::get('/why', function () {
    return view('why');
})->name('why');

Route::get('/common', function () {
    return view('common');
})->name('common');

require __DIR__.'/auth.php';
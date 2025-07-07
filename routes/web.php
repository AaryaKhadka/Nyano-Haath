<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Landing page route to load index.blade.php

Route::get('/', function () {
    return view('index');
})->name('home'); 

Route::get('/login', function () {
    return view('auth.login');  
})->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

use App\Http\Controllers\AdminAuthController;

Route::prefix('admin')->group(function () {
    Route::get('/adminLogin', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/adminLogin', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    Route::get('/dashboard', function () {
        return view('admin.adminDashboard');
    })->middleware('auth:admin')->name('admin.dashboard');
});



<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Route to handle redirection based on role
Route::get('/redirect-dashboard', function () {
    $role = Auth::user()->role;

    if ($role === 'admin') {
        return redirect('/admin/dashboard');
    } elseif ($role === 'seller') {
        return redirect('/seller/dashboard');
    } else {
        abort(403, 'Unauthorized action.');
    }
})->middleware(['auth'])->name('dashboard');

// Group routes for authenticated users with verified emails
Route::middleware(['auth', 'verified'])->group(function () {

    // Admin Dashboard Route
    Route::get('/admin/dashboard', function () {
        return view('dashboard.admin');
    })->name('admin.dashboard');

    // Seller Dashboard Route
    Route::get('/seller/dashboard', function () {
        return view('dashboard.seller');
    })->name('seller.dashboard');
});

// Route for home page (welcome view)
Route::get('/', function () {
    return view('welcome');
});

// Routes for profile management
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
    
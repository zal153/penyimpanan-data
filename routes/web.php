<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BerkasController;
use App\Http\Controllers\Admin\PenggunaController;

// Redirect root to login
Route::get('/', function () {
    if (Auth::check()) {
        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role === 'user') {
            return redirect()->route('user.dashboard');
        }
    }
    return redirect()->route('login');
});

// Guest Routes
Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'login'])->name('login');
    Route::post('login', [LoginController::class, 'authenticate'])->name('login.authenticate');

    Route::get('register', [LoginController::class, 'register'])->name('register');
    Route::post('register', [LoginController::class, 'store'])->name('register.store');
});

// Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    // Admin Routes
    Route::middleware('role:admin')->prefix('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

        // Berkas Management
        Route::get('/berkas', [BerkasController::class, 'index'])->name('berkas.index');
        Route::get('/berkas/{id}', [BerkasController::class, 'show'])->name('berkas.show');
        Route::post('/berkas/{id}/backup', [BerkasController::class, 'backup'])->name('berkas.backup');
        Route::delete('/berkas/{id}', [BerkasController::class, 'destroy'])->name('berkas.destroy');

        Route::resource('pengguna', PenggunaController::class);
    });

    // User Routes
    Route::middleware('role:user')->prefix('user')->name('user.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    });
});

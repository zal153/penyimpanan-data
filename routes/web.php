<?php

use App\Http\Controllers\Admin\BerkasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'login'])->name('login');
    Route::post('login', [LoginController::class, 'authenticate'])->name('login.authenticate');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('register', [LoginController::class, 'register'])->name('register');
    Route::post('register', [LoginController::class, 'store'])->name('register.store');
});

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/admin/berkas', [BerkasController::class, 'index'])->name('berkas.index');
Route::get('/admin/berkas/{id}', [BerkasController::class, 'show'])->name('berkas.show');
Route::post('/admin/berkas/{id}/backup', [BerkasController::class, 'backup'])->name('berkas.backup');
Route::delete('/admin/berkas/{id}', [BerkasController::class, 'destroy'])->name('berkas.destroy');

<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\GameController; 
use Illuminate\Support\Facades\Route;

// Halaman Utama (Landing Page)
Route::get('/', [GameController::class, 'index'])->name('landing');

// Grup Rute yang memerlukan Login (Auth)
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Dashboard Utama (Sekarang dikelola oleh GameController agar bisa tampil list game)
    Route::get('/dashboard', [GameController::class, 'adminIndex'])->name('dashboard');

    // Manajemen Game (Tambah & Hapus)
    Route::get('/games/create', [GameController::class, 'create'])->name('game.create');
    Route::post('/games', [GameController::class, 'store'])->name('game.store');
    Route::delete('/games/{game}', [GameController::class, 'destroy'])->name('game.destroy');

    // Manajemen Profil User (Bawaan Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
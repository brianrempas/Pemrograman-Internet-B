<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FakultasController;

// Halaman utama
Route::get('/', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// Route untuk semua pengguna yang sudah login
Route::middleware('auth')->group(function() {
    // User biasa hanya bisa lihat daftar mahasiswa dan prodi
    Route::get('mahasiswa', [MahasiswaController::class, 'index']);
    Route::get('prodi', [ProdiController::class, 'index']);
    Route::get('fakultas', [FakultasController::class, 'index']);

    // Profil user sendiri
    Route::get('profile', [UserController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [UserController::class, 'update'])->name('profile.update');

});

// Route khusus admin
use App\Http\Middleware\AdminMiddleware;

Route::middleware(['auth', AdminMiddleware::class])->group(function() {
    Route::resource('mahasiswa', MahasiswaController::class)->except(['index']);
    Route::resource('prodi', ProdiController::class)->except(['index']);
    Route::resource('fakultas', FakultasController::class)->except(['index']);
});


require __DIR__.'/auth.php'; // <-- pastikan ini ada

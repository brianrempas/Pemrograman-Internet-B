<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\V1\MahasiswaController;

// Login via API untuk dapat token
Route::post('/login', [AuthController::class, 'login']);

// Group route yang butuh token (Sanctum)
Route::middleware('auth:sanctum')->group(function() {
    // Mendapatkan data user yang sedang login
    Route::get('/user', [AuthController::class, 'user']);

    // Logout dari API
    Route::post('/logout', [AuthController::class, 'logout']);

    // API Mahasiswa (hanya admin bisa full CRUD jika di controller dicek role)
    Route::apiResource('v1/mahasiswa', MahasiswaController::class);
});

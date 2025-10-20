<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

// route sederhana yang mengembalikan string
Route::get('/hello', function () {
 return 'Hello Laravel!';
});

use App\Http\Controllers\HelloController;
Route::get('/hello-controller', [HelloController::class, 'index']);

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\FakultasController;

Route::resource('mahasiswa', MahasiswaController::class);
Route::resource('prodi', ProdiController::class);
Route::resource('fakultas', FakultasController::class);


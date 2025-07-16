<?php

use App\Http\Controllers\GaleriController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JudulController;
use App\Http\Controllers\OprecController;
use App\Http\Controllers\PraktikumController;
use App\Http\Controllers\PraPraktikumController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name("home");
Route::get('/galeri', [GaleriController::class, 'index'])->name("galeri");
Route::get('/prestasi', [PrestasiController::class, 'index'])->name("prestasi.index");
Route::get('/prestasi/{prestasi:slug}', [PrestasiController::class, 'show'])->name("prestasi.show");

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/praktikum', [PraktikumController::class, 'index'])->name("praktikum.index");
    Route::get('/praktikum/{praktikum:slug}', [PraktikumController::class, 'show'])->name("praktikum.show");
    Route::get('/pra-praktikum', [PraPraktikumController::class, 'index'])->name("pra-praktikum");

    Route::get('/judul/{judul:slug}', [JudulController::class, 'show'])->name("judul.show");

    Route::get('/profil', [UserProfileController::class, 'edit'])->name("user.profile.edit");
    Route::patch('/profil', [UserProfileController::class, 'update'])->name("user.profile.update");

    Route::get('/open-recruitment', [OprecController::class, 'show'])->name("oprec.show");
});

require __DIR__ . '/auth.php';

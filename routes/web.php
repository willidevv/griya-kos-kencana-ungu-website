<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\ContactController;
// IMPORT DASHBOARD CONTROLLER BARU
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::view('/', 'index')->name('home');
Route::view('/profile', 'pages.profile')->name('profile');
Route::view('/denah', 'pages.denah')->name('denah');

Route::get('/fasilitas', [RoomTypeController::class, 'publicIndex'])->name('fasilitas');
Route::get('/galeri', [GalleryController::class, 'publicIndex'])->name('galeri');
Route::get('/kontak', [ContactController::class, 'publicIndex'])->name('kontak');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    
    // DASHBOARD SEKARANG MENGGUNAKAN GET (DINAMIS)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::view('/beranda', 'admin.beranda')->name('beranda');
    Route::view('/profile', 'admin.profile')->name('profile');

    // --- Manajemen Fasilitas & Tipe Kamar ---
    Route::get('/fasilitas', [RoomTypeController::class, 'adminIndex'])->name('fasilitas.index');
    Route::get('/fasilitas/create', [RoomTypeController::class, 'create'])->name('fasilitas.create');
    Route::post('/fasilitas/store', [RoomTypeController::class, 'store'])->name('fasilitas.store');
    Route::get('/fasilitas/{room}/edit', [RoomTypeController::class, 'edit'])->name('fasilitas.edit');
    Route::put('/fasilitas/{room}', [RoomTypeController::class, 'update'])->name('fasilitas.update');
    Route::delete('/fasilitas/{room}', [RoomTypeController::class, 'destroy'])->name('fasilitas.destroy');

    // --- Manajemen Galeri ---
    Route::get('/galeri', [GalleryController::class, 'index'])->name('galeri.index');
    Route::get('/galeri/create', [GalleryController::class, 'create'])->name('galeri.create');
    Route::post('/galeri/store', [GalleryController::class, 'store'])->name('galeri.store');
    Route::delete('/galeri/{gallery}', [GalleryController::class, 'destroy'])->name('galeri.destroy');

    // --- Manajemen Kontak ---
    Route::get('/kontak', [ContactController::class, 'adminIndex'])->name('kontak');
    Route::post('/kontak/update', [ContactController::class, 'update'])->name('kontak.update');
});
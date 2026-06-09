<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::view('/', 'index')->name('home');
Route::view('/profile', 'pages.profile')->name('profile');
Route::view('/denah', 'pages.denah')->name('denah');

Route::get('/fasilitas', [FasilitasController::class, 'publicIndex'])->name('fasilitas');
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

    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });

    // --- Dashboard ---
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::view('/beranda', 'admin.beranda')->name('beranda');
    Route::view('/profile', 'admin.profile')->name('profile');

    // --- Manajemen Fasilitas ---
    Route::resource('fasilitas', FasilitasController::class)->except(['show']);

    // --- Manajemen Galeri ---
    Route::resource('galeri', GalleryController::class)->except(['show']);

    // --- Manajemen Kontak ---
    Route::get('/kontak', [ContactController::class, 'adminIndex'])->name('kontak');
    Route::post('/kontak/update', [ContactController::class, 'update'])->name('kontak.update');

    /*
    |--------------------------------------------------------------------------
    | Super Admin Only Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware('can:super-admin-only')->group(function () {
        Route::patch('/users/{id}/toggle', [UserController::class, 'toggleStatus'])->name('users.toggle');
        Route::resource('users', UserController::class)->except(['show']);
    });

});
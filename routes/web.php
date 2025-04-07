<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UserController, LevelController, BarangController, WelcomeController,
    KategoriController, SupplierController, AuthController
};

Route::pattern('id', '[0-9]+');

// ==========================
// AUTHENTICATION
// ==========================
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postLogin']);
Route::get('logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// ==========================
// AUTH PROTECTED ROUTES
// ==========================
Route::middleware(['auth'])->group(function () {

    Route::get('/', [WelcomeController::class, 'index']);

    // ======================
    // ADMIN ONLY (ADM)
    // ======================
    Route::middleware(['authorize:ADM'])->group(function () {
        Route::resource('user', UserController::class);
        Route::resource('level', LevelController::class);
    });

    // ======================
    // MANAGER (MNG)
    // ======================
    Route::middleware(['authorize:MNG'])->group(function () {
        Route::resource('kategori', KategoriController::class);
    });

    // ======================
    // STAFF (STF)
    // ======================
    Route::middleware(['authorize:STF'])->group(function () {
        Route::resource('supplier', SupplierController::class);
    });

    // ======================
    // KASIR (KSR)
    // ======================
    Route::middleware(['authorize:KSR'])->group(function () {
        Route::resource('barang', BarangController::class);
    });

});

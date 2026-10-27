<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BuildController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\CategoryController;

Route::get('/about-us', [AboutController::class, 'index'])->name('about-us');

//builds routes
Route::get('/builds', [BuildController::class, 'index'])->name('builds-index');
Route::get('/builds/{build}', [BuildController::class, 'show'])->name('builds-show');
Route::get('/builds-create', [CategoryController::class, 'index'])->name('builds-create');
Route::post('/builds', [BuildController::class, 'store'])->name('builds-store');
Route::get('/builds/{build}/edit', [BuildController::class, 'edit'])->name('builds-edit');
Route::put('/builds/{build}', [BuildController::class, 'update'])->name('builds-update');
Route::delete('/builds/{build}', [BuildController::class, 'destroy'])->name('builds-destroy');

//favorites routes
Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites-index');
Route::post('/favorites/{id}', [FavoriteController::class, 'store'])->name('favorites-store');
Route::delete('/favorites/{id}', [FavoriteController::class, 'destroy'])->name('favorites-destroy');

Route::get('/', [BuildController::class, 'popular'])->name('popular-builds');
Route::get('/dashboard', [BuildController::class, 'popular'])->middleware(['auth', 'verified'])->name('dashboard');

//admin routes
Route::can('admin')->group(function () {
    Route::get('/admin-builds', [BuildController::class, 'admin_index'])->name('admin-builds');
    Route::post('/admin-builds/{id}', [BuildController::class, 'admin_toggle'])->name('admin-toggle');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BuildController;

Route::view('/', 'welcome')->name('home');

Route::get('/about-us', [AboutController::class, 'index'])->name('about-us');

Route::get('/builds', [BuildController::class, 'index'])->name('builds-index');
Route::get('/builds/{build}', [BuildController::class, 'show'])->name('builds-show');
Route::get('/builds-create', [BuildController::class, 'create'])->name('builds-create');
Route::post('/builds', [BuildController::class, 'store'])->name('builds-store');
Route::get('/builds/{build}/edit)', [BuildController::class, 'edit'])->name('builds-edit');
Route::post('/builds', [BuildController::class, 'update'])->name('builds-update');





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

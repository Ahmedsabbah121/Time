<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationController;






Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/location', [LocationController::class, 'add'])->name('location.add');
    Route::post('/store-location', [LocationController::class, 'store']);
    Route::get('/locations', [LocationController::class, 'index']);
    Route::get('/show-location/{id}', [LocationController::class, 'showLocation'])->name('show.location');
});

require __DIR__.'/auth.php';

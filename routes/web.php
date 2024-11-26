<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LksController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user-page', function () {
    return view('user-page');
})->middleware('auth', 'is_admin:admin');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    
    Route::resource('lks', LksController::class);
    Route::resource('modul', ModulController::class);
});

require __DIR__.'/auth.php';

require __DIR__.'/admin-auth.php';

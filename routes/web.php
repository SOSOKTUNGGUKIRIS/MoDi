<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;

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

    
    Route::resource('student', StudentController::class);
    Route::get('/moduls', [ModulController::class, 'index'])->name('modul.index');
    Route::get('/moduls/{id}', [ModulController::class, 'show'])->name('moduls.show');
    Route::get('/moduls/{id}/download', [ModulController::class, 'download'])->name('moduls.download');
    Route::get('/modul/create', [ModulController::class, 'create'])->name('modul.create');
    Route::post('/moduls', [ModulController::class, 'store'])->name('moduls.store');
});

require __DIR__.'/auth.php';

require __DIR__.'/admin-auth.php';

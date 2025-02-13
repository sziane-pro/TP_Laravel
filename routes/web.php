<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\TenantController;
use Illuminate\Support\Facades\Route;

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

    // Gestion des box
    Route::get('/boxes', [BoxController::class, 'index'])->name('boxes.index');
    Route::get('/boxes/create', [BoxController::class, 'create'])->name('boxes.create');
    Route::post('/boxes', [BoxController::class, 'store'])->name('boxes.store');
    Route::get('/boxes/{id}', [BoxController::class, 'show'])->name('boxes.show');
    Route::get('/boxes/{id}/edit', [BoxController::class, 'edit'])->name('boxes.edit');
    Route::put('/boxes/{id}/update', [BoxController::class, 'update'])->name('boxes.update');
    Route::delete('/boxes', [BoxController::class, 'destroy'])->name('boxes.destroy');

    // Gestion des locataires
    Route::get('/tenants', [TenantController::class, 'index'])->name('tenants.index');
    Route::get('/tenants/create', [TenantController::class, 'create'])->name('tenants.create');
    Route::post('/tenants', [TenantController::class, 'store'])->name('tenants.store');
    Route::get('/tenants/{id}', [TenantController::class, 'show'])->name('tenants.show');
    Route::get('/tenants/{id}/edit', [TenantController::class, 'edit'])->name('tenants.edit');
    Route::put('/tenants/{id}/update', [TenantController::class, 'update'])->name('tenants.update');
    Route::delete('/tenants', [TenantController::class, 'destroy'])->name('tenants.destroy');
    
});

require __DIR__.'/auth.php';

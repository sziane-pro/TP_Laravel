<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\ContractModelController;
use App\Http\Controllers\ContractController;
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
    
    // Gestion des modeles de contrats
    Route::get('/contract-models', [ContractModelController::class, 'index'])->name('contract-models.index');
    Route::get('/contract-models/create', [ContractModelController::class, 'create'])->name('contract-models.create');
    Route::post('/contract-models', [ContractModelController::class, 'store'])->name('contract-models.store');
    Route::get('/contract-models/{id}', [ContractModelController::class, 'show'])->name('contract-models.show');
    Route::get('/contract-models/{id}/edit', [ContractModelController::class, 'edit'])->name('contract-models.edit');
    Route::put('/contract-models/{id}/update', [ContractModelController::class, 'update'])->name('contract-models.update');
    Route::delete('/contract-models', [ContractModelController::class, 'destroy'])->name('contract-models.destroy');

    // Gestion des contrats
    Route::get('/contracts', [ContractController::class, 'index'])->name('contracts.index');
    Route::get('/contracts/create', [ContractController::class, 'create'])->name('contracts.create');
    Route::post('/contracts', [ContractController::class, 'store'])->name('contracts.store');
    Route::get('/contracts/{id}', [ContractController::class, 'show'])->name('contracts.show');
    Route::get('/contracts/{id}/edit', [ContractController::class, 'edit'])->name('contracts.edit');
    Route::put('/contracts/{id}/update', [ContractController::class, 'update'])->name('contracts.update');
    Route::delete('/contracts', [ContractController::class, 'destroy'])->name('contracts.destroy');
    Route::get('/contracts/{id}/preview', [ContractController::class, 'preview'])->name('contracts.preview');

});

require __DIR__.'/auth.php';

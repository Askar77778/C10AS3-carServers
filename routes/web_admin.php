<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MechanicController as AdminMechanicController;
use App\Http\Controllers\Admin\SparePartController as AdminSparePartController;

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {

    Route::get('/mechanics', [AdminMechanicController::class, 'index'])->name('mechanics.index');
    Route::post('/mechanics', [AdminMechanicController::class, 'store'])->name('mechanics.store');
    Route::delete('/mechanics/{id}', [AdminMechanicController::class, 'destroy'])->name('mechanics.destroy');
    Route::put('/mechanics/{id}', [MechanicController::class, 'update'])->name('mechanics.update');
    
    Route::get('/spare-parts', [AdminSparePartController::class, 'index'])->name('spare_parts.index');
    Route::post('/spare-parts', [AdminSparePartController::class, 'store'])->name('spare_parts.store');
    Route::put('/spare-parts/{id}', [AdminSparePartController::class, 'update'])->name('spare_parts.update');
    Route::delete('/spare-parts/{id}', [AdminSparePartController::class, 'destroy'])->name('spare_parts.destroy');
});
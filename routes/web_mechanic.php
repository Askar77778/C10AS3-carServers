<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mechanic\ScheduleController;
use App\Http\Controllers\Mechanic\JobController;

Route::middleware('auth')->prefix('mechanic')->name('mechanic.')->group(function () {
    Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule.index');
    Route::put('/schedule', [ScheduleController::class, 'update'])->name('schedule.update');
    Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
    Route::put('/jobs/{id}/status', [JobController::class, 'updateStatus'])->name('jobs.status.update');
});
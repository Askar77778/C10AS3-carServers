<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\ClientAuthController;
use App\Http\Controllers\Mechanic\MechanicAuthController;
use App\Http\Controllers\Admin\AdminAuthController;



Route::get('/client/login', [ClientAuthController::class, 'showLogin'])->name('client.login');
Route::post('/client/login', [ClientAuthController::class, 'login']);
Route::get('/client/register', [ClientAuthController::class, 'showRegister'])->name('client.register');
Route::post('/client/register', [ClientAuthController::class, 'register']);
Route::post('/client/logout', [ClientAuthController::class, 'logout'])->name('client.logout');

Route::get('/mechanic/login', [MechanicAuthController::class, 'showLogin'])->name('mechanic.login');
Route::post('/mechanic/login', [MechanicAuthController::class, 'login']);
Route::post('/mechanic/logout', [MechanicAuthController::class, 'logout'])->name('mechanic.logout');

Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

require __DIR__ . '/web_client.php';
require __DIR__ . '/web_mechanic.php';
require __DIR__ . '/web_admin.php';
<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::view('admin', 'admin.admin')->name('admin');
    Route::get('/admin/table-admin', [AdminController::class, 'index'])->name('table-admin');
    Route::get('/admin/table/{id}', [AdminController::class, 'edit'])->name('absen.edit');
    Route::post('/admin/table/{id}/update', [AdminController::class, 'update'])->name('absen.update');
    Route::post('/admon/table/{id}/delete', [AdminController::class, 'delete'])->name('absen.delete');
});

Route::middleware(['auth', 'verified', 'user'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::post('submit', [AbsenController::class, 'submit'])->name('absen.submit');
    Route::get('/absen', [AbsenController::class, 'index'])->name('absen.index');
});

require __DIR__ . '/auth.php';

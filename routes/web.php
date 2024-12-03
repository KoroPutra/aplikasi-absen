<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PengajuanController;
use App\Livewire\Chat;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('login');
});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/chat/{id)', Chat::class)->name('chat');

Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::view('admin', 'admin.admin')->name('admin');
    Route::get('/admin/table-admin', [AdminController::class, 'index'])->name('table-admin');
    Route::get('/admin/table/{id}', [AdminController::class, 'edit'])->name('absen.edit');
    Route::post('/admin/table/{id}/update', [AdminController::class, 'update'])->name('absen.update');
    Route::post('/admin/table/{id}/delete', [AdminController::class, 'delete'])->name('absen.delete');
    Route::get('/admin/pengajuan',[AdminController::class, 'pengajuan'])->name('table-pengajuan');
    Route::post('/admin/pengajuan/{id}/delete', [AdminController::class, 'deletePengajuan'])->name('pengajuan.delete');
    Route::post('/admin/pengajuan/{id}/update', [AdminController::class, 'updatePengajuan'])->name('pengajuan.update');
    Route::post('/admin/pengajuan/{id}/tidaksah', [AdminController::class, 'tidaksah'])->name('pengajuan.tidaksah');
    Route::post('/admin/pengajuan/{id}/ruangchat', [AdminController::class, 'ruangchat'])->name('pengajuan.ruangchat');
    
});

Route::middleware(['auth', 'verified', 'user'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::post('submit', [AbsenController::class, 'submit'])->name('absen.submit');
    Route::get('/absen', [AbsenController::class, 'index'])->name('absen.index');
    Route::get('/pengajuan', [PengajuanController::class, 'index'])->name('pengajuan.index');
    Route::post('/pengajuan/submit', [PengajuanController::class, 'submit'])->name('pengajuan.submit');
});

require __DIR__ . '/auth.php';

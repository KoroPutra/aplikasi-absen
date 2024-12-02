<?php

use App\Http\Controllers\Api\AbsenController;
use Illuminate\Support\Facades\Route;

Route::get('absen', [AbsenController::class, 'index']);
Route::post('absen', [AbsenController::class, 'store']);
Route::get('absen/{id}', [AbsenController::class, 'show']);
Route::delete('absen/{id}', [AbsenController::class, 'destroy']);

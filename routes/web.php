<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenjualanController;

Route::get('/', [PenjualanController::class, 'index']);

// Route Penjualan
Route::resource('penjualan', PenjualanController::class);

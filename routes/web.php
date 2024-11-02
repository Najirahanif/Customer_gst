<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;


Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('customers', DashboardController::class);
Route::get('customer/csv', [DashboardController::class, 'csv'])->name('customer.csv');
<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Login Register
Route::get('/login', [AuthController::class, 'login'])->name('indexlogin');
Route::get('/registration', [AuthController::class, 'register'])->name('indexregister');

// Dashboard Page
Route::get('/dashboard', [DashboardController::class, 'index'])->name('indexdashboard');
Route::get('/sparepart', [DashboardController::class, 'sparepart'])->name('indexsparepart');

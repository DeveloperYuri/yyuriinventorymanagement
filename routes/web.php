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

// Spare Part 
Route::get('/listsparepart', [DashboardController::class, 'sparepart'])->name('indexsparepart');
Route::get('/sparepartin', [DashboardController::class, 'sparepartin'])->name('sparepartin');
Route::get('/sparepartout', [DashboardController::class, 'sparepartout'])->name('sparepartout');


// Asset Tools
Route::get('/listassettools', [DashboardController::class, 'listassettools'])->name('indexassettools');
Route::get('/assettoolsin', [DashboardController::class, 'assettoolsin'])->name('assettoolsin');
Route::get('/assettoolsout', [DashboardController::class, 'assettoolsout'])->name('assettoolsout');

// ATK
Route::get('/listatk', [DashboardController::class, 'listatk'])->name('indexatk');
Route::get('/atkin', [DashboardController::class, 'atkin'])->name('atkin');
Route::get('/atkout', [DashboardController::class, 'atkout'])->name('atkout');

// Supplier
Route::get('/supplier', [DashboardController::class, 'listsupplier'])->name('indexsupplier');

// Users
Route::get('/users', [DashboardController::class, 'listusers'])->name('indexusers');

// Brand
Route::get('/brand', [DashboardController::class, 'listbrand'])->name('indexbrand');

// Warehouse
Route::get('/warehouse', [DashboardController::class, 'listwarehouse'])->name('indexwarehouse');

// Profile
Route::get('/warehouse', [DashboardController::class, 'profile'])->name('indexprofile');
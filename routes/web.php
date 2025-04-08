<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SparepartController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

// Login Register
Route::get('/', [AuthController::class, 'login'])->name('indexlogin');
Route::get('/registration', [AuthController::class, 'register'])->name('indexregister');

// Dashboard Page
Route::get('/dashboard', [DashboardController::class, 'index'])->name('indexdashboard');

// Spare Part 
Route::get('/listsparepart', [SparepartController::class, 'index'])->name('indexsparepart');
Route::get('/createlistsparepart', [SparepartController::class, 'create'])->name('createlistsparepart');
Route::post('/createlistsparepartpost', [SparepartController::class, 'store'])->name('createlistsparepartpost');
Route::get('/sparepartin', [SparepartController::class, 'sparepartin'])->name('sparepartin');
Route::get('/sparepartout', [SparepartController::class, 'sparepartout'])->name('sparepartout');


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
Route::get('/users', [UsersController::class, 'index'])->name('indexusers');
Route::get('/createusers', [UsersController::class, 'create'])->name('createusers');
Route::get('/editusers/{id}', [UsersController::class, 'edit'])->name('editusers');
Route::post('/createuserspost', [UsersController::class, 'store'])->name('createuserspost');
Route::put('/updateusers/{id}', [UsersController::class, 'update'])->name('updateuserspost');
Route::delete('/deleteusers/{id}', [UsersController::class, 'destroy'])->name('deleteusers');

// Brand
Route::get('/brand', [BrandController::class, 'index'])->name('indexbrand');
Route::get('/createbrand', [BrandController::class, 'create'])->name('createbrand');

// Warehouse
Route::get('/warehouse', [DashboardController::class, 'listwarehouse'])->name('indexwarehouse');

// Profile
Route::get('/profile', [DashboardController::class, 'profile'])->name('indexprofile');

Route::group(['middleware' => 'superadmin'], function () {
    Route::get('superadmin/dashboard', [DashboardController::class, 'index'])->name('superadmindashboard.dashboard');
});

Route::group(['middleware' => 'admin'], function () {
    Route::get('admin/dashboard', [DashboardController::class, 'index']);
});

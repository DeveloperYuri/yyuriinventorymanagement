<?php

use App\Http\Controllers\AssettoolsController;
use App\Http\Controllers\AssettoolsinController;
use App\Http\Controllers\AssettoolsoutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SparepartController;
use App\Http\Controllers\SparepartinController;
use App\Http\Controllers\SparepartoutController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WarehouseController;
use App\Models\AssettoolsinModel;
use App\Models\AssettoolsoutModel;
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
Route::delete('/deletesparepart/{id}', [SparepartController::class, 'destroy'])->name('deletesparepart');
Route::get('/editsparepart/{id}', [SparepartController::class, 'edit'])->name('editsparepart');
Route::put('/updatesparepart/{id}', [SparepartController::class, 'update'])->name('updatesparepart');

// Spare Part IN
Route::get('/listsparepartin', [SparepartinController::class, 'index'])->name('indexsparepartin');
Route::get('/createlistsparepartin', [SparepartinController::class, 'create'])->name('createlistsparepartin');
Route::post('/createsparepartinpost', [SparepartinController::class, 'store'])->name('createsparepartinpost');
Route::delete('/deletesparepartin/{id}', [SparepartinController::class, 'destroy'])->name('deletesparepartin');
Route::get('/editsparepartin/{id}', [SparepartinController::class, 'edit'])->name('editsparepartin');
Route::put('/editsparepartin/{id}', [SparepartinController::class, 'update'])->name('updatesparepartin');

// Spare Part OUT
Route::get('/listsparepartout', [SparepartoutController::class, 'index'])->name('indexsparepartout');
Route::get('/createsparepartout', [SparepartoutController::class, 'create'])->name('createsparepartout');
Route::post('/createsparepartoutpost', [SparepartoutController::class, 'store'])->name('createsparepartoutpost');
Route::delete('/deletesparepartout/{id}', [SparepartoutController::class, 'destroy'])->name('deletesparepartout');
Route::get('/editsparepartout/{id}', [SparepartoutController::class, 'edit'])->name('editsparepartout');
Route::put('/editsparepartout/{id}', [SparepartoutController::class, 'update'])->name('updatesparepartout');

// Asset Tools
Route::get('/listassettools', [AssettoolsController::class, 'index'])->name('indexassettools');
Route::get('/createassettools', [AssettoolsController::class, 'create'])->name('createassettools');
Route::post('/createassettoolspost', [AssettoolsController::class, 'store'])->name('createassettoolspost');
Route::delete('/deleteassettools/{id}', [AssettoolsController::class, 'destroy'])->name('deleteassettools');
Route::get('/editassettoolsin/{id}', [AssettoolsController::class, 'edit'])->name('editassettools');
Route::put('/updateassettools/{id}', [AssettoolsController::class, 'update'])->name('updateassettools');

// Asset Tools IN
Route::get('/listassettoolsin', [AssettoolsinController::class, 'index'])->name('indexassettoolsin');
Route::get('/createassettoolsin', [AssettoolsinController::class, 'create'])->name('createassettoolsin');
Route::post('/createassettoolsinpost', [AssettoolsinController::class, 'store'])->name('createassettoolsinpost');
Route::delete('/deleteassettoolsin/{id}', [AssettoolsinController::class, 'destroy'])->name('deleteassettoolsin');
Route::get('/editassettoolsin/{id}', [AssettoolsinController::class, 'edit'])->name('editassettoolsin');
Route::put('/updateassettoolsin/{id}', [AssettoolsinController::class, 'update'])->name('updateassettoolsin');

// Asset Tools OUT
Route::get('/listassettoolsout', [AssettoolsoutController::class, 'index'])->name('indexassettoolsout');
Route::get('/createassettoolsout', [AssettoolsoutController::class, 'create'])->name('createassettoolsout');
Route::post('/createassettoolsoutpost', [AssettoolsoutController::class, 'store'])->name('createassettoolsoutpost');
Route::delete('/deleteassettoolsout/{id}', [AssettoolsoutController::class, 'destroy'])->name('deleteassettoolsout');
Route::get('/editassettoolsout/{id}', [AssettoolsoutController::class, 'edit'])->name('editassettoolsout');
Route::put('/updateassettoolsout/{id}', [AssettoolsoutController::class, 'update'])->name('updateassettoolsout');

// ATK
Route::get('/listatk', [DashboardController::class, 'listatk'])->name('indexatk');
Route::get('/atkin', [DashboardController::class, 'atkin'])->name('atkin');
Route::get('/atkout', [DashboardController::class, 'atkout'])->name('atkout');

// Supplier
Route::get('/supplier', [SupplierController::class, 'index'])->name('indexsupplier');
Route::get('/createsupplier', [SupplierController::class, 'create'])->name('createsupplier');
Route::post('/createsupplierpost', [SupplierController::class, 'store'])->name('createsupplierpost');
Route::delete('/deletesupplier/{id}', [SupplierController::class, 'destroy'])->name('deletesupplier');
Route::get('/editsupplier/{id}', [SupplierController::class, 'edit'])->name('editsupplier');
Route::put('/updatesupplier/{id}', [SupplierController::class, 'update'])->name('updatesupplier');

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
Route::post('/createbrandpost', [BrandController::class, 'store'])->name('createbrandpost');
Route::delete('/deletebrand/{id}', [BrandController::class, 'destroy'])->name('deletebrand');
Route::get('/editbrand/{id}', [BrandController::class, 'edit'])->name('editbrand');
Route::put('/updatebrand/{id}', [BrandController::class, 'update'])->name('updatebrand');

// Warehouse
Route::get('/warehouse', [WarehouseController::class, 'index'])->name('indexwarehouse');
Route::get('/createwarehouse', [WarehouseController::class, 'create'])->name('createwarehouse');
Route::post('/createwarehousepost', [WarehouseController::class, 'store'])->name('createwarehousepost');
Route::delete('/deletewarehouse/{id}', [WarehouseController::class, 'destroy'])->name('deletewarehouse');
Route::get('/editwarehouse/{id}', [WarehouseController::class, 'edit'])->name('editwarehouse');
Route::put('/updatewarehouse/{id}', [WarehouseController::class, 'update'])->name('updatewarehouse');

// Profile
Route::get('/profile', [DashboardController::class, 'profile'])->name('indexprofile');

Route::group(['middleware' => 'superadmin'], function () {
    Route::get('superadmin/dashboard', [DashboardController::class, 'index'])->name('superadmindashboard.dashboard');
});

Route::group(['middleware' => 'admin'], function () {
    Route::get('admin/dashboard', [DashboardController::class, 'index']);
});

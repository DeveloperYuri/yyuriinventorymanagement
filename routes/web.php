<?php

use App\Http\Controllers\AssettoolsController;
use App\Http\Controllers\AssettoolsinController;
use App\Http\Controllers\AssettoolsoutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ListAssetToolsController;
use App\Http\Controllers\ListSparePartController;
use App\Http\Controllers\SparepartController;
use App\Http\Controllers\SparepartinController;
use App\Http\Controllers\SparepartoutController;
use App\Http\Controllers\StockAssetController;
use App\Http\Controllers\StockAssetToolsController;
use App\Http\Controllers\StockController;
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
// Route::get('/listsparepart', [SparepartController::class, 'index'])->name('indexsparepart');
// Route::get('/createlistsparepart', [SparepartController::class, 'create'])->name('createlistsparepart');
// Route::post('/createlistsparepartpost', [SparepartController::class, 'store'])->name('createlistsparepartpost');
// Route::delete('/deletesparepart/{id}', [SparepartController::class, 'destroy'])->name('deletesparepart');
// Route::get('/editsparepart/{id}', [SparepartController::class, 'edit'])->name('editsparepart');
// Route::put('/updatesparepart/{id}', [SparepartController::class, 'update'])->name('updatesparepart');

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
Route::get('/editassettools/{id}', [AssettoolsController::class, 'edit'])->name('editassettools');
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

// Login
Route::post('login_post', [AuthController::class, 'login_post'])->name('loginpost');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');;


Route::group(['middleware' => 'superadmin'], function () {
    
    Route::get('/dashboardsuperadmin', [DashboardController::class, 'index'])->name('indexdashboardsuperadmin');

});

Route::group(['middleware' => 'admin'], function () {
    Route::get('/dashboardadmin', [DashboardController::class, 'index'])->name('indexdashboardadmin');

});

Route::group(['middleware' => 'users'], function () {
    Route::get('/dashboardusers', [DashboardController::class, 'index'])->name('indexdashboarduser');

});


    // Route::get('/dashboardadmin', [AuthController::class, 'loginadmin'])->name('logindashboardadmin');
    // Route::get('/dashboarduser', [AuthController::class, 'loginuser'])->name('logindashboarduser');
    // Route::get('/dashboardsuperadmin', [AuthController::class, 'loginsuperadmin'])->name('logindashboardsuperadmin');


// Sparepart list In Out
Route::get('/listsparepartbaru', [ListSparePartController::class, 'index'])->name('spare-parts.index');

Route::get('/spare-parts/create', [ListSparePartController::class, 'create'])->name('spare-parts.create');
Route::post('/spare-parts', [ListSparePartController::class, 'store'])->name('spare-parts.store');
Route::get('/spare-parts/{id}/edit', [ListSparePartController::class, 'edit'])->name('spare-parts.edit');
Route::put('/spare-parts/{id}', [ListSparePartController::class, 'update'])->name('spare-parts.update');
Route::delete('/spare-parts/{id}', [ListSparePartController::class, 'destroy'])->name('spare-parts.destroy');

Route::get('/stock-in', [StockController::class, 'stockInIndex'])->name('stock-in.index');
Route::get('/stock-in/create', [StockController::class, 'stockInForm'])->name('stock-in.create');
Route::post('/stock-in', [StockController::class, 'storeStockIn'])->name('stock-in.store');

Route::get('/stock-out', [StockController::class, 'stockOutIndex'])->name('stock-out.index');
Route::get('/stock-out/create', [StockController::class, 'stockOutForm'])->name('stock-out.create');
Route::post('/stock-out', [StockController::class, 'storeStockOut'])->name('stock-out.store');

// Asset Tools In Out
Route::get('/listAssettoolsbaru', [ListAssetToolsController::class, 'index'])->name('asset-tools.index');
Route::get('/asset-tools/create', [ListAssetToolsController::class, 'create'])->name('asset-tools.create');
Route::post('/asset-tools', [ListAssetToolsController::class, 'store'])->name('asset-tools.store');
Route::get('/asset-tools/{id}/edit', [ListAssetToolsController::class, 'edit'])->name('asset-tools.edit');
Route::put('/asset-tools/{id}', [ListAssetToolsController::class, 'update'])->name('asset-tools.update');
Route::delete('/asset-tools/{id}', [ListAssetToolsController::class, 'destroy'])->name('asset-tools.destroy');

Route::get('/asset-in', [StockAssetController::class, 'stockInIndex'])->name('asset-in.index');
Route::get('/asset-in/create', [StockAssetController::class, 'stockInForm'])->name('asset-in.create');
Route::post('/asset-in', [StockAssetController::class, 'storeStockIn'])->name('asset-in.store');

Route::get('/asset-out', [StockAssetController::class, 'stockOutIndex'])->name('asset-out.index');
Route::get('/asset-out/create', [StockAssetController::class, 'stockOutForm'])->name('asset-out.create');
Route::post('/asset-out', [StockAssetController::class, 'storeStockOut'])->name('asset-out.store');
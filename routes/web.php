<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\BranchController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\TaxController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//URL::forceScheme('https');


Route::get('/', function () {
    return view('login');
});

Route::match (['get', 'post'], '/login', [LoginController::class, 'index'])->name('login');

Route::middleware('auth')->group(function () {
    Route::get('/logout', [LoginController::class, 'logout']);
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');

    // returns the home page with all branchs
    Route::get('/branchs',[BranchController::class ,'index'])->name('branchs.index');
    // returns the form for adding a post
    Route::get('/branchs/create', [BranchController::class , 'create'])->name('branchs.create');
    // adds a post to the database
    Route::post('/branchs', [BranchController::class ,'store'])->name('branchs.store');
    // returns a page that shows a full post
    // Route::get('/branchs/{post}', [BranchController::class ,'show'])->name('branchs.show');
    // returns the form for editing a post
    Route::get('/branchs/{post}', [BranchController::class ,'edit'])->name('branchs.edit');
    // updates a post
    Route::put('/branchs/{post}', [BranchController::class ,'update'])->name('branchs.update');
    // deletes a post
    Route::delete('/branchs/{post}', [BranchController::class ,'destroy'])->name('branchs.destroy');

    Route::get('/departments',[DepartmentController::class ,'index'])->name('departments.index');
    Route::get('/departments/create', [DepartmentController::class , 'create'])->name('departments.create');
    Route::post('/departments', [DepartmentController::class ,'store'])->name('departments.store');
    Route::get('/departments/{post}', [DepartmentController::class ,'edit'])->name('departments.edit');
    Route::put('/departments/{post}', [DepartmentController::class ,'update'])->name('departments.update');
    Route::delete('/departments/{post}', [DepartmentController::class ,'destroy'])->name('departments.destroy');

    Route::get('/designations',[DesignationController::class ,'index'])->name('designations.index');
    Route::get('/designations/create', [DesignationController::class , 'create'])->name('designations.create');
    Route::post('/designations', [DesignationController::class ,'store'])->name('designations.store');
    Route::get('/designations/{post}', [DesignationController::class ,'edit'])->name('designations.edit');
    Route::put('/designations/{post}', [DesignationController::class ,'update'])->name('designations.update');
    Route::delete('/designations/{post}', [DesignationController::class ,'destroy'])->name('designations.destroy');

    Route::get('/shifts',[ShiftController::class ,'index'])->name('shifts.index');
    Route::get('/shifts/create', [ShiftController::class , 'create'])->name('shifts.create');
    Route::post('/shifts', [ShiftController::class ,'store'])->name('shifts.store');
    Route::get('/shifts/{post}', [ShiftController::class ,'edit'])->name('shifts.edit');
    Route::put('/shifts/{post}', [ShiftController::class ,'update'])->name('shifts.update');
    Route::delete('/shifts/{post}', [ShiftController::class ,'destroy'])->name('shifts.destroy');

    Route::get('/warehouses',[WarehouseController::class ,'index'])->name('warehouses.index');
    Route::get('/warehouses/create', [WarehouseController::class , 'create'])->name('warehouses.create');
    Route::post('/warehouses', [WarehouseController::class ,'store'])->name('warehouses.store');
    Route::get('/warehouses/{post}', [WarehouseController::class ,'edit'])->name('warehouses.edit');
    Route::put('/warehouses/{post}', [WarehouseController::class ,'update'])->name('warehouses.update');
    Route::delete('/warehouses/{post}', [WarehouseController::class ,'destroy'])->name('warehouses.destroy');

    Route::get('/units',[UnitController::class ,'index'])->name('units.index');
    Route::get('/units/create', [UnitController::class , 'create'])->name('units.create');
    Route::post('/units', [UnitController::class ,'store'])->name('units.store');
    Route::get('/units/{post}', [UnitController::class ,'edit'])->name('units.edit');
    Route::put('/units/{post}', [UnitController::class ,'update'])->name('units.update');
    Route::delete('/units/{post}', [UnitController::class ,'destroy'])->name('units.destroy');

    Route::get('/taxes',[TaxController::class ,'index'])->name('taxes.index');
    Route::get('/taxes/create', [TaxController::class , 'create'])->name('taxes.create');
    Route::post('/taxes', [TaxController::class ,'store'])->name('taxes.store');
    Route::get('/taxes/{post}', [TaxController::class ,'edit'])->name('taxes.edit');
    Route::put('/taxes/{post}', [TaxController::class ,'update'])->name('taxes.update');
    Route::delete('/taxes/{post}', [TaxController::class ,'destroy'])->name('taxes.destroy');
});
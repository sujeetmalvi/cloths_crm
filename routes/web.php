<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\BranchController;


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
    Route::delete('/branches/{post}', [BranchController::class ,'destroy'])->name('branchs.destroy');


});
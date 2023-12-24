<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;


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

Route::get('/', function () {
    return view('login');
});

Route::match (['get', 'post'], '/login', [LoginController::class, 'index'])->name('login');

Route::middleware('auth')->group(function () {
    Route::get('/logout', [LoginController::class, 'logout']);
    Route::get(
        '/dashboard',
        function () {
            return view('dashboard');
        }
    )->name('dashboard');
    Route::get(
        '/dashboard2',
        function () {
            return view('dashboard2');
        }
    )->name('dashboard');
    Route::get(
        '/dashboard3',
        function () {
            return view('dashboard3');
        }
    )->name('dashboard');
    Route::get(
        '/form',
        function () {
            return view('form');
        }
    )->name('form');
    Route::get(
        '/form_advanced',
        function () {
            return view('form_advanced');
        }
    )->name('form_advanced');
    Route::get(
        '/form_validation',
        function () {
            return view('form_validation');
        }
    )->name('form_validation');

    Route::get(
        '/form_wizards',
        function () {
            return view('form_wizards');
        }
    )->name('form_wizards');

    Route::get(
        '/form_upload',
        function () {
            return view('form_upload');
        }
    )->name('form_upload');

    Route::get(
        '/form_buttons',
        function () {
            return view('form_buttons');
        }
    )->name('form_buttons');

    Route::get(
        '/general_elements',
        function () {
            return view('general_elements');
        }
    )->name('general_elements');

    Route::get(
        '/media_gallery',
        function () {
            return view('media_gallery');
        }
    )->name('media_gallery');

    Route::get(
        '/typography',
        function () {
            return view('typography');
        }
    )->name('typography');

    Route::get(
        '/icons',
        function () {
            return view('icons');
        }
    )->name('icons');

    Route::get(
        '/glyphicons',
        function () {
            return view('glyphicons');
        }
    )->name('glyphicons');

    Route::get(
        '/widgets',
        function () {
            return view('widgets');
        }
    )->name('widgets');

    Route::get(
        '/invoice',
        function () {
            return view('invoice');
        }
    )->name('invoice');

    Route::get(
        '/inbox',
        function () {
            return view('inbox');
        }
    )->name('inbox');

    Route::get(
        '/calendar',
        function () {
            return view('calendar');
        }
    )->name('calendar');

    Route::get(
        '/tables',
        function () {
            return view('tables');
        }
    )->name('tables');

    Route::get(
        '/tables_dynamic',
        function () {
            return view('tables_dynamic');
        }
    )->name('tables_dynamic');

    Route::get(
        '/chartjs',
        function () {
            return view('chartjs');
        }
    )->name('chartjs');

    Route::get(
        '/chartjs2',
        function () {
            return view('chartjs2');
        }
    )->name('chartjs2');

    Route::get(
        '/morisjs',
        function () {
            return view('morisjs');
        }
    )->name('morisjs');

    Route::get(
        '/echarts',
        function () {
            return view('echarts');
        }
    )->name('echarts');

    Route::get(
        '/other_charts',
        function () {
            return view('other_charts');
        }
    )->name('other_charts');
    Route::get(
        '/fixed_sidebar',
        function () {
            return view('fixed_sidebar');
        }
    )->name('fixed_sidebar');

    Route::get(
        '/fixed_footer',
        function () {
            return view('fixed_footer');
        }
    )->name('fixed_footer');

    Route::get(
        '/e_commerce',
        function () {
            return view('e_commerce');
        }
    )->name('e_commerce');

    Route::get(
        '/projects',
        function () {
            return view('projects');
        }
    )->name('projects');


    Route::get(
        '/project_detail',
        function () {
            return view('project_detail');
        }
    )->name('project_detail');

    Route::get(
        '/contacts',
        function () {
            return view('contacts');
        }
    )->name('contacts');

    Route::get(
        '/page_403',
        function () {
            return view('page_403');
        }
    )->name('page_403');

    Route::get(
        '/page_404',
        function () {
            return view('page_404');
        }
    )->name('page_404');

    Route::get(
        '/page_500',
        function () {
            return view('page_500');
        }
    )->name('page_500');

    Route::get(
        '/plain_page',
        function () {
            return view('plain_page');
        }
    )->name('plain_page');

    Route::get(
        '/pricing_tables',
        function () {
            return view('pricing_tables');
        }
    )->name('pricing_tables');

    Route::get(
        '/level2',
        function () {
            return view('level2');
        }
    )->name('level2');



    Route::get('/profile', [UserController::class, 'profile'])->name('profile');

});
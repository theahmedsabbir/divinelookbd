<?php

use Illuminate\Support\Facades\Route;

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

Route::get('cache', function() {
    \Artisan::call('cache:clear');
    \Artisan::call('config:clear');
    \Artisan::call('config:cache');
    \Artisan::call('view:clear');
    \Artisan::call('optimize');
    return "Cleared!";
});

Route::get('/', function () {
    return view('frontend.home.index');
});

Route::get('/admin/login', [\App\Http\Controllers\Admin\AdminController::class, 'adminLogin']);
Route::post('/admin/login', [\App\Http\Controllers\Admin\AdminController::class, 'login']);
Route::get('/admin/dashboard', [\App\Http\Controllers\Admin\AdminController::class, 'deshboard']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

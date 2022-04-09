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


Route::get('/flush', function() {
    session()->flush();
    return redirect('/');
});
Route::get('/', [\App\Http\Controllers\Frontend\FrontendController::class, 'index']);
Route::get('/admin/login', [\App\Http\Controllers\Admin\AdminController::class, 'adminLogin']);
Route::post('/admin/login', [\App\Http\Controllers\Admin\AdminController::class, 'login']);
Route::group(['middleware' => ['admin']], function(){
	Route::get('/admin/dashboard', [\App\Http\Controllers\Admin\AdminController::class, 'dashboard']);
	Route::get('/admin/logout', [\App\Http\Controllers\Admin\AdminController::class, 'logout']);
	Route::get('/admin/categories', [\App\Http\Controllers\Admin\CategoryController::class, 'index']);
	Route::get('/admin/category/create', [\App\Http\Controllers\Admin\CategoryController::class, 'create']);
	Route::post('/admin/category/store', [\App\Http\Controllers\Admin\CategoryController::class, 'store']);
	Route::get('/admin/category/edit/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'edit']);
	Route::post('/admin/category/update/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'update']);
	Route::get('/admin/category/delete/{slug}', [\App\Http\Controllers\Admin\CategoryController::class, 'destroy']);
	Route::post('/admin/logout', [\App\Http\Controllers\Admin\AdminController::class, 'logout']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

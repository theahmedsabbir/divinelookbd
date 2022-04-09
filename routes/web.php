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

Route::group(['prefix' => 'admin'], function (){
    Route::get('/login', [\App\Http\Controllers\Admin\AdminController::class, 'adminLogin']);
    Route::post('/login', [\App\Http\Controllers\Admin\AdminController::class, 'login']);
    Route::group(['middleware' => ['admin']], function(){
        Route::get('/dashboard', [\App\Http\Controllers\Admin\AdminController::class, 'dashboard']);
        Route::get('/logout', [\App\Http\Controllers\Admin\AdminController::class, 'logout']);
        Route::get('/categories', [\App\Http\Controllers\Admin\CategoryController::class, 'index']);
        Route::get('/category/create', [\App\Http\Controllers\Admin\CategoryController::class, 'create']);
        Route::post('/category/store', [\App\Http\Controllers\Admin\CategoryController::class, 'store']);
        Route::get('/category/edit/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'edit']);
        Route::post('/category/update/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'update']);
        Route::get('/category/delete/{slug}', [\App\Http\Controllers\Admin\CategoryController::class, 'destroy']);
        Route::post('/logout', [\App\Http\Controllers\Admin\AdminController::class, 'logout']);
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

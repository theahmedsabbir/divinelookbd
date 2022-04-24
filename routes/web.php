<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\FrontOrderController;
use App\Http\Controllers\Frontend\FrontProductController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\HomeController;
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
    return session()->all();
});

Route::group(['prefix' => 'admin'], function (){
    Route::get('/login', [AdminController::class, 'adminLogin']);
    Route::post('/login', [AdminController::class, 'login']);
    Route::group(['middleware' => ['admin']], function(){

        // ======================= Admin routes ======================= //
        Route::get('/dashboard', [AdminController::class, 'dashboard']);
        Route::post('/logout', [AdminController::class, 'logout']);

        //=============  orders ======================//

        Route::get('/order/index', [OrderController::class, 'index']);
        Route::get('/order/view/{id}', [OrderController::class, 'view']);
        Route::get('/order/delete/{id}', [OrderController::class, 'delete']);

        // ======================= User routes ======================= //
        Route::get('/user/index', [UserController::class, 'index']);
        Route::get('/user/status/edit/{id}/{status}', [UserController::class, 'statusEdit']);
        Route::get('/user/delete/{slug}', [UserController::class, 'destroy']);

        // ======================= Category routes ======================= //
        Route::get('/category/index', [CategoryController::class, 'index']);
        Route::get('/category/create', [CategoryController::class, 'create']);
        Route::post('/category/store', [CategoryController::class, 'store']);
        Route::get('/category/edit/{id}', [CategoryController::class, 'edit']);
        Route::post('/category/update/{id}', [CategoryController::class, 'update']);
        Route::get('/category/delete/{slug}', [CategoryController::class, 'destroy']);

        // ======================= Brand routes ======================= //
        Route::get('/brand/index', [BrandController::class, 'index']);
        Route::get('/brand/create', [BrandController::class, 'create']);
        Route::post('/brand/store', [BrandController::class, 'store']);
        Route::get('/brand/edit/{id}', [BrandController::class, 'edit']);
        Route::post('/brand/update/{id}', [BrandController::class, 'update']);
        Route::get('/brand/delete/{slug}', [BrandController::class, 'destroy']);

        // ======================= Product routes ======================= //
        Route::get('/product/index', [ProductController::class, 'index']);
        Route::get('/product/create', [ProductController::class, 'create']);
        Route::post('/product/store', [ProductController::class, 'store']);
        Route::get('/product/view/{id}', [ProductController::class, 'view']);
        Route::get('/product/edit/{id}', [ProductController::class, 'edit']);
        Route::post('/product/update/{id}', [ProductController::class, 'update']);
        Route::get('/product/delete/{id}', [ProductController::class, 'destroy']);

        // ======================= Product routes ======================= //
        Route::get('banner/{bannerType}/index', [BannerController::class, 'index']);
        Route::get('banner/{bannerType}/create', [BannerController::class, 'create']);
        Route::post('banner/{bannerType}/store', [BannerController::class, 'store']);
        Route::get('/banner/{bannerType}/edit/{id}', [BannerController::class, 'edit']);
        Route::post('/banner/{bannerType}/update/{id}', [BannerController::class, 'update']);
        Route::get('/banner/{bannerType}/delete/{id}', [BannerController::class, 'destroy']);
    });
});

Auth::routes();

// ======================= Frontend routes ======================= //
Route::get('/', [FrontendController::class, 'index']);
Route::get('/modal/set-visibility/{value}', [FrontendController::class, 'modalSetVisibility']);

Route::group(['middleware' => 'auth'], function (){
    Route::get('/profile', [FrontendController::class, 'profile']);
    Route::post('/profile/update', [FrontendController::class, 'profileUpdate']);
});

// ======================= Frontend Product routes ======================= //
Route::get('/product/all', [FrontProductController::class, 'all']);
Route::get('/product/details/{id}/{slug}', [FrontProductController::class, 'details']);
Route::get('/product/wishlist/add/{slug}', [FrontProductController::class, 'wishlistAdd']);
Route::get('/product/wishlist/remove/{slug}', [FrontProductController::class, 'wishlistRemove']);
Route::get('/product/wishlist', [FrontProductController::class, 'wishlist']);

//=========== Add to cart ==============//
Route::post('/add/to/card', [FrontOrderController::class, 'addToCart']);
Route::get('order/add-to-cart/{id}', [FrontOrderController::class, 'addToCartGet']);
Route::post('/cart/update/{id}', [FrontProductController::class, 'shoppingCartUpdate']);
Route::get('/cart/product/delete/{id}', [FrontOrderController::class, 'deleteCartProduct']);
Route::get('/shopping/cart', [FrontOrderController::class, 'shoppingCart']);

Route::group(['middleware' => 'auth'], function (){
    Route::get('/shipping', [FrontOrderController::class, 'shipping']);
    Route::post('/shipping/store', [FrontOrderController::class, 'shippingStore']);
    Route::get('/payment', [FrontOrderController::class, 'payment']);
    Route::post('/order', [FrontOrderController::class, 'order']);
    Route::get('/complete', [FrontOrderController::class, 'complete']);
    Route::post('/rating', [FrontOrderController::class, 'rating'])->middleware('auth');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

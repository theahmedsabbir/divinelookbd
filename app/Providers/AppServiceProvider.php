<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        View::composer('*', function ($view){
            $view->with('categories', Category::orderBy('created_at', 'desc')->get());
            $view->with('feature_products', Product::with('category', 'brand')->where('features', 'featured')->get());
            $view->with('productCount', Cart::where('user_id', auth()->check() ? auth()->user()->id : '')->orWhere('ip_address', request()->ip())->get());
        });
    }
}

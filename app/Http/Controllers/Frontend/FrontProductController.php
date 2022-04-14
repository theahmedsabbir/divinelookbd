<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontProductController extends Controller
{
    public function all()
    {
    	$products = Product::orderBy('id','desc')->get();
        return view('frontend.product.all', compact('products'));
    }

    public function details($id, $slug)
    {
        $product = Product::with('category', 'brand')->find($id);
        $related= Product::where('cat_id', '=', $product->category ? $product->category->id: '')
            ->where('id', '!=', $product->id)
            ->get();
        return view('frontend.home.product-details', compact('product', 'related'));
    }

    //================== Add to cart =====================//

    public function addToCart(Request $request)
    {
        $cart = new Cart();
        if (auth()->check()){
            $cart->user_id = auth()->user()->id;
        }else{
            $cart->ip_address = $request->ip();
        }
        $cart->product_id = $request->product_id;
        if ($request->discount_price){
            $cart->price = $request->discount_price;
        }else{
            $cart->price = $request->price;
        }
        $cart->qty = 1;
        if ($request->discount_price){
            $cart->total_price = 1*$request->discount_price;
        }else{
            $cart->total_price = 1*$request->price;
        }
        $cart->save();
        return redirect()->back()->withSuccess('Product added to cart');
    }
}

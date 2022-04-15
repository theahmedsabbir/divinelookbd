<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontProductController extends Controller
{
    public function all(Request $request)
    {
    	// make query based on request fields
		$productQuery = Product::orderBy('id', 'desc');


		// order_by
		if($request->order_by && $request->order_by != 'default'){
			if($request->order_by == "price_asc"){
				$productQuery = Product::orderBy('price', 'asc');
			}
			if($request->order_by == "price_desc"){
				$productQuery = Product::orderBy('price', 'desc');
			}
			if($request->order_by == "id_asc"){
				$productQuery = Product::orderBy('id', 'asc');
			}
			if($request->order_by == "id_desc"){
				$productQuery = Product::orderBy('id', 'desc');
			}
		}

		// cat_ids
		if($request->cat_ids && count($request->cat_ids) > 0){
			$productQuery->whereIn('cat_id', $request->cat_ids);
		}

		// price
		if(isset($request->min_price) &&
			isset($request->max_price) &&
			($request->min_price < $request->max_price)
		){
			$productQuery->where('price', '>=', $request->min_price)
						->where('price', '<=', $request->max_price);
		}

		// brand_ids
		if($request->brand_ids && count($request->brand_ids) > 0){
			$productQuery->whereIn('brand_id', $request->brand_ids);
		}

		// color_ids
		if($request->color_ids && count($request->color_ids) > 0){
			foreach ($request->color_ids as $key => $request_color_id) {
				if ($key == 0) {
					$productQuery->whereJsonContains('colors', $request_color_id);
				}else{
					$productQuery->orWhereJsonContains('colors', $request_color_id);
				}
			}
		}

		// types
		if($request->types && count($request->types) > 0){
			$productQuery->whereIn('type', $request->types);
		}

		// per page products
		if($request->per_page){
			$products = $productQuery->paginate($request->per_page);
		}else{
			$products = $productQuery->paginate(12);
		}

        return view('frontend.product.all', compact('products'));
    }

    public function details($id, $slug)
    {
        $product = Product::with('category', 'brand')->find($id);
        $related= Product::where('cat_id', '=', $product->category ? $product->category->id: '')
		            ->where('id', '!=', $product->id)
		            ->get();
        return view('frontend.product.product-details', compact('product', 'related'));
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
        if ($request->qty){
            $cart->qty = $request->qty;
        }else{
            $cart->qty = 1;
        }
        if ($request->discount_price){
            $cart->total_price = $request->qty ? $request->qty * $request->discount_price : 1*$request->discount_price;
        }else{
            $cart->total_price = $request->qty ? $request->qty * $request->price : 1*$request->price;
        }
        $cart->save();
        return redirect()->back()->withSuccess('Product added to cart');
    }

    public function deleteCartProduct($id)
    {
        $cartProduct = Cart::find($id);
        $cartProduct->delete();
        return redirect()->back()->withSuccess('Product has been removed form cart.');
    }
}

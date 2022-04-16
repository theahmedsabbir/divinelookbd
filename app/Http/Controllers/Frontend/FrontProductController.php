<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\RatingWishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontProductController extends Controller
{
    public function all(Request $request)
    {
    	// return $request->all();
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



		// search
		if($request->search){
			$search = $request->search;

			// name search 
			$productQuery->where('name', 'LIKE' ,  '%' . $search . '%');

			// category search
			$productQuery->orWhereHas('category', function($category) use($search){
			    			$category->where('name', 'LIKE' , '%'. $search . '%');
			    		});

			// brand search
			$productQuery->orWhereHas('brand', function($brand) use($search){
			    			$brand->where('name', 'LIKE' , '%'. $search . '%');
			    		});
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

    public function wishlistAdd($slug)
    {
        $product = Product::where('slug', $slug)->first();
        if(!Auth::check()){ return redirect('/login')->withError('Product Login First'); }
        if($product == null){ return redirect()->back()->withError('Product not found. Please try again'); }
        
        // if product already in wishlist?? return back
        $thisUserWishlistProduct = Auth::user()->wishlists->where('product_id', $product->id);
        if(count($thisUserWishlistProduct) > 0){ 
        	return redirect()->back()->withError('Product already added to wishlist'); 
        }

        $RatingWishlist = new RatingWishlist;

        $RatingWishlist->user_id = Auth::user()->id;
        $RatingWishlist->product_id = $product->id;
        $RatingWishlist->type = 'wishlist';
        $RatingWishlist->save();

        return redirect()->back()->withSuccess('Product Added To Wishlist');
    }

    public function wishlistRemove($slug)
    {
        $product = Product::where('slug', $slug)->first();
        if(!Auth::check()){ return redirect('/login')->withError('Product Login First'); }
        if($product == null){ return redirect()->back()->withError('Product not found. Please try again'); }
        
        // if product is not already in wishlist?? return back
        $thisUserWishlistProduct = Auth::user()->wishlists->where('product_id', $product->id)->first();
        if($thisUserWishlistProduct == null){ 
        	return redirect()->back()->withError('Product not found in wishlist'); 
        }
        
        $thisUserWishlistProduct->delete();

        $thisUserWishlist = RatingWishlist::where('user_id', Auth::user()->id)->get();
        if($thisUserWishlist->count() == 0){
        	return redirect('product/all')->withSuccess('Product removed from wishlist');
        }

        return redirect()->back()->withSuccess('Product Removed From Wishlist');
    }

    public function wishlist(Request $request)
    {
        if(!Auth::check()){ return redirect('/login')->withError('Product Login First'); }

        
        $thisUserWishlist = RatingWishlist::where('user_id', Auth::user()->id)->get();
        if($thisUserWishlist->count() == 0){
        	return redirect('product/all')->withError('Your wishlist is empty');
        }

        $user = Auth::user();

        // return $request->all();

        $productQuery = Product::with('wishlist')
	        					->whereHas('wishlist', function($wishlist) use($user){
						        	$wishlist->where('user_id', $user->id);
						        });	


		// order_by
		if($request->order_by && $request->order_by != 'default'){
			if($request->order_by == "price_asc"){
				$productQuery->orderBy('price', 'asc');
			}
			if($request->order_by == "price_desc"){
				$productQuery->orderBy('price', 'desc');
			}
			if($request->order_by == "id_asc"){
				$productQuery->orderBy('id', 'asc');
			}
			if($request->order_by == "id_desc"){
				$productQuery->orderBy('id', 'desc');
			}
		}


		// per page products
		if($request->per_page){
			$products = $productQuery->paginate($request->per_page);
		}else{
			$products = $productQuery->paginate(12);
		}	

        return view('frontend.product.wishlist', compact('products'));
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

    public function shoppingCart()
    {
        $cartProducts = Cart::where('user_id', auth()->check() ? auth()->user()->id : '')
            ->orWhere('ip_address', request()->ip())->get();
        return view('frontend.product.cart', compact('cartProducts'));
    }

    public function shoppingCartUpdate(Request $request, $id)
    {
        //dd($id);
        $cartUpdate = Cart::find($id);
        $cartUpdate->qty = $request->qty;
        $cartUpdate->save();
        return redirect()->back()->withSuccess('Product qty has been updated.');
    }
}

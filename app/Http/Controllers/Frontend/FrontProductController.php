<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontProductController extends Controller
{
    public function all()
    {
    	$products = Product::orderBy('id','desc')
    					->get();
        return view('frontend.product.all', compact('products'));
    }

    public function details($id, $slug)
    {
        $product = Product::with('category', 'brand')->find($id);
        return view('frontend.product.product-details', compact('product'));
    }
}

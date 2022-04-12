<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $products = Product::with('category', 'brand')->get()->toArray();
        $signal_products = count($products) > 0 ? array_chunk( $products, ceil(count($products)/4) ) : [];
        return view('frontend.home.index', compact('signal_products'));
    }

    public function details($id, $slug)
    {
        $product = Product::with('category', 'brand')->find($id);
        return view('frontend.home.product-details', compact('product'));
    }
}

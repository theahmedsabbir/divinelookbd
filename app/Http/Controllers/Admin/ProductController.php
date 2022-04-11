<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('backend.product.index');
    }

    public function create()
    {
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        return view('backend.product.create', compact('brands', 'categories'));
    }

    public function store(Request $request)
    {
        return $request->all();
    }
}

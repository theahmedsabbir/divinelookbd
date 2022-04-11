<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        // return $request->all();

        // image extension check
        $request->validate([
            'cat_id'   => 'required',
            'brand_id' => 'required',
            'image'    =>  'mimes:jpeg,jpg,png,bmp',
            'images.*' =>  'mimes:jpeg,jpg,png,bmp',
        ],[
            'cat_id.required' => 'Category field is required',
            'brand_id.required' => 'Brand field is required',
        ]);

        // upload product
        $product = new Product;

        $product->cat_id = $request->cat_id;
        $product->brand_id = $request->brand_id;
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->sku = $request->sku;
        $product->discount_price = $request->discount_price;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->information = $request->information;
        $product->type = $request->type;
        $product->features = $request->features;


        if ($request->file('image')){
            $image = $product->slug . time().'.'. $request->image->extension();
            $request->image->move('product/', $image);
            $product->image = $image;
        }

        $product->save();

        // upload product images
        foreach ($request->images as $key => $p_image) {
            $ProductImage = new ProductImage;

            $ProductImage->product_id = $product->id;
            $image = $product->slug . time(). $key . '.'. $p_image->extension();
            $p_image->move('product/', $image);
            $ProductImage->image = $image;

            $ProductImage->save();
        }

        return redirect('admin/product/index')->withSuccess('Product uploaded successfully.');
    }
    public function edit($id)
    {
        $product = Product::find($id);
        if($product == null){
            return redirect()->back()->withError('Product not found');
        }

        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        return view('backend.product.edit', compact('brands', 'categories', 'product'));
    }

    public function update(Request $request, $id)
    {
        // return $request->all();

        // image extension check
        $request->validate([
            'cat_id'   => 'required',
            'brand_id' => 'required',
            'image'    =>  'mimes:jpeg,jpg,png,bmp',
            'images.*' =>  'mimes:jpeg,jpg,png,bmp',
        ],[
            'cat_id.required' => 'Category field is required',
            'brand_id.required' => 'Brand field is required',
        ]);

        // update product data        
        $product = Product::find($id);
        if($product == null){
            return redirect()->back()->withError('Product not found');
        }

        $product->cat_id = $request->cat_id;
        $product->brand_id = $request->brand_id;
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->sku = $request->sku;
        $product->discount_price = $request->discount_price;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->information = $request->information;
        $product->type = $request->type;
        $product->features = $request->features;


        if ($request->file('image')){            
            if ($product->image && file_exists('product/'.$product->image)){
                unlink('product/'.$product->image);
            }


            $image = $product->slug . time().'.'. $request->image->extension();
            $request->image->move('product/', $image);
            $product->image = $image;
        }

        $product->save();

        if($request->images && count($request->images) > 0){
            // delete old images and images data 
            foreach ($product->images as $old_image) {
                          
                if ($old_image && file_exists('product/'.$old_image->image)){
                    unlink('product/'.$old_image->image);
                }

                $old_image->delete();
            }

            // upload product images
            foreach ($request->images as $key => $p_image) { 



                $ProductImage = new ProductImage;
                $ProductImage->product_id = $product->id;
                $image = $product->slug . time(). $key . '.'. $p_image->extension();
                $p_image->move('product/', $image);
                $ProductImage->image = $image;

                $ProductImage->save();
            }
        }

        return redirect('admin/product/index')->withSuccess('Product updated successfully.');
    }

    public function destroy($id){
        
        // find product
        $product = Product::find($id);
        if($product == null){
            return redirect()->back()->withError('Product not found');
        }

        // delete old images and images data 
        foreach ($product->images as $old_image) {
                      
            if ($old_image && file_exists('product/'.$old_image->image)){
                unlink('product/'.$old_image->image);
            }

            $old_image->delete();
        }

        // delete product single image           
        if ($product->image && file_exists('product/'.$product->image)){
            unlink('product/'.$product->image);
        }

        // delete product
        $product->delete();

        return redirect('admin/product/index')->withSuccess('Product deleted successfully.');

    }
}

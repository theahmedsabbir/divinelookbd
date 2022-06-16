<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\ProductsImport;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function index()
    {
        return view('backend.product.index');
        // test changes
    }

    public function create()
    {
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        return view('backend.product.create', compact('brands', 'categories'));
    }

    public function store(Request $request)
    {
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
        if ($request->colors) {
            $product->colors = json_encode($request->colors);
        }
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
    public function view($id)
    {
        $product = Product::with('category', 'brand')->find(decrypt($id));
        if($product == null){
            return redirect()->back()->withError('Product not found');
        }

        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        return view('backend.product.view', compact('brands', 'categories', 'product'));
    }
    public function edit($id)
    {
        $product = Product::find(decrypt($id));
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
        if ($request->colors) {
            $product->colors = json_encode($request->colors);
        }else{
           $product->colors = null; 
        }
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
        $product = Product::find(decrypt($id));
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
            if ($product->image != 'sample.jpg') {
                unlink('product/'.$product->image);                
            }
        }

        // delete product
        $product->delete();

        return redirect('admin/product/index')->withSuccess('Product deleted successfully.');

    }


    public function createBulk(){
        return view('backend.product.createBulk');
    }
    public function storeBulk(Request $r){

        // echo "<pre>";
        // print_r($r->file('bulk_file')->getClientOriginalExtension());
        // echo "<pre>";

        $validated = $r->validate([
            'bulk_file'      => 'required',
        ],[
            'bulk_file.required'     => 'File is required',
        ]);

        $extensions = array("xls","xlsx","xlm","xla","xlc","xlt","xlw");

        $result = array($r->file('bulk_file')->getClientOriginalExtension());

        if(in_array($result[0],$extensions) == false){
            session()->flash('file_type_error', 'File extensions must be xls, xlsx');
            return redirect()->back();
        }

        $import = Excel::import(new ProductsImport, $r->file('bulk_file'), \Maatwebsite\Excel\Excel::XLSX );
        
        session()->flash('Success', 'Bulk products uploaded successfully');
        return redirect('admin/product/index');


        // product image upload 
    }

    public function bulkSampleFile(){
        return response()->download('product/bulk/sample.xlsx');
    }
}

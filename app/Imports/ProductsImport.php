<?php
namespace App\Imports;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');

class ProductsImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        // dd($rows[0]);
         Validator::make($rows->toArray(), [
             '*.NAME'              => 'required|unique:products',
             '*.SKU'               => 'required',
             '*.CATEGORY SLUG'     => 'required|exists:categories,slug',
             '*.BRAND SLUG'        => 'required|exists:brands,slug',
             '*.DISCOUNT PRICE'    => 'nullable|numeric|min:0',
             '*.PRICE'             => 'required|numeric|min:0',
             '*.QUANTITY'          => 'required|numeric|min:0',
             '*.SHORT DESCRIPTION' => 'required',
             '*.LONG DESCRIPTION'  => 'required',
             '*.INFORMATION'       => 'required',
         ],[

            // '*.Type.required' => 'Type field is required',
            // '*.Type.numeric' => 'Type field should be numeric',
            // '*.Type.min' => 'Type field should value should be between 1 & 2',
            // '*.Type.max' => 'Type field should value should be between 1 & 2',            
            // '*.Product Name.required' => 'Product name field is required',
            // '*.Unit.required' => 'Unit field is required',
            // '*.Unit Amount.required' => 'Unit Amount field is required',
            // '*.Unit Amount.numeric' => 'Unit Amount field should be numeric',
            // '*.Reciever Name.required' => 'Reciever Name field is required',
            // '*.Unit.required' => 'Unit field is required',
            // '*.Unit.required' => 'Unit field is required',
            // '*.Unit.required' => 'Unit field is required',

         ])->validate();
        // dd($rows);

        foreach ($rows as $row) {


            $product = new Product;

            $product->cat_id            = Category::where('slug', $row['CATEGORY SLUG'])->first()->id;    
            $product->brand_id          = Brand::where('slug', $row['BRAND SLUG'])->first()->id;      
            $product->image             = 'sample.jpg';    
            $product->name              = $row['NAME'];    
            $product->slug              = Str::slug($product->name);    
            $product->sku               = $row['SKU'];  
            $product->discount_price    = $row['DISCOUNT PRICE'];    
            $product->price             = $row['PRICE'];    
            $product->qty               = $row['QUANTITY'];    
            $product->short_description = $row['SHORT DESCRIPTION'];    
            $product->long_description  = $row['LONG DESCRIPTION'];    
            $product->information       = $row['INFORMATION'];  



            $product->save();
        }
    }
}











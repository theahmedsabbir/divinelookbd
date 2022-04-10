<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::orderBy('created_at', 'desc')->get();
        return view('backend.brand.index', compact('brands'));
    }

    public function create()
    {
        $page = 'create';
        $brand = '';
        return view('backend.brand.create', compact('page', 'brand'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255|unique:brands,name'
        ]);

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->slug = str_replace(' ', '-', strtolower($request->name));
        if ($request->file('image')){
            $image = $brand->slug . time().'.'. $request->image->extension();
            $request->image->move('brand/', $image);
            $brand->image = $image;
        }
        $brand->save();

        return redirect('admin/brand/index')->withSuccess('Brand has been successfully added.');
    }

    public function edit($id)
    {
        $page = 'edit';
        $brand = Brand::find($id);
        return view('backend.brand.create', compact('page', 'brand'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255|unique:brands,name,'. $id,
        ]);

        // dd($request->all());
        $brand = Brand::find($id);
        if ($brand == null){
            return redirect()->back()->withError('Brand has been empty.');
        }

        $brand->name = $request->name;
        $brand->slug = str_replace(' ', '-', strtolower($request->name));
        if (isset($request->image)){
            if ($brand->image && file_exists('brand/'.$brand->image)){
                unlink('brand/'.$brand->image);
            }
            $updateBrandImage = $brand->slug .'.'. $request->image->extension();
            $request->image->move('brand/', $updateBrandImage);
            $brand->image = $updateBrandImage;
        }

        $brand->save();
        return redirect('admin/brand/index')->withSuccess('Brand has been successfully updated.');
    }

    public function destroy($slug)
    {
        $brand = Brand::where('slug', $slug)->first();    
        if ($brand->image && file_exists('brand/'.$brand->image)){
            unlink('brand/'.$brand->image);
        }
        $brand->delete();
        return redirect()->back()->withSuccess('Brand has been successfully deleted.');
    }
}

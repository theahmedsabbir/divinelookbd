<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();
        return view('backend.category.index', compact('categories'));
    }

    public function create()
    {
        $page = 'create';
        $category = '';
        return view('backend.category.create', compact('page', 'category'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'name' => 'required|string|max:255|unique:categories'
        ]);
        if ($request->file('image')){
            $image = $request->name . time().'.'. $request->image->extension();
            $request->image->move('category/', $image);
        }
        $category = new Category();
        $category->name = $request->name;
        $category->slug = str_replace(' ', '-', strtolower($request->name));
        if ($request->file('image')){
            $category->image = $image;
        }
        $category->save();
        return redirect()->back()->withSuccess('Category has been successfully added.');
    }

    public function edit($id)
    {
        $page = 'edit';
        $category = Category::find($id);
        return view('backend.category.create', compact('page', 'category'));
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());
        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);

        $category = Category::find($id);
        if ($category == null){
            return redirect()->back()->withError('Category has been empty.');
        }
        if (isset($request->image)){
            if ($category->image && file_exists('category/'.$category->image)){
                unlink('category/'.$category->image);
            }
            $updateCategoryImage = $request->name.'.'. $request->image->extension();
            $request->image->move('category/', $updateCategoryImage);
            $category->image = $updateCategoryImage;
        }
        $category->name = $request->name;
        $category->slug = str_replace(' ', '-', strtolower($request->name));
        $category->save();
        return redirect()->back()->withSuccess('Category has been successfully updated.');
    }

    public function destroy($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $category->delete();
        return redirect()->back()->withError('Category has been successfully deleted.');
    }
}

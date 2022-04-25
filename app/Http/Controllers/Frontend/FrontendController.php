<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class FrontendController extends Controller
{
    public function index()
    {
    	// dd(session()->all());
        // $products = Product::with('category', 'brand')->get()->toArray();
        // $signal_products = count($products) > 0 ? array_chunk( $products, ceil(count($products)/4) ) : [];

        // take top 5 categories whose products are most, have at least a single product 
        $most_product_categories = Category::withCount([
            'products as count_products', 
        ])->orderByRaw('count_products desc')
        ->havingRaw('count_products > 0')
        ->take(5)
        ->get();

        // take 8 products from each categories
        $all_category_products = collect();
        foreach ($most_product_categories as $key => $most_product_category) {
            $this_category_products = $most_product_category->products->take(8); 
            if(count($this_category_products) > 0){
                $current_category_products = collect();
                foreach ($this_category_products as $this_category_product) {
                    $current_category_products->push($this_category_product);
                }
                $category_products_pair = collect();
                $category_products_pair->put('category', $most_product_category);
                $category_products_pair->put('products', $current_category_products);
                $all_category_products->push($category_products_pair);
            }
        }

        // dd($all_category_products);

        return view('frontend.home.index', compact('all_category_products'));
    }
    public function profile()
    {
        return view('frontend.home.profile');
    }
    public function contact()
    {
        return view('frontend.home.contact');
    }
    public function about()
    {
        return view('frontend.home.about');
    }
    public function profileUpdate(Request $request)
    {
        // validate
        $request->validate([

            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'. Auth::user()->id,
            'phone' => 'required|string|max:255|unique:users,phone,'. Auth::user()->id,
            'avatar' => 'mimes:jpg,jpeg,png,bmp,tiff|max:4096',

        ]);

        // return $request->all();
        $user = Auth::user();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;


        // upload image
        if($request->avatar){
            if ($user->avatar && file_exists('users/'.$user->avatar)){
                unlink('users/'.$user->avatar);
            }
            $avatar = $request->avatar;
            $avatarName = Str::slug($request->name) . time().'_'.'.'. $avatar->extension();
            $avatar->move('users', $avatarName );

            $user->avatar = $avatarName;
        }


        $user->save();


        return redirect()->back()->with('success', 'Account updated successfully');
    }
    public function modalSetVisibility($value)
    {
    	if ($value == $value) {
    		Session::forget('modal-visibility');
    		Session::put('modal-visibility', $value);
    	}
    	return response()->json([
    		'value' => $value,
    		'modal-visibility' => Session::get('modal-visibility')
    	]);
    }
}

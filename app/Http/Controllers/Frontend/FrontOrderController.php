<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\RatingWishlist;
use App\Models\Shipping;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class FrontOrderController extends Controller
{
    //================== Add to cart =====================//
    public function addToCart(Request $request)
    {
        //dd($request->all());
        $updateCart = Cart::where('product_id', $request->product_id)->first();
        if ($updateCart){
            if ($request->discount_price){
                $updateCart->total_price = $request->discount_price * ($updateCart->qty + $request->qty);
            }else{
                $updateCart->total_price = $request->price * ($updateCart->qty + $request->qty);
            }
            if ($request->qty){
                $updateCart->qty = $updateCart->qty + $request->qty;
            }
            $updateCart->save();
            Session::flash('show_cart_animation', true);
            return redirect()->back()->withSuccess('Product updated to cart');
        }else{
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
                $cart->qty = $request->qty;
            }
            if ($request->discount_price){
                $cart->total_price = $request->qty ? $request->qty * $request->discount_price : $request->qty*$request->discount_price;
            }else{
                $cart->total_price = $request->qty ? $request->qty * $request->price : $request->qty*$request->price;
            }
            $cart->save();
            Session::flash('show_cart_animation', true);
            return redirect()->back()->withSuccess('Product added to cart');
        }
    }


    public function addToCartGet($product_id)
    {
        // return $product_id;
        $product = Product::find($product_id);

        if(!$product) {return redirect()->back()->withError('Product not found.');}

        $discount_price = $product->discount_price;
        $price          = $product->price;
        $qty            = 1;

        // dd($request->all());
        $updateCart = Cart::where('product_id', $product_id)->first();
        if ($updateCart){
            if ($discount_price){
                $updateCart->total_price = $discount_price * ($updateCart->qty + $qty);
            }else{
                $updateCart->total_price = $price * ($updateCart->qty + $qty);
            }
            if ($qty){
                $updateCart->qty = $updateCart->qty + $qty;
            }
            $updateCart->save();
            Session::flash('show_cart_animation', true);
            return redirect()->back()->withSuccess('Product updated to cart');
        }else{
            $cart = new Cart();
            if (auth()->check()){
                $cart->user_id = auth()->user()->id;
            }else{
                $cart->ip_address = request()->ip();
            }
            $cart->product_id = $product_id;
            if ($discount_price){
                $cart->price = $discount_price;
            }else{
                $cart->price = $price;
            }
            if ($qty){
                $cart->qty = $qty;
            }else{
                $cart->qty = $qty;
            }
            if ($discount_price){
                $cart->total_price = $qty ? $qty * $discount_price : $qty*$discount_price;
            }else{
                $cart->total_price = $qty ? $qty * $price : $qty*$price;
            }
            $cart->save();
            Session::flash('show_cart_animation', true);
            // dd(Session::all());
            return redirect()->back()->withSuccess('Product added to cart');
        }
    }

    public function deleteCartProduct($id)
    {
        $cartProduct = Cart::find($id);
        $cartProduct->delete();        
        // Session::flash('show_cart_animation', true);
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
        $cartUpdate->total_price = $request->qty * $cartUpdate->price;
        $cartUpdate->save();
        
        Session::flash('show_cart_animation', true);
        return redirect()->back()->withSuccess('Product qty has been updated.');
    }

    public function shipping()
    {
        $cartProducts = Cart::where('user_id', auth()->check() ? auth()->user()->id : '')
            ->orWhere('ip_address', request()->ip())->get();
        return view('frontend.product.shipping', compact('cartProducts'));
    }

    public function shippingStore(Request $request)
    {
        $shipping = new Shipping();
        $shipping->user_id = auth()->user()->id;
        $shipping->address = $request->address;
        $shipping->save();
        return redirect('/payment')->withSuccess('Shipping has been inserted.');
    }

    public function payment()
    {
        $cartProducts = Cart::where('user_id', auth()->check() ? auth()->user()->id : '')
            ->orWhere('ip_address', request()->ip())->get();
        return view('frontend.product.payment', compact('cartProducts'));
    }

    public function order(Request $request)
    {
        $cartProducts = Cart::where('user_id', auth()->check() ? auth()->user()->id : '')
            ->orWhere('ip_address', request()->ip())->get();
        $newOrder = new Order();
        $newOrder->user_id = auth()->user()->id;
        $newOrder->total_qty = $request->total_qty;
        $newOrder->total_price = $request->total_price;
        $newOrder->payment_type = 'Cash on delivery';
        $newOrder->transaction_id = $request->transaction_id;
        $newOrder->save();

        //=============== Order details ================//
        foreach ($cartProducts as $cartProduct){
            $orderDetails = new OrderDetail();
            $orderDetails->order_id = $newOrder->id;
            $orderDetails->product_id = $cartProduct->product_id;
            $orderDetails->qty = $cartProduct->qty;
            $orderDetails->price = $cartProduct->price;
            $orderDetails->save();
        }

        //=============== Product qty update ================//
        foreach ($cartProducts as $cartProduct){
            $product = Product::find($cartProduct->product_id);
            $product->qty = $product->qty - $cartProduct->qty;
            $product->save();
        }
        return redirect('/complete')->with('success', 'Your order has been completed.');
    }

    public function complete()
    {
        return view('frontend.product.complete');
    }

    public function rating(Request $request)
    {
        //============== Empty cart ================//
        $cartProductsEmpty = Cart::where('user_id', auth()->user()->id)->orWhere('ip_address', request()->ip())->get();
        foreach ($cartProductsEmpty as $cartEmpty){
            $rating = new RatingWishlist();
            $rating->user_id = auth()->check() ? auth()->user()->id : 0;
            $rating->product_id = $cartEmpty->product_id;
            $rating->rating = $request->rating;
            $rating->message = $request->message;
            $rating->type = 'rating';
            $rating->save();

            $cartEmpty->delete();
        }
        return redirect('/complete')->with('success', 'Your order has been completed.');
    }

    //============= Social login ====================//
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();

            $finduser = User::where('google_id', $user->id)->first();

            if($finduser){

                Auth::login($finduser);

                return redirect()->intended('/');

            }else{
                $newUser = User::create([
                    'google_id'=> $user->getId(),
                    'avatar' => $user->getAvatar(),
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'phone' => '01738780232',
                    'address' => 'Gulshan Dhaka Bangladesh',
                    'password' => bcrypt('12345678'),
                ]);

                Auth::login($newUser);

                return redirect()->intended('/');
            }

        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}

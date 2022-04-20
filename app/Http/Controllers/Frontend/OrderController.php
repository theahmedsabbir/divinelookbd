<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\RatingWishlist;
use App\Models\Shipping;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //================== Add to cart =====================//
    public function addToCart(Request $request)
    {
        //dd($request->all());
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
            $cart->qty = 1;
        }
        if ($request->discount_price){
            $cart->total_price = $request->qty ? $request->qty * $request->discount_price : 1*$request->discount_price;
        }else{
            $cart->total_price = $request->qty ? $request->qty * $request->price : 1*$request->price;
        }
        $cart->save();
        return redirect()->back()->withSuccess('Product added to cart');
    }

    public function deleteCartProduct($id)
    {
        $cartProduct = Cart::find($id);
        $cartProduct->delete();
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
        $cartUpdate->save();
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
}

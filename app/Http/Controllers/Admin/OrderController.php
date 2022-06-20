<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use App\Models\Admin;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Session;
class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('orderDetails', 'user')->orderByDesc('created_at')->get()->groupBy('user_id');
        return view('backend.order.index', compact('orders'));
    }

    public function view($id)
    {
        $order = Order::with('orderDetails', 'user')->orderByDesc('created_at')->find($id);
        return view('backend.order.view', compact('order'));
    }

    public function create()
    {
        return view('backend.order.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            
            'product_ids' => 'required',
            'qty'         => 'required',
            'user_id'     => 'required',

        ]);


        // foreach (Order::all() as $key => $o) {
        //     $o->delete();
        // }

        //=============== each product stock check ================//
        foreach ($request->product_ids as $key => $product_id){

            $product = Product::find($product_id);

            // jodi asking quantiy product er qunatityr cheye beshi hoi taile unavailable
            if($product == null || 
                $product->qty == 0 || 
                $request->qty[$key] > $product->qty
            ){
                return redirect()->back()->with('error', 'Product ' . $product->name . ' is not available');
            };
        }


        //=============== Place New Order ================//
        $order = new Order();
        $order->user_id = $request->user_id;
        $order->total_qty = 0;
        $order->total_price = 0;
        $order->payment_type = $request->payment_type;
        $order->transaction_id = $request->transaction_id;
        $order->save();

        //=============== Order details store ================//
        $total_qty = 0;
        $total_price = 0;
        foreach ($request->product_ids as $key => $product_id){

            // finding price
            $product = Product::find($product_id);

            if($product == null) continue;

            $productPrice = $product->price;

            if ($product->discount_price && $product->discount_price > 0) {
                $productPrice = $product->discount_price;
            }

            // save order products
            $orderDetail = new OrderDetail();

            // check if product is already in orderDetail or not
            $oldOrderDetail = OrderDetail::where('order_id', $order->id)->where('product_id', $product_id)->first();

            if ($oldOrderDetail) {
                $orderDetail = $oldOrderDetail;

                $orderDetail->qty += $request->qty[$key]; //ager qty add hobe
            }else{
                $orderDetail->order_id = $order->id;
                $orderDetail->product_id = $product_id;
                $orderDetail->qty = $request->qty[$key]; // new qty save hobe      
            }
            $orderDetail->price = $productPrice; //price always same

            $orderDetail->save();

            // calculating total qty and price
            $total_qty += $request->qty[$key]; //current quantity add hobe 
            $total_price += ($request->qty[$key] * $productPrice); //current product price add hobe

            // product stock update
            $product->qty -= $request->qty[$key]; //current product er stock minus hobe
            $product->save();
        }

        //=============== update order quantity and price ================//

        $order->total_qty = $total_qty;
        $order->total_price = $total_price;
        $order->save();


        //=============== redirect ================//
        return redirect('admin/order/index')->with('success', 'Order Placed Successfully.');
    }

    public function delete($id)
    {
        $orderDelete = Order::with('orderDetails')->find($id);
        foreach ($orderDelete->orderDetails as $order){
            $order->delete();
        }
        $orderDelete->delete();

        return redirect()->back()->with('success', 'Order has been deleted.');
    }

    //============== Stock ==============//

    public function stockList()
    {
        return view('backend.stock.index');
    }
}

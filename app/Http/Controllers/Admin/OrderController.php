<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use App\Models\Admin;
use App\Models\Order;
use App\Models\OrderDetail;
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

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
        $orders = Order::with('orderDetails', 'user')->orderByDesc('created_at')->get();
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

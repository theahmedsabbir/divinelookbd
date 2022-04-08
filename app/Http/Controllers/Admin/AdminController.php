<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Session;
class AdminController extends Controller
{
    public function adminLogin()
    {
        return view('backend.login');
    }

    public function dashboard()
    {
        return view('backend.dashboard');
    }

    public function login(AdminLoginRequest $request)
    {
        $admin = Admin::where('email', $request->email)->first();
        if (!$admin){
            return redirect()->back()->withError('Sorry your email not register our record.');
        }
        if ($admin){
            if (password_verify($request->password, $admin->password)){
                Session::put('admin_id', $admin->id);
                Session::put('admin_name', $admin->name);
                return redirect('/admin/dashboard');
            }else{
                return redirect()->back()->with('error', 'Password dose not match');
            }
        }else{
            return redirect()->back()->with('error', 'E-mail dose not match');
        }
    }

    public function logout(Request $request)
    {
        Session()->flush();
        return redirect('admin/login');
    }
}

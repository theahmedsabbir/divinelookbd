<?php

namespace App\Http\Middleware;

use Closure;
use Session;


class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // dd(Session::has('admin_id'));
        // $request->session()->flush();
        // Session::forget('admin_id');
        // Session::forget('admin_name');
        //dd(session()->all() );
        // dd(session()->get('admin_name') );
        if(Session::get('admin_id')){
            return $next($request);
        }

        Session::flash('Error', 'Unauthorised !! Please login first');
        return redirect('/admin/login');
    }
}

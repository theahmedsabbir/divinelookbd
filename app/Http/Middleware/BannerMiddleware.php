<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BannerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $bannerTypes = ['slider','side-banner', 'mid-banner', 'full-banner', 'popup', 'gallery'];
        if (!in_array($request->route()->parameter('bannerType'), $bannerTypes)) {
            return redirect()->back()->withError('Invalid Request.');
        }
        return $next($request);
    }
}

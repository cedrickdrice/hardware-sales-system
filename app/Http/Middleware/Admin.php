<?php

namespace App\Http\Middleware;

use Request;
use Closure;
use Auth;

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
        if (Auth::check() && Auth::user()->type == 'admin') 
            return $next($request);
        else if (Auth::check() && Auth::user()->type == 'user')
            return redirect('/?authenticate=invalid&URI='.Request::url());
        else if (Auth::check() && Auth::user()->type == 'icp')
            return redirect('icp/products?authenticate=invalid&URI='.Request::url());  
        else 
            return redirect('manager/dashboard?authenticate=invalid&URI='.Request::url());  
    }
}

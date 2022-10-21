<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Request;
class Manager
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
        if (Auth::check() && Auth::user()->type == 'manager') 
            return $next($request);
        else if (Auth::check() && Auth::user()->type == 'user')
            return redirect('/?authenticate=invalid&URI='.Request::url());
        else if (Auth::check() && Auth::user()->type == 'icp')
            return redirect('icp/products?authenticate=invalid&URI='.Request::url());  
        else 
            return redirect('admin/dashboard?authenticate=invalid&URI='.Request::url());
    }
}

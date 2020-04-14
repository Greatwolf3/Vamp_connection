<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class Master
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role == 1) {
            return $next($request);
        } elseif (Auth::check() && Auth::user()->role == 0) {
            return redirect('/superadmin');
        } elseif (Auth::check() && Auth::user()->role == 2) {
            return redirect('/player');
        }
        else {
            Auth::logout();
            return redirect('/login');
        }
    }
}

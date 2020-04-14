<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class Superadmin
{
    function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role == 0) {
            return $next($request);
        }
        elseif (Auth::check() && Auth::user()->role == 1) {
            return redirect('/master');
        }
        elseif (Auth::check() && Auth::user()->role == 2) {
            return redirect('/player');
        }
        else {
            Auth::logout();
            return redirect('/login');
        }
    }
}

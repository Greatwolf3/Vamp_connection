<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class Player
{
    function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role == 2) {
            return $next($request);
        }
        elseif (Auth::check() && Auth::user()->role == 0) {
            return redirect('/superadmin');
        }  elseif (Auth::check() && Auth::user()->role == 1) {
            return redirect('/master');
        }
        else {
            Auth::logout();
            return redirect('/login');
        }
    }
}

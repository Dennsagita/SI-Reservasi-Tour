<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CekLevel
{
    
    public function handle($request, Closure $next, ...$levels)
    {
        // if (in_array($request->user()->level,$levels)) {
        //     return $next($request);
        // }
        // return redirect('/login');
        // if (Auth::check() && Auth::user()->level == $levels) {
        //     return $next($request);
        // }

        // return redirect('/login');
    }
}

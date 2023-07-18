<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MultipleTableGuestMiddleware
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        foreach ($guards as $guard) {
            if (Auth::guard('admin','pengemudi')($guard)->check()) {
                if ($request->is('login')) {
                    return redirect('/dashboard'); // Ganti dengan URL tujuan jika pengguna sudah terotentikasi dan mencoba mengakses halaman login
                }
            } else {
                return $next($request);
            }
        }

        return $next($request);
    }
}

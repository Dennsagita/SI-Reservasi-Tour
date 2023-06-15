<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pengemudi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('post/login');
    }

    public function postLogin(Request $request)
    {
        // dd($request->all());
        // if (Auth::attempt($request->only('email', 'password'))) {
        //     return redirect('/dashboard_admin');
        // }
        // return redirect('/dashboard_admin');
        $login = $request->only('email', 'password');

    if (Auth::guard('user')->attempt($login)) {
        // Autentikasi berhasil
        return redirect()->intended('/dashboard_admin');
        // {
        //     if ($user->level === 'admin') {
        //         return redirect('/dashboard_admin');
        //     } elseif ($user->level === 'pelanggan') {
        //         return redirect('/home');
        //     }
        // }
    } else if(Auth::guard('pengemudi')->attempt($login)) {
        // Autentikasi berhasil
        return redirect()->intended('/dashboard_admin');
    }else
        // Autentikasi gagal
        return redirect()->back()->withErrors(['message' => 'Email atau kata sandi salah']);
    
    }
    public function logout()
    {
        if (Auth::guard('user')->check()) {
            Auth::guard('user')->logout();
            
        }elseif (Auth::guard('pengemudi')->check()) {
            Auth::guard('pengemudi')->logout();
        }
        return redirect('/login');
    }
}

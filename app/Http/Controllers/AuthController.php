<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Pengemudi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('post/login');
    }

    public function register()
    {
        $data['title'] = 'Register';
        return view('post/registrasi', $data);
    }

    public function processregistrasi(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'no_telp' => 'required|numeric',
            'alamat' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
        ]);

        $user = new User([
            'nama' => $request->nama,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->save();

        return redirect('/login')->with('success', 'Registration success. Please login!');
    }

    public function registerpengemudi()
    {
        $data['title'] = 'Register';
        return view('post/registrasi-pengemudi', $data);
    }

    public function processregistrasipengemudi(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'no_telp' => 'required|numeric',
            'alamat' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
        ]);

        $pengemudi = new Pengemudi([
            'nama' => $request->nama,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'status' => $request->status,
            'password' => Hash::make($request->password),
        ]);

        $pengemudi->save();

        return redirect()->route('registrasimobil', $pengemudi->id);
    }
    
    public function processLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            session()->flash('loginBerhasil', true);
            return redirect()->intended(route('dashboard'));
        }
        else if (Auth::guard('pengemudi')->attempt($credentials)) {
            $request->session()->regenerate();
            session()->flash('loginBerhasil', true);
            return redirect()->intended(route('dashboardPengemudi'));
        }
        else if (Auth::guard('user')->attempt($credentials)) {
            $request->session()->regenerate();
            session()->flash('loginBerhasil', true);
            return redirect()->intended('/home');
        }

        return back()->withErrors([
            'gagal-login' => 'Email atau password Tidak Sesuai',
        ])->onlyInput('email');
    
    }

    public function password()
    {
        $data['title'] = 'Register';
        return view('post/resetpassword', $data);
    }

    public function password_action(Request $request)
    {

        $request->validate([
            'old_password' => 'required|current_password',
            'new_password' => 'required',
            'new_password_confirm'=>'required|same:new_password',
        ]);


        if(Str::length(Auth::guard('user')->user()) > 0){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->new_password);
            $user->save();
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }elseif(Str::length(Auth::guard('admin')->user()) > 0){
            $admin = Admin::find(Auth::id());
            $admin->password = Hash::make($request->new_password);
            $admin->save();
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }elseif(Str::length(Auth::guard('pengemudi')->user()) > 0){
            $pengemudi = Pengemudi::find(Auth::id());
            $pengemudi->password = Hash::make($request->new_password);
            $pengemudi->save();
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('/login');

    
    }
}

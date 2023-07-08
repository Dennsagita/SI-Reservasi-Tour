<?php

namespace App\Http\Controllers;

use id;
use App\Models\User;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    public function index()
    {
        return view('post_admin/dashboard');
    }
    public function home()
    {
        return view('post/landing-page');
    }
    public function login()
    {
        return view('post/login');
    }
    public function register()
    {
        return view('post/registrasi');
    }
    public function reservasi()
    {
        return view('post/reservasi');
    }

    public function profile()
    {
        $user = User::all();
        // $user = User::find(Auth::id());
        return view('post/profile', ['userList' => $user]);
    }
    public function profileedit()
    {
        return view('post/profile-edit');
    }
}

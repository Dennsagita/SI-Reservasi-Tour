<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index()
    {
        return view('post_admin/dashboard');
    }
    public function reservasi()
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

    public function profile()
    {
        return view('post/profile');
    }
    public function profileedit()
    {
        return view('post/profile-edit');
    }
}

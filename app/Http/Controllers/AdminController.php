<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function profile()
    {
        return view('post_admin/profile-admin/profile');
    }
}

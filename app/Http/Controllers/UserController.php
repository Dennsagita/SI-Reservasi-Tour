<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('post_admin/pengguna/pengguna', ['penggunaList' => $user]);
    }
    public function create()
    {
        return view('post_admin/user-add');
    }
    public function store(Request $request)
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
        
        if ($user) {
            Session::flash('status', 'success');
            Session::flash('message', 'Tambah Data user Berhasil');
        }
        return redirect('/user');
    }

    public function edit(Request $request, $id)
    {
        
        $user = User::where('id_mobil', $id)->get();
        // $mobil = Mobil::findOrFail('id_mobil', $id)->get();
        dd($user);
        // return view('post_admin/mobil-edit');
    }
    //ubah profile
    public function profile(Request $request)
    {
        
        $user = User::find(Auth::id());
        $user->update($request->all());
        if ($user) {
        Session::flash('edit', 'success');
        Session::flash('textedit', 'Ubah Data Mobil Berhasil');
        }
        return redirect('/profile');
    }
}

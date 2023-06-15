<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('post_admin/pengemudi', ['userList' => $user]);
    }
    public function create()
    {
        return view('post_admin/user-add');
    }
    public function store(Request $request)
    {
        // $mobil = new Mobil;
        // $mobil->id_user = $request->id_user;
        // $mobil->merk = $request->merk;
        // $mobil->nama_mobil = $request->nama_mobil;
        // $mobil->status_tour = $request->status_tour;
        // $mobil->keterangan = $request->keterangan;
        // $mobil->save();
        $user = User::create($request->all());
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
}

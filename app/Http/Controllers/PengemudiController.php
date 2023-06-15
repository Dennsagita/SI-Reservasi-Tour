<?php

namespace App\Http\Controllers;

use App\Models\Pengemudi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PengemudiController extends Controller
{
    public function index()
    {
        $pengemudi = Pengemudi::all();
        return view('post_admin/pengemudi/pengemudi', ['pengemudiList' => $pengemudi]);
    }
    public function create()
    {
        return view('post_admin/pengemudi/pengemudi-add');
    }
    public function store(Request $request)
    {
        // $mobil = new Mobil;
        // $mobil->id_pengemudi = $request->id_pengemudi;
        // $mobil->merk = $request->merk;
        // $mobil->nama_mobil = $request->nama_mobil;
        // $mobil->status_tour = $request->status_tour;
        // $mobil->keterangan = $request->keterangan;
        // $mobil->save();
        $pengemudi =Pengemudi::create($request->all());
        if ($pengemudi) {
            Session::flash('status', 'success');
            Session::flash('message', 'Tambah Data pengemudi Berhasil');
        }
        return redirect('/pengemudi');
    }

    public function edit(Request $request, $id)
    {
        
        $pengemudi = Pengemudi::findOrFail($id);
        return view('post_admin/pengemudi/pengemudi-edit', ['pengemudi' => $pengemudi]);
    }
    public function update(Request $request, $id)
    {
       $pengemudi = Pengemudi::findOrfail($id);
       $pengemudi->update($request->all());
       if ($pengemudi) {
        Session::flash('edit', 'success');
        Session::flash('textedit', 'Ubah Data Mobil Berhasil');
        }
        return redirect('/pengemudi');
    }

}

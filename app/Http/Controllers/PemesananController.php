<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\User;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\PesananCreateRequest;

class PemesananController extends Controller
{
    public function index()
    {
        $pemesanan = Pemesanan::with('paket','user')->paginate(10);
        return view('post_admin/pemesanan/pemesanan', ['pemesananList' => $pemesanan]);
    }
    public function create()
    {
        $class = Paket::select('id', 'nama')->get();
        return view('post/reservasi', ['paket' => $class]);
    }
    public function store(Request $request)
    {
        // $pemesanan = new pemesanan;
        // $pemesanan->id_paket = $request->id_paket;
        // $pemesanan->merk = $request->merk;
        // $pemesanan->nama_pemesanan = $request->nama_pemesanan;
        // $pemesanan->status_tour = $request->status_tour;
        // $pemesanan->keterangan = $request->keterangan;
        // $pemesanan->save();
        
        $pemesanan = Pemesanan::create($request->all());
        if ($pemesanan) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data berhasil dikirim, lihat status pemesanan pada profil anda');
        }
        return redirect('/reservasi');
    }
    public function edit(Request $request, $id)
    {
        $pemesanan = Pemesanan::with('paket')->findOrFail($id);
        $paket = Paket::where('id', '!=', $pemesanan)->get(['id', 'nama']);
        return view('post_admin/pemesanan/pemesanan-edit', ['pemesanan' => $pemesanan, 'paket' => $paket]);
    }

    public function update(Request $request, $id)
    {
        $pemesanan1 = Pemesanan::findOrfail($id);
        $pemesanan1->update($request->all());
        if ($pemesanan1) {
        Session::flash('edit', 'success');
        Session::flash('textedit', 'Ubah Data pemesanan Berhasil');
        }
        return redirect('/pemesanan');
    }

    public function delete($id)
    {
        $deletedpemesanan = Pemesanan::findOrfail($id);
        $deletedpemesanan->delete();
        
        return redirect('/pesanan');
    }
}

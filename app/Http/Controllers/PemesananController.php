<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mobil;
use App\Models\Paket;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\PesananCreateRequest;

class PemesananController extends Controller
{
    public function index()
    {
        $pemesanan = Pemesanan::with(['paket' => function ($query) {
            $query->whereHas('paketMobil', function ($subquery) {
                $subquery->where('konfirmasi', 1);
            })->with(['paketMobil' => function ($subquery) {
                $subquery->where('konfirmasi', 1);
            }]);
        }, 'user'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

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
        return redirect()->route('index2');
    }
    public function edit(Request $request, $id)
{
    $pesanan = Pemesanan::findOrFail($id);
    $pemesanan = Pemesanan::with('paket')->findOrFail($id);
    $paket = Paket::where('id', '!=', $pemesanan)->get(['id', 'nama']);
    $pakets = $pesanan->paket;

    // Ambil mobil terkait dengan paket pesanan
    $mobils = $pemesanan->paket->mobil1->where('pivot.konfirmasi', true);

    return view('post_admin/pemesanan/pemesanan-edit', compact('pesanan', 'pemesanan', 'paket', 'pakets', 'mobils'));
}


    public function update(Request $request, $id)
    {
        $request->validate([
            'id_mobil' => 'required|exists:mobils,id',
        ]);
    
        $pesanan = Pemesanan::findOrFail($id);
        $paket = $pesanan->paket;
    
        $paket->update([
            'id_mobil' => $request->input('id_mobil'),
        ]);
        $pemesanan1 = Pemesanan::findOrfail($id);
        $pemesanan1->update($request->all());
        if ($pemesanan1) {
        Session::flash('edit', 'success');
        Session::flash('textedit', 'Ubah Data pemesanan Berhasil');
        }
        return redirect()->route('pemesanan');
    }

    public function delete($id)
    {
        $deletedpemesanan = Pemesanan::findOrfail($id);
        $deletedpemesanan->delete();
        
        return redirect('/pesanan');
    }
}

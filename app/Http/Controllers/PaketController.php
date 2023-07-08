<?php

namespace App\Http\Controllers;

use App\Http\Requests\MobilCreateRequest;
use App\Models\Mobil;
use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\PaketCreateRequest;

class PaketController extends Controller
{
    public function index()
    {
        $paket = Paket::with('mobil')->paginate(10);
        return view('post_admin/paket/manage-paket', ['paketList' => $paket]);
    }
    public function create()
    {
        $class = Mobil::select('id', 'nama_mobil', 'merk')->get();
        return view('post_admin/paket/paket-add', ['mobil' => $class]);
    }
    public function store(PaketCreateRequest $request)
    {
        // $paket = new paket;
        // $paket->id_mobil = $request->id_mobil;
        // $paket->merk = $request->merk;
        // $paket->nama_paket = $request->nama_paket;
        // $paket->status_tour = $request->status_tour;
        // $paket->keterangan = $request->keterangan;
        // $paket->save();
        
        $paket = Paket::create($request->all());
        if ($paket) {
            Session::flash('status', 'success');
            Session::flash('message', 'Tambah Data paket Berhasil');
        }
        return redirect('/paket');
    }
    public function edit(Request $request, $id)
    {
        $paket = Paket::with('mobil')->findOrFail($id);
        $mobil = Mobil::where('id', '!=', $paket)->get(['id', 'nama_mobil', 'merk']);
        return view('post_admin/paket/paket-edit', ['paket' => $paket, 'mobil' => $mobil]);
    }

    public function update(Request $request, $id)
    {
        $paket1 = paket::findOrfail($id);
        $paket1->update($request->all());
        if ($paket1) {
        Session::flash('edit', 'success');
        Session::flash('textedit', 'Ubah Data paket Berhasil');
        }
        return redirect('/paket');
    }

    public function delete($id)
    {
        $deletedpaket = paket::findOrfail($id);
        $deletedpaket->delete();
        
        return redirect('/paket');
    }
}

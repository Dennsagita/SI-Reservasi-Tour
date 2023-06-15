<?php

namespace App\Http\Controllers;

use App\Http\Requests\MobilCreateRequest;
use App\Models\Mobil;
use App\Models\Pengemudi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class MobilController extends Controller
{
    public function index()
    {
        $mobil = Mobil::with('pengemudi')->paginate(10);
        return view('post_admin/mobil/mobil', ['mobilList' => $mobil]);
    }
    public function create()
    {
        $class = Pengemudi::select('id', 'nama')->get();
        return view('post_admin/mobil/mobil-add', ['pengemudi' => $class]);
    }
    public function store(MobilCreateRequest $request)
    {
        // $mobil = new Mobil;
        // $mobil->id_pengemudi = $request->id_pengemudi;
        // $mobil->merk = $request->merk;
        // $mobil->nama_mobil = $request->nama_mobil;
        // $mobil->status_tour = $request->status_tour;
        // $mobil->keterangan = $request->keterangan;
        // $mobil->save();
        

        $mobil = Mobil::create($request->all());
        if ($mobil) {
            Session::flash('status', 'success');
            Session::flash('message', 'Tambah Data Mobil Berhasil');
        }
        return redirect('/mobil');
    }
    public function edit(Request $request, $id)
    {
        $mobil = Mobil::with('pengemudi')->findOrFail($id);
        $pengemudi = Pengemudi::where('id', '!=', $mobil)->get(['id', 'nama']);
        return view('post_admin/mobil/mobil-edit', ['mobil' => $mobil, 'pengemudi' => $pengemudi]);
    }

    public function update(Request $request, $id)
    {
        $mobil1 = Mobil::findOrfail($id);
        $mobil1->update($request->all());
        if ($mobil1) {
        Session::flash('edit', 'success');
        Session::flash('textedit', 'Ubah Data Mobil Berhasil');
        }
        return redirect('/mobil');
    }

    public function delete($id)
    {
        $deletedMobil = Mobil::findOrfail($id);
        $deletedMobil->delete();
        
        return redirect('/mobil');
    }
    


}

<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Mobil;
use App\Models\Paket;
use App\Models\Pengemudi;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\MobilCreateRequest;


class MobilController extends Controller
{
    public function index()
    {
        // $paket = Mobil::with('paket1')->get();
        $mobil = Mobil::with('pengemudi','paket1')->paginate(10);
        return view('post_admin/mobil/mobil', ['mobilList' => $mobil]);
    }
    public function registrasi($id_pengemudi)
    {
        return view('post/mobil-registrasi', compact('id_pengemudi'));
    }
    public function processregistrasimobil(MobilCreateRequest $request)
    {
        $mobil = Mobil::create($request->all());
        if ($mobil) {
            Session::flash('status', 'success');
            Session::flash('message', 'Tambah Data Mobil Berhasil');
        }
        return redirect('/login');
    }
    public function create()
    {
        $pengemudi = Pengemudi::select('id', 'nama')
            ->whereNotIn('id', function ($query) {
                $query->select('id_pengemudi')
                    ->from('mobils');
            })
            ->get();

        return view('post_admin/mobil/mobil-add', compact('pengemudi'));
    }

    public function store(MobilCreateRequest $request)
    {      
        $mobil = Mobil::create($request->all());
        if ($mobil) {
            Session::flash('status', 'success');
            Session::flash('message', 'Tambah Data Mobil Berhasil');
        }
        return redirect()->route('mobil');
    }

    public function show(Request $request, $id)
    {
        $mobil = Mobil::with('pengemudi','paket1')->findOrFail($id);
        $pengemudi = Pengemudi::where('id', '!=', $mobil)->get(['id', 'nama']);
        $paket = Paket::where('id', '!=', $mobil)->get(['id', 'nama']);
        return view('post_admin/mobil/mobil-detail', compact('mobil','pengemudi','paket'));
    }

    public function edit(Request $request, $id)
    {
        $mobil = Mobil::with('pengemudi')->findOrFail($id);
        $pengemudi = Pengemudi::where('id', '!=', $mobil)->get(['id', 'nama']);
        $paket = Paket::where('id', '!=', $mobil)->get(['id', 'nama']);
        return view('post_admin/mobil/mobil-edit', ['mobil' => $mobil, 'pengemudi' => $pengemudi, 'paket' => $paket]);
    }

    public function update(Request $request, $id)
    {
        $mobil1 = Mobil::findOrfail($id);
        $mobil = Mobil::findOrFail($id);
        $paketIds = $request->input('paket_ids');

        if ($paketIds) {
            // Jika ada checkbox yang dipilih
            $mobil->paket1()->sync($paketIds);
        } else {
            // Jika semua checkbox dikosongkan
            $mobil->paket1()->detach();
        }
        $mobil1->update($request->all());
        if ([$mobil1,$mobil]) {
        Session::flash('edit', 'success');
        Session::flash('textedit', 'Ubah Data Mobil Berhasil');
        }

        $mobilimage = Mobil::findOrfail($id);

        // Hapus gambar lama hanya jika ada gambar baru yang diunggah
    if ($request->hasFile('image')) {
        $mobilimage = Mobil::findOrFail($id);

        // Hapus gambar lama jika ada
        if ($mobilimage->images->isNotEmpty()) {
            foreach ($mobilimage->images as $image) {
                // Hapus gambar dari penyimpanan
                Storage::delete($image);
                // Hapus record gambar dari database
                $image->delete();
            }
        }

        // Upload dan simpan gambar baru jika ada
        $imagePath = $request->file('image')->store('images', 'public');
        $image = Image::create([
            'path' => $imagePath,
            'src' => $imagePath, // Berikan nilai 'src' sesuai dengan 'path'
            'thumb' => $imagePath,
            'alt' => $imagePath,
            'imageable_id' => $mobil->id, // Berikan nilai 'imageable_id'
            'imageable_type' => 'App\Models\Mobil', // Sesuaikan dengan tipe model yang berelasi
        ]);
        // Asosiasikan gambar dengan entitas menggunakan relasi polimorfik
        $mobil->images()->saveMany([$image]);
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

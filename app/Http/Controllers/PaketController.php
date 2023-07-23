<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Mobil;
use App\Models\Paket;
use App\Models\PaketMobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\MobilCreateRequest;
use App\Http\Requests\PaketCreateRequest;

class PaketController extends Controller
{
    public function index()
    {

         // Mendapatkan daftar paket yang perlu dikonfirmasi
         $belumKonfirmasiPaket = Paket::with(['mobil1' => function ($query) {
            $query->wherePivot('konfirmasi', false);
        }])->get();
         // Mendapatkan daftar paket yang sudah dikonfirmasi
            $sudahKonfirmasiPaket = Paket::with(['mobil1' => function ($query) {
            $query->wherePivot('konfirmasi', true);
        }])->get();
        $paketList = Paket::with(['mobil1'])->paginate(10);
        // $mobil = Mobil::with('paket1')->get();
        // $paket = Paket::with('mobil')->paginate(10);
        return view('post_admin/paket/manage-paket', compact('paketList', 'belumKonfirmasiPaket', 'sudahKonfirmasiPaket'));
    }

    public function confirmPaket(Request $request)
    {
        $paketId = $request->input('id_paket');
        $mobilId = $request->input('id_mobil');
    
        $mobil = Mobil::find($mobilId);
        if (!$mobil) {
            return redirect()->route('managepaket')->with('error', 'Mobil tidak ditemukan.');
        }
    
        // Cek apakah data sudah dikonfirmasi sebelumnya
        $paketMobil = PaketMobil::where('id_paket', $paketId)->where('id_mobil', $mobilId)->first();
        if ($paketMobil) {
            if ($paketMobil->konfirmasi) {
                // Jika data sudah dikonfirmasi, hapus data konfirmasi
                return redirect()->route('managepaket')->with('success', 'Paket berhasil dibatalkan.');
            } else {
                // Jika data belum dikonfirmasi, lakukan update konfirmasi
                $paketMobil->konfirmasi = true;
                $paketMobil->save();
                return redirect()->route('managepaket')->with('success', 'Paket berhasil dikonfirmasi.');
            }
        } else {
            // Jika belum ada record, buat record baru dengan status konfirmasi
            PaketMobil::create([
                'id_paket' => $paketId,
                'id_mobil' => $mobilId,
                'konfirmasi' => true,
            ]);
    
            return redirect()->route('managepaket')->with('success', 'Paket berhasil dikonfirmasi.');
        }
    }
    
    
    public function hapusPaket(Request $request)
    {
        $paketId = $request->input('id_paket');
        $mobilId = $request->input('id_mobil');

        // Cari data pivot berdasarkan id paket dan id mobil
        $paketMobil = PaketMobil::where('id_paket', $paketId)->where('id_mobil', $mobilId)->first();

        if ($paketMobil) {
            // Hapus data pivot
            $paketMobil->delete();
            return redirect()->route('managepaket')->with('success', 'Data berhasil dihapus.');
        } else {
            // Jika data pivot tidak ditemukan, kirimkan pesan error
            return redirect()->route('managepaket')->with('error', 'Data tidak ditemukan atau sudah terhapus.');
        }
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
    public function show(Request $request, $id)
    {
        $paket = Paket::with('mobil1')->findOrFail($id);
        $mobil = Mobil::where('id', '!=', $paket)->get(['id', 'nama_mobil', 'merk', 'id_pengemudi']);
        return view('post_admin/paket/paket-detail', ['paket' => $paket, 'mobil' => $mobil]);
    }
    public function edit(Request $request, $id)
    {
        $paket = Paket::with('mobil1')->findOrFail($id);
        $mobil = Mobil::where('id', '!=', $paket)->get(['id', 'nama_mobil', 'merk']);
        return view('post_admin/paket/paket-edit', ['paket' => $paket, 'mobil' => $mobil]);
    }

    public function update(Request $request, $id)
    {
        $paket1 = paket::findOrfail($id);
        // Ambil data dari request yang ingin diubah
        $dataToUpdate = $request->only(['nama', 'destinasi', 'keterangan', 'harga']);

        // Gunakan metode fill untuk mengisi data yang baru
        $paket1->fill($dataToUpdate);

        // Simpan perubahan dengan menggunakan metode save
        $paket1->save();

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

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Image;
use App\Models\Mobil;
use App\Models\Paket;
use App\Models\Pemesanan;
use App\Models\Pengemudi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{  
    public function index(Request $request)
    {
        $tanggalHariIni = Carbon::now()->format('Y-m-d');
        $totalPesanan = Pemesanan::whereDate('created_at', $tanggalHariIni)->count();
        $pemesanan1 = Pemesanan::count();
        $pengguna = User::count();
        $mobil = Mobil::count();
        $paket = Paket::count();
        $pengemudi = Pengemudi::count();
        // Fitur Pencarian data berdasarkan input pengguna yang difilter berdasarkan nama pelanggan pada tabel pemesanan
        $keyword = @$request['search'];
        $pemesanan = Pemesanan::with(['paket' => function ($query) {
            $query->whereHas('paketMobil', function ($subquery) {
                $subquery->where('konfirmasi', 1);
            })->with(['paketMobil' => function ($subquery) {
                $subquery->where('konfirmasi', 1);
            }]);
        }, 'user'])
        ->where(function ($query) {
            // Kondisi untuk status "baru" dan "pergantian-pengemudi"
            $query->whereIn('status_pemesanan', ['baru', 'pergantian-pengemudi']);
        })
        ->orderBy('created_at', 'desc');
        if (isset($request['search'])) {
            $pemesanan = $pemesanan->whereIn('id_user', function ($query) use ($keyword) {
                $query->select('id')
                    ->from('users')
                    ->where('nama', 'LIKE', "%$keyword%");
            });
        }
        $pemesanan = $pemesanan->paginate(5);

        // Fitur Pencarian data berdasarkan input pengguna yang difilter berdasarkan nama pelanggan pada tabel pemesanan
        $keyword = @$request['search2'];
        $pemesanan2 = Pemesanan::with(['paket' => function ($query) {
            $query->whereHas('paketMobil', function ($subquery) {
                $subquery->where('konfirmasi', 1);
            })->with(['paketMobil' => function ($subquery) {
                $subquery->where('konfirmasi', 1);
            }]);
        }, 'user'])
            ->where('status_pemesanan', 'diterima') // Tambahkan kondisi ini
            ->orderBy('created_at', 'desc');
        if (isset($request['search2'])) {
            $pemesanan2 = $pemesanan2->whereIn('id_user', function ($query) use ($keyword) {
                $query->select('id')
                    ->from('users')
                    ->where('nama', 'LIKE', "%$keyword%");
            });
        }
        $pemesanan2 = $pemesanan2->paginate(5);
        return view('post_admin/dashboard', compact('pemesanan','pemesanan2', 'pengemudi','paket','mobil','pengguna', 'pemesanan1', 'totalPesanan'));
    }

    public function pageProfile(Admin $admin)
    {
        $data = ['admin' => $admin->where('id', auth()->user()->id)->first()] ;
        return view('post_admin/profile-admin/profile', $data);
    } 
    
    public function password()
    {
        return view('post_admin/profile-admin/ubahpassword');
    }
     //ubah profile
     
     public function profile(Request $request)
     {
         $admin = admin::find(Auth::id());
         $admin->update($request->all());
         if ($admin) {
         Session::flash('edit', 'success');
         Session::flash('textedit', 'Ubah Data Mobil Berhasil');
         }
         // Validasi input jika diperlukan
         $request->validate([
             'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
         ]);
 
         // Temukan entitas yang ingin diubah gambar
         // $admin = admin::findOrFail($id);
         $adminimage = admin::find(Auth::id());
 
         // Hapus gambar lama jika ada
         if ($adminimage->images->isNotEmpty()) {
             foreach ($adminimage->images as $image) {
                  // Hapus gambar dari penyimpanan
             Storage::delete($image);
             // Hapus record gambar dari database
             $image->delete();
             }
         }
 
         // Upload dan simpan gambar baru jika ada
         if ($request->hasFile('image')) {
             $imagePath = $request->file('image')->store('images', 'public');
             $image = Image::create([
                 'path' => $imagePath,
                 'src' => $imagePath, // Berikan nilai 'src' sesuai dengan 'path'
                 'thumb' => $imagePath,
                 'alt' => $imagePath,
                 'imageable_id' => $admin->id, // Berikan nilai 'imageable_id'
                 'imageable_type' => 'App\Models\admin', // Sesuaikan dengan tipe model yang berelasi
             ]);
             // Asosiasikan gambar dengan entitas menggunakan relasi polimorfik
             $admin->images()->saveMany([$image]);
         }
 
         return redirect()->route('profileAdmin');
     }
 
     public function profileedit(admin $admin)
     {
         $data = ['admin' => $admin->where('id', auth()->user()->id)->first()] ;
         return view('post_admin/profile-admin/profile-edit', $data);
     }
     
}

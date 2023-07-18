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
    public function index()
    {
        $tanggalHariIni = Carbon::now()->format('Y-m-d');
        $totalPesanan = Pemesanan::whereDate('created_at', $tanggalHariIni)->count();
        $pemesanan1 = Pemesanan::count();
        $pengguna = User::count();
        $mobil = Mobil::count();
        $paket = Paket::count();
        $pengemudi = Pengemudi::count();
        $pemesanan = Pemesanan::with('paket.mobil1','user')->orderBy('created_at', 'desc')->paginate(10);
        return view('post_admin/dashboard', compact('pemesanan','pengemudi','paket','mobil','pengguna', 'pemesanan1', 'totalPesanan'));
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

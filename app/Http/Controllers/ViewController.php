<?php

namespace App\Http\Controllers;

use id;
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

class ViewController extends Controller
{
    public function index()
    {
        // $admin = Admin::find(Auth::guard('admin')->id());
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

    public function index2()
    {
        return view('post/landing-page');
    }

    public function paketHome()
    {
        $pakets = Paket::all();
        return view('post.paket', compact('pakets'));
    }
    public function paketDetail($id)
    {
        $paket = Paket::findOrFail($id);
        return view('post/paket-detail', compact('paket'));
    }

    public function paketDetailHome($id)
    {
        $paket = Paket::findOrFail($id);
        return view('post/paket-detailHome', compact('paket'));
    }

    public function aboutHome()
    {
        return view('post/about');
    }

    public function home()
    {
        return view('post/landing-page');
    }

    public function login()
    {
        return view('post/login');
    }

    public function register()
    {
        return view('post/registrasi');
    }

    public function reservasi()
    {
        return view('post/reservasi');
    }

    public function profile()
    {
        $user = User::all();
        // $user = User::find(Auth::id());
        return view('post/profile', ['userList' => $user]);
    }
    public function profileedit()
    {
        return view('post/profile-edit');
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Mobil;
use App\Models\Paket;
use App\Models\Pemesanan;
use App\Models\Pengemudi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

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
    // public function store(Request $request)
    // {
    //     // $mobil = new Mobil;
    //     // $mobil->id_pengemudi = $request->id_pengemudi;
    //     // $mobil->merk = $request->merk;
    //     // $mobil->nama_mobil = $request->nama_mobil;
    //     // $mobil->status_tour = $request->status_tour;
    //     // $mobil->keterangan = $request->keterangan;
    //     // $mobil->save();
    //     $pengemudi = Pengemudi::create($request->all());
    //     if ($pengemudi) {
    //         Session::flash('status', 'success');
    //         Session::flash('message', 'Tambah Data pengemudi Berhasil');
    //     }
    //     return redirect('/pengemudi');
    // }

//     public function paketPengemudi()
// {
//     // Mendapatkan daftar mobil yang dimiliki oleh pengemudi
//     $pengemudi = Pengemudi::find(auth()->user()->id);
//     $mobils = $pengemudi->mobil;
//     $paket = Paket::where('id', '!=', $mobils->pluck('id'))->get(['id', 'nama']);
//     $pemesanan = Pemesanan::with('paket.mobil1')->whereIn('id_mobil', $mobils->pluck('id'))->get();
    
//     // Query berhasil, lanjutkan dengan operasi yang diperlukan    
//     return view('post_admin.dash-pengemudi.dashboard', compact('mobils', 'paket'));
// }

    public function dashboardPengemudi()
    {
        $pengemudi = Pengemudi::findOrFail(auth()->user()->id);
        $mobils = $pengemudi->mobil;

        if ($mobils->isEmpty()) {
            // Jika pengemudi tidak memiliki mobil, tampilkan pesan error
            abort(404, 'Mobil tidak ditemukan.');
        }

        $paketIds = $mobils->pluck('id');
        $paket = Paket::whereHas('paketMobil', function ($query) use ($paketIds) {
            $query->whereIn('id_mobil', $paketIds)->where('konfirmasi', 1);
        })->get();

        $pengemudiId = Pengemudi::findOrFail(auth()->user()->id)->id;

        $paketMobilIds = Mobil::whereHas('pengemudi', function ($query) use ($pengemudiId) {
            $query->where('id', $pengemudiId);
        })->pluck('id');

        $pemesanan = Pemesanan::whereHas('paket.paketMobil', function ($query) use ($paketMobilIds) {
            $query->whereIn('paket_mobil.id_mobil', $paketMobilIds);
        })->get();

            return view('post_admin.dash-pengemudi.dashboard', compact('mobils', 'paket', 'pemesanan', 'pengemudi'));
    }

    public function pesananPengemudi()
    {
        $pengemudi = Pengemudi::findOrFail(auth()->user()->id);
        $mobils = $pengemudi->mobil;

        if ($mobils->isEmpty()) {
            // Jika pengemudi tidak memiliki mobil, tampilkan pesan error
            abort(404, 'Mobil tidak ditemukan.');
        }

        $paketIds = $mobils->pluck('id');
        $paket = Paket::whereHas('paketMobil', function ($query) use ($paketIds) {
            $query->whereIn('id_mobil', $paketIds)->where('konfirmasi', 1);
        })->get();

        $pengemudiId = Pengemudi::findOrFail(auth()->user()->id)->id;

        $paketMobilIds = Mobil::whereHas('pengemudi', function ($query) use ($pengemudiId) {
            $query->where('id', $pengemudiId);
        })->pluck('id');

        $pemesanan = Pemesanan::whereHas('paket.paketMobil', function ($query) use ($paketMobilIds) {
            $query->whereIn('paket_mobil.id_mobil', $paketMobilIds);
        })->get();

            return view('post_admin.dash-pengemudi.pengemudi-pesanan.pesanan', compact('mobils', 'paket', 'pemesanan'));
    }

    public function detailPesananPengemudi($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);

        // Pastikan bahwa pengemudi yang sedang login adalah pengemudi yang terkait dengan mobil pada pemesanan
        $authenticatedPengemudiId = auth()->user()->id;
        if (!$pemesanan->paket->mobil1->where('pivot.konfirmasi', true)
                ->where('exists', true)
                ->where('pengemudi.id', $authenticatedPengemudiId)->isEmpty()) {
            return view('post_admin.dash-pengemudi.pengemudi-pesanan.detail-pesanan', compact('pemesanan'));
        }

        // Jika pengemudi yang sedang login tidak terkait dengan mobil pada pemesanan, tampilkan pesan error atau redirect ke halaman lain
        abort(403, 'Anda tidak memiliki akses ke detail pesanan ini.');
    }

    public function processSelesaiPesanan(Request $request, $id)
    {
        $konfirmasiPesanan = Pemesanan::findOrFail($id);

        // Validasi input form konfirmasi batal pesanan
        $request->validate([
            'status_pemesanan' => 'required'
        ]);

            // Ubah status pemesanan pada pemesanan yang terkait
        if ($request->status_pemesanan == 'diterima') {
            $konfirmasiPesanan->status_pemesanan = 'selesai';
        }
        $konfirmasiPesanan->save();

        // Ubah status pemesanan pada batal pesanan itu sendiri
        $konfirmasiPesanan->status_pemesanan = $request->status_pemesanan;
        $konfirmasiPesanan->save();

        return redirect()->route('pesananPengemudi')->with('selesai', 'Selesai pesanan berhasil');
    }

    public function selectPaket(Request $request)
    {
        // Mendapatkan data paket yang dipilih oleh pengemudi
        $paketId = $request->input('id_paket');
        $mobilId = $request->input('id_mobil');

        // Mendaftarkan paket ke mobil
        $mobil = Mobil::find($mobilId);
        $mobil->paket1()->attach($paketId, ['konfirmasi' => false]);

        return redirect()->route('dashPengemudi')->with('success', 'Paket berhasil dipilih.');
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
   
    public function createData()
    {
        return view('post_admin/pengguna/pengguna-add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'no_telp' => 'required|numeric',
            'alamat' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
        ]);

        $user = new Pengemudi([
            'nama' => $request->nama,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->save();
        
        if ($user) {
            Session::flash('status', 'success');
            Session::flash('message', 'Tambah Data user Berhasil');
        }
        return redirect()->route('pengguna');
    }

    public function showData(Request $request, $id)
    {
        $pengguna = Pengemudi::findOrFail($id);
        return view('post_admin/pengguna/pengguna-detail', compact('pengguna'));
    }
    public function editData(Request $request, $id)
    {
        $pengguna = Pengemudi::findOrFail($id);
        return view('post_admin/pengguna/pengguna-edit', compact('pengguna'));
    }

    public function updateData(Request $request, $id)
    {
        $pengguna = Pengemudi::findOrfail($id);
       $pengguna->update($request->all());
       if ($pengguna) {
        Session::flash('edit', 'success');
        Session::flash('textedit', 'Ubah Data Mobil Berhasil');
        }
        return redirect()->route('pengguna');
    }
    //ubah profile
    public function profiledetail(Pengemudi $pengemudi)
    {
        $data = ['pengemudi' => $pengemudi->where('id', auth()->user()->id)->first()] ;
        return view('post_admin/pengemudi/profile', $data);
    }
    public function profile(Request $request)
    {
        $pengemudi = pengemudi::find(Auth::id());
        $pengemudi->update($request->all());
        if ($pengemudi) {
        Session::flash('edit', 'success');
        Session::flash('textedit', 'Ubah Data Mobil Berhasil');
        }
        // Validasi input jika diperlukan
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Temukan entitas yang ingin diubah gambar
        // $pengemudi = pengemudi::findOrFail($id);
        $pengemudiimage = pengemudi::find(Auth::id());

        // Hapus gambar lama jika ada
        if ($pengemudiimage->images->isNotEmpty()) {
            foreach ($pengemudiimage->images as $image) {
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
                'imageable_id' => $pengemudi->id, // Berikan nilai 'imageable_id'
                'imageable_type' => 'App\Models\pengemudi', // Sesuaikan dengan tipe model yang berelasi
            ]);
            // Asosiasikan gambar dengan entitas menggunakan relasi polimorfik
            $pengemudi->images()->saveMany([$image]);
        }

        return redirect()->route('profilepengemudi');
    }

    public function profileedit(pengemudi $pengemudi)
    {
        $data = ['pengemudi' => $pengemudi->where('id', auth()->user()->id)->first()] ;
        return view('post_admin/pengemudi/profile-edit', $data);
    }

    public function password()
    {
        return view('post_admin/pengemudi/ubahpassword');
    }

    public function delete($id)
    {
        $deletedpaket = Pengemudi::findOrfail($id);
        $deletedpaket->delete();
        
        return redirect('/pengemudi');
    }

    public function processStatus(Request $request, $id)
    {
        // Validasi input form konfirmasi batal pesanan
        $request->validate([
            'status' => 'required|in:tour,tidak-tour'
        ]);

        // Temukan pengemudi berdasarkan ID
        $pengemudi = Pengemudi::find(auth()->user()->id);

        // // Ubah status pengemudi berdasarkan nilai yang diterima dari form
        // $pengemudi->status = $request->status;
        // $pengemudi->save();

        if ($request->status == 'tidak-tour') {
            $pengemudi->status = 'tour';
        }
        elseif ($request->status == 'tour') {
            $pengemudi->status = 'tidak-tour';
        }
        $pengemudi->save();

        // Ubah status pemesanan pada batal pesanan itu sendiri
        $pengemudi->status = $request->status;
        $pengemudi->save();

        return redirect()->route('dashboardPengemudi')->with('selesai', 'Status  Tour Berhasil diubah');
    }


}

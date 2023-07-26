<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Image;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // Fitur Pencarian data berdasarkan input pengguna yang difilter berdasarkan nama pada tabel users
        $keyword = @$request['search'];
        $user = new User();
        if (isset($request['search'])) {
            $user = $user
                    ->where('nama', 'LIKE', "%$keyword%");
            };
        

        $user = $user->paginate(5);
        return view('post_admin/pengguna/pengguna', ['userList' => $user]);
    }

    // public function detail(User $user)
    // {
    //     $data = ['user' => $user] ;
    //     return view('post/profile', $data);
    // }

    public function profiledetail(User $user)
    {
        $data = ['user' => $user->where('id', auth()->user()->id)->first()] ;
        return view('post/profile', $data);
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

        $user = new User([
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
        $pengguna = User::findOrFail($id);
        return view('post_admin/pengguna/pengguna-detail', compact('pengguna'));
    }
    public function editData(Request $request, $id)
    {
        $pengguna = User::findOrFail($id);
        return view('post_admin/pengguna/pengguna-edit', compact('pengguna'));
    }

    public function updateData(Request $request, $id)
    {
        $pengguna = User::findOrfail($id);
       $pengguna->update($request->all());
       if ($pengguna) {
        Session::flash('edit', 'success');
        Session::flash('textedit', 'Ubah Data Mobil Berhasil');
        }
        return redirect()->route('pengguna');
    }
    //ubah profile
    public function profile(Request $request)
    {
        $user = User::find(Auth::id());
        $user->update($request->all());
        if ($user) {
        Session::flash('edit', 'success');
        Session::flash('textedit', 'Ubah Data Mobil Berhasil');
        }
        // Validasi input jika diperlukan
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Temukan entitas yang ingin diubah gambar
        // $user = User::findOrFail($id);
        $userimage = User::find(Auth::id());

        // Hapus gambar lama jika ada
        if ($userimage->images->isNotEmpty()) {
            foreach ($userimage->images as $image) {
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
                'imageable_id' => $user->id, // Berikan nilai 'imageable_id'
                'imageable_type' => 'App\Models\User', // Sesuaikan dengan tipe model yang berelasi
            ]);
            // Asosiasikan gambar dengan entitas menggunakan relasi polimorfik
            $user->images()->saveMany([$image]);
        }

        return redirect('/profile');
    }

    public function profileedit(User $user)
    {
        $data = ['user' => $user->where('id', auth()->user()->id)->first()] ;
        return view('post/profile-edit', $data);
    }

    public function detailPesanan()
    {
        $user = Auth::guard('user')->user();
        $pesanan = Pemesanan::with('paket.mobil1')->where('id_user', $user->id)->get();
        
        return view('post.pesanan-detailUser', compact('pesanan','user'));
    }

    public function detailUserPesanan($id)
    {
        $user = Auth::guard('user')->user();
        $pemesanan = Pemesanan::with('paket.mobil1','user')->findOrFail($id);;
        return view('post.pesananUserDetail', compact('pemesanan','user'));
    }


    public function delete($id)
    {
        $deletedpaket = User::findOrfail($id);
        $deletedpaket->delete();
        return redirect('/paket');
    }

    
}

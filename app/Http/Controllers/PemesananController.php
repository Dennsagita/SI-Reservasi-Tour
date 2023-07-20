<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mobil;
use App\Models\Paket;
use App\Mail\SendEmail;
use Twilio\Rest\Client;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use App\Models\BatalPemesanan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
    
        // Mengambil ID mobil yang tersimpan dalam sesi
        $id_mobil = Session::get('id_mobil');
    
        return view('post_admin/pemesanan/pemesanan', ['pemesananList' => $pemesanan, 'id_mobil' => $id_mobil]);
    }
    
    public function selectDriver($id_mobil)
    {
        // Menyimpan ID mobil yang dipilih dalam sesi
        Session::put('id_mobil', $id_mobil);
    
        return redirect()->back();
    }
    


    public function pemesananSelesai()
    {
        $pemesanan = Pemesanan::with(['paket' => function ($query) {
            $query->whereHas('paketMobil', function ($subquery) {
                $subquery->where('konfirmasi', 1);
            })->with(['paketMobil' => function ($subquery) {
                $subquery->where('konfirmasi', 1);
            }]);
        }, 'user'])
            ->where('status_pemesanan', 'selesai') // Tambahkan kondisi ini
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    
        return view('post_admin/pemesanan/pemesanan-selesai', ['pemesanan' => $pemesanan]);
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

        $pemesanan = Pemesanan::findOrFail($id);
        $paket = $pemesanan->paket;

        // Update ID mobil pada model paket
        $paket->update([
            'id_mobil' => $request->input('id_mobil'),
        ]);

        // Update data lainnya pada pemesanan jika perlu
        $pemesanan->update($request->all());

        if ($pemesanan) {
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

    public function detailPemesanan($id)
    {
        $pemesanan = Pemesanan::with(['paket' => function ($query) {
            $query->whereHas('paketMobil', function ($subquery) {
                $subquery->where('konfirmasi', 1);
            })->with(['paketMobil' => function ($subquery) {
                $subquery->where('konfirmasi', 1);
            }]);
        }, 'user'])->findOrFail($id);
        return view('post_admin.pemesanan.pemesanan-detail', compact('pemesanan'));
    }

    public function processKonfirmasiPesanan(Request $request, $id)
    {
        $konfirmasiPesanan = Pemesanan::findOrFail($id);

        // Validasi input form konfirmasi batal pesanan
        $request->validate([
            'status_pemesanan' => 'required'
        ]);

            // Ubah status pemesanan pada pemesanan yang terkait
        if ($request->status_pemesanan == 'baru') {
            $konfirmasiPesanan->status_pemesanan = 'diterima';
        }
        $konfirmasiPesanan->save();

        // Ubah status pemesanan pada batal pesanan itu sendiri
        $konfirmasiPesanan->status_pemesanan = $request->status_pemesanan;
        $konfirmasiPesanan->save();

         // Kirim pesan WhatsApp
         $recipientNumber = $request->recipient_number;
         $message = $request->message;
         
         $sid = env('TWILIO_SID');
         $token = env('TWILIO_AUTH_TOKEN');
         $twilio = new Client($sid, $token);
 
         $twilio->messages
                ->create("whatsapp:$recipientNumber", // format nomor tujuan WhatsApp
                         [
                             'from' => "whatsapp:" . env('TWILIO_PHONE_NUMBER'), // format nomor Twilio yang digunakan
                             'body' => $message
                         ]
                );
        
         // Kirim email konfirmasi
         $data = [
            'nomor_pesanan' => $konfirmasiPesanan->id,
            'pelanggan' => $konfirmasiPesanan->user->nama,
        ];

        Mail::to($request->recipient_email) // Menggunakan alamat email penerima dari input form
            ->send(new SendEmail($data));

        return redirect()->route('pemesanan')->with('konfirmasi', 'Konfirmasi pesanan berhasil');
    }

    public function batalPesanan($id)
    {
        $user = Auth::guard('user')->user();
        $pemesanan = Pemesanan::findOrFail($id);
        return view('post.batal-pesanan', compact('user','pemesanan'));
    }

    public function processBatalPesanan(Request $request, $id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
    
        // Validasi input form ajukan batal pesanan
        $request->validate([
            'keterangan' => 'required'
        ]);
        
        // Simpan ajukan batal pesanan ke dalam tabel "ajukan_batal_pesanan"
        $ajukanBatalPesanan = new BatalPemesanan;
        $ajukanBatalPesanan->id_pemesanan = $pemesanan->id;
        $ajukanBatalPesanan->keterangan = $request->keterangan;
        $ajukanBatalPesanan->save();
        
        // Ubah status pemesanan menjadi "Menunggu Konfirmasi"
        $pemesanan->status_pemesanan = 'baru';
        $pemesanan->save();
        
        // Redirect ke halaman pemesanan
        return redirect()->route('detailPesanan')->with('status', 'Pengajuan Pesanan berhasil berhasil dikirim, harap cek sesaat status pesanan anda!');
    }
    
    public function pemesananBatal()
    {
        $pemesanan = BatalPemesanan::with('pemesanan')->get();
        return view('post_admin.pemesanan.pemesanan-batal', compact('pemesanan'));
    }

    public function detailPemesananBatal($id)
    {
        $batal = BatalPemesanan::with('pemesanan')->findOrFail($id);
        return view('post_admin.pemesanan.detail-pemesanan-batal', compact('batal'));
    }

    public function processKonfirmasiBatalPesanan(Request $request, $id)
    {
        $batalPesanan = Pemesanan::findOrFail($id);

        // Validasi input form konfirmasi batal pesanan
        $request->validate([
            'status_pemesanan' => 'required'
        ]);

            // Ubah status pemesanan pada pemesanan yang terkait
        if ($request->status_pemesanan == 'batal') {
            $batalPesanan->status_pemesanan = 'batal';
        } else {
            $batalPesanan->status_pemesanan = 'baru';
        }
        $batalPesanan->save();

        // Ubah status pemesanan pada batal pesanan itu sendiri
        $batalPesanan->status_pemesanan = $request->status_pemesanan;
        $batalPesanan->save();

        // Redirect ke halaman pemesanan
        return redirect()->route('pemesananBatal')->with('status', 'Konfirmasi batal pesanan berhasil');
    }






}

<?php

namespace App\Http\Controllers;

// use PDF as Pdf;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Mobil;
use App\Models\Paket;
use App\Mail\SendEmail;
use Twilio\Rest\Client;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use App\Models\BatalPemesanan;
use Barryvdh\DomPDF\PDF as DomPDF;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\PemesananBatalPengemudi;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\PesananCreateRequest;

class PemesananController extends DomPDF
{
    public function index(Request $request)
    {
        // Fitur Pencarian data berdasarkan input pengguna yang difilter berdasarkan nama pelanggan pada tabel pemesanan
        $keyword = @$request['search'];
        $pemesananList = Pemesanan::with(['paket' => function ($query) {
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
            $pemesananList = $pemesananList->whereIn('id_user', function ($query) use ($keyword) {
                $query->select('id')
                    ->from('users')
                    ->where('nama', 'LIKE', "%$keyword%");
            });
        }
        $pemesananList = $pemesananList->paginate(5);


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

        $id_mobil = Session::get('id_mobil');
        return view('post_admin/pemesanan/pemesanan', compact('pemesananList', 'id_mobil', 'pemesanan2', 'keyword'));
    }

    public function selectDriver($id_mobil)
    {
        // Menyimpan ID mobil yang dipilih dalam sesi
        Session::put('id_mobil', $id_mobil);
    
        return redirect()->back();
    }

    public function pemesananSelesai(Request $request)
    {
        // Fitur Pencarian data berdasarkan input pengguna yang difilter berdasarkan nama pelanggan pada tabel pemesanan
        $keyword = @$request['search'];
        $pemesanan = Pemesanan::with(['paket' => function ($query) {
            $query->whereHas('paketMobil', function ($subquery) {
                $subquery->where('konfirmasi', 1);
            })->with(['paketMobil' => function ($subquery) {
                $subquery->where('konfirmasi', 1);
            }]);
        }, 'user'])
            ->where('status_pemesanan', 'selesai') // Tambahkan kondisi ini
            ->orderBy('created_at', 'desc');

        if (isset($request['search'])) {
            $pemesanan = $pemesanan->whereIn('id_user', function ($query) use ($keyword) {
                $query->select('id')
                    ->from('users')
                    ->where('nama', 'LIKE', "%$keyword%");
            });
        }

        $pemesanan = $pemesanan->paginate(5);
        $id_mobil = Session::get('id_mobil');
        return view('post_admin/pemesanan/pemesanan-selesai', compact('pemesanan', 'id_mobil'));
    }

    public function cetakPemesananSelesai($tahun, $bulan)
    {
        // Konversi tahun dan bulan menjadi format Carbon
        $tanggal = Carbon::create($tahun, $bulan, 1);
        $pemesanan = Pemesanan::with(['paket' => function ($query) {
            $query->whereHas('paketMobil', function ($subquery) {
                $subquery->where('konfirmasi', 1);
            })->with(['paketMobil' => function ($subquery) {
                $subquery->where('konfirmasi', 1);
            }]);
        }, 'user'])
            ->where('status_pemesanan', 'selesai') // Tambahkan kondisi ini
            ->orderBy('created_at', 'asc')
            ->whereYear('created_at', $tanggal->year)
            ->whereMonth('created_at', $tanggal->month)
            ->get();

        $pdf = DomPDF::loadView('post_admin.pemesanan.cetak-pemesanan-selesai', compact('pemesanan','tanggal'));
        return $pdf->stream('laporan-pemesanan-selesai.pdf');
    }

    public function cetakPemesananBatal($tahun, $bulan)
    {
        // Konversi tahun dan bulan menjadi format Carbon
        $tanggal = Carbon::create($tahun, $bulan, 1);

        $pemesanan = BatalPemesanan::with('pemesanan')->whereHas('pemesanan', function ($query) use ($tanggal) {
            $query->where('status_pemesanan', 'batal')
                ->whereHas('paket.paketMobil', function ($subquery) {
                    $subquery->where('konfirmasi', 1);
                })
                ->whereYear('tgl_tour_mulai', $tanggal->year)
                ->whereMonth('tgl_tour_mulai', $tanggal->month);
        })->get();

        $pdf = DomPDF::loadView('post_admin.pemesanan.cetak-pemesanan-batal', compact('pemesanan', 'tanggal'));
        return $pdf->stream('laporan-pemesanan-batal.pdf');
    }

    public function create()
    {
        $class = Paket::select('id', 'nama')->get();
        return view('post/reservasi', ['paket' => $class]);
    }
    // method ini berfungtsi untuk mengam masing" ppaket pada halaman reservasi pelanggan
    public function getPaketInfo($id)
    {
        try {
            $paket = Paket::findOrFail($id);
    
            return response()->json([
                'nama' => $paket->nama,
                'destinasi' => $paket->destinasi,
                'keterangan' => $paket->keterangan,
                'harga' => number_format($paket->harga, 0, ',', '.')
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan saat mengambil informasi paket.'], 500);
        }
    }
    
    public function store(Request $request)
    {
        Pemesanan::create($request->all());
        return redirect()->route('index2')->with('pesananBerhasil', true);
    }
    public function edit(Request $request, $id)
    {
        $pesanan = Pemesanan::findOrFail($id);
        $pemesanan = Pemesanan::with('paket.mobil1')->findOrFail($id);
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
            Session::flash('textedit', 'Ubah Data pemesanan berhasil');
        }
        return redirect()->route('pemesanan');
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

    public function processPengingatPesanan(Request $request, $id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
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
        
        // $twilio->messages
        //      ->create($recipientNumber, // nomor tujuan SMS
        //          [
        //              'from' => env('TWILIO_PHONE_NUMBER'), // format nomor Twilio yang digunakan untuk SMS
        //              'body' => $smsMessage
        //          ]
        //      );
        return redirect()->route('pemesanan')->with('konfirmasi', 'Berhasil mengirimkan notifikasi pengingat pengemudi');
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
        return redirect()->route('profile')->with('batalPesanan', true);
    }
    
    public function pemesananBatal(Request $request)
    {
         // Fitur Pencarian data berdasarkan input pengguna yang difilter berdasarkan nama pelanggan pada tabel pemesanan
         $keyword = @$request['search'];
         $pemesanan = BatalPemesanan::with('pemesanan.user') // Tambahkan kondisi ini
             ->orderBy('created_at', 'desc');
 
        if ($keyword) {
            $pemesanan = $pemesanan->whereHas('pemesanan.user', function ($query) use ($keyword) {
                $query->where('nama', 'LIKE', "%$keyword%");
            });
        }
 
         $pemesanan = $pemesanan->paginate(5);
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

    public function detailPemesananPengemudiBatal($id)
    {
        $batal = PemesananBatalPengemudi::with('pemesanan')->findOrFail($id);
        return view('post_admin.pemesanan.detail-pemesanan-batal', compact('batal'));
    }

        
    // public function delete($id)
    // {
    //     $deletedpemesanan = Pemesanan::findOrfail($id);
    //     $deletedpemesanan->delete();
        
    //     return redirect('/pesanan');
    // }
}

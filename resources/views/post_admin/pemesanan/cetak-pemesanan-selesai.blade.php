<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pemesanan Selesai</title>
    <!-- Tambahkan CSS sesuai kebutuhan -->
    <style>
        /* Tambahkan gaya untuk tampilan tabel */
        /* Contoh: */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black; /* Mengatur garis kolom berwarna hitam */
            padding: 6px;
            text-align: center;
            font-size: 12px;
            word-wrap: break-word;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Mengatur tampilan halaman cetak */
        @page {
            size: A4 portrait;
            margin: 0;
        }

        body {
            margin: 1.5cm;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            flex-direction: column;
        }

        h1 {
            font-size: 18px;
            margin-bottom: 12px;
        }

        /* Tampilan link tidak ditampilkan ketika dicetak */
        a {
            display: none;
        }

        /* Tambahkan gaya untuk header */
        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            max-width: 100px; /* Atur lebar maksimum logo */
        }

        .company-name {
            font-size: 24px;
            font-weight: bold;
            margin-top: 6px;
            border-bottom: 1px solid black; /* Tambahkan garis bawah */
            padding-bottom: 6px; /* Atur jarak antara teks dan garis bawah */
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <img src="" alt="">
        <h2 class="company-name">Bali Temple Tour</h2>
        <h1>Laporan Pemesanan Selesai</h1>
        <p>Bulan {{ $tanggal->isoFormat('MMMM') }} {{ $tanggal->year }}</p>
    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>No Pesanan</th>
                <th>Nama Pemesan</th>
                <th>No Telp</th>
                <th>Nama Paket</th>
                <th>Tanggal Mulai Tour</th>
                <th>Tanggal Selesai Tour</th>
                <th>Harga Paket</th>
                <th>Status</th>
                <th>Pengemudi</th>
                <th>Mobil (No Polisi)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pemesanan as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ sprintf('%06d', $item->id) }}</td>
                <td>{{ $item->user->nama }}</td>
                <td>{{ $item->user->no_telp }}</td>
                <td>
                    @if ($item->paket)
                        {{ $item->paket->nama }}
                    @else
                        -
                    @endif
                </td>
                <td>{{ \Carbon\Carbon::parse($item->tgl_tour_mulai)->isoFormat('DD MMMM YYYY') }}</td>
                <td>{{ \Carbon\Carbon::parse($item->tgl_tour_selesai)->isoFormat('DD MMMM YYYY') }}</td>
                <td>
                    @if ($item->paket)
                        Rp. {{ number_format($item->paket->harga, 0, ',', '.') }}
                    @else
                        -
                    @endif
                </td>
                <td>{{ $item->status_pemesanan }}</td>
                <td>
                    @foreach ($item->paket->mobil1->random(1) as $mobil)
                        @if ($mobil->pivot->konfirmasi)
                            @if ($mobil->pengemudi)
                                {{ $mobil->pengemudi->nama }}
                            @endif
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($item->paket->mobil1->random(1) as $mobil)
                        @if ($mobil->pivot->konfirmasi)
                            @if ($mobil->pengemudi)
                            {{ $mobil->merk }} {{ $mobil->nama_mobil }} ({{ $mobil->no_plat_mobil }})
                            @endif
                        @endif
                    @endforeach
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

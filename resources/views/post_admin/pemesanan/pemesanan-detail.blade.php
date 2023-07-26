@extends('layouts.app_admin')
@section('action')
@section('title', 'Detail Pemesanan')
@section('navbar', 'Detail Pemesanan')
@section('data', 'Pengelolaan Data')
@section('content')
<div class="w-full px-6 bg-gray-DEFAULT-50 mx-auto">
    
    <div class="container mx-auto p-4">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="px-6 py-4 mt-10">
            <h2 class="text-2xl font-bold mb-2">Detail Konfirmasi Pesanan</h2>
            <hr class="my-4">
            <div class="flex flex-col md:flex-row mx-auto">
                <div class="w-full md:w-2/3">
                <div class="mb-4 md:flex items-center">
                    <p class="text-gray-700 font-bold md:w-1/3">Nomor Pesanan</p>
                    <p class="hidden md:block text-gray-700 font-bold md:w-1/6">:</p>
                    <p class="text-gray-900 md:w-8/12">{{ sprintf('%06d', $pemesanan->id) }}</p>
                </div>
                <div class="mb-4 md:flex items-center">
                    <p class="text-gray-700 font-bold md:w-1/3">Nama</p>
                    <p class="hidden md:block text-gray-700 font-bold md:w-1/6">:</p>
                    <p class="text-gray-900 md:w-8/12">{{ $pemesanan->user->nama }}</p>
                </div>
                <div class="mb-4 md:flex items-center">
                    <p class="text-gray-700 font-bold md:w-1/3">Nomor Telphone</p>
                    <p class="hidden md:block text-gray-700 font-bold md:w-1/6">:</p>
                    <p class="text-gray-900 md:w-8/12">{{ $pemesanan->user->no_telp }}</p>
                </div>
                <div class="mb-4 md:flex items-center">
                    <p class="text-gray-700 font-bold md:w-1/3">Paket Yang Dipilih</p>
                    <p class="hidden md:block text-gray-700 font-bold md:w-1/6">:</p>
                    <p class="text-gray-900 md:w-8/12">{{ $pemesanan->paket->nama }}</p>
                </div>
                <div class="mb-4 md:flex items-center">
                    <p class="text-gray-700 font-bold md:w-1/3">Tanggal Mulai Tour</p>
                    <p class="hidden md:block text-gray-700 font-bold md:w-1/6">:</p>
                    <p class="text-gray-900 md:w-8/12">{{ \Carbon\Carbon::parse($pemesanan->tgl_tour_mulai)->isoFormat('DD MMMM YYYY') }}</p>
                </div>
                <div class="mb-4 md:flex items-center">
                    <p class="text-gray-700 font-bold md:w-1/3">Tanggal Selesai Tour</p>
                    <p class="hidden md:block text-gray-700 font-bold md:w-1/6">:</p>
                    <p class="text-gray-900 md:w-8/12">{{ \Carbon\Carbon::parse($pemesanan->tgl_tour_selesai)->isoFormat('DD MMMM YYYY') }}</p>
                </div>
                <div class="mb-4 md:flex items-center">
                    <p class="text-gray-700 font-bold md:w-1/3">Jam Berangkat</p>
                    <p class="hidden md:block text-gray-700 font-bold md:w-1/6">:</p>
                    <p class="text-gray-900 md:w-8/12">{{ \Carbon\Carbon::parse($pemesanan->jam_datang)->isoFormat('HH:mm') }}</p>
                </div>
                <div class="mb-4 md:flex items-center">
                    <p class="text-gray-700 font-bold md:w-1/3">Lokasi Penjemputan</p>
                    <p class="hidden md:block text-gray-700 font-bold md:w-1/6">:</p>
                    <p class="text-gray-900 md:w-8/12">{{ $pemesanan->lokasi_penjemputan }}</p>
                </div>
                <div class="mb-4 md:flex items-center">
                    <p class="text-gray-700 font-bold md:w-1/3">Pengemudi</p>
                    <p class="hidden md:block text-gray-700 font-bold md:w-1/6">:</p>
                    @if ($pemesanan->paket->mobil1 && $pemesanan->paket->mobil1->count() > 0)
                        @foreach ($pemesanan->paket->mobil1 as $mobil)
                            @if ($mobil->pivot->konfirmasi && $mobil->exists && $mobil->id == $pemesanan->paket->id_mobil)
                                @if ($mobil->pengemudi)
                                    <p class="text-gray-900 md:w-8/12">{{ $mobil->pengemudi->nama }}</p>
                                @endif
                                {{-- <p class="text-gray-900 md:w-8/12">{{ $mobil->merk }} {{ $mobil->nama_mobil }}</p> --}}
                            @endif
                        @endforeach
                    @endif
                    </div>
                    <div class="mb-4 md:flex items-center">
                        <p class="text-gray-700 font-bold md:w-1/3">Mobil (Nomor Plat)</p>
                        <p class="hidden md:block text-gray-700 font-bold md:w-1/6">:</p>
                        @if ($pemesanan->paket->mobil1 && $pemesanan->paket->mobil1->count() > 0)
                            @foreach ($pemesanan->paket->mobil1 as $mobil)
                                @if ($mobil->pivot->konfirmasi && $mobil->exists && $mobil->id == $pemesanan->paket->id_mobil)
                                    @if ($mobil->pengemudi)
                                        <p class="text-gray-900 md:w-8/12">{{ $mobil->merk }} {{ $mobil->nama_mobil }} ({{ $mobil->no_plat_mobil }})</p>
                                    @endif
                                    {{-- <p class="text-gray-900 md:w-8/12">{{ $mobil->merk }} {{ $mobil->nama_mobil }}</p> --}}
                                @endif
                            @endforeach
                        @endif
                        </div>
                <div class="mb-4 md:flex items-center">
                    <p class="text-gray-700 font-bold md:w-1/3">Harga Paket</p>
                    <p class="hidden md:block text-gray-700 font-bold md:w-1/6">:</p>
                    <p class="text-gray-900 md:w-8/12">@if($pemesanan->paket->harga)
                        Rp. {{ number_format($pemesanan->paket->harga, 0, ',', '.') }}
                        @else
                        -
                        @endif</p></p>
                </div>
                <div class="mb-4 md:flex items-center">
                    <p class="text-gray-700 font-bold md:w-1/3">Nominal DP</p>
                    <p class="hidden md:block text-gray-700 font-bold md:w-1/6">:</p>
                    <p class="text-gray-900 md:w-8/12">Rp. {{ number_format($pemesanan->nominal_dp, 0, ',', '.') }}</p>
                </div>
                <div class="mb-4 md:flex items-center">
                    <p class="text-gray-700 font-bold md:w-1/3">Status Pesanan</p>
                    <p class="hidden md:block text-gray-700 font-bold md:w-1/6">:</p>
                        @if ($pemesanan->status_pemesanan == 'diterima' || $pemesanan->status_pemesanan == 'batal')
                        <p class="text-gray-900 md:w-8/12">{{ $pemesanan->status_pemesanan }}</p>
                        @else
                        <p class="text-gray-900 md:w-8/12">Menunggu Konfirmasi</p>
                        @endif</p>
                </div>
                <div class="mx-auto mt-16">
                    <p class="text-gray-700 text-2xl font-bold">Total Pembayaran</p>
                    <p class="text-gray-900">
                    @if ($pemesanan->paket->harga)
                        Rp. {{ number_format($pemesanan->paket->harga - $pemesanan->nominal_dp, 0, ',', '.') }}
                    @else
                        -
                    @endif
                    </p>
                </div>
                @if ($pemesanan->status_pemesanan === 'baru' || $pemesanan->status_pemesanan === 'pergantian-pengemudi')
                <div class="mt-6">
                    <form action="{{ route('processKonfirmasiPesanan', ['id' => $pemesanan->id]) }}" method="POST">
                        @csrf
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 hidden">
                            <div class="flex items-center">
                                <input type="text" name="status_pemesanan" id="status_pemesanan" value="diterima" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 ">
                            </div>  
                        </div>
                        <div class="flex items-center hidden">
                            <input type="text" value="+6281239286291" name="recipient_number" placeholder="Nomor Tujuan WhatsApp" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        </div>
                        <div class="flex items-center hidden">
                            <textarea name="message" placeholder="Pesan untuk Dikirim" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                                @if ($pemesanan->paket->mobil1 && $pemesanan->paket->mobil1->count() > 0)
                                    @foreach ($pemesanan->paket->mobil1 as $mobil)
                                        @if ($mobil->pivot->konfirmasi && $mobil->exists && $mobil->id == $pemesanan->paket->id_mobil)
                                            @if ($mobil->pengemudi)
                                            Halo {{ $mobil->pengemudi->nama }}  , Ini notifikasi bali temple tour, Selamat anda telah mendapatkan pesanan baru, silakan membuka website www.balitempletour.com
                                            @endif
                                            {{-- <p class="text-gray-900 md:w-8/12">{{ $mobil->merk }} {{ $mobil->nama_mobil }}</p> --}}
                                        @endif
                                    @endforeach
                                @endif
                            </textarea>
                        </div>
                        <div class="flex items-center hidden">
                            <input type="email" name="recipient_email" value="{{ $pemesanan->user->email }}" placeholder="Alamat Email Penerima" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        </div>
                        <div class="flex items-center">
                            <button type="submit" class="text-white font-semibold bg-gradient-to-tl from-gray-900 to-slate-800 rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center">Konfirmasi Pesanan</button>
                        </div>
                    </form>
                </div>
                @else
                <div class="mt-6">
                    <form action="{{ route('processPengingatPesanan', ['id' => $pemesanan->id]) }}" method="POST">
                        @csrf
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 hidden">
                            <div class="flex items-center">
                                <input type="text" name="status_pemesanan" id="status_pemesanan" value="diterima" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 ">
                            </div>  
                        </div>
                        <div class="flex items-center hidden">
                            <input type="text" value="+6281239286291" name="recipient_number" placeholder="Nomor Tujuan WhatsApp" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        </div>
                        <div class="flex items-center hidden">
                            <textarea name="message" placeholder="Pesan untuk Dikirim" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                                @if ($pemesanan->paket->mobil1 && $pemesanan->paket->mobil1->count() > 0)
                                    @foreach ($pemesanan->paket->mobil1 as $mobil)
                                        @if ($mobil->pivot->konfirmasi && $mobil->exists && $mobil->id == $pemesanan->paket->id_mobil)
                                            @if ($mobil->pengemudi)
                                            Halo {{ $mobil->pengemudi->nama }}  , Ini notifikasi bali temple tour. Anda akan memulai tour pada tanggal {{ \Carbon\Carbon::parse($pemesanan->tgl_tour_mulai)->isoFormat('DD MMMM YYYY') }}, jam keberangkatan {{ \Carbon\Carbon::parse($pemesanan->jam_datang)->isoFormat('HH:mm') }} dan lokasi penjemputan di {{ $pemesanan->lokasi_penjemputan }}. Persiapkan diri anda dan tetap jaga kesehatan. Informasi lebih lanjut bisa buka website www.balitempletour.com Terima Kasih
                                            @endif
                                            {{-- <p class="text-gray-900 md:w-8/12">{{ $mobil->merk }} {{ $mobil->nama_mobil }}</p> --}}
                                        @endif
                                    @endforeach
                                @endif
                            </textarea>
                        </div>
                        <div class="flex items-center hidden">
                            <input type="email" name="recipient_email" value="{{ $pemesanan->user->email }}" placeholder="Alamat Email Penerima" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        </div>
                        <div class="flex items-center">
                            <button type="submit" class="text-white font-semibold bg-gradient-to-tl from-gray-900 to-slate-800 rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center">Kirim Notifikasi Pengingat Pengemudi</button>
                        </div>
                    </form>
                </div>
                @endif
                <!-- Tambahkan kode untuk atribut lainnya di sini -->
                </div>
                
                <div class="mt-10 w-full md:w-1/3 mb-4 md:mb-0 md:order-last">
                <div class="border border-gray-300 rounded-5 overflow-hidden">
                    <img src="{{ asset($pemesanan->images->count() ? 'storage/'. $pemesanan->images->first()->src : 'assets/images/blog/mobilkosong.png') }}" alt="{{ $pemesanan->user->nama }}" class="w-full h-auto mx-auto my-2">
                </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
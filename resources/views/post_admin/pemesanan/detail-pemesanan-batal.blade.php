@extends('layouts.app_admin')
@section('action')
@section('title', 'Pemesanan')
@section('navbar', 'Pemesanan')
@section('data', 'Pengelolaan Data')
@section('content')
<div class="w-full px-6 bg-gray-DEFAULT-50 mx-auto">
    
    <div class="container mx-auto p-4">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="px-6 py-4 mt-10">
            <h2 class="text-2xl font-bold mb-2">Detail Pengajuan Batal Pesanan</h2>
            <hr class="my-4">
            <div class="flex flex-col md:flex-row mx-auto">
                <div class="w-full md:w-2/3">
                <div class="mb-4 md:flex items-center">
                    <p class="text-gray-700 font-bold md:w-1/3">Nomor Pesanan</p>
                    <p class="hidden md:block text-gray-700 font-bold md:w-1/6">:</p>
                    <p class="text-gray-900 md:w-8/12">{{ sprintf('%06d', $batal->pemesanan->id) }}</p>
                </div>
                <div class="mb-4 md:flex items-center">
                    <p class="text-gray-700 font-bold md:w-1/3">Nama</p>
                    <p class="hidden md:block text-gray-700 font-bold md:w-1/6">:</p>
                    <p class="text-gray-900 md:w-8/12">{{ $batal->pemesanan->user->nama }}</p>
                </div>
                <div class="mb-4 md:flex items-center">
                    <p class="text-gray-700 font-bold md:w-1/3">Nomor Telphone</p>
                    <p class="hidden md:block text-gray-700 font-bold md:w-1/6">:</p>
                    <p class="text-gray-900 md:w-8/12">{{ $batal->pemesanan->user->no_telp }}</p>
                </div>
                <div class="mb-4 md:flex items-center">
                    <p class="text-gray-700 font-bold md:w-1/3">Paket Yang Dipilih</p>
                    <p class="hidden md:block text-gray-700 font-bold md:w-1/6">:</p>
                    <p class="text-gray-900 md:w-8/12">{{ $batal->pemesanan->paket->nama }}</p>
                </div>
                <div class="mb-4 md:flex items-center">
                    <p class="text-gray-700 font-bold md:w-1/3">Tanggal Mulai Tour</p>
                    <p class="hidden md:block text-gray-700 font-bold md:w-1/6">:</p>
                    <p class="text-gray-900 md:w-8/12">{{ \Carbon\Carbon::parse($batal->pemesanan->tgl_tour_mulai)->isoFormat('DD MMMM YYYY') }}</p>
                </div>
                <div class="mb-4 md:flex items-center">
                    <p class="text-gray-700 font-bold md:w-1/3">Tanggal Selesai Tour</p>
                    <p class="hidden md:block text-gray-700 font-bold md:w-1/6">:</p>
                    <p class="text-gray-900 md:w-8/12">{{ \Carbon\Carbon::parse($batal->pemesanan->tgl_tour_selesai)->isoFormat('DD MMMM YYYY') }}</p>
                </div>
                <div class="mb-4 md:flex items-center">
                    <p class="text-gray-700 font-bold md:w-1/3">Jam Berangkat</p>
                    <p class="hidden md:block text-gray-700 font-bold md:w-1/6">:</p>
                    <p class="text-gray-900 md:w-8/12">{{ \Carbon\Carbon::parse($batal->pemesanan->jam_datang)->isoFormat('HH:mm') }}</p>
                </div>
                <div class="mb-4 md:flex items-center">
                    <p class="text-gray-700 font-bold md:w-1/3">Lokasi Penjemputan</p>
                    <p class="hidden md:block text-gray-700 font-bold md:w-1/6">:</p>
                    <p class="text-gray-900 md:w-8/12">{{ $batal->pemesanan->lokasi_penjemputan }}</p>
                </div>
                <div class="mb-4 md:flex items-center">
                    <p class="text-gray-700 font-bold md:w-1/3">Pengemudi</p>
                    <p class="hidden md:block text-gray-700 font-bold md:w-1/6">:</p>
                    <p class="text-gray-900 md:w-8/12">{{ optional($batal->pemesanan->mobil)->pengemudi->nama ?? '-' }}</p>
                </div>
                <div class="mb-4 md:flex items-center">
                    <p class="text-gray-700 font-bold md:w-1/3">Mobil (Nomor Plat)</p>
                    <p class="hidden md:block text-gray-700 font-bold md:w-1/6">:</p>
                    <p class="text-gray-900 md:w-8/12">{{ optional($batal->pemesanan->mobil)->merk ?? ' ' }} {{ optional($batal->pemesanan->mobil)->nama_mobil ?? ' ' }} ({{ optional($batal->pemesanan->mobil)->no_plat_mobil ?? '-' }})</p>
                </div>
                <div class="mb-4 md:flex items-center">
                    <p class="text-gray-700 font-bold md:w-1/3">Harga Paket</p>
                    <p class="hidden md:block text-gray-700 font-bold md:w-1/6">:</p>
                    <p class="text-gray-900 md:w-8/12">@if($batal->pemesanan->paket->harga)
                        Rp. {{ number_format($batal->pemesanan->paket->harga, 0, ',', '.') }}
                        @else
                        -
                        @endif</p></p>
                </div>
                <div class="mb-4 md:flex items-center">
                    <p class="text-gray-700 font-bold md:w-1/3">Nominal DP</p>
                    <p class="hidden md:block text-gray-700 font-bold md:w-1/6">:</p>
                    <p class="text-gray-900 md:w-8/12">Rp. {{ number_format($batal->pemesanan->nominal_dp, 0, ',', '.') }}</p>
                </div>
                <div class="mb-4 md:flex items-center">
                    <p class="text-gray-700 font-bold md:w-1/3">Status Pesanan</p>
                    <p class="hidden md:block text-gray-700 font-bold md:w-1/6">:</p>
                        @if ($batal->pemesanan->status_pemesanan == 'diterima' || $batal->pemesanan->status_pemesanan == 'batal')
                        <p class="text-gray-900 md:w-8/12">{{ $batal->pemesanan->status_pemesanan }}</p>
                        @else
                        <p class="text-gray-900 md:w-8/12">Menunggu Konfirmasi</p>
                        @endif</p>
                </div>
                <div class="mx-auto mt-16">
                    <p class="text-gray-700 text-2xl font-bold">Total Pembayaran</p>
                    <p class="text-gray-900">
                    @if ($batal->pemesanan->paket->harga)
                        Rp. {{ number_format($batal->pemesanan->paket->harga - $batal->pemesanan->nominal_dp, 0, ',', '.') }}
                    @else
                        -
                    @endif
                    </p>
                </div>
                <div class="mx-auto mt-16">
                    <p class="text-gray-700 text-xl font-bold">Keterangan Pengajuan Batal Pesanan</p>
                    <p class="text-gray-900">{{ $batal->keterangan }}</p>
                </div>
                <div class="mt-6">
                    @if ($batal->pemesanan->status_pemesanan !== 'batal')
                    <form action="{{ route('processKonfirmasiBatalPesanan', ['id' => $batal->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="upload__box">
                            @error('images[]')
                            <small class="text-xs text-red-500 ml-1">{{ '*' . $message }}</small>
                            @enderror
                            <div class="upload__btn-box">
                                <label class="upload__btn btn btn-primary">
                                    <p>Choose An Image</p>
                                    <input type="file" name="image" accept="image/*" multiple data-max_length="20" class="upload__inputfile">
                                </label>
                            </div>
                            {{-- <div class="upload__img-wrap">
                                @foreach ($batal->images as $item => $image)
                                <div class='upload__img-box'>
                                    <div style='background-image: url({{ asset('storage/' . $image->src) }})' data-number='{{ $batalPemesanan }}' data-id="{{ $image->id }}" data-file='{{ 'storage/' . $image->src }}' class='img-bg'>
                                        <div class='upload__img-close'></div>
                                    </div>
                                </div>
                                @endforeach
                            </div> --}}
                        </div>
                        <label for="status_pemesanan" class="block font-bold mb-2 text-sm text-gray-900"></label>
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            <div class="flex items-center hidden">
                                <select name="status_pemesanan" id="status_pemesanan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5" required>
                                    <option value="batal">Terima</option>
                                </select>
                            </div>
                            
                            <div class="flex mt-5 items-center">
                                <button type="submit" class="text-white font-semibold bg-gradient-to-tl from-gray-900 to-slate-800 rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center">Konfirmasi Batal Pesanan</button>
                            </div>
                        </div>
                    </form>
                    @endif
                </div>
                <!-- Tambahkan kode untuk atribut lainnya di sini -->
                </div>
                
                <div class="mt-10 w-full md:w-1/3 mb-4 md:mb-0 md:order-last">
                    <div class="border border-gray-300 rounded-5 overflow-hidden">
                        @if(isset($batalPemesanan->images) && $batalPemesanan->images->count())
                            <img src="{{ asset('storage/' . $batalPemesanan->images->first()->src) }}" alt="" class="w-full h-auto mx-auto my-2">
                        @else
                            <img src="{{ asset('assets/images/blog/mobilkosong.png') }}" alt="" class="w-full h-auto mx-auto my-2">
                        @endif
                    </div> 
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
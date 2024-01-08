@extends('layouts.app_admin')
@section('action')
@section('title', 'Detail Pesanan Pengemudi')
@section('navbar', 'Detail Pemesanan')
@section('data', 'Pengemudi')
@section('content')
<div class="w-full px-6 bg-gray-DEFAULT-50 mx-auto">
    
    <div class="container mx-auto p-4">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="px-6 py-4 mt-10">
            <h2 class="text-2xl font-bold mb-2">Detail Pesanan</h2>
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
                    <p class="text-gray-900 md:w-8/12">{{ optional($pemesanan->mobil)->pengemudi->nama ?? '-' }}</p>
                </div>
                <div class="mb-4 md:flex items-center">
                    <p class="text-gray-700 font-bold md:w-1/3">Mobil (Nomor Plat)</p>
                    <p class="hidden md:block text-gray-700 font-bold md:w-1/6">:</p>
                    <p class="text-gray-900 md:w-8/12">{{ optional($pemesanan->mobil)->merk ?? ' ' }} {{ optional($pemesanan->mobil)->nama_mobil ?? ' ' }} ({{ optional($pemesanan->mobil)->no_plat_mobil ?? '-' }})</p>
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
                <div class="mt-6">
                    
                        <div class="flex items-center">
                            <button data-modal-target="batal-pesanan-pengemudi" data-modal-toggle="batal-pesanan-pengemudi" type="button" class="text-white font-semibold bg-gradient-to-tl from-gray-900 to-slate-800 rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center">Selesaikan Pesanan</button>
                        </div>
                        <p class="text-gray-900 mt-3">Catatan: Selesaikan pesanan jika anda sudah menyelesaikan tour </p>

                            <div id="batal-pesanan-pengemudi" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="batal-pesanan-pengemudi">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-6 text-center">
                                            <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Yakin Ingin Menyelesaikan Pesanan</h3>
                                            <form action="{{ route('processSelesaiPesanan', ['id' => $pemesanan->id]) }}" method="POST">
                                                @csrf
                                                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 hidden">
                                                    <div class="flex items-center">
                                                        <input type="text" name="status_pemesanan" id="status_pemesanan" value="selesai" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 ">
                                                    </div>  
                                                </div>
                                                <button data-modal-hide="batal-pesanan-pengemudi" type="submit" class="text-white bg-slate-800 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 dark:focus:ring-slate-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                    Selesaikan Pesanan
                                                </button>
                                                <button data-modal-hide="batal-pesanan-pengemudi" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Batal</button>
                                            </form> 
                                        </div>
                                    </div>
                                </div>
                            </div> 
                </div>
                <!-- Tambahkan kode untuk atribut lainnya di sini -->
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
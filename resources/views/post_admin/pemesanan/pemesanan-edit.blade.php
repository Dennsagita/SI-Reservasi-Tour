@extends('layouts.app_admin')
@section('action')
@section('title', 'Ubah Pemesanan')
@section('navbar', 'Pemesanan')
@section('data', 'Pengelolaan Data')
@endsection

@section('content')
<div class="w-full px-6 py-6 mx-auto">
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
          <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="p-6 mt-6 pb-0 mb-6 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
            <section class="bg-white dark:bg-gray-900">
                    <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Form Edit Data Pesanan</h2>
    
                    @if ($errors->any())
                    <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Danger</span>
                        <div>
                        <span class="font-medium">Ensure that these requirements are met:</span>
                            <ul class="mt-1.5 ml-4 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                    <form action="/pemesanan/{{ $pemesanan->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            <div class="sm:col-span-2">
                                <label for="id_paket" class="block mb-2 text-sm font-medium text-gray-900">Pilih Paket</label>
                                <select name="id_paket" id="id_paket" disabled class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                    <option value="{{ $pesanan->paket->id }}">{{ $pesanan->paket->nama }}</option>
                                </select>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="id_mobil" class="block mb-2 text-sm font-medium text-gray-900">Pilih Mobil</label>
                                <select name="id_mobil" id="id_mobil" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                    @foreach ($mobils as $mobil)
                                        <option value="{{ $mobil->id }}" {{ $mobil->id == $pesanan->paket->id_mobil ? 'selected' : '' }}>
                                            {{ $mobil->merk}} {{ $mobil->nama_mobil}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="w-full">
                                <label for="tgl_tour_mulai" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Mulai Tour</label>
                                <input type="date" name="tgl_tour_mulai" id="tgl_tour_mulai" value="{{ $pemesanan->tgl_tour_mulai }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="pilih tanggal" required="">
                            </div>
                            <div class="w-full">
                                <label for="tgl_tour_selesai" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Selesai Tour</label>
                                <input type="date" name="tgl_tour_selesai" id="tgl_tour_selesai" value="{{ $pemesanan->tgl_tour_selesai }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="$2999" required="">
                            </div>
                            <div class="w-full">
                                <label for="tgl_berangkat" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Berangkat</label>
                                <input type="date" name="tgl_berangkat" id="tgl_berangkat" value="{{ $pemesanan->tgl_berangkat }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="$2999" required="">
                            </div>
                            <div class="w-full">
                                <label for="jam_datang" class="block mb-2 text-sm font-medium text-gray-900">Jam Berangkat</label>
                                <input type="time" name="jam_datang" id="jam_datang" value="{{ $pemesanan->jam_datang }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="$2999" required="">
                            </div>
                            <div class="sm:col-span-2">
                                <label for="lokasi_penjemputan" class="block mb-2 text-sm font-medium text-gray-900">Lokasi Penjemputan</label>
                                <input type="text" name="lokasi_penjemputan" id="lokasi_penjemputan" value="{{ $pemesanan->lokasi_penjemputan }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="(Contoh: Lobby Hotel A)" required="">
                            </div>
                            <div class="sm:col-span-2">
                                <label for="status_pemesanan" class="block mb-2 text-sm font-medium text-gray-900">Status Pemesanan</label>
                                <select name="status_pemesanan" id="status_pemesanan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                <option value="{{ $pemesanan->status_pemesanan }}">{{ $pemesanan->status_pemesanan }}</option>
                                <option value="diterima">Diterima</option>
                                <option value="batal">Batal</option>
                                <option value="baru">Baru</option>
                                <option value="selesai">Selesai</option>
                            </select>
                            </div>
                        </div>
                        <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-slate-700 rounded-lg focus:ring-4 focus:ring-primary-200  hover:bg-primary-800">
                            Ubah Data Reservasi
                        </button>
                    </form>
            </section>
            </div>
          </div>
        </div>
    </div>
    </div>
@endsection
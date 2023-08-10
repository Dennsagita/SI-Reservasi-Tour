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
                                    {{-- <option value="{{ $pesanan->mobil->id }}"{{ $pesanan->mobil->id == $pesanan->id_mobil ? ' selected' : '' }}>
                                        {{ optional($pesanan->mobil)->pengemudi->nama ?? '-' }} {{ $pesanan->mobil->nama_mobil }}
                                    </option> --}}
                                    @foreach ($mobils as $mobil)
                                        <option value="{{ $mobil->id }}"{{ $mobil->id == $pesanan->id_mobil ? ' selected' : '' }}>
                                            {{ $mobil->pengemudi->nama }} ({{ $mobil->merk }} {{ $mobil->nama_mobil }})
                                        </option>
                                    @endforeach
                                </select>
                                <!-- Elemen Popup -->
                                <div id="popup-info" class="fixed inset-0 flex items-center justify-center z-50 hidden">
                                    <div class="bg-gray-100 dark:bg-gray-900 w-1/2 md:w-1/3 lg:w-1/4 p-6 rounded-lg shadow-lg">
                                        <span class="absolute top-3 right-3 cursor-pointer">
                                            <svg id="close-popup" class="w-6 h-6 text-gray-600 hover:text-gray-800 transition duration-300 ease-in-out" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </span>
                                        <div id="popup-content-inner"></div>
                                        <button id="close-popup-button" type="button" class="mt-4 w-full py-2 text-center bg-gray-300 text-gray-800 hover:bg-gray-400 rounded-lg focus:outline-none focus:ring focus:ring-gray-400">Tutup</button>
                                    </div>
                                </div>
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

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const selectMobil = document.getElementById("id_mobil");
        const popup = document.getElementById("popup-info");
        const popupContent = document.getElementById("popup-content-inner");
        const closePopup = document.getElementById("close-popup");
        const closePopupButton = document.getElementById("close-popup-button");

        selectMobil.addEventListener("change", async function() {
            const selectedOption = selectMobil.options[selectMobil.selectedIndex];
            const mobilId = selectedOption.value;

            try {
                const response = await axios.get(`/api/get-mobil/${mobilId}`);
                const data = response.data;

                const content = `
                    <h2 class="text-xl font-semibold mb-3">${data.merk} ${data.nama_mobil}</h2>
                    <p class="mb-2 font-semibold">Nama Pengemudi: ${data.pengemudi}</p>
                    <p class="mb-4">Tanggal Tour: ${data.pemesanan}</p>
                    <!-- Tambahkan informasi lainnya yang diperlukan -->
                `;

                popupContent.innerHTML = content;
                popup.classList.remove("hidden"); // Tampilkan modal

            } catch (error) {
                console.error("Error fetching data:", error);
            }
        });

        closePopup.addEventListener("click", function() {
            popup.classList.add("hidden"); // Sembunyikan modal saat tombol "Tutup" diklik
        });

        closePopupButton.addEventListener("click", function() {
            popup.classList.add("hidden"); // Sembunyikan modal saat tombol "Tutup" di dalam modal diklik
        });
    });
</script>
 
@endsection
@extends('layouts.app')
@section('action')
@endsection

@section('content')
<div class="max-w-full py-30" style="background-image: linear-gradient(115deg, #a8b8d8, #f8fafc)">
    <div class="container mx-auto">
        @if(Session::has('status'))
        <div id="toast-success" class="flex items-center w-full p-4 mb-4 text-gray-500 bg-white rounded-lg shadow" role="alert">
         <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
             <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
             <span class="sr-only">Check icon</span>
         </div>
         <div class="ml-3 text-sm font-normal">{{ Session::get('message') }}</div>
         <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8" data-dismiss-target="#toast-success" aria-label="Close">
             <span class="sr-only">Close</span>
             <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
         </button>
         </div>
       @endif
      <div class="flex flex-col lg:flex-row w-10/12 lg:w-8/12 bg-white rounded-xl mx-auto shadow-lg overflow-hidden">
        <div class="w-full lg:w-1/2 flex flex-col items-center justify-center p-12 bg-no-repeat bg-cover bg-center" style="background-image: url('../assets/pura.jpg')">
          <h1 class="text-white text-3xl mb-3">Welcome</h1>
          <div>
            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean suspendisse aliquam varius rutrum purus maecenas ac <a href="#" class="text-purple-500 font-semibold">Learn more</a></p>
          </div>
        </div>
        <div class="w-full lg:w-1/2 py-16 px-12">
          <h2  class="text-3xl mb-4">Reservasi Sekarang</h2>
          <form action="{{ route('reservasi-insert') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="sm:col-span-2 hidden">
                    <label for="id_user" class="block mb-2 text-sm font-medium text-gray-900">Id User</label>
                    <input type="text" name="id_user" id="id_user" value="{{ Auth::guard('user')->user()->id }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Id User" required="">
                </div>
                <div class="sm:col-span-2">
                    <label for="id_paket" class="block mb-2 text-sm font-medium text-gray-900">Pilih Paket</label>
                    <select name="id_paket" id="id_paket" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                        <option value="">Select Paket</option>
                        @foreach ($paket as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full">
                    <label for="tgl_tour_mulai" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Mulai Tour</label>
                    <input type="date" name="tgl_tour_mulai" id="tgl_tour_mulai" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="pilih tanggal" required="">
                </div>
                <div class="w-full">
                    <label for="tgl_tour_selesai" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Selesai Tour</label>
                    <input type="date" name="tgl_tour_selesai" id="tgl_tour_selesai" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="$2999" required="">
                </div>
                <div class="w-full">
                    <label for="tgl_berangkat" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Berangkat</label>
                    <input type="date" name="tgl_berangkat" id="tgl_berangkat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="$2999" required="">
                </div>
                <div class="w-full">
                    <label for="jam_datang" class="block mb-2 text-sm font-medium text-gray-900">Jam Berangkat</label>
                    <input type="time" name="jam_datang" id="jam_datang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="$2999" required="">
                </div>
                <div class="sm:col-span-2">
                    <label for="lokasi_penjemputan" class="block mb-2 text-sm font-medium text-gray-900">Lokasi Penjemputan</label>
                    <input type="text" name="lokasi_penjemputan" id="lokasi_penjemputan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="(Contoh: Lobby Hotel A)" required="">
                </div>
                <div class="sm:col-span-2">
                    <label for="nominal_dp" class="block mb-2 text-sm font-medium text-gray-900">Nominal DP</label>
                    <input type="text" name="nominal_dp" id="nominal_dp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="100000" required="">
                </div>
                <div class="sm:col-span-2">
                    <label class="block mb-2 text-sm font-medium text-gray-90" for="file_input">Upload Bukti DP</label>
                    <input type="file" name="images[]" multiple data-max_length="20" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none" aria-describedby="file_input_help">
                    <p class="mt-1 text-sm text-gray-500" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
                </div>
                <div class="sm:col-span-2 hidden">
                    <label for="status_pemesanan" class="block mb-2 text-sm font-medium text-gray-900">Status Pemesanan</label>
                    <input type="text" name="status_pemesanan" id="status_pemesanan" value="baru" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="100000" required="">
                </div>
            </div>
            <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-slate-700 rounded-lg focus:ring-4 focus:ring-primary-200  hover:bg-primary-800">
                Reservasi
            </button>
        </form>
        </div>
      </div>
    </div>
  </div>
  @endsection
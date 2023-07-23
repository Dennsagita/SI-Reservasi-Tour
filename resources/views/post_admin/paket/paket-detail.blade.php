@extends('layouts.app_admin')
@section('action')
@section('title', 'Detail Paket')
@section('navbar', 'Paket')
@section('data', 'Pengelolaan Data')
@endsection

@section('content')
<div class="container mx-auto p-4">
  <div class="bg-white shadow-md rounded-lg overflow-hidden">
    <div class="px-6 py-4">
      <h2 class="text-2xl font-bold mb-2">Detail Data Paket</h2>
      <hr class="my-4">

      <div class="flex flex-col md:flex-row basis-6/12 mx-auto">
        <div class="w-full md:w-1/3">
          <img src="{{ asset($paket->images->count() ? 'storage/'. $paket->images->first()->src : 'assets/images/blog/user-1.png') }}" alt="{{ $paket->nama }}" class="w-full h-auto mx-auto my-2 rounded-5">
        </div>

        <div class="w-full md:w-2/3">
          <div class="mb-4 ml-10 flex items-center">
            <p class="text-gray-700 font-bold md:w-52">Nama</p>
            <p class="text-gray-700 font-bold md:w-5">:</p>
            <p class="text-gray-900">{{ $paket->nama }}</p>
          </div>

          <div class="mb-4 ml-10 flex items-center">
            <p class="text-gray-700 font-bold md:w-52">Destinasi</p>
            <p class="text-gray-700 font-bold md:w-5">:</p>
            <p class="text-gray-900">{{ $paket->destinasi }}</p>
          </div>

          <div class="mb-4 ml-10 flex items-center">
            <p class="text-gray-700 font-bold md:w-52">Harga</p>
            <p class="text-gray-700 font-bold md:w-5">:</p>
            <p class="text-gray-900">Rp. {{ number_format($paket->harga, 0, ',', '.') }}</p>
          </div>
          <div class="mb-4 ml-10 flex items-center">
            <p class="text-gray-700 font-bold md:w-52">Pengemudi</p>
            <p class="text-gray-700 font-bold md:w-5">:</p>
            <p class="text-gray-900">
              @foreach ($paket->mobil1 as $data)
                @if ($data->pivot->konfirmasi)
                  - {{ $data->pengemudi->nama }} <br>
                @endif
              @endforeach
            </p>
          </div>
        </div>
      </div>
      <div class="text-gray-700 font-bold">
        <p class="text-gray-700 font-bold">Keterangan :</p>
        <p class="text-gray-700">{!! $paket->keterangan !!}</p>
      </div>
    </div>
  </div>
</div>



  
@endsection
@extends('layouts.app_admin')
@section('action')
@section('title', 'Detail Mobil')
@section('navbar', 'Mobil')
@section('data', 'Pengelolaan Data')
@endsection

@section('content')
<div class="container mx-auto p-4">
  <div class="bg-white shadow-md rounded-lg overflow-hidden">
    <div class="px-6 py-4">
      <h2 class="text-2xl font-bold mb-2">Detail Data Mobil</h2>
      <hr class="my-4">

      <div class="flex flex-col md:flex-row mx-auto">
        <div class="w-full md:w-1/3">
          <img src="{{ asset($mobil->images->count() ? 'storage/'. $mobil->images->first()->src : 'assets/images/blog/mobilkosong.png') }}" alt="{{ $mobil->nama }}" class="w-full h-auto mx-auto my-2 rounded-5">
        </div>

        <div class="w-full md:w-2/3">
          <div class="mb-4 ml-10 flex items-center">
            <p class="text-gray-700 font-bold md:w-52">Nama Pengemudi</p>
            <p class="text-gray-700 font-bold md:w-5">:</p>
            <p class="text-gray-900">{{ $mobil->pengemudi->nama }}</p>
          </div>

          <div class="mb-4 ml-10 flex items-center">
            <p class="text-gray-700 font-bold md:w-52">No Plat Mobil</p>
            <p class="text-gray-700 font-bold md:w-5">:</p>
            <p class="text-gray-900">{{ $mobil->no_plat_mobil }}</p>
          </div>

          <div class="mb-4 ml-10 flex items-center">
            <p class="text-gray-700 font-bold md:w-52">Merk</p>
            <p class="text-gray-700 font-bold md:w-5">:</p>
            <p class="text-gray-900">{{ $mobil->merk }}</p>
          </div>

          <div class="mb-4 ml-10 flex items-center">
            <p class="text-gray-700 font-bold md:w-52">Nama Mobil</p>
            <p class="text-gray-700 font-bold md:w-5">:</p>
            <p class="text-gray-900">{{ $mobil->nama_mobil }}</p>
          </div>
          <div class="mb-4 ml-10 flex items-center">
            <p class="text-gray-700 font-bold md:w-52">Paket Diikuti</p>
            <p class="text-gray-700 font-bold md:w-5">:</p>
            <p class="text-gray-900">
              @foreach ($mobil->paket1 as $data)
                  - {{ $data->nama }} <br>
                  @endforeach
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="text-gray-700 ml-10 font-bold">
      <p class="text-gray-700 font-bold">Keterangan :</p>
      <p class="text-gray-700">{!! $mobil->keterangan !!}</p>
    </div>
  </div>
</div>



  
@endsection
@extends('layouts.app_admin')
@section('action')
@section('title', 'Detail Pengemudi')
@section('navbar', 'Pengemudi')
@section('data', 'Pengelolaan Data')
@endsection

@section('content')
<div class="container mx-auto p-4">
  <div class="bg-white shadow-md rounded-lg overflow-hidden">
    <div class="px-6 py-4">
      <h2 class="text-2xl font-bold mb-2">Detail Data pengemudi</h2>
      <hr class="my-4">

      <div class="flex flex-col md:flex-row mx-auto">
        <div class="w-full md:w-1/3">
          <img src="{{ asset($pengemudi->images->count() ? 'storage/'. $pengemudi->images->first()->src : 'assets/images/blog/profilnone.png') }}" alt="{{ $pengemudi->nama }}" class="w-full h-auto mx-auto my-2 rounded-5">
        </div>

        <div class="w-full md:w-2/3">
          <div class="mb-4 ml-10 flex items-center">
            <p class="text-gray-700 font-bold md:w-52">Nama</p>
            <p class="text-gray-700 font-bold md:w-5">:</p>
            <p class="text-gray-900">{{ $pengemudi->nama }}</p>
          </div>

          <div class="mb-4 ml-10 flex items-center">
            <p class="text-gray-700 font-bold md:w-52">Email</p>
            <p class="text-gray-700 font-bold md:w-5">:</p>
            <p class="text-gray-900">{{ $pengemudi->email }}</p>
          </div>

          <div class="mb-4 ml-10 flex items-center">
            <p class="text-gray-700 font-bold md:w-52">Nomor Telphone</p>
            <p class="text-gray-700 font-bold md:w-5">:</p>
            <p class="text-gray-900">{{ $pengemudi->no_telp }}</p>
          </div>

          <div class="mb-4 ml-10 flex items-center">
            <p class="text-gray-700 font-bold md:w-52">Alamat</p>
            <p class="text-gray-700 font-bold md:w-5">:</p>
            <p class="text-gray-900 md:w-62">{{ $pengemudi->alamat }}</p>
          </div>
          <div class="mb-4 ml-10 flex items-center">
            <p class="text-gray-700 font-bold md:w-52">Tanggal Registrasi</p>
            <p class="text-gray-700 font-bold md:w-5">:</p>
            <p class="text-gray-900">{{ ($pengemudi->created_at)->isoFormat('DD MMMM YYYY (HH:mm)') }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



  
@endsection
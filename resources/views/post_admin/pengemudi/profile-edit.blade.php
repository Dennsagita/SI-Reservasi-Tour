@extends('layouts.app_admin')
@section('action')
@section('title', 'Profile Edit Pengemudi')
@section('navbar', 'Pengemudi')
@section('data', 'Profile')

@section('content')
<div class="w-full px-6 py-6 mx-auto min-h-screen pb-24 bg-gray-DEFAULT-50">
    <div class="relative flex items-center p-0 mt-6 overflow-hidden bg-center bg-cover min-h-75 rounded-2xl" style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%">
        <span class="absolute inset-y-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-purple-700 to-pink-500 opacity-60"></span>
    </div>
    <div class="relative flex flex-col flex-auto min-w-0 p-4 mx-6 -mt-16 overflow-hidden break-words border-0 shadow-blur rounded-2xl bg-white/80 bg-clip-border backdrop-blur-2xl backdrop-saturate-200">
        <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-auto max-w-full px-3">
            <div class="text-base ease-soft-in-out h-18.5 w-18.5 relative inline-flex items-center justify-center rounded-xl text-white transition-all duration-200">
                <img src="{{  asset($pengemudi->images->count() ? 'storage/' . $pengemudi->images->first()->src : 'assets/images/blog/profilnone.png') }}" alt="" class="w-full shadow-soft-sm rounded-xl" />
            </div>
        </div>
        <div class="flex-none w-auto max-w-full px-3 my-auto">
            <div class="h-full">
            <h5 class="mb-1">{{ Auth::guard('pengemudi')->user()->nama }}</h5>
            <p class="mb-0 font-semibold leading-normal text-sm">{{ Auth::guard('pengemudi')->user()->email }}</p>
            </div>
        </div>
        </div>
    </div>
    <div class="flex flex-wrap -mx-3 pt-10">
        <div class="flex-none w-full max-w-full px-3">
          <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="p-6 mt-6 pb-0 mb-6 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
            <section class="bg-white">
                    <h2 class="mb-4 text-xl font-bold text-gray-900 ">Ubah Data Pfroil</h2>
                    <form action="{{ route('profileUpdatePengemudi') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="deleted_images" name="deleted_images">
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="w-full">
                            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 ">Nama</label>
                            <input type="text" name="nama" id="nama" value="{{ Auth::guard('pengemudi')->user()->nama }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Masukan nama anda" required="">
                        </div>
                        <div class="w-full">
                            <label for="no_telp" class="block mb-2 text-sm font-medium text-gray-900 ">Nomor Telphone</label>
                            <input type="text" name="no_telp" id="no_telp" value="{{ Auth::guard('pengemudi')->user()->no_telp }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Contoh: 081234555666" required="">
                        </div>
                        <div class="w-full">
                            <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 ">Email</label>
                            <input type="text" name="email" id="email" readonly value="{{ Auth::guard('pengemudi')->user()->email }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Masukan alamat" required="">
                        </div>
                        <div class="w-full">
                            <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 ">Alamat</label>
                            <input type="text" name="alamat" id="alamat" value="{{ Auth::guard('pengemudi')->user()->alamat }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Masukan alamat" required="">
                        </div>
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
                            <div class="upload__img-wrap">
                                @foreach ($pengemudi->images as $item => $image)
                                <div class='upload__img-box'>
                                    <div style='background-image: url({{ asset('storage/' . $image->src) }})' data-number='{{ $item }}' data-id="{{ $image->id }}" data-file='{{ 'storage/' . $image->src }}' class='img-bg'>
                                        <div class='upload__img-close'></div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        </div>
                        <div class="pt-8">
                        <button type="submit" class="w-full rounded-md bg-blue-500 px-8 py-2.5 font-semibold text-white shadow-md shadow-blue-500/20 hover:bg-blue-600 duration-200 sm:w-auto">Ubah Data Profil</button>
                        </div>
                    </form>
            </section>
            </div>
          </div>
        </div>
    </div>
    </div>
@endsection
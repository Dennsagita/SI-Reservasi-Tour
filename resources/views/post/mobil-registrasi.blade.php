@extends('layouts.app')
@section('action')
@section('title', 'Registrasi Mobil')

@section('content')
<div class="w-full px-6 py-6 mx-auto mt-20">
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
          <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="p-6 mt-6 pb-0 mb-6 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
            <section class="bg-white">
                    <h2 class="mb-4 text-xl font-bold text-gray-900">Form Tambah Data Mobil</h2>
    
                    <form action="{{ route('processregistrasimobil') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            <div>
                                <input type="hidden" name="id_pengemudi" value="{{ $id_pengemudi }}">
                            </div>
                            <div class="sm:col-span-2">
                                <label for="no_plat_mobil" class="block mb-2 text-sm font-medium text-gray-900">Nomor Plat Mobil</label>
                                <input type="text" name="no_plat_mobil" id="no_plat_mobil" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="No Plat Kendaraan">
                                @error('no_plat_mobil')
                                    <p class="text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full">
                                <label for="merk" class="block mb-2 text-sm font-medium text-gray-900">Merk Mobil</label>
                                <input type="text" name="merk" id="merk" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Merk Mobil">
                                @error('merk')
                                    <p class="text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full">
                                <label for="nama_mobil" class="block mb-2 text-sm font-medium text-gray-900">Nama Mobil</label>
                                <input type="text" name="nama_mobil" id="nama_mobil" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Nama Mobil">
                                @error('nama_mobil')
                                    <p class="text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="sm:col-span-2">
                                <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500" placeholder="Keterangan"></textarea>
                            </div>
                        </div>
                        <div class="upload__box">
                           
                            <div class="upload__btn-box">
                                <label class="upload__btn btn btn-primary">
                                    <p class="">Unggah Gambar  
                                    </p>
                                    <input type="file" name="images[]" multiple data-max_length="20"
                                        class="upload__inputfile">
                                </label>
                            </div>
                            <div class="upload__img-wrap"></div>
                        </div>
                        <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-slate-900 rounded-lg focus:ring-4 focus:ring-primary-200">
                            Tambah Data Mobil
                        </button>
                    </form>
            </section>
            </div>
          </div>
        </div>
    </div>
    </div>
@endsection
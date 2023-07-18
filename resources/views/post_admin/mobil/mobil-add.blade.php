@extends('layouts.app_admin')
@section('action')
@section('title', 'Tambah Mobil')
@section('navbar', 'Mobil')
@section('data', 'Pengelolaan Data')
@endsection

@section('content')
<div class="w-full px-6 py-6 mx-auto">
<div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
      <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="p-6 mt-6 pb-0 mb-6 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
        <section class="bg-white dark:bg-gray-900">
                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Form Tambah Data Mobil</h2>

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
                <form action="mobil-insert" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div>
                            <label for="id_pengemudi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Pemilik</label>
                            <select name="id_pengemudi" id="id_pengemudi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                <option value="">Select Nama Pemilik</option>
                                @foreach ($pengemudi as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-full">
                            <label for="no_plat_mobil" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Plat Mobil</label>
                            <input type="text" name="no_plat_mobil" id="no_plat_mobil" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="No Plat Kendaraan" required="">
                        </div>
                        <div class="w-full">
                            <label for="merk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Merk Mobil</label>
                            <input type="text" name="merk" id="merk" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Merk Mobil" required="">
                        </div>
                        <div class="w-full">
                            <label for="nama_mobil" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Mobil</label>
                            <input type="text" name="nama_mobil" id="nama_mobil" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nama Mobil" required="">
                        </div>
                        <div class="sm:col-span-2">
                            <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required placeholder="Keterangan"></textarea>
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
                    <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-darkblue rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
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
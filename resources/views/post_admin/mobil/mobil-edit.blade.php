@extends('layouts.app_admin')
@section('action')
@section('title', 'Edit Pengemudi')
@endsection

@section('content')
<div class="w-full px-6 py-6 mx-auto">
<div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
      <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="p-6 mt-6 pb-0 mb-6 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
        <section class="bg-white dark:bg-gray-900">
                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Form Edit Data Mobil</h2>
                <form action="/mobil/{{ $mobil->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="deleted_images" name="deleted_images">
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div>
                            <label for="id_pengemudi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Pemilik</label>
                            <select name="id_pengemudi" id="id_pengemudi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                <option value="{{ $mobil->pengemudi->id }}">{{ $mobil->pengemudi->nama }}</option>
                                @foreach ($pengemudi as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-full">
                            <label for="no_plat_mobil" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Plat Mobil</label>
                            <input type="text" name="no_plat_mobil" id="no_plat_mobil" value="{{ $mobil->no_plat_mobil }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nomor Plat Mobil" required="">
                        </div>
                        <div class="w-full">
                            <label for="merk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Merk Mobil</label>
                            <input type="text" name="merk" id="merk" value="{{ $mobil->merk }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Merk Mobil" required="">
                        </div>
                        <div class="w-full">
                            <label for="nama_mobil" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Mobil</label>
                            <input type="text" name="nama_mobil" id="nama_mobil" value="{{ $mobil->nama_mobil }}"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nama Mobil" required="">
                        </div>
                        {{-- <div>
                            <label for="status_tour" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                            <select name="status_tour" id="status_tour" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                <option value="{{ $mobil->status_tour }}">{{ $mobil->status_tour }}</option>
                                @if ($mobil->status_tour == "tour")
                                <option value="tour-selesai">tidak-tour</option>
                                @else
                                <option value="tour">tour</option>
                                @endif
                            </select>
                        </div> --}}
                        <div class="sm:col-span-2">
                            <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required placeholder="Keterangan">{{ $mobil->keterangan }}</textarea>
                        </div>
                        <div class="upload__box">
                            @error('images[]')
                            <small class="text-xs text-red-500 ml-1">{{ '*' . $message }}</small>
                            @enderror
                            <div class="upload__btn-box">
                                <label class="upload__btn btn btn-primary">
                                    <p>Choose An Image</p>
                                    <input type="file" name="images[]" multiple data-max_length="10" class="upload__inputfile">
                                </label>
                            </div>
                            <div class="upload__img-wrap">
                                @foreach ($mobil->images as $item => $image)
                                <div class='upload__img-box'>
                                    <div style='background-image: url({{ asset('storage/' . $image->src) }})' data-number='{{ $item }}' data-id="{{ $image->id }}" data-file='{{ 'storage/' . $image->src }}' class='img-bg'>
                                        <div class='upload__img-close'></div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-darkblue rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                        Ubah Tambah Mobil
                    </button>
                </form>
        </section>
        </div>
      </div>
    </div>
</div>
</div>
@endsection
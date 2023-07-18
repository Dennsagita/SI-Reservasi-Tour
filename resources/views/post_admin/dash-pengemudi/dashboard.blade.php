@extends('layouts.app_admin')
@section('action')
@section('title', 'Dashboard Pengemudi')
@section('navbar', 'Pengemudi')
@section('data', 'Dashboard')
@endsection

@section('content')
<div class="w-full px-6 py-6 mx-auto">
<div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
      <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="p-6 mt-6 pb-0 mb-6 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
        <section class="bg-white dark:bg-gray-900">

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
                @foreach($mobils as $mobil)
                <h3>Mobil Anda {{ $mobil->merk }} {{ $mobil->nama_mobil }}</h3>
                <h2 class="mt-10 mb-4 text-xl font-bold text-gray-900 dark:text-white">Pilih paket yang ingin Anda ikuti</h2>
                <form action="{{ route('pilihPaket') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="sm:col-span-2">
                        @foreach($paket as $paket)
                            <div>
                                <input type="checkbox" name="id_paket[]" value="{{ $paket->id }}">
                                <label>{{ $paket->nama }}</label><br>
                            </div>
                        @endforeach
                    </div>
                    <input type="hidden" name="id_mobil" value="{{ $mobil->id }}">
                    <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-darkblue rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                        Pilih Paket
                    </button>
                </form>
                @endforeach

        </section>
        </div>
      </div>
    </div>
</div>
</div>
@endsection
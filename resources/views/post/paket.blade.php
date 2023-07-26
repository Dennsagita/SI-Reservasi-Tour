@extends('layouts.app')
@section('action')
@section('title', 'Halaman Paket')
@section('content')

            <!-- ====== Blog ====== -->
            <section class="py-16 bg-gray-DEFAULT-200">
                <div class="mx-auto mt-20 max-w-7xl mb-20 px-8 md:px-6">
                    <!-- heading text -->
                    <div class="mb-10 sm:mb-10">
                        <span class="font-medium text-blue-500"></span>
                        <h1 class="text-2xl font-bold text-slate-700 sm:text-3xl"></h1>
                    </div>
                    <div class="mb-10 sm:mb-10">
                        <span class="font-medium text-blue-500">Pilih Paket Pilihan Anda</span>
                        <h1 class="text-2xl font-bold text-slate-700 sm:text-3xl">Temukan Keajaiban Bali Yang Tak Terlupakan</h1>
                    </div>
                    <!-- wrapper -->
                    
                    <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:gap-10">
                        @foreach ($pakets as $paket)
                        <div class="w-full duration-200 hover:scale-95">
                            <div class="max-h-52 w-full overflow-hidden rounded-t-xl">
                                <!-- Tampilkan gambar paket -->
                                @if ($paket->images->count() > 0)
                                    <img src="{{ asset('storage/'.$paket->images->first()->src) }}" alt="blog img" class="w-full">
                                @else
                                    <img src="{{ asset('assets/images/blog/blog-1.png') }}" alt="blog img" class="w-full">
                                @endif
                            </div>
                            <div class="rounded-b-xl px-5 pb-5 pt-3 shadow-md shadow-blue-500/10 bg-white">
                                <div class="">
                                    <!-- Tampilkan kategori atau label -->
                                   
                                        <a href="{{ route('paketDetailHome', ['id' => $paket->id]) }}" class="mr-2 rounded-md bg-blue-50 px-3 py-1 text-sm text-slate-600">Reservasi Sekarang</a>
                                 
                                    <!-- Tampilkan nama paket -->
                                    <a href="{{ route('paketDetailHome', ['id' => $paket->id]) }}" class="block pt-4 font-medium capitalize text-slate-800 hover:text-blue-500">Destinasi {{ $paket->destinasi }}</a>
                                </div>
                                <hr class="my-4 border-slate-100">
                                <a href="{{ route('paketDetailHome', ['id' => $paket->id]) }}">
                                <div class="flex">
                                    <!-- Tampilkan informasi pengguna -->
                                    <img src="{{ asset('assets/LogoTittle.png') }}" alt="user img" class="mr-3 h-10 w-10 rounded-full object-cover">
                                    <p class="text-sm font-semibold capitalize text-slate-600">{{ $paket->nama }} <span class="block text-xs text-slate-400">Rp. {{ number_format($paket->harga, 0, ',', '.') }}</span></p>
                                </div>
                            </a>
                            </div>
                        </div>
                    @endforeach
                    </div>
                   
                </div>
            </section>
            <!-- ====== END Blog ====== -->
@endsection

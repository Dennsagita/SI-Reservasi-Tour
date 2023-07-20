@extends('layouts.app')
@section('action')
@section('title', 'Detail Pesanan')

@section('content')
<div class="w-full px-6 bg-gray-DEFAULT-50 mx-auto">
    <div class="relative flex items-center p-0 mt-6 overflow-hidden bg-center bg-cover min-h-75 rounded-2xl" style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%">
        <span class="absolute inset-y-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-purple-700 to-pink-500 opacity-60"></span>
    </div>
    <div class="relative flex flex-col flex-auto min-w-0 p-4 mx-6 -mt-16 overflow-hidden break-words border-0 shadow-blur rounded-2xl bg-white/80 bg-clip-border backdrop-blur-2xl backdrop-saturate-200">
        <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-auto max-w-full px-3">
            <div class="text-base ease-soft-in-out h-18.5 w-18.5 relative inline-flex items-center justify-center rounded-xl text-white transition-all duration-200">
                <img src="{{  asset($user->images->count() ? 'storage/' . $user->images->first()->src : 'assets/images/blog/user-1.png') }}" alt="" class="w-full shadow-soft-sm rounded-xl" />
            </div>
        </div>
        <div class="flex-none w-auto max-w-full px-3 my-auto">
            <div class="h-full">
            <h5 class="mb-1">{{ Auth::guard('user')->user()->nama }}</h5>
            <p class="mb-0 font-semibold leading-normal text-sm">{{ Auth::guard('user')->user()->email }}</p>
            </div>
        </div>
        </div>
    </div>

    <div class="container mx-auto p-4">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
          <div class="px-6 py-4 mt-10">
            <h2 class="text-2xl font-bold mb-2">Detail Pesanan Anda</h2>
            <hr class="my-4">
      
            <div class="flex flex-col md:flex-row mx-auto">
                <div class="w-full md:w-2/3">
                  <div class="mb-4 md:flex items-center">
                    <p class="text-gray-700 font-bold md:w-1/3">Nomor Pesanan</p>
                    <p class="hidden md:block text-gray-700 font-bold md:w-1/6">:</p>
                    <p class="text-gray-900 md:w-8/12">{{ sprintf('%06d', $pemesanan->id) }}</p>
                  </div>
                  <div class="mb-4 md:flex items-center">
                    <p class="text-gray-700 font-bold md:w-1/3">Nama</p>
                    <p class="hidden md:block text-gray-700 font-bold md:w-1/6">:</p>
                    <p class="text-gray-900 md:w-8/12">{{ $pemesanan->user->nama }}</p>
                  </div>
              
                  <div class="mb-4 md:flex items-center">
                    <p class="text-gray-700 font-bold md:w-1/3">Nomor Telphone</p>
                    <p class="hidden md:block text-gray-700 font-bold md:w-1/6">:</p>
                    <p class="text-gray-900 md:w-8/12">{{ $pemesanan->user->no_telp }}</p>
                  </div>
                  <div class="mb-4 md:flex items-center">
                    <p class="text-gray-700 font-bold md:w-1/3">Paket Yang Dipilih</p>
                    <p class="hidden md:block text-gray-700 font-bold md:w-1/6">:</p>
                    <p class="text-gray-900 md:w-8/12">{{ $pemesanan->paket->nama }}</p>
                  </div>
                  <div class="mb-4 md:flex items-center">
                    <p class="text-gray-700 font-bold md:w-1/3">Tanggal Mulai Tour</p>
                    <p class="hidden md:block text-gray-700 font-bold md:w-1/6">:</p>
                    <p class="text-gray-900 md:w-8/12">{{ \Carbon\Carbon::parse($pemesanan->tgl_tour_mulai)->isoFormat('DD MMMM YYYY') }}</p>
                  </div>
                  <div class="mb-4 md:flex items-center">
                    <p class="text-gray-700 font-bold md:w-1/3">Tanggal Selesai Tour</p>
                    <p class="hidden md:block text-gray-700 font-bold md:w-1/6">:</p>
                    <p class="text-gray-900 md:w-8/12">{{ \Carbon\Carbon::parse($pemesanan->tgl_tour_selesai)->isoFormat('DD MMMM YYYY') }}</p>
                  </div>
                  <div class="mb-4 md:flex items-center">
                    <p class="text-gray-700 font-bold md:w-1/3">Jam Berangkat</p>
                    <p class="hidden md:block text-gray-700 font-bold md:w-1/6">:</p>
                    <p class="text-gray-900 md:w-8/12">{{ \Carbon\Carbon::parse($pemesanan->jam_datang)->isoFormat('HH:mm') }}</p>
                  </div>
                  <div class="mb-4 md:flex items-center">
                    <p class="text-gray-700 font-bold md:w-1/3">Lokasi Penjemputan</p>
                    <p class="hidden md:block text-gray-700 font-bold md:w-1/6">:</p>
                    <p class="text-gray-900 md:w-8/12">{{ $pemesanan->lokasi_penjemputan }}</p>
                  </div>
                  <div class="mb-4 md:flex items-center">
                    <p class="text-gray-700 font-bold md:w-1/3">Pengemudi</p>
                    <p class="hidden md:block text-gray-700 font-bold md:w-1/6">:</p>
                    @if ($pemesanan->paket->mobil1 && $pemesanan->paket->mobil1->count() > 1)
                        @foreach ($pemesanan->paket->mobil1 as $mobil)
                            @if ($mobil->pivot->konfirmasi && $mobil->exists && $mobil->id == $pemesanan->paket->id_mobil)
                                @if ($mobil->pengemudi)
                                    <p class="text-gray-900 md:w-8/12">{{ $mobil->pengemudi->nama }}</p>
                                @endif
                                {{-- <p class="text-gray-900 md:w-8/12">{{ $mobil->merk }} {{ $mobil->nama_mobil }}</p> --}}
                            @endif
                        @endforeach
                    @endif
                    </div>
                    <div class="mb-4 md:flex items-center">
                        <p class="text-gray-700 font-bold md:w-1/3">Mobil (Nomor Plat)</p>
                        <p class="hidden md:block text-gray-700 font-bold md:w-1/6">:</p>
                        @if ($pemesanan->paket->mobil1 && $pemesanan->paket->mobil1->count() > 1)
                            @foreach ($pemesanan->paket->mobil1 as $mobil)
                                @if ($mobil->pivot->konfirmasi && $mobil->exists && $mobil->id == $pemesanan->paket->id_mobil)
                                    @if ($mobil->pengemudi)
                                        <p class="text-gray-900 md:w-8/12">{{ $mobil->merk }} {{ $mobil->nama_mobil }} ({{ $mobil->no_plat_mobil }})</p>
                                    @endif
                                    {{-- <p class="text-gray-900 md:w-8/12">{{ $mobil->merk }} {{ $mobil->nama_mobil }}</p> --}}
                                @endif
                            @endforeach
                        @endif
                        </div>
                  <div class="mb-4 md:flex items-center">
                    <p class="text-gray-700 font-bold md:w-1/3">Harga Paket</p>
                    <p class="hidden md:block text-gray-700 font-bold md:w-1/6">:</p>
                    <p class="text-gray-900 md:w-8/12">@if($pemesanan->paket->harga)
                        Rp. {{ number_format($pemesanan->paket->harga, 0, ',', '.') }}
                        @else
                        -
                        @endif</p></p>
                  </div>
                  <div class="mb-4 md:flex items-center">
                    <p class="text-gray-700 font-bold md:w-1/3">Nominal DP</p>
                    <p class="hidden md:block text-gray-700 font-bold md:w-1/6">:</p>
                    <p class="text-gray-900 md:w-8/12">Rp. {{ number_format($pemesanan->nominal_dp, 0, ',', '.') }}</p>
                  </div>
                  <div class="mb-4 md:flex items-center">
                    <p class="text-gray-700 font-bold md:w-1/3">Status Pesanan</p>
                    <p class="hidden md:block text-gray-700 font-bold md:w-1/6">:</p>
                        @if ($pemesanan->status_pemesanan == 'diterima' || $pemesanan->status_pemesanan == 'batal')
                        <p class="text-gray-900 md:w-8/12">{{ $pemesanan->status_pemesanan }}</p>
                        @else
                        <p class="text-gray-900 md:w-8/12">Menunggu Konfirmasi</p>
                        @endif</p>
                  </div>
                  <div class="mx-auto mt-16">
                    <p class="text-gray-700 text-2xl font-bold">Total Pembayaran</p>
                    <p class="text-gray-900">
                      @if ($pemesanan->paket->harga)
                        Rp. {{ number_format($pemesanan->paket->harga - $pemesanan->nominal_dp, 0, ',', '.') }}
                      @else
                        -
                      @endif
                    </p>
                  </div>
                  @if($pemesanan->status_pemesanan != 'batal' && $pemesanan->status_pemesanan != 'selesai')
                      <div class="mt-6">
                          <button class="text-white font-semibold bg-gradient-to-tl from-gray-900 to-slate-800 rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center" type="button">
                              <a href="{{ route('batalPesanan', ['id' => $pemesanan->id]) }}">Ajukan Pembatalan Pesanan</a>
                          </button>
                      </div>
                  @endif

                  <!-- Tambahkan kode untuk atribut lainnya di sini -->
                </div>
                
                <div class="mt-10 w-full md:w-1/3 mb-4 md:mb-0 md:order-last">
                  <div class="border border-gray-300 rounded-5 overflow-hidden">
                    <img src="{{ asset($pemesanan->images->count() ? 'storage/'. $pemesanan->images->first()->src : 'assets/images/blog/mobilkosong.png') }}" alt="{{ $pemesanan->user->nama }}" class="w-full h-auto mx-auto my-2">
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
      
      

</div>
@endsection
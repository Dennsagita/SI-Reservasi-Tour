@extends('layouts.app_admin')
@section('action')
@section('title', 'Dashboard')
@section('navbar', 'Dashboard')
@section('data', 'Dashboard')

@section('content')
    <!-- row 1 -->
    <div class="flex flex-wrap -mx-3">
        <!-- card1 -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
        <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="flex-auto p-4">
            <div class="flex flex-row -mx-3">
                <div class="flex-none w-2/3 max-w-full px-3">
                <div>
                    <p class="mb-0 font-sans font-semibold leading-normal text-sm">Total Pengemudi</p>
                    <h5 class="mb-0 font-bold">
                    {{ $pengemudi }}
                    </h5>
                </div>
                </div>
                <div class="px-3 text-right basis-1/3">
                <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-gray-900 to-slate-800">
                    <i class="ni leading-none fa fa-address-card-o text-lg relative top-3.5 text-white"></i>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>

        <!-- card2 -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
        <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="flex-auto p-4">
            <div class="flex flex-row -mx-3">
                <div class="flex-none w-2/3 max-w-full px-3">
                <div>
                    <p class="mb-0 font-sans font-semibold leading-normal text-sm">Total Paket</p>
                    <h5 class="mb-0 font-bold">
                      {{ $paket }}
                    </h5>
                </div>
                </div>
                <div class="px-3 text-right basis-1/3">
                <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-gray-900 to-slate-800">
                    <i class="ni leading-none fa fa-picture-o text-lg relative top-3.5 text-white"></i>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>

        <!-- card3 -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
        <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="flex-auto p-4">
            <div class="flex flex-row -mx-3">
                <div class="flex-none w-2/3 max-w-full px-3">
                <div>
                    <p class="mb-0 font-sans font-semibold leading-normal text-sm">Total Mobil</p>
                    <h5 class="mb-0 font-bold">
                      {{ $mobil }}
                    </h5>
                </div>
                </div>
                <div class="px-3 text-right basis-1/3">
                <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-gray-900 to-slate-800">
                    <i class=" fa fa-car text-lg relative top-2.5 text-white"></i>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>

        <!-- card4 -->
        <div class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/4">
        <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="flex-auto p-4">
            <div class="flex flex-row -mx-3">
                <div class="flex-none w-2/3 max-w-full px-3">
                <div>
                    <p class="mb-0 font-sans font-semibold leading-normal text-sm">Total Pengguna</p>
                    <h5 class="mb-0 font-bold">
                      {{ $pengguna }}
                    </h5>
                </div>
                </div>
                <div class="px-3 text-right basis-1/3">
                <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-gray-900 to-slate-800">
                    <i class="ni leading-none fa fa-user-o text-lg relative top-3.5 text-white"></i>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>


        <!-- card4 -->
        <div class="mt-10 w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/4">
        <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="flex-auto p-4">
            <div class="flex flex-row -mx-3">
                <div class="flex-none w-2/3 max-w-full px-3">
                <div>
                    <p class="mb-0 font-sans font-semibold leading-normal text-sm">Total Pesanan</p>
                    <h5 class="mb-0 font-bold">
                      {{ $pemesanan1 }}
                    </h5>
                </div>
                </div>
                <div class="px-3 text-right basis-1/3">
                <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-gray-900 to-slate-800">
                    <i class="ni leading-none fa fa-user-o text-lg relative top-3.5 text-white"></i>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>

        <!-- card4 -->
        <div class="mt-10 w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/4">
        <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="flex-auto p-4">
            <div class="flex flex-row -mx-3">
                <div class="flex-none w-2/3 max-w-full px-3">
                <div>
                    <p class="mb-0 font-sans font-semibold leading-normal text-sm">Pesanan Hari Ini</p>
                    <h5 class="mb-0 font-bold">
                      {{ $totalPesanan }} 
                    </h5>
                </div>
                </div>
                <div class="px-3 text-right basis-1/3">
                <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-gray-900 to-slate-800">
                    <i class="ni leading-none fa fa-user-o text-lg relative top-3.5 text-white"></i>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    <div class="flex flex-wrap mt-10 -mx-3">
    <div class="flex-none w-full max-w-full px-3">
        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
          <div class="p-6 mt-4 pb-0 mb-2 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
            <h6>Tabel Pemesanan</h6>
          </div>
          <div class="flex-auto px-0 pt-0 pb-2">
            <div class="p-0 overflow-x-auto">
              
              <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">    
                <thead class="align-bottom">
                  <tr>
                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">No</th>
                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">ID Pesanan</th>
                    <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama Pemesan|No Telp</th>
                    <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama Paket</th>
                    <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tanggal Mulai Tour</th>
                    <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tanggal Selesai Tour</th>
                    <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Jam Berangkat</th>
                    <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Harga Paket</th>
                    <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Bukti DP</th>
                    <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Status Pemesanan</th>
                    <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Pengemudi|Mobil</th>
                  </tr>
                </thead>
                @forelse ($pemesanan as $data=>$item)
                <tbody>
                  <tr>
                  <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                      <h6 class="mb-0 leading-normal text-sm text-center">{{ $loop->iteration }}</h6>
                  </td> 
                  <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                      <h6 class="mb-0 leading-normal text-sm text-center">{{ $item->id }}</h6>
                  </td> 
                  <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                      <h6 class="mb-0 leading-normal text-sm">{{ $item->user->nama }}</h6>
                      <p class="mb-0 leading-tight text-xs text-slate-400">{{ $item->user->no_telp }}</p>
                  </td>
                  <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                      <p class="mb-0 font-semibold leading-tight text-xs">
                        @if ($item->paket)
                        {{ $item->paket->nama }} 
                        @else
                        -
                        @endif</p>
                  </td>
                  <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                      <p class="mb-0 font-semibold leading-tight text-xs">{{ \Carbon\Carbon::parse($item->tgl_tour_mulai)->isoFormat('DD MMMM YYYY') }}</p>
                  </td>
                  <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                      <p class="mb-0 font-semibold leading-tight text-xs">{{ \Carbon\Carbon::parse($item->tgl_tour_selesai)->isoFormat('DD MMMM YYYY') }}</p>
                  </td>
                  <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                      <p class="mb-0 font-semibold leading-tight text-xs">{{ \Carbon\Carbon::parse($item->jam_datang)->isoFormat('HH:mm') }}</p>
                  </td>
                  <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                      <p class="mb-0 font-semibold leading-tight text-xs">
                        @if($item->paket)
                        Rp. {{ number_format($item->paket->harga, 0, ',', '.') }}
                        @else
                        -
                        @endif</p>
                  </td>
                  <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                      <div>
                      <img src="{{ asset($item->images->count() ? 'storage/'. $item->images->first()->src : 'assets/images/blog/user-1.png') }}" class="inline-flex items-center justify-center mr-4 text-white transition-all duration-200 ease-soft-in-out text-sm h-9 w-9 rounded-xl" alt="{{ $item->nama }}" />
                      </div>
                  </td>
                  <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <p class="mb-0 font-semibold leading-tight text-xs">{{ $item->status_pemesanan }}</p>
                  </td>
                  <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    {{-- <h6 class="mb-0 leading-normal text-sm">{{ $item->mobil->nama_mobil }}</h6>
                    <p class="mb-0 leading-tight text-xs text-slate-400"></p> --}}
                    @if ($item->paket && $item->paket->mobil && $item->paket->mobil->pengemudi) 
                      <h6 class="mb-0 leading-normal text-sm">
                        {{ $item->paket->mobil->pengemudi->nama }} 
                        @else
                        -
                        @endif</h6>
                      <p class="mb-0 leading-tight text-xs text-slate-400">
                    @if($item->paket && $item->paket->mobil)
                      {{ $item->paket->mobil->merk }} {{ $item->paket->mobil->nama_mobil }}
                      @else
                      -
                      @endif</p>
                      {{-- @foreach ($item->paket->mobil1 as $mobil)
                      <h6 class="mb-0 leading-normal text-sm">
                       - {{ $mobil->pengemudi->nama }}</h6>
                      <p class="mb-0 leading-tight text-xs text-slate-400">
                        {{ $mobil->merk }} {{ $mobil->nama_mobil }}</p> <br>
                      @endforeach --}}
                  </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="flex flex-wrap mt-10 -mx-3">
      <div class="flex-none w-full max-w-full px-3">
          <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="p-6 mt-4 pb-0 mb-2 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
              <h6>Tabel Pemesanan</h6>
            </div>
            <div class="flex-auto px-0 pt-0 pb-2">
              <div class="p-0 overflow-x-auto">
                
                <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">    
                  <thead class="align-bottom">
                    <tr>
                      <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">No</th>
                      <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">ID Pesanan</th>

                    </tr>
                  </thead>
                  @forelse ($pemesanan as $data=>$item)
                  <tbody>
                    <tr>
                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                        <h6 class="mb-0 leading-normal text-sm text-center">{{ $loop->iteration }}</h6>
                    </td> 
                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                        <h6 class="mb-0 leading-normal text-sm text-center">{{ $item->id }}</h6>
                    </td> 
                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                        <h6 class="mb-0 leading-normal text-sm">{{ $item->user->nama }}</h6>
                        <p class="mb-0 leading-tight text-xs text-slate-400">{{ $item->user->no_telp }}</p>
                    </td>
                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                        <p class="mb-0 font-semibold leading-tight text-xs">
                          @if ($item->paket)
                          {{ $item->paket->nama }} 
                          @else
                          -
                          @endif</p>
                    </td>
                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                        <p class="mb-0 font-semibold leading-tight text-xs">{{ \Carbon\Carbon::parse($item->tgl_tour_mulai)->isoFormat('DD MMMM YYYY') }}</p>
                    </td>
                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                        <p class="mb-0 font-semibold leading-tight text-xs">{{ \Carbon\Carbon::parse($item->tgl_tour_selesai)->isoFormat('DD MMMM YYYY') }}</p>
                    </td>
                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                        <p class="mb-0 font-semibold leading-tight text-xs">{{ \Carbon\Carbon::parse($item->jam_datang)->isoFormat('HH:mm') }}</p>
                    </td>
                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                        <p class="mb-0 font-semibold leading-tight text-xs">
                          @if($item->paket)
                          Rp. {{ number_format($item->paket->harga, 0, ',', '.') }}
                          @else
                          -
                          @endif</p>
                    </td>
                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                        <div>
                        <img src="{{ asset($item->images->count() ? 'storage/'. $item->images->first()->src : 'assets/images/blog/user-1.png') }}" class="inline-flex items-center justify-center mr-4 text-white transition-all duration-200 ease-soft-in-out text-sm h-9 w-9 rounded-xl" alt="{{ $item->nama }}" />
                        </div>
                    </td>
                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                      <p class="mb-0 font-semibold leading-tight text-xs">{{ $item->status_pemesanan }}</p>
                    </td>
                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                      {{-- <h6 class="mb-0 leading-normal text-sm">{{ $item->mobil->nama_mobil }}</h6>
                      <p class="mb-0 leading-tight text-xs text-slate-400"></p> --}}
                      @if ($item->paket && $item->paket->mobil && $item->paket->mobil->pengemudi) 
                        <h6 class="mb-0 leading-normal text-sm">
                          {{ $item->paket->mobil->pengemudi->nama }} 
                          @else
                          -
                          @endif</h6>
                        <p class="mb-0 leading-tight text-xs text-slate-400">
                      @if($item->paket && $item->paket->mobil)
                        {{ $item->paket->mobil->merk }} {{ $item->paket->mobil->nama_mobil }}
                        @else
                        -
                        @endif</p>
                        {{-- @foreach ($item->paket->mobil1 as $mobil)
                        <h6 class="mb-0 leading-normal text-sm">
                         - {{ $mobil->pengemudi->nama }}</h6>
                        <p class="mb-0 leading-tight text-xs text-slate-400">
                          {{ $mobil->merk }} {{ $mobil->nama_mobil }}</p> <br>
                        @endforeach --}}
                    </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>


@endsection

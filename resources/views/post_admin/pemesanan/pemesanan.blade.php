@extends('layouts.app_admin')
@section('action')
@section('title', 'Pemesanan')
@section('navbar', 'Pemesanan')
@section('data', 'Pengelolaan Data')
@endsection

@section('content')
<div class="flex flex-wrap -mx-3">
    @if(Session::has('status'))
     <div id="toast-success" class="flex items-center w-full p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
      <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
          <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
          <span class="sr-only">Check icon</span>
      </div>
      <div class="ml-3 text-sm font-normal">{{ Session::get('message') }}</div>
      <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
          <span class="sr-only">Close</span>
          <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
      </button>
      </div>
     @elseif(Session::has('edit'))
     <div id="toast-success-edit" class="flex items-center w-full p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
      <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
          <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
          <span class="sr-only">Check icon</span>
      </div>
      <div class="ml-3 text-sm font-normal">{{ Session::get('textedit') }}</div>
      <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success-edit" aria-label="Close">
          <span class="sr-only">Close</span>
          <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
      </button>
      </div>
      @endif

    @if(Session::has('konfirmasi'))
    <div id="toast-success-konfirmasi" class="flex items-center w-full p-4 mb-4 text-gray-500 bg-white rounded-lg shadow" role="alert">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Check icon</span>
        </div>
        <div class="ml-3 text-sm font-normal">{{ Session::get('konfirmasi') }}</div>
        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success-konfirmasi" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
    </div>
    @endif

    <div class="flex-none w-full max-w-full px-3">
      <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="p-6 mt-4 pb-0 mb-2 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
          <div class="flex items-center justify-between">
            <div class="bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
              <h6>Tabel Pemesanan Belum Terkonfirmasi</h6>
            </div>
            <div class="flex items-center md:ml-auto md:pr-4">
              <form action="{{ route('pemesanan') }}" method="get">
              <div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease-soft">
                <span class="text-sm ease-soft leading-5.6 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">
                  <button type="submit"><i class="fas fa-search"></i></button>
                </span>
                <input name="search" type="text" class="pl-8.75 text-sm focus:shadow-soft-primary-outline ease-soft w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="Cari Data" />
              </div>
            </form>
            </div>
          </div>
        </div>
        <div class="flex-auto px-0 pt-0 pb-2">
          <div class="p-0 overflow-x-auto">
            @php
                $counter1 = 1;
            @endphp
            <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">    
              <thead class="align-bottom">
                <tr>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">No</th>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">No Pesanan</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama Pemesan|No Telp</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama Paket</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tanggal Mulai Tour</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tanggal Selesai Tour</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Jam Berangkat</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Harga Paket</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Bukti DP</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Status Pemesanan</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Pengemudi|Mobil</th>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Aksi</th>
                </tr>
              </thead>
              @forelse ($pemesananList as $data=>$item)
              <tbody>
                <tr>
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <h6 class="mb-0 leading-normal text-sm text-center">{{ $counter1++ }}</h6>
                </td> 
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <h6 class="mb-0 leading-normal text-sm text-center"><h6 class="mb-0 leading-normal text-sm text-center">{{ sprintf('%06d', $item->id) }}</h6></h6>
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
                  @if($item->status_pemesanan === 'baru')
                      <p class="mb-0 font-semibold leading-tight text-xs">Menunggu Konfirmasi</p>
                  @else
                      <p class="mb-0 font-semibold leading-tight text-xs">{{ $item->status_pemesanan }}</p>
                  @endif
                </td>
              
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    @if ($item->paket->mobil1 && $item->paket->mobil1->count() > 0)
                        @foreach ($item->paket->mobil1 as $mobil)
                            @if ($mobil->pivot->konfirmasi && $mobil->exists && $mobil->id == $item->paket->id_mobil)
                                @if ($mobil->pengemudi)
                                    <h6 class="mb-0 leading-normal text-sm">{{ $mobil->pengemudi->nama }}</h6>
                                @endif
                                <p class="mb-0 leading-tight text-xs text-slate-400">
                                    {{ $mobil->merk }} {{ $mobil->nama_mobil }}
                                </p>
                                <br>
                            @endif
                        @endforeach
                    @else
                    <h6 class="mb-0 leading-normal text-sm">Pengemudi Tidak Mempunyai Mobil</h6>
                    @endif
                @if ($id_mobil && count($id_mobil) > 0)
                  @foreach ($id_mobil as $mobil)
                      <a href="{{ route('pilihMobil', ['id_mobil' => $mobil->id]) }}">{{ $mobil->nama_mobil }}</a>
                  @endforeach
                @endif
                </td>
                <td class="p-2 leading-normal text-center align-middle bg-transparent border-b text-sm whitespace-nowrap shadow-transparent">
                           
                            <button class=" text-white bg-slate-700 hover:bg-slate-900 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button"
                            onclick="window.location.href='pemesanan-edit/{{ $item->id }}'">
                            <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button class=" text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-bg-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button"
                            onclick="window.location.href='{{ route('detailPemesanan', ['id' => $item->id]) }}'">
                            <i class="fa-solid fa-check"></i>
                            </button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="flex-none w-full max-w-full px-3">
      <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="p-6 mt-4 pb-0 mb-2 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
          <div class="flex items-center justify-between">
            <div class="bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
              <h6>Tabel Pemesanan Terkonfirmasi</h6>
            </div>
            <div class="flex items-center md:ml-auto md:pr-4">
              <div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease-soft">
                <form action="{{ route('pemesanan') }}" method="get">
                  <div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease-soft">
                    <span class="text-sm ease-soft leading-5.6 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">
                      <button type="submit"><i class="fas fa-search"></i></button>
                    </span>
                    <input name="search2" id="search" class="pl-8.75 text-sm focus:shadow-soft-primary-outline ease-soft w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="Cari Data" />
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="flex-auto px-0 pt-0 pb-2">
          <div class="p-0 overflow-x-auto">
            @php
                $counter2 = 1;
            @endphp
            <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">    
              <thead class="align-bottom">
                <tr>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">No</th>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">No Pesanan</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama Pemesan|No Telp</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama Paket</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tanggal Mulai Tour</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tanggal Selesai Tour</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Jam Berangkat</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Harga Paket</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Bukti DP</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Status Pemesanan</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Pengemudi|Mobil</th>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Aksi</th>
                </tr>
              </thead>
              @forelse ($pemesanan2 as $data2=>$item2)
              <tbody>
                <tr>
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <h6 class="mb-0 leading-normal text-sm text-center">{{ $counter2++ }}</h6>
                </td> 
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <h6 class="mb-0 leading-normal text-sm text-center"><h6 class="mb-0 leading-normal text-sm text-center">{{ sprintf('%06d', $item2->id) }}</h6></h6>
                </td> 
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <h6 class="mb-0 leading-normal text-sm">{{ $item2->user->nama }}</h6>
                    <p class="mb-0 leading-tight text-xs text-slate-400">{{ $item2->user->no_telp }}</p>
                </td>
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <p class="mb-0 font-semibold leading-tight text-xs">
                      @if ($item2->paket)
                      {{ $item2->paket->nama }} 
                      @else
                      -
                      @endif</p>
                </td>
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <p class="mb-0 font-semibold leading-tight text-xs">{{ \Carbon\Carbon::parse($item2->tgl_tour_mulai)->isoFormat('DD MMMM YYYY') }}</p>
                </td>
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <p class="mb-0 font-semibold leading-tight text-xs">{{ \Carbon\Carbon::parse($item2->tgl_tour_selesai)->isoFormat('DD MMMM YYYY') }}</p>
                </td>
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <p class="mb-0 font-semibold leading-tight text-xs">{{ \Carbon\Carbon::parse($item2->jam_datang)->isoFormat('HH:mm') }}</p>
                </td>
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <p class="mb-0 font-semibold leading-tight text-xs">
                      @if($item2->paket)
                      Rp. {{ number_format($item2->paket->harga, 0, ',', '.') }}
                      @else
                      -
                      @endif</p>
                </td>
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <div>
                    <img src="{{ asset($item2->images->count() ? 'storage/'. $item2->images->first()->src : 'assets/images/blog/user-1.png') }}" class="inline-flex items-center justify-center mr-4 text-white transition-all duration-200 ease-soft-in-out text-sm h-9 w-9 rounded-xl" alt="{{ $item2->nama }}" />
                    </div>
                </td>
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                  @if($item2->status_pemesanan === 'baru')
                      <p class="mb-0 font-semibold leading-tight text-xs">Menunggu Konfirmasi</p>
                  @else
                      <p class="mb-0 font-semibold leading-tight text-xs">{{ $item2->status_pemesanan }}</p>
                  @endif
                </td>
              
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                  {{-- <h6 class="mb-0 leading-normal text-sm">{{ $item2->mobil->nama_mobil }}</h6>
                  <p class="mb-0 leading-tight text-xs text-slate-400"></p> --}}
                  {{-- @if ($item2->paket && $item2->paket->mobil && $item2->paket->mobil->pengemudi) 
                    <h6 class="mb-0 leading-normal text-sm">
                      {{ $item2->paket->mobil->pengemudi->nama }} 
                      @else
                      -
                      @endif</h6>
                    <p class="mb-0 leading-tight text-xs text-slate-400">
                  @if($item2->paket && $item2->paket->mobil)
                    {{ $item2->paket->mobil->merk }} {{ $item2->paket->mobil->nama_mobil }}
                    @else
                    -
                    @endif</p> --}}
                    @if ($item2->paket->mobil1 && $item2->paket->mobil1->count() > 0)
                        @foreach ($item2->paket->mobil1 as $mobil)
                            @if ($mobil->pivot->konfirmasi && $mobil->exists && $mobil->id == $item2->paket->id_mobil)
                                @if ($mobil->pengemudi)
                                    <h6 class="mb-0 leading-normal text-sm">{{ $mobil->pengemudi->nama }}</h6>
                                @endif
                                <p class="mb-0 leading-tight text-xs text-slate-400">
                                    {{ $mobil->merk }} {{ $mobil->nama_mobil }}
                                </p>
                                <br>
                            @endif
                        @endforeach
                    @else
                    <h6 class="mb-0 leading-normal text-sm">Pengemudi Tidak Mempunyai Mobil</h6>
                    @endif
                @if ($id_mobil && count($id_mobil) > 1)
                  @foreach ($id_mobil as $mobil)
                      <a href="{{ route('pilihMobil', ['id_mobil' => $mobil->id]) }}">{{ $mobil->nama_mobil }}</a>
                  @endforeach
                @endif
                </td>
                <td class="p-2 leading-normal text-center align-middle bg-transparent border-b text-sm whitespace-nowrap shadow-transparent">
                  {{-- <button class=" text-white bg-slate-700 hover:bg-slate-900 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button"
                    onclick="window.location.href='pemesanan-edit/{{ $item2->id }}'">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </button>           --}}
                  <button class=" text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-bg-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button"
                    onclick="window.location.href='{{ route('detailPemesanan', ['id' => $item2->id]) }}'">
                    <i class="fa-solid fa-circle-info"></i>
                  </button>
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
  <div>
    {{ $pemesananList->links() }}
  </div>
@endsection
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
      <div class="ml-3 text-sm font-normal">{{ Session::get('status') }}</div>
      <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
          <span class="sr-only">Close</span>
          <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
      </button>
      </div>
    @endif
    <div class="flex-none w-full max-w-full px-3">
      <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="p-6 mt-4 pb-0 mb-2 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
          <h6>Tabel Pengajuan Batal Pemesanan</h6>
        </div>
        <div class="flex-auto px-0 pt-0 pb-2">
          <div class="p-0 overflow-x-auto">
            <div class="p-0 px-4 mb-4">
                <button class="text-white font-semibold bg-gradient-to-tl from-gray-900 to-slate-800 rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center" type="button">
                  <a href="#">Cetak Data</a></button>
                  <button class="text-white font-semibold bg-gradient-to-tl from-gray-900 to-slate-800 rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center" type="button">
                    <a href="#">Simpan PDF</a></button>
            </div>
            <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">    
              <thead class="align-bottom">
                <tr>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">No</th>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">No Pesanan</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama Pemesan|No Telp</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama Paket</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tanggal Mulai Tour</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tanggal Selesai Tour</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Harga Paket</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Pengemudi|Mobil</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Status Pemesanan</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Keterangan</th>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Aksi</th>
                </tr>
              </thead>
              @forelse ($pemesanan as $data=>$item)
              <tbody>
                <tr>
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <h6 class="mb-0 leading-normal text-sm text-center">{{ $loop->iteration }}</h6>
                </td> 
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <h6 class="mb-0 leading-normal text-sm text-center"><h6 class="mb-0 leading-normal text-sm text-center">{{ sprintf('%06d', $item->id) }}</h6></h6>
                </td> 
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <h6 class="mb-0 leading-normal text-sm">{{ $item->pemesanan->user->nama }}</h6>
                    <p class="mb-0 leading-tight text-xs text-slate-400">{{ $item->pemesanan->user->no_telp }}</p>
                </td>
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <p class="mb-0 font-semibold leading-tight text-xs">
                      @if ($item->pemesanan->paket)
                      {{ $item->pemesanan->paket->nama }} 
                      @else
                      -
                      @endif</p>
                </td>
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <p class="mb-0 font-semibold leading-tight text-xs">{{ \Carbon\Carbon::parse($item->pemesanan->tgl_tour_mulai)->isoFormat('DD MMMM YYYY') }}</p>
                </td>
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <p class="mb-0 font-semibold leading-tight text-xs">{{ \Carbon\Carbon::parse($item->pemesanan->tgl_tour_selesai)->isoFormat('DD MMMM YYYY') }}</p>
                </td>
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <p class="mb-0 font-semibold leading-tight text-xs">
                      @if($item->pemesanan->paket)
                      Rp. {{ number_format($item->pemesanan->paket->harga, 0, ',', '.') }}
                      @else
                      -
                      @endif</p>
                </td>
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                  {{-- <h6 class="mb-0 leading-normal text-sm">{{ $item->mobil->nama_mobil }}</h6>
                  <p class="mb-0 leading-tight text-xs text-slate-400"></p> --}}
                  {{-- @if ($item->paket && $item->paket->mobil && $item->paket->mobil->pengemudi) 
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
                    @endif</p> --}}
                    {{-- @foreach ($item->paket->mobil1->random(1) as $mobil)
                    @if ($mobil->pivot->konfirmasi)
                        @if ($mobil->pengemudi)
                            <h6 class="mb-0 leading-normal text-sm">{{ $mobil->pengemudi->nama }}</h6>
                        @endif
                        <p class="mb-0 leading-tight text-xs text-slate-400">
                            {{ $mobil->merk }} {{ $mobil->nama_mobil }}
                        </p>
                        <br>
                    @endif
                  @endforeach --}}
                </td>
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                  @if($item->pemesanan->status_pemesanan === 'baru')
                      <p class="mb-0 font-semibold leading-tight text-xs">Menunggu Konfirmasi</p>
                  @else
                      <p class="mb-0 font-semibold leading-tight text-xs">{{ $item->pemesanan->status_pemesanan }}</p>
                  @endif
                </td>
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <p class="mb-0 font-semibold leading-tight text-xs">{{ $item->keterangan }}</p>
                </td>
                <td class="p-2 leading-normal text-center align-middle bg-transparent border-b text-sm whitespace-nowrap shadow-transparent">
                            <button class=" text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-bg-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button"
                            onclick="window.location.href='{{ route('detailPemesananBatal', ['id' => $item->id]) }}'">
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
@endsection
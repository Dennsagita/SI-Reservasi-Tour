@extends('layouts.app_admin')
@section('action')
@section('title', 'Dashboard Pengemudi')
@section('navbar', 'Pengemudi')
@section('data', 'Dashboard')
@endsection

@section('content')
<div class="w-full px-6 py-6 mx-auto">
<div class="flex flex-wrap -mx-3">
    {{-- <div class="flex-none w-full max-w-full px-3">
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
    </div> --}}

    @if(Session::has('selesai'))
    <div id="toast-success-selesai" class="flex items-center w-full p-4 mb-4 text-gray-500 bg-white rounded-lg shadow" role="alert">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Check icon</span>
        </div>
        <div class="ml-3 text-sm font-normal">{{ Session::get('selesai') }}</div>
        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success-selesai" aria-label="Close">
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
        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
    </div>
    @endif
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
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">No Pesanan</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama Pemesan|No Telp</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama Paket</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tanggal Mulai Tour</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tanggal Selesai Tour</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Jam Berangkat</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Harga Paket</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Status Pemesanan</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Pengemudi|Mobil</th>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Aksi</th>
                </tr>
              </thead>
              @forelse ($pemesanan as $data => $item)
                @php
                    $authenticatedPengemudiId = Auth::guard('pengemudi')->user()->id;
                @endphp
                @foreach ($item->paket->mobil1 as $mobil)
                    @if ($mobil->pivot->konfirmasi && $mobil->exists && $mobil->id == $item->paket->id_mobil && $mobil->pengemudi && $mobil->pengemudi->id == $authenticatedPengemudiId)
                        @if ($item->status_pemesanan === 'diterima')
                        <tr>
                            <!-- Tampilkan data pemesanan seperti biasa -->
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <h6 class="mb-0 leading-normal text-sm text-center"><h6 class="mb-0 leading-normal text-sm text-center">{{ sprintf('%06d', $item->id) }}</h6></h6>
                            </td> 
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <h6 class="mb-0 leading-normal text-sm">{{ $item->user->nama }}</h6>
                                <p class="mb-0 leading-tight text-xs text-slate-400">{{ $item->user->no_telp }}</p>
                            </td>
                            <!-- Tampilkan data lainnya -->
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <!-- Tampilkan data paket -->
                                <p class="mb-0 font-semibold leading-tight text-xs">
                                    @if ($item->paket)
                                        {{ $item->paket->nama }} 
                                    @else
                                        -
                                    @endif
                                </p>
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
                            </td>
                            <td class="p-2 leading-normal text-center align-middle bg-transparent border-b text-sm whitespace-nowrap shadow-transparent">
                                {{-- <a href="mobil-edit/{{ $item->id }}" class="px-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-center"><i class="fa-solid fa-pen-to-square"></i></a> --}}
                                <button class=" text-white bg-slate-700 hover:bg-slate-900 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button"
                                onclick="window.location.href='{{ route('detailPesananPengemudi', $item->id ) }}'">
                                <i class="fa-solid fa-circle-info"></i> Detail Pesanan
                                </button>
                                <button data-modal-target="batal-pesanan-pengemudi" data-modal-toggle="batal-pesanan-pengemudi" class="text-white bg-red-700 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
                                <i class="fa-solid fa-circle-info"></i> Batalkan
                                </button>
                                <div id="batal-pesanan-pengemudi" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative w-full max-w-md max-h-full">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="batal-pesanan-pengemudi">
                                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <div class="p-6 text-center">
                                                <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Yakin Ingin Membatalkan Pesanan Ini?</h3>
                                                <form action="{{ route('processPengemudiBatalPesanan', ['id' => $item->id]) }}" method="POST">
                                                    @csrf
                                                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 hidden">
                                                            <div class="flex items-center">
                                                                <input type="text" name="status_pemesanan" id="status_pemesanan" value="pergantian-pengemudi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 ">
                                                            </div>  
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-red-700 rounded-lg focus:ring-4 focus:ring-primary-200">
                                                        Batalkan Pesanan
                                                    </button>
                                                <button data-modal-hide="batal-pesanan-pengemudi" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Kembali</button>
                                                </form> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <button data-modal-target="batal-pesanan-pengemudi" data-modal-toggle="batal-pesanan-pengemudi" class=" text-white bg-pink-800 hover:bg-pink-900 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                    <i class="fa-solid fa-trash"></i>
                                    </button>

                                    <div id="batal-pesanan-pengemudi" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative w-full max-w-md max-h-full">
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="batal-pesanan-pengemudi">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <div class="p-6 text-center">
                                                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Yakin Ingin Menghapus Data Mobil Ini?</h3>
                                                    <form action="paket-delete/{{ $item->id }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button data-modal-hide="batal-pesanan-pengemudi" type="submit" class="text-white bg-pink-800 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                        Hapus
                                                    </button>
                                                    <button data-modal-hide="batal-pesanan-pengemudi" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Batal</button>
                                                    </form> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>  --}}
                            </td>
                        </tr>
                        @endif
                        @break <!-- Keluar dari loop jika data sesuai -->
                    @endif
                @endforeach

                @empty <!-- Eksekusi jika tidak ada data pemesanan yang sesuai -->
                    <!-- Tampilkan pesan jika tidak ada data pemesanan -->
                @endforelse

              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- Tampilkan pagination link -->
        <div class="mt-4">
            <nav role="navigation" aria-label="Pagination Navigation" class="">
                {{-- Tombol Previous --}}
                @if ($pemesanan->onFirstPage())
                    <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-300 bg-white border border-gray-300 cursor-default rounded-md leading-5">
                        {!! __('pagination.previous') !!}
                    </span>
                @else
                    <a href="{{ $pemesanan->previousPageUrl() }}" rel="prev" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150" aria-label="{{ __('pagination.previous') }}">
                        {!! __('pagination.previous') !!}
                    </a>
                @endif

                {{-- Tombol Next --}}
                @if ($pemesanan->hasMorePages())
                    <a href="{{ $pemesanan->nextPageUrl() }}" rel="next" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150" aria-label="{{ __('pagination.next') }}">
                        {!! __('pagination.next') !!}
                    </a>
                @else
                    <span class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-300 bg-white border border-gray-300 cursor-default rounded-md leading-5">
                        {!! __('pagination.next') !!}
                    </span>
                @endif
            </nav>
        </div>
    </div>

    <div class="flex-none w-full max-w-full mt-10 px-3">
        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
          <div class="p-6 mt-4 pb-0 mb-2 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
            <h6>Pilih Paket Tour</h6>
          </div>
          <div class="flex-auto px-0 pt-0 pb-2">
            <div class="p-0 mx-5 mb-5 md:ml-5 overflow-x-auto">
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="flex items-center">
                        <a href="{{ route('paketPengemudi') }}"><button type="submit" class="w-full rounded-md bg-yellow-500 px-8 py-2.5 font-semibold text-white shadow-md shadow-yellow-500/20 hover:bg-yellow-600 duration-200 sm:w-auto">
                            Pilih Paket
                        </button></a>
                    </div>
                </div>
                <p class="text-gray-900 text-xs">Catatan: Jangan mengubah status ketika anda sedang tidak melakukan tour !!!</p>
            </div>
          </div>
        </div>
      </div>
     {{-- <div class="flex-none w-full max-w-full px-3">
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
    </div> --}}

</div>
</div>
@endsection
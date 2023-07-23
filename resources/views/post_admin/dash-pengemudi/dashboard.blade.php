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
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">No Pesanan</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama Pemesan|No Telp</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama Paket</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tanggal Mulai Tour</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tanggal Selesai Tour</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Jam Berangkat</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Harga Paket</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Status Pemesanan</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Pengemudi|Mobil</th>
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
                                <h6 class="mb-0 leading-normal text-sm text-center">{{ $data + 1}}</h6>
                            </td> 
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
    </div>

    <!-- Tampilkan pagination link -->
    <div class="mt-4">
        {{ $pemesanan->links() }}
    </div>

    <div class="flex-none w-full max-w-full px-3">
        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
          <div class="p-6 mt-4 pb-0 mb-2 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
            <h6>Ubah Status Tour</h6>
          </div>
          <div class="flex-auto px-0 pt-0 pb-2">
            <div class="p-0 mx-5 mb-5 md:ml-5 overflow-x-auto">
                @if($pengemudi->status === 'tidak-tour')
                <form action="{{ route('processStatus', ['id' => $pengemudi->id]) }}" method="POST">
                    @csrf
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="flex items-center">
                            <input type="hidden" name="status" value="tour">
                            <button type="submit" class="w-full rounded-md bg-blue-500 px-8 py-2.5 font-semibold text-white shadow-md shadow-blue-500/20 hover:bg-blue-600 duration-200 sm:w-auto">
                            Tour
                            </button>
                            
                        </div>
                    </div>
                    <p class="text-gray-900 mt-3">Anda sedang tidak melakukan tour, ubah status anda saat memulai tour </p>
                </form>
                @else
                <form action="{{ route('processStatus', ['id' => $pengemudi->id]) }}" method="POST">
                    @csrf
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="flex items-center">
                            <input type="hidden" name="status" value="tidak-tour">
                            <button type="submit" class="w-full rounded-md bg-yellow-500 px-8 py-2.5 font-semibold text-white shadow-md shadow-yellow-500/20 hover:bg-yellow-600 duration-200 sm:w-auto">
                                Selesai Tour
                            </button>
                            </div>
                        </div>
                        <p class="text-gray-900 mt-3">Anda sedang melakukan tour, ubah status anda setelah menyelesaiakn tour </p>
                </form>
                @endif
                <p class="text-gray-900 text-xs">Catatan: Jangan mengubah status ketika anda sedang tidak melakukan tour !!!</p>
            </div>
          </div>
        </div>
      </div>
</div>
</div>
@endsection
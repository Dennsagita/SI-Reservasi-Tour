@extends('layouts.app_admin')
@section('action')
@section('title', 'Batal Pesanan Pengemudi')
@section('navbar', 'Batal Pemesanan')
@section('data', 'Pengemudi')
@section('content')
<div class="w-full px-6 bg-gray-DEFAULT-50 mx-auto"><div class="w-full px-6 py-6 mx-auto">
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
          <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="p-6 mt-6 pb-0 mb-6 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
            <section class="bg-white">
                <h2 class="mb-4 text-xl font-bold text-gray-900">Alasan Membatalkan Pesanan</h2>
                <form action="{{ route('processPengemudiBatalPesanan', ['id' => $pemesanan->id]) }}" method="POST">
                    @csrf
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="sm:col-span-2">
                            <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900">Keterangan Pembatalan Pesanan</label>
                            <textarea name="keterangan" id="keterangan" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500" required placeholder="Keterangan"></textarea>
                        </div>
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 hidden">
                            <div class="flex items-center">
                                <input type="text" name="status_pemesanan" id="status_pemesanan" value="pergantian-pengemudi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 ">
                            </div>  
                        </div>
                    </div>
                    <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-slate-700 rounded-lg focus:ring-4 focus:ring-primary-200">
                        Batalkan Pesanan
                    </button>
                </form>
            </section>
        </div>
      </div>
    </div>
</div>
@endsection
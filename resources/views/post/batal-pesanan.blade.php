@extends('layouts.app')
@section('action')
@section('title', 'Batal Pesanan')
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
    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
              <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="p-6 mt-6 pb-0 mb-6 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <section class="bg-white">
                    <h2 class="mb-4 text-xl font-bold text-gray-900">Ajukan Pembatalan Pesanan</h2>
                    <form action="{{ route('processBatalPesanan', ['id' => $pemesanan->id]) }}" method="POST">
                        @csrf
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            <div class="sm:col-span-2">
                                <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900">Keterangan Pembatalan Pesanan</label>
                                <textarea name="keterangan" id="keterangan" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500" required placeholder="Keterangan"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-slate-700 rounded-lg focus:ring-4 focus:ring-primary-200">
                            Ajukan Pembatalan Pesanan
                        </button>
                    </form>
                </section>
            </div>
          </div>
        </div>
    </div>
</div>

@endsection
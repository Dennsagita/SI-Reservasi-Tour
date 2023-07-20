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
              <!-- Total Pembayaran -->
              <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-10 mb-10">
                @foreach($pesanan as $item)
                <div class="flex items-center rounded-lg bg-white p-4 shadow-md shadow-blue-500/10">
                    <div class="mr-6 flex h-[60px] w-[60px] sm:h-[70px] sm:w-[70px] items-center justify-center overflow-hidden rounded bg-opacity-5">
                        <img src="{{ asset('assets/LogoTittle.png') }}" class="text-3xl">
                    </div>
                    <div class="w-full">
                        <h4 class="mb-1 text-xl font-bold text-slate-700">Nomor Pesanan: {{ sprintf('%06d', $item->id) }}</h4>
                        <p id="total_pembayaran" class="text-base text-slate-400">
                            @if($item->paket && $item->paket->mobil1)
                            {{ $item->paket->nama }}
                            @else
                            -
                            @endif
                        </p>
                        <div class="flex justify mt-2">
                            <a href="{{ route('detailUserPesanan', ['id' => $item->id]) }}" class="text-blue-800 hover:text-blue-600">Detail Pesanan</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
</div>
@endsection
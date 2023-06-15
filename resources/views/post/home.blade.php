@extends('layouts.app')
@section('action')
@endsection

@section('content')
<div>
    <img src={{ asset('assets/Decore.png') }} class="absolute right-0 top-0" alt="">
</div>
<div class="">
<section class="py-12 my-0.5 px-24 max-w-screen-xl mx-auto">
    <div class="flex items-center justify-between">
        <div class="pt-20 flex items-center">
            <div class="w-[450px]">
                <div class="py-12">
                    <div class="grid gap-4 py-12">
                        <div class="grid gap-4">
                            <span class="text-redText font-bold text-2xl">Destinasi Terbaik di Bali</span>
                            <span class="font-bold text-5xl text-purpleText ">
                                Temukan Keajaiban Bali
                                Yang Tak Terlupakan
                            </span> 
                        </div>
                        <div>
                            <span class="text-lightPurpleText">
                                Jelajahi pengalaman yang luar biasa untuk mengeksplorasi keindahan pulau Bali . Tour ini akan membawa Anda ke destinasi wisata populer di Bali
                                
                            </span>
                        </div>
                        <div class="flex items-center">
                            <a href="/paket" class="px-4 py-2.5 rounded-md bg-darkblue text-textWhite">Pilih Paket Tujuan Anda</a>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="absolute top-5 right-2 py-5 my-0.5 px-16 max-w-screen-xl mx-auto">
                    <img src={{ asset('assets/Logo.png') }} class="my-10 animate-goyang" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

</div>
<div class="bg-grey">
<div class="py-7 my-0.5 px-24 max-w-screen-xl mx-auto">
<section id="feature" class="top-10">
    <div class="w-full grid grid-cols-10 gap-4 gap-y-24 space-x-5">
        <div class="col-span-5">
            <img src={{ asset('assets/Foto1.png') }} class="left-1" alt="">
        </div>
        <div class="col-span-7 my-auto col-start-7">
            <h2 class="text-5xl font-semibold text-black">
                    Bali Temple Tour
            </h2>
            <p class="text-xl my-5 ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit molestias natus consequuntur ratione 
            provident ipsam qui fuga, culpa, nulla veritatis corporis possimus est iure similique! Ullam cum ducimus laborum tenetur?</p>
            <a href="#" class="text-lg text-blue">Learn More</a>
        </div>
    </div>
</section>
<section id="feature-card" class="my-12 grid grid-cols-3">
    <div class="flex flex-col justfy-center items-center">
        <img src={{ asset('assets/Icon1.png') }} alt="">
        <h3 class="text-2xl font-semibold mb-2">Benchmark</h3>
        <p class="text-darkblue text-center">See how you stack up against comparable companies in similar stages.</p>
    </div>
    <div class="flex flex-col justfy-center items-center">
        <img src={{ asset('assets/Icon2.png') }} alt="">
        <h3 class="text-2xl font-semibold mb-2">Benchmark</h3>
        <p class="text-darkblue text-center">See how you stack up against comparable companies in similar stages.</p>
    </div>
    <div class="flex flex-col justfy-center items-center">
        <img src={{ asset('assets/Icon3.png') }} alt="">
        <h3 class="text-2xl font-semibold mb-2">Benchmark</h3>
        <p class="text-darkblue text-center">See how you stack up against comparable companies in similar stages.</p>
    </div>
</section>
<section id="plan" class="mb-12 mt-32 grid grid-cols-12 gap-4">
    <div class="div col-span-6">
        <h2 class="text-6xl text-black font-semibold leading-none">Get the right future</h2>
    </div>
    <div class="div col-span-4 col-start-9">
        <div class="bg-white-light rounded-lg p-2 flex-nowrap flex">
            <button class="py-6 px-7 bg-darkblue text-white rounded-l-lg w-6/12">Yearly</button>
            <button class="py-6 px-7 w-6/12">Monthly</button>
        </div>
</section>
</div>
</div>
<div class="py-7 my-0.5 px-24 max-w-screen-xl mx-auto">
<section id="pricing" class="mb-12 mt-32 grid grid-cols-3 gap-4">
    <div class="my-0">
        <div class="bg-white-lighter rounded-xl text-ori-grey px-6 py-8 items-center flex flex-col">
            <p>Starter</p>
            <h2 class="text-6xl font-semibold text-black mt-6 mb-6">Free</h2>
            <ul class="text-center">
                <li class="my-2">1 Website</li>
                <li class="my-2">5 GB Hosting</li>
                <li class="my-2">Limited Support</li>
            </ul>
            <button class="mt-9 bg-white flex justify-center rounded-lg items-center w-full py-6">Get Started</button>
        </div>
    </div>
    <div class="-my-4 items-stretch flex">
        <div class="bg-darkblue rounded-xl text-white px-6 py-12 items-center flex flex-col w-full">
            <p>Starter</p>
            <h2 class="text-6xl font-semibold text-white mt-6 mb-6">Free</h2>
            <ul class="text-center">
                <li class="my-2">1 Website</li>
                <li class="my-2">5 GB Hosting</li>
                <li class="my-2">Limited Support</li>
            </ul>
            <button class="mt-auto bg-white flex justify-center rounded-lg items-center w-full py-5 text-ori-grey">Get Started</button>
        </div>
    </div>
    <div class="my-0">
        <div class="bg-white-lighter rounded-xl text-ori-grey px-6 py-8 items-center flex flex-col">
            <p>Starter</p>
            <h2 class="text-6xl font-semibold text-black mt-6 mb-6">Free</h2>
            <ul class="text-center">
                <li class="my-2">1 Website</li>
                <li class="my-2">5 GB Hosting</li>
                <li class="my-2">Limited Support</li>
            </ul>
            <button class="mt-9 bg-white flex justify-center rounded-lg items-center w-full py-6">Get Started</button>
        </div>
    </div>
</section>
</div>
@include('template_lp.cta')
@stop

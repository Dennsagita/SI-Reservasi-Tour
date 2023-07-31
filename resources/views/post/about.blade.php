@extends('layouts.app')
@section('action')
@section('title', 'Tentang Kami')

@section('content')

<!-- ====== about ====== -->

<section class="py-16 mt-16">
    <div class="mx-auto max-w-7xl px-8 md:px-6">
        <div class="md:flex md:justify-between md:gap-6">
            <div class="md:w-6/12">
                 <!-- heading text -->
                <div class="mb-5 sm:mb-10">
                    <span class="font-medium text-blue-500">Tentang Kami</span>
                    <h1 class="text-2xl font-bold text-slate-700 sm:text-3xl">Bali Temple Tour</h1>
                </div>
                <p class="text-slate-500 mb-6">Selamat datang di Bali Temple Tour! Kami adalah penyedia layanan tur yang berbasis di pulau Bali, Indonesia. Dengan kecintaan kami terhadap keindahan alam dan kekayaan budaya Bali, kami ingin membagikan pengalaman tak terlupakan kepada para wisatawan dari seluruh dunia.</p>
                <ul>
                    <li class="mb-6 flex items-center">
                        <div class="flex h-[35px] w-[35px] min-w-[35px] items-center justify-center rounded-full bg-blue-500 text-white">
                            <ion-icon name="person-circle-outline"></ion-icon>
                        </div>
                        <p class="ml-4 max-w-md font-medium text-slate-600">Kami berkomitmen untuk memberikan pelayanan terbaik, pengalaman yang aman, dan kebahagiaan sejati kepada setiap tamu yang bergabung dengan tur kami.</p>
                    </li>
                    <li class="mb-6 flex items-center">
                        <div class="flex h-[35px] w-[35px] min-w-[35px] items-center justify-center rounded-full bg-blue-500 text-white">
                            <ion-icon name="gift-outline"></ion-icon>
                        </div>
                        <p class="ml-4 max-w-md font-medium text-slate-600">Bali Temple Tour menawarkan berbagai jenis tur yang mengeksplor keindahan alam, pura-pura, pantai-pantai eksotis, serta keunikan budaya Bali.</p>
                    </li>
                    <li class="mb-6 flex items-center">
                        <div class="flex h-[35px] w-[35px] min-w-[35px] items-center justify-center rounded-full bg-blue-500 text-white">
                            <ion-icon name="mail-unread-outline"></ion-icon>
                        </div>
                        <p class="ml-4 max-w-md font-medium text-slate-600">Kami mengundang anda para pengemudi untuk bergabung dengan kami dalam petualangan tak terlupakan di pulau dewata Bali. </p>
                    </li>
                </ul>
                <button data-modal-target="syaratKetentuanModal" data-modal-toggle="syaratKetentuanModal" class="w-full rounded-md bg-blue-500 px-8 py-2.5 font-semibold text-white shadow-md shadow-blue-500/20 hover:bg-blue-600 duration-200 md:w-max">Bergabung mengemudi dengan kami</button>

  
  
            </div>

            <!-- about img -->
            <div class="mt-8 flex justify-center md:mt-0 md:w-5/12">
                <img src="{{ ('assets/Logo.png') }}" alt="about img" class="max-h-[500px] md:max-h-max">
            </div>

        </div>
    </div>
</section>

<!-- ====== END about ====== -->


<section class="relative overflow-hidden py-16">
    <img src="{{ ('assetsimages/effect.png') }}" alt="effect" class="absolute bottom-[-400px] -z-10 w-full opacity-[0.2]">
    <div class="mx-auto max-w-7xl px-8 md:px-6">
        <div class="-mx-4 flex flex-wrap lg:justify-between">

            <!-- left info-->
            <div class="w-full px-4 md:w-1/2 xl:w-6/12">
                <div class="mb-12 max-w-[570px] lg:mb-0">
                    <span class="font-medium text-blue-500">Kontak Kami</span>
                    <h1 class="mb-3 text-2xl font-bold text-slate-700 sm:text-3xl">Hubungi Kami di Bali Temple Tour</h1>
                    <p class="text-slate-500 mb-8">Apakah Anda tertarik untuk menemukan lebih banyak tentang petualangan tak terlupakan di Bali? Jangan ragu untuk menghubungi tim kami di Bali Temple Tour. Kami siap membantu Anda merencanakan perjalanan yang menakjubkan dan penuh keajaiban di pulau dewata Bali.</p>
                    
                    
                    <!-- address -->
                    
                    <div class="mb-8 flex w-full max-w-[420px] items-center rounded-lg bg-white p-4 shadow-md shadow-blue-500/10">
                        <div class="mr-6 flex h-[60px] w-full max-w-[60px] items-center justify-center overflow-hidden rounded bg-blue-500 bg-opacity-5 text-blue-500 sm:h-[70px] sm:max-w-[70px]">
                            <ion-icon name="mail" class="text-3xl"></ion-icon>
                        </div>
                        <div class="w-full">
                            <h4 class="mb-1 text-xl font-bold text-slate-700">Email</h4>
                            <p class="text-base text-slate-400
                            ">balitempletour1@gmail.com</p>
                        </div>
                    </div>
                  
                    <!-- phone -->
                    <a href="">
                    <div class="mb-8 flex w-full max-w-[420px] items-center rounded-lg bg-white p-4 shadow-md shadow-blue-500/10">
                        <div class="mr-6 flex h-[60px] w-full max-w-[60px] items-center justify-center overflow-hidden rounded bg-blue-500 bg-opacity-5 text-blue-500 sm:h-[70px] sm:max-w-[70px]">
                            <ion-icon name="logo-instagram" class="text-3xl"></ion-icon>
                        </div>
                        <div class="w-full">
                            <h4 class="mb-1 text-xl font-bold text-slate-700">Instagram</h4>
                            <p class="text-base text-slate-400
                            ">@balitempletour</p>
                        </div>
                    </div>
                    </a>
                    <!-- mail -->
                    <a href="https://wa.me/6282340170686">
                    <div class="mb-8 flex w-full max-w-[420px] items-center rounded-lg bg-white p-4 shadow-md shadow-blue-500/10">
                     <div class="mr-6 flex h-[60px] w-full max-w-[60px] items-center justify-center overflow-hidden rounded bg-blue-500 bg-opacity-5 text-blue-500 sm:h-[70px] sm:max-w-[70px]">
                            <ion-icon name="logo-whatsapp" class="text-3xl"></ion-icon>
                        </div>
                        <div class="w-full">
                            <h4 class="mb-1 text-xl font-bold text-slate-700">Whatsapp</h4>
                            <p class="text-base text-slate-400
                            ">+6282340170686</p>
                        </div>
                    </div>
                    </a>

                </div>
            </div>
                <div class="hidden flex flex-col justify-center items-center md:flex md:justify-center md:w-5/12">
                    <img src="{{ ('assets/Logonavbar.png') }}" alt="faq images" class="mx-auto md:max-h-[250px]">
                </div>
        </div>
    </div>
</section>


<!-- ====== END Contact ====== -->

<!-- ====== END Contact ====== -->
@endsection
@extends('layouts.app')
@section('action')
@section('title', 'Halaman Home')

@section('content')

<section class="relative bg-white py-26 mb-6 lg:pt-[100px]">
    {{-- @if(Session::has('status'))
    <div id="toast-success" class="flex items-center w-full p-4 mb-4 text-gray-500 bg-white rounded-lg shadow" role="alert">
     <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
         <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
         <span class="sr-only">Check icon</span>
     </div>
     <div class="ml-3 text-sm font-normal">{{ Session::get('message') }}</div>
     <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8" data-dismiss-target="#toast-success" aria-label="Close">
         <span class="sr-only">Close</span>
         <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
     </button>
     </div>
   @endif --}}
    <div class="mx-auto max-w-7xl px-8 md:px-6 z-50">
        <div class="flex flex-wrap">
            <div class="w-full lg:w-5/12">
                <h1 class="text-redText mb-6 mt-10 text-4xl font-bold leading-snug sm:text-[42px] lg:text-[40px] xl:text-[42px]">Destinasi Terbaik di Bali <span class="text-purpleText"><br>& Temukan Keajaiban Bali
                    Yang Tak Terlupakan</span></h1>
                <p class="text-slate-500 mb-8 max-w-[480px] text-base"> Jelajahi pengalaman yang luar biasa untuk mengeksplorasi keindahan pulau Bali . Tour ini akan membawa Anda ke destinasi wisata populer di Bali
                </p>
                
                <button class="w-full rounded-md bg-blue-500 px-8 py-2.5 font-semibold text-white shadow-md shadow-blue-500/20 hover:bg-blue-600 duration-200 sm:w-auto"><a href="{{ route('paketHome') }}">Pilih Paket Tujuan Anda</a></button>

                <button class="mt-4 box-border w-full rounded-md border border-blue-500/20 px-8 py-2.5 font-semibold text-blue-500 shadow-md shadow-blue-500/10 duration-200 sm:ml-4 sm:mt-0 sm:w-auto ">Register Now</button>

                <!-- brand -->
                <div class="mt-6 flex flex-wrap gap-4 z-20">
                    <img src="{{ asset('assets/images/brand/brand (1).png') }}" alt="brand" class="w-32 cursor-pointer rounded-lg border border-blue-300/20 bg-white px-5 py-3 shadow-md shadow-blue-500/5 duration-200 hover:scale-95 sm:w-36">
                    <img src="{{ asset('assets/images/brand/brand (2).png') }}" alt="brand" class="w-32 cursor-pointer rounded-lg border border-blue-300/20 bg-white px-5 py-3 shadow-md shadow-blue-500/5 duration-200 hover:scale-95 sm:w-36">
                    <img src="{{ asset('assets/images/brand/brand (3).png') }}" alt="brand" class="w-32 cursor-pointer rounded-lg border border-blue-300/20 bg-white px-5 py-3 shadow-md shadow-blue-500/5 duration-200 hover:scale-95 sm:w-36">
                    <img src="{{ asset('assets/images/brand/brand (4).png') }}" alt="brand" class="w-32 cursor-pointer rounded-lg border border-blue-300/20 bg-white px-5 py-3 shadow-md shadow-blue-500/5 duration-200 hover:scale-95 sm:w-36">
                </div>
            </div>

            <div class="hidden px-4 lg:block lg:w-1/12">
                <div>
                    <img src={{ asset('assets/Decore.png') }} class="absolute right-0 top-0 sm:none lg:text-[40px] xl:text-[42px]" alt="">
                </div>
            </div>

            <div class="w-full px-4 lg:w-6/12">
                <div class="lg:ml-auto lg:text-right">
                    <div class="relative z-10 inline-block pt-11 lg:pt-0">
                        <img src="{{ ('assets/Logo.png') }}" alt="hero section img" class="max-w-full lg:ml-auto">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ====== END hero ====== -->


<!-- ====== features ====== -->


<section class="pb-16">
    <div class="mx-auto max-w-7xl px-8 md:px-6">
        <!-- heading text -->
        <div class="mb-5 sm:mb-10">
            <span class="font-medium text-blue-500">Our Features</span>
            <h1 class="text-2xl font-bold text-slate-700 sm:text-3xl">Provide Our Features</h1>
        </div>
        <!-- features img -->
        <div class="md:flex md:justify-between md:gap-6 xl:gap-10">
            <div class="mb-5 max-h-[600px] overflow-hidden rounded-lg md:mb-0 md:w-5/12">
                <img src="{{ asset('assets/images/features/features.png') }}" alt="features img" class="h-full scale-125 sm:w-full sm:object-cover">
            </div>
            <div class="md:w-7/12">
                <div class="mb-16 flex flex-col">
                    <p class="mb-3 text-slate-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint explicabo perferendis voluptatibus sunt enim officiis.</p>

                    <p class="mb-10 text-slate-500">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sint laudantium, cum, quaerat nulla possimus magni odio ullam ratione vitae id fuga aliquam sed molestiae? Voluptas.</p>

                    <button class="w-full rounded-md bg-blue-500 px-8 py-2.5 font-semibold text-white shadow-md shadow-blue-500/20 hover:bg-blue-600 duration-200 md:w-max">Get Started</button>
                </div>

                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    <div class="flex flex-col items-center justify-center rounded-xl bg-white px-4 py-8 shadow-lg">
                        <img class="mb-3 w-16" src="{{ asset('asset/images/features/icon (1).png') }}" alt="">
                        <h3 class="text-lg font-bold text-slate-600">Web Design</h3>
                        <a href="#" class="text-sm text-blue-500">Learn more</a>
                    </div>
                    <div class="flex flex-col items-center justify-center rounded-xl bg-white px-4 py-8 shadow-lg">
                        <img class="mb-3 w-16" src="images/features/icon (2).png" alt="">
                        <h3 class="text-lg font-bold text-slate-600">Automation</h3>
                        <a href="#" class="text-sm text-blue-500">Learn more</a>
                    </div>
                    <div class="flex flex-col items-center justify-center rounded-xl bg-white px-4 py-8 shadow-lg">
                        <img class="mb-3 w-16" src="images/features/icon (3).png" alt="">
                        <h3 class="text-lg font-bold text-slate-600">Infographics</h3>
                        <a href="#" class="text-sm text-blue-500">Learn more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ====== END features ====== -->


<!-- ====== about ====== -->

<section class="py-16">
    <div class="mx-auto max-w-7xl px-8 md:px-6">
        <div class="md:flex md:justify-between md:gap-6">
            <div class="md:w-6/12">
                 <!-- heading text -->
                <div class="mb-5 sm:mb-10">
                    <span class="font-medium text-blue-500">About Us</span>
                    <h1 class="text-2xl font-bold text-slate-700 sm:text-3xl">Creative Marketing agency</h1>
                </div>
                <p class="text-slate-500 mb-6">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere corporis delectus commodi suscipit dolores? Laudantium natus consectetur maiores architecto iste?</p>
                <ul>
                    <li class="mb-6 flex items-center">
                        <div class="flex h-[35px] w-[35px] min-w-[35px] items-center justify-center rounded-full bg-blue-500 text-white">
                            <ion-icon name="briefcase-outline"></ion-icon>
                        </div>
                        <p class="ml-4 max-w-md font-medium text-slate-600">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </li>
                    <li class="mb-6 flex items-center">
                        <div class="flex h-[35px] w-[35px] min-w-[35px] items-center justify-center rounded-full bg-blue-500 text-white">
                            <ion-icon name="cube-outline"></ion-icon>
                        </div>
                        <p class="ml-4 max-w-md font-medium text-slate-600">Omnis unde nam quia harum voluptatum itaque iste nostrum amet vero.</p>
                    </li>
                    <li class="mb-6 flex items-center">
                        <div class="flex h-[35px] w-[35px] min-w-[35px] items-center justify-center rounded-full bg-blue-500 text-white">
                            <ion-icon name="mail-unread-outline"></ion-icon>
                        </div>
                        <p class="ml-4 max-w-md font-medium text-slate-600">Id quos et quidem perspiciatis similique! Rerum, natus temporibus.</p>
                    </li>
                </ul>
                 <button class="w-full rounded-md bg-blue-500 px-8 py-2.5 font-semibold text-white shadow-md shadow-blue-500/20 hover:bg-blue-600 duration-200 md:w-max">Get Started</button>
            </div>

            <!-- about img -->
            <div class="mt-8 flex justify-center md:mt-0 md:w-5/12">
                <img src="{{ ('assets/images/about.png') }}" alt="about img" class="max-h-[500px] md:max-h-max">
            </div>

        </div>
    </div>
</section>

<!-- ====== END about ====== -->


<!-- ====== service ====== -->
<section class="py-16">
    <div class="mx-auto max-w-7xl px-8 md:px-6">
        <!-- heading text -->
        <div class="mb-10 text-center">
            <span class="font-medium text-blue-500">Our Services</span>
            <h1 class="text-2xl font-bold text-slate-700 sm:text-3xl">Provide Awesome Services</h1>
            <p class="mx-auto text-slate-500">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur deleniti sit dolor numquam non. Et.</p>
        </div>

        <!-- box wrapper -->
        <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 xl:gap-8">
            <div class="group flex cursor-pointer flex-col items-center rounded-xl border border-blue-500/10 bg-white px-5 py-8 shadow-lg shadow-blue-300/10 duration-200 hover:bg-blue-500">
                <ion-icon name="bar-chart-outline" class="text-[55px] text-blue-500 duration-200 group-hover:text-white"></ion-icon>
                <h4 class="mt-3 mb-1 text-[17px] font-semibold text-slate-600 duration-200 group-hover:text-white">Crafted for Startups</h4>
                <p class="text-center text-sm text-slate-500 duration-200 group-hover:text-blue-200">Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe accusamus nihil veritatis ad. Odit, veritatis!</p>
            </div>

            <div class="group flex cursor-pointer flex-col items-center rounded-xl border border-blue-500/10 bg-white px-5 py-8 shadow-lg shadow-blue-300/10 duration-200 hover:bg-blue-500">
                <ion-icon name="extension-puzzle-outline" class="text-[55px] text-blue-500 duration-200 group-hover:text-white"></ion-icon>
                <h4 class="mt-3 mb-1 text-[17px] font-semibold text-slate-600 duration-200 group-hover:text-white">Fully Customizable</h4>
                <p class="text-center text-sm text-slate-500 duration-200 group-hover:text-blue-200">Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe accusamus nihil veritatis ad. Odit, veritatis!</p>
            </div>

            <div class="group flex cursor-pointer flex-col items-center rounded-xl border border-blue-500/10 bg-white px-5 py-8 shadow-lg shadow-blue-300/10 duration-200 hover:bg-blue-500">
                <ion-icon name="speedometer-outline" class="text-[55px] text-blue-500 duration-200 group-hover:text-white"></ion-icon>
                <h4 class="mt-3 mb-1 text-[17px] font-semibold text-slate-600 duration-200 group-hover:text-white">Speed Optimized</h4>
                <p class="text-center text-sm text-slate-500 duration-200 group-hover:text-blue-200">Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe accusamus nihil veritatis ad. Odit, veritatis!</p>
            </div>

            <div class="group flex cursor-pointer flex-col items-center rounded-xl border border-blue-500/10 bg-white px-5 py-8 shadow-lg shadow-blue-300/10 duration-200 hover:bg-blue-500">
                <ion-icon name="diamond-outline" class="text-[55px] text-blue-500 duration-200 group-hover:text-white"></ion-icon>
                <h4 class="mt-3 mb-1 text-[17px] font-semibold text-slate-600 duration-200 group-hover:text-white">High-quality Design</h4>
                <p class="text-center text-sm text-slate-500 duration-200 group-hover:text-blue-200">Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe accusamus nihil veritatis ad. Odit, veritatis!</p>
            </div>

            <div class="group flex cursor-pointer flex-col items-center rounded-xl border border-blue-500/10 bg-white px-5 py-8 shadow-lg shadow-blue-300/10 duration-200 hover:bg-blue-500">
                <ion-icon name="file-tray-full-outline" class="text-[55px] text-blue-500 duration-200 group-hover:text-white"></ion-icon>
                <h4 class="mt-3 mb-1 text-[17px] font-semibold text-slate-600 duration-200 group-hover:text-white">All Essential Sections</h4>
                <p class="text-center text-sm text-slate-500 duration-200 group-hover:text-blue-200">Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe accusamus nihil veritatis ad. Odit, veritatis!</p>
            </div>

            <div class="group flex cursor-pointer flex-col items-center rounded-xl border border-blue-500/10 bg-white px-5 py-8 shadow-lg shadow-blue-300/10 duration-200 hover:bg-blue-500">
                <ion-icon name="cloud-download-outline" class="text-[55px] text-blue-500 duration-200 group-hover:text-white"></ion-icon>
                <h4 class="mt-3 mb-1 text-[17px] font-semibold text-slate-600 duration-200 group-hover:text-white">Regular Updates</h4>
                <p class="text-center text-sm text-slate-500 duration-200 group-hover:text-blue-200">Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe accusamus nihil veritatis ad. Odit, veritatis!</p>
            </div>
        </div>
    </div>
</section>

<!-- ====== END service ====== -->


<!-- ====== FAQ ====== -->

<section class="py-16">
    <div class="mx-auto max-w-7xl px-8 md:px-6">
        <!-- heading text -->
        <div class="mb-5 sm:mb-10">
            <span class="font-medium text-blue-500">Our FAQ</span>
            <h1 class="text-2xl font-bold text-slate-700 sm:text-3xl">Frequently Asked Questions</h1>
        </div>
            <!-- wrapper -->
            <div class="md:flex md:justify-between md:gap-6">
                <div class="mb-8 flex justify-center md:mb-0 md:w-5/12">
                    <img src="{{ ('assets/images/faq.png') }}" alt="faq images" class="max-h-[500px] md:max-h-max">
                </div>
                
                <div class="md:w-6/12">
                    <div class="" x-data="{selected:1}">
                        <ul>
                            <li class="relative mb-5">
                                <button type="button" class="w-full rounded-lg bg-blue-50 px-8 py-6 text-left" @click="selected !== 1 ? selected = 1 : selected = null">
                                    <div class="flex items-center justify-between">
                                        <h4 class="font-medium text-slate-600">Lorem ipsum dolor sit, amet consectetur?</h4>
                                        <ion-icon name="chevron-down-circle-outline" class="w-8 text-lg text-blue-500"></ion-icon>
                                    </div>
                                </button>

                                <div class="relative max-h-0 overflow-hidden rounded-b-lg bg-blue-50/30 transition-all duration-500" x-ref="container1" x-bind:style="selected == 1 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                                    <div class="p-6">
                                        <p class="text-slate-500">ipsum! Assumenda, dolorem nihil. Commodi, qui? Officiis provident, cumque perspiciatis magni commodi rem nihil,</p>
                                    </div>
                                </div>
                            </li>

                            <li class="relative mb-5">
                                <button type="button" class="w-full rounded-lg bg-blue-50 px-8 py-6 text-left" @click="selected !== 2 ? selected = 2 : selected = null">
                                    <div class="flex items-center justify-between">
                                        <h4 class="font-medium text-slate-600">Lorem ipsum dolor sit, amet consectetur?</h4>
                                        <ion-icon name="chevron-down-circle-outline" class="w-8 text-lg text-blue-500"></ion-icon>
                                    </div>
                                </button>

                                <div class="relative max-h-0 overflow-hidden rounded-b-lg bg-blue-50/30 transition-all duration-500" x-ref="container2" x-bind:style="selected == 2 ? 'max-height: ' + $refs.container2.scrollHeight + 'px' : ''">
                                    <div class="p-6">
                                        <p class="text-slate-500">ipsum! Assumenda, dolorem nihil. Commodi, qui? Officiis provident, cumque perspiciatis magni commodi rem nihil,</p>
                                    </div>
                                </div>
                            </li>

                            <li class="relative mb-5">
                                <button type="button" class="w-full rounded-lg bg-blue-50 px-8 py-6 text-left" @click="selected !== 3 ? selected = 3 : selected = null">
                                    <div class="flex items-center justify-between">
                                        <h4 class="font-medium text-slate-600">Lorem ipsum dolor sit, amet consectetur?</h4>
                                        <ion-icon name="chevron-down-circle-outline" class="w-8 text-lg text-blue-500"></ion-icon>
                                    </div>
                                </button>

                                <div class="relative max-h-0 overflow-hidden rounded-b-lg bg-blue-50/30 transition-all duration-500" x-ref="container3" x-bind:style="selected == 3 ? 'max-height: ' + $refs.container3.scrollHeight + 'px' : ''">
                                    <div class="p-6">
                                        <p class="text-slate-500">ipsum! Assumenda, dolorem nihil. Commodi, qui? Officiis provident, cumque perspiciatis magni commodi rem nihil,</p>
                                    </div>
                                </div>
                            </li>

                            <li class="relative mb-5">
                                <button type="button" class="w-full rounded-lg bg-blue-50 px-8 py-6 text-left" @click="selected !== 4 ? selected = 4 : selected = null">
                                    <div class="flex items-center justify-between">
                                        <h4 class="font-medium text-slate-600">Lorem ipsum dolor sit, amet consectetur?</h4>
                                        <ion-icon name="chevron-down-circle-outline" class="w-8 text-lg text-blue-500"></ion-icon>
                                    </div>
                                </button>

                                <div class="relative max-h-0 overflow-hidden rounded-b-lg bg-blue-50/30 transition-all duration-500" x-ref="container4" x-bind:style="selected == 4 ? 'max-height: ' + $refs.container4.scrollHeight + 'px' : ''">
                                    <div class="p-6">
                                        <p class="text-slate-500">ipsum! Assumenda, dolorem nihil. Commodi, qui? Officiis provident, cumque perspiciatis magni commodi rem nihil,</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
        </div>
    </div>
</section>

<!-- ====== END FAQ ====== -->


<!-- ====== Portfolio ====== -->

<section class="py-16">
    <div class="mx-auto max-w-7xl px-8 md:px-6">
        <!-- heading text -->
        <div class="mb-10 text-center">
            <span class="font-medium text-blue-500">Our Portfolio</span>
            <h1 class="text-2xl font-bold text-slate-700 sm:text-3xl">Our Recent Works</h1>
            <p class="mx-auto text-slate-500">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur deleniti sit dolor numquam non. Et.</p>
        </div>
        <!-- wrapper -->
        <div class="flex flex-col gap-5">
            <!-- col-1 -->
            <div class="grid gap-5 sm:grid-cols-2 md:grid-cols-4">
                <div class="group relative h-40 overflow-hidden rounded-lg lg:h-52">
                    <img src="{{ ('assets/images/portfolio/p-1.png') }}" alt="portfolio img" class="absolute h-full w-full object-cover duration-200 group-hover:scale-125">
                    <div class="absolute -bottom-60 flex w-full cursor-pointer items-center justify-between bg-gradient-to-t from-slate-800 px-3 pb-4 pt-10 duration-200 group-hover:-bottom-0">
                        <p class="text-sm font-semibold text-white">Type Your portfolio details <span class="text-xs text-slate-300 block">12 August 2025</span></p>
                        <ion-icon name="heart" class="rounded-full bg-white p-1.5 text-lg text-blue-500"></ion-icon>
                    </div>
                </div>
                <div class="group relative h-40 overflow-hidden rounded-lg lg:h-52">
                    <img src="{{ ('assets/images/portfolio/p-2.png') }}" alt="portfolio img" class="absolute h-full w-full object-cover duration-200 group-hover:scale-125">
                    <div class="absolute -bottom-60 flex w-full cursor-pointer items-center justify-between bg-gradient-to-t from-slate-800 px-3 pb-4 pt-10 duration-200 group-hover:-bottom-0">
                        <p class="text-sm font-semibold text-white">Type Your portfolio details <span class="text-xs text-slate-300 block">12 August 2025</span></p>
                        <ion-icon name="heart" class="rounded-full bg-white p-1.5 text-lg text-blue-500"></ion-icon>
                    </div>
                </div>
                <div class="group relative h-40 overflow-hidden rounded-lg lg:h-52 sm:col-span-2">
                    <img src="{{ ('assets/images/portfolio/p-3.png') }}" alt="portfolio img" class="absolute h-full w-full object-cover duration-200 group-hover:scale-125">
                    <div class="absolute -bottom-60 flex w-full cursor-pointer items-center justify-between bg-gradient-to-t from-slate-800 px-3 pb-4 pt-10 duration-200 group-hover:-bottom-0">
                        <p class="text-sm font-semibold text-white">Type Your portfolio details <span class="text-xs text-slate-300 block">12 August 2025</span></p>
                        <ion-icon name="heart" class="rounded-full bg-white p-1.5 text-lg text-blue-500"></ion-icon>
                    </div>
                </div>
            </div>
            <!-- end col-1 -->

            <!-- col-2 -->
            <div class="grid gap-5 sm:grid-cols-2 md:grid-cols-3">
                <div class="group relative h-40 overflow-hidden rounded-lg lg:h-52 md:col-span-2">
                    <img src="{{ ('assets/images/portfolio/p-4.png') }}" alt="portfolio img" class="absolute h-full w-full object-cover duration-200 group-hover:scale-125">
                    <div class="absolute -bottom-60 flex w-full cursor-pointer items-center justify-between bg-gradient-to-t from-slate-800 px-3 pb-4 pt-10 duration-200 group-hover:-bottom-0">
                        <p class="text-sm font-semibold text-white">Type Your portfolio details <span class="text-xs text-slate-300 block">12 August 2025</span></p>
                        <ion-icon name="heart" class="rounded-full bg-white p-1.5 text-lg text-blue-500"></ion-icon>
                    </div>
                </div>
                <div class="group relative h-40 overflow-hidden rounded-lg lg:h-52">
                    <img src="{{ ('assets/images/portfolio/p-5.png') }}" alt="portfolio img" class="absolute h-full w-full object-cover duration-200 group-hover:scale-125">
                    <div class="absolute -bottom-60 flex w-full cursor-pointer items-center justify-between bg-gradient-to-t from-slate-800 px-3 pb-4 pt-10 duration-200 group-hover:-bottom-0">
                        <p class="text-sm font-semibold text-white">Type Your portfolio details <span class="text-xs text-slate-300 block">12 August 2025</span></p>
                        <ion-icon name="heart" class="rounded-full bg-white p-1.5 text-lg text-blue-500"></ion-icon>
                    </div>
                </div>
            </div>
            <!-- end col-2 -->

            <!-- col-3 -->
            <div class="grid gap-5 sm:grid-cols-2 md:grid-cols-4">
                <div class="group relative h-40 overflow-hidden rounded-lg lg:h-52">
                    <img src="{{ ('assets/images/portfolio/p-6.png') }}" alt="portfolio img" class="absolute h-full w-full object-cover duration-200 group-hover:scale-125">
                    <div class="absolute -bottom-60 flex w-full cursor-pointer items-center justify-between bg-gradient-to-t from-slate-800 px-3 pb-4 pt-10 duration-200 group-hover:-bottom-0">
                        <p class="text-sm font-semibold text-white">Type Your portfolio details <span class="text-xs text-slate-300 block">12 August 2025</span></p>
                        <ion-icon name="heart" class="rounded-full bg-white p-1.5 text-lg text-blue-500"></ion-icon>
                    </div>
                </div>
                <div class="group relative h-40 overflow-hidden rounded-lg lg:h-52">
                    <img src="{{ ('assets/images/portfolio/p-7.png') }}" alt="portfolio img" class="absolute h-full w-full object-cover duration-200 group-hover:scale-125">
                    <div class="absolute -bottom-60 flex w-full cursor-pointer items-center justify-between bg-gradient-to-t from-slate-800 px-3 pb-4 pt-10 duration-200 group-hover:-bottom-0">
                        <p class="text-sm font-semibold text-white">Type Your portfolio details <span class="text-xs text-slate-300 block">12 August 2025</span></p>
                        <ion-icon name="heart" class="rounded-full bg-white p-1.5 text-lg text-blue-500"></ion-icon>
                    </div>
                </div>
                <div class="group relative h-40 overflow-hidden rounded-lg lg:h-52 sm:col-span-2">
                    <img src="{{ ('assets/images/portfolio/p-8.png') }}" alt="portfolio img" class="absolute h-full w-full object-cover duration-200 group-hover:scale-125">
                    <div class="absolute -bottom-60 flex w-full cursor-pointer items-center justify-between bg-gradient-to-t from-slate-800 px-3 pb-4 pt-10 duration-200 group-hover:-bottom-0">
                        <p class="text-sm font-semibold text-white">Type Your portfolio details <span class="text-xs text-slate-300 block">12 August 2025</span></p>
                        <ion-icon name="heart" class="rounded-full bg-white p-1.5 text-lg text-blue-500"></ion-icon>
                    </div>
                </div>
            </div>
            <!-- end col-3 -->
        </div>
    </div>
</section>
<!-- ====== END Portfolio ====== -->


<!-- ====== Blog ====== -->

<section class="py-16">
    <div class="mx-auto max-w-7xl px-8 md:px-6">
        <!-- heading text -->
        <div class="mb-5 sm:mb-10">
            <span class="font-medium text-blue-500">Our Blog</span>
            <h1 class="text-2xl font-bold text-slate-700 sm:text-3xl">From Our Latest Blog</h1>
        </div>
        <!-- wrapper -->
        <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:gap-10">
            <!-- single-blog -->
            <div class="w-full duration-200 hover:scale-95">
                <div class="max-h-52 w-full overflow-hidden rounded-t-xl">
                    <img src="{{ ('assets/images/blog/blog-1.png') }}" alt="blog img" class="w-full">
                </div>
                <div class="rounded-b-xl px-5 pb-5 pt-3 shadow-md shadow-blue-500/10">
                    <div class="">
                        <a href="#" class="mr-2 rounded-md bg-blue-50 px-3 py-1 text-sm text-slate-600">Services</a>
                        <a href="#" class="block pt-4 font-medium capitalize text-slate-800 hover:text-blue-500">Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit.</a>
                    </div>
                    <hr class="my-4 border-slate-100">
                    <div class="flex">
                        <img src="{{ ('assets/images/blog/user-1.png') }}" alt="user img" class="mr-3 h-10 w-10 rounded-full object-cover">
                        <p class="text-sm font-semibold capitalize text-slate-600">Zahidul Hossain <span class="block text-xs text-slate-400">web designer</span></p>
                    </div>
                </div>
            </div>

            <!-- single-blog -->
            <div class="w-full duration-200 hover:scale-95">
                <div class="max-h-52 w-full overflow-hidden rounded-t-xl">
                    <img src="{{ ('assets/images/blog/blog-2.png') }}" alt="blog img" class="w-full">
                </div>
                <div class="rounded-b-xl px-5 pb-5 pt-3 shadow-md shadow-blue-500/10">
                    <div class="">
                        <a href="#" class="mr-2 rounded-md bg-blue-50 px-3 py-1 text-sm text-slate-600">Services</a>
                        <a href="#" class="mr-2 rounded-md bg-blue-50 px-3 py-1 text-sm text-slate-600">Design</a>
                        <a href="#" class="block pt-4 font-medium capitalize text-slate-800 hover:text-blue-500">Dolore Placeat Ullam Architecto Deleniti Maxime Laborum</a>
                    </div>
                    <hr class="my-4 border-slate-100">
                    <div class="flex">
                        <img src="{{ ('assets/images/blog/user-2.png') }}" alt="user img" class="mr-3 h-10 w-10 rounded-full object-cover">
                        <p class="text-sm font-semibold capitalize text-slate-600">Zahidul Hossain <span class="block text-xs text-slate-400">web designer</span></p>
                    </div>
                </div>
            </div>

            <!-- single-blog -->
            <div class="w-full duration-200 hover:scale-95">
                <div class="max-h-52 w-full overflow-hidden rounded-t-xl">
                    <img src="{{ ('assets/images/blog/blog-3.png') }}" alt="blog img" class="w-full">
                </div>
                <div class="rounded-b-xl px-5 pb-5 pt-3 shadow-md shadow-blue-500/10">
                    <div class="">
                        <a href="#" class="mr-2 rounded-md bg-blue-50 px-3 py-1 text-sm text-slate-600">Website</a>
                        <a href="#" class="block pt-4 font-medium capitalize text-slate-800 hover:text-blue-500">Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit.</a>
                    </div>
                    <hr class="my-4 border-slate-100">
                    <div class="flex">
                        <img src="{{ ('assets/images/blog/user-3.png') }}" alt="user img" class="mr-3 h-10 w-10 rounded-full object-cover">
                        <p class="text-sm font-semibold capitalize text-slate-600">Zahidul Hossain <span class="block text-xs text-slate-400">web designer</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ====== END Blog ====== -->

<!-- ====== Contact ====== -->


<section class="relative overflow-hidden py-16">
    <img src="{{ ('assetsimages/effect.png') }}" alt="effect" class="absolute bottom-[-400px] -z-10 w-full opacity-[0.2]">
    <div class="mx-auto max-w-7xl px-8 md:px-6">
        <div class="-mx-4 flex flex-wrap lg:justify-between">

            <!-- left info-->
            <div class="w-full px-4 md:w-1/2 xl:w-6/12">
                <div class="mb-12 max-w-[570px] lg:mb-0">
                    <span class="font-medium text-blue-500">Contact Us</span>
                    <h1 class="mb-3 text-2xl font-bold text-slate-700 sm:text-3xl">GET IN TOUCH WITH US</h1>
                    <p class="text-slate-500 mb-8">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere inventore illo porro molestiae maxime magni natus illum commodi! Modi, quisquam?</p>
                    
                    
                    <!-- address -->
                    <div class="mb-8 flex w-full max-w-[420px] items-center rounded-lg bg-white p-4 shadow-md shadow-blue-500/10">
                        <div class="mr-6 flex h-[60px] w-full max-w-[60px] items-center justify-center overflow-hidden rounded bg-blue-500 bg-opacity-5 text-blue-500 sm:h-[70px] sm:max-w-[70px]">
                            <ion-icon name="location-outline" class="text-3xl"></ion-icon>
                        </div>
                        <div class="w-full">
                            <h4 class="mb-1 text-xl font-bold text-slate-700">Our Location</h4>
                            <p class="text-base text-slate-400
                            ">4236 Woodland Terrace. Sacramento. California</p>
                        </div>
                    </div>
                    <!-- phone -->
                    <div class="mb-8 flex w-full max-w-[420px] items-center rounded-lg bg-white p-4 shadow-md shadow-blue-500/10">
                        <div class="mr-6 flex h-[60px] w-full max-w-[60px] items-center justify-center overflow-hidden rounded bg-blue-500 bg-opacity-5 text-blue-500 sm:h-[70px] sm:max-w-[70px]">
                            <ion-icon name="call-outline" class="text-3xl"></ion-icon>
                        </div>
                        <div class="w-full">
                            <h4 class="mb-1 text-xl font-bold text-slate-700">Phone Number</h4>
                            <p class="text-base text-slate-400
                            ">(+62)01 234 567 8912</p>
                        </div>
                    </div>
                    <!-- mail -->
                    <div class="mb-8 flex w-full max-w-[420px] items-center rounded-lg bg-white p-4 shadow-md shadow-blue-500/10">
                        <div class="mr-6 flex h-[60px] w-full max-w-[60px] items-center justify-center overflow-hidden rounded bg-blue-500 bg-opacity-5 text-blue-500 sm:h-[70px] sm:max-w-[70px]">
                            <ion-icon name="mail-outline" class="text-3xl"></ion-icon>
                        </div>
                        <div class="w-full">
                            <h4 class="mb-1 text-xl font-bold text-slate-700">Email Address</h4>
                            <p class="text-base text-slate-400
                            ">company@gmail.com</p>
                        </div>
                    </div>


                </div>
            </div>

            <!-- right contact-->
            <div class="w-full px-4 md:w-1/2 xl:w-5/12">
                <div class="relative rounded-lg bg-white p-8 shadow-lg shadow-blue-500/10 sm:p-12">
                    <form action="">
                        <div class="mb-6">
                            <input type="text" placeholder="Your Name" class="w-full rounded-lg border border-blue-500/20 px-4 py-3 text-slate-500 focus:border-blue-500 focus:outline-none">
                        </div>
                        <div class="mb-6">
                            <input type="email" placeholder="Your Email" class="w-full rounded-lg border border-blue-500/20 px-4 py-3 text-slate-500 focus:border-blue-500 focus:outline-none">
                        </div>
                        <div class="mb-6">
                            <input type="password" placeholder="Your Passsword" class="w-full rounded-lg border border-blue-500/20 px-4 py-3 text-slate-500 focus:border-blue-500 focus:outline-none">
                        </div>
                        <div class="mb-6">
                            <textarea name="message" rows="6" class="resize-none w-full rounded-lg border border-blue-500/20 px-4 py-3 text-slate-500 focus:border-blue-500 focus:outline-none"></textarea>
                        </div>
                        <div class="">
                            <button type="submit" class="w-full rounded border border-blue-300 bg-blue-500 p-3 text-white transition-all hover:bg-opacity-90">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
</section>

{{-- <!-- Modal -->
<div class="fixed top-0 left-0 right-0 bottom-0 flex items-center justify-center z-50 hidden" id="berhasilLogin">
    <div class="bg-white w-1/2 p-6 rounded-lg">
      <h2 class="text-xl font-bold mb-4">Login Success</h2>
      <p class="mb-4">You have successfully logged in.</p>
      <button type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" data-dismiss="modal">Close</button>
    </div>
  </div>
  
  <!-- JavaScript -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var modal = document.getElementById('berhasilLogin');
      var modalClose = modal.querySelector('[data-dismiss="modal"]');
  
      modalClose.addEventListener('click', function() {
        modal.classList.add('hidden');
      });
  
      modal.addEventListener('click', function(event) {
        if (event.target === modal) {
          modal.classList.add('hidden');
        }
      });
    });
  
    @if(session('login_success'))
      document.addEventListener('DOMContentLoaded', function() {
        var modal = document.getElementById('berhasilLogin');
        modal.classList.remove('hidden');
      });
    @endif
  </script> --}}
<!-- ====== END Contact ====== -->

<!-- ====== END Contact ====== -->
@endsection
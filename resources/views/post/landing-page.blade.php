@extends('layouts.app')
@section('action')
@section('title', 'Halaman Home')

@section('content')

<section class="relative bg-white py-26 mb-6 lg:pt-[100px]">
    <div class="mx-auto max-w-7xl mt-32 px-8 md:px-8 z-50">
        <div class="flex flex-wrap">
            <div class="w-full lg:w-5/12">
                <h1 class="text-redText mb-6 text-4xl font-bold leading-snug sm:text-[42px] lg:text-[40px] xl:text-[42px]">Destinasi Terbaik di Bali <span class="text-purpleText"><br>& Temukan Keajaiban Bali
                    Yang Tak Terlupakan</span></h1>
                <p class="text-slate-500 mb-8 max-w-[480px] text-base"> Jelajahi pengalaman yang luar biasa untuk mengeksplorasi keindahan pulau Bali . Tour ini akan membawa Anda ke destinasi wisata populer di Bali
                </p>
                
                <a href="{{ route('paketHome') }}"><button class="w-full rounded-md bg-blue-500 px-8 py-2.5 font-semibold text-white shadow-md shadow-blue-500/20 hover:bg-blue-600 duration-200 sm:w-auto">Pilih Paket Tujuan Anda</button></a>

                <a href="{{ route('reservasi') }}"><button class="mt-4 box-border w-full rounded-md border border-blue-500/20 px-8 py-2.5 font-semibold text-blue-500 shadow-md shadow-blue-500/10 duration-200 sm:ml-4 sm:mt-0 sm:w-auto ">Reservasi Sekarang</button></a>

                {{-- <!-- brand -->
                <div class="mt-6 flex flex-wrap gap-4 z-20">
                    <img src="{{ asset('assets/images/brand/brand (1).png') }}" alt="brand" class="w-32 cursor-pointer rounded-lg border border-blue-300/20 bg-white px-5 py-3 shadow-md shadow-blue-500/5 duration-200 hover:scale-95 sm:w-36">
                    <img src="{{ asset('assets/images/brand/brand (2).png') }}" alt="brand" class="w-32 cursor-pointer rounded-lg border border-blue-300/20 bg-white px-5 py-3 shadow-md shadow-blue-500/5 duration-200 hover:scale-95 sm:w-36">
                    <img src="{{ asset('assets/images/brand/brand (3).png') }}" alt="brand" class="w-32 cursor-pointer rounded-lg border border-blue-300/20 bg-white px-5 py-3 shadow-md shadow-blue-500/5 duration-200 hover:scale-95 sm:w-36">
                    <img src="{{ asset('assets/images/brand/brand (4).png') }}" alt="brand" class="w-32 cursor-pointer rounded-lg border border-blue-300/20 bg-white px-5 py-3 shadow-md shadow-blue-500/5 duration-200 hover:scale-95 sm:w-36">
                </div> --}}
            </div>

            <div class="hidden px-4 lg:block lg:w-1/12">
                <div>
                    <img src={{ asset('assets/Decore.png') }} class="absolute right-0 top-0 sm:none lg:text-[40px] xl:text-[42px]" alt="">
                </div>
            </div>

            <div class="w-full px-4 lg:w-6/12">
                <div class="lg:ml-auto lg:text-right">
                    <div class="relative z-10 inline-block pt-11 lg:pt-0">
                        <img src="{{ ('assets/Logo-lp.png') }}" alt="hero section img" class="max-w-full lg:ml-auto">
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
            <span class="font-medium text-blue-500">Pelayanan Kami</span>
            <h1 class="text-2xl font-bold text-slate-700 sm:text-3xl">Pelayanan Yang Kami Sediakan</h1>
        </div>
        <!-- features img -->
        <div class="md:flex md:justify-between md:gap-6 xl:gap-10">
            <div class="mb-5 max-h-[600px] overflow-hidden rounded-lg md:mb-0 md:w-5/12">
                <img src="{{ asset('assets/pura.jpeg') }}" alt="features img" class="h-full scale-125 sm:w-full sm:object-cover">
            </div>
            <div class="md:w-7/12">
                <div class="mb-16 flex flex-col font-sans">
                    <h1 class="text-3xl text-slate-700 mb-4">
                        Selamat datang di Bali Temple Tour! 
                      </h1>
                      <p class="text-slate-500 mb-3">
                        Apakah Anda siap untuk petualangan tak terlupakan di pulau dewata Bali? Biarkan kami memandu Anda pada perjalanan yang aman dan menyenangkan untuk menjelajahi tempat-tempat eksotis dan keindahan yang mengagumkan di Bali.
                      </p>
                    
                      <h2 class="text-xl text-slate-700 mt-4 mb-2">
                        Tour yang aman dan menyenangkan:
                      </h2>
                      <p class="text-slate-500 mb-3">
                        Kami mengutamakan keselamatan setiap langkah perjalanan Anda. Kami telah merancang tur dengan cermat untuk memastikan kenyamanan dan kebahagiaan Anda selama liburan di Bali.
                      </p>
                    
                      <h2 class="text-xl text-slate-700 mt-4 mb-2">
                        Pengalaman yang tidak pernah terlupakan:
                      </h2>
                      <p class="text-slate-500 mb-3">
                        Bali adalah surga bagi para pencari petualangan dan keindahan. Dengan Bali Temple Tour, Anda akan menjalani pengalaman yang tak terlupakan. Dari indahnya matahari terbenam di pura kuno hingga menyelam dalam kekayaan bawah laut yang menakjubkan, setiap momen akan mengisi album kenangan Anda dengan cerita-cerita tak terlupakan.
                      </p>
                    
                      <h2 class="text-xl text-slate-700 mt-4 mb-2">
                        Mengeksplor tempat baru:
                      </h2>
                      <p class="text-slate-500 mb-3">
                        Kami mengerti betapa pentingnya menggali keajaiban tempat baru. Bali memiliki begitu banyak tempat yang menunggu untuk dijelajahi. Bersama kami, Anda akan menjelajahi tempat-tempat tersembunyi yang jarang dikunjungi, merasakan budaya lokal yang kaya, dan menemukan keunikan setiap sudut pulau ini.
                      </p>
                </div>     
            </div>     
        </div>
        <h1 class="text-2xl font-bold text-slate-700 sm:text-3xl mb-2">
            Tunggu apa lagi?</h1>
        <p class="text-slate-500 mb-3">
            Segera bergabunglah dengan Bali Temple Tour dan buat kenangan berharga dalam perjalanan seumur hidup Anda!
        </p>
        <a href="{{ route('paketHome') }}"><button class="w-full rounded-md bg-blue-500 px-8 py-2.5 font-semibold text-white shadow-md shadow-blue-500/20 hover:bg-blue-600 duration-200 sm:w-auto">Mulai Tour Anda Sekarang</button></a>
    </div>
    
</section>

<!-- ====== END features ====== -->


<!-- ====== service ====== -->
<section class="py-16">
    <div class="mx-auto max-w-7xl px-8 md:px-6">
        <!-- heading text -->
        <div class="mb-10 text-center">
            <span class="font-medium text-blue-500">Pengemudi Kami</span>
            <h1 class="text-2xl font-bold text-slate-700 sm:text-3xl">Pelayanan Dari Pengemudi</h1>
            <p class="mx-auto text-slate-500">Kami adalah pengemudi sekaligus pemandu yang berdedikasi untuk memastikan perjalanan Anda di pulau dewata Bali tak terlupakan</p>
        </div>

        <!-- box wrapper -->
        <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 xl:gap-8">
            <div class="group flex cursor-pointer flex-col items-center rounded-xl border border-blue-500/10 bg-white px-5 py-8 shadow-lg shadow-blue-300/10 duration-200 hover:bg-blue-500">
                <ion-icon name="ribbon" class="text-[55px] text-blue-500 duration-200 group-hover:text-white"></ion-icon>
                <h4 class="mt-3 mb-1 text-[17px] font-semibold text-slate-600 duration-200 group-hover:text-white">Keahlian Lokal</h4>
                <p class="text-center text-sm text-slate-500 duration-200 group-hover:text-blue-200">Dengan pengetahuan mendalam tentang Bali, kami akan membawa Anda menjelajahi tempat-tempat unik dan tersembunyi yang hanya diketahui oleh penduduk lokal.</p>
            </div>

            <div class="group flex cursor-pointer flex-col items-center rounded-xl border border-blue-500/10 bg-white px-5 py-8 shadow-lg shadow-blue-300/10 duration-200 hover:bg-blue-500">
                <ion-icon name="happy" class="text-[55px] text-blue-500 duration-200 group-hover:text-white"></ion-icon>
                <h4 class="mt-3 mb-1 text-[17px] font-semibold text-slate-600 duration-200 group-hover:text-white">Ramah dan Perhatian</h4>
                <p class="text-center text-sm text-slate-500 duration-200 group-hover:text-blue-200">Keramahan kami adalah ciri khas kami. Selalu dengan senyuman, kami akan memberikan perhatian penuh pada kebutuhan Anda</p>
            </div>

            <div class="group flex cursor-pointer flex-col items-center rounded-xl border border-blue-500/10 bg-white px-5 py-8 shadow-lg shadow-blue-300/10 duration-200 hover:bg-blue-500">
                <ion-icon name="speedometer" class="text-[55px] text-blue-500 duration-200 group-hover:text-white"></ion-icon>
                <h4 class="mt-3 mb-1 text-[17px] font-semibold text-slate-600 duration-200 group-hover:text-white">Fleksibilitas Jadwal</h4>
                <p class="text-center text-sm text-slate-500 duration-200 group-hover:text-blue-200">Kami sangat menghargai preferensi Anda dalam merencanakan perjalanan. Jika ada perubahan rencana atau tujuan, kami akan dengan senang hati menyesuaikan perjalanan agar sesuai dengan keinginan Anda.</p>
            </div>

            <div class="group flex cursor-pointer flex-col items-center rounded-xl border border-blue-500/10 bg-white px-5 py-8 shadow-lg shadow-blue-300/10 duration-200 hover:bg-blue-500">
                <ion-icon name="diamond" class="text-[55px] text-blue-500 duration-200 group-hover:text-white"></ion-icon>
                <h4 class="mt-3 mb-1 text-[17px] font-semibold text-slate-600 duration-200 group-hover:text-white">Pengalaman Memorable</h4>
                <p class="text-center text-sm text-slate-500 duration-200 group-hover:text-blue-200">Kami berkomitmen untuk menciptakan momen-momen tak terlupakan selama perjalanan Anda di Bali. Dari matahari terbenam di pura hingga keindahan bawah laut, setiap detiknya akan mengisi album kenangan Anda.</p>
            </div>

            <div class="group flex cursor-pointer flex-col items-center rounded-xl border border-blue-500/10 bg-white px-5 py-8 shadow-lg shadow-blue-300/10 duration-200 hover:bg-blue-500">
                <ion-icon name="file-tray-full" class="text-[55px] text-blue-500 duration-200 group-hover:text-white"></ion-icon>
                <h4 class="mt-3 mb-1 text-[17px] font-semibold text-slate-600 duration-200 group-hover:text-white">Pengetahuan Sejarah dan Budaya</h4>
                <p class="text-center text-sm text-slate-500 duration-200 group-hover:text-blue-200">Kami akan memperkenalkan Anda pada sejarah dan budaya Bali yang kaya, memberikan wawasan mendalam tentang kearifan lokal.</p>
            </div>

            <div class="group flex cursor-pointer flex-col items-center rounded-xl border border-blue-500/10 bg-white px-5 py-8 shadow-lg shadow-blue-300/10 duration-200 hover:bg-blue-500">
                <ion-icon name="shield-checkmark" class="text-[55px] text-blue-500 duration-200 group-hover:text-white"></ion-icon>
                <h4 class="mt-3 mb-1 text-[17px] font-semibold text-slate-600 duration-200 group-hover:text-white"> Prioritas Keamanan</h4>
                <p class="text-center text-sm text-slate-500 duration-200 group-hover:text-blue-200">Keselamatan adalah hal utama bagi kami. Dengan kendaraan yang aman dan mengikuti peraturan lalu lintas dengan ketat, Anda dapat menikmati perjalanan dengan tenang.</p>
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
            <span class="font-medium text-blue-500">FAQ</span>
            <h1 class="text-2xl font-bold text-slate-700 sm:text-3xl">Pertanyaan yang Sering Diajukan</h1>
        </div>
            <!-- wrapper -->
            <div class="md:flex md:justify-between md:gap-6">
                <div class="mb-8 flex justify-center md:mb-0 md:w-5/12">
                    <img src="{{ ('assets/Foto1.png') }}" alt="faq images" class="max-h-[500px] md:max-h-max">
                </div>
                
                <div class="md:w-6/12">
                    <div class="" x-data="{selected:1}">
                        <ul>
                            <li class="relative mb-5">
                                <button type="button" class="w-full rounded-lg bg-blue-50 px-8 py-6 text-left" @click="selected !== 1 ? selected = 1 : selected = null">
                                    <div class="flex items-center justify-between">
                                        <h4 class="font-medium text-slate-600">Apa yang membuat Bali Temple Tour berbeda dari tur lainnya di Bali?</h4>
                                        <ion-icon name="chevron-down-circle-outline" class="w-8 text-lg text-blue-500"></ion-icon>
                                    </div>
                                </button>

                                <div class="relative max-h-0 overflow-hidden rounded-b-lg bg-blue-50/30 transition-all duration-500" x-ref="container1" x-bind:style="selected == 1 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                                    <div class="p-6">
                                        <p class="text-slate-500">Bali Temple Tour menawarkan pengalaman yang unik dan berbeda dari tur lainnya di Bali. Kami memiliki pengetahuan  tentang tempat-tempat wisata, kekayaan budaya,  yang akan membuat perjalanan Anda menjadi lebih istimewa dan berkesan.</p>
                                    </div>
                                </div>
                            </li>

                            <li class="relative mb-5">
                                <button type="button" class="w-full rounded-lg bg-blue-50 px-8 py-6 text-left" @click="selected !== 2 ? selected = 2 : selected = null">
                                    <div class="flex items-center justify-between">
                                        <h4 class="font-medium text-slate-600">Bagaimana Bali Temple Tour memastikan kenyamanan saya selama perjalanan?</h4>
                                        <ion-icon name="chevron-down-circle-outline" class="w-8 text-lg text-blue-500"></ion-icon>
                                    </div>
                                </button>

                                <div class="relative max-h-0 overflow-hidden rounded-b-lg bg-blue-50/30 transition-all duration-500" x-ref="container2" x-bind:style="selected == 2 ? 'max-height: ' + $refs.container2.scrollHeight + 'px' : ''">
                                    <div class="p-6">
                                        <p class="text-slate-500">Kenyamanan Anda adalah prioritas kami. Kami menyediakan kendaraan yang nyaman dan terawat dengan baik. Fleksibilitas kami dalam menjadwalkan dan tanggapan cepat terhadap permintaan Anda akan memastikan perjalanan yang menyenangkan.</p>
                                    </div>
                                </div>
                            </li>

                            <li class="relative mb-5">
                                <button type="button" class="w-full rounded-lg bg-blue-50 px-8 py-6 text-left" @click="selected !== 3 ? selected = 3 : selected = null">
                                    <div class="flex items-center justify-between">
                                        <h4 class="font-medium text-slate-600">Bagaimana dengan keamanan selama perjalanan?</h4>
                                        <ion-icon name="chevron-down-circle-outline" class="w-8 text-lg text-blue-500"></ion-icon>
                                    </div>
                                </button>

                                <div class="relative max-h-0 overflow-hidden rounded-b-lg bg-blue-50/30 transition-all duration-500" x-ref="container3" x-bind:style="selected == 3 ? 'max-height: ' + $refs.container3.scrollHeight + 'px' : ''">
                                    <div class="p-6">
                                        <p class="text-slate-500">Keamanan adalah prioritas utama kami. Pengemudi sekaligus pemandu kami selalu mematuhi aturan lalu lintas dan memastikan kendaraan dalam kondisi prima. Kami juga memilih rute dan lokasi yang aman untuk perjalanan Anda.</p>
                                    </div>
                                </div>
                            </li>

                            <li class="relative mb-5">
                                <button type="button" class="w-full rounded-lg bg-blue-50 px-8 py-6 text-left" @click="selected !== 4 ? selected = 4 : selected = null">
                                    <div class="flex items-center justify-between">
                                        <h4 class="font-medium text-slate-600">Bagaimana saya bisa memesan tur dengan Bali Temple Tour?</h4>
                                        <ion-icon name="chevron-down-circle-outline" class="w-8 text-lg text-blue-500"></ion-icon>
                                    </div>
                                </button>

                                <div class="relative max-h-0 overflow-hidden rounded-b-lg bg-blue-50/30 transition-all duration-500" x-ref="container4" x-bind:style="selected == 4 ? 'max-height: ' + $refs.container4.scrollHeight + 'px' : ''">
                                    <div class="p-6">
                                        <p class="text-slate-500">Anda dapat dengan mudah memesan tur dengan kami melalui menu paket. Sebelum memesan anda bisa membuat akun terlebih dahulu setelah membuat akun anda bisa melakukan login. Setelah melakukan login anda bisa memesan paket tur pada Bali Temple Tour.</p>
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
            <span class="font-medium text-blue-500"></span>
            <h1 class="text-2xl font-bold text-slate-700 sm:text-3xl">Portfolio Kami</h1>
            <p class="mx-auto text-slate-500">Kami akan memperlihatkan sebagian momen-momen indah dari perjalanan seru bersama kami di pulau dewata Bali. Dari pantai-pantai indah hingga pura-pura kuno yang memukau, mari kita lihat sejenak bagaimana perjalanan bersama Bali Temple Tour akan mengisi album kenangan Anda.</p>
        </div>
        <!-- wrapper -->
        <div class="flex flex-col gap-5">
            <!-- col-1 -->
            <div class="grid gap-5 sm:grid-cols-2 md:grid-cols-4">
                <div class="group relative h-40 overflow-hidden rounded-lg lg:h-52">
                    <img src="{{ ('assets/portofolio/foto-pura1.png') }}" alt="portfolio img" class="absolute h-full w-full object-cover duration-200 group-hover:scale-125">
                    <div class="absolute -bottom-60 flex w-full cursor-pointer items-center justify-between bg-gradient-to-t from-slate-800 px-3 pb-4 pt-10 duration-200 group-hover:-bottom-0">
                        <p class="text-sm font-semibold text-white">Portofolio 1</p>
                        <ion-icon name="heart" class="rounded-full bg-white p-1.5 text-lg text-blue-500"></ion-icon>
                    </div>
                </div>
                <div class="group relative h-40 overflow-hidden rounded-lg lg:h-52">
                    <img src="{{ ('assets/portofolio/foto-pura2.jpeg') }}" alt="portfolio img" class="absolute h-full w-full object-cover duration-200 group-hover:scale-125">
                    <div class="absolute -bottom-60 flex w-full cursor-pointer items-center justify-between bg-gradient-to-t from-slate-800 px-3 pb-4 pt-10 duration-200 group-hover:-bottom-0">
                        <p class="text-sm font-semibold text-white">Portofolio 2</p>
                        <ion-icon name="heart" class="rounded-full bg-white p-1.5 text-lg text-blue-500"></ion-icon>
                    </div>
                </div>
                <div class="group relative h-40 overflow-hidden rounded-lg lg:h-52 sm:col-span-2">
                    <img src="{{ ('assets/portofolio/foto-pura3.jpeg') }}" alt="portfolio img" class="absolute h-full w-full object-cover duration-200 group-hover:scale-125">
                    <div class="absolute -bottom-60 flex w-full cursor-pointer items-center justify-between bg-gradient-to-t from-slate-800 px-3 pb-4 pt-10 duration-200 group-hover:-bottom-0">
                        <p class="text-sm font-semibold text-white">Portofolio 3</p>
                        <ion-icon name="heart" class="rounded-full bg-white p-1.5 text-lg text-blue-500"></ion-icon>
                    </div>
                </div>
            </div>
            <!-- end col-1 -->

            <!-- col-2 -->
            <div class="grid gap-5 sm:grid-cols-2 md:grid-cols-3">
                <div class="group relative h-40 overflow-hidden rounded-lg lg:h-52 md:col-span-2">
                    <img src="{{ ('assets/portofolio/foto-kecak4.jpeg') }}" alt="portfolio img" class="absolute h-full w-full object-cover duration-200 group-hover:scale-125">
                    <div class="absolute -bottom-60 flex w-full cursor-pointer items-center justify-between bg-gradient-to-t from-slate-800 px-3 pb-4 pt-10 duration-200 group-hover:-bottom-0">
                        <p class="text-sm font-semibold text-white">Portofolio 4</p>
                        <ion-icon name="heart" class="rounded-full bg-white p-1.5 text-lg text-blue-500"></ion-icon>
                    </div>
                </div>
                <div class="group relative h-40 overflow-hidden rounded-lg lg:h-52">
                    <img src="{{ ('assets/portofolio/foto-pantai5.jpeg') }}" alt="portfolio img" class="absolute h-full w-full object-cover duration-200 group-hover:scale-125">
                    <div class="absolute -bottom-60 flex w-full cursor-pointer items-center justify-between bg-gradient-to-t from-slate-800 px-3 pb-4 pt-10 duration-200 group-hover:-bottom-0">
                        <p class="text-sm font-semibold text-white">Portofolio 5</p>
                        <ion-icon name="heart" class="rounded-full bg-white p-1.5 text-lg text-blue-500"></ion-icon>
                    </div>
                </div>
            </div>
            <!-- end col-2 -->

            <!-- col-3 -->
            <div class="grid gap-5 sm:grid-cols-2 md:grid-cols-4">
                <div class="group relative h-40 overflow-hidden rounded-lg lg:h-52">
                    <img src="{{ ('assets/portofolio/foto-pantai6.jpeg') }}" alt="portfolio img" class="absolute h-full w-full object-cover duration-200 group-hover:scale-125">
                    <div class="absolute -bottom-60 flex w-full cursor-pointer items-center justify-between bg-gradient-to-t from-slate-800 px-3 pb-4 pt-10 duration-200 group-hover:-bottom-0">
                        <p class="text-sm font-semibold text-white">Portofolio 6</p>
                        <ion-icon name="heart" class="rounded-full bg-white p-1.5 text-lg text-blue-500"></ion-icon>
                    </div>
                </div>
                <div class="group relative h-40 overflow-hidden rounded-lg lg:h-52">
                    <img src="{{ ('assets/portofolio/foto-pantai7.jpeg') }}" alt="portfolio img" class="absolute h-full w-full object-cover duration-200 group-hover:scale-125">
                    <div class="absolute -bottom-60 flex w-full cursor-pointer items-center justify-between bg-gradient-to-t from-slate-800 px-3 pb-4 pt-10 duration-200 group-hover:-bottom-0">
                        <p class="text-sm font-semibold text-white">Portofolio 7</p>
                        <ion-icon name="heart" class="rounded-full bg-white p-1.5 text-lg text-blue-500"></ion-icon>
                    </div>
                </div>
                <div class="group relative h-40 overflow-hidden rounded-lg lg:h-52 sm:col-span-2">
                    <img src="{{ ('assets/portofolio/foto-pantai8.jpeg') }}" alt="portfolio img" class="absolute h-full w-full object-cover duration-200 group-hover:scale-125">
                    <div class="absolute -bottom-60 flex w-full cursor-pointer items-center justify-between bg-gradient-to-t from-slate-800 px-3 pb-4 pt-10 duration-200 group-hover:-bottom-0">
                        <p class="text-sm font-semibold text-white">Portofolio 8</p>
                        <ion-icon name="heart" class="rounded-full bg-white p-1.5 text-lg text-blue-500"></ion-icon>
                    </div>
                </div>
            </div>
            <!-- end col-3 -->
        </div>
    </div>
</section>
<!-- ====== END Portfolio ====== -->

<!-- ====== Contact ====== -->


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
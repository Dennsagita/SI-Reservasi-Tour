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


<!-- ====== END Contact ====== -->

<!-- ====== END Contact ====== -->
@endsection
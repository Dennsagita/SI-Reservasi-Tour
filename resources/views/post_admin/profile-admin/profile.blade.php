@extends('layouts.app_admin')
@section('action')
@section('title', 'Profile')

@section('content')
<div class="w-full px-6 bg-gray-DEFAULT-50 mx-auto">
    <div class="relative flex items-center p-0 mt-6 overflow-hidden bg-center bg-cover min-h-75 rounded-2xl" style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%">
        <span class="absolute inset-y-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-purple-700 to-pink-500 opacity-60"></span>
    </div>
    <div class="relative flex flex-col flex-auto min-w-0 p-4 mx-6 -mt-16 overflow-hidden break-words border-0 shadow-blur rounded-2xl bg-white/80 bg-clip-border backdrop-blur-2xl backdrop-saturate-200">
        <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-auto max-w-full px-3">
            <div class="text-base ease-soft-in-out h-18.5 w-18.5 relative inline-flex items-center justify-center rounded-xl text-white transition-all duration-200">
                <img src="{{ ('/assets/img/bruce-mars.jpg') }}" alt="profile_image" class="w-full shadow-soft-sm rounded-xl" />
            </div>
        </div>
        <div class="flex-none w-auto max-w-full px-3 my-auto">
            <div class="h-full">
            <h5 class="mb-1">{{ Auth::guard('admin')->user()->nama }}</h5>
            <p class="mb-0 font-semibold leading-normal text-sm">{{ Auth::guard('admin')->user()->email }}</p>
            </div>
        </div>
        </div>
    </div>


    <div class="flex flex-wrap my-6 -mx-3">
        <!-- card 2 -->

        <div class="w-full max-w-full px-3 md:w-1/2 md:flex-none lg:w-1/3 lg:flex-none">
          <div class="border-black/12.5 shadow-soft-xl relative flex h-full min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
              <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid bg-white p-6 pb-0">
              <h6><i class="fa-solid fa-user"></i>  Profil Akun</h6>
              <div class="flex-auto p-4">
                <div class="before:border-r-solid relative before:absolute before:top-0 before:left-4 before:h-full before:border-r-2 before:border-r-slate-100 before:content-[''] before:lg:-ml-px">
                  <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                    <li class="relative block px-4 py-2 pt-0 pl-0 leading-normal bg-white border-0 rounded-t-lg text-sm text-inherit"><strong class="text-slate-700">Nama :</strong> &nbsp; {{ Auth::guard('admin')->user()->nama }}</li>
                    <li class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit"><strong class="text-slate-700">No Telphone :</strong> &nbsp; {{ Auth::guard('admin')->user()->no_telp }}</li>
                    <li class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit"><strong class="text-slate-700">Email :</strong> &nbsp; {{ Auth::guard('admin')->user()->email }}</li>
                    <li class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit"><strong class="text-slate-700">Alamat :</strong> &nbsp; {{ Auth::guard('admin')->user()->alamat }}</li>
                    <li class="relative block px-4 py-2 pb-0 pl-0 bg-white border-0 border-t-0 rounded-b-lg text-inherit">
                    </li>
                  </ul>
                </div>
                <button class="w-full rounded-md bg-blue-500 px-8 py-2.5 font-semibold text-white shadow-md shadow-blue-500/20 hover:bg-blue-600 duration-200 sm:w-auto"><a href="#">Ubah Profil</a></button>
                </div>
              </div>
            </div>
        </div>
        
        <!-- card 1 -->

        <div class="w-full max-w-full px-3 mt-0 mb- md:mb-6 md:w-1/2 md:flex-none lg:w-2/3 lg:flex-none mb-mobile:mb-6">
            
        <div class="w-full p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8">
            <h5 class="mb-2 text-3xl font-bold text-gray-900 ">Work fast from anywhere</h5>
            <p class="mb-5 text-base text-gray-500 sm:text-lg">Stay up to date and move work forward with Flowbite on iOS & Android. Download the app today.</p>
            <div class="items-center justify-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
                <a href="{{ route('resetpassword') }}" class="w-full sm:w-auto bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                    <div class="text-left">
                        <div class="-mt-1 font-sans text-sm font-semibold">Ubah Password</div>
                    </div>
                </a>
                <a href="#" class="w-full sm:w-auto bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                    <div class="text-left">
                        <div class="-mt-1 font-sans text-sm font-semibold">Detail Pesanan</div>
                    </div>
                </a>
            </div>
        </div>

        </div>
    </div>
</div>
@endsection
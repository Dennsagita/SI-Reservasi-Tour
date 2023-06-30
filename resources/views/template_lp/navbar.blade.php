<div class="container sticky top-0 z-sticky">
    <div class="flex flex-wrap -mx-3">
      <div class="w-full max-w-full px-3 flex-0">
        <!-- Navbar -->
        <nav class="absolute top-0 left-0 right-0 z-30 flex flex-wrap items-center px-4 py-2 mx-6 my-4 shadow-soft-2xl rounded-blur bg-white/80 backdrop-blur-2xl backdrop-saturate-200 lg:flex-nowrap lg:justify-start">
          <div class="flex items-center justify-between w-full p-0 pl-6 mx-auto flex-wrap-inherit">
            <a class="py-2.375 text-sm mr-4 ml-4 whitespace-nowrap font-bold text-slate-700 lg:ml-0" href="../pages/dashboard.html"><img src={{ asset('assets/Logonavbar.png') }} class="h-10 w-50" alt=""></a>
            <button navbar-trigger class="px-3 py-1 ml-2 leading-none transition-all bg-transparent border border-transparent border-solid rounded-lg shadow-none cursor-pointer text-lg ease-soft-in-out lg:hidden" type="button" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="inline-block mt-2 align-middle bg-center bg-no-repeat bg-cover w-6 h-6 bg-none">
                <span bar1 class="w-5.5 rounded-xs relative my-1 mx-auto block h-px bg-gray-600 transition-all duration-300"></span>
                <span bar2 class="w-5.5 rounded-xs mt-1.75 relative my-1 mx-auto block h-px bg-gray-600 transition-all duration-300"></span>
                <span bar3 class="w-5.5 rounded-xs mt-1.75 relative my-1 mx-auto block h-px bg-gray-600 transition-all duration-300"></span>
              </span>
            </button>
            <div navbar-menu class="items-center flex-grow overflow-hidden transition-all duration-500 ease-soft lg-max:max-h-0 basis-full lg:flex lg:basis-auto">
              <ul class="flex flex-col pl-0 mx-auto mb-0 list-none lg:flex-row xl:ml-auto">
                <li>
                  <a class="block px-4 py-2 mr-2 font-normal transition-all lg-max:opacity-0 duration-250 ease-soft-in-out text-sm text-slate-700 {{ request()->segment(1) == '' ? 'leading-pro hover:scale-102 hover:shadow-soft-xs active:opacity-85 ease-soft-in text-xs tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-gray-900 to-slate-800 rounded-3.5xl mb-0 mr-1 inline-block cursor-pointer border-0 bg-transparent px-6 py-3 text-center align-middle font-bold uppercase text-white transition-all' : '' }}" href="/">
                    <i class="fa-solid fa-house opacity-60"></i> &nbsp;
                    Home
                  </a>
                </li>
                @if (Str::length(Auth::guard('user')->user()) > 0)
                <li>
                  <a class="block px-4 py-2 mr-2 font-normal transition-all lg-max:opacity-0 duration-250 ease-soft-in-out text-sm text-slate-700 {{ request()->segment(1) == 'reservasi' ? 'leading-pro hover:scale-102 hover:shadow-soft-xs active:opacity-85 ease-soft-in text-xs tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-gray-900 to-slate-800 rounded-3.5xl mb-0 mr-1 inline-block cursor-pointer border-0 bg-transparent px-6 py-3 text-center align-middle font-bold uppercase text-white transition-all' : '' }}" href="/">
                    <i class="fa-solid fa-pencil opacity-60"></i> &nbsp;
                    Reservasi
                  </a>
                </li>
                @else
                <li>
                  <a class="hidden block px-4 py-2 mr-2 font-normal transition-all lg-max:opacity-0 duration-250 ease-soft-in-out text-sm text-slate-700 {{ request()->segment(1) == '' ? 'leading-pro hover:scale-102 hover:shadow-soft-xs active:opacity-85 ease-soft-in text-xs tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-gray-900 to-slate-800 rounded-3.5xl mb-0 mr-1 inline-block cursor-pointer border-0 bg-transparent px-6 py-3 text-center align-middle font-bold uppercase text-white transition-all' : '' }}" href="/">
                    <i class="fa-solid fa-pencil opacity-60"></i> &nbsp;
                    Reservasi
                  </a>
                </li>
                @endif
                <li>
                  <a class="block px-4 py-2 mr-2 font-normal transition-all lg-max:opacity-0 duration-250 ease-soft-in-out text-sm text-slate-700  {{ request()->segment(1) == 'paket' ? 'leading-pro hover:scale-102 hover:shadow-soft-xs active:opacity-85 ease-soft-in text-xs tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-gray-900 to-slate-800 rounded-3.5xl mb-0 mr-1 inline-block cursor-pointer border-0 bg-transparent px-6 py-3 text-center align-middle font-bold uppercase text-white transition-all' : '' }}" href="/paket">
                    <i class="mr-1 fa fa-user opacity-60"></i>
                    Paket
                  </a>
                </li>
                <li>
                  <a class="block px-4 py-2 mr-2 font-normal transition-all lg-max:opacity-0 duration-250 ease-soft-in-out text-sm text-slate-700 {{ request()->segment(1) == 'about' ? 'leading-pro hover:scale-102 hover:shadow-soft-xs active:opacity-85 ease-soft-in text-xs tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-gray-900 to-slate-800 rounded-3.5xl mb-0 mr-1 inline-block cursor-pointer border-0 bg-transparent px-6 py-3 text-center align-middle font-bold uppercase text-white transition-all' : '' }} " href="/about">
                    <i class="mr-1 fas fa-user-circle opacity-60"></i>
                    About
                  </a>
                </li>
                @if (Str::length(Auth::guard('user')->user()) > 0)
                <li>
                  <a class="hidden block px-4 py-2 mr-2 font-normal transition-all lg-max:opacity-0 duration-250 ease-soft-in-out text-sm text-slate-700 {{ request()->segment(1) == 'login' ? 'leading-pro hover:scale-102 hover:shadow-soft-xs active:opacity-85 ease-soft-in text-xs tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-gray-900 to-slate-800 rounded-3.5xl mb-0 mr-1 inline-block cursor-pointer border-0 bg-transparent px-6 py-3 text-center align-middle font-bold uppercase text-white transition-all' : '' }}" href="/login">
                    <i class="mr-1 fas fa-key opacity-60"></i>
                    Login
                  </a>
                </li>
                @else
                <li>
                  <a class="block px-4 py-2 mr-2 font-normal transition-all lg-max:opacity-0 duration-250 ease-soft-in-out text-sm text-slate-700 {{ request()->segment(1) == 'login' ? 'leading-pro hover:scale-102 hover:shadow-soft-xs active:opacity-85 ease-soft-in text-xs tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-gray-900 to-slate-800 rounded-3.5xl mb-0 mr-1 inline-block cursor-pointer border-0 bg-transparent px-6 py-3 text-center align-middle font-bold uppercase text-white transition-all' : '' }}" href="/login">
                    <i class="mr-1 fas fa-key opacity-60"></i>
                    Login
                  </a>
                </li>
                @endif
              </ul>
              <!-- online builder btn  -->
              <!-- <li class="flex items-center">
                <a
                  class="leading-pro ease-soft-in text-fuchsia-500 border-fuchsia-500 text-xs tracking-tight-soft bg-150 bg-x-25 rounded-3.5xl hover:border-fuchsia-500 hover:scale-102 hover:text-fuchsia-500 active:hover:border-fuchsia-500 active:hover:scale-102 active:hover:text-fuchsia-500 active:opacity-85 active:shadow-soft-xs active:bg-fuchsia-500 active:border-fuchsia-500 mr-2 mb-0 inline-block cursor-pointer border border-solid bg-transparent py-2 px-8 text-center align-middle font-bold uppercase shadow-none transition-all hover:bg-transparent hover:opacity-75 hover:shadow-none active:scale-100 active:text-white active:hover:bg-transparent active:hover:opacity-75 active:hover:shadow-none"
                  target="_blank"
                  href="https://www.creative-tim.com/builder/soft-ui?ref=navbar-dashboard&amp;_ga=2.76518741.1192788655.1647724933-1242940210.1644448053"
                  >Online Builder</a
                >
              </li> -->
              <ul class="pl-0 mb-0 mx-0 list-none lg:block lg:flex-row ">
                <div class="flex items-center space-x-4 ">
                  @if (Str::length(Auth::guard('user')->user()) > 0)
                  <li>
                    <a href="/registrasi" class="hidden leading-pro hover:scale-102 hover:shadow-soft-xs active:opacity-85 ease-soft-in text-xs tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-gray-900 to-slate-800 rounded-3.5xl mb-0 mr-1 inline-block cursor-pointer border-0 bg-transparent px-8 py-2 text-center align-middle font-bold uppercase text-white transition-all">Register</a>
                  </li>
                  @else
                  <li>
                    <a href="/registrasi" class="leading-pro hover:scale-102 hover:shadow-soft-xs active:opacity-85 ease-soft-in text-xs tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-gray-900 to-slate-800 rounded-3.5xl mb-0 mr-1 inline-block cursor-pointer border-0 bg-transparent px-8 py-2 text-center align-middle font-bold uppercase text-white transition-all">Register</a>
                  </li>
                  @endif
                
                @if (Str::length(Auth::guard('user')->user()) > 0)
                <a href="{{ route('profile') }}" class="block px-0 py-2 font-semibold transition-all ease-nav-brand text-sm text-slate-500">
                  <i class="fa fa-user sm:mr-1"></i>
                  {{-- <span class="hidden sm:inline"> --}}
                    @if (Str::length(Auth::guard('user')->user()) > 0)
                    {{ Auth::guard('user')->user()->nama }}
                    @elseif ((Str::length(Auth::guard('pengemudi')->user()) > 0))
                    {{ Auth::guard('pengemudi')->user()->nama }}
                    @elseif ((Str::length(Auth::guard('admin')->user()) > 0))
                    {{ Auth::guard('admin')->user()->nama }}
                    <li>
                      <a href="/registrasi" class="leading-pro hover:scale-102 hover:shadow-soft-xs active:opacity-85 ease-soft-in text-xs tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-gray-900 to-slate-800 rounded-3.5xl mb-0 mr-1 inline-block cursor-pointer border-0 bg-transparent px-8 py-2 text-center align-middle font-bold uppercase text-white transition-all">Register</a>
                    </li>
                    @endif
                  {{-- </span> --}}
                </a>
                @else
                <a href="#" class="hidden block px-0 py-2 font-semibold transition-all ease-nav-brand text-sm text-slate-500">
                  <i class="fa fa-user sm:mr-1"></i>
                  {{-- <span class="hidden sm:inline"> --}}
                    @if (Str::length(Auth::guard('user')->user()) > 0)
                    {{ Auth::guard('user')->user()->nama }}
                    @elseif ((Str::length(Auth::guard('pengemudi')->user()) > 0))
                    {{ Auth::guard('pengemudi')->user()->nama }}
                    @elseif ((Str::length(Auth::guard('admin')->user()) > 0))
                    {{ Auth::guard('admin')->user()->nama }}
                    @endif
                  {{-- </span> --}}
                </a>
                @endif
                @if (Str::length(Auth::guard('user')->user()) > 0)
                <li>
                  <a href="{{route('logout')}}" class="leading-pro  hover:scale-102 hover:shadow-soft-xs active:opacity-85 ease-soft-in text-xs tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-gray-900 to-slate-800 rounded-3.5xl mb-0 mr-1 inline-block cursor-pointer border-0 bg-transparent px-8 py-2 text-center align-middle font-bold uppercase text-white transition-all">Logout</a>
                </li>
                @else
                <li>
                  <a href="{{route('logout')}}" class="hidden leading-pro hover:scale-102 hover:shadow-soft-xs active:opacity-85 ease-soft-in text-xs tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-gray-900 to-slate-800 rounded-3.5xl mb-0 mr-1 inline-block cursor-pointer border-0 bg-transparent px-8 py-2 text-center align-middle font-bold uppercase text-white transition-all">Logout</a>
                </li>
                @endif
                {{-- {{-- <a href="#" class="font-semibold">IDN</a>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-3 h-3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg>     
                </div>
                <li class="flex items-center">
                  
                </li> --}}
              </ul>
              
            </div>
          </div>
        </nav>
      </div>
    </div>
  </div>

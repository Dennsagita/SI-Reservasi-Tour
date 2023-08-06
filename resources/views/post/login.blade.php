@extends('layouts.app')
@section('action')
@section('title', 'Login')

@section('content')
<main class="mt-0 transition-all duration-200 ease-soft-in-out">
    <section>
      <div class="relative flex items-center p-0 overflow-hidden bg-center bg-cover min-h-75-screen">
        <div class="container z-10">
          <div class="flex flex-wrap mt-0 -mx-3">
            <div class="flex flex-col w-full max-w-full px-3 mx-auto md:flex-0 shrink-0 md:w-6/12 lg:w-5/12 xl:w-4/12">
              <div class="relative flex flex-col min-w-0 mt-32 break-words bg-transparent border-0 shadow-none rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 bg-transparent border-b-0 rounded-t-2xl">
                  <h3 class="relative z-10 font-bold text-transparent bg-gradient-to-tl from-blue-600 to-cyan-400 bg-clip-text">Selamat Datang</h3>
                  <p class="mb-0">Masukan email dan password untuk login</p>
                </div>
                <div class="flex-auto p-6">
                  @if($errors->has('gagal-login'))
                  <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-md mb-4">
                      {{ $errors->first('gagal-login') }}
                  </div>
                  @endif
                  @if(Session::has('logout'))
                  <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-md mb-4">
                    {{ Session::get('logout') }}
                  </div>
                  @endif
                  @if (session('ubahPassword'))
                  <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-md mb-4">
                    {{ session('ubahPassword') }}
                  </div>
                  @endif
                  <form action="{{route('processlogin')}}" method="post">
                    {{ csrf_field() }}
                    <label for="email" class="mb-2 ml-1 font-bold text-xs text-slate-700">Email</label>
                    <div class="mb-4">
                      <input type="email" id="email" name="email" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="Email" aria-label="Email" aria-describedby="email-addon" required />
                    </div>
                    <label for="password" class="mb-2 ml-1 font-bold text-xs text-slate-700">Password</label>
                    <div class="mb-4">
                      <input type="password" id="password" name="password" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="Password" aria-label="Password" aria-describedby="password-addon" required />
                    </div>
                    <div class="text-center">
                      <button type="submit" class="inline-block w-full px-6 py-3 mt-6 mb-0 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer shadow-soft-md bg-x-25 bg-150 leading-pro text-xs ease-soft-in tracking-tight-soft bg-gradient-to-tl from-blue-600 to-cyan-400 hover:scale-102 hover:shadow-soft-xs active:opacity-85">Login</button>
                    </div>
                  </form>
                </div>
                <div class="p-6 px-1 pt-0 text-center bg-transparent border-t-0 border-t-solid rounded-b-2xl lg:px-2">
                  <p class="mx-auto mb-6 leading-normal text-sm">
                    Tidak punya akun?
                    <a href="{{ route('registrasi') }}" class="relative z-10 font-semibold text-transparent bg-gradient-to-tl from-blue-600 to-cyan-400 bg-clip-text">Registrasi</a>
                  </p>
                  <p class="mx-auto mb-6 leading-normal text-sm">
                    <a href="{{ route('lupaPassword') }}" class="relative z-10 font-semibold text-transparent bg-gradient-to-tl from-red-600 to-orange-400 bg-clip-text"><button>Lupa Password?</button></a>
                  </p>
                </div>
              </div>
            </div>
            <div class="w-full max-w-full px-3 lg:flex-0 shrink-0 md:w-6/12">
              <div class="absolute top-0 hidden w-3/5 h-full -mr-32 overflow-hidden -skew-x-10 -right-40 rounded-bl-xl md:block">
                <div class="absolute inset-x-0 top-0 z-0 h-full -ml-16 bg-cover skew-x-10" style="background-image: url('../assets/img/curved-images/curved6.jpg')"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>


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
    var modalToggle = document.querySelector('[data-toggle="modal"]');
    var modalClose = modal.querySelector('[data-dismiss="modal"]');

    modalToggle.addEventListener('click', function() {
      modal.classList.remove('hidden');
    });

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
@endsection

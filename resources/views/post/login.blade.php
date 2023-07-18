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
                  <h3 class="relative z-10 font-bold text-transparent bg-gradient-to-tl from-blue-600 to-cyan-400 bg-clip-text">Welcome back</h3>
                  <p class="mb-0">Enter your email and password to sign in</p>
                </div>
                <div class="flex-auto p-6">
                  @if($errors->has('gagal-login'))
                  <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-md mb-4">
                      {{ $errors->first('gagal-login') }}
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
                    <div class="min-h-6 mb-0.5 block pl-12">
                      <input id="rememberMe" class="mt-0.54 rounded-10 duration-250 ease-soft-in-out after:rounded-circle after:shadow-soft-2xl after:duration-250 checked:after:translate-x-5.25 h-5 relative float-left -ml-12 w-10 cursor-pointer appearance-none border border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain bg-left bg-no-repeat align-top transition-all after:absolute after:top-px after:h-4 after:w-4 after:translate-x-px after:bg-white after:content-[''] checked:border-slate-800/95 checked:bg-slate-800/95 checked:bg-none checked:bg-right" type="checkbox" checked="" />
                      <label class="mb-2 ml-1 font-normal cursor-pointer select-none text-sm text-slate-700" for="rememberMe">Remember me</label>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="inline-block w-full px-6 py-3 mt-6 mb-0 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer shadow-soft-md bg-x-25 bg-150 leading-pro text-xs ease-soft-in tracking-tight-soft bg-gradient-to-tl from-blue-600 to-cyan-400 hover:scale-102 hover:shadow-soft-xs active:opacity-85">Sign in</button>
                    </div>
                  </form>
                </div>
                <div class="p-6 px-1 pt-0 text-center bg-transparent border-t-0 border-t-solid rounded-b-2xl lg:px-2">
                  <p class="mx-auto mb-6 leading-normal text-sm">
                    Tidak punya akun?
                    <a href="{{ route('registrasi') }}" class="relative z-10 font-semibold text-transparent bg-gradient-to-tl from-blue-600 to-cyan-400 bg-clip-text">Registrasi</a>
                  </p>
                </div>
                <div class="relative w-full max-w-full px-3 mb-5 mt-2 text-center shrink-0">
                  <p class="z-20 inline px-4 mb-2 font-semibold leading-normal bg-white text-sm text-slate-400">Login Dengan</p>
                </div>
                <div class="flex flex-wrap justify-center items-center px-3 mx-auto sm:px-6 xl:px-12">
                  <div class="max-w-full px-1 flex-0">
                    <a class="inline-block w-full px-6 py-3 mb-4 font-bold text-center text-gray-200 uppercase align-middle transition-all bg-transparent border border-gray-200 border-solid rounded-lg shadow-none cursor-pointer hover:scale-102 leading-pro text-xs ease-soft-in tracking-tight-soft bg-150 bg-x-25 hover:bg-transparent hover:opacity-75" href="javascript:;">
                      <svg width="24px" height="32px" viewBox="0 0 64 64" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                          <g transform="translate(3.000000, 2.000000)" fill-rule="nonzero">
                            <path d="M57.8123233,30.1515267 C57.8123233,27.7263183 57.6155321,25.9565533 57.1896408,24.1212666 L29.4960833,24.1212666 L29.4960833,35.0674653 L45.7515771,35.0674653 C45.4239683,37.7877475 43.6542033,41.8844383 39.7213169,44.6372555 L39.6661883,45.0037254 L48.4223791,51.7870338 L49.0290201,51.8475849 C54.6004021,46.7020943 57.8123233,39.1313952 57.8123233,30.1515267" fill="#4285F4"></path>
                            <path d="M29.4960833,58.9921667 C37.4599129,58.9921667 44.1456164,56.3701671 49.0290201,51.8475849 L39.7213169,44.6372555 C37.2305867,46.3742596 33.887622,47.5868638 29.4960833,47.5868638 C21.6960582,47.5868638 15.0758763,42.4415991 12.7159637,35.3297782 L12.3700541,35.3591501 L3.26524241,42.4054492 L3.14617358,42.736447 C7.9965904,52.3717589 17.959737,58.9921667 29.4960833,58.9921667" fill="#34A853"></path>
                            <path d="M12.7159637,35.3297782 C12.0932812,33.4944915 11.7329116,31.5279353 11.7329116,29.4960833 C11.7329116,27.4640054 12.0932812,25.4976752 12.6832029,23.6623884 L12.6667095,23.2715173 L3.44779955,16.1120237 L3.14617358,16.2554937 C1.14708246,20.2539019 0,24.7439491 0,29.4960833 C0,34.2482175 1.14708246,38.7380388 3.14617358,42.736447 L12.7159637,35.3297782" fill="#FBBC05"></path>
                            <path d="M29.4960833,11.4050769 C35.0347044,11.4050769 38.7707997,13.7975244 40.9011602,15.7968415 L49.2255853,7.66898166 C44.1130815,2.91684746 37.4599129,0 29.4960833,0 C17.959737,0 7.9965904,6.62018183 3.14617358,16.2554937 L12.6832029,23.6623884 C15.0758763,16.5505675 21.6960582,11.4050769 29.4960833,11.4050769" fill="#EB4335"></path>
                          </g>
                        </g>
                      </svg>
                    </a>
                  </div>
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

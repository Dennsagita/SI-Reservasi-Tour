@extends('layouts.app')
@section('action')
@section('title', 'Ubah Password')

@section('content')
<main class="mt-0 transition-all duration-200 ease-soft-in-out">
    <section class="min-h-screen mb-32">
      <div class="relative flex items-start pt-12 pb-56 m-4 overflow-hidden bg-center bg-cover min-h-50-screen rounded-xl" style="background-image: url('../assets/img/curved-images/curved14.jpg')">
        <span class="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-gray-900 to-slate-800 opacity-60"></span>
        <div class="container z-10">
          <div class="flex flex-wrap justify-center -mx-3">
            <div class="w-full max-w-full px-3 mx-auto mt-0 text-center lg:flex-0 shrink-0 lg:w-5/12">
              <h1 class="mt-12 mb-2 text-white">Welcome!</h1>
              <p class="text-white">Use these awesome forms to login or create new account in your project for free.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="flex flex-wrap -mx-3 -mt-48 md:-mt-56 lg:-mt-48">
          <div class="w-full max-w-full px-3 mx-auto mt-0 md:flex-0 shrink-0 md:w-7/12 lg:w-5/12 xl:w-4/12">
            <div class="relative z-0 flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
              <div class="p-6 mb-0 text-center bg-white border-b-0 rounded-t-2xl">
                <h5 class="font-bold">Password Baru</h5>
              </div>
              @if ($errors->any())
              <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-white dark:text-red-400" role="alert">
                  <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                  <span class="sr-only">Danger</span>
                  <div>
                  <span class="font-medium">Ensure that these requirements are met:</span>
                      <ul class="mt-1.5 ml-4 list-disc list-inside">
                          @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              </div>
              @endif
              <div class="flex-auto p-6">
                <form action="{{ route('processResetPassword') }}" method="post">
                  {{ csrf_field() }}
                  <input type="hidden" name="token" value="{{ request()->token }}">
                  <input type="hidden" name="email" value="{{ request()->email }}">
                  <label class="mb-2 ml-1 cursor-pointer select-none text-sm font-bold text-slate-700" for="old_password">Masukan Password Baru</label>
                  <div class="mb-4">
                    <input type="password"  id="password" name="password" required  class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Password Baru" aria-label="password-baru" aria-describedby="email-addon" />
                  </div>
                  <label class="mb-2 ml-1 cursor-pointer select-none text-sm font-bold text-slate-700" for="new_password">Konfirmasi Password Baru</label>
                  <div class="mb-4">
                    <input type="password"  id="password_confirmation" name="password_confirmation" required class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Konfirmasi Password" aria-label="konfirmasi_password" aria-describedby="email-addon" />
                  </div>
                  <div class="text-center">
                    <button type="submit" class="inline-block w-full px-6 py-3 mt-6 mb-2 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer active:opacity-85 hover:scale-102 hover:shadow-soft-xs leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-gray-900 to-slate-800 hover:border-slate-700 hover:bg-slate-700 hover:text-white">Reset Password</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@stop
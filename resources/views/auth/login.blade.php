@extends('layouts.global')
@section('title')
    Login
@endsection
@section('content')
<div class="bg-[#E2FFC3] min-h-screen flex items-center">
    <div class="w-full">
      <div class="bg-white p-10 rounded-lg shadow md:w-3/4 mx-auto lg:w-2/5">
        <p class="text-center font-bold text-2xl uppercase mb-10">Login</p>
        <form action="{{route('login.action')}}" method="post" enctype="multipart/form-data" class="w-full flex flex-col items-start">
            @csrf
            @if (session('error'))
                <div class="w-full relative mb-6">
                    <div class="p-2 rounded-sm bg-red-100 ring-1 ring-red-500">
                        <p class="text-red-500">
                            {{ session('error') }}
                        </p>
                    </div>
                </div>
            @endif
          <div class="mb-5 w-full">
            <label for="name" class="block mb-2 font-bold text-gray-600">Username</label>
            <input type="text" name="username" placeholder="Username" class="border border-gray-300 shadow p-3 w-full rounded mb-">
          </div>

          <div class="mb-5 w-full">
            <label for="password" class="block mb-2 font-bold text-gray-600">Password</label>
            <input type="password" name="password" placeholder="Password" class="border border-gray-300 shadow p-3 w-full rounded mb-">
          </div>

          <div class="mb-5 w-full">
            <label for="password" class="block mb-2 font-bold text-gray-600"> Role </label>
            <select name="role" class="mb-5 border border-gray-300 shadow p-3 w-full rounded mb-">
                <option value="penjual">Penjual</option>
                <option value="pembeli">Pengguna</option>
            </select>
          </div>
          
          <button class="block w-full bg-blue-500 text-white font-bold p-4 rounded-lg">Submit</button>
          <div class="ml-1 my-4">
            <span class="text-black text-lg font-normal">Belum punya akun? </span>
            <span class="text-black text-lg font-bold hover:text-blue-800"><a href="{{route('register')}}">Sign in disini!</a></span>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

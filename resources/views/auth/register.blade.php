@extends('layouts.global')
@section('title')
    Register
@endsection

@section('content')
<div class="bg-[#E2FFC3] min-h-screen flex items-center">
    <div class="w-full">
      <div class="bg-white p-10 rounded-lg shadow md:w-3/4 mx-auto lg:w-2/5">
        <p class="text-center font-bold text-2xl uppercase mb-10">Register</p>
        <form action="{{route('register.action')}}" method="post" class="w-full flex flex-col items-start">
            @csrf
            @if(session('error'))
                    <div class="w-full relative mb-6">
                        <div class="p-2 rounded-sm bg-red-100 ring-1 ring-red-500">
                            <p class="text-red-500">
                                {{ session('error') }}
                            </p>
                        </div>
                    </div>
                @endif
                @if(session('success'))
                    <div class="w-full relative mb-6">
                        <div class="p-2 rounded-sm bg-green-100 ring-1 ring-green-500">
                            <p class="text-green-500">
                                {{ session('success') }}
                            </p>
                        </div>
                    </div>
                @endif
          <div class="mb-5 w-full">
            <label for="name" class="block mb-2 font-bold text-gray-600">Username</label>
            <input type="text" name="username" placeholder="Username" class="border border-gray-300 shadow p-3 w-full rounded mb-">
          </div>

          <div class="mb-5 w-full">
            <label for="name" class="block mb-2 font-bold text-gray-600">Email</label>
            <input type="email" name="email" placeholder="Email" class="border border-gray-300 shadow p-3 w-full rounded mb-">
          </div>

          <div class="mb-5 w-full">
            <label for="password" class="block mb-2 font-bold text-gray-600">Password</label>
            <input type="password" name="password" placeholder="Password" class="border border-gray-300 shadow p-3 w-full rounded mb-">
          </div>

          <div class="mb-5 w-full">
            <label for="password" class="block mb-2 font-bold text-gray-600">Confirm Password</label>
            <input type="password" name="confirm_password" placeholder="Confirm Password" class="border border-gray-300 shadow p-3 w-full rounded mb-">
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

            <span class="text-black text-lg font-normal">Sudah punya akun? </span>
            <span class="text-black text-lg font-bold hover:text-blue-800"><a href="{{route('login')}}">Login disini!</a></span>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

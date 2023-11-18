@extends('layouts.global')
@section('title')
    Ubah Profil
@endsection

@section('content')
<div class="bg-[#E2FFC3] min-h-screen flex items-center">
    <div class="w-full">
        <div class="bg-white p-10 rounded-lg shadow md:w-3/4 mx-auto lg:w-2/5">
            <div class="mb-4">
                <a href="/" class="text-blue-500">&larr; Kembali</a>
            </div>
            <p class="text-center font-bold text-2xl uppercase mb-10">Ubah Profil</p>
            <form action="{{route('profile.update')}}" method="post" class="w-full flex flex-col items-start">
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
            <input type="text" name="username" placeholder="Username" value="{{ Auth::user()->username }}" class="border border-gray-300 shadow p-3 w-full rounded mb-">
          </div>

          <div class="mb-5 w-full">
            <label for="name" class="block mb-2 font-bold text-gray-600">Email</label>
            <input type="email" name="email" placeholder="Email" value="{{ Auth::user()->email }}" class="border border-gray-300 shadow p-3 w-full rounded mb-">
          </div>

          <div class="mb-5 w-full">
            <label for="password" class="block mb-2 font-bold text-gray-600">New Password</label>
            <input type="password" name="new_password" placeholder="New Password" class="border border-gray-300 shadow p-3 w-full rounded mb-">
          </div>

          <div class="mb-5 w-full">
            <label for="password" class="block mb-2 font-bold text-gray-600">Confirm New Password</label>
            <input type="password" name="confirm_password" placeholder="Confirm New Password" class="border border-gray-300 shadow p-3 w-full rounded mb-">
          </div>

          <button class="block w-full bg-blue-500 text-white font-bold p-4 rounded-lg">UBAH</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

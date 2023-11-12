@extends('layouts.global')
@section('title')
    Register
@endsection

@section('content')
<div class="h-screen bg-[#8194EB] w-screen flex">
    <div class="w-[770px] h-[596px] bg-sky-100 rounded-[30px] ml-16  my-6 flex items-center justify-center">
        <img src="{{ asset('assets/images/regis.png') }}" class="">
    </div>
    <div class="w-[450px] h-[596px] bg-sky-100 rounded-[30px] mx-2 my-6 flex items-center justify-center">
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

            <p class="text-black text-[25px] font-bold font-['Kantumruy'] mx-auto">REGISTRASI</p>
            <p class="text-left mb-1 mx-8">Username</p>
            <div>
                <input type="username" name="username" placeholder="Username" class="w-[381px] h-[46px] bg-indigo-50 rounded-[11px] shadow border border-black mx-8 mb-4">
            </div>
            <p class="text-left mb-1 mx-8">Email</p>
            <div>
                <input type="Email" name="email" placeholder="Email" class="w-[381px] h-[46px] bg-indigo-50 rounded-[11px] shadow border border-black mx-8 mb-4">
            </div>
            <p class="text-left mb-1 mx-8">Password</p>
            <div>
                <input type="password" name="password" placeholder="Password" class="w-[381px] h-[46px] bg-indigo-50 rounded-[11px] shadow border border-black mx-8 mb-4">
            </div>
            <p class="text-left mb-1 mx-8">Confirm Password</p>
            <div>
                <input type="password" name="confirm_password" placeholder="Password" class="w-[381px] h-[46px] bg-indigo-50 rounded-[11px] shadow border border-black mx-8 mb-4">
            </div>
            <p class="text-left mb-1 mx-8">Masuk Sebagai</p>
            <div>
                <select name="role">
                    <option value="penjual">Penjual</option>
                    <option value="pembeli">Pengguna</option>
                </select>
            </div>
                <button type="submit" class="w-[231px] h-[46px] bg-indigo-400 rounded-[11px] shadow border border-black flex items-center justify-center mx-auto">
                    <p class="text-black text-xl font-bold font-['Kantumruy']">REGISTER</p>
                </button>
            <div class="ml-8 my-4">
                <span class="text-black text-lg font-normal">Sudah punya akun? </span>
                <span class="text-black text-lg font-bold hover:text-blue-800"><a href="{{route('login')}}">Login disini!</a></span>
            </div>
        </form>
    </div>
</div>
@endsection

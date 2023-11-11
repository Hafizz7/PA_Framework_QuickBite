@extends('layouts.global')
@section('title')
    Login
@endsection
@section('content')
<div class="h-screen bg-[#8194EB] w-screen flex">
    <div class="w-[770px] h-[596px] bg-sky-100 rounded-[30px] ml-16  my-6 flex items-center justify-center">
        <img src="{{ asset('assets/images/login.png') }}" class="">
    </div>
    <div class="w-[450px] h-[596px] bg-sky-100 rounded-[30px] mx-2 my-6 flex items-center justify-center">
        <form action="{{route('login.action')}}" method="post" class="w-full flex flex-col items-start">
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
            <p class="text-black text-[25px] font-bold font-['Kantumruy'] mx-auto">LOGIN</p>
            <p class="text-left mb-1 mx-8">Username</p>
            <div>
                <input type="username" name="username" placeholder="Username" class="w-[381px] h-[46px] bg-indigo-50 rounded-[11px] shadow border border-black mx-8 mb-4">
            </div>
            <p class="text-left mb-1 mx-8">Username</p>
            <div>
                <input type="password" name="password" placeholder="Password" class="w-[381px] h-[46px] bg-indigo-50 rounded-[11px] shadow border border-black mx-8 mb-4">
            </div>
                <button type="submit" class="w-[231px] h-[46px] bg-indigo-400 rounded-[11px] shadow border border-black flex items-center justify-center mx-auto">
                    <p class="w-[68px] h-[33px] text-black text-xl font-bold font-['Kantumruy']">LOGIN</p>
                </button>
            <div class="ml-8 my-4">
                <span class="text-black text-lg font-normal">Belum punya akun? </span>
                <span class="text-black text-lg font-bold hover:text-blue-800"><a href="{{route('register')}}">Sign in disini!</a></span>
            </div>
        </from>
    </div>
</div>

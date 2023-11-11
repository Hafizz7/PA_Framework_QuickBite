@extends('layouts.global')
@section('title')
Toko
@endsection

@section('content')
<div class="w-full h-full flex">
    @include('components.sidebar')
    <div class="w-full h-screen flex gap-4 flex-col bg-slate-100 p-2 justify-center items-center">
        <div class="w-[350px] h-[350px] bg-white rounded-full drop-shadow-md">
            <img src="" alt="">
        </div>
        <div class=" p-4 w-3/5 mx-4 bg-white rounded-lg drop-shadow-md">
            <p class="text-xl font-bold">Aktivitas Terbaru</p>
        </div>
        <div class=" p-4 w-3/5 mx-4 bg-white rounded-lg drop-shadow-md">
            <p class="text-xl font-bold">Aktivitas Terbaru</p>
        </div>
        <div class=" p-4 w-3/5 mx-4 bg-white rounded-lg drop-shadow-md">
            <p class="text-xl font-bold">Aktivitas Terbaru</p>
        </div>
        <div class=" p-4 w-3/5 mx-4 bg-white rounded-lg drop-shadow-md">
            <p class="text-xl font-bold">Aktivitas Terbaru</p>
        </div>
    </div>
</div>
@endsection

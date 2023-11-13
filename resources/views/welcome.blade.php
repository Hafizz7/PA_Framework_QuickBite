@extends('layouts.global')
@section('title')
    Data Barang
@endsection
@section('content')
<body>

@include('components.navbar')
{{-- hero --}}
<div class="w-screen flex h-[340px] bg-slate-700 ">
    <div class="bg-[#D3F2B2] w-3/4 ">
        <div class=" w-3/5 ml-24 h-5/6 mt-9">
            <div class="h-32 w-3/4 text-black text-5xl font-semibold font-['Inter']">
                Makan enak? QuickBite aja
            </div>
            <div class=" text-black text-xl font-normal font-['Inter']">
                Pesen yang bikin perut nyaman langsung di sini, semudah di aplikasi. Sama cepetnya dan banyak pilihan
                restonya.
            </div>
            <form>
                <div class="h-12 w-9/12 bg-zinc-300 rounded-[13px] shadow-lg flex justify-end items-center mt-4">
                    <input type="text"
                        class="w-full h-[39px] bg-transparent border-none focus:outline-none rounded-tl-[45px] rounded-tr-[13px] rounded-bl-lg rounded-br-lg pl-4"
                        placeholder="Cari..." />
                    <button
                        class="w-[82px] h-[39px] bg-[#84B74E] rounded-tl-[45px] rounded-tr-[13px] rounded-br-lg mr-2 text-white">GO</button>
                </div>
            </form>
        </div>
    </div>
    <div class="bg-slate-900 static ">
        <div class="left-[790px] top-[90px] absolute z-0">
            <img class="w-[282px] h-[282px] rounded-full shadow-lg" src="https://via.placeholder.com/322x325" />
        </div>

    </div>
    <div class="bg-[#84B74E] w-2/6">
    </div>
</div>

<div class="h-auto w-screen flex items-center justify-center flex-wrap">
    <div class=" w-full mx-16 my-2 flex flex-wrap gap-10 ">
        <div class="w-[275px] h-[290px]">
            <div class="w-full h-full rounded-[20px] border border-black">
                <div class="w-[262px] h-44 rounded-[20px] border border-black ml-1 mt-1">
                    <img src="{{ asset('assets/images/Makanbang.png') }}" class="w-[262px] h-44 rounded-[20px] "
                        alt="">
                </div>
                <div class="text-black text-[22px] font-normal font-['Inter'] ml-1">Rumah Makan Emmak Asep</div>
                <div class="text-black text-xs font-light font-['Inter'] ml-1">Menjual beraneka macam ragam hayati</div>
                <div class="text-black text-lg font-normal font-['Inter'] ml-1">Samarinda</div>
            </div>
        </div>
        @foreach ($toko1 as $tkh)
            <a href="{{ route('getToko', ['id' => $tkh->id]) }}">
                <div class="w-[275px] h-[290px]">
                    <div class="w-full h-full rounded-[20px] border border-black">
                        <div class="w-[262px] h-44 rounded-[20px] border border-black ml-1 mt-1">
                            <img src="{{ asset('images/' . $tkh->gambar) }}" class="w-[262px] h-44 rounded-[20px]">
                        </div>
                        <div class="text-black text-[22px] font-normal font-['Inter'] ml-1">{{$tkh->nama_toko}}</div>
                        <div class="text-black text-xs font-light font-['Inter'] ml-1">Menjual beraneka macam ragam hayati</div>
                        <div class="text-black text-lg font-normal font-['Inter'] ml-1">Samarinda</div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
</body>

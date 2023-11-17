@extends('layouts.global')
@section('title')
    Daftar Menu dan Makanan
@endsection
@section('content')
<body>
@include('components.navbar')
@foreach ($tokosss as $tkh)
<div class="w-screen flex h-[440px]  justify-center">
    <div class="bg-[rgb(211,242,178)] w-8/12 h-3/5 mt-36 flex flex-col justify-center items-center rounded-xl">
        <div class="bg-slate-900 static justify-center flex">
            <div class=" top-[90px] absolute z-0">
                <img class="w-[252px] h-[252px] rounded-full shadow-lg" src="{{ asset('images/toko/' . $tkh->gambar) }}" />
            </div>
        </div>
        <div class=" mt-28">
            {{-- <h1 class="text-black text-3xl font-semibold font-['Inter']">Rumah Makan Emmak Asep</h1> --}}
            <h1 class="text-black text-3xl font-semibold font-['Inter']">{{$tkh->nama_toko}}</h1>
        </div>
        <div>
            <h1 class="text-black text-lg font-light font-['Inter']">{{$tkh->deskripsi_toko}}</h1>
        </div>
        <div>
            <h1 class="text-black text-lg font-light font-['Inter']">{{$tkh->alamat}}</h1>
        </div>
    </div>


</div>
@endforeach
@foreach ($menusss as $mnu)
<div class="h-auto w-screen  flex items-center flex-wrap">
    <h1 class="text-black text-3xl font-medium font-['Inter'] text-left ml-[5%]">{{$mnu->nama_menu}}</h1>
    <div class=" w-full mx-16 my-2 flex flex-wrap gap-10 bg-[#E6F9D3] rounded-xl">
        @foreach ($makanansss->where('id_menu', $mnu->id) as $mkn)
        <div class="w-[275px] h-[334px]">
            <div class="w-full h-full rounded-xl border-2 border-[#84B74E]">
                <div class="w-[262px] h-44 rounded-xl ml-1 mt-1">
                    <img src="{{ asset('images/makanan/'.$mkn->gambar) }}" class="w-[260px] h-44 rounded-xl"alt="">
                </div>
                <div class="text-black text-[22px] font-normal font-['Inter'] ml-1 h-16 items-center flex">{{$mkn->nama}}</div>
                <div class="text-black text-sm font-light font-['Inter'] ml-1">{{$mkn->deskripsi}}</div>
                <div class="flex flex-row mt-1">
                    <div class="bg-[#84B74E] mr-3 ml-1 rounded-md w-20 h-8 flex items-center justify-center">
                        <h1 class="text-sm">{{$mkn->harga}}</h1>
                    </div>
                    <div class="bg-[#84B74E] rounded-md w-20 h-8 flex items-center justify-center">
                        <a href="">
                        <h1 class="">Buy Now</h1>
                        </a>
                    </div>

                    <div class="bg-[#84B74E] ml-10 mr-2 w-24 h-8 flex items-center justify-center rounded-tl-[35.45px] rounded-tr-[10px] rounded-br-[10px]">
                        {{-- <a href="{{ route('getToko', ['id' => $tkh->id]) }}"> --}}
                        {{-- <a href="{{route('pembeli.addKeranjang', $mkn->id)}}"> --}}
                        {{-- <a href="{{route('getMakanan', ['id' => $mkn->id])}}"> --}}
                        <a href="{{route('pembeli.addKeranjangg', $mkn->id)}}">
                        <h1>tambah</h1>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endforeach
</body>






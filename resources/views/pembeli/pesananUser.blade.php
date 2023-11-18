@extends('layouts.global')
@section('title')
    Register
@endsection

@section('content')
    <div class="bg-[#E2FFC3] min-h-screen flex items-center">
        <div class="w-full">
            <div class="bg-white px-10 rounded-lg shadow md:w-3/4 mx-auto lg:w-2/5 h-screen ">
                <form action="{{ route('pembeli.pushpesanankuyyyyy') }}" method="post" class="w-full flex flex-col items-start">
                    @csrf
                    @if ($errors->any())
                        <div class="bg-red-500 text-white p-2 rounded-md">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <a href="/" class="text-blue-500">
                        <div class="text-black py-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                            </svg>
                        </div>
                    </a>
                    <div class="w-full h-[80px]">
                        <h1>Alamat Anda</h1>
                        <select id="pilihAlamat" name="pilih_alamat"
                            class="border border-gray-300 shadow p-3 w-full rounded mb-">
                            @foreach ($alamatss as $alt)
                                <option value="{{ $alt->alamat }}">{{ $alt->alamat }}</option>
                            @endforeach
                        </select>
                        <a href="{{route('pembeli.getALamat')}}">
                            <h1>Input Alamat Baru?</h1>
                        </a>
                    </div>
                    <input type="hidden" name="id_user" placeholder="id_user" value="{{ Auth::id() }}">
                    @foreach ($keranjangku as $krjg )
                        <div class="  w-full mt-6 h-[80px] flex flex-row">
                            <div class="w-[30%] flex">
                                <img src="{{ asset('images/makanan/' . $krjg->gambar) }}">
                            </div>
                            <div class=" ml-4 w-full">
                                <h1>{{$krjg->nama}}</h1>
                                <h1>{{$krjg->harga}}</h1>
                            </div>
                        </div>
                    @endforeach
                    <div
                        class="flex flex-row items-center w-[40%]  h-[8%] bg-blue-500 text-white fixed bottom-0 left-[30%] mb-1">
                        <div class=" bg-[#84B74E] px-2 w-[60%] h-full justify-start items-start flex flex-col">
                            <h1>Total Harga</h1>
                            <h1 class="text-xl">{{$keranjangku->sum('harga')}}</h1>
                        </div>
                        <div class=" h-full flex items-center justify-center w-[50%]">
                            <button class="block w-full bg-blue-500 text-white font-bold" onclick="return confirm('Apakah Anda yakin ingin melakukan pembelian ini?');">Submit</button>
                        </div>
                    </div>
                    {{-- <button class="block w-[40%] bg-blue-500 text-white font-bold p-4 rounded-lg fixed bottom-0 left-[30%]">Submit</button> --}}
                    <div class="ml-1 my-4">
                    </div>

                </form>
            </div>
        </div>
    </div>
    </div>
@endsection

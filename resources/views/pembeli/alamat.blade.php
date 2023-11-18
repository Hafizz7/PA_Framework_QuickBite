@extends('layouts.global')
@section('title')
    Tambah Data Makanan
@endsection

@section('content')
    <div class="bg-[#E2FFC3] min-h-screen flex items-center">
        <div class="w-full">
            <div class="bg-white p-10 rounded-lg shadow md:w-3/4 mx-auto lg:w-1/2">
                <div class="mb-4">
                    <a href="{{ route('pembeli.getalamatkuyyyy') }}" class="text-blue-500">
                        <div class="text-black">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                            </svg>
                        </div>
                    </a>
                </div>
                <form action="{{ route('pembeli.pushAlamat') }}" method="post" class="w-full flex flex-col items-start">
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
                    <p class="text-black text-[25px] font-bold text-2xl mx-auto">Input Alamat Anda</p>
                    <input type="hidden" name="id_user" placeholder="id_user" value="{{ Auth::id() }}">

                    <div class="mb-5 w-full" id="alamatBaru">
                        <label for="name" class="block mb-2 font-bold text-gray-600">Alamat Baru</label>
                        <input type="text" name="alamat" placeholder="Alamat..."
                            class="border border-gray-300 shadow p-3 w-full rounded mb-">

                    </div>
                    <button class="block w-full bg-blue-500 text-white font-bold p-4 rounded-lg mt-7"
                        onclick="return confirm('Apakah Anda yakin ingin melakukan pembelian ini?');">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.global')
@section('title')
    QuickBite
@endsection
@section('content')

    <body>
        @include('components.navbar')
        {{-- hero --}}
        <section id="toko" class="h-auto bg-gray-100 flex items-start overflow-x-auto">

            <div class="container mx-auto py-4 px-14 text-white">
                <div class="flex justify-start flex-wrap">
                    <!-- Card -->
                    @foreach ($toko1 as $tkh)
                        <a href="{{ route('getToko', ['id' => $tkh->id]) }}" class="px-2 py-2">
                            <div class="border max-w-fit bg-[#D3F2B2] bg-opacity-60 p-4 rounded-2xl hover-card overflow-hidden transform transition-transform duration-300 ease-in-out hover:scale-105 border-spacing-1 border-black border-opacity-40 flex-shrink-0">
                                <img src="{{ asset('images/toko/' . $tkh->gambar) }}" alt="Gambar Toko" class="w-full h-32 object-cover mb-4 rounded">
                                <h1 class="text-black text-xl font-medium text-center py-1">{{ $tkh->nama_toko }}</h1>
                                <p class="text-black text-xs font-normal pt-2 font-['Inter'] ml-1">{{ $tkh->deskripsi_toko }}</p>
                                <p class="text-black text-md font-normal font-['Inter'] ml-1">{{ $tkh->alamat }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    </body>

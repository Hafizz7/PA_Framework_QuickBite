@extends('layouts.global')
@section('title')
    QuickBite
@endsection
@section('content')
    @include('components.navbar')
    {{-- hero --}}
    <div id="#home" class="w-full flex h-fit bg-slate-700 ">
        <div class="bg-[#D3F2B2] w-3/4 ">
            <div class=" w-3/5 mx-20 h-full mt-9">

                <div class="h-32 w-3/4 text-black text-5xl font-semibold font-['Inter']">
                    Makan enak? QuickBite aja
                </div>
                <div class=" text-black text-xl font-normal font-['Inter']">
                    Pesen yang bikin perut nyaman langsung di sini, semudah di aplikasi. Sama cepetnya dan banyak
                    pilihan
                    restonya.
                </div>
                <form>
                    <div class="h-12 w-9/12 bg-white rounded-[13px] shadow-lg flex justify-end items-center mt-4">
                        <input type="text"
                            class="w-full h-[39px] bg-transparent border-none focus:outline-none rounded-tl-[45px] rounded-tr-[13px] rounded-bl-lg rounded-br-lg pl-4"
                            placeholder="Cari..." />
                        <button id="toko"
                            class="w-[82px] h-[39px] bg-[#84B74E] rounded-tl-[45px] rounded-tr-[13px] rounded-br-lg mr-2 text-white">GO</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="bg-slate-900 static ">
            <div class="left-[60%] top-[90px] absolute z-0">
                <img class="w-[282px] h-[282px] rounded-full shadow-lg" src="assets/images/Makann.jpg">
            </div>

        </div>
        <div class="bg-[#84B74E] w-2/6">
        </div>
    </div>
    {{-- <section id="toko" class="h-[80vh] bg-[#B7D1A4] flex items-start overflow-x-auto">

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
        </section> --}}
    <div class="bg-[#B7D1A4] min-h-fit p-10">
        <div class="container mx-auto">
            <h2 class="text-2xl font-bold mb-4">Daftar Toko</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ($toko1 as $tkh)
                    <div class="bg-[#D3F2B2] p-4 rounded-md shadow-md">
                        <img src="{{ asset('images/toko/' . $tkh->gambar) }}" alt="Toko Image"
                            class="w-full h-32 object-cover mb-4 rounded">
                        <h3 class="text-lg font-semibold mb-2">{{ $tkh->nama_toko }}</h3>
                        <p class="text-gray-600 text-sm mb-2 truncate">{{ $tkh->deskripsi_toko }}</p>
                        <p class="text-gray-800 text-sm mb-4 truncate">{{ $tkh->alamat }}</p>
                        <a href="{{ route('getToko', ['id' => $tkh->id]) }}"
                            class="bg-[#84B74E] hover:bg-opacity-90 text-white font-bold py-2 mb-4 px-4 rounded">
                            Lihat Detail Toko
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{--  --}}
    <div id="about" class="bg-[#89C07E] py-4">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-8">About Us</h2>
            </p>
        </div>
    </div>
    <div class="flex bg-[#89C07E] p-8 px-20 -mt-10">
        <div class="w-2/3 bg-[#84B74E] p-8 rounded-tl-md rounded-bl-md shadow-md">
            <div class="w-3/4 mx-auto flex items-center">
                <div>
                    <div class="py-4 text-black text-4xl font-semibold font-['Inter'] mb-2">
                        QuickBite
                    </div>
                    <div class="text-black text-xl font-normal font-['Inter'] mb-4">
                        QuickBite didesain dan dikembangkan sebagai proyek akhir Framework oleh Muh. Hafiz dan
                        Andi Rachmad. Kami berkomitmen untuk memberikan pengalaman yang nyaman
                        bagi pembeli dalam memesan makanan dari toko-toko favorit mereka. Bagi penjual, QuickBite
                        menyediakan platform untuk menampilkan dan menjual menu makanan
                        secara online. Anda dapat menambahkan toko Anda dan memasarkan makanan dengan mudah.
                    </div>
                </div>
            </div>
        </div>


        <div class="w-1/3 bg-[#D3F2B2] p-8 rounded-tr-md rounded-br-md shadow-md">
            <h2 class="text-2xl font-bold mb-8 ">Our Team</h2>
            <div class="grid grid-cols-1 gap-6">
                <div class="flex items-center mb-4">
                    <img src="https://avatars.githubusercontent.com/Hafizz7" alt="Muh. Hafiz Avatar"
                        class="w-16 h-16 rounded-full mr-4">
                    <div>
                        <h4 class="text-lg font-semibold">Muh. Hafiz</h4>
                        <p class="text-gray-600 mb-2">Mahasiswa</p>
                        <a href="https://github.com/Hafizz7" target="_blank" class="hover:text-gray-600"><svg
                                class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                    clip-rule="evenodd" />
                            </svg></a>
                    </div>
                </div>
                <hr class="my-6 border-t border-gray-600">
                <div class="flex items-center mb-4">
                    <img src="https://avatars.githubusercontent.com/andirchmd" alt="Andi Rachmad Triandika Rusli Avatar"
                        class="w-16 h-16 rounded-full mr-4">
                    <div>
                        <h4 class="text-lg font-semibold">Andi Rachmad Triandika Rusli</h4>
                        <p class="text-gray-600 mb-2">Mahasiswa</p>
                        <a href="https://github.com/andirchmd" target="_blank"class="hover:text-gray-600"><svg
                                class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                    clip-rule="evenodd" />
                            </svg></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.footer')
@endsection

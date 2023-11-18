@extends('layouts.global')
@section('title')
    Tambah Data Makanan
@endsection

@section('content')
    <div class="bg-[#E2FFC3] min-h-screen flex items-center">
        <div class="w-full">
            <div class="bg-white p-10 rounded-lg shadow md:w-3/4 mx-auto lg:w-1/2">
                <form action="{{ route('pembeli.pushAlamat') }}" method="post" class="w-full flex flex-col items-start">
                    @csrf
                    <p class="text-black text-[25px] font-bold text-2xl mx-auto">Input Alamat Anda</p>
                    {{-- @if ($errors->any())
                        <div class="bg-red-500 text-white p-2 rounded-md">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}

                    <div class="mb-5 w-full">
                        <label for="alamat" class="block mb-2 font-bold text-gray-600">Alamat</label>
                        @if ($alamatsss->isEmpty())
                            <input type="text" name="alamat_baru_lagiii" placeholder="Alamat..."
                                class="border border-gray-300 shadow p-3 w-full rounded mb-">
                        @else
                            <select id="pilihAlamat" name="pilih_alamat"
                                class="mb-5 border border-gray-300 shadow p-3 w-full rounded mb-">
                                @foreach ($alamatsss as $alt)
                                    <option value="{{ $alt->alamat }}">{{ $alt->alamat }}</option>
                                @endforeach
                                <option value="alamatbaharuuu">Alamat Yang Baru</option>
                            </select>
                        @endif
                    </div>
                    <input type="hidden" name="id_user" placeholder="id_user" value="{{ Auth::id() }}">

                    <div class="mb-5 w-full" id="alamatBaru" style="display: none;">
                        <label for="name" class="block mb-2 font-bold text-gray-600">Alamat Baru</label>
                        <input type="text" name="alamat_baru" placeholder="Alamat..."
                            class="border border-gray-300 shadow p-3 w-full rounded mb-">

                    </div>
                    <button class="block w-full bg-blue-500 text-white font-bold p-4 rounded-lg mt-7">Submit</button>
                    <a href="{{ route('welcomeee') }}" class="w-full bg-blue-500 text-white font-bold p-4 rounded-lg mt-4">
                        <h1 class="text-center">Batal</h1>
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectAlamat = document.getElementById('pilihAlamat');
        const divAlamatBaru = document.getElementById('alamatBaru');

        selectAlamat.addEventListener('change', function() {
            const selectedValue = selectAlamat.value;
            divAlamatBaru.style.display = selectedValue === 'alamatbaharuuu' ? 'block' : 'none';
        });
    });
</script>


@extends('layouts.global')
@section('title')
    Tambah Data Toko
@endsection

@section('content')
    <div class="bg-blue-200 min-h-screen flex items-center">
        <div class="w-full">
            <div class="bg-white p-10 rounded-lg shadow md:w-3/4 mx-auto lg:w-1/2">
                <form action="{{ route('penjual.push') }}" method="post" enctype="multipart/form-data"
                    class="w-full flex flex-col items-start">
                    @csrf
                    <p class="text-black text-[25px] font-bold text-2xl mx-auto">Tambah Toko</p>
                    {{-- untuk menampilkan error jika ada --}}
                    @if ($errors->any())
                        <div class="bg-red-500 text-white p-2 rounded-md">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="mb-5 w-full">
                        <label for="name" class="block mb-2 font-bold text-gray-600">Nama Toko</label>
                        <input type="text" name="nama_toko" placeholder="Nama Toko..."
                            class="border border-gray-300 shadow p-3 w-full rounded mb-">
                    </div>

                    <div class="mb-5 w-full">
                        <label for="twitter" class="block mb-2 font-bold text-gray-600">Deskripsi Toko</label>
                        <input type="text" name="deskripsi_toko" placeholder="Deskripsi...."
                            class="border border-gray-300 shadow p-3 w-full rounded mb-">
                    </div>

                    <div class="mb-5 w-full">
                        <label for="twitter" class="block mb-2 font-bold text-gray-600">Gambar</label>
                        <input type="file" name="gambar" placeholder="Gambar...." required
                            class="border border-gray-300 shadow p-3 w-full rounded mb-">
                    </div>

                    <div class="mb-5 w-full">
                        <label for="alamat" class="block mb-2 font-bold text-gray-600">Alamat</label>
                        <input type="text" name="alamat" placeholder="Alamat...." required
                            class="border border-gray-300 shadow p-3 w-full rounded mb-">
                    </div>


                    <input type="hidden" name="id_user" placeholder="id_user" value="{{ Auth::id() }}">

                    <button class="block w-full bg-blue-500 text-white font-bold p-4 rounded-lg">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


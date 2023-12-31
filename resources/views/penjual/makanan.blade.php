@extends('layouts.global')
@section('title')
Dashboard - Makanan
@endsection

@section('content')
    <div class="w-full h-screen flex">
        @include('components.sidebar')
        <div class="w-full flex flex-col bg-slate-100 ml-64">
            <div class="m-4 p-8 relative bg-slate-100 rounded-lg drop-shadow-md">
                <p class="text-4xl font-bold mb-4">Data Makanan</p>
                <hr>

                <div class="w-full h-auto flex justify-end mt-2">
                    <a href="{{route('penjual.addMakanan')}}">
                        <button class="px-4 py-2 bg-green-600 rounded-md text text-white">Tambah</button>
                    </a>
                </div><br>
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Harga
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama Menu
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Deskripsi
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Gambar
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($makanan as $index=> $makanans)
                                <tr class="bg-white border-b">
                                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{$index+1}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$makanans->nama}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$makanans->harga}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$makanans->menu->nama_menu}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$makanans->deskripsi}}
                                    </td>

                                    <td class="px-6 py-4">
                                        <img src="{{ asset('images/makanan/' . $makanans->gambar) }}" class=" h-16">
                                        {{-- {{$makanans->gambar}} --}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="w-full h-auto flex flex-row">
                                            <a href="{{route('penjual.editMakanan', $makanans->id)}}">
                                                <button class="px-4 py-2 mr-1 bg-yellow-300 rounded-md text">Edit</button>
                                            </a>
                                            <form action="{{route('penjual.deleteMakanan', $makanans->id)}}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                @csrf
                                                <button class="px-4 py-2 bg-red-600 rounded-md text text-white">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

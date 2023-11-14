@extends('layouts.global')
@section('title')
Toko
@endsection

@section('content')
<div class="w-full h-screen flex">
    @include('components.sidebar')
    <div class="w-full flex flex-col bg-slate-100 ml-64">
        <div class="m-4 p-8 relative bg-slate-100 rounded-lg drop-shadow-md">
            <p class="text-4xl font-bold mb-4">Data Toko</p>
            <hr>

            @if ($tokotertentu->isEmpty())
            <div class="w-full h-auto flex justify-end mt-2">
                <a href="{{route('penjual.addToko')}}">
                    <button class="px-4 py-2 bg-green-600 rounded-md text text-white">Tambah</button>
                </a>
            </div><br>
            @endif
            @foreach ($tokotertentu as $tkh)
            {{-- <div class="w-full h-auto flex justify-end mt-2">
                <a href="{{route('penjual.addToko')}}">
                    <button class="px-4 py-2 bg-green-600 rounded-md text text-white">Tambah</button>
                </a>
            </div><br> --}}\
            <div class="flex flex-col w-full justify-center items-center">
                <div class="w-[200px] h-[200px] bg-white rounded-full drop-shadow-md">
                    <img src="{{asset('images/toko/'. $tkh->gambar)}}" alt="" class="rounded-full drop-shadow-md w-[200px] h-[200px]">
                </div>
            </div>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nama Toko
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Deskripsi
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Alamat
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr class="bg-white border-b">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{$tkh->nama_toko}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$tkh->deskripsi_toko}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$tkh->gambar}}
                                </td>
                                <td class="px-6 py-4">
                                    {{-- {{$tkh->menu->nama_menu}} --}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="w-full h-auto flex flex-row">
                                        <a href="{{route('penjual.edittoko',$tkh->id)}}">
                                            <button class="px-4 py-2 mr-1 bg-yellow-300 rounded-md text">Edit</button>
                                        </a>
                                        <form action="{{route('penjual.deletetoko', $tkh->id)}}" method="POST">
                                            @csrf
                                            <button class="px-4 py-2 bg-red-600 rounded-md text text-white">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                    </tbody>
                </table>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

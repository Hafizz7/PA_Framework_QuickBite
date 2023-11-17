@extends('layouts.global')
@section('title')
Dashboard - Menu
@endsection

@section('content')
    <div class="w-full h-screen flex">
        @include('components.sidebar')
        <div class="w-full flex flex-col bg-slate-100 ml-64">
            <div class="m-4 p-8 bg-white rounded-lg drop-shadow-md">
                <p class="text-4xl font-bold mb-4">Data Menu</p>
                <hr><br>
                {{-- @if ($tokotertentu->isEmpty())
                <div class="w-full h-auto flex justify-end mt-2">
                    <a href="{{route('penjual.addToko')}}">
                        <button class="px-4 py-2 bg-green-600 rounded-md text text-white">Tambah</button>
                    </a>
                </div><br>
            @endif --}}
                <a href="{{route('penjual.addMenuu')}}">
                <div class="w-full h-auto flex justify-end">
                    <button class="px-4 py-2 bg-green-600 rounded-md text text-white">Tambah</button>
                </div>
                </a><br>
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No.
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Menu
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Makanan
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($menu as $index=> $menus)
                                <tr class="bg-white border-b">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{$index+1}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$menus->nama_menu}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$menus->total_makanan}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="w-full h-auto flex flex-row">
                                            <a href="{{route('penjual.editMenu', $menus->id)}}">
                                                <button class="px-4 py-2 mr-1 bg-yellow-300 rounded-md text">Edit</button>
                                            </a>
                                            <form action="{{route('penjual.deleteMenu', $menus->id)}}" method="POST">
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

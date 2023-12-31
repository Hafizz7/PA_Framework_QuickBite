@extends('layouts.global')
@section('title')
Dashboard - Pesanan
@endsection

@section('content')
@include('components.navbar')
    <div class="w-full h-screen flex">
        <div class="w-full flex flex-col bg-slate-100 ">
            <div class="m-4 p-8 relative bg-slate-100 rounded-lg drop-shadow-md">
                <p class="text-4xl font-bold mb-4">Data Pesanan</p>
                <hr>
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Nama Makanan
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Harga
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Alamat
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($keranjangss->sortBy('status') as $index => $pesanan)
                                <tr class="bg-white border-b">
                                    <td class="px-6 py-4">
                                        {{$pesanan->nama}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$pesanan->harga}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$pesanan->alamat}}
                                    </td>
                                    <td class="px-6 py-4">
                                        <form action="{{route('penjual.updateStatusKuyyyy', $pesanan->id)}}" method="POST" onsubmit="return confirm('Apakah Anda yakin telah menerima pesanan ini?');">
                                        <select name="status" class="mb-5 border border-gray-300 shadow p-3 w-full rounded mb-" {{ $pesanan->status == 'Diterima' ? 'disabled' : '' }}>
                                            <option value="Dalam Proses" {{ $pesanan->status == 'Dalam Proses' ? 'selected' : '' }}>Dalam Proses</option>
                                            <option value="Diterima" {{ $pesanan->status == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                                        </select>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                            @csrf
                                            <button class="px-4 py-2 bg-blue-600 rounded-md text text-white">Simpan</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('components.footer')
@endsection

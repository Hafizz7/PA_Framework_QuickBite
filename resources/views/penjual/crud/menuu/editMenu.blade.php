@extends('layouts.global')
@section('title')
    Ubah Menu
@endsection

@section('content')
<div class="bg-[#E2FFC3] min-h-screen flex items-center">
    <div class="w-full">
      <div class="bg-white p-10 rounded-lg shadow md:w-3/4 mx-auto lg:w-1/2">
        <form action="{{route('penjual.updateMenu', $menus->id)}}" method="post" class="w-full flex flex-col items-start">
            @csrf
            <p class="text-black text-[25px] font-bold mx-auto">Ubah Menu</p>
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
            <label for="name" class="block mb-2 font-bold text-gray-600">Nama</label>
            <input type="text" name="nama_menu" placeholder="Nama Menu" value="{{$menus->nama_menu}}" class="border border-gray-300 shadow p-3 w-full rounded mb-">
          </div>
          {{-- <div class="mb-5 w-full">
            <label for="twitter" class="block mb-2 font-bold text-gray-600">Gambar</label>
            <select type="file" name="id_menu" placeholder="Gambar...." required class="border border-gray-300 shadow p-3 w-full rounded mb-">
                <option value="" disabled selected>Jenis Product...</option>
                @foreach ($menus as $menus)
                    <option value="{{$menus->id}}">{{$menus->nama_menu}}</option>
                @endforeach
            </select>
          </div> --}}

          <button class="block w-full bg-blue-500 text-white font-bold p-4 rounded-lg" onclick="return confirm('Apakah Anda yakin ingin melakukan perubaha pada data ini?');">Submit</button>
        </form>
      </div>
    </div>
  </div>

  </div>

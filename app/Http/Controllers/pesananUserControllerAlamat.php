<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use App\Models\pesanan;
use App\Models\keranjang;
use App\Models\AlamatUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class pesananUserControllerAlamat extends Controller
{
    public function getPesananAlamat()
    {

        $id_userr = Auth::id();
        $alaamat = AlamatUser::where('id_user', $id_userr)->get();
        $keranjang = keranjang::where('id_user', $id_userr)->get();
        if ($keranjang) {
            // return $keranjang;
            $keranajngsss = $keranjang;
        } else {
            $keranajngsss = collect();
        }

        return view('pembeli.pesananUser', [
            'keranjangku' => $keranajngsss,
            'alamatss' => $alaamat,

        ]);
    }
    public function pushPesananAlamat(Request $request)
    {
        $user = Auth::id();
        $keranjang = keranjang::where('id_user', $user)->get();
        $totalKeranjang = keranjang::where('id_user', $user)->count();
        $status = 'dalamAntrian';

         //take digunakan untnuk membatasi perulangn

        $request->validate([
            // 'pilih_alamat' => 'required',
            'id_user' => 'required',
        ]);
        if($request->filled('alamat_baru_lagiii')){
            $alamat = $request->alamat_baru_lagiii;
            // return dd($alamat);
        }
        else{
            $alamat = ($request->pilih_alamat == 'alamatbaharuuu') ? $request->alamat_baru : $request->pilih_alamat;
        }

        foreach ($keranjang->take($totalKeranjang) as $keranjangg) {
            $deskripsi = Makanan::where('nama', $keranjangg->nama)->value('deskripsi');
            pesanan::create([
                'nama' => $keranjangg->nama,
                'harga' => $keranjangg->harga,
                'gambar' => $keranjangg->gambar,
                'jumlah' => 1, // Sesuaikan jumlah sesuai kebutuhan atau biarkan default
                'status' => $status,
                'deskripsi' => $deskripsi,
                'alamat' => $alamat,
                'id_toko' => $keranjangg->id_toko, // Sesuaikan dengan kolom di tabel Makanan
                'id_user' => $user,
            ]);
        }

        return redirect()->back()->with('success', 'Data Alamat berhasil ditambahkan');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Toko;
use App\Models\Makanan;
use App\Models\keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{

    // public function tambah()
    // {
    //     $id_userr = Auth::id();
    //     $keranjang = keranjang::where('id_user' , $id_userr)->first();
    //     // $makanan = collect(); // Initialize an empty collection
    //     return view(
    //         'pembeli.keranjang',
    //         [
    //             'keranjangss' => $keranjang,
    //         ]
    //     );
    // }




    public function addKeranjangg($id)
    {
        $user = Auth::id();
        $makanan = Makanan::find($id);
            Keranjang::create([
                'nama' => $makanan->nama,
                'harga' => $makanan->harga,
                'jumlah' => 1, // Sesuaikan jumlah sesuai kebutuhan atau biarkan default
                'gambar' => $makanan->gambar,
                'deskripsi' => $makanan->deskripsi,
                'id_user' => $user,
                'id_toko' => $makanan->id_toko, // Sesuaikan dengan kolom di tabel Makanan
            ]);
        return redirect()->back()->with('success', 'Data berhasil dipindahkan ke Keranjang.');
    }
}

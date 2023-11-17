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

        // $toko = Toko::all()->where('id', $id)->first();
        // if($toko){
        //     $menu = Menu::where('id_toko', $toko->id)->get();
        //     $tokosss = Toko::where('id', $toko->id)->get();
        //     // $makanan = Makanan::where('id_menu', $toko->id)->get();
        //     $makanan = Makanan::all();
        // }
        $user = Auth::id();
        $makanan = Makanan::find($id);
        // return $makanan;
        // <input type="hidden" name="id_user" placeholder="id_user" value="{{ Auth::id() }}">
        // Tambahkan data ke dalam tabel Keranjang

            // return $makanan;
            Keranjang::create([
                'nama' => $makanan->nama,
                'harga' => $makanan->harga,
                'jumlah' => 1, // Sesuaikan jumlah sesuai kebutuhan atau biarkan default
                'gambar' => $makanan->gambar,
                'id_menu' => $makanan->id,
                'id_user' => $user,
                'id_toko' => $makanan->id_toko, // Sesuaikan dengan kolom di tabel Makanan
            ]);


        // Hapus data dari tabel Makanan (opsional)
        // Makanan::truncate(); // atau Makanan::where('kriteria', 'nilai')->delete();

        return redirect()->back()->with('success', 'Data berhasil dipindahkan ke Keranjang.');
    }
}

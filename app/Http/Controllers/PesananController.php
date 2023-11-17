<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Toko;
use App\Models\pesanan;
use App\Models\keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    public function addPesanan()
    {
        $user = Auth::id();
        $keranjang = keranjang::where('id_user', $user)->get();
        $totalKeranjang = keranjang::where('id_user', $user)->count();
        $status = 'dalamAntrian';
        //take digunakan untnuk membatasi perulangn
        foreach ($keranjang->take($totalKeranjang) as $keranjangg){
                pesanan::create([
                    'nama' => $keranjangg->nama,
                    'harga' => $keranjangg->harga,
                    'gambar' => $keranjangg->gambar,
                    'jumlah' => 1, // Sesuaikan jumlah sesuai kebutuhan atau biarkan default
                    'status' => $status,
                    'id_menu' => $keranjangg->id_menu,
                    'id_toko' => $keranjangg->id_toko, // Sesuaikan dengan kolom di tabel Makanan
                    'id_user' => $user,
                ]);
        }
        keranjang::where('id_user', $user)->delete();
        return redirect()->back()->with('success', 'Data berhasil dipindahkan ke Keranjang.');
        // $menu = Menu::where('id_toko', $toko->id)->get()
    }

    public function getDataPesanan()
    {
        $id_user = Auth::id();
        $toko = Toko::where('id_user', $id_user)->first();

        if (!$toko) {
            return view('penjual.pesanan', ['keranjangg' => collect(), 'tokosss' => []]);
        }

        $id_toko = $toko->id;

        $keranjang = pesanan::where('id_toko', $id_toko)->get();
        // return $keranjang;
        return view('penjual.pesanan', [
            'keranjangg' => $keranjang,
            'tokosss' => $id_toko, // Assuming you want to pass the ID of the store
        ]);
    }

}

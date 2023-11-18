<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Toko;
use App\Models\pesanan;
use App\Models\Makanan;
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
        foreach ($keranjang->take($totalKeranjang) as $keranjangg) {
            $deskripsi = Makanan::where('nama', $keranjangg->nama)->value('deskripsi');
            pesanan::create([
                'nama' => $keranjangg->nama,
                'harga' => $keranjangg->harga,
                'gambar' => $keranjangg->gambar,
                'jumlah' => 1, // Sesuaikan jumlah sesuai kebutuhan atau biarkan default
                'status' => $status,
                'deskripsi' => $deskripsi,
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
        ]);
    }
    // public function updateStatus(Request $request, pesanan $pesanan){
    //     $request->validate([
    //         'status' => 'required',
    //     ]);

    //     $pesanan->update([
    //         'status' => $request->input('status'),
    //     ]);

    //     return redirect()->back()->with('success', 'Role user berhasil diubah');
    // }


    public function updateStatus(Request $request, $id)
    {

        $request->validate([
            'status' => 'required|string|max:30',
        ]);
        $pesanans = pesanan::findOrFail($id);

        $pesanans->update([
            'status' => $request->status,
        ]);
        // $makanas->delete();
        return redirect()->back()->with('success', 'Status pesanan berhasil diubah');
    }
}

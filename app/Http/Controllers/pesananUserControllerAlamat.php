<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Toko;
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
        $status = 'Dipesan';

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
    public function getDataPesananKuyyy()
    {
        $id_user = Auth::id();
        $toko = Toko::where('id_user', $id_user)->first();

        if (!$toko) {
            return view('penjual.pesanan', ['keranjangg' => collect(), 'tokosss' => []]);
            return view('pembeli.daftarPesanan', ['keranjangg' => collect(), 'tokosss' => []]);
        }

        $id_toko = $toko->id;

        $keranjang = pesanan::where('id_toko', $id_toko)->get();
        // return $keranjang;
        return view('penjual.pesanan', [
            'keranjangg' => $keranjang,
        ]);
        return view('pembeli.daftarPesanan', [
            'keranjangg' => $keranjang,
        ]);
    }
    public function getDaftarPesanan()
    {

        $id_user = Auth::id();

        $keranjang = pesanan::where('id_user', $id_user)->get();
        return view('pembeli.daftarPesanan', [
            'keranjangss' => $keranjang,
        ]);
    }
    public function updateStatusKuyyyy(Request $request, $id)
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

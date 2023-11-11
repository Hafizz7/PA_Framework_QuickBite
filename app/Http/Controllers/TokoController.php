<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class TokoController extends Controller
{
    public function tambah()
    {
        $response = Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/provinces.json');
        $provinces = $response->json();

        // Replace '{provinceId}' with the actual province ID
        // $provinceId = 64;
        // $response2 = Http::get("https://emsifa.github.io/api-wilayah-indonesia/api/regencies/{$provinceId}.json");
        // $regencies = $response2->json();

        return view('penjual.crud.addToko', [
            'provinces' => $provinces,
            // 'regencies' => $regencies,
        ]);
    }
    public function push(Request $request)
    {

        $request->validate([
            'nama_toko' => 'required|string|max:20',
            'deskripsi_toko' => 'required|string',
            'gambar' => 'required',
            'id_user' => 'required',
            'gambar.*' => 'mimes:doc,docx,PDF,pdf,jpg,jpeg,png|max:2000'
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('gambar')->getClientOriginalName());
            $request->file('gambar')->move(public_path('images'), $gambar);
            Toko::create(
                [
                    'data_file' => $gambar,
                    'nama_toko' => $request->nama_toko,
                    'deskripsi_toko' => $request->deskripsi_toko,
                    'id_user' => $request->id_user,
                    'gambar' => $gambar,
                ]
            );
            return redirect()->route('penjual.addToko')->with('success', 'Data Barang Berhasil Ditambahkan');
            // return redirect()->route('admin.barang')->with('success', 'Data
            // Barang Berhasil Ditambahkan');
        } else {
            // return ($request);
            echo 'Gagal';
            return response()->json(['errors' => 'Gagal'], 422);
        }
        // Setelah validasi berhasil, data akan disimpan ke database

    }
}

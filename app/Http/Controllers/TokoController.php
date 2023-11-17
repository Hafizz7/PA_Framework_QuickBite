<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class TokoController extends Controller
{
    public function index(){
        $userId = auth()->id();
        $endpoint = env('BASE_ENV') . '/api/penjual/toko/toko?user_id=' . $userId;
        $data = Http::get($endpoint);
        return view('penjual/toko',[
            'tokosss'=>$data
        ]);
        }
    public function tambah()
    {
        $response = Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/provinces.json');
        $provinces = $response->json();

        // Replace '{provinceId}' with the actual province ID
        // $provinceId = 64;
        // $response2 = Http::get("https://emsifa.github.io/api-wilayah-indonesia/api/regencies/{$provinceId}.json");
        // $regencies = $response2->json();

        return view('penjual.crud.toko.addToko', [
            'provinces' => $provinces,
            // 'regencies' => $regencies,
        ]);
    }
    public function push(Request $request)
    {

        $request->validate([
            'nama_toko' => 'required|string|max:30',
            'deskripsi_toko' => 'required|string',
            'gambar' => 'required',
            'id_user' => 'required',
            'gambar.*' => 'mimes:jpg,jpeg,png|max:2000',
            'alamat' => 'required|string',
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('gambar')->getClientOriginalName());
            $request->file('gambar')->move(public_path('images/toko'), $gambar);
            Toko::create(
                [
                    'nama_toko' => $request->nama_toko,
                    'deskripsi_toko' => $request->deskripsi_toko,
                    'id_user' => $request->id_user,
                    'gambar' => $gambar,
                    'alamat' => $request->alamat,
                ]
            );
            return redirect('toko/penjual/toko')->with('success', 'Data Barang Berhasil Ditambahkan');
            // return redirect()->route('admin.barang')->with('success', 'Data
            // Barang Berhasil Ditambahkan');
        } else {
            // return ($request);
            echo 'Gagal';
            return response()->json(['errors' => 'Gagal'], 422);
        }
        // Setelah validasi berhasil, data akan disimpan ke database

    }
    public function edit($id)
    {
        // $id_userr = Auth::id();
        // $id_tokoo = Toko::where('id_user', '=', $id_userr)->get();
        return view('penjual.crud.toko.editToko', [
            'tokose' => Toko::all()->where('id', $id)->first(),
        ]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_toko' => 'required|string|max:30',
            'deskripsi_toko' => 'required|string',
            'gambar' => 'required',
            'id_user' => 'required',
            'gambar.*' => 'mimes:doc,docx,PDF,pdf,jpg,jpeg,png|max:2000',
            'alamat' => 'required|string',
        ]);

        $tokosse = Toko::findOrFail($id);

        if ($request->hasFile('gambar')) {
            $gambar = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('gambar')->getClientOriginalName());
            $request->file('gambar')->move(public_path('images/toko'), $gambar);

            $tokosse->update([
                'nama_toko' => $request->nama_toko,
                'deskripsi_toko' => $request->deskripsi_toko,
                'id_user' => $request->id_user,
                'gambar' => $gambar,
                'alamat' => $request->alamat,
            ]);
        }else{
            echo 'Gagal';
            return response()->json(['errors' => 'Gagal'], 422);
        }
        return redirect('toko/penjual/toko')->with('success', 'Data Berhasil Diubah');
    }
    public function delete($id)
    {
        $tokose = Toko::findOrFail($id);
        // public\images\makanan\1699880689164-Makanbang.png
        $file = public_path('images/toko/').$tokose->gambar;
        $file = str_replace('\\', '/', $file);


        //

        $tokose->delete();
        if(file_exists($file)){
            unlink($file);
        }
        else{
            dd($file);
        }
        return redirect()->route('penjual.makanan')->with('success', 'Data Makanan
        Berhasil Dihapus');
    }
}


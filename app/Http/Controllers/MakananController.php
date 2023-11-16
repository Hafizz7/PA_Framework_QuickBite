<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use App\Models\Menu;
use App\Models\Toko;
use App\Models\Makanan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use PhpParser\Node\Stmt\Return_;

class MakananController extends Controller
{
    public function index()
    {
        $endpoint = env('BASE_ENV').'/api/api/welcome';
        $data = Http::get($endpoint);
        return view('', [
            'makanannn' => $data
        ]);
    }
    public function tambah()
    {
        $id_userr = Auth::id();
        $id_tokoo = Toko::where('id_user', '=', $id_userr)->get();

        $id_user = auth()->id();
        $toko = Toko::where('id_user', $id_user)->first();
        // $makanan = collect(); // Initialize an empty collection
        if ($toko) {
            $menu = Menu::where('id_toko', $toko->id)->get();
        }
        return view(
            'penjual.crud.makanann.addData',
            [
                'menusss' => $menu,
                'tokosss' => $id_tokoo,
            ]
        );
    }

    public function pushMakanan(Request $request)
    {

        $request->validate([
            'nama' => 'required|string|max:30',
            'harga' => 'required|string',
            'deskripsi' => 'required|string',
            'id_menu' => 'required',
            'id_toko' => 'required',
            'gambar' => 'required',
            'gambar.*' => 'mimes:doc,docx,PDF,pdf,jpg,jpeg,png|max:2000'
        ]);
        if ($request->hasFile('gambar')) {
            $gambar = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('gambar')->getClientOriginalName());
            $request->file('gambar')->move(public_path('images/makanan'), $gambar);
            Makanan::create(
                [
                    'nama' => $request->nama,
                    'harga' => $request->harga,
                    'deskripsi' => $request->deskripsi,
                    'id_menu' => $request->id_menu,
                    'id_toko' => $request->id_toko,
                    'gambar' => $gambar,
                ]
            );
            return redirect()->route('penjual.makanan')->with('success', 'Data Barang Berhasil Ditambahkan');
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
        $id_userr = Auth::id();
        // $id_tokoo = Toko::where('id_user', '=', $id_userr)->get();

        $id_user = auth()->id();
        $toko = Toko::where('id_user', $id_user)->first();
        // $makanan = collect(); // Initialize an empty collection
        if ($toko) {
            $menu = Menu::where('id_toko', $toko->id)->get();
        }
        return view('penjual.crud.makanann.editData', [
            'makanans' => Makanan::all()->where('id', $id)->first(),
            'menus' => $menu,
        ]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:30',
            'harga' => 'required|string',
            'deskripsi' => 'required|string',
            'id_menu' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2000',
        ]);

        $makanan = Makanan::findOrFail($id);

        if ($request->hasFile('gambar')) {
            $gambar = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('gambar')->getClientOriginalName());

            // Move the file to the specified directory
            $request->file('gambar')->move(public_path('images/makanan'), $gambar);

            $makanan->update([
                'nama' => $request->nama,
                'harga' => $request->harga,
                'deskripsi' => $request->deskripsi,
                'id_menu' => $request->id_menu,
                'gambar' => $gambar,
            ]);
        } else {
            echo 'Gagal';
            return response()->json(['errors' => 'Gagal'], 422);
        }

        return redirect()->route('penjual.makanan')->with('success', 'Data Barang Berhasil Diubah');
    }
    public function delete($id)
    {
        $makanas = Makanan::findOrFail($id);
        // public\images\makanan\1699880689164-Makanbang.png
        $file = public_path('images/makanan/') . $makanas->gambar;
        $file = str_replace('\\', '/', $file);

        if (file_exists($file)) {
            unlink($file);
        } else {
            unlink($file);
            dd($file);
        }
        //

        $makanas->delete();
        return redirect()->route('penjual.makanan')->with('success', 'Data Makanan
        Berhasil Dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{


    public function tambah()
    {

        $id_userr = Auth::id();
        $id_tokoo = Toko::where('id_user', '=', $id_userr)->get();
        return view('penjual.crud.menuu.addMenu',['menu2'=>$id_tokoo]
        );
    }
    public function pushMenu(Request $request)
    {
        $request->validate([
            'nama_menu' => 'required|string|max:30',
            'id_toko' => 'required',
        ]);
        Menu::create([
            'nama_menu' => $request->nama_menu,
            'id_toko' => $request->id_toko,
        ]);
        return redirect()->route('penjual.menu')->with('success', 'Data Menu Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        // resources\views\admin\barang.blade.php
        return view('penjual.crud.menuu.editMenu', [
            'menus' => Menu::all()->where('id', $id)->first(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_menu' => 'required|string|max:30',
        ]);
        $menu = Menu::findOrFail($id);
        $menu->update([
            'nama_menu' => $request->nama_menu,
        ]);
        return redirect()->route('penjual.menu')->with('success', 'Data Menu Berhasil Diubah');
    }
    public function delete($id){
        $menus = Menu::findOrFail($id);
        $menus->delete();
        return redirect()->route('penjual.menu')->with('success','Data Menu Berhasil Dihapus');
    }
}

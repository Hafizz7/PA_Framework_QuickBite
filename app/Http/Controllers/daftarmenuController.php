<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Toko;
use App\Models\Makanan;
use Illuminate\Http\Request;

class daftarmenuController extends Controller
{
    public function getData($id)
    {
        // resources\views\admin\barang.blade.php
        // $makanan = Makanan::where('id_toko', $toko->id)->get()
        $toko = Toko::all()->where('id', $id)->first();
        if($toko){
            $menu = Menu::where('id_toko', $toko->id)->get();
            $tokosss = Toko::where('id', $toko->id)->get();
            // $makanan = Makanan::where('id_menu', $toko->id)->get();
            $makanan = Makanan::all();
        }
        return view('daftarmenu', [
            'tokosss' => $tokosss,
            'menusss' => $menu,
            'makanansss' => $makanan,
        ]);
    }
}

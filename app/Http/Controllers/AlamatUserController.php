<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use App\Models\pesanan;
use App\Models\keranjang;
use App\Models\AlamatUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlamatUserController extends Controller
{
    public function getALamat()
    {

        $id_userr = Auth::id();
        $alaamat = AlamatUser::where('id_user', $id_userr)->get();
        return view('pembeli.alamat', [
            'alamatsss' => $alaamat,
        ]);
    }
    public function pushAlamat(Request $request)
    {
        $user = Auth::id();
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

        AlamatUser::create([
            'alamat' => $alamat,
            'id_user' => $request->id_user,
        ]);

        return redirect()->back()->with('success', 'Data Alamat berhasil ditambahkan');
    }
}

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
            'alamat' => 'required',
            'id_user' => 'required',
        ]);
        AlamatUser::create([
            'alamat' => $request->alamat,
            'id_user' => $user,
        ]);
        return redirect(route('pembeli.getalamatkuyyyy'));
    }
}

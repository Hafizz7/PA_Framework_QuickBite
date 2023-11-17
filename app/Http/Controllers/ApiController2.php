<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiController2 extends Controller
{
    public function getToko(Request $request)
    {
        // Get the user ID from the request parameters
        $userId = $request->input('user_id', Auth::id());

        // Retrieve toko data based on the user ID
        $tokos = Toko::where('id_user', $userId)->get();

        $response = [
            'status' => 'success',
            'message' => 'Data Berhasil Diambil',
            'dataToko' => $tokos
        ];

        return response()->json($response);
    }
}

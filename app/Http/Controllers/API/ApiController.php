<?php

namespace App\Http\Controllers\API;

use App\Models\Toko;
use App\Models\Makanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
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

    //     return response()->json($response);
    // }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

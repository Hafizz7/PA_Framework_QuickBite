<?php
// routes/api.php
use App\Models\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController2;
use App\Http\Controllers\API\ApiController;
use App\Http\Controllers\API\CategoryController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// routes/api.php

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::prefix('api/penjual/toko')->group(function () {
//     Route::get('toko', [ApiController2::class, 'getToko']);
// });


// Route::controller(ApiController::class)->group(function () {
//     Route::get('toko/penjual/toko', function(){
//         $tokos = Toko::all();
//         return view('penjual.toko', [
//             "tokotertentu" => $tokos,
//         ]);
//     })->name('penjual.TokoTertentu');
// });

<?php

use App\Http\Controllers\ApiController2;
use App\Models\Menu;
use App\Models\Toko;
use App\Models\Makanan;
use App\Models\Penjual;
use App\Models\keranjang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\MakananController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\daftarmenuController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('daftarmenu');
// });
// resources\views\pembeli\keranjang.blade.php
// Route::get('/pembeli/keranjang', function () {
//     $id_userr = Auth::id();
//     $keranjang = keranjang::where('id_user' , $id_userr)->first();
//     return view('pembeli.keranjang', [
//         'toko1' => $keranjang,

//     ]);
// });
Route::get('/', function () {
    $id_userr = Auth::id();
    // return $id_userr;
    $keranjang = keranjang::where('id_user' , $id_userr)->get();
    if($keranjang){
        // return $keranjang;
        $keranajngsss = $keranjang;
    }
    else{
        $keranajngsss = collect();
    }
    return view('welcome', [
        'keranjangss' => $keranajngsss,
        "toko1" => Toko::all()
    ]);
});
// Route::controller(ApiController::class)->group(function () {
//     Route::get('penjual/makanan','geMakanan');
//     });
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/login/action', [
    AuthController::class, 'loginAction'
])->name('login.action');

Route::post('/register/action', [
    AuthController::class, 'registerAction'
])->name('register.action');



Route::get('/logout', [
    AuthController::class, 'logout'
])->name('logout');

//controller Menu
Route::controller(PesananController::class)->group(function () {
    Route::get('pesanan/tambah', 'addPesanan')->name('pembeli.addPesanan');
    Route::get('penjual/pesanan/tambah', 'getDataPesanan')->name('pembeli.getDataPesanan');

});
Route::controller(KeranjangController::class)->group(function () {
    Route::get('keranjang/tambah/{id}', 'addKeranjangg')->name('pembeli.addKeranjangg');
    // Route::get('/copy-makanan-to-keranjang', 'KeranjangController@copyMakananToKeranjang');
    // Route::post('keranjang/action/{id}', 'pushKeranjang')->name('pembeli.addKeranjang');
    Route::get('keranjang/getData/{id}', 'getMakanan')->name('getMakanan');

});
Route::controller(daftarmenuController::class)->group(function () {

    Route::get('daftarmenu/getData/{id}', 'getData')->name('getToko');
});

Route::controller(MakananController::class)->group(function () {
    Route::get('penjual/makanan/tambah', 'tambah')->name('penjual.addMakanan');
    Route::post('tambah/action', 'pushMakanan')->name('penjual.pushMakanan');
    Route::get('penjual/makanan/edit/{id}', 'edit')->name('penjual.editMakanan');
    Route::post('makanann/penjual/makanan/edit/{id}/action', 'update')->name('penjual.updateMakanan');
    Route::post('penjual/makanan/edit/{id}/action', 'delete')->name('penjual.deleteMakanan');
    // Route::post('admin/barang/edit/{id}/action', 'update')->name('admin.update');
});

Route::get('api/penjual/toko/toko', [ApiController2::class, 'getToko']);

// Route::get('/penjual/toko/toko', [ApiController::class, 'getToko']);

Route::controller(TokoController::class)->group(function () {
    Route::get('toko/penjual/toko', 'index')->name('penjual.TokoTertentu');
    Route::get('toko/penjual/toko/tambah', 'tambah')->name('penjual.addToko');
    Route::post('toko/penjual/tambah/action', 'push')->name('penjual.push');
    Route::get('toko/penjual/toko/edit/{id}', 'edit')->name('penjual.edittoko');
    Route::post('toko/penjual/toko/edit/{id}/action', 'update')->name('penjual.updatetoko');
    Route::post('/toko/penjual/delete/{id}/action', 'delete')->name('penjual.deletetoko');
});

Route::controller(MenuController::class)->group(function () {
    Route::get('menu/penjual/makanan/tambah', 'tambah')->name('penjual.addMenuu');
    Route::post('menu/tambah/action', 'pushMenu')->name('penjual.pushMenu');
    Route::get('menu/penjual/menu/edit/{id}', 'edit')->name('penjual.editMenu');
    Route::post('menu/penjual/menu/edit/{id}/action', 'update')->name('penjual.updateMenu');
    Route::post('/menu/penjual/delete/{id}/action', 'delete')->name('penjual.deleteMenu');
});

// Route::get('/get-provinces', [ApiController::class, 'getProvinces']);

// Route::get('penjual/makanan', [ApiController::class, 'getMakanan']);


Route::middleware('auth')->group(function () {
    Route::middleware('checkRole:penjual')->group(function () {

        // Route::get('toko/penjual/toko', function(){
        //     $id_user = auth()->id();
        //     $tokos = Toko::all()->where('id_user', $id_user);
        //     return view('penjual.toko', [
        //         "tokotertentu" => $tokos,
        //     ]);
        // })->name('penjual.TokoTertentu');

        Route::get('/penjual/toko', function () {
            return view('penjual.toko');
        })->name('penjual.toko');

        Route::get('/penjual/menu', function () {
            //mencari id user yang lagi login
            $id_user = auth()->id();
            //mencari id user di toko sama nilainya dengan id user yg sedang aktif
            $toko = Toko::where('id_user', $id_user)->first();

            if ($toko) {
                //jika data tersebut ada maka akan menampilkan data tersebut dengan id toko di menu nilainya sama di id toko
                $id_menuu = Menu::where('id_toko', $toko->id)->get();
            } else {
                //jika tidak ada maka membuat instance baru yg isi nya kosong
                $id_menuu = collect();
            }
            return view('penjual.menu', [
                "menu" => $id_menuu,
            ]);
        })->name('penjual.menu');

        Route::get('/penjual/makanan', function () {
            $id_user = Auth::id();
            $toko = Toko::where('id_user', $id_user)->first();

            if ($toko) {
                $makanan = Makanan::where('id_toko', $toko->id)->get();
            } else {
                $makanan = collect();
            }
            return view('penjual.makanan', [
                'makanan' => $makanan,

            ]);
        })->name('penjual.makanan');

        Route::get('/penjual/crud/makanann/addData', function () {
            return view('penjual.crud.makanann.addData');
        })->name('penjual.addMakananView');

        Route::get('/penjual/dashboard', function () {
            return view('penjual.dashboard');
        })->name('penjual.dashboard');

        Route::get('/penjual/crud/menuu/addMenu', function () {
            return view('penjual.crud.menuu.addMenu');
        })->name('penjual.addMenu');
    });
});


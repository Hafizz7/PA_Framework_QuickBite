<?php

use App\Models\Menu;
use App\Models\Toko;
use App\Models\Makanan;
use App\Models\Penjual;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\daftarmenuController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\MakananController;

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

Route::get('/', function () {
    return view('welcome', [
        "toko1" => Toko::all()
    ]);
});

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


// Route::middleware(['auth', 'checkRole:pembeli'])->group(function () {
//     Route::controller(TokoController::class)->group(function () {
//         Route::get('toko/penjual/makanan/tambah', 'tambah')->name('penjual.addToko');
//         Route::post('toko/penjual/tambah/action', 'push')->name('penjual.push');
//     });

//     Route::get('/penjual/toko', function () {
//         return view('penjual.toko');
//     })->name('penjual.toko');

//     Route::get('/penjual/menu', function () {
//         $id_user = auth()->id();
//         $toko = Toko::where('id_user', $id_user)->first();

//         if ($toko) {
//             $id_menuu = Menu::where('id_toko', $toko->id)->get();
//         } else {
//             $id_menuu = Menu::all();
//         }

//         return view('penjual.menu', [
//             "menu" => $id_menuu,
//         ]);
//     })->name('penjual.menu');

//     Route::get('/penjual/makanan', function () {
//         $id_user = Auth::id();
//         $toko = Toko::where('id_user', $id_user)->first();

//         if ($toko) {
//             $makanan = Makanan::where('id_toko', $toko->id)->get();
//         } else {
//             $makanan = collect(); // If no toko is found, initialize an empty collection
//         }

//         return view('penjual.makanan', [
//             'makanan' => $makanan
//         ]);
//     })->name('penjual.makanan');

//     Route::get('/penjual/crud/makanann/addData', function () {
//         return view('penjual.crud.makanann.addData');
//     })->name('penjual.addMakananView');

//     Route::get('/penjual/dashboard', function () {
//         return view('penjual.dashboard');
//     })->name('penjual.dashboard');

//     Route::get('/penjual/crud/menuu/addMenu', function () {
//         return view('penjual.crud.menuu.addMenu');
//     })->name('penjual.addMenu');
// });


Route::middleware(['checkRole:pembeli'])->group(function () {

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

Route::controller(MenuController::class)->group(function () {
    Route::get('menu/penjual/makanan/tambah', 'tambah')->name('penjual.addMenuu');
    Route::post('menu/tambah/action', 'pushMenu')->name('penjual.pushMenu');
    Route::get('menu/penjual/menu/edit/{id}', 'edit')->name('penjual.editMenu');
    Route::post('menu/penjual/menu/edit/{id}/action', 'update')->name('penjual.updateMenu');
    Route::post('/menu/penjual/delete/{id}/action', 'delete')->name('penjual.deleteMenu');
});

Route::get('/get-provinces', [ApiController::class, 'getProvinces']);

Route::controller(ApiController::class)->group(function () {
    Route::get('penjual/crud/makanan/addData', 'getMakanan');
});

// Route::middleware('auth')->group(function () {
//     Route::controller(TokoController::class)->group(function () {
//         Route::get('toko/penjual/makanan/tambah', 'tambah')->name('penjual.addToko');
//         Route::post('toko/penjual/tambah/action', 'push')->name('penjual.push');
//     });

//     Route::get('/penjual/toko', function () {
//         return view('penjual.toko');
//     })->name('penjual.toko');

//     Route::get('/penjual/menu', function () {
//         $id_user = auth()->id();
//         $toko = Toko::where('id_user', $id_user)->first();

//         if ($toko) {
//             $id_menuu = Menu::where('id_toko', $toko->id)->get();
//         } else {
//             $id_menuu = Menu::all();
//         }

//         return view('penjual.menu', [
//             "menu" => $id_menuu,
//         ]);
//     })->name('penjual.menu');

//     Route::get('/penjual/makanan', function () {
//         $id_user = Auth::id();
//         $toko = Toko::where('id_user', $id_user)->first();

//         if ($toko) {
//             $makanan = Makanan::where('id_toko', $toko->id)->get();
//         } else {
//             $makanan = collect(); // If no toko is found, initialize an empty collection
//         }

//         return view('penjual.makanan', [
//             'makanan' => $makanan
//         ]);
//     })->name('penjual.makanan');

//     Route::get('/penjual/crud/makanann/addData', function () {
//         return view('penjual.crud.makanann.addData');
//     })->name('penjual.addMakananView');

//     Route::get('/penjual/dashboard', function () {
//         return view('penjual.dashboard');
//     })->middleware('checkRole:penjual')->name('penjual.dashboard');

//     Route::get('/penjual/crud/menuu/addMenu', function () {
//         return view('penjual.crud.menuu.addMenu');
//     })->name('penjual.addMenu');
// });


Route::middleware('auth')->group(function () {
    Route::middleware('checkRole:penjual')->group(function () {
        Route::controller(TokoController::class)->group(function () {
            Route::get('toko/penjual/makanan/tambah', 'tambah')->name('penjual.addToko');
            Route::post('toko/penjual/tambah/action', 'push')->name('penjual.push');
        });

        Route::get('/penjual/toko', function () {
            return view('penjual.toko');
        })->name('penjual.toko');

        Route::get('/penjual/menu', function () {
            $id_user = auth()->id();
            $toko = Toko::where('id_user', $id_user)->first();

            if ($toko) {
                $id_menuu = Menu::where('id_toko', $toko->id)->get();
            } else {
                $id_menuu = Menu::all();
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
                $makanan = collect(); // If no toko is found, initialize an empty collection
            }

            return view('penjual.makanan', [
                'makanan' => $makanan
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

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\API\ApiController;

class AuthController extends Controller
{
    public function registerAction(Request $request)
    {
        if (empty($request->username)) {
            session()->flash('error', 'Field "Username" harus diisi.');
            return redirect('/register')->withInput();
        } elseif (empty($request->email)) {
            session()->flash('error', 'Field "Email" harus diisi.');
            return redirect('/register')->withInput();
        } elseif (empty($request->password)) {
            session()->flash('error', 'Field "Password" harus diisi.');
            return redirect('/register')->withInput();
        } elseif (empty($request->role)) {
            session()->flash('error', 'Field "Password" harus diisi.');
            return redirect('/register')->withInput();
        }

        if ($request->password == $request->confirm_password) {
            $usernameExist = User::where('username', $request->username)->first();
            $emailExist = User::where('email', $request->email)->first();
            if ($usernameExist) {
                session()->flash('error', 'Username sudah digunakan!');
                return redirect('/register');
            }
            if ($emailExist) {
                session()->flash('error', 'Email sudah digunakan!');
                return redirect('/register');
            }
            User::create([
                'username' => $request->username,
                'email' => $request->email,
                'role' => $request->role,
                'password' => Hash::make($request->password),
            ]);

            session()->flash('success', 'Akun berhasil dibuat!');
            return redirect('/register');
        } else {
            session()->flash('error', 'Konfirmasi password anda salah!');
            return redirect('/register')->withInput();
        }
    }
    public function loginAction(Request $request)
    {
        $username = $request->username;

        $data = [
            'username' => $request->username,
            'password' => $request->password,
        ];
        $user = User::where('username', $username)->first();

        if (Auth::attempt($data)) {
            if ($user->role === 'penjual') {
                $userId = Auth::id();
                session(['user_id' => $userId]);
                return redirect(route('penjual.dashboard'));
            } else {
                $userId = Auth::id();
                session(['user_id' => $userId]);
                return redirect('/');
            }
        } else {
            // Jika login gagal, tampilkan pesan kesalahan
            session()->flash('error', 'Username atau Password anda salah!');
            return redirect('/login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    // AuthController.php

    public function edit()
    {
        return view('pembeli.editPembeli');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        if (empty($request->username) || empty($request->email) || empty($request->new_password)) {
            session()->flash('error', 'Semua kolom harus diisi!');
            return redirect('/profile/edit')->withInput();
        }

        $usernameExist = User::where('username', $request->username)
            ->where('id', '!=', $user->id)
            ->first();
        if ($usernameExist) {
            session()->flash('error', 'Username sudah ada!');
            return redirect('/profile/edit');
        }

        $emailExist = User::where('email', $request->email)
            ->where('id', '!=', $user->id)
            ->first();
        if ($emailExist) {
            session()->flash('error', 'Email sudah ada!');
            return redirect('/profile/edit');
        }

        if ($request->new_password == $request->confirm_password) {
            $user->update([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->new_password),
            ]);

            session()->flash('success', 'Profil berhasil diubah!');
            return redirect('/profile/edit');
        } else {
            session()->flash('error', 'Konfirmasi password salah!');
            return redirect('/profile/edit');
        }
    }
}

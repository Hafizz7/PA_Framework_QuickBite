<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerAction(Request $request)
    {
        if (empty($request->username)) {
            session()->flash('error', 'Field "Username" harus diisi.');
            return redirect('/register')
            ->withInput();
        }
        else if(empty($request->email)){
            session()->flash('error', 'Field "Email" harus diisi.');
            return redirect('/register')
            ->withInput();
        }
        else if(empty($request->password)){
            session()->flash('error', 'Field "Password" harus diisi.');
            return redirect('/register')
            ->withInput();
        }
        else if(empty($request->role)){
            session()->flash('error', 'Field "Password" harus diisi.');
            return redirect('/register')
            ->withInput();
        }

        if ($request->password == $request->confirm_password) {
            $usernameExist = User::where("username", $request->username)->first();
            if ($usernameExist) {
                session()->flash('error', 'Username sudah digunakan!');
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
        }
        else {
            session()->flash('error', 'Konfirmasi password anda salah!');
            return redirect('/register')
            ->withInput();
        }

    }
    public function loginAction(Request $request)
    {
        $data = [
            'username' => $request->username,
            'password' => $request->password,
        ];
        if (Auth::attempt($data)) {
            $userId = Auth::id();
            session(['user_id' => $userId]);
            return redirect('/components/home');
        } else {
            session()->flash('error', 'Username atau Password anda salah!');
            return redirect('/login');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        $data = [
            'title' => 'Login',
        ];
        return view('auth.login', $data);
    }

    public function prosesLogin(Request $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            if(Auth::user()->role === 'user' ) {
                return redirect('/');   
            }
            if (Auth::user()->role === 'admin' || Auth::user()->role === 'petugas' ){
                return redirect(route('admin'));
            }
        } else {
            return redirect()->back()->with('error', 'Username atau Password Yang Anda Masukan Salah');
        }
    }

    public function logout()
    {
        if (Auth::user()) {
            Auth::logout();
            return redirect()->route('login')->with('status', 'Logout Berhasil, Silahkan Login kembali untuk memakai layanan kami');
        } else {
            return redirect()->back();
        }
    }

    public function register()
    {
        $data = [
            'title' => 'Register',
        ];
        return view('auth.register', $data);
    }

    public function prosesRegister(Request $request)
    {
        $request->validate([
            'nik' => 'required|numeric|unique:users',
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|unique:users',
            'telp' => 'required|numeric',
            'password' => 'required_with:password_confirmation|confirmed',
        ]);
        User::create([
            'nik' => $request->nik,
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'telp' => $request->telp,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);
        return redirect(route('login'))->with('status', 'akun berhasil dibuat');
    }
}

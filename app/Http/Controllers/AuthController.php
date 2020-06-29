<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {
        $cre = $request->only('npm','password');
        if (Auth::attempt($cre)) {
            if (auth()->user()->role == 'admin') {
                return redirect('/dashboard');
            } else if (auth()->user()->role == 'mahasiswa') {
                return redirect()->route('mahasiswa.krs');
            }
        }
        return redirect()->back()->with('sukses','NPM atau Password Salah!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

}

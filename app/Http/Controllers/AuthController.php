<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        if (auth()->user()) {
            if (auth()->user()->role == 'admin') {
                return redirect('/dashboard-admin');
            } else if (auth()->user()->role == 'mahasiswa') {
                return redirect('/dashboard-mahasiswa');
            }
        }

        return view('auth.login');
    }

    public function postlogin(Request $request)
    {
        $cre = $request->only('username','password');
        if (Auth::attempt($cre)) {
            if (auth()->user()->role == 'admin') {
                return redirect('/dashboard-admin');
            } else if (auth()->user()->role == 'mahasiswa') {
                return redirect('/dashboard-mahasiswa');
            }
        }
        return redirect()->back()->with('alert','Username atau Password Salah!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

}

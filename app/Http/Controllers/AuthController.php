<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    // Demo saja untuk menampilkan validasi & state form
    public function login(Request $request)
    {
        $request->validate([
            'email'    => ['required','email'],
            'password' => ['required'],
        ]);

        return back()
            ->withErrors(['email' => 'Demo UI: autentikasi belum diaktifkan.'])
            ->withInput($request->only('email','remember'));
    }
}

<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// =================== HALAMAN UTAMA ===================
Route::view('/', 'home')->name('home');

// =================== AUTH (LOGIN & REGISTER) ===================

// Halaman login
Route::view('/login', 'auth.login')->name('login');

// Proses login
Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6',
    ]);

    // Autentikasi manual
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->route('home')->with('status', 'Login berhasil!');
    }

    return back()->withErrors(['email' => 'Email atau password salah.'])->onlyInput('email');
})->name('login.attempt');

// Halaman register
Route::view('/register', 'auth.register')->name('register');

// Proses register
Route::post('/register', function (Request $request) {
    $request->validate([
        'name' => 'required|string|max:100',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|confirmed',
    ]);

    // Simpan user baru
    \App\Models\User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);

    return redirect()->route('login')->with('status', 'Register sukses! Silakan login.');
})->name('register.store');

// Logout
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('home');
})->name('logout');

// =================== FALLBACK (404) ===================
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});

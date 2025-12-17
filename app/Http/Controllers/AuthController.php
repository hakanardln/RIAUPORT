<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Tampilkan halaman login umum (user + sopir).
     */
    public function showLogin(Request $request)
    {
        // redirect_to akan dibaca di Blade lewat request('redirect_to')
        return view('auth.login');
    }

    /**
     * Proses login email + password (user / sopir / admin).
     */
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $remember = $request->boolean('remember');

        // Coba login
        if (!Auth::attempt($credentials, $remember)) {
            return back()->withErrors([
                'email' => 'Email atau password salah.',
            ])->withInput($request->only('email', 'redirect_to'));
        }

        // Regenerasi session setelah login sukses
        $request->session()->regenerate();

        $user = Auth::user();

        // 1) Kalau ada redirect_to (dari tombol "Pesan Sekarang") → langsung ke sana (WhatsApp sopir)
        if ($request->filled('redirect_to')) {
            return redirect()->to($request->input('redirect_to'));
        }

        // 2) Kalau tidak ada redirect_to → arahkan sesuai role
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        if ($user->role === 'sopir') {
            return redirect()->route('sopir.dashboard');
        }

        // 3) User biasa → ke home
        return redirect()->route('home');
    }

    /**
     * Logout semua role (admin, sopir, user).
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // ✅ PERBAIKAN: Redirect ke halaman login setelah logout
        return redirect()->route('login')->with('success', 'Anda berhasil logout');
    }
}
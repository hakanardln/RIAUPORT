<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminGoogleController extends Controller
{
    // Arahkan admin ke Google Login
    public function redirect()
    {
        // Override redirect URL khusus untuk admin
        config([
            'services.google.redirect' => route('admin.google.callback'),
        ]);

        return Socialite::driver('google')->redirect();
    }

    // Callback dari Google setelah login
    public function callback()
    {
        // Pastikan redirect config-nya sesuai juga di sini
        config([
            'services.google.redirect' => route('admin.google.callback'),
        ]);

        $googleUser = Socialite::driver('google')->user();

        // Cek apakah email admin ini sudah ada di tabel users
        $user = User::where('email', $googleUser->getEmail())->first();

        // ❗ Pastikan ini benar-benar akun admin
        if (!$user || $user->role !== 'admin') {
            abort(403, 'Akses admin tidak diizinkan.');
        }

        // Login admin
        Auth::login($user, true);

        return redirect()->route('admin.dashboard');
    }
}

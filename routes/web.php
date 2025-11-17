<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

// Controller
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Halaman Utama
|--------------------------------------------------------------------------
*/

Route::view('/', 'home')->name('home');

/*
|--------------------------------------------------------------------------
| ROUTE YANG HARUS LOGIN
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Dashboard Admin
    Route::get('/admin/dashboard', [AdminController::class, 'index'])
        ->name('admin.dashboard');

    // Logout (kembali ke home)
    Route::post('/logout', function (Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    })->name('logout');
});

/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/

// Halaman login
Route::view('/login', 'auth.login')->name('login');

// Proses login
Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required', 'min:6'],
    ]);

    $remember = (bool) $request->filled('remember');

    if (Auth::attempt($credentials, $remember)) {
        $request->session()->regenerate();
        return redirect()->route('admin.dashboard');
    }

    return back()
        ->withErrors(['email' => 'Email atau password salah.'])
        ->onlyInput('email');
})->name('login.attempt');

/*
|--------------------------------------------------------------------------
| REGISTER
|--------------------------------------------------------------------------
*/

// Halaman register
Route::view('/register', 'auth.register')->name('register');

// Proses register
Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store');

/*
|--------------------------------------------------------------------------
| FALLBACK (404)
|--------------------------------------------------------------------------
*/

Route::fallback(function () {
    abort(404);   // pakai 404 bawaan Laravel, tidak butuh view errors.404
});

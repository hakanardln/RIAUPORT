<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

// Controllers
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminGoogleController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\SopirController;
use App\Http\Controllers\SopirTravelController;

/*
|--------------------------------------------------------------------------
| Halaman Utama
|--------------------------------------------------------------------------
*/

Route::view('/', 'home')->name('home');

// Route untuk public
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
// Route untuk about
Route::get('/about', [AboutController::class, 'index'])->name('about');

// Route untuk admin (tambahkan middleware auth jika sudah ada sistem login)
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/contacts', [ContactController::class, 'admin'])->name('admin.contacts');
    Route::get('/admin/contacts/{id}', [ContactController::class, 'show'])->name('admin.contacts.show');
    Route::delete('/admin/contacts/{id}', [ContactController::class, 'destroy'])->name('admin.contacts.destroy');
    Route::patch('/admin/contacts/{id}/read', [ContactController::class, 'markAsRead'])->name('admin.contacts.read');
});
/*
|--------------------------------------------------------------------------
| ROUTE YANG HARUS LOGIN
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Dashboard Admin (hanya admin)
    Route::get('/admin/dashboard', function () {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Dashboard Sopir (hanya sopir)
    Route::get('/sopir/dashboard', function () {
        if (Auth::user()->role !== 'sopir') {
            abort(403);
        }

        return view('sopir.dashboard');
    })->name('sopir.dashboard');

    // CRUD Pelanggan (dipakai admin)
    Route::get('/admin/pelanggan', [PelangganController::class, 'index'])->name('admin.pelanggan.index');
    Route::post('/admin/pelanggan', [PelangganController::class, 'store'])->name('admin.pelanggan.store');
    Route::get('/admin/pelanggan/{id}/edit', [PelangganController::class, 'edit'])->name('admin.pelanggan.edit');
    Route::put('/admin/pelanggan/{id}', [PelangganController::class, 'update'])->name('admin.pelanggan.update');
    Route::delete('/admin/pelanggan/{id}', [PelangganController::class, 'destroy'])->name('admin.pelanggan.destroy');

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
| LOGIN ADMIN
|--------------------------------------------------------------------------
*/

// Halaman login khusus admin
Route::get('/admin/login', function () {
    return view('admin.login'); // resources/views/admin/login.blade.php
})->name('admin.login');

// Proses login khusus admin (email & password)
Route::post('/admin/login', function (Request $request) {

    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    // hanya izinkan user dengan role admin
    $credentials['role'] = 'admin';

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->route('admin.dashboard');
    }

    return back()->withErrors([
        'email' => 'Email atau password admin tidak valid.',
    ])->onlyInput('email');
})->name('admin.login.process');

/*
|--------------------------------------------------------------------------
| LOGIN ADMIN GOOGLE
|--------------------------------------------------------------------------
*/

Route::get('/admin/google/redirect', [AdminGoogleController::class, 'redirect'])
    ->name('admin.google.redirect');

Route::get('/admin/google/callback', [AdminGoogleController::class, 'callback'])
    ->name('admin.google.callback');

/*
|--------------------------------------------------------------------------
| LOGIN USER & SOPIR
|--------------------------------------------------------------------------
*/

// Halaman login umum (user + sopir)
Route::get('/login', function () {
    return view('auth.login'); // resources/views/auth/login.blade.php
})->name('login');

// Proses login umum
Route::post('/login', function (Request $request) {

    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        $user = Auth::user();

        // Jika sopir → ke dashboard sopir
        if ($user->role === 'sopir') {
            return redirect()->route('sopir.dashboard');
        }

        // Selain itu (user biasa) → ke home
        return redirect()->route('home');
    }

    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ])->onlyInput('email');
})->name('login.process');

/*
|--------------------------------------------------------------------------
| REGISTER USER (MANUAL + GOOGLE)
|--------------------------------------------------------------------------
*/

// Login / register dengan Google untuk user biasa
Route::get('/auth/google', [RegisterController::class, 'redirectToGoogle'])
    ->name('google.redirect');

Route::get('/auth/google/callback', [RegisterController::class, 'handleGoogleCallback'])
    ->name('google.callback');

// Halaman register
Route::get('/register', [RegisterController::class, 'showRegister'])
    ->name('register.show');

// Proses register manual
Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store');

// ======================= REGISTER KHUSUS SOPIR =======================
Route::get('/register/sopir', [RegisterController::class, 'showDriverRegister'])
    ->name('register.sopir.show');

Route::post('/register/sopir', [RegisterController::class, 'storeDriver'])
    ->name('register.sopir.store');

Route::middleware(['auth'])->get('/dashboard', function () {
    $user = Auth::user();

    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    if ($user->role === 'sopir') {
        return redirect()->route('sopir.dashboard');
    }

    // user biasa → ke home
    return redirect()->route('home');
})->name('dashboard');

// Dashboard sopir
Route::middleware(['auth'])->group(function () {
    Route::get('/sopir/dashboard', [SopirController::class, 'dashboard'])->name('sopir.dashboard');

    // Halaman Travel sopir
    Route::get('/sopir/travel', [SopirController::class, 'travel'])->name('sopir.travel');
});

Route::middleware(['auth'])->group(function () {

    // dashboard sopir kamu yang lama di sini
    // Route::get('/sopir/dashboard', ...)->name('sopir.dashboard');

    Route::get('/sopir/travel', [SopirTravelController::class, 'index'])
        ->name('sopir.travel');

    Route::post('/sopir/travel/mobil', [SopirTravelController::class, 'saveMobil'])
        ->name('sopir.travel.mobil');

    Route::post('/sopir/travel/rute', [SopirTravelController::class, 'saveRute'])
        ->name('sopir.travel.rute');

    Route::post('/sopir/travel/kontak', [SopirTravelController::class, 'saveKontak'])
        ->name('sopir.travel.kontak');
});

/*
|--------------------------------------------------------------------------
| FALLBACK (404)
|--------------------------------------------------------------------------
*/

Route::fallback(function () {
    abort(404);
});
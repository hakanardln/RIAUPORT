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
use App\Http\Controllers\SopirProfilController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SopirNotifController;
use App\Http\Controllers\SopirPersonalisasiController;
use App\Http\Controllers\SopirBantuanController;
use App\Http\Controllers\AdminSopirController;

// Middleware (pakai class langsung)
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsSopir;

/*
|--------------------------------------------------------------------------
| HOME & PUBLIC PAGE
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/cari-travel', [HomeController::class, 'search'])->name('travel.search');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/about', [AboutController::class, 'index'])->name('about');

/*
|--------------------------------------------------------------------------
| LOGIN USER + SOPIR (UMUM)
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| REGISTER USER + SOPIR
|--------------------------------------------------------------------------
*/
// FORM OTP
Route::get('/verify-otp', [RegisterController::class, 'showOtpForm'])
    ->name('otp.show');

// PROSES VERIFIKASI OTP
Route::post('/verify-otp', [RegisterController::class, 'verifyOtp'])
    ->name('otp.verify');

Route::get('/register', [RegisterController::class, 'showRegister'])->name('register.show');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/register/sopir', [RegisterController::class, 'showDriverRegister'])->name('register.driver.show');
Route::post('/register/sopir', [RegisterController::class, 'storeDriver'])->name('register.driver.store');

Route::get('/register/sopir', [RegisterController::class, 'showDriverRegister'])->name('register.sopir.show');
Route::post('/register/sopir', [RegisterController::class, 'storeDriver'])->name('register.sopir.store');

Route::get('/register', [RegisterController::class, 'showRegister'])->name('register.show');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/verify-otp', [RegisterController::class, 'showOtpForm'])->name('otp.show');
Route::post('/verify-otp', [RegisterController::class, 'verifyOtp'])->name('otp.verify');

Route::post('/register-sopir', [RegisterController::class, 'storeDriver'])
    ->name('register.sopir.store');

// Form daftar sopir
Route::get('/register-sopir', [RegisterController::class, 'showDriverRegister'])
    ->name('register.sopir.show');

// Proses simpan sopir + OTP
Route::post('/register-sopir', [RegisterController::class, 'storeDriver'])
    ->name('register.sopir.store');

Route::get('/verify-otp', [RegisterController::class, 'showOtpForm'])->name('otp.show');
Route::post('/verify-otp', [RegisterController::class, 'verifyOtp'])->name('otp.verify');

// 🔥 ini yang belum ada
Route::post('/resend-otp', [RegisterController::class, 'resendOtp'])->name('otp.resend');


/*
|--------------------------------------------------------------------------
| DASHBOARD (HARUS LOGIN)
|--------------------------------------------------------------------------
*/

// route umum setelah login: arahkan berdasarkan role
Route::middleware('auth')->get('/dashboard', function () {
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

/*
|--------------------------------------------------------------------------
| ADMIN (HARUS LOGIN + ROLE ADMIN)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', IsAdmin::class])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard admin
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

        // Kelola sopir (HALAMAN /travel.blade.php kamu)
        Route::get('/sopir', [AdminSopirController::class, 'index'])->name('sopir.index');

        // Personalisasi admin (kalau ada view-nya)
        Route::get('/personalisasi', function () {
            return view('admin.personalisasi');
        })->name('personalisasi.index');

        // Pelanggan
        Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan.index');
        Route::post('/pelanggan', [PelangganController::class, 'store'])->name('pelanggan.store');
        Route::get('/pelanggan/{id}/edit', [PelangganController::class, 'edit'])->name('pelanggan.edit');
        Route::put('/pelanggan/{id}', [PelangganController::class, 'update'])->name('pelanggan.update');
        Route::delete('/pelanggan/{id}', [PelangganController::class, 'destroy'])->name('pelanggan.destroy');

        // Kontak yang masuk ke admin
        Route::get('/contacts', [ContactController::class, 'admin'])->name('contacts');
        Route::get('/contacts/{id}', [ContactController::class, 'show'])->name('contacts.show');
        Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');
        Route::patch('/contacts/{id}/read', [ContactController::class, 'markAsRead'])->name('contacts.read');
    });

/*
|--------------------------------------------------------------------------
| LOGIN ADMIN KHUSUS (MANUAL)
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login');

Route::post('/admin/login', function (Request $request) {

    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    // paksa role admin
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
| GOOGLE LOGIN (USER)
|--------------------------------------------------------------------------
*/

Route::get('/auth/google', [RegisterController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/auth/google/callback', [RegisterController::class, 'handleGoogleCallback'])->name('google.callback');

/*
|--------------------------------------------------------------------------
| SOPIR (HARUS LOGIN + ROLE SOPIR)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', IsSopir::class])
    ->prefix('sopir')
    ->name('sopir.')
    ->group(function () {

        // HALAMAN TRAVEL
        Route::get('/travel', [SopirTravelController::class, 'index'])
            ->name('travel');

        // === ROUTE LAMA (Opsional, tetap biar tidak error di file lama) ===
        Route::post('/travel/mobil', [SopirTravelController::class, 'saveMobil'])
            ->name('travel.mobil');

        Route::post('/travel/rute', [SopirTravelController::class, 'saveRute'])
            ->name('travel.rute');

        Route::post('/travel/kontak', [SopirTravelController::class, 'saveKontak'])
            ->name('travel.kontak');

        // === ROUTE WIZARD BARU ===
        Route::post('/travel/simpan', [SopirTravelController::class, 'simpan'])
            ->name('travel.simpan');


        // Dashboard sopir
        Route::get('/dashboard', [SopirController::class, 'dashboard'])->name('dashboard');

        // Travel (wizard pengisian data armada + kontak)
        Route::get('/travel', [SopirTravelController::class, 'index'])->name('travel');
        Route::post('/travel/mobil', [SopirTravelController::class, 'saveMobil'])->name('travel.mobil');
        Route::post('/travel/rute', [SopirTravelController::class, 'saveRute'])->name('travel.rute');
        Route::post('/travel/kontak', [SopirTravelController::class, 'saveKontak'])->name('travel.kontak');

        // ⬇️ route baru untuk wizard 3 step
        Route::post('/sopir/travel/simpan', [SopirTravelController::class, 'simpan'])->name('sopir.travel.simpan');

        // Jadwal travel
        Route::get('/jadwal', [SopirTravelController::class, 'jadwal'])->name('jadwal');
        Route::post('/jadwal', [SopirTravelController::class, 'storeJadwal'])->name('jadwal.store');
        Route::put('/jadwal/{travel}', [SopirTravelController::class, 'updateJadwal'])->name('jadwal.update');
        Route::delete('/jadwal/{travel}', [SopirTravelController::class, 'destroyJadwal'])->name('jadwal.destroy');

        // Profil sopir
        Route::get('/profil', [SopirProfilController::class, 'index'])->name('profil');

        // Notifikasi sopir
        Route::get('/notifikasi', [SopirNotifController::class, 'index'])->name('notifikasi');

        // Personalisasi / pengaturan tampilan sopir
        Route::get('/personal', [SopirPersonalisasiController::class, 'index'])->name('personal');

        // Bantuan sopir
        Route::get('/bantuan', [SopirBantuanController::class, 'index'])->name('bantuan');
    });

Route::middleware(['auth', IsAdmin::class])
    ->get('/travel', [AdminSopirController::class, 'index'])
    ->name('admin.sopir.travel'); // nama bebas, jangan sama dengan yg lain


/*
|--------------------------------------------------------------------------
| FALLBACK (404)
|--------------------------------------------------------------------------
*/

Route::fallback(function () {
    abort(404);
});

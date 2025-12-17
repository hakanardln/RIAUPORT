<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


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
use App\Http\Controllers\SopirDashboardController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Admin\TravelApprovalController;
use App\Http\Controllers\Auth\ForgotPasswordController;


// Middleware
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsSopir;

/*
|--------------------------------------------------------------------------
| HOME & PUBLIC PAGE
|--------------------------------------------------------------------------
*/

// routes terms and conditions
Route::get('/syarat-ketentuan', function () {
    return view('terms');
})->name('terms');


Route::get('/file/{path}', function ($path, $status = null) {

    $path = urldecode($path);

    if (!Storage::disk('public')->exists($path)) {
        abort(404);
    }

    return response()->file(Storage::disk('public')->path($path));

})->where('path', '.*');


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/cari-travel', [HomeController::class, 'search'])->name('travel.search');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::post('/reviews', [ReviewController::class, 'store'])
    ->name('reviews.store')
    ->middleware('auth');

/*
|--------------------------------------------------------------------------
| LOGIN & LOGOUT (USER + SOPIR + ADMIN)
|--------------------------------------------------------------------------
*/

Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email');

Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('password.update');


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

// Logout umum (semua role), dibuat GET supaya simpel
Route::match(['GET', 'POST'], '/logout', [AuthController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| REGISTER USER + SOPIR + OTP
|--------------------------------------------------------------------------
*/

// Register user biasa
Route::get('/register', [RegisterController::class, 'showRegister'])->name('register.show');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// Register sopir (form + proses simpan + OTP)
Route::get('/register-sopir', [RegisterController::class, 'showDriverRegister'])->name('register.sopir.show');
Route::post('/register-sopir', [RegisterController::class, 'storeDriver'])->name('register.sopir.store');

// OTP
Route::get('/verify-otp', [RegisterController::class, 'showOtpForm'])->name('otp.show');
Route::post('/verify-otp', [RegisterController::class, 'verifyOtp'])->name('otp.verify');
Route::post('/resend-otp', [RegisterController::class, 'resendOtp'])->name('otp.resend');

/*
|--------------------------------------------------------------------------
| DASHBOARD (ROUTE UMUM SETELAH LOGIN)
|--------------------------------------------------------------------------
*/

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

        // Kelola sopir
        Route::get('/sopir', [AdminSopirController::class, 'index'])->name('sopir.index');

        // Personalisasi admin
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

        // === TRAVEL APPROVAL (BARU) ===
        Route::prefix('travel')->name('travel.')->group(function () {
            Route::get('/', [TravelApprovalController::class, 'index'])->name('index');
            Route::get('/{id}', [TravelApprovalController::class, 'show'])->name('show');
            Route::post('/{id}/approve', [TravelApprovalController::class, 'approve'])->name('approve');
            Route::post('/{id}/reject', [TravelApprovalController::class, 'reject'])->name('reject');
            Route::delete('/{id}', [TravelApprovalController::class, 'destroy'])->name('destroy');
        });

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
| GOOGLE LOGIN (USER & ADMIN)
|--------------------------------------------------------------------------
*/

Route::get('/auth/google', [RegisterController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/auth/google/callback', [RegisterController::class, 'handleGoogleCallback'])->name('google.callback');

// Google login admin
Route::get('/admin/auth/google', [AdminGoogleController::class, 'redirect'])->name('admin.google.redirect');
Route::get('/admin/auth/google/callback', [AdminGoogleController::class, 'callback'])->name('admin.google.callback');

/*
|--------------------------------------------------------------------------
| SOPIR (HARUS LOGIN + ROLE SOPIR)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', IsSopir::class])
    ->prefix('sopir')
    ->name('sopir.')
    ->group(function () {

        // Dashboard sopir
        Route::get('/dashboard', [SopirDashboardController::class, 'index'])->name('dashboard');

        // Travel (profil travel sopir)
        Route::get('/travel', [SopirTravelController::class, 'index'])->name('travel');

        // Versi lama per-tab
        Route::post('/travel/mobil', [SopirTravelController::class, 'saveMobil'])->name('travel.mobil');
        Route::post('/travel/rute', [SopirTravelController::class, 'saveRute'])->name('travel.rute');
        Route::post('/travel/kontak', [SopirTravelController::class, 'saveKontak'])->name('travel.kontak');

        // Wizard baru 3 step
        Route::post('/travel/simpan', [SopirTravelController::class, 'simpan'])->name('travel.simpan');

        // JADWAL SOPIR
        Route::get('/jadwal', [SopirTravelController::class, 'jadwal'])->name('jadwal');

        // buat jadwal baru
        Route::get('/jadwal/create', [SopirTravelController::class, 'createJadwal'])->name('jadwal.create');
        Route::post('/jadwal', [SopirTravelController::class, 'storeJadwal'])->name('jadwal.store');

        // edit jadwal
        Route::get('/jadwal/{travel}/edit', [SopirTravelController::class, 'editJadwal'])->name('jadwal.edit');
        Route::put('/jadwal/{travel}', [SopirTravelController::class, 'updateJadwal'])->name('jadwal.update');

        // hapus jadwal
        Route::delete('/jadwal/{travel}', [SopirTravelController::class, 'destroyJadwal'])->name('jadwal.destroy');

        // Profil sopir
        Route::get('/profil', [SopirProfilController::class, 'index'])->name('profil');

        // Halaman edit profil (form)
        Route::get('/profil/edit', [SopirProfilController::class, 'edit'])->name('profil.edit');
        Route::put('/profil', [SopirProfilController::class, 'update'])->name('profil.update');



        // Notifikasi
        Route::get('/notifikasi', [SopirNotifController::class, 'index'])->name('notifikasi');

        // Personalisasi
        Route::get('/personal', [SopirPersonalisasiController::class, 'index'])->name('personal');

        // Bantuan
        Route::get('/bantuan', [SopirBantuanController::class, 'index'])->name('bantuan');
    });

// Admin lihat data travel sopir
Route::middleware(['auth', IsAdmin::class])
    ->get('/travel', [AdminSopirController::class, 'index'])
    ->name('admin.sopir.travel');

/*
|--------------------------------------------------------------------------
| FALLBACK (404)
|--------------------------------------------------------------------------
*/

Route::fallback(function () {
    abort(404);
});

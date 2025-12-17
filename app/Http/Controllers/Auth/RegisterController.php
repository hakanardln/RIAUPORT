<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\OtpMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Password;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    // ====================== REGISTER USER BIASA ======================
    public function showRegister()
    {
        return view('auth.register');
    }

    // REGISTER USER BIASA + OTP
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::min(8)],
        ]);

        // generate OTP 6 digit
        $otp = (string) random_int(100000, 999999);

        // buat user tapi belum login & belum verified
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'otp_code' => $otp,
            'otp_expires_at' => now()->addMinute(),
            'is_verified' => false,
            'role' => 'user',
        ]);

        // kirim OTP ke email
        Mail::to($user->email)->send(new OtpMail($otp));

        // simpan id user di session untuk proses OTP
        $request->session()->put('otp_user_id', $user->id);

        return redirect()
            ->route('otp.show')
            ->with('status', 'kode OTP telah dikirim');
    }

    // ====================== REGISTER SOPIR + OTP ======================
    public function showDriverRegister()
    {
        return view('auth.register-sopir');
    }

    public function storeDriver(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:6', 'confirmed'],
        ]);

        // Generate OTP
        $otp = rand(100000, 999999);

        // Buat akun sopir
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'sopir',
            'otp_code' => $otp,
            'otp_expires_at' => now()->addMinute(),
            'is_verified' => false,
        ]);

        Mail::to($user->email)->send(new OtpMail($otp));

        $request->session()->put('otp_user_id', $user->id);

        return redirect()
            ->route('otp.show')
            ->with('status', 'kode OTP telah dikirim');
    }

    // ====================== FORM OTP ======================
    public function showOtpForm(Request $request)
    {
        if (!$request->session()->has('otp_user_id')) {
            return redirect()->route('register.show');
        }

        $userId = $request->session()->get('otp_user_id');
        $user = User::find($userId);

        if (!$user) {
            return redirect()->route('register.show');
        }

        $remainingSeconds = 0;
        if ($user->otp_expires_at) {
            $remainingSeconds = intval(now()->diffInSeconds($user->otp_expires_at, false));
            if ($remainingSeconds < 0) {
                $remainingSeconds = 0;
            }
        }

        return view('auth.verify-otp', compact('remainingSeconds'));
    }

    // ====================== VERIFIKASI OTP ======================
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => ['required', 'string'],
        ]);

        $userId = $request->session()->get('otp_user_id');

        if (!$userId) {
            return redirect()->route('register.show');
        }

        $user = User::find($userId);

        if (!$user) {
            return redirect()->route('register.show');
        }

        if ($user->otp_expires_at && now()->greaterThan($user->otp_expires_at)) {
            return back()->withErrors(['otp' => 'Kode OTP sudah kedaluwarsa. Silakan kirim ulang.']);
        }

        if ($user->otp_code !== $request->otp) {
            return back()->withErrors(['otp' => 'Kode OTP salah.']);
        }

        $user->update([
            'is_verified' => true,
            'otp_code' => null,
            'otp_expires_at' => null,
        ]);

        $request->session()->forget('otp_user_id');
        Auth::login($user);

        if ($user->role === 'sopir') {
            return redirect()->route('sopir.dashboard');
        }

        return redirect()->intended('/dashboard');
    }

    // ====================== KIRIM ULANG OTP ======================
    public function resendOtp(Request $request)
    {
        $userId = $request->session()->get('otp_user_id');

        if (!$userId) {
            return redirect()->route('register.show');
        }

        $user = User::find($userId);

        if (!$user) {
            return redirect()->route('register.show');
        }

        $otp = (string) random_int(100000, 999999);

        $user->update([
            'otp_code' => $otp,
            'otp_expires_at' => now()->addMinute(),
        ]);

        Mail::to($user->email)->send(new OtpMail($otp));

        return redirect()
            ->route('otp.show')
            ->with('status', 'kode OTP telah dikirim');
    }

    // ====================== GOOGLE LOGIN (SMART LOGIC) ======================
    public function redirectToGoogle(Request $request)
    {
        // Simpan context dari parameter URL
        $context = $request->query('context', 'login');

        // Simpan ke session dengan waktu expire 10 menit
        session([
            'google_auth_context' => $context,
            'google_auth_time' => now()->timestamp
        ]);

        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(Request $request)
    {
        try {
            // Ambil user dari Google
            $googleUser = Socialite::driver('google')->user();

            // Log untuk debugging
            Log::info('Google Login Attempt', [
                'email' => $googleUser->getEmail(),
                'name' => $googleUser->getName(),
            ]);

            // Ambil context (jika tidak ada, default 'login')
            $context = session('google_auth_context', 'login');

            // Hapus session context setelah diambil
            session()->forget(['google_auth_context', 'google_auth_time']);

            // Cari user berdasarkan email ATAU google_id
            $user = User::where('email', $googleUser->getEmail())
                ->orWhere('google_id', $googleUser->getId())
                ->first();

            // ========== CASE 1: USER SUDAH ADA (LOGIN) ==========
            if ($user) {
                // Update google_id dan avatar jika belum ada
                if (!$user->google_id || !$user->avatar_path) {
                    $user->update([
                        'google_id' => $googleUser->getId(),
                        'avatar_path' => $googleUser->getAvatar(),
                        'is_verified' => true,
                        'email_verified_at' => $user->email_verified_at ?? now(),
                    ]);
                }

                // Login
                Auth::login($user, true);

                Log::info('Google Login Success', ['user_id' => $user->id, 'role' => $user->role]);

                // Redirect sesuai role (user lama, bukan user baru)
                return $this->redirectBasedOnRole($user, false);
            }

            // ========== CASE 2: USER BARU ==========

            // Jika context adalah 'login', berarti user coba login tapi belum punya akun
            if ($context === 'login') {
                Log::warning('Google Login Failed - User Not Found', [
                    'email' => $googleUser->getEmail()
                ]);

                return redirect()
                    ->route('login')
                    ->withErrors(['email' => 'Akun dengan email ini belum terdaftar. Silakan daftar terlebih dahulu.']);
            }

            // Tentukan role berdasarkan context (hanya untuk register)
            $role = ($context === 'register-sopir') ? 'sopir' : 'user';

            // Buat user baru
            $user = User::create([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'google_id' => $googleUser->getId(),
                'avatar_path' => $googleUser->getAvatar(),
                'password' => Hash::make(Str::random(32)),
                'email_verified_at' => now(),
                'is_verified' => true,
                'role' => $role,
            ]);

            // Login otomatis
            Auth::login($user, true);

            Log::info('Google Register Success', ['user_id' => $user->id, 'role' => $role]);

            // Redirect sesuai role (user baru)
            return $this->redirectBasedOnRole($user, true);

        } catch (\Laravel\Socialite\Two\InvalidStateException $e) {
            // Error state mismatch (sering terjadi jika user cancel atau session expired)
            Log::error('Google OAuth State Error', ['message' => $e->getMessage()]);

            return redirect()
                ->route('login')
                ->withErrors(['email' => 'Session login Google kedaluwarsa. Silakan coba lagi.']);

        } catch (\Exception $e) {
            // Error umum lainnya
            Log::error('Google OAuth Error', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);

            // TEMPORARY: Tampilkan error detail (HAPUS SETELAH SELESAI DEBUG!)
            return redirect()
                ->route('login')
                ->withErrors(['email' => 'Error: ' . $e->getMessage() . ' (Line: ' . $e->getLine() . ')']);
        }
    }

    // ====================== HELPER: REDIRECT BASED ON ROLE ======================
    private function redirectBasedOnRole($user, $isNewUser = false)
    {
        switch ($user->role) {
            case 'admin':
                return redirect()->route('admin.dashboard');

            case 'sopir':
                if ($isNewUser) {
                    return redirect()
                        ->route('sopir.dashboard')
                        ->with('success', 'Akun sopir berhasil dibuat! Silakan lengkapi profil Anda.');
                }
                return redirect()->route('sopir.dashboard');

            case 'user':
            default:
                if ($isNewUser) {
                    return redirect()
                        ->route('home')
                        ->with('success', 'Selamat datang di RiauPort!');
                }
                return redirect()->route('home');
        }
    }
}
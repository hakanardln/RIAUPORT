<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\OtpMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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
            // 🔥 OTP hanya 1 menit
            'otp_expires_at' => now()->addMinute(),
            'is_verified' => false,
            // optional: set role default
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
        return view('auth.register-sopir'); // pakai view khusus sopir
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

        // 🔥 Hitung sisa detik untuk countdown
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

        // cek kadaluarsa dulu
        if ($user->otp_expires_at && now()->greaterThan($user->otp_expires_at)) {
            return back()->withErrors(['otp' => 'Kode OTP sudah kedaluwarsa. Silakan kirim ulang.']);
        }

        // cek kode OTP
        if ($user->otp_code !== $request->otp) {
            return back()->withErrors(['otp' => 'Kode OTP salah.']);
        }

        // tandai verified dan bersihkan OTP
        $user->update([
            'is_verified' => true,
            'otp_code' => null,
            'otp_expires_at' => null,
        ]);

        // hapus info OTP dari session lalu login
        $request->session()->forget('otp_user_id');
        Auth::login($user);

        // redirect beda tergantung role
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

        // generate OTP baru
        $otp = (string) random_int(100000, 999999);

        // update ke user
        $user->update([
            'otp_code' => $otp,
            'otp_expires_at' => now()->addMinute(),
        ]);

        // kirim email lagi
        Mail::to($user->email)->send(new OtpMail($otp));

        return redirect()
            ->route('otp.show')
            ->with('status', 'kode OTP telah dikirim');
    }

    // ====================== GOOGLE LOGIN ======================
    public function redirectToGoogle(Request $request)
    {
        // baca role dari query (?role=user / ?role=sopir), default 'user'
        $role = $request->query('role', 'user');

        // simpan role sementara di session
        $request->session()->put('google_register_role', $role); {
            config([
                'services.google.redirect' => route('google.callback'),
            ]);

            return Socialite::driver('google')->redirect();
        }
    }

    public function handleGoogleCallback(Request $request)
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // ambil role yang disimpan saat redirect (default user)
            $role = $request->session()->pull('google_register_role', 'user');

            $user = User::where('email', $googleUser->getEmail())->first();

            if ($user) {
                // update data Google kalau belum ada
                if (!$user->google_id) {
                    $user->update([
                        'google_id' => $googleUser->getId(),
                        'avatar_path' => $googleUser->getAvatar(),
                        'is_verified' => true,
                    ]);
                }

                // kalau user lama belum punya role, isi pakai role dari session
                if (!$user->role) {
                    $user->role = $role;
                    $user->save();
                }
            } else {
                // user baru via Google
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'avatar_path' => $googleUser->getAvatar(),
                    'password' => Hash::make(Str::random(24)),
                    'email_verified_at' => now(),
                    'is_verified' => true, // Google dianggap verified
                    'role' => $role,
                ]);
            }

            Auth::login($user, true);

            // redirect sesuai role
            if ($user->role === 'sopir') {
                return redirect()->route('sopir.dashboard');
            }

            return redirect()->intended('/dashboard');

        } catch (\Exception $e) {
            return redirect('/register')
                ->withErrors(['email' => 'Terjadi kesalahan saat registrasi dengan Google.']);
        }
    }
}
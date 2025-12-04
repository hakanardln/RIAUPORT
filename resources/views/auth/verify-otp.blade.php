<!DOCTYPE html>
<html lang="id" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi OTP • RiauPort</title>

    <!-- FAVICON – sama seperti halaman daftar -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon_io/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon_io/site.webmanifest') }}">

    <!-- Opsional untuk Android Chrome -->
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon_io/android-chrome-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('favicon_io/android-chrome-512x512.png') }}">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- HS Input -->
    <script src="https://unpkg.com/preline/dist/preline.js"></script>

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=IM+Fell+French+Canon:ital@0;1&family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --primary: #0E586D;
            --primary-dark: #0B4C5D;
            --accent: #00D4FF;
        }

        html,
        body {
            height: 100%;
            overflow: hidden;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f0f7ff 0%, #e0f2fe 100%);
        }

        .fell {
            font-family: 'IM FELL French Canon', serif;
        }

        .wave-bg {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 320'%3E%3Cpath fill='%23CAE9EF' fill-opacity='0.35' d='M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,144C960,149,1056,139,1152,122.7C1248,107,1344,85,1392,74.7L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z'%3E%3C/path%3E%3C/svg%3E");
            background-size: cover;
            background-position: bottom;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.78);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .btn-3d {
            background: linear-gradient(145deg, var(--primary), #0f6a82);
            box-shadow: 0 8px 0 var(--primary-dark), 0 16px 30px rgba(14, 88, 109, 0.35);
            transition: all 0.2s ease;
        }

        .btn-3d:hover {
            transform: translateY(3px);
            box-shadow: 0 5px 0 var(--primary-dark), 0 10px 20px rgba(14, 88, 109, 0.3);
        }

        .btn-3d:active {
            transform: translateY(6px);
            box-shadow: 0 2px 0 var(--primary-dark);
        }
    </style>
</head>

<body class="h-full flex items-center justify-center">

    <div class="h-full w-full max-w-7xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 h-full rounded-3xl overflow-hidden shadow-2xl">

            <!-- LEFT HERO -->
            <div
                class="hidden lg:flex relative wave-bg bg-gradient-to-br from-cyan-50 to-sky-100 items-center justify-center p-10">
                <div class="absolute inset-0 bg-gradient-to-t from-black/10 to-transparent"></div>
                <div class="relative z-10 text-center">
                    <img src="{{ asset('images/riauport-logo.png') }}" class="w-80 mx-auto drop-shadow-2xl mb-8">
                    <h2 class="fell text-5xl font-bold text-gray-800 mb-4">RiauPort</h2>
                    <p class="fell text-2xl text-gray-700 leading-relaxed max-w-md mx-auto">
                        Tinggal satu langkah lagi untuk<br>
                        <span class="text-[var(--primary)] font-bold">mengamankan akunmu</span>.
                    </p>
                </div>
            </div>

            <!-- RIGHT PANEL -->
            <div class="flex items-center justify-center bg-gradient-to-br from-gray-50 to-white p-6 sm:p-8">
                <div class="w-full max-w-md">

                    <div class="glass-card rounded-3xl p-8 sm:p-10 shadow-xl relative overflow-hidden">
                        <div
                            class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-[var(--primary)] to-[var(--accent)]">
                        </div>

                        <div class="text-center mb-6">
                            <h1 class="text-3xl sm:text-4xl font-bold text-[var(--primary)]">Verifikasi Kode OTP</h1>
                            <p class="text-gray-600 mt-2 text-sm">
                                Kami telah mengirim kode verifikasi ke email yang kamu gunakan saat mendaftar.
                            </p>
                        </div>

                        {{-- Alert sukses --}}
                        @if (session('status'))
                            <div
                                class="mb-4 p-3 rounded-2xl bg-emerald-50 border border-emerald-200 text-sm text-emerald-700">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{-- Alert error --}}
                        @if ($errors->any())
                            <div class="mb-4 p-3 rounded-2xl bg-red-50 border border-red-200 text-sm text-red-700">
                                {{ $errors->first() }}
                            </div>
                        @endif

                        <!-- FORM -->
                        <form id="otp-form" action="{{ route('otp.verify') }}" method="POST" class="space-y-6">
                            @csrf

                            <!-- INPUT OTP -->
                            <div>
                                <label class="text-sm font-semibold text-gray-700">Kode OTP</label>

                                <div class="mt-3 flex justify-center gap-x-3"
                                    data-hs-pin-input='{"availableCharsRE": "^[0-9]+$"}'>

                                    @for ($i = 0; $i < 6; $i++)
                                        <input type="text" maxlength="1"
                                            class="block w-12 h-14 text-center rounded-2xl border border-gray-300 bg-white/70
                    text-lg font-semibold tracking-widest
                    [&::-webkit-inner-spin-button]:appearance-none
                    [&::-webkit-outer-spin-button]:appearance-none
                    focus:border-[var(--primary)] focus:ring-[var(--primary)]
                    focus:ring-2 transition-all"
                                            placeholder="⚬" data-hs-pin-input-item>
                                    @endfor
                                </div>

                                <input type="hidden" id="otp-hidden" name="otp">

                                <p class="mt-2 text-[11px] text-gray-500">
                                    Kode berlaku sekitar 1 menit. Jangan berikan kode ini kepada siapa pun.
                                </p>
                            </div>

                            <!-- COUNTDOWN -->
                            <div class="flex justify-between text-xs text-gray-500">
                                <span id="otp-timer">
                                    @if (isset($remainingSeconds) && $remainingSeconds > 0)
                                        Kode berlaku selama <span id="otp-timer-number">{{ $remainingSeconds }}</span>
                                        detik.
                                    @else
                                        Kode OTP sudah kadaluarsa.
                                    @endif
                                </span>

                                <button type="button" id="resend-btn"
                                    class="text-[var(--primary)] font-semibold underline-offset-2 hover:underline disabled:text-gray-400 disabled:cursor-not-allowed"
                                    @if (isset($remainingSeconds) && $remainingSeconds > 0) disabled @endif>
                                    Kirim ulang OTP
                                </button>
                            </div>
                        </form>

                        <!-- FORM RESEND -->
                        <form id="resend-form" action="{{ route('otp.resend') }}" method="POST" class="hidden">
                            @csrf
                        </form>

                    </div>

                </div>
            </div>

        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const otpInputs = document.querySelectorAll('[data-hs-pin-input-item]');
            const otpHidden = document.getElementById('otp-hidden');
            const otpForm = document.getElementById('otp-form');

            if (!otpInputs.length || !otpHidden || !otpForm) return;

            let isSubmitting = false;

            function updateOtpAndMaybeSubmit() {
                let code = '';

                otpInputs.forEach(input => {
                    code += (input.value || '');
                });

                otpHidden.value = code;

                if (code.length === otpInputs.length && !isSubmitting) {
                    isSubmitting = true;
                    otpForm.submit();
                }
            }

            otpInputs.forEach(input => {
                input.addEventListener('input', updateOtpAndMaybeSubmit);
                input.addEventListener('keyup', updateOtpAndMaybeSubmit);
            });
        });
    </script>
</body>

</html>

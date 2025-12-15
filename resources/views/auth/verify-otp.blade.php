<!DOCTYPE html>
<html lang="id" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi OTP • RiauPort</title>

    <!-- FAVICON -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon_io/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon_io/site.webmanifest') }}">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

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
        }

        body {
            font-family: 'Inter', sans-serif;
            background:
                linear-gradient(135deg, rgba(14, 88, 109, 0.5) 0%, rgba(0, 212, 255, 0.4) 100%),
                url('{{ asset('images/login-bg.jpg') }}') center/cover no-repeat fixed;
            min-height: 100vh;
        }

        /* Tombol sama seperti tombol Daftar (register) */
        .btn-3d {
            background: linear-gradient(145deg, var(--primary), #0f6a82);
            box-shadow: 0 4px 6px rgba(14, 88, 109, 0.3);
            transition: all 0.2s ease;
        }

        .btn-3d:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(14, 88, 109, 0.4);
        }

        .btn-3d:active {
            transform: translateY(0);
            box-shadow: 0 2px 4px rgba(14, 88, 109, 0.3);
        }
    </style>
</head>

<body class="flex items-center justify-center p-4">

    <div class="w-full max-w-4xl mx-auto">
        <div class="grid md:grid-cols-3 rounded-2xl overflow-hidden shadow-[0_2px_12px_-3px_rgba(14,14,14,0.45)]">

            <!-- PANEL KIRI (STYLE REGISTER) -->
            <div
                class="flex flex-col justify-center items-center text-center space-y-10
                        bg-gradient-to-br from-cyan-50 to-sky-100 px-6 lg:px-8 py-10">

                <img src="{{ asset('images/riauport-logo.png') }}" alt="RiauPort" class="w-28 h-28 object-contain">

                <div class="space-y-6 max-w-xs">
                    <h3 class="text-2xl font-bold text-[var(--primary)]">
                        Verifikasi OTP
                    </h3>

                    <p class="text-slate-600 text-sm leading-relaxed">
                        Pastikan akunmu aman sebelum masuk ke RiauPort. Kami telah mengirimkan kode OTP ke email
                        terdaftarmu.
                    </p>

                    <p class="text-slate-600 text-sm leading-relaxed">
                        Jangan bagikan kode OTP ke siapa pun. Kode ini bersifat rahasia dan hanya berlaku sementara.
                    </p>
                </div>
            </div>

            <!-- PANEL KANAN (PUTIH SOLID) -->
            <div class="md:col-span-2 bg-white px-6 sm:px-14 py-10">

                <h1 class="text-2xl font-bold text-slate-900">
                    Masukkan Kode OTP
                </h1>
                <p class="text-slate-600 text-sm mt-1">
                    6 digit kode yang dikirim ke email kamu
                </p>

                {{-- Alert sukses --}}
                @if (session('status'))
                    <div class="mt-4 p-3 rounded-md bg-emerald-50 border border-emerald-200 text-sm text-emerald-700">
                        {{ session('status') }}
                    </div>
                @endif

                {{-- Alert error --}}
                @if ($errors->any())
                    <div class="mt-4 p-3 rounded-md bg-red-50 border border-red-200 text-sm text-red-700">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form id="otp-form" action="{{ route('otp.verify') }}" method="POST" class="mt-6">
                    @csrf

                    <!-- OTP INPUT -->
                    <label class="text-sm font-medium text-slate-900 mb-2 block">
                        Kode OTP
                    </label>

                    <!-- ✅ OTP DIBESARKAN (lebih proporsional) -->
                    <div class="flex gap-x-3 mb-2" data-hs-pin-input="">
                        @for ($i = 0; $i < 6; $i++)
                            <input type="text" maxlength="1" inputmode="numeric" data-hs-pin-input-item
                                class="otp-input block w-11 h-12 text-base text-center
                                       border border-gray-200 rounded-md
                                       focus:border-blue-500 focus:ring-blue-500
                                       transition
                                       disabled:opacity-50 disabled:pointer-events-none"
                                @if ($i === 0) autofocus @endif
                                aria-label="Digit OTP {{ $i + 1 }}">
                        @endfor
                    </div>

                    <input type="hidden" id="otp-hidden" name="otp">

                    <p class="text-xs text-slate-500 mt-2">
                        Kode berlaku sekitar 1 menit
                    </p>

                    <!-- TIMER + RESEND -->
                    <div class="flex justify-between items-center text-xs text-slate-500 mt-4">
                        <span id="otp-timer">
                            @if (isset($remainingSeconds) && $remainingSeconds > 0)
                                Kode berlaku <span id="otp-timer-number">{{ $remainingSeconds }}</span> detik
                            @else
                                Kode OTP sudah kadaluarsa
                            @endif
                        </span>

                        <button type="button" id="resend-btn"
                            class="text-[var(--primary)] font-medium hover:underline
                                   disabled:text-slate-400 disabled:cursor-not-allowed"
                            @if (isset($remainingSeconds) && $remainingSeconds > 0) disabled @endif>
                            Kirim ulang OTP
                        </button>
                    </div>

                    <!-- BUTTON VERIFIKASI (SAMA SEPERTI REGISTER + SHINE) -->
                    <div class="mt-8">
                        <button type="submit"
                            class="btn-3d w-full py-2.5 px-4 text-sm font-semibold rounded-md text-white
                                   relative overflow-hidden group">
                            <span class="relative z-10">Verifikasi</span>
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent
                                       -translate-x-full group-hover:translate-x-full
                                       transition-transform duration-1000">
                            </div>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = Array.from(document.querySelectorAll('.otp-input'));
            const hidden = document.getElementById('otp-hidden');
            const form = document.getElementById('otp-form');

            const timerNumber = document.getElementById('otp-timer-number');
            const resendBtn = document.getElementById('resend-btn');
            const resendForm = document.getElementById('resend-form');

            let isSubmitting = false;

            function syncHidden() {
                hidden.value = inputs.map(i => (i.value || '')).join('');
            }

            function maybeSubmit() {
                syncHidden();
                if (hidden.value.length === inputs.length && !isSubmitting) {
                    isSubmitting = true;
                    form.submit();
                }
            }

            if (inputs.length) inputs[0].focus();

            inputs.forEach((input, idx) => {
                input.addEventListener('input', () => {
                    input.value = (input.value || '').replace(/[^0-9]/g, '').slice(0, 1);
                    if (input.value && idx < inputs.length - 1) inputs[idx + 1].focus();
                    maybeSubmit();
                });

                input.addEventListener('keydown', (e) => {
                    if (e.key === 'Backspace') {
                        if (!input.value && idx > 0) {
                            inputs[idx - 1].focus();
                            inputs[idx - 1].value = '';
                        } else {
                            input.value = '';
                        }
                        syncHidden();
                    }
                    if (e.key === 'ArrowLeft' && idx > 0) inputs[idx - 1].focus();
                    if (e.key === 'ArrowRight' && idx < inputs.length - 1) inputs[idx + 1].focus();
                });

                input.addEventListener('paste', (e) => {
                    e.preventDefault();
                    const text = (e.clipboardData || window.clipboardData).getData('text');
                    const digits = (text || '').replace(/[^0-9]/g, '').slice(0, inputs.length)
                        .split('');
                    digits.forEach((d, i) => {
                        if (inputs[i]) inputs[i].value = d;
                    });
                    const nextIndex = Math.min(digits.length, inputs.length - 1);
                    inputs[nextIndex].focus();
                    maybeSubmit();
                });
            });

            // countdown
            let remaining = timerNumber ? parseInt(timerNumber.textContent, 10) : 0;
            if (timerNumber && remaining > 0) {
                const interval = setInterval(() => {
                    remaining--;
                    timerNumber.textContent = remaining;

                    if (remaining <= 0) {
                        clearInterval(interval);
                        document.getElementById('otp-timer').textContent = 'Kode OTP sudah kadaluarsa';
                        resendBtn.disabled = false;
                    }
                }, 1000);
            }

            // resend submit
            resendBtn?.addEventListener('click', () => {
                if (resendBtn.disabled) return;
                resendForm.submit();
            });
        });
    </script>

</body>

</html>

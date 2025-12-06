<!DOCTYPE html>
<html lang="id" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login • RiauPort</title>

    <!-- FAVICON -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon_io/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon_io/site.webmanifest') }}">

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #0E586D;
        }

        body {
            font-family: 'Inter', sans-serif;
        }

        .btn-primary {
            background: linear-gradient(135deg, #1d9ad1, var(--primary));
            box-shadow: 0 8px 18px rgba(37, 99, 235, 0.35);
            transition: all 0.18s ease;
        }

        .btn-primary:hover {
            transform: translateY(1px);
            box-shadow: 0 5px 12px rgba(37, 99, 235, 0.3);
        }

        .btn-primary:active {
            transform: translateY(2px);
            box-shadow: 0 3px 8px rgba(37, 99, 235, 0.25);
        }

        .input-field:focus {
            box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.15);
            border-color: #2563EB;
        }

        .card-bg {
            background-image: url("{{ asset('images/latar.jpg') }}");
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body class="min-h-screen card-bg flex items-center justify-center px-4">

    <!-- CARD LOGIN -->
    <div class="w-full max-w-md bg-white/90 backdrop-blur-xl rounded-3xl shadow-2xl border border-slate-100 px-8 py-9">

        <!-- LOGO -->
        <div class="flex flex-col items-center mb-6">
            <img src="{{ asset('images/riauport-logo.png') }}" class="w-24 h-24 mb-4 object-contain drop-shadow-lg"
                alt="RiauPort Logo">

            <h1 class="text-xl md:text-2xl font-semibold text-slate-800">
                Admin Panel Login
            </h1>

            <p class="text-sm text-slate-500 mt-1 text-center">
                Masuk untuk mengelola sistem RiauPort.
            </p>
        </div>

        <!-- FORM -->
        <form method="POST" action="{{ route('admin.login.process') }}" class="space-y-5">
            @csrf

            <!-- EMAIL -->
            <div class="space-y-1">
                <label class="block text-sm font-medium text-slate-700">
                    Email / Username
                </label>
                <div class="relative mt-1">
                    <input type="email" name="email" required
                        class="input-field w-full rounded-xl border border-slate-200 bg-slate-50/70 px-4 pr-11 py-3 text-sm text-slate-800 placeholder-slate-400 focus:outline-none transition">

                    <span class="absolute inset-y-0 right-3 flex items-center text-slate-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24"
                            stroke="currentColor" fill="none" stroke-width="1.6">
                            <path
                                d="M4 6.5A2.5 2.5 0 0 1 6.5 4h11A2.5 2.5 0 0 1 20 6.5v11a2.5 2.5 0 0 1-2.5 2.5h-11A2.5 2.5 0 0 1 4 17.5v-11Z" />
                            <path d="M6 8l6 4 6-4" />
                        </svg>
                    </span>
                </div>
            </div>

            <!-- PASSWORD -->
            <div class="space-y-1">
                <label class="block text-sm font-medium text-slate-700">
                    Password
                </label>

                <div class="relative mt-1">
                    <input id="passwordInput" type="password" name="password" required
                        class="input-field w-full rounded-xl border border-slate-200 bg-slate-50/70 
                   px-4 pr-11 py-3 text-sm text-slate-800 placeholder-slate-400 
                   focus:outline-none transition">

                    <!-- Tombol Lihat Password -->
                    <button type="button" id="togglePassword"
                        class="absolute inset-y-0 right-3 flex items-center text-slate-400 active:text-slate-600">

                        <!-- Ikon mata -->
                        <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 pointer-events-none"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943
                         9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943
                         -9.542-7z" />
                            <circle cx="12" cy="12" r="3" />
                        </svg>

                    </button>
                </div>
            </div>


            <!-- REMEMBER + FORGOT -->
            <div class="flex items-center justify-between text-xs sm:text-sm">
                <label class="inline-flex items-center gap-2 cursor-pointer select-none text-slate-600">
                    <input type="checkbox"
                        class="rounded border-slate-300 text-blue-600 focus:ring-blue-500 focus:ring-offset-0">
                    <span>Ingat saya</span>
                </label>
            </div>

            <!-- ERROR -->
            @if ($errors->any())
                <div class="mt-1 mb-1 rounded-xl border border-red-100 bg-red-50 px-4 py-2 text-xs text-red-700">
                    {{ $errors->first() }}
                </div>
            @endif

            <!-- TOMBOL LOGIN -->
            <button type="submit"
                class="btn-primary w-full mt-3 rounded-xl py-3.5 text-sm font-semibold text-white flex items-center justify-center gap-2">
                Masuk
            </button>

            <!-- DIVIDER -->
            <div class="flex items-center gap-3 pt-2">
                <div class="h-px flex-1 bg-slate-200"></div>
                <span class="text-[11px] uppercase tracking-wide text-slate-400">atau</span>
                <div class="h-px flex-1 bg-slate-200"></div>
            </div>

            <!-- GOOGLE LOGIN -->
            <a href="{{ route('admin.google.redirect') }}"
                class="w-full flex items-center justify-center gap-3 py-3 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 text-sm font-medium text-slate-700 shadow-sm hover:shadow-md transition">
                <svg class="w-5 h-5" viewBox="0 0 48 48">
                    <path fill="#FFC107"
                        d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12s5.373-12,12-12c3.059,0,5.842,1.154,7.957,3.043l5.657-5.657C32.676,6.053,28.513,4,24,4C12.955,4,4,12.955,4,24s8.955,20,20,20s20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z" />
                    <path fill="#FF3D00"
                        d="M6.306,14.691l6.571,4.819C14.655,16.108,18.961,13,24,13c3.059,0,5.842,1.154,7.957,3.043l5.657-5.657C32.676,6.053,28.513,4,24,4C16.318,4,9.69,8.337,6.306,14.691z" />
                    <path fill="#4CAF50"
                        d="M24,44c4.438,0,8.49-1.706,11.566-4.49l-5.333-4.5C28.189,36.808,26.189,37,24,37c-5.202,0-9.616-3.317-11.279-7.954l-6.513,5.02C9.556,39.556,16.227,44,24,44z" />
                    <path fill="#1976D2"
                        d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.236-2.229,4.166-4.089,5.61l6.513,5.02C39.393,35.705,44,30,44,24C44,22.659,43.862,21.35,43.611,20.083z" />
                </svg>
                Masuk dengan Google
            </a>

        </form>
    </div>
    <script>
        const passwordInput = document.getElementById('passwordInput');
        const togglePassword = document.getElementById('togglePassword');

        // Saat tombol ditekan → show password
        togglePassword.addEventListener('mousedown', () => {
            passwordInput.type = 'text';
        });

        // Saat tombol dilepas → hide password
        togglePassword.addEventListener('mouseup', () => {
            passwordInput.type = 'password';
        });

        togglePassword.addEventListener('mouseleave', () => {
            passwordInput.type = 'password';
        });

        // Untuk layar sentuh
        togglePassword.addEventListener('touchstart', () => {
            passwordInput.type = 'text';
        });

        togglePassword.addEventListener('touchend', () => {
            passwordInput.type = 'password';
        });
    </script>

</body>

</html>

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
    <link
        href="https://fonts.googleapis.com/css2?family=IM+Fell+French+Canon:ital@0;1&family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --primary: #0E586D;
            --primary-dark: #0B4C5D;
            --accent: #00D4FF;
        }

        body {
            font-family: 'Inter', sans-serif;
            background:
                linear-gradient(135deg, rgba(14, 88, 109, 0.5) 0%, rgba(0, 212, 255, 0.4) 100%),
                url('{{ asset('images/login-bg.jpg') }}') center/cover no-repeat fixed;
            min-height: 100vh;
        }

        .fell {
            font-family: 'IM FELL French Canon', serif;
        }

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

        .btn-google {
            background: white;
            border: 1.5px solid #e5e7eb;
            transition: all 0.2s ease;
        }

        .btn-google:hover {
            border-color: #d1d5db;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .input-underline {
            border-bottom: 2px solid #e5e7eb;
            transition: border-color 0.3s;
        }

        .input-underline:focus {
            border-color: var(--primary);
        }

        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            color: #9ca3af;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #e5e7eb;
        }

        .divider::before {
            margin-right: 1rem;
        }

        .divider::after {
            margin-left: 1rem;
        }
    </style>
</head>

<body class="md:min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-[950px] bg-white shadow-[0_2px_10px_-3px_rgba(14,14,14,0.3)] rounded-2xl overflow-hidden">
        <div class="flex items-center max-md:flex-col w-full gap-y-4">

            <!-- PANEL KIRI - HERO IMAGE -->
            <div class="md:max-w-[570px] w-full h-full">
                <div
                    class="md:aspect-[7/10] bg-gradient-to-br from-cyan-50 to-sky-100 relative overflow-hidden w-full h-full">
                    <img src="{{ asset('images/riauport-logo.png') }}" class="w-full h-full object-contain p-12 md:p-20"
                        alt="RiauPort Logo" />
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="w-full text-center pt-64 px-6 max-md:hidden">
                            <h1 class="fell text-[var(--primary)] text-3xl font-bold mb-2">RiauPort</h1>
                            <p class="fell text-gray-700 text-[15px] font-medium leading-relaxed">
                                Temukan berbagai <span class="text-[var(--primary)] font-bold">Travel</span> impianmu
                                dalam satu platform yang <span class="italic text-[var(--accent)]">mengagumkan</span>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PANEL KANAN - FORM LOGIN -->
            <div class="w-full h-full px-8 lg:px-16 py-8 max-md:-order-1">
                <form method="POST" action="{{ route('login.process') }}" class="md:max-w-md w-full mx-auto">
                    @csrf

                    <input type="hidden" name="redirect_to" value="{{ old('redirect_to', request('redirect_to')) }}">

                    <div class="mb-8">
                        <h3 class="text-4xl font-bold text-[var(--primary)]">Welcome!</h3>
                        <p class="text-gray-600 text-sm mt-2">Login ke akun RiauPort Anda</p>
                    </div>

                    <!-- TOMBOL GOOGLE LOGIN -->
                    <a href="{{ route('google.redirect', ['context' => 'login']) }}"
                        class="btn-google w-full py-3 rounded-lg font-medium text-gray-700 text-sm
                              flex items-center justify-center gap-3 mb-6 hover:shadow-lg transition-all">
                        <svg class="w-5 h-5" viewBox="0 0 24 24">
                            <path fill="#4285F4"
                                d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" />
                            <path fill="#34A853"
                                d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" />
                            <path fill="#FBBC05"
                                d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" />
                            <path fill="#EA4335"
                                d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" />
                        </svg>
                        <span>Continue with Google</span>
                    </a>

                    <!-- DIVIDER -->
                    <div class="divider text-xs my-6">or</div>

                    <!-- EMAIL INPUT -->
                    <div>
                        <label class="text-sm font-semibold text-gray-700">Email</label>
                        <div class="relative flex items-center">
                            <input name="email" type="email" required value="{{ old('email') }}"
                                class="mt-2 w-full px-4 py-3 rounded-xl bg-white/70 border border-gray-200 
                                          focus:outline-none focus:border-[var(--primary)] input-glow
                                          transition-all duration-300 placeholder-gray-400 text-sm"
                                placeholder="nama@email.com" />
                        </div>
                    </div>

                    <!-- PASSWORD INPUT -->
                    <div class="mt-6">
                        <label class="text-sm font-semibold text-gray-700">Password</label>
                        <div class="relative flex items-center">
                            <input name="password" type="password" id="password" required
                                class="mt-2 w-full px-4 py-3 pr-12 rounded-xl bg-white/70 border border-gray-200 
                                          focus:outline-none focus:border-[var(--primary)] input-glow
                                          transition-all duration-300 placeholder-gray-400 text-sm"
                                placeholder="••••••••" />
                            <button type="button" onclick="togglePassword()"
                                class="absolute right-3 top-1/2 -translate-y-1/2 mt-1 text-gray-500 hover:text-gray-700 focus:outline-none">
                                <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <svg id="eye-slash-icon" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 hidden">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- REMEMBER & FORGOT PASSWORD -->
                    <div class="flex flex-wrap items-center justify-between gap-4 mt-6">
                        <div class="flex items-center">
                            <input id="remember-me" name="remember" type="checkbox"
                                class="h-4 w-4 shrink-0 rounded-sm border-gray-300 focus:ring-2 focus:ring-[var(--primary)]"
                                style="color: var(--primary);" />
                            <label for="remember-me" class="text-gray-600 text-sm ml-3 block">
                                Ingat saya
                            </label>
                        </div>
                        <div>
                            <a href="{{ route('password.request') }}"
                                class="text-[var(--primary)] font-medium text-sm hover:underline">
                                Lupa password?
                            </a>
                        </div>
                    </div>

                    <!-- SUBMIT BUTTON -->
                    <div class="mt-10">
                        <button type="submit"
                            class="btn-3d w-full py-3 px-4 text-[15px] font-semibold tracking-wide rounded-lg text-white relative overflow-hidden group">
                            <span class="relative z-10">Sign in</span>
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent 
                                       translate-x-[-100%] group-hover:translate-x-[100%] 
                                       transition-transform duration-1000">
                            </div>
                        </button>
                        <p class="text-gray-600 text-sm text-center mt-6">
                            Belum punya akun?
                            <a href="{{ route('register.show') }}"
                                class="text-[var(--primary)] font-bold hover:text-[var(--primary-dark)] transition-colors ml-1 whitespace-nowrap">
                                Daftar di sini
                            </a>
                        </p>
                    </div>

                    <!-- ERROR MESSAGE -->
                    @if ($errors->any())
                        <div
                            class="mt-6 p-3 bg-red-50 border border-red-200 rounded-lg text-xs text-red-700 text-center">
                            {{ $errors->first() }}
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>

    <script>
        let passwordVisible = false;

        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            const eyeSlashIcon = document.getElementById('eye-slash-icon');

            passwordVisible = !passwordVisible;

            if (passwordVisible) {
                passwordInput.type = 'text';
                eyeIcon.classList.add('hidden');
                eyeSlashIcon.classList.remove('hidden');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('hidden');
                eyeSlashIcon.classList.add('hidden');
            }
        }
    </script>
</body>

</html>

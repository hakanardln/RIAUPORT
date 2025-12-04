<!DOCTYPE html>
<html lang="id" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Sopir • RiauPort</title>

    <!-- FAVICON -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon_io/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon_io/site.webmanifest') }}">

    <!-- Android Icons -->
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon_io/android-chrome-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('favicon_io/android-chrome-512x512.png') }}">

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

        .input-glow:focus {
            box-shadow: 0 0 0 3px rgba(14, 88, 109, 0.25);
            border-color: var(--primary);
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
                    <img src="{{ asset('images/riauport-logo.png') }}" alt="RiauPort"
                        class="w-72 mx-auto drop-shadow-2xl mb-6 animate-[pulse_6s_ease-in-out_infinite]">

                    <h2 class="fell text-4xl font-bold text-gray-800 mb-3">RiauPort</h2>

                    <p class="fell text-xl text-gray-700 leading-relaxed max-w-md mx-auto">
                        Bergabung sebagai <span class="text-[var(--primary)] font-bold">Sopir Travel</span><br>
                        dan buat perjalanan lebih mudah untuk pelanggan.
                    </p>
                </div>
            </div>

            <!-- RIGHT FORM PANEL -->
            <div class="flex items-center justify-center bg-gradient-to-br from-gray-50 to-white px-4 sm:px-8 lg:px-16">
                <div class="w-full max-w-md">
                    <div class="glass-card rounded-3xl p-8 sm:p-10 shadow-xl relative">

                        <div
                            class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-[var(--primary)] to-[var(--accent)]">
                        </div>

                        <div class="text-center mb-6">
                            <h1 class="text-3xl font-bold text-[var(--primary)]">Daftar Sopir</h1>
                            <p class="text-gray-600 mt-2 text-sm">
                                Isi data berikut untuk membuat akun sopir.
                            </p>
                        </div>

                        <form action="{{ route('register.sopir.store') }}" method="POST" class="space-y-5">
                            @csrf

                            <!-- NAMA -->
                            <div>
                                <label class="text-sm font-semibold text-gray-700">Nama Lengkap</label>
                                <input type="text" name="name" required
                                    class="mt-2 w-full px-5 py-4 rounded-2xl bg-white/70 border border-gray-200 input-glow"
                                    placeholder="Masukkan nama lengkap">
                            </div>

                            <!-- EMAIL -->
                            <div>
                                <label class="text-sm font-semibold text-gray-700">Email</label>
                                <input type="email" name="email" required
                                    class="mt-2 w-full px-5 py-4 rounded-2xl bg-white/70 border border-gray-200 input-glow"
                                    placeholder="nama@email.com">
                            </div>

                            <!-- PASSWORD -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="text-sm font-semibold text-gray-700">Password</label>
                                    <input type="password" name="password" required minlength="6"
                                        class="mt-2 w-full px-5 py-4 rounded-2xl bg-white/70 border border-gray-200 input-glow"
                                        placeholder="Min. 6 karakter">
                                </div>

                                <div>
                                    <label class="text-sm font-semibold text-gray-700">Konfirmasi</label>
                                    <input type="password" name="password_confirmation" required minlength="6"
                                        class="mt-2 w-full px-5 py-4 rounded-2xl bg-white/70 border border-gray-200 input-glow"
                                        placeholder="Ulangi password">
                                </div>
                            </div>

                            <!-- SUBMIT BUTTON -->
                            <button type="submit"
                                class="btn-3d w-full py-4 rounded-2xl text-white font-bold text-lg relative overflow-hidden group">
                                <span class="relative z-10">Daftar Sopir</span>
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent
                                    translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-1000">
                                </div>
                            </button>

                            <!-- OR SEPARATOR -->
                            <div class="relative my-6">
                                <div class="absolute inset-0 flex items-center">
                                    <div class="w-full border-t border-gray-300"></div>
                                </div>
                                <div class="relative flex justify-center text-sm">
                                    <span class="px-3 bg-gradient-to-br from-gray-50 to-white text-gray-500">atau</span>
                                </div>
                            </div>

                            <!-- GOOGLE BUTTON -->
                            <a href="{{ route('google.redirect', ['role' => 'sopir']) }}"
                                class="w-full flex items-center justify-center gap-3 py-3 rounded-2xl border border-gray-300 bg-white/80 hover:bg-white shadow-md hover:shadow-lg font-semibold text-gray-700 transition-all">

                                <svg class="w-5 h-5" viewBox="0 0 48 48">
                                    <path fill="#FFC107"
                                        d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8
                                    c-6.627,0-12-5.373-12-12s5.373-12,12-12c3.059,0,5.842,1.154,7.957,3.043l5.657-5.657C32.676,6.053,28.513,4,24,4
                                    C12.955,4,4,12.955,4,24s8.955,20,20,20s20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z" />
                                    <path fill="#FF3D00"
                                        d="M6.306,14.691l6.571,4.819C14.655,16.108,18.961,13,24,13
                                    c3.059,0,5.842,1.154,7.957,3.043l5.657-5.657C32.676,6.053,28.513,4,24,4C16.318,4,9.69,8.337,6.306,14.691z" />
                                    <path fill="#4CAF50"
                                        d="M24,44c4.438,0,8.49-1.706,11.566-4.49l-5.333-4.5
                                    C28.189,36.808,26.189,37,24,37c-5.202,0-9.616-3.317-11.279-7.954l-6.513,5.02C9.556,39.556,16.227,44,24,44z" />
                                    <path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.236-2.229,4.166-4.089,5.61
                                    l6.513,5.02C39.393,35.705,44,30,44,24C44,22.659,43.862,21.35,43.611,20.083z" />
                                </svg>

                                Daftar dengan Google
                            </a>

                            <!-- LOGIN LINK -->
                            <div class="text-center mt-6">
                                <span class="text-gray-600 text-sm">Sudah punya akun sopir?</span>
                                <a href="{{ route('login') }}"
                                    class="ml-2 font-semibold text-[var(--primary)] hover:text-[var(--primary-dark)] transition-colors text-sm">
                                    Masuk
                                </a>
                            </div>

                            <!-- ERROR ALERT -->
                            @if ($errors->any())
                                <div class="mt-6 p-4 bg-red-50 border border-red-200 rounded-2xl text-sm text-red-700">
                                    <ul class="list-disc list-inside">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>

</html>

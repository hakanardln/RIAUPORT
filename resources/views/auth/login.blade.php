<!DOCTYPE html>
<html lang="id" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login • RiauPort</title>

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

        html,
        body {
            height: 100%;
            margin: 0;
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
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 320'%3E%3Cpath fill='%23CAE9EF' fill-opacity='0.3' d='M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,144C960,149,1056,139,1152,122.7C1248,107,1344,85,1392,74.7L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z'%3E%3C/path%3E%3C/svg%3E");
            background-size: cover;
            background-position: bottom;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.75);
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

<body class="h-full flex items-center justify-center p-4 sm:p-6">

    <!-- Ukuran 90% dari layar + sedikit margin di sekeliling -->
    <div
        class="w-full max-w-7xl h-[90vh] mx-auto grid grid-cols-1 lg:grid-cols-2 rounded-3xl overflow-hidden shadow-2xl">

        <!-- PANEL KIRI – HERO -->
        <div class="relative wave-bg bg-gradient-to-br from-cyan-50 to-sky-100 flex items-center justify-center p-10">
            <div class="absolute inset-0 bg-gradient-to-t from-black/10 to-transparent"></div>

            <div class="relative z-10 text-center">
                <img src="{{ asset('images/riauport-logo.png') }}" alt="RiauPort Logo"
                    class="w-80 mx-auto drop-shadow-2xl mb-8 animate-[pulse_6s_ease-in-out_infinite]">

                <h2 class="fell text-4xl md:text-5xl font-bold text-gray-800 mb-4">
                    RiauPort
                </h2>
                <p class="fell text-xl md:text-2xl text-gray-700 leading-relaxed max-w-md mx-auto">
                    Temukan berbagai <span class="text-[var(--primary)] font-bold">Travel</span> impianmu<br>
                    dalam satu platform yang <span class="italic text-[var(--accent)]">mengagumkan</span>.
                </p>

                <div class="mt-12 flex justify-center gap-3">
                    <div class="w-3 h-3 bg-[var(--primary)] rounded-full animate-bounce"></div>
                    <div class="w-3 h-3 bg-[var(--accent)] rounded-full animate-bounce delay-100"></div>
                    <div class="w-3 h-3 bg-cyan-400 rounded-full animate-bounce delay-200"></div>
                </div>
            </div>
        </div>

        <!-- PANEL KANAN – FORM LOGIN -->
        <div class="bg-gradient-to-br from-gray-50 to-white flex items-center justify-center p-8 md:p-12">
            <div class="w-full max-w-md">

                <div class="glass-card rounded-3xl p-8 md:p-10 shadow-xl relative overflow-hidden">
                    <div
                        class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-[var(--primary)] to-[var(--accent)]">
                    </div>

                    <div class="flex items-center justify-between mb-10">
                        <div>
                            <h1 class="text-4xl font-bold text-[var(--primary)]">Welcome!</h1>
                            <p class="text-gray-600 mt-1">Login to your account</p>
                        </div>
                        <div
                            class="w-16 h-16 rounded-2xl bg-gradient-to-br from-[var(--primary)] to-cyan-600 shadow-lg">
                        </div>
                    </div>

                    <form method="POST" action="{{ route('login.attempt') }}" class="space-y-6">
                        @csrf

                        <div>
                            <label class="text-sm font-semibold text-gray-700">Email</label>
                            <input type="email" name="email" required
                                class="mt-2 w-full px-5 py-4 rounded-2xl bg-white/70 border border-gray-200 
                                          focus:outline-none focus:border-[var(--primary)] input-glow
                                          transition-all duration-300 placeholder-gray-400"
                                placeholder="nama@email.com">
                        </div>

                        <div>
                            <label class="text-sm font-semibold text-gray-700">Password</label>
                            <input type="password" name="password" required
                                class="mt-2 w-full px-5 py-4 rounded-2xl bg-white/70 border border-gray-200 
                                          focus:outline-none focus:border-[var(--primary)] input-glow
                                          transition-all duration-300 placeholder-gray-400"
                                placeholder="••••••••">
                        </div>

                        <div class="flex items-center justify-between">
                            <label class="flex items-center gap-3 cursor-pointer select-none">
                                <input type="checkbox"
                                    class="w-5 h-5 rounded text-[var(--primary)] focus:ring-[var(--primary)]">
                                <span class="text-gray-600">Ingat saya</span>
                            </label>
                            <a href="#" class="text-sm text-[var(--primary)] hover:underline">Lupa password?</a>
                        </div>

                        <button type="submit"
                            class="btn-3d w-full py-5 rounded-2xl text-white font-bold text-lg
                                       relative overflow-hidden group mt-8">
                            <span class="relative z-10">Login Sekarang</span>
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent 
                                          translate-x-[-100%] group-hover:translate-x-[100%] 
                                          transition-transform duration-1000">
                            </div>
                        </button>

                        <div class="text-center mt-8">
                            <span class="text-gray-600">Belum punya akun?</span>
                            <a href="{{ route('register') }}"
                                class="ml-2 font-bold text-[var(--primary)] hover:text-[var(--primary-dark)] transition-colors">
                                Daftar di sini
                            </a>
                        </div>

                        @if ($errors->any())
                            <div
                                class="mt-6 p-4 bg-red-50 border border-red-200 rounded-2xl text-sm text-red-700 text-center">
                                {{ $errors->first() }}
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<!DOCTYPE html>
<html lang="id" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Password Baru • RiauPort</title>

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
                linear-gradient(135deg, rgba(14, 88, 109, .5) 0%, rgba(0, 212, 255, .4) 100%),
                url('{{ asset('images/login-bg.jpg') }}') center/cover no-repeat fixed;
            min-height: 100vh;
        }

        .fell {
            font-family: 'IM FELL French Canon', serif;
        }

        .btn-3d {
            background: linear-gradient(145deg, var(--primary), #0f6a82);
            box-shadow: 0 4px 6px rgba(14, 88, 109, 0.3);
            transition: all .2s ease;
        }

        .btn-3d:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(14, 88, 109, .4);
        }

        .btn-3d:active {
            transform: translateY(0);
            box-shadow: 0 2px 4px rgba(14, 88, 109, .3);
        }
    </style>
</head>

<body class="md:min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-[950px] bg-white shadow-[0_2px_10px_-3px_rgba(14,14,14,0.3)] rounded-2xl overflow-hidden">
        <div class="flex items-center max-md:flex-col w-full gap-y-4">

            <!-- PANEL KIRI -->
            <div class="md:max-w-[570px] w-full h-full">
                <div
                    class="md:aspect-[7/10] bg-gradient-to-br from-cyan-50 to-sky-100 relative overflow-hidden w-full h-full">
                    <img src="{{ asset('images/riauport-logo.png') }}" class="w-full h-full object-contain p-12 md:p-20"
                        alt="RiauPort Logo" />
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="w-full text-center pt-56 px-6 max-md:hidden">
                            <h1 class="fell text-[var(--primary)] text-3xl font-bold mb-3">Buat Password Baru</h1>
                            <p class="fell text-gray-700 text-[15px] font-medium leading-relaxed">
                                Buat password baru yang aman<br>
                                minimal 8 karakter
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PANEL KANAN -->
            <div class="w-full h-full px-8 lg:px-16 py-8 max-md:-order-1">
                <form method="POST" action="{{ route('password.update') }}" class="md:max-w-md w-full mx-auto">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">
                    <input type="hidden" name="email" value="{{ old('email', $email) }}">

                    <div class="mb-8">
                        <h3 class="text-4xl font-bold text-[var(--primary)]">New Password</h3>
                        <p class="text-gray-600 text-sm mt-2">Masukkan password baru untuk akunmu</p>
                    </div>

                    @if ($errors->any())
                        <div
                            class="mb-6 p-3 bg-red-50 border border-red-200 rounded-lg text-xs text-red-700 text-center">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <div>
                        <label class="text-sm font-semibold text-gray-700">Password Baru</label>
                        <input name="password" type="password" required
                            class="mt-2 w-full px-4 py-3 rounded-xl bg-white/70 border border-gray-200
                               focus:outline-none focus:border-[var(--primary)]
                               transition-all duration-300 placeholder-gray-400 text-sm"
                            placeholder="••••••••" />
                    </div>

                    <div class="mt-6">
                        <label class="text-sm font-semibold text-gray-700">Konfirmasi Password</label>
                        <input name="password_confirmation" type="password" required
                            class="mt-2 w-full px-4 py-3 rounded-xl bg-white/70 border border-gray-200
                               focus:outline-none focus:border-[var(--primary)]
                               transition-all duration-300 placeholder-gray-400 text-sm"
                            placeholder="••••••••" />
                    </div>

                    <div class="mt-8">
                        <button type="submit"
                            class="btn-3d w-full py-3 px-4 text-[15px] font-semibold tracking-wide rounded-lg text-white relative overflow-hidden group">
                            <span class="relative z-10">Simpan Password</span>
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent
                                    translate-x-[-100%] group-hover:translate-x-[100%]
                                    transition-transform duration-1000">
                            </div>
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</body>

</html>

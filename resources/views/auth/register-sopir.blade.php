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

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

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

        /* ===== Background sama persis dengan register ===== */
        body {
            font-family: 'Inter', sans-serif;
            background:
                linear-gradient(135deg, rgba(14, 88, 109, 0.5) 0%, rgba(0, 212, 255, 0.4) 100%),
                url('{{ asset('images/login-bg.jpg') }}') center / cover no-repeat fixed;
        }

        /* ===== Input style (glow & rounded) ===== */
        .input-glow:focus {
            box-shadow: 0 0 0 3px rgba(14, 88, 109, 0.25);
            border-color: var(--primary);
            outline: none;
        }

        /* ===== Tombol style (3D + shine) ===== */
        .btn-3d {
            background: linear-gradient(145deg, var(--primary), #0f6a82);
            box-shadow: 0 6px 0 var(--primary-dark), 0 14px 30px rgba(14, 88, 109, 0.35);
            transition: all .2s ease;
        }

        .btn-3d:hover {
            transform: translateY(3px);
            box-shadow: 0 4px 0 var(--primary-dark), 0 10px 20px rgba(14, 88, 109, .3);
        }

        .btn-3d:active {
            transform: translateY(6px);
            box-shadow: 0 2px 0 var(--primary-dark);
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-4xl mx-auto">
        <div
            class="grid md:grid-cols-3 items-center rounded-xl overflow-hidden bg-white shadow-[0_2px_10px_-3px_rgba(14,14,14,0.3)]">

            <!-- ===== PANEL KIRI ===== -->
            <div
                class="max-md:order-1 flex flex-col justify-center gap-12 min-h-full
                       bg-gradient-to-br from-cyan-50 via-sky-100 to-cyan-200
                       px-6 py-12 relative overflow-hidden">

                <!-- soft glow dekor -->
                <div class="absolute -top-24 -left-24 w-56 h-56 bg-cyan-300/30 blur-3xl rounded-full"></div>
                <div class="absolute -bottom-24 -right-24 w-56 h-56 bg-sky-300/20 blur-3xl rounded-full"></div>

                <!-- LOGO -->
                <div class="relative flex items-center justify-center">
                    <img src="{{ asset('images/riauport-logo.png') }}" alt="RiauPort"
                        class="w-32 h-32 sm:w-36 sm:h-36 object-contain drop-shadow-xl">
                </div>

                <div class="relative">
                    <h3 class="text-slate-900 text-lg font-semibold">
                        Daftar Sebagai Sopir
                    </h3>
                    <p class="text-slate-700 text-sm mt-3 leading-relaxed">
                        Bergabunglah sebagai sopir travel RiauPort dan mulai mendapatkan penghasilan dengan melayani
                        perjalanan pelanggan.
                    </p>
                </div>

                <div class="relative">
                    <h3 class="text-slate-900 text-lg font-semibold">
                        Keuntungan Menjadi Sopir
                    </h3>
                    <p class="text-slate-700 text-sm mt-3 leading-relaxed">
                        Dapatkan penghasilan fleksibel, kelola jadwal sendiri, dan nikmati berbagai benefit menarik dari
                        RiauPort.
                    </p>
                </div>

                <div class="relative pt-2">
                    <div class="h-px bg-slate-900/10"></div>
                    <p class="text-slate-600 text-xs mt-4 leading-relaxed">
                        Dengan mendaftar, kamu menyetujui kebijakan dan ketentuan layanan RiauPort untuk sopir.
                    </p>
                </div>
            </div>

            <!-- ===== PANEL KANAN (FORM) ===== -->
            <div class="md:col-span-2 px-6 sm:px-14 py-10 max-w-lg mx-auto w-full">

                <div class="mb-8">
                    <h1 class="text-2xl font-bold text-slate-900">Daftar Sopir</h1>
                    <p class="text-sm text-slate-500 mt-1">
                        Isi data di bawah untuk membuat akun sopir.
                    </p>
                </div>

                <form action="{{ route('register.sopir.store') }}" method="POST" class="space-y-5">
                    @csrf

                    <!-- Nama -->
                    <div>
                        <label class="text-sm font-semibold text-slate-700">Nama Lengkap</label>
                        <input name="name" type="text" value="{{ old('name') }}" required
                            class="mt-2 w-full px-5 py-4 rounded-2xl bg-white/70 border border-gray-200
                                      text-sm placeholder-slate-400 focus:outline-none input-glow"
                            placeholder="Masukkan nama lengkap">
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="text-sm font-semibold text-slate-700">Email</label>
                        <input name="email" type="email" value="{{ old('email') }}" required
                            class="mt-2 w-full px-5 py-4 rounded-2xl bg-white/70 border border-gray-200
                                      text-sm placeholder-slate-400 focus:outline-none input-glow"
                            placeholder="nama@email.com">
                    </div>

                    <!-- Password -->
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div>
                            <label class="text-sm font-semibold text-slate-700">Password</label>
                            <input name="password" type="password" required minlength="6"
                                class="mt-2 w-full px-5 py-4 rounded-2xl bg-white/70 border border-gray-200
                                          text-sm placeholder-slate-400 focus:outline-none input-glow"
                                placeholder="Min. 6 karakter">
                        </div>

                        <div>
                            <label class="text-sm font-semibold text-slate-700">Konfirmasi</label>
                            <input name="password_confirmation" type="password" required minlength="6"
                                class="mt-2 w-full px-5 py-4 rounded-2xl bg-white/70 border border-gray-200
                                          text-sm placeholder-slate-400 focus:outline-none input-glow"
                                placeholder="Ulangi password">
                        </div>
                    </div>

                    <!-- Submit -->
                    <button type="submit"
                        class="btn-3d w-full py-4 rounded-2xl text-white font-bold text-sm
                               relative overflow-hidden group">
                        <span class="relative z-10">Daftar Sebagai Sopir</span>
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent
                                   translate-x-[-100%] group-hover:translate-x-[100%]
                                   transition-transform duration-1000">
                        </div>
                    </button>

                    <!-- Divider -->
                    <div class="relative my-4">
                        <div class="h-px bg-gray-200"></div>
                        <span class="absolute -top-2 left-1/2 -translate-x-1/2 bg-white px-3 text-xs text-gray-500">
                            atau
                        </span>
                    </div>

                    <!-- Google -->
                    <a href="{{ route('google.redirect', ['role' => 'sopir']) }}"
                        class="w-full flex items-center justify-center gap-3 py-3 rounded-2xl
                              border border-gray-300 bg-white hover:bg-gray-50 text-sm font-semibold text-slate-700
                              transition-all duration-200">
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

                    <!-- Error -->
                    @if ($errors->any())
                        <div class="mt-4 p-4 bg-red-50 border border-red-200 rounded-xl text-sm text-red-700">
                            <ul class="list-disc list-inside space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <p class="text-center text-sm text-slate-600 mt-4">
                        Sudah punya akun sopir?
                        <a href="{{ route('login') }}" class="font-semibold text-[var(--primary)] hover:underline">
                            Login di sini
                        </a>
                    </p>
                </form>
            </div>

        </div>
    </div>

</body>

</html>

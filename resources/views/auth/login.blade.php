<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pengguna</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Font: IM FELL French Canon -->
    <link href="https://fonts.googleapis.com/css2?family=IM+Fell+French+Canon:ital@0;1&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #0E586D;
            /* warna utama */
            --p-50: #e7f7fb;
            /* panel kiri bg muda */
            --p-100: #cae9ef;
            /* garis tepi panel kiri */
        }

        /* utilitas kecil */
        .input {
            /* gunakan @apply di Tailwind CDN */
        }
    </style>
    <script>
        /* define utilities for CDN build */
        tailwind.config = {
            theme: {
                extend: {}
            }
        }
    </script>
    <style>
        /* karena @apply tidak tersedia di style biasa, kita pakai class util langsung */
        .fell-font {
            font-family: 'IM FELL French Canon', serif;
            letter-spacing: .3px;
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <!-- WRAPPER -->
    <div
        class="w-full max-w-6xl mx-auto bg-white rounded-3xl shadow-[0_12px_28px_rgba(0,0,0,.06),0_8px_14px_rgba(0,0,0,.04)] overflow-hidden">
        <div class="grid grid-cols-1 md:grid-cols-2">

            <!-- PANEL KIRI: LOGO + TAGLINE -->
            <div class="relative bg-[color:var(--p-50)]">
                <div class="absolute inset-y-0 right-0 w-3 md:w-5 bg-[color:var(--p-100)]"></div>

                <div class="flex flex-col items-center justify-center text-center gap-6 min-h-full h-full">
                    <div class="flex flex-col items-center justify-center h-full py-10">
                        <img src="{{ asset('images/riauport-logo.png') }}" alt="Logo RiauPort"
                            class="w-64 md:w-80 lg:w-96 mx-auto drop-shadow-md mb-6">
                        <p class="fell-font text-gray-700 text-lg md:text-xl leading-relaxed max-w-md">
                            Temukan berbagai <b>Travel</b> dalam satu <br>
                            platform <span class="font-semibold text-[color:var(--primary)]">RiauPort</span>
                        </p>
                    </div>
                </div>


            </div>

            <!-- PANEL KANAN: KARTU LOGIN DENGAN 3D SHADOW -->
            <div class="p-5 md:p-10 lg:p-12">
                <div class="relative">

                    <!-- Backplate offset: memberi ketebalan/3D (bukan layer menimpa) -->
                    <div class="pointer-events-none absolute inset-0 translate-x-4 translate-y-4 rounded-[28px]
                      bg-[#8FAEB3]/35"
                        style="box-shadow:0 22px 40px rgba(0,0,0,.16);">
                    </div>

                    <!-- KARTU UTAMA -->
                    <div
                        class="relative rounded-[28px] bg-white ring-1 ring-black/5
                      shadow-[0_14px_28px_rgba(0,0,0,.10),0_4px_10px_rgba(0,0,0,.06)]">
                        <div class="p-6 md:p-8 lg:p-10">

                            <div class="flex items-center justify-between">
                                <div>
                                    <h1 class="text-2xl md:text-3xl font-bold text-[color:var(--primary)]">Welcome !
                                    </h1>
                                    <p class="text-xs md:text-sm text-gray-500 mt-1">Login to your account</p>
                                </div>
                                <div
                                    class="w-12 h-12 md:w-16 md:h-16 rounded-full bg-gray-300
                            shadow-[inset_0_2px_4px_rgba(255,255,255,.6),0_8px_18px_rgba(0,0,0,.12)]">
                                </div>
                            </div>

                            <!-- FORM -->
                            <form method="POST" action="{{ route('login.attempt') }}" class="mt-6 md:mt-8 space-y-4">
                                @csrf

                                <div>
                                    <label class="block text-[15px] font-semibold text-gray-700 mb-2">Email</label>
                                    <input type="email" name="email" placeholder="Email" required
                                        class="w-full rounded-xl px-4 py-3 bg-gray-100/70 focus:bg-white
                                focus:outline-none focus:ring-2 focus:ring-[color:var(--primary)]
                                placeholder-gray-400">
                                </div>

                                <div>
                                    <label class="block text-[15px] font-semibold text-gray-700 mb-2">Password</label>
                                    <input type="password" name="password" placeholder="Password" required
                                        class="w-full rounded-xl px-4 py-3 bg-gray-100/70 focus:bg-white
                                focus:outline-none focus:ring-2 focus:ring-[color:var(--primary)]
                                placeholder-gray-400">
                                </div>

                                <label class="inline-flex items-center gap-2 select-none">
                                    <input type="checkbox"
                                        class="h-4 w-4 rounded border-gray-300 text-[color:var(--primary)]
                                focus:ring-[color:var(--primary)]">
                                    <span class="text-sm text-gray-600">Remember Me</span>
                                </label>

                                <!-- Tombol Login (timbul) -->
                                <button type="submit"
                                    class="w-full py-3 rounded-full bg-[color:var(--primary)] text-white font-semibold
                               shadow-[0_6px_0_#0B4C5D,0_12px_18px_rgba(0,0,0,.18)]
                               hover:translate-y-[1px] hover:shadow-[0_5px_0_#0B4C5D,0_10px_14px_rgba(0,0,0,.18)]
                               transition-all duration-150">
                                    Login
                                </button>

                                <!-- Link Register (warna #0E586D + efek timbul) -->

                                <div class="flex items-center justify-center gap-3 text-sm mt-1.5">
                                    <span class="text-gray-600">Don't have an account ?</span>
                                    <a href="{{ route('register') }}"
                                        class="rounded-full px-5 py-2 font-semibold text-white
          bg-[#0E586D]
          shadow-[0_4px_0_#0B4C5D,0_10px_16px_rgba(0,0,0,.18)]
          hover:translate-y-[2px] hover:shadow-[0_2px_0_#0B4C5D,0_8px_12px_rgba(0,0,0,.18)]
          transition-all duration-200">
                                        Register Here
                                    </a>

                                </div>

                                <!-- Pesan error (opsional jika validasi server) -->
                                @if ($errors->any())
                                    <div
                                        class="rounded-xl bg-red-50 border border-red-200 px-4 py-3 text-sm text-red-700">
                                        {{ $errors->first() }}
                                    </div>
                                @endif

                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <!-- END PANEL KANAN -->

        </div>
    </div>

</body>

</html>

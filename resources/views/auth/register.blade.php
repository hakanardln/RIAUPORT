<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Font untuk tagline kiri -->
    <link href="https://fonts.googleapis.com/css2?family=IM+Fell+French+Canon:ital@0;1&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #0E586D;
            /* warna utama */
            --p-50: #e7f7fb;
            /* latar panel kiri */
            --p-100: #cae9ef;
            /* garis samping kiri */
        }

        .fell-font {
            font-family: 'IM FELL French Canon', serif;
            letter-spacing: .2px;
        }
    </style>
</head>

<body class="bg-white min-h-screen flex items-center justify-center">

    <!-- Fullscreen background putih -->
    <div class="w-full h-full min-h-screen grid grid-cols-1 md:grid-cols-2">

        <!-- Panel kiri -->
        <div class="relative bg-[color:var(--p-50)] rounded-r-[40px]">
            <div class="flex flex-col items-center justify-center text-center gap-6 min-h-full h-full py-14 px-6">
                <img src="{{ asset('images/riauport-logo.png') }}" alt="RiauPort"
                    class="w-64 md:w-80 lg:w-96 mx-auto drop-shadow-md">
                <p class="fell-font text-gray-700 text-lg md:text-xl leading-relaxed max-w-md">
                    Temukan berbagai <b>Travel</b> dalam satu <br>
                    platfrom <span class="font-semibold text-[color:var(--primary)]">RiauPort</span>
                </p>
            </div>
        </div>


        <!-- Panel kanan -->
        <div class="flex items-center justify-center bg-white relative">
            <div class="relative w-full max-w-lg p-6 md:p-10 lg:p-12">

                <!-- KARTU UTAMA tanpa background di belakang -->
                <div
                    class="relative rounded-[28px] bg-white ring-1 ring-black/5
                shadow-[0_14px_28px_rgba(0,0,0,0.10),0_4px_10px_rgba(0,0,0,0.06)]">
                    <div class="p-6 md:p-8 lg:p-10">

                        <h1 class="text-3xl md:text-4xl font-extrabold text-[color:var(--primary)] text-center mb-6">
                            Sign Up</h1>

                        <form action="{{ route('register.store') }}" method="POST" class="space-y-4">
                            @csrf

                            <!-- Name -->
                            <div>
                                <label class="block text-[15px] font-semibold text-gray-700 mb-2">Name</label>
                                <input type="text" name="name" required
                                    class="w-full rounded-xl px-4 py-3 bg-gray-100/70 focus:bg-white
                          focus:outline-none focus:ring-2 focus:ring-[color:var(--primary)]
                          placeholder-gray-400">
                            </div>

                            <!-- Email -->
                            <div>
                                <label class="block text-[15px] font-semibold text-gray-700 mb-2">Email</label>
                                <input type="email" name="email" required
                                    class="w-full rounded-xl px-4 py-3 bg-gray-100/70 focus:bg-white
                          focus:outline-none focus:ring-2 focus:ring-[color:var(--primary)]
                          placeholder-gray-400">
                            </div>

                            <!-- Password & Confirm -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-[15px] font-semibold text-gray-700 mb-2">Password</label>
                                    <input type="password" name="password" placeholder="Minimal 8 karakter" required
                                        class="w-full rounded-xl px-4 py-3 bg-white border border-gray-300
                            focus:outline-none focus:ring-2 focus:ring-[color:var(--primary)]
                            placeholder-gray-400">
                                </div>
                                <div>
                                    <label class="block text-[15px] font-semibold text-gray-700 mb-2">Confirm
                                        Password</label>
                                    <input type="password" name="password_confirmation" placeholder="Minimal 8 karakter"
                                        required
                                        class="w-full rounded-xl px-4 py-3 bg-white border border-gray-300
                            focus:outline-none focus:ring-2 focus:ring-[color:var(--primary)]
                            placeholder-gray-400">
                                </div>
                            </div>

                            <!-- Tombol Create account -->
                            <button type="submit"
                                class="w-full md:w-auto md:px-8 py-3 rounded-full mx-auto block
                         bg-[#CFEFF7] text-[color:var(--primary)] font-semibold
                         shadow-[0_8px_0_#b7dce6,0_14px_22px_rgba(0,0,0,.18)]
                         hover:translate-y-[1px] hover:shadow-[0_6px_0_#b7dce6,0_12px_18px_rgba(0,0,0,.16)]
                         transition-all duration-150">
                                Create an account
                            </button>

                            <!-- Divider -->
                            <div class="flex items-center gap-3 my-2">
                                <div class="h-px bg-[color:var(--primary)]/70 w-full"></div>
                                <span class="text-[color:var(--primary)]/80 text-sm">or</span>
                                <div class="h-px bg-[color:var(--primary)]/70 w-full"></div>
                            </div>

                            <!-- Google button -->
                            <a href="#"
                                class="w-full md:w-auto md:px-6 py-3 rounded-full mx-auto block
                    bg-[#e8f3ff] text-[#1a73e8] font-semibold
                    shadow-[0_8px_0_#cdd9ea,0_14px_22px_rgba(0,0,0,.18)]
                    hover:translate-y-[1px] hover:shadow-[0_6px_0_#cdd9ea,0_12px_18px_rgba(0,0,0,.16)]
                    transition-all duration-150 text-center">
                                <span class="inline-flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="w-5 h-5">
                                        <path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12
                  s5.373-12,12-12c3.059,0,5.842,1.154,7.957,3.043l5.657-5.657C32.676,6.053,28.513,4,24,4C12.955,4,4,12.955,4,24
                  s8.955,20,20,20s20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z" />
                                        <path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,16.108,18.961,13,24,13c3.059,0,5.842,1.154,7.957,3.043l5.657-5.657
                  C32.676,6.053,28.513,4,24,4C16.318,4,9.69,8.337,6.306,14.691z" />
                                        <path fill="#4CAF50" d="M24,44c4.438,0,8.49-1.706,11.566-4.49l-5.333-4.5C28.189,36.808,26.189,37,24,37
                  c-5.202,0-9.616-3.317-11.279-7.954l-6.513,5.02C9.556,39.556,16.227,44,24,44z" />
                                        <path fill="#1976D2"
                                            d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.236-2.229,4.166-4.089,5.61
                  c0.001-0.001,0.002-0.001,0.003-0.002l6.513,5.02C39.393,35.705,44,30,44,24C44,22.659,43.862,21.35,43.611,20.083z" />
                                    </svg>
                                    Sign Up with Google
                                </span>
                            </a>

                            <!-- Link ke login -->
                            <p class="text-center text-sm text-gray-600 mt-6">
                                Already have an account?
                                <a href="{{ route('login') }}"
                                    class="text-[color:var(--primary)] font-semibold hover:underline">Login</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>


</body>

</html>

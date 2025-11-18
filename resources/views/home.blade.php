<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RiauPort – Home</title>

    {{-- Tailwind CDN (tanpa Vite) --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* ===== Navbar Glass ===== */
        .site-header {
            /* was: position: sticky; top: 18px; */
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
        }

        .glass-nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: rgba(255, 255, 255, .68);
            backdrop-filter: blur(20px) saturate(180%);
            border-radius: 22px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .12);
            padding: .9rem 1.2rem
        }

        .nav-link {
            font-weight: 600;
            color: #0a3b44;
            transition: .25s
        }

        .nav-link:hover {
            color: #0e586d
        }

        .btn-login {
            background: #0e586d;
            color: #fff;
            font-weight: 700;
            padding: .55rem 1.35rem;
            border-radius: 14px;
            box-shadow: inset 0 2px 6px rgba(255, 255, 255, .35), 0 8px 18px rgba(0, 0, 0, .18);
            transition: .25s
        }

        .btn-login:hover {
            background: #127692
        }

        /* ===== Hero Slideshow ===== */
        .hero {
            position: relative;
            overflow: hidden;
            height: 70vh
        }

        @media (min-width:1024px) {
            .hero {
                height: 72vh
            }
        }

        .hero-bg {
            position: absolute;
            inset: 0;
            background-size: cover;
            background-position: center top;
            /* was: center */
            transition: opacity .8s ease
        }

        .hero-bg.fade {
            opacity: 0
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(0, 0, 0, .0) 0, rgba(0, 0, 0, .08) 70%, rgba(0, 0, 0, .15) 100%)
        }

        /* ===== Search Card + outside icon ===== */
        .search-card {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            bottom: 14%;
            width: min(1060px, 92%);
            background: rgba(255, 255, 255, .92);
            backdrop-filter: blur(16px);
            border-radius: 28px;
            padding: 1.6rem 1.2rem;
            box-shadow: 0 18px 40px rgba(0, 0, 0, .14)
        }

        .search-input {
            border-radius: 14px;
            border: 1px solid #e5e7eb;
            padding: .9rem 1rem;
            background: #f6f9fb;
            width: 100%
        }

        .search-glass {
            position: absolute;
            right: -36px;
            top: 50%;
            transform: translateY(-50%);
            height: 68px;
            width: 68px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .75);
            backdrop-filter: blur(12px) saturate(180%);
            box-shadow: 0 10px 25px rgba(0, 0, 0, .2);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: .25s
        }

        .search-glass:hover {
            transform: translateY(-50%) scale(1.06)
        }

        .search-glass svg {
            width: 28px;
            height: 28px;
            color: #0e586d
        }

        /* ===== Cards fitur (Halaman Depan 2) ===== */
        .feature-card {
            background: #fff;
            border-radius: 22px;
            box-shadow: 0 12px 24px rgba(0, 0, 0, .10);
            padding: 22px 22px
        }

        /* ===== FAQ ===== */
        .faq-card {
            box-shadow: 0 12px 22px rgba(0, 0, 0, .10)
        }

        .chev {
            transition: .2s
        }

        .faq-body {
            grid-template-rows: 0fr;
            transition: grid-template-rows .25s ease
        }

        .faq-body[aria-expanded="true"] {
            grid-template-rows: 1fr
        }
    </style>
</head>

@php
    // KUMPULKAN gambar slideshow secara dinamis
    $frames = [];
    foreach ([1, 2, 3, 4] as $i) {
        foreach (['png', 'jpg', 'jpeg', 'webp'] as $e) {
            $p = public_path("images/Gambar{$i}.{$e}");
            if (file_exists($p)) {
                $frames[] = asset("images/Gambar{$i}.{$e}");
                break;
            }
        }
    }
    // Mockup laptop (opsional)
    $ctaImg = null;
    foreach (['laptop1', 'mock-laptop'] as $base) {
        foreach (['png', 'jpg', 'jpeg', 'webp'] as $e) {
            $p = public_path("images/{$base}.{$e}");
            if (file_exists($p)) {
                $ctaImg = asset("images/{$base}.{$e}");
                break 2;
            }
        }
    }
@endphp

<body class="bg-[#f4f7f9] text-slate-800">

    {{-- NAVBAR --}}
    <header class="site-header">
        <div class="max-w-7xl mx-auto px-4 md:px-6">
            <nav class="glass-nav">
                <img src="{{ asset('images/riauport-logo.png') }}" alt="RiauPort" class="h-12 md:h-14">

                <ul class="hidden md:flex items-center gap-10">
                    <li><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                    <li><a class="nav-link" href="#fitur">Contact</a></li>
                    <li><a class="nav-link" href="#faq">About</a></li>
                </ul>

                <a href="{{ route('login') }}" class="btn-login">Login</a>
            </nav>
        </div>
    </header>

    {{-- HERO + PENCARIAN --}}
    <section class="hero">
        <div id="heroBg" class="hero-bg"></div>
        <div class="hero-overlay"></div>

        {{-- Kartu pencarian --}}
        <div class="search-card">
            <h3 class="text-center text-xl md:text-2xl font-semibold text-slate-800 mb-4">
                Hai Kamu, <span class="font-extrabold text-[#0e586d]">Ingin pergi ke mana?</span>
            </h3>

            <div
                class="flex items-center gap-3 bg-white/80 backdrop-blur-md p-4 rounded-2xl shadow-lg border border-slate-200">

                {{-- ASAL --}}
                <select class="search-input flex-1">
                    <option value="" disabled selected>Asal</option>
                    <option>Dumai</option>
                    <option>Pekanbaru</option>
                    <option>Duri</option>
                    <option>Bengkalis</option>
                    <option>Siak</option>
                    <option>Pakning</option>
                </select>

                {{-- TUJUAN --}}
                <select class="search-input flex-1">
                    <option value="" disabled selected>Tujuan</option>
                    <option>Dumai</option>
                    <option>Pekanbaru</option>
                    <option>Duri</option>
                    <option>Bengkalis</option>
                    <option>Siak</option>
                    <option>Pakning</option>
                </select>

                {{-- SEARCH BUTTON (DALAM KOTAK) --}}
                <button type="button"
                    class="h-12 w-12 flex items-center justify-center rounded-xl bg-[#0e586d] text-white hover:bg-[#0b4a59] transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-6 h-6"
                        stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 103.5 3.5a7.5 7.5 0 0013.15 13.15z" />
                    </svg>
                </button>
            </div>
        </div>
    </section>


    {{-- CTA SECTION --}}
    <section class="max-w-7xl mx-auto px-4 md:px-6 py-12 md:py-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-14 items-center">
            <div>
                <h2 class="font-extrabold text-3xl md:text-4xl lg:text-5xl leading-tight text-[#0a2d34]">
                    Daftarkan Layanan Travelmu<br />
                    <span class="text-[#0e586d]">Sekarang!</span>
                </h2>
                <p class="mt-5 text-lg text-slate-600">Tampilkan layanan travelmu dan raih lebih banyak penumpang.</p>
                <div class="mt-7">
                    <a href="{{ route('register') }}"
                        class="inline-block bg-[#0e586d] text-white font-semibold rounded-xl px-5 py-3 shadow-[0_14px_28px_rgba(14,88,109,.25)]">
                        Daftar Sebagai Sopir
                    </a>
                </div>
            </div>

            <div class="relative flex justify-center lg:justify-end">
                @if ($ctaImg)
                    <img src="{{ $ctaImg }}" alt="Mockup"
                        class="w-[115%] max-w-[620px] translate-x-[5%] rounded-2xl drop-shadow-[0_20px_40px_rgba(0,0,0,.25)]" />
                @else
                    <div class="w-full h-64 md:h-80 bg-slate-100 rounded-2xl grid place-items-center text-slate-500">
                        (Tambahkan <strong>public/images/laptop1.png</strong>)
                    </div>
                @endif
            </div>
        </div>
    </section>

    {{-- ===== HALAMAN DEPAN 2 (FITUR) ===== --}}
    <section id="fitur" class="relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-[#7BD1DF] via-[#6CC6D6] to-[#5CBCCB]"></div>
        <div class="relative max-w-7xl mx-auto px-4 md:px-6 py-14">

            <h2 class="text-white text-3xl md:text-4xl font-extrabold drop-shadow-sm mb-10">
                Riauport, Solusi terhubung ke berbagai<br class="hidden md:block" />
                jasa transportasi Travel pilihan anda
            </h2>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                {{-- Kartu 1 --}}
                <div class="feature-card flex gap-4 items-start">
                    <img src="{{ asset('images/car.png') }}" class="w-12 h-12" alt="">
                    <p class="text-lg">
                        <span class="font-semibold">Perjalanan nyaman dimulai dari pilihan yang tepat.</span>
                    </p>
                </div>

                {{-- Kartu 2 --}}
                <div class="feature-card flex gap-4 items-start">
                    <img src="{{ asset('images/ratings.png') }}" class="w-12 h-12" alt="">
                    <p class="text-lg">
                        Dapatkan pengalaman terbaik dari rekomendasi nyata penumpang
                    </p>
                </div>

                {{-- Kartu 3 --}}
                <div class="feature-card flex gap-4 items-start">
                    <img src="{{ asset('images/browser.png') }}" class="w-12 h-12" alt="">
                    <p class="text-lg">
                        Semua Sopir Travel, Satu Portal
                    </p>
                </div>

                {{-- Kartu 4 --}}
                <div class="feature-card flex gap-4 items-start">
                    <img src="{{ asset('images/whatsapp.png') }}" class="w-12 h-12" alt="">
                    <p class="text-lg">
                        Hubungi sopir secara langsung via Whatsapp atau telepon
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="w-full bg-gradient-to-b from-white via-[#d8f0f7] to-[#3FA6C4] py-16 flex flex-col items-center">

        <!-- Title -->
        <h2 class="text-3xl md:text-4xl font-semibold text-gray-800 mb-3 text-center">
            Temukan Sopir Sesuai Tujuan Anda
        </h2>
        <div class="w-1/2 h-1 bg-[#3FA6C4] rounded-full mb-12"></div>

        <!-- Wrapper -->
        <div class="relative w-full max-w-6xl">

            <!-- Prev Button -->
            <button
                class="absolute left-0 top-1/2 -translate-y-1/2 bg-white shadow-lg p-3 rounded-full hover:scale-110 transition z-10">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" stroke="black"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <!-- Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 px-10 md:px-14">

                <!-- Card -->
                <div class="bg-white rounded-2xl shadow-lg p-4 hover:shadow-xl transition">
                    <div class="w-full h-48 bg-gray-100 rounded-xl overflow-hidden">
                        <img src={{ asset('images/Images2.jpg') }} class="w-full h-full object-cover">
                    </div>

                    <div class="mt-3 flex items-center gap-2 text-purple-600 font-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5.121 17.804A9 9 0 1117.804 5.12 9 9 0 015.12 17.804z" />
                        </svg>
                        FITRA
                    </div>

                    <p class="text-sm text-gray-700 mt-1">
                        <strong>Tujuan :</strong><br>
                        Bengkalis > Pekanbaru > Siak > Dumai
                    </p>

                    <a href="#" class="text-sm text-blue-600 hover:underline mt-2 block">Lihat
                        selengkapnya...</a>
                </div>

                <!-- Card -->
                <div class="bg-white rounded-2xl shadow-lg p-4 hover:shadow-xl transition">
                    <div class="w-full h-48 bg-gray-100 rounded-xl overflow-hidden">
                        <img src={{ asset('images/mobil2.jpg') }} class="w-full h-full object-cover">
                    </div>

                    <div class="mt-3 flex items-center gap-2 text-purple-600 font-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5.121 17.804A9 9 0 1117.804 5.12 9 9 0 015.12 17.804z" />
                        </svg>
                        Zawa Aufi
                    </div>

                    <p class="text-sm text-gray-700 mt-1">
                        <strong>Tujuan :</strong><br>
                        Bengkalis > Dumai > Pekanbaru
                    </p>

                    <a href="#" class="text-sm text-blue-600 hover:underline mt-2 block">Lihat
                        selengkapnya...</a>
                </div>

                <!-- Card -->
                <div class="bg-white rounded-2xl shadow-lg p-4 hover:shadow-xl transition">
                    <div class="w-full h-48 bg-gray-100 rounded-xl overflow-hidden">
                        <img src={{ asset('images/mobil3.jpg') }} class="w-full h-full object-cover">
                    </div>

                    <div class="mt-3 flex items-center gap-2 text-purple-600 font-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5.121 17.804A9 9 0 1117.804 5.12 9 9 0 015.12 17.804z" />
                        </svg>
                        Riki
                    </div>

                    <p class="text-sm text-gray-700 mt-1">
                        <strong>Tujuan :</strong><br>
                        Duri > Dumai > Pakning > Bengkalis
                    </p>

                    <a href="#" class="text-sm text-blue-600 hover:underline mt-2 block">Lihat
                        selengkapnya...</a>
                </div>

            </div>

            <!-- Next Button -->
            <button
                class="absolute right-0 top-1/2 -translate-y-1/2 bg-white shadow-lg p-3 rounded-full hover:scale-110 transition z-10">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" stroke="black"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>

        </div>

        <!-- Dots -->
        <div class="flex gap-3 mt-8">
            <div class="w-3 h-3 bg-black rounded-full"></div>
            <div class="w-3 h-3 bg-white border border-black rounded-full"></div>
        </div>

        <section>
            <div class="relative flex flex-col md:flex-row max-w-5xl mx-auto shadow-2xl rounded-lg my-12">

                <div
                    class="relative z-10 w-full md:w-2/5 bg-[#4AA8BA] text-white p-10 rounded-t-lg md:rounded-l-lg md:rounded-tr-none md:rounded-r-[3rem]">

                    <h2 class="text-3xl font-bold mb-6" style="font-family: serif;">Tentang RiauPort</h2>

                    <p class="text-sm font-bold mb-4">
                        Sistem Informasi Layanan Travel berbasis website berfungsi untuk mempermudah masyarakat dalam
                        memperoleh informasi terkait perjalanan travel, khususnya untuk kebutuhan mudik.
                    </p>

                    <p class="text-sm font-bold mb-4">
                        sistem berbasis website yang terpusat diperlukan untuk menyediakan layanan informasi travel.
                        Karena website ini memang dirancang sedemikian rupa, pengguna dapat dengan mudah menemukan
                        berbagai jasa travel sesuai daerah pilihan mereka. Nama travel, jadwal keberangkatan, desti,
                        harga, jenis kendaraan, serta kontak yang dapat dihubungi termasuk ke dalam informasi yang
                        disajikan.
                    </p>
                </div>

                <div
                    class="w-full md:w-3/5 bg-white p-10 rounded-b-lg md:rounded-r-lg md:rounded-bl-none flex flex-col items-center justify-center">

                    <img src="images/riauport-logo.png" alt="riauport-logo.png" class="w-64 mb-4">

                    <p class="text-md text-riau-teal text-center font-im-fell">
                        Temukan berbagai Travel dalam satu platform RiauPort
                        </smp>
                </div>

            </div>
        </section>

        <section class="py-12 md:py-20">
    <div class="container mx-auto px-4">

        <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12">

            <h2 class="text-4xl font-bold text-gray-800 text-center mb-12">
                About Us
            </h2>

            <div class="flex flex-col md:flex-row justify-center items-center md:items-stretch gap-8">

                <!-- Anggota 1 -->
                <div
                    class="bg-gray-100 rounded-2xl shadow-lg p-8 flex flex-col items-center text-center w-full md:max-w-xs transition-transform transform hover:scale-105">

                    <div class="w-32 h-32 rounded-full overflow-hidden mb-5 border-4 border-gray-200">
                        <img src="https://ui-avatars.com/api/?name=Nurvia+Sulistry&size=128&background=e8f5e9&color=388e3c"
                            alt="Nurvia Sulistry" class="w-full h-full object-cover">
                    </div>

                    <h3 class="text-xl font-bold text-gray-900">Nurvia Sulistry</h3>
                    <p class="text-gray-500">Anggota 1</p>
                </div>

                <!-- Koordinator -->
                <div
                    class="bg-gray-100 rounded-2xl shadow-lg p-8 flex flex-col items-center text-center w-full md:max-w-xs transition-transform transform hover:scale-105">

                    <div class="w-32 h-32 rounded-full overflow-hidden mb-5 border-4 border-gray-200">
                        <img src="https://ui-avatars.com/api/?name=Handal+Karis+Arbi&size=128&background=e1f5fe&color=0277bd"
                            alt="Handal Karis Arbi" class="w-full h-full object-cover">
                    </div>

                    <h3 class="text-xl font-bold text-gray-900">Handal Karis Arbi</h3>
                    <p class="text-gray-500">Koordinator</p>
                </div>

                <!-- Anggota 2 -->
                <div
                    class="bg-gray-100 rounded-2xl shadow-lg p-8 flex flex-col items-center text-center w-full md:max-w-xs transition-transform transform hover:scale-105">

                    <div class="w-32 h-32 rounded-full overflow-hidden mb-5 border-4 border-gray-200">
                        <img src="https://ui-avatars.com/api/?name=Nur+Lela+Sabila&size=128&background=fce4ec&color=c2185b"
                            alt="Nur Lela Sabila" class="w-full h-full object-cover">
                    </div>

                    <h3 class="text-xl font-bold text-gray-900">Nur Lela Sabila</h3>
                    <p class="text-gray-500">Anggota 2</p>
                </div>

            </div>
        </div>
    </div>
</section>


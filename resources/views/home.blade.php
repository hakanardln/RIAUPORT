<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RiauPort – Home</title>

    <!-- FAVICON – cukup copy-paste ini saja, sudah 100% kerja di semua browser & device -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon_io/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon_io/site.webmanifest') }}">

    <!-- Opsional: untuk Android Chrome -->
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon_io/android-chrome-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('favicon_io/android-chrome-512x512.png') }}">

    {{-- Tailwind CDN (tanpa Vite) --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* Tarik fitur ke atas */
        #fitur {
            margin-top: -120px;
            /* boleh sesuaikan ke -150px / -180px */
        }

        #fitur {
            margin-top: -520px;
            /* sesuaikan jika perlu */
            position: relative;
            z-index: 10;
        }

        /* ===== Navbar Glass ===== */
        .site-header {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
        }

        .glass-nav {
            position: relative;
            overflow: hidden;
            border-radius: 24px;
            background: radial-gradient(circle at 0% 0%, rgba(255, 255, 255, 0.35), rgba(255, 255, 255, 0.08)),
                linear-gradient(135deg, rgba(255, 255, 255, 0.25), rgba(255, 255, 255, 0.05));
            box-shadow:
                0 18px 45px rgba(0, 0, 0, 0.18),
                0 0 0 1px rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(18px) saturate(180%);
            -webkit-backdrop-filter: blur(18px) saturate(180%);
            border: 1px solid rgba(255, 255, 255, 0.4);
        }

        /* Highlight yang bergerak untuk efek “liquid” */
        .glass-nav::before {
            content: "";
            position: absolute;
            inset: -40%;
            background:
                radial-gradient(circle at 10% 20%, rgba(255, 255, 255, 0.55) 0, transparent 55%),
                radial-gradient(circle at 80% 0%, rgba(126, 220, 255, 0.38) 0, transparent 60%),
                radial-gradient(circle at 20% 90%, rgba(14, 88, 109, 0.22) 0, transparent 60%);
            opacity: 0.9;
            mix-blend-mode: screen;
            animation: liquidMove 14s infinite alternate ease-in-out;
            pointer-events: none;
        }

        @keyframes liquidMove {
            0% {
                transform: translate3d(-8%, -4%, 0) scale(1);
            }

            50% {
                transform: translate3d(6%, 4%, 0) scale(1.05);
            }

            100% {
                transform: translate3d(-4%, 2%, 0) scale(1.02);
            }
        }

        /* Tombol login ikut nuansa glass */
        .glass-btn-login {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.55rem 2.4rem;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1rem;
            color: #ffffff;
            background: radial-gradient(circle at 0% 0%, #42c0dd, #0e586d);
            box-shadow:
                0 10px 25px rgba(14, 88, 109, 0.4),
                0 0 0 1px rgba(255, 255, 255, 0.35);
            border: 1px solid rgba(5, 34, 49, 0.7);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease,
                background 0.2s ease,
                filter 0.2s ease;
        }

        .glass-btn-login:hover {
            transform: translateY(-1px) scale(1.02);
            box-shadow:
                0 16px 35px rgba(14, 88, 109, 0.55),
                0 0 0 1px rgba(255, 255, 255, 0.5);
            filter: brightness(1.05);
        }

        .glass-btn-login:active {
            transform: translateY(1px) scale(0.99);
            box-shadow:
                0 6px 18px rgba(14, 88, 109, 0.45),
                0 0 0 1px rgba(255, 255, 255, 0.4);
        }


        /* ===== Hero Slideshow ===== */
        .hero {
            position: relative;
            height: 430px;
            /* ubah sampai pas dengan garis merah */
            overflow: hidden;
        }

        .hero-bg {
            position: absolute;
            inset: 0;
            background-size: cover;
            background-position: center;
            transition: opacity .4s ease;
        }

        /* efek fade */
        .hero-bg.fade {
            opacity: 0;
        }

        /* ===== Search Card + outside icon ===== */
        /* Wrapper untuk border animasi di kartu pencarian */
        .search-border-wrapper {
            position: relative;
            border-radius: 40px;
            padding: 3px;
            /* ketebalan border */
            overflow: hidden;
        }

        /* Gradient berputar mengelilingi kartu */
        .search-border-wrapper::before {
            content: "";
            position: absolute;
            inset: -40%;
            background: conic-gradient(from 0deg,
                    #42c0dd,
                    #0e586d,
                    #7fffd4,
                    #42c0dd,
                    #0e586d);
            animation: spinBorder 8s linear infinite;
            z-index: 0;
        }

        /* Biar isi kartu tetap di atas gradient */
        .search-card {
            position: relative;
            z-index: 1;
            background: rgba(255, 255, 255, 0.96);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            box-shadow:
                0 20px 40px rgba(15, 23, 42, 0.22),
                0 0 0 1px rgba(255, 255, 255, 0.75);
        }

        /* Animasi muter */
        @keyframes spinBorder {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Styling input biar match (kalau belum ada) */
        .search-input {
            @apply bg-white/90 rounded-2xl px-4 py-3 border border-slate-200 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#0e586d]/60 focus:border-transparent;
        }


        /* ===== Cards fitur (Halaman Depan 2) ===== */
        .feature-card {
            background: #fff;
            border-radius: 22px;
            box-shadow: 0 12px 24px rgba(0, 0, 0, .10);
            padding: 22px 22px
        }

        .fitur-section {
            position: relative;
            overflow: hidden;
        }

        .fitur-bg {
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, #7BD1DF 0%, #6CC6D6 45%, #5CBCCB 100%);
        }

        /* dekorasi lingkaran lembut di background */
        .fitur-bg::before,
        .fitur-bg::after {
            content: "";
            position: absolute;
            border-radius: 999px;
            background: radial-gradient(circle at 30% 30%, rgba(255, 255, 255, .5), transparent 60%);
            width: 420px;
            height: 420px;
            opacity: 0.4;
        }

        .fitur-bg::after {
            top: auto;
            bottom: -120px;
            right: -80px;
            left: auto;
        }

        /* judul & teks fitur */
        .fitur-title {
            letter-spacing: .02em;
        }

        /* kartu fitur */
        .feature-card {
            background: #ffffff;
            border-radius: 22px;
            box-shadow: 0 16px 30px rgba(0, 0, 0, .12);
            padding: 20px 22px;
            display: flex;
            gap: 14px;
            align-items: flex-start;
        }

        /* ikon bulat */
        .feature-icon {
            flex-shrink: 0;
            width: 56px;
            height: 56px;
            border-radius: 999px;
            background: linear-gradient(145deg, #0e586d, #23a6c5);
            display: grid;
            place-items: center;
            box-shadow: 0 10px 20px rgba(0, 0, 0, .18);
        }

        .feature-icon img {
            width: 32px;
            height: 32px;
        }

        /* teks di dalam kartu */
        .feature-text {
            font-size: 1.05rem;
            color: #0f172a;
        }

        .feature-text span {
            font-weight: 600;
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
    <header class="w-full absolute top-0 left-0 z-[9999]">
        <div class="max-w-6xl mx-auto px-4 md:px-2 pt-6">
            <div class="glass-nav w-full rounded-[25px] border px-7 py-3 flex items-center justify-between">

                {{-- Logo --}}
                <div class="flex items-center">
                    <img src="{{ asset('images/riauport-white.png') }}" alt="RiauPort" class="h-20 drop-shadow-md">
                </div>

                {{-- Menu Navigation --}}
                <nav
                    class="flex items-center gap-8 text-slate-800 font-semibold text-base md:text-lg relative z-[10000]">
                    <a href="#home" class="hover:text-[#0e586d] transition-colors">Home</a>
                    <a href="{{ route('contact') }}" class="hover:text-[#0e586d] transition-colors">Contact</a>
                    <a href="{{ route('about') }}" class="hover:text-[#0e586d] transition-colors">About</a>
                </nav>

                {{-- Tombol Login --}}
                <a href="{{ route('login') }}" class="glass-btn-login">
                    Login
                </a>
            </div>
        </div>
    </header>

    {{-- HERO + PENCARIAN --}}
    <section class="hero relative">
        <div id="heroBg" class="hero-bg absolute inset-0 z-0"></div>
        <div class="hero-overlay absolute inset-0 bg-slate-900/40 z-10"></div>

        <div class="relative max-w-3xl mx-auto pt-32 md:pt-40 z-20">
            <div class="mx-4 relative">
                <!-- Kartu Pencarian -->
                <div class="search-border-wrapper rounded-[40px] overflow-hidden shadow-2xl">
                    <div
                        class="search-card bg-white/95 px-6 py-10 md:px-10 flex flex-col gap-6 items-center border border-slate-200">
                        <h1 class="text-2xl md:text-3xl font-semibold text-slate-800 text-center">
                            Hai Kamu, <span class="font-bold text-primary">Ingin pergi ke mana?</span>
                        </h1>

                        <!-- Form dengan ID -->
                        <form id="searchForm" class="w-full">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center">
                                <select
                                    class="px-4 py-3 rounded-full border border-slate-300 focus:border-primary focus:ring-2 focus:ring-primary text-slate-700 bg-white transition"
                                    aria-label="Asal">
                                    <option value="" disabled selected hidden>Asal</option>
                                    <option>Dumai</option>
                                    <option>Pekanbaru</option>
                                    <option>Duri</option>
                                    <option>Bengkalis</option>
                                    <option>Siak</option>
                                    <option>Pakning</option>
                                </select>

                                <select
                                    class="px-4 py-3 rounded-full border border-slate-300 focus:border-primary focus:ring-2 focus:ring-primary text-slate-700 bg-white transition"
                                    aria-label="Tujuan">
                                    <option value="" disabled selected hidden>Tujuan</option>
                                    <option>Dumai</option>
                                    <option>Pekanbaru</option>
                                    <option>Duri</option>
                                    <option>Bengkalis</option>
                                    <option>Siak</option>
                                    <option>Pakning</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Tombol di luar, sejajar kanan-tengah kartu -->
                <button type="submit" form="searchForm"
                    class="absolute top-1/2 -translate-y-1/2 right-[-25px] md:right-[-100px] 
           h-[55px] w-[55px] md:h-[70px] md:w-[70px] 
           rounded-full 
           /* Glassmorphism + warna elegan */
           bg-white/20 backdrop-blur-xl 
           border border-white/40 
           shadow-2xl 
           flex items-center justify-center 
           hover:bg-white/35 hover:backdrop-blur-2xl 
           hover:border-white/60 
           hover:scale-110 
           active:scale-95 
           transition-all duration-300 
           focus:outline-none 
           focus:ring-4 focus:ring-white/30 
           z-30 
           /* Inner glow biar lebih mewah */
           ring-1 ring-white/50 ring-inset">

                    <span class="sr-only">Cari</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        class="h-7 w-7 md:h-8 md:w-8 text-white drop-shadow-lg" fill="none" stroke="currentColor"
                        stroke-width="3" stroke-linecap="round">
                        <circle cx="11" cy="11" r="6"></circle>
                        <path d="m16 16 5 5"></path>
                    </svg>
                </button>
    </section>

    {{-- CTA SECTION --}}
    <section class="bg-white py-16">
        <div class="max-w-6xl mx-auto flex flex-col lg:flex-row items-center gap-10 px-6">

            {{-- Text kiri --}}
            <div class="flex-1">
                <h2 class="text-3xl md:text-4xl font-semibold text-slate-700 leading-snug">
                    Daftarkan Layanan Travelmu<br>
                    <span class="font-bold text-slate-800">Sekarang!</span>
                </h2>

                <p class="mt-5 text-slate-600 text-lg max-w-xl">
                    Tampilkan layanan travelmu dan raih lebih banyak penumpang
                    melalui satu tempat RiauPort.
                </p>

                <div class="mt-10">
                    <a href="{{ route('register.sopir.show') }}"
                        class="inline-block bg-[#0e586d] hover:bg-[#0b4353] text-white font-semibold px-10 py-3 rounded-lg shadow-xl">
                        Daftar Sebagai Sopir
                    </a>
                </div>
            </div>

            {{-- Gambar laptop kanan --}}
            <div class="flex-1 flex justify-center lg:justify-end">
                <img src="{{ $ctaImg ?? asset('images/laptop1.png') }}" alt="RiauPort Mockup"
                    class="w-full max-w-xl drop-shadow-[0_25px_40px_rgba(0,0,0,0.35)]">
            </div>
        </div>
    </section>

    {{-- CONTACT --}}
    <section id="contact" class="py-16 bg-slate-50">
        <div class="max-w-4xl mx-auto px-6 text-center text-slate-600">
            {{-- isi sendiri --}}
        </div>
    </section>

    {{-- ABOUT --}}
    <section id="about" class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-6 text-center text-slate-600">
            {{-- isi sendiri --}}
        </div>
    </section>

    {{-- ========== SCRIPT SLIDESHOW ========== --}}
    <script>
        const frames = @json($frames);
        const heroBg = document.getElementById('heroBg');

        if (frames.length > 0 && heroBg) {
            let index = 0;

            // set gambar pertama
            heroBg.style.backgroundImage = `url('${frames[index]}')`;

            setInterval(() => {
                // fade out
                heroBg.classList.add('fade');

                setTimeout(() => {
                    // ganti index
                    index = (index + 1) % frames.length;
                    // ganti gambar
                    heroBg.style.backgroundImage = `url('${frames[index]}')`;
                    // fade in
                    heroBg.classList.remove('fade');
                }, 400); // waktu fade out (harus < interval)
            }, 4000); // ganti gambar tiap 4 detik
        }
    </script>

    {{-- Placeholder section contact & about (kalau mau dipakai nanti) --}}
    <section id="contact" class="py-16 bg-slate-50">
        <div class="max-w-4xl mx-auto px-6 text-center text-slate-600">
            {{-- isi sendiri --}}
        </div>
    </section>

    <section id="about" class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-6 text-center text-slate-600">
            {{-- isi sendiri --}}
        </div>
    </section>

    {{-- ===== HALAMAN DEPAN 2 (FITUR) ===== --}}
    <section id="fitur" class="fitur-section">
        <div class="fitur-bg"></div>
        <div class="relative max-w-7xl mx-auto px-4 md:px-6 py-14 md:py-16">
            {{-- judul + subjudul --}}
            <div class="mb-10 md:mb-12">
                <h2 class="fitur-title text-white text-3xl md:text-4xl font-extrabold drop-shadow-sm">
                    RiauPort, solusi terhubung ke berbagai<br class="hidden md:block" />
                    jasa transportasi travel pilihan Anda
                </h2>
                <p class="mt-4 text-sky-50 text-base md:text-lg max-w-2xl">
                    Satu portal untuk menemukan, membandingkan, dan menghubungi layanan travel di sekitar Anda
                    dengan cepat dan mudah.
                </p>
            </div>

            {{-- grid kartu --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
                {{-- Kartu 1 --}}
                <div
                    class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm
            transition-all duration-300 ease-out
            hover:-translate-y-3 hover:scale-[1.04] hover:shadow-xl hover:border-[#0E586D]/40">

                    <div class="mb-3">
                        <img src="{{ asset('images/car.png') }}" alt="Ikon mobil" class="w-12 h-12">
                    </div>

                    <p class="text-slate-700 text-sm leading-relaxed">
                        <span class="font-semibold">Perjalanan nyaman dimulai dari pilihan yang tepat.</span><br>
                        Temukan armada dan sopir yang sesuai kebutuhan rute harian maupun perjalanan jauh.
                    </p>
                </div>

                {{-- Kartu 2 --}}
                <div
                    class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm
            transition-all duration-300 ease-out
            hover:-translate-y-3 hover:scale-[1.04] hover:shadow-xl hover:border-[#0E586D]/40">

                    <div class="mb-3">
                        <img src="{{ asset('images/ratings.png') }}" alt="Ikon rating" class="w-12 h-12">
                    </div>

                    <p class="text-slate-700 text-sm leading-relaxed">
                        <span class="font-semibold">Rekomendasi berdasarkan pengalaman nyata.</span><br>
                        Lihat ulasan dan penilaian untuk membantu Anda memilih layanan travel yang terpercaya.
                    </p>
                </div>

                {{-- Kartu 3 --}}
                <div
                    class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm
            transition-all duration-300 ease-out
            hover:-translate-y-3 hover:scale-[1.04] hover:shadow-xl hover:border-[#0E586D]/40">

                    <div class="mb-3">
                        <img src="{{ asset('images/browser.png') }}" alt="Ikon browser" class="w-12 h-12">
                    </div>

                    <p class="text-slate-700 text-sm leading-relaxed">
                        <span class="font-semibold">Semua sopir travel, satu portal.</span><br>
                        Tidak perlu lagi berpindah aplikasi atau menyimpan banyak kontak secara manual.
                    </p>
                </div>

                {{-- Kartu 4 --}}
                <div
                    class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm
            transition-all duration-300 ease-out
            hover:-translate-y-3 hover:scale-[1.04] hover:shadow-xl hover:border-[#0E586D]/40">

                    <div class="mb-3">
                        <img src="{{ asset('images/whatsapp.png') }}" alt="Ikon Whatsapp" class="w-12 h-12">
                    </div>

                    <p class="text-slate-700 text-sm leading-relaxed">
                        <span class="font-semibold">Hubungi sopir secara langsung.</span><br>
                        Klik nomor yang tertera dan langsung terhubung via WhatsApp atau panggilan telepon.
                    </p>
                </div>

            </div>
        </div>
    </section>

    {{-- ================== SECTION ULASAN / TESTIMONI ================== --}}
    <section id="ulasan" class="bg-gradient-to-b from-white to-[#EAF7FA] py-20">
        <div class="max-w-6xl mx-auto px-4 md:px-6">

            {{-- Header atas --}}
            <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-10 mb-12">
                <div class="max-w-xl">
                    <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 leading-snug">
                        Apa kata pengguna<br class="hidden md:block" />
                        tentang <span class="text-[#0E586D]">RiauPort</span>
                    </h2>

                    {{-- garis kecil --}}
                    <div class="mt-5 h-[3px] w-32 bg-slate-900 rounded-full"></div>
                </div>

                <div class="flex-1 flex flex-col md:items-end gap-4">
                    <p class="text-sm md:text-base text-slate-500 max-w-md">
                        Beberapa ulasan berikut masih berupa data dummy sebagai contoh.
                        Nantinya bisa diganti dengan ulasan asli dari penumpang dan mitra travel
                        yang menggunakan layanan RiauPort.
                    </p>

                    {{-- Tombol panah (dummy) --}}
                    <div class="flex items-center gap-3">
                        <button type="button"
                            class="w-10 h-10 rounded-full border border-slate-200 flex items-center justify-center text-slate-500 hover:bg-slate-900 hover:text-white transition">
                            ‹
                        </button>
                        <button type="button"
                            class="w-10 h-10 rounded-full border border-slate-200 flex items-center justify-center text-slate-500 hover:bg-slate-900 hover:text-white transition">
                            ›
                        </button>
                    </div>
                </div>
            </div>

            {{-- Kartu-kartu ulasan --}}
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

                {{-- Card 1 --}}
                <article
                    class="group bg-white rounded-3xl shadow-sm border border-slate-100 p-6 flex flex-col h-full
                       transition-all duration-300 ease-out
                       hover:-translate-y-3 hover:shadow-xl hover:border-[#0E586D]/30">
                    {{-- Rating --}}
                    <div class="flex items-center gap-1 text-amber-400 text-sm mb-4">
                        <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                    </div>

                    {{-- Judul & isi --}}
                    <h3 class="text-sm font-semibold text-slate-900 mb-2">
                        “Pelayanannya sangat membantu perjalanan saya”
                    </h3>
                    <p class="text-xs text-slate-500 leading-relaxed mb-6">
                        Pemesanan travel jadi lebih mudah. Saya bisa melihat jadwal, harga,
                        dan kontak sopir tanpa harus chat satu-satu. Sangat praktis untuk
                        yang sering pulang-pergi Bengkalis - Pekanbaru.
                    </p>

                    <div class="mt-auto pt-5 border-t border-slate-100 flex items-center justify-between">
                        <div>
                            <p class="text-xs font-semibold text-slate-900">Anonymous</p>
                            <p class="text-[11px] text-slate-400">Mahasiswa – Bengkalis</p>
                        </div>
                        <div
                            class="w-10 h-10 rounded-full bg-gradient-to-tr from-[#0E586D] to-[#5CBCCB]
                               flex items-center justify-center text-white text-xs font-semibold
                               transition-all duration-300 group-hover:scale-105">
                        </div>
                    </div>
                </article>

                {{-- Card 2 --}}
                <article
                    class="group bg-white rounded-3xl shadow-sm border border-slate-100 p-6 flex flex-col h-full
                       transition-all duration-300 ease-out
                       hover:-translate-y-3 hover:shadow-xl hover:border-[#0E586D]/30">
                    <div class="flex items-center gap-1 text-amber-400 text-sm mb-4">
                        <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                    </div>

                    <h3 class="text-sm font-semibold text-slate-900 mb-2">
                        “Sangat membantu mengelola armada travel”
                    </h3>
                    <p class="text-xs text-slate-500 leading-relaxed mb-6">
                        Sebagai pemilik travel, saya bisa mengatur jadwal keberangkatan,
                        melihat data penumpang, dan mengelola sopir di satu dashboard.
                        Tidak perlu pakai catatan manual lagi.
                    </p>

                    <div class="mt-auto pt-5 border-t border-slate-100 flex items-center justify-between">
                        <div>
                            <p class="text-xs font-semibold text-slate-900">Budi Utama</p>
                            <p class="text-[11px] text-slate-400">Owner Travel Riau Jaya</p>
                        </div>
                        <div
                            class="w-10 h-10 rounded-full bg-gradient-to-tr from-[#7BD1DF] to-[#0E586D]
                               flex items-center justify-center text-white text-xs font-semibold
                               transition-all duration-300 group-hover:scale-105">
                            BS
                        </div>
                    </div>
                </article>

                {{-- Card 3 --}}
                <article
                    class="group bg-white rounded-3xl shadow-sm border border-slate-100 p-6 flex flex-col h-full
                       transition-all duration-300 ease-out
                       hover:-translate-y-3 hover:shadow-xl hover:border-[#0E586D]/30">
                    <div class="flex items-center gap-1 text-amber-400 text-sm mb-4">
                        <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                    </div>

                    <h3 class="text-sm font-semibold text-slate-900 mb-2">
                        “Lebih tenang karena dapat info sopir jelas”
                    </h3>
                    <p class="text-xs text-slate-500 leading-relaxed mb-6">
                        Sebelum berangkat saya sudah tahu nama sopir, jenis mobil, dan nomor
                        yang bisa dihubungi. Rasanya lebih aman apalagi kalau pulang malam.
                    </p>

                    <div class="mt-auto pt-5 border-t border-slate-100 flex items-center justify-between">
                        <div>
                            <p class="text-xs font-semibold text-slate-900">Raditya</p>
                            <p class="text-[11px] text-slate-400">Karyawan – Pekanbaru</p>
                        </div>
                        <div
                            class="w-10 h-10 rounded-full bg-gradient-to-tr from-[#5CBCCB] to-[#0E586D]
                               flex items-center justify-center text-white text-xs font-semibold
                               transition-all duration-300 group-hover:scale-105">
                            RA
                        </div>
                    </div>
                </article>

                {{-- Card 4 --}}
                <article
                    class="group bg-white rounded-3xl shadow-sm border border-slate-100 p-6 flex flex-col h-full
                       transition-all duration-300 ease-out
                       hover:-translate-y-3 hover:shadow-xl hover:border-[#0E586D]/30">
                    <div class="flex items-center gap-1 text-amber-400 text-sm mb-4">
                        <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                    </div>

                    <h3 class="text-sm font-semibold text-slate-900 mb-2">
                        “Antarmuka simpel, gampang dipahami orang tua”
                    </h3>
                    <p class="text-xs text-slate-500 leading-relaxed mb-6">
                        Saya sering bantu orang tua pesan travel. Tampilan RiauPort
                        sederhana, tombolnya jelas, jadi mereka pun bisa belajar pesan sendiri.
                    </p>

                    <div class="mt-auto pt-5 border-t border-slate-100 flex items-center justify-between">
                        <div>
                            <p class="text-xs font-semibold text-slate-900">Zahra</p>
                            <p class="text-[11px] text-slate-400">Pengguna Rutin</p>
                        </div>
                        <div
                            class="w-10 h-10 rounded-full bg-gradient-to-tr from-[#0E586D] to-[#7BD1DF]
                               flex items-center justify-center text-white text-xs font-semibold
                               transition-all duration-300 group-hover:scale-105">
                            SZ
                        </div>
                    </div>
                </article>

            </div>
        </div>
    </section>

    {{-- ================== SECTION SOPIR TERPOPULER ================== --}}

    <section
        class="w-full bg-gradient-to-b from-[#EAF7FA] via-[#CDEBF3] to-[#3FA6C4] pt-20 pb-24 flex flex-col items-center">


        <!-- Title -->
        <h2 class="text-3xl md:text-4xl font-extrabold text-slate-800 mb-3 text-center">
            Temukan Sopir Sesuai Tujuan Anda
        </h2>
        <div class="w-40 h-1 bg-[#0E586D] rounded-full mb-14"></div>

        <!-- Wrapper -->
        <div class="relative w-full max-w-6xl">

            <!-- Prev Button -->
            <button
                class="absolute left-0 top-1/2 -translate-y-1/2 bg-white shadow-xl p-4 rounded-full hover:scale-110 hover:shadow-2xl transition-all z-10 border border-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="black"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <!-- Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 px-12 md:px-16">

                <!-- Card -->
                <div
                    class="bg-white rounded-3xl shadow-md border border-gray-100 p-5 transition-all duration-300 ease-out
                       hover:-translate-y-4 hover:shadow-2xl hover:border-[#0E586D]/40">

                    <div class="relative w-full h-48 rounded-2xl overflow-hidden">
                        <img src="{{ asset('images/mobil1.jpg') }}" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                    </div>

                    <div class="mt-4 flex items-center gap-3 text-[#0E586D] font-bold text-lg">
                        <div
                            class="w-10 h-10 bg-[#0E586D] text-white rounded-full flex items-center justify-center text-sm">
                            F
                        </div>
                        FITRA
                    </div>

                    <p class="text-sm text-gray-700 mt-2 leading-relaxed">
                        <strong>Tujuan :</strong><br>
                        Bengkalis > Pekanbaru > Siak > Dumai
                    </p>

                    <a href="#" class="text-sm text-[#0E586D] hover:underline mt-3 block font-medium">
                        Lihat selengkapnya →
                    </a>
                </div>

                <!-- Card -->
                <div
                    class="bg-white rounded-3xl shadow-md border border-gray-100 p-5 transition-all duration-300 ease-out
                       hover:-translate-y-4 hover:shadow-2xl hover:border-[#0E586D]/40">

                    <div class="relative w-full h-48 rounded-2xl overflow-hidden">
                        <img src="{{ asset('images/mobil2.jpg') }}" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                    </div>

                    <div class="mt-4 flex items-center gap-3 text-[#0E586D] font-bold text-lg">
                        <div
                            class="w-10 h-10 bg-[#0E586D] text-white rounded-full flex items-center justify-center text-sm">
                            Z
                        </div>
                        Zawa Aufi
                    </div>

                    <p class="text-sm text-gray-700 mt-2 leading-relaxed">
                        <strong>Tujuan :</strong><br>
                        Bengkalis > Dumai > Pekanbaru
                    </p>

                    <a href="#" class="text-sm text-[#0E586D] hover:underline mt-3 block font-medium">
                        Lihat selengkapnya →
                    </a>
                </div>

                <!-- Card -->
                <div
                    class="bg-white rounded-3xl shadow-md border border-gray-100 p-5 transition-all duration-300 ease-out
                       hover:-translate-y-4 hover:shadow-2xl hover:border-[#0E586D]/40">

                    <div class="relative w-full h-48 rounded-2xl overflow-hidden">
                        <img src="{{ asset('images/mobil3.jpg') }}" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                    </div>

                    <div class="mt-4 flex items-center gap-3 text-[#0E586D] font-bold text-lg">
                        <div
                            class="w-10 h-10 bg-[#0E586D] text-white rounded-full flex items-center justify-center text-sm">
                            R
                        </div>
                        Riki
                    </div>

                    <p class="text-sm text-gray-700 mt-2 leading-relaxed">
                        <strong>Tujuan :</strong><br>
                        Duri > Dumai > Pakning > Bengkalis
                    </p>

                    <a href="#" class="text-sm text-[#0E586D] hover:underline mt-3 block font-medium">
                        Lihat selengkapnya →
                    </a>
                </div>

            </div>

            <!-- Next Button -->
            <button
                class="absolute right-0 top-1/2 -translate-y-1/2 bg-white shadow-xl p-4 rounded-full hover:scale-110 hover:shadow-2xl transition-all z-10 border border-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="black"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>

        </div>

        <!-- Dots -->
        <div class="flex gap-3 mt-10">
            <div class="w-3.5 h-3.5 bg-[#0E586D] rounded-full"></div>
            <div class="w-3.5 h-3.5 bg-white border border-[#0E586D] rounded-full"></div>
        </div>

    </section>
    {{-- ================== SECTION ABOUT US ================== --}}

    <section class="py-16 md:py-20 bg-gradient-to-b from-[#E7F7FB] to-white">
        <div class="max-w-5xl mx-auto px-4">

            {{-- Kartu putih utama sebagai background --}}
            <div class="bg-white rounded-3xl shadow-2xl p-8 md:p-12">

                {{-- JUDUL – font dibiarkan seperti sebelumnya --}}
                <h2 class="text-4xl font-bold text-gray-800 text-center mb-12">
                    About Us
                </h2>

                {{-- Wrapper anggota --}}
                <div class="flex flex-col md:flex-row justify-center items-stretch gap-8">

                    {{-- Anggota 1 --}}
                    <div class="w-full md:max-w-xs">
                        <div
                            class="relative bg-white/10 border border-white/40 rounded-3xl shadow-lg p-8
                               flex flex-col items-center text-center h-full
                               backdrop-blur-xl
                               transition-all duration-500 ease-out
                               hover:-translate-y-4 hover:shadow-2xl hover:border-[#3FA6C4]/60">

                            {{-- efek liquid glow --}}
                            <div
                                class="pointer-events-none absolute -top-10 -right-10 w-32 h-32 bg-[#3FA6C4]/30 rounded-full blur-3xl opacity-80">
                            </div>
                            <div
                                class="pointer-events-none absolute -bottom-10 -left-10 w-32 h-32 bg-[#0E586D]/25 rounded-full blur-3xl opacity-70">
                            </div>

                            {{-- Avatar --}}
                            <div class="relative mb-5">
                                <div
                                    class="w-32 h-32 rounded-full mx-auto bg-gradient-to-tr from-[#3FA6C4] to-[#0E586D] p-[3px]">
                                    <div class="w-full h-full bg-white rounded-full overflow-hidden">
                                        <img src="https://ui-avatars.com/api/?name=Nurvia+Sulistry&size=128&background=e8f5e9&color=388e3c"
                                            alt="Nurvia Sulistry" class="w-full h-full object-cover">
                                    </div>
                                </div>
                            </div>

                            {{-- Nama & role – font dipertahankan --}}
                            <h3 class="text-xl font-bold text-gray-900">Nurvia Sulistry</h3>
                            <p class="text-gray-500 mt-1">Anggota 1</p>
                        </div>
                    </div>

                    {{-- Koordinator --}}
                    <div class="w-full md:max-w-xs">
                        <div
                            class="relative bg-white/10 border border-white/40 rounded-3xl shadow-lg p-8
                               flex flex-col items-center text-center h-full
                               backdrop-blur-xl
                               transition-all duration-500 ease-out
                               hover:-translate-y-4 hover:shadow-2xl hover:border-[#3FA6C4]/60">

                            <div
                                class="pointer-events-none absolute -top-10 -right-10 w-32 h-32 bg-[#0E586D]/30 rounded-full blur-3xl opacity-80">
                            </div>
                            <div
                                class="pointer-events-none absolute -bottom-10 -left-10 w-32 h-32 bg-[#3FA6C4]/25 rounded-full blur-3xl opacity-70">
                            </div>

                            <div class="relative mb-5">
                                <div
                                    class="w-32 h-32 rounded-full mx-auto bg-gradient-to-tr from-[#0E586D] to-[#3FA6C4] p-[3px]">
                                    <div class="w-full h-full bg-white rounded-full overflow-hidden">
                                        <img src="https://ui-avatars.com/api/?name=Handal+Karis+Arbi&size=128&background=e1f5fe&color=0277bd"
                                            alt="Handal Karis Arbi" class="w-full h-full object-cover">
                                    </div>
                                </div>
                            </div>

                            <h3 class="text-xl font-bold text-gray-900">Handal Karis Arbi</h3>
                            <p class="text-gray-500 mt-1">Koordinator</p>
                        </div>
                    </div>

                    {{-- Anggota 2 --}}
                    <div class="w-full md:max-w-xs">
                        <div
                            class="relative bg-white/10 border border-white/40 rounded-3xl shadow-lg p-8
                               flex flex-col items-center text-center h-full
                               backdrop-blur-xl
                               transition-all duration-500 ease-out
                               hover:-translate-y-4 hover:shadow-2xl hover:border-[#3FA6C4]/60">

                            <div
                                class="pointer-events-none absolute -top-10 -right-10 w-32 h-32 bg-[#3FA6C4]/30 rounded-full blur-3xl opacity-80">
                            </div>
                            <div
                                class="pointer-events-none absolute -bottom-10 -left-10 w-32 h-32 bg-[#0E586D]/25 rounded-full blur-3xl opacity-70">
                            </div>

                            <div class="relative mb-5">
                                <div
                                    class="w-32 h-32 rounded-full mx-auto bg-gradient-to-tr from-[#3FA6C4] to-[#0E586D] p-[3px]">
                                    <div class="w-full h-full bg-white rounded-full overflow-hidden">
                                        <img src="https://ui-avatars.com/api/?name=Nur+Lela+Sabila&size=128&background=fce4ec&color=c2185b"
                                            alt="Nur Lela Sabila" class="w-full h-full object-cover">
                                    </div>
                                </div>
                            </div>

                            <h3 class="text-xl font-bold text-gray-900">Nur Lela Sabila</h3>
                            <p class="text-gray-500 mt-1">Anggota 2</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- ========== FOOTER ========== -->
    <footer class="bg-white border-t border-gray-200 mt-0 w-full">
        {{-- Bagian atas footer --}}
        <div class="w-full">
            <div class="max-w-7xl mx-auto px-6 py-16">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">

                    {{-- Brand Section --}}
                    <div class="lg:col-span-1">
                        <div class="mb-4">
                            <img src="{{ asset('images/riauport-logo.png') }}" alt="RiauPort" class="h-16 mb-3">
                        </div>
                        <p class="text-gray-600 text-sm mb-6 leading-relaxed">
                            Platform terpadu untuk menemukan layanan travel terbaik di Riau.
                            Menghubungkan penumpang dengan sopir travel terpercaya.
                        </p>
                        <div class="flex gap-4">
                            {{-- Twitter --}}
                            <a href="#"
                                class="w-10 h-10 flex items-center justify-center rounded-lg bg-gray-100 text-gray-600 hover:bg-[#3FA6C4] hover:text-white transition-colors duration-200">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z" />
                                </svg>
                            </a>
                            {{-- Facebook --}}
                            <a href="#"
                                class="w-10 h-10 flex items-center justify-center rounded-lg bg-gray-100 text-gray-600 hover:bg-[#3FA6C4] hover:text-white transition-colors duration-200">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z" />
                                </svg>
                            </a>
                            {{-- Instagram --}}
                            <a href="#"
                                class="w-10 h-10 flex items-center justify-center rounded-lg bg-gray-100 text-gray-600 hover:bg-[#3FA6C4] hover:text-white transition-colors duration-200">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M7.8 2h8.4A4.8 4.8 0 0121 6.8v8.4A4.8 4.8 0 0116.2 20H7.8A4.8 4.8 0 013 15.2V6.8A4.8 4.8 0 017.8 2zm0 2A2.8 2.8 0 005 6.8v8.4A2.8 2.8 0 007.8 18h8.4a2.8 2.8 0 002.8-2.8V6.8A2.8 2.8 0 0016.2 4H7.8zm4.2 2.5a4.5 4.5 0 11-.001 9.001A4.5 4.5 0 0112 6.5zm4.75-2.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    {{-- Navigasi --}}
                    <div>
                        <h3 class="text-gray-900 font-semibold text-base mb-4">Navigasi</h3>
                        <ul class="space-y-3 text-sm">
                            <li><a href="{{ route('home') }}" class="text-gray-600 hover:text-[#3FA6C4]">Home</a>
                            </li>
                            <li><a href="#about" class="text-gray-600 hover:text-[#3FA6C4]">Tentang Kami</a></li>
                            <li><a href="#fitur" class="text-gray-600 hover:text-[#3FA6C4]">Fitur</a></li>
                            <li><a href="#contact" class="text-gray-600 hover:text-[#3FA6C4]">Kontak</a></li>
                        </ul>
                    </div>

                    {{-- Layanan --}}
                    <div>
                        <h3 class="text-gray-900 font-semibold text-base mb-4">Layanan</h3>
                        <ul class="space-y-3 text-sm">
                            <li><a href="#" class="text-gray-600 hover:text-[#3FA6C4]">Cari Travel</a></li>
                            <li><a href="{{ route('register.sopir.show') }}"
                                    class="text-gray-600 hover:text-[#3FA6C4]">Daftar
                                    Sopir</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-[#3FA6C4]">Rute Populer</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-[#3FA6C4]">FAQ</a></li>
                        </ul>
                    </div>

                    {{-- Hubungi Kami --}}
                    <div id="contact">
                        <h3 class="text-gray-900 font-semibold text-base mb-4">Hubungi Kami</h3>
                        <ul class="space-y-3 text-sm">
                            <li class="text-gray-600 flex items-start gap-2">
                                <svg class="w-5 h-5 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span>Riau, Indonesia</span>
                            </li>
                            <li class="text-gray-600 flex items-center gap-2">
                                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <span>info@riauport.com</span>
                            </li>
                            <li class="text-gray-600 flex items-center gap-2">
                                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <span>+62 823-1141-2523</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- Garis + baris bawah --}}
        <div class="border-t border-gray-200">
            <div class="max-w-7xl mx-auto px-6 py-6 flex flex-col md:flex-row items-center justify-between gap-4">
                <p class="text-gray-600 text-sm text-center md:text-left">
                    © 2025 RiauPort. All rights reserved.
                </p>
                <div class="flex items-center gap-6 text-sm">
                    <a href="#" class="text-gray-600 hover:text-[#3FA6C4] transition-colors duration-200">
                        Syarat & Ketentuan
                    </a>
                    <span class="text-gray-400">·</span>
                    <a href="#" class="text-gray-600 hover:text-[#3FA6C4] transition-colors duration-200">
                        Kebijakan Privasi
                    </a>
                </div>
            </div>
        </div>
    </footer>

</body>
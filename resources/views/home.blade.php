<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RiauPort – Home</title>

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
            transition: opacity .8s ease;
            opacity: 1;
        }

        .hero-bg.fade {
            opacity: 0;
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
    <header class="w-full absolute top-0 left-0 z-20">
        <div class="max-w-6xl mx-auto flex items-center justify-between px-4 md:px-2 pt-6">

            <div
                class="w-[100%] max-w-[2500px] mx-auto
    backdrop-blur-xl bg-white/50
    shadow-[0_8px_32px_rgba(0,0,0,0.12)]
    rounded-[20px]
    border border-white/40
    px-7 py-2
    flex items-center justify-between">

                {{-- Logo --}}
                <div class="flex items-center">
                    <img src="{{ asset('images/riauport-white.png') }}" alt="RiauPort" class="h-20 drop-shadow-md">
                </div>

                {{-- Menu --}}
                <nav class="flex items-center gap-10 text-white font-semibold text-lg">
                    <a href="{{ route('home') }}" class="hover:text-slate-100">Home</a>
                    <a href="#contact" class="hover:text-slate-100">Contact</a>
                    <a href="#about" class="hover:text-slate-100">About</a>
                </nav>

                {{-- Tombol Login --}}
                <a href="{{ route('login') }}"
                    class="bg-[#0e586d] hover:bg-[#0b4353] text-white font-semibold px-8 py-2 rounded-lg shadow-lg">
                    Login
                </a>
            </div>
    </header>

    {{-- HERO + PENCARIAN --}}
    <section class="hero">
        <div id="heroBg" class="hero-bg"></div>
        <div class="hero-overlay"></div>

        {{-- Kartu pencarian --}}
        <div class="relative max-w-3xl mx-auto pt-40">
            <div class="search-card relative bg-white rounded-[40px] mx-4 px-10 py-10 flex flex-col items-center gap-6">
                <h1 class="text-xl md:text-2xl font-semibold text-slate-800 text-center">
                    Hai Kamu, <span class="font-bold">Ingin pergi ke mana?</span>
                </h1>

                <div class="w-full flex flex-col md:flex-row gap-4 items-center">

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

                    {{-- SEARCH BUTTON --}}
                    <button
                        class="mt-2 md:mt-0 md:ml-4 h-[70px] w-[70px] rounded-full bg-white shadow-xl flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-8 w-8 text-slate-800"
                            fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="5"></circle>
                            <path d="m16 16 4 4" stroke-linecap="round"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
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
                    <a href="{{ route('register') }}"
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
                <div class="feature-card">
                    <div class="feature-icon">
                        <img src="{{ asset('images/car.png') }}" alt="Ikon mobil">
                    </div>
                    <p class="feature-text">
                        <span>Perjalanan nyaman dimulai dari pilihan yang tepat.</span><br>
                        Temukan armada dan sopir yang sesuai kebutuhan rute harian maupun perjalanan jauh.
                    </p>
                </div>

                {{-- Kartu 2 --}}
                <div class="feature-card">
                    <div class="feature-icon">
                        <img src="{{ asset('images/ratings.png') }}" alt="Ikon rating">
                    </div>
                    <p class="feature-text">
                        <span>Rekomendasi berdasarkan pengalaman nyata.</span><br>
                        Lihat ulasan dan penilaian untuk membantu Anda memilih layanan travel yang terpercaya.
                    </p>
                </div>

                {{-- Kartu 3 --}}
                <div class="feature-card">
                    <div class="feature-icon">
                        <img src="{{ asset('images/browser.png') }}" alt="Ikon browser">
                    </div>
                    <p class="feature-text">
                        <span>Semua sopir travel, satu portal.</span><br>
                        Tidak perlu lagi berpindah aplikasi atau menyimpan banyak kontak secara manual.
                    </p>
                </div>

                {{-- Kartu 4 --}}
                <div class="feature-card">
                    <div class="feature-icon">
                        <img src="{{ asset('images/whatsapp.png') }}" alt="Ikon Whatsapp">
                    </div>
                    <p class="feature-text">
                        <span>Hubungi sopir secara langsung.</span><br>
                        Klik nomor yang tertera dan langsung terhubung via WhatsApp atau panggilan telepon.
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
        </html>

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

    {{-- ================== SECTION ULASAN / TESTIMONI ================== --}}
    <section id="ulasan" class="bg-[#F7FAFC] py-20">
        <div class="max-w-6xl mx-auto px-4 md:px-6">

            {{-- Header atas --}}
            <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-10 mb-12">
                <div class="max-w-xl">
                    <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 leading-snug">
                        Apa kata pengguna<br class="hidden md:block" />
                        tentang <span class="text-[#0E586D]">RiauPort</span>
                    </h2>

                    {{-- garis kecil seperti contoh --}}
                    <div class="mt-5 h-[3px] w-32 bg-slate-900 rounded-full"></div>
                </div>

                <div class="flex-1 flex flex-col md:items-end gap-4">
                    <p class="text-sm md:text-base text-slate-500 max-w-md">
                        Beberapa ulasan berikut masih berupa data dummy sebagai contoh.
                        Nantinya bisa diganti dengan ulasan asli dari penumpang dan mitra travel
                        yang menggunakan layanan RiauPort.
                    </p>

                    {{-- Tombol panah (dummy, belum ada JS slider) --}}
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
                <article class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6 flex flex-col h-full">
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
                        yang sering pulang–pergi Bengkalis – Pekanbaru.
                    </p>

                    <div class="mt-auto pt-5 border-t border-slate-100 flex items-center justify-between">
                        <div>
                            <p class="text-xs font-semibold text-slate-900">Alya Putri</p>
                            <p class="text-[11px] text-slate-400">Mahasiswa – Bengkalis</p>
                        </div>
                        <div
                            class="w-10 h-10 rounded-full bg-gradient-to-tr from-[#0E586D] to-[#5CBCCB] flex items-center justify-center text-white text-xs font-semibold">
                            AP
                        </div>
                    </div>
                </article>

                {{-- Card 2 --}}
                <article class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6 flex flex-col h-full">
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
                            <p class="text-xs font-semibold text-slate-900">Budi Santoso</p>
                            <p class="text-[11px] text-slate-400">Owner Travel Riau Jaya</p>
                        </div>
                        <div
                            class="w-10 h-10 rounded-full bg-gradient-to-tr from-[#7BD1DF] to-[#0E586D] flex items-center justify-center text-white text-xs font-semibold">
                            BS
                        </div>
                    </div>
                </article>

                {{-- Card 3 --}}
                <article class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6 flex flex-col h-full">
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
                            <p class="text-xs font-semibold text-slate-900">Rama Aditya</p>
                            <p class="text-[11px] text-slate-400">Karyawan – Pekanbaru</p>
                        </div>
                        <div
                            class="w-10 h-10 rounded-full bg-gradient-to-tr from-[#5CBCCB] to-[#0E586D] flex items-center justify-center text-white text-xs font-semibold">
                            RA
                        </div>
                    </div>
                </article>

                {{-- Card 4 --}}
                <article class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6 flex flex-col h-full">
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
                            <p class="text-xs font-semibold text-slate-900">Siti Zahra</p>
                            <p class="text-[11px] text-slate-400">Pengguna Rutin</p>
                        </div>
                        <div
                            class="w-10 h-10 rounded-full bg-gradient-to-tr from-[#0E586D] to-[#7BD1DF] flex items-center justify-center text-white text-xs font-semibold">
                            SZ
                        </div>
                    </div>
                </article>

            </div>
        </div>
    </section>



    <section
        class="w-full bg-gradient-to-b from-white via-[#d8f0f7] to-[#3FA6C4] pt-16 pb-20 flex flex-col items-center">

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
                                <li><a href="{{ route('register') }}"
                                        class="text-gray-600 hover:text-[#3FA6C4]">Daftar Sopir</a></li>
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
                                    <span>+62 812-3456-7890</span>
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

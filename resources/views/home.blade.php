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

    {{-- CSS custom halaman ini --}}
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
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

    {{-- ================== NAVBAR DESKTOP ================== --}}
    <header class="w-full absolute top-0 left-0 z-[9999] hidden md:block">
        <div class="max-w-6xl mx-auto px-4 md:px-2 pt-6">
            <div class="glass-nav w-full rounded-[25px] border px-7 py-3
                   flex items-center justify-between"
                style="overflow: visible;">

                {{-- Logo --}}
                <div class="flex items-center">
                    <img src="{{ asset('images/riauport-white.png') }}" alt="RiauPort" class="h-20 drop-shadow-md">
                </div>

                {{-- Menu Navigation --}}
                <nav id="mainNav"
                    class="nav-links flex items-center gap-8 text-slate-800 font-semibold text-lg relative z-[10000]">
                    <div id="navHighlight" class="nav-highlight"></div>
                    <a href="#home" class="hover:text-[#0e586d] transition-colors">Home</a>
                    <a href="{{ route('contact') }}" class="hover:text-[#0e586d] transition-colors">Contact</a>
                    <a href="{{ route('about') }}" class="hover:text-[#0e586d] transition-colors">About</a>
                </nav>

                {{-- LOGIN / PROFILE DESKTOP --}}
                @guest
                    <a href="{{ route('login') }}" class="glass-btn-login">
                        Login
                    </a>
                @endguest

                @auth
                    @php
                        $user = auth()->user();
                        $initials = collect(explode(' ', $user->name))
                            ->map(fn($p) => mb_substr($p, 0, 1))
                            ->join('');
                    @endphp

                    <div class="relative z-[10001]">
                        <button id="userMenuButtonDesktop"
                            class="w-12 h-12 rounded-full flex items-center justify-center
                               bg-white/20 backdrop-blur-xl border border-white/40 
                               shadow-lg text-white font-semibold uppercase 
                               hover:scale-110 active:scale-95 transition-all duration-200">
                            {{ $initials }}
                        </button>

                        <div id="userMenuDesktop"
                            class="hidden absolute right-0 mt-3 w-40 bg-white rounded-2xl shadow-xl
                               border border-slate-100 py-2 text-sm text-slate-700">
                            <div class="px-4 pb-1 text-[11px] uppercase tracking-wide text-slate-400">
                                Akun
                            </div>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 hover:bg-slate-100">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </header>

    {{-- ================== NAVBAR MOBILE ================== --}}
    <header class="w-full absolute top-0 left-0 z-[9999] md:hidden">
        <div class="max-w-6xl mx-auto px-4 pt-6">

            <div class="glass-nav-mobile w-full rounded-[20px] border
           px-4 py-2 grid grid-cols-3 items-center"
                style="overflow: visible;">


                {{-- LOGO (Kolom 1) --}}
                <div class="flex items-center">
                    <img src="{{ asset('images/riauport-white.png') }}" alt="RiauPort" class="h-9 drop-shadow-md">
                </div>

                {{-- MENU TENGAH (Kolom 2) --}}
                <nav class="flex items-center justify-center gap-4 font-semibold text-sm text-slate-800">
                    <a href="#home" class="hover:text-[#0e586d]">Home</a>
                    <a href="{{ route('contact') }}" class="hover:text-[#0e586d]">Contact</a>
                    <a href="{{ route('about') }}" class="hover:text-[#0e586d]">About</a>
                </nav>

                {{-- LOGIN (Kolom 3) --}}
                <div class="flex justify-end items-center">

                    @guest
                        <a href="{{ route('login') }}"
                            class="login-circle-mobile w-10 h-10 rounded-full bg-[#0e586d] text-white flex items-center
                               justify-center shadow-md text-xs font-semibold hover:scale-110 transition-all">
                            In
                        </a>
                    @endguest

                    @auth
                        @php
                            $initials = collect(explode(' ', auth()->user()->name))
                                ->map(fn($p) => strtoupper(mb_substr($p, 0, 1)))
                                ->join('');
                        @endphp

                        <button
                            class="login-circle-mobile w-10 h-10 rounded-full bg-white/20 backdrop-blur-xl border border-white/40
                                    text-white flex items-center justify-center shadow-md text-xs font-bold">
                            {{ $initials }}
                        </button>
                    @endauth

                </div>

            </div>
        </div>
    </header>

    {{-- HERO + PENCARIAN --}}
    <section class="hero relative" id="home" data-frames='@json($frames)'>
        <div id="heroBg" class="hero-bg absolute inset-0 z-0"></div>

        <div class="hero-overlay absolute inset-0 z-10"></div>

        <div class="relative max-w-3xl mx-auto pt-32 md:pt-40 z-20">
            <div class="mx-4 relative">

                <!-- Kartu Pencarian + border animasi -->
                <div class="search-border-wrapper rounded-[40px] overflow-hidden shadow-2xl">
                    <div
                        class="search-card bg-white/95 rounded-[32px] px-6 py-10 md:px-10
                           flex flex-col gap-6 items-center border border-slate-200">
                        <h1 class="text-2xl md:text-3xl font-semibold text-slate-800 text-center">
                            <span id="typewriterText" class="typewriter-text font-bold text-primary"
                                data-text="Hai Kamu, Ingin pergi ke mana?"></span>
                        </h1>

                        <!-- Form dengan ID -->
                        <form id="searchForm" class="w-full" method="GET" action="{{ route('travel.search') }}">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center">
                                {{-- Asal --}}
                                <select name="asal"
                                    class="px-4 py-3 rounded-full border border-slate-300 focus:ring-2 focus:ring-[#0b5f80]">
                                    <option value="" disabled selected hidden>Asal</option>
                                    @foreach ($origins as $origin)
                                        <option value="{{ $origin }}">{{ $origin }}</option>
                                    @endforeach
                                </select>

                                {{-- Tujuan --}}
                                <select name="tujuan"
                                    class="px-4 py-3 rounded-full border border-slate-300 focus:ring-2 focus:ring-[#0b5f80]">
                                    <option value="" disabled selected hidden>Tujuan</option>
                                    @foreach ($destinations as $dest)
                                        <option value="{{ $dest }}">{{ $dest }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Tombol Search - DI LUAR search-border-wrapper -->
                <button type="submit" form="searchForm"
                    class="hidden md:flex
               absolute top-1/2 -translate-y-1/2 right-[-55px]
               h-[80px] w-[80px]
               rounded-full
               bg-white/30 backdrop-blur-xl
               border-2 border-white/60
               shadow-[0_10px_40px_rgba(0,0,0,0.15)]
               items-center justify-center
               hover:bg-white/40 hover:border-white/80
               hover:scale-110 active:scale-95
               transition-all duration-300
               focus:outline-none focus:ring-4 focus:ring-white/40
               z-30">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        class="h-8 w-8 text-white drop-shadow-lg" fill="none" stroke="currentColor"
                        stroke-width="2.5" stroke-linecap="round">
                        <circle cx="11" cy="11" r="6"></circle>
                        <path d="m16 16 5 5"></path>
                    </svg>
                </button>
            </div>
        </div>
    </section>

    {{-- CTA SECTION --}}
    <section class="bg-white py-16">
        <div class="max-w-6xl mx-auto flex flex-col lg:flex-row items-center gap-10 px-6">

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

    {{-- ===== HALAMAN DEPAN 2 (FITUR) ===== --}}
    <section id="fitur" class="fitur-section">
        <div class="fitur-bg"></div>
        <div class="relative max-w-7xl mx-auto px-4 md:px-6 py-14 md:py-16">
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

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
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
    <section id="ulasan" class="py-20">
        <div class="max-w-6xl mx-auto px-4 md:px-6">
            <div class="max-w-6xl mx-auto px-4 md:px-6">

                <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-10 mb-12">
                    <div class="max-w-xl">
                        <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 leading-snug">
                            Apa kata pengguna<br class="hidden md:block" />
                            tentang <span class="text-[#0E586D]">RiauPort</span>
                        </h2>

                        <div class="mt-5 h-[3px] w-32 bg-slate-900 rounded-full"></div>
                    </div>

                    <div class="flex-1 flex flex-col md:items-end gap-4">
                        <p class="text-sm md:text-base text-slate-500 max-w-md">
                            Beberapa ulasan berikut masih berupa data dummy sebagai contoh.
                            Nantinya bisa diganti dengan ulasan asli dari penumpang dan mitra travel
                            yang menggunakan layanan RiauPort.
                        </p>

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

                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
                    <article
                        class="group bg-white rounded-3xl shadow-sm border border-slate-100 p-6 flex flex-col h-full
                       transition-all duration-300 ease-out
                       hover:-translate-y-3 hover:shadow-xl hover:border-[#0E586D]/30">
                        <div class="flex items-center gap-1 text-amber-400 text-sm mb-4">
                            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                        </div>

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



    <!-- ================== SECTION WISATA ALAM ================== -->
    <section class="w-full pt-20 pb-24 flex flex-col items-center">
        <h2 class="text-3xl md:text-4xl font-extrabold text-slate-800 mb-3 text-center">
            Explore Taman & Objek Wisata Alam di Provinsi Riau
        </h2>

        <div class="w-40 h-1 bg-[#0E586D] rounded-full mb-14"></div>

        <!-- MARQUEE WRAPPER -->
        <div class="wisata-marquee w-full">
            <div class="wisata-track">

                <!-- ===== 6 KARTU ASLI ===== -->

                <!-- Card 1 -->
                <article
                    class="wisata-card bg-white rounded-3xl shadow-md border border-gray-100 p-5
                    transition-all duration-300 ease-out hover:-translate-y-4 hover:shadow-2xl hover:border-[#0E586D]/40">

                    <div class="relative w-full h-48 rounded-2xl overflow-hidden">
                        <img src="{{ asset('images/wisata1.jpg') }}" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                    </div>

                    <h3 class="mt-4 text-[#0E586D] font-bold text-lg">
                        Danau Buatan Lembah Sari
                    </h3>

                    <p class="text-sm text-gray-700 mt-2 leading-relaxed">
                        Destinasi alam populer di Pekanbaru dengan suasana tenang dan spot foto tepi danau.
                    </p>

                    <a href="https://www.tripadvisor.co.id/Attraction_Review-g303957-d3253499-Reviews-Lembah_Sari_Artificial_Lake-Pekanbaru_Riau_Province_Sumatra.html"
                        class="text-sm text-[#0E586D] hover:underline mt-3 block font-medium">
                        Lihat selengkapnya →
                    </a>
                </article>

                <!-- Card 2 -->
                <article
                    class="wisata-card bg-white rounded-3xl shadow-md border border-gray-100 p-5
                    transition-all duration-300 ease-out hover:-translate-y-4 hover:shadow-2xl hover:border-[#0E586D]/40">

                    <div class="relative w-full h-48 rounded-2xl overflow-hidden">
                        <img src="{{ asset('images/wisata2.jpg') }}" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                    </div>

                    <h3 class="mt-4 text-[#0E586D] font-bold text-lg">
                        Taman Nasional Zamrud
                    </h3>

                    <p class="text-sm text-gray-700 mt-2 leading-relaxed">
                        Kawasan konservasi dengan keanekaragaman hayati unik dan panorama rawa gambut.
                    </p>

                    <a href="https://tnzamrud.org/"
                        class="text-sm text-[#0E586D] hover:underline mt-3 block font-medium">
                        Lihat selengkapnya →
                    </a>
                </article>

                <!-- Card 3 -->
                <article
                    class="wisata-card bg-white rounded-3xl shadow-md border border-gray-100 p-5
                    transition-all duration-300 ease-out hover:-translate-y-4 hover:shadow-2xl hover:border-[#0E586D]/40">

                    <div class="relative w-full h-48 rounded-2xl overflow-hidden">
                        <img src="{{ asset('images/wisata3.png') }}" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                    </div>

                    <h3 class="mt-4 text-[#0E586D] font-bold text-lg">
                        Alam Mayang Pekanbaru
                    </h3>

                    <p class="text-sm text-gray-700 mt-2 leading-relaxed">
                        Lokasi wisata keluarga yang menghadirkan suasana hijau, danau, serta aktivitas outdoor.
                    </p>

                    <a href="https://www.tripadvisor.co.id/Attraction_Review-g303957-d6607230-Reviews-Alam_Mayang-Pekanbaru_Riau_Province_Sumatra.html"
                        class="text-sm text-[#0E586D] hover:underline mt-3 block font-medium">
                        Lihat selengkapnya →
                    </a>
                </article>

                <!-- Card 4 -->
                <article
                    class="wisata-card bg-white rounded-3xl shadow-md border border-gray-100 p-5
                    transition-all duration-300 ease-out hover:-translate-y-4 hover:shadow-2xl hover:border-[#0E586D]/40">

                    <div class="relative w-full h-48 rounded-2xl overflow-hidden">
                        <img src="{{ asset('images/wisata4.webp') }}" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                    </div>

                    <h3 class="mt-4 text-[#0E586D] font-bold text-lg">
                        Hutan Kota Pekanbaru
                    </h3>

                    <p class="text-sm text-gray-700 mt-2 leading-relaxed">
                        Area hijau luas di pusat kota, cocok untuk rekreasi keluarga dan olahraga santai.
                    </p>

                    <a href="https://www.indonesia.travel/ph/en/destination/sumatra/riau/hutan-kota-pekanbaru"
                        class="text-sm text-[#0E586D] hover:underline mt-3 block font-medium">
                        Lihat selengkapnya →
                    </a>
                </article>

                <!-- Card 5 -->
                <article
                    class="wisata-card bg-white rounded-3xl shadow-md border border-gray-100 p-5
                    transition-all duration-300 ease-out hover:-translate-y-4 hover:shadow-2xl hover:border-[#0E586D]/40">

                    <div class="relative w-full h-48 rounded-2xl overflow-hidden">
                        <img src="{{ asset('images/wisata5.jpg') }}" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                    </div>

                    <h3 class="mt-4 text-[#0E586D] font-bold text-lg">
                        Bukit Suligi Rokan Hulu
                    </h3>

                    <p class="text-sm text-gray-700 mt-2 leading-relaxed">
                        Destinasi pendakian populer dengan panorama sunrise dan hamparan awan.
                    </p>

                    <a href="https://www.trip.com/travel-guide/attraction/rokan-hulu/danau-bukit-suligi-137285979/"
                        class="text-sm text-[#0E586D] hover:underline mt-3 block font-medium">
                        Lihat selengkapnya →
                    </a>
                </article>

                <!-- Card 6 -->
                <article
                    class="wisata-card bg-white rounded-3xl shadow-md border border-gray-100 p-5
                    transition-all duration-300 ease-out hover:-translate-y-4 hover:shadow-2xl hover:border-[#0E586D]/40">

                    <div class="relative w-full h-48 rounded-2xl overflow-hidden">
                        <img src="{{ asset('images/wisata6.jpg') }}" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                    </div>

                    <h3 class="mt-4 text-[#0E586D] font-bold text-lg">
                        Air Terjun Aek Martua
                    </h3>

                    <p class="text-sm text-gray-700 mt-2 leading-relaxed">
                        Air terjun bertingkat dengan suasana alam sejuk dan spot foto alami yang memukau.
                    </p>

                    <a href="https://www.tripadvisor.co.id/Attraction_Review-g303957-d447114-Reviews-Air_Mertua_Waterfall-Pekanbaru_Riau_Province_Sumatra.html"
                        class="text-sm text-[#0E586D] hover:underline mt-3 block font-medium">
                        Lihat selengkapnya →
                    </a>
                </article>

                <!-- ===== DUPLIKASI 6 KARTU UNTUK LOOP HALUS ===== -->
                <!-- Card 1 -->
                <article
                    class="wisata-card bg-white rounded-3xl shadow-md border border-gray-100 p-5
                    transition-all duration-300 ease-out hover:-translate-y-4 hover:shadow-2xl hover:border-[#0E586D]/40">

                    <div class="relative w-full h-48 rounded-2xl overflow-hidden">
                        <img src="{{ asset('images/wisata1.jpg') }}" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent">
                        </div>
                    </div>

                    <h3 class="mt-4 text-[#0E586D] font-bold text-lg">
                        Danau Buatan Lembah Sari
                    </h3>

                    <p class="text-sm text-gray-700 mt-2 leading-relaxed">
                        Destinasi alam populer di Pekanbaru dengan suasana tenang dan spot foto tepi
                        danau.
                    </p>

                    <a href="https://www.tripadvisor.co.id/Attraction_Review-g303957-d3253499-Reviews-Lembah_Sari_Artificial_Lake-Pekanbaru_Riau_Province_Sumatra.html"
                        class="text-sm text-[#0E586D] hover:underline mt-3 block font-medium">
                        Lihat selengkapnya →
                    </a>
                </article>

                <!-- Card 2 -->
                <article
                    class="wisata-card bg-white rounded-3xl shadow-md border border-gray-100 p-5
                    transition-all duration-300 ease-out hover:-translate-y-4 hover:shadow-2xl hover:border-[#0E586D]/40">

                    <div class="relative w-full h-48 rounded-2xl overflow-hidden">
                        <img src="{{ asset('images/wisata2.jpg') }}" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent">
                        </div>
                    </div>

                    <h3 class="mt-4 text-[#0E586D] font-bold text-lg">
                        Taman Nasional Zamrud
                    </h3>

                    <p class="text-sm text-gray-700 mt-2 leading-relaxed">
                        Kawasan konservasi dengan keanekaragaman hayati unik dan panorama rawa
                        gambut.
                    </p>

                    <a href="https://tnzamrud.org/"
                        class="text-sm text-[#0E586D] hover:underline mt-3 block font-medium">
                        Lihat selengkapnya →
                    </a>
                </article>

                <!-- Card 3 -->
                <article
                    class="wisata-card bg-white rounded-3xl shadow-md border border-gray-100 p-5
                    transition-all duration-300 ease-out hover:-translate-y-4 hover:shadow-2xl hover:border-[#0E586D]/40">

                    <div class="relative w-full h-48 rounded-2xl overflow-hidden">
                        <img src="{{ asset('images/wisata3.png') }}" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent">
                        </div>
                    </div>

                    <h3 class="mt-4 text-[#0E586D] font-bold text-lg">
                        Alam Mayang Pekanbaru
                    </h3>

                    <p class="text-sm text-gray-700 mt-2 leading-relaxed">
                        Lokasi wisata keluarga yang menghadirkan suasana hijau, danau, serta
                        aktivitas outdoor.
                    </p>

                    <a href="https://www.tripadvisor.co.id/Attraction_Review-g303957-d6607230-Reviews-Alam_Mayang-Pekanbaru_Riau_Province_Sumatra.html"
                        class="text-sm text-[#0E586D] hover:underline mt-3 block font-medium">
                        Lihat selengkapnya →
                    </a>
                </article>

                <!-- Card 4 -->
                <article
                    class="wisata-card bg-white rounded-3xl shadow-md border border-gray-100 p-5
                    transition-all duration-300 ease-out hover:-translate-y-4 hover:shadow-2xl hover:border-[#0E586D]/40">

                    <div class="relative w-full h-48 rounded-2xl overflow-hidden">
                        <img src="{{ asset('images/wisata4.webp') }}" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent">
                        </div>
                    </div>

                    <h3 class="mt-4 text-[#0E586D] font-bold text-lg">
                        Hutan Kota Pekanbaru
                    </h3>

                    <p class="text-sm text-gray-700 mt-2 leading-relaxed">
                        Area hijau luas di pusat kota, cocok untuk rekreasi keluarga dan olahraga
                        santai.
                    </p>

                    <a href="https://www.indonesia.travel/ph/en/destination/sumatra/riau/hutan-kota-pekanbaru"
                        class="text-sm text-[#0E586D] hover:underline mt-3 block font-medium">
                        Lihat selengkapnya →
                    </a>
                </article>

                <!-- Card 5 -->
                <article
                    class="wisata-card bg-white rounded-3xl shadow-md border border-gray-100 p-5
                    transition-all duration-300 ease-out hover:-translate-y-4 hover:shadow-2xl hover:border-[#0E586D]/40">

                    <div class="relative w-full h-48 rounded-2xl overflow-hidden">
                        <img src="{{ asset('images/wisata5.jpg') }}" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent">
                        </div>
                    </div>

                    <h3 class="mt-4 text-[#0E586D] font-bold text-lg">
                        Bukit Suligi Rokan Hulu
                    </h3>

                    <p class="text-sm text-gray-700 mt-2 leading-relaxed">
                        Destinasi pendakian populer dengan panorama sunrise dan hamparan awan.
                    </p>

                    <a href="https://www.trip.com/travel-guide/attraction/rokan-hulu/danau-bukit-suligi-137285979/"
                        class="text-sm text-[#0E586D] hover:underline mt-3 block font-medium">
                        Lihat selengkapnya →
                    </a>
                </article>

                <!-- Card 6 -->
                <article
                    class="wisata-card bg-white rounded-3xl shadow-md border border-gray-100 p-5
                    transition-all duration-300 ease-out hover:-translate-y-4 hover:shadow-2xl hover:border-[#0E586D]/40">

                    <div class="relative w-full h-48 rounded-2xl overflow-hidden">
                        <img src="{{ asset('images/wisata6.jpg') }}" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent">
                        </div>
                    </div>

                    <h3 class="mt-4 text-[#0E586D] font-bold text-lg">
                        Air Terjun Aek Martua
                    </h3>

                    <p class="text-sm text-gray-700 mt-2 leading-relaxed">
                        Air terjun bertingkat dengan suasana alam sejuk dan spot foto alami yang
                        memukau.
                    </p>

                    <a href="https://www.tripadvisor.co.id/Attraction_Review-g303957-d447114-Reviews-Air_Mertua_Waterfall-Pekanbaru_Riau_Province_Sumatra.html"
                        class="text-sm text-[#0E586D] hover:underline mt-3 block font-medium">
                        Lihat selengkapnya →
                    </a>
                </article>
    </section>



    <!-- ================== SECTION FAQ ================== -->
    <section id="faq" class="py-16">
        <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-xl p-8 md:p-10">

            <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-xl p-8 md:p-10">

                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    Pernyataan Umum
                </h2>

                <div class="divide-y divide-gray-200 text-lg">

                    <!-- FAQ 1 -->
                    <details class="group py-6 transition-all duration-300">
                        <summary
                            class="flex justify-between items-center cursor-pointer font-semibold text-gray-900 list-none">
                            <span>Apa itu Riauport?</span>
                            <svg class="w-6 h-6 transform transition-transform duration-300 group-open:rotate-180 text-gray-800"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.94a.75.75 0 111.08 1.04l-4.24 4.5a.75.75 0 01-1.08 0l-4.24-4.5a.75.75 0 01.02-1.06z"
                                    clip-rule="evenodd" />
                            </svg>
                        </summary>
                        <p class="mt-3 text-gray-700 leading-relaxed text-base">
                            Sistem Informasi Layanan Travel berbasis website berfungsi
                            untuk mempermudah
                            masyarakat
                            dalam memperoleh informasi terkait perjalanan travel, dan
                            kontak hubung
                            sopir di seluruh
                            Riau.
                        </p>
                    </details>

                    <!-- FAQ 2 -->
                    <details class="group py-6 transition-all duration-300">
                        <summary
                            class="flex justify-between items-center cursor-pointer font-semibold text-gray-900 list-none">
                            <span>Bagaimana cara mendapatkan Whatsapp Sopir?</span>
                            <svg class="w-6 h-6 transform transition-transform duration-300 group-open:rotate-180 text-gray-800"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.94a.75.75 0 111.08 1.04l-4.24 4.5a.75.75 0 01-1.08 0l-4.24-4.5a.75.75 0 01.02-1.06z"
                                    clip-rule="evenodd" />
                            </svg>
                        </summary>
                        <p class="mt-3 text-gray-700 leading-relaxed text-base">
                            Kamu bisa melihat nomor sopir langsung pada detail travel
                            yang tersedia di
                            halaman utama.
                        </p>
                    </details>

                    <!-- FAQ 3 -->
                    <details class="group py-6 transition-all duration-300">
                        <summary
                            class="flex justify-between items-center cursor-pointer font-semibold text-gray-900 list-none">
                            <span>Bagaimana cara melihat detail travel?</span>
                            <svg class="w-6 h-6 transform transition-transform duration-300 group-open:rotate-180 text-gray-800"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.94a.75.75 0 111.08 1.04l-4.24 4.5a.75.75 0 01-1.08 0l-4.24-4.5a.75.75 0 01.02-1.06z"
                                    clip-rule="evenodd" />
                            </svg>
                        </summary>
                        <p class="mt-3 text-gray-700 leading-relaxed text-base">
                            Klik pada nama travel yang ditampilkan, maka kamu akan
                            diarahkan ke halaman
                            detail travel
                            tersebut.
                        </p>
                    </details>

                    <!-- FAQ 4 -->
                    <details class="group py-6 transition-all duration-300">
                        <summary
                            class="flex justify-between items-center cursor-pointer font-semibold text-gray-900 list-none">
                            <span>Apa saja persyaratan mendaftarkan travel?</span>
                            <svg class="w-6 h-6 transform transition-transform duration-300 group-open:rotate-180 text-gray-800"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.94a.75.75 0 111.08 1.04l-4.24 4.5a.75.75 0 01-1.08 0l-4.24-4.5a.75.75 0 01.02-1.06z"
                                    clip-rule="evenodd" />
                            </svg>
                        </summary>
                        <p class="mt-3 text-gray-700 leading-relaxed text-base">
                            Harus memiliki informasi rute, jadwal, kontak aktif, serta
                            izin operasional
                            dari pihak
                            berwenang.
                        </p>
                    </details>

                </div>
            </div>
    </section>


    <!-- ========== FOOTER ========== -->
    <footer class="bg-white border-t border-gray-200 mt-0 w-full">
        <div class="w-full">
            <div class="max-w-7xl mx-auto px-6 py-16">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">

                    <div class="lg:col-span-1">
                        <div class="mb-4">
                            <img src="{{ asset('images/riauport-logo.png') }}" alt="RiauPort" class="h-16 mb-3">
                        </div>
                        <p class="text-gray-600 text-sm mb-6 leading-relaxed">
                            Platform terpadu untuk menemukan layanan travel terbaik di
                            Riau.
                            Menghubungkan penumpang dengan sopir travel terpercaya.
                        </p>
                        <div class="flex gap-4">
                            <a href="#"
                                class="w-10 h-10 flex items-center justify-center rounded-lg bg-gray-100 text-gray-600 hover:bg-[#3FA6C4] hover:text-white transition-colors duration-200">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z" />
                                </svg>
                            </a>
                            <a href="#"
                                class="w-10 h-10 flex items-center justify-center rounded-lg bg-gray-100 text-gray-600 hover:bg-[#3FA6C4] hover:text-white transition-colors duration-200">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z" />
                                </svg>
                            </a>
                            <a href="#"
                                class="w-10 h-10 flex items-center justify-center rounded-lg bg-gray-100 text-gray-600 hover:bg-[#3FA6C4] hover:text-white transition-colors duration-200">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M7.8 2h8.4A4.8 4.8 0 0121 6.8v8.4A4.8 4.8 0 0116.2 20H7.8A4.8 4.8 0 013 15.2V6.8A4.8 4.8 0 017.8 2zm0 2A2.8 2.8 0 005 6.8v8.4A2.8 2.8 0 007.8 18h8.4a2.8 2.8 0 002.8-2.8V6.8A2.8 2.8 0 0016.2 4H7.8zm4.2 2.5a4.5 4.5 0 11-.001 9.001A4.5 4.5 0 0112 6.5zm4.75-2.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-gray-900 font-semibold text-base mb-4">Navigasi
                        </h3>
                        <ul class="space-y-3 text-sm">
                            <li><a href="{{ route('home') }}" class="text-gray-600 hover:text-[#3FA6C4]">Home</a>
                            </li>
                            <li><a href="{{ route('about') }}" class="text-gray-600 hover:text-[#3FA6C4]">Tentang
                                    Kami</a></li>
                            <li><a href="#fitur" class="text-gray-600 hover:text-[#3FA6C4]">Fitur</a>
                            </li>
                            <li><a href="{{ route('contact') }}"
                                    class="text-gray-600 hover:text-[#3FA6C4]">Kontak</a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-gray-900 font-semibold text-base mb-4">Layanan
                        </h3>
                        <ul class="space-y-3 text-sm">
                            <li><a href="#" class="text-gray-600 hover:text-[#3FA6C4]">Cari
                                    Travel</a></li>
                            <li><a href="{{ route('register.sopir.show') }}"
                                    class="text-gray-600 hover:text-[#3FA6C4]">Daftar
                                    Sopir</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-[#3FA6C4]">Rute
                                    Populer</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-[#3FA6C4]">FAQ</a>
                            </li>
                        </ul>
                    </div>

                    <div id="contact">
                        <h3 class="text-gray-900 font-semibold text-base mb-4">Hubungi
                            Kami</h3>
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
                                <span>riauport.info@gmail.com</span>
                            </li>
                            <li class="text-gray-600 flex items-center gap-2">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

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

    {{-- JS custom halaman ini --}}
    <script src="{{ asset('js/home.js') }}"></script>
</body>

</html>

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

        <div class="search-card">
            <h3 class="text-center text-xl md:text-2xl font-semibold text-slate-800 mb-4">
                Hai Kamu, <span class="font-extrabold text-[#0e586d]">Ingin pergi ke mana?</span>
            </h3>

            <div class="relative">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    {{-- Select Asal & Tujuan (static list contoh) --}}
                    <select class="search-input">
                        <option>Asal</option>
                        <option>Dumai</option>
                        <option>Pekanbaru</option>
                        <option>Duri</option>
                        <option>Bengkalis</option>
                        <option>Siak</option>
                    </select>
                    <select class="search-input">
                        <option>Tujuan</option>
                        <option>Pekanbaru</option>
                        <option>Dumai</option>
                        <option>Duri</option>
                        <option>Bengkalis</option>
                        <option>Siak</option>
                    </select>
                </div>

                {{-- kaca pembesar di luar kotak --}}
                <button class="search-glass" aria-label="Cari">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
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

    {{-- ===== FAQ (HALAMAN 3) ===== --}}
    <section id="faq" class="relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-[#6CC6D6] to-[#aee3ea]"></div>
        <div class="relative max-w-7xl mx-auto px-4 md:px-6 pt-10 pb-8">
            <h2 class="text-3xl md:text-4xl font-extrabold text-white drop-shadow-sm">Pernyataan Umum</h2>
        </div>

        <div class="relative max-w-6xl mx-auto px-4 md:px-6 -mt-4 pb-16">
            <div class="bg-white rounded-2xl faq-card overflow-hidden">

                <details class="group border-b border-slate-100 open:bg-white/60">
                    <summary
                        class="list-none cursor-pointer flex items-center justify-between gap-4 px-6 md:px-8 py-6 md:py-7">
                        <h3 class="font-semibold text-lg md:text-xl">Apa itu Riauport?</h3>
                        <span
                            class="chev text-2xl md:text-3xl select-none text-slate-700 group-open:rotate-180">^</span>
                    </summary>
                    <div class="grid faq-body px-6 md:px-8 pb-6" aria-expanded="true">
                        <div class="overflow-hidden text-slate-700 leading-relaxed">
                            Sistem Informasi Layanan Travel berbasis website berfungsi untuk mempermudah masyarakat
                            dalam memperoleh informasi terkait perjalanan travel, dan kontak hubung sopir di seluruh
                            riau.
                        </div>
                    </div>
                </details>

                <details class="group border-b border-slate-100">
                    <summary
                        class="list-none cursor-pointer flex items-center justify-between gap-4 px-6 md:px-8 py-6 md:py-7">
                        <h3 class="font-semibold text-lg md:text-xl">Bagaimana cara mendapatkan Whatsapp Sopir?</h3>
                        <span class="chev text-2xl md:text-3xl select-none text-slate-700">V</span>
                    </summary>
                    <div class="grid faq-body px-6 md:px-8 pb-6" aria-expanded="false">
                        <div class="overflow-hidden text-slate-700 leading-relaxed">
                            Buka halaman daftar sopir, pilih rute yang sesuai, lalu tekan tombol “Hubungi” pada kartu
                            sopir.
                            Nomor Whatsapp & telepon akan tampil untuk dihubungi langsung.
                        </div>
                    </div>
                </details>

                <details class="group border-b border-slate-100">
                    <summary
                        class="list-none cursor-pointer flex items-center justify-between gap-4 px-6 md:px-8 py-6 md:py-7">
                        <h3 class="font-semibold text-lg md:text-xl">Bagaimana cara melihat detail travel?</h3>
                        <span class="chev text-2xl md:text-3xl select-none text-slate-700">V</span>
                    </summary>
                    <div class="grid faq-body px-6 md:px-8 pb-6" aria-expanded="false">
                        <div class="overflow-hidden text-slate-700 leading-relaxed">
                            Gunakan form pencarian Asal & Tujuan di halaman depan, lalu pilih salah satu travel.
                            Halaman detail berisi jadwal, armada, titik jemput, harga, serta kontak sopir.
                        </div>
                    </div>
                </details>

                <details class="group">
                    <summary
                        class="list-none cursor-pointer flex items-center justify-between gap-4 px-6 md:px-8 py-6 md:py-7">
                        <h3 class="font-semibold text-lg md:text-xl">Apakah saja persyaratan mendaftarkan travel?</h3>
                        <span class="chev text-2xl md:text-3xl select-none text-slate-700">V</span>
                    </summary>
                    <div class="grid faq-body px-6 md:px-8 pb-6" aria-expanded="false">
                        <div class="overflow-hidden text-slate-700 leading-relaxed">
                            Siapkan data pemilik & sopir (KTP), data armada (STNK), nomor Whatsapp aktif,
                            rute utama, serta jadwal keberangkatan. Klik “Daftar sebagai sopir” di beranda.
                        </div>
                    </div>
                </details>

            </div>
        </div>
    </section>

    {{-- JS: slideshow & FAQ icon state --}}
    <script>
        // Slideshow
        (function() {
            const images = @json($frames);
            const el = document.getElementById('heroBg');
            if (!images || !images.length) {
                el.style.background = '#e9f2f6';
                return;
            }
            images.forEach(src => {
                const im = new Image();
                im.src = src;
            });
            let i = 0;
            el.style.backgroundImage = `url('${images[0]}')`;
            setInterval(() => {
                el.classList.add('fade');
                setTimeout(() => {
                    i = (i + 1) % images.length;
                    el.style.backgroundImage = `url('${images[i]}')`;
                    el.classList.remove('fade');
                }, 700);
            }, 6000);
        })();

        // FAQ ^ / V toggle
        document.querySelectorAll('details').forEach(d => {
            const body = d.querySelector('.faq-body');
            const chev = d.querySelector('.chev');
            const sync = () => {
                const open = d.hasAttribute('open');
                body.setAttribute('aria-expanded', open ? 'true' : 'false');
                chev.textContent = open ? '^' : 'V';
            };
            d.addEventListener('toggle', sync);
            sync();
        });
    </script>
</body>

</html>

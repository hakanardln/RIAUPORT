<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RiauPort – Home</title>

    {{-- Tailwind via CDN (aman tanpa Vite) --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* ====== NAVBAR GLASS ====== */
        .site-header {
            position: absolute;
            inset-inline: 0;
            top: 18px;
            z-index: 1000
        }

        .glass-nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: rgba(255, 255, 255, .68);
            backdrop-filter: blur(20px) saturate(180%);
            border-radius: 22px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .12);
            padding: .9rem 1.4rem;
        }

        .nav-link {
            font-weight: 600;
            color: #0a3b44;
            transition: .25s;
            font-size: 1.06rem
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
            transition: .25s;
        }

        .btn-login:hover {
            background: #127692
        }

        /* ====== HERO ====== */
        .hero {
            position: relative;
            width: 100vw;
            left: 50%;
            right: 50%;
            margin-left: -50vw;
            margin-right: -50vw;
            height: 72vh;
            overflow: hidden
        }

        .hero-bg {
            position: absolute;
            inset: 0;
            background-position: center;
            background-size: cover;
            transition: opacity .85s ease
        }

        .hero-bg.fade {
            opacity: 0
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(255, 255, 255, 0) 0, rgba(255, 255, 255, 0) 60%, rgba(0, 0, 0, .15) 100%)
        }

        /* ====== SEARCH CARD ====== */
        .search-card {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            bottom: 14%;
            width: min(980px, 92%);
            background: rgba(255, 255, 255, .9);
            backdrop-filter: blur(16px);
            border-radius: 28px;
            padding: 1.6rem 1.4rem;
            box-shadow: 0 18px 40px rgba(0, 0, 0, .14);
        }

        .search-input {
            border-radius: 14px;
            border: 1px solid #e5e7eb;
            padding: .9rem 1rem;
            background: #f4f7f9;
            outline: none;
            width: 100%
        }

        /* ====== SEARCH ICON (OUTSIDE) ====== */
        .search-glass {
            position: absolute;
            right: -35px;
            top: 50%;
            transform: translateY(-50%);
            height: 68px;
            width: 68px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .75);
            backdrop-filter: blur(10px) saturate(180%);
            -webkit-backdrop-filter: blur(10px) saturate(180%);
            box-shadow: 0 10px 25px rgba(0, 0, 0, .2);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: .25s;
        }

        .search-glass:hover {
            transform: translateY(-50%) scale(1.08);
            box-shadow: 0 12px 28px rgba(0, 0, 0, .25)
        }

        .search-glass svg {
            color: #0e586d;
            width: 28px;
            height: 28px
        }

        /* ====== CTA ====== */
        .cta-title {
            font-weight: 800;
            color: #0a2d34;
            line-height: 1.1
        }

        .cta-btn {
            background: #0e586d;
            color: #fff;
            font-weight: 700;
            padding: .95rem 1.3rem;
            border-radius: 14px;
            box-shadow: 0 14px 28px rgba(14, 88, 109, .25), inset 0 2px 6px rgba(255, 255, 255, .35);
            transition: .25s;
        }

        .cta-btn:hover {
            background: #127692
        }

        .cta-image {
            width: 115%;
            max-width: 620px;
            transform: translateX(5%)
        }

        /* ====== FEATURE CARDS (Halaman depan 2 style) ====== */
        .feature-wrap {
            background: linear-gradient(160deg, #cdf3f8 0%, #7fd0d9 38%, #53b7c7 100%);
            border-radius: 20px;
        }

        .feature-card {
            background: rgba(255, 255, 255, .95);
            border-radius: 20px;
            box-shadow: 0 16px 28px rgba(0, 0, 0, .15), inset 0 2px 6px rgba(255, 255, 255, .45);
            padding: 1.4rem 1.2rem;
        }

        body {
            margin: 0;
            font-family: 'Poppins', system-ui, Segoe UI, Roboto, Arial, sans-serif
        }
    </style>
</head>

<body class="bg-white">

    {{-- ================= NAVBAR ================= --}}
    <header class="site-header">
        <div class="max-w-7xl mx-auto px-4 md:px-6">
            <nav class="glass-nav">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/riauport-logo.png') }}" alt="RiauPort Logo" class="h-12 md:h-14"
                        onerror="this.style.display='none'">
                </div>

                <ul class="hidden md:flex items-center gap-10">
                    <li><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                    <li><a class="nav-link" href="#">Contact</a></li>
                    <li><a class="nav-link" href="#">About</a></li>
                </ul>

                <a href="{{ route('login') }}" class="btn-login">Login</a>
            </nav>
        </div>
    </header>

    {{-- ================= HERO + SLIDESHOW ================= --}}
    @php
        // Kumpulkan gambar Gambar1..Gambar4 (atau "Frame 1..4") dengan ekstensi umum
        $frames = [];
        foreach (range(1, 4) as $i) {
            foreach (['jpg', 'png', 'jpeg', 'webp'] as $ext) {
                $p = public_path("images/Gambar{$i}.{$ext}");
                if (file_exists($p)) {
                    $frames[] = asset("images/Gambar{$i}.{$ext}");
                    break;
                }
            }
        }
        if (empty($frames)) {
            foreach (range(1, 4) as $i) {
                foreach (['jpg', 'png', 'jpeg', 'webp'] as $ext) {
                    $p = public_path("images/Frame {$i}.{$ext}");
                    if (file_exists($p)) {
                        $frames[] = asset("images/Frame {$i}.{$ext}");
                        break;
                    }
                }
            }
        }

        // Gambar laptop (opsional)
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

    <section class="hero">
    <div id="heroBg" class="hero-bg"></div>
    <div class="hero-overlay"></div>

    {{-- Kartu pencarian --}}
    <div class="search-card">
        <h3 class="text-center text-xl md:text-2xl font-semibold text-slate-800 mb-4">
            Hai Kamu, <span class="font-extrabold text-[#0e586d]">Ingin pergi ke mana?</span>
        </h3>

        <div class="flex items-center gap-3 bg-white/80 backdrop-blur-md p-4 rounded-2xl shadow-lg border border-slate-200">

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
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                    class="w-6 h-6" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 103.5 3.5a7.5 7.5 0 0013.15 13.15z" />
                </svg>
            </button>
        </div>
    </div>
</section>


    {{-- ================= CTA SECTION ================= --}}
    <section class="max-w-7xl mx-auto px-4 md:px-6 py-12 md:py-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-14 items-center">
            <div>
                <h2 class="cta-title text-3xl md:text-4xl lg:text-5xl">
                    Daftarkan Layanan Travelmu<br />
                    <span style="color:#0e586d">Sekarang!</span>
                </h2>
                <p class="mt-5 text-lg text-slate-600">
                    Tampilkan layanan travelmu dan raih lebih banyak penumpang.
                </p>
                <div class="mt-7">
                    <a href="{{ route('register') }}" class="cta-btn inline-block">Daftar Sebagai Sopir</a>
                </div>
            </div>

            <div class="relative flex justify-center lg:justify-end">
                @if ($ctaImg)
                    <img src="{{ $ctaImg }}" alt="Mockup"
                        class="cta-image drop-shadow-[0_20px_40px_rgba(0,0,0,.25)] rounded-2xl" />
                @else
                    <div class="w-full h-64 md:h-80 bg-slate-100 rounded-2xl grid place-items-center text-slate-500">
                        (Tambahkan <strong>public/images/laptop1.png</strong>)
                    </div>
                @endif
            </div>
        </div>
    </section>

    {{-- ================= HALAMAN DEPAN 2 (FITUR) ================= --}}
    <section class="max-w-7xl mx-auto px-4 md:px-6 pb-16">
        <div class="feature-wrap p-8 md:p-10">
            <h3 class="text-white font-extrabold text-2xl md:text-4xl leading-tight tracking-wide mb-8">
                Riauport, Solusi terhubung ke&nbsp;berbagai<br class="hidden md:block" />
                jasa transportasi Travel pilihan anda
            </h3>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                {{-- Kartu 1 --}}
                <div class="feature-card flex items-start gap-4">
                    <img src="{{ asset('images/car.png') }}" class="h-12 w-12 object-contain"
                        onerror="this.style.display='none'">
                    <p class="text-[19px] md:text-[20px] text-slate-800">
                        Perjalanan nyaman dimulai dari pilihan yang tepat.
                    </p>
                </div>

                {{-- Kartu 2 --}}
                <div class="feature-card flex items-start gap-4">
                    <img src="{{ asset('images/ratings.png') }}" class="h-12 w-12 object-contain"
                        onerror="this.style.display='none'">
                    <p class="text-[19px] md:text-[20px] text-slate-800">
                        Dapatkan pengalaman terbaik dari rekomendasi nyata penumpang
                    </p>
                </div>

                {{-- Kartu 3 --}}
                <div class="feature-card flex items-start gap-4">
                    <img src="{{ asset('images/browser.png') }}" class="h-12 w-12 object-contain"
                        onerror="this.style.display='none'">
                    <p class="text-[19px] md:text-[20px] text-slate-800">
                        Semua Sopir Travel, Satu Portal
                    </p>
                </div>

                {{-- Kartu 4 --}}
                <div class="feature-card flex items-start gap-4">
                    <img src="{{ asset('images/whatsapp.png') }}" class="h-12 w-12 object-contain"
                        onerror="this.style.display='none'">
                    <p class="text-[19px] md:text-[20px] text-slate-800">
                        Hubungi sopir secara langsung via Whatsapp atau telepon
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- ================= SLIDESHOW SCRIPT ================= --}}
    <script>
        (function() {
            const images = @json($frames);
            const el = document.getElementById('heroBg');

            if (!images || !images.length) {
                el.style.background = 'linear-gradient(180deg,#e9f2f6,#f6fafc)';
                return;
            }

            // preload
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
    </script>
</body>

</html>

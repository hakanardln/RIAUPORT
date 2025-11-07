<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RiauPort – Home</title>
    @vite('resources/css/app.css')

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
            width: 100%;
            height: 78vh;
            overflow: hidden;
        }

        .hero-bg {
            position: absolute;
            inset: 0;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            transition: opacity .85s ease
        }

        .hero-bg.fade {
            opacity: 0
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(255, 255, 255, .0) 0, rgba(255, 255, 255, .0) 60%, rgba(0, 0, 0, .15) 100%)
        }

        /* ====== SEARCH CARD ====== */
        .search-card {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            bottom: 18%;
            width: min(980px, 92%);
            background: rgba(255, 255, 255, .9);
            backdrop-filter: blur(16px);
            border-radius: 28px;
            padding: 1.6rem 1.4rem;
            box-shadow: 0 18px 40px rgba(0, 0, 0, .14);
        }

        .search-select {
            border-radius: 14px;
            border: 1px solid #e5e7eb;
            padding: .9rem 1rem;
            background: #f4f7f9;
            outline: none;
            width: 100%;
            appearance: none;
            /* sembunyikan arrow default */
        }

        .select-wrap {
            position: relative;
        }

        .select-wrap:after {
            content: "▾";
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #0e586d;
            pointer-events: none;
            font-weight: 700;
        }

        /* ====== SEARCH ICON OUTSIDE (GLASS CIRCLE) ====== */
        .search-glass {
            position: absolute;
            right: -35px;
            top: 50%;
            transform: translateY(-50%);
            height: 68px;
            width: 68px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .4);
            backdrop-filter: blur(10px) saturate(180%);
            box-shadow: 0 10px 25px rgba(0, 0, 0, .2);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: .25s;
        }

        .search-glass:hover {
            transform: translateY(-50%) scale(1.08);
            box-shadow: 0 12px 28px rgba(0, 0, 0, .25);
        }

        .search-glass svg {
            color: #0e586d;
            width: 28px;
            height: 28px;
        }

        /* ====== CTA SECTION ====== */
        .cta-title {
            font-weight: 800;
            color: #0a2d34;
            line-height: 1.1
        }

        .cta-btn {
            background: #0e586d;
            color: #fff;
            font-weight: 700;
            padding: 0.95rem 1.3rem;
            border-radius: 14px;
            box-shadow: 0 14px 28px rgba(14, 88, 109, .25), inset 0 2px 6px rgba(255, 255, 255, .35);
            transition: .25s;
        }

        .cta-btn:hover {
            background: #127692;
            transform: translateY(-3px);
            box-shadow: 0 16px 30px rgba(14, 88, 109, 0.35);
        }


        .cta-image {
            width: 115%;
            max-width: 620px;
            transform: translateX(5%);
        }

        /* ====== FITUR SECTION ====== */
        .fitur-section {
            background: linear-gradient(180deg, #a9ecff 0%, #c6f4ff 70%, #baf1ff 100%);
            padding: 5rem 1rem;
        }

        .fitur-card {
            display: flex;
            align-items: center;
            gap: 1rem;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 20px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
            padding: 1rem 1.4rem;
            border: 1px solid rgba(255, 255, 255, 0.6);
            transition: 0.25s;
        }

        .fitur-card:hover {
            transform: scale(1.02);
            box-shadow: 0 12px 26px rgba(0, 0, 0, 0.2);
        }

        .fitur-card img {
            width: 64px;
            height: 64px;
            object-fit: contain;
        }

        .fitur-title {
            font-weight: 800;
            font-size: 1.9rem;
            color: #0A2D34;
            text-align: center;
            margin-bottom: 3rem;
            line-height: 1.3;
        }

        body {
            margin: 0;
            font-family: 'Poppins', system-ui, Segoe UI, Roboto, Arial, sans-serif
        }
    </style>
</head>

<body>
    {{-- ================= NAVBAR ================= --}}
    <header class="site-header">
        <div class="max-w-7xl mx-auto px-4 md:px-6">
            <nav class="glass-nav">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/riauport-logo.png') }}" alt="RiauPort" class="h-12 md:h-14">
                </div>

                <ul class="hidden md:flex items-center gap-10">
                    <li><a class="nav-link" href="#">Home</a></li>
                    <li><a class="nav-link" href="#">Contact</a></li>
                    <li><a class="nav-link" href="#">About</a></li>
                </ul>

                <a href="{{ route('login') }}" class="btn-login">Login</a>
            </nav>
        </div>
    </header>

    {{-- ================= HERO ================= --}}
    @php
        $frames = [];
        foreach ([1, 2, 3, 4] as $i) {
            foreach (['png', 'jpg', 'jpeg', 'webp'] as $ext) {
                $p = public_path("images/Gambar{$i}.{$ext}");
                if (file_exists($p)) {
                    $frames[] = asset("images/Gambar{$i}.{$ext}");
                    break;
                }
            }
        }

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

        {{-- Search card --}}
        <div class="search-card">
            <h3 class="text-center text-xl md:text-2xl font-semibold text-slate-800 mb-4">
                Hai Kamu, <span class="font-extrabold text-[#0e586d]">Ingin pergi ke mana?</span>
            </h3>

            <div class="relative">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    <input type="text" class="search-input" placeholder="Asal">
                    <input type="text" class="search-input" placeholder="Tujuan">
                </div>

                {{-- Ikon kaca pembesar --}}
                <button class="search-glass" aria-label="Cari">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 103.5 3.5a7.5 7.5 0 0013.15 13.15z" />
                    </svg>
                </button>
            </div>
        </div>
    </section>

    {{-- ================= CTA SECTION ================= --}}
    <section class="max-w-7xl mx-auto px-4 md:px-6 py-16 md:py-20">
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

    {{-- ================= FITUR SECTION (HALAMAN DEPAN 2) ================= --}}
    <section class="fitur-section">
        <div class="max-w-6xl mx-auto">
            <h2 class="fitur-title">
                Riauport, Solusi terhubung ke <br />
                berbagai jasa transportasi Travel pilihan anda
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="fitur-card">
                    <img src="{{ asset('images/car.png') }}" alt="Car">
                    <p>Perjalanan nyaman dimulai dari pilihan yang tepat.</p>
                </div>

                <div class="fitur-card">
                    <img src="{{ asset('images/ratings.png') }}" alt="Ratings">
                    <p>Dapatkan pengalaman terbaik dari rekomendasi nyata penumpang.</p>
                </div>

                <div class="fitur-card">
                    <img src="{{ asset('images/browser.png') }}" alt="Browser">
                    <p>Semua Sopir Travel, Satu Portal.</p>
                </div>

                <div class="fitur-card">
                    <img src="{{ asset('images/whatsapp.png') }}" alt="Whatsapp">
                    <p>Hubungi sopir secara langsung via Whatsapp atau telepon.</p>
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
    </script>
</body>

</html>

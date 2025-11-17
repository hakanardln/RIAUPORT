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
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" stroke="black" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>

        <!-- Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 px-10 md:px-14">

            <!-- Card -->
            <div class="bg-white rounded-2xl shadow-lg p-4 hover:shadow-xl transition">
                <div class="w-full h-48 bg-gray-100 rounded-xl overflow-hidden">
                    <img src={{asset('Images2.jpg')}} class="w-full h-full object-cover">
                </div>

                <div class="mt-3 flex items-center gap-2 text-purple-600 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5.121 17.804A9 9 0 1117.804 5.12 9 9 0 015.12 17.804z" />
                    </svg>
                    FITRA
                </div>

                <p class="text-sm text-gray-700 mt-1">
                    <strong>Tujuan :</strong><br>
                    Bengkalis > Pekanbaru > Siak > Dumai
                </p>

                <a href="#" class="text-sm text-blue-600 hover:underline mt-2 block">Lihat selengkapnya...</a>
            </div>

            <!-- Card -->
            <div class="bg-white rounded-2xl shadow-lg p-4 hover:shadow-xl transition">
                <div class="w-full h-48 bg-gray-100 rounded-xl overflow-hidden">
                    <img src={{asset('mobil2.jpg')}} class="w-full h-full object-cover">
                </div>

                <div class="mt-3 flex items-center gap-2 text-purple-600 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5.121 17.804A9 9 0 1117.804 5.12 9 9 0 015.12 17.804z" />
                    </svg>
                    Zawa Aufi
                </div>

                <p class="text-sm text-gray-700 mt-1">
                    <strong>Tujuan :</strong><br>
                    Bengkalis > Dumai > Pekanbaru
                </p>

                <a href="#" class="text-sm text-blue-600 hover:underline mt-2 block">Lihat selengkapnya...</a>
            </div>

            <!-- Card -->
            <div class="bg-white rounded-2xl shadow-lg p-4 hover:shadow-xl transition">
                <div class="w-full h-48 bg-gray-100 rounded-xl overflow-hidden">
                    <img src={{asset('mobil3.jpg')}} class="w-full h-full object-cover">
                </div>

                <div class="mt-3 flex items-center gap-2 text-purple-600 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5.121 17.804A9 9 0 1117.804 5.12 9 9 0 015.12 17.804z" />
                    </svg>
                    Riki
                </div>

                <p class="text-sm text-gray-700 mt-1">
                    <strong>Tujuan :</strong><br>
                    Duri > Dumai > Pakning > Bengkalis
                </p>

                <a href="#" class="text-sm text-blue-600 hover:underline mt-2 block">Lihat selengkapnya...</a>
            </div>

        </div>

        <!-- Next Button -->
        <button
            class="absolute right-0 top-1/2 -translate-y-1/2 bg-white shadow-lg p-3 rounded-full hover:scale-110 transition z-10">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" stroke="black" viewBox="0 0 24 24">
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

      <div class="relative z-10 w-full md:w-2/5 bg-riau-blue text-white p-10 rounded-t-lg md:rounded-l-lg md:rounded-tr-none md:rounded-r-[3rem]">
        
        <h2 class="text-3xl font-bold mb-6" style="font-family: serif;">Tentang RiauPort</h2>
        
        <p class="text-sm font-bold mb-4">
          Sistem Informasi Layanan Travel berbasis website berfungsi untuk mempermudah masyarakat dalam memperoleh informasi terkait perjalanan travel, khususnya untuk kebutuhan mudik.
        </p>
        
        <p class="text-sm font-bold mb-4">
          sistem berbasis website yang terpusat diperlukan untuk menyediakan layanan informasi travel. Karena website ini memang dirancang sedemikian rupa, pengguna dapat dengan mudah menemukan berbagai jasa travel sesuai daerah pilihan mereka. Nama travel, jadwal keberangkatan, destinasi, harga, jenis kendaraan, serta kontak yang dapat dihubungi termasuk ke dalam informasi yang disajikan.
        </p>
      </div>

      <div class="w-full md:w-3/5 bg-white p-10 rounded-b-lg md:rounded-r-lg md:rounded-bl-none flex flex-col items-center justify-center">
        
        <img src="http://127.0.0.1:8000/riauport-logo.png" alt="riauport-logo.png" class="w-64 mb-4">
        
        <p class="text-md text-riau-teal text-center font-im-fell">
          Temukan berbagai Travel dalam satu platform RiauPort
        </p>
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

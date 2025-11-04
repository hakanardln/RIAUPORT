<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>RiauPort – Home</title>

    @vite('resources/css/app.css')

    <style>
        :root {
            --brand: #0E586D;
            --brand-dark: #0b4c5d;
            --ink: #0b3a45;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #f3f9fb;
        }

        /* ================= NAVBAR ================= */
        .glass-nav {
            position: relative;
            border-radius: 32px;
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(18px) saturate(180%);
            -webkit-backdrop-filter: blur(18px) saturate(180%);
            border: 1px solid rgba(255, 255, 255, 0.55);
            box-shadow:
                0 12px 24px rgba(0, 0, 0, .18),
                0 4px 8px rgba(0, 0, 0, .10),
                inset 0 1px 1px rgba(255, 255, 255, .85),
                inset 0 -6px 12px rgba(0, 0, 0, .05);
        }

        .nav-link {
            color: var(--ink);
            font-weight: 600;
            font-size: 1.15rem;
            letter-spacing: 0.3px;
            transition: color .2s ease, transform .15s ease;
        }

        .nav-link:hover {
            color: var(--brand);
            transform: translateY(-1px);
        }

        .btn-login {
            background: var(--brand);
            color: #fff;
            font-weight: 700;
            font-size: 1rem;
            padding: .7rem 1.6rem;
            border-radius: 16px;
            box-shadow: 0 8px 0 var(--brand-dark), 0 14px 24px rgba(0, 0, 0, .22);
            transition: transform .15s ease, box-shadow .15s ease;
        }

        .btn-login:hover {
            transform: translateY(2px);
            box-shadow: 0 5px 0 var(--brand-dark), 0 10px 18px rgba(0, 0, 0, .20);
        }

        .logo-img {
            height: 80px;
            width: auto;
            filter: drop-shadow(0 2px 6px rgba(0, 0, 0, 0.25));
        }

        /* ================= HERO ================= */
        .hero-wrap {
            position: relative;
            height: 52vh;
            min-height: 400px;
            overflow: hidden;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
        }

        .hero-bg {
            position: absolute;
            inset: 0;
            background-size: cover;
            background-position: center;
            transition: opacity 1s ease-in-out;
            will-change: opacity, background-image;
        }

        .hero-bg.fade-out {
            opacity: 0;
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg,
                    rgba(255, 255, 255, .2) 0%,
                    rgba(255, 255, 255, 0) 40%,
                    rgba(0, 0, 0, .15) 100%);
        }

        /* ================= SEARCH CARD ================= */
        .search-card {
            position: absolute;
            left: 50%;
            top: 55%;
            transform: translate(-50%, -50%);
            width: min(1000px, 90%);
            border-radius: 25px;
            background: rgba(255, 255, 255, .85);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, .65);
            box-shadow:
                0 22px 36px rgba(0, 0, 0, .18),
                inset 0 1px 0 rgba(255, 255, 255, .9);
            padding: 24px;
            text-align: center;
        }

        .search-heading {
            font-weight: 600;
            font-size: 1.4rem;
            color: var(--ink);
        }

        .search-grid {
            display: grid;
            grid-template-columns: 1fr 1fr auto;
            gap: 12px;
            margin-top: 16px;
        }

        .search-input {
            height: 54px;
            border-radius: 14px;
            border: 1px solid #cfd9dd;
            background: #f3f6f7;
            padding: 0 16px;
            font-weight: 600;
            color: #304b54;
        }

        .btn-search {
            height: 54px;
            width: 54px;
            border-radius: 14px;
            background: var(--brand);
            color: #fff;
            font-weight: 800;
            font-size: 20px;
            box-shadow: 0 8px 0 var(--brand-dark), 0 14px 24px rgba(0, 0, 0, .22);
            transition: transform .1s ease, box-shadow .15s ease;
        }

        .btn-search:hover {
            transform: translateY(1px);
            box-shadow: 0 6px 0 var(--brand-dark), 0 12px 18px rgba(0, 0, 0, .20);
        }

        @media (max-width: 768px) {
            .search-grid {
                grid-template-columns: 1fr;
            }

            .btn-search {
                width: 100%;
            }
        }

        /* ================= SECTION BERIKUTNYA ================= */
        .section {
            background: #ffffff;
            color: #111;
            padding: 80px 0;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
        }

        .title-xl {
            font-family: "IM FELL French Canon", serif;
            font-size: clamp(26px, 4vw, 48px);
            text-align: center;
            font-weight: 600;
            color: #0c2630;
        }
    </style>

    <link href="https://fonts.googleapis.com/css2?family=IM+Fell+French+Canon:wght@400;600&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <header class="container mx-auto px-6 pt-6">
        <div class="glass-nav px-8">
            <div class="flex items-center justify-between py-4">
                <img src="{{ asset('images/riauport-logo.png') }}" alt="RiauPort" class="logo-img">
                <ul class="hidden md:flex gap-10">
                    <li><a href="#" class="nav-link">Home</a></li>
                    <li><a href="#contact" class="nav-link">Contact</a></li>
                    <li><a href="#about" class="nav-link">About Us</a></li>
                    <li><a href="#notif" class="nav-link">Notification</a></li>
                </ul>
                <a href="{{ route('login') }}" class="btn-login">Login</a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero-wrap">
        <div id="heroBg" class="hero-bg"></div>
        <div class="hero-overlay"></div>

        <div class="search-card">
            <div class="search-heading">Hai Kamu, <b>Ingin pergi ke mana?</b></div>
            <div class="search-grid">
                <input type="text" class="search-input" placeholder="Asal">
                <input type="text" class="search-input" placeholder="Tujuan">
                <button class="btn-search">🔍</button>
            </div>
        </div>
    </section>

    <!-- Section berikutnya -->
    <section class="section">
        <h2 class="title-xl">Temukan berbagai Travel dalam satu tempat RiauPort.</h2>
    </section>

    <!-- JS Slideshow -->
    <script>
        (function() {
            const images = [
                "{{ asset('images/Gambar1.png') }}",
                "{{ asset('images/Gambar2.png') }}",
                "{{ asset('images/Gambar3.png') }}",
                "{{ asset('images/Gambar4.png') }}"
            ];

            const hero = document.getElementById('heroBg');
            let index = 0;

            function changeBackground() {
                hero.classList.add('fade-out');
                setTimeout(() => {
                    index = (index + 1) % images.length;
                    hero.style.backgroundImage = `url('${images[index]}')`;
                    hero.classList.remove('fade-out');
                }, 600);
            }

            // Set background awal
            hero.style.backgroundImage = `url('${images[0]}')`;

            // Ganti tiap 6 detik
            setInterval(changeBackground, 6000);
        })();
    </script>
</body>

</html>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang RiauPort</title>

    <!-- FAVICON -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon_io/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon_io/site.webmanifest') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon_io/android-chrome-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('favicon_io/android-chrome-512x512.png') }}">

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- CSS about.css --}}
    <link rel="stylesheet" href="{{ asset('css/about.css') }}?v=19">

    {{-- CSS Force Override untuk Dropdown - TANPA ANIMASI --}}
    <style>
        /* DROPDOWN TANPA ANIMASI */
        #userMenu,
        #userMenuDesktop,
        .user-dropdown {
            display: block !important;
            position: absolute !important;
            right: 0 !important;
            top: 100% !important;
            margin-top: 12px !important;
            width: 160px !important;
            background: #ffffff !important;
            border-radius: 16px !important;
            box-shadow: 0 16px 40px rgba(15, 23, 42, 0.35) !important;
            border: 1px solid #e2e8f0 !important;
            padding: 8px 0 6px !important;
            z-index: 99999 !important;

            /* Hidden state - TANPA TRANSITION */
            opacity: 0 !important;
            visibility: hidden !important;
            pointer-events: none !important;

            /* HAPUS SEMUA TRANSITION DAN TRANSFORM */
            transition: none !important;
            transform: none !important;
        }

        /* Show state - langsung muncul tanpa animasi */
        #userMenu.show,
        #userMenuDesktop.show,
        .user-dropdown.show {
            opacity: 1 !important;
            visibility: visible !important;
            pointer-events: auto !important;
        }

        .avatar-wrapper-about {
            position: relative !important;
            z-index: 10005 !important;
        }

        /* FORCE TEAM POSITION STYLE - BACKUP INLINE CSS */
        .team-modern-position {
            font-size: 0.9375rem !important;
            color: #0E586D !important;
            font-weight: 700 !important;
            text-align: center !important;
            margin: 0 !important;
            padding-top: 0 !important;
            line-height: 1.4 !important;
            display: block !important;
        }

        .team-modern-role {
            font-size: 0.9375rem !important;
            color: #718096 !important;
            font-weight: 400 !important;
            text-align: center !important;
            margin: 0 0 0.5rem 0 !important;
            line-height: 1.3 !important;
        }
    </style>
</head>

<body>

    {{-- ================== INCLUDE NAVBAR ================== --}}
    @include('components.navbar')

    {{-- ================== HERO SECTION ================== --}}
    <section id="about" class="hero-section">
        <div class="hero-content">
            <div class="about-label">TENTANG RIAUPORT</div>
            <h1>Sistem Informasi Layanan Travel berbasis website untuk mempermudah perjalanan Anda</h1>
        </div>
    </section>

    {{-- ================== CONTENT SECTION ================== --}}
    <section class="content-section">
        <div class="content-column">
            <h2>Tentang RiauPort</h2>
            <p><strong>S</strong>istem Informasi Layanan Travel berbasis website berfungsi untuk mempermudah masyarakat
                dalam memperolkan informasi terkait perjalanan travel, khususnya untuk kebutuhan mudik.</p>
            <p>Website ini menyediakan informasi terpusat tentang nama travel, jadwal keberangkatan, destinasi, harga,
                jenis kendaraan, dan kontak yang bisa dihubungi.</p>
        </div>

        <div class="content-column">
            <div class="highlight-box">
                Temukan berbagai Travel dalam satu platform RiauPort
            </div>
        </div>
    </section>

    {{-- ================== SECTION OUR TEAM ================== --}}
    <section class="team-section-modern">
        <div class="team-modern-container">

            {{-- Header --}}
            <div class="team-modern-header">
                <h2 class="team-modern-title">Our Development Team</h2>
                <p class="team-modern-subtitle">Website ini dibangun bersama melalui kolaborasi tim.</p>
            </div>

            {{-- Team Grid --}}
            <div class="team-modern-grid">

                {{-- Card 1: Nurvia --}}
                <article class="team-modern-card">
                    <div class="team-modern-avatar">
                        <img src="{{ asset('images/team/Nurvia.jpg') }}" alt="Nurvia Sulistry">
                    </div>
                    <h3 class="team-modern-name">Nurvia Sulistry</h3>
                    <div class="team-modern-role">Anggota 1</div>
                    <div class="team-modern-position">UI/UX Designer & Documentation Support</div>
                </article>

                {{-- Card 2: Handal --}}
                <article class="team-modern-card">
                    <div class="team-modern-avatar">
                        <img src="{{ asset('images/team/Handal.jpg') }}" alt="Handal Karis Arbi">
                    </div>
                    <h3 class="team-modern-name">Handal Karis Arbi</h3>
                    <div class="team-modern-role">Koordinator</div>
                    <div class="team-modern-position">Founder, Koordinator & Web Developer</div>
                </article>

                {{-- Card 3: Nur Lela --}}
                <article class="team-modern-card">
                    <div class="team-modern-avatar">
                        <img src="{{ asset('images/team/Lela.jpg') }}" alt="Nur Lela Sabila">
                    </div>
                    <h3 class="team-modern-name">Nur Lela Sabila</h3>
                    <div class="team-modern-role">Anggota 2</div>
                    <div class="team-modern-position">Database Developer & User Guide Writer</div>
                </article>

            </div>

            {{-- Additional Info --}}
            <div class="team-modern-info">
                <p>Para pengembang yang tergabung dalam satu tim kolektif membangun website RiauPort melalui kerja sama
                    mulai dari perencanaan, desain, hingga implementasi sistem.</p>
                <p>Kami berupaya menghadirkan platform yang memudahkan pengguna dalam memperoleh informasi seluruh
                    pemilik usaha transportasi travel yang aman dan efisien.</p>
            </div>

        </div>
    </section>

    {{-- ================== FOOTER ================== --}}
    @include('components.footer')

    {{-- ================== JAVASCRIPT ================== --}}
    {{-- Ganti ke versi normal (bukan debug) --}}
    <script src="{{ asset('js/navbar.js') }}?v=18"></script>

</body>

</html>

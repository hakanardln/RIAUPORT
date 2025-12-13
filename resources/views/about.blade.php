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

    <link rel="stylesheet" href="{{ asset('css/about.css') }}?v=12">

    {{-- Inline style HANYA untuk dropdown menu --}}
    <style>
        /* Dropdown menu only */
        #userMenu {
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
            display: none;
        }

        #userMenu:not(.hidden) {
            display: block !important;
        }

        .dropdown-label {
            padding: 4px 14px 2px !important;
            font-size: 11px !important;
            text-transform: uppercase !important;
            color: #94a3b8 !important;
            font-weight: 600 !important;
        }

        .dropdown-item {
            width: 100% !important;
            text-align: left !important;
            padding: 10px 14px !important;
            background: transparent !important;
            font-size: 14px !important;
            cursor: pointer !important;
            border: none !important;
            color: #334155 !important;
            transition: background-color 0.2s ease !important;
        }

        .dropdown-item:hover {
            background-color: #f1f5f9 !important;
        }

        .avatar-wrapper-about {
            position: relative !important;
            z-index: 10005 !important;
        }
    </style>
</head>

<body>

    {{-- ================== NAVBAR ================== --}}
    <header class="site-header">
        <div class="navbar-container">
            <div class="glass-nav">
                <div class="nav-content">
                    {{-- Logo --}}
                    <div class="logo-section">
                        <img src="{{ asset('images/riauport-white.png') }}" alt="RiauPort">
                    </div>

                    {{-- Menu Navigation --}}
                    <nav class="nav-links nav-menu">
                        <div id="navHighlight" class="nav-highlight"></div>
                        <a href="{{ route('home') }}">Home</a>
                        <a href="{{ route('contact') }}">Contact</a>
                        <a href="{{ route('about') }}">About</a>
                    </nav>

                    {{-- LOGIN / PROFILE --}}
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

                        <div class="avatar-wrapper-about">
                            <button id="userMenuButton" class="avatar-btn">
                                {{ $initials }}
                            </button>

                            <div id="userMenu" class="hidden">
                                <div class="dropdown-label">
                                    Akun
                                </div>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <section id="about" class="hero-section">
        <div class="hero-content">
            <div class="about-label">TENTANG RIAUPORT</div>
            <h1>Sistem Informasi Layanan Travel berbasis website untuk mempermudah perjalanan Anda</h1>
        </div>
    </section>

    <section class="content-section">
        <div class="content-column">
            <h2>Tentang RiauPort</h2>
            <p><strong>S</strong>istem Informasi Layanan Travel berbasis website berfungsi untuk mempermudah masyarakat
                dalam memperoleh informasi terkait perjalanan travel, khususnya untuk kebutuhan mudik.</p>
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
                </article>

                {{-- Card 2: Handal --}}
                <article class="team-modern-card">
                    <div class="team-modern-avatar">
                        <img src="{{ asset('images/team/Handal.jpg') }}" alt="Handal Karis Arbi">
                    </div>
                    <h3 class="team-modern-name">Handal Karis Arbi</h3>
                    <div class="team-modern-role">Koordinator</div>
                </article>

                {{-- Card 3: Nur Lela --}}
                <article class="team-modern-card">
                    <div class="team-modern-avatar">
                        <img src="{{ asset('images/team/Lela.jpg') }}" alt="Nur Lela Sabila">
                    </div>
                    <h3 class="team-modern-name">Nur Lela Sabila</h3>
                    <div class="team-modern-role">Anggota 2</div>
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

    @include('components.footer')

    <script src="{{ asset('js/about.js') }}"></script>

    {{-- Script untuk dropdown menu & navbar highlight --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // ================== DROPDOWN AVATAR USER ==================
            const userMenuButton = document.getElementById('userMenuButton');
            const userMenu = document.getElementById('userMenu');

            if (userMenuButton && userMenu) {
                userMenuButton.addEventListener('click', function(e) {
                    e.stopPropagation();
                    userMenu.classList.toggle('hidden');
                });

                // Close dropdown when clicking outside
                document.addEventListener('click', function(e) {
                    if (!userMenu.classList.contains('hidden') &&
                        !userMenuButton.contains(e.target) &&
                        !userMenu.contains(e.target)) {
                        userMenu.classList.add('hidden');
                    }
                });
            }

            // ================== NAVBAR LIQUID HIGHLIGHT ==================
            const nav = document.querySelector('.nav-links.nav-menu');
            const highlight = document.getElementById('navHighlight');

            if (nav && highlight) {
                const links = nav.querySelectorAll('a');

                function moveHighlight(el) {
                    const navRect = nav.getBoundingClientRect();
                    const rect = el.getBoundingClientRect();
                    const paddingX = 14;

                    const width = rect.width + paddingX * 2;
                    const left = rect.left - navRect.left - paddingX;

                    highlight.style.width = `${width}px`;
                    highlight.style.left = `${left}px`;
                    highlight.style.opacity = '1';
                }

                links.forEach(link => {
                    link.addEventListener('mouseenter', () => moveHighlight(link));
                });

                nav.addEventListener('mouseleave', () => {
                    highlight.style.opacity = '0';
                });
            }
        });
    </script>
</body>

</html>

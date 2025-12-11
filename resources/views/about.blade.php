<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang RiauPort</title>

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="{{ asset('css/about.css') }}">

    {{-- Inline style untuk memastikan kartu muncul --}}
    <style>
        /* CRITICAL: Ensure dropdown is visible above everything */
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

        /* Force team section styles */
        .team-section-wrapper {
            background: #f5f7ff !important;
            padding: 4rem 1rem !important;
            width: 100% !important;
        }

        .team-container {
            max-width: 72rem !important;
            margin: 0 auto !important;
            padding: 0 1rem !important;
        }

        .team-header {
            text-align: center !important;
            margin-bottom: 3rem !important;
        }

        .team-title {
            font-size: 2.5rem !important;
            font-weight: 800 !important;
            color: #0f172a !important;
            margin-bottom: 1rem !important;
        }

        .team-description {
            font-size: 1rem !important;
            color: #64748b !important;
            max-width: 48rem !important;
            margin: 0 auto !important;
            line-height: 1.6 !important;
        }

        .team-grid-container {
            display: grid !important;
            grid-template-columns: 1fr !important;
            gap: 2rem !important;
        }

        @media (min-width: 768px) {
            .team-section-wrapper {
                padding: 5rem 1.5rem !important;
            }

            .team-title {
                font-size: 3rem !important;
            }

            .team-description {
                font-size: 1.125rem !important;
            }

            .team-grid-container {
                grid-template-columns: repeat(3, 1fr) !important;
            }
        }

        .team-card-item {
            background: #eef3ff !important;
            border-radius: 32px !important;
            border: 1px solid rgba(148, 163, 184, 0.32) !important;
            box-shadow: 0 22px 45px rgba(15, 23, 42, 0.08) !important;
            padding: 2rem !important;
            display: flex !important;
            flex-direction: column !important;
            justify-content: space-between !important;
            min-height: 300px !important;
            transition: all 0.25s ease !important;
        }

        .team-card-item:hover {
            transform: translateY(-10px) !important;
            box-shadow: 0 30px 60px rgba(15, 23, 42, 0.16) !important;
            border-color: rgba(59, 130, 246, 0.55) !important;
            background: #e5edff !important;
        }

        .team-avatar-wrapper {
            width: 80px !important;
            height: 80px !important;
            border-radius: 50% !important;
            overflow: hidden !important;
            margin-bottom: 1.25rem !important;
        }

        .team-avatar-wrapper img {
            width: 100% !important;
            height: 100% !important;
            object-fit: cover !important;
        }

        .team-member-name {
            font-size: 1.25rem !important;
            font-weight: 600 !important;
            color: #0f172a !important;
            margin-bottom: 0.5rem !important;
        }

        .team-member-role {
            font-size: 0.875rem !important;
            font-weight: 500 !important;
            color: #2563eb !important;
            margin-bottom: 1rem !important;
        }

        .team-social-links {
            display: flex !important;
            gap: 0.5rem !important;
            margin-top: 1.5rem !important;
        }

        .team-social-btn {
            width: 32px !important;
            height: 32px !important;
            border-radius: 10px !important;
            border: 1px solid rgba(148, 163, 184, 0.5) !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            font-size: 0.75rem !important;
            color: #9ca3af !important;
            background: white !important;
            cursor: pointer !important;
            transition: all 0.2s ease !important;
            text-decoration: none !important;
        }

        .team-social-btn:hover {
            background: #2563eb !important;
            color: white !important;
            border-color: #2563eb !important;
            transform: translateY(-2px) !important;
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
    <section class="team-section-wrapper">
        <div class="team-container">

            {{-- Header --}}
            <div class="team-header">
                <h2 class="team-title">Our Team</h2>
                <p class="team-description">
                    A diverse group of passionate students collaborating to build
                    <span style="font-weight: 600; color: #334155;">RiauPort</span>,
                    menghadirkan solusi travel yang modern dan mudah diakses untuk semua.
                </p>
            </div>

            {{-- Team Grid --}}
            <div class="team-grid-container">

                {{-- Card 1: Nurvia --}}
                <article class="team-card-item">
                    <div>
                        <div class="team-avatar-wrapper">
                            <img src="https://ui-avatars.com/api/?name=Nurvia+Sulistry&size=160&background=e8f5e9&color=388e3c"
                                alt="Nurvia Sulistry">
                        </div>
                        <h3 class="team-member-name">Nurvia Sulistry</h3>
                        <div class="team-member-role">Anggota 1</div>
                    </div>

                    <div class="team-social-links">
                        <button class="team-social-btn" type="button">in</button>
                        <a href="https://www.instagram.com/yours_viii/" target="_blank" rel="noopener noreferrer"
                            class="team-social-btn">IG</a>
                        <button class="team-social-btn" type="button">X</button>
                    </div>
                </article>

                {{-- Card 2: Handal --}}
                <article class="team-card-item">
                    <div>
                        <div class="team-avatar-wrapper">
                            <img src="https://ui-avatars.com/api/?name=Handal+Karis+Arbi&size=160&background=e1f5fe&color=0277bd"
                                alt="Handal Karis Arbi">
                        </div>
                        <h3 class="team-member-name">Handal Karis Arbi</h3>
                        <div class="team-member-role">Koordinator</div>
                    </div>

                    <div class="team-social-links">
                        <button class="team-social-btn" type="button">in</button>
                        <a href="https://www.instagram.com/lkrsarbi/" target="_blank" rel="noopener noreferrer"
                            class="team-social-btn">IG</a>
                        <button class="team-social-btn" type="button">X</button>
                    </div>
                </article>

                {{-- Card 3: Nur Lela --}}
                <article class="team-card-item">
                    <div>
                        <div class="team-avatar-wrapper">
                            <img src="https://ui-avatars.com/api/?name=Nur+Lela+Sabila&size=160&background=fce4ec&color=c2185b"
                                alt="Nur Lela Sabila">
                        </div>
                        <h3 class="team-member-name">Nur Lela Sabila</h3>
                        <div class="team-member-role">Anggota 2</div>
                    </div>

                    <div class="team-social-links">
                        <button class="team-social-btn" type="button">in</button>
                        <a href="https://www.instagram.com/nurlelasbila31/" target="_blank" rel="noopener noreferrer"
                            class="team-social-btn">IG</a>
                        <button class="team-social-btn" type="button">X</button>
                    </div>
                </article>

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

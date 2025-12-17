<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - RiauPort</title>

    <!-- FAVICON -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon_io/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon_io/site.webmanifest') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon_io/android-chrome-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('favicon_io/android-chrome-512x512.png') }}">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- CSS khusus halaman Contact -->
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
</head>

<body>
    {{-- NAVBAR --}}
    <header class="site-header">
        <div class="nav-container">
            <div class="glass-nav">
                {{-- Logo --}}
                <div class="logo-container">
                    <img src="{{ asset('images/riauport-logo.png') }}" alt="RiauPort">
                </div>

                {{-- Menu Navigation --}}
                <nav id="mainNav"
                    class="nav-links flex items-center gap-8 text-slate-800 font-semibold text-lg relative z-[10000]">
                    <div id="navHighlight" class="nav-highlight"></div>
                    <a href="https://ours.web.id/" target="_blank"
                        class="hover:text-[#0e586d] transition-colors">Portal</a>
                    <a href="{{ route('home') }}" class="hover:text-[#0e586d] transition-colors">Home</a>
                    <a href="{{ route('contact') }}" class="hover:text-[#0e586d] transition-colors">Contact</a>
                    <a href="{{ route('about') }}" class="hover:text-[#0e586d] transition-colors">About</a>
                </nav>

                {{-- LOGIN / PROFILE --}}
                @guest
                    <a href="{{ route('login') }}" class="glass-btn-login">Login</a>
                @endguest

                @auth
                    @php
                        $user = auth()->user();
                        $initials = collect(explode(' ', $user->name))
                            ->map(fn($p) => strtoupper(mb_substr($p, 0, 1)))
                            ->join('');
                    @endphp

                    <div class="relative" style="z-index: 9999;">
                        <button id="userMenuButton" type="button"
                            class="w-12 h-12 rounded-full flex items-center justify-center
                                   bg-white/20 backdrop-blur-xl border border-white/40
                                   shadow-lg text-white font-semibold uppercase
                                   hover:scale-110 active:scale-95 transition-all duration-200">
                            {{ $initials }}
                        </button>

                        {{-- Dropdown --}}
                        <div id="userMenu"
                            class="hidden w-44 bg-white rounded-2xl shadow-xl
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

    {{-- FORM CONTENT --}}
    <div class="container">
        <div class="header">
            <h1>Hubungi RiauPort</h1>
            <h2>Kami siap membantu perjalananmu</h2>
            <p>
                Punya pertanyaan tentang RiauPort, ingin mendaftarkan layanan travel,
                atau butuh bantuan sebagai penumpang? Kirim pesanmu melalui formulir di bawah.
                Tim RiauPort akan menghubungi kamu secepat mungkin.
            </p>
        </div>

        @if (session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="margin-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('contact.store') }}" method="POST">
            @csrf

            <div class="form-row">
                <div class="form-group">
                    <input type="text" name="first_name" class="form-control" placeholder="First name"
                        value="{{ old('first_name') }}" required>
                    @error('first_name')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="text" name="last_name" class="form-control" placeholder="Last name"
                        value="{{ old('last_name') }}" required>
                    @error('last_name')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email address"
                        value="{{ old('email') }}" required>
                    @error('email')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="tel" name="phone" class="form-control" placeholder="Phone"
                        value="{{ old('phone') }}">
                    @error('phone')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <textarea name="message" class="form-control" placeholder="Message" required>{{ old('message') }}</textarea>
                @error('message')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="submit-btn">Submit Now</button>
        </form>
    </div>

    {{-- FOOTER --}}
    <footer class="footer">
        <div class="footer-inner">
            <div class="footer-grid">

                <!-- Brand -->
                <div class="footer-brand">
                    <img src="{{ asset('images/riauport-logo.png') }}" alt="RiauPort">
                    <p>
                        Platform terpadu untuk menemukan layanan travel terbaik di Riau.
                        Menghubungkan penumpang dengan sopir travel terpercaya.
                    </p>

                    <div class="footer-social">
                        <a href="#">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                            </svg>
                        </a>
                        <a href="#">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z" />
                            </svg>
                        </a>
                        <a href="#">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M7.8 2h8.4A4.8 4.8 0 0121 6.8v8.4A4.8 4.8 0 0116.2 20H7.8A4.8 4.8 0 013 15.2V6.8A4.8 4.8 0 017.8 2zm0 2A2.8 2.8 0 005 6.8v8.4A2.8 2.8 0 007.8 18h8.4a2.8 2.8 0 002.8-2.8V6.8A2.8 2.8 0 0016.2 4H7.8zm4.2 2.5a4.5 4.5 0 11-.001 9.001A4.5 4.5 0 0112 6.5zm4.75-2.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Navigasi -->
                <div>
                    <h3 class="footer-title">Navigasi</h3>
                    <ul class="footer-list">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('about') }}">Tentang Kami</a></li>
                        <li><a href="#">Fitur</a></li>
                        <li><a href="{{ route('contact') }}">Kontak</a></li>
                    </ul>
                </div>

                <!-- Layanan -->
                <div>
                    <h3 class="footer-title">Layanan</h3>
                    <ul class="footer-list">
                        <li><a href="#">Cari Travel</a></li>
                        <li><a href="{{ route('register.sopir.show') }}">Daftar Sopir</a></li>
                        <li><a href="#">Rute Populer</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>

                <!-- Hubungi Kami -->
                <div>
                    <h3 class="footer-title">Hubungi Kami</h3>
                    <ul class="footer-list">
                        <li>
                            <span>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                Riau, Indonesia
                            </span>
                        </li>
                        <li>
                            <span>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                riauport.info@gmail.com
                            </span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <p>© 2025 RiauPort. All rights reserved.</p>
                <div class="footer-links">
                    <a href="#">Syarat & Ketentuan</a>
                    <a href="#">Kebijakan Privasi</a>
                </div>
            </div>
        </div>
    </footer>

    {{-- JAVASCRIPT --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // ===== USER MENU DROPDOWN =====
            const btn = document.getElementById('userMenuButton');
            const menu = document.getElementById('userMenu');

            if (btn && menu) {
                // Pindahkan dropdown ke body agar tidak ter-clip
                document.body.appendChild(menu);

                function placeMenu() {
                    const rect = btn.getBoundingClientRect();
                    const gap = 12;
                    const menuWidth = menu.offsetWidth || 176;

                    menu.style.position = 'fixed';
                    menu.style.top = (rect.bottom + gap) + 'px';
                    menu.style.left = Math.max(12, rect.right - menuWidth) + 'px';
                    menu.style.zIndex = '999999';
                }

                function openMenu() {
                    menu.classList.remove('hidden');
                    placeMenu();
                }

                function closeMenu() {
                    menu.classList.add('hidden');
                }

                btn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    menu.classList.contains('hidden') ? openMenu() : closeMenu();
                });

                document.addEventListener('click', closeMenu);

                window.addEventListener('resize', function() {
                    if (!menu.classList.contains('hidden')) placeMenu();
                });

                window.addEventListener('scroll', function() {
                    if (!menu.classList.contains('hidden')) placeMenu();
                }, true);
            }

            // ===== NAV HIGHLIGHT ANIMATION =====
            const navLinks = document.querySelector('.nav-links');
            const highlight = document.querySelector('.nav-highlight');
            const links = document.querySelectorAll('.nav-links a');

            if (navLinks && highlight && links.length) {
                links.forEach(link => {
                    link.addEventListener('mouseenter', function() {
                        const rect = this.getBoundingClientRect();
                        const navRect = navLinks.getBoundingClientRect();

                        // Tambahkan padding ekstra untuk highlight (12px kiri + 12px kanan = 24px total)
                        const paddingExtra = 24;

                        highlight.style.opacity = '1';
                        highlight.style.left = (rect.left - navRect.left - 12) + 'px';
                        highlight.style.width = (rect.width + paddingExtra) + 'px';
                    });
                });

                navLinks.addEventListener('mouseleave', function() {
                    highlight.style.opacity = '0';
                });
            }
        });
    </script>

</body>

</html>

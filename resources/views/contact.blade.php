<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - RiauPort</title>

    {{-- CSS khusus halaman Contact --}}
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
                <nav class="nav-menu">
                    <a href="{{ route('home') }}">Home</a>
                    <a href="{{ route('contact') }}">Contact</a>
                    <a href="{{ route('about') }}">About</a>
                </nav>

                {{-- Tombol Login --}}
                <a href="{{ route('login') }}" class="glass-btn-login">
                    Login
                </a>
            </div>
        </div>
    </header>

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

    <!-- ===== FOOTER ===== -->
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
                            <!-- X / Twitter icon -->
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                            </svg>
                        </a>
                        <a href="#">
                            <!-- Facebook -->
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z" />
                            </svg>
                        </a>
                        <a href="#">
                            <!-- Instagram -->
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
                                info@riauport.com
                            </span>
                        </li>
                        <li>
                            <span>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                +62 823-1141-2523
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

    {{-- Script untuk navbar liquid highlight --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // ================== NAVBAR LIQUID HIGHLIGHT ==================
            const nav = document.querySelector('.nav-menu');

            // Buat element highlight jika belum ada
            let highlight = document.getElementById('navHighlight');
            if (!highlight && nav) {
                highlight = document.createElement('div');
                highlight.id = 'navHighlight';
                highlight.style.cssText = `
                    position: absolute;
                    top: 50%;
                    left: 0;
                    transform: translateY(-50%);
                    height: 34px;
                    border-radius: 999px;
                    background: rgba(96, 165, 250, 0.16);
                    box-shadow: 0 0 0 1px rgba(129, 140, 248, 0.2), 0 14px 30px rgba(15, 23, 42, 0.18);
                    pointer-events: none;
                    opacity: 0;
                    transition: left 0.28s cubic-bezier(0.22, 0.61, 0.36, 1),
                                width 0.28s cubic-bezier(0.22, 0.61, 0.36, 1),
                                opacity 0.18s ease-out;
                    z-index: 0;
                `;
                nav.style.position = 'relative';
                nav.insertBefore(highlight, nav.firstChild);
            }

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
                    link.style.position = 'relative';
                    link.style.zIndex = '1';
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

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - RiauPort</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: white;
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }

        /* ===== Navbar Glass ===== */
        .site-header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            width: 100%;
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1.5rem 1rem;
        }

        .glass-nav {
            position: relative;
            overflow: hidden;
            border-radius: 24px;
            background: radial-gradient(circle at 0% 0%, rgba(255, 255, 255, 0.35), rgba(255, 255, 255, 0.08)),
                linear-gradient(135deg, rgba(255, 255, 255, 0.25), rgba(255, 255, 255, 0.05));
            box-shadow:
                0 18px 45px rgba(0, 0, 0, 0.25),
                0 8px 20px rgba(0, 0, 0, 0.15),
                0 0 0 1px rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(18px) saturate(180%);
            -webkit-backdrop-filter: blur(18px) saturate(180%);
            border: 1px solid rgba(255, 255, 255, 0.4);
            padding: 0.75rem 1.75rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .glass-nav::before {
            content: "";
            position: absolute;
            inset: -40%;
            background:
                radial-gradient(circle at 10% 20%, rgba(255, 255, 255, 0.55) 0, transparent 55%),
                radial-gradient(circle at 80% 0%, rgba(126, 220, 255, 0.38) 0, transparent 60%),
                radial-gradient(circle at 20% 90%, rgba(14, 88, 109, 0.22) 0, transparent 60%);
            opacity: 0.9;
            mix-blend-mode: screen;
            animation: liquidMove 14s infinite alternate ease-in-out;
            pointer-events: none;
        }

        @keyframes liquidMove {
            0% {
                transform: translate3d(-8%, -4%, 0) scale(1);
            }

            50% {
                transform: translate3d(6%, 4%, 0) scale(1.05);
            }

            100% {
                transform: translate3d(-4%, 2%, 0) scale(1.02);
            }
        }

        .logo-container {
            display: flex;
            align-items: center;
            position: relative;
            z-index: 10;
        }

        .logo-container img {
            height: 5rem;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 2rem;
            font-weight: 600;
            font-size: 1.125rem;
            position: relative;
            z-index: 10;
        }

        .nav-menu a {
            color: #1e293b;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .nav-menu a:hover {
            color: #0e586d;
        }

        .nav-menu a.active {
            color: #0e586d;
        }

        .glass-btn-login {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.55rem 2.4rem;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1rem;
            color: #ffffff;
            background: radial-gradient(circle at 0% 0%, #42c0dd, #0e586d);
            box-shadow:
                0 10px 25px rgba(14, 88, 109, 0.4),
                0 0 0 1px rgba(255, 255, 255, 0.35);
            border: 1px solid rgba(5, 34, 49, 0.7);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease,
                background 0.2s ease,
                filter 0.2s ease;
            text-decoration: none;
            position: relative;
            z-index: 10;
        }

        .glass-btn-login:hover {
            transform: translateY(-1px) scale(1.02);
            box-shadow:
                0 16px 35px rgba(14, 88, 109, 0.55),
                0 0 0 1px rgba(255, 255, 255, 0.5);
            filter: brightness(1.05);
        }

        .glass-btn-login:active {
            transform: translateY(1px) scale(0.99);
            box-shadow:
                0 6px 18px rgba(14, 88, 109, 0.45),
                0 0 0 1px rgba(255, 255, 255, 0.4);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            padding: 140px 150px 80px;
            min-height: 100vh;
            border-radius: 0;
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
        }

        .header h1 {
            color: #0d9488;
            font-size: 2.5em;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .header h2 {
            color: #0d9488;
            font-size: 2em;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .header p {
            color: #666;
            font-size: 1.05em;
            line-height: 1.6;
            max-width: 700px;
            margin: 0 auto;
        }

        .alert {
            padding: 15px 20px;
            margin-bottom: 25px;
            border-radius: 5px;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
        }

        .alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 0;
        }

        .form-group label {
            display: block;
            color: #333;
            font-weight: 500;
            margin-bottom: 8px;
            font-size: 0.95em;
        }

        .form-control {
            width: 100%;
            padding: 14px 16px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 1em;
            transition: all 0.3s ease;
            font-family: inherit;
        }

        .form-control:focus {
            outline: none;
            border-color: #0d9488;
            box-shadow: 0 0 0 3px rgba(13, 148, 136, 0.1);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 180px;
        }

        .error-message {
            color: #dc3545;
            font-size: 0.875em;
            margin-top: 5px;
        }

        .submit-btn {
            display: block;
            width: 200px;
            margin: 30px auto 0;
            padding: 15px 30px;
            background-color: #0d9488;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 1.05em;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #0a7a6f;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(13, 148, 136, 0.3);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        /* ===== FOOTER (versi putih seperti gambar) ===== */
        .footer {
            background-color: #ffffff;
            border-top: 1px solid #e5e7eb;
        }

        .footer-inner {
            max-width: 1200px;
            margin: 0 auto;
            padding: 64px 24px 32px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1.4fr;
            gap: 48px;
            align-items: flex-start;
        }

        .footer-brand img {
            height: 56px;
            margin-bottom: 16px;
        }

        .footer-brand p {
            color: #4b5563;
            font-size: 14px;
            line-height: 1.8;
            max-width: 320px;
        }

        .footer-social {
            margin-top: 24px;
            display: flex;
            gap: 16px;
        }

        .footer-social a {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background-color: #f3f4f6;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6b7280;
            transition: background-color 0.2s ease, color 0.2s ease, transform 0.2s ease;
        }

        .footer-social a:hover {
            background-color: #e0f2fe;
            color: #0e586d;
            transform: translateY(-2px);
        }

        .footer-social svg {
            width: 18px;
            height: 18px;
        }

        .footer-title {
            font-size: 15px;
            font-weight: 600;
            margin-bottom: 16px;
            color: #0f172a;
        }

        .footer-list {
            list-style: none;
        }

        .footer-list li {
            margin-bottom: 10px;
        }

        .footer-list a,
        .footer-list span {
            font-size: 14px;
            color: #4b5563;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: color 0.2s ease;
        }

        .footer-list a:hover {
            color: #0e586d;
        }

        .footer-list svg {
            width: 18px;
            height: 18px;
        }

        .footer-bottom {
            border-top: 1px solid #e5e7eb;
            margin-top: 40px;
            padding-top: 16px;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            font-size: 13px;
            color: #4b5563;
        }

        .footer-links {
            display: flex;
            gap: 18px;
        }

        .footer-links a {
            color: #4b5563;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .footer-links a:hover {
            color: #0e586d;
        }

        @media (max-width: 1024px) {
            .container {
                padding: 140px 40px 60px;
            }

            .footer-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 768px) {
            .glass-nav {
                flex-direction: column;
                gap: 1rem;
                padding: 1rem;
            }

            .nav-menu {
                flex-direction: column;
                gap: 1rem;
                font-size: 1rem;
            }

            .logo-container img {
                height: 4rem;
            }

            .container {
                padding: 140px 20px 40px;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .header h1 {
                font-size: 2em;
            }

            .header h2 {
                font-size: 1.6em;
            }

            .header p {
                font-size: 1em;
            }

            .footer-grid {
                grid-template-columns: 1fr;
                gap: 32px;
            }

            .footer-bottom {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
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
                    <a href="{{ route('home') }}" class="hover:text-[#0e586d] transition-colors">Home</a>
                    <a href="{{ route('contact') }}" class="hover:text-[#0e586d] transition-colors">Contact</a>
                    <a href="{{ route('about') }}" class="hover:text-[#0e586d] transition-colors">About</a>
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
</body>

</html>

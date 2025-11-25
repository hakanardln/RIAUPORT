<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang RiauPort - Platform Travel Terpadu Riau</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            line-height: 1.6;
            color: #333;
            background: #f8fafc;
        }

        /* ===== NAVBAR GLASS ===== */
        .site-header {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
        }

        .glass-nav {
            position: relative;
            overflow: hidden;
            border-radius: 24px;
            background: radial-gradient(circle at 0% 0%, rgba(255, 255, 255, 0.35), rgba(255, 255, 255, 0.08)),
                linear-gradient(135deg, rgba(255, 255, 255, 0.25), rgba(255, 255, 255, 0.05));
            box-shadow: 0 18px 45px rgba(0, 0, 0, 0.18), 0 0 0 1px rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(18px) saturate(180%);
            -webkit-backdrop-filter: blur(18px) saturate(180%);
            border: 1px solid rgba(255, 255, 255, 0.4);
        }

        .glass-nav::before {
            content: "";
            position: absolute;
            inset: -40%;
            background:
                radial-gradient(circle at 10% 20%, rgba(255, 255, 255, 0.55) 0, transparent 55%),
                radial-gradient(circle at 80% 0%, rgba(66, 192, 221, 0.38) 0, transparent 60%),
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

        .navbar-container {
            max-width: 1152px;
            margin: 0 auto;
            padding: 1.5rem 1rem;
        }

        .nav-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.75rem 1.75rem;
        }

        .logo-section img {
            height: 80px;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 2.2rem;
        }

        .nav-menu a {
            color: #1e293b;
            font-weight: 600;
            font-size: 1.125rem;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .nav-menu a:hover {
            color: #0e586d;
        }

        .glass-btn-login {
            padding: 0.65rem 2.4rem;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1rem;
            color: #fff;
            background: linear-gradient(135deg, #42c0dd, #0e586d);
            box-shadow: 0 10px 25px rgba(14, 88, 109, 0.4), 0 0 0 1px rgba(255, 255, 255, 0.35);
            border: 1px solid rgba(5, 34, 49, 0.7);
            backdrop-filter: blur(14px);
            transition: all 0.3s ease;
        }

        .glass-btn-login:hover {
            transform: translateY(-3px) scale(1.03);
            box-shadow: 0 16px 35px rgba(14, 88, 109, 0.55);
        }

        /* ===== HERO SECTION - TINGGI PERSIS SEPERTI AWALMU (500px) ===== */
        .hero-section {
            position: relative;
            height: 500px;
            background: url('images/riauport-logoabout.png') center center / cover no-repeat;
            background-color: #0f172a;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            padding-top: 120px;
        }

        /* Overlay agar teks tetap jelas */
        .hero-section::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, rgba(15, 23, 42, 0.9), rgba(15, 23, 42, 0.7));
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .about-label {
            font-size: 13px;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: 25px;
            font-weight: 700;
        }

        .hero-content h1 {
            font-size: 44px;
            font-weight: 600;
            line-height: 1.4;
            max-width: 900px;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.4);
        }

        /* ===== CONTENT & FOOTER (tetap sama, sudah cantik & responsive) ===== */
        .content-section {
            max-width: 1200px;
            margin: 80px auto;
            padding: 0 40px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
            align-items: center;
        }

        .content-column h2 {
            font-size: 32px;
            font-weight: 600;
            margin-bottom: 30px;
            color: #2d3748;
        }

        .content-column p {
            margin-bottom: 20px;
            font-size: 15px;
            line-height: 1.8;
            color: #4a5568;
        }

        .highlight-box {
            background: linear-gradient(135deg, #f0f9ff, #e0f2fe);
            padding: 80px 40px;
            border-radius: 20px;
            text-align: center;
            font-size: 20px;
            font-weight: 500;
            color: #2d3748;
            box-shadow: 0 10px 30px rgba(14, 88, 109, 0.08);
        }

        /* Footer sama seperti versi sebelumnya yang sudah saya perbaiki */
        footer {
            background: #0f172a;
            color: #cbd5e1;
            margin-top: 100px;
        }

        .footer-container {
            padding: 80px 20px 40px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2.5fr 1fr 1fr 1.5fr;
            gap: 50px;
            margin-bottom: 50px;
        }

        .footer-brand img {
            height: 70px;
            margin-bottom: 20px;
        }

        .footer-brand p {
            font-size: 15px;
            line-height: 1.8;
            opacity: 0.9;
        }

        .social-links {
            margin-top: 24px;
            display: flex;
            gap: 14px;
        }

        .social-links a {
            width: 44px;
            height: 44px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
        }

        .social-links a:hover {
            background: #42c0dd;
            transform: translateY(-4px);
        }

        .social-links svg {
            width: 22px;
            height: 22px;
            fill: currentColor;
        }

        .footer-section h3 {
            font-size: 18px;
            margin-bottom: 24px;
            color: white;
            font-weight: 600;
        }

        .footer-section ul li {
            margin-bottom: 14px;
        }

        .footer-section ul li a,
        .footer-section ul li span {
            color: #cbd5e1;
            text-decoration: none;
            font-size: 15px;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: color 0.3s;
        }

        .footer-section ul li a:hover {
            color: #42c0dd;
        }

        .footer-section svg {
            width: 20px;
            height: 20px;
            stroke: currentColor;
        }

        .footer-bottom {
            border-top: 1px solid #334155;
            padding: 24px 0;
            text-align: center;
            font-size: 14px;
        }

        .footer-bottom-inner {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 16px;
        }

        .footer-links a {
            color: #94a3b8;
            text-decoration: none;
            margin: 0 10px;
        }

        .footer-links a:hover {
            color: #42c0dd;
        }

        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 32px;
            }

            .content-section {
                grid-template-columns: 1fr;
                gap: 40px;
                padding: 0 20px;
                margin: 40px auto;
            }

            .highlight-box {
                padding: 60px 30px;
            }

            .footer-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 640px) {
            .nav-menu {
                gap: 1.5rem;
            }

            .nav-menu a {
                font-size: 1rem;
            }

            .footer-grid {
                grid-template-columns: 1fr;
            }

            .footer-bottom-inner {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <header class="site-header">
        <div class="navbar-container">
            <div class="glass-nav nav-content">
                <div class="logo-section">
                    <img src="images/riauport-white.png" alt="RiauPort">
                </div>
                <nav class="nav-menu">
                    <a href="{{ route('home') }}" class="hover:text-[#0e586d] transition-colors">Home</a>
                    <a href="{{ route('contact') }}" class="hover:text-[#0e586d] transition-colors">Contact</a>
                    <a href="{{ route('about') }}" class="hover:text-[#0e586d] transition-colors">About</a>
                </nav>
                <a href="login.html" class="glass-btn-login">Login</a>
            </div>
        </div>
    </header>

    <!-- HERO (tinggi 500px seperti aslinya) -->
    <section id="about" class="hero-section">
        <div class="hero-content">
            <div class="about-label">TENTANG RIAUPORT</div>
            <h1>Sistem Informasi Layanan Travel berbasis website untuk mempermudah perjalanan Anda</h1>
        </div>
    </section>

    <!-- CONTENT -->
    <section class="content-section">
        <div class="content-column">
            <h2 style="font-size: 32px; font-weight: 600; margin-bottom: 30px; color: #2d3748;">Tentang RiauPort</h2>
            <p><strong>S</strong>istem Informasi Layanan Travel berbasis website berfungsi untuk mempermudah masyarakat
                dalam memperoleh informasi terkait perjalanan travel, khususnya untuk kebutuhan mudik.</p>
            <p>sistem berbasis website yang terpusat diperlukan untuk menyediakan layanan informasi travel. Karena
                website ini memang dirancang sedemikian rupa, pengguna dapat dengan mudah menemukan berbagai jasa travel
                sesuai daerah pilihan mereka. Nama travel, jadwal keberangkatan, destinasi, harga, jenis kendaraan,
                serta kontak yang dapat dihubungi termasuk ke dalam informasi yang disajikan.</p>
        </div>
        <div class="content-column">
            <div class="highlight-box">
                Temukan berbagai Travel dalam satu platform RiauPort
            </div>
        </div>
    </section>

    <!-- FOOTER (sudah full styled & responsive) -->
    <!-- GANTI SELURUH <footer> ... </footer> DENGAN INI -->
    <footer style="margin-top: 120px; padding-top: 80px; border-top: 1px solid #e2e8f0; background: #ffffff;">
        <div style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
            <div style="display: grid; grid-template-columns: 2.5fr 1fr 1fr 1.5fr; gap: 60px; margin-bottom: 60px;">

                <!-- Kolom 1: Logo + Deskripsi + Sosial -->
                <div>
                    <img src="images/riauport-logo.png" alt="RiauPort" style="height: 60px; margin-bottom: 20px;">
                    <p style="color: #64748b; font-size: 15px; line-height: 1.7; margin-bottom: 24px;">
                        Platform terpadu untuk menemukan layanan travel terbaik di Riau.
                        Menghubungkan penumpang dengan sopir travel terpercaya.
                    </p>
                    <div style="display: flex; gap: 12px;">
                        <a href="#"
                            style="width: 40px; height: 40px; background: #f1f5f9; border-radius: 12px; display: flex; align-items: center; justify-content: center; transition: all 0.3s;">
                            <svg width="20" height="20" fill="#64748b" viewBox="0 0 24 24">
                                <path
                                    d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z" />
                            </svg>
                        </a>
                        <a href="#"
                            style="width: 40px; height: 40px; background: #f1f5f9; border-radius: 12px; display: flex; align-items: center; justify-content: center; transition: all 0.3s;">
                            <svg width="20" height="20" fill="#64748b" viewBox="0 0 24 24">
                                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z" />
                            </svg>
                        </a>
                        <a href="#"
                            style="width: 40px; height: 40px; background: #f1f5f9; border-radius: 12px; display: flex; align-items: center; justify-content: center; transition: all 0.3s;">
                            <svg width="20" height="20" fill="#64748b" viewBox="0 0 24 24">
                                <path
                                    d="M7.8 2h8.4A4.8 4.8 0 0121 6.8v8.4A4.8 4.8 0 0116.2 20H7.8A4.8 4.8 0 013 15.2V6.8A4.8 4.8 0 017.8 2zm0 2A2.8 2.8 0 005 6.8v8.4A2.8 2.8 0 007.8 18h8.4a2.8 2.8 0 002.8-2.8V6.8A2.8 2.8 0 0016.2 4H7.8zm4.2 2.5a4.5 4.5 0 11-.001 9.001A4.5 4.5 0 0112 6.5zm4.75-2.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Kolom 2: Navigasi -->
                <div>
                    <h3 style="font-size: 16px; font-weight: 600; color: #1e293b; margin-bottom: 20px;">Navigasi</h3>
                    <ul style="list-style: none; padding: 0;">
                        <li style="margin-bottom: 12px;"><a href="#"
                                style="color: #64748b; text-decoration: none; font-size: 15px;">Home</a></li>
                        <li style="margin-bottom: 12px;"><a href="#"
                                style="color: #64748b; text-decoration: none; font-size: 15px;">Tentang Kami</a></li>
                        <li style="margin-bottom: 12px;"><a href="#"
                                style="color: #64748b; text-decoration: none; font-size: 15px;">Fitur</a></li>
                        <li style="margin-bottom: 12px;"><a href="#"
                                style="color: #64748b; text-decoration: none; font-size: 15px;">Kontak</a></li>
                    </ul>
                </div>

                <!-- Kolom 3: Layanan -->
                <div>
                    <h3 style="font-size: 16px; font-weight: 600; color: #1e293b; margin-bottom: 20px;">Layanan</h3>
                    <ul style="list-style: none; padding: 0;">
                        <li style="margin-bottom: 12px;"><a href="#"
                                style="color: #64748b; text-decoration: none; font-size: 15px;">Cari Travel</a></li>
                        <li style="margin-bottom: 12px;"><a href="#"
                                style="color: #64748b; text-decoration: none; font-size: 15px;">Daftar Sopir</a></li>
                        <li style="margin-bottom: 12px;"><a href="#"
                                style="color: #64748b; text-decoration: none; font-size: 15px;">Rute Populer</a></li>
                        <li style="margin-bottom: 12px;"><a href="#"
                                style="color: #64748b; text-decoration: none; font-size: 15px;">FAQ</a></li>
                    </ul>
                </div>

                <!-- Kolom 4: Hubungi Kami -->
                <div>
                    <h3 style="font-size: 16px; font-weight: 600; color: #1e293b; margin-bottom: 20px;">Hubungi Kami
                    </h3>
                    <ul style="list-style: none; padding: 0;">
                        <li style="margin-bottom: 16px; display: flex; align-items: center; gap: 12px;">
                            <svg width="18" height="18" fill="none" stroke="#64748b" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span style="color: #64748b; font-size: 15px;">Riau, Indonesia</span>
                        </li>
                        <li style="margin-bottom: 16px; display: flex; align-items: center; gap: 12px;">
                            <svg width="18" height="18" fill="none" stroke="#64748b" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span style="color: #64748b; font-size: 15px;">info@riauport.com</span>
                        </li>
                        <li style="display: flex; align-items: center; gap: 12px;">
                            <svg width="18" height="18" fill="none" stroke="#64748b" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <span style="color: #64748b; font-size: 15px;">+62 823-1141-2523</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Garis pemisah & Copyright -->
            <div
                style="border-top: 1px solid #e2e8f0; padding: 24px 0; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 16px; font-size: 14px; color: #64748b;">
                <p>© 2025 RiauPort. All rights reserved.</p>
                <div>
                    <a href="#" style="color: #64748b; text-decoration: none; margin: 0 12px;">Syarat &
                        Ketentuan</a>
                    <span>·</span>
                    <a href="#" style="color: #64748b; text-decoration: none; margin: 0 12px;">Kebijakan
                        Privasi</a>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>

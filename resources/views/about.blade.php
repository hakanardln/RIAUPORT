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
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">

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
            <p>Sistem Informasi Layanan Travel berbasis website berfungsi untuk mempermudah masyarakat
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

                    <div class="team-modern-content">
                        <h3 class="team-modern-name">Nurvia Sulistry</h3>
                        <p class="team-modern-role">Anggota 1</p>

                        <div class="team-modern-position">
                            UI/UX Designer & Documentation Support
                        </div>

                        <div class="team-social-links">
                            <a href="https://www.instagram.com/yours_viii?igsh=MWo3bHJ1OTNzY2t0cQ==" target="_blank"
                                rel="noopener noreferrer" class="team-social-btn facebook">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                </svg>
                            </a>
                            <button type="button" class="team-social-btn twitter">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path
                                        d="M512 97.248c-19.04 8.352-39.328 13.888-60.48 16.576 21.76-12.992 38.368-33.408 46.176-58.016-20.288 12.096-42.688 20.64-66.56 25.408C411.872 60.704 384.416 48 354.464 48c-58.112 0-104.896 47.168-104.896 104.992 0 8.32.704 16.32 2.432 23.936-87.264-4.256-164.48-46.08-216.352-109.792-9.056 15.712-14.368 33.696-14.368 53.056 0 36.352 18.72 68.576 46.624 87.232-16.864-.32-33.408-5.216-47.424-12.928v1.152c0 51.008 36.384 93.376 84.096 103.136-8.544 2.336-17.856 3.456-27.52 3.456-6.72 0-13.504-.384-19.872-1.792 13.6 41.568 52.192 72.128 98.08 73.12-35.712 27.936-81.056 44.768-130.144 44.768-8.608 0-16.864-.384-25.12-1.44C46.496 446.88 101.6 464 161.024 464c193.152 0 298.752-160 298.752-298.688 0-4.64-.16-9.12-.384-13.568 20.832-14.784 38.336-33.248 52.608-54.496z" />
                                </svg>
                            </button>
                            <button type="button" class="team-social-btn linkedin">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path
                                        d="M23.994 24v-.001H24v-8.802c0-4.306-.927-7.623-5.961-7.623-2.42 0-4.044 1.328-4.707 2.587h-.07V7.976H8.489v16.023h4.97v-7.934c0-2.089.396-4.109 2.983-4.109 2.549 0 2.587 2.384 2.587 4.243V24zM.396 7.977h4.976V24H.396zM2.882 0C1.291 0 0 1.291 0 2.882s1.291 2.909 2.882 2.909 2.882-1.318 2.882-2.909A2.884 2.884 0 0 0 2.882 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </article>

                {{-- Card 2: Handal --}}
                <article class="team-modern-card">
                    <div class="team-modern-avatar">
                        <img src="{{ asset('images/team/Handal.jpg') }}" alt="Handal Karis Arbi">
                    </div>

                    <div class="team-modern-content">
                        <h3 class="team-modern-name">Handal Karis Arbi</h3>
                        <p class="team-modern-role">Koordinator</p>

                        <div class="team-modern-position">
                            Founder, Koordinator & Web Developer
                        </div>

                        <div class="team-social-links">
                            <a href="https://www.instagram.com/lkrsarbi?igsh=bGs1czVseWUzNzRp&utm_source=qr"
                                target="_blank" rel="noopener noreferrer" class="team-social-btn facebook">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                </svg>
                            </a>
                            <button type="button" class="team-social-btn twitter">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path
                                        d="M512 97.248c-19.04 8.352-39.328 13.888-60.48 16.576 21.76-12.992 38.368-33.408 46.176-58.016-20.288 12.096-42.688 20.64-66.56 25.408C411.872 60.704 384.416 48 354.464 48c-58.112 0-104.896 47.168-104.896 104.992 0 8.32.704 16.32 2.432 23.936-87.264-4.256-164.48-46.08-216.352-109.792-9.056 15.712-14.368 33.696-14.368 53.056 0 36.352 18.72 68.576 46.624 87.232-16.864-.32-33.408-5.216-47.424-12.928v1.152c0 51.008 36.384 93.376 84.096 103.136-8.544 2.336-17.856 3.456-27.52 3.456-6.72 0-13.504-.384-19.872-1.792 13.6 41.568 52.192 72.128 98.08 73.12-35.712 27.936-81.056 44.768-130.144 44.768-8.608 0-16.864-.384-25.12-1.44C46.496 446.88 101.6 464 161.024 464c193.152 0 298.752-160 298.752-298.688 0-4.64-.16-9.12-.384-13.568 20.832-14.784 38.336-33.248 52.608-54.496z" />
                                </svg>
                            </button>
                            <button type="button" class="team-social-btn linkedin">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path
                                        d="M23.994 24v-.001H24v-8.802c0-4.306-.927-7.623-5.961-7.623-2.42 0-4.044 1.328-4.707 2.587h-.07V7.976H8.489v16.023h4.97v-7.934c0-2.089.396-4.109 2.983-4.109 2.549 0 2.587 2.384 2.587 4.243V24zM.396 7.977h4.976V24H.396zM2.882 0C1.291 0 0 1.291 0 2.882s1.291 2.909 2.882 2.909 2.882-1.318 2.882-2.909A2.884 2.884 0 0 0 2.882 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </article>

                {{-- Card 3: Nur Lela --}}
                <article class="team-modern-card">
                    <div class="team-modern-avatar">
                        <img src="{{ asset('images/team/Lela.jpg') }}" alt="Nur Lela Sabila">
                    </div>

                    <div class="team-modern-content">
                        <h3 class="team-modern-name">Nur Lela Sabila</h3>
                        <p class="team-modern-role">Anggota 2</p>

                        <div class="team-modern-position">
                            Database & User Guide Writer
                        </div>

                        <div class="team-social-links">
                            <a href="https://www.instagram.com/nurlelasbila31?igsh=aTZkbmVicmFkb3hu" target="_blank"
                                rel="noopener noreferrer" class="team-social-btn facebook">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                </svg>
                            </a>
                            <button type="button" class="team-social-btn twitter">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path
                                        d="M512 97.248c-19.04 8.352-39.328 13.888-60.48 16.576 21.76-12.992 38.368-33.408 46.176-58.016-20.288 12.096-42.688 20.64-66.56 25.408C411.872 60.704 384.416 48 354.464 48c-58.112 0-104.896 47.168-104.896 104.992 0 8.32.704 16.32 2.432 23.936-87.264-4.256-164.48-46.08-216.352-109.792-9.056 15.712-14.368 33.696-14.368 53.056 0 36.352 18.72 68.576 46.624 87.232-16.864-.32-33.408-5.216-47.424-12.928v1.152c0 51.008 36.384 93.376 84.096 103.136-8.544 2.336-17.856 3.456-27.52 3.456-6.72 0-13.504-.384-19.872-1.792 13.6 41.568 52.192 72.128 98.08 73.12-35.712 27.936-81.056 44.768-130.144 44.768-8.608 0-16.864-.384-25.12-1.44C46.496 446.88 101.6 464 161.024 464c193.152 0 298.752-160 298.752-298.688 0-4.64-.16-9.12-.384-13.568 20.832-14.784 38.336-33.248 52.608-54.496z" />
                                </svg>
                            </button>
                            <button type="button" class="team-social-btn linkedin">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path
                                        d="M23.994 24v-.001H24v-8.802c0-4.306-.927-7.623-5.961-7.623-2.42 0-4.044 1.328-4.707 2.587h-.07V7.976H8.489v16.023h4.97v-7.934c0-2.089.396-4.109 2.983-4.109 2.549 0 2.587 2.384 2.587 4.243V24zM.396 7.977h4.976V24H.396zM2.882 0C1.291 0 0 1.291 0 2.882s1.291 2.909 2.882 2.909 2.882-1.318 2.882-2.909A2.884 2.884 0 0 0 2.882 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>
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
    <script src="{{ asset('js/navbar.js') }}"></script>
    <script src="{{ asset('js/about.js') }}"</script>

</body>

</html>

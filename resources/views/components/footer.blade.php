<footer>
    <div class="footer-container">
        <div class="footer-grid">

            {{-- Kolom 1: Brand + deskripsi + sosmed --}}
            <div class="footer-brand">
                <img src="{{ asset('images/riauport-logo.png') }}" alt="RiauPort">

                <p>
                    Platform terpadu untuk menemukan layanan travel terbaik di Riau.
                    Menghubungkan penumpang dengan sopir travel terpercaya.
                </p>

                <div class="social-links">
                    {{-- Twitter --}}
                    <a href="#" aria-label="Twitter">
                        <svg viewBox="0 0 24 24">
                            <path
                                d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z" />
                        </svg>
                    </a>

                    {{-- Facebook --}}
                    <a href="#" aria-label="Facebook">
                        <svg viewBox="0 0 24 24">
                            <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z" />
                        </svg>
                    </a>

                    {{-- Instagram --}}
                    <a href="#" aria-label="Instagram">
                        <svg viewBox="0 0 24 24">
                            <path
                                d="M7.8 2h8.4A4.8 4.8 0 0121 6.8v8.4A4.8 4.8 0 0116.2 20H7.8A4.8 4.8 0 013 15.2V6.8A4.8 4.8 0 017.8 2zm0 2A2.8 2.8 0 005 6.8v8.4A2.8 2.8 0 007.8 18h8.4a2.8 2.8 0 002.8-2.8V6.8A2.8 2.8 0 0016.2 4H7.8zm4.2 2.5a4.5 4.5 0 11-.001 9.001A4.5 4.5 0 0112 6.5zm4.75-2.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                        </svg>
                    </a>
                </div>
            </div>

            {{-- Kolom 2: Navigasi --}}
            <div class="footer-section">
                <h3>Navigasi</h3>
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('about') }}">Tentang Kami</a></li>
                    <li><a href="#fitur">Fitur</a></li>
                    <li><a href="{{ route('contact') }}">Kontak</a></li>
                </ul>
            </div>

            {{-- Kolom 3: Layanan --}}
            <div class="footer-section">
                <h3>Layanan</h3>
                <ul>
                    <li><a href="{{ route('travel.search') }}">Cari Travel</a></li>
                    <li><a href="#">Daftar Sopir</a></li>
                    <li><a href="#">Rute Populer</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>
            </div>

            {{-- Kolom 4: Hubungi Kami --}}
            <div class="footer-section">
                <h3>Hubungi Kami</h3>
                <ul>
                    <li><span>📍 Riau, Indonesia</span></li>
                    <li><span>✉ info@riauport.com</span></li>
                    <li><span>☎ +62 823-1141-2523</span></li>
                </ul>
            </div>

        </div>

        <div class="footer-bottom">
            <p>© 2025 RiauPort. All rights reserved.</p>
            <div class="footer-links">
                <a href="#">Syarat & Ketentuan</a>
                <span>·</span>
                <a href="#">Kebijakan Privasi</a>
            </div>
        </div>
    </div>
</footer>

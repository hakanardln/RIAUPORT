<!DOCTYPE html>
<html lang="id" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syarat & Ketentuan • RiauPort</title>

    <!-- FAVICON -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon_io/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon_io/site.webmanifest') }}">

    <script src="https://cdn.tailwindcss.com"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=IM+Fell+French+Canon:ital@0;1&family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --primary: #0E586D;
            --primary-dark: #0B4C5D;
            --accent: #00D4FF;
        }
        body {
            font-family: 'Inter', sans-serif;
            background:
                linear-gradient(135deg, rgba(14, 88, 109, 0.5) 0%, rgba(0, 212, 255, 0.4) 100%),
                url('{{ asset('images/login-bg.jpg') }}') center/cover no-repeat fixed;
            min-height: 100vh;
        }

        .fell {
            font-family: 'IM FELL French Canon', serif;
        }

        /* Styling ringan untuk konten panjang */
        .content h2 {
            font-size: 1.125rem;
            font-weight: 700;
            color: #0f172a;
            margin-top: 1.25rem;
            margin-bottom: .5rem;
        }

        .content p,
        .content li {
            font-size: .95rem;
            color: #475569;
            line-height: 1.75;
        }

        .content ul {
            margin-left: 1.25rem;
            list-style: disc;
        }

        .content .divider {
            border-top: 1px solid #e5e7eb;
            margin: 1rem 0;
        }
    </style>
</head>

<body class="min-h-screen">

    <!-- “Modal” tampil sebagai halaman (tanpa tombol open & tanpa input) -->
    <div id="modal"
        class="fixed inset-0 p-4 flex flex-wrap justify-center items-center w-full h-full z-[1000]
               before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] overflow-auto">

        <div class="w-full max-w-4xl bg-white shadow-lg rounded-lg p-8 relative">

            <img src="{{ asset('images/riauport-logo.png') }}" alt="RiauPort Watermark"
                class="absolute inset-0 m-auto
           w-[900px]
           opacity-[0.06]
           pointer-events-none select-none" />

            <!-- Tombol close (arahkannya ke halaman sebelumnya / home) -->
            <a href="{{ url()->previous() }}" aria-label="Tutup"
                class="absolute right-6 top-6 w-9 h-9 grid place-items-center rounded-full hover:bg-gray-100 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 shrink-0 fill-gray-400 hover:fill-red-500"
                    viewBox="0 0 320.591 320.591">
                    <path
                        d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643 10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0 1-21.256 7.288z">
                    </path>
                    <path
                        d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0 1-23.078 7.288z">
                    </path>
                </svg>
            </a>

            <div class="relative z-10"></div>

            <!-- Header -->
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-slate-900 fell">Syarat dan Ketentuan RiauPort</h1>
                <p class="text-sm text-slate-500 mt-2">
                    Terakhir diperbarui: <span class="font-medium">{{ now()->format('d M Y') }}</span>
                </p>
            </div>

            <div class="divider"></div>

            <!-- Konten -->
            <div class="content">
                <p>
                    Dokumen Syarat dan Ketentuan ini mengatur ketentuan penggunaan website <b>RiauPort</b> sebagai
                    platform layanan informasi travel. Dengan mengakses, menggunakan, dan/atau mendaftar pada website
                    RiauPort, pengguna dianggap telah membaca, memahami, dan menyetujui seluruh ketentuan yang tercantum
                    dalam dokumen ini.
                </p>

                <h2>1. Identitas Pengelola</h2>
                <p>RiauPort dikelola oleh <b>Tim RiauPort</b>, yang terdiri dari:</p>
                <ul>
                    <li><b>Handal Karis Arbi</b> – Koordinator</li>
                    <li><b>Nurvia Sulistry</b> – Anggota</li>
                    <li><b>Nur Lela Sabila</b> – Anggota</li>
                </ul>
                <p>Tim RiauPort bertindak sebagai pengelola dan penyedia platform website RiauPort.</p>

                <h2>2. Definisi</h2>
                <ul>
                    <li><b>Website</b> adalah platform RiauPort yang dapat diakses melalui internet.</li>
                    <li><b>Pengelola</b> adalah Tim RiauPort.</li>
                    <li><b>Pengguna</b> adalah pihak yang mengakses dan/atau menggunakan layanan RiauPort.</li>
                    <li><b>Sopir</b> adalah pihak yang mendaftarkan informasi layanan travel pada RiauPort.</li>
                    <li><b>Layanan</b> adalah seluruh fitur dan informasi yang tersedia di website RiauPort.</li>
                </ul>

                <h2>3. Ruang Lingkup Layanan</h2>
                <p>
                    RiauPort merupakan <b>platform informasi layanan travel</b> yang menyediakan informasi mengenai
                    jadwal, rute, fasilitas, ulasan, dan kontak pemilik travel di wilayah Provinsi Riau.
                </p>
                <p>
                    RiauPort <b>tidak menyediakan layanan pemesanan dan pembayaran secara langsung</b>.
                    Setiap proses pemesanan dilakukan di luar platform melalui aplikasi pihak ketiga, seperti WhatsApp,
                    setelah pengguna diarahkan dari website.
                </p>

                <h2>4. Akses dan Akun Pengguna</h2>
                <p>
                    Pengguna dapat mengakses informasi umum seperti jadwal, gambar, fasilitas, dan ulasan tanpa harus
                    membuat akun.
                </p>
                <p>
                    Namun, untuk melakukan pemesanan dan memperoleh kontak sopir, pengguna diwajibkan memiliki akun
                    dengan peran (role)
                    <b>Pengguna</b>.
                </p>
                <p>Jenis akun yang tersedia di RiauPort meliputi:</p>
                <ul>
                    <li><b>Admin</b>: Pengelola website.</li>
                    <li><b>Sopir</b>: Pihak yang mendaftarkan dan mengelola data travel.</li>
                    <li><b>Pengguna</b>: Pihak yang menggunakan layanan informasi dan melakukan pemesanan.</li>
                </ul>

                <h2>5. Pendaftaran dan Keamanan Akun</h2>
                <p>Pada proses pendaftaran akun, pengguna diwajibkan memberikan data yang benar dan akurat, meliputi:
                </p>
                <ul>
                    <li>Nama lengkap</li>
                    <li>Alamat email</li>
                    <li>Kata sandi (password)</li>
                </ul>
                <p>
                    RiauPort menerapkan sistem <b>verifikasi OTP melalui email</b> serta menyediakan opsi pendaftaran
                    cepat
                    menggunakan akun Google.
                </p>
                <p>
                    Pengguna bertanggung jawab penuh atas keamanan akun dan kerahasiaan informasi login yang digunakan.
                </p>

                <h2>6. Hak dan Kewajiban Pengguna</h2>
                <p>Pengguna berhak menggunakan layanan RiauPort sesuai dengan fungsinya.</p>
                <p>Pengguna berkewajiban untuk:</p>
                <ul>
                    <li>Menggunakan website sesuai dengan hukum yang berlaku.</li>
                    <li>Tidak menyalahgunakan sistem, fitur, maupun konten yang tersedia.</li>
                    <li>Memberikan data yang benar saat pendaftaran akun.</li>
                </ul>

                <h2>7. Hak dan Kewajiban Sopir</h2>
                <p>
                    Sopir bertanggung jawab atas <b>keaslian, kebenaran, dan keakuratan data</b> travel yang didaftarkan
                    pada website RiauPort.
                </p>
                <p>
                    Segala informasi yang ditampilkan merupakan tanggung jawab sopir atau penyedia travel masing-masing.
                </p>

                <h2>8. Pembatasan Tanggung Jawab</h2>
                <p>RiauPort berperan sebagai <b>penyedia platform informasi</b> dan tidak bertanggung jawab atas:</p>
                <ul>
                    <li>Proses pemesanan yang dilakukan di luar platform.</li>
                    <li>Keterlambatan, pembatalan, atau perubahan perjalanan.</li>
                    <li>Kerugian, kecelakaan, atau permasalahan yang terjadi selama perjalanan.</li>
                </ul>
                <p>
                    Segala bentuk transaksi dan kesepakatan sepenuhnya menjadi tanggung jawab antara pengguna dan
                    sopir/penyedia travel.
                </p>

                <h2>9. Hak Kekayaan Intelektual</h2>
                <p>
                    Seluruh konten, desain, logo, dan sistem yang terdapat pada website RiauPort merupakan milik Tim
                    RiauPort
                    dan dilindungi oleh hukum yang berlaku.
                </p>
                <p>
                    Pengguna dilarang menyalin, mendistribusikan, atau menggunakan konten tanpa izin tertulis dari
                    pengelola.
                </p>

                <h2>10. Perubahan Layanan dan Ketentuan</h2>
                <p>
                    Pengelola berhak untuk mengubah, menambah, atau menghapus fitur layanan serta isi Syarat dan
                    Ketentuan ini sewaktu-waktu.
                </p>
                <p>Perubahan akan berlaku sejak ditampilkan pada website RiauPort.</p>

                <h2>11. Hukum yang Berlaku</h2>
                <p>Syarat dan Ketentuan ini diatur dan ditafsirkan berdasarkan <b>Hukum Republik Indonesia</b>.</p>

                <h2>12. Penutup</h2>
                <p>
                    Dengan menggunakan website RiauPort, pengguna menyatakan telah memahami dan menyetujui seluruh isi
                    Syarat dan Ketentuan ini.
                </p>
                <p>
                    Apabila terdapat pertanyaan terkait dokumen ini, pengguna dapat menghubungi pengelola melalui
                    informasi kontak yang tersedia di website RiauPort.
                </p>
            </div>

            <div class="divider"></div>

            <!-- Footer kecil -->
            <div class="flex flex-col sm:flex-row gap-3 sm:items-center sm:justify-between">
                <a href="{{ url('/') }}" class="text-sm font-medium text-[var(--primary)] hover:underline">
                    ← Kembali ke Beranda
                </a>
                <span class="text-xs text-slate-400">
                    © {{ date('Y') }} RiauPort • Semua hak dilindungi
                </span>
            </div>

        </div>
    </div>

</body>

</html>

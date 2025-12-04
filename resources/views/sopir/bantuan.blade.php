<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pusat Bantuan – Sopir RiauPort</title>

    {{-- FAVICON (optional, samakan dengan dashboard kalau mau) --}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon_io/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon_io/site.webmanifest') }}">

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "SF Pro Text", sans-serif;
        }

        .shadow-soft {
            box-shadow: 0 12px 24px rgba(0, 0, 0, .16);
        }

        .shadow-pill {
            box-shadow: 0 8px 16px rgba(0, 0, 0, .18);
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                max-height: 0;
            }

            to {
                opacity: 1;
                max-height: 500px;
            }
        }

        @keyframes slideUp {
            from {
                opacity: 1;
                max-height: 500px;
            }

            to {
                opacity: 0;
                max-height: 0;
            }
        }

        .accordion-content {
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .accordion-content.open {
            animation: slideDown 0.3s ease forwards;
        }

        .rotate-180 {
            transform: rotate(180deg);
        }

        .chat-message {
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body class="h-screen overflow-hidden bg-white text-slate-800">
    <div class="h-full flex">

        {{-- SIDEBAR (copy dari dashboard sopir) --}}
        <aside
            class="w-[250px] h-full bg-gradient-to-b from-[#75d0f0] via-[#37a6cc] to-[#0a6687] flex flex-col items-center py-6">

            {{-- LOGO --}}
            <div class="mb-6">
                <img src="{{ asset('images/riauport-logo.png') }}" alt="RiauPort Logo"
                    class="h-16 object-contain mx-auto">
            </div>

            @php
                $baseLink = 'flex items-center gap-3 w-full rounded-lg px-4 py-2.5 shadow-pill text-sm';
                $baseIcon = 'h-7 w-7 rounded-md grid place-items-center';
            @endphp

            {{-- MENU --}}
            <nav class="space-y-3 w-full px-5 flex-1">

                {{-- Dashboard --}}
                <a href="{{ route('sopir.dashboard') }}"
                    class="{{ $baseLink }} {{ request()->routeIs('sopir.dashboard') ? 'bg-[#0b5f80] text-white' : 'bg-white text-[#0b5f80] hover:bg-white/90 transition' }}">
                    <div
                        class="{{ $baseIcon }} {{ request()->routeIs('sopir.dashboard') ? 'bg-[#0b5f80] text-white' : 'bg-[#e7f5fb] text-[#0b5f80]' }}">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <path d="m3 11 9-8 9 8"></path>
                            <path d="M9 22V12h6v10"></path>
                        </svg>
                    </div>
                    <span class="font-semibold">Dashboard</span>
                </a>

                {{-- Travel --}}
                <a href="{{ route('sopir.travel') }}"
                    class="{{ $baseLink }} {{ request()->routeIs('sopir.travel') ? 'bg-[#0b5f80] text-white' : 'bg-white text-[#0b5f80] hover:bg-white/90 transition' }}">
                    <div
                        class="{{ $baseIcon }} {{ request()->routeIs('sopir.travel') ? 'bg-[#0b5f80] text-white' : 'bg-[#e7f5fb] text-[#0b5f80]' }}">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <path d="M3 7h18l-1.5 9a2 2 0 0 1-2 1.7H6.5a2 2 0 0 1-2-1.7L3 7Z"></path>
                            <path d="M6 7V5a3 3 0 0 1 3-3h6a3 3 0 0 1 3 3v2"></path>
                        </svg>
                    </div>
                    <span class="font-semibold">Travel</span>
                </a>

                {{-- Jadwal --}}
                <a href="{{ route('sopir.jadwal') }}"
                    class="{{ $baseLink }} bg-white text-[#0b5f80] hover:bg-white/90 transition">
                    <div class="{{ $baseIcon }} bg-[#e7f5fb] text-[#0b5f80]">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <rect x="3" y="4" width="18" height="18" rx="2"></rect>
                            <path d="M16 2v4M8 2v4M3 10h18"></path>
                        </svg>
                    </div>
                    <span class="font-semibold">Jadwal</span>
                </a>

                {{-- Profil --}}
                <a href="{{ route('sopir.profil') }}"
                    class="{{ $baseLink }} bg-white text-[#0b5f80] hover:bg-white/90 transition">
                    <div class="{{ $baseIcon }} bg-[#e7f5fb] text-[#0b5f80]">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <circle cx="12" cy="7" r="3"></circle>
                            <path d="M4 21a8 8 0 0 1 16 0"></path>
                        </svg>
                    </div>
                    <span class="font-semibold">Profil</span>
                </a>

                {{-- Notifikasi --}}
                <a href="{{ route('sopir.notifikasi') }}"
                    class="{{ $baseLink }} bg-white text-[#0b5f80] hover:bg-white/90 transition">
                    <div class="{{ $baseIcon }} bg-[#e7f5fb] text-[#0b5f80]">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <path d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"></path>
                            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                        </svg>
                    </div>
                    <span class="font-semibold">Notifikasi</span>
                </a>

                {{-- Personalisasi --}}
                <a href="{{ route('sopir.personal') }}"
                    class="{{ $baseLink }} bg-white text-[#0b5f80] hover:bg-white/90 transition">
                    <div class="{{ $baseIcon }} bg-[#e7f5fb] text-[#0b5f80]">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <path d="M12 3v4"></path>
                            <path d="M12 17v4"></path>
                            <path d="M5 12h4"></path>
                            <path d="M15 12h4"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </div>
                    <span class="font-semibold">Personalisasi</span>
                </a>

                {{-- Bantuan (HALAMAN INI) --}}
                <a href="{{ route('sopir.bantuan') }}"
                    class="{{ $baseLink }} {{ request()->routeIs('sopir.bantuan') ? 'bg-[#0b5f80] text-white' : 'bg-white text-[#0b5f80] hover:bg-white/90 transition' }}">
                    <div
                        class="{{ $baseIcon }} {{ request()->routeIs('sopir.bantuan') ? 'bg-[#0b5f80] text-white' : 'bg-[#e7f5fb] text-[#0b5f80]' }}">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 2-3 4"></path>
                            <line x1="12" y1="17" x2="12.01" y2="17"></line>
                        </svg>
                    </div>
                    <span class="font-semibold">Bantuan</span>
                </a>
            </nav>

            {{-- TOMBOL KELUAR --}}
            <div class="w-full px-5 pt-3">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="{{ $baseLink }} bg-white text-[#0b5f80]">
                        <div class="{{ $baseIcon }} bg-[#e7f5fb] text-[#0b5f80]">
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.8">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                <path d="M16 17l5-5-5-5"></path>
                                <path d="M21 12H9"></path>
                            </svg>
                        </div>
                        <span class="font-semibold">Keluar</span>
                    </button>
                </form>
            </div>
        </aside>

        {{-- MAIN CONTENT --}}
        <main class="flex-1 h-full flex flex-col bg-[#f5fafc]">

            {{-- HEADER ATAS --}}
            <header
                class="flex items-center justify-between px-10 pt-6 pb-4 bg-white/80 backdrop-blur border-b border-slate-200/70">
                <div>
                    <h1 class="text-3xl font-semibold tracking-tight text-[#0c607f] flex items-center gap-2">
                        <span>Pusat Bantuan Sopir</span>
                    </h1>
                    <p class="text-sm text-slate-500 mt-1">
                        Cari jawaban cepat atau hubungi admin jika membutuhkan bantuan langsung.
                    </p>
                </div>

                <div class="hidden md:flex items-center gap-3">
                    <div class="text-right">
                        <p class="text-xs text-slate-500">Status Support</p>
                        <p class="text-sm font-semibold text-emerald-600 flex items-center gap-1">
                            <span class="inline-block h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span>
                            Online
                        </p>
                    </div>
                </div>
            </header>

            {{-- KONTEN UTAMA --}}
            <section class="flex-1 overflow-y-auto px-6 md:px-10 pb-8">
                <div class="max-w-5xl mx-auto pt-6 space-y-6">

                    {{-- KOTAK INFO CEPAT --}}
                    <div
                        class="bg-gradient-to-r from-[#e0f7ff] via-[#f3fbff] to-white border border-[#c8eaf8] rounded-2xl px-5 py-4 flex flex-col md:flex-row md:items-center md:justify-between gap-3 shadow-soft/30">
                        <div class="flex items-start gap-3">
                            <div
                                class="mt-1 h-9 w-9 rounded-full bg-white shadow-soft grid place-items-center text-[#0c607f]">
                                💡
                            </div>
                            <div>
                                <p class="font-semibold text-[#0c607f] text-sm md:text-base">
                                    Butuh bantuan cepat di tengah perjalanan?
                                </p>
                                <p class="text-xs md:text-sm text-slate-600 mt-1">
                                    Cek FAQ terlebih dahulu. Jika masih bingung, gunakan chat di samping atau hotline
                                    darurat.
                                </p>
                            </div>
                        </div>
                        <div class="flex md:flex-col gap-2 text-xs md:text-sm text-slate-600">
                            <div
                                class="px-3 py-1.5 rounded-full bg-white/80 border border-[#d0ecfb] flex items-center gap-2">
                                <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                                Support: <span class="font-semibold text-emerald-700">09.00 – 22.00 WIB</span>
                            </div>
                            <div class="px-3 py-1.5 rounded-full bg-[#0c607f] text-white flex items-center gap-2">
                                <span class="text-xs">📞</span>
                                Hotline: <span class="font-semibold">0812-3456-7890</span>
                            </div>
                        </div>
                    </div>

                    {{-- Pencarian + Grid FAQ & Chat --}}
                    <div class="mt-4">
                        {{-- Search Box --}}
                        <div class="mb-5">
                            <div class="relative">
                                <input type="text" id="searchInput"
                                    placeholder="Cari 'pembayaran', 'riwayat pengiriman', atau kata kunci lain..."
                                    class="w-full px-4 py-3 pl-11 rounded-xl border border-slate-200 bg-white shadow-soft/20
                                           focus:ring-2 focus:ring-[#0c607f] focus:border-transparent outline-none text-sm">
                                <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-5 h-5 text-slate-400"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                        </div>

                        <div class="grid lg:grid-cols-[minmax(0,2fr)_minmax(0,1fr)] gap-6 md:gap-8">
                            {{-- FAQ Section --}}
                            <div class="md:col-span-1">
                                <div class="bg-white rounded-2xl shadow-soft p-6 mb-6 border border-slate-100">
                                    <h2 class="text-2xl font-bold text-gray-800 mb-1 flex items-center gap-2">
                                        <span
                                            class="h-9 w-9 rounded-full bg-[#e0f7ff] text-[#0c607f] grid place-items-center text-lg">?</span>
                                        Pertanyaan Umum (FAQ)
                                    </h2>
                                    <p class="text-xs md:text-sm text-slate-500 mb-5">
                                        Klik pertanyaan untuk melihat jawabannya. Semua panduan ini dibuat khusus untuk
                                        sopir RiauPort.
                                    </p>

                                    {{-- FAQ Items --}}
                                    <div id="faqContainer" class="space-y-3">
                                        {{-- FAQ 1 --}}
                                        <div
                                            class="faq-item border border-gray-200 rounded-xl hover:shadow-soft transition bg-white">
                                            <button
                                                class="faq-question w-full text-left px-5 py-4 flex justify-between items-center hover:bg-slate-50 rounded-xl transition">
                                                <span class="font-semibold text-gray-800 pr-4 text-sm md:text-base">
                                                    Bagaimana cara memulai perjalanan pengiriman?
                                                </span>
                                                <svg class="faq-icon w-5 h-5 text-[#0c607f] transition-transform duration-300"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                </svg>
                                            </button>
                                            <div class="faq-answer accordion-content">
                                                <div
                                                    class="px-5 py-4 text-gray-600 bg-slate-50 border-t border-gray-200 text-sm leading-relaxed">
                                                    <ol class="list-decimal list-inside space-y-2">
                                                        <li>Buka menu <span class="font-semibold">"Perjalanan
                                                                Aktif"</span> di dashboard.</li>
                                                        <li>Pilih pesanan yang sudah ditetapkan untuk Anda.</li>
                                                        <li>Tekan tombol <span class="font-semibold">"Mulai
                                                                Perjalanan"</span>.</li>
                                                        <li>Pastikan GPS aktif untuk tracking real-time.</li>
                                                        <li>Ikuti rute yang disarankan aplikasi.</li>
                                                    </ol>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- FAQ 2 --}}
                                        <div
                                            class="faq-item border border-gray-200 rounded-xl hover:shadow-soft transition bg-white">
                                            <button
                                                class="faq-question w-full text-left px-5 py-4 flex justify-between items-center hover:bg-slate-50 rounded-xl transition">
                                                <span class="font-semibold text-gray-800 pr-4 text-sm md:text-base">
                                                    Bagaimana cara mengonfirmasi pengiriman selesai?
                                                </span>
                                                <svg class="faq-icon w-5 h-5 text-[#0c607f] transition-transform duration-300"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                </svg>
                                            </button>
                                            <div class="faq-answer accordion-content">
                                                <div
                                                    class="px-5 py-4 text-gray-600 bg-slate-50 border-t border-gray-200 text-sm leading-relaxed">
                                                    <p class="mb-3">Setelah sampai di tujuan:</p>
                                                    <ol class="list-decimal list-inside space-y-2">
                                                        <li>Ambil foto bukti pengiriman (barang dan lokasi).</li>
                                                        <li>Minta tanda tangan penerima di aplikasi.</li>
                                                        <li>Tekan tombol <span class="font-semibold">"Selesaikan
                                                                Pengiriman"</span>.</li>
                                                        <li>Upload foto dan konfirmasi.</li>
                                                        <li>Status otomatis berubah menjadi <span
                                                                class="font-semibold">"Selesai"</span>.</li>
                                                    </ol>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- FAQ 3 --}}
                                        <div
                                            class="faq-item border border-gray-200 rounded-xl hover:shadow-soft transition bg-white">
                                            <button
                                                class="faq-question w-full text-left px-5 py-4 flex justify-between items-center hover:bg-slate-50 rounded-xl transition">
                                                <span class="font-semibold text-gray-800 pr-4 text-sm md:text-base">
                                                    Bagaimana sistem pembayaran untuk sopir?
                                                </span>
                                                <svg class="faq-icon w-5 h-5 text-[#0c607f] transition-transform duration-300"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                </svg>
                                            </button>
                                            <div class="faq-answer accordion-content">
                                                <div
                                                    class="px-5 py-4 text-gray-600 bg-slate-50 border-t border-gray-200 text-sm leading-relaxed">
                                                    <p class="mb-3">Pembayaran dilakukan setiap minggu:</p>
                                                    <ul class="list-disc list-inside space-y-2">
                                                        <li>Pendapatan dihitung dari setiap pengiriman selesai.</li>
                                                        <li>Transfer dilakukan setiap hari Jumat.</li>
                                                        <li>Cek riwayat pembayaran di menu <span
                                                                class="font-semibold">"Keuangan"</span>.</li>
                                                        <li>Bonus diberikan untuk performa terbaik.</li>
                                                        <li>Laporan detail tersedia untuk diunduh.</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- FAQ 4 --}}
                                        <div
                                            class="faq-item border border-gray-200 rounded-xl hover:shadow-soft transition bg-white">
                                            <button
                                                class="faq-question w-full text-left px-5 py-4 flex justify-between items-center hover:bg-slate-50 rounded-xl transition">
                                                <span class="font-semibold text-gray-800 pr-4 text-sm md:text-base">
                                                    Apa yang harus dilakukan jika terjadi kendala di jalan?
                                                </span>
                                                <svg class="faq-icon w-5 h-5 text-[#0c607f] transition-transform duration-300"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                </svg>
                                            </button>
                                            <div class="faq-answer accordion-content">
                                                <div
                                                    class="px-5 py-4 text-gray-600 bg-slate-50 border-t border-gray-200 text-sm leading-relaxed">
                                                    <p class="mb-3"><strong>Segera laporkan kendala:</strong></p>
                                                    <ol class="list-decimal list-inside space-y-2">
                                                        <li>Buka menu <span class="font-semibold">"Laporkan
                                                                Masalah"</span> di aplikasi.</li>
                                                        <li>Pilih jenis kendala (kecelakaan, macet, rusak, dll).</li>
                                                        <li>Ambil foto sebagai bukti.</li>
                                                        <li>Tim support akan segera menghubungi Anda.</li>
                                                        <li>Untuk darurat, hubungi hotline: <span
                                                                class="font-semibold">0812-3456-7890</span>.</li>
                                                    </ol>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- FAQ 5 --}}
                                        <div
                                            class="faq-item border border-gray-200 rounded-xl hover:shadow-soft transition bg-white">
                                            <button
                                                class="faq-question w-full text-left px-5 py-4 flex justify-between items-center hover:bg-slate-50 rounded-xl transition">
                                                <span class="font-semibold text-gray-800 pr-4 text-sm md:text-base">
                                                    Bagaimana cara memperbarui profil dan dokumen?
                                                </span>
                                                <svg class="faq-icon w-5 h-5 text-[#0c607f] transition-transform duration-300"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                </svg>
                                            </button>
                                            <div class="faq-answer accordion-content">
                                                <div
                                                    class="px-5 py-4 text-gray-600 bg-slate-50 border-t border-gray-200 text-sm leading-relaxed">
                                                    <p class="mb-3">Pastikan dokumen Anda selalu valid:</p>
                                                    <ul class="list-disc list-inside space-y-2">
                                                        <li>Masuk ke menu <span class="font-semibold">"Profil
                                                                Saya"</span>.</li>
                                                        <li>Pilih <span class="font-semibold">"Edit Profil"</span> atau
                                                            <span class="font-semibold">"Dokumen"</span>.</li>
                                                        <li>Upload dokumen baru (SIM, KTP, STNK).</li>
                                                        <li>Tunggu verifikasi admin (maks 24 jam).</li>
                                                        <li>Notifikasi akan dikirim setelah disetujui.</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- FAQ 6 --}}
                                        <div
                                            class="faq-item border border-gray-200 rounded-xl hover:shadow-soft transition bg-white">
                                            <button
                                                class="faq-question w-full text-left px-5 py-4 flex justify-between items-center hover:bg-slate-50 rounded-xl transition">
                                                <span class="font-semibold text-gray-800 pr-4 text-sm md:text-base">
                                                    Bagaimana cara melihat riwayat pengiriman?
                                                </span>
                                                <svg class="faq-icon w-5 h-5 text-[#0c607f] transition-transform duration-300"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                </svg>
                                            </button>
                                            <div class="faq-answer accordion-content">
                                                <div
                                                    class="px-5 py-4 text-gray-600 bg-slate-50 border-t border-gray-200 text-sm leading-relaxed">
                                                    <p class="mb-3">Akses lengkap riwayat pengiriman Anda:</p>
                                                    <ul class="list-disc list-inside space-y-2">
                                                        <li>Klik menu <span class="font-semibold">"Riwayat"</span> di
                                                            sidebar.</li>
                                                        <li>Filter berdasarkan tanggal, status, atau lokasi.</li>
                                                        <li>Lihat detail setiap pengiriman.</li>
                                                        <li>Download laporan bulanan dalam format PDF.</li>
                                                        <li>Data disimpan hingga 2 tahun.</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- No Results Message --}}
                                    <div id="noResults" class="hidden text-center py-8">
                                        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                            </path>
                                        </svg>
                                        <p class="text-gray-500 text-lg">Tidak ada hasil yang ditemukan</p>
                                        <p class="text-gray-400 text-sm mt-2">Coba kata kunci lain atau hubungi admin
                                        </p>
                                    </div>
                                </div>

                                {{-- Quick Links --}}
                                <div
                                    class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl shadow-soft p-6 border border-slate-100">
                                    <h3 class="font-bold text-gray-800 mb-4 flex items-center text-sm md:text-base">
                                        <span class="text-2xl mr-2">🔗</span>
                                        Tautan Cepat
                                    </h3>
                                    <div class="grid grid-cols-2 gap-3 text-sm">
                                        <a href="#"
                                            class="bg-white p-3 rounded-xl hover:shadow-soft transition flex items-center group border border-slate-100">
                                            <span class="text-2xl mr-3">📱</span>
                                            <span
                                                class="text-xs md:text-sm font-medium text-gray-700 group-hover:text-blue-600">Download
                                                Aplikasi</span>
                                        </a>
                                        <a href="#"
                                            class="bg-white p-3 rounded-xl hover:shadow-soft transition flex items-center group border border-slate-100">
                                            <span class="text-2xl mr-3">📖</span>
                                            <span
                                                class="text-xs md:text-sm font-medium text-gray-700 group-hover:text-blue-600">Panduan
                                                Lengkap</span>
                                        </a>
                                        <a href="#"
                                            class="bg-white p-3 rounded-xl hover:shadow-soft transition flex items-center group border border-slate-100">
                                            <span class="text-2xl mr-3">🎥</span>
                                            <span
                                                class="text-xs md:text-sm font-medium text-gray-700 group-hover:text-blue-600">Video
                                                Tutorial</span>
                                        </a>
                                        <a href="#"
                                            class="bg-white p-3 rounded-xl hover:shadow-soft transition flex items-center group border border-slate-100">
                                            <span class="text-2xl mr-3">📞</span>
                                            <span
                                                class="text-xs md:text-sm font-medium text-gray-700 group-hover:text-blue-600">Kontak
                                                Darurat</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            {{-- Contact Admin Section / Chat --}}
                            <div class="md:col-span-1">
                                <div
                                    class="bg-white rounded-2xl shadow-soft p-6 border border-slate-100 lg:sticky lg:top-6">
                                    <h3 class="text-xl font-bold text-gray-800 mb-2 flex items-center">
                                        <span
                                            class="bg-green-100 text-green-600 rounded-full w-9 h-9 flex items-center justify-center mr-3 text-lg">💬</span>
                                        Hubungi Admin
                                    </h3>
                                    <p class="text-gray-600 text-xs md:text-sm mb-4">
                                        Tidak menemukan jawaban? Kirim pesan langsung ke admin kami melalui form ini.
                                    </p>

                                    {{-- Chat Messages --}}
                                    <div id="chatMessages"
                                        class="bg-slate-50 rounded-xl p-4 mb-4 h-64 overflow-y-auto space-y-3 border border-slate-200">
                                        <div class="text-center text-gray-400 text-xs space-y-1">
                                            <p>Percakapan dimulai</p>
                                            <p class="text-xs mt-1">Admin biasanya merespons dalam 5–10 menit.</p>
                                        </div>
                                    </div>

                                    {{-- Message Input --}}
                                    <form id="messageForm" class="space-y-3">
                                        <div class="relative">
                                            <textarea id="messageInput" rows="3" placeholder="Tuliskan masalah Anda secara singkat dan jelas..."
                                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none resize-none text-sm"
                                                required></textarea>
                                        </div>

                                        <button type="submit"
                                            class="w-full bg-gradient-to-r from-green-500 to-green-600 text-white py-3 rounded-xl text-sm font-semibold hover:from-green-600 hover:to-green-700 transition duration-200 flex items-center justify-center shadow-soft">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                            </svg>
                                            Kirim Pesan ke Admin
                                        </button>
                                    </form>

                                    {{-- Contact Info --}}
                                    <div class="mt-6 pt-5 border-t border-gray-200 space-y-2 text-xs md:text-sm">
                                        <p class="text-sm text-gray-600 mb-1 font-semibold">Kontak Lainnya:</p>
                                        <a href="tel:081234567890"
                                            class="flex items-center text-gray-600 hover:text-blue-600 transition">
                                            <span class="text-lg mr-2">📞</span>
                                            0812-3456-7890
                                        </a>
                                        <a href="mailto:support@riauport.com"
                                            class="flex items-center text-gray-600 hover:text-blue-600 transition">
                                            <span class="text-lg mr-2">✉️</span>
                                            support@riauport.com
                                        </a>
                                        <div class="flex items-center text-gray-600">
                                            <span class="text-lg mr-2">🕐</span>
                                            24/7 Selalu Siap
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> {{-- end grid --}}
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script>
        // FAQ Accordion functionality
        const faqItems = document.querySelectorAll('.faq-item');

        faqItems.forEach(item => {
            const question = item.querySelector('.faq-question');
            const answer = item.querySelector('.faq-answer');
            const icon = item.querySelector('.faq-icon');

            question.addEventListener('click', () => {
                const isOpen = answer.style.maxHeight;

                // Close all other FAQs
                faqItems.forEach(otherItem => {
                    const otherAnswer = otherItem.querySelector('.faq-answer');
                    const otherIcon = otherItem.querySelector('.faq-icon');
                    otherAnswer.style.maxHeight = null;
                    otherIcon.classList.remove('rotate-180');
                });

                // Toggle current FAQ
                if (!isOpen) {
                    answer.style.maxHeight = answer.scrollHeight + 'px';
                    icon.classList.add('rotate-180');
                } else {
                    answer.style.maxHeight = null;
                    icon.classList.remove('rotate-180');
                }
            });
        });

        // Search functionality
        const searchInput = document.getElementById('searchInput');
        const faqContainer = document.getElementById('faqContainer');
        const noResults = document.getElementById('noResults');

        searchInput.addEventListener('input', (e) => {
            const searchTerm = e.target.value.toLowerCase();
            let hasResults = false;

            faqItems.forEach(item => {
                const question = item.querySelector('.faq-question span').textContent.toLowerCase();
                const answer = item.querySelector('.faq-answer').textContent.toLowerCase();

                if (question.includes(searchTerm) || answer.includes(searchTerm)) {
                    item.style.display = 'block';
                    hasResults = true;
                } else {
                    item.style.display = 'none';
                }
            });

            if (hasResults || searchTerm === '') {
                noResults.classList.add('hidden');
                faqContainer.classList.remove('hidden');
            } else {
                noResults.classList.remove('hidden');
                faqContainer.classList.add('hidden');
            }
        });

        // Chat functionality
        const messageForm = document.getElementById('messageForm');
        const messageInput = document.getElementById('messageInput');
        const chatMessages = document.getElementById('chatMessages');

        messageForm.addEventListener('submit', (e) => {
            e.preventDefault();

            const message = messageInput.value.trim();
            if (message) {
                // Add user message
                addMessage(message, 'user');

                // Clear input
                messageInput.value = '';

                // Simulate admin response after 2 seconds
                setTimeout(() => {
                    const responses = [
                        'Terima kasih atas pesannya! Admin kami sedang meninjau pertanyaan Anda.',
                        'Pesan Anda telah diterima. Tim kami akan segera merespons.',
                        'Halo! Kami akan membantu Anda secepatnya. Mohon tunggu sebentar.',
                    ];
                    const randomResponse = responses[Math.floor(Math.random() * responses.length)];
                    addMessage(randomResponse, 'admin');
                }, 2000);
            }
        });

        function addMessage(text, sender) {
            const messageDiv = document.createElement('div');
            messageDiv.className = `chat-message ${sender === 'user' ? 'text-right' : 'text-left'}`;

            const messageBubble = document.createElement('div');
            messageBubble.className = `inline-block px-4 py-2 rounded-lg max-w-[80%] ${
                sender === 'user'
                    ? 'bg-[#0c607f] text-white rounded-br-none'
                    : 'bg-gray-200 text-gray-800 rounded-bl-none'
            }`;
            messageBubble.textContent = text;

            const timeStamp = document.createElement('div');
            timeStamp.className = 'text-xs text-gray-400 mt-1';
            timeStamp.textContent = new Date().toLocaleTimeString('id-ID', {
                hour: '2-digit',
                minute: '2-digit'
            });

            messageDiv.appendChild(messageBubble);
            messageDiv.appendChild(timeStamp);
            chatMessages.appendChild(messageDiv);

            // Scroll to bottom
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }
    </script>
</body>

</html>

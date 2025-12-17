<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Travel – RiauPort</title>

    <!-- FAVICON – cukup copy-paste ini saja, sudah 100% kerja di semua browser & device -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon_io/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon_io/site.webmanifest') }}">

    <!-- Opsional: untuk Android Chrome -->
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon_io/android-chrome-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('favicon_io/android-chrome-512x512.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: system-ui, -apple-system, sans-serif;
            background-color: #f8fafc;
        }

        /* Navbar fixed */
        .site-header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background: white;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
        }

        main {
            padding-top: 80px;
        }

        /* Modal overlay */
        .modal-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.6);
            z-index: 2000;
            animation: fadeIn 0.2s ease;
        }

        .modal-overlay.active {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Modal content */
        .modal-content {
            background: white;
            border-radius: 24px;
            max-width: 1000px;
            width: 95%;
            max-height: 90vh;
            overflow-y: auto;
            animation: slideUp 0.3s ease;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.25);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideUp {
            from {
                transform: translateY(50px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* Card hover effect */
        .travel-card {
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .travel-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.12);
        }

        /* Tabs */
        .tab-button {
            position: relative;
            padding: 12px 24px;
            font-weight: 600;
            color: #64748b;
            transition: color 0.2s;
        }

        .tab-button.active {
            color: #0e586d;
        }

        .tab-button.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: #0e586d;
            border-radius: 3px 3px 0 0;
        }

        /* Image carousel dots (dummy) */
        .carousel-dot {
            width: 8px;
            height: 8px;
            border-radius: 999px;
            background: #cbd5e1;
            transition: all 0.3s;
        }

        .carousel-dot.active {
            width: 24px;
            background: #0e586d;
        }

        /* Scrollbar custom (modal) */
        .modal-content::-webkit-scrollbar {
            width: 8px;
        }

        .modal-content::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        .modal-content::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }

        .modal-content::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
</head>

<body class="bg-gray-50">

    {{-- NAVBAR FIXED --}}
    <header class="site-header">
        <div class="max-w-7xl mx-auto px-4 md:px-6 py-3">
            <div class="flex items-center justify-between gap-4">
                {{-- Logo --}}
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <img src="{{ asset('images/riauport-logo.png') }}" alt="RiauPort" class="h-10">
                </a>

                {{-- Menu --}}
                <nav class="hidden md:flex items-center gap-6 text-sm font-medium text-gray-700">
                    <a href="{{ route('home') }}" class="hover:text-[#0e586d] transition-colors">Home</a>
                    <a href="{{ route('contact') }}" class="hover:text-[#0e586d] transition-colors">Contact</a>
                    <a href="{{ route('about') }}" class="hover:text-[#0e586d] transition-colors">About</a>
                </nav>

                {{-- Auth Button --}}
                <div class="flex items-center gap-3">
                    @guest
                        <a href="{{ route('login') }}"
                            class="px-5 py-2 rounded-full bg-[#0e586d] text-white text-sm font-medium hover:bg-[#0b4353] transition">
                            Login
                        </a>
                    @else
                        <div class="flex items-center gap-3">
                            <span class="text-sm text-gray-600 hidden sm:inline">{{ auth()->user()->name }}</span>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="px-5 py-2 rounded-full border border-gray-300 text-sm font-medium hover:bg-gray-50 transition">
                                    Logout
                                </button>
                            </form>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </header>

    {{-- MAIN CONTENT --}}
    <main>
        <section class="max-w-7xl mx-auto px-4 md:px-6 py-8">
            {{-- Header Section --}}
            <div class="mb-8">
                <div class="flex items-center gap-2 text-sm text-gray-500 mb-3">
                    <a href="{{ route('home') }}" class="hover:text-[#0e586d]">Home</a>
                    <span>›</span>
                    <span class="text-gray-900 font-medium">Hasil Pencarian</span>
                </div>

                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3">
                    {{ $selectedOrigin }} → {{ $selectedDestination }}
                </h1>

                <div class="flex flex-wrap items-center gap-4">
                    <p class="text-gray-600">
                        Ditemukan
                        <span class="font-semibold text-gray-900">{{ $travels->count() }}</span>
                        travel
                    </p>
                    <a href="{{ route('home') }}"
                        class="text-sm text-[#0e586d] hover:underline font-medium flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Ubah pencarian
                    </a>
                </div>
            </div>

            {{-- Empty State --}}
            @if ($travels->isEmpty())
                <div class="bg-white rounded-3xl p-12 text-center shadow-sm border border-gray-100">
                    <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M12 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">
                        Belum Ada Travel Tersedia
                    </h3>
                    <p class="text-gray-600 mb-6 max-w-md mx-auto">
                        Untuk saat ini belum ada travel yang terdaftar pada rute ini. Coba pilih rute lain atau cek
                        kembali nanti.
                    </p>
                    <a href="{{ route('home') }}"
                        class="inline-block px-6 py-3 bg-[#0e586d] text-white rounded-full font-medium hover:bg-[#0b4353] transition">
                        Cari Rute Lain
                    </a>
                </div>
            @else
                {{-- FILTER & SORT BAR (dummy, bisa dihubungkan ke query nanti) --}}
                <div
                    class="mb-5 flex flex-col md:flex-row md:items-center md:justify-between gap-3 bg-white rounded-2xl border border-gray-100 px-4 py-3 shadow-sm">
                    <div class="flex flex-wrap items-center gap-2 text-xs md:text-sm text-gray-600">
                        <span class="font-semibold mr-1">Filter:</span>

                        <button
                            class="px-3 py-1 rounded-full border border-gray-200 bg-gray-50 hover:border-[#0e586d] hover:text-[#0e586d] transition">
                            Kapasitas Penumpang
                        </button>
                        <button
                            class="px-3 py-1 rounded-full border border-gray-200 bg-gray-50 hover:border-[#0e586d] hover:text-[#0e586d] transition">
                            Jam Berangkat
                        </button>
                        <button
                            class="px-3 py-1 rounded-full border border-gray-200 bg-gray-50 hover:border-[#0e586d] hover:text-[#0e586d] transition">
                            Harga
                        </button>
                    </div>

                    <div class="flex items-center gap-2 text-xs md:text-sm">
                        <span class="text-gray-500">Sort</span>
                        <button
                            class="inline-flex items-center gap-1 px-3 py-1.5 rounded-full border border-gray-200 bg-gray-50 text-gray-700 hover:border-[#0e586d] hover:text-[#0e586d] transition">
                            Terendah &nbsp;–&nbsp; Tertinggi
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- LIST TRAVEL – STYLE MIRIP TRAVELOKA --}}
                <div class="space-y-4">
                    @foreach ($travels as $travel)
                        <article
                            class="bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg transition-all duration-200 overflow-hidden cursor-pointer"
                            onclick="openModal({{ $travel->id }})">

                            <div class="flex flex-col md:flex-row items-stretch">
                                {{-- KIRI: GAMBAR MOBIL --}}
                                <div class="md:w-64 p-4 flex items-center">
                                    <div class="w-full h-36 rounded-2xl overflow-hidden bg-gray-200 shadow-sm">

                                        @if (!empty($travel->foto_armada))
                                            <img src="{{ asset('file/' . rawurlencode($travel->foto_armada)) }}"
                                                alt="Foto Armada" class="w-full h-full object-cover object-center">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center">
                                                <svg class="w-12 h-12 text-gray-300" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M4 5a1 1 0 011-1h14a1 1 0 011 1v11a1 1 0 01-1 1H9l-4 4v-4H5a1 1 0 01-1-1V5z" />
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                </div>


                                {{-- TENGAH: INFO RUTE + ARMADA --}}
                                <div class="flex-1 p-4 md:p-5 flex flex-col gap-3">
                                    <div class="flex flex-wrap items-center justify-between gap-2">
                                        <div>
                                            {{-- Nama armada / sopir --}}
                                            <h3 class="text-base md:text-lg font-semibold text-gray-900">
                                                {{ $travel->armada ?? 'Travel ' . $travel->lokasi_asal }}
                                            </h3>
                                            <p class="text-xs md:text-sm text-gray-500">
                                                {{ $travel->lokasi_asal }} → {{ $travel->lokasi_tujuan }}
                                            </p>
                                        </div>

                                        {{-- Badge kursi tersedia --}}
                                        <span
                                            class="px-3 py-1 bg-emerald-50 text-emerald-600 text-xs font-semibold rounded-full border border-emerald-100">
                                            {{ max(0, $travel->kapasitas_penumpang - ($travel->penumpang_terdaftar ?? 0)) }}
                                            kursi
                                            tersedia
                                        </span>
                                    </div>

                                    {{-- DETAIL KECIL: TANGGAL, JAM, KAPASITAS --}}
                                    <div
                                        class="flex flex-wrap items-center gap-x-6 gap-y-2 text-xs md:text-sm text-gray-600 mt-1 md:mt-2">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            <span>{{ $travel->tanggal_berangkat }}</span>
                                        </div>

                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span>{{ $travel->jam_berangkat }}</span>
                                        </div>

                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            <span>{{ $travel->kapasitas_penumpang }} penumpang</span>
                                        </div>
                                    </div>

                                    {{-- Catatan singkat --}}
                                    <p class="text-xs md:text-sm text-gray-500 mt-1 line-clamp-2">
                                        {{ $travel->keterangan ?? 'Perjalanan tepat waktu, titik jemput dan turun bisa disepakati dengan sopir.' }}
                                    </p>
                                </div>

                                {{-- KANAN: HARGA + TOMBOL --}}
                                <div
                                    class="md:w-56 border-t md:border-t-0 md:border-l border-gray-100 bg-slate-50 px-4 py-4 md:px-5 md:py-6 flex flex-col justify-center items-end gap-3">
                                    <div class="text-right">
                                        <p class="text-xs text-gray-500 mb-1">Mulai dari</p>
                                        <p class="text-xl md:text-2xl font-bold text-[#0e586d]">
                                            Rp {{ number_format($travel->harga_per_orang, 0, ',', '.') }}
                                        </p>
                                        <p class="text-[11px] text-gray-500">per kursi</p>
                                    </div>

                                    <button
                                        class="px-5 py-2 rounded-full bg-[#ff6a1a] text-white text-xs md:text-sm font-semibold shadow hover:bg-[#e65d14] transition"
                                        onclick="event.stopPropagation(); openModal({{ $travel->id }})">
                                        Lihat Detail
                                    </button>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            @endif
        </section>
    </main>

    {{-- MODAL DETAIL --}}
    @foreach ($travels as $travel)
        <div id="modal-{{ $travel->id }}" class="modal-overlay"
            onclick="closeModalOnOverlay(event, {{ $travel->id }})">
            <div class="modal-content" onclick="event.stopPropagation()">
                {{-- Modal Header --}}
                <div
                    class="sticky top-0 bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between">
                    <h2 class="text-xl font-bold text-gray-900">
                        Detail Travel – {{ $travel->armada ?? $travel->lokasi_asal . ' → ' . $travel->lokasi_tujuan }}
                    </h2>
                    <button onclick="closeModal({{ $travel->id }})"
                        class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-gray-100 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                {{-- Tabs --}}
                <div class="border-b border-gray-200 px-6">
                    <div class="flex gap-1">
                        <button class="tab-button active"
                            onclick="switchTab({{ $travel->id }}, 'features', event)">Fitur</button>
                        <button class="tab-button"
                            onclick="switchTab({{ $travel->id }}, 'route', event)">Rute</button>

                        {{-- TAB BARU: ULASAN --}}
                        <button class="tab-button"
                            onclick="switchTab({{ $travel->id }}, 'reviews', event)">Ulasan</button>

                        <button class="tab-button"
                            onclick="switchTab({{ $travel->id }}, 'booking', event)">Pemesanan
                        </button>
                    </div>
                </div>

                {{-- TAB: FITUR --}}
                <div id="tab-features-{{ $travel->id }}" class="tab-content p-6">
                    <div class="grid md:grid-cols-2 gap-8">
                        {{-- Left: Image --}}
                        <div>
                            <div class="relative rounded-2xl overflow-hidden bg-gradient-to-br from-cyan-100 to-blue-100"
                                style="height: 360px">
                                @if (!empty($travel->foto_armada))
                                    <img src="{{ url('/file/' . rawurlencode($travel->foto_armada)) }}" alt="Armada Travel"
                                        class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <svg class="w-24 h-24 text-gray-300" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 5a1 1 0 011-1h14a1 1 0 011 1v11a1 1 0 01-1 1H9l-4 4v-4H5a1 1 0 01-1-1V5z" />
                                        </svg>
                                    </div>
                                @endif
                            </div>

                            {{-- Carousel Dots (dummy) --}}
                            <div class="flex justify-center gap-2 mt-4">
                                <div class="carousel-dot active"></div>
                                <div class="carousel-dot"></div>
                                <div class="carousel-dot"></div>
                            </div>
                        </div>

                        {{-- Right: Specs --}}
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-6">Spesifikasi Armada</h3>

                            <div class="space-y-4 text-sm text-gray-700">
                                {{-- Seats --}}
                                <div class="flex items-start gap-3">
                                    <div
                                        class="w-10 h-10 rounded-lg bg-gray-100 flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold">Kapasitas</p>
                                        <p>{{ $travel->kapasitas_penumpang }} kursi</p>
                                    </div>
                                </div>

                                {{-- Layout kursi (dummy) --}}
                                <div class="flex items-start gap-3">
                                    <div
                                        class="w-10 h-10 rounded-lg bg-gray-100 flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold">Konfigurasi Kursi</p>
                                        <p>2–1 (nyaman)</p>
                                    </div>
                                </div>

                                {{-- Fasilitas (dummy + bisa diganti dari DB nanti) --}}
                                <div>
                                    <p class="font-semibold mb-3">Fasilitas</p>
                                    <div class="grid grid-cols-2 gap-3 text-sm">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                            <span>AC</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                            <span>Kursi Reclining</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                            <span>Bagasi</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                            <span>Musik</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Catatan / deskripsi --}}
                            <div class="mt-6 p-4 bg-gray-50 rounded-xl text-sm text-gray-600">
                                {{ $travel->keterangan ?? 'Perjalanan akan dimulai tepat waktu. Pastikan Anda datang 15 menit sebelum keberangkatan.' }}
                            </div>
                        </div>
                    </div>
                </div>

                {{-- TAB: RUTE --}}
                <div id="tab-route-{{ $travel->id }}" class="tab-content hidden p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-6">Informasi Rute</h3>

                    <div class="space-y-6">
                        {{-- Titik berangkat --}}
                        <div class="flex items-start gap-4">
                            <div class="flex flex-col items-center">
                                <div
                                    class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center text-green-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    </svg>
                                </div>
                                <div class="w-0.5 h-16 bg-gray-300"></div>
                            </div>
                            <div class="flex-1 pt-1">
                                <p class="text-sm font-semibold text-gray-900">{{ $travel->lokasi_asal }}</p>
                                <p class="text-xs text-gray-500 mt-1">
                                    Titik jemput:
                                    {{ $travel->titik_jemput ?? 'Sesuai kesepakatan dengan sopir' }}
                                </p>
                                <p class="text-xs text-gray-500">
                                    Waktu: {{ $travel->jam_berangkat }}
                                </p>
                            </div>
                        </div>

                        {{-- Titik tujuan --}}
                        <div class="flex items-start gap-4">
                            <div class="flex flex-col items-center">
                                <div
                                    class="w-12 h-12 rounded-full bg-red-100 flex items-center justify-center text-red-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="flex-1 pt-1">
                                <p class="text-sm font-semibold text-gray-900">{{ $travel->lokasi_tujuan }}</p>
                                <p class="text-xs text-gray-500 mt-1">
                                    Titik turun:
                                    {{ $travel->titik_turun ?? 'Sesuai kesepakatan dengan sopir' }}
                                </p>
                                <p class="text-xs text-gray-500">
                                    Estimasi waktu: {{ $travel->estimasi_waktu ?? '2–3 jam' }}
                                </p>
                            </div>
                        </div>

                        {{-- Rute singkat --}}
                        <div class="mt-4 p-4 bg-blue-50 border border-blue-100 rounded-xl text-sm text-gray-700">
                            <p class="font-semibold mb-1">Rute Singkat</p>
                            <p>{{ $travel->rute ?? $travel->lokasi_asal . ' – ' . $travel->lokasi_tujuan }}</p>
                        </div>
                    </div>
                </div>

                {{-- TAB: ULASAN --}}
                <div id="tab-reviews-{{ $travel->id }}" class="tab-content hidden p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-6">Ulasan Penumpang</h3>

                    {{-- FORM INPUT ULASAN --}}
                    <div class="mb-6">
                        @if (Auth::check() && Auth::user()->role === 'user')
                            <div class="bg-white border border-gray-200 rounded-2xl p-5 shadow-sm">
                                <h4 class="text-sm font-semibold text-gray-900 mb-3">
                                    Tulis Ulasanmu
                                </h4>

                                <form method="POST" action="{{ route('reviews.store') }}">
                                    @csrf
                                    {{-- Kirim id travel --}}
                                    <input type="hidden" name="travel_id" value="{{ $travel->id }}">

                                    {{-- Rating --}}
                                    <div class="mb-4">
                                        <label for="rating-{{ $travel->id }}"
                                            class="block text-xs font-medium text-gray-700 mb-1">
                                            Rating Perjalanan
                                        </label>
                                        <select id="rating-{{ $travel->id }}" name="rating"
                                            class="block w-full rounded-xl border-gray-300 text-sm shadow-sm focus:ring-[#0e586d] focus:border-[#0e586d]">
                                            <option value="">Pilih rating</option>
                                            <option value="5">⭐⭐⭐⭐⭐ – Sangat puas</option>
                                            <option value="4">⭐⭐⭐⭐ – Puas</option>
                                            <option value="3">⭐⭐⭐ – Cukup</option>
                                            <option value="2">⭐⭐ – Kurang</option>
                                            <option value="1">⭐ – Tidak puas</option>
                                        </select>
                                    </div>

                                    {{-- Kolom ulasan --}}
                                    <div class="mb-4">
                                        <label for="review-{{ $travel->id }}"
                                            class="block text-xs font-medium text-gray-700 mb-1">
                                            Ulasan
                                        </label>
                                        <textarea id="review-{{ $travel->id }}" name="review" rows="3"
                                            class="block w-full rounded-xl border-gray-300 text-sm shadow-sm focus:ring-[#0e586d] focus:border-[#0e586d]"
                                            placeholder="Ceritakan pengalamanmu, misalnya: kenyamanan mobil, keramahan sopir, ketepatan waktu, dll."></textarea>
                                    </div>

                                    <div class="flex items-center justify-end gap-2">
                                        <button type="submit"
                                            class="inline-flex items-center px-4 py-2 rounded-xl bg-[#0e586d] text-white text-sm font-semibold hover:bg-[#0b4353] transition shadow-sm">
                                            Kirim Ulasan
                                        </button>
                                    </div>
                                </form>
                            </div>
                        @else
                            <div
                                class="mb-6 p-4 bg-gray-50 border border-dashed border-gray-200 rounded-2xl text-center text-xs text-gray-600">
                                Untuk menulis ulasan, silakan
                                <a href="{{ route('login') }}"
                                    class="font-semibold text-[#0e586d] hover:underline">login terlebih dahulu</a>
                                sebagai pengguna.
                            </div>
                        @endif
                    </div>

                    {{-- Ringkasan rating (sementara dummy, nanti bisa dihubungkan ke DB) --}}
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-16 h-16 rounded-2xl bg-[#0e586d]/5 flex items-center justify-center flex-shrink-0">
                                <span class="text-2xl font-bold text-[#0e586d]">–</span>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Rating Rata-rata</p>
                                <div class="flex items-center gap-2 mt-1">
                                    {{-- Bintang dummy --}}
                                    <div class="flex items-center gap-1 text-amber-400">
                                        <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        <svg class="w-4 h-4 text-gray-300" viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    </div>
                                    <span class="text-xs text-gray-500">Belum ada rating</span>
                                </div>
                            </div>
                        </div>

                        {{-- Tag kategori ulasan --}}
                        <div class="flex flex-wrap gap-2 text-xs">
                            <span
                                class="px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-100">Kenyamanan</span>
                            <span class="px-3 py-1 rounded-full bg-sky-50 text-sky-700 border border-sky-100">Ketepatan
                                waktu</span>
                            <span
                                class="px-3 py-1 rounded-full bg-amber-50 text-amber-700 border border-amber-100">Pelayanan
                                sopir</span>
                        </div>
                    </div>

                    {{-- Empty state list ulasan --}}
                    <div class="border border-dashed border-gray-200 rounded-2xl p-6 text-center">
                        <div
                            class="w-12 h-12 rounded-full bg-gray-100 flex items-center justify-center mx-auto mb-4 text-gray-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 10h.01M12 10h.01M16 10h.01M9 16h6m5-4a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <p class="text-sm font-semibold text-gray-900 mb-1">Belum ada ulasan untuk travel ini</p>
                        <p class="text-xs text-gray-500 max-w-md mx-auto">
                            Setelah penumpang mengirim ulasan, pengalaman perjalanan mereka akan tampil di sini dan
                            membantu penumpang lain
                            dalam memilih travel.
                        </p>
                    </div>
                </div>


                {{-- TAB: PEMESANAN --}}
                <div id="tab-booking-{{ $travel->id }}" class="tab-content hidden p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-6">Informasi Pemesanan</h3>

                    <div class="bg-gradient-to-br from-cyan-50 to-blue-50 rounded-2xl p-6 mb-6 border border-cyan-100">
                        <div class="flex items-center justify-between flex-wrap gap-4 mb-4">
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Harga Per Orang</p>
                                <p class="text-3xl font-bold text-[#0e586d]">
                                    Rp {{ number_format($travel->harga_per_orang, 0, ',', '.') }}
                                </p>
                            </div>
                            <div class="text-right">
                                <p class="text-sm text-gray-600 mb-1">Kursi Tersedia</p>
                                <p class="text-2xl font-bold text-gray-900">
                                    {{ max(0, $travel->kapasitas_penumpang - ($travel->penumpang_terdaftar ?? 0)) }}
                                </p>
                            </div>
                        </div>

                        <div class="border-t border-cyan-200 pt-4 grid grid-cols-2 gap-4 text-sm">
                            <div>
                                <p class="text-gray-600">Tanggal</p>
                                <p class="font-semibold text-gray-900">{{ $travel->tanggal_berangkat }}</p>
                            </div>
                            <div>
                                <p class="text-gray-600">Waktu</p>
                                <p class="font-semibold text-gray-900">{{ $travel->jam_berangkat }}</p>
                            </div>
                        </div>
                    </div>

                    @php
                        // Bangun link WhatsApp dari nomor di kolom "whatsapp"
                        $wa = preg_replace('/[^0-9]/', '', $travel->whatsapp ?? '');
                        $waMessage = "Halo, saya tertarik dengan travel {$travel->lokasi_asal} - {$travel->lokasi_tujuan} tanggal {$travel->tanggal_berangkat}";
                        $waUrl = $wa ? 'https://wa.me/' . $wa . '?text=' . urlencode($waMessage) : null;
                    @endphp

                    @if (!$waUrl)
                        <p class="text-sm text-red-500 text-center">
                            Nomor WhatsApp sopir belum diatur.
                        </p>
                    @else
                        @if (Auth::check() && Auth::user()->role === 'user')
                            {{-- SUDAH LOGIN sebagai user → langsung ke WhatsApp --}}
                            <a href="{{ $waUrl }}" target="_blank"
                                class="group flex items-center justify-center gap-3 w-full py-4 px-4
                  bg-[#25D366] text-white font-semibold rounded-2xl
                  shadow-lg hover:shadow-xl hover:bg-[#1ebe57] transition">
                                {{-- Icon WhatsApp --}}
                                <span
                                    class="inline-flex items-center justify-center w-9 h-9 rounded-full
                       bg-white/15 group-hover:bg-white/25 transition">
                                    <svg class="w-5 h-5" viewBox="0 0 32 32" fill="currentColor">
                                        <path
                                            d="M16.027 3C9.39 3 4 8.39 4 15.027c0 2.64.87 5.093 2.34 7.07L4 29l7.145-2.32A11.94 11.94 0 0 0 16.027 27C22.663 27 28 21.61 28 14.973 28 8.336 22.663 3 16.027 3Zm6.935 16.563c-.293.823-1.71 1.588-2.383 1.655-.61.06-1.38.086-2.227-.14-.51-.14-1.168-.38-2.01-.745-3.53-1.53-5.83-5.168-6.005-5.41-.173-.243-1.43-1.907-1.43-3.64 0-1.733.907-2.595 1.227-2.95.32-.354.7-.443.933-.443.233 0 .467.002.67.012.217.01.504-.082.79.603.293.71.993 2.473 1.08 2.653.087.18.145.39.027.633-.116.243-.175.39-.35.603-.175.214-.367.48-.524.643-.175.175-.356.366-.153.72.203.354.9 1.49 1.934 2.412 1.33 1.172 2.443 1.536 2.797 1.71.354.175.557.146.77-.087.214-.233.89-1.037 1.127-1.393.233-.354.487-.293.82-.175.33.116 2.088.984 2.447 1.163.354.175.59.26.677.407.087.146.087.85-.206 1.673Z" />
                                    </svg>
                                </span>

                                <div class="text-left leading-tight">
                                    <span class="block text-sm">Pesan Sekarang</span>
                                    <span class="block text-[11px] font-normal opacity-90">
                                        Via WhatsApp
                                    </span>
                                </div>
                            </a>
                        @else
                            {{-- BELUM LOGIN user → arahkan ke login dengan redirect_to --}}
                            <a href="{{ route('login', ['redirect_to' => $waUrl]) }}"
                                class="group flex items-center justify-center gap-3 w-full py-4 px-4
                  bg-[#0e586d] text-white font-semibold rounded-2xl
                  shadow-lg hover:shadow-xl hover:bg-[#0b4353] transition">
                                {{-- Icon WhatsApp --}}
                                <span
                                    class="inline-flex items-center justify-center w-9 h-9 rounded-full
                       bg-white/15 group-hover:bg-white/25 transition">
                                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2">
                                        <path
                                            d="M16.7 14.3c-.3-.2-1.8-.9-2-1s-.5-.2-.7.2-.8 1-1 1.2-.4.3-.8.1-1.5-.6-2.8-1.9c-1-1-1.6-2.2-1.8-2.6s0-.6.2-.8.3-.5.5-.7.2-.4.3-.6.1-.3 0-.5-.7-1.7-1-2.3-.5-.5-.7-.5h-.6a1.1 1.1 0 0 0-.8.4A3.3 3.3 0 0 0 5 7.7c0 1.5 1.1 2.9 1.2 3.1s2.2 3.4 5.2 4.7a17.6 17.6 0 0 0 1.7.6 4.1 4.1 0 0 0 1.9.1c.6-.1 1.8-.7 2-1.4s.2-1.3.2-1.4-.3-.2-.6-.4Z" />
                                        <path
                                            d="M12 4a8 8 0 0 0-8 8c0 1.4.4 2.7 1.1 3.8L4 20l4.3-1.1A8 8 0 1 0 12 4Z" />
                                    </svg>
                                </span>

                                <div class="text-left leading-tight">
                                    <span class="block text-sm">Pesan Sekarang</span>
                                    <span class="block text-[11px] font-normal opacity-90">
                                        Login dulu, lalu lanjut ke WhatsApp
                                    </span>
                                </div>
                            </a>

                            <div class="mt-4 p-4 bg-gray-50 rounded-xl">
                                <p class="text-xs text-gray-500 text-center">
                                    Kamu akan diminta login sebagai <span class="font-semibold">pengguna</span>
                                    terlebih dahulu, lalu setelah login otomatis diarahkan ke WhatsApp sopir.
                                </p>
                            </div>
                        @endif
                    @endif


                </div>

            </div>
        </div>
    @endforeach

    {{-- FOOTER --}}
    <footer class="bg-white border-t border-gray-200 mt-16">
        <div class="max-w-7xl mx-auto px-4 md:px-6 py-8">
            <div class="flex flex-col md:flex-row items-center justify-between gap-4 text-sm text-gray-600">
                <p>© {{ date('Y') }} RiauPort. All rights reserved.</p>
                <p class="hidden sm:block">Platform direktori travel & transportasi Riau</p>
            </div>
        </div>
    </footer>

    {{-- JAVASCRIPT --}}
    <script>
        // Open Modal
        function openModal(id) {
            const modal = document.getElementById(`modal-${id}`);
            if (modal) {
                modal.classList.add('active');
                document.body.style.overflow = 'hidden';
            }
        }

        // Close Modal
        function closeModal(id) {
            const modal = document.getElementById(`modal-${id}`);
            if (modal) {
                modal.classList.remove('active');
                document.body.style.overflow = 'auto';
            }
        }

        // Close Modal on Overlay Click
        function closeModalOnOverlay(event, id) {
            if (event.target.classList.contains('modal-overlay')) {
                closeModal(id);
            }
        }

        // Switch Tab
        function switchTab(travelId, tabName, event) {
            const travelModal = document.getElementById(`modal-${travelId}`);
            if (!travelModal) return;

            // Hide all tab contents
            const contents = travelModal.querySelectorAll('.tab-content');
            contents.forEach(content => content.classList.add('hidden'));

            // Remove active from all buttons
            const buttons = travelModal.querySelectorAll('.tab-button');
            buttons.forEach(btn => btn.classList.remove('active'));

            // Show selected tab
            const selectedContent = document.getElementById(`tab-${tabName}-${travelId}`);
            if (selectedContent) {
                selectedContent.classList.remove('hidden');
            }

            // Add active to clicked button
            if (event && event.target) {
                event.target.classList.add('active');
            }
        }

        // Close modal on ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const activeModal = document.querySelector('.modal-overlay.active');
                if (activeModal) {
                    const id = activeModal.id.replace('modal-', '');
                    closeModal(id);
                }
            }
        });
    </script>

</body>

</html>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>RiauPort – Dashboard Sopir</title>

    <!-- FAVICON -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon_io/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon_io/site.webmanifest') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon_io/android-chrome-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('favicon_io/android-chrome-512x512.png') }}">

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
    </style>
</head>

<body class="h-screen overflow-hidden bg-white text-slate-800">
    <div class="h-full flex">

        {{-- SIDEBAR --}}
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
                    class="{{ $baseLink }} {{ request()->routeIs('sopir.dashboard') ? 'bg-white text-[#0b5f80] ring-2 ring-white/70' : 'bg-white text-[#0b5f80] hover:bg-white/90 transition' }}">
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
                    class="{{ $baseLink }} {{ request()->routeIs('sopir.travel') ? 'bg-white text-[#0b5f80] ring-2 ring-white/70' : 'bg-white text-[#0b5f80] hover:bg-white/90 transition' }}">
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
                    class="{{ $baseLink }} {{ request()->routeIs('sopir.jadwal') ? 'bg-white text-[#0b5f80] ring-2 ring-white/70' : 'bg-white text-[#0b5f80] hover:bg-white/90 transition' }}">
                    <div
                        class="{{ $baseIcon }} {{ request()->routeIs('sopir.jadwal') ? 'bg-[#0b5f80] text-white' : 'bg-[#e7f5fb] text-[#0b5f80]' }}">
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
                    class="{{ $baseLink }} {{ request()->routeIs('sopir.profil') ? 'bg-white text-[#0b5f80] ring-2 ring-white/70' : 'bg-white text-[#0b5f80] hover:bg-white/90 transition' }}">
                    <div
                        class="{{ $baseIcon }} {{ request()->routeIs('sopir.profil') ? 'bg-[#0b5f80] text-white' : 'bg-[#e7f5fb] text-[#0b5f80]' }}">
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
                    class="{{ $baseLink }} {{ request()->routeIs('sopir.notifikasi') ? 'bg-white text-[#0b5f80] ring-2 ring-white/70' : 'bg-white text-[#0b5f80] hover:bg-white/90 transition' }}">
                    <div
                        class="{{ $baseIcon }} {{ request()->routeIs('sopir.notifikasi') ? 'bg-[#0b5f80] text-white' : 'bg-[#e7f5fb] text-[#0b5f80]' }}">
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
                    class="{{ $baseLink }} {{ request()->routeIs('sopir.personal') ? 'bg-white text-[#0b5f80] ring-2 ring-white/70' : 'bg-white text-[#0b5f80] hover:bg-white/90 transition' }}">
                    <div
                        class="{{ $baseIcon }} {{ request()->routeIs('sopir.personal') ? 'bg-[#0b5f80] text-white' : 'bg-[#e7f5fb] text-[#0b5f80]' }}">
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

                {{-- Bantuan --}}
                <a href="{{ route('sopir.bantuan') }}"
                    class="{{ $baseLink }} {{ request()->routeIs('sopir.bantuan') ? 'bg-white text-[#0b5f80] ring-2 ring-white/70' : 'bg-white text-[#0b5f80] hover:bg-white/90 transition' }}">
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
            <header class="flex items-center justify-between px-10 pt-6 pb-4">
                <div>
                    <h1 class="text-3xl font-semibold tracking-tight text-[#0c607f]">Dashboard</h1>
                    <p class="text-sm text-slate-500 mt-1">
                        Ringkasan aktivitas dan informasi perjalananmu hari ini.
                    </p>
                </div>

                <div class="flex items-center gap-3">
                    <div class="text-right">
                        <p class="text-sm font-semibold text-[#0c607f]">
                            {{ Auth::user()->name }}
                        </p>
                        <p class="text-[11px] text-emerald-600 flex items-center justify-end gap-1">
                            <span class="inline-block h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span>
                            Online
                        </p>
                    </div>
                    <div class="h-10 w-10 rounded-full bg-[#5fb7cf] grid place-items-center">
                        <svg class="h-6 w-6 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <circle cx="12" cy="8" r="4"></circle>
                            <path d="M4 22a8 8 0 0 1 16 0"></path>
                        </svg>
                    </div>
                </div>
            </header>

            {{-- KONTEN UTAMA (SCROLL DI SINI SAJA) --}}
            <div class="flex-1 px-10 pb-8 pt-1 space-y-6 overflow-y-auto">

                {{-- ================== HERO ARMADA + PROFIL SOPIR ================== --}}
                <section
                    class="bg-[#e3f1f6] rounded-[34px] shadow-soft px-8 py-6 flex flex-col xl:flex-row gap-6 items-stretch relative overflow-hidden">

                    {{-- aksen kiri --}}
                    <div
                        class="absolute -left-12 top-0 h-full w-40 bg-gradient-to-b from-[#6fd2f3] to-[#0b6687] opacity-20 pointer-events-none">
                    </div>

                    {{-- FOTO ARMADA --}}
                    <div class="w-full xl:w-[330px] flex items-center relative z-10">
                        <div
                            class="w-full h-[190px] bg-white rounded-[30px] shadow-soft overflow-hidden flex items-center justify-center">
                            @if (!empty($travel) && !empty($travel->foto_armada))
                                <img src="{{ asset('storage/' . $travel->foto_armada) }}" alt="Armada"
                                    class="w-full h-full object-cover">
                            @else
                                <img src="{{ !empty($fotoArmada) ? asset('file/' . rawurlencode($fotoArmada)) : asset('images/mobil1.jpg') }}"
                                    alt="Armada" class="w-full h-full object-cover object-center" />
                            @endif
                        </div>
                    </div>

                    {{-- INFO SOPIR + ARMADA --}}
                    <div class="flex-1 flex flex-col justify-between gap-4 relative z-10">
                        <div>
                            <h2 class="text-3xl font-semibold text-[#0c607f] mb-1">
                                Halo {{ Auth::user()->name }}! Selamat Datang
                            </h2>
                            <p class="text-sm text-slate-600 leading-relaxed">
                                Kelola jadwal, rute, dan penumpangmu dengan nyaman. Pastikan informasi
                                armada dan rute selalu terbaru agar penumpang mudah menemukan layananmu.
                            </p>
                        </div>

                        {{-- INFO ARMADA --}}
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-y-1 gap-x-6 text-sm text-[#0c607f] mt-2">
                            <div class="flex gap-2">
                                <span class="font-semibold min-w-[70px]">Armada</span>
                                <span>: {{ $namaArmada ?? 'Belum diisi' }}</span>
                            </div>
                            <div class="flex gap-2">
                                <span class="font-semibold min-w-[70px]">TNKB</span>
                                <span>: {{ $platNomor ?? 'Belum diisi' }}</span>
                            </div>
                            <div class="flex gap-2">
                                <span class="font-semibold min-w-[70px]">Warna</span>
                                <span>: {{ $warnaArmada ?? 'Belum diisi' }}</span>
                            </div>
                        </div>

                        {{-- 3 info kecil di bawah judul --}}
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-3 mt-4">
                            <div
                                class="bg-white/80 rounded-2xl px-4 py-2.5 shadow-soft text-xs flex items-center justify-between">
                                <div>
                                    <p class="text-[11px] text-slate-500">Perjalanan Hari Ini</p>
                                    <p class="text-lg font-semibold text-[#0c607f]">
                                        {{ $tripHariIni ?? 0 }}
                                    </p>
                                </div>
                                <span
                                    class="inline-flex items-center justify-center h-7 w-7 rounded-full bg-[#e0f7ff] text-[#0c607f]">
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="1.8">
                                        <path d="M3 7h18l-1.5 9a2 2 0 0 1-2 1.7H6.5a2 2 0 0 1-2-1.7L3 7Z"></path>
                                        <path d="M6 7V5a3 3 0 0 1 3-3h6a3 3 0 0 1 3 3v2"></path>
                                    </svg>
                                </span>
                            </div>

                            <div
                                class="bg-white/80 rounded-2xl px-4 py-2.5 shadow-soft text-xs flex items-center justify-between">
                                <div>
                                    <p class="text-[11px] text-slate-500">Penumpang Bulan Ini</p>
                                    <p class="text-lg font-semibold text-[#0c607f]">
                                        {{ $penumpangBulanIni ?? 0 }}
                                    </p>
                                </div>
                                <span
                                    class="inline-flex items-center justify-center h-7 w-7 rounded-full bg-[#e0f7ff] text-[#0c607f]">
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="1.8">
                                        <circle cx="9" cy="8" r="3"></circle>
                                        <path d="M16 21a7 7 0 0 0-14 0"></path>
                                    </svg>
                                </span>
                            </div>

                            <div
                                class="bg-white/80 rounded-2xl px-4 py-2.5 shadow-soft text-xs flex items-center justify-between">
                                <div>
                                    <p class="text-[11px] text-slate-500">Rating Rata-rata</p>
                                    <p class="text-lg font-semibold text-[#0c607f]">
                                        {{ number_format($ratingRata ?? 0, 1) }}<span class="text-xs">/5</span>
                                    </p>
                                </div>
                                <span
                                    class="inline-flex items-center justify-center h-7 w-7 rounded-full bg-[#ffeccd] text-[#d97706]">
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="1.8">
                                        <polygon
                                            points="12 2 15 8.5 22 9.3 17 14 18.3 21 12 17.8 5.7 21 7 14 2 9.3 9 8.5 12 2">
                                        </polygon>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </section>

                {{-- ================== RUTE AKTIF & ULASAN ================== --}}
                <section class="grid grid-cols-1 xl:grid-cols-3 gap-5">

                    {{-- Rute utama / perjalanan berikutnya --}}
                    <div
                        class="bg-gradient-to-r from-[#6ecff1] via-[#2a9ac5] to-[#005c7d] rounded-[32px] shadow-soft px-6 py-5 text-white flex flex-col gap-4">

                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <div
                                    class="h-9 w-9 rounded-full bg-white/20 border border-white/40 grid place-items-center">
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="1.8">
                                        <path d="M3 7h18l-1.5 9a2 2 0 0 1-2 1.7H6.5a2 2 0 0 1-2-1.7L3 7Z"></path>
                                        <path d="M6 7V5a3 3 0 0 1 3-3h6a3 3 0 0 1 3 3v2"></path>
                                    </svg>
                                </div>
                                <div class="font-semibold text-sm">
                                    Rute Utama
                                </div>
                            </div>
                            @if ($jamBerangkat && $kotaAsal && $kotaTujuan)
                                <span class="text-[10px] bg-white/20 px-2 py-1 rounded-full">
                                    Hari Ini
                                </span>
                            @endif
                        </div>

                        @if ($jamBerangkat && $kotaAsal && $kotaTujuan)
                            <div class="flex items-center gap-3 text-xs">
                                <div class="flex items-center gap-1.5">
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="1.8">
                                        <circle cx="12" cy="12" r="9"></circle>
                                        <path d="M12 7v5l3 3"></path>
                                    </svg>
                                    <span>{{ $jamBerangkat }}</span>
                                </div>
                                @if ($estimasiWaktu)
                                    <div class="flex items-center gap-1.5 text-[11px] text-white/80">
                                        <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="1.8">
                                            <path d="M3 12h18"></path>
                                            <path d="m14 9 3 3-3 3"></path>
                                        </svg>
                                        <span>{{ $estimasiWaktu }}</span>
                                    </div>
                                @endif
                            </div>

                            <div class="space-y-3 text-sm font-medium mt-1">
                                <div class="flex items-center gap-2">
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="1.8">
                                        <path d="M12 21s-6-4.35-6-10a6 6 0 1 1 12 0c0 5.65-6 10-6 10Z"></path>
                                        <circle cx="12" cy="11" r="2.5"></circle>
                                    </svg>
                                    <span>{{ $kotaAsal }}</span>
                                </div>

                                <div class="flex items-center gap-2 pl-1">
                                    <div class="flex flex-col gap-1">
                                        <span class="h-1 w-1 rounded-full bg-white/60"></span>
                                        <span class="h-1 w-1 rounded-full bg-white/60"></span>
                                        <span class="h-1 w-1 rounded-full bg-white/60"></span>
                                    </div>
                                </div>

                                <div class="flex items-center gap-2">
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="1.8">
                                        <path d="M12 21s-6-4.35-6-10a6 6 0 1 1 12 0c0 5.65-6 10-6 10Z"></path>
                                        <circle cx="12" cy="11" r="2.5"></circle>
                                    </svg>
                                    <span>{{ $kotaTujuan }}</span>
                                </div>
                            </div>
                        @else
                            <p class="text-xs text-white/90 mt-1">
                                Belum ada jadwal untuk hari ini.
                            </p>
                            <a href="{{ route('sopir.travel') }}"
                                class="mt-2 inline-flex items-center gap-2 text-[11px] bg-white/15 px-3 py-1.5 rounded-full hover:bg-white/25 transition w-fit">
                                <span>Tambah Jadwal</span>
                                <svg class="h-3 w-3" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.8">
                                    <path d="M5 12h14"></path>
                                    <path d="m13 6 6 6-6 6"></path>
                                </svg>
                            </a>
                        @endif
                    </div>

                    {{-- Rute tambahan / rute kedua --}}
                    <div class="bg-[#8fd4f0] rounded-[32px] shadow-soft px-6 py-5 text-[#0a5672] flex flex-col gap-4">

                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <div
                                    class="h-9 w-9 rounded-full bg-white/80 border border-white grid place-items-center text-[#0a5672]">
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="1.8">
                                        <path d="M3 7h18l-1.5 9a2 2 0 0 1-2 1.7H6.5a2 2 0 0 1-2-1.7L3 7Z"></path>
                                        <path d="M6 7V5a3 3 0 0 1 3-3h6a3 3 0 0 1 3 3v2"></path>
                                    </svg>
                                </div>
                                <div class="font-semibold text-sm">Rute Tambahan</div>
                            </div>
                            <span class="text-[10px] text-[#0a5672]/80">
                                {{ $statusRuteTambahan ?? 'Belum ada' }}
                            </span>
                        </div>

                        @if ($jamBerangkat2 && $kotaAsal2 && $kotaTujuan2)
                            <div class="flex items-center gap-3 text-xs">
                                <div class="flex items-center gap-1.5">
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="1.8">
                                        <circle cx="12" cy="12" r="9"></circle>
                                        <path d="M12 7v5l3 3"></path>
                                    </svg>
                                    <span>{{ $jamBerangkat2 }}</span>
                                </div>
                            </div>

                            <div class="space-y-3 text-sm font-medium">
                                <div class="flex items-center gap-2">
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="1.8">
                                        <path d="M12 21s-6-4.35-6-10a6 6 0 1 1 12 0c0 5.65-6 10-6 10Z"></path>
                                        <circle cx="12" cy="11" r="2.5"></circle>
                                    </svg>
                                    <span>{{ $kotaAsal2 }}</span>
                                </div>

                                <div class="flex items-center gap-2 pl-1">
                                    <div class="flex flex-col gap-1">
                                        <span class="h-1 w-1 rounded-full bg-[#0a5672]/60"></span>
                                        <span class="h-1 w-1 rounded-full bg-[#0a5672]/60"></span>
                                        <span class="h-1 w-1 rounded-full bg-[#0a5672]/60"></span>
                                    </div>
                                </div>

                                <div class="flex items-center gap-2">
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="1.8">
                                        <path d="M12 21s-6-4.35-6-10a6 6 0 1 1 12 0c0 5.65-6 10-6 10Z"></path>
                                        <circle cx="12" cy="11" r="2.5"></circle>
                                    </svg>
                                    <span>{{ $kotaTujuan2 }}</span>
                                </div>
                            </div>
                        @else
                            <p class="text-xs text-[#0a5672]/80 mt-2">
                                Belum ada rute tambahan.
                            </p>
                        @endif
                    </div>

                    {{-- Ulasan Masuk --}}
                    <div
                        class="bg-[#e7eff4] rounded-[32px] shadow-soft flex flex-col items-center justify-center py-6 text-[#0c607f]">
                        <div class="flex items-center gap-2 mb-2">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.8">
                                <path
                                    d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5Z">
                                </path>
                            </svg>
                            <span class="text-sm font-semibold">Ulasan Masuk</span>
                        </div>
                        <div class="text-4xl font-extrabold leading-none mt-1">
                            {{ $totalUlasan ?? 0 }}
                        </div>
                        <p class="text-[11px] text-slate-500 mt-2 text-center px-4">
                            Jaga pelayanan terbaik agar rating tetap tinggi.
                        </p>
                    </div>
                </section>

                {{-- ================== QUICK ACTIONS & CUACA ================== --}}
                <section class="grid grid-cols-1 xl:grid-cols-2 gap-5">

                    {{-- Quick Actions --}}
                    <div class="bg-white rounded-[32px] shadow-soft px-6 py-5">
                        <div class="flex items-center gap-2 mb-4">
                            <div class="h-9 w-9 rounded-full bg-[#e0f7ff] grid place-items-center">
                                <svg class="h-4 w-4 text-[#0c607f]" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.8">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <path d="m8 12 2 2 4-4"></path>
                                </svg>
                            </div>
                            <span class="text-sm font-semibold text-[#0c607f]">Aksi Cepat</span>
                        </div>

                        <div class="grid grid-cols-3 gap-3">
                            <a href="{{ route('sopir.travel') }}"
                                class="bg-gradient-to-br from-[#6ecff1] to-[#2a9ac5] rounded-2xl p-4 text-white hover:shadow-lg transition-all duration-300 hover:scale-105 flex flex-col items-center justify-center gap-2 text-center min-h-[100px]">
                                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <path d="M12 5v14M5 12h14"></path>
                                </svg>
                                <span class="text-xs font-semibold">Tambah Jadwal</span>
                            </a>

                            <a href="{{ route('sopir.travel') }}"
                                class="bg-gradient-to-br from-[#8fd4f0] to-[#5fb7cf] rounded-2xl p-4 text-white hover:shadow-lg transition-all duration-300 hover:scale-105 flex flex-col items-center justify-center gap-2 text-center min-h-[100px]">
                                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <path d="M3 7h18l-1.5 9a2 2 0 0 1-2 1.7H6.5a2 2 0 0 1-2-1.7L3 7Z"></path>
                                    <path d="M6 7V5a3 3 0 0 1 3-3h6a3 3 0 0 1 3 3v2"></path>
                                </svg>
                                <span class="text-xs font-semibold">Lihat Travel</span>
                            </a>

                            <a href="{{ route('sopir.bantuan') }}"
                                class="bg-gradient-to-br from-[#a8d5ea] to-[#75d0f0] rounded-2xl p-4 text-white hover:shadow-lg transition-all duration-300 hover:scale-105 flex flex-col items-center justify-center gap-2 text-center min-h-[100px]">
                                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 2-3 4"></path>
                                    <line x1="12" y1="17" x2="12.01" y2="17"></line>
                                </svg>
                                <span class="text-xs font-semibold">Pusat Bantuan</span>
                            </a>
                        </div>
                    </div>

                    {{-- Cuaca Hari Ini --}}
                    <div
                        class="bg-gradient-to-br from-[#fef3c7] via-[#fde68a] to-[#fcd34d] rounded-[32px] shadow-soft px-6 py-5 text-[#78350f] relative overflow-hidden">
                        {{-- Dekorasi matahari --}}
                        <div class="absolute -top-8 -right-8 w-32 h-32 bg-yellow-300 rounded-full opacity-20"></div>

                        <div class="relative z-10">
                            <div class="flex items-center justify-between mb-3">
                                <div class="flex items-center gap-2">
                                    <div class="h-9 w-9 rounded-full bg-white/50 grid place-items-center">
                                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="1.8">
                                            <circle cx="12" cy="12" r="5"></circle>
                                            <path
                                                d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42">
                                            </path>
                                        </svg>
                                    </div>
                                    <span class="text-sm font-semibold">Cuaca Hari Ini</span>
                                </div>
                            </div>

                            <div id="cuaca-content" class="flex items-center justify-between">
                                <div>
                                    <div class="flex items-baseline gap-1">
                                        <span id="cuaca-temp" class="text-4xl font-extrabold">--</span>
                                        <span class="text-2xl">°C</span>
                                    </div>
                                    <p id="cuaca-kota" class="text-sm font-medium mt-1">Loading...</p>
                                </div>
                                <div class="text-center">
                                    <div id="cuaca-icon" class="text-5xl mb-1">🌤️</div>
                                    <p id="cuaca-desc" class="text-xs font-medium">--</p>
                                </div>
                            </div>

                            <div id="cuaca-detail"
                                class="grid grid-cols-2 gap-3 mt-4 pt-4 border-t border-yellow-800/20">
                                <div class="flex items-center gap-2 text-xs">
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="1.8">
                                        <path
                                            d="M9.59 4.59A2 2 0 1 1 11 8H2m10.59 11.41A2 2 0 1 0 14 16H2m15.73-8.27A2.5 2.5 0 1 1 19.5 12H2">
                                        </path>
                                    </svg>
                                    <span>Angin: <strong id="cuaca-wind">--</strong> km/h</span>
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="1.8">
                                        <path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path>
                                    </svg>
                                    <span>Kelembaban: <strong id="cuaca-humidity">--</strong>%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                {{-- ================== BAGIAN BAWAH: ULASAN ================== --}}
                <section class="flex justify-center" style="display: none;">
                    {{-- Section ini dihidden karena sudah dipindah ke atas --}}
                </section>

                {{-- ERROR DB JIKA ADA --}}
                @if (!empty($dbError))
                    <section>
                        <div class="p-3 rounded-xl bg-red-50 border border-red-200 text-xs text-red-700">
                            Koneksi database mengalami masalah: {{ $dbError }}
                        </div>
                    </section>
                @endif
            </div>
        </main>
    </div>


</body>

</html>

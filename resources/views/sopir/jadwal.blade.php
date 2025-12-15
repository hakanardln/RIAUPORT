<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>RiauPort – Jadwal Sopir</title>
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

        .glass {
            backdrop-filter: blur(12px);
            background: rgba(255, 255, 255, 0.45);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .shadow-soft {
            box-shadow: 0 12px 24px rgba(0, 0, 0, .16);
        }

        .shadow-pill {
            box-shadow: 0 8px 16px rgba(0, 0, 0, .18);
        }

        /* Animasi untuk notifikasi */
        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .notification {
            animation: slideIn 0.3s ease-out;
        }
    </style>
</head>

<body class="h-screen overflow-hidden bg-[#f5fafc] text-slate-800">
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
                    class="{{ $baseLink }} {{ request()->routeIs('sopir.jadwal*') ? 'bg-white text-[#0b5f80] ring-2 ring-white/70' : 'bg-white text-[#0b5f80] hover:bg-white/90 transition' }}">
                    <div
                        class="{{ $baseIcon }} {{ request()->routeIs('sopir.jadwal*') ? 'bg-[#0b5f80] text-white' : 'bg-[#e7f5fb] text-[#0b5f80]' }}">
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

                {{-- Bantuan --}}
                <a href="{{ route('sopir.bantuan') }}"
                    class="{{ $baseLink }} bg-white text-[#0b5f80] hover:bg-white/90 transition">
                    <div class="{{ $baseIcon }} bg-[#e7f5fb] text-[#0b5f80]">
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

        {{-- MAIN CONTENT : HALAMAN JADWAL --}}
        <main class="flex-1 h-full flex flex-col">
            {{-- HEADER ATAS --}}
            <header class="flex items-center justify-between px-10 pt-6 pb-4">
                <div>
                    <h1 class="text-3xl font-semibold tracking-tight text-[#0c607f]">Jadwal Keberangkatan</h1>
                    <p class="text-sm text-slate-500 mt-1">Kelola jadwal keberangkatan travelmu di sini.</p>
                </div>
                <div class="flex items-center gap-3">
                    <div class="text-right">
                        <p class="text-sm font-semibold text-[#0c607f]">{{ Auth::user()->name }}</p>
                        <p class="text-[11px] text-emerald-600 flex items-center justify-end gap-1">
                            <span class="h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span>
                            Online
                        </p>
                    </div>
                    <div class="h-10 w-10 rounded-full bg-[#5fb7cf] grid place-items-center">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" stroke-width="1.8">
                            <circle cx="12" cy="8" r="4"></circle>
                            <path d="M4 22a8 8 0 0 1 16 0"></path>
                        </svg>
                    </div>
                </div>
            </header>

            {{-- NOTIFIKASI SUCCESS/ERROR --}}
            @if (session('success'))
                <div id="notification"
                    class="notification fixed top-6 right-6 z-50 bg-white shadow-[0_3px_10px_-3px_rgba(6,81,237,0.3)] text-slate-900 flex items-center min-w-xs max-w-md p-4 rounded-md"
                    role="alert">
                    <div class="shrink-0 mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-green-600 inline"
                            viewBox="0 0 512 512">
                            <ellipse cx="246" cy="246" rx="246" ry="246" />
                            <path class="fill-white"
                                d="m235.472 392.08-121.04-94.296 34.416-44.168 74.328 57.904 122.672-177.016 46.032 31.888z" />
                        </svg>
                    </div>
                    <span class="text-[15px] font-medium tracking-wide">{{ session('success') }}</span>
                    <button onclick="document.getElementById('notification').remove()"
                        class="ml-4 text-slate-400 hover:text-slate-600">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <script>
                    setTimeout(() => {
                        const notif = document.getElementById('notification');
                        if (notif) {
                            notif.style.opacity = '0';
                            notif.style.transform = 'translateX(100%)';
                            notif.style.transition = 'all 0.3s ease-out';
                            setTimeout(() => notif.remove(), 300);
                        }
                    }, 4000);
                </script>
            @endif

            @if (session('error'))
                <div id="notification"
                    class="notification fixed top-6 right-6 z-50 bg-white shadow-[0_3px_10px_-3px_rgba(6,81,237,0.3)] text-slate-900 flex items-center min-w-xs max-w-md p-4 rounded-md"
                    role="alert">
                    <div class="shrink-0 mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-red-600 inline"
                            viewBox="0 0 32 32">
                            <path
                                d="M16 1a15 15 0 1 0 15 15A15 15 0 0 0 16 1zm6.36 20L21 22.36l-5-4.95-4.95 4.95L9.64 21l4.95-5-4.95-4.95 1.41-1.41L16 14.59l5-4.95 1.41 1.41-5 4.95z" />
                        </svg>
                    </div>
                    <span class="text-[15px] font-medium tracking-wide">{{ session('error') }}</span>
                    <button onclick="document.getElementById('notification').remove()"
                        class="ml-4 text-slate-400 hover:text-slate-600">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <script>
                    setTimeout(() => {
                        const notif = document.getElementById('notification');
                        if (notif) {
                            notif.style.opacity = '0';
                            notif.style.transform = 'translateX(100%)';
                            notif.style.transition = 'all 0.3s ease-out';
                            setTimeout(() => notif.remove(), 300);
                        }
                    }, 4000);
                </script>
            @endif

            {{-- KONTEN JADWAL --}}
            <div class="flex-1 px-10 pb-8 pt-1 space-y-6 overflow-y-auto">
                {{-- Search --}}
                <div class="flex justify-end mb-5">
                    <input type="text" id="searchInput" placeholder="Cari jadwal..."
                        class="px-5 py-3 glass rounded-full shadow-soft w-64" onkeyup="filterJadwal()">
                </div>

                {{-- MODAL KONFIRMASI HAPUS --}}
                <div id="deleteModal" class="hidden">
                    <div
                        class="fixed inset-0 p-4 flex flex-wrap justify-center items-center w-full h-full z-[1000] before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] overflow-auto">
                        <div class="w-full max-w-md bg-white shadow-lg rounded-xl p-6 relative">
                            <svg id="closeModalIcon" xmlns="http://www.w3.org/2000/svg"
                                class="w-3.5 h-3.5 cursor-pointer shrink-0 fill-gray-400 hover:fill-red-500 float-right"
                                viewBox="0 0 320.591 320.591">
                                <path
                                    d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643 10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0 1-21.256 7.288z"
                                    data-original="#000000"></path>
                                <path
                                    d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0 1-23.078 7.288z"
                                    data-original="#000000"></path>
                            </svg>
                            <div class="mt-6">
                                <div class="w-14 h-14 p-3.5 rounded-full bg-red-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-full h-full fill-red-500 inline"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M19 7a1 1 0 0 0-1 1v11.191A1.92 1.92 0 0 1 15.99 21H8.01A1.92 1.92 0 0 1 6 19.191V8a1 1 0 0 0-2 0v11.191A3.918 3.918 0 0 0 8.01 23h7.98A3.918 3.918 0 0 0 20 19.191V8a1 1 0 0 0-1-1Zm1-3h-4V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v2H4a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM10 4V3h4v1Z"
                                            data-original="#000000" />
                                        <path
                                            d="M11 17v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Zm4 0v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Z"
                                            data-original="#000000" />
                                    </svg>
                                </div>
                                <div class="mt-4">
                                    <h3 class="text-slate-900 text-lg font-semibold">Hapus Jadwal?</h3>
                                    <p class="text-slate-600 text-sm mt-2">Apakah Anda yakin ingin menghapus jadwal
                                        <strong id="deleteJadwalInfo"></strong>? Tindakan ini tidak dapat dibatalkan.
                                    </p>
                                </div>
                                <div class="flex gap-4 mt-8">
                                    <button id="cancelDeleteBtn" type="button"
                                        class="px-5 py-2.5 rounded-md cursor-pointer w-full text-slate-900 text-sm font-medium bg-gray-200 hover:bg-gray-300 active:bg-gray-200">
                                        Batal
                                    </button>
                                    <button id="confirmDeleteBtn" type="button"
                                        class="px-5 py-2.5 rounded-md cursor-pointer w-full text-white text-sm font-medium bg-red-600 hover:bg-red-700 active:bg-red-600">
                                        Ya, Hapus
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Form Hapus Hidden --}}
                <form id="deleteForm" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>

                {{-- PESAN JIKA BELUM ADA JADWAL --}}
                @if (isset($jadwals) && $jadwals->isEmpty())
                    <div class="glass shadow-soft rounded-3xl p-12 text-center">
                        <div class="h-20 w-20 rounded-full bg-slate-200 grid place-items-center mx-auto mb-4">
                            <svg class="h-10 w-10 text-slate-400" fill="none" stroke="currentColor"
                                stroke-width="1.5">
                                <rect x="3" y="4" width="18" height="18" rx="2"></rect>
                                <path d="M16 2v4M8 2v4M3 10h18"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-slate-700 mb-2">Belum Ada Jadwal</h3>
                        <p class="text-slate-500 mb-6">Anda belum menambahkan jadwal keberangkatan. Klik tombol + di
                            bawah untuk menambahkan jadwal pertama Anda.</p>
                        <a href="{{ route('sopir.jadwal.create') }}"
                            class="inline-block px-6 py-3 bg-[#0e586d] text-white rounded-xl font-semibold hover:bg-[#0a4453] transition">
                            + Tambah Jadwal Pertama
                        </a>
                    </div>
                @elseif(isset($jadwals))
                    {{-- LIST CARD JADWAL --}}
                    <div id="jadwalContainer" class="grid md:grid-cols-2 gap-6">
                        {{-- LOOP JADWAL --}}
                        @foreach ($jadwals as $item)
                            <div class="jadwal-card glass shadow-soft rounded-3xl p-6 hover:scale-[1.02] transition"
                                data-search="{{ strtolower($item->lokasi_asal . ' ' . $item->lokasi_tujuan . ' ' . $item->armada . ' ' . $item->plat_nomor) }}">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h2 class="text-xl font-bold text-[#0e586d]">
                                            {{ $item->lokasi_asal }} → {{ $item->lokasi_tujuan }}
                                        </h2>
                                        <p class="text-gray-700 text-sm">
                                            {{ $item->armada ?? 'Mobil' }} • {{ $item->warna ?? '-' }} •
                                            {{ $item->plat_nomor ?? '-' }}
                                        </p>
                                    </div>
                                    @if ($item->status === 'aktif')
                                        <span
                                            class="px-3 py-1 bg-emerald-100 text-emerald-700 text-xs font-semibold rounded-full">Aktif</span>
                                    @else
                                        <span
                                            class="px-3 py-1 bg-slate-200 text-slate-600 text-xs font-semibold rounded-full">Non-aktif</span>
                                    @endif
                                </div>

                                <div class="border-b my-4"></div>

                                <div class="space-y-3 text-sm text-gray-700">
                                    <div class="flex items-center gap-3">
                                        <span class="font-semibold w-28">Berangkat:</span>
                                        <span>{{ \Carbon\Carbon::parse($item->tanggal_berangkat)->format('d M Y') }} •
                                            {{ $item->jam_berangkat }}</span>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <span class="font-semibold w-28">Harga:</span>
                                        <span>Rp {{ number_format($item->harga_per_orang, 0, ',', '.') }}</span>
                                    </div>
                                    @if ($item->keterangan)
                                        <div class="flex items-start gap-3">
                                            <span class="font-semibold w-28">Keterangan:</span>
                                            <span class="flex-1">{{ $item->keterangan }}</span>
                                        </div>
                                    @endif
                                </div>

                                <div class="mt-6 flex justify-between gap-3">
                                    <a href="{{ route('sopir.jadwal.edit', $item->id) }}"
                                        class="flex-1 px-5 py-2 bg-[#0e586d] text-white rounded-xl text-sm text-center font-semibold hover:bg-[#0a4453] transition">
                                        Edit
                                    </a>
                                    <button type="button"
                                        onclick="openDeleteModal({{ $item->id }}, '{{ $item->lokasi_asal }} → {{ $item->lokasi_tujuan }}')"
                                        class="flex-1 px-5 py-2 bg-red-500 text-white rounded-xl text-sm font-semibold hover:bg-red-600 transition">
                                        Hapus
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- PESAN JIKA HASIL PENCARIAN KOSONG --}}
                    <div id="noResults" class="hidden glass shadow-soft rounded-3xl p-12 text-center">
                        <div class="h-20 w-20 rounded-full bg-slate-200 grid place-items-center mx-auto mb-4">
                            <svg class="h-10 w-10 text-slate-400" fill="none" stroke="currentColor"
                                stroke-width="1.5">
                                <circle cx="11" cy="11" r="8"></circle>
                                <path d="m21 21-4.35-4.35"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-slate-700 mb-2">Tidak Ada Hasil</h3>
                        <p class="text-slate-500">Tidak ditemukan jadwal yang sesuai dengan pencarian Anda.</p>
                    </div>
                @endif

                {{-- FLOATING BUTTON TAMBAH --}}
                <a href="{{ route('sopir.jadwal.create') }}"
                    class="fixed bottom-10 right-10 w-16 h-16 rounded-full bg-[#0e586d] text-white text-4xl grid place-items-center shadow-xl hover:bg-[#0a4453] hover:scale-110 transition-all"
                    title="Tambah Jadwal Baru">
                    +
                </a>
            </div>
        </main>
    </div>

    {{-- SCRIPT PENCARIAN --}}
    <script>
        function filterJadwal() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const cards = document.querySelectorAll('.jadwal-card');
            const noResults = document.getElementById('noResults');
            let visibleCount = 0;

            cards.forEach(card => {
                const searchData = card.getAttribute('data-search');
                if (searchData.includes(searchTerm)) {
                    card.style.display = 'block';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            // Tampilkan pesan jika tidak ada hasil
            if (visibleCount === 0 && searchTerm !== '') {
                noResults.classList.remove('hidden');
            } else {
                noResults.classList.add('hidden');
            }
        }

        // DELETE MODAL FUNCTIONALITY
        let deleteModal = document.getElementById('deleteModal');
        let deleteForm = document.getElementById('deleteForm');
        let deleteJadwalInfo = document.getElementById('deleteJadwalInfo');
        let closeModalIcon = document.getElementById('closeModalIcon');
        let cancelDeleteBtn = document.getElementById('cancelDeleteBtn');
        let confirmDeleteBtn = document.getElementById('confirmDeleteBtn');

        function openDeleteModal(jadwalId, jadwalRoute) {
            // Set form action ke route delete yang sesuai
            const baseUrl = window.location.origin;
            deleteForm.action = baseUrl + '/sopir/jadwal/' + jadwalId;

            // Set info jadwal di modal
            deleteJadwalInfo.textContent = jadwalRoute;

            // Tampilkan modal
            deleteModal.classList.remove('hidden');
        }

        function closeDeleteModal() {
            deleteModal.classList.add('hidden');
        }

        // Event listeners untuk close modal
        closeModalIcon.addEventListener('click', closeDeleteModal);
        cancelDeleteBtn.addEventListener('click', closeDeleteModal);

        // Close modal saat klik di luar modal content
        deleteModal.addEventListener('click', (event) => {
            if (event.target === deleteModal.firstElementChild) {
                closeDeleteModal();
            }
        });

        // Submit form saat konfirmasi delete
        confirmDeleteBtn.addEventListener('click', () => {
            deleteForm.submit();
        });
    </script>
</body>

</html>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>RiauPort – Notifikasi Sopir</title>

    <!-- FAVICON – sama seperti dashboard -->
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

        /* Scrollbar halus di konten */
        .scroll-area::-webkit-scrollbar {
            width: 8px;
        }

        .scroll-area::-webkit-scrollbar-track {
            background: transparent;
        }

        .scroll-area::-webkit-scrollbar-thumb {
            background: rgba(148, 163, 184, 0.7);
            border-radius: 999px;
        }

        .scroll-area::-webkit-scrollbar-thumb:hover {
            background: rgba(100, 116, 139, 0.9);
        }
    </style>
</head>

<body class="h-screen overflow-hidden bg-white text-slate-800">
    <div class="h-full flex">

        {{-- SIDEBAR (PERSIS DARI DASHBOARD) --}}
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

                {{-- Notifikasi (HALAMAN INI) --}}
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

                {{-- Bantuan (belum route) --}}
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

        {{-- MAIN CONTENT --}}
        <main class="flex-1 h-full flex flex-col bg-[#f5fafc]">

            {{-- HEADER ATAS (SAMA STYLE, TEKS DIUBAH) --}}
            <header class="flex items-center justify-between px-10 pt-6 pb-4">
                <div>
                    <h1 class="text-3xl font-semibold tracking-tight text-[#0c607f]">Notifikasi</h1>
                    <p class="text-sm text-slate-500 mt-1">
                        Pantau pesan penting, ulasan, dan pengingat terkait akun dan perjalananmu.
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

            {{-- KONTEN NOTIFIKASI --}}
            <div class="flex-1 px-10 pb-8 pt-1 space-y-6 overflow-y-auto scroll-area">

                {{-- KARTU HEADER + FILTER --}}
                <section class="bg-white rounded-[32px] shadow-soft border border-slate-100 px-6 py-5 mb-2">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <div class="flex items-center gap-3">
                            <div class="bg-gradient-to-br from-blue-500 to-blue-600 p-3 rounded-xl shadow-soft">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-slate-800 leading-tight">Kotak Notifikasi</h2>
                                <p class="text-slate-500 text-sm" id="notif-count">
                                    {{ $unreadCount }} notifikasi belum dibaca
                                </p>
                            </div>
                        </div>

                        <div class="flex flex-col sm:flex-row gap-2">
                            <button onclick="toggleFilter()"
                                class="flex items-center justify-center gap-2 px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg hover:bg-slate-100 transition-colors text-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z">
                                    </path>
                                </svg>
                                <span>Filter</span>
                            </button>
                            <button onclick="markAllAsRead()"
                                class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors text-sm shadow-sm">
                                Tandai Semua Dibaca
                            </button>
                        </div>
                    </div>

                    {{-- FILTER OPTIONS --}}
                    <div id="filter-options" class="hidden mt-4 pt-4 border-t border-slate-100">
                        <div class="flex flex-wrap gap-2">
                            <button onclick="setFilter('all')"
                                class="filter-btn px-4 py-2 rounded-full text-xs md:text-sm font-medium transition-colors bg-blue-500 text-white"
                                data-filter="all">
                                Semua
                            </button>
                            <button onclick="setFilter('unread')"
                                class="filter-btn px-4 py-2 rounded-full text-xs md:text-sm font-medium transition-colors bg-gray-100 text-gray-700 hover:bg-gray-200"
                                data-filter="unread">
                                Belum Dibaca
                            </button>
                            <button onclick="setFilter('review')"
                                class="filter-btn px-4 py-2 rounded-full text-xs md:text-sm font-medium transition-colors bg-gray-100 text-gray-700 hover:bg-gray-200"
                                data-filter="review">
                                Ulasan
                            </button>
                            <button onclick="setFilter('warning')"
                                class="filter-btn px-4 py-2 rounded-full text-xs md:text-sm font-medium transition-colors bg-gray-100 text-gray-700 hover:bg-gray-200"
                                data-filter="warning">
                                Peringatan
                            </button>
                            <button onclick="setFilter('action')"
                                class="filter-btn px-4 py-2 rounded-full text-xs md:text-sm font-medium transition-colors bg-gray-100 text-gray-700 hover:bg-gray-200"
                                data-filter="action">
                                Tindakan
                            </button>
                            <button onclick="setFilter('reminder')"
                                class="filter-btn px-4 py-2 rounded-full text-xs md:text-sm font-medium transition-colors bg-gray-100 text-gray-700 hover:bg-gray-200"
                                data-filter="reminder">
                                Pengingat
                            </button>
                        </div>
                    </div>
                </section>

                {{-- LIST NOTIFIKASI --}}
                <section class="space-y-3" id="notifications-list">
                    @forelse ($reviews as $review)
                        {{-- Ulasan dari Database --}}
                        <div class="notification-item bg-white rounded-2xl shadow-soft border {{ $review->is_read ? 'border-slate-100 border-l-gray-300' : 'border-blue-100 border-l-blue-500 bg-blue-50/40' }} border-l-[6px] transition-all hover:shadow-lg"
                            data-type="review" data-read="{{ $review->is_read ? 'true' : 'false' }}" data-id="{{ $review->id }}">
                            <div class="p-5">
                                <div class="flex gap-4">
                                    <div class="flex-shrink-0 w-12 h-12 rounded-xl flex items-center justify-center bg-amber-100 text-amber-600">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                        </svg>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-start justify-between gap-2 mb-1">
                                            <h3 class="font-semibold text-gray-800 text-lg">Ulasan Baru dari Pelanggan</h3>
                                            @if (!$review->is_read)
                                                <span class="flex-shrink-0 w-2 h-2 bg-blue-500 rounded-full mt-2"></span>
                                            @endif
                                        </div>
                                        <p class="text-gray-600 mb-2">
                                            {{ $review->user->name ?? 'Pengguna' }} memberikan rating {{ $review->rating }} bintang untuk 
                                            <span class="font-medium">{{ $review->travel->armada ?? ($review->travel->lokasi_asal . ' → ' . $review->travel->lokasi_tujuan) }}</span>.
                                        </p>
                                        {{-- Bintang Rating --}}
                                        <div class="flex gap-1 mb-2">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $review->rating)
                                                    <svg class="w-4 h-4 fill-amber-400 text-amber-400" viewBox="0 0 24 24">
                                                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                                    </svg>
                                                @else
                                                    <svg class="w-4 h-4 fill-gray-300 text-gray-300" viewBox="0 0 24 24">
                                                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                                    </svg>
                                                @endif
                                            @endfor
                                        </div>
                                        {{-- Isi Ulasan --}}
                                        @if ($review->review)
                                            <div class="bg-gray-50 rounded-lg p-3 mb-3 text-sm text-gray-600 italic">
                                                "{{ Str::limit($review->review, 200) }}"
                                            </div>
                                        @endif
                                        {{-- Avatar dan Nama --}}
                                        <div class="flex items-center gap-2 mb-2">
                                            <div class="w-8 h-8 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center text-white text-xs font-semibold">
                                                {{ strtoupper(substr($review->user->name ?? 'A', 0, 2)) }}
                                            </div>
                                            <span class="text-sm text-gray-500">{{ $review->user->name ?? 'Anonim' }}</span>
                                        </div>
                                        <div class="flex items-center justify-between mt-3">
                                            <span class="text-sm text-gray-400">{{ $review->created_at->diffForHumans() }}</span>
                                            <div class="flex gap-2">
                                                @if (!$review->is_read)
                                                    <button onclick="markAsRead(this, {{ $review->id }})"
                                                        class="text-sm text-blue-600 hover:text-blue-700 font-medium">
                                                        Tandai Dibaca
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        {{-- Empty state --}}
                        <div class="bg-white rounded-2xl shadow-soft p-12 text-center border border-slate-100">
                            <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                            </svg>
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">Belum Ada Ulasan</h3>
                            <p class="text-gray-500">Ulasan dari pelanggan akan muncul di sini setelah mereka memberikan review untuk travel Anda.</p>
                        </div>
                    @endforelse
                </section>

            </div>
        </main>
    </div>

    <script>
        let currentFilter = 'all';

        function toggleFilter() {
            const filterOptions = document.getElementById('filter-options');
            filterOptions.classList.toggle('hidden');
        }

        function setFilter(filter) {
            currentFilter = filter;

            // Update button styles
            document.querySelectorAll('.filter-btn').forEach(btn => {
                if (btn.dataset.filter === filter) {
                    btn.className =
                        'filter-btn px-4 py-2 rounded-full text-xs md:text-sm font-medium transition-colors';
                    if (filter === 'all') btn.classList.add('bg-blue-500', 'text-white');
                    else if (filter === 'unread') btn.classList.add('bg-blue-500', 'text-white');
                    else if (filter === 'review') btn.classList.add('bg-amber-500', 'text-white');
                    else if (filter === 'warning') btn.classList.add('bg-red-500', 'text-white');
                    else if (filter === 'action') btn.classList.add('bg-blue-500', 'text-white');
                    else if (filter === 'reminder') btn.classList.add('bg-purple-500', 'text-white');
                } else {
                    btn.className =
                        'filter-btn px-4 py-2 rounded-full text-xs md:text-sm font-medium transition-colors bg-gray-100 text-gray-700 hover:bg-gray-200';
                }
            });

            // Filter notifikasi
            document.querySelectorAll('.notification-item').forEach(item => {
                const type = item.dataset.type;
                const isRead = item.dataset.read === 'true';

                let show = false;
                if (filter === 'all') show = true;
                else if (filter === 'unread') show = !isRead;
                else show = type === filter;

                item.style.display = show ? 'block' : 'none';
            });

            updateUnreadCount();
        }

        function markAsRead(button, reviewId) {
            // Send AJAX request to mark as read
            fetch(`{{ url('/sopir/notifikasi') }}/${reviewId}/read`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const notifItem = button.closest('.notification-item');
                    notifItem.classList.remove('border-l-blue-500', 'bg-blue-50/30', 'bg-blue-50/40', 'border-blue-100');
                    notifItem.classList.add('border-l-gray-300', 'border-slate-100');
                    notifItem.dataset.read = 'true';

                    const badge = notifItem.querySelector('.bg-blue-500.rounded-full');
                    if (badge) badge.remove();

                    button.remove();
                    updateUnreadCount();
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Gagal menandai sebagai dibaca. Silakan coba lagi.');
            });
        }

        function markAllAsRead() {
            // Send AJAX request to mark all as read
            fetch('{{ route("sopir.notifikasi.readAll") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.querySelectorAll('.notification-item[data-read="false"]').forEach(item => {
                        item.classList.remove('border-l-blue-500', 'bg-blue-50/30', 'bg-blue-50/40', 'border-blue-100');
                        item.classList.add('border-l-gray-300', 'border-slate-100');
                        item.dataset.read = 'true';

                        const badge = item.querySelector('.bg-blue-500.rounded-full');
                        if (badge) badge.remove();

                        const readBtn = item.querySelector('button[onclick^="markAsRead"]');
                        if (readBtn) readBtn.remove();
                    });
                    updateUnreadCount();
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Gagal menandai semua sebagai dibaca. Silakan coba lagi.');
            });
        }

        function updateUnreadCount() {
            const unreadCount = document.querySelectorAll('.notification-item[data-read="false"]').length;
            const countElement = document.getElementById('notif-count');
            countElement.textContent = unreadCount > 0 ?
                `${unreadCount} notifikasi belum dibaca` :
                'Semua notifikasi sudah dibaca';
        }
    </script>

</body>

</html>

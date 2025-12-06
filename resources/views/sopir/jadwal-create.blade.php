<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>RiauPort – Tambah Jadwal Sopir</title>

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
            background: rgba(255, 255, 255, 0.7);
            border: 1px solid rgba(255, 255, 255, 0.6);
        }

        .shadow-soft {
            box-shadow: 0 12px 24px rgba(0, 0, 0, .14);
        }

        .shadow-pill {
            box-shadow: 0 8px 16px rgba(0, 0, 0, .18);
        }

        .input-control {
            @apply w-full px-3 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-[#0e586d]/40 focus:border-[#0e586d];
        }

        .label-text {
            @apply text-xs font-semibold text-slate-600 mb-1.5;
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
                <a href "{{ route('sopir.personal') }}"
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
        <main class="flex-1 h-full flex flex-col">

            {{-- HEADER ATAS --}}
            <header class="flex items-center justify-between px-10 pt-6 pb-4">
                <div>
                    <div class="flex items-center gap-3">
                        <a href="{{ route('sopir.jadwal') }}"
                            class="inline-flex items-center justify-center h-8 w-8 rounded-full border border-slate-200 bg-white hover:bg-slate-50 transition">
                            <svg class="h-4 w-4 text-slate-500" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.8">
                                <path d="M15 18l-6-6 6-6"></path>
                            </svg>
                        </a>
                        <div>
                            <h1 class="text-3xl font-semibold tracking-tight text-[#0c607f]">Tambah Jadwal Baru</h1>
                            <p class="text-sm text-slate-500 mt-1">
                                Lengkapi detail keberangkatan travelmu di bawah ini.
                            </p>
                        </div>
                    </div>
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

            {{-- KONTEN FORM --}}
            <div class="flex-1 px-10 pb-8 pt-1 overflow-y-auto">

                <div class="max-w-3xl mx-auto">

                    {{-- ALERT SUCCESS --}}
                    @if (session('success'))
                        <div
                            class="mb-4 p-3 rounded-xl bg-emerald-50 border border-emerald-200 text-xs text-emerald-700">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- ALERT ERROR VALIDATION --}}
                    @if ($errors->any())
                        <div class="mb-4 p-3 rounded-xl bg-red-50 border border-red-200 text-xs text-red-700">
                            <div class="font-semibold mb-1">Terjadi kesalahan:</div>
                            <ul class="list-disc list-inside space-y-0.5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="glass shadow-soft rounded-[26px] px-7 py-6 relative overflow-hidden">

                        {{-- aksen background --}}
                        <div
                            class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-[#75d0f0]/40 pointer-events-none">
                        </div>
                        <div
                            class="absolute -left-16 bottom-0 h-40 w-40 rounded-full bg-[#37a6cc]/20 pointer-events-none">
                        </div>

                        <h2 class="text-xl font-semibold text-[#0e586d] mb-4 relative z-10">
                            Detail Jadwal Keberangkatan
                        </h2>

                        <form action="{{ route('sopir.jadwal.store') }}" method="POST"
                            class="space-y-5 relative z-10">
                            @csrf

                            {{-- BARIS 1: Asal & Tujuan --}}
                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <label class="label-text">Lokasi Asal</label>
                                    <input type="text" name="lokasi_asal" value="{{ old('lokasi_asal') }}"
                                        class="input-control" placeholder="Contoh: Bengkalis" required>
                                </div>
                                <div>
                                    <label class="label-text">Lokasi Tujuan</label>
                                    <input type="text" name="lokasi_tujuan" value="{{ old('lokasi_tujuan') }}"
                                        class="input-control" placeholder="Contoh: Pekanbaru" required>
                                </div>
                            </div>

                            {{-- BARIS 2: Tanggal & Jam --}}
                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <label class="label-text">Tanggal Berangkat</label>
                                    <input type="date" name="tanggal_berangkat"
                                        value="{{ old('tanggal_berangkat') }}" class="input-control" required>
                                </div>
                                <div>
                                    <label class="label-text">Jam Berangkat</label>
                                    <input type="time" name="jam_berangkat" value="{{ old('jam_berangkat') }}"
                                        class="input-control" required>
                                </div>
                            </div>

                            {{-- BARIS 3: Harga --}}
                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <label class="label-text">Harga Per Orang (Rp)</label>
                                    <input type="number" name="harga_per_orang" min="0"
                                        value="{{ old('harga_per_orang') }}" class="input-control"
                                        placeholder="Contoh: 150000" required>
                                </div>

                                <div>
                                    <label class="label-text">Status Jadwal</label>
                                    <select name="status" class="input-control">
                                        <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif
                                        </option>
                                        <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>
                                            Nonaktif
                                        </option>
                                    </select>
                                </div>
                            </div>

                            {{-- BARIS 4: Catatan Opsional --}}
                            <div>
                                <label class="label-text">Catatan (opsional)</label>
                                <textarea name="keterangan" rows="3" class="input-control"
                                    placeholder="Contoh: Titik kumpul di depan kampus, max. 2 koper per orang.">{{ old('keterangan') }}</textarea>
                            </div>

                            <div class="flex items-center justify-end gap-3 pt-2">
                                <a href="{{ route('sopir.jadwal') }}"
                                    class="px-4 py-2.5 rounded-xl text-xs font-medium border border-slate-200 text-slate-600 hover:bg-slate-50">
                                    Batal
                                </a>
                                <button type="submit"
                                    class="px-5 py-2.5 rounded-xl text-xs font-semibold bg-[#0e586d] text-white hover:bg-[#0a4453] shadow-md">
                                    Simpan Jadwal
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </main>
    </div>
</body>

</html>

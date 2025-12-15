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

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "SF Pro Text", sans-serif;
        }

        .glass {
            backdrop-filter: blur(14px);
            background: rgba(255, 255, 255, 0.75);
            border: 1px solid rgba(255, 255, 255, 0.55);
        }

        .shadow-pill {
            box-shadow: 0 8px 16px rgba(0, 0, 0, .18);
        }

        .input-control {
            width: 100%;
            padding: 0.75rem 1rem;
            border-radius: 0.75rem;
            border: 2px solid #e2e8f0;
            background: #fff;
            font-size: 0.875rem;
            color: #0f172a;
            transition: border-color .25s ease, box-shadow .25s ease, background-color .25s ease;
        }

        .input-control::placeholder {
            color: #94a3b8;
        }

        .input-control:focus {
            outline: none;
            border-color: #0e586d;
            box-shadow: 0 0 0 4px rgba(14, 88, 109, .18);
            background: #ffffff;
        }

        .label-text {
            display: block;
            font-size: 0.8rem;
            font-weight: 600;
            color: #475569;
            margin-bottom: 0.2rem;
        }
    </style>

</head>

<body class="h-screen overflow-hidden bg-[#f5fafc] text-slate-800">
    <div class="h-full flex">

        {{-- ================= SIDEBAR (sama seperti halaman jadwal) ================= --}}
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

                {{-- Jadwal (aktif) --}}
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

        {{-- ================= MAIN CONTENT ================= --}}
        <main class="flex-1 h-full flex flex-col">

            {{-- HEADER --}}
            <header class="flex items-center justify-between px-10 pt-6 pb-4">
                <div class="flex items-center gap-4">
                    <a href="{{ route('sopir.jadwal') }}"
                        class="h-9 w-9 rounded-full border border-slate-200 bg-white hover:bg-slate-50 transition flex items-center justify-center">
                        <svg class="h-4 w-4 text-slate-600" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <path d="M15 18l-6-6 6-6"></path>
                        </svg>
                    </a>
                    <div>
                        <h1 class="text-3xl font-semibold text-[#0c607f]">Tambah Jadwal Baru</h1>
                        <p class="text-sm text-slate-500 mt-1">
                            Lengkapi detail keberangkatan travelmu di sini.
                        </p>
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
                        <svg class="h-6 w-6 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <circle cx="12" cy="8" r="4"></circle>
                            <path d="M4 22a8 8 0 0 1 16 0"></path>
                        </svg>
                    </div>
                </div>
            </header>

            {{-- FORM --}}
            <div class="flex-1 px-10 pb-10 pt-2 overflow-y-auto">
                <div class="max-w-3xl mx-auto glass rounded-3xl shadow-xl px-8 py-7 relative">

                    <div class="absolute -right-12 -top-12 h-40 w-40 bg-[#75d0f0]/30 rounded-full blur-2xl"></div>
                    <div class="absolute -left-16 bottom-0 h-48 w-48 bg-[#37a6cc]/20 rounded-full blur-2xl"></div>

                    <h2 class="text-xl font-semibold text-[#0e586d] mb-6 relative z-10">
                        Detail Jadwal Keberangkatan
                    </h2>

                    <form action="{{ route('sopir.jadwal.store') }}" method="POST" class="space-y-6 relative z-10">
                        @csrf

                        <div class="grid md:grid-cols-2 gap-5">
                            <div>
                                <label class="label-text">Lokasi Asal</label>
                                <input type="text" name="lokasi_asal" class="input-control"
                                    placeholder="Contoh: Bengkalis" required>
                            </div>
                            <div>
                                <label class="label-text">Lokasi Tujuan</label>
                                <input type="text" name="lokasi_tujuan" class="input-control"
                                    placeholder="Contoh: Pekanbaru" required>
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-5">
                            <div>
                                <label class="label-text">Tanggal Berangkat</label>
                                <input type="date" name="tanggal_berangkat" class="input-control" required>
                            </div>
                            <div>
                                <label class="label-text">Jam Berangkat</label>
                                <input type="time" name="jam_berangkat" class="input-control" required>
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-5">
                            <div>
                                <label class="label-text">Harga Per Orang (Rp)</label>
                                <input type="number" min="0" name="harga_per_orang" class="input-control"
                                    placeholder="Contoh: 150000" required>
                            </div>
                            <div>
                                <label class="label-text">Status</label>
                                <select name="status" class="input-control">
                                    <option value="aktif">Aktif</option>
                                    <option value="nonaktif">Nonaktif</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="label-text">Catatan (opsional)</label>
                            <textarea name="keterangan" rows="3" class="input-control"
                                placeholder="Contoh: Titik kumpul di Simpang Garuda, maksimal 2 koper."></textarea>
                        </div>

                        <div class="flex justify-end gap-4 pt-2">
                            <a href="{{ route('sopir.jadwal') }}"
                                class="px-5 py-2.5 rounded-xl bg-white border border-slate-300 text-slate-600 text-sm hover:bg-slate-50 transition">
                                Batal
                            </a>
                            <button type="submit"
                                class="px-6 py-2.5 rounded-xl bg-[#0e586d] text-white text-sm font-semibold hover:bg-[#0a4453] shadow-lg">
                                Simpan Jadwal
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </main>
    </div>
</body>

</html>

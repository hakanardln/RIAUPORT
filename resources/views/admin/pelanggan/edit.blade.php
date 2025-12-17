<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>RiauPort – Edit Pelanggan</title>

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

        {{-- SIDEBAR (SAMA DENGAN INDEX) --}}
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
                <a href="{{ route('admin.dashboard') }}"
                    class="{{ $baseLink }} {{ request()->routeIs('admin.dashboard') ? 'bg-white text-[#0b5f80] ring-2 ring-white/70' : 'bg-white text-[#0b5f80] hover:bg-white/90 transition' }}">
                    <div
                        class="{{ $baseIcon }} {{ request()->routeIs('admin.dashboard') ? 'bg-[#0b5f80] text-white' : 'bg-[#e7f5fb] text-[#0b5f80]' }}">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <path d="m3 11 9-8 9 8"></path>
                            <path d="M9 22V12h6v10"></path>
                        </svg>
                    </div>
                    <span class="font-semibold">Dashboard</span>
                </a>

                {{-- Sopir --}}
                <a href="{{ route('admin.sopir.index') }}"
                    class="{{ $baseLink }} {{ request()->routeIs('admin.sopir.*') ? 'bg-white text-[#0b5f80] ring-2 ring-white/70' : 'bg-white text-[#0b5f80] hover:bg-white/90 transition' }}">
                    <div
                        class="{{ $baseIcon }} {{ request()->routeIs('admin.sopir.*') ? 'bg-[#0b5f80] text-white' : 'bg-[#e7f5fb] text-[#0b5f80]' }}">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <path d="M3 7h18l-1.5 9a2 2 0 0 1-2 1.7H6.5a2 2 0 0 1-2-1.7L3 7Z"></path>
                            <path d="M6 7V5a3 3 0 0 1 3-3h6a3 3 0 0 1 3 3v2"></path>
                        </svg>
                    </div>
                    <span class="font-semibold">Sopir</span>
                </a>

                {{-- Pelanggan (HALAMAN AKTIF) --}}
                <a href="{{ route('admin.pelanggan.index') }}"
                    class="{{ $baseLink }} {{ request()->routeIs('admin.pelanggan.*') ? 'bg-white text-[#0b5f80] ring-2 ring-white/70' : 'bg-white text-[#0b5f80] hover:bg-white/90 transition' }}">
                    <div
                        class="{{ $baseIcon }} {{ request()->routeIs('admin.pelanggan.*') ? 'bg-[#0b5f80] text-white' : 'bg-[#e7f5fb] text-[#0b5f80]' }}">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <circle cx="9" cy="8" r="3"></circle>
                            <path d="M16 21a7 7 0 0 0-14 0"></path>
                            <path d="M19 8v6M22 11h-6"></path>
                        </svg>
                    </div>
                    <span class="font-semibold">Pelanggan</span>
                </a>

                {{-- Pengaturan / Personalisasi Admin --}}
                <a href="{{ route('admin.personalisasi.index') }}"
                    class="{{ $baseLink }} {{ request()->routeIs('admin.pengaturan') ? 'bg-white text-[#0b5f80] ring-2 ring-white/70' : 'bg-white text-[#0b5f80] hover:bg-white/90 transition' }}">
                    <div
                        class="{{ $baseIcon }} {{ request()->routeIs('admin.pengaturan') ? 'bg-[#0b5f80] text-white' : 'bg-[#e7f5fb] text-[#0b5f80]' }}">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <path d="M12 15.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Z"></path>
                            <path
                                d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 1 1-4 0v-.09a1.65 1.65 0 0 0-1-1.51 1.65 1.65 0 0 0-1.82.33l-.06.06A2 2 0 1 1 3.2 17l.06-.06a1.65 1.65 0 0 0 .33-1.82A1.65 1.65 0 0 0 2 14H1.91a2 2 0 1 1 0-4H2c.7 0 1.33-.41 1.6-1.05Z">
                            </path>
                        </svg>
                    </div>
                    <span class="font-semibold">Pengaturan</span>
                </a>
            </nav>

            {{-- TOMBOL KELUAR --}}
            <div class="w-full px-5 pt-3">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="{{ $baseLink }} bg-white text-[#0b5f80] hover:bg-white/90 transition">
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

        {{-- =============== MAIN CONTENT =============== --}}
        <main class="flex-1 p-10 overflow-y-auto">
            {{-- Header atas --}}
            <div class="flex items-center justify-between mb-8">
                <h1 class="text-4xl font-semibold tracking-tight text-[#0e586d]">Edit Pelanggan</h1>
                <div class="flex items-center gap-3">
                    <span class="text-slate-500">
                        {{ auth()->user()->name ?? 'Admin' }}
                    </span>
                    <div class="h-12 w-12 rounded-full bg-slate-200 grid place-items-center">
                        <svg class="h-7 w-7 text-slate-500" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.6">
                            <circle cx="12" cy="8" r="4"></circle>
                            <path d="M4 22a8 8 0 0 1 16 0"></path>
                        </svg>
                    </div>
                </div>
            </div>

            {{-- FORM EDIT DATA --}}
            <div class="bg-white rounded-2xl shadow-md p-6">
                @if ($errors->any())
                    <div class="mb-4 rounded-lg bg-red-50 border border-red-200 text-red-700 px-4 py-3">
                        <ul class="list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('status'))
                    <div
                        class="mb-4 rounded-lg bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 text-sm">
                        {{ session('status') }}
                    </div>
                @endif

                <form action="{{ route('admin.pelanggan.update', $pelanggan->id) }}" method="POST"
                    class="max-w-xl">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-slate-700 mb-1">Nama Pelanggan</label>
                        <input type="text" name="nama" value="{{ old('nama', $pelanggan->nama) }}"
                            class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#0e586d]"
                            required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-slate-700 mb-1">Email</label>
                        <input type="email" name="email" value="{{ old('email', $pelanggan->email) }}"
                            class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#0e586d]">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-slate-700 mb-1">Telepon</label>
                        <input type="text" name="telepon" value="{{ old('telepon', $pelanggan->telepon) }}"
                            class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#0e586d]">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-slate-700 mb-1">Alamat</label>
                        <textarea name="alamat" rows="3"
                            class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#0e586d]">{{ old('alamat', $pelanggan->alamat) }}</textarea>
                    </div>

                    <div class="flex items-center justify-between">
                        <a href="{{ route('admin.pelanggan.index') }}"
                            class="text-sm text-slate-500 hover:underline">
                            &larr; Kembali
                        </a>
                        <button type="submit"
                            class="px-6 py-2 rounded-full bg-[#0e586d] text-white text-sm font-semibold shadow-pill">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>

        </main>
    </div>
</body>

</html>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>RiauPort – Travel Sopir</title>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon_io/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon_io/site.webmanifest') }}">

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

        .tab-pill {
            border-radius: 18px 18px 0 0;
        }

        /* ========== ANIMASI STEP WIZARD – SMOOTH ========== */
        @keyframes stepSlideInRight {
            from {
                opacity: 0;
                transform: translateX(40px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes stepSlideOutLeft {
            from {
                opacity: 1;
                transform: translateX(0);
            }

            to {
                opacity: 0;
                transform: translateX(-40px);
            }
        }

        @keyframes stepSlideInLeft {
            from {
                opacity: 0;
                transform: translateX(-40px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes stepSlideOutRight {
            from {
                opacity: 1;
                transform: translateX(0);
            }

            to {
                opacity: 0;
                transform: translateX(40px);
            }
        }

        .animate-step-in-right {
            animation: stepSlideInRight 0.40s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .animate-step-out-left {
            animation: stepSlideOutLeft 0.32s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .animate-step-in-left {
            animation: stepSlideInLeft 0.40s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .animate-step-out-right {
            animation: stepSlideOutRight 0.32s cubic-bezier(0.4, 0, 0.2, 1);
        }
    </style>
</head>

<body class="h-screen overflow-hidden bg-white text-slate-800">
    <div class="h-full flex">

        {{-- SIDEBAR --}}
        <aside
            class="w-[250px] h-full bg-gradient-to-b from-[#75d0f0] via-[#37a6cc] to-[#0a6687] flex flex-col items-center py-6">

            <div class="mb-6">
                <img src="{{ asset('images/riauport-logo.png') }}" alt="RiauPort Logo"
                    class="h-16 object-contain mx-auto">
            </div>

            <nav class="space-y-3 w-full px-5 flex-1">
                <a href="{{ route('sopir.dashboard') }}"
                    class="flex items-center gap-3 w-full bg-white text-[#0b5f80]
                       rounded-lg px-4 py-2.5 shadow-pill text-sm">
                    <div class="h-7 w-7 rounded-md bg-[#e7f5fb] text-[#0b5f80] grid place-items-center">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <path d="m3 11 9-8 9 8"></path>
                            <path d="M9 22V12h6v10"></path>
                        </svg>
                    </div>
                    <span class="font-semibold">Dashboard</span>
                </a>

                {{-- Travel aktif --}}
                <a href="{{ route('sopir.travel') }}"
                    class="flex items-center gap-3 w-full bg-white text-[#0b5f80]
                       rounded-lg px-4 py-2.5 shadow-pill text-sm ring-2 ring-white/70">
                    <div class="h-7 w-7 rounded-md bg-[#0b5f80] text-white grid place-items-center">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <path d="M3 7h18l-1.5 9a2 2 0 0 1-2 1.7H6.5a2 2 0 0 1-2-1.7L3 7Z"></path>
                            <path d="M6 7V5a3 3 0 0 1 3-3h6a3 3 0 0 1 3 3v2"></path>
                        </svg>
                    </div>
                    <span class="font-semibold">Travel</span>
                </a>

                <a href="{{ route('sopir.jadwal') }}"
                    class="flex items-center gap-3 w-full bg-white text-[#0b5f80]
                       rounded-lg px-4 py-2.5 shadow-pill text-sm">
                    <div class="h-7 w-7 rounded-md bg-[#e7f5fb] text-[#0b5f80] grid place-items-center">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <rect x="3" y="4" width="18" height="18" rx="2"></rect>
                            <path d="M16 2v4M8 2v4M3 10h18"></path>
                        </svg>
                    </div>
                    <span class="font-semibold">Jadwal</span>
                </a>

                <a href="{{ route('sopir.profil') }}"
                    class="flex items-center gap-3 w-full bg-white text-[#0b5f80]
                       rounded-lg px-4 py-2.5 shadow-pill text-sm">
                    <div class="h-7 w-7 rounded-md bg-[#e7f5fb] text-[#0b5f80] grid place-items-center">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <circle cx="12" cy="7" r="3"></circle>
                            <path d="M4 21a8 8 0 0 1 16 0"></path>
                        </svg>
                    </div>
                    <span class="font-semibold">Profil</span>
                </a>

                <a href="{{ route('sopir.notifikasi') }}"
                    class="flex items-center gap-3 w-full bg-white text-[#0b5f80]
                       rounded-lg px-4 py-2.5 shadow-pill text-sm">
                    <div class="h-7 w-7 rounded-md bg-[#e7f5fb] text-[#0b5f80] grid place-items-center">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <path d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"></path>
                            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                        </svg>
                    </div>
                    <span class="font-semibold">Notifikasi</span>
                </a>

                <a href="{{ route('sopir.personal') }}"
                    class="flex items-center gap-3 w-full bg-white text-[#0b5f80]
                       rounded-lg px-4 py-2.5 shadow-pill text-sm">
                    <div class="h-7 w-7 rounded-md bg-[#e7f5fb] text-[#0b5f80] grid place-items-center">
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

                <a href="{{ route('sopir.bantuan') }}"
                    class="flex items-center gap-3 w-full bg-white text-[#0b5f80]
                       rounded-lg px-4 py-2.5 shadow-pill text-sm">
                    <div class="h-7 w-7 rounded-md bg-[#e7f5fb] text-[#0b5f80] grid place-items-center">
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

            <div class="w-full px-5 pt-3">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="flex items-center gap-3 w-full bg-white text-[#0b5f80]
                               rounded-lg px-4 py-2.5 shadow-pill text-sm">
                        <div class="h-7 w-7 rounded-md bg-[#e7f5fb] text-[#0b5f80] grid place-items-center">
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

        {{-- MAIN --}}
        <main class="flex-1 h-full flex flex-col bg-[#f5fafc]">

            <header class="flex items-center justify-between px-10 pt-6 pb-4">
                <div>
                    <h1 class="text-3xl font-semibold tracking-tight text-[#0c607f]">Travel</h1>
                    <p class="text-sm text-slate-500 mt-1">
                        Lengkapi informasi mobil, rute, dan kontak travelmu.
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

            <div id="travelPage" data-has-travel="{{ $travel->exists ? '1' : '0' }}"
                class="flex-1 px-10 pb-8 pt-1 space-y-4 overflow-y-auto">

                @if (session('success'))
                    <div class="p-3 rounded-xl bg-emerald-50 border border-emerald-200 text-xs text-emerald-700">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- KARTU WIZARD --}}
                <div class="bg-[#f9fbfc] rounded-[32px] shadow-soft px-10 py-8 mt-0 relative">

                    {{-- EMPTY STATE --}}
                    <div id="emptyState"
                        class="{{ $travel->exists ? 'hidden' : 'flex' }} flex-col items-center justify-center py-20">
                        <button type="button" id="btnStartInput"
                            class="flex flex-col items-center gap-3 text-[#356779]">
                            <span
                                class="h-14 w-14 rounded-full border-2 border-[#87aebd] grid place-items-center text-3xl">
                                +
                            </span>
                            <span class="text-sm font-medium">
                                Masukkan Informasi
                            </span>
                        </button>
                    </div>

                    {{-- WIZARD WRAPPER --}}
                    <div id="wizardWrapper" class="{{ $travel->exists ? '' : 'hidden' }}">

                        <form id="travelForm" action="{{ route('sopir.travel.simpan') }}" method="POST"
                            enctype="multipart/form-data" class="space-y-6">
                            @csrf

                            {{-- STEP HEADER --}}
                            <div class="mb-6">
                                <div class="relative flex items-center justify-between px-1 md:px-4">
                                    <div class="absolute left-6 right-6 h-[2px] bg-slate-200 top-1/2 -translate-y-1/2">
                                    </div>

                                    @php
                                        $steps = [
                                            ['key' => 'mobil', 'label' => 'Mobil', 'no' => 1],
                                            ['key' => 'rute', 'label' => 'Rute', 'no' => 2],
                                            ['key' => 'kontak', 'label' => 'Kontak', 'no' => 3],
                                        ];
                                    @endphp

                                    @foreach ($steps as $s)
                                        <button type="button"
                                            class="step-header relative z-10 flex items-center gap-2"
                                            data-step="{{ $s['key'] }}">
                                            <span
                                                class="step-circle flex items-center justify-center rounded-full w-8 h-8 text-sm font-semibold border border-slate-300 bg-white text-slate-500">
                                                {{ $s['no'] }}
                                            </span>
                                            <span class="step-label text-sm font-semibold text-slate-500">
                                                {{ $s['label'] }}
                                            </span>
                                        </button>
                                    @endforeach
                                </div>
                            </div>

                            {{-- STEP 1: MOBIL --}}
                            <div data-step-panel="mobil"
                                class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-4 text-sm">
                                <div>
                                    <label class="block text-xs font-semibold text-slate-600 mb-1">Armada</label>
                                    <input type="text" name="armada"
                                        value="{{ old('armada', $travel->armada) }}" data-step-required="1"
                                        class="w-full rounded-xl border border-slate-200 px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-[#3fa6c4]"
                                        placeholder="Avanza, Innova, HiAce">
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-600 mb-1">
                                        Kapasitas Penumpang
                                    </label>

                                    <div class="w-32 py-2 px-3 bg-white border border-slate-200 rounded-xl">
                                        <div class="w-full flex justify-between items-center gap-x-2"
                                            data-input-number>
                                            <div class="flex-1">
                                                <input type="number" name="kapasitas_penumpang" min="1"
                                                    value="{{ old('kapasitas_penumpang', $travel->kapasitas_penumpang ?? 7) }}"
                                                    data-step-required="1" data-input-number-input
                                                    class="w-full p-0 bg-transparent border-0 text-sm text-slate-800 text-left focus:ring-0 focus:outline-none [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none"
                                                    style="-moz-appearance: textfield;">
                                            </div>

                                            <div class="flex items-center gap-x-1.5">
                                                <button type="button"
                                                    class="size-6 inline-flex justify-center items-center rounded-full border border-slate-200 bg-white text-slate-700 shadow-2xs hover:bg-slate-50 focus:outline-none focus:bg-slate-50 disabled:opacity-50 disabled:pointer-events-none"
                                                    tabindex="-1" aria-label="Kurangi" data-input-number-decrement>
                                                    <svg class="shrink-0 h-3.5 w-3.5"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M5 12h14"></path>
                                                    </svg>
                                                </button>
                                                <button type="button"
                                                    class="size-6 inline-flex justify-center items-center rounded-full border border-slate-200 bg-white text-slate-700 shadow-2xs hover:bg-slate-50 focus:outline-none focus:bg-slate-50 disabled:opacity-50 disabled:pointer-events-none"
                                                    tabindex="-1" aria-label="Tambah" data-input-number-increment>
                                                    <svg class="shrink-0 h-3.5 w-3.5"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M5 12h14"></path>
                                                        <path d="M12 5v14"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div>
                                    <label class="block text-xs font-semibold text-slate-600 mb-1">Warna
                                        Mobil</label>
                                    <input type="text" name="warna" value="{{ old('warna', $travel->warna) }}"
                                        data-step-required="1"
                                        class="w-full rounded-xl border border-slate-200 px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-[#3fa6c4]"
                                        placeholder="Silver, Putih, dll.">
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-600 mb-1">TNKB (Plat
                                        Nomor)</label>
                                    <input type="text" name="plat_nomor"
                                        value="{{ old('plat_nomor', $travel->plat_nomor) }}" data-step-required="1"
                                        class="w-full rounded-xl border border-slate-200 px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-[#3fa6c4]"
                                        placeholder="BM 1234 AB">
                                </div>

                                <div class="md:col-span-2">
                                    <label class="block text-xs font-semibold text-slate-600 mb-1">Foto
                                        Armada</label>

                                    {{-- INPUT FILE SEBENARNYA --}}
                                    <input id="foto_armada" type="file" name="foto_armada" class="hidden"
                                        accept="image/*">

                                    {{-- DROPZONE + PREVIEW DI DALAMNYA --}}
                                    <label for="foto_armada"
                                        class="mt-1 cursor-pointer w-full flex justify-center bg-white border border-dashed border-gray-300 rounded-2xl">
                                        <div class="w-full max-w-xl p-8 flex flex-col items-center text-center">

                                            {{-- PREVIEW FOTO ARMADA (DARI DB / DARI INPUT BARU) --}}
                                            <div id="previewArmada" class="mb-4">
                                                @if ($travel->foto_armada)
                                                    <img src="{{ asset('file/' . rawurlencode($travel->foto_armada)) }}"
                                                        class="w-40 h-28 object-cover rounded-xl border border-slate-200 mx-auto"
                                                        alt="Foto armada">
                                                @endif
                                            </div>
                                            {{-- IKON & TEKS DROPZONE --}}
                                            <svg class="w-14 text-gray-400 mx-auto mb-3" width="70"
                                                height="46" viewBox="0 0 70 46" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6.05172 9.36853L17.2131 7.5083V41.3608L12.3018 42.3947C9.01306 43.0871 5.79705 40.9434 5.17081 37.6414L1.14319 16.4049C0.515988 13.0978 2.73148 9.92191 6.05172 9.36853Z"
                                                    fill="currentColor" stroke="currentColor" stroke-width="2"
                                                    class="fill-white stroke-gray-300"></path>
                                                <path
                                                    d="M63.9483 9.36853L52.7869 7.5083V41.3608L57.6982 42.3947C60.9869 43.0871 64.203 40.9434 64.8292 37.6414L68.8568 16.4049C69.484 13.0978 67.2685 9.92191 63.9483 9.36853Z"
                                                    fill="currentColor" stroke="currentColor" stroke-width="2"
                                                    class="fill-white stroke-gray-300"></path>
                                                <rect x="17.0656" y="1.62305" width="35.8689" height="42.7541"
                                                    rx="5" fill="currentColor" stroke="currentColor"
                                                    stroke-width="2" class="fill-white stroke-gray-300"></rect>
                                                <path
                                                    d="M47.9344 44.3772H22.0655C19.3041 44.3772 17.0656 42.1386 17.0656 39.3772L17.0656 35.9161L29.4724 22.7682L38.9825 33.7121C39.7832 34.6335 41.2154 34.629 42.0102 33.7025L47.2456 27.5996L52.9344 33.7209V39.3772C52.9344 42.1386 50.6958 44.3772 47.9344 44.3772Z"
                                                    stroke="currentColor" stroke-width="2" class="stroke-gray-300">
                                                </path>
                                                <circle cx="39.5902" cy="14.9672" r="4.16393"
                                                    stroke="currentColor" stroke-width="2" class="stroke-gray-300">
                                                </circle>
                                            </svg>

                                            <div class="mt-1 flex flex-wrap justify-center text-sm text-gray-600">
                                                <span class="pe-1 font-medium text-gray-800">
                                                    Drop your file here or
                                                </span>
                                                <span
                                                    class="font-semibold text-blue-600 hover:text-blue-700 underline decoration-2">
                                                    browse
                                                </span>
                                            </div>

                                            <p class="mt-1 text-xs text-gray-400">
                                                Pick a photo up to 2MB.
                                            </p>
                                        </div>
                                    </label>
                                </div>

                                <div class="md:col-span-2">
                                    <label class="block text-xs font-semibold text-slate-600 mb-1">Layanan</label>
                                    @php
                                        $jenis = old('jenis_layanan', $travel->jenis_layanan ?? 'eksekutif');
                                    @endphp
                                    <div class="flex items-center gap-4 mt-1 text-xs text-slate-600">
                                        <label class="inline-flex items-center gap-1.5">
                                            <input type="radio" name="jenis_layanan" value="reguler"
                                                {{ $jenis === 'reguler' ? 'checked' : '' }} data-step-required="1">
                                            Reguler
                                        </label>
                                        <label class="inline-flex items-center gap-1.5">
                                            <input type="radio" name="jenis_layanan" value="eksekutif"
                                                {{ $jenis === 'eksekutif' ? 'checked' : '' }}>
                                            Eksekutif
                                        </label>
                                        <label class="inline-flex items-center gap-1.5">
                                            <input type="radio" name="jenis_layanan" value="eksklusif"
                                                {{ $jenis === 'eksklusif' ? 'checked' : '' }}>
                                            Eksklusif
                                        </label>
                                    </div>
                                </div>
                            </div>

                            {{-- STEP 2: RUTE --}}
                            <div data-step-panel="rute"
                                class="hidden grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-4 text-sm">
                                <div>
                                    <label class="block text-xs font-semibold text-slate-600 mb-1">Lokasi
                                        Asal</label>
                                    <input type="text" name="lokasi_asal"
                                        value="{{ old('lokasi_asal', $travel->lokasi_asal) }}" data-step-required="1"
                                        class="w-full rounded-xl border border-slate-200 px-3 py-2 bg-white focus:ring-2 focus:ring-[#3fa6c4]"
                                        placeholder="Bengkalis">
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-600 mb-1">Lokasi
                                        Tujuan</label>
                                    <input type="text" name="lokasi_tujuan"
                                        value="{{ old('lokasi_tujuan', $travel->lokasi_tujuan) }}"
                                        data-step-required="1"
                                        class="w-full rounded-xl border border-slate-200 px-3 py-2 bg-white focus:ring-2 focus:ring-[#3fa6c4]"
                                        placeholder="Dumai">
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-600 mb-1">Tanggal
                                        Berangkat</label>
                                    <input type="date" name="tanggal_berangkat"
                                        value="{{ old('tanggal_berangkat', $travel->tanggal_berangkat) }}"
                                        data-step-required="1"
                                        class="w-48 rounded-xl border border-slate-200 px-3 py-2 bg-white focus:ring-2 focus:ring-[#3fa6c4]">
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-600 mb-1">Jam
                                        Berangkat</label>
                                    <input type="time" name="jam_berangkat"
                                        value="{{ old('jam_berangkat', $travel->jam_berangkat) }}"
                                        data-step-required="1"
                                        class="w-40 rounded-xl border border-slate-200 px-3 py-2 bg-white focus:ring-2 focus:ring-[#3fa6c4]">
                                </div>
                            </div>

                            {{-- STEP 3: KONTAK --}}
                            <div data-step-panel="kontak"
                                class="hidden grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-4 text-sm">
                                <div>
                                    <label class="block text-xs font-semibold text-slate-600 mb-1">Nomor
                                        WhatsApp</label>
                                    <input type="text" name="whatsapp"
                                        value="{{ old('whatsapp', $travel->whatsapp) }}" data-step-required="1"
                                        class="w-full rounded-xl border border-slate-200 px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-[#3fa6c4]"
                                        placeholder="62812xxxxxxx">
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-600 mb-1">Harga / Orang
                                        (Rp)</label>
                                    <input type="number" name="harga_per_orang"
                                        value="{{ old('harga_per_orang', $travel->harga_per_orang) }}"
                                        data-step-required="1"
                                        class="w-full rounded-xl border border-slate-200 px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-[#3fa6c4]"
                                        placeholder="150000">
                                </div>

                                <div class="md:col-span-2">
                                    <label class="block text-xs font-semibold text-slate-600 mb-1">Keterangan
                                        Singkat</label>
                                    <textarea name="keterangan" rows="3" data-step-required="1"
                                        class="w-full rounded-xl border border-slate-200 px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-[#3fa6c4]"
                                        placeholder="Contoh: pembayaran cash, mohon siap 15 menit sebelum berangkat, bisa titip paket, dll.">{{ old('keterangan', $travel->keterangan) }}</textarea>
                                </div>

                                <div class="md:col-span-2">
                                    <label class="block text-xs font-semibold text-slate-600 mb-1">Deskripsi untuk
                                        Halaman Travel</label>
                                    <textarea name="deskripsi" rows="3" data-step-required="1"
                                        class="w-full rounded-xl border border-slate-200 px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-[#3fa6c4]"
                                        placeholder="Informasi yang akan ditampilkan di halaman detail travel pengguna biasa.">{{ old('deskripsi', $travel->deskripsi) }}</textarea>
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-600 mb-1">Status
                                        Travel</label>
                                    @php
                                        $status = old('status', $travel->status ?? 'aktif');
                                    @endphp
                                    <div class="flex items-center gap-4 mt-1 text-xs text-slate-600">
                                        <label class="inline-flex items-center gap-1.5">
                                            <input type="radio" name="status" value="aktif"
                                                {{ $status === 'aktif' ? 'checked' : '' }} data-step-required="1">
                                            <span>Aktif</span>
                                        </label>
                                        <label class="inline-flex items-center gap-1.5">
                                            <input type="radio" name="status" value="nonaktif"
                                                {{ $status === 'nonaktif' ? 'checked' : '' }}>
                                            <span>Nonaktif</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            {{-- NAVIGASI STEP --}}
                            <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                                <button type="button" id="btnPrevStep"
                                    class="px-5 py-2.5 rounded-full bg-slate-200 text-slate-700 text-sm font-medium disabled:opacity-40">
                                    ← Kembali
                                </button>
                                <button type="button" id="btnNextStep"
                                    class="px-6 py-2.5 rounded-full bg-[#0c607f] text-white text-sm font-semibold shadow-pill hover:bg-[#0a526c] transition">
                                    Next →
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <script>
        const stepKeys = ['mobil', 'rute', 'kontak'];
        let currentStepIndex = 0;

        const form = document.getElementById('travelForm');
        const prevBtn = document.getElementById('btnPrevStep');
        const nextBtn = document.getElementById('btnNextStep');

        // =========================
        // UPDATE HEADER + BUTTON
        // =========================
        function updateHeaderAndButtons() {
            const activeKey = stepKeys[currentStepIndex];

            document.querySelectorAll('.step-header').forEach(btn => {
                const active = btn.dataset.step === activeKey;
                const circle = btn.querySelector('.step-circle');
                const label = btn.querySelector('.step-label');

                circle.classList.toggle('bg-[#0c607f]', active);
                circle.classList.toggle('text-white', active);
                circle.classList.toggle('border-[#0c607f]', active);
                circle.classList.toggle('bg-white', !active);
                circle.classList.toggle('text-slate-500', !active);
                circle.classList.toggle('border-slate-300', !active);

                label.classList.toggle('text-[#0c607f]', active);
                label.classList.toggle('text-slate-500', !active);
            });

            // === TOMBOL KEMBALI ===
            if (currentStepIndex === 0) {
                // tombol tetap ambil ruang tapi tak terlihat & non-klik
                prevBtn.classList.add('opacity-0', 'pointer-events-none', 'cursor-default');
            } else {
                prevBtn.classList.remove('opacity-0', 'pointer-events-none', 'cursor-default');
            }

            // label tombol kanan
            nextBtn.textContent = currentStepIndex === stepKeys.length - 1 ? 'Simpan' : 'Next →';
        }

        // =========================
        // INPUT NUMBER (+ / -) KAPASITAS
        // =========================
        document.querySelectorAll('[data-input-number]').forEach(wrapper => {
            const input = wrapper.querySelector('[data-input-number-input]');
            const btnDec = wrapper.querySelector('[data-input-number-decrement]');
            const btnInc = wrapper.querySelector('[data-input-number-increment]');

            if (!input) return;

            const getMin = () => parseInt(input.min || '1', 10);
            const getMax = () => input.max ? parseInt(input.max, 10) : null;

            function sanitize() {
                let val = parseInt(input.value || '0', 10);
                if (isNaN(val) || val < getMin()) val = getMin();
                const max = getMax();
                if (max !== null && val > max) val = max;
                input.value = val;
            }

            sanitize();

            if (btnDec) {
                btnDec.addEventListener('click', () => {
                    let val = parseInt(input.value || '0', 10);
                    if (isNaN(val)) val = getMin();
                    val = Math.max(getMin(), val - 1);
                    input.value = val;
                });
            }

            if (btnInc) {
                btnInc.addEventListener('click', () => {
                    let val = parseInt(input.value || '0', 10);
                    if (isNaN(val)) val = getMin();
                    const max = getMax();
                    val = val + 1;
                    if (max !== null && val > max) val = max;
                    input.value = val;
                });
            }
        });

        // =========================
        // SHOW STEP DENGAN ANIMASI SLIDE
        // =========================
        function showStep(newIndex, animate = true) {
            if (newIndex === currentStepIndex || newIndex < 0 || newIndex >= stepKeys.length) return;

            const oldKey = stepKeys[currentStepIndex];
            const newKey = stepKeys[newIndex];

            const oldPanel = document.querySelector(`[data-step-panel="${oldKey}"]`);
            const newPanel = document.querySelector(`[data-step-panel="${newKey}"]`);

            if (!oldPanel || !newPanel) return;

            // bersihkan animasi lama dulu
            oldPanel.classList.remove('animate-step-in-right', 'animate-step-out-left', 'animate-step-in-left',
                'animate-step-out-right');
            newPanel.classList.remove('animate-step-in-right', 'animate-step-out-left', 'animate-step-in-left',
                'animate-step-out-right');

            const forward = newIndex > currentStepIndex;

            if (animate) {
                // panel baru harus kelihatan dulu supaya bisa dianimasi
                newPanel.classList.remove('hidden');

                if (forward) {
                    // NEXT -> slide kiri
                    oldPanel.classList.add('animate-step-out-left');
                    newPanel.classList.add('animate-step-in-right');
                } else {
                    // BACK -> slide kanan
                    oldPanel.classList.add('animate-step-out-right');
                    newPanel.classList.add('animate-step-in-left');
                }

                // setelah animasi out selesai, sembunyikan panel lama
                oldPanel.addEventListener('animationend', () => {
                    oldPanel.classList.add('hidden');
                    oldPanel.classList.remove('animate-step-out-left', 'animate-step-out-right');
                }, {
                    once: true
                });

                // bersihkan class animasi panel baru
                newPanel.addEventListener('animationend', () => {
                    newPanel.classList.remove('animate-step-in-right', 'animate-step-in-left');
                }, {
                    once: true
                });
            } else {
                oldPanel.classList.add('hidden');
                newPanel.classList.remove('hidden');
            }

            currentStepIndex = newIndex;
            updateHeaderAndButtons();
        }

        // =========================
        // VALIDASI STEP AKTIF
        // =========================
        function validateCurrentStep() {
            const key = stepKeys[currentStepIndex];
            const panel = document.querySelector(`[data-step-panel="${key}"]`);
            let valid = true;

            if (!panel) return true;

            panel.querySelectorAll('[data-step-required]').forEach(el => {
                el.classList.remove('border-red-500');
            });

            panel.querySelectorAll('[data-step-required]').forEach(el => {
                if (el.type === 'radio') {
                    const group = panel.querySelectorAll(`input[name="${el.name}"]`);
                    const anyChecked = Array.from(group).some(r => r.checked);
                    if (!anyChecked) {
                        group.forEach(r => r.classList.add('border-red-500'));
                        valid = false;
                    }
                } else if (!el.value || el.value.trim() === '') {
                    el.classList.add('border-red-500');
                    valid = false;
                }
            });

            if (!valid) {
                alert('Lengkapi semua data di step ini terlebih dahulu.');
            }
            return valid;
        }

        // =========================
        // EVENT TOMBOL NEXT / PREV
        // =========================
        nextBtn.addEventListener('click', () => {
            if (!validateCurrentStep()) return;

            if (currentStepIndex === stepKeys.length - 1) {
                form.submit();
            } else {
                showStep(currentStepIndex + 1, true);
            }
        });

        prevBtn.addEventListener('click', () => {
            if (currentStepIndex > 0) {
                showStep(currentStepIndex - 1, true);
            }
        });

        // =========================
        // KLIK HEADER STEP
        // (boleh mundur bebas, maju tetap lewat Next)
        // =========================
        document.querySelectorAll('.step-header').forEach((btn, idx) => {
            btn.addEventListener('click', () => {
                if (idx < currentStepIndex) {
                    showStep(idx, true);
                }
            });
        });

        // =========================
        // EMPTY STATE → BUKA WIZARD
        // =========================
        const emptyState = document.getElementById('emptyState');
        const wizardWrapper = document.getElementById('wizardWrapper');
        const btnStartInput = document.getElementById('btnStartInput');

        if (btnStartInput && emptyState && wizardWrapper) {
            btnStartInput.addEventListener('click', () => {
                // sembunyikan kartu kosong
                emptyState.classList.add('hidden');

                // tampilkan wizard
                wizardWrapper.classList.remove('hidden');

                // pastikan mulai dari step pertama
                currentStepIndex = 0;
                document.querySelectorAll('[data-step-panel]').forEach((panel, idx) => {
                    if (idx === 0) {
                        panel.classList.remove('hidden');
                    } else {
                        panel.classList.add('hidden');
                    }
                });
                updateHeaderAndButtons();
            });
        }

        // =========================
        // PREVIEW FOTO ARMADA
        // =========================
        const inputFoto = document.getElementById('foto_armada');
        const previewArmada = document.getElementById('previewArmada');

        if (inputFoto && previewArmada) {
            inputFoto.addEventListener('change', function() {
                const file = this.files && this.files[0];
                if (!file) return;
                if (!file.type.startsWith('image/')) return;

                const reader = new FileReader();
                reader.onload = function(e) {
                    // kosongkan preview lama
                    previewArmada.innerHTML = '';

                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.alt = 'Foto armada';
                    img.className = 'w-40 h-28 object-cover rounded-xl border border-slate-200 mx-auto';

                    previewArmada.appendChild(img);
                };
                reader.readAsDataURL(file);
            });
        }

        // inisialisasi
        updateHeaderAndButtons();
    </script>
</body>

</html>

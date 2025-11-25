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

                {{-- menu lain biarkan placeholder --}}
                <a href="#"
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

                <a href="#"
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

                <a href="#"
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

                <a href="#"
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

                <a href="#"
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

                {{-- TAB --}}
                <div class="flex gap-3 pl-3 mt-2">
                    <button type="button" data-tab-btn="mobil"
                        class="tab-pill px-6 py-2 text-sm font-semibold bg-[#e9f4f8] text-[#0c607f] shadow-soft -mb-px">
                        Mobil
                    </button>
                    <button type="button" data-tab-btn="rute"
                        class="tab-pill px-6 py-2 text-sm font-semibold text-[#7b9fb2] bg-[#f3f7f9]">
                        Rute
                    </button>
                    <button type="button" data-tab-btn="kontak"
                        class="tab-pill px-6 py-2 text-sm font-semibold text-[#7b9fb2] bg-[#f3f7f9]">
                        Kontak
                    </button>
                </div>

                {{-- KARTU --}}
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

                    {{-- FORM WRAPPER --}}
                    <div id="formsWrapper" class="{{ $travel->exists ? '' : 'hidden' }}">

                        {{-- TAB MOBIL --}}
                        <div data-tab-content="mobil">
                            <form action="{{ route('sopir.travel.mobil') }}" method="POST"
                                enctype="multipart/form-data"
                                class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-4 text-sm">
                                @csrf

                                <div>
                                    <label class="block text-xs font-semibold text-slate-600 mb-1">Armada</label>
                                    <input type="text" name="armada"
                                        value="{{ old('armada', $travel->armada) }}"
                                        class="w-full rounded-xl border border-slate-200 px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-[#3fa6c4]"
                                        placeholder="Toyota Kijang Innova">
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-600 mb-1">Kapasitas</label>
                                    <input type="number" name="kursi_tersedia"
                                        value="{{ old('kursi_tersedia', $travel->kursi_tersedia) }}"
                                        class="w-28 rounded-xl border border-slate-200 px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-[#3fa6c4]"
                                        placeholder="7">
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-600 mb-1">Warna</label>
                                    <input type="text" name="warna" value="{{ old('warna', $travel->warna) }}"
                                        class="w-full rounded-xl border border-slate-200 px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-[#3fa6c4]"
                                        placeholder="Hitam Metalik">
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-600 mb-1">TNKB</label>
                                    <input type="text" name="plat_nomor"
                                        value="{{ old('plat_nomor', $travel->plat_nomor) }}"
                                        class="w-full rounded-xl border border-slate-200 px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-[#3fa6c4]"
                                        placeholder="BM 8014 SZ">
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-600 mb-1">Foto Armada</label>
                                    <div
                                        class="rounded-2xl border border-dashed border-slate-300 bg-white px-4 py-3 flex flex-col items-center justify-center gap-2">
                                        @if ($travel->foto_armada)
                                            <img src="{{ asset('storage/' . $travel->foto_armada) }}"
                                                class="w-full max-h-40 object-cover rounded-xl mb-2"
                                                alt="Foto Armada">
                                        @else
                                            <div
                                                class="w-full h-28 rounded-xl bg-gradient-to-t from-[#b1d8eb] to-[#e4f3fb]
                                                    flex items-center justify-center text-xs text-slate-600">
                                                Preview foto armada
                                            </div>
                                        @endif

                                        <label
                                            class="cursor-pointer text-xs font-semibold px-4 py-1.5 rounded-full bg-[#0c607f] text-white shadow-pill">
                                            Upload
                                            <input type="file" name="foto_armada" class="hidden">
                                        </label>
                                        <p class="text-[10px] text-slate-500">
                                            JPG/PNG, maks. 2 MB.
                                        </p>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-600 mb-1">Layanan</label>
                                    @php
                                        $jenis = old('jenis_layanan', $travel->jenis_layanan ?? 'eksekutif');
                                    @endphp
                                    <div class="flex items-center gap-4 mt-1 text-xs text-slate-600">
                                        <label class="inline-flex items-center gap-1.5">
                                            <input type="radio" name="jenis_layanan" value="reguler"
                                                {{ $jenis === 'reguler' ? 'checked' : '' }}>
                                            <span>Reguler</span>
                                        </label>
                                        <label class="inline-flex items-center gap-1.5">
                                            <input type="radio" name="jenis_layanan" value="eksekutif"
                                                {{ $jenis === 'eksekutif' ? 'checked' : '' }}>
                                            <span>Eksekutif</span>
                                        </label>
                                        <label class="inline-flex items-center gap-1.5">
                                            <input type="radio" name="jenis_layanan" value="eksklusif"
                                                {{ $jenis === 'eksklusif' ? 'checked' : '' }}>
                                            <span>Eksklusif</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="md:col-span-2 flex justify-end mt-2">
                                    <button type="submit"
                                        class="px-6 py-2.5 rounded-full bg-[#0c607f] text-white text-sm font-semibold shadow-pill hover:bg-[#0a526c] transition">
                                        Simpan Mobil
                                    </button>
                                </div>
                            </form>
                        </div>

                        {{-- TAB RUTE --}}
                        <div data-tab-content="rute" class="hidden">
                            <form action="{{ route('sopir.travel.rute') }}" method="POST"
                                class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-4 text-sm">
                                @csrf

                                <div>
                                    <label class="block text-xs font-semibold text-slate-600 mb-1">Lokasi Asal</label>
                                    <input type="text" name="lokasi_asal"
                                        value="{{ old('lokasi_asal', $travel->lokasi_asal) }}"
                                        class="w-full rounded-xl border border-slate-200 px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-[#3fa6c4]"
                                        placeholder="Bengkalis">
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-600 mb-1">Lokasi
                                        Tujuan</label>
                                    <input type="text" name="lokasi_tujuan"
                                        value="{{ old('lokasi_tujuan', $travel->lokasi_tujuan) }}"
                                        class="w-full rounded-xl border border-slate-200 px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-[#3fa6c4]"
                                        placeholder="Dumai">
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-600 mb-1">Tanggal
                                        Berangkat</label>
                                    <input type="date" name="tanggal_berangkat"
                                        value="{{ old('tanggal_berangkat', $travel->tanggal_berangkat) }}"
                                        class="w-48 rounded-xl border border-slate-200 px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-[#3fa6c4]">
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-600 mb-1">Jam
                                        Berangkat</label>
                                    <input type="time" name="jam_berangkat"
                                        value="{{ old('jam_berangkat', $travel->jam_berangkat) }}"
                                        class="w-40 rounded-xl border border-slate-200 px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-[#3fa6c4]">
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-600 mb-1">Titik Jemput</label>
                                    <input type="text" name="titik_jemput"
                                        value="{{ old('titik_jemput', $travel->titik_jemput) }}"
                                        class="w-full rounded-xl border border-slate-200 px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-[#3fa6c4]"
                                        placeholder="Area kota, titik tertentu, dll.">
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-600 mb-1">Titik Turun</label>
                                    <input type="text" name="titik_turun"
                                        value="{{ old('titik_turun', $travel->titik_turun) }}"
                                        class="w-full rounded-xl border border-slate-200 px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-[#3fa6c4]"
                                        placeholder="Terminal, titik jemput, dll.">
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-600 mb-1">Estimasi
                                        Waktu</label>
                                    <input type="text" name="estimasi_waktu"
                                        value="{{ old('estimasi_waktu', $travel->estimasi_waktu) }}"
                                        class="w-full rounded-xl border border-slate-200 px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-[#3fa6c4]"
                                        placeholder="3 jam 30 menit">
                                </div>

                                <div class="md:col-span-2 flex justify-end mt-2">
                                    <button type="submit"
                                        class="px-6 py-2.5 rounded-full bg-[#0c607f] text-white text-sm font-semibold shadow-pill hover:bg-[#0a526c] transition">
                                        Simpan Rute
                                    </button>
                                </div>
                            </form>
                        </div>

                        {{-- TAB KONTAK --}}
                        <div data-tab-content="kontak" class="hidden">
                            <form action="{{ route('sopir.travel.kontak') }}" method="POST"
                                class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-4 text-sm">
                                @csrf

                                <div>
                                    <label class="block text-xs font-semibold text-slate-600 mb-1">Nomor
                                        WhatsApp</label>
                                    <input type="text" name="whatsapp"
                                        value="{{ old('whatsapp', $travel->whatsapp) }}"
                                        class="w-full rounded-xl border border-slate-200 px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-[#3fa6c4]"
                                        placeholder="62812xxxxxxx">
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-600 mb-1">Harga / Orang
                                        (Rp)</label>
                                    <input type="number" name="harga_per_orang"
                                        value="{{ old('harga_per_orang', $travel->harga_per_orang) }}"
                                        class="w-full rounded-xl border border-slate-200 px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-[#3fa6c4]"
                                        placeholder="150000">
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-600 mb-1">Kapasitas
                                        Penumpang</label>
                                    <input type="number" name="kapasitas_penumpang"
                                        value="{{ old('kapasitas_penumpang', $travel->kapasitas_penumpang) }}"
                                        class="w-full rounded-xl border border-slate-200 px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-[#3fa6c4]"
                                        placeholder="7">
                                </div>

                                <div class="md:col-span-2">
                                    <label class="block text-xs font-semibold text-slate-600 mb-1">Keterangan
                                        Singkat</label>
                                    <textarea name="keterangan" rows="3"
                                        class="w-full rounded-xl border border-slate-200 px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-[#3fa6c4]"
                                        placeholder="Contoh: pembayaran cash, mohon siap 15 menit sebelum berangkat, bisa titip paket, dll.">{{ old('keterangan', $travel->keterangan) }}</textarea>
                                </div>

                                <div class="md:col-span-2">
                                    <label class="block text-xs font-semibold text-slate-600 mb-1">Deskripsi untuk
                                        Halaman Travel</label>
                                    <textarea name="deskripsi" rows="3"
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
                                                {{ $status === 'aktif' ? 'checked' : '' }}>
                                            <span>Aktif</span>
                                        </label>
                                        <label class="inline-flex items-center gap-1.5">
                                            <input type="radio" name="status" value="nonaktif"
                                                {{ $status === 'nonaktif' ? 'checked' : '' }}>
                                            <span>Nonaktif</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="md:col-span-2 flex justify-end mt-2">
                                    <button type="submit"
                                        class="px-6 py-2.5 rounded-full bg-[#0c607f] text-white text-sm font-semibold shadow-pill hover:bg-[#0a526c] transition">
                                        Simpan Kontak
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </main>
    </div>

    <script>
        const btns = document.querySelectorAll('[data-tab-btn]');
        const contents = document.querySelectorAll('[data-tab-content]');
        const hasTravel = document.getElementById('travelPage').dataset.hasTravel === '1';

        function setActiveTab(tab) {
            btns.forEach(btn => {
                const active = btn.dataset.tabBtn === tab;
                btn.classList.toggle('bg-[#e9f4f8]', active);
                btn.classList.toggle('text-[#0c607f]', active);
                btn.classList.toggle('shadow-soft', active);
                btn.classList.toggle('text-[#7b9fb2]', !active);
                btn.classList.toggle('bg-[#f3f7f9]', !active);
            });

            contents.forEach(c => {
                c.classList.toggle('hidden', c.dataset.tabContent !== tab);
            });
        }

        btns.forEach(btn => {
            btn.addEventListener('click', () => setActiveTab(btn.dataset.tabBtn));
        });

        setActiveTab('mobil');

        const emptyState = document.getElementById('emptyState');
        const formsWrapper = document.getElementById('formsWrapper');
        const btnStart = document.getElementById('btnStartInput');

        if (!hasTravel && btnStart) {
            btnStart.addEventListener('click', () => {
                emptyState.classList.add('hidden');
                formsWrapper.classList.remove('hidden');
                setActiveTab('mobil');
            });
        }
    </script>
</body>

</html>

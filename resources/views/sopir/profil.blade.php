<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Sopir – RiauPort</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "SF Pro Text", sans-serif;
        }

        .shadow-soft {
            box-shadow: 0 12px 24px rgba(0, 0, 0, .15);
        }

        .shadow-pill {
            box-shadow: 0 8px 16px rgba(0, 0, 0, .18);
        }

        .input-soft {
            @apply w-full px-4 py-2.5 rounded-xl border border-slate-200 bg-white shadow-inner text-sm outline-none transition;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, .08);
        }

        .input-soft:focus {
            border-color: #0b5f80;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, .08), 0 0 0 3px rgba(11, 95, 128, 0.1);
        }

        .badge {
            @apply inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-medium;
        }

        .progress-ring {
            transform: rotate(-90deg);
        }

        .progress-ring-circle {
            transition: stroke-dashoffset 0.5s ease;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.6s ease-out;
        }

        .hover-lift {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 32px rgba(0, 0, 0, .2);
        }
    </style>
</head>

<body class="bg-[#f5fafc] text-slate-800">

    <div class="h-screen flex">

        <!-- SIDEBAR -->
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

            <nav class="space-y-3 w-full px-5 flex-1">
                <a href="{{ route('sopir.dashboard') }}"
                    class="flex items-center gap-3 w-full rounded-lg px-4 py-2.5 shadow-pill text-sm bg-white text-[#0b5f80] hover:bg-white/90 transition">
                    <div class="h-7 w-7 rounded-md grid place-items-center bg-[#e7f5fb] text-[#0b5f80]">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <path d="m3 11 9-8 9 8"></path>
                            <path d="M9 22V12h6v10"></path>
                        </svg>
                    </div>
                    <span class="font-semibold">Dashboard</span>
                </a>

                <a href="{{ route('sopir.travel') }}"
                    class="flex items-center gap-3 w-full rounded-lg px-4 py-2.5 shadow-pill text-sm bg-white text-[#0b5f80] hover:bg-white/90 transition">
                    <div class="h-7 w-7 rounded-md grid place-items-center bg-[#e7f5fb] text-[#0b5f80]">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <path d="M3 7h18l-1.5 9a2 2 0 0 1-2 1.7H6.5a2 2 0 0 1-2-1.7L3 7Z"></path>
                            <path d="M6 7V5a3 3 0 0 1 3-3h6a3 3 0 0 1 3 3v2"></path>
                        </svg>
                    </div>
                    <span class="font-semibold">Travel</span>
                </a>

                <a href="{{ route('sopir.jadwal') }}"
                    class="flex items-center gap-3 w-full rounded-lg px-4 py-2.5 shadow-pill text-sm bg-white text-[#0b5f80] hover:bg-white/90 transition">
                    <div class="h-7 w-7 rounded-md grid place-items-center bg-[#e7f5fb] text-[#0b5f80]">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <rect x="3" y="4" width="18" height="18" rx="2"></rect>
                            <path d="M16 2v4M8 2v4M3 10h18"></path>
                        </svg>
                    </div>
                    <span class="font-semibold">Jadwal</span>
                </a>

                <a href="{{ route('sopir.profil') }}"
                    class="flex items-center gap-3 w-full rounded-lg px-4 py-2.5 shadow-pill text-sm bg-white text-[#0b5f80] ring-2 ring-white/70">
                    <div class="h-7 w-7 rounded-md grid place-items-center bg-[#0b5f80] text-white">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <circle cx="12" cy="7" r="3"></circle>
                            <path d="M4 21a8 8 0 0 1 16 0"></path>
                        </svg>
                    </div>
                    <span class="font-semibold">Profil</span>
                </a>

                <a href="{{ route('sopir.notifikasi') }}"
                    class="flex items-center gap-3 w-full rounded-lg px-4 py-2.5 shadow-pill text-sm bg-white text-[#0b5f80] hover:bg-white/90 transition">
                    <div class="h-7 w-7 rounded-md grid place-items-center bg-[#e7f5fb] text-[#0b5f80]">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <path d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"></path>
                            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                        </svg>
                    </div>
                    <span class="font-semibold">Notifikasi</span>
                </a>

                <a href="{{ route('sopir.personal') }}"
                    class="flex items-center gap-3 w-full rounded-lg px-4 py-2.5 shadow-pill text-sm bg-white text-[#0b5f80] hover:bg-white/90 transition">
                    <div class="h-7 w-7 rounded-md grid place-items-center bg-[#e7f5fb] text-[#0b5f80]">
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
                    class="flex items-center gap-3 w-full rounded-lg px-4 py-2.5 shadow-pill text-sm bg-white text-[#0b5f80] hover:bg-white/90 transition">
                    <div class="h-7 w-7 rounded-md grid place-items-center bg-[#e7f5fb] text-[#0b5f80]">
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

        <!-- MAIN CONTENT -->
        <main class="flex-1 h-full flex flex-col">

            <!-- HEADER -->
            <header class="flex items-center justify-between px-10 pt-6 pb-4">
                <div>
                    <h1 class="text-3xl font-semibold tracking-tight text-[#0c607f]">Profil Sopir</h1>
                    <p class="text-sm text-slate-500 mt-1">Kelola informasi akun dan preferensi Anda</p>
                </div>

                <div class="flex items-center gap-3">
                    <div class="text-right">
                        <p class="text-sm font-semibold text-[#0c607f]">{{ $user->name }}</p>
                        <p class="text-[11px] text-emerald-600 flex items-center justify-end gap-1">
                            <span class="inline-block h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span>
                            Online
                        </p>
                    </div>
                    <div
                        class="h-10 w-10 rounded-full bg-gradient-to-br from-[#5fb7cf] to-[#0b5f80] grid place-items-center ring-2 ring-white shadow-lg">
                        <svg class="h-6 w-6 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <circle cx="12" cy="8" r="4"></circle>
                            <path d="M4 22a8 8 0 0 1 16 0"></path>
                        </svg>
                    </div>
                </div>
            </header>

            <!-- SCROLL AREA -->
            <div class="flex-1 overflow-y-auto px-10 pb-10 space-y-6">

                <!-- BANNER CARD WITH STATUS -->
                <section
                    class="bg-gradient-to-r from-[#0b5f80] via-[#0c7ba0] to-[#37a6cc] rounded-[34px] shadow-soft p-8 text-white relative overflow-hidden animate-fadeInUp">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -mr-32 -mt-32"></div>
                    <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/5 rounded-full -ml-24 -mb-24"></div>

                    <div class="relative z-10 flex items-center justify-between">
                        <div>
                            <div class="flex items-center gap-3 mb-3">
                                <span class="badge bg-emerald-400 text-emerald-900">
                                    <svg class="h-3 w-3" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2">
                                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                    </svg>
                                    Akun Terverifikasi
                                </span>
                                <span class="badge bg-amber-400 text-amber-900">
                                    <svg class="h-3 w-3" viewBox="0 0 24 24" fill="currentColor">
                                        <path
                                            d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                        </path>
                                    </svg>
                                    Sopir Berpengalaman
                                </span>
                            </div>
                            <h2 class="text-3xl font-bold mb-2">Selamat Datang Kembali, {{ $user->name }}! 👋</h2>
                            <p class="text-white/80 text-sm">
                                Anda telah menyelesaikan
                                <span class="font-bold">{{ $totalTravel }} perjalanan</span>
                                @if ($ratingRata)
                                    dengan rating rata-rata
                                    <span class="font-bold">{{ number_format($ratingRata, 1) }}</span>
                                @endif
                            </p>
                        </div>

                        <div class="flex flex-col items-center gap-2">
                            <div class="relative">
                                <svg class="progress-ring" width="120" height="120">
                                    <circle cx="60" cy="60" r="52" stroke="rgba(255,255,255,0.2)"
                                        stroke-width="8" fill="none"></circle>
                                    <circle class="progress-ring-circle" cx="60" cy="60" r="52"
                                        stroke="#fbbf24" stroke-width="8" fill="none" stroke-dasharray="327"
                                        stroke-dashoffset="65" stroke-linecap="round"></circle>
                                </svg>
                                <div class="absolute inset-0 flex flex-col items-center justify-center">
                                    <span class="text-3xl font-bold">
                                        {{ $ratingRata ? number_format($ratingRata, 1) : '–' }}
                                    </span>
                                    <span class="text-xs text-white/70">
                                        {{ $ratingRata ? 'Rating' : 'Belum ada rating' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- PROFIL CARD -->
                <section class="bg-white rounded-[34px] shadow-soft p-8 flex flex-col lg:flex-row gap-8 hover-lift">

                    <!-- FOTO PROFIL / AVATAR -->
                    <div class="flex flex-col items-center w-full lg:w-1/3">
                        <div class="relative">
                            <div
                                class="h-14 w-14 rounded-full bg-gradient-to-br from-[#5fb7cf] to-[#0b5f80]
            grid place-items-center text-white text-2xl font-semibold ring-2 ring-white shadow-lg">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>


                            <div
                                class="absolute bottom-2 right-2 h-8 w-8 bg-emerald-500 rounded-full border-4 border-white grid place-items-center">
                                <svg class="h-4 w-4 text-white" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                </svg>
                            </div>
                        </div>

                        {{-- Jika nanti mau tambah fitur edit avatar, bisa ditambahkan tombol di sini --}}

                        <div class="mt-6 w-full space-y-3">
                            <div class="flex items-center gap-3 px-4 py-3 bg-[#e3f1f6] rounded-xl">
                                <svg class="h-5 w-5 text-[#0b5f80]" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                                <div class="flex-1">
                                    <p class="text-xs text-slate-600">Member Sejak</p>
                                    <p class="font-semibold text-[#0b5f80]">
                                        {{ $user->created_at->format('d M Y') }}
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-center gap-3 px-4 py-3 bg-emerald-50 rounded-xl">
                                <svg class="h-5 w-5 text-emerald-600" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                </svg>
                                <div class="flex-1">
                                    <p class="text-xs text-slate-600">Status Verifikasi</p>
                                    <p class="font-semibold text-emerald-700">Terverifikasi</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-3 px-4 py-3 bg-amber-50 rounded-xl">
                                <svg class="h-5 w-5 text-amber-600" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                    </path>
                                </svg>
                                <div class="flex-1">
                                    <p class="text-xs text-slate-600">Level Sopir</p>
                                    <p class="font-semibold text-amber-700">Platinum</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- INFORMASI PROFIL -->
                    <div class="flex-1 space-y-6">
                        <div>
                            <div class="flex items-center justify-between gap-4">
                                <div>
                                    <h2 class="text-2xl font-semibold text-[#0c607f]">Informasi Akun</h2>
                                    <p class="text-sm text-slate-600 mt-1">
                                        Detail akun yang terhubung dengan layanan travel Anda
                                    </p>
                                </div>
                                {{-- Tombol Edit Profil --}}
                                <a href="{{ route('sopir.profil.edit') }}"
                                    class="px-5 py-2.5 rounded-xl bg-[#0b5f80] text-white text-sm shadow-pill hover:bg-[#094b68] transition flex items-center gap-2">
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2">
                                        <path d="M12 20h9"></path>
                                        <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                    </svg>
                                    Edit Profil
                                </a>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <!-- Nama Lengkap -->
                            <div class="group">
                                <label
                                    class="text-xs font-semibold text-slate-500 uppercase tracking-wide mb-3 block">Nama
                                    Lengkap</label>
                                <div class="relative">
                                    <div
                                        class="absolute left-4 top-1/2 -translate-y-1/2 h-10 w-10 bg-gradient-to-br from-blue-100 to-blue-50 rounded-xl grid place-items-center">
                                        <svg class="h-5 w-5 text-blue-600" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                    </div>
                                    <input type="text" disabled value="{{ $user->name }}"
                                        class="w-full pl-[68px] pr-4 py-4 rounded-2xl border-2 border-slate-200 bg-gradient-to-br from-slate-50 to-white text-slate-800 font-medium text-sm cursor-not-allowed shadow-sm">
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="group">
                                <label
                                    class="text-xs font-semibold text-slate-500 uppercase tracking-wide mb-3 block">Email</label>
                                <div class="relative">
                                    <div
                                        class="absolute left-4 top-1/2 -translate-y-1/2 h-10 w-10 bg-gradient-to-br from-purple-100 to-purple-50 rounded-xl grid place-items-center">
                                        <svg class="h-5 w-5 text-purple-600" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2">
                                            <rect x="2" y="4" width="20" height="16" rx="2"></rect>
                                            <path d="m2 7 10 5 10-5"></path>
                                        </svg>
                                    </div>
                                    <input type="text" disabled value="{{ $user->email }}"
                                        class="w-full pl-[68px] pr-4 py-4 rounded-2xl border-2 border-slate-200 bg-gradient-to-br from-slate-50 to-white text-slate-800 font-medium text-sm cursor-not-allowed shadow-sm">
                                </div>
                            </div>

                            <!-- Nomor WhatsApp -->
                            <div class="group">
                                <label
                                    class="text-xs font-semibold text-slate-500 uppercase tracking-wide mb-3 block">Nomor
                                    WhatsApp</label>
                                <div class="relative">
                                    <div
                                        class="absolute left-4 top-1/2 -translate-y-1/2 h-10 w-10 bg-gradient-to-br from-emerald-100 to-emerald-50 rounded-xl grid place-items-center">
                                        <svg class="h-5 w-5 text-emerald-600" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2">
                                            <path
                                                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                            </path>
                                        </svg>
                                    </div>
                                    {{-- TODO: ganti dengan field no_wa kalau sudah ada di tabel users/sopir --}}
                                    <input type="text" disabled value="+62 812-3456-7890"
                                        class="w-full pl-[68px] pr-4 py-4 rounded-2xl border-2 border-slate-200 bg-gradient-to-br from-slate-50 to-white text-slate-800 font-medium text-sm cursor-not-allowed shadow-sm">
                                </div>
                            </div>

                            <!-- Tanggal Bergabung -->
                            <div class="group">
                                <label
                                    class="text-xs font-semibold text-slate-500 uppercase tracking-wide mb-3 block">Tanggal
                                    Bergabung</label>
                                <div class="relative">
                                    <div
                                        class="absolute left-4 top-1/2 -translate-y-1/2 h-10 w-10 bg-gradient-to-br from-amber-100 to-amber-50 rounded-xl grid place-items-center">
                                        <svg class="h-5 w-5 text-amber-600" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2">
                                            <rect x="3" y="4" width="18" height="18" rx="2"></rect>
                                            <path d="M16 2v4M8 2v4M3 10h18"></path>
                                        </svg>
                                    </div>
                                    <input type="text" disabled value="{{ $user->created_at->format('d M Y') }}"
                                        class="w-full pl-[68px] pr-4 py-4 rounded-2xl border-2 border-slate-200 bg-gradient-to-br from-slate-50 to-white text-slate-800 font-medium text-sm cursor-not-allowed shadow-sm">
                                </div>
                            </div>
                        </div>

                        <hr class="border-slate-200 my-6">

                        <!-- STATISTIK TRAVEL -->
                        <div>
                            <h3 class="text-lg font-semibold text-[#0c607f] mb-4">Statistik Performa</h3>
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                                <div
                                    class="bg-gradient-to-br from-[#e3f1f6] to-[#d0e9f2] rounded-2xl px-6 py-4 shadow-soft hover-lift">
                                    <div class="flex items-center justify-between mb-2">
                                        <svg class="h-8 w-8 text-[#0c607f]" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2">
                                            <path d="M3 7h18l-1.5 9a2 2 0 0 1-2 1.7H6.5a2 2 0 0 1-2-1.7L3 7Z"></path>
                                            <path d="M6 7V5a3 3 0 0 1 3-3h6a3 3 0 0 1 3 3v2"></path>
                                        </svg>
                                    </div>
                                    <p class="text-xs text-slate-600 mb-1">Total Travel</p>
                                    <p class="text-3xl font-extrabold text-[#0c607f]">
                                        {{ $totalTravel }}
                                    </p>
                                </div>

                                <div
                                    class="bg-gradient-to-br from-[#d0f8e3] to-[#b8f0d3] rounded-2xl px-6 py-4 shadow-soft hover-lift">
                                    <div class="flex items-center justify-between mb-2">
                                        <svg class="h-8 w-8 text-emerald-700" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2">
                                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="9" cy="7" r="4"></circle>
                                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                        </svg>
                                    </div>
                                    <p class="text-xs text-slate-600 mb-1">Total Penumpang</p>
                                    <p class="text-3xl font-extrabold text-emerald-700">
                                        {{ number_format($totalTrip, 0, ',', '.') }}
                                    </p>
                                </div>

                                <div
                                    class="bg-gradient-to-br from-[#fff5d1] to-[#ffe9a8] rounded-2xl px-6 py-4 shadow-soft hover-lift">
                                    <div class="flex items-center justify-between mb-2">
                                        <svg class="h-8 w-8 text-amber-700" viewBox="0 0 24 24" fill="currentColor">
                                            <path
                                                d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                            </path>
                                        </svg>
                                    </div>
                                    <p class="text-xs text-slate-600 mb-1">Rating Rata-rata</p>
                                    <p class="text-3xl font-extrabold text-amber-700">
                                        {{ $ratingRata ? number_format($ratingRata, 1) : '–' }}
                                    </p>
                                </div>

                                <div
                                    class="bg-gradient-to-br from-[#f0e4ff] to-[#e4d5ff] rounded-2xl px-6 py-4 shadow-soft hover-lift">
                                    <div class="flex items-center justify-between mb-2">
                                        <svg class="h-8 w-8 text-purple-700" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <polyline points="12 6 12 12 16 14"></polyline>
                                        </svg>
                                    </div>
                                    <p class="text-xs text-slate-600 mb-1">Jam Berkendara</p>
                                    <p class="text-3xl font-extrabold text-purple-700">
                                        2,156
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- ACHIEVEMENTS -->
                <section class="bg-white rounded-[34px] shadow-soft p-8 hover-lift">
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h2 class="text-2xl font-semibold text-[#0c607f]">Pencapaian & Badge</h2>
                            <p class="text-sm text-slate-600 mt-1">Koleksi prestasi yang telah Anda raih</p>
                        </div>
                        <button
                            class="px-4 py-2 rounded-xl bg-[#e3f1f6] text-[#0b5f80] text-sm hover:bg-[#d0e9f2] transition">
                            Lihat Semua
                        </button>
                    </div>

                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div
                            class="bg-gradient-to-br from-amber-50 to-amber-100 rounded-2xl p-6 text-center hover-lift border-2 border-amber-200">
                            <div
                                class="h-16 w-16 mx-auto mb-3 bg-gradient-to-br from-amber-400 to-amber-600 rounded-full grid place-items-center shadow-lg">
                                <svg class="h-8 w-8 text-white" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="font-bold text-amber-900 mb-1">100 Trip Master</h3>
                            <p class="text-xs text-amber-700">Selesaikan 100 perjalanan</p>
                        </div>

                        <div
                            class="bg-gradient-to-br from-emerald-50 to-emerald-100 rounded-2xl p-6 text-center hover-lift border-2 border-emerald-200">
                            <div
                                class="h-16 w-16 mx-auto mb-3 bg-gradient-to-br from-emerald-400 to-emerald-600 rounded-full grid place-items-center shadow-lg">
                                <svg class="h-8 w-8 text-white" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2">
                                    <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                </svg>
                            </div>
                            <h3 class="font-bold text-emerald-900 mb-1">Top Earner</h3>
                            <p class="text-xs text-emerald-700">Pendapatan tertinggi bulan ini</p>
                        </div>

                        <div
                            class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 text-center hover-lift border-2 border-blue-200">
                            <div
                                class="h-16 w-16 mx-auto mb-3 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full grid place-items-center shadow-lg">
                                <svg class="h-8 w-8 text-white" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2">
                                    <path d="M12 20h9"></path>
                                    <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                </svg>
                            </div>
                            <h3 class="font-bold text-blue-900 mb-1">Perfect Rating</h3>
                            <p class="text-xs text-blue-700">Rating 5.0 selama 10 trip</p>
                        </div>

                        <div
                            class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-6 text-center hover-lift border-2 border-purple-200">
                            <div
                                class="h-16 w-16 mx-auto mb-3 bg-gradient-to-br from-purple-400 to-purple-600 rounded-full grid place-items-center shadow-lg">
                                <svg class="h-8 w-8 text-white" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2">
                                    <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                </svg>
                            </div>
                            <h3 class="font-bold text-purple-900 mb-1">Speed Demon</h3>
                            <p class="text-xs text-purple-700">Selesaikan trip dengan cepat</p>
                        </div>
                    </div>
                </section>

                <!-- KEAMANAN AKUN -->
                <section class="bg-white rounded-[34px] shadow-soft p-8 hover-lift">
                    <h2 class="text-2xl font-semibold text-[#0c607f] mb-2">Keamanan Akun</h2>
                    <p class="text-sm text-slate-600 mb-6">Kelola keamanan dan privasi akun Anda</p>

                    <!-- FORM UBAH PASSWORD -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-slate-700 mb-4 flex items-center gap-2">
                            <svg class="h-5 w-5 text-[#0b5f80]" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2">
                                </rect>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                            </svg>
                            Ubah Password
                        </h3>
                        <form class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="relative">
                                <label class="text-sm text-slate-600 flex items-center gap-2 mb-2">
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2">
                                        <rect x="3" y="11" width="18" height="11" rx="2"
                                            ry="2"></rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg>
                                    Password Lama
                                </label>
                                <input type="password" id="oldPass" class="input-soft pr-10"
                                    placeholder="Masukkan password lama">
                                <button type="button" onclick="togglePassword('oldPass')"
                                    class="absolute right-3 top-[38px] text-slate-400 hover:text-slate-600">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                </button>
                            </div>

                            <div class="relative">
                                <label class="text-sm text-slate-600 flex items-center gap-2 mb-2">
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2">
                                        <rect x="3" y="11" width="18" height="11" rx="2"
                                            ry="2"></rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg>
                                    Password Baru
                                </label>
                                <input type="password" id="newPass" class="input-soft pr-10"
                                    placeholder="Minimal 8 karakter">
                                <button type="button" onclick="togglePassword('newPass')"
                                    class="absolute right-3 top-[38px] text-slate-400 hover:text-slate-600">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                </button>
                            </div>

                            <div class="relative">
                                <label class="text-sm text-slate-600 flex items-center gap-2 mb-2">
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2">
                                        <rect x="3" y="11" width="18" height="11" rx="2"
                                            ry="2"></rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg>
                                    Konfirmasi Password
                                </label>
                                <input type="password" id="confirmPass" class="input-soft pr-10"
                                    placeholder="Ulangi password baru">
                                <button type="button" onclick="togglePassword('confirmPass')"
                                    class="absolute right-3 top-[38px] text-slate-400 hover:text-slate-600">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                </button>
                            </div>

                            <div class="md:col-span-3">
                                <div class="bg-blue-50 border border-blue-200 rounded-xl p-4 mb-4">
                                    <div class="flex gap-3">
                                        <svg class="h-5 w-5 text-blue-600 flex-shrink-0 mt-0.5" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <path d="M12 16v-4"></path>
                                            <path d="M12 8h.01"></path>
                                        </svg>
                                        <div class="text-sm text-blue-800">
                                            <p class="font-semibold mb-1">Tips Password Aman:</p>
                                            <ul class="list-disc list-inside space-y-1 text-xs">
                                                <li>Minimal 8 karakter dengan kombinasi huruf besar, kecil, angka, dan
                                                    simbol</li>
                                                <li>Jangan gunakan informasi pribadi yang mudah ditebak</li>
                                                <li>Gunakan password yang berbeda untuk setiap akun</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="md:col-span-3 flex justify-end gap-3">
                                <button type="button"
                                    class="px-6 py-2.5 rounded-xl border-2 border-slate-300 text-slate-700 text-sm hover:bg-slate-50 transition">
                                    Batal
                                </button>
                                <button type="submit"
                                    class="px-6 py-2.5 rounded-xl bg-[#0b5f80] text-white text-sm shadow-pill hover:bg-[#094b68] transition flex items-center gap-2">
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2">
                                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z">
                                        </path>
                                        <polyline points="17 21 17 13 7 13 7 21"></polyline>
                                        <polyline points="7 3 7 8 15 8"></polyline>
                                    </svg>
                                    Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>

                    <hr class="border-slate-200 my-8">

                    <!-- TWO FACTOR AUTHENTICATION -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-slate-700 mb-4 flex items-center gap-2">
                            <svg class="h-5 w-5 text-[#0b5f80]" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2">
                                <rect x="5" y="2" width="14" height="20" rx="2" ry="2">
                                </rect>
                                <line x1="12" y1="18" x2="12.01" y2="18"></line>
                            </svg>
                            Autentikasi Dua Faktor (2FA)
                        </h3>
                        <div
                            class="flex items-center justify-between p-5 bg-slate-50 rounded-xl border border-slate-200">
                            <div class="flex items-start gap-4">
                                <div class="h-12 w-12 bg-[#0b5f80] rounded-xl grid place-items-center flex-shrink-0">
                                    <svg class="h-6 w-6 text-white" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2">
                                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                        <path d="M9 12l2 2 4-4"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-slate-800">Tingkatkan Keamanan Akun</p>
                                    <p class="text-sm text-slate-600 mt-1">Tambahkan lapisan keamanan ekstra dengan
                                        verifikasi kode via SMS atau aplikasi authenticator</p>
                                    <span
                                        class="inline-flex items-center gap-1 mt-2 text-xs text-emerald-700 bg-emerald-100 px-3 py-1 rounded-full">
                                        <svg class="h-3 w-3" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2">
                                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                        </svg>
                                        Aktif
                                    </span>
                                </div>
                            </div>
                            <button
                                class="px-5 py-2.5 rounded-xl bg-slate-200 text-slate-700 text-sm hover:bg-slate-300 transition">
                                Kelola 2FA
                            </button>
                        </div>
                    </div>

                    <hr class="border-slate-200 my-8">

                    <!-- RIWAYAT LOGIN -->
                    <div>
                        <h3 class="text-lg font-semibold text-slate-700 mb-4 flex items-center gap-2">
                            <svg class="h-5 w-5 text-[#0b5f80]" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                            Aktivitas Login Terakhir
                        </h3>
                        <div class="space-y-3">
                            <div
                                class="flex items-center justify-between p-4 bg-emerald-50 rounded-xl border border-emerald-200">
                                <div class="flex items-center gap-4">
                                    <div class="h-10 w-10 bg-emerald-600 rounded-lg grid place-items-center">
                                        <svg class="h-5 w-5 text-white" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2">
                                            <rect x="2" y="7" width="20" height="14" rx="2"
                                                ry="2"></rect>
                                            <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-slate-800">Desktop - Chrome</p>
                                        <p class="text-sm text-slate-600">Pekanbaru, Riau · 25 Nov 2025, 14:32</p>
                                    </div>
                                </div>
                                <span class="badge bg-emerald-200 text-emerald-800">
                                    <span class="inline-block h-2 w-2 rounded-full bg-emerald-600"></span>
                                    Saat Ini
                                </span>
                            </div>

                            <div
                                class="flex items-center justify-between p-4 bg-slate-50 rounded-xl border border-slate-200">
                                <div class="flex items-center gap-4">
                                    <div class="h-10 w-10 bg-slate-600 rounded-lg grid place-items-center">
                                        <svg class="h-5 w-5 text-white" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2">
                                            <rect x="5" y="2" width="14" height="20" rx="2"
                                                ry="2"></rect>
                                            <line x1="12" y1="18" x2="12.01" y2="18">
                                            </line>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-slate-800">Mobile - Android App</p>
                                        <p class="text-sm text-slate-600">Pekanbaru, Riau · 24 Nov 2025, 08:15</p>
                                    </div>
                                </div>
                                <span class="badge bg-slate-200 text-slate-700">
                                    Terpercaya
                                </span>
                            </div>

                            <div
                                class="flex items-center justify-between p-4 bg-slate-50 rounded-xl border border-slate-200">
                                <div class="flex items-center gap-4">
                                    <div class="h-10 w-10 bg-slate-600 rounded-lg grid place-items-center">
                                        <svg class="h-5 w-5 text-white" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2">
                                            <rect x="2" y="7" width="20" height="14" rx="2"
                                                ry="2"></rect>
                                            <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-slate-800">Desktop - Firefox</p>
                                        <p class="text-sm text-slate-600">Pekanbaru, Riau · 23 Nov 2025, 19:45</p>
                                    </div>
                                </div>
                                <span class="badge bg-slate-200 text-slate-700">
                                    Terpercaya
                                </span>
                            </div>
                        </div>

                        <div class="mt-4 p-4 bg-amber-50 border border-amber-200 rounded-xl">
                            <div class="flex gap-3">
                                <svg class="h-5 w-5 text-amber-600 flex-shrink-0 mt-0.5" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2">
                                    <path
                                        d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z">
                                    </path>
                                    <line x1="12" y1="9" x2="12" y2="13"></line>
                                    <line x1="12" y1="17" x2="12.01" y2="17"></line>
                                </svg>
                                <div class="text-sm text-amber-800">
                                    <p class="font-semibold">Peringatan Keamanan</p>
                                    <p class="mt-1">Jika Anda melihat aktivitas yang mencurigakan atau tidak dikenal,
                                        segera ubah password dan hubungi tim support kami.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </main>
    </div>

    <script>
        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            input.type = input.type === 'password' ? 'text' : 'password';
        }
    </script>
</body>

</html>

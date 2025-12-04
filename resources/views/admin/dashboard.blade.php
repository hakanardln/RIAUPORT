<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>RiauPort – Dashboard Admin</title>

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

        .stat-card {
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 35px rgba(0, 0, 0, .2);
        }

        .gradient-bg {
            background: linear-gradient(135deg, #2e9ec2 0%, #0f6d86 100%);
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

        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out forwards;
        }

        .chart-bar {
            transition: height 0.5s ease;
        }
    </style>
</head>

<body class="h-screen overflow-hidden bg-gray-50 text-slate-800">
    <div class="h-full flex">

        <!-- SIDEBAR -->
        <aside
            class="w-[250px] h-full bg-gradient-to-b from-[#75d0f0] via-[#37a6cc] to-[#0a6687] flex flex-col items-center py-6">

            {{-- LOGO --}}
            <div class="mb-6">
                <img src="{{ asset('images/riauport-logo.png') }}" alt="RiauPort Logo"
                    class="h-16 object-contain mx-auto">
            </div>

            {{-- MENU --}}
            <nav class="space-y-3 w-full px-5 flex-1">
                {{-- Dashboard --}}
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-3 w-full bg-white text-[#0b5f80]
                           rounded-lg px-4 py-2.5 shadow-pill text-sm">
                    <div class="h-7 w-7 rounded-md bg-[#0b5f80] text-white grid place-items-center">
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
                    class="flex items-center gap-3 w-full bg-white text-[#0b5f80]
                           rounded-lg px-4 py-2.5 shadow-pill text-sm">
                    <div class="h-7 w-7 rounded-md bg-[#e7f5fb] text-[#0b5f80] grid place-items-center">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <path d="M3 7h18l-1.5 9a2 2 0 0 1-2 1.7H6.5a2 2 0 0 1-2-1.7L3 7Z"></path>
                            <path d="M6 7V5a3 3 0 0 1 3-3h6a3 3 0 0 1 3 3v2"></path>
                        </svg>
                    </div>
                    <span class="font-semibold">Sopir</span>
                </a>

                {{-- Pelanggan --}}
                <a href="{{ route('admin.pelanggan.index') }}"
                    class="flex items-center gap-3 w-full bg-white text-[#0b5f80]
                           rounded-lg px-4 py-2.5 shadow-pill text-sm">
                    <div class="h-7 w-7 rounded-md bg-[#e7f5fb] text-[#0b5f80] grid place-items-center">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <path d="M3 7h18l-1.5 9a2 2 0 0 1-2 1.7H6.5a2 2 0 0 1-2-1.7L3 7Z"></path>
                            <path d="M6 7V5a3 3 0 0 1 3-3h6a3 3 0 0 1 3 3v2"></path>
                        </svg>
                    </div>
                    <span class="font-semibold">Pelanggan</span>
                </a>

                {{-- Personalisasi --}}
                <a href="{{ route('admin.personalisasi.index') }}"
                    class="flex items-center gap-3 w-full bg-white text-[#0b5f80]
                           rounded-lg px-4 py-2.5 shadow-pill text-sm">
                    <div class="h-7 w-7 rounded-md bg-[#e7f5fb] text-[#0b5f80] grid place-items-center">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <path d="M12 15.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Z"></path>
                            <path
                                d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 1 1-4 0v-.09a1.65 1.65 0 0 0-1-1.51 1.65 1.65 0 0 0-1.82.33l-.06.06A2 2 0 1 1 3.2 17l.06-.06a1.65 1.65 0 0 0 .33-1.82A1.65 1.65 0 0 0 2 14H1.91a2 2 0 1 1 0-4H2c.7 0 1.33-.41 1.6-1.05Z">
                            </path>
                        </svg>
                    </div>
                    <span class="font-semibold">Personalisasi</span>
                </a>
            </nav>

            {{-- TOMBOL KELUAR --}}
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
        <main class="flex-1 h-full flex flex-col bg-gray-50 overflow-y-auto">

            <!-- HEADER -->
            <div class="flex items-center justify-between px-10 pt-6 pb-4 bg-white shadow-sm sticky top-0 z-10">
                <div>
                    <h1 class="text-3xl font-bold tracking-tight text-[#0c607f]">Dashboard</h1>
                    <p class="text-sm text-slate-500 mt-1">Selamat datang kembali, pantau aktivitas travelmu</p>
                </div>
                <div class="flex items-center gap-4">
                    <!-- Notifikasi -->
                    <button class="relative p-2 hover:bg-gray-100 rounded-lg transition">
                        <svg class="h-6 w-6 text-slate-600" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                        </svg>
                        <span class="absolute top-1 right-1 h-2 w-2 bg-red-500 rounded-full"></span>
                    </button>

                    <!-- User Info -->
                    <div class="flex items-center gap-3">
                        <div class="text-right">
                            <span class="block text-sm font-semibold text-slate-700">Administrator</span>
                            <span class="block text-xs text-slate-500">Admin</span>
                        </div>
                        <div
                            class="h-10 w-10 rounded-full bg-gradient-to-br from-[#5fb7cf] to-[#0f6d86] grid place-items-center shadow-md">
                            <svg class="h-6 w-6 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.8">
                                <circle cx="12" cy="8" r="4"></circle>
                                <path d="M4 22a8 8 0 0 1 16 0"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- HERO SECTION -->
            <section class="px-10 pt-6">
                <div
                    class="gradient-bg rounded-3xl px-8 py-8 flex items-center justify-between shadow-soft relative overflow-hidden">
                    <div class="absolute inset-0 opacity-10">
                        <div class="absolute top-10 left-10 h-32 w-32 bg-white rounded-full blur-3xl"></div>
                        <div class="absolute bottom-10 right-10 h-40 w-40 bg-white rounded-full blur-3xl"></div>
                    </div>
                    <div class="relative z-10 max-w-xl text-white">
                        <h2 class="text-4xl font-bold mb-3">Hallo, Administrator 👋</h2>
                        <p class="text-lg leading-relaxed opacity-95">
                            Setiap perjalanan dimulai dengan satu langkah, kelola layanan travelmu dengan penuh
                            semangat!
                        </p>
                        <button
                            class="mt-4 px-6 py-2.5 bg-white text-[#0f6d86] rounded-lg font-semibold hover:shadow-lg transition">
                            Lihat Statistik
                        </button>
                    </div>
                    <div class="hidden lg:flex items-center justify-center relative z-10">
                        <div
                            class="h-48 w-64 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center">
                            <svg class="h-32 w-32 text-white/80" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.5">
                                <rect x="2" y="3" width="20" height="14" rx="2"></rect>
                                <path d="M8 21h8"></path>
                                <path d="M12 17v4"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </section>

            <!-- STATISTIK CARDS -->
            <section class="px-10 pt-6">
                <div class="grid grid-cols-4 gap-5">
                    <!-- Sopir Aktif -->
                    <div
                        class="stat-card bg-gradient-to-br from-[#0f6d86] to-[#0a5266] text-white rounded-2xl shadow-soft p-6">
                        <div class="flex items-start justify-between mb-4">
                            <div class="h-12 w-12 bg-white/20 rounded-xl flex items-center justify-center">
                                <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                            </div>
                            <span class="text-xs bg-green-400/30 text-green-100 px-2 py-1 rounded-full">Aktif</span>
                        </div>
                        <div class="text-sm font-medium mb-1 opacity-90">Sopir Aktif</div>
                        <div class="text-4xl font-bold">24</div>
                        <div class="mt-3 text-xs opacity-75">↑ 12% dari bulan lalu</div>
                    </div>

                    <!-- Sopir Tidak Aktif -->
                    <div
                        class="stat-card bg-gradient-to-br from-[#6b7280] to-[#4b5563] text-white rounded-2xl shadow-soft p-6">
                        <div class="flex items-start justify-between mb-4">
                            <div class="h-12 w-12 bg-white/20 rounded-xl flex items-center justify-center">
                                <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                            </div>
                            <span class="text-xs bg-red-400/30 text-red-100 px-2 py-1 rounded-full">Nonaktif</span>
                        </div>
                        <div class="text-sm font-medium mb-1 opacity-90">Sopir Tidak Aktif</div>
                        <div class="text-4xl font-bold">8</div>
                        <div class="mt-3 text-xs opacity-75">↓ 5% dari bulan lalu</div>
                    </div>

                    <!-- Total Rute -->
                    <div
                        class="stat-card bg-gradient-to-br from-[#f59e0b] to-[#d97706] text-white rounded-2xl shadow-soft p-6">
                        <div class="flex items-start justify-between mb-4">
                            <div class="h-12 w-12 bg-white/20 rounded-xl flex items-center justify-center">
                                <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                            </div>
                            <span class="text-xs bg-blue-400/30 text-blue-100 px-2 py-1 rounded-full">Rute</span>
                        </div>
                        <div class="text-sm font-medium mb-1 opacity-90">Total Rute</div>
                        <div class="text-4xl font-bold">15</div>
                        <div class="mt-3 text-xs opacity-75">→ Stabil</div>
                    </div>

                    <!-- Total Pelanggan -->
                    <div
                        class="stat-card bg-gradient-to-br from-[#8b5cf6] to-[#6d28d9] text-white rounded-2xl shadow-soft p-6">
                        <div class="flex items-start justify-between mb-4">
                            <div class="h-12 w-12 bg-white/20 rounded-xl flex items-center justify-center">
                                <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                            </div>
                            <span
                                class="text-xs bg-purple-400/30 text-purple-100 px-2 py-1 rounded-full">Pelanggan</span>
                        </div>
                        <div class="text-sm font-medium mb-1 opacity-90">Total Pelanggan</div>
                        <div class="text-4xl font-bold">142</div>
                        <div class="mt-3 text-xs opacity-75">↑ 8% dari bulan lalu</div>
                    </div>
                </div>
            </section>

            <!-- GRAFIK & KALENDER -->
            <section class="px-10 pt-6 pb-8">
                <div class="grid grid-cols-3 gap-6">

                    <!-- Grafik Aktivitas (2 kolom) -->
                    <div class="col-span-2 bg-white rounded-2xl shadow-soft p-6">
                        <div class="flex items-center justify-between mb-6">
                            <div>
                                <h3 class="text-lg font-bold text-slate-800">Aktivitas Perjalanan</h3>
                                <p class="text-xs text-slate-500 mt-1">Data 7 hari terakhir</p>
                            </div>
                            <select
                                class="px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#0f6d86]">
                                <option>Minggu Ini</option>
                                <option>Bulan Ini</option>
                                <option>Tahun Ini</option>
                            </select>
                        </div>

                        <!-- Simple Bar Chart -->
                        <div class="flex items-end justify-between h-48 gap-3">
                            <div class="flex-1 flex flex-col items-center">
                                <div class="w-full bg-gradient-to-t from-[#0f6d86] to-[#2e9ec2] rounded-t-lg chart-bar"
                                    style="height: 65%"></div>
                                <span class="text-xs text-slate-500 mt-2">Sen</span>
                            </div>
                            <div class="flex-1 flex flex-col items-center">
                                <div class="w-full bg-gradient-to-t from-[#0f6d86] to-[#2e9ec2] rounded-t-lg chart-bar"
                                    style="height: 80%"></div>
                                <span class="text-xs text-slate-500 mt-2">Sel</span>
                            </div>
                            <div class="flex-1 flex flex-col items-center">
                                <div class="w-full bg-gradient-to-t from-[#0f6d86] to-[#2e9ec2] rounded-t-lg chart-bar"
                                    style="height: 55%"></div>
                                <span class="text-xs text-slate-500 mt-2">Rab</span>
                            </div>
                            <div class="flex-1 flex flex-col items-center">
                                <div class="w-full bg-gradient-to-t from-[#0f6d86] to-[#2e9ec2] rounded-t-lg chart-bar"
                                    style="height: 90%"></div>
                                <span class="text-xs text-slate-500 mt-2">Kam</span>
                            </div>
                            <div class="flex-1 flex flex-col items-center">
                                <div class="w-full bg-gradient-to-t from-[#0f6d86] to-[#2e9ec2] rounded-t-lg chart-bar"
                                    style="height: 75%"></div>
                                <span class="text-xs text-slate-500 mt-2">Jum</span>
                            </div>
                            <div class="flex-1 flex flex-col items-center">
                                <div class="w-full bg-gradient-to-t from-[#0f6d86] to-[#2e9ec2] rounded-t-lg chart-bar"
                                    style="height: 45%"></div>
                                <span class="text-xs text-slate-500 mt-2">Sab</span>
                            </div>
                            <div class="flex-1 flex flex-col items-center">
                                <div class="w-full bg-gradient-to-t from-[#0f6d86] to-[#2e9ec2] rounded-t-lg chart-bar"
                                    style="height: 40%"></div>
                                <span class="text-xs text-slate-500 mt-2">Min</span>
                            </div>
                        </div>

                        <!-- Stats -->
                        <div class="grid grid-cols-3 gap-4 mt-6 pt-6 border-t border-gray-100">
                            <div>
                                <div class="text-xs text-slate-500">Total Perjalanan</div>
                                <div class="text-2xl font-bold text-slate-800 mt-1">87</div>
                            </div>
                            <div>
                                <div class="text-xs text-slate-500">Rata-rata Harian</div>
                                <div class="text-2xl font-bold text-slate-800 mt-1">12</div>
                            </div>
                            <div>
                                <div class="text-xs text-slate-500">Perubahan</div>
                                <div class="text-2xl font-bold text-green-600 mt-1">+15%</div>
                            </div>
                        </div>
                    </div>

                    <!-- Kalender (1 kolom) -->
                    <div class="bg-white rounded-2xl shadow-soft p-6">
                        <div class="flex items-center justify-between mb-4">
                            <button class="text-slate-400 hover:text-slate-600">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <path d="M15 18l-6-6 6-6"></path>
                                </svg>
                            </button>
                            <div class="font-bold text-slate-700 text-base">November 2025</div>
                            <button class="text-slate-400 hover:text-slate-600">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <path d="M9 18l6-6-6-6"></path>
                                </svg>
                            </button>
                        </div>

                        <!-- Days of week -->
                        <div class="grid grid-cols-7 text-center text-xs font-semibold text-slate-400 mb-3">
                            <div>M</div>
                            <div>S</div>
                            <div>S</div>
                            <div>R</div>
                            <div>K</div>
                            <div>J</div>
                            <div>S</div>
                        </div>

                        <!-- Calendar dates -->
                        <div class="grid grid-cols-7 gap-1 text-center text-sm">
                            <div class="p-2"></div>
                            <div class="p-2"></div>
                            <div class="p-2"></div>
                            <div class="p-2 hover:bg-gray-100 rounded-lg cursor-pointer">1</div>
                            <div class="p-2 hover:bg-gray-100 rounded-lg cursor-pointer">2</div>
                            <div class="p-2 hover:bg-gray-100 rounded-lg cursor-pointer">3</div>
                            <div class="p-2 hover:bg-gray-100 rounded-lg cursor-pointer">4</div>

                            <div class="p-2 hover:bg-gray-100 rounded-lg cursor-pointer">5</div>
                            <div class="p-2 hover:bg-gray-100 rounded-lg cursor-pointer">6</div>
                            <div class="p-2 hover:bg-gray-100 rounded-lg cursor-pointer">7</div>
                            <div class="p-2 hover:bg-gray-100 rounded-lg cursor-pointer">8</div>
                            <div class="p-2 hover:bg-gray-100 rounded-lg cursor-pointer">9</div>
                            <div class="p-2 hover:bg-gray-100 rounded-lg cursor-pointer relative">
                                10
                                <span
                                    class="absolute bottom-1 left-1/2 -translate-x-1/2 h-1.5 w-1.5 bg-sky-500 rounded-full"></span>
                            </div>
                            <div class="p-2 hover:bg-gray-100 rounded-lg cursor-pointer">11</div>

                            <div
                                class="p-2 bg-gradient-to-br from-[#0f6d86] to-[#2e9ec2] text-white rounded-lg font-semibold cursor-pointer">
                                12</div>
                            <div class="p-2 hover:bg-gray-100 rounded-lg cursor-pointer">13</div>
                            <div class="p-2 hover:bg-gray-100 rounded-lg cursor-pointer">14</div>
                            <div class="p-2 bg-yellow-400 text-white rounded-lg font-semibold cursor-pointer">15</div>
                            <div class="p-2 hover:bg-gray-100 rounded-lg cursor-pointer">16</div>
                            <div class="p-2 hover:bg-gray-100 rounded-lg cursor-pointer">17</div>
                            <div class="p-2 hover:bg-gray-100 rounded-lg cursor-pointer">18</div>

                            <div class="p-2 hover:bg-gray-100 rounded-lg cursor-pointer">19</div>
                            <div class="p-2 hover:bg-gray-100 rounded-lg cursor-pointer">20</div>
                            <div class="p-2 hover:bg-gray-100 rounded-lg cursor-pointer">21</div>
                            <div class="p-2 hover:bg-gray-100 rounded-lg cursor-pointer">22</div>
                            <div class="p-2 hover:bg-gray-100 rounded-lg cursor-pointer">23</div>
                            <div class="p-2 hover:bg-gray-100 rounded-lg cursor-pointer relative">
                                24
                                <span
                                    class="absolute bottom-1 left-1/2 -translate-x-1/2 h-1.5 w-1.5 bg-sky-500 rounded-full"></span>
                            </div>
                            <div class="p-2 hover:bg-gray-100 rounded-lg cursor-pointer">25</div>

                            <div class="p-2 hover:bg-gray-100 rounded-lg cursor-pointer">26</div>
                            <div class="p-2 hover:bg-gray-100 rounded-lg cursor-pointer">27</div>
                            <div class="p-2 bg-pink-500 text-white rounded-lg font-semibold cursor-pointer">28</div>
                            <div class="p-2 hover:bg-gray-100 rounded-lg cursor-pointer">29</div>
                            <div class="p-2 hover:bg-gray-100 rounded-lg cursor-pointer">30</div>
                            <div class="p-2"></div>
                            <div class="p-2"></div>
                        </div>

                        <!-- Legend -->
                        <div class="mt-4 pt-4 border-t border-gray-100 space-y-2">
                            <div class="flex items-center gap-2 text-xs text-slate-600">
                                <span class="h-3 w-3 rounded-full bg-sky-500"></span>
                                <span>Agenda penting</span>
                            </div>
                            <div class="flex items-center gap-2 text-xs text-slate-600">
                                <span class="h-3 w-3 rounded-full bg-pink-500"></span>
                                <span>Pengingat</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- AKTIVITAS TERKINI & QUICK ACTIONS -->
            <section class="px-10 pb-8">
                <div class="grid grid-cols-3 gap-6">

                    <!-- Aktivitas Terkini (2 kolom) -->
                    <div class="col-span-2 bg-white rounded-2xl shadow-soft p-6">
                        <div class="flex items-center justify-between mb-5">
                            <h3 class="text-lg font-bold text-slate-800">Aktivitas Terkini</h3>
                            <a href="#" class="text-sm text-[#0f6d86] hover:underline font-medium">Lihat
                                Semua</a>
                        </div>

                        <div class="space-y-4">
                            <!-- Activity Item 1 -->
                            <div class="flex items-start gap-4 pb-4 border-b border-gray-100">
                                <div
                                    class="h-10 w-10 rounded-full bg-green-100 flex items-center justify-center flex-shrink-0">
                                    <svg class="h-5 w-5 text-green-600" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2">
                                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm text-slate-700"><span class="font-semibold">Budi Santoso</span>
                                        telah menyelesaikan perjalanan Batam - Tanjungpinang</p>
                                    <span class="text-xs text-slate-500">5 menit yang lalu</span>
                                </div>
                            </div>

                            <!-- Activity Item 2 -->
                            <div class="flex items-start gap-4 pb-4 border-b border-gray-100">
                                <div
                                    class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center flex-shrink-0">
                                    <svg class="h-5 w-5 text-blue-600" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2">
                                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm text-slate-700">Pelanggan baru <span class="font-semibold">Siti
                                            Aminah</span> telah mendaftar</p>
                                    <span class="text-xs text-slate-500">15 menit yang lalu</span>
                                </div>
                            </div>

                            <!-- Activity Item 3 -->
                            <div class="flex items-start gap-4 pb-4 border-b border-gray-100">
                                <div
                                    class="h-10 w-10 rounded-full bg-yellow-100 flex items-center justify-center flex-shrink-0">
                                    <svg class="h-5 w-5 text-yellow-600" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2">
                                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm text-slate-700">Pemeliharaan kendaraan untuk <span
                                            class="font-semibold">B 1234 CD</span> dijadwalkan</p>
                                    <span class="text-xs text-slate-500">1 jam yang lalu</span>
                                </div>
                            </div>

                            <!-- Activity Item 4 -->
                            <div class="flex items-start gap-4">
                                <div
                                    class="h-10 w-10 rounded-full bg-purple-100 flex items-center justify-center flex-shrink-0">
                                    <svg class="h-5 w-5 text-purple-600" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2">
                                        <rect x="3" y="4" width="18" height="18" rx="2"
                                            ry="2"></rect>
                                        <line x1="16" y1="2" x2="16" y2="6"></line>
                                        <line x1="8" y1="2" x2="8" y2="6"></line>
                                        <line x1="3" y1="10" x2="21" y2="10"></line>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm text-slate-700">Jadwal baru ditambahkan untuk rute <span
                                            class="font-semibold">Batam - Pekanbaru</span></p>
                                    <span class="text-xs text-slate-500">2 jam yang lalu</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions (1 kolom) -->
                    <div class="space-y-4">
                        <div class="bg-white rounded-2xl shadow-soft p-6">
                            <h3 class="text-lg font-bold text-slate-800 mb-4">Menu Cepat</h3>

                            <div class="space-y-3">
                                <button
                                    class="w-full flex items-center gap-3 p-3 bg-gradient-to-r from-[#0f6d86] to-[#2e9ec2] text-white rounded-xl hover:shadow-lg transition">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2">
                                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <line x1="19" y1="8" x2="19" y2="14"></line>
                                        <line x1="22" y1="11" x2="16" y2="11"></line>
                                    </svg>
                                    <span class="font-semibold text-sm">Tambah Sopir</span>
                                </button>

                                <button
                                    class="w-full flex items-center gap-3 p-3 bg-gray-50 hover:bg-gray-100 text-slate-700 rounded-xl transition">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2">
                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                        <circle cx="12" cy="10" r="3"></circle>
                                    </svg>
                                    <span class="font-semibold text-sm">Kelola Rute</span>
                                </button>

                                <button
                                    class="w-full flex items-center gap-3 p-3 bg-gray-50 hover:bg-gray-100 text-slate-700 rounded-xl transition">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2">
                                        <rect x="3" y="4" width="18" height="18" rx="2"
                                            ry="2"></rect>
                                        <line x1="16" y1="2" x2="16" y2="6"></line>
                                        <line x1="8" y1="2" x2="8" y2="6"></line>
                                        <line x1="3" y1="10" x2="21" y2="10"></line>
                                    </svg>
                                    <span class="font-semibold text-sm">Jadwal Perjalanan</span>
                                </button>

                                <button
                                    class="w-full flex items-center gap-3 p-3 bg-gray-50 hover:bg-gray-100 text-slate-700 rounded-xl transition">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                        <polyline points="14 2 14 8 20 8"></polyline>
                                        <line x1="16" y1="13" x2="8" y2="13"></line>
                                        <line x1="16" y1="17" x2="8" y2="17"></line>
                                        <polyline points="10 9 9 9 8 9"></polyline>
                                    </svg>
                                    <span class="font-semibold text-sm">Laporan</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </main>
    </div>
</body>

</html>

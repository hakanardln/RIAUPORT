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
    </style>
</head>

<body class="h-screen overflow-hidden bg-white text-slate-800">
    <div class="h-full flex">

        {{-- SIDEBAR --}}
        <aside
            class="w-[250px] h-full bg-gradient-to-b from-[#75d0f0] via-[#37a6cc] to-[#0a6687] flex flex-col items-center py-6">

            {{-- LOGO --}}
            <div class="mb-6">
                {{-- ganti src ini dengan logo milikmu --}}
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

                {{-- Profil --}}
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

                {{-- Sopir --}}
                <a href="#"
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
                <a href="#"
                    class="flex items-center gap-3 w-full bg-white text-[#0b5f80]
                       rounded-lg px-4 py-2.5 shadow-pill text-sm">
                    <div class="h-7 w-7 rounded-md bg-[#e7f5fb] text-[#0b5f80] grid place-items-center">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <circle cx="9" cy="8" r="3"></circle>
                            <path d="M16 21a7 7 0 0 0-14 0"></path>
                            <path d="M19 8v6M22 11h-6"></path>
                        </svg>
                    </div>
                    <span class="font-semibold">Pelanggan</span>
                </a>

                {{-- Pengaturan --}}
                <a href="#"
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
                    <span class="font-semibold">Pengaturan</span>
                </a>
            </nav>

            {{-- TOMBOL KELUAR (SELALU TERLIHAT) --}}
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

        {{-- MAIN CONTENT --}}
        <main class="flex-1 h-full flex flex-col bg-white">

            {{-- HEADER --}}
            <div class="flex items-center justify-between px-10 pt-6 pb-4">
                <h1 class="text-3xl font-semibold tracking-tight text-[#0c607f]">Dashboard</h1>
                <div class="flex items-center gap-3">
                    <span class="text-base font-medium text-[#0c607f]">
                        {{ $adminName ?? 'Administrator' }}
                    </span>
                    <div class="h-10 w-10 rounded-full bg-[#5fb7cf] grid place-items-center">
                        <svg class="h-6 w-6 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <circle cx="12" cy="8" r="4"></circle>
                            <path d="M4 22a8 8 0 0 1 16 0"></path>
                        </svg>
                    </div>
                </div>
            </div>

            {{-- HERO + (separuh tinggi layar) --}}
            <section class="px-10">
                <div class="bg-[#2e9ec2] rounded-[35px] px-8 py-6 flex items-center justify-between shadow-soft">
                    <div class="max-w-xl text-white">
                        <h2 class="text-3xl font-semibold mb-3">Hallo, {{ $adminName ?? 'Administrator' }}</h2>
                        <p class="text-base leading-relaxed">
                            “Setiap perjalanan dimulai dengan satu langkah, kelola layanan travelmu
                            dengan penuh semangat !”
                        </p>
                    </div>
                    <div class="hidden lg:block">
                        {{-- Ganti gambar laptop sesuai asetmu --}}
                        <img src="{{ asset('images/laptop1.png') }}" alt="Preview Website"
                            class="h-40 object-contain">
                    </div>
                </div>
            </section>

            {{-- KARTU + KALENDER (mengisi sisa ruang, tanpa scroll window) --}}
            <section class="flex-1 px-10 pt-5 pb-6 flex gap-8 items-stretch overflow-hidden">

                {{-- KARTU STATISTIK --}}
                <div class="flex-1 flex flex-col gap-5 justify-center">
                    <div class="flex gap-5 justify-start">
                        {{-- Sopir Aktif --}}
                        <div
                            class="w-[240px] h-[150px] bg-[#0f6d86] text-white rounded-[35px] shadow-soft
                                   flex flex-col items-center justify-center">
                            <div class="text-lg font-semibold mb-3 tracking-wide">Sopir Aktif</div>
                            <div class="text-4xl font-bold leading-none">
                                {{ $sopirAktif ?? 0 }}
                            </div>
                        </div>

                        {{-- Sopir Tidak Aktif --}}
                        <div
                            class="w-[240px] h-[150px] bg-[#0f6d86] text-white rounded-[35px] shadow-soft
                                   flex flex-col items-center justify-center">
                            <div class="text-lg font-semibold mb-3 tracking-wide">Sopir Tidak Aktif</div>
                            <div class="text-4xl font-bold leading-none">
                                {{ $sopirNonAktif ?? 0 }}
                            </div>
                        </div>
                    </div>

                    <div class="flex gap-5 justify-start">
                        {{-- Total Rute --}}
                        <div
                            class="w-[240px] h-[150px] bg-[#0f6d86] text-white rounded-[35px] shadow-soft
                                   flex flex-col items-center justify-center">
                            <div class="text-lg font-semibold mb-3 tracking-wide">Total Rute</div>
                            <div class="text-4xl font-bold leading-none">
                                {{ $totalRute ?? 0 }}
                            </div>
                        </div>

                        {{-- Total Pelanggan --}}
                        <div
                            class="w-[240px] h-[150px] bg-[#0f6d86] text-white rounded-[35px] shadow-soft
                                   flex flex-col items-center justify-center">
                            <div class="text-lg font-semibold mb-3 tracking-wide">Total Pelanggan</div>
                            <div class="text-4xl font-bold leading-none">
                                {{ $totalPelanggan ?? 0 }}
                            </div>
                        </div>
                    </div>
                </div>

                {{-- KALENDER (HTML, tanpa gambar) --}}
                <div class="w-[300px] flex items-center justify-center">
                    <div class="bg-white rounded-[28px] p-5 shadow-soft w-full">

                        {{-- Header bulan --}}
                        <div class="flex items-center justify-between mb-3">
                            <button class="text-slate-500 text-lg">≡</button>
                            <div class="font-semibold text-slate-700 tracking-wide text-sm">SEP 2018</div>
                            <button class="text-slate-500 text-lg">›</button>
                        </div>

                        {{-- Hari --}}
                        <div class="grid grid-cols-7 text-center text-[10px] font-semibold text-slate-400 mb-2">
                            <div>S</div>
                            <div>M</div>
                            <div>T</div>
                            <div>W</div>
                            <div>T</div>
                            <div>F</div>
                            <div>S</div>
                        </div>

                        {{-- Tanggal --}}
                        <div class="grid grid-cols-7 gap-1.5 text-center text-xs">
                            {{-- Minggu 1 --}}
                            <div></div>
                            <div></div>
                            <div></div>
                            <div>1</div>
                            <div>2</div>
                            <div>3</div>
                            <div>4</div>

                            {{-- Minggu 2 --}}
                            <div>5</div>
                            <div>6</div>
                            <div>7</div>
                            <div>8</div>
                            <div>9</div>
                            <div class="relative">
                                10
                                <span
                                    class="absolute left-1/2 -bottom-1 h-2 w-2 -translate-x-1/2 rounded-full bg-sky-500"></span>
                            </div>
                            <div>11</div>

                            <div class="relative">
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="h-6 w-6 rounded-full bg-sky-300"></div>
                                </div>
                                <span class="relative z-10 font-medium text-sky-900">12</span>
                            </div>

                            {{-- Minggu 3 --}}
                            <div>13</div>
                            <div>14</div>
                            <div class="relative">
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="h-6 w-6 rounded-full bg-yellow-400"></div>
                                </div>
                                <span class="relative z-10 font-medium text-white">15</span>
                            </div>
                            <div>16</div>
                            <div>17</div>
                            <div>18</div>
                            <div>19</div>

                            {{-- Minggu 4 --}}
                            <div>20</div>
                            <div>21</div>
                            <div>22</div>
                            <div>23</div>
                            <div class="relative">
                                24
                                <span
                                    class="absolute left-1/2 -bottom-1 h-2 w-2 -translate-x-1/2 rounded-full bg-sky-500"></span>
                            </div>
                            <div>25</div>
                            <div>26</div>

                            {{-- Minggu 5 --}}
                            <div>27</div>
                            <div class="relative">
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="h-6 w-6 rounded-full bg-pink-500"></div>
                                </div>
                                <span class="relative z-10 font-medium text-white">28</span>
                            </div>
                            <div>29</div>
                            <div>30</div>
                            <div>31</div>
                            <div></div>
                            <div></div>
                        </div>

                        {{-- Legend --}}
                        <div class="mt-3 flex items-center gap-3 text-[11px] text-slate-600">
                            <div class="flex items-center gap-1.5">
                                <span class="h-2.5 w-2.5 rounded-full bg-sky-500"></span>
                                Agenda penting
                            </div>
                            <div class="flex items-center gap-1.5">
                                <span class="h-2.5 w-2.5 rounded-full bg-pink-500"></span>
                                Pengingat
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- ERROR DB JIKA ADA --}}
            @if (!empty($dbError))
                <div class="px-10 pb-4">
                    <div class="p-3 rounded-xl bg-red-50 border border-red-200 text-xs text-red-700">
                        Koneksi database mengalami masalah: {{ $dbError }}
                    </div>
                </div>
            @endif
        </main>
    </div>
</body>

</html>

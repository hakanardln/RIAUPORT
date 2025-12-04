<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personalisasi – Dashboard Admin</title>

    <!-- FAVICON – cukup copy-paste ini saja, sudah 100% kerja di semua browser & device -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon_io/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon_io/site.webmanifest') }}">

    <!-- Opsional: untuk Android Chrome -->
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon_io/android-chrome-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('favicon_io/android-chrome-512x512.png') }}">

    {{-- Tailwind & Lucide --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }

        .shadow-pill {
            box-shadow: 0 8px 16px rgba(0, 0, 0, .18);
        }

        /* ===== OCEAN (DEFAULT) ===== */
        body.theme-ocean {
            background: #F3FAFF;
            color: #0F172A;
        }

        body.theme-ocean .section-title {
            color: #0F172A !important;
        }

        body.theme-ocean .settings-card {
            background: #F4FBFF;
            border-color: #D9EDFF;
        }

        body.theme-ocean .settings-title {
            color: #0F172A !important;
        }

        body.theme-ocean .settings-sub {
            color: #64748B !important;
        }

        body.theme-ocean .main-header-title {
            color: #0F172A !important;
        }

        body.theme-ocean .main-header-sub {
            color: #64748B !important;
        }

        /* ===== EMERALD ===== */
        body.theme-emerald {
            background: #ECFDF5;
            color: #064E3B;
        }

        body.theme-emerald .section-title {
            color: #064E3B !important;
        }

        body.theme-emerald .settings-card {
            background: #ECFDF5;
            border-color: #A7F3D0;
        }

        body.theme-emerald .settings-title {
            color: #022C22 !important;
        }

        body.theme-emerald .settings-sub {
            color: #047857 !important;
        }

        body.theme-emerald .main-header-title {
            color: #022C22 !important;
        }

        body.theme-emerald .main-header-sub {
            color: #047857 !important;
        }

        /* ===== SUNSET ===== */
        body.theme-sunset {
            background: #FFF7ED;
            color: #7C2D12;
        }

        body.theme-sunset .section-title {
            color: #7C2D12 !important;
        }

        body.theme-sunset .settings-card {
            background: #FFF7ED;
            border-color: #FED7AA;
        }

        body.theme-sunset .settings-title {
            color: #7C2D12 !important;
        }

        body.theme-sunset .settings-sub {
            color: #9A3412 !important;
        }

        body.theme-sunset .main-header-title {
            color: #7C2D12 !important;
        }

        body.theme-sunset .main-header-sub {
            color: #9A3412 !important;
        }

        /* ===== DARK ===== */
        body.theme-dark {
            background: #020617;
            color: #E5E7EB;
        }

        body.theme-dark .section-title {
            color: #E5E7EB !important;
        }

        body.theme-dark .settings-card {
            background: #020617;
            border-color: #1E293B;
        }

        body.theme-dark .settings-title {
            color: #F9FAFB !important;
        }

        body.theme-dark .settings-sub {
            color: #9CA3AF !important;
        }

        body.theme-dark .main-header-title {
            color: #F9FAFB !important;
        }

        body.theme-dark .main-header-sub {
            color: #9CA3AF !important;
        }

        .settings-card {
            overflow: hidden;
        }
    </style>
</head>

<body class="h-screen overflow-hidden theme-ocean">

    <div class="h-full flex">

        {{-- ===================== SIDEBAR ADMIN (SAMA DENGAN DASHBOARD ADMIN) ===================== --}}
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

                {{-- Personalisasi (halaman ini) --}}
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

        {{-- ===================== MAIN CONTENT (SCROLL DI SINI SAJA) ===================== --}}
        <main class="flex-1 h-full flex flex-col">

            {{-- HEADER --}}
            <header class="flex items-center justify-between px-10 pt-6 pb-4">
                <div>
                    <h1 class="text-3xl font-bold main-header-title">
                        Personalisasi
                    </h1>
                </div>

                <div class="flex items-center gap-3">
                    <div class="text-right">
                        <span class="text-slate-500">
                            {{ auth()->user()->name ?? 'Admin' }}
                        </span>
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

            {{-- KONTEN PENGATURAN --}}
            <div class="flex-1 px-10 pb-8 pt-1 space-y-10 overflow-y-auto">

                {{-- ========== AKUN ========== --}}
                <section>
                    <h2 class="section-title text-base font-semibold mb-3">Akun</h2>

                    <div class="settings-card border rounded-[24px] shadow-sm w-full">
                        {{-- Ubah Password --}}
                        <a href="#"
                            class="w-full flex items-center justify-between px-6 py-4 hover:bg-white/80 transition rounded-[24px]">
                            <div class="flex items-center gap-4">
                                <div class="h-11 w-11 rounded-2xl bg-[#C9F1FF] grid place-items-center">
                                    <i data-lucide="lock" class="text-[#0E98C6]" width="22"></i>
                                </div>
                                <div class="text-left">
                                    <p class="settings-title text-sm font-semibold">Ubah Password</p>
                                    <p class="settings-sub text-xs">
                                        Perbarui password akun Anda
                                    </p>
                                </div>
                            </div>
                            <i data-lucide="chevron-right" class="text-slate-400"></i>
                        </a>
                    </div>
                </section>

                {{-- ========== TAMPILAN ========== --}}
                <section>
                    <h2 class="section-title text-base font-semibold mb-3">Tampilan</h2>

                    <div class="settings-card border rounded-[24px] shadow-sm w-full">

                        {{-- Tombol Ubah Tema --}}
                        <button id="themeToggle" type="button"
                            class="w-full flex items-center justify-between px-6 py-4 hover:bg-white/80 transition first:rounded-t-[24px]">
                            <div class="flex items-center gap-4">
                                <div class="h-11 w-11 rounded-2xl grid place-items-center bg-[#FFF2C6]">
                                    <i data-lucide="palette" class="text-[#D97706]" width="22"></i>
                                </div>
                                <div class="text-left">
                                    <p class="settings-title text-sm font-semibold">Ubah Tema</p>
                                    <p class="settings-sub text-xs" id="currentThemeLabel">
                                        Ocean Blue (default)
                                    </p>
                                </div>
                            </div>
                            <i data-lucide="chevron-down" class="text-slate-400" id="themeChevron"></i>
                        </button>

                        {{-- Dropdown pilihan tema --}}
                        <div id="themeMenu" class="px-6 pb-4 pt-2 border-t border-[#E0F0FF] hidden">
                            <p class="settings-sub text-xs mb-3">
                                Pilih kombinasi warna yang cocok dengan dashboard RiauPort.
                            </p>

                            <div class="space-y-2">

                                {{-- Ocean Blue --}}
                                <button type="button"
                                    class="theme-option flex items-center justify-between w-full px-4 py-2.5 rounded-full bg-white/90 hover:bg-white transition border border-transparent"
                                    data-theme="theme-ocean" data-label="Ocean Blue (default)">
                                    <div class="flex items-center gap-3">
                                        <span class="flex -space-x-1">
                                            <span class="h-4 w-4 rounded-full bg-[#0E586D] border border-white"></span>
                                            <span class="h-4 w-4 rounded-full bg-[#37a6cc] border border-white"></span>
                                            <span class="h-4 w-4 rounded-full bg-[#75d0f0] border border-white"></span>
                                        </span>
                                        <span class="text-xs font-medium">Ocean Blue</span>
                                    </div>
                                    <i data-lucide="check" class="h-4 w-4 text-[#0E586D] theme-check opacity-100"></i>
                                </button>

                                {{-- Emerald Green --}}
                                <button type="button"
                                    class="theme-option flex items-center justify-between w-full px-4 py-2.5 rounded-full bg-white/70 hover:bg-white transition border border-transparent"
                                    data-theme="theme-emerald" data-label="Emerald Green">
                                    <div class="flex items-center gap-3">
                                        <span class="flex -space-x-1">
                                            <span
                                                class="h-4 w-4 rounded-full bg-emerald-700 border border-white"></span>
                                            <span
                                                class="h-4 w-4 rounded-full bg-emerald-500 border border-white"></span>
                                            <span
                                                class="h-4 w-4 rounded-full bg-emerald-300 border border-white"></span>
                                        </span>
                                        <span class="text-xs font-medium">Emerald Green</span>
                                    </div>
                                    <i data-lucide="check" class="h-4 w-4 text-emerald-600 theme-check opacity-0"></i>
                                </button>

                                {{-- Sunset Orange --}}
                                <button type="button"
                                    class="theme-option flex items-center justify-between w-full px-4 py-2.5 rounded-full bg-white/70 hover:bg-white transition border border-transparent"
                                    data-theme="theme-sunset" data-label="Sunset Orange">
                                    <div class="flex items-center gap-3">
                                        <span class="flex -space-x-1">
                                            <span
                                                class="h-4 w-4 rounded-full bg-orange-700 border border-white"></span>
                                            <span
                                                class="h-4 w-4 rounded-full bg-orange-500 border border-white"></span>
                                            <span
                                                class="h-4 w-4 rounded-full bg-yellow-300 border border-white"></span>
                                        </span>
                                        <span class="text-xs font-medium">Sunset Orange</span>
                                    </div>
                                    <i data-lucide="check" class="h-4 w-4 text-orange-600 theme-check opacity-0"></i>
                                </button>

                                {{-- Dark Mode --}}
                                <button type="button"
                                    class="theme-option flex items-center justify-between w-full px-4 py-2.5 rounded-full bg-slate-900/90 hover:bg-slate-900 transition border border-transparent"
                                    data-theme="theme-dark" data-label="Dark Mode">
                                    <div class="flex items-center gap-3">
                                        <span class="flex -space-x-1">
                                            <span
                                                class="h-4 w-4 rounded-full bg-slate-900 border border-slate-700"></span>
                                            <span
                                                class="h-4 w-4 rounded-full bg-slate-700 border border-slate-500"></span>
                                            <span
                                                class="h-4 w-4 rounded-full bg-slate-500 border border-slate-300"></span>
                                        </span>
                                        <span class="text-xs font-medium text-slate-100">Dark Mode</span>
                                    </div>
                                    <i data-lucide="check" class="h-4 w-4 text-slate-100 theme-check opacity-0"></i>
                                </button>
                            </div>
                        </div>

                        {{-- Bahasa --}}
                        <div
                            class="w-full flex items-center justify-between px-6 py-4 border-t border-[#E0F0FF] rounded-b-[24px]">
                            <div class="flex items-center gap-4">
                                <div class="h-11 w-11 rounded-2xl bg-[#C9F1FF] grid place-items-center">
                                    <i data-lucide="globe-2" class="text-[#0E98C6]" width="22"></i>
                                </div>
                                <div class="text-left">
                                    <p class="settings-title text-sm font-semibold">Bahasa</p>
                                    <p class="settings-sub text-xs">
                                        Bahasa Indonesia
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>

                {{-- ========== NOTIFIKASI ========== --}}
                <section>
                    <h2 class="section-title text-base font-semibold mb-3">Notifikasi</h2>

                    <div class="settings-card border rounded-[24px] shadow-sm w-full">

                        {{-- Push --}}
                        <div class="flex items-center justify-between px-6 py-4">
                            <div class="flex items-center gap-4">
                                <div class="h-11 w-11 rounded-2xl bg-[#C9F1FF] grid place-items-center">
                                    <i data-lucide="bell" class="text-[#0E98C6]" width="22"></i>
                                </div>
                                <div class="text-left">
                                    <p class="settings-title text-sm font-semibold">Notifikasi Push</p>
                                    <p class="settings-sub text-xs">
                                        Notifikasi aktif
                                    </p>
                                </div>
                            </div>

                            <div class="relative h-6 w-11 rounded-full bg-slate-300/80 flex items-center px-0.5">
                                <span class="h-5 w-5 rounded-full bg-white shadow"></span>
                            </div>
                        </div>

                        {{-- Email --}}
                        <button type="button"
                            class="w-full flex items-center justify-between px-6 py-4 hover:bg-white/80 transition border-t border-[#E0F0FF] rounded-b-[24px]">
                            <div class="flex items-center gap-4">
                                <div class="h-11 w-11 rounded-2xl bg-[#C9F1FF] grid place-items-center">
                                    <i data-lucide="mail" class="text-[#0E98C6]" width="22"></i>
                                </div>
                                <div class="text-left">
                                    <p class="settings-title text-sm font-semibold">Notifikasi Email</p>
                                    <p class="settings-sub text-xs">
                                        Atur notifikasi via email
                                    </p>
                                </div>
                            </div>
                            <i data-lucide="chevron-right" class="text-slate-400"></i>
                        </button>
                    </div>
                </section>

                {{-- ========== BANTUAN & INFORMASI ========== --}}
                <section class="pb-4">
                    <h2 class="section-title text-base font-semibold mb-3">Bantuan & Informasi</h2>

                    <div class="settings-card border rounded-[24px] shadow-sm w-full">
                        <button type="button"
                            class="w-full flex items-center justify-between px-6 py-4 hover:bg:white/80 transition rounded-[24px]">
                            <div class="flex items-center gap-4">
                                <div class="h-11 w-11 rounded-2xl bg-[#C9F1FF] grid place-items-center">
                                    <i data-lucide="help-circle" class="text-[#0E98C6]" width="22"></i>
                                </div>
                                <div class="text-left">
                                    <p class="settings-title text-sm font-semibold">Pusat Bantuan</p>
                                    <p class="settings-sub text-xs">
                                        FAQ dan panduan penggunaan
                                    </p>
                                </div>
                            </div>
                            <i data-lucide="chevron-right" class="text-slate-400"></i>
                        </button>
                    </div>
                </section>

                {{-- FOOTER --}}
                <footer class="pb-6 text-center">
                    <p class="text-xs text-slate-400">
                        © 2025 RiauPort. All rights reserved.
                    </p>
                </footer>
            </div>
        </main>
    </div>

    <script>
        lucide.createIcons();

        // ========= THEME PICKER =========
        const themeToggle = document.getElementById('themeToggle');
        const themeMenu = document.getElementById('themeMenu');
        const themeChevron = document.getElementById('themeChevron');
        const themeOptions = document.querySelectorAll('.theme-option');
        const themeChecks = document.querySelectorAll('.theme-check');
        const currentThemeLabel = document.getElementById('currentThemeLabel');

        function setTheme(themeClass, label) {
            document.body.classList.remove('theme-ocean', 'theme-emerald', 'theme-sunset', 'theme-dark');
            document.body.classList.add(themeClass);
            currentThemeLabel.textContent = label;

            themeOptions.forEach((btn, index) => {
                const checkIcon = themeChecks[index];
                if (btn.dataset.theme === themeClass) {
                    checkIcon.style.opacity = '1';
                    btn.classList.add('border-[#0E586D]');
                } else {
                    checkIcon.style.opacity = '0';
                    btn.classList.remove('border-[#0E586D]');
                }
            });
        }

        // buka/tutup dropdown tema
        themeToggle.addEventListener('click', () => {
            themeMenu.classList.toggle('hidden');
            themeChevron.classList.toggle('rotate-180');
        });

        // klik salah satu tema
        themeOptions.forEach((btn) => {
            btn.addEventListener('click', () => {
                const themeClass = btn.getAttribute('data-theme');
                const label = btn.getAttribute('data-label');
                setTheme(themeClass, label);
            });
        });

        // Set default theme
        setTheme('theme-ocean', 'Ocean Blue (default)');
    </script>

</body>

</html>

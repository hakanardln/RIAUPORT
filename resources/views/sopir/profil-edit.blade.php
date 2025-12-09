<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil Sopir – RiauPort</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "SF Pro Text", sans-serif;
            overflow: hidden;
        }

        .shadow-soft {
            box-shadow: 0 12px 24px rgba(0, 0, 0, .15);
        }

        .shadow-pill {
            box-shadow: 0 8px 16px rgba(0, 0, 0, .18);
        }
    </style>
</head>

<body class="bg-[#f5fafc] text-slate-800">

    <div class="h-screen flex">

        <!-- SIDEBAR -->
        <aside
            class="w-[250px] h-full overflow-y-auto bg-gradient-to-b from-[#75d0f0] via-[#37a6cc] to-[#0a6687] flex flex-col items-center py-6">

            {{-- LOGO --}}
            <div class="mb-6">
                <img src="{{ asset('images/riauport-logo.png') }}" alt="RiauPort Logo"
                    class="h-16 object-contain mx-auto">
            </div>

            @php
                $baseLink =
                    'flex items-center gap-3 w-full rounded-lg px-4 py-2.5 shadow-pill text-sm bg-white text-[#0b5f80] hover:bg-white/90 transition';
            @endphp

            <nav class="space-y-3 w-full px-5 flex-1">
                <a href="{{ route('sopir.dashboard') }}" class="{{ $baseLink }}">
                    <div class="h-7 w-7 rounded-md grid place-items-center bg-[#e7f5fb] text-[#0b5f80]">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <path d="m3 11 9-8 9 8"></path>
                            <path d="M9 22V12h6v10"></path>
                        </svg>
                    </div>
                    <span class="font-semibold">Dashboard</span>
                </a>

                <a href="{{ route('sopir.travel') }}" class="{{ $baseLink }}">
                    <div class="h-7 w-7 rounded-md grid place-items-center bg-[#e7f5fb] text-[#0b5f80]">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <path d="M3 7h18l-1.5 9a2 2 0 0 1-2 1.7H6.5a2 2 0 0 1-2-1.7L3 7Z"></path>
                            <path d="M6 7V5a3 3 0 0 1 3-3h6a3 3 0 0 1 3 3v2"></path>
                        </svg>
                    </div>
                    <span class="font-semibold">Travel</span>
                </a>

                <a href="{{ route('sopir.jadwal') }}" class="{{ $baseLink }}">
                    <div class="h-7 w-7 rounded-md grid place-items-center bg-[#e7f5fb] text-[#0b5f80]">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <rect x="3" y="4" width="18" height="18" rx="2"></rect>
                            <path d="M16 2v4M8 2v4M3 10h18"></path>
                        </svg>
                    </div>
                    <span class="font-semibold">Jadwal</span>
                </a>

                {{-- Profil aktif --}}
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

                <a href="{{ route('sopir.notifikasi') }}" class="{{ $baseLink }}">
                    <div class="h-7 w-7 rounded-md grid place-items-center bg-[#e7f5fb] text-[#0b5f80]">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <path d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"></path>
                            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                        </svg>
                    </div>
                    <span class="font-semibold">Notifikasi</span>
                </a>

                <a href="{{ route('sopir.personal') }}" class="{{ $baseLink }}">
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

                <a href="{{ route('sopir.bantuan') }}" class="{{ $baseLink }}">
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

            <div class="w-full px-5 pt-3 pb-2">
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
                    <h1 class="text-3xl font-semibold tracking-tight text-[#0c607f]">Edit Profil Sopir</h1>
                    <p class="text-sm text-slate-500 mt-1">Perbarui foto profil serta informasi akun Anda.</p>
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
                        class="h-10 w-10 rounded-full bg-gradient-to-br from-[#5fb7cf] to-[#0b5f80] grid place-items-center ring-2 ring-white shadow-lg text-white text-sm font-semibold">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                </div>
            </header>

            <!-- AREA KONTEN (tanpa scroll, konten dipaksa muat di layar) -->
            <div class="flex-1 flex items-center justify-center px-10 pb-6">

                <section class="bg-white rounded-[34px] shadow-soft px-10 pt-6 pb-7 w-full max-w-4xl">

                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <h2 class="text-2xl font-semibold text-[#0c607f]">Foto Profil & Informasi Akun</h2>
                            <p class="text-sm text-slate-600 mt-1">
                                Unggah foto profil baru atau ubah detail akun Anda.
                            </p>
                        </div>

                        <a href="{{ route('sopir.profil') }}" class="text-sm text-slate-500 hover:text-slate-700">
                            ← Kembali ke Profil
                        </a>
                    </div>

                    {{-- ERROR VALIDATION --}}
                    @if ($errors->any())
                        <div class="mb-3 px-4 py-3 rounded-xl bg-red-50 border border-red-200 text-sm text-red-800">
                            <p class="font-semibold mb-1">Perbaiki error berikut:</p>
                            <ul class="list-disc list-inside space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('sopir.profil.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- AVATAR --}}
                        <div class="flex flex-col items-center mb-2">
                            <div class="relative">
                                <div
                                    class="h-28 w-28 rounded-full bg-gradient-to-br from-[#5fb7cf] to-[#0b5f80] overflow-hidden grid place-items-center text-white text-3xl font-semibold ring-2 ring-white shadow-lg">
                                    @if (!empty($user->avatar_path))
                                        <img src="{{ asset('storage/' . $user->avatar_path) }}" alt="Foto Profil"
                                            class="h-full w-full object-cover">
                                    @else
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    @endif
                                </div>

                                <label for="avatar"
                                    class="absolute -bottom-3 left-1/2 -translate-x-1/2 px-4 py-1.5 rounded-full bg-[#0b5f80] text-white text-xs shadow-pill cursor-pointer hover:bg-[#094b68]">
                                    Ubah
                                </label>
                            </div>
                            <p class="mt-4 text-xs text-slate-500">
                                Format JPG/PNG (maks 2MB)
                            </p>
                        </div>

                        {{-- input file sebenarnya --}}
                        <input type="file" id="avatar" name="avatar" accept="image/*" class="hidden">

                        {{-- Nama Lengkap --}}
                        <div class="mt-2">
                            <label class="block text-sm font-medium text-slate-700 mb-1">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                class="w-full border rounded-xl px-4 py-2.5 text-sm border-slate-300 focus:outline-none focus:ring-2 focus:ring-[#0b5f80]">
                        </div>

                        {{-- Email --}}
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Email</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}"
                                class="w-full border rounded-xl px-4 py-2.5 text-sm border-slate-300 focus:outline-none focus:ring-2 focus:ring-[#0b5f80]">
                            <p class="mt-1 text-xs text-slate-500">
                                Pastikan email aktif, karena akan digunakan untuk reset password dan notifikasi penting.
                            </p>
                        </div>

                        {{-- Nomor WhatsApp --}}
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Nomor WhatsApp</label>
                            <input type="text" name="no_wa" value="{{ old('no_wa', $user->no_wa ?? '') }}"
                                placeholder="+62..."
                                class="w-full border rounded-xl px-4 py-2.5 text-sm border-slate-300 focus:outline-none focus:ring-2 focus:ring-[#0b5f80]">
                            <p class="mt-1 text-xs text-slate-500">
                                Nomor ini akan ditampilkan kepada penumpang untuk menghubungi Anda via WhatsApp.
                            </p>
                        </div>

                        {{-- ACTION BUTTONS --}}
                        <div class="flex items-center justify-end gap-3 pt-2">
                            <a href="{{ route('sopir.profil') }}"
                                class="px-5 py-2.5 rounded-xl border border-slate-300 text-sm text-slate-700 hover:bg-slate-50">
                                Batal
                            </a>
                            <button type="submit"
                                class="px-5 py-2.5 rounded-xl bg-[#0b5f80] text-white text-sm shadow-pill hover:bg-[#094b68]">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </section>

            </div>
        </main>
    </div>

</body>

</html>

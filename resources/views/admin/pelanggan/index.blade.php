<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>RiauPort – Data Pelanggan</title>

    <!-- FAVICON -->
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

                {{-- Pelanggan (HALAMAN INI) --}}
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

                {{-- Pengaturan --}}
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

        {{-- MAIN CONTENT --}}
        <main class="flex-1 p-10 overflow-y-auto">
            {{-- Header atas --}}
            <div class="flex items-center justify-between mb-8">
                <h1 class="text-4xl font-semibold tracking-tight text-[#0e586d]">Data Pelanggan</h1>
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

            {{-- Bar atas: Search --}}
            <div class="flex flex-col md:flex-row md:items-center md:justify-end mb-6 gap-4">
                {{-- Form search --}}
                <form method="GET" action="{{ route('admin.pelanggan.index') }}" class="flex items-center gap-2">
                    <label class="text-slate-600 text-sm">Search :</label>
                    <input type="text" name="q" value="{{ $search }}"
                        class="w-56 bg-white border border-gray-300 rounded-md px-3 py-2 text-sm outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Cari nama / email / telepon">
                </form>
            </div>

            {{-- TABEL --}}
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white">
                        <thead class="bg-gray-100 whitespace-nowrap">
                            <tr>
                                <th class="p-4 text-left text-sm font-semibold text-slate-900 w-16">
                                    No
                                </th>
                                <th class="p-4 text-left text-sm font-semibold text-slate-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-gray-500 inline mr-3"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M337.711 241.3a16 16 0 0 0-11.461 3.988c-18.739 16.561-43.688 25.682-70.25 25.682s-51.511-9.121-70.25-25.683a16.007 16.007 0 0 0-11.461-3.988c-78.926 4.274-140.752 63.672-140.752 135.224v107.152C33.537 499.293 46.9 512 63.332 512h385.336c16.429 0 29.8-12.707 29.8-28.325V376.523c-.005-71.552-61.831-130.95-140.757-135.223zM446.463 480H65.537V376.523c0-52.739 45.359-96.888 104.351-102.8C193.75 292.63 224.055 302.97 256 302.97s62.25-10.34 86.112-29.245c58.992 5.91 104.351 50.059 104.351 102.8zM256 234.375a117.188 117.188 0 1 0-117.188-117.187A117.32 117.32 0 0 0 256 234.375zM256 32a85.188 85.188 0 1 1-85.188 85.188A85.284 85.284 0 0 1 256 32z"
                                            data-original="#000000"></path>
                                    </svg>
                                    Nama Pelanggan
                                </th>
                                <th class="p-4 text-left text-sm font-semibold text-slate-900">
                                    Email
                                </th>
                                <th class="p-4 text-left text-sm font-semibold text-slate-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-gray-500 inline mr-3"
                                        viewBox="0 0 482.6 482.6">
                                        <path
                                            d="M98.339 320.8c47.6 56.9 104.9 101.7 170.3 133.4 24.9 11.8 58.2 25.8 95.3 28.2 2.3.1 4.5.2 6.8.2 24.9 0 44.9-8.6 61.2-26.3.1-.1.3-.3.4-.5 5.8-7 12.4-13.3 19.3-20 4.7-4.5 9.5-9.2 14.1-14 21.3-22.2 21.3-50.4-.2-71.9l-60.1-60.1c-10.2-10.6-22.4-16.2-35.2-16.2-12.8 0-25.1 5.6-35.6 16.1l-35.8 35.8c-3.3-1.9-6.7-3.6-9.9-5.2-4-2-7.7-3.9-11-6-32.6-20.7-62.2-47.7-90.5-82.4-14.3-18.1-23.9-33.3-30.6-48.8 9.4-8.5 18.2-17.4 26.7-26.1 3-3.1 6.1-6.2 9.2-9.3 10.8-10.8 16.6-23.3 16.6-36s-5.7-25.2-16.6-36l-29.8-29.8c-3.5-3.5-6.8-6.9-10.2-10.4-6.6-6.8-13.5-13.8-20.3-20.1-10.3-10.1-22.4-15.4-35.2-15.4-12.7 0-24.9 5.3-35.6 15.5l-37.4 37.4c-13.6 13.6-21.3 30.1-22.9 49.2-1.9 23.9 2.5 49.3 13.9 80 17.5 47.5 43.9 91.6 83.1 138.7zm-72.6-216.6c1.2-13.3 6.3-24.4 15.9-34l37.2-37.2c5.8-5.6 12.2-8.5 18.4-8.5 6.1 0 12.3 2.9 18 8.7 6.7 6.2 13 12.7 19.8 19.6 3.4 3.5 6.9 7 10.4 10.6l29.8 29.8c6.2 6.2 9.4 12.5 9.4 18.7s-3.2 12.5-9.4 18.7c-3.1 3.1-6.2 6.3-9.3 9.4-9.3 9.4-18 18.3-27.6 26.8l-.5.5c-8.3 8.3-7 16.2-5 22.2.1.3.2.5.3.8 7.7 18.5 18.4 36.1 35.1 57.1 30 37 61.6 65.7 96.4 87.8 4.3 2.8 8.9 5 13.2 7.2 4 2 7.7 3.9 11 6 .4.2.7.4 1.1.6 3.3 1.7 6.5 2.5 9.7 2.5 8 0 13.2-5.1 14.9-6.8l37.4-37.4c5.8-5.8 12.1-8.9 18.3-8.9 7.6 0 13.8 4.7 17.7 8.9l60.3 60.2c12 12 11.9 25-.3 37.7-4.2 4.5-8.6 8.8-13.3 13.3-7 6.8-14.3 13.8-20.9 21.7-11.5 12.4-25.2 18.2-42.9 18.2-1.7 0-3.5-.1-5.2-.2-32.8-2.1-63.3-14.9-86.2-25.8-62.2-30.1-116.8-72.8-162.1-127-37.3-44.9-62.4-86.7-79-131.5-10.3-27.5-14.2-49.6-12.6-69.7z"
                                            data-original="#000000" />
                                    </svg>
                                    Telepon
                                </th>
                                <th class="p-4 text-left text-sm font-semibold text-slate-900">
                                    Sumber
                                </th>
                                <th class="p-4 text-left text-sm font-semibold text-slate-900">
                                    Aksi
                                </th>
                            </tr>
                        </thead>

                        <tbody class="whitespace-nowrap divide-y divide-gray-200">
                            @forelse ($pelanggans as $pelanggan)
                                <tr class="hover:bg-slate-50">
                                    <td class="p-4 text-sm text-slate-900 text-center">
                                        {{ $loop->iteration + ($pelanggans->currentPage() - 1) * $pelanggans->perPage() }}
                                    </td>
                                    <td class="p-4 text-sm text-slate-900 font-medium">
                                        <div class="flex items-center cursor-pointer">
                                            <div
                                                class="h-9 w-9 rounded-full {{ $pelanggan->source == 'user' ? 'bg-gradient-to-br from-purple-400 to-purple-600' : 'bg-gradient-to-br from-blue-400 to-blue-600' }} grid place-items-center text-white font-semibold text-sm shrink-0">
                                                {{ strtoupper(substr($pelanggan->nama, 0, 1)) }}
                                            </div>
                                            <div class="ml-4">
                                                <p>{{ $pelanggan->nama }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-4 text-sm text-slate-600 font-medium">
                                        {{ $pelanggan->email ?? '-' }}
                                    </td>
                                    <td class="px-6 py-3 text-sm text-slate-600 font-medium">
                                        {{ $pelanggan->telepon ?? '-' }}
                                    </td>
                                    <td class="px-6 py-3 text-sm font-medium">
                                        @if ($pelanggan->source == 'user')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                                </svg>
                                                Akun Terdaftar
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                                                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path>
                                                </svg>
                                                Data Manual
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-3 text-sm text-slate-600 font-medium">
                                        @if ($pelanggan->source == 'pelanggan')
                                            <a href="{{ route('admin.pelanggan.edit', $pelanggan->original_id) }}"
                                                class="inline-block px-4 py-2 text-xs font-semibold rounded bg-emerald-500 text-white hover:bg-emerald-600 transition mr-2">
                                                Edit
                                            </a>

                                            <form id="delete-pelanggan-{{ $pelanggan->original_id }}" action="{{ route('admin.pelanggan.destroy', $pelanggan->original_id) }}"
                                                method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button"
                                                    onclick="showDeleteModal('delete-pelanggan-{{ $pelanggan->original_id }}', '{{ $pelanggan->nama }}', 'pelanggan')"
                                                    class="px-4 py-2 text-xs font-semibold rounded bg-red-500 text-white hover:bg-red-600 transition">
                                                    Delete
                                                </button>
                                            </form>
                                        @else
                                            {{-- Tombol Hapus untuk Akun User Terdaftar --}}
                                            <form id="delete-user-{{ $pelanggan->original_id }}" action="{{ route('admin.pelanggan.destroyUser', $pelanggan->original_id) }}"
                                                method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button"
                                                    onclick="showDeleteModal('delete-user-{{ $pelanggan->original_id }}', '{{ $pelanggan->nama }}', 'user')"
                                                    class="px-4 py-2 text-xs font-semibold rounded bg-red-500 text-white hover:bg-red-600 transition">
                                                    Hapus Akun
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="p-8 text-center text-slate-500">
                                        Belum ada data pelanggan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- PAGINATION --}}
                <div class="flex flex-col md:flex-row items-center justify-between p-4 border-t border-gray-200">
                    <p class="text-sm text-slate-500 mb-4 md:mb-0">
                        Menampilkan {{ $pelanggans->firstItem() ?? 0 }} sampai {{ $pelanggans->lastItem() ?? 0 }} dari
                        {{ $pelanggans->total() }} data
                    </p>

                    <div class="flex items-center gap-4">
                        <div class="flex items-center">
                            <p class="text-sm text-slate-500 mr-2">Display</p>
                            <select onchange="window.location.href='?per_page='+this.value+'&q={{ $search }}'"
                                class="text-sm text-slate-900 border border-gray-300 rounded-md h-9 px-2 outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="5" {{ request('per_page') == 5 ? 'selected' : '' }}>5</option>
                                <option value="10"
                                    {{ request('per_page') == 10 || !request('per_page') ? 'selected' : '' }}>10
                                </option>
                                <option value="20" {{ request('per_page') == 20 ? 'selected' : '' }}>20</option>
                                <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                            </select>
                        </div>

                        <div class="flex space-x-2">
                            @if ($pelanggans->onFirstPage())
                                <span
                                    class="flex items-center justify-center shrink-0 bg-gray-100 w-9 h-9 rounded-md cursor-not-allowed">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 fill-gray-300"
                                        viewBox="0 0 55.753 55.753">
                                        <path
                                            d="M12.745 23.915c.283-.282.59-.52.913-.727L35.266 1.581a5.4 5.4 0 0 1 7.637 7.638L24.294 27.828l18.705 18.706a5.4 5.4 0 0 1-7.636 7.637L13.658 32.464a5.367 5.367 0 0 1-.913-.727 5.367 5.367 0 0 1-1.572-3.911 5.369 5.369 0 0 1 1.572-3.911z" />
                                    </svg>
                                </span>
                            @else
                                <a href="{{ $pelanggans->previousPageUrl() }}"
                                    class="flex items-center justify-center shrink-0 bg-gray-100 hover:bg-gray-200 w-9 h-9 rounded-md transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 fill-gray-500"
                                        viewBox="0 0 55.753 55.753">
                                        <path
                                            d="M12.745 23.915c.283-.282.59-.52.913-.727L35.266 1.581a5.4 5.4 0 0 1 7.637 7.638L24.294 27.828l18.705 18.706a5.4 5.4 0 0 1-7.636 7.637L13.658 32.464a5.367 5.367 0 0 1-.913-.727 5.367 5.367 0 0 1-1.572-3.911 5.369 5.369 0 0 1 1.572-3.911z" />
                                    </svg>
                                </a>
                            @endif

                            @foreach ($pelanggans->getUrlRange(1, $pelanggans->lastPage()) as $page => $url)
                                @if ($page == $pelanggans->currentPage())
                                    <span
                                        class="flex items-center justify-center shrink-0 bg-blue-500 border border-blue-500 text-white px-3 h-9 rounded-md font-medium text-sm">
                                        {{ $page }}
                                    </span>
                                @else
                                    <a href="{{ $url }}"
                                        class="flex items-center justify-center shrink-0 border border-gray-300 hover:border-blue-500 hover:bg-blue-50 text-slate-900 px-3 h-9 rounded-md font-medium text-sm transition">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach

                            @if ($pelanggans->hasMorePages())
                                <a href="{{ $pelanggans->nextPageUrl() }}"
                                    class="flex items-center justify-center shrink-0 bg-gray-100 hover:bg-gray-200 w-9 h-9 rounded-md transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 fill-gray-500 rotate-180"
                                        viewBox="0 0 55.753 55.753">
                                        <path
                                            d="M12.745 23.915c.283-.282.59-.52.913-.727L35.266 1.581a5.4 5.4 0 0 1 7.637 7.638L24.294 27.828l18.705 18.706a5.4 5.4 0 0 1-7.636 7.637L13.658 32.464a5.367 5.367 0 0 1-.913-.727 5.367 5.367 0 0 1-1.572-3.911 5.369 5.369 0 0 1 1.572-3.911z" />
                                    </svg>
                                </a>
                            @else
                                <span
                                    class="flex items-center justify-center shrink-0 bg-gray-100 w-9 h-9 rounded-md cursor-not-allowed">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 fill-gray-300 rotate-180"
                                        viewBox="0 0 55.753 55.753">
                                        <path
                                            d="M12.745 23.915c.283-.282.59-.52.913-.727L35.266 1.581a5.4 5.4 0 0 1 7.637 7.638L24.294 27.828l18.705 18.706a5.4 5.4 0 0 1-7.636 7.637L13.658 32.464a5.367 5.367 0 0 1-.913-.727 5.367 5.367 0 0 1-1.572-3.911 5.369 5.369 0 0 1 1.572-3.911z" />
                                    </svg>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>



        </main>
    </div>

    {{-- MODAL KONFIRMASI HAPUS --}}
    <div id="deleteModal" class="fixed inset-0 z-50 hidden">
        {{-- Backdrop --}}
        <div id="modalBackdrop" class="absolute inset-0 bg-black/60 backdrop-blur-sm transition-opacity duration-300 opacity-0"></div>
        
        {{-- Modal Content --}}
        <div class="flex items-center justify-center min-h-screen p-4">
            <div id="modalContent" class="relative bg-white rounded-2xl shadow-2xl max-w-md w-full transform transition-all duration-300 scale-95 opacity-0">
                {{-- Header with Icon --}}
                <div class="pt-8 pb-4 text-center">
                    <div class="mx-auto w-16 h-16 rounded-full bg-gradient-to-br from-red-100 to-red-200 flex items-center justify-center mb-4 animate-pulse">
                        <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800">Konfirmasi Hapus</h3>
                </div>
                
                {{-- Body --}}
                <div class="px-8 pb-6 text-center">
                    <p class="text-slate-600 mb-2" id="deleteMessage">Apakah Anda yakin ingin menghapus data ini?</p>
                    <p class="font-semibold text-slate-800 text-lg" id="deleteName"></p>
                    <div id="deleteWarning" class="mt-4 p-3 bg-amber-50 border border-amber-200 rounded-lg hidden">
                        <div class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-amber-500 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            <p class="text-sm text-amber-700 text-left">Akun pelanggan akan dihapus permanen dan tidak dapat dikembalikan.</p>
                        </div>
                    </div>
                </div>
                
                {{-- Footer Buttons --}}
                <div class="px-8 pb-8 flex gap-3">
                    <button type="button" onclick="closeDeleteModal()"
                        class="flex-1 px-5 py-3 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold transition-all duration-200 hover:scale-[1.02]">
                        Batal
                    </button>
                    <button type="button" onclick="confirmDelete()"
                        class="flex-1 px-5 py-3 rounded-xl bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white font-semibold transition-all duration-200 hover:scale-[1.02] shadow-lg shadow-red-500/30">
                        Ya, Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let currentFormId = null;

        function showDeleteModal(formId, name, type) {
            currentFormId = formId;
            const modal = document.getElementById('deleteModal');
            const backdrop = document.getElementById('modalBackdrop');
            const content = document.getElementById('modalContent');
            const deleteName = document.getElementById('deleteName');
            const deleteMessage = document.getElementById('deleteMessage');
            const deleteWarning = document.getElementById('deleteWarning');

            // Set nama pelanggan
            deleteName.textContent = name;

            // Set pesan dan warning berdasarkan tipe
            if (type === 'user') {
                deleteMessage.textContent = 'Apakah Anda yakin ingin menghapus akun pelanggan ini?';
                deleteWarning.classList.remove('hidden');
            } else {
                deleteMessage.textContent = 'Apakah Anda yakin ingin menghapus data pelanggan ini?';
                deleteWarning.classList.add('hidden');
            }

            // Show modal
            modal.classList.remove('hidden');
            
            // Trigger animation
            setTimeout(() => {
                backdrop.classList.remove('opacity-0');
                backdrop.classList.add('opacity-100');
                content.classList.remove('scale-95', 'opacity-0');
                content.classList.add('scale-100', 'opacity-100');
            }, 10);

            // Prevent body scroll
            document.body.style.overflow = 'hidden';
        }

        function closeDeleteModal() {
            const modal = document.getElementById('deleteModal');
            const backdrop = document.getElementById('modalBackdrop');
            const content = document.getElementById('modalContent');

            // Trigger close animation
            backdrop.classList.remove('opacity-100');
            backdrop.classList.add('opacity-0');
            content.classList.remove('scale-100', 'opacity-100');
            content.classList.add('scale-95', 'opacity-0');

            // Hide modal after animation
            setTimeout(() => {
                modal.classList.add('hidden');
                currentFormId = null;
            }, 300);

            // Restore body scroll
            document.body.style.overflow = '';
        }

        function confirmDelete() {
            if (currentFormId) {
                document.getElementById(currentFormId).submit();
            }
        }

        // Close modal on backdrop click
        document.getElementById('modalBackdrop').addEventListener('click', closeDeleteModal);

        // Close modal on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeDeleteModal();
            }
        });
    </script>
</body>

</html>

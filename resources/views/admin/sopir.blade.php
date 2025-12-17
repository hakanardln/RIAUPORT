<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>RiauPort – Kelola Travel</title>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon_io/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon_io/site.webmanifest') }}">

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

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
            <div class="mb-6">
                <img src="{{ asset('images/riauport-logo.png') }}" alt="RiauPort Logo"
                    class="h-16 object-contain mx-auto">
            </div>

            <nav class="space-y-3 w-full px-5 flex-1">
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-3 w-full bg-white text-[#0b5f80] rounded-lg px-4 py-2.5 shadow-pill text-sm">
                    <div class="h-7 w-7 rounded-md bg-[#e7f5fb] text-[#0b5f80] grid place-items-center">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <path d="m3 11 9-8 9 8"></path>
                            <path d="M9 22V12h6v10"></path>
                        </svg>
                    </div>
                    <span class="font-semibold">Dashboard</span>
                </a>

                {{-- Menu Travel/Sopir AKTIF --}}
                <a href="{{ route('admin.sopir.index') }}"
                    class="flex items-center gap-3 w-full bg-white text-[#0b5f80] rounded-lg px-4 py-2.5 shadow-pill text-sm ring-2 ring-white/70">
                    <div class="h-7 w-7 rounded-md bg-[#0b5f80] text-white grid place-items-center">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <path d="M3 7h18l-1.5 9a2 2 0 0 1-2 1.7H6.5a2 2 0 0 1-2-1.7L3 7Z"></path>
                            <path d="M6 7V5a3 3 0 0 1 3-3h6a3 3 0 0 1 3 3v2"></path>
                        </svg>
                    </div>
                    <span class="font-semibold">Travel</span>
                </a>

                <a href="{{ route('admin.pelanggan.index') }}"
                    class="flex items-center gap-3 w-full bg-white text-[#0b5f80] rounded-lg px-4 py-2.5 shadow-pill text-sm">
                    <div class="h-7 w-7 rounded-md bg-[#e7f5fb] text-[#0b5f80] grid place-items-center">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <circle cx="12" cy="7" r="3"></circle>
                            <path d="M4 21a8 8 0 0 1 16 0"></path>
                        </svg>
                    </div>
                    <span class="font-semibold">Pelanggan</span>
                </a>

                <a href="{{ route('admin.personalisasi.index') }}"
                    class="flex items-center gap-3 w-full bg-white text-[#0b5f80] rounded-lg px-4 py-2.5 shadow-pill text-sm">
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

            <div class="w-full px-5 pt-3">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="flex items-center gap-3 w-full bg-white text-[#0b5f80] rounded-lg px-4 py-2.5 shadow-pill text-sm">
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
        <main class="flex-1 h-full flex flex-col bg-gray-50 overflow-y-auto">

            {{-- HEADER --}}
            <div class="flex items-center justify-between px-10 pt-6 pb-4 bg-white border-b">
                <div>
                    <h1 class="text-3xl font-semibold tracking-tight text-[#0c607f]">Kelola Travel</h1>
                    <p class="text-gray-600 text-sm mt-1">Review dan setujui pendaftaran travel dari sopir</p>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-slate-500">{{ auth()->user()->name ?? 'Admin' }}</span>
                    <div class="h-10 w-10 rounded-full bg-[#5fb7cf] grid place-items-center">
                        <svg class="h-6 w-6 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <circle cx="12" cy="8" r="4"></circle>
                            <path d="M4 22a8 8 0 0 1 16 0"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="p-6">
                {{-- Alert --}}
                @if (session('success'))
                    <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl text-green-700">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl text-red-700">
                        {{ session('error') }}
                    </div>
                @endif

                {{-- Statistik --}}
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                    <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100">
                        <p class="text-sm text-gray-600">Menunggu Review</p>
                        <p class="text-3xl font-bold text-orange-600 mt-1">{{ $stats['pending'] }}</p>
                    </div>
                    <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100">
                        <p class="text-sm text-gray-600">Disetujui</p>
                        <p class="text-3xl font-bold text-green-600 mt-1">{{ $stats['approved'] }}</p>
                    </div>
                    <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100">
                        <p class="text-sm text-gray-600">Ditolak</p>
                        <p class="text-3xl font-bold text-red-600 mt-1">{{ $stats['rejected'] }}</p>
                    </div>
                    <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100">
                        <p class="text-sm text-gray-600">Total Travel</p>
                        <p class="text-3xl font-bold text-blue-600 mt-1">{{ $stats['total'] }}</p>
                    </div>
                </div>

                {{-- Filter Tabs --}}
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 mb-6">
                    <div class="flex border-b border-gray-200">
                        <a href="{{ route('admin.sopir.index', ['status' => 'semua']) }}"
                            class="px-6 py-3 font-semibold {{ $filter === 'semua' ? 'text-[#0e586d] border-b-2 border-[#0e586d]' : 'text-gray-500 hover:text-gray-700' }}">
                            Semua ({{ $stats['total'] }})
                        </a>
                        <a href="{{ route('admin.sopir.index', ['status' => 'pending']) }}"
                            class="px-6 py-3 font-semibold {{ $filter === 'pending' ? 'text-[#0e586d] border-b-2 border-[#0e586d]' : 'text-gray-500 hover:text-gray-700' }}">
                            Menunggu Review ({{ $stats['pending'] }})
                        </a>
                        <a href="{{ route('admin.sopir.index', ['status' => 'approved']) }}"
                            class="px-6 py-3 font-semibold {{ $filter === 'approved' ? 'text-[#0e586d] border-b-2 border-[#0e586d]' : 'text-gray-500 hover:text-gray-700' }}">
                            Disetujui ({{ $stats['approved'] }})
                        </a>
                        <a href="{{ route('admin.sopir.index', ['status' => 'rejected']) }}"
                            class="px-6 py-3 font-semibold {{ $filter === 'rejected' ? 'text-[#0e586d] border-b-2 border-[#0e586d]' : 'text-gray-500 hover:text-gray-700' }}">
                            Ditolak ({{ $stats['rejected'] }})
                        </a>
                    </div>
                </div>

                {{-- List Travel --}}
                <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                    @forelse($travels as $travel)
                        <div class="p-6 border-b border-gray-100 last:border-b-0">
                            <div class="flex items-start gap-4">
                                {{-- Foto Armada --}}
                                <div class="w-32 h-24 rounded-lg overflow-hidden bg-gray-100 flex-shrink-0">
                                    @if ($travel->foto_armada)
                                        <img src="{{ url('/file/' . rawurlencode($travel->foto_armada)) }}"
                                            alt="Armada" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-gray-400">
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                    @endif
                                </div>

                                {{-- Info Travel --}}
                                <div class="flex-1">
                                    <div class="flex items-start justify-between mb-2">
                                        <div>
                                            <h3 class="text-lg font-bold text-gray-900">
                                                {{ $travel->armada ?? 'Travel ' . $travel->lokasi_asal }}
                                            </h3>
                                            <p class="text-sm text-gray-600">
                                                {{ $travel->lokasi_asal }} → {{ $travel->lokasi_tujuan }}
                                            </p>
                                        </div>

                                        {{-- Status Badge --}}
                                        @if ($travel->status_approval === 'pending')
                                            <span
                                                class="px-3 py-1 bg-orange-100 text-orange-700 text-xs font-semibold rounded-full">
                                                Menunggu Review
                                            </span>
                                        @elseif($travel->status_approval === 'approved')
                                            <span
                                                class="px-3 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full">
                                                Disetujui
                                            </span>
                                        @else
                                            <span
                                                class="px-3 py-1 bg-red-100 text-red-700 text-xs font-semibold rounded-full">
                                                Ditolak
                                            </span>
                                        @endif
                                    </div>

                                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-sm text-gray-600 mb-3">
                                        <div>
                                            <span class="font-semibold">Sopir:</span> {{ $travel->sopir->name }}
                                        </div>
                                        <div>
                                            <span class="font-semibold">Tanggal:</span>
                                            {{ $travel->tanggal_berangkat ? $travel->tanggal_berangkat->format('d M Y') : '-' }}
                                        </div>
                                        <div>
                                            <span class="font-semibold">Jam:</span>
                                            {{ $travel->jam_berangkat ?? '-' }}
                                        </div>
                                        <div>
                                            <span class="font-semibold">Harga:</span> Rp
                                            {{ number_format($travel->harga_per_orang ?? 0, 0, ',', '.') }}
                                        </div>
                                    </div>

                                    @if ($travel->status_approval === 'rejected' && $travel->rejection_reason)
                                        <div
                                            class="mb-3 p-3 bg-red-50 border border-red-100 rounded-lg text-sm text-red-700">
                                            <span class="font-semibold">Alasan Penolakan:</span>
                                            {{ $travel->rejection_reason }}
                                        </div>
                                    @endif

                                    {{-- Action Buttons --}}
                                    <div class="flex items-center gap-2">
                                        @if ($travel->status_approval === 'pending')
                                            <button onclick="openApproveModal({{ $travel->id }})"
                                                class="px-4 py-2 bg-green-600 text-white rounded-lg text-sm font-medium hover:bg-green-700">
                                                ✓ Setujui
                                            </button>

                                            <button onclick="openRejectModal({{ $travel->id }})"
                                                class="px-4 py-2 bg-red-600 text-white rounded-lg text-sm font-medium hover:bg-red-700">
                                                ✕ Tolak
                                            </button>
                                        @endif

                                        <button onclick="openDeleteModal({{ $travel->id }})"
                                            class="px-4 py-2 bg-gray-600 text-white rounded-lg text-sm font-medium hover:bg-gray-700">
                                            Hapus
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="p-12 text-center text-gray-500">
                            <p>Tidak ada travel yang ditemukan</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </main>
    </div>

    {{-- Modal Approve --}}
    <div id="approveModal"
        class="hidden fixed inset-0 p-4 flex flex-wrap justify-center items-center w-full h-full z-[1000] before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] overflow-auto">
        <div class="w-full max-w-lg bg-white shadow-lg rounded-lg p-6 relative">
            <svg id="approveCloseIcon" xmlns="http://www.w3.org/2000/svg"
                class="w-3.5 h-3.5 cursor-pointer shrink-0 fill-gray-400 hover:fill-red-500 float-right"
                viewBox="0 0 320.591 320.591">
                <path
                    d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643 10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0 1-21.256 7.288z"
                    data-original="#000000"></path>
                <path
                    d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0 1-23.078 7.288z"
                    data-original="#000000"></path>
            </svg>
            <div class="mt-8 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-14 shrink-0 fill-green-500 inline"
                    viewBox="0 0 512 512">
                    <path
                        d="M383.841 171.838c-7.881-8.31-21.02-8.676-29.343-.775L221.987 296.732l-63.204-64.893c-8.005-8.213-21.13-8.393-29.35-.387-8.213 7.998-8.386 21.137-.388 29.35l77.492 79.561a20.687 20.687 0 0 0 14.869 6.275 20.744 20.744 0 0 0 14.288-5.694l147.373-139.762c8.316-7.888 8.668-21.027.774-29.344z"
                        data-original="#000000" />
                    <path
                        d="M256 0C114.84 0 0 114.84 0 256s114.84 256 256 256 256-114.84 256-256S397.16 0 256 0zm0 470.487c-118.265 0-214.487-96.214-214.487-214.487 0-118.265 96.221-214.487 214.487-214.487 118.272 0 214.487 96.221 214.487 214.487 0 118.272-96.215 214.487-214.487 214.487z"
                        data-original="#000000" />
                </svg>
                <div class="mt-6">
                    <h3 class="text-xl text-slate-900 font-semibold">Setujui Travel Ini?</h3>
                    <p class="text-sm text-slate-500 leading-relaxed mt-3">
                        Travel ini akan disetujui dan dapat dilihat oleh pelanggan. Pastikan semua data sudah benar
                        sebelum menyetujui.
                    </p>
                </div>
            </div>
            <div class="flex gap-4 mt-8">
                <button id="approveCloseButton" type="button"
                    class="px-5 py-2.5 rounded-md cursor-pointer w-full text-slate-900 text-sm font-medium bg-gray-200 hover:bg-gray-300 active:bg-gray-200">
                    Batal
                </button>
                <button id="confirmApproveButton" type="button"
                    class="px-5 py-2.5 rounded-md cursor-pointer w-full text-white text-sm font-medium bg-green-600 hover:bg-green-700 active:bg-green-600">
                    Ya, Setujui
                </button>
            </div>
        </div>
    </div>

    {{-- Modal Delete --}}
    <div id="deleteModal"
        class="hidden fixed inset-0 p-4 flex flex-wrap justify-center items-center w-full h-full z-[1000] before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] overflow-auto">
        <div class="w-full max-w-md bg-white shadow-lg rounded-xl p-6 relative">
            <svg id="deleteCloseIcon" xmlns="http://www.w3.org/2000/svg"
                class="w-3.5 h-3.5 cursor-pointer shrink-0 fill-gray-400 hover:fill-red-500 float-right"
                viewBox="0 0 320.591 320.591">
                <path
                    d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643 10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0 1-21.256 7.288z"
                    data-original="#000000"></path>
                <path
                    d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0 1-23.078 7.288z"
                    data-original="#000000"></path>
            </svg>
            <div class="mt-6">
                <div class="w-14 h-14 p-3.5 rounded-full bg-red-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-full h-full fill-red-500 inline"
                        viewBox="0 0 24 24">
                        <path
                            d="M19 7a1 1 0 0 0-1 1v11.191A1.92 1.92 0 0 1 15.99 21H8.01A1.92 1.92 0 0 1 6 19.191V8a1 1 0 0 0-2 0v11.191A3.918 3.918 0 0 0 8.01 23h7.98A3.918 3.918 0 0 0 20 19.191V8a1 1 0 0 0-1-1Zm1-3h-4V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v2H4a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM10 4V3h4v1Z"
                            data-original="#000000" />
                        <path d="M11 17v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Zm4 0v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Z"
                            data-original="#000000" />
                    </svg>
                </div>
                <div class="mt-4">
                    <h3 class="text-slate-900 text-lg font-semibold">Apakah Anda yakin ingin menghapusnya?</h3>
                    <p class="text-slate-600 text-sm mt-2">Travel yang dihapus tidak dapat dikembalikan. Tindakan ini
                        tidak dapat dibatalkan.</p>
                </div>
                <div class="flex gap-4 mt-8">
                    <button id="deleteCloseButton" type="button"
                        class="px-5 py-2.5 rounded-md cursor-pointer w-full text-slate-900 text-sm font-medium bg-gray-200 hover:bg-gray-300 active:bg-gray-200">
                        Tidak, Batal
                    </button>
                    <button id="confirmDeleteButton" type="button"
                        class="px-5 py-2.5 rounded-md cursor-pointer w-full text-white text-sm font-medium bg-red-600 hover:bg-red-700 active:bg-red-600">
                        Ya, Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Reject --}}
    <div id="rejectModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-md w-full p-6" onclick="event.stopPropagation()">
            <h3 class="text-xl font-bold text-gray-900 mb-4">Tolak Travel</h3>

            <form id="rejectForm" onsubmit="return submitReject(event)">
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Alasan Penolakan <span class="text-red-500">*</span>
                    </label>
                    <textarea id="rejectionReason" rows="4" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0e586d] focus:border-transparent"
                        placeholder="Contoh: Foto armada kurang jelas, data tidak lengkap, dll."></textarea>
                </div>

                <div class="flex gap-2">
                    <button type="button" onclick="closeRejectModal()"
                        class="flex-1 px-4 py-2 bg-gray-200 text-gray-700 rounded-lg font-medium hover:bg-gray-300">
                        Batal
                    </button>
                    <button type="submit"
                        class="flex-1 px-4 py-2 bg-red-600 text-white rounded-lg font-medium hover:bg-red-700">
                        Tolak Travel
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        let currentTravelId = null;

        // Modal Approve Functions
        function openApproveModal(travelId) {
            currentTravelId = travelId;
            document.getElementById('approveModal').classList.remove('hidden');
        }

        function closeApproveModal() {
            document.getElementById('approveModal').classList.add('hidden');
            currentTravelId = null;
        }

        document.getElementById('approveCloseIcon')?.addEventListener('click', closeApproveModal);
        document.getElementById('approveCloseButton')?.addEventListener('click', closeApproveModal);

        document.getElementById('confirmApproveButton')?.addEventListener('click', function() {
            if (!currentTravelId) return;

            fetch(`/admin/travel/${currentTravelId}/approve`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        closeApproveModal();
                        location.reload();
                    } else {
                        alert(data.message || 'Terjadi kesalahan');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat approve travel');
                });
        });

        document.getElementById('approveModal')?.addEventListener('click', function(e) {
            if (e.target === this.firstElementChild) {
                closeApproveModal();
            }
        });

        // Modal Delete Functions
        function openDeleteModal(travelId) {
            currentTravelId = travelId;
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
            currentTravelId = null;
        }

        document.getElementById('deleteCloseIcon')?.addEventListener('click', closeDeleteModal);
        document.getElementById('deleteCloseButton')?.addEventListener('click', closeDeleteModal);

        document.getElementById('confirmDeleteButton')?.addEventListener('click', function() {
            if (!currentTravelId) return;

            fetch(`/admin/travel/${currentTravelId}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        closeDeleteModal();
                        location.reload();
                    } else {
                        alert(data.message || 'Terjadi kesalahan');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat menghapus travel');
                });
        });

        document.getElementById('deleteModal')?.addEventListener('click', function(e) {
            if (e.target === this.firstElementChild) {
                closeDeleteModal();
            }
        });

        // Modal Reject Functions
        function openRejectModal(travelId) {
            currentTravelId = travelId;
            document.getElementById('rejectModal').classList.remove('hidden');
        }

        function closeRejectModal() {
            document.getElementById('rejectModal').classList.add('hidden');
            document.getElementById('rejectionReason').value = '';
            currentTravelId = null;
        }

        function submitReject(event) {
            event.preventDefault();

            const reason = document.getElementById('rejectionReason').value;
            if (!reason || !currentTravelId) return false;

            fetch(`/admin/travel/${currentTravelId}/reject`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        rejection_reason: reason
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        closeRejectModal();
                        location.reload();
                    } else {
                        alert(data.message || 'Terjadi kesalahan');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat reject travel');
                });

            return false;
        }

        document.getElementById('rejectModal')?.addEventListener('click', function(e) {
            if (e.target === this) {
                closeRejectModal();
            }
        });
    </script>

</body>

</html>

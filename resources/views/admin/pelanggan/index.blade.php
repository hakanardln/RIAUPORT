<!DOCTYPE html>
<html lang="id">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>RiauPort – Data Pelanggan</title>
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
                <a href="{{ route('admin.pelanggan.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white/20 transition">
                    <span class="grid place-items-center h-9 w-9 rounded-full bg-white/20">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.7">
                            <circle cx="9" cy="8" r="3"></circle>
                            <path d="M16 21a7 7 0 0 0-14 0"></path>
                            <path d="M19 8v6M22 11h-6"></path>
                        </svg>
                    </span>
                    Pelanggan
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

        {{-- =============== MAIN CONTENT =============== --}}
        <main class="flex-1 p-10">
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

            {{-- Bar atas: Tambah + Search --}}
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 gap-4">
                {{-- Tambah Data --}}
                <div class="flex items-center gap-2">
                    <button onclick="document.getElementById('form-tambah').scrollIntoView({behavior:'smooth'});"
                        class="flex items-center gap-2 text-[#0e586d] font-semibold">
                        <span class="text-2xl leading-none">+</span>
                        <span>Tambah Data</span>
                    </button>
                </div>

                {{-- Form search --}}
                <form method="GET" action="{{ route('admin.pelanggan.index') }}" class="flex items-center gap-2">
                    <label class="text-slate-600">Search :</label>
                    <input type="text" name="q" value="{{ $search }}"
                        class="w-56 bg-[#e5e5e5] rounded px-3 py-1.5 text-sm outline-none focus:ring-2 focus:ring-[#0e586d]"
                        placeholder="Cari nama / email / telepon">
                </form>
            </div>

            {{-- TABEL --}}
            <div class="bg-white rounded-2xl shadow-md p-4">
                <div class="overflow-x-auto">
                    <table class="w-full border border-[#0e586d] border-collapse text-sm">
                        <thead>
                            <tr class="bg-[#f2fafc] text-[#0e586d]">
                                <th class="border border-[#0e586d] px-3 py-2 w-16">No</th>
                                <th class="border border-[#0e586d] px-3 py-2">Nama Pelanggan</th>
                                <th class="border border-[#0e586d] px-3 py-2">Email</th>
                                <th class="border border-[#0e586d] px-3 py-2">Telepon</th>
                                <th class="border border-[#0e586d] px-3 py-2 w-56">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pelanggans as $pelanggan)
                                <tr class="hover:bg-slate-50">
                                    <td class="border border-[#0e586d] px-3 py-2 text-center">
                                        {{ $loop->iteration + ($pelanggans->currentPage() - 1) * $pelanggans->perPage() }}
                                    </td>
                                    <td class="border border-[#0e586d] px-3 py-2">{{ $pelanggan->nama }}</td>
                                    <td class="border border-[#0e586d] px-3 py-2">{{ $pelanggan->email ?? '-' }}</td>
                                    <td class="border border-[#0e586d] px-3 py-2">{{ $pelanggan->telepon ?? '-' }}
                                    </td>
                                    <td class="border border-[#0e586d] px-3 py-2 text-center">
                                        <a href="{{ route('admin.pelanggan.edit', $pelanggan->id) }}"
                                            class="inline-block px-5 py-2 text-sm font-semibold rounded bg-[#39ff4c] text-slate-900 mr-2">
                                            Edit
                                        </a>

                                        <form action="{{ route('admin.pelanggan.destroy', $pelanggan->id) }}"
                                            method="POST" class="inline-block"
                                            onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="px-5 py-2 text-sm font-semibold rounded bg-[#ff6b6b] text-white">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5"
                                        class="border border-[#0e586d] px-3 py-4 text-center text-slate-500">
                                        Belum ada data pelanggan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- PAGINATION --}}
                <div class="mt-4">
                    {{ $pelanggans->links() }}
                </div>
            </div>

            {{-- FORM TAMBAH DATA (simple, di bawah tabel) --}}
            <div id="form-tambah" class="mt-10 bg-white rounded-2xl shadow-md p-6">
                <h2 class="text-xl font-semibold text-[#0e586d] mb-4">Tambah Pelanggan</h2>

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

                <form action="{{ route('admin.pelanggan.store') }}" method="POST"
                    class="grid md:grid-cols-2 gap-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Nama Pelanggan</label>
                        <input type="text" name="nama" value="{{ old('nama') }}"
                            class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#0e586d]"
                            required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#0e586d]">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Telepon</label>
                        <input type="text" name="telepon" value="{{ old('telepon') }}"
                            class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#0e586d]">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-slate-700 mb-1">Alamat</label>
                        <textarea name="alamat" rows="3"
                            class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#0e586d]">{{ old('alamat') }}</textarea>
                    </div>

                    <div class="md:col-span-2 flex justify-end">
                        <button type="submit"
                            class="px-6 py-2 rounded-full bg-[#0e586d] text-white text-sm font-semibold shadow-cta-btn">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>

        </main>
    </div>
</body>

</html>

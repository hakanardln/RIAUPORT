<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>RiauPort – Data Pelanggan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-[#f6fbfd] text-slate-800">
    <div class="flex min-h-screen">

        {{-- =============== SIDEBAR =============== --}}
        <aside class="w-72 bg-gradient-to-b from-[#bfe7f0] via-[#7bc0d2] to-[#3a8aa0] text-white p-6 relative">
            <div class="flex flex-col items-center mb-10 select-none">
                <img src="{{ asset('images/riauport-logo.png') }}" class="h-20 mb-4" alt="RiauPort">
            </div>

            <nav class="space-y-4">
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl bg-white text-[#0e586d] font-semibold shadow">
                    <span class="grid place-items-center h-9 w-9 rounded-full bg-[#0e586d] text-white">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.7">
                            <path d="m3 11 9-8 9 8"></path>
                            <path d="M9 22V12h6v10"></path>
                        </svg>
                    </span>
                    Dashboard
                </a>

                <a href="#"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl bg-white/80 text-[#0e586d] font-semibold shadow">
                    <span class="grid place-items-center h-9 w-9 rounded-full bg-[#0e586d] text-white">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.7">
                            <path d="M6 19l1-7 3-3 7-1-1 7-3 3-7 1Z"></path>
                            <path d="M14 6l4 4"></path>
                        </svg>
                    </span>
                    Pelanggan
                </a>
            </nav>

            {{-- Tombol keluar --}}
            <form action="{{ route('logout') }}" method="POST" class="absolute left-6 right-6 bottom-6">
                @csrf
                <button type="submit"
                    class="w-full flex items-center justify-center gap-2 px-4 py-3 rounded-xl bg-white/90 text-[#0e586d] font-semibold shadow hover:bg-white">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                        <path d="M16 17l5-5-5-5"></path>
                        <path d="M21 12H9"></path>
                    </svg>
                    Keluar
                </button>
            </form>
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
                                    <td class="border border-[#0e586d] px-3 py-2">{{ $pelanggan->telepon ?? '-' }}</td>
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

                <form action="{{ route('admin.pelanggan.store') }}" method="POST" class="grid md:grid-cols-2 gap-4">
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

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Edit Pelanggan – RiauPort</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-[#f6fbfd] text-slate-800">
    <div class="flex min-h-screen">

        {{-- Sidebar bisa sama persis seperti index, dipersingkat di sini --}}
        <aside class="w-72 bg-gradient-to-b from-[#bfe7f0] via-[#7bc0d2] to-[#3a8aa0] text-white p-6 relative">
            <div class="flex flex-col items-center mb-10">
                <img src="{{ asset('images/riauport-logo-white.png') }}" class="h-20 mb-4" alt="RiauPort">
            </div>
            <nav class="space-y-4">
                <a href="{{ route('admin.pelanggan.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl bg-white text-[#0e586d] font-semibold shadow">
                    Pelanggan
                </a>
            </nav>
        </aside>

        <main class="flex-1 p-10">
            <h1 class="text-3xl font-semibold text-[#0e586d] mb-6">Edit Pelanggan</h1>

            @if ($errors->any())
                <div class="mb-4 rounded-lg bg-red-50 border border-red-200 text-red-700 px-4 py-3">
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.pelanggan.update', $pelanggan->id) }}" method="POST"
                class="bg-white rounded-2xl shadow-md p-6 max-w-xl">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-sm font-medium text-slate-700 mb-1">Nama Pelanggan</label>
                    <input type="text" name="nama" value="{{ old('nama', $pelanggan->nama) }}"
                        class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#0e586d]"
                        required>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-slate-700 mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email', $pelanggan->email) }}"
                        class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#0e586d]">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-slate-700 mb-1">Telepon</label>
                    <input type="text" name="telepon" value="{{ old('telepon', $pelanggan->telepon) }}"
                        class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#0e586d]">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-slate-700 mb-1">Alamat</label>
                    <textarea name="alamat" rows="3"
                        class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#0e586d]">{{ old('alamat', $pelanggan->alamat) }}</textarea>
                </div>

                <div class="flex items-center justify-between">
                    <a href="{{ route('admin.pelanggan.index') }}" class="text-sm text-slate-500 hover:underline">
                        &larr; Kembali
                    </a>
                    <button type="submit"
                        class="px-6 py-2 rounded-full bg-[#0e586d] text-white text-sm font-semibold shadow-cta-btn">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </main>
    </div>
</body>

</html>

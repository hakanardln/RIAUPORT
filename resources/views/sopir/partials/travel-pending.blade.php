{{-- resources/views/sopir/partials/travel-pending.blade.php --}}

<div class="bg-[#f9fbfc] rounded-[32px] shadow-soft px-10 py-16 mt-0">
    <div class="max-w-2xl mx-auto text-center">

        {{-- Icon Clock dengan animasi pulse --}}
        <div class="mb-6 flex justify-center">
            <div class="relative">
                <div
                    class="h-24 w-24 rounded-full bg-gradient-to-br from-[#fbbf24] to-[#f59e0b] grid place-items-center animate-pulse">
                    <svg class="h-12 w-12 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M12 6v6l4 2"></path>
                    </svg>
                </div>
                {{-- Ring animation --}}
                <div class="absolute inset-0 h-24 w-24 rounded-full border-4 border-yellow-300 animate-ping opacity-20">
                </div>
            </div>
        </div>

        {{-- Judul --}}
        <h2 class="text-2xl font-bold text-[#0c607f] mb-3">
            Data Sedang Ditinjau
        </h2>

        {{-- Deskripsi --}}
        <p class="text-sm text-slate-600 leading-relaxed mb-6 max-w-md mx-auto">
            Terima kasih telah mengirimkan informasi travel Anda. Tim admin kami sedang meninjau data yang Anda
            kirimkan.
            Proses ini biasanya memakan waktu <strong>1-2 hari kerja</strong>.
        </p>

        {{-- Info Card --}}
        <div class="bg-amber-50 border border-amber-200 rounded-2xl p-6 text-left mb-8">
            <div class="flex items-start gap-3">
                <div class="h-8 w-8 rounded-full bg-amber-100 grid place-items-center flex-shrink-0 mt-0.5">
                    <svg class="h-4 w-4 text-amber-600" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M12 16v-4"></path>
                        <path d="M12 8h.01"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <h3 class="text-sm font-semibold text-amber-900 mb-2">Yang Akan Ditinjau:</h3>
                    <ul class="text-xs text-amber-800 space-y-1">
                        <li class="flex items-center gap-2">
                            <span class="inline-block h-1 w-1 rounded-full bg-amber-600"></span>
                            Kelengkapan data armada dan dokumen
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="inline-block h-1 w-1 rounded-full bg-amber-600"></span>
                            Kejelasan rute dan jadwal perjalanan
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="inline-block h-1 w-1 rounded-full bg-amber-600"></span>
                            Informasi kontak dan harga
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Data yang Dikirim --}}
        <div class="bg-white border border-slate-200 rounded-2xl p-6 text-left mb-6">
            <h3 class="text-sm font-semibold text-slate-700 mb-4">Data yang Anda Kirimkan:</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-xs">
                <div>
                    <p class="text-slate-500 mb-1">Armada</p>
                    <p class="font-semibold text-slate-800">{{ $travel->armada }}</p>
                </div>
                <div>
                    <p class="text-slate-500 mb-1">Plat Nomor</p>
                    <p class="font-semibold text-slate-800">{{ $travel->plat_nomor }}</p>
                </div>
                <div>
                    <p class="text-slate-500 mb-1">Rute</p>
                    <p class="font-semibold text-slate-800">{{ $travel->lokasi_asal }} → {{ $travel->lokasi_tujuan }}
                    </p>
                </div>
                <div>
                    <p class="text-slate-500 mb-1">Jadwal</p>
                    <p class="font-semibold text-slate-800">
                        {{ \Carbon\Carbon::parse($travel->tanggal_berangkat)->format('d M Y') }},
                        {{ \Carbon\Carbon::parse($travel->jam_berangkat)->format('H:i') }}
                    </p>
                </div>
                <div>
                    <p class="text-slate-500 mb-1">Harga</p>
                    <p class="font-semibold text-slate-800">Rp
                        {{ number_format($travel->harga_per_orang, 0, ',', '.') }}</p>
                </div>
                <div>
                    <p class="text-slate-500 mb-1">Dikirim pada</p>
                    <p class="font-semibold text-slate-800">
                        {{ \Carbon\Carbon::parse($travel->submitted_at)->format('d M Y, H:i') }}
                    </p>
                </div>
            </div>

            @if ($travel->foto_armada)
                <div class="mt-4 pt-4 border-t border-slate-100">
                    <p class="text-slate-500 mb-2 text-xs">Foto Armada</p>
                    <img src="{{ url('/file/' . rawurlencode($travel->foto_armada)) }}" alt="Armada"
                        class="w-48 h-32 object-cover rounded-xl border border-slate-200">
                </div>
            @else
                <div class="mt-4 pt-4 border-t border-slate-100">
                    <p class="text-slate-500 mb-2 text-xs">Foto Armada</p>
                    <div
                        class="w-48 h-32 rounded-xl border border-slate-200 bg-gray-100 flex items-center justify-center">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>
            @endif
        </div>

        {{-- Action Buttons --}}
        <div class="flex items-center justify-center gap-3">
            <a href="{{ route('sopir.dashboard') }}"
                class="px-6 py-2.5 rounded-full bg-slate-200 text-slate-700 text-sm font-medium hover:bg-slate-300 transition">
                Kembali ke Dashboard
            </a>
            <a href="{{ route('sopir.bantuan') }}"
                class="px-6 py-2.5 rounded-full bg-[#0c607f] text-white text-sm font-semibold shadow-pill hover:bg-[#0a526c] transition">
                Hubungi Admin
            </a>
        </div>

        {{-- Timeline Status --}}
        <div class="mt-10 pt-8 border-t border-slate-200">
            <div class="flex items-center justify-center gap-3 text-xs">
                <div class="flex flex-col items-center gap-2">
                    <div class="h-8 w-8 rounded-full bg-emerald-500 grid place-items-center">
                        <svg class="h-4 w-4 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5">
                            <path d="M20 6 9 17l-5-5"></path>
                        </svg>
                    </div>
                    <span class="text-slate-600 font-medium">Dikirim</span>
                </div>

                <div class="h-px w-16 bg-slate-300"></div>

                <div class="flex flex-col items-center gap-2">
                    <div class="h-8 w-8 rounded-full bg-yellow-500 grid place-items-center animate-pulse">
                        <svg class="h-4 w-4 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M12 6v6l4 2"></path>
                        </svg>
                    </div>
                    <span class="text-slate-600 font-medium">Ditinjau</span>
                </div>

                <div class="h-px w-16 bg-slate-300"></div>

                <div class="flex flex-col items-center gap-2">
                    <div class="h-8 w-8 rounded-full bg-slate-300 grid place-items-center">
                        <svg class="h-4 w-4 text-slate-500" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="M20 6 9 17l-5-5"></path>
                        </svg>
                    </div>
                    <span class="text-slate-400">Disetujui</span>
                </div>
            </div>
        </div>

    </div>
</div>

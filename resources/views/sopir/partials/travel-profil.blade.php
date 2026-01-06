{{-- resources/views/sopir/partials/travel-profil.blade.php --}}

<div class="space-y-6">

    {{-- Header Success --}}
    <div
        class="bg-gradient-to-r from-emerald-50 to-teal-50 border border-emerald-200 rounded-2xl p-4 flex items-center gap-3">
        <div class="h-10 w-10 rounded-full bg-emerald-500 grid place-items-center flex-shrink-0">
            <svg class="h-5 w-5 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <path d="M20 6 9 17l-5-5"></path>
            </svg>
        </div>
        <div class="flex-1">
            <h3 class="text-sm font-semibold text-emerald-900">Travel Disetujui!</h3>
            <p class="text-xs text-emerald-700 mt-0.5">
                Data travelmu telah disetujui dan sekarang dapat dilihat oleh pengguna.
            </p>
        </div>
        @if ($travel->reviewed_at)
            <div class="text-right text-xs text-emerald-600">
                {{ \Carbon\Carbon::parse($travel->reviewed_at)->diffForHumans() }}
            </div>
        @endif
    </div>

    {{-- Card Utama --}}
    <div class="bg-white rounded-[32px] shadow-soft overflow-hidden">

        {{-- Foto Armada --}}
        @if ($travel->foto_armada)
            <div class="w-full h-64 bg-slate-100 overflow-hidden">
                <img src="{{ asset('file/' . $travel->foto_armada) }}" alt="Foto Armada"
                    class="w-full h-full object-cover">
            </div>
        @endif

        {{-- Content --}}
        <div class="p-8">

            {{-- Kode Travel & Status --}}
            <div class="flex items-center justify-between mb-6">
                <div
                    class="inline-flex items-center gap-2 px-3 py-1.5 bg-[#e0f7ff] rounded-full text-xs font-semibold text-[#0c607f]">
                    <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M3 7h18l-1.5 9a2 2 0 0 1-2 1.7H6.5a2 2 0 0 1-2-1.7L3 7Z"></path>
                        <path d="M6 7V5a3 3 0 0 1 3-3h6a3 3 0 0 1 3 3v2"></path>
                    </svg>
                    {{ $travel->kode_travel }}
                </div>

                @if ($travel->status === 'aktif')
                    <span
                        class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-emerald-100 rounded-full text-xs font-semibold text-emerald-700">
                        <span class="inline-block h-2 w-2 rounded-full bg-emerald-500"></span>
                        Aktif
                    </span>
                @else
                    <span
                        class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-slate-100 rounded-full text-xs font-semibold text-slate-600">
                        <span class="inline-block h-2 w-2 rounded-full bg-slate-400"></span>
                        Nonaktif
                    </span>
                @endif
            </div>

            {{-- Info Armada --}}
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-[#0c607f] mb-2">{{ $travel->armada }}</h2>
                <div class="flex items-center gap-4 text-sm text-slate-600">
                    <span class="inline-flex items-center gap-1.5">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                        </svg>
                        {{ $travel->plat_nomor }}
                    </span>
                    <span class="inline-flex items-center gap-1.5">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <circle cx="12" cy="12" r="10"></circle>
                        </svg>
                        {{ $travel->warna }}
                    </span>
                    <span class="inline-flex items-center gap-1.5">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        {{ $travel->kapasitas_penumpang }} kursi
                    </span>
                </div>
            </div>

            {{-- Rute & Jadwal --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">

                {{-- Rute --}}
                <div class="bg-[#f5fafc] rounded-2xl p-5">
                    <h3 class="text-xs font-semibold text-slate-500 mb-3 uppercase tracking-wide">Rute Perjalanan</h3>
                    <div class="space-y-3">
                        <div class="flex items-center gap-3">
                            <div
                                class="h-8 w-8 rounded-full bg-[#0c607f] grid place-items-center text-white flex-shrink-0">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <circle cx="12" cy="12" r="10"></circle>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500">Keberangkatan</p>
                                <p class="font-semibold text-slate-800">{{ $travel->lokasi_asal }}</p>
                            </div>
                        </div>

                        <div class="pl-4 border-l-2 border-dashed border-slate-300 h-6"></div>

                        <div class="flex items-center gap-3">
                            <div
                                class="h-8 w-8 rounded-full bg-emerald-500 grid place-items-center text-white flex-shrink-0">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <path d="M12 21s-6-4.35-6-10a6 6 0 1 1 12 0c0 5.65-6 10-6 10Z"></path>
                                    <circle cx="12" cy="11" r="2.5"></circle>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500">Tujuan</p>
                                <p class="font-semibold text-slate-800">{{ $travel->lokasi_tujuan }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Jadwal --}}
                <div class="bg-[#f5fafc] rounded-2xl p-5">
                    <h3 class="text-xs font-semibold text-slate-500 mb-3 uppercase tracking-wide">Jadwal</h3>
                    <div class="space-y-3">
                        <div class="flex items-center gap-3">
                            <div class="h-8 w-8 rounded-full bg-blue-100 grid place-items-center flex-shrink-0">
                                <svg class="h-4 w-4 text-blue-600" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="4" width="18" height="18" rx="2"></rect>
                                    <path d="M16 2v4M8 2v4M3 10h18"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500">Tanggal</p>
                                <p class="font-semibold text-slate-800">
                                    {{ \Carbon\Carbon::parse($travel->tanggal_berangkat)->isoFormat('dddd, D MMMM Y') }}
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center gap-3">
                            <div class="h-8 w-8 rounded-full bg-amber-100 grid place-items-center flex-shrink-0">
                                <svg class="h-4 w-4 text-amber-600" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <path d="M12 6v6l4 2"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500">Jam Berangkat</p>
                                <p class="font-semibold text-slate-800">
                                    {{ \Carbon\Carbon::parse($travel->jam_berangkat)->format('H:i') }} WIB
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Info Lainnya --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <div class="bg-gradient-to-br from-[#e0f7ff] to-[#cceeff] rounded-xl p-4 text-center">
                    <p class="text-xs text-slate-600 mb-1">Jenis Layanan</p>
                    <p class="text-lg font-bold text-[#0c607f] capitalize">{{ $travel->jenis_layanan }}</p>
                </div>

                <div class="bg-gradient-to-br from-emerald-50 to-teal-50 rounded-xl p-4 text-center">
                    <p class="text-xs text-slate-600 mb-1">Harga per Orang</p>
                    <p class="text-lg font-bold text-emerald-700">Rp
                        {{ number_format($travel->harga_per_orang, 0, ',', '.') }}</p>
                </div>

                <div class="bg-gradient-to-br from-amber-50 to-yellow-50 rounded-xl p-4 text-center">
                    <p class="text-xs text-slate-600 mb-1">Kursi Tersedia</p>
                    <p class="text-lg font-bold text-amber-700">
                        {{ $travel->kapasitas_penumpang - ($travel->penumpang_terdaftar ?? 0) }} /
                        {{ $travel->kapasitas_penumpang }}
                    </p>
                </div>
            </div>

            {{-- Keterangan & Deskripsi --}}
            @if ($travel->keterangan || $travel->deskripsi)
                <div class="border-t border-slate-200 pt-6 space-y-4">
                    @if ($travel->keterangan)
                        <div>
                            <h3 class="text-xs font-semibold text-slate-500 mb-2 uppercase tracking-wide">Keterangan
                            </h3>
                            <p class="text-sm text-slate-700 leading-relaxed">{{ $travel->keterangan }}</p>
                        </div>
                    @endif

                    @if ($travel->deskripsi)
                        <div>
                            <h3 class="text-xs font-semibold text-slate-500 mb-2 uppercase tracking-wide">Deskripsi
                            </h3>
                            <p class="text-sm text-slate-700 leading-relaxed">{{ $travel->deskripsi }}</p>
                        </div>
                    @endif
                </div>
            @endif

            {{-- Kontak --}}
            <div class="border-t border-slate-200 pt-6 mt-6">
                <h3 class="text-xs font-semibold text-slate-500 mb-3 uppercase tracking-wide">Kontak</h3>
                <a href="https://wa.me/{{ $travel->whatsapp }}" target="_blank"
                    class="inline-flex items-center gap-2 px-4 py-2.5 bg-emerald-500 hover:bg-emerald-600 text-white rounded-xl text-sm font-semibold transition">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                    </svg>
                    Hubungi via WhatsApp
                </a>
            </div>

            {{-- Action Buttons --}}
            <div class="flex items-center gap-3 mt-8 pt-6 border-t border-slate-200">
                <a href="{{ route('sopir.jadwal') }}"
                    class="flex-1 px-6 py-3 rounded-xl bg-[#0c607f] text-white text-sm font-semibold text-center hover:bg-[#0a526c] transition shadow-pill">
                    Kelola Jadwal
                </a>
                <button type="button" onclick="window.print()"
                    class="px-6 py-3 rounded-xl bg-slate-200 text-slate-700 text-sm font-medium hover:bg-slate-300 transition">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M6 9V2h12v7M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2">
                        </path>
                        <rect x="6" y="14" width="12" height="8"></rect>
                    </svg>
                </button>
            </div>

        </div>
    </div>

</div>
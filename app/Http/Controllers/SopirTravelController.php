<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Travel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class SopirTravelController extends Controller
{
    // ===== HALAMAN TRAVEL =====
    public function index()
    {
        $travel = Travel::where('sopir_id', Auth::id())->first() ?? new Travel();
        return view('sopir.travel', compact('travel'));
    }

    // ====== WIZARD: SIMPAN SEMUA STEP SEKALIGUS ======
    public function simpan(Request $request)
    {
        $request->validate([
            // Step MOBIL
            'armada' => 'required|string|max:255',
            'kapasitas_penumpang' => 'required|integer|min:1',
            'warna' => 'nullable|string|max:100',
            'plat_nomor' => 'nullable|string|max:100',
            'jenis_layanan' => 'required|in:reguler,eksekutif,eksklusif',
            'foto_armada' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

            // Step RUTE
            'lokasi_asal' => 'required|string|max:255',
            'lokasi_tujuan' => 'required|string|max:255',
            'tanggal_berangkat' => 'required|date',
            'jam_berangkat' => 'required',

            // Step KONTAK
            'whatsapp' => 'nullable|string|max:20',
            'harga_per_orang' => 'required|integer|min:0',
            'keterangan' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        // cari / buat 1 data travel untuk sopir ini
        $travel = Travel::firstOrCreate(
            ['sopir_id' => Auth::id()],
            ['kode_travel' => strtoupper(Str::random(6))]
        );

        // ====== STEP MOBIL ======
        if ($request->hasFile('foto_armada')) {
            // hapus foto lama kalau ada
            if ($travel->foto_armada) {
                Storage::disk('public')->delete($travel->foto_armada);
            }

            $path = $request->file('foto_armada')->store('armada', 'public');
            $travel->foto_armada = $path;
        }

        $travel->armada = $request->armada;
        $travel->kapasitas_penumpang = $request->kapasitas_penumpang;
        $travel->warna = $request->warna;
        $travel->plat_nomor = $request->plat_nomor;
        $travel->jenis_layanan = $request->jenis_layanan;

        // ====== STEP RUTE ======
        $travel->lokasi_asal = $request->lokasi_asal;
        $travel->lokasi_tujuan = $request->lokasi_tujuan;
        $travel->tanggal_berangkat = $request->tanggal_berangkat;
        $travel->jam_berangkat = $request->jam_berangkat;
        $travel->rute = $request->lokasi_asal . ' - ' . $request->lokasi_tujuan;

        // ====== STEP KONTAK ======
        $travel->whatsapp = $request->whatsapp;
        $travel->harga_per_orang = $request->harga_per_orang;
        $travel->keterangan = $request->keterangan;
        $travel->deskripsi = $request->deskripsi;
        $travel->status = $request->status;

        $travel->save();

        return redirect()
            ->route('sopir.travel')
            ->with('success', 'Informasi travel berhasil disimpan.');
    }

    // ===== TAB 1: MOBIL (VERSI LAMA, BOLEH DIBIARKAN) =====
    public function saveMobil(Request $request)
    {
        $request->validate([
            'armada' => 'required|string|max:255',
            'kapasitas_penumpang' => 'required|integer|min:1',
            'warna' => 'nullable|string|max:100',
            'plat_nomor' => 'nullable|string|max:100',
            'jenis_layanan' => 'required|in:reguler,eksekutif,eksklusif',
            'foto_armada' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $travel = Travel::firstOrCreate(
            ['sopir_id' => Auth::id()],
            ['kode_travel' => strtoupper(Str::random(6))]
        );

        if ($request->hasFile('foto_armada')) {
            $path = $request->file('foto_armada')->store('armada', 'public');
            $travel->foto_armada = $path;
        }

        $travel->armada = $request->armada;
        $travel->kapasitas_penumpang = $request->kapasitas_penumpang;
        $travel->warna = $request->warna;
        $travel->plat_nomor = $request->plat_nomor;
        $travel->jenis_layanan = $request->jenis_layanan;

        $travel->save();

        return back()->with('success', 'Informasi mobil berhasil disimpan.');
    }

    // ===== TAB 2: RUTE (VERSI LAMA) =====
    public function saveRute(Request $request)
    {
        $request->validate([
            'lokasi_asal' => 'required|string|max:255',
            'lokasi_tujuan' => 'required|string|max:255',
            'tanggal_berangkat' => 'required|date',
            'jam_berangkat' => 'required',
        ]);

        $travel = Travel::firstOrCreate(
            ['sopir_id' => Auth::id()],
            ['kode_travel' => strtoupper(Str::random(6))]
        );

        $travel->lokasi_asal = $request->lokasi_asal;
        $travel->lokasi_tujuan = $request->lokasi_tujuan;
        $travel->tanggal_berangkat = $request->tanggal_berangkat;
        $travel->jam_berangkat = $request->jam_berangkat;
        $travel->rute = $request->lokasi_asal . ' - ' . $request->lokasi_tujuan;

        $travel->save();

        return back()->with('success', 'Informasi rute berhasil disimpan.');
    }

    // ===== TAB 3: KONTAK (VERSI LAMA) =====
    public function saveKontak(Request $request)
    {
        $request->validate([
            'whatsapp' => 'nullable|string|max:20',
            'harga_per_orang' => 'required|integer|min:0',
            'kapasitas_penumpang' => 'required|integer|min:1',
            'keterangan' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $travel = Travel::firstOrCreate(
            ['sopir_id' => Auth::id()],
            ['kode_travel' => strtoupper(Str::random(6))]
        );

        $travel->whatsapp = $request->whatsapp;
        $travel->harga_per_orang = $request->harga_per_orang;
        $travel->kapasitas_penumpang = $request->kapasitas_penumpang;
        $travel->keterangan = $request->keterangan;
        $travel->deskripsi = $request->deskripsi;
        $travel->status = $request->status;

        $travel->save();

        return back()->with('success', 'Informasi kontak berhasil disimpan.');
    }

    /**
     * Halaman Jadwal untuk sopir.
     */
    public function jadwal()
    {
        $userId = Auth::id();

        $jadwals = Travel::where('sopir_id', $userId)
            ->orderBy('tanggal_berangkat', 'asc')
            ->orderBy('jam_berangkat', 'asc')
            ->get();

        return view('sopir.jadwal', compact('jadwals'));
    }
    public function createJadwal()
    {
        return view('sopir.jadwal-create');
    }
    public function storeJadwal(Request $request)
    {
        $request->validate([
            'lokasi_asal' => 'required|string|max:255',
            'lokasi_tujuan' => 'required|string|max:255',
            'tanggal_berangkat' => 'required|date',
            'jam_berangkat' => 'required',
            'harga_per_orang' => 'required|integer|min:0',
        ]);

        Travel::create([
            'sopir_id' => Auth::id(),
            'kode_travel' => strtoupper(Str::random(6)),

            'lokasi_asal' => $request->lokasi_asal,
            'lokasi_tujuan' => $request->lokasi_tujuan,
            'tanggal_berangkat' => $request->tanggal_berangkat,
            'jam_berangkat' => $request->jam_berangkat,
            'rute' => $request->lokasi_asal . ' - ' . $request->lokasi_tujuan,

            'harga_per_orang' => $request->harga_per_orang,

            // default kosong dulu
            'kapasitas_penumpang' => 0,
            'penumpang_terdaftar' => 0,
            'status' => 'aktif',
        ]);

        return redirect()->route('sopir.jadwal')
            ->with('success', 'Jadwal berhasil ditambahkan.');
    }

}

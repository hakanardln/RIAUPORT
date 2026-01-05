<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Travel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class SopirTravelController extends Controller
{
    // ===== HALAMAN TRAVEL (UPDATE: 3 STATES) =====
    public function index()
    {
        $userId = Auth::id();

        // Ambil travel terbaru milik sopir ini
        $travel = Travel::where('sopir_id', $userId)
            ->orderByDesc('created_at')
            ->first();

        // Jika tidak ada travel, buat instance kosong
        if (!$travel) {
            $travel = new Travel();
        }

        // Tentukan state berdasarkan status_approval
        $pageState = 'form'; // default: tampilkan form

        if ($travel->exists) {
            if ($travel->status_approval === 'pending') {
                $pageState = 'pending'; // Sedang ditinjau
            } elseif ($travel->status_approval === 'approved') {
                $pageState = 'approved'; // Disetujui - tampilkan profil
            } elseif ($travel->status_approval === 'rejected') {
                $pageState = 'form'; // Ditolak - bisa input ulang
            }
        }

        return view('sopir.travel', compact('travel', 'pageState'));
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

        $userId = Auth::id();

        // Cek apakah sudah ada travel sebelumnya
        $travel = Travel::where('sopir_id', $userId)->first();

        // Generate kode travel jika belum ada
        if (!$travel) {
            $travel = new Travel();
            $travel->sopir_id = $userId;
            $travel->kode_travel = 'TRV-' . strtoupper(Str::random(8));
        }

        // ====== STEP MOBIL ======
        if ($request->hasFile('foto_armada')) {
            $file = $request->file('foto_armada');
            $filename = time() . '_' . $file->getClientOriginalName();

            // Simpan ke folder public/file (sesuai dengan yang digunakan di blade)
            $file->move(public_path('file'), $filename);

            // Hapus foto lama jika ada
            if ($travel->foto_armada && file_exists(public_path('file/' . $travel->foto_armada))) {
                unlink(public_path('file/' . $travel->foto_armada));
            }

            $travel->foto_armada = $filename;
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

        // ====== APPROVAL SYSTEM ======
        // Set status ke pending (menunggu review admin)
        $travel->status_approval = 'pending';
        $travel->submitted_at = now();
        $travel->reviewed_at = null;
        $travel->reviewed_by = null;
        $travel->rejection_reason = null;

        $travel->save();

        return redirect()
            ->route('sopir.travel')
            ->with('success', 'Data travel berhasil disimpan dan akan segera ditinjau oleh admin.');
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

        $travel = Travel::firstOrNew(['sopir_id' => Auth::id()]);

        if (!$travel->exists) {
            $travel->kode_travel = strtoupper(Str::random(6));
        }

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

        $travel = Travel::firstOrNew(['sopir_id' => Auth::id()]);

        if (!$travel->exists) {
            $travel->kode_travel = strtoupper(Str::random(6));
        }

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

        // Ambil semua jadwal (travel) milik sopir, hanya yang approved
        $jadwals = Travel::where('sopir_id', $userId)
            ->where('status_approval', 'approved')
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

        $userId = Auth::id();

        // Ambil data armada dari travel yang sudah approved
        $existingTravel = Travel::where('sopir_id', $userId)
            ->where('status_approval', 'approved')
            ->first();

        // Buat jadwal baru dengan data armada dari travel yang sudah ada
        Travel::create([
            'sopir_id' => $userId,
            'kode_travel' => 'TRV-' . strtoupper(Str::random(8)),

            // Copy data armada dari travel sebelumnya (jika ada)
            'armada' => $existingTravel->armada ?? null,
            'kapasitas_penumpang' => $existingTravel->kapasitas_penumpang ?? 0,
            'warna' => $existingTravel->warna ?? null,
            'plat_nomor' => $existingTravel->plat_nomor ?? null,
            'foto_armada' => $existingTravel->foto_armada ?? null,
            'jenis_layanan' => $existingTravel->jenis_layanan ?? 'reguler',
            'whatsapp' => $existingTravel->whatsapp ?? null,
            'keterangan' => $existingTravel->keterangan ?? null,
            'deskripsi' => $existingTravel->deskripsi ?? null,

            // Data jadwal baru
            'lokasi_asal' => $request->lokasi_asal,
            'lokasi_tujuan' => $request->lokasi_tujuan,
            'tanggal_berangkat' => $request->tanggal_berangkat,
            'jam_berangkat' => $request->jam_berangkat,
            'rute' => $request->lokasi_asal . ' - ' . $request->lokasi_tujuan,
            'harga_per_orang' => $request->harga_per_orang,

            'penumpang_terdaftar' => 0,
            'status' => 'aktif',
            'status_approval' => 'approved', // Langsung approved karena data armada sudah verified
        ]);

        return redirect()->route('sopir.jadwal')
            ->with('success', 'Jadwal berhasil ditambahkan.');
    }

    // FORM EDIT JADWAL
    public function editJadwal($id)
    {
        $travel = Travel::findOrFail($id);

        if ($travel->sopir_id != Auth::id()) {
            abort(403, 'Anda tidak memiliki akses untuk mengedit jadwal ini.');
        }

        return view('sopir.jadwal-edit', compact('travel'));
    }

    // UPDATE JADWAL
    public function updateJadwal(Request $request, $id)
    {
        $travel = Travel::findOrFail($id);

        if ($travel->sopir_id != Auth::id()) {
            abort(403, 'Anda tidak memiliki akses untuk mengupdate jadwal ini.');
        }

        $request->validate([
            'lokasi_asal' => 'required|string|max:255',
            'lokasi_tujuan' => 'required|string|max:255',
            'tanggal_berangkat' => 'required|date',
            'jam_berangkat' => 'required',
            'harga_per_orang' => 'required|integer|min:0',
            'status' => 'required|in:aktif,nonaktif',
            'keterangan' => 'nullable|string',
        ]);

        $travel->update([
            'lokasi_asal' => $request->lokasi_asal,
            'lokasi_tujuan' => $request->lokasi_tujuan,
            'tanggal_berangkat' => $request->tanggal_berangkat,
            'jam_berangkat' => $request->jam_berangkat,
            'rute' => $request->lokasi_asal . ' - ' . $request->lokasi_tujuan,
            'harga_per_orang' => $request->harga_per_orang,
            'status' => $request->status,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('sopir.jadwal')->with('success', 'Jadwal berhasil diperbarui.');
    }

    // HAPUS JADWAL
    public function destroyJadwal($id)
    {
        $travel = Travel::findOrFail($id);

        if ($travel->sopir_id != Auth::id()) {
            abort(403, 'Anda tidak memiliki akses untuk menghapus jadwal ini.');
        }

        $travel->delete();

        return redirect()->route('sopir.jadwal')->with('success', 'Jadwal berhasil dihapus.');
    }
}
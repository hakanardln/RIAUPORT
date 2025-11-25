<?php

namespace App\Http\Controllers;

use App\Models\Travel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SopirTravelController extends Controller
{
    /**
     * Ambil 1 data travel milik sopir yang login.
     * Kalau belum ada di DB -> object baru (belum tersimpan).
     */
    protected function getTravelForCurrentDriver(): Travel
    {
        $travel = Travel::where('sopir_id', Auth::id())->first();

        if (!$travel) {
            $travel = new Travel(['sopir_id' => Auth::id()]);
        }

        return $travel;

    }

    public function index()
    {
        $travel = $this->getTravelForCurrentDriver();

        return view('sopir.travel', compact('travel'));
    }

    /** Simpan tab MOBIL */
    public function saveMobil(Request $request)
    {
        $travel = $this->getTravelForCurrentDriver();

        $validated = $request->validate([
            'armada' => 'required|string|max:255',
            'kursi_tersedia' => 'required|integer|min:1',
            'warna' => 'nullable|string|max:100',
            'plat_nomor' => 'required|string|max:50',
            'jenis_layanan' => 'required|in:reguler,eksekutif,eksklusif',
            'foto_armada' => 'nullable|image|max:2048',
        ]);

        // kalau belum punya kode_travel -> generate otomatis
        if (!$travel->kode_travel) {
            $travel->kode_travel = 'TRV-' . strtoupper(Str::random(6));
        }

        // kalau belum punya rute bawaan, isi minimal dari field yg ada (opsional)
        if (!$travel->rute && $travel->lokasi_asal && $travel->lokasi_tujuan) {
            $travel->rute = $travel->lokasi_asal . ' - ' . $travel->lokasi_tujuan;
        }

        // handle upload foto
        if ($request->hasFile('foto_armada')) {
            if ($travel->foto_armada && Storage::disk('public')->exists($travel->foto_armada)) {
                Storage::disk('public')->delete($travel->foto_armada);
            }

            $validated['foto_armada'] = $request->file('foto_armada')
                ->store('armada', 'public');
        }

        $validated['sopir_id'] = Auth::id();

        $travel->fill($validated);
        $travel->save();

        return redirect()->route('sopir.travel')
            ->with('success', 'Data mobil berhasil disimpan.');
    }

    /** Simpan tab RUTE */
    public function saveRute(Request $request)
    {
        $travel = $this->getTravelForCurrentDriver();

        $validated = $request->validate([
            'lokasi_asal' => 'required|string|max:255',
            'lokasi_tujuan' => 'required|string|max:255',
            'tanggal_berangkat' => 'required|date',
            'jam_berangkat' => 'required',
            'titik_jemput' => 'nullable|string|max:255',
            'titik_turun' => 'nullable|string|max:255',
            'estimasi_waktu' => 'nullable|string|max:100',
        ]);

        $travel->fill($validated + ['sopir_id' => Auth::id()]);

        // update field rute ringkas
        $travel->rute = $validated['lokasi_asal'] . ' - ' . $validated['lokasi_tujuan'];

        $travel->save();

        return redirect()->route('sopir.travel')
            ->with('success', 'Data rute berhasil disimpan.');
    }

    /** Simpan tab KONTAK */
    public function saveKontak(Request $request)
    {
        $travel = $this->getTravelForCurrentDriver();

        $validated = $request->validate([
            'whatsapp' => 'required|string|max:30',
            'harga_per_orang' => 'required|numeric|min:0',
            'kapasitas_penumpang' => 'nullable|integer|min:0',
            'keterangan' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $travel->sopir_id = Auth::id();
        $travel->whatsapp = $validated['whatsapp'];
        $travel->harga_per_orang = $validated['harga_per_orang'];
        $travel->kapasitas_penumpang = $validated['kapasitas_penumpang'] ?? $travel->kapasitas_penumpang;
        $travel->keterangan = $validated['keterangan'] ?? $travel->keterangan;
        $travel->deskripsi = $validated['deskripsi'] ?? $travel->deskripsi;
        $travel->status = $validated['status'];

        // pastikan tetap punya kode_travel
        if (!$travel->kode_travel) {
            $travel->kode_travel = 'TRV-' . strtoupper(Str::random(6));
        }

        $travel->save();

        return redirect()->route('sopir.travel')
            ->with('success', 'Data kontak dan status berhasil disimpan.');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Travel;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SopirDashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $dbError = null;

        try {
            // === 1. Data armada terbaru milik sopir ini ===
            $travel = Travel::where('sopir_id', $userId)
                ->orderByDesc('created_at')
                ->first();

            $namaArmada = optional($travel)->armada;
            $platNomor = optional($travel)->plat_nomor;
            $warnaArmada = optional($travel)->warna;
            $fotoArmada = optional($travel)->foto_armada;

            // === 2. Trip hari ini ===
            $tripHariIni = Travel::where('sopir_id', $userId)
                ->whereDate('tanggal_berangkat', today())
                ->count();

            // === 3. Penumpang bulan ini ===
            $penumpangBulanIni = Travel::where('sopir_id', $userId)
                ->whereBetween('tanggal_berangkat', [now()->startOfMonth(), now()->endOfMonth()])
                ->sum('penumpang_terdaftar');

            // === 4. Rating rata-rata dari reviews ===
            $ratingRata = Review::whereHas('travel', function ($query) use ($userId) {
                $query->where('sopir_id', $userId);
            })->avg('rating') ?? 0;

            // === 5. Total ulasan masuk (dari tabel reviews) ===
            $totalUlasan = Review::whereHas('travel', function ($query) use ($userId) {
                $query->where('sopir_id', $userId);
            })->count();

            // === 6. Rute hari ini (diurutkan berdasarkan jam berangkat) ===
            $ruteHariIni = Travel::where('sopir_id', $userId)
                ->whereDate('tanggal_berangkat', today())
                ->orderBy('jam_berangkat')
                ->get();

            // Rute Utama (jadwal pertama hari ini)
            $ruteUtama = $ruteHariIni->first();

            $jamBerangkat = optional($ruteUtama)->jam_berangkat;
            $kotaAsal = optional($ruteUtama)->lokasi_asal;
            $kotaTujuan = optional($ruteUtama)->lokasi_tujuan;
            $estimasiWaktu = $this->hitungEstimasiWaktu($ruteUtama);

            // Rute Tambahan (jadwal kedua dan seterusnya)
            $rutesTambahan = $ruteHariIni->slice(1); // Ambil dari index 1 sampai akhir

            // Data untuk rute tambahan pertama (untuk ditampilkan di card)
            $ruteTambahan = $rutesTambahan->first();
            $jamBerangkat2 = optional($ruteTambahan)->jam_berangkat;
            $kotaAsal2 = optional($ruteTambahan)->lokasi_asal;
            $kotaTujuan2 = optional($ruteTambahan)->lokasi_tujuan;

            // Status rute tambahan (berapa banyak jadwal tambahan)
            $statusRuteTambahan = $rutesTambahan->count() > 0
                ? $rutesTambahan->count() . ' jadwal tambahan'
                : 'Belum ada jadwal';

        } catch (\Throwable $e) {
            $dbError = $e->getMessage();

            $travel = null;
            $namaArmada = $platNomor = $warnaArmada = $fotoArmada = null;
            $tripHariIni = $penumpangBulanIni = $totalUlasan = 0;
            $ratingRata = 0;
            $jamBerangkat = $estimasiWaktu = $kotaAsal = $kotaTujuan = null;
            $jamBerangkat2 = $kotaAsal2 = $kotaTujuan2 = null;
            $statusRuteTambahan = 'Belum ada jadwal';
            $rutesTambahan = collect();
        }

        return view('sopir.dashboard', compact(
            'travel',
            'fotoArmada',
            'namaArmada',
            'platNomor',
            'warnaArmada',
            'tripHariIni',
            'penumpangBulanIni',
            'ratingRata',
            'jamBerangkat',
            'estimasiWaktu',
            'kotaAsal',
            'kotaTujuan',
            'jamBerangkat2',
            'kotaAsal2',
            'kotaTujuan2',
            'statusRuteTambahan',
            'rutesTambahan',
            'totalUlasan',
            'dbError'
        ));
    }

    /**
     * Hitung estimasi waktu perjalanan
     * Bisa disesuaikan dengan logika distance/speed atau data dari database
     */
    private function hitungEstimasiWaktu($travel)
    {
        if (!$travel)
            return null;

        // Jika ada kolom estimasi_waktu di database
        if (isset($travel->estimasi_waktu) && !empty($travel->estimasi_waktu)) {
            return $travel->estimasi_waktu;
        }

        // Atau bisa hitung berdasarkan jarak (contoh sederhana)
        // Nanti bisa disesuaikan dengan logika real distance API
        $kotaAsal = strtolower($travel->lokasi_asal ?? '');
        $kotaTujuan = strtolower($travel->lokasi_tujuan ?? '');

        // Contoh estimasi berdasarkan rute umum di Riau
        $estimasiRute = [
            'pekanbaru-dumai' => '2-3 jam',
            'dumai-pekanbaru' => '2-3 jam',
            'pekanbaru-bengkalis' => '2-3 jam',
            'bengkalis-pekanbaru' => '2-3 jam',
            'pekanbaru-duri' => '3-4 jam',
            'duri-pekanbaru' => '3-4 jam',
        ];

        $kunci = $kotaAsal . '-' . $kotaTujuan;

        return $estimasiRute[$kunci] ?? '2-4 jam';
    }
}
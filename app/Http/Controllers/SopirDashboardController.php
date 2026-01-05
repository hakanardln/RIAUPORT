<?php

namespace App\Http\Controllers;

use App\Models\Travel;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SopirDashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $dbError = null;

        try {
            // ========== 1. DATA ARMADA ==========
            // Ambil dari travel yang aktif dan approved (bukan yang terbaru)
            // Prioritas: travel hari ini > travel terdekat > travel approved terakhir
            $travel = Travel::where('sopir_id', $userId)
                ->where('status_approval', 'approved')
                ->where(function ($query) {
                    $query->where('status', 'aktif')
                        ->orWhereNull('status');
                })
                ->where('tanggal_berangkat', '>=', today())
                ->orderBy('tanggal_berangkat')
                ->orderBy('jam_berangkat')
                ->first();

            // Jika tidak ada jadwal ke depan, ambil travel approved terakhir untuk data armada
            if (!$travel) {
                $travel = Travel::where('sopir_id', $userId)
                    ->where('status_approval', 'approved')
                    ->orderByDesc('created_at')
                    ->first();
            }

            $namaArmada = optional($travel)->armada;
            $platNomor = optional($travel)->plat_nomor;
            $warnaArmada = optional($travel)->warna;
            $fotoArmada = optional($travel)->foto_armada;

            // ========== 2. STATISTIK ==========

            // Trip hari ini (yang sudah berangkat atau akan berangkat hari ini)
            $tripHariIni = Travel::where('sopir_id', $userId)
                ->where('status_approval', 'approved')
                ->whereDate('tanggal_berangkat', today())
                ->count();

            // Penumpang bulan ini (sum dari semua travel bulan ini)
            $penumpangBulanIni = Travel::where('sopir_id', $userId)
                ->where('status_approval', 'approved')
                ->whereYear('tanggal_berangkat', now()->year)
                ->whereMonth('tanggal_berangkat', now()->month)
                ->sum('penumpang_terdaftar') ?? 0;

            // Rating rata-rata dari semua reviews
            $ratingRata = Review::whereHas('travel', function ($query) use ($userId) {
                $query->where('sopir_id', $userId);
            })->avg('rating') ?? 0;

            // Total ulasan masuk (jumlah review yang masuk)
            $totalUlasan = Review::whereHas('travel', function ($query) use ($userId) {
                $query->where('sopir_id', $userId);
            })->count();

            // ========== 3. JADWAL MENDATANG ==========
            // Ambil semua jadwal yang akan datang (mulai dari hari ini)
            $jadwalMendatang = Travel::where('sopir_id', $userId)
                ->where('status_approval', 'approved')
                ->where(function ($query) {
                    $query->where('status', 'aktif')
                        ->orWhereNull('status');
                })
                ->where(function ($query) {
                    // Jadwal hari ini yang belum lewat atau jadwal hari depan
                    $query->where('tanggal_berangkat', '>', today())
                        ->orWhere(function ($q) {
                        $q->whereDate('tanggal_berangkat', today())
                            ->where('jam_berangkat', '>=', now()->format('H:i:s'));
                    });
                })
                ->orderBy('tanggal_berangkat')
                ->orderBy('jam_berangkat')
                ->take(5) // Ambil maksimal 5 jadwal terdekat
                ->get();

            // ========== 4. RUTE UTAMA (Jadwal pertama yang akan datang) ==========
            $ruteUtama = $jadwalMendatang->first();

            $jamBerangkat = optional($ruteUtama)->jam_berangkat
                ? Carbon::parse(optional($ruteUtama)->jam_berangkat)->format('H:i')
                : null;
            $kotaAsal = optional($ruteUtama)->lokasi_asal;
            $kotaTujuan = optional($ruteUtama)->lokasi_tujuan;
            $estimasiWaktu = $this->hitungEstimasiWaktu($ruteUtama);

            // ========== 5. RUTE TAMBAHAN (Jadwal kedua dst) ==========
            $rutesTambahan = $jadwalMendatang->slice(1); // Ambil dari index 1 ke atas

            // Data untuk card rute tambahan (jadwal kedua)
            $ruteTambahan = $rutesTambahan->first();
            $jamBerangkat2 = optional($ruteTambahan)->jam_berangkat
                ? Carbon::parse(optional($ruteTambahan)->jam_berangkat)->format('H:i')
                : null;
            $kotaAsal2 = optional($ruteTambahan)->lokasi_asal;
            $kotaTujuan2 = optional($ruteTambahan)->lokasi_tujuan;

            // Status rute tambahan
            $jumlahRuteTambahan = $rutesTambahan->count();
            if ($jumlahRuteTambahan > 0) {
                $statusRuteTambahan = $jumlahRuteTambahan . ' jadwal lagi';
            } else {
                $statusRuteTambahan = 'Belum ada';
            }

        } catch (\Throwable $e) {
            // Error handling
            $dbError = $e->getMessage();

            // Set default values
            $travel = null;
            $namaArmada = $platNomor = $warnaArmada = $fotoArmada = null;
            $tripHariIni = $penumpangBulanIni = $totalUlasan = 0;
            $ratingRata = 0;
            $jamBerangkat = $estimasiWaktu = $kotaAsal = $kotaTujuan = null;
            $jamBerangkat2 = $kotaAsal2 = $kotaTujuan2 = null;
            $statusRuteTambahan = 'Belum ada';
            $rutesTambahan = collect();
            $jadwalMendatang = collect();
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
            'jadwalMendatang',
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
        if (!$travel) {
            return null;
        }

        // Jika ada kolom estimasi_waktu di database, gunakan itu
        if (isset($travel->estimasi_waktu) && !empty($travel->estimasi_waktu)) {
            return $travel->estimasi_waktu;
        }

        // Estimasi berdasarkan rute umum di Riau
        $kotaAsal = strtolower(trim($travel->lokasi_asal ?? ''));
        $kotaTujuan = strtolower(trim($travel->lokasi_tujuan ?? ''));

        // Mapping estimasi waktu berdasarkan rute
        $estimasiRute = [
            'pekanbaru-dumai' => '2-3 jam',
            'dumai-pekanbaru' => '2-3 jam',
            'pekanbaru-bengkalis' => '2-3 jam',
            'bengkalis-pekanbaru' => '2-3 jam',
            'pekanbaru-duri' => '3-4 jam',
            'duri-pekanbaru' => '3-4 jam',
            'pekanbaru-rengat' => '3-4 jam',
            'rengat-pekanbaru' => '3-4 jam',
            'pekanbaru-tembilahan' => '4-5 jam',
            'tembilahan-pekanbaru' => '4-5 jam',
            'dumai-bengkalis' => '1-2 jam',
            'bengkalis-dumai' => '1-2 jam',
        ];

        $kunci = $kotaAsal . '-' . $kotaTujuan;

        return $estimasiRute[$kunci] ?? '2-4 jam';
    }
}
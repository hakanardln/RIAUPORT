<?php

namespace App\Http\Controllers;

use App\Models\Travel;
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
            $travelTerbaru = Travel::where('sopir_id', $userId)
                ->orderByDesc('tanggal_berangkat')
                ->orderByDesc('jam_berangkat')
                ->first();

            $namaArmada = optional($travelTerbaru)->armada;
            $platNomor = optional($travelTerbaru)->plat_nomor;
            $warnaArmada = optional($travelTerbaru)->warna;
            $fotoArmada = optional($travelTerbaru)->foto_armada;

            // === 2. Trip hari ini ===
            $tripHariIni = Travel::where('sopir_id', $userId)
                ->whereDate('tanggal_berangkat', today())
                ->count();

            // === 3. Penumpang bulan ini ===
            $penumpangBulanIni = Travel::where('sopir_id', $userId)
                ->whereBetween('tanggal_berangkat', [now()->startOfMonth(), now()->endOfMonth()])
                ->sum('penumpang_terdaftar');

            // === 4. Total pelanggan ===
            $totalPelanggan = Travel::where('sopir_id', $userId)
                ->sum('penumpang_terdaftar');

            // === 5. Rating dan ulasan (dummy untuk sekarang) ===
            $ratingRata = 0;
            $totalUlasan = 0;

            // === 6. Rute hari ini ===
            $ruteHariIni = Travel::where('sopir_id', $userId)
                ->whereDate('tanggal_berangkat', today())
                ->orderBy('jam_berangkat')
                ->get();

            $ruteUtama = $ruteHariIni->get(0);
            $ruteTambahan = $ruteHariIni->get(1);

            $jamBerangkat = optional($ruteUtama)->jam_berangkat;
            $kotaAsal = optional($ruteUtama)->lokasi_asal;
            $kotaTujuan = optional($ruteUtama)->lokasi_tujuan;
            $estimasiWaktu = null; // belum ada kolom

            $jamBerangkat2 = optional($ruteTambahan)->jam_berangkat;
            $kotaAsal2 = optional($ruteTambahan)->lokasi_asal;
            $kotaTujuan2 = optional($ruteTambahan)->lokasi_tujuan;

            $statusRuteTambahan = $ruteTambahan
                ? 'Ada jadwal tambahan'
                : 'Belum ada jadwal';
        } catch (\Throwable $e) {
            $dbError = $e->getMessage();

            $namaArmada = $platNomor = $warnaArmada = $fotoArmada = null;
            $tripHariIni = $penumpangBulanIni = $totalPelanggan = $totalUlasan = 0;
            $ratingRata = 0;
            $jamBerangkat = $estimasiWaktu = $kotaAsal = $kotaTujuan = null;
            $jamBerangkat2 = $kotaAsal2 = $kotaTujuan2 = null;
            $statusRuteTambahan = 'Belum ada jadwal';
        }

        return view('sopir.dashboard', compact(
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
            'totalPelanggan',
            'totalUlasan',
            'dbError'
        ));
    }
}

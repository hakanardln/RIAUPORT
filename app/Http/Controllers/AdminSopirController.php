<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Travel;
use Illuminate\Http\Request;

class AdminSopirController extends Controller
{
    public function index(Request $request)
    {
        // Ambil filter dari query string (default: 'semua')
        $filter = $request->get('status', 'semua');

        // Ambil semua sopir beserta data travel mereka
        $sopirs = User::where('role', 'sopir')
            ->with([
                'travels' => function ($query) {
                    $query->latest();
                }
            ])
            ->get();

        // Ambil semua travels untuk list (TAMBAHKAN INI)
        $travels = Travel::with('sopir')
            ->latest()
            ->get();

        // Format data untuk JavaScript
        $drivers = $sopirs->map(function ($sopir) {
            // Ambil travel pertama (yang terbaru)
            $travel = $sopir->travels->first();

            return [
                'id' => $sopir->id,
                'nama' => $sopir->name,
                'email' => $sopir->email,
                'telp' => $sopir->no_wa ?? '-',
                'foto' => $sopir->avatar_path ? asset('storage/' . $sopir->avatar_path) : 'https://ui-avatars.com/api/?name=' . urlencode($sopir->name),

                // Data travel (jika ada)
                'travelName' => optional($travel)->armada ?? '-',
                'jenisKendaraan' => optional($travel)->armada ?? '-',
                'platNomor' => optional($travel)->plat_nomor ?? '-',
                'tahunKendaraan' => optional($travel)->tahun_kendaraan ?? '-',
                'rute' => $travel ? ($travel->lokasi_asal . ' - ' . $travel->lokasi_tujuan) : '-',
                'whatsapp' => optional($travel)->whatsapp ?? '-',
                'tglDaftar' => $travel ? $travel->created_at->format('d M Y') : '-',

                // Status approval
                'status' => optional($travel)->status_approval ?? 'pending',
                'travelId' => optional($travel)->id ?? null,
                'fotoArmada' => $travel && $travel->foto_armada ? asset('storage/' . $travel->foto_armada) : null,
                'kapasitas' => optional($travel)->kapasitas_penumpang ?? '-',
                'harga' => optional($travel)->harga_per_orang ?? 0,
                'keterangan' => optional($travel)->keterangan ?? '-',
                'rejection_reason' => optional($travel)->rejection_reason ?? null,
            ];
        });

        // Hitung statistik
        $stats = [
            'total' => $sopirs->count(),
            'pending' => Travel::pending()->count(),
            'approved' => Travel::approved()->count(),
            'rejected' => Travel::rejected()->count(),
        ];

        return view('admin.sopir', [
            'drivers' => $drivers,
            'stats' => $stats,
            'filter' => $filter,
            'travels' => $travels  // ← TAMBAHKAN INI
        ]);
    }
}
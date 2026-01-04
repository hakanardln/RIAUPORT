<?php

namespace App\Http\Controllers;

use App\Models\Travel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // HALAMAN HOME (form pencarian)
    public function index()
    {
        // dropdown ambil dari DB
        $origins = Travel::select('lokasi_asal')
            ->distinct()
            ->orderBy('lokasi_asal')
            ->pluck('lokasi_asal');

        $destinations = Travel::select('lokasi_tujuan')
            ->distinct()
            ->orderBy('lokasi_tujuan')
            ->pluck('lokasi_tujuan');

        return view('home', [
            'origins' => $origins,
            'destinations' => $destinations,
            'selectedOrigin' => null,
            'selectedDestination' => null,
        ]);
    }

    // PROSES PENCARIAN → HALAMAN BARU
    public function search(Request $request)
    {
        $request->validate([
            'asal' => 'required',
            'tujuan' => 'required',
        ]);

        // TAMBAHKAN FILTER: hanya tampilkan travel yang sudah approved
        $travels = Travel::where('lokasi_asal', $request->asal)
            ->where('lokasi_tujuan', $request->tujuan)
            ->where('status', 'aktif')
            ->where('status_approval', 'approved') // ← BARU: Filter approved
            ->with(['sopir', 'reviews.user']) // Eager load sopir dan reviews beserta user
            ->orderBy('tanggal_berangkat', 'asc')
            ->orderBy('jam_berangkat', 'asc')
            ->get();

        return view('travel.hasil', [
            'travels' => $travels,
            'selectedOrigin' => $request->asal,
            'selectedDestination' => $request->tujuan,
        ]);
    }
}

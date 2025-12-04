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

        $travels = Travel::where('lokasi_asal', $request->asal)
            ->where('lokasi_tujuan', $request->tujuan)
            ->where('status', 'aktif')   // kalau pakai kolom status
            ->get();

        return view('travel.hasil', [
            'travels' => $travels,
            'selectedOrigin' => $request->asal,
            'selectedDestination' => $request->tujuan,
        ]);
    }
}

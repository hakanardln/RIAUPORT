<?php

namespace App\Http\Controllers;

use App\Models\Travel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SopirProfilController extends Controller
{
    /**
     * Tampilkan halaman profil sopir.
     */
    public function index()
    {
        // user yang sedang login
        $user = Auth::user();

        // statistik sederhana dari tabel travels (boleh kamu sesuaikan)
        $totalTravel = Travel::where('sopir_id', $user->id)->count();
        $totalTrip = Travel::where('sopir_id', $user->id)->sum('penumpang_terdaftar');

        // kalau nanti punya tabel rating, isi dari sana
        $ratingRata = null;

        return view('sopir.profil', compact(
            'user',
            'totalTravel',
            'totalTrip',
            'ratingRata'
        ));
    }
}

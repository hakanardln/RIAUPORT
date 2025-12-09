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
    public function edit()
    {
        $user = Auth::user();

        return view('sopir.profil-edit', compact('user'));
    }
    public function update(Request $request)
    {
        $user = Auth::user();

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'no_wa' => 'nullable|string|max:30',
        ]);

        $user->update($data);

        return redirect()
            ->route('sopir.profil')
            ->with('success', 'Profil berhasil diperbarui.');
    }
}
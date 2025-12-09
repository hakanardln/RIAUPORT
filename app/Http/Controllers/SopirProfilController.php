<?php

namespace App\Http\Controllers;

use App\Models\Travel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SopirProfilController extends Controller
{
    /**
     * Tampilkan halaman profil sopir.
     */
    public function index()
    {
        $user = Auth::user();

        $totalTravel = Travel::where('sopir_id', $user->id)->count();
        $totalTrip = Travel::where('sopir_id', $user->id)->sum('penumpang_terdaftar');

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

        // validasi input
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'no_wa' => 'nullable|string|max:30',
            'avatar' => 'nullable|image|max:2048',   // 2MB
        ]);

        // ==== HANDLE UPLOAD AVATAR ====
        if ($request->hasFile('avatar')) {
            // hapus avatar lama jika ada
            if ($user->avatar_path && Storage::disk('public')->exists($user->avatar_path)) {
                Storage::disk('public')->delete($user->avatar_path);
            }

            // simpan file baru ke storage/app/public/avatars
            $path = $request->file('avatar')->store('avatars', 'public');

            // simpan path ke kolom avatar_path
            $data['avatar_path'] = $path;
        }

        // update data user
        $user->update($data);

        return redirect()
            ->route('sopir.profil')
            ->with('success', 'Profil berhasil diperbarui.');
    }
}

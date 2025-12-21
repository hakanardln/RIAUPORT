<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class PelangganController extends Controller
{
    // LIST + SEARCH (gabungan dari tabel pelanggan dan users dengan role 'user')
    public function index(Request $request)
    {
        $search = $request->input('q');
        $perPage = $request->input('per_page', 10);

        // Ambil data dari tabel pelanggan
        $pelangganData = Pelanggan::query()
            ->when($search, function ($query) use ($search) {
                $query->where('nama', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('telepon', 'like', "%{$search}%");
            })
            ->get()
            ->map(function ($item) {
                return (object) [
                    'id' => 'pelanggan_' . $item->id,
                    'original_id' => $item->id,
                    'nama' => $item->nama,
                    'email' => $item->email,
                    'telepon' => $item->telepon,
                    'alamat' => $item->alamat ?? null,
                    'source' => 'pelanggan',
                    'created_at' => $item->created_at,
                ];
            });

        // Ambil data dari tabel users dengan role 'user'
        $userData = User::where('role', 'user')
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('no_wa', 'like', "%{$search}%");
                });
            })
            ->get()
            ->map(function ($item) {
                return (object) [
                    'id' => 'user_' . $item->id,
                    'original_id' => $item->id,
                    'nama' => $item->name,
                    'email' => $item->email,
                    'telepon' => $item->no_wa,
                    'alamat' => null,
                    'source' => 'user',
                    'created_at' => $item->created_at,
                ];
            });

        // Gabungkan kedua data dan urutkan berdasarkan created_at
        $combined = $pelangganData->concat($userData)->sortByDesc(function ($item) {
            return $item->created_at;
        })->values();

        // Manual pagination
        $page = $request->input('page', 1);
        $total = $combined->count();
        $items = $combined->slice(($page - 1) * $perPage, $perPage)->values();

        $pelanggans = new LengthAwarePaginator(
            $items,
            $total,
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return view('admin.pelanggan.index', [
            'pelanggans' => $pelanggans,
            'search' => $search,
        ]);
    }

    // CREATE / STORE (form ada di halaman index, modal sederhana)
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'telepon' => 'nullable|string|max:50',
            'alamat' => 'nullable|string',
        ]);

        Pelanggan::create($data);

        return redirect()->route('admin.pelanggan.index')
            ->with('status', 'Pelanggan berhasil ditambahkan.');
    }

    // EDIT (dipakai oleh modal edit via form biasa)
    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        return view('admin.pelanggan.edit', [
            'pelanggan' => $pelanggan,
        ]);
    }

    public function update(Request $request, $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'telepon' => 'nullable|string|max:50',
            'alamat' => 'nullable|string',
        ]);

        $pelanggan->update($data);

        return redirect()->route('admin.pelanggan.index')
            ->with('status', 'Pelanggan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();

        return redirect()->route('admin.pelanggan.index')
            ->with('status', 'Pelanggan berhasil dihapus.');
    }

    // Hapus akun user yang terdaftar
    public function destroyUser($id)
    {
        $user = User::where('id', $id)->where('role', 'user')->firstOrFail();
        $user->delete();

        return redirect()->route('admin.pelanggan.index')
            ->with('status', 'Akun pelanggan berhasil dihapus.');
    }
}

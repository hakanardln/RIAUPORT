<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    // LIST + SEARCH
    public function index(Request $request)
    {
        $search = $request->input('q');

        $pelanggans = Pelanggan::query()
            ->when($search, function ($query) use ($search) {
                $query->where('nama', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('telepon', 'like', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10)
            ->withQueryString();

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
}

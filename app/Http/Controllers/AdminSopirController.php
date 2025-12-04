<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminSopirController extends Controller
{
    public function index()
    {
        // Ambil users dengan role sopir + travel mereka
        $drivers = DB::table('users')
            ->join('travels', 'travels.sopir_id', '=', 'users.id')
            ->where('users.role', 'sopir')
            ->select(
                'users.id',
                'users.name as nama',
                'users.email',
                DB::raw('NULL as telp'),   // kalau belum ada field telp di users, nanti bisa diganti
                'travels.rute',
                'travels.created_at as tglDaftar',
                'travels.armada as travelName',
                'travels.armada as jenisKendaraan',
                'travels.plat_nomor as platNomor',
                DB::raw('YEAR(travels.created_at) as tahunKendaraan'),
                'travels.status',
                'travels.whatsapp'
            )
            ->get()
            ->map(function ($d) {
                // Foto default (avatar)
                $d->foto = 'https://ui-avatars.com/api/?name='
                    . urlencode($d->nama)
                    . '&background=0ea5e9&color=fff';
                return $d;
            });

        return view('admin.sopir', [
            'drivers' => $drivers,
        ]);
    }
}
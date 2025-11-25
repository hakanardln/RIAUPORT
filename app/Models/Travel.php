<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    protected $table = 'travels'; // ← PENTING!

    protected $fillable = [
        'sopir_id',
        'kode_travel',
        'rute',
        'lokasi_asal',
        'lokasi_tujuan',
        'tanggal_berangkat',
        'jam_berangkat',
        'kapasitas_penumpang',
        'penumpang_terdaftar',
        'harga_per_orang',
        'keterangan',

        // kolom tambahan
        'armada',
        'warna',
        'plat_nomor',
        'kursi_tersedia',
        'jenis_layanan',
        'foto_armada',
        'titik_jemput',
        'titik_turun',
        'estimasi_waktu',
        'whatsapp',
        'deskripsi',
        'status',
    ];
}

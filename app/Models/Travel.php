<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    protected $table = 'travels'; // ← PENTING!

    protected $fillable = [
        'sopir_id',
        'kode_travel',

        // Mobil
        'armada',
        'kapasitas_penumpang',
        'warna',
        'plat_nomor',
        'foto_armada',
        'jenis_layanan',

        // Rute
        'rute',
        'lokasi_asal',
        'lokasi_tujuan',
        'tanggal_berangkat',
        'jam_berangkat',

        // Kontak
        'whatsapp',
        'harga_per_orang',
        'keterangan',
        'deskripsi',
        'status',

        // Sistem
        'penumpang_terdaftar',
    ];
    // app/Models/Travel.php
    public function sopir()
    {
        return $this->belongsTo(User::class, 'sopir_id');
    }
}

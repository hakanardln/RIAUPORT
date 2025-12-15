<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    protected $table = 'travels';

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

        // Approval (BARU)
        'status_approval',
        'submitted_at',
        'reviewed_at',
        'reviewed_by',
        'rejection_reason',

        // Sistem
        'penumpang_terdaftar',
    ];

    protected $casts = [
        'tanggal_berangkat' => 'date',
        'submitted_at' => 'datetime',
        'reviewed_at' => 'datetime',
    ];

    // ========== RELASI ==========

    public function sopir()
    {
        return $this->belongsTo(User::class, 'sopir_id');
    }

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }

    // ========== QUERY SCOPES (TAMBAHKAN INI) ==========

    /**
     * Scope untuk travel yang pending (menunggu review)
     */
    public function scopePending($query)
    {
        return $query->where('status_approval', 'pending');
    }

    /**
     * Scope untuk travel yang sudah approved
     */
    public function scopeApproved($query)
    {
        return $query->where('status_approval', 'approved');
    }

    /**
     * Scope untuk travel yang rejected
     */
    public function scopeRejected($query)
    {
        return $query->where('status_approval', 'rejected');
    }

    /**
     * Scope untuk travel yang aktif
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'aktif');
    }

    // ========== HELPER METHODS ==========

    /**
     * Cek apakah travel sedang pending
     */
    public function isPending()
    {
        return $this->status_approval === 'pending';
    }

    /**
     * Cek apakah travel sudah approved
     */
    public function isApproved()
    {
        return $this->status_approval === 'approved';
    }

    /**
     * Cek apakah travel di-reject
     */
    public function isRejected()
    {
        return $this->status_approval === 'rejected';
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'otp_code',
        'otp_expires_at',
        'is_verified',
        'google_id',
        'avatar_path',
        'no_wa',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'otp_code', // OTP jangan kelihatan saat serialize
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'otp_expires_at' => 'datetime',
        'is_verified' => 'boolean',
        'password' => 'hashed',
    ];

    /**
     * Relasi One-to-Many: User (sopir) has many travels
     * Digunakan untuk ambil semua travel milik sopir
     */
    public function travels()
    {
        return $this->hasMany(Travel::class, 'sopir_id');
    }

    /**
     * Relasi One-to-One: User (sopir) has one travel (ambil yang terbaru)
     * Digunakan jika hanya butuh 1 travel per sopir
     */
    public function travel()
    {
        return $this->hasOne(Travel::class, 'sopir_id')->latest();
    }
}
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

        // ROLE USER / SOPIR
        'role',

        // === FIELD TAMBAHAN UNTUK OTP ===
        'otp_code',
        'otp_expires_at',
        'is_verified',

        // === FIELD TAMBAHAN UNTUK LOGIN GOOGLE ===
        'google_id',
        'avatar',
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

    // RELASI JIKA USER ADALAH SOPIR
    public function travels()
    {
        return $this->hasMany(\App\Models\Travel::class, 'sopir_id');
    }
}
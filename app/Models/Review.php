<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    protected $fillable = [
        'travel_id',
        'user_id',
        'rating',
        'review',
        'is_read',
    ];

    protected $casts = [
        'is_read' => 'boolean',
    ];

    /**
     * Relasi ke travel
     */
    public function travel(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Travel::class);
    }

    /**
     * Relasi ke user (pengguna yang menulis review)
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}

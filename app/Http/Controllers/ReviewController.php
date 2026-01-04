<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'travel_id' => 'required|exists:travels,id',
            'rating' => 'required|integer|between:1,5',
            'review' => 'required|string|max:2000',
        ]);

        // Hanya user dengan role 'user' yang bisa memberi ulasan
        if (Auth::user()->role !== 'user') {
            return back()->with('error', 'Hanya pengguna yang dapat memberikan ulasan.');
        }

        // Cek apakah user sudah pernah memberikan ulasan untuk travel ini
        $existingReview = Review::where('travel_id', $validated['travel_id'])
            ->where('user_id', Auth::id())
            ->first();

        if ($existingReview) {
            return back()->with('error', 'Anda sudah pernah memberikan ulasan untuk travel ini.');
        }

        Review::create([
            'travel_id' => $validated['travel_id'],
            'user_id' => Auth::id(),
            'rating' => $validated['rating'],
            'review' => $validated['review'],
            'is_read' => false, // notifikasi belum dibaca oleh sopir
        ]);

        return back()->with('success', 'Ulasan berhasil dikirim! Terima kasih atas feedback Anda.');
    }
}

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

        if (Auth::user()->role !== 'user') {
            return back()->with('error', 'Hanya pengguna yang dapat memberikan ulasan.');
        }

        Review::create([
            'travel_id' => $validated['travel_id'],
            'user_id' => Auth::id(),
            'rating' => $validated['rating'],
            'review' => $validated['review'],
        ]);

        return back()->with('success', 'Ulasan berhasil dikirim!');
    }
}

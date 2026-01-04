<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;

class SopirNotifController extends Controller
{
    public function index()
    {
        $sopir = Auth::user();

        // Ambil semua travel milik sopir ini
        $travelIds = $sopir->travels()->pluck('id');

        // Ambil semua review untuk travel milik sopir, urutkan dari terbaru
        $reviews = Review::whereIn('travel_id', $travelIds)
            ->with(['user', 'travel'])
            ->orderBy('created_at', 'desc')
            ->get();

        // Hitung jumlah ulasan yang belum dibaca
        $unreadCount = $reviews->where('is_read', false)->count();

        return view('sopir.notifikasi', [
            'reviews' => $reviews,
            'unreadCount' => $unreadCount,
        ]);
    }

    /**
     * Tandai satu review sebagai sudah dibaca
     */
    public function markAsRead(Request $request, $id)
    {
        $review = Review::findOrFail($id);

        // Pastikan review ini milik travel sopir yang login
        $sopir = Auth::user();
        $travelIds = $sopir->travels()->pluck('id')->toArray();

        if (!in_array($review->travel_id, $travelIds)) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $review->update(['is_read' => true]);

        return response()->json(['success' => true]);
    }

    /**
     * Tandai semua review sebagai sudah dibaca
     */
    public function markAllAsRead(Request $request)
    {
        $sopir = Auth::user();
        $travelIds = $sopir->travels()->pluck('id');

        Review::whereIn('travel_id', $travelIds)
            ->where('is_read', false)
            ->update(['is_read' => true]);

        return response()->json(['success' => true]);
    }
}

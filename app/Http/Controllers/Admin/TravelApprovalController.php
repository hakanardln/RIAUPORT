<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Travel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TravelApprovalController extends Controller
{
    // Tampilkan semua travel (dengan filter)
    public function index(Request $request)
    {
        $filter = $request->get('status', 'pending');

        $query = Travel::with(['sopir', 'reviewer'])
            ->orderBy('submitted_at', 'desc');

        switch ($filter) {
            case 'approved':
                $query->approved();
                break;
            case 'rejected':
                $query->rejected();
                break;
            default:
                $query->pending();
        }

        $travels = $query->paginate(15);

        // Hitung statistik
        $stats = [
            'pending' => Travel::pending()->count(),
            'approved' => Travel::approved()->count(),
            'rejected' => Travel::rejected()->count(),
            'total' => Travel::count(),
        ];

        return view('admin.travel.index', compact('travels', 'filter', 'stats'));
    }

    // Detail travel
    public function show($id)
    {
        $travel = Travel::with(['sopir', 'reviewer'])->findOrFail($id);
        return view('admin.travel.show', compact('travel'));
    }

    // Approve travel (RETURN JSON)
    public function approve($id)
    {
        $travel = Travel::findOrFail($id);

        if (!$travel->isPending()) {
            return response()->json([
                'success' => false,
                'message' => 'Travel ini sudah direview sebelumnya.'
            ], 400);
        }

        $travel->update([
            'status_approval' => 'approved',
            'reviewed_at' => now(),
            'reviewed_by' => Auth::id(),
            'rejection_reason' => null,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Travel berhasil disetujui dan akan muncul di hasil pencarian.'
        ]);
    }

    // Reject travel (RETURN JSON)
    public function reject(Request $request, $id)
    {
        $request->validate([
            'rejection_reason' => 'required|string|max:500',
        ]);

        $travel = Travel::findOrFail($id);

        if (!$travel->isPending()) {
            return response()->json([
                'success' => false,
                'message' => 'Travel ini sudah direview sebelumnya.'
            ], 400);
        }

        $travel->update([
            'status_approval' => 'rejected',
            'reviewed_at' => now(),
            'reviewed_by' => Auth::id(),
            'rejection_reason' => $request->rejection_reason,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Travel ditolak. Sopir dapat melihat alasan penolakan.'
        ]);
    }

    // Hapus travel (RETURN JSON)
    public function destroy($id)
    {
        $travel = Travel::findOrFail($id);

        // Hapus foto jika ada
        if ($travel->foto_armada) {
            Storage::disk('public')->delete($travel->foto_armada);
        }

        $travel->delete();

        return response()->json([
            'success' => true,
            'message' => 'Travel berhasil dihapus.'
        ]);
    }

    // Helper: Kirim notifikasi ke sopir (Optional)
    private function notifySopir($travel, $status)
    {
        // Implementasi notifikasi di sini
        // Bisa pakai database notification, email, atau SMS
    }
}
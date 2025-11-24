<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    /**
     * Display contact form page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('contact');
    }

    /**
     * Store contact form submission
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string|max:1000',
        ], [
            // Custom error messages (opsional)
            'first_name.required' => 'Nama depan wajib diisi',
            'last_name.required' => 'Nama belakang wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'message.required' => 'Pesan wajib diisi',
            'message.max' => 'Pesan maksimal 1000 karakter',
        ]);

        try {
            // Simpan data ke database
            $contact = Contact::create([
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'] ?? null,
                'message' => $validated['message'],
            ]);

            // Kirim email notifikasi ke admin (opsional)
            // Uncomment jika sudah setup email
            /*
            try {
                Mail::to('admin@riauport.com')->send(new \App\Mail\ContactMail($contact));
            } catch (\Exception $e) {
                Log::error('Failed to send contact email: ' . $e->getMessage());
            }
            */

            // Redirect dengan pesan sukses
            return redirect()->back()->with('success', 'Terima kasih! Pesan Anda telah terkirim. Kami akan segera menghubungi Anda.');

        } catch (\Exception $e) {
            // Log error
            Log::error('Contact form submission failed: ' . $e->getMessage());

            // Redirect dengan pesan error
            return redirect()->back()
                ->withInput()
                ->with('error', 'Maaf, terjadi kesalahan. Silakan coba lagi.');
        }
    }

    /**
     * Display all contact messages (untuk admin)
     * 
     * @return \Illuminate\View\View
     */
    public function admin()
    {
        // Ambil semua pesan, urutkan dari yang terbaru
        $contacts = Contact::orderBy('created_at', 'desc')->paginate(20);

        return view('admin.contacts', compact('contacts'));
    }

    /**
     * Show single contact message (untuk admin)
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $contact = Contact::findOrFail($id);

        return view('admin.contact-detail', compact('contact'));
    }

    /**
     * Delete contact message (untuk admin)
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $contact = Contact::findOrFail($id);
            $contact->delete();

            return redirect()->route('admin.contacts')
                ->with('success', 'Pesan berhasil dihapus');
        } catch (\Exception $e) {
            Log::error('Failed to delete contact: ' . $e->getMessage());

            return redirect()->back()
                ->with('error', 'Gagal menghapus pesan');
        }
    }

    /**
     * Mark contact as read (untuk admin)
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function markAsRead($id)
    {
        try {
            $contact = Contact::findOrFail($id);
            $contact->is_read = true;
            $contact->save();

            return redirect()->back()
                ->with('success', 'Pesan ditandai sebagai sudah dibaca');
        } catch (\Exception $e) {
            Log::error('Failed to mark contact as read: ' . $e->getMessage());

            return redirect()->back()
                ->with('error', 'Gagal mengupdate status pesan');
        }
    }
}
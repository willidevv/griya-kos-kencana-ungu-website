<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    // Halaman Publik
    public function publicIndex() {
        $contact = Contact::first();
        return view('pages.kontak', compact('contact'));
    }

    // Halaman Admin
    public function adminIndex() {
        $contact = Contact::first();
        return view('admin.kontak', compact('contact'));
    }

    // Update Data
    public function update(Request $request) {
        $request->validate([
            'phone' => 'required',
            'maps_iframe' => 'required',
        ]);

        Contact::updateOrCreate(
            ['id' => 1], // Selalu update ID 1
            [
                'phone' => $request->phone,
                'maps_iframe' => $request->maps_iframe,
                'users_id' => Auth::id(), // ✅ WAJIB ADA
            ]
        );

        return back()->with('success', 'Kontak berhasil diperbarui!');
    }
}
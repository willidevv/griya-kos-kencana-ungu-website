<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Penting untuk hapus file

class GalleryController extends Controller
{
    // 1. HALAMAN DAFTAR (ADMIN) - Ini yang tadinya hilang
    public function index()
    {
        $galleries = Gallery::latest()->get();
        return view('admin.galeri.index', compact('galleries'));
    }

    // 2. HALAMAN FORM TAMBAH (ADMIN)
    public function create()
    {
        return view('admin.galeri.create');
    }

    // 3. PROSES SIMPAN (ADMIN)
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'caption' => 'required|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('gallery', 'public');

            Gallery::create([
                'image' => $imagePath,
                'caption' => $request->caption,
                'is_visible' => true, // Default tampil
            ]);

            return redirect()->route('admin.galeri.index')->with('success', 'Foto berhasil diunggah!');
        }

        return back()->with('error', 'Gagal mengunggah foto.');
    }

    // 4. PROSES HAPUS (ADMIN)
    public function destroy(Gallery $gallery)
    {
        // Hapus file fisik dari storage agar tidak menumpuk
        if ($gallery->image) {
            Storage::disk('public')->delete($gallery->image);
        }

        $gallery->delete();
        return back()->with('success', 'Foto berhasil dihapus!');
    }

    // 5. HALAMAN PUBLIK (PENGUNJUNG)
    public function publicIndex()
    {
        $galleries = Gallery::where('is_visible', true)->latest()->get();
        return view('pages.galeri', compact('galleries'));
    }
}
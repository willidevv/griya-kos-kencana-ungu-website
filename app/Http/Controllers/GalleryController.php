<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
{
    // 1. HALAMAN DAFTAR (ADMIN)
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
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $shortName = substr(uniqid(), -5) . '.' . $extension;

            $imagePath = $file->storeAs('gallery', $shortName, 'public');

            Gallery::create([
                'image' => $imagePath,
                'caption' => $request->caption,
                'is_visible' => true,
                'users_id' => Auth::id(),
            ]);

            return redirect()->route('admin.galeri.index')->with('success', 'Foto berhasil diunggah!');
        }

        return back()->with('error', 'Gagal mengunggah foto.');
    }

    // 4. HALAMAN FORM EDIT (ADMIN)
    // Gunakan variabel $galeri (sesuai nama parameter di route)
    public function edit(Gallery $galeri)
    {
        // Kita kirim ke view dengan nama 'gallery' agar tidak merusak variabel yang sudah ada di file Blade Anda
        return view('admin.galeri.edit', ['gallery' => $galeri]);
    }

    // 5. PROSES UPDATE (ADMIN)
    public function update(Request $request, Gallery $galeri)
    {
        $request->validate([
            'caption' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Cek jika ada upload foto baru
        if ($request->hasFile('image')) {
            // Hapus foto lama
            if ($galeri->image && Storage::disk('public')->exists($galeri->image)) {
                Storage::disk('public')->delete($galeri->image);
            }

            // Simpan foto baru
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $shortName = substr(uniqid(), -5) . '.' . $extension;
            $newPath = $file->storeAs('gallery', $shortName, 'public');
            
            // Masukkan path baru ke array update
            $galeri->image = $newPath;
        }

        $galeri->update([
            'caption' => $request->caption,
            'image' => $galeri->image,
            'is_visible' => $request->has('is_visible'),
        ]);

        return redirect()->route('admin.galeri.index')->with('success', 'Data galeri berhasil diperbarui!');
    }

    // 6. PROSES HAPUS (ADMIN)
    public function destroy(Gallery $galeri)
    {
        if ($galeri->image && Storage::disk('public')->exists($galeri->image)) {
            Storage::disk('public')->delete($galeri->image);
        }

        $galeri->delete();
        return back()->with('success', 'Foto berhasil dihapus!');
    }

    // 7. HALAMAN PUBLIK (PENGUNJUNG)
    public function publicIndex()
    {
        $galleries = Gallery::where('is_visible', true)->latest()->get();
        return view('pages.galeri', compact('galleries'));
    }
}
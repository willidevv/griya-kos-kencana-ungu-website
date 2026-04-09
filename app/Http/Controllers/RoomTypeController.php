<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomTypeController extends Controller
{
    // 1. Halaman depan untuk pengunjung
    public function publicIndex() {
        $roomTypes = RoomType::orderBy('category', 'asc')->orderBy('code', 'asc')->get();
        return view('pages.fasilitas', compact('roomTypes'));
    }

    // 2. List semua data fasilitas di dashboard Admin
    public function adminIndex() {
        $rooms = RoomType::latest()->get();
        return view('admin.fasilitas.index', compact('rooms'));
    }

    // 3. Form Tambah Data Baru
    public function create() {
        return view('admin.fasilitas.create');
    }

    // 4. Simpan Data Baru
    public function store(Request $request) {
        $request->validate([
            // Validasi Kode hanya wajib jika kategori 'kamar'
            'code' => $request->category === 'kamar' ? 'required|unique:room_types,code' : 'nullable',
            'name' => 'required|string|max:255',
            'category' => 'required|in:kamar,bersama,parkir',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'facilities' => 'nullable|array' 
        ]);

        $imagePath = $request->file('image')->store('rooms', 'public');

        // LOGIKA KODE OTOMATIS: Jika bukan kamar, buat kode unik otomatis
        $finalCode = $request->code;
        if ($request->category !== 'kamar') {
            $finalCode = strtoupper($request->category) . '-' . time();
        }

        // LOGIKA FASILITAS: Jika bukan kamar, isi "-"
        $facilitiesString = ($request->category === 'kamar' && $request->has('facilities')) 
            ? implode(', ', $request->facilities) 
            : '-';

        RoomType::create([
            'code' => $finalCode,
            'name' => $request->name,
            'category' => $request->category,
            'image' => $imagePath,
            'facilities' => $facilitiesString,
        ]);

        return redirect()->route('admin.fasilitas.index')->with('success', 'Data berhasil ditambahkan!');
    }

    // 5. Form Edit Data
    public function edit(RoomType $room) {
        $selectedFacilities = explode(', ', $room->facilities);
        return view('admin.fasilitas.edit', compact('room', 'selectedFacilities'));
    }

    // 6. Proses Update Data
    public function update(Request $request, RoomType $room) {
        $request->validate([
            // Saat update, abaikan ID unik milik sendiri agar tidak error
            'code' => $request->category === 'kamar' ? 'required|unique:room_types,code,'.$room->id : 'nullable',
            'name' => 'required|string|max:255',
            'category' => 'required|in:kamar,bersama,parkir',
            'facilities' => 'nullable|array', 
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            if ($room->image) {
                Storage::disk('public')->delete($room->image);
            }
            $room->image = $request->file('image')->store('rooms', 'public');
        }

        // Tetap pertahankan kode lama jika kategori bukan kamar (atau buat baru jika sebelumnya belum ada)
        $finalCode = $room->code;
        if ($request->category === 'kamar') {
            $finalCode = $request->code;
        }

        $facilitiesString = ($request->category === 'kamar' && $request->has('facilities')) 
            ? implode(', ', $request->facilities) 
            : '-';

        $room->update([
            'code' => $finalCode,
            'name' => $request->name,
            'category' => $request->category,
            'facilities' => $facilitiesString,
            'image' => $room->image
        ]);

        return redirect()->route('admin.fasilitas.index')->with('success', 'Data berhasil diperbarui!');
    }

    // 7. Hapus Data
    public function destroy(RoomType $room) {
        if ($room->image) {
            Storage::disk('public')->delete($room->image);
        }
        $room->delete();
        return back()->with('success', 'Data berhasil dihapus.');
    }
}
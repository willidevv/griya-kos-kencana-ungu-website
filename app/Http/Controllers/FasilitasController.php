<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class FasilitasController extends Controller
{
    /**
     * Menampilkan daftar fasilitas untuk pengunjung (Public).
     */
    public function publicIndex() 
    {
        $roomTypes = Fasilitas::orderBy('category', 'asc')
            ->orderBy('name', 'asc')
            ->get();

        return view('pages.fasilitas', compact('roomTypes'));
    }

    /**
     * Menampilkan daftar fasilitas di Dashboard Admin.
     * Fungsi ini harus bernama 'index' agar sesuai dengan Route::resource.
     */
    public function index() 
    {
        $rooms = Fasilitas::latest()->get();
        return view('admin.fasilitas.index', compact('rooms'));
    }

    /**
     * Menampilkan form untuk menambah data baru.
     */
    public function create() 
    {
        return view('admin.fasilitas.create');
    }

    /**
     * Menyimpan data fasilitas baru ke database.
     */
    public function store(Request $request) 
    {
        $request->validate([
            'name' => 'required|string|max:25', 
            'category' => 'required|in:kamar,bersama,parkir',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'facilities' => 'nullable|array' 
        ]);

        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $shortName = substr(uniqid(), -5) . '.' . $extension;
        $imagePath = $file->storeAs('rooms', $shortName, 'public');

        $facilitiesString = ($request->category === 'kamar' && $request->has('facilities')) 
            ? implode(', ', $request->facilities) 
            : '-';

        Fasilitas::create([
            'name' => $request->name,
            'category' => $request->category,
            'image' => $imagePath,
            'facilities' => $facilitiesString,
            'users_id' => Auth::id(),
        ]);

        return redirect()->route('admin.fasilitas.index')
            ->with('success', 'Data fasilitas berhasil ditambahkan!');
    }

    /**
     * Menampilkan form edit data.
     */
    public function edit(Fasilitas $fasilita) 
    {
        // Variabel di view Anda mungkin menggunakan nama $room
        $room = $fasilita;
        $selectedFacilities = explode(', ', $room->facilities);
        return view('admin.fasilitas.edit', compact('room', 'selectedFacilities'));
    }

    /**
     * Memperbarui data fasilitas di database.
     */
    public function update(Request $request, Fasilitas $fasilita) 
    {
        $room = $fasilita;
        $request->validate([
            'name' => 'required|string|max:25',
            'category' => 'required|in:kamar,bersama,parkir',
            'facilities' => 'nullable|array', 
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            if ($room->image) {
                Storage::disk('public')->delete($room->image);
            }

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $shortName = substr(uniqid(), -5) . '.' . $extension;
            $room->image = $file->storeAs('rooms', $shortName, 'public');
        }

        $facilitiesString = ($request->category === 'kamar' && $request->has('facilities')) 
            ? implode(', ', $request->facilities) 
            : '-';

        $room->update([
            'name' => $request->name,
            'category' => $request->category,
            'facilities' => $facilitiesString,
            'image' => $room->image,
            'users_id' => Auth::id(),
        ]);

        return redirect()->route('admin.fasilitas.index')
            ->with('success', 'Data fasilitas berhasil diperbarui!');
    }

    /**
     * Menghapus data fasilitas.
     */
    public function destroy(Fasilitas $fasilita) 
    {
        if ($fasilita->image) {
            Storage::disk('public')->delete($fasilita->image);
        }

        $fasilita->delete();

        return back()->with('success', 'Data fasilitas berhasil dihapus.');
    }
}
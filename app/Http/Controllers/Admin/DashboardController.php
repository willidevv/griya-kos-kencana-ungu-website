<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Fasilitas; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // ✅ PENTING: Tambahkan ini agar Auth bisa terbaca

class DashboardController extends Controller
{
    public function index()
    {
        // ✅ Pengecekan status aktif: Jika admin dinonaktifkan saat masih login, 
        // mereka akan langsung ditendang keluar saat mengakses dashboard.
        if (!Auth::user()->is_active) {
            Auth::logout();
            return redirect()->route('login')->with('error', 'Akun Anda telah dinonaktifkan.');
        }

        // Menghitung total foto dari galeri
        $totalPhotos = Gallery::count(); 
        
        // Menghitung total data dari tabel fasilitas
        $totalRoomTypes = Fasilitas::count();

        return view('admin.dashboard', compact('totalPhotos', 'totalRoomTypes'));
    }
}
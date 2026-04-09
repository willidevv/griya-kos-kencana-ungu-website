<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoomType;
use App\Models\Gallery; // Pastikan kamu punya model Gallery, jika tidak ada hapus baris ini
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data asli dari database
        // Jika model Gallery belum ada, ganti ke angka 0 atau hitung dari model lain
        $totalPhotos = Gallery::count(); 
        
        // Menghitung tipe kamar
        $totalRoomTypes = RoomType::count();

        return view('admin.dashboard', compact('totalPhotos', 'totalRoomTypes'));
    }
}
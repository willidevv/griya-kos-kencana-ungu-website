<?php

namespace App\Http\Controllers;

use App\Models\Gallery; // Sesuaikan nama model galeri Anda
use App\Models\RoomType; // Sesuaikan nama model fasilitas/tipe kamar Anda
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Menghitung total foto di galeri
        $totalPhotos = Gallery::count();

        // Menghitung jumlah tipe kamar (category: kamar)
        $totalRoomTypes = RoomType::where('category', 'kamar')->count();

        // Mengirim data ke view
        return view('admin.dashboard', compact('totalPhotos', 'totalRoomTypes'));
    }
}
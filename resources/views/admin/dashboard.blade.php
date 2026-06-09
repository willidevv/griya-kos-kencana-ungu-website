@extends('layouts.admin')

@section('title', 'Dashboard Utama')

@section('admin_content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
    {{-- Card Total Foto --}}
    <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm">
        <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mb-4">
            <i data-lucide="image" class="w-6 h-6"></i>
        </div>
        <h3 class="text-gray-500 text-sm">Total Foto Galeri</h3>
        <p class="text-2xl font-bold text-gray-800">{{ $totalPhotos }} Foto</p>
    </div>
    
    {{-- Card Tipe Fasilitas dan Kamar --}}
    <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm">
        <div class="w-12 h-12 bg-purple-50 text-purple-600 rounded-2xl flex items-center justify-center mb-4">
            <i data-lucide="star" class="w-6 h-6"></i>
        </div>
        <h3 class="text-gray-500 text-sm">Tipe Fasilitas Kost</h3>
        <p class="text-2xl font-bold text-gray-800">{{ $totalRoomTypes }} Kategori</p>
    </div>

    {{-- Status Kontak (Bisa statis atau ambil dari config/setting database) --}}
    <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm">
        <div class="w-12 h-12 bg-green-50 text-green-600 rounded-2xl flex items-center justify-center mb-4">
            <i data-lucide="message-circle" class="w-6 h-6"></i>
        </div>
        <h3 class="text-gray-500 text-sm">Status Kontak</h3>
        <p class="text-2xl font-bold text-green-600 tracking-wide">AKTIF</p>
    </div>
</div>

<div class="bg-purple-700 rounded-3xl p-8 text-white flex justify-between items-center overflow-hidden relative">
    <div class="relative z-10">
        <h2 class="text-2xl font-bold mb-2">Selamat Datang, {{ auth()->user()->name }}!</h2>
        <p class="opacity-80 max-w-md text-sm">Gunakan menu di samping untuk mengubah gambar hero, detail fasilitas, hingga mengelola foto galeri secara real-time.</p>
    </div>
    <i data-lucide="settings" class="w-40 h-40 absolute -right-10 -bottom-10 opacity-10 rotate-12"></i>
</div>
@endsection
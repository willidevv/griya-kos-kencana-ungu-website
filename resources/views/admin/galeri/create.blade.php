@extends('layouts.admin')

@section('title', 'Tambah Foto Galeri')

@section('admin_content')
<div class="max-w-2xl">
    <a href="{{ route('admin.galeri.index') }}" class="text-purple-600 font-bold text-sm flex items-center gap-2 mb-6 hover:underline">
        <i data-lucide="arrow-left" class="w-4 h-4"></i> Kembali ke Daftar
    </a>

    <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-8">
        <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Pilih Foto</label>
                <input type="file" name="image" required
                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100 transition">
                <p class="text-[10px] text-gray-400 mt-2 italic">* Format: JPG, JPEG, PNG. Maksimal 2MB.</p>
            </div>

            <div>
                <label for="caption" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Keterangan Foto</label>
                <input type="text" name="caption" id="caption" required placeholder="Contoh: Interior Kamar Tipe A"
                    class="block w-full px-4 py-3 bg-gray-50 border border-gray-200 text-sm rounded-2xl focus:ring-2 focus:ring-purple-500 outline-none transition">
            </div>

            <div class="flex items-center gap-3 bg-gray-50 p-4 rounded-2xl">
                <input type="checkbox" name="is_visible" id="is_visible" checked class="w-5 h-5 text-purple-600 border-gray-300 rounded focus:ring-purple-500">
                <label for="is_visible" class="text-sm text-gray-700 font-medium">Tampilkan di Website</label>
            </div>

            <button type="submit" class="w-full bg-purple-600 hover:bg-purple-700 text-white font-bold py-4 rounded-2xl shadow-lg shadow-purple-200 transition flex items-center justify-center gap-2">
                <i data-lucide="upload-cloud" class="w-5 h-5"></i> Simpan ke Galeri
            </button>
        </form>
    </div>
</div>
@endsection
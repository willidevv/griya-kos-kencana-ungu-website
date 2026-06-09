@extends('layouts.admin')

@section('title', 'Edit Galeri')

@section('admin_content')
<div class="mb-8">
    <a href="{{ route('admin.galeri.index') }}" class="text-purple-600 font-medium flex items-center gap-2 mb-2 hover:underline text-sm">
        <i data-lucide="arrow-left" class="w-4 h-4"></i> Kembali ke Daftar
    </a>
    <h2 class="text-2xl font-bold text-gray-800">Edit Foto</h2>
</div>

{{-- Alert Error --}}
@if ($errors->any())
    <div class="max-w-2xl mb-6 p-4 rounded-2xl bg-red-50 border border-red-100 flex items-start gap-3">
        <i data-lucide="alert-circle" class="w-5 h-5 text-red-500 mt-0.5"></i>
        <div>
            <p class="text-xs font-bold text-red-800 uppercase italic">Gagal memperbarui:</p>
            <ul class="text-[10px] text-red-600 font-medium list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

<div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm max-w-2xl">
    <form action="{{ route('admin.galeri.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="space-y-6">
            {{-- Preview & Upload --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-3">Foto Saat Ini</label>
                <div class="relative group w-full h-48 mb-4">
                    <img src="{{ asset('storage/galleries/' . $gallery->image) }}" class="w-full h-full object-cover rounded-2xl border shadow-sm">
                    <div class="absolute inset-0 bg-black/20 rounded-2xl opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                        <span class="text-white text-xs font-bold bg-black/50 px-3 py-1 rounded-full">Preview Terpasang</span>
                    </div>
                </div>
                
                <label class="block text-sm font-semibold text-gray-700 mb-2">Ganti Foto (Opsional)</label>
                <input type="file" name="image" class="w-full px-4 py-3 rounded-xl border border-dashed border-gray-300 bg-gray-50 outline-none file:mr-4 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-purple-100 file:text-purple-700">
                <p class="text-[10px] text-gray-400 mt-2 italic">* Nama file akan disingkat otomatis agar muat di database (Max 20 Karakter).</p>
            </div>

            {{-- Caption --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Keterangan Foto</label>
                <input type="text" name="caption" value="{{ old('caption', $gallery->caption) }}" 
                    maxlength="30"
                    class="w-full px-4 py-3 rounded-xl border @error('caption') border-red-400 @else border-gray-200 @enderror focus:ring-2 focus:ring-purple-500 outline-none transition" 
                    placeholder="Contoh: Kamar Lantai 2" required>
                @error('caption') <p class="text-red-500 text-[10px] mt-1 font-bold italic">{{ $message }}</p> @enderror
            </div>

            {{-- Visibility --}}
            <div class="flex items-center gap-3 p-4 bg-gray-50 rounded-2xl border border-gray-100">
                <input type="checkbox" name="is_visible" id="is_visible" value="1" {{ old('is_visible', $gallery->is_visible) ? 'checked' : '' }}
                    class="w-5 h-5 rounded text-purple-600 focus:ring-purple-500 border-gray-300">
                <label for="is_visible" class="text-sm font-medium text-gray-700 cursor-pointer">Tampilkan di Halaman Galeri Pengunjung</label>
            </div>
        </div>

        <div class="mt-8 flex gap-3">
            <button type="submit" class="bg-purple-600 text-white px-8 py-3 rounded-2xl font-bold hover:bg-purple-700 transition shadow-lg shadow-purple-100 active:scale-95">
                Simpan Perubahan
            </button>
            <a href="{{ route('admin.galeri.index') }}" class="bg-gray-100 text-gray-600 px-8 py-3 rounded-2xl font-bold hover:bg-gray-200 transition text-center">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
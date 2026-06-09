@extends('layouts.admin')

@section('title', 'Tambah Foto Galeri')

@section('admin_content')
<div class="max-w-2xl">
    <a href="{{ route('admin.galeri.index') }}" class="text-purple-600 font-bold text-sm flex items-center gap-2 mb-6 hover:underline">
        <i data-lucide="arrow-left" class="w-4 h-4"></i> Kembali ke Daftar
    </a>

    {{-- Notifikasi Error Jika Validasi Gagal --}}
    @if ($errors->any())
        <div class="mb-6 p-4 rounded-2xl bg-red-50 border border-red-100 flex items-start gap-3">
            <i data-lucide="alert-circle" class="w-5 h-5 text-red-500 mt-0.5"></i>
            <div>
                <p class="text-xs font-bold text-red-800">Gagal Mengunggah:</p>
                <ul class="list-disc list-inside mt-1">
                    @foreach ($errors->all() as $error)
                        <li class="text-[10px] text-red-600 font-medium">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-8">
        <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Pilih Foto</label>
                <input type="file" name="image" required
                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100 transition @error('image') border-red-400 @enderror">
                <p class="text-[10px] text-gray-400 mt-2 italic">* Limit Database: Nama file akan disingkat otomatis (Max 20 Karakter).</p>
                @error('image') <p class="text-red-500 text-[10px] mt-1 font-bold">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="caption" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Keterangan Foto</label>
                <input type="text" name="caption" id="caption" value="{{ old('caption') }}" required maxlength="30" placeholder="Contoh: Kamar Mandi Tipe A"
                    class="block w-full px-4 py-3 bg-gray-50 border @error('caption') border-red-400 @else border-gray-200 @enderror text-sm rounded-2xl focus:ring-2 focus:ring-purple-500 outline-none transition">
                @error('caption') <p class="text-red-500 text-[10px] mt-1 font-bold">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center gap-3 bg-gray-50 p-4 rounded-2xl">
                <input type="checkbox" name="is_visible" id="is_visible" value="1" {{ old('is_visible', '1') == '1' ? 'checked' : '' }} class="w-5 h-5 text-purple-600 border-gray-300 rounded focus:ring-purple-500">
                <label for="is_visible" class="text-sm text-gray-700 font-medium">Tampilkan di Website</label>
            </div>

            <button type="submit" class="w-full bg-purple-600 hover:bg-purple-700 text-white font-bold py-4 rounded-2xl shadow-lg shadow-purple-200 transition flex items-center justify-center gap-2 active:scale-95">
                <i data-lucide="upload-cloud" class="w-5 h-5"></i> Simpan ke Galeri
            </button>
        </form>
    </div>
</div>
@endsection
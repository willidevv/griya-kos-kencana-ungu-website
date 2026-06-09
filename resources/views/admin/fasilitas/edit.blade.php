@extends('layouts.admin')

@section('title', 'Edit Fasilitas')

@section('admin_content')
<div class="mb-8">
    <a href="{{ route('admin.fasilitas.index') }}" class="text-purple-600 font-medium flex items-center gap-2 mb-2 hover:underline">
        <i data-lucide="arrow-left" class="w-4 h-4"></i> Kembali ke Daftar
    </a>
    <h2 class="text-2xl font-bold text-gray-800">Edit Data: {{ $room->name }}</h2>
</div>

{{-- Alert Error Global --}}
@if ($errors->any())
    <div class="max-w-3xl mb-6 p-4 rounded-2xl bg-red-50 border border-red-100 flex items-start gap-3">
        <i data-lucide="alert-circle" class="w-5 h-5 text-red-500 mt-0.5"></i>
        <div>
            <p class="text-sm font-bold text-red-800">Gagal memperbarui data:</p>
            <ul class="text-xs text-red-700 list-disc list-inside mt-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

<div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm max-w-3xl">
    <form action="{{ route('admin.fasilitas.update', $room->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Nama Fasilitas --}}
            <div class="col-span-2 md:col-span-1">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama</label>
                <input type="text" name="name" value="{{ old('name', $room->name) }}" 
                    class="w-full px-4 py-3 rounded-xl border @error('name') border-red-400 @else border-gray-200 @enderror focus:ring-2 focus:ring-purple-500 outline-none transition"
                    placeholder="Contoh: Tipe Eksklusif A" required maxlength="25">
                @error('name') <p class="text-red-500 text-[11px] mt-1 font-medium">{{ $message }}</p> @enderror
            </div>

            {{-- Kategori --}}
            <div class="col-span-2 md:col-span-1">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori</label>
                <select name="category" id="category" 
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-purple-500 outline-none transition bg-white" required>
                    <option value="kamar" {{ old('category', $room->category) == 'kamar' ? 'selected' : '' }}>Kamar</option>
                    <option value="bersama" {{ old('category', $room->category) == 'bersama' ? 'selected' : '' }}>Tempat Bersama</option>
                    <option value="parkir" {{ old('category', $room->category) == 'parkir' ? 'selected' : '' }}>Area Parkir</option>
                </select>
            </div>

            {{-- Fasilitas (Limit 40 Karakter) --}}
            <div id="facilities_section" class="col-span-2 {{ old('category', $room->category) == 'kamar' ? '' : 'hidden' }}">
                <label class="block text-sm font-semibold text-gray-700 mb-3">Fasilitas Kamar (Pilih Secukupnya)</label>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    @php
                        $options = ['AC', 'WiFi', 'Mandi', 'TV', 'Kasur', 'Lemari'];
                        // Ambil data terpilih dari old input atau database
                        $selected = old('facilities', explode(', ', $room->facilities));
                    @endphp
                    @foreach($options as $opt)
                    <label class="flex items-center gap-3 p-3 rounded-xl border border-gray-100 bg-gray-50 cursor-pointer hover:bg-purple-50 transition">
                        <input type="checkbox" name="facilities[]" value="{{ $opt }}" 
                            {{ in_array($opt, $selected) ? 'checked' : '' }}
                            class="w-5 h-5 rounded text-purple-600 focus:ring-purple-500">
                        <span class="text-sm text-gray-700 font-medium">{{ $opt == 'Mandi' ? 'KM Dalam' : $opt }}</span>
                    </label>
                    @endforeach
                </div>
                @error('facilities') <p class="text-red-500 text-[11px] mt-2 font-medium">{{ $message }}</p> @enderror
            </div>

            {{-- Upload Foto --}}
            <div class="col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Foto Saat Ini</label>
                <div class="mb-4">
                    @if($room->image)
                        <img src="{{ asset('storage/facilities/' . $room->image) }}" class="w-48 h-32 object-cover rounded-2xl border shadow-sm">
                    @else
                        <div class="w-48 h-32 bg-gray-100 rounded-2xl border flex items-center justify-center text-gray-400 text-xs italic">Tidak ada foto</div>
                    @endif
                </div>
                
                <label class="block text-sm font-semibold text-gray-700 mb-2">Ganti Foto (Nama file akan disingkat)</label>
                <input type="file" name="image" 
                    class="w-full px-4 py-2 rounded-xl border border-dashed border-gray-300 bg-gray-50 outline-none file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-purple-50 file:text-purple-600 file:text-xs file:font-bold">
                <p class="text-gray-400 text-[10px] mt-1 italic">*Maksimal 2MB, VARCHAR(20) Limit</p>
                @error('image') <p class="text-red-500 text-[11px] mt-1 font-medium">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="mt-8 flex gap-3">
            <button type="submit" class="bg-purple-600 text-white px-8 py-3 rounded-2xl font-bold hover:bg-purple-700 transition shadow-lg shadow-purple-100 active:scale-95">
                Simpan Perubahan
            </button>
            <a href="{{ route('admin.fasilitas.index') }}" class="bg-gray-100 text-gray-600 px-8 py-3 rounded-2xl font-bold hover:bg-gray-200 transition">
                Batal
            </button>
        </div>
    </form>
</div>

<script>
    document.getElementById('category').addEventListener('change', function() {
        const section = document.getElementById('facilities_section');
        if (this.value === 'kamar') {
            section.classList.remove('hidden');
        } else {
            section.classList.add('hidden');
            // Uncheck semua box jika kategori bukan kamar
            section.querySelectorAll('input[type="checkbox"]').forEach(el => el.checked = false);
        }
    });
</script>
@endsection
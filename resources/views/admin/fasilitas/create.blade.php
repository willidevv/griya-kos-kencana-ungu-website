@extends('layouts.admin')

@section('title', 'Tambah Fasilitas Baru')

@section('admin_content')
<style>
    .facility-card input:checked + .card-content {
        background-color: #f5f3ff;
        border-color: #7c3aed;
    }
    .facility-card input:checked + .card-content i {
        color: #7c3aed;
    }
    #facilities-section {
        transition: all 0.3s ease-in-out;
    }
</style>

<div class="max-w-2xl bg-white p-8 rounded-3xl border border-gray-100 shadow-sm">
    <a href="{{ route('admin.fasilitas.index') }}" class="flex items-center gap-2 text-gray-400 hover:text-gray-600 mb-6 transition text-xs font-bold uppercase tracking-widest">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>

    {{-- Pesan Error Global --}}
    @if ($errors->any())
        <div class="mb-6 p-4 rounded-2xl bg-red-50 border border-red-100">
            <p class="text-xs font-bold text-red-800 uppercase mb-2 italic">Terjadi Kesalahan:</p>
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li class="text-xs text-red-600 font-medium">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.fasilitas.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        
        <div>
            <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Kategori</label>
            <select name="category" id="category-select" required class="w-full bg-gray-50 border border-gray-200 rounded-2xl px-4 py-3 text-sm focus:ring-2 focus:ring-purple-500 outline-none">
                <option value="kamar" {{ old('category') == 'kamar' ? 'selected' : '' }}>Tipe Kamar</option>
                <option value="bersama" {{ old('category') == 'bersama' ? 'selected' : '' }}>Fasilitas Umum</option>
                <option value="parkir" {{ old('category') == 'parkir' ? 'selected' : '' }}>Area Parkir</option>
            </select>
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Nama</label>
            <input type="text" name="name" value="{{ old('name') }}" maxlength="25" required placeholder="Contoh: Tipe Premium" 
                   class="w-full bg-gray-50 border @error('name') border-red-400 @else border-gray-200 @enderror rounded-2xl px-4 py-3 text-sm focus:ring-2 focus:ring-purple-500 outline-none transition">
            @error('name') <p class="text-[10px] text-red-500 mt-1 font-bold">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Foto (Nama file akan disingkat otomatis)</label>
            <input type="file" name="image" required class="block w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-purple-50 file:text-purple-700">
            @error('image') <p class="text-[10px] text-red-500 mt-1 font-bold">{{ $message }}</p> @enderror
        </div>

        {{-- SEKSI FASILITAS: Hanya tampil jika kategori Kamar --}}
        <div id="facilities-section">
            <label class="block text-xs font-bold text-gray-500 uppercase mb-3">Fasilitas Kamar</label>
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                @php
                    $list_fasilitas = [
                        'AC' => 'fa-snowflake', 'WiFi' => 'fa-wifi', 'KM Dalam' => 'fa-shower',
                        'TV' => 'fa-tv', 'Kasur' => 'fa-bed', 'Lemari' => 'fa-door-closed'
                    ];
                @endphp

                @foreach($list_fasilitas as $name => $icon)
                <label class="facility-card relative cursor-pointer">
                    <input type="checkbox" name="facilities[]" value="{{ $name }}" 
                           {{ is_array(old('facilities')) && in_array($name, old('facilities')) ? 'checked' : '' }}
                           class="facility-checkbox sr-only peer">
                    <div class="card-content flex items-center p-4 bg-gray-50 border border-gray-200 rounded-2xl peer-checked:bg-purple-50 peer-checked:border-purple-500 transition-all">
                        <i class="fas {{ $icon }} text-gray-400 mr-3 text-lg"></i>
                        <span class="text-sm font-medium text-gray-700">{{ $name }}</span>
                    </div>
                </label>
                @endforeach
            </div>
            @error('facilities') <p class="text-[10px] text-red-500 mt-1 font-bold">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="w-full bg-purple-600 text-white py-4 rounded-2xl font-bold shadow-lg hover:bg-purple-700 active:scale-[0.98] transition">
            Simpan Data
        </button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const categorySelect = document.getElementById('category-select');
        const facilitiesSection = document.getElementById('facilities-section');
        const checkboxes = document.querySelectorAll('.facility-checkbox');

        function toggleDisplay() {
            if (categorySelect.value === 'kamar') {
                facilitiesSection.style.display = 'block';
            } else {
                facilitiesSection.style.display = 'none';
                checkboxes.forEach(cb => cb.checked = false);
            }
        }

        toggleDisplay();
        categorySelect.addEventListener('change', toggleDisplay);
    });
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
@endsection
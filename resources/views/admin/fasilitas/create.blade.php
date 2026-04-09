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
    #facilities-section, #code-section {
        transition: all 0.3s ease-in-out;
    }
</style>

<div class="max-w-2xl bg-white p-8 rounded-3xl border border-gray-100 shadow-sm">
    <form action="{{ route('admin.fasilitas.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Kategori</label>
                <select name="category" id="category-select" required class="w-full bg-gray-50 border border-gray-200 rounded-2xl px-4 py-3 text-sm focus:ring-2 focus:ring-purple-500 outline-none">
                    <option value="kamar">Tipe Kamar</option>
                    <option value="bersama">Tempat Bersama</option>
                    <option value="parkir">Area Parkir</option>
                </select>
            </div>
            
            {{-- SEKSI KODE: Hanya tampil jika kategori Kamar --}}
            <div id="code-section">
                <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Kode (Unique)</label>
                <input type="text" name="code" id="code-input" placeholder="Contoh: K-01" class="w-full bg-gray-50 border border-gray-200 rounded-2xl px-4 py-3 text-sm focus:ring-2 focus:ring-purple-500 outline-none">
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Nama Lokasi / Tipe Kamar</label>
            <input type="text" name="name" required placeholder="Contoh: Tipe Premium / Area Gazebo" class="w-full bg-gray-50 border border-gray-200 rounded-2xl px-4 py-3 text-sm focus:ring-2 focus:ring-purple-500 outline-none">
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Foto</label>
            <input type="file" name="image" required class="block w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-purple-50 file:text-purple-700">
        </div>

        {{-- SEKSI FASILITAS: Hanya tampil jika kategori Kamar --}}
        <div id="facilities-section">
            <label class="block text-xs font-bold text-gray-500 uppercase mb-3">Pilih Fasilitas Kamar (Centang Ikon)</label>
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                @php
                    $list_fasilitas = [
                        'AC' => 'fa-snowflake', 'WiFi' => 'fa-wifi', 'Kamar Mandi' => 'fa-shower',
                        'TV' => 'fa-tv', 'Kasur' => 'fa-bed', 'Lemari' => 'fa-door-closed'
                    ];
                @endphp

                @foreach($list_fasilitas as $name => $icon)
                <label class="facility-card relative cursor-pointer">
                    <input type="checkbox" name="facilities[]" value="{{ $name }}" class="facility-checkbox sr-only peer">
                    <div class="card-content flex items-center p-4 bg-gray-50 border border-gray-200 rounded-2xl peer-checked:bg-purple-50 peer-checked:border-purple-500 transition-all">
                        <i class="fas {{ $icon }} text-gray-400 mr-3 text-lg"></i>
                        <span class="text-sm font-medium text-gray-700">{{ $name }}</span>
                    </div>
                </label>
                @endforeach
            </div>
        </div>

        <button type="submit" class="w-full bg-purple-600 text-white py-4 rounded-2xl font-bold shadow-lg hover:bg-purple-700 transition">
            Simpan Data
        </button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const categorySelect = document.getElementById('category-select');
        const facilitiesSection = document.getElementById('facilities-section');
        const codeSection = document.getElementById('code-section');
        const codeInput = document.getElementById('code-input');
        const checkboxes = document.querySelectorAll('.facility-checkbox');

        function toggleDisplay() {
            if (categorySelect.value === 'kamar') {
                facilitiesSection.style.display = 'block';
                codeSection.style.display = 'block';
                codeInput.setAttribute('required', 'required');
            } else {
                facilitiesSection.style.display = 'none';
                codeSection.style.display = 'none';
                
                // Hapus required dan kosongkan value jika disembunyikan
                codeInput.removeAttribute('required');
                codeInput.value = ''; 
                
                checkboxes.forEach(cb => cb.checked = false);
            }
        }

        toggleDisplay();
        categorySelect.addEventListener('change', toggleDisplay);
    });
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
@endsection
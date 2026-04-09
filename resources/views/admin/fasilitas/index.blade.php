@extends('layouts.admin')

@section('title', 'Manajemen Fasilitas & Kamar')

@section('admin_content')
<div class="flex justify-between items-center mb-8">
    <div>
        <h2 class="text-xl font-bold text-gray-800">Daftar Fasilitas</h2>
        <p class="text-gray-500 text-sm">Kelola tipe kamar, tempat bersama, dan area parkir.</p>
    </div>
    <a href="{{ route('admin.fasilitas.create') }}" class="bg-purple-600 text-white px-6 py-3 rounded-2xl font-bold flex items-center gap-2 hover:bg-purple-700 transition shadow-lg shadow-purple-100">
        <i data-lucide="plus" class="w-5 h-5"></i> Tambah Data Baru
    </a>
</div>

<div class="grid grid-cols-1 gap-6">
    @foreach($rooms as $room)
    <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm flex flex-col md:flex-row gap-6 items-center">
        {{-- Foto dengan fallback jika error --}}
        <img src="{{ asset('storage/' . $room->image) }}" class="w-40 h-28 object-cover rounded-2xl bg-gray-50 border border-gray-100">
        
        <div class="flex-1">
            <div class="flex items-center gap-2 mb-2">
                @php
                    $catColor = $room->category == 'kamar' ? 'bg-blue-100 text-blue-600' : ($room->category == 'bersama' ? 'bg-green-100 text-green-600' : 'bg-orange-100 text-orange-600');
                    
                    // MEMECAH STRING MENJADI ARRAY UNTUK IKON
                    $facilityArray = explode(', ', $room->facilities);

                    // MAPPING IKON (Sama dengan yang ada di Create)
                    $iconMap = [
                        'AC' => 'fa-snowflake',
                        'WiFi' => 'fa-wifi',
                        'Mandi' => 'fa-shower',
                        'TV' => 'fa-tv',
                        'Kasur' => 'fa-bed',
                        'Lemari' => 'fa-door-closed'
                    ];
                @endphp
                <span class="px-2 py-0.5 {{ $catColor }} text-[10px] font-bold rounded uppercase">
                    {{ $room->category }}
                </span>
                
                <span class="px-2 py-0.5 bg-purple-100 text-purple-600 text-[10px] font-bold rounded uppercase">Kode: {{ $room->code }}</span>
            </div>

            <h3 class="font-bold text-gray-800 text-lg mb-2">{{ $room->name }}</h3>
            
            {{-- MENAMPILKAN IKON FASILITAS SECARA OTOMATIS --}}
            <div class="flex flex-wrap gap-3">
                @foreach($facilityArray as $item)
                    @if(isset($iconMap[$item]))
                        <div class="flex items-center gap-1.5 text-gray-500 bg-gray-50 px-2 py-1 rounded-lg border border-gray-100">
                            <i class="fas {{ $iconMap[$item] }} text-[10px] text-purple-500"></i>
                            <span class="text-[11px] font-medium">{{ $item }}</span>
                        </div>
                    @else
                        {{-- Jika ada fasilitas custom yang tidak ada di map --}}
                        <span class="text-[11px] text-gray-400 italic">{{ $item }}</span>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="flex gap-2">
            {{-- Tombol Edit --}}
            <a href="{{ route('admin.fasilitas.edit', $room->id) }}" class="p-3 bg-blue-50 text-blue-600 rounded-xl hover:bg-blue-100 transition">
                <i data-lucide="edit-3" class="w-5 h-5"></i>
            </a>

            <form action="{{ route('admin.fasilitas.destroy', $room->id) }}" method="POST" onsubmit="return confirm('Hapus data ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="p-3 bg-red-50 text-red-600 rounded-xl hover:bg-red-100 transition">
                    <i data-lucide="trash-2" class="w-5 h-5"></i>
                </button>
            </form>
        </div>
    </div>
    @endforeach
</div>

{{-- Pastikan FontAwesome terpanggil di sini jika di layout belum ada --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
@endsection
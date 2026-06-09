@extends('layouts.admin')

@section('title', 'Manajemen Fasilitas & Kamar')

@section('admin_content')
<div class="flex justify-between items-center mb-8">
    <div>
        <h2 class="text-xl font-bold text-gray-800">Daftar Fasilitas</h2>
        <p class="text-gray-500 text-sm">Kelola Aset Properti Berdasarkan Kategori.</p>
    </div>
    <a href="{{ route('admin.fasilitas.create') }}" class="bg-purple-600 text-white px-6 py-3 rounded-2xl font-bold flex items-center gap-2 hover:bg-purple-700 transition shadow-lg shadow-purple-100">
        <i data-lucide="plus" class="w-5 h-5"></i> Tambah Data Baru
    </a>
</div>

{{-- Mapping Ikon Fasilitas --}}
@php
    $iconMap = [
        'AC' => 'fa-snowflake',
        'WiFi' => 'fa-wifi',
        'Mandi' => 'fa-shower',
        'TV' => 'fa-tv',
        'Kasur' => 'fa-bed',
        'Lemari' => 'fa-door-closed'
    ];

    // Mengelompokkan data berdasarkan kategori
    $groupedRooms = $rooms->groupBy('category');
    $categories = [
        'kamar' => ['title' => 'Tipe Kamar', 'color' => 'text-blue-600', 'bg' => 'bg-blue-50'],
        'bersama' => ['title' => 'Fasilitas Umum / Bersama', 'color' => 'text-green-600', 'bg' => 'bg-green-50'],
        'parkir' => ['title' => 'Area Parkir', 'color' => 'text-orange-600', 'bg' => 'bg-orange-50'],
    ];
@endphp

<div class="space-y-12">
    @foreach($categories as $key => $info)
        @if(isset($groupedRooms[$key]))
            <section>
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-2 h-8 rounded-full {{ str_replace('text', 'bg', $info['color']) }}"></div>
                    <h3 class="text-lg font-bold text-gray-800">{{ $info['title'] }}</h3>
                    <span class="px-2.5 py-0.5 rounded-full text-xs font-bold {{ $info['bg'] }} {{ $info['color'] }}">
                        {{ $groupedRooms[$key]->count() }} Item
                    </span>
                </div>

                <div class="grid grid-cols-1 gap-6">
                    @foreach($groupedRooms[$key] as $room)
                        <div class="bg-white p-5 rounded-3xl border border-gray-100 shadow-sm flex flex-col md:flex-row gap-6 items-center hover:border-purple-200 transition-colors">
                            {{-- Foto --}}
                            <img src="{{ asset('storage/' . $room->image) }}" class="w-40 h-28 object-cover rounded-2xl bg-gray-50 border border-gray-100">
                            
                            <div class="flex-1 w-full">
                                <h3 class="font-bold text-gray-800 text-lg mb-2">{{ $room->name }}</h3>
                                
                                {{-- Menampilkan Fasilitas jika ada --}}
                                <div class="flex flex-wrap gap-2">
                                    @php
                                        $facilityArray = array_filter(explode(', ', $room->facilities));
                                    @endphp
                                    
                                    @forelse($facilityArray as $item)
                                        @if($item !== '-')
                                            <div class="flex items-center gap-1.5 text-gray-500 bg-gray-50 px-2.5 py-1 rounded-lg border border-gray-100">
                                                @if(isset($iconMap[$item]))
                                                    <i class="fas {{ $iconMap[$item] }} text-[10px] text-purple-500"></i>
                                                @endif
                                                <span class="text-[11px] font-medium">{{ $item == 'Mandi' ? 'KM Dalam' : $item }}</span>
                                            </div>
                                        @endif
                                    @empty
                                        <span class="text-xs text-gray-400 italic">Tidak ada detail fasilitas khusus.</span>
                                    @endforelse
                                </div>
                            </div>

                            {{-- Aksi --}}
                            <div class="flex gap-2 shrink-0">
                                <a href="{{ route('admin.fasilitas.edit', $room->id) }}" class="p-3 bg-blue-50 text-blue-600 rounded-xl hover:bg-blue-100 transition" title="Edit">
                                    <i data-lucide="edit-3" class="w-5 h-5"></i>
                                </a>

                                <form action="{{ route('admin.fasilitas.destroy', $room->id) }}" method="POST" onsubmit="return confirm('Hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-3 bg-red-50 text-red-600 rounded-xl hover:bg-red-100 transition" title="Hapus">
                                        <i data-lucide="trash-2" class="w-5 h-5"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif
    @endforeach
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
@endsection
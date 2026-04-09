@extends('layouts.app')

@section('content')

{{-- FontAwesome --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

{{-- Header --}}
<section class="bg-linear-to-r from-purple-700 to-purple-500 text-white text-center py-20 px-6">
    <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight">Fasilitas Kost</h1>
    <div class="w-20 h-1.5 bg-white/30 mx-auto mt-4 rounded-full"></div>
    <p class="text-sm md:text-lg mt-4 max-w-2xl mx-auto text-purple-100">
        Nikmati standar hunian modern dengan fasilitas lengkap yang dirancang khusus untuk kenyamanan dan produktivitas Anda.
    </p>
</section>

<section class="px-6 md:px-20 py-16 max-w-7xl mx-auto">
    <h2 class="text-3xl font-bold text-center mb-16 text-gray-800 relative">
        Pilihan Tipe Kamar
        <span class="block text-sm font-normal text-purple-600 mt-2 italic uppercase tracking-widest">Temukan yang sesuai kebutuhanmu</span>
    </h2>

    {{-- FILTER HANYA KATEGORI KAMAR --}}
    @foreach($roomTypes->where('category', 'kamar') as $room)
    <div class="grid md:grid-cols-2 gap-0 md:gap-12 mb-20 overflow-hidden rounded-4xl bg-white shadow-xl shadow-gray-100 border border-gray-100">
        <div class="h-80 md:h-auto {{ $loop->even ? 'md:order-2' : '' }} overflow-hidden">
            <img src="{{ asset('storage/' . $room->image) }}" class="w-full h-full object-cover transform hover:scale-105 transition duration-700" alt="{{ $room->name }}"/>
        </div>

        <div class="p-10 md:p-16 flex flex-col justify-center {{ $loop->even ? 'md:order-1' : '' }}">
            <div class="flex items-center gap-3 mb-4">
                <span class="bg-purple-600 px-3 py-1 rounded-full text-[10px] text-white font-bold uppercase tracking-tighter">Kamar</span>
                {{-- KODE HANYA UNTUK KAMAR --}}
                <span class="text-gray-400 font-mono text-xs uppercase tracking-widest">#{{ $room->code }}</span>
            </div>
            <h3 class="font-bold text-3xl mb-8 text-gray-800">{{ $room->name }}</h3>
            
            {{-- LIST IKON DINAMIS --}}
            <div class="grid grid-cols-2 gap-y-6 gap-x-4">
                @php
                    $listFasilitas = explode(', ', $room->facilities);
                    $iconMap = [
                        'AC' => 'fa-snowflake',
                        'WiFi' => 'fa-wifi',
                        'Mandi' => 'fa-shower',
                        'TV' => 'fa-tv',
                        'Kasur' => 'fa-bed',
                        'Lemari' => 'fa-door-closed',
                    ];
                @endphp

                @foreach($listFasilitas as $f)
                    @if(isset($iconMap[$f]))
                    <div class="flex items-center gap-3 group">
                        <div class="w-10 h-10 flex items-center justify-center bg-purple-50 rounded-xl group-hover:bg-purple-600 transition duration-300">
                            <i class="fas {{ $iconMap[$f] }} text-purple-600 group-hover:text-white transition duration-300"></i>
                        </div>
                        <span class="text-sm font-semibold text-gray-600 group-hover:text-purple-700">{{ $f }}</span>
                    </div>
                    @endif
                @endforeach
            </div>

            <div class="mt-10">
                <a href="https://wa.me/628xxx" class="inline-block bg-purple-600 text-white px-8 py-3 rounded-2xl font-bold shadow-lg shadow-purple-200 hover:bg-purple-700 hover:-translate-y-1 transition duration-300">
                    Tanya Ketersediaan
                </a>
            </div>
        </div>
    </div>
    @endforeach
</section>

{{-- BAGIAN TEMPAT BERSAMA --}}
<section class="px-6 md:px-20 py-20 bg-gray-50/50">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl font-bold text-center mb-4 text-gray-800">Tempat Bersama</h2>
        <p class="text-center text-gray-500 mb-12">Area terbuka untuk bersosialisasi dan bersantai</p>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($roomTypes->where('category', 'bersama') as $item)
                <div class="group relative overflow-hidden rounded-3xl shadow-sm bg-white">
                    <img src="{{ asset('storage/' . $item->image) }}" class="w-full h-72 object-cover group-hover:scale-110 transition duration-700" />
                    {{-- OVERLAY GRADIENT --}}
                    <div class="absolute inset-0 bg-linear-to-t from-black/80 via-transparent to-transparent opacity-80"></div>
                    {{-- HANYA NAMA --}}
                    <div class="absolute bottom-6 left-6 text-white">
                        <p class="text-[10px] uppercase tracking-widest text-purple-300 font-bold mb-1">Fasilitas Umum</p>
                        <h4 class="text-xl font-bold">{{ $item->name }}</h4>
                    </div>
                </div>
            @empty
                <p class="col-span-full text-center text-gray-400 italic py-10">Data belum tersedia.</p>
            @endforelse
        </div>
    </div>
</section>

{{-- BAGIAN PARKIR --}}
<section class="px-6 md:px-20 py-24">
    <div class="max-w-5xl mx-auto text-center">
        <h2 class="text-3xl font-bold mb-4 text-gray-800">Area Parkir</h2>
        <p class="text-gray-500 mb-10 italic">"Keamanan kendaraan Anda adalah prioritas kami."</p>
        
        @foreach($roomTypes->where('category', 'parkir') as $parkir)
            <div class="relative group mb-10">
                <img src="{{ asset('storage/' . $parkir->image) }}" class="rounded-[2.5rem] shadow-2xl w-full h-80 md:h-125 object-cover border-4 border-white"/>
                {{-- BADGE NAMA DI TENGAH BAWAH --}}
                <div class="absolute -bottom-6 left-1/2 -translate-x-1/2 bg-white px-10 py-4 rounded-2xl shadow-xl border border-gray-50">
                    <span class="text-purple-600 font-bold uppercase tracking-widest text-sm">
                        <i class="fas fa-parking mr-2"></i> {{ $parkir->name }}
                    </span>
                </div>
            </div>
        @endforeach
    </div>
</section>

@endsection
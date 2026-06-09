@extends('layouts.app')

@section('content')

{{-- FontAwesome --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

{{-- Header: Dengan Fallback Gradient --}}
<section 
    class="bg-purple-700 bg-linear-to-r from-purple-700 to-purple-500 text-white text-center py-20 px-6 shadow-inner relative"
    style="background: #7e22ce; background: -webkit-linear-gradient(to right, #7e22ce, #a855f7); background: linear-gradient(to right, #7e22ce, #a855f7);">
    
    <div class="relative z-10">
        <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight">Fasilitas Kost</h1>
        <div class="w-20 h-1.5 bg-white/30 mx-auto mt-4 rounded-full"></div>
        <p class="text-sm md:text-lg mt-4 max-w-2xl mx-auto text-purple-100">
            Nikmati standar hunian modern dengan fasilitas lengkap yang dirancang khusus untuk kenyamanan dan produktivitas Anda.
        </p>
    </div>
</section>

{{-- SEKSI PILIHAN TIPE KAMAR --}}
<section class="px-6 md:px-20 py-16 max-w-7xl mx-auto">
    <h2 class="text-3xl font-bold text-center mb-16 text-gray-800 relative">
        Pilihan Tipe Kamar
        <span class="block text-sm font-normal text-purple-600 mt-2 italic uppercase tracking-widest">Temukan yang sesuai kebutuhanmu</span>
    </h2>

    @foreach($roomTypes->where('category', 'kamar') as $room)
    <div class="grid md:grid-cols-2 gap-0 md:gap-12 mb-20 overflow-hidden rounded-[2.5rem] bg-white shadow-xl shadow-gray-100 border border-gray-100">
        {{-- Gambar Kamar (Klik untuk memperbesar) --}}
        <div class="h-80 md:h-auto {{ $loop->even ? 'md:order-2' : '' }} overflow-hidden cursor-zoom-in"
             onclick="openFullImage('{{ asset('storage/' . $room->image) }}', '{{ $room->name }}')">
            <img src="{{ asset('storage/' . $room->image) }}" class="w-full h-full object-cover transform hover:scale-105 transition duration-700" alt="{{ $room->name }}"/>
        </div>

        <div class="p-10 md:p-16 flex flex-col justify-center {{ $loop->even ? 'md:order-1' : '' }}">
            <div class="flex items-center gap-3 mb-4">
                <span class="bg-purple-600 px-3 py-1 rounded-full text-[10px] text-white font-bold uppercase tracking-tighter">Kamar Utama</span>
            </div>
            <h3 class="font-bold text-3xl mb-8 text-gray-800">{{ $room->name }}</h3>
            
            <div class="grid grid-cols-2 gap-y-6 gap-x-4">
                @php
                    $listFasilitas = explode(', ', $room->facilities);
                    $iconMap = [
                        'AC' => 'fa-snowflake',
                        'WiFi' => 'fa-wifi',
                        'Kamar Mandi' => 'fa-shower',
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
                <a href="https://wa.me/6285941057465" class="inline-block bg-purple-600 text-white px-8 py-4 rounded-2xl font-bold shadow-lg shadow-purple-200 hover:bg-purple-700 hover:-translate-y-1 transition duration-300">
                    <i class="fab fa-whatsapp mr-2"></i> Tanya Ketersediaan
                </a>
            </div>
        </div>
    </div>
    @endforeach
</section>

{{-- SEKSI FASILITAS UMUM --}}
<section class="px-6 md:px-20 py-20 bg-gray-50/50">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl font-bold text-center mb-2 text-gray-800">Fasilitas Umum</h2>
        <p class="text-center text-gray-500 mb-12">Area terbuka untuk bersosialisasi dan bersantai</p>
        
        <div class="flex flex-wrap justify-center gap-8">
            @forelse($roomTypes->where('category', 'bersama') as $item)
                <div class="group relative overflow-hidden rounded-4x1 shadow-md bg-white w-full md:w-[calc(50%-1rem)] lg:w-[calc(33.333%-1.5rem)] border border-gray-100 cursor-zoom-in"
                     onclick="openFullImage('{{ asset('storage/' . $item->image) }}', '{{ $item->name }}')">
                    <div class="aspect-video md:aspect-square lg:aspect-4/3 overflow-hidden">
                        <img src="{{ asset('storage/' . $item->image) }}" 
                             class="w-full h-full object-cover group-hover:scale-110 transition duration-700" 
                             alt="{{ $item->name }}" />
                    </div>
                    
                    <div class="absolute inset-0 bg-linear-to-t from-black/90 via-transparent to-transparent opacity-90"></div>
                    <div class="absolute bottom-6 left-6 text-white">
                        <p class="text-[10px] uppercase tracking-widest text-purple-300 font-bold mb-1">Area Bersama</p>
                        <h4 class="text-xl font-bold">{{ $item->name }}</h4>
                        <div class="w-8 h-1 bg-purple-500 mt-2 rounded-full transform origin-left group-hover:scale-x-150 transition duration-500"></div>
                    </div>
                </div>
            @empty
                <div class="w-full text-center py-10 text-gray-400 italic">Data fasilitas umum belum tersedia.</div>
            @endforelse
        </div>
    </div>
</section>

{{-- SEKSI AREA PARKIR --}}
<section class="px-6 md:px-20 py-24 bg-white">
    <div class="max-w-5xl mx-auto text-center">
        <h2 class="text-3xl font-bold mb-4 text-gray-800">Area Parkir</h2>
        <p class="text-gray-500 mb-12 italic">"Keamanan kendaraan Anda adalah prioritas kami."</p>
        
        @foreach($roomTypes->where('category', 'parkir') as $parkir)
            <div class="relative group mb-10 px-2 cursor-zoom-in"
                 onclick="openFullImage('{{ asset('storage/' . $parkir->image) }}', '{{ $parkir->name }}')">
                <img src="{{ asset('storage/' . $parkir->image) }}" class="rounded-[2.5rem] shadow-2xl w-full h-72 md:h-120 object-cover border-4 border-gray-50 transition-transform duration-700 group-hover:scale-[1.02]"/>
                <div class="absolute -bottom-6 left-1/2 -translate-x-1/2 bg-white px-10 py-5 rounded-2xl shadow-xl border border-gray-100 flex items-center gap-3">
                    <div class="w-8 h-8 bg-purple-600 rounded-full flex items-center justify-center shadow-lg">
                        <i class="fas fa-parking text-white text-xs"></i>
                    </div>
                    <span class="text-purple-600 font-bold uppercase tracking-widest text-sm italic">
                        {{ $parkir->name }}
                    </span>
                </div>
            </div>
        @endforeach
    </div>
</section>

{{-- MODAL FULLSCREEN --}}
<div id="imageModal" class="fixed inset-0 z-999 hidden items-center justify-center bg-black/95 backdrop-blur-sm p-4 transition-all duration-300">
    <button onclick="closeFullImage()" class="absolute top-6 right-6 text-white text-4xl font-light hover:text-purple-400 transition z-1000">&times;</button>
    <div class="max-w-5xl w-full flex flex-col items-center">
        <img id="fullImage" src="" alt="Fullscreen" class="max-w-full max-h-[85vh] rounded-xl shadow-2xl object-contain transform scale-95 transition-transform duration-300">
        <p id="imageCaption" class="text-white mt-6 text-center text-lg font-medium tracking-wide"></p>
        <div class="w-12 h-1 bg-purple-600 mt-2 rounded-full"></div>
    </div>
</div>

{{-- Script Lightbox --}}
<script>
    function openFullImage(src, caption) {
        const modal = document.getElementById('imageModal');
        const modalImg = document.getElementById('fullImage');
        const modalCaption = document.getElementById('imageCaption');

        modalImg.src = src;
        modalCaption.innerText = caption;
        
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';

        setTimeout(() => {
            modalImg.classList.remove('scale-95');
            modalImg.classList.add('scale-100');
        }, 10);
    }

    function closeFullImage() {
        const modal = document.getElementById('imageModal');
        const modalImg = document.getElementById('fullImage');

        modalImg.classList.add('scale-95');
        modalImg.classList.remove('scale-100');

        setTimeout(() => {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }, 200);
    }

    document.getElementById('imageModal').onclick = function(e) {
        if (e.target === this) closeFullImage();
    };

    document.addEventListener('keydown', function(e) {
        if (e.key === "Escape") closeFullImage();
    });
</script>

@endsection
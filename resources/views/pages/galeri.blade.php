@extends('layouts.app')

@section('content')

{{-- Header: Dengan Fallback Gradient --}}
<section 
    class="bg-purple-700 bg-linear-to-r from-purple-600 to-purple-800 text-white text-center py-16 px-6 shadow-inner relative"
    style="background: #7e22ce; background: -webkit-linear-gradient(to right, #9333ea, #6b21a8); background: linear-gradient(to right, #9333ea, #6b21a8);">
    
    <div class="relative z-10">
        <h1 class="text-3xl md:text-5xl font-bold mb-3 tracking-tight">Galeri Foto</h1>
        <p class="text-sm md:text-lg opacity-90 max-w-2xl mx-auto leading-relaxed">
            Jelajahi setiap sudut kenyamanan yang ditawarkan oleh
            <span class="text-purple-200 font-semibold underline decoration-purple-400/30">Griya Kost Kencana Ungu</span>.
        </p>
    </div>
</section>

{{-- Grid Galeri --}}
<section class="max-w-7xl mx-auto px-4 md:px-10 py-12">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        @forelse($galleries as $gallery)
            <div class="group relative rounded-4x1 overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 bg-white border border-gray-100 cursor-pointer"
                 onclick="openFullImage('{{ asset('storage/' . $gallery->image) }}', '{{ $gallery->caption }}')">
                
                {{-- Image Container --}}
                <div class="aspect-4/3 md:aspect-square overflow-hidden">
                    <img src="{{ asset('storage/' . $gallery->image) }}" 
                         class="w-full h-full object-cover group-hover:scale-110 transition duration-700" 
                         alt="{{ $gallery->caption }}" />
                </div>
                
                {{-- Overlay Caption --}}
                <div class="absolute inset-0 bg-lineart-to-t from-black/90 via-black/20 to-transparent 
                            opacity-100 md:opacity-0 md:group-hover:opacity-100 transition-opacity duration-300 
                            flex items-end p-6">
                    <div class="transform translate-y-0 md:translate-y-4 md:group-hover:translate-y-0 transition-transform duration-500">
                        <p class="text-white text-sm md:text-base font-semibold leading-snug">
                            {{ $gallery->caption }}
                        </p>
                        <div class="w-10 h-1 bg-purple-500 mt-2 rounded-full shadow-[0_0_8px_rgba(168,85,247,0.6)]"></div>
                        <p class="text-[10px] text-purple-300 mt-2 uppercase tracking-widest font-bold md:hidden">Klik untuk memperbesar</p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-24">
                <i class="fas fa-image text-purple-200 text-5xl mb-4"></i>
                <p class="text-gray-400 italic text-lg">Belum ada foto yang tersedia.</p>
            </div>
        @endforelse

    </div>
</section>

{{-- MODAL FULLSCREEN (Hidden by default) --}}
<div id="imageModal" class="fixed inset-0 z-999 hidden items-center justify-center bg-black/95 backdrop-blur-sm p-4 transition-all duration-300">
    {{-- Tombol Close --}}
    <button onclick="closeFullImage()" class="absolute top-6 right-6 text-white text-4xl font-light hover:text-purple-400 transition z-1000">&times;</button>
    
    <div class="max-w-5xl w-full flex flex-col items-center">
        <img id="fullImage" src="" alt="Fullscreen" class="max-w-full max-h-[85vh] rounded-xl shadow-2xl object-contain transform scale-95 transition-transform duration-300">
        <p id="imageCaption" class="text-white mt-6 text-center text-lg font-medium tracking-wide"></p>
        <div class="w-12 h-1 bg-purple-600 mt-2 rounded-full"></div>
    </div>
</div>

{{-- SCRIPT UNTUK MODAL --}}
<script>
    function openFullImage(src, caption) {
        const modal = document.getElementById('imageModal');
        const modalImg = document.getElementById('fullImage');
        const modalCaption = document.getElementById('imageCaption');

        modalImg.src = src;
        modalCaption.innerText = caption;
        
        // Tampilkan modal
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden'; // Stop scroll halaman belakang

        // Animasi Zoom In
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
            document.body.style.overflow = 'auto'; // Aktifkan scroll lagi
        }, 200);
    }

    // Close modal jika user klik di area hitam (luar gambar)
    document.getElementById('imageModal').onclick = function(e) {
        if (e.target === this) closeFullImage();
    };

    // Close dengan tombol ESC
    document.addEventListener('keydown', function(e) {
        if (e.key === "Escape") closeFullImage();
    });
</script>

@endsection
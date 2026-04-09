@extends('layouts.app')

@section('content')

<section class="bg-linear-to-r from-purple-600 to-purple-800 text-white text-center py-16 px-6">
  <h1 class="text-3xl md:text-5xl font-bold mb-3 tracking-tight">Galeri Foto</h1>
  <p class="text-sm md:text-lg opacity-90 max-w-2xl mx-auto leading-relaxed">
    Jelajahi setiap sudut kenyamanan yang ditawarkan oleh <span class="font-semibold text-purple-200">Griya Kost Kencana Ungu</span>.
  </p>
</section>

<section class="max-w-7xl mx-auto px-4 md:px-10 py-12">
  <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-3 md:gap-6">

    @forelse($galleries as $gallery)
      <div class="group relative rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500">
        {{-- Mengambil file dari folder storage --}}
        <img src="{{ asset('storage/' . $gallery->image) }}" 
             class="w-full h-48 md:h-80 object-cover group-hover:scale-110 transition duration-700" 
             alt="{{ $gallery->caption }}" />
        
        <div class="absolute inset-0 bg-linear-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
          <p class="text-white text-xs md:text-sm font-medium">{{ $gallery->caption }}</p>
        </div>
      </div>
    @empty
      <div class="col-span-full text-center py-20">
        <p class="text-gray-400 italic">Belum ada foto yang tersedia saat ini.</p>
      </div>
    @endforelse

  </div>
</section>

@endsection
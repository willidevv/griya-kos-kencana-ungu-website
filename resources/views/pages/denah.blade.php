@extends('layouts.app')

@section('content')

<section class="bg-linear-to-r from-purple-600 to-purple-800 text-white text-center py-16 px-6">
  <h1 class="text-3xl md:text-5xl font-bold mb-3 tracking-tight">Denah & Tata Letak</h1>
  <p class="text-sm md:text-lg opacity-90 max-w-2xl mx-auto leading-relaxed">
    Visualisasi tata letak kamar dan fasilitas untuk memudahkan Anda membayangkan suasana <span class="text-purple-200">Griya Kost Kencana Ungu</span>.
  </p>
</section>

<section class="max-w-5xl mx-auto px-6 py-12">

  <div class="mb-16">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl md:text-2xl font-bold text-gray-800">Denah Lantai 1</h2>
        <span class="text-[10px] md:text-xs font-semibold bg-purple-100 text-purple-600 px-3 py-1 rounded-full uppercase tracking-widest">Lantai Dasar</span>
    </div>
    
    <div class="bg-white p-2 md:p-6 rounded-3xl shadow-sm border border-gray-100 overflow-hidden group">
      <div class="relative overflow-x-auto">
        <img
          src="{{ asset('images/denahkos1.png') }}"
          alt="Denah Lantai 1"
          class="w-full min-w-75 h-auto rounded-2xl object-contain transition duration-500 group-hover:scale-[1.02]"
        />
        
        <div class="flex md:hidden items-center justify-center gap-2 mt-4 text-gray-400 text-xs italic">
            <i data-lucide="zoom-in" class="w-4 h-4"></i>
            Sentuh gambar untuk memperbesar
        </div>
      </div>
    </div>
    
    <p class="mt-4 text-sm text-gray-500 text-center md:text-left">
      Area Lantai 1 mencakup: Parkir, Lobby, dan Kamar Tipe C.
    </p>
  </div>

  <div>
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl md:text-2xl font-bold text-gray-800">Denah Lantai 2</h2>
        <span class="text-[10px] md:text-xs font-semibold bg-purple-100 text-purple-600 px-3 py-1 rounded-full uppercase tracking-widest">Lantai Atas</span>
    </div>

    <div class="bg-white p-2 md:p-6 rounded-3xl shadow-sm border border-gray-100 overflow-hidden group">
      <div class="relative overflow-x-auto">
        <img
          src="{{ asset('images/denahkos2.png') }}"
          alt="Denah Lantai 2"
          class="w-full min-w-75 h-auto rounded-2xl object-contain transition duration-500 group-hover:scale-[1.02]"
        />

        <div class="flex md:hidden items-center justify-center gap-2 mt-4 text-gray-400 text-xs italic">
            <i data-lucide="zoom-in" class="w-4 h-4"></i>
            Sentuh gambar untuk memperbesar
        </div>
      </div>
    </div>

    <p class="mt-4 text-sm text-gray-500 text-center md:text-left">
      Area Lantai 2 mencakup: Kamar Tipe A, Kamar Tipe B, dan Area Santai.
    </p>
  </div>

</section>

<section class="bg-gray-50 py-12 px-6">
    <div class="max-w-4xl mx-auto bg-purple-700 rounded-3xl p-8 text-white flex flex-col md:flex-row items-center gap-6 justify-between">
        <div>
            <h3 class="text-xl font-bold mb-2">Ingin melihat langsung?</h3>
            <p class="opacity-80 text-sm">Jadwalkan kunjungan untuk melihat kamar yang tersedia.</p>
        </div>
        <a href="{{ url('/kontak') }}" class="bg-white text-purple-700 px-6 py-3 rounded-xl font-bold text-sm hover:bg-purple-50 transition shadow-lg">
            Hubungi Pengelola
        </a>
    </div>
</section>

@endsection
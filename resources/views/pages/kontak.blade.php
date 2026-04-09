@extends('layouts.app')

@section('content')

<section class="bg-linear-to-r from-purple-600 to-purple-800 text-white text-center py-16 px-6">
  <h1 class="text-3xl md:text-5xl font-bold mb-3 tracking-tight">Hubungi Kami</h1>
  <p class="text-sm md:text-lg opacity-90 max-w-xl mx-auto">
    Punya pertanyaan atau ingin survei lokasi? Kami siap membantu Anda kapan saja.
  </p>
</section>

<section class="max-w-5xl mx-auto px-6 py-12">
  <div class="grid md:grid-cols-2 gap-8 items-start">
    
    <div class="space-y-6 order-2 md:order-1">
      
      <div class="group bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center gap-5 hover:shadow-md transition duration-300">
        <div class="w-14 h-14 flex items-center justify-center rounded-2xl bg-purple-100 text-purple-600 group-hover:bg-purple-600 group-hover:text-white transition duration-300">
          <i data-lucide="map-pin" class="w-6 h-6"></i>
        </div>
        <div>
          <h2 class="font-bold text-gray-800">Alamat Kami</h2>
          <p class="text-gray-500 text-sm leading-relaxed">
            Jl. Apel Manis No.01, Kec. Taman, <br class="hidden md:block" /> Kota Madiun, Jawa Timur
          </p>
        </div>
      </div>

      <a href="tel:+62{{ $contact->phone ?? '85941057465' }}" class="group bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center gap-5 hover:shadow-md transition duration-300">
        <div class="w-14 h-14 flex items-center justify-center rounded-2xl bg-purple-100 text-purple-600 group-hover:bg-purple-600 group-hover:text-white transition duration-300">
          <i data-lucide="phone" class="w-6 h-6"></i>
        </div>
        <div>
          <h2 class="font-bold text-gray-800">Telepon / WhatsApp</h2>
          <p class="text-purple-600 font-semibold text-sm">
            +62 {{ $contact->phone ?? '859-4105-7465' }}
          </p>
          <p class="text-[10px] text-gray-400 uppercase tracking-wider mt-1">Klik untuk menghubungi</p>
        </div>
      </a>

      <a href="https://wa.me/62{{ $contact->phone ?? '85941057465' }}" target="_blank" class="flex items-center justify-center gap-3 bg-green-500 text-white w-full py-4 rounded-2xl font-bold shadow-lg shadow-green-200 hover:bg-green-600 transition">
        <i data-lucide="message-circle" class="w-5 h-5"></i>
        WhatsApp Fast Response
      </a>

    </div>

    <div class="order-1 md:order-2">
      <div class="bg-white p-2 rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
        <iframe
          src="{{ $contact->maps_iframe ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.5159353922756!2d111.5348888!3d-7.6275133!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79be9635e98511%3A0xb3cf51a14c676d21!2sGriya%20Kost%20Kencana%20Ungu!5e0!3m2!1sid!2sid!4v1712580000000!5m2!1sid!2sid' }}"
          class="w-full h-72 md:h-105 rounded-2xl border-0"
          allowfullscreen="" 
          loading="lazy"
        ></iframe>
      </div>
      <p class="text-center md:text-right mt-3 text-xs text-gray-400 italic">
        *Klik peta untuk mendapatkan navigasi Google Maps
      </p>
    </div>

  </div>
</section>

@endsection
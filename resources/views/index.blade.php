@extends('layouts.app')

@section('content')

<section class="relative h-[80vh] md:min-h-[95vh] overflow-hidden">
  <img
    src="{{ asset('images/kos.jpeg') }}"
    class="absolute inset-0 w-full h-full object-cover object-center"
    alt="Hero Kencana Ungu"
  />

  <div class="absolute inset-0 bg-black/70 flex flex-col justify-center items-center text-center text-white px-6">
    
    <h1 class="text-3xl md:text-5xl font-bold leading-tight">
      Kenyamanan Tanpa <br class="hidden md:block" />
      Kompromi di <span class="text-purple-400">Kencana Ungu</span>
    </h1>

    <p class="mt-4 max-w-xl text-sm md:text-base text-gray-300 leading-relaxed">
      Temukan hunian kos ideal dengan fasilitas setara hotel, keamanan 24 jam, 
      dan lingkungan asri di lokasi paling strategis.
    </p>

    <div class="mt-8 flex flex-col sm:flex-row gap-4 w-full sm:w-auto">
      <a
        href="{{ url('/fasilitas') }}"
        class="bg-purple-600 px-8 py-3 rounded-full text-sm font-semibold shadow-lg hover:bg-purple-700 transition text-center"
      >
        Lihat Fasilitas
      </a>

      <a
        href="{{ url('/kontak') }}"
        class="bg-white/10 backdrop-blur-sm border border-white/20 px-8 py-3 rounded-full text-sm font-semibold hover:bg-white/20 transition text-center"
      >
        Hubungi Kami
      </a>
    </div>

  </div>
</section>

<section class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8 px-6 md:px-10 py-16 bg-gray-50">

  <div class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 p-8 flex flex-col items-center text-center">
    <div class="w-16 h-16 mb-6 flex items-center justify-center rounded-2xl bg-purple-100 text-purple-600 transform -rotate-3">
      <i data-lucide="map-pin" class="w-8 h-8"></i>
    </div>
    <h3 class="text-base font-bold tracking-wider mb-3 text-gray-800">
      LOKASI STRATEGIS
    </h3>
    <p class="text-sm text-gray-500 leading-relaxed">
      Berada di pusat kota, dekat dengan area perkantoran, kampus, dan pusat perbelanjaan.
    </p>
  </div>

  <div class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 p-8 flex flex-col items-center text-center">
    <div class="w-16 h-16 mb-6 flex items-center justify-center rounded-2xl bg-purple-100 text-purple-600 transform rotate-3">
      <i data-lucide="shield" class="w-8 h-8"></i>
    </div>
    <h3 class="text-base font-bold tracking-wider mb-3 text-gray-800">
      KEAMANAN TERJAMIN
    </h3>
    <p class="text-sm text-gray-500 leading-relaxed">
      Sistem keamanan 24 jam penuh dengan pengawasan CCTV di setiap sudut area.
    </p>
  </div>

  <div class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 p-8 flex flex-col items-center text-center">
    <div class="w-16 h-16 mb-6 flex items-center justify-center rounded-2xl bg-purple-100 text-purple-600 transform -rotate-3">
      <i data-lucide="wifi" class="w-8 h-8"></i>
    </div>
    <h3 class="text-base font-bold tracking-wider mb-3 text-gray-800">
      FASILITAS LENGKAP
    </h3>
    <p class="text-sm text-gray-500 leading-relaxed">
      Kamar full furnished, WiFi cepat, AC, dan kamar mandi dalam untuk privasi Anda.
    </p>
  </div>

</section>

<section class="grid md:grid-cols-2 gap-12 px-6 md:px-20 py-16 items-center">
  
  <div class="order-1 md:order-1">
    <img
      src="{{ asset('images/griyakos.jpeg') }}"
      class="rounded-2xl shadow-2xl w-full object-cover h-64 md:h-auto"
      alt="Tentang Kami"
    />
  </div>

  <div class="order-2 md:order-2">
    <h2 class="text-2xl md:text-3xl font-bold mb-5 text-gray-800 leading-tight">
      Lebih Dari Sekadar <br class="hidden md:block" /> Tempat Singgah
    </h2>

    <p class="text-base text-gray-600 mb-6 leading-relaxed">
      Griya Kost Kencana Ungu didirikan dengan visi menyediakan ruang hidup berkualitas 
      bagi profesional muda dan mahasiswa. Kami menawarkan pengalaman tinggal yang nyaman, 
      aman, dan modern.
    </p>

    <ul class="space-y-4 text-sm md:text-base text-gray-700">
      <li class="flex gap-3 items-start">
        <span class="bg-purple-100 p-1 rounded-full">
            <i data-lucide="check-circle" class="text-purple-600 w-5 h-5"></i>
        </span>
        <span>Lingkungan yang asri, tenang, dan jauh dari kebisingan.</span>
      </li>

      <li class="flex gap-3 items-start">
        <span class="bg-purple-100 p-1 rounded-full">
            <i data-lucide="check-circle" class="text-purple-600 w-5 h-5"></i>
        </span>
        <span>Kebersihan area umum yang selalu terjaga setiap hari.</span>
      </li>

      <li class="flex gap-3 items-start">
        <span class="bg-purple-100 p-1 rounded-full">
            <i data-lucide="check-circle" class="text-purple-600 w-5 h-5"></i>
        </span>
        <span>Komunitas penghuni yang suportif dan lingkungan profesional.</span>
      </li>
    </ul>
  </div>

</section>

@endsection
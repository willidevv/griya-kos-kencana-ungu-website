@extends('layouts.app')

@section('content')

<section class="bg-linear-to-r from-purple-700 to-purple-400 text-white text-center py-16 px-6">
  <h1 class="text-3xl md:text-4xl font-bold">Profil Griya Kost</h1>
  <p class="text-sm md:text-base mt-3 max-w-2xl mx-auto opacity-90">
    Mengenal lebih dekat dedikasi kami dalam menghadirkan hunian yang nyaman,
    modern, dan aman bagi produktivitas Anda.
  </p>
</section>

<section class="px-6 md:px-10 py-12">
  <div class="bg-white p-6 md:p-10 rounded-3xl shadow-sm border border-gray-100 flex flex-col md:flex-row gap-8 items-center">

    <div class="flex-1 order-1 md:order-2 w-full">
      <img src="{{ asset('images/griyakos.jpeg') }}" class="rounded-2xl shadow-lg w-full h-64 md:h-auto object-cover"/>
    </div>

    <div class="flex-1 flex flex-col justify-center order-2 md:order-1">
      <h2 class="font-bold text-2xl mb-4 text-gray-800">Sejarah & Filosofi</h2>
      <p class="text-base text-gray-600 leading-relaxed text-justify md:text-left">
        Griya Kost Kencana Ungu memulai perjalanan dari kesadaran akan tingginya kebutuhan
        akan hunian yang layak di tengah padatnya aktivitas kota. Kami percaya bahwa tempat tinggal 
        bukan sekadar atap untuk berteduh, melainkan fondasi untuk memulai hari yang produktif.
      </p>
    </div>

  </div>
</section>

<section class="grid grid-cols-1 md:grid-cols-2 gap-6 px-6 md:px-10 py-8">

  <div class="bg-purple-50 rounded-3xl shadow-sm border border-purple-100 w-full p-8 md:p-10 flex flex-col justify-center items-center text-center">
    <div class="bg-purple-600 text-white px-4 py-1 rounded-full text-xs font-bold mb-4">VISI</div>
    <h3 class="font-bold text-xl mb-4 text-purple-900">Pilihan Utama Hunian</h3>
    <p class="text-base text-gray-700 leading-relaxed">
      Menjadi pilihan utama hunian kos eksklusif yang mengedepankan kualitas hidup dan kenyamanan jangka panjang.
    </p>
  </div>

  <div class="bg-purple-600 rounded-3xl shadow-lg w-full p-8 md:p-10 flex flex-col justify-center text-white">
    <div class="bg-white/20 text-white px-4 py-1 rounded-full text-xs font-bold mb-4 self-center md:self-start">MISI</div>
    <h3 class="font-bold text-xl mb-4 text-center md:text-left">Misi Kami</h3>
    <ul class="text-base space-y-3 opacity-90">
      <li class="flex items-center gap-3">
        <i data-lucide="check-circle-2" class="w-5 h-5 shrink-0"></i>
        <span>Menyediakan fasilitas premium</span>
      </li>
      <li class="flex items-center gap-3">
        <i data-lucide="check-circle-2" class="w-5 h-5 shrink-0"></i>
        <span>Menjamin keamanan 24 jam</span>
      </li>
      <li class="flex items-center gap-3">
        <i data-lucide="check-circle-2" class="w-5 h-5 shrink-0"></i>
        <span>Lingkungan kondusif</span>
      </li>
      <li class="flex items-center gap-3">
        <i data-lucide="check-circle-2" class="w-5 h-5 shrink-0"></i>
        <span>Pelayanan profesional</span>
      </li>
    </ul>
  </div>

</section>

<section class="px-6 md:px-10 py-16 text-center">

  <h3 class="font-bold text-2xl text-gray-800">Nilai - Nilai Utama</h3>
  <p class="text-sm md:text-base text-gray-500 mb-10 max-w-lg mx-auto">
    Prinsip yang kami pegang teguh dalam melayani Anda setiap harinya.
  </p>

  <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <div class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100 hover:shadow-md transition">
      <div class="w-14 h-14 mb-5 mx-auto flex items-center justify-center rounded-2xl bg-purple-100 text-purple-600">
        <i data-lucide="home" class="w-6 h-6"></i>
      </div>
      <h4 class="font-bold mb-2 text-gray-800">Kualitas Premium</h4>
      <p class="text-sm text-gray-500">Standar fasilitas kamar dan area publik yang selalu terjaga.</p>
    </div>

    <div class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100 hover:shadow-md transition">
      <div class="w-14 h-14 mb-5 mx-auto flex items-center justify-center rounded-2xl bg-purple-100 text-purple-600">
        <i data-lucide="users" class="w-6 h-6"></i>
      </div>
      <h4 class="font-bold mb-2 text-gray-800">Kenyamanan Bersama</h4>
      <p class="text-sm text-gray-500">Menciptakan harmoni antar penghuni yang suportif.</p>
    </div>

    <div class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100 hover:shadow-md transition">
      <div class="w-14 h-14 mb-5 mx-auto flex items-center justify-center rounded-2xl bg-purple-100 text-purple-600">
        <i data-lucide="heart" class="w-6 h-6"></i>
      </div>
      <h4 class="font-bold mb-2 text-gray-800">Pelayanan Tulus</h4>
      <p class="text-sm text-gray-500">Staf yang siap membantu kebutuhan Anda dengan ramah.</p>
    </div>

  </div>

</section>

@endsection
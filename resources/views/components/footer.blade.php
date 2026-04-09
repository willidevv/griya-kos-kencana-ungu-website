<footer class="bg-gray-900 text-gray-400 mt-20 border-t-4 border-purple-600">

  <div class="max-w-7xl mx-auto px-8 py-16 grid grid-cols-1 md:grid-cols-3 gap-12">

    {{-- Tentang --}}
    <div class="space-y-4">
      <div>
        <h2 class="text-white font-bold text-2xl tracking-tight">Griya Kost</h2>
        <p class="text-purple-400 text-sm font-semibold tracking-widest uppercase">Kencana Ungu</p>
      </div>
      
      <p class="text-sm leading-relaxed max-w-sm">
        Solusi hunian modern yang mengutamakan kenyamanan, keamanan, dan lokasi strategis di pusat kota Madiun. Fasilitas premium dengan rasa kekeluargaan.
      </p>

      <div class="flex gap-4 pt-2">
        <a href="#" class="p-2 bg-gray-800 rounded-lg hover:bg-purple-600 hover:text-white transition">
            <i data-lucide="instagram" class="w-5 h-5"></i>
        </a>
        <a href="#" class="p-2 bg-gray-800 rounded-lg hover:bg-purple-600 hover:text-white transition">
            <i data-lucide="facebook" class="w-5 h-5"></i>
        </a>
      </div>
    </div>

    {{-- Menu --}}
    <div>
      <h2 class="text-white font-bold text-lg mb-6 flex items-center gap-2">
        <span class="w-1.5 h-6 bg-purple-600 rounded-full"></span>
        Tautan Cepat
      </h2>
      <ul class="grid grid-cols-2 md:grid-cols-1 gap-y-4 gap-x-2 text-sm">
        <li><a href="{{ url('/') }}" class="hover:text-purple-400 transition-colors py-1 inline-block">Beranda</a></li>
        <li><a href="{{ url('/profile') }}" class="hover:text-purple-400 transition-colors py-1 inline-block">Profil Kos</a></li>
        <li><a href="{{ url('/fasilitas') }}" class="hover:text-purple-400 transition-colors py-1 inline-block">Fasilitas</a></li>
        <li><a href="{{ url('/galeri') }}" class="hover:text-purple-400 transition-colors py-1 inline-block">Galeri</a></li>
        <li><a href="{{ url('/denah') }}" class="hover:text-purple-400 transition-colors py-1 inline-block">Denah</a></li>
        <li><a href="{{ url('/kontak') }}" class="hover:text-purple-400 transition-colors py-1 inline-block">Kontak</a></li>
      </ul>
    </div>

    {{-- Kontak --}}
    <div>
      <h2 class="text-white font-bold text-lg mb-6 flex items-center gap-2">
        <span class="w-1.5 h-6 bg-purple-600 rounded-full"></span>
        Hubungi Kami
      </h2>
      <div class="space-y-4">
        <div class="flex items-start gap-3 group">
          <i data-lucide="map-pin" class="w-5 h-5 text-purple-500 mt-0.5"></i>
          <p class="text-sm leading-relaxed">
            Jl. Apel Manis No.01, Kec. Taman, <br>
            Kota Madiun, Jawa Timur
          </p>
        </div>
        
        <div class="flex items-center gap-3">
          <i data-lucide="phone" class="w-5 h-5 text-purple-500"></i>
          <p class="text-sm">+62 859-4105-7465</p>
        </div>

        <div class="flex items-center gap-3">
          <i data-lucide="mail" class="w-5 h-5 text-purple-500"></i>
          <p class="text-sm">info@kencanaungu.com</p>
        </div>
      </div>
    </div>

  </div>

  {{-- Copyright --}}
  <div class="bg-black/30 py-6 px-6">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-4 text-[11px] md:text-xs">
      <p class="text-center md:text-left">
        © 2026 **Griya Kost Kencana Ungu**. Seluruh Hak Cipta Dilindungi.
      </p>
      <div class="flex gap-6 opacity-60">
        <a href="#" class="hover:underline">Kebijakan Privasi</a>
        <a href="#" class="hover:underline">Syarat & Ketentuan</a>
      </div>
    </div>
  </div>

</footer>
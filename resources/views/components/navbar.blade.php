<nav class="bg-white/95 backdrop-blur-md px-6 py-4 fixed top-0 left-0 w-full z-100 border-b border-gray-100 transition-all duration-300">
  <div class="max-w-7xl mx-auto flex justify-between items-center">
    
    <a href="/" class="block">
      <h1 class="font-bold text-gray-900 text-lg leading-tight">Griya Kost</h1>
      <p class="text-purple-600 text-[10px] font-bold tracking-[0.2em] uppercase">Kencana Ungu</p>
    </a>

    <button id="menuBtn" type="button" class="md:hidden p-2 text-gray-600 hover:bg-gray-100 rounded-xl transition active:scale-95">
      <i data-lucide="menu" class="w-6 h-6"></i>
    </button>

    <div class="hidden md:flex items-center gap-1 text-[13px] font-medium text-gray-600">
      <a href="/" class="px-4 py-2 rounded-full hover:bg-purple-50 hover:text-purple-700 transition {{ Request::is('/') ? 'text-purple-700 font-bold bg-purple-50' : '' }}">Beranda</a>
      <a href="/profile" class="px-4 py-2 rounded-full hover:bg-purple-50 hover:text-purple-700 transition {{ Request::is('profile') ? 'text-purple-700 font-bold bg-purple-50' : '' }}">Profil</a>
      <a href="/fasilitas" class="px-4 py-2 rounded-full hover:bg-purple-50 hover:text-purple-700 transition {{ Request::is('fasilitas') ? 'text-purple-700 font-bold bg-purple-50' : '' }}">Fasilitas</a>
      <a href="/galeri" class="px-4 py-2 rounded-full hover:bg-purple-50 hover:text-purple-700 transition {{ Request::is('galeri') ? 'text-purple-700 font-bold bg-purple-50' : '' }}">Galeri</a>
      <a href="/denah" class="px-4 py-2 rounded-full hover:bg-purple-50 hover:text-purple-700 transition {{ Request::is('denah') ? 'text-purple-700 font-bold bg-purple-50' : '' }}">Denah</a>
      <a href="/kontak" class="ml-2 bg-purple-600 text-white px-5 py-2 rounded-full hover:bg-purple-700 shadow-md shadow-purple-100 transition active:scale-95">Kontak</a>
    </div>

  </div>

  <div id="mobileMenu" class="hidden absolute top-full left-0 w-full bg-white border-b border-gray-100 shadow-2xl flex-col p-6 gap-2 md:hidden z-110 animate-in slide-in-from-top-2 duration-200">
    <a href="/" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-purple-50 text-gray-700 {{ Request::is('/') ? 'bg-purple-100 text-purple-700 font-bold' : '' }}">
      <i data-lucide="home" class="w-5 h-5"></i> Beranda
    </a>
    <a href="/profile" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-purple-50 text-gray-700 {{ Request::is('profile') ? 'bg-purple-100 text-purple-700 font-bold' : '' }}">
      <i data-lucide="info" class="w-5 h-5"></i> Profil Kos
    </a>
    <a href="/fasilitas" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-purple-50 text-gray-700 {{ Request::is('fasilitas') ? 'bg-purple-100 text-purple-700 font-bold' : '' }}">
      <i data-lucide="star" class="w-5 h-5"></i> Fasilitas
    </a>
    <a href="/galeri" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-purple-50 text-gray-700 {{ Request::is('galeri') ? 'bg-purple-100 text-purple-700 font-bold' : '' }}">
      <i data-lucide="image" class="w-5 h-5"></i> Galeri
    </a>
    <a href="/denah" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-purple-50 text-gray-700 {{ Request::is('denah') ? 'bg-purple-100 text-purple-700 font-bold' : '' }}">
      <i data-lucide="map" class="w-5 h-5"></i> Denah Kos
    </a>
    <a href="/kontak" class="flex items-center gap-3 px-4 py-4 rounded-xl bg-purple-600 text-white font-bold mt-2 shadow-lg shadow-purple-100">
      <i data-lucide="phone" class="w-5 h-5"></i> Hubungi Kami
    </a>
  </div>
</nav>
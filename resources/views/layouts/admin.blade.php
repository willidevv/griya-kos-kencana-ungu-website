<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Griya Kost</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-gray-50 flex min-h-screen relative">

    <div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-60 hidden md:hidden transition-opacity duration-300"></div>

    <aside id="sidebarAdmin" class="fixed md:sticky top-0 left-0 h-screen w-64 bg-slate-900 text-slate-300 flex flex-col z-70 transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out">
        <div class="p-6 border-b border-slate-800 flex justify-between items-center">
            <div>
                <h1 class="text-white font-bold text-xl tracking-tight">Griya Kost</h1>
                <p class="text-purple-400 text-[10px] font-bold uppercase tracking-widest">Admin Panel</p>
            </div>
            <button id="closeSidebar" class="md:hidden text-slate-400 hover:text-white">
                <i data-lucide="x" class="w-6 h-6"></i>
            </button>
        </div>
        
        <nav class="flex-1 p-4 space-y-1 overflow-y-auto">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ Request::is('admin/dashboard') ? 'bg-purple-600 text-white shadow-lg' : 'hover:bg-slate-800' }}">
                <i data-lucide="layout-dashboard" class="w-5 h-5"></i> Dashboard
            </a>
            
            <div class="pt-6 pb-2 px-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest">Konten Web</div>
            
            <a href="{{ route('admin.fasilitas.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ Request::is('admin/fasilitas*') ? 'bg-purple-600 text-white shadow-lg' : 'hover:bg-slate-800' }}">
                <i data-lucide="star" class="w-5 h-5"></i> Fasilitas
            </a>

            <a href="{{ route('admin.galeri.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ Request::is('admin/galeri*') ? 'bg-purple-600 text-white shadow-lg' : 'hover:bg-slate-800' }}">
                <i data-lucide="image" class="w-5 h-5"></i> Kelola Galeri
            </a>

            <a href="{{ route('admin.kontak') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ Request::is('admin/kontak') ? 'bg-purple-600 text-white shadow-lg' : 'hover:bg-slate-800' }}">
                <i data-lucide="phone" class="w-5 h-5"></i> Kontak
            </a>
        </nav>

        <div class="p-4 border-t border-slate-800">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="flex items-center gap-3 px-4 py-3 rounded-xl text-red-400 hover:bg-red-500/10 w-full transition">
                    <i data-lucide="log-out" class="w-5 h-5"></i> Keluar
                </button>
            </form>
        </div>
    </aside>

    <div class="flex-1 flex flex-col min-w-0">
        <header class="h-16 bg-white border-b border-gray-200 px-4 md:px-8 flex justify-between items-center sticky top-0 z-50">
            <div class="flex items-center gap-3">
                <button id="openSidebar" class="md:hidden p-2 text-gray-600 hover:bg-gray-100 rounded-lg">
                    <i data-lucide="menu" class="w-6 h-6"></i>
                </button>
                <h2 class="font-bold text-gray-800 truncate">@yield('title')</h2>
            </div>

            <div class="flex items-center gap-3">
                <div class="text-right hidden sm:block">
                    <p class="text-xs font-bold text-gray-800">Fauzan Fathin</p>
                    <p class="text-[10px] text-gray-500">Super Admin</p>
                </div>
                <div class="w-9 h-9 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center font-bold border border-purple-200">F</div>
            </div>
        </header>

        <main class="p-4 md:p-8">
            @yield('admin_content')
        </main>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Inisialisasi Lucide Icons
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }

            const sidebar = document.getElementById('sidebarAdmin');
            const overlay = document.getElementById('sidebarOverlay');
            const openBtn = document.getElementById('openSidebar');
            const closeBtn = document.getElementById('closeSidebar');

            function toggleSidebar() {
                sidebar.classList.toggle('-translate-x-full');
                overlay.classList.toggle('hidden');
                document.body.classList.toggle('overflow-hidden');
            }

            if(openBtn) openBtn.addEventListener('click', toggleSidebar);
            if(closeBtn) closeBtn.addEventListener('click', toggleSidebar);
            if(overlay) overlay.addEventListener('click', toggleSidebar);
        });
    </script>
</body>
</html>
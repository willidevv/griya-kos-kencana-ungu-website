<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Griya Kost Kencana Ungu' }}</title>

    {{-- Assets Laravel Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Lucide Icons --}}
    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body class="bg-gray-50 antialiased pt-18">

    {{-- Komponen Navbar --}}
    @include('components.navbar')

    {{-- Konten Utama --}}
    <main class="min-h-screen">
        @yield('content')
    </main>

    {{-- Komponen Footer --}}
    @include('components.footer')

    {{-- Script Navigasi Mobile Terpadu --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // 1. Inisialisasi Icon
            lucide.createIcons();

            // 2. Definisi Elemen
            const menuBtn = document.getElementById('menuBtn');
            const mobileMenu = document.getElementById('mobileMenu');
            const nav = document.querySelector("nav");

            // 3. Logika Scroll Navbar (Shadow)
            window.addEventListener("scroll", () => {
                if (window.scrollY > 10) {
                    nav.classList.add("shadow-md", "bg-white");
                    nav.classList.remove("bg-white/95");
                } else {
                    nav.classList.remove("shadow-md", "bg-white");
                    nav.classList.add("bg-white/95");
                }
            });

            // 4. Logika Buka/Tutup Menu Mobile
            if (menuBtn && mobileMenu) {
                menuBtn.addEventListener('click', function(e) {
                    e.stopPropagation(); // Mencegah klik tembus ke document
                    
                    // Toggle class hidden
                    const isHidden = mobileMenu.classList.contains('hidden');
                    
                    if (isHidden) {
                        mobileMenu.classList.remove('hidden');
                        mobileMenu.classList.add('flex');
                    } else {
                        mobileMenu.classList.add('hidden');
                        mobileMenu.classList.remove('flex');
                    }
                });

                // Klik di luar menu untuk menutup
                document.addEventListener('click', function(e) {
                    if (!mobileMenu.contains(e.target) && !menuBtn.contains(e.target)) {
                        mobileMenu.classList.add('hidden');
                        mobileMenu.classList.remove('flex');
                    }
                });
            }
        });
    </script>

    @stack('scripts')
</body>
</html>
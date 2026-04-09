@extends('layouts.app')

@section('content')
<section class="min-h-[80vh] flex items-center justify-center px-6 py-12 bg-gray-50">
    <div class="max-w-md w-full">
        
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-purple-600 text-white rounded-2xl shadow-lg shadow-purple-200 mb-4">
                <i data-lucide="shield-check" class="w-8 h-8"></i>
            </div>
            <h1 class="text-2xl font-bold text-gray-800">Panel Pengelola</h1>
            <p class="text-gray-500 text-sm mt-1">Silakan masuk untuk mengelola Griya Kost</p>
        </div>

        <div class="bg-white p-8 rounded-3xl shadow-xl shadow-gray-200/50 border border-gray-100">
            <form action="{{ route('login') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="email" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2 ml-1">Alamat Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                            <i data-lucide="mail" class="w-5 h-5"></i>
                        </div>
                        <input type="email" name="email" id="email" required
                            class="block w-full pl-11 pr-4 py-3.5 bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-2xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200 outline-none"
                            placeholder="Email">
                    </div>
                    @error('email')
                        <p class="text-red-500 text-xs mt-2 ml-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <div class="flex justify-between items-center mb-2 ml-1">
                        <label for="password" class="block text-xs font-bold text-gray-700 uppercase tracking-wider">Kata Sandi</label>
                        <a href="#" class="text-xs font-semibold text-purple-600 hover:text-purple-700">Lupa sandi?</a>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                            <i data-lucide="lock" class="w-5 h-5"></i>
                        </div>
                        <input type="password" name="password" id="password" required
                            class="block w-full pl-11 pr-4 py-3.5 bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-2xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200 outline-none"
                            placeholder="••••••••">
                    </div>
                </div>

                <div class="flex items-center ml-1">
                    <input type="checkbox" name="remember" id="remember" 
                        class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-purple-500">
                    <label for="remember" class="ml-2 text-sm text-gray-600">Ingat perangkat ini</label>
                </div>

                <button type="submit" 
                    class="w-full bg-purple-600 hover:bg-purple-700 text-white font-bold py-4 rounded-2xl shadow-lg shadow-purple-200 transition duration-300 active:scale-[0.98] flex items-center justify-center gap-2">
                    Masuk Sekarang
                    <i data-lucide="arrow-right" class="w-5 h-5"></i>
                </button>
            </form>
        </div>

        <p class="text-center mt-8 text-sm text-gray-500">
            Bukan pengelola? <a href="/" class="text-purple-600 font-bold hover:underline">Kembali ke Beranda</a>
        </p>

    </div>
</section>
@endsection
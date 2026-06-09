@extends('layouts.admin')

@section('title', 'Tambah Admin Baru')

@section('admin_content')
<div class="max-w-2xl">
    {{-- Navigasi Kembali --}}
    <a href="{{ route('admin.users.index') }}" class="flex items-center gap-2 text-gray-500 hover:text-gray-800 mb-6 transition text-sm font-medium">
        <i data-lucide="arrow-left" class="w-4 h-4"></i> Kembali ke Daftar
    </a>

    {{-- Pesan Error Global (Optional) --}}
    @if ($errors->any())
        <div class="mb-6 p-4 rounded-2xl bg-red-50 border border-red-100 flex items-center gap-3">
            <div class="bg-red-500 p-1.5 rounded-full">
                <i data-lucide="alert-circle" class="w-4 h-4 text-white"></i>
            </div>
            <p class="text-xs font-bold text-red-800">Perhatian: Beberapa input melebihi batas karakter database atau tidak valid.</p>
        </div>
    @endif

    <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-8">
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf
            
            <div class="space-y-5">
                {{-- Field Nama --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Nama Lengkap</label>
                    <input type="text" 
                           name="name" 
                           value="{{ old('name') }}" 
                           maxlength="60" 
                           class="w-full px-4 py-3 rounded-xl border @error('name') border-red-400 bg-red-50 @else border-gray-200 @enderror focus:ring-2 focus:ring-indigo-500 outline-none transition" 
                           placeholder="Maksimal 60 karakter..." 
                           required>
                    @error('name')
                        <p class="text-[11px] text-red-500 mt-1 font-semibold italic">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Field Email --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Alamat Email Admin</label>
                    <input type="email" 
                           name="email" 
                           value="{{ old('email') }}" 
                           maxlength="30" 
                           class="w-full px-4 py-3 rounded-xl border @error('email') border-red-400 bg-red-50 @else border-gray-200 @enderror focus:ring-2 focus:ring-indigo-500 outline-none transition" 
                           placeholder="Maksimal 30 karakter..." 
                           required>
                    @error('email')
                        <p class="text-[11px] text-red-500 mt-1 font-semibold italic">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Role Akses --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Level Akses</label>
                    <div class="relative">
                        <select name="role" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-indigo-500 outline-none transition appearance-none bg-white">
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin (Pengelola Konten)</option>
                            <option value="super_admin" {{ old('role') == 'super_admin' ? 'selected' : '' }}>Super Admin (Akses Penuh)</option>
                        </select>
                        <i data-lucide="chevron-down" class="absolute right-4 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none"></i>
                    </div>
                </div>

                {{-- Password Grid --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-2">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Password</label>
                        <input type="password" 
                               name="password" 
                               maxlength="60" 
                               class="w-full px-4 py-3 rounded-xl border @error('password') border-red-400 @else border-gray-200 @enderror focus:ring-2 focus:ring-indigo-500 outline-none transition" 
                               required>
                        @error('password')
                            <p class="text-[11px] text-red-500 mt-1 font-semibold italic">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Konfirmasi Password</label>
                        <input type="password" 
                               name="password_confirmation" 
                               maxlength="60" 
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-indigo-500 outline-none transition" 
                               required>
                    </div>
                </div>
            </div>

            <button type="submit" class="mt-8 w-full bg-indigo-600 text-white py-4 rounded-2xl font-bold hover:bg-indigo-700 shadow-lg shadow-indigo-100 active:scale-[0.98] transition-all">
                Daftarkan Admin
            </button>
        </form>
    </div>
</div>
@endsection
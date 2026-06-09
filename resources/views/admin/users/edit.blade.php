@extends('layouts.admin')

@section('title', 'Edit Data Admin')

@section('admin_content')
<div class="max-w-2xl">
    <a href="{{ route('admin.users.index') }}" class="flex items-center gap-2 text-gray-500 hover:text-gray-800 mb-6 transition text-sm font-medium">
        <i data-lucide="arrow-left" class="w-4 h-4"></i> Batal & Kembali
    </a>

    {{-- Alert Ringkasan Error --}}
    @if ($errors->any())
        <div class="mb-6 p-4 rounded-2xl bg-red-50 border border-red-100 flex items-center gap-3">
            <div class="bg-red-500 p-1.5 rounded-full">
                <i data-lucide="alert-circle" class="w-4 h-4 text-white"></i>
            </div>
            <p class="text-[11px] font-bold text-red-800">Ups! Terjadi kesalahan. Periksa kembali batas karakter atau format input Anda.</p>
        </div>
    @endif

    <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-8">
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf 
            @method('PUT')
            
            <div class="space-y-5">
                {{-- Nama Lengkap --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" 
                           maxlength="60"
                           class="w-full px-4 py-3 rounded-xl border @error('name') border-red-400 bg-red-50 @else border-gray-200 @enderror focus:ring-2 focus:ring-indigo-500 outline-none transition" 
                           required>
                    @error('name')
                        <p class="text-[11px] text-red-500 mt-1 font-semibold italic">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" 
                           maxlength="30"
                           class="w-full px-4 py-3 rounded-xl border @error('email') border-red-400 bg-red-50 @else border-gray-200 @enderror focus:ring-2 focus:ring-indigo-500 outline-none transition" 
                           required>
                    @error('email')
                        <p class="text-[11px] text-red-500 mt-1 font-semibold italic">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Role Akses --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Role Akses</label>
                    <div class="relative">
                        <select name="role" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-indigo-500 outline-none transition appearance-none bg-white">
                            <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin (Konten)</option>
                            <option value="super_admin" {{ old('role', $user->role) == 'super_admin' ? 'selected' : '' }}>Super Admin (Full)</option>
                        </select>
                        <i data-lucide="chevron-down" class="absolute right-4 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none"></i>
                    </div>
                </div>

                {{-- Info Password --}}
                <div class="p-4 bg-yellow-50 rounded-2xl border border-yellow-100 flex gap-3">
                    <i data-lucide="info" class="w-4 h-4 text-yellow-600 shrink-0 mt-0.5"></i>
                    <p class="text-[11px] text-yellow-700 font-medium leading-relaxed">Kosongkan kolom password di bawah jika Anda <strong>tidak ingin</strong> mengubah password user ini.</p>
                </div>

                {{-- Password Baru --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Password Baru</label>
                        <input type="password" name="password" maxlength="60"
                               class="w-full px-4 py-3 rounded-xl border @error('password') border-red-400 @else border-gray-200 @enderror focus:ring-2 focus:ring-indigo-500 outline-none transition">
                        @error('password')
                            <p class="text-[11px] text-red-500 mt-1 font-semibold italic">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" maxlength="60"
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-indigo-500 outline-none transition">
                    </div>
                </div>
            </div>

            <button type="submit" class="mt-8 w-full bg-indigo-600 text-white py-4 rounded-2xl font-bold hover:bg-indigo-700 shadow-lg shadow-indigo-100 transition active:scale-[0.98]">
                Simpan Perubahan
            </button>
        </form>
    </div>
</div>
@endsection
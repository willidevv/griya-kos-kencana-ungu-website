@extends('layouts.admin')

@section('title', 'Manajemen Admin')

@section('admin_content')
<div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
    <div>
        <p class="text-gray-500 text-sm">Total Pengelola: <span class="font-bold text-gray-800">{{ $users->count() }} Orang</span></p>
    </div>
    <a href="{{ route('admin.users.create') }}" class="bg-indigo-600 text-white px-6 py-3 rounded-2xl font-bold flex items-center gap-2 hover:bg-indigo-700 shadow-lg shadow-indigo-200 transition">
        <i data-lucide="user-plus" class="w-5 h-5"></i> Tambah Admin
    </a>
</div>

{{-- Alert Success/Error --}}
@if(session('success'))
<div class="mb-6 p-4 bg-green-50 border border-green-100 text-green-700 rounded-2xl text-sm font-medium flex items-center gap-3">
    <i data-lucide="check-circle" class="w-5 h-5"></i> {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="mb-6 p-4 bg-red-50 border border-red-100 text-red-700 rounded-2xl text-sm font-medium flex items-center gap-3">
    <i data-lucide="alert-circle" class="w-5 h-5"></i> {{ session('error') }}
</div>
@endif

<div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 text-gray-400 text-[10px] uppercase tracking-widest font-bold border-b border-gray-100">
                    <th class="px-6 py-4">Nama Pengelola</th>
                    <th class="px-6 py-4">Email</th>
                    <th class="px-6 py-4">Role</th>
                    <th class="px-6 py-4">Status</th> {{-- Kolom Baru --}}
                    <th class="px-6 py-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @foreach($users as $user)
                <tr class="hover:bg-gray-50/50 transition {{ !$user->is_active ? 'bg-gray-50/70' : '' }}">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full {{ $user->is_active ? 'bg-gray-100 text-gray-600' : 'bg-red-50 text-red-400' }} flex items-center justify-center text-xs font-bold">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                            <div class="flex flex-col">
                                <span class="font-bold text-gray-800 text-sm">{{ $user->name }}</span>
                                @if(auth()->id() === $user->id)
                                    <span class="text-[9px] text-indigo-500 font-bold uppercase italic">(Anda)</span>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $user->email }}</td>
                    <td class="px-6 py-4">
                        @if($user->role === 'super_admin')
                            <span class="px-3 py-1 bg-purple-100 text-purple-600 text-[10px] font-bold rounded-full uppercase italic">Super Admin</span>
                        @else
                            <span class="px-3 py-1 bg-blue-100 text-blue-600 text-[10px] font-bold rounded-full uppercase">Admin</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        @if($user->is_active)
                            <span class="inline-flex items-center gap-1.5 text-green-600 text-xs font-medium">
                                <span class="w-1.5 h-1.5 bg-green-500 rounded-full animate-pulse"></span> Aktif
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 text-red-400 text-xs font-medium">
                                <span class="w-1.5 h-1.5 bg-red-300 rounded-full"></span> Nonaktif
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right flex justify-end gap-2">
                        {{-- Tombol Toggle Status --}}
                        @if(auth()->id() !== $user->id)
                        <form action="{{ route('admin.users.toggle', $user->id) }}" method="POST">
                            @csrf @method('PATCH')
                            <button type="submit" 
                                class="p-2 rounded-xl transition {{ $user->is_active ? 'bg-amber-50 text-amber-600 hover:bg-amber-100' : 'bg-green-50 text-green-600 hover:bg-green-100' }}"
                                title="{{ $user->is_active ? 'Nonaktifkan Akun' : 'Aktifkan Akun' }}">
                                <i data-lucide="{{ $user->is_active ? 'user-x' : 'user-check' }}" class="w-4 h-4"></i>
                            </button>
                        </form>
                        @endif

                        <a href="{{ route('admin.users.edit', $user->id) }}" class="p-2 bg-gray-50 text-gray-600 rounded-xl hover:bg-blue-50 hover:text-blue-600 transition">
                            <i data-lucide="edit-2" class="w-4 h-4"></i>
                        </a>
                        
                        @if(auth()->id() !== $user->id)
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Hapus akun ini secara permanen?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="p-2 bg-gray-50 text-gray-600 rounded-xl hover:bg-red-50 hover:text-red-600 transition">
                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                            </button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@extends('layouts.admin')

@section('title', 'Manajemen Galeri')

@section('admin_content')
<div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
    <div>
        <p class="text-gray-500 text-sm">Total koleksi: <span class="font-bold text-gray-800">{{ $galleries->count() }} Foto</span></p>
    </div>
    <a href="{{ route('admin.galeri.create') }}" class="bg-purple-600 text-white px-6 py-3 rounded-2xl font-bold flex items-center gap-2 hover:bg-purple-700 shadow-lg shadow-purple-200 transition">
        <i data-lucide="plus" class="w-5 h-5"></i> Tambah Foto
    </a>
</div>

@if(session('success'))
<div class="mb-6 p-4 bg-green-50 border border-green-100 text-green-700 rounded-2xl text-sm font-medium flex items-center gap-3">
    <i data-lucide="check-circle" class="w-5 h-5"></i> {{ session('success') }}
</div>
@endif

<div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 text-gray-400 text-[10px] uppercase tracking-widest font-bold border-b border-gray-100">
                    <th class="px-6 py-4">Preview</th>
                    <th class="px-6 py-4">Keterangan Foto</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($galleries as $item)
                <tr class="hover:bg-gray-50/50 transition">
                    <td class="px-6 py-4">
                        <img src="{{ asset('storage/' . $item->image) }}" class="w-24 h-16 object-cover rounded-xl border border-gray-200 shadow-sm">
                    </td>
                    <td class="px-6 py-4">
                        <p class="font-bold text-gray-800 text-sm">{{ $item->caption }}</p>
                        <p class="text-[10px] text-gray-400 mt-0.5 italic">ID: #{{ $item->id }} | {{ $item->created_at->diffForHumans() }}</p>
                    </td>
                    <td class="px-6 py-4">
                        @if($item->is_visible)
                            <span class="px-3 py-1 bg-green-100 text-green-600 text-[10px] font-bold rounded-full uppercase tracking-tight">Tampil</span>
                        @else
                            <span class="px-3 py-1 bg-gray-100 text-gray-500 text-[10px] font-bold rounded-full uppercase tracking-tight">Sembunyi</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right">
                        <form action="{{ route('admin.galeri.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2.5 bg-red-50 text-red-600 rounded-xl hover:bg-red-100 transition shadow-sm">
                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-12 text-center">
                        <div class="flex flex-col items-center opacity-30">
                            <i data-lucide="image" class="w-12 h-12 mb-2"></i>
                            <p class="text-sm font-medium">Belum ada foto galeri.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
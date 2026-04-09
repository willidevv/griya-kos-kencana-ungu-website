@extends('layouts.admin')
@section('title', 'Kontak & Lokasi')

@section('admin_content')
<div class="max-w-xl">
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-2xl text-sm font-bold">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm">
        <form action="{{ route('admin.kontak.update') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase mb-2 ml-1">Nomor Telepon (Tanpa +62 / 0)</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400 text-sm font-bold">+62</span>
                    <input type="text" name="phone" value="{{ $contact->phone ?? '85941057465' }}" class="w-full bg-gray-50 border border-gray-200 rounded-2xl pl-12 pr-4 py-3.5 text-sm focus:ring-2 focus:ring-purple-500 outline-none">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase mb-2 ml-1">Link Google Maps (Iframe Src)</label>
                <textarea name="maps_iframe" rows="4" class="w-full bg-gray-50 border border-gray-200 rounded-2xl px-4 py-3 text-sm focus:ring-2 focus:ring-purple-500 outline-none font-mono text-[10px]">{{ $contact->maps_iframe ?? '' }}</textarea>
                <p class="text-[10px] text-gray-400 mt-2 italic">*Masukkan hanya bagian link di dalam src="..." saja</p>
            </div>

            <button type="submit" class="w-full bg-purple-600 text-white py-4 rounded-2xl font-bold shadow-lg shadow-purple-100 hover:bg-purple-700 transition">
                Simpan Kontak Terbaru
            </button>
        </form>
    </div>
</div>
@endsection
@extends('layouts.admin')
@section('title', 'Kontak & Lokasi')

@section('admin_content')
<div class="max-w-xl">
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-2xl text-sm font-bold">
            {{ session('success') }}
        </div>
    @endif

    {{-- Pesan Error Jika Input Kepanjangan --}}
    @if($errors->any())
        <div class="mb-4 p-4 bg-red-50 border border-red-100 rounded-2xl">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li class="text-xs text-red-600 font-bold italic">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm">
        <form action="{{ route('admin.kontak.update') }}" method="POST" class="space-y-6">
            @csrf
            
            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase mb-2 ml-1">Nomor Telepon</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400 text-sm font-bold">+62</span>
                    <input type="text" name="phone" 
                           value="{{ old('phone', $contact->phone ?? '') }}" 
                           maxlength="15"
                           class="w-full bg-gray-50 border @error('phone') border-red-400 @else border-gray-200 @enderror rounded-2xl pl-12 pr-4 py-3.5 text-sm focus:ring-2 focus:ring-purple-500 outline-none transition"
                           placeholder="812345678">
                </div>
                @error('phone') <p class="text-[10px] text-red-500 mt-1 font-bold">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase mb-2 ml-1">Link Google Maps</label>
                <textarea name="maps_iframe" rows="4" maxlength="100"
                          class="w-full bg-gray-50 border @error('maps_iframe') border-red-400 @else border-gray-200 @enderror rounded-2xl px-4 py-3 text-sm focus:ring-2 focus:ring-purple-500 outline-none font-mono text-[10px]"
                          placeholder="https://google.com/maps/embed/...">{{ old('maps_iframe', $contact->maps_iframe ?? '') }}</textarea>
                <p class="text-[10px] text-gray-400 mt-2 italic">*Hati-hati: Database Anda membatasi link ini maksimal 100 karakter.</p>
                @error('maps_iframe') <p class="text-[10px] text-red-500 mt-1 font-bold">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="w-full bg-purple-600 text-white py-4 rounded-2xl font-bold shadow-lg shadow-purple-100 hover:bg-purple-700 transition active:scale-95">
                Simpan Kontak Terbaru
            </button>
        </form>
    </div>
</div>
@endsection
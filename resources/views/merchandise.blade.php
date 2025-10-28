@extends('layouts.navbar')

@section('content')

 <!-- Header -->
<div class="bg-gradient-to-br from-blue-800 to-blue-950 text-white relative overflow-hidden">
    {{-- Animasi titik-titik di background untuk kesan modern --}}
    <div class="absolute inset-0 z-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=\'100\' height=\'100\' viewBox=\'0 0 100 100\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Ccircle cx=\'50\' cy=\'50\' r=\'10\' fill=\'%23ffffff\' fill-opacity=\'0.05\'/%3E%3C/svg%3E'); background-size: 20px 20px;"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 text-center">
        <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold tracking-tight text-white mb-4">
            HIMAFORTIC <span class="text-blue-300">Merchandise</span>
        </h1>
        <p class="mt-6 max-w-3xl mx-auto text-lg text-blue-200">
            Temukan koleksi merchandise eksklusif kami, dibuat dengan kualitas dan bahan Premium.
        </p>
        <div class="mt-8 flex justify-center gap-3">
            {{-- Badge dengan efek hover dan backdrop-blur --}}
            <span class="bg-white/15 text-blue-100 text-sm font-semibold px-4 py-2 rounded-full backdrop-blur-sm transition-all duration-300 hover:scale-105 hover:bg-white/25 cursor-pointer">
                Edisi Terbatas
            </span>
            <span class="bg-white/15 text-blue-100 text-sm font-semibold px-4 py-2 rounded-full backdrop-blur-sm transition-all duration-300 hover:scale-105 hover:bg-white/25 cursor-pointer">
                Kualitas Premium
            </span>
        </div>
    </div>
</div>


<!-- Filter -->
<div class="container mx-auto py-12 px-4 sm:px-6 lg:px-8">
    
    <div class="relative bg-white rounded-2xl p-6 mb-16 shadow-lg border border-slate-200/80 overflow-hidden">
        <div class="absolute top-0 left-0 h-1.5 w-full bg-gradient-to-r from-blue-600 to-blue-700"></div>
        <h3 class="text-xl font-bold text-blue-900 mb-4">Kategori</h3>
        <div class="flex flex-wrap gap-3">
            {{-- Tombol untuk menampilkan semua item --}}
            <a href="{{ route('merchandise.index') }}" 
                class="px-5 py-2 text-sm font-semibold rounded-full transition-all duration-300
                {{ !$selectedKategori ? 'bg-blue-600 text-white shadow-md shadow-blue-600/30' : 'bg-slate-100 text-slate-600 hover:bg-blue-600 hover:text-white' }}">
                Semua Item
            </a>

            {{-- Loop untuk setiap kategori dari database --}}
            @foreach ($kategories as $kategori)
                <a href="{{ route('merchandise.index', ['kategori' => $kategori->nama]) }}"
                    class="px-5 py-2 text-sm font-semibold rounded-full transition-all duration-300
                    {{ $selectedKategori == $kategori->nama ? 'bg-blue-600 text-white shadow-md shadow-blue-600/30' : 'bg-slate-100 text-slate-600 hover:bg-blue-600 hover:text-white' }}">
                    {{ $kategori->nama }}
                </a>
            @endforeach
        </div>
    </div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
    @forelse ($merchandises as $item)
        <div class="bg-white rounded-2xl shadow-md overflow-hidden transform transition-all duration-300 hover:shadow-xl hover:-translate-y-2 flex flex-col group">
            
            <div class="relative">
                <div class="absolute top-3 right-3 z-10 bg-gradient-to-r from-blue-600 to-blue-700 text-white text-[10px] font-bold px-2.5 py-1 rounded-full shadow-md">
                    <i class="fas fa-crown mr-1"></i> PREMIUM
                </div>
                <div class="absolute top-3 left-3 z-10 text-white text-[10px] font-bold px-2.5 py-1 rounded-full shadow-md {{ $item->stok > 0 ? 'bg-green-500/90 backdrop-blur-sm' : 'bg-red-600/90 backdrop-blur-sm' }}">
                    {{ $item->stok > 0 ? 'Sisa ' . $item->stok : 'Habis' }}
                </div>
                
                <div class="h-56 bg-slate-100 overflow-hidden">
                    <img src="{{ asset('storage/' . $item->gambar) }}" 
                            alt="{{ $item->nama }}"
                            class="w-full h-full object-cover transition-all duration-500 ease-in-out group-hover:scale-110
                                    {{ $item->stok == 0 ? 'grayscale' : '' }}" 
                            onerror="this.src='https://via.placeholder.com/400x300/1e3a5f/ffffff?text=Premium+Product'">
                </div>
            </div>
            
            <div class="p-4 flex flex-col flex-grow">
                <h5 class="text-lg font-bold text-blue-900 mb-1 group-hover:text-blue-600 transition-colors">{{ $item->nama }}</h5>
                <p class="text-gray-600 text-sm flex-grow mb-3 leading-snug">{{ Str::limit($item->deskripsi, 60) }}</p>
                
                <div class="text-xl font-extrabold text-black-800 mb-4">
                    Rp {{ number_format($item->harga, 0, ',', '.') }}
                </div>
                
                {{-- Tombol Pesan --}}
                @if ($item->stok > 0)
                    <a href="https://wa.me/6281234648067?text={{ urlencode('Halo, saya tertarik dengan merchandise ' . $item->nama) }}" 
                        class="mt-auto w-full text-center rounded-lg py-2.5 px-3 font-semibold text-white transition-all duration-300 ease-in-out bg-gradient-to-r from-green-500 to-green-600 hover:shadow-lg hover:shadow-green-600/40 hover:-translate-y-1 text-sm" 
                        target="_blank">
                        <i class="fab fa-whatsapp mr-1"></i> 
                        Pesan Sekarang
                    </a>
                @else
                    <div class="mt-auto w-full text-center rounded-lg py-2.5 px-3 font-semibold text-white bg-gray-400 cursor-not-allowed text-sm">
                        <i class="fab fa-whatsapp mr-1"></i> 
                        Stok Habis
                    </div>
                @endif
            </div>
        </div>
    @empty
        <div class="col-span-full">
            <div class="bg-white rounded-2xl border-2 border-dashed border-gray-300 p-12 text-center">
                <i class="fas fa-gem fa-4x text-gray-300 mb-4"></i>
                <h3 class="text-2xl font-semibold text-gray-700 mb-2">Belum Ada Merchandise</h3>
                <p class="text-gray-500">Kami sedang menyiapkan koleksi merchandise eksklusif terbaru.</p>
            </div>
        </div>
    @endforelse
</div>

{{-- Tombol Prev & Next --}}
@if ($merchandises->hasPages())
    <div class="mt-10 flex justify-center">
        <div class="inline-flex items-center gap-2">
            {{-- Tombol Prev --}}
            @if ($merchandises->onFirstPage())
                <span class="px-4 py-2 bg-gray-200 text-gray-500 rounded-lg text-sm cursor-not-allowed">
                    ← Prev
                </span>
            @else
                <a href="{{ $merchandises->previousPageUrl() }}" 
                   class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm font-semibold hover:bg-blue-700 transition-all duration-300">
                    ← Prev
                </a>
            @endif

            {{-- Tombol Next --}}
            @if ($merchandises->hasMorePages())
                <a href="{{ $merchandises->nextPageUrl() }}" 
                   class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm font-semibold hover:bg-blue-700 transition-all duration-300">
                    Next →
                </a>
            @else
                <span class="px-4 py-2 bg-gray-200 text-gray-500 rounded-lg text-sm cursor-not-allowed">
                    Next →
                </span>
            @endif
        </div>
    </div>
@endif

    </div>
    </div>
</div>

@endsection
@extends('layouts.navbar') {{-- Sesuaikan dengan nama layout utama Anda --}}

@section('content')

{{-- Style untuk animasi (opsional, jika belum ada) --}}
<!-- Premium Hero Section -->
<section class="relative bg-gradient-to-br from-slate-900 via-blue-900 to-slate-800 py-20 text-white overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg fill=\"%23ffffff\" fill-opacity=\"0.1\"%3E%3Ccircle cx=\"30\" cy=\"30\" r=\"2\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>
    
    <!-- Floating Elements -->
    <div class="absolute top-10 left-10 w-20 h-20 bg-blue-500 rounded-full opacity-20 animate-pulse"></div>
    <div class="absolute bottom-10 right-10 w-16 h-16 bg-cyan-400 rounded-full opacity-30 animate-bounce"></div>
    
    <div class="max-w-6xl mx-auto px-4 relative z-10">
        <div class="text-center">
            <div class="inline-flex items-center gap-2 bg-blue-500/20 backdrop-blur-sm rounded-full px-4 py-2 mb-6 border border-blue-400/30">
                <i class="fas fa-newspaper text-blue-300"></i>
                <span class="text-blue-200 text-sm font-medium">LATEST NEWS</span>
            </div>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                <span class="bg-gradient-to-r from-blue-400 to-cyan-400 bg-clip-text text-transparent">
                    Berita Terkini
                </span>
            </h1>
            <p class="text-xl text-blue-100 leading-relaxed max-w-3xl mx-auto">
                Jelajahi perkembangan, prestasi, dan kegiatan terbaru dari 
                <span class="text-cyan-300 font-semibold">Himpunan Mahasiswa Manajemen Informatika</span>
            </p>
        </div>
    </div>
</section>

<div class="container mx-auto py-16 px-4 sm:px-6 lg:px-8">
    
    <div class="mb-12">
        <div class="flex flex-wrap justify-center gap-3">
            {{-- Tombol "Semua" --}}
            <a href="{{ route('berita.index') }}" 
                class="px-5 py-2 text-sm font-semibold rounded-full transition-all duration-300
                {{ !$selectedKategori ? 'bg-blue-600 text-white shadow-md shadow-blue-600/30' : 'bg-slate-100 text-slate-600 hover:bg-blue-600 hover:text-white' }}">
                Semua
            </a>

            {{-- Loop untuk setiap kategori --}}
            @foreach ($kategories as $kategori)
                <a href="{{ route('berita.index', ['kategori' => $kategori->slug]) }}"
                    class="px-5 py-2 text-sm font-semibold rounded-full transition-all duration-300
                    {{ $selectedKategori == $kategori->slug ? 'bg-blue-600 text-white shadow-md shadow-blue-600/30' : 'bg-slate-100 text-slate-600 hover:bg-blue-600 hover:text-white' }}">
                    {{ $kategori->nama }}
                </a>
            @endforeach
        </div>
    </div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    @forelse ($semuaBerita as $artikel)
        {{-- 1. Tambahkan "relative" di kartu utama --}}
        <div class="relative bg-white rounded-2xl shadow-lg overflow-hidden transform transition-all duration-300 hover:shadow-2xl hover:-translate-y-2 flex flex-col group scroll-reveal">
            
            <div class="h-56 bg-slate-100 overflow-hidden">
                <img src="{{ $artikel->gambar_utama ? asset('storage/' . $artikel->gambar_utama) : 'https://via.placeholder.com/600x400/1e3a5f/ffffff?text=HIMAFORTIC' }}" 
                     alt="{{ $artikel->judul }}"
                     class="w-full h-full object-cover transition-transform duration-500 ease-in-out group-hover:scale-110">
            </div>
            
            <div class="p-6 flex flex-col flex-grow">
                <div class="mb-3">
                    {{-- 2. Tambahkan "relative z-10" agar link ini bisa diklik --}}
                    <a href="{{ route('berita.index', ['kategori' => $artikel->kategori->slug]) }}" class="relative z-10 text-xs font-semibold bg-blue-100 text-blue-800 px-3 py-1 rounded-full hover:bg-blue-200 transition-colors">
                        {{ $artikel->kategori->nama }}
                    </a>
                </div>

                <h3 class="text-lg font-bold text-blue-900 mb-2 transition-colors">
                    {{ $artikel->judul }}
                </h3>
                <p class="text-gray-600 text-sm flex-grow mb-4 leading-relaxed">
                    {{ Str::limit(strip_tags($artikel->konten), 100) }}
                </p>
                <div class="mt-auto text-xs text-slate-500">
                    <span>{{ \Carbon\Carbon::parse($artikel->tanggal_publikasi)->translatedFormat('d F Y') }}</span>
                </div>
            </div>

            {{-- 3. Ini link utama yang menutupi seluruh kartu --}}
            <a href="{{ route('berita.show', $artikel) }}" class="absolute inset-0 z-0">
                <span class="sr-only">Baca selengkapnya tentang {{ $artikel->judul }}</span>
            </a>

        </div>
    @empty
        <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-16 bg-white rounded-2xl shadow-lg">
            <i class="fas fa-search fa-3x text-slate-300 mb-4"></i>
            <h3 class="text-xl font-semibold text-slate-700">Berita Tidak Ditemukan</h3>
            <p class="text-slate-500 mt-2">Tidak ada berita yang cocok dengan filter yang dipilih.</p>
        </div>
    @endforelse
</div>

    <div class="mt-16">
        {{ $semuaBerita->links() }}
    </div>
</div>

{{-- Script untuk animasi scroll (opsional) --}}
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const revealEls = document.querySelectorAll('.scroll-reveal');
        const obs = new IntersectionObserver(entries => {
            entries.forEach(e => {
                if (e.isIntersecting) {
                    e.target.classList.add('is-visible');
                    obs.unobserve(e.target);
                }
            });
        }, { threshold: 0.1 });
        revealEls.forEach(el => obs.observe(el));
    });
</script>

@endsection
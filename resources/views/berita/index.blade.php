@extends('layouts.navbar')

@section('content')

    <style>
        @keyframes blob {
            0% {
                transform: translate(0px, 0px) scale(1);
            }

            33% {
                transform: translate(30px, -50px) scale(1.1);
            }

            66% {
                transform: translate(-20px, 20px) scale(0.9);
            }

            100% {
                transform: translate(0px, 0px) scale(1);
            }
        }

        .animate-blob {
            animation: blob 7s infinite;
        }

        .animation-delay-2000 {
            animation-delay: 2s;
        }

        .animation-delay-4000 {
            animation-delay: 4s;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.5);
        }
    </style>

    <!-- Hero Section with Animated Blobs -->
    <section class="relative bg-slate-50 pt-32 pb-20 overflow-hidden">
        <!-- Animated Background Shapes -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0">
            <div
                class="absolute top-0 left-1/4 w-72 h-72 bg-blue-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob">
            </div>
            <div
                class="absolute top-0 right-1/4 w-72 h-72 bg-violet-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000">
            </div>
            <div
                class="absolute -bottom-8 left-1/3 w-72 h-72 bg-pink-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000">
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <div
                class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/50 backdrop-blur-sm border border-white/60 shadow-sm mb-6">
                <span class="flex h-2 w-2 relative">
                    <span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                </span>
                <span class="text-slate-600 text-sm font-medium tracking-wide uppercase">HIMAFORTIC Newsroom</span>
            </div>

            <h1 class="text-5xl md:text-6xl font-black text-slate-900 mb-6 tracking-tight leading-tight">
                Berita & <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-violet-600">Artikel</span>
            </h1>

            <p class="text-lg text-slate-600 max-w-2xl mx-auto leading-relaxed">
                Dapatkan informasi terbaru seputar kegiatan, prestasi, dan wawasan teknologi dari Himpunan Mahasiswa
                Manajemen Informatika.
            </p>
        </div>
    </section>

    <!-- Content Section -->
    <div class="bg-white relative z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

            <!-- Search & Filter Section -->
            <div class="mb-16 space-y-8">
                <!-- Search Bar -->
                <div class="max-w-2xl mx-auto relative z-20">
                    <form action="{{ route('berita.index') }}" method="GET" class="relative group">
                        @if($selectedKategori)
                            <input type="hidden" name="kategori" value="{{ $selectedKategori }}">
                        @endif

                        <div
                            class="absolute inset-0 bg-gradient-to-r from-blue-500 to-violet-500 rounded-full blur opacity-25 group-hover:opacity-40 transition duration-500">
                        </div>

                        <div
                            class="relative flex items-center bg-white rounded-full shadow-lg border border-slate-100 p-2 transition-transform duration-300 group-hover:scale-[1.01]">
                            <div class="pl-6 text-slate-400">
                                <i class="fas fa-search text-lg"></i>
                            </div>
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="Cari berita, artikel, atau topik menarik..."
                                class="w-full px-4 py-3 bg-transparent border-none focus:ring-0 text-slate-700 placeholder-slate-400 text-base">
                            <button type="submit"
                                class="px-8 py-3 bg-slate-900 text-white rounded-full font-semibold text-sm hover:bg-blue-600 transition-colors duration-300 shadow-md">
                                Cari
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Filter Categories -->
                <div class="flex flex-wrap justify-center gap-3 relative z-10">
                    <a href="{{ route('berita.index', ['search' => request('search')]) }}"
                        class="px-6 py-2.5 rounded-full text-sm font-bold transition-all duration-300 transform hover:-translate-y-0.5 border
                       {{ !$selectedKategori ? 'bg-blue-600 text-white border-blue-600 shadow-lg shadow-blue-600/25' : 'bg-white text-slate-600 border-slate-200 hover:border-blue-600 hover:text-blue-600' }}">
                        Semua
                    </a>
                    @foreach ($kategories as $kategori)
                        <a href="{{ route('berita.index', ['kategori' => $kategori->slug, 'search' => request('search')]) }}"
                            class="px-6 py-2.5 rounded-full text-sm font-bold transition-all duration-300 transform hover:-translate-y-0.5 border
                               {{ $selectedKategori == $kategori->slug ? 'bg-blue-600 text-white border-blue-600 shadow-lg shadow-blue-600/25' : 'bg-white text-slate-600 border-slate-200 hover:border-blue-600 hover:text-blue-600' }}">
                            {{ $kategori->nama }}
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Articles Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($semuaBerita as $artikel)
                    <article
                        class="group relative bg-white rounded-3xl overflow-hidden border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-500 hover:-translate-y-1">
                        <!-- Image -->
                        <div class="aspect-[4/3] overflow-hidden relative">
                            <div class="absolute inset-0 bg-slate-900/10 group-hover:bg-transparent transition-colors z-10">
                            </div>
                            <img src="{{ $artikel->gambar_utama ? asset('storage/' . $artikel->gambar_utama) : 'https://via.placeholder.com/800x600/f1f5f9/94a3b8?text=No+Image' }}"
                                alt="{{ $artikel->judul }}"
                                class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">

                            <!-- Category Badge -->
                            <div class="absolute top-4 left-4 z-20">
                                <span
                                    class="px-3 py-1 bg-white/90 backdrop-blur-md text-xs font-bold text-slate-900 rounded-lg shadow-sm">
                                    {{ $artikel->kategori->nama }}
                                </span>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-8">
                            <div class="flex items-center gap-3 text-xs text-slate-500 mb-4 font-medium">
                                <span class="flex items-center gap-1">
                                    <i class="far fa-calendar"></i>
                                    {{ \Carbon\Carbon::parse($artikel->tanggal_publikasi)->translatedFormat('d M Y') }}
                                </span>
                                <span class="w-1 h-1 rounded-full bg-slate-300"></span>
                                <span class="flex items-center gap-1">
                                    <i class="far fa-clock"></i>
                                    3 min read
                                </span>
                            </div>

                            <h3
                                class="text-xl font-bold text-slate-900 mb-3 group-hover:text-blue-600 transition-colors line-clamp-2">
                                <a href="{{ route('berita.show', $artikel) }}">
                                    {{ $artikel->judul }}
                                </a>
                            </h3>

                            <p class="text-slate-600 text-sm leading-relaxed line-clamp-3 mb-6">
                                {{ Str::limit(strip_tags($artikel->konten), 120) }}
                            </p>

                            <div class="flex items-center justify-between pt-6 border-t border-slate-100">
                                <div class="flex items-center gap-2">
                                    <div
                                        class="w-8 h-8 rounded-full bg-gradient-to-br from-blue-500 to-violet-500 flex items-center justify-center text-white text-xs font-bold">
                                        H
                                    </div>
                                    <span class="text-xs font-medium text-slate-700">Admin Himafortic</span>
                                </div>
                                <a href="{{ route('berita.show', $artikel) }}"
                                    class="w-8 h-8 rounded-full bg-slate-50 flex items-center justify-center text-slate-400 group-hover:bg-blue-600 group-hover:text-white transition-all duration-300">
                                    <i
                                        class="fas fa-arrow-right transform -rotate-45 group-hover:rotate-0 transition-transform duration-300"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full py-20 text-center">
                        <div class="w-24 h-24 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="far fa-newspaper text-4xl text-slate-300"></i>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-2">Belum ada berita</h3>
                        <p class="text-slate-500">Nantikan informasi terbaru dari kami.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-16">
                {{ $semuaBerita->links() }}
            </div>
        </div>
    </div>

@endsection
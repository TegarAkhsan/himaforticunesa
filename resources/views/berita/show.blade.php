@extends('layouts.navbar')

@section('title', $berita->judul . ' - HIMAFORTIC UNESA')
@section('description', Str::limit(strip_tags($berita->konten), 160))
@section('og_image', $berita->gambar_utama ? asset('storage/' . $berita->gambar_utama) : asset('assets/logo-himafortic.png'))

@section('content')

    <!-- Premium Hero Section -->
    <section class="relative bg-gradient-to-br from-slate-900 via-blue-900 to-slate-800 py-20 text-white overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\" 60\"
                height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\"
                fill-rule=\"evenodd\"%3E%3Cg fill=\"%23ffffff\" fill-opacity=\"0.1\"%3E%3Ccircle cx=\"30\" cy=\"30\"
                r=\"2\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        </div>

        <!-- Floating Elements -->
        <div class="absolute top-10 left-10 w-20 h-20 bg-blue-500 rounded-full opacity-20 animate-pulse"></div>
        <div class="absolute bottom-10 right-10 w-16 h-16 bg-cyan-400 rounded-full opacity-30 animate-bounce"></div>

        <div class="max-w-6xl mx-auto px-4 relative z-10">
            <div class="text-center">
                <div
                    class="inline-flex items-center gap-2 bg-blue-500/20 backdrop-blur-sm rounded-full px-4 py-2 mb-6 border border-blue-400/30">
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

    <!-- Main Content -->
    <div class="bg-gradient-to-b from-slate-50 to-blue-50 py-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">

                {{-- ================= MAIN CONTENT ================= --}}
                <main class="lg:col-span-3">
                    <article
                        class="bg-white rounded-2xl shadow-2xl border border-slate-100 overflow-hidden transition-all duration-300 hover:shadow-3xl">

                        <!-- Article Header -->
                        <header class="relative p-8 border-b border-slate-100">
                            <!-- Category Badge -->
                            <div class="flex items-center justify-between mb-4">
                                <a href="{{ route('berita.index', ['kategori' => $berita->kategori?->slug]) }}"
                                    class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-500 to-cyan-500 text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-0.5">
                                    <i class="fas fa-tag text-xs"></i>
                                    {{ $berita->kategori?->nama ?? 'Umum' }}
                                </a>

                                <!-- Date -->
                                <span class="text-slate-500 text-sm flex items-center gap-1">
                                    <i class="far fa-clock"></i>
                                    {{ $berita->created_at->translatedFormat('d F Y') }}
                                </span>
                            </div>

                            <!-- Title -->
                            <h1 class="text-3xl lg:text-4xl font-bold text-slate-800 leading-tight mb-4">
                                {{ $berita->judul }}
                            </h1>

                            <!-- Author & Stats -->
                            <div class="flex items-center gap-6 text-slate-600 text-sm">
                                <div class="flex items-center gap-2">
                                    <div
                                        class="w-8 h-8 bg-gradient-to-r from-blue-400 to-cyan-400 rounded-full flex items-center justify-center text-white text-xs font-bold">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <span>HIMAFORTIC</span>
                                </div>
                            </div>
                        </header>

                        <!-- Featured Image -->
                        @if($berita->gambar_utama)
                            <figure class="relative overflow-hidden">
                                <img src="{{ asset('storage/' . $berita->gambar_utama) }}"
                                    class="w-full h-96 object-cover transition-transform duration-700 hover:scale-105"
                                    alt="{{ $berita->judul }}">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                            </figure>
                        @endif

                        <!-- Article Content -->
                        <section class="p-8 prose prose-lg max-w-none">
                            <div class="article-content text-slate-700 leading-relaxed">
                                {!! $berita->konten !!}
                            </div>

                            <!-- Tags -->
                            <div class="mt-8 pt-6 border-t border-slate-100">
                                <div class="flex flex-wrap gap-2">
                                    <span class="text-slate-500 text-sm font-medium">Tags:</span>
                                    @foreach(['Teknologi', 'Pendidikan', 'HIMAFORTIC', 'Mahasiswa'] as $tag)
                                        <span
                                            class="bg-slate-100 text-slate-700 px-3 py-1 rounded-full text-sm hover:bg-blue-100 hover:text-blue-700 transition-colors cursor-pointer">
                                            #{{ $tag }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        </section>
                    </article>
                </main>

                {{-- ================= SIDEBAR ================= --}}
                <aside class="lg:col-span-1">
                    <div class="sticky top-8 space-y-8">

                        <!-- Berita Lainnya Section -->
                        <div class="bg-white rounded-2xl shadow-xl border border-slate-100 overflow-hidden">
                            <!-- Section Header -->
                            <div class="bg-gradient-to-r from-blue-600 to-cyan-600 p-6">
                                <h3 class="text-white font-bold text-lg flex items-center gap-2">
                                    <i class="fas fa-fire text-orange-300"></i>
                                    Berita Lainnya
                                </h3>
                                <p class="text-blue-100 text-sm mt-1">Artikel terbaru yang mungkin Anda suka</p>
                            </div>

                            <!-- News List -->
                            <div class="p-1 max-h-[600px] overflow-y-auto custom-scrollbar">
                                @forelse ($beritaLain as $item)
                                    <a href="{{ route('berita.show', $item) }}"
                                        class="group block p-4 hover:bg-blue-50 rounded-xl transition-all duration-300 border-b border-slate-100 last:border-b-0">
                                        <div class="flex gap-4">
                                            <!-- Thumbnail -->
                                            @if($item->gambar_utama)
                                                <div class="flex-shrink-0 relative">
                                                    <img src="{{ asset('storage/' . $item->gambar_utama) }}"
                                                        alt="{{ $item->judul }}"
                                                        class="w-20 h-20 rounded-xl object-cover shadow-md group-hover:shadow-lg transition-all duration-300 group-hover:scale-105">
                                                    <div
                                                        class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent rounded-xl">
                                                    </div>
                                                </div>
                                            @else
                                                <div
                                                    class="flex-shrink-0 w-20 h-20 bg-gradient-to-br from-blue-400 to-cyan-400 rounded-xl flex items-center justify-center text-white shadow-md">
                                                    <i class="fas fa-newspaper text-xl"></i>
                                                </div>
                                            @endif

                                            <!-- Content -->
                                            <div class="flex-1 min-w-0">
                                                <h4
                                                    class="font-semibold text-slate-800 group-hover:text-blue-700 transition-colors line-clamp-2 leading-tight mb-2">
                                                    {{ $item->judul }}
                                                </h4>
                                                <div class="flex items-center gap-3 text-xs text-slate-500">
                                                    <span class="flex items-center gap-1">
                                                        <i class="far fa-clock"></i>
                                                        {{ $item->created_at->diffForHumans() }}
                                                    </span>
                                                    <span class="flex items-center gap-1">
                                                        <i class="far fa-eye"></i>
                                                        {{ rand(50, 500) }}
                                                    </span>
                                                </div>
                                                <div class="mt-2">
                                                    <span
                                                        class="inline-block bg-blue-100 text-blue-700 text-xs px-2 py-1 rounded-full">
                                                        {{ $item->kategori?->nama ?? 'Umum' }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @empty
                                    <div class="p-6 text-center text-slate-500">
                                        <i class="fas fa-inbox text-4xl text-slate-300 mb-3"></i>
                                        <p class="text-sm">Tidak ada berita lainnya</p>
                                    </div>
                                @endforelse
                            </div>

                            <!-- View All Button -->
                            <div class="p-4 border-t border-slate-100">
                                <a href="{{ route('berita.index') }}"
                                    class="w-full bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-600 hover:to-cyan-600 text-white font-semibold py-3 px-4 rounded-xl transition-all duration-300 transform hover:-translate-y-0.5 shadow-lg hover:shadow-xl flex items-center justify-center gap-2">
                                    <i class="fas fa-list"></i>
                                    Lihat Semua Berita
                                </a>
                            </div>
                        </div>

                        <!-- Quick Links -->
                        <div class="bg-white rounded-2xl shadow-xl border border-slate-100 p-6">
                            <h4 class="font-bold text-slate-800 mb-4 flex items-center gap-2">
                                <i class="fas fa-link text-blue-500"></i>
                                Quick Links
                            </h4>

                            <div class="space-y-2">
                                @php
                                    $quickLinks = [
                                        ['label' => 'Tentang Kami', 'url' => url('/departemen')],
                                        ['label' => 'History', 'url' => url('/history')],
                                        ['label' => 'Merch', 'url' => url('/merchandise')],
                                    ];
                                @endphp

                                @foreach($quickLinks as $link)
                                    <a href="{{ $link['url'] }}"
                                        class="flex items-center gap-3 p-3 rounded-xl hover:bg-blue-50 text-slate-700 hover:text-blue-700 transition-all duration-300 group">
                                        <div
                                            class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center group-hover:bg-blue-500 transition-colors">
                                            <i
                                                class="fas fa-arrow-right text-blue-500 group-hover:text-white text-xs transition-colors"></i>
                                        </div>
                                        <span class="font-medium">{{ $link['label'] }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </aside>

            </div>
        </div>
    </div>

    <!-- Custom Styles -->
    <style>
        .article-content {
            font-size: 1.125rem;
            line-height: 1.8;
        }

        .article-content h1,
        .article-content h2,
        .article-content h3 {
            font-weight: 700;
            margin-top: 2em;
            margin-bottom: 1em;
            color: #0f172a;
            position: relative;
        }

        .article-content h2::before {
            content: '';
            position: absolute;
            left: 0;
            bottom: -8px;
            width: 50px;
            height: 3px;
            background: linear-gradient(90deg, #3b82f6, #06b6d4);
            border-radius: 2px;
        }

        .article-content p {
            margin-bottom: 1.5rem;
            color: #475569;
        }

        .article-content ul,
        .article-content ol {
            padding-left: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .article-content li {
            margin-bottom: 0.5rem;
            position: relative;
        }

        .article-content ul li::before {
            content: '•';
            color: #3b82f6;
            font-weight: bold;
            position: absolute;
            left: -1rem;
        }

        .article-content blockquote {
            border-left: 4px solid #3b82f6;
            padding-left: 1.5rem;
            font-style: italic;
            color: #475569;
            background: linear-gradient(90deg, #f8fafc, #ffffff);
            border-radius: 0 12px 12px 0;
            margin: 2rem 0;
            padding: 1.5rem;
        }

        .article-content img {
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            margin: 2rem 0;
        }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #3b82f6, #06b6d4);
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, #2563eb, #0891b2);
        }

        .shadow-3xl {
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        /* Responsive adjustments */
        @media (max-width: 1024px) {
            .grid-cols-1.lg\:grid-cols-4 {
                grid-template-columns: 1fr;
            }

            main.lg\:col-span-3 {
                grid-column: 1;
            }

            aside.lg\:col-span-1 {
                grid-column: 1;
            }

            .sticky {
                position: relative;
                top: 0;
            }
        }

        /* Animation for elements */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .article-content>* {
            animation: fadeInUp 0.6s ease-out forwards;
        }

        .article-content>*:nth-child(1) {
            animation-delay: 0.1s;
        }

        .article-content>*:nth-child(2) {
            animation-delay: 0.2s;
        }

        .article-content>*:nth-child(3) {
            animation-delay: 0.3s;
        }

        .article-content>*:nth-child(4) {
            animation-delay: 0.4s;
        }
    </style>

@endsection
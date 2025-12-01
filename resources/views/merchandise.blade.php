@extends('layouts.navbar')

@section('content')

    <style>
        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        .animate-float-delayed {
            animation: float 8s ease-in-out infinite;
            animation-delay: 2s;
        }

        .bg-grid-pattern {
            background-image: radial-gradient(rgba(255, 255, 255, 0.1) 1px, transparent 1px);
            background-size: 30px 30px;
        }
    </style>

    <!-- Creative Hero Section -->
    <section class="relative bg-[#0f172a] min-h-[60vh] flex items-center justify-center overflow-hidden -mt-20">
        <!-- Abstract Background Elements -->
        <div class="absolute inset-0 bg-grid-pattern opacity-20"></div>

        <!-- Glowing Orbs -->
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-blue-600/20 rounded-full blur-[120px] animate-pulse"></div>
        <div
            class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-violet-600/20 rounded-full blur-[120px] animate-pulse animation-delay-2000">
        </div>

        <!-- Floating 3D Elements -->
        <div
            class="absolute top-20 right-[10%] w-20 h-20 border-4 border-blue-400/20 rounded-2xl rotate-12 animate-float backdrop-blur-sm">
        </div>
        <div
            class="absolute bottom-20 left-[10%] w-24 h-24 border-4 border-violet-400/20 rounded-full animate-float-delayed backdrop-blur-sm">
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center pt-40 pb-32">
            <div
                class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/5 border border-white/10 backdrop-blur-md mb-8 hover:bg-white/10 transition-colors cursor-default">
                <span class="flex h-2 w-2 relative">
                    <span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                </span>
                <span class="text-blue-200 text-sm font-bold tracking-wider uppercase">Official Store</span>
            </div>

            <h1 class="text-6xl md:text-8xl font-black text-white mb-8 tracking-tight leading-tight">
                HIMAFORTIC <br>
                <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 via-violet-400 to-blue-400 animate-gradient bg-300%">Merch</span>
            </h1>

            <p class="text-xl text-slate-400 max-w-2xl mx-auto mb-12 leading-relaxed">
                Tampil beda dengan koleksi merchandise eksklusif yang didesain khusus untuk mahasiswa kreatif dan inovatif.
            </p>

            <div class="flex flex-wrap justify-center gap-4">
                <div
                    class="flex items-center gap-3 px-6 py-3 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-md hover:bg-white/10 transition-all duration-300 group">
                    <div
                        class="w-10 h-10 rounded-full bg-yellow-500/20 flex items-center justify-center group-hover:scale-110 transition-transform">
                        <i class="fas fa-star text-yellow-400"></i>
                    </div>
                    <div class="text-left">
                        <div class="text-white font-bold text-sm">Premium Quality</div>
                        <div class="text-slate-400 text-xs">Best Materials</div>
                    </div>
                </div>
                <div
                    class="flex items-center gap-3 px-6 py-3 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-md hover:bg-white/10 transition-all duration-300 group">
                    <div
                        class="w-10 h-10 rounded-full bg-blue-500/20 flex items-center justify-center group-hover:scale-110 transition-transform">
                        <i class="fas fa-bolt text-blue-400"></i>
                    </div>
                    <div class="text-left">
                        <div class="text-white font-bold text-sm">Limited Edition</div>
                        <div class="text-slate-400 text-xs">Exclusive Designs</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Section -->
    <div class="bg-slate-50 relative z-10 min-h-screen -mt-20">
        <!-- Decorative Curve -->
        <div class="absolute top-0 left-0 w-full overflow-hidden leading-none rotate-180 -translate-y-[99%]">
            <svg class="relative block w-[calc(100%+1.3px)] h-[80px]" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path
                    d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                    class="fill-[#0f172a]"></path>
            </svg>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

            <!-- Categories -->
            <div class="flex justify-center mb-16">
                <div class="inline-flex p-1.5 bg-white rounded-full shadow-lg border border-slate-100">
                    <a href="{{ route('merchandise.index') }}"
                        class="px-6 py-2.5 rounded-full text-sm font-bold transition-all duration-300
                               {{ !$selectedKategori ? 'bg-slate-900 text-white shadow-md' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}">
                        All Items
                    </a>
                    @foreach ($kategories as $kategori)
                        <a href="{{ route('merchandise.index', ['kategori' => $kategori->nama]) }}"
                            class="px-6 py-2.5 rounded-full text-sm font-bold transition-all duration-300
                                               {{ $selectedKategori == $kategori->nama ? 'bg-slate-900 text-white shadow-md' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}">
                            {{ $kategori->nama }}
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Product Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @forelse ($merchandises as $item)
                    <div
                        class="group relative bg-white rounded-3xl shadow-sm hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 overflow-hidden border border-slate-100">

                        <!-- Badges -->
                        <div class="absolute top-4 left-4 z-20 flex flex-col gap-2">
                            @if($item->stok > 0)
                                <span
                                    class="px-3 py-1 bg-green-500/90 backdrop-blur-md text-white text-[10px] font-bold rounded-lg shadow-sm">
                                    READY STOCK
                                </span>
                            @else
                                <span
                                    class="px-3 py-1 bg-red-500/90 backdrop-blur-md text-white text-[10px] font-bold rounded-lg shadow-sm">
                                    SOLD OUT
                                </span>
                            @endif
                        </div>

                        <!-- Image Container -->
                        <div class="relative h-72 bg-slate-100 overflow-hidden">
                            <div
                                class="absolute inset-0 bg-slate-900/0 group-hover:bg-slate-900/10 transition-colors duration-300 z-10">
                            </div>
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama }}"
                                class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 {{ $item->stok == 0 ? 'grayscale opacity-70' : '' }}"
                                onerror="this.src='https://via.placeholder.com/400x400/f1f5f9/94a3b8?text=Product'">

                            <!-- Quick Action Overlay -->
                            @if($item->stok > 0)
                                <div
                                    class="absolute bottom-0 left-0 w-full p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 z-20">
                                    <a href="https://wa.me/6281234648067?text={{ urlencode('Halo, saya tertarik dengan merchandise ' . $item->nama) }}"
                                        target="_blank"
                                        class="block w-full py-3 bg-white text-slate-900 font-bold text-center rounded-xl shadow-lg hover:bg-blue-600 hover:text-white transition-colors">
                                        <i class="fab fa-whatsapp mr-1"></i> Beli Sekarang
                                    </a>
                                </div>
                            @endif
                        </div>

                        <!-- Details -->
                        <div class="p-6">
                            <h3
                                class="text-lg font-bold text-slate-900 mb-2 group-hover:text-blue-600 transition-colors line-clamp-1">
                                {{ $item->nama }}
                            </h3>
                            <p class="text-slate-500 text-sm mb-4 line-clamp-2 h-10">
                                {{ Str::limit($item->deskripsi, 60) }}
                            </p>

                            <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                                <div class="flex flex-col">
                                    <span class="text-xs text-slate-400 font-medium uppercase">Harga</span>
                                    <span class="text-lg font-black text-slate-900">
                                        Rp {{ number_format($item->harga, 0, ',', '.') }}
                                    </span>
                                </div>
                                <div
                                    class="w-10 h-10 rounded-full bg-slate-50 flex items-center justify-center text-slate-300 group-hover:bg-blue-50 group-hover:text-blue-600 transition-colors">
                                    <i class="fas fa-shopping-bag"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-20 text-center">
                        <div
                            class="w-24 h-24 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-6 animate-pulse">
                            <i class="fas fa-box-open text-4xl text-slate-300"></i>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-2">Stok Kosong</h3>
                        <p class="text-slate-500">Nantikan koleksi terbaru kami segera.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-16">
                {{ $merchandises->links() }}
            </div>
        </div>
    </div>

@endsection
@extends('layouts.navbar')

@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Outfit:wght@300;400;500;600;700;800&display=swap');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #020617;
            color: #e2e8f0;
        }

        .font-outfit {
            font-family: 'Outfit', sans-serif;
        }

        /* Glass Cards */
        .glass-card {
            background: rgba(30, 41, 59, 0.4);
            /* Darker, more opaque background (slate-800 with opacity) */
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .glass-card:hover {
            border-color: rgba(139, 92, 246, 0.5);
            background: rgba(30, 41, 59, 0.6);
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        /* Glowing Text */
        .text-glow {
            text-shadow: 0 0 20px rgba(139, 92, 246, 0.5);
        }

        /* Grid Background pattern */
        .bg-grid {
            background-size: 40px 40px;
            background-image:
                linear-gradient(to right, rgba(255, 255, 255, 0.02) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(255, 255, 255, 0.02) 1px, transparent 1px);
            mask-image: radial-gradient(circle at center, black 40%, transparent 100%);
        }
    </style>

    <div class="relative min-h-screen overflow-hidden">
        <!-- Background Elements -->
        <div class="fixed inset-0 z-0 pointer-events-none">
            <div class="absolute inset-0 bg-grid"></div>
            <!-- Ambient Orbs -->
            <div
                class="absolute top-0 left-1/4 w-[500px] h-[500px] bg-violet-600/20 rounded-full blur-[120px] mix-blend-screen opacity-40 animate-pulse">
            </div>
            <div
                class="absolute bottom-0 right-1/4 w-[500px] h-[500px] bg-blue-600/20 rounded-full blur-[120px] mix-blend-screen opacity-40 animate-pulse delay-1000">
            </div>
        </div>

        <div class="relative z-10 pt-16 pb-20">
            <!-- Header Section -->
            <div class="container mx-auto px-4 text-center mb-20">
                <div
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-violet-500/20 bg-violet-500/10 backdrop-blur-sm mb-8">
                    <span class="w-2 h-2 rounded-full bg-violet-400 animate-pulse"></span>
                    <span class="text-white text-xs font-medium tracking-wider uppercase font-outfit">Himafortic
                        Structure</span>
                </div>

                <h1 class="text-5xl md:text-7xl font-bold text-white mb-6 font-outfit tracking-tight">
                    About <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-violet-400 via-fuchsia-400 to-blue-400 text-glow">Himafortic</span>
                </h1>

                <p class="text-slate-400 text-lg max-w-3xl mx-auto leading-relaxed">
                    The Student Association of D4 Informatics Management a place where innovation, leadership,
                    and collaboration grow to shape future technology professionals.
                </p>
            </div>

            <!-- Periode Current Section -->
            @if($periode)
                <div class="max-w-7xl mx-auto px-4 mb-24">
                    <div class="glass-card rounded-[2.5rem] p-1 border border-white/10 relative overflow-hidden group">
                        <!-- Glow behind card -->
                        <div
                            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full h-full bg-gradient-to-r from-violet-500/10 to-blue-500/10 blur-3xl -z-10">
                        </div>

                        <div class="bg-[#020617]/50 rounded-[2.3rem] p-8 md:p-12 overflow-hidden relative">
                            <!-- Background decoration -->
                            <div class="absolute top-0 right-0 p-12 opacity-5 pointer-events-none">
                                <i class="fas fa-users text-9xl text-white"></i>
                            </div>

                            <div class="grid lg:grid-cols-2 gap-12 items-center">
                                <!-- Text Info -->
                                <div class="space-y-8">
                                    <div>
                                        <h2 class="text-3xl md:text-4xl font-bold text-white font-outfit mb-4">
                                            Periode <span class="text-violet-400">{{ $periode->tahun_periode }}</span>
                                        </h2>
                                        <div class="h-1 w-20 bg-gradient-to-r from-violet-500 to-blue-500 rounded-full"></div>
                                    </div>

                                    @if($periode->deskripsi)
                                        <div class="prose prose-invert prose-lg text-slate-300">
                                            {!! $periode->deskripsi !!}
                                        </div>
                                    @endif

                                    <!-- Leaders Mini Cards -->
                                    <div class="flex flex-wrap gap-6 pt-4">
                                        <!-- Ketua -->
                                        <div class="flex items-center gap-4 bg-white/5 p-3 rounded-2xl border border-white/5">
                                            <div class="w-12 h-12 rounded-xl overflow-hidden bg-slate-800">
                                                @if($periode->ketua && $periode->ketua->foto)
                                                    <img src="{{ asset('storage/' . $periode->ketua->foto) }}"
                                                        class="w-full h-full object-cover">
                                                @else
                                                    <div class="w-full h-full flex items-center justify-center text-slate-500">
                                                        <i class="fas fa-user"></i>
                                                    </div>
                                                @endif
                                            </div>
                                            <div>
                                                <div class="text-[10px] uppercase tracking-wider text-violet-400 font-bold">
                                                    Ketua</div>
                                                <div class="text-sm font-bold text-white">
                                                    {{ $periode->ketua->nama ?? '-' }}
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Wakil -->
                                        <div class="flex items-center gap-4 bg-white/5 p-3 rounded-2xl border border-white/5">
                                            <div class="w-12 h-12 rounded-xl overflow-hidden bg-slate-800">
                                                @if($periode->wakil && $periode->wakil->foto)
                                                    <img src="{{ asset('storage/' . $periode->wakil->foto) }}"
                                                        class="w-full h-full object-cover">
                                                @else
                                                    <div class="w-full h-full flex items-center justify-center text-slate-500">
                                                        <i class="fas fa-user"></i>
                                                    </div>
                                                @endif
                                            </div>
                                            <div>
                                                <div class="text-[10px] uppercase tracking-wider text-blue-400 font-bold">Wakil
                                                </div>
                                                <div class="text-sm font-bold text-white">
                                                    {{ $periode->wakil->nama ?? '-' }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Big Photo -->
                                <div class="relative">
                                    @if($periode->foto)
                                        <div
                                            class="relative rounded-2xl overflow-hidden glass-card p-2 transform rotate-2 hover:rotate-0 transition duration-500">
                                            <img src="{{ asset('storage/' . $periode->foto) }}"
                                                class="w-full rounded-xl shadow-2xl">
                                            <!-- Overlay Glint -->
                                            <div
                                                class="absolute inset-0 bg-gradient-to-tr from-white/10 to-transparent pointer-events-none">
                                            </div>
                                        </div>
                                    @else
                                        <div
                                            class="aspect-video rounded-2xl bg-slate-800/50 flex items-center justify-center border border-dashed border-slate-700">
                                            <div class="text-center text-slate-500">
                                                <i class="fas fa-image text-4xl mb-2"></i>
                                                <p>Foto Periode Belum Tersedia</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Departments Grid -->
            <div class="max-w-7xl mx-auto px-4">
                <div class="flex items-center justify-between mb-12">
                    <div>
                        <h2 class="text-3xl font-bold text-white font-outfit mb-2">Departemen</h2>
                        <p class="text-slate-400">Pilar penggerak program kerja HIMAFORTIC</p>
                    </div>
                    <div class="hidden md:flex gap-2">
                        <div class="w-2 h-2 rounded-full bg-violet-500"></div>
                        <div class="w-2 h-2 rounded-full bg-blue-500"></div>
                        <div class="w-2 h-2 rounded-full bg-cyan-500"></div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($departemen as $item)
                        <a href="{{ url('/departemen/' . $item->slug) }}" class="group block h-full">
                            <div
                                class="glass-card rounded-3xl h-full flex flex-col relative overflow-hidden transition-all duration-300 group-hover:bg-slate-800/50">
                                <!-- Department Image -->
                                <div class="relative h-48 overflow-hidden bg-slate-900 border-b border-white/5">
                                    @if ($item->foto)
                                        <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}"
                                            class="w-full h-full object-cover transform group-hover:scale-105 transition duration-700">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center">
                                            <i
                                                class="fas fa-building text-5xl text-slate-700 group-hover:text-violet-500/50 transition-colors duration-500"></i>
                                        </div>
                                    @endif

                                    <!-- Gradient Overlay -->
                                    <div class="absolute inset-0 bg-gradient-to-t from-[#020617] to-transparent opacity-60">
                                    </div>

                                    <!-- Icon badge -->
                                    <div
                                        class="absolute top-4 right-4 translate-x-10 group-hover:translate-x-0 transition-transform duration-300">
                                        <div
                                            class="w-8 h-8 rounded-full bg-violet-500 flex items-center justify-center shadow-lg shadow-violet-500/30">
                                            <i class="fas fa-arrow-right text-white text-xs"></i>
                                        </div>
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="p-6 flex-1 flex flex-col">
                                    <h3
                                        class="text-xl font-bold text-white mb-2 font-outfit group-hover:text-violet-400 transition-colors">
                                        {{ $item->nama }}
                                    </h3>

                                    <p class="text-slate-400 text-sm line-clamp-3 mb-4 flex-1">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($item->deskripsi), 80, '...') }}
                                    </p>

                                    <div
                                        class="flex items-center gap-2 text-xs font-semibold text-violet-400 opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform translate-y-2 group-hover:translate-y-0">
                                        <span>Lihat Detail</span>
                                        <i class="fas fa-arrow-right"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
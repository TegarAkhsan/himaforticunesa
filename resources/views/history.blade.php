@extends('layouts.navbar')

@section('content')
    <script src="//unpkg.com/alpinejs" defer></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #020617 !important;
            /* Force dark background */
            color: #e2e8f0;
        }

        /* Grid Background */
        .bg-grid-dark {
            background-size: 50px 50px;
            background-image:
                linear-gradient(to right, rgba(30, 41, 59, 0.5) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(30, 41, 59, 0.5) 1px, transparent 1px);
            mask-image: linear-gradient(to bottom, black 40%, transparent 100%);
        }

        /* Glowing Path Animation */
        .roadmap-path-glow {
            stroke-dasharray: 1000;
            stroke-dashoffset: 1000;
            animation: dash 3s ease-out forwards;
            filter: drop-shadow(0 0 8px rgba(139, 92, 246, 0.6));
        }

        @keyframes dash {
            to {
                stroke-dashoffset: 0;
            }
        }

        /* Node Styles */
        .node-glow {
            filter: drop-shadow(0 0 10px rgba(139, 92, 246, 0.8));
            transition: all 0.3s ease;
        }

        .node-glow:hover {
            filter: drop-shadow(0 0 15px rgba(139, 92, 246, 1));
            cursor: pointer;
        }

        .node-active {
            fill: #8b5cf6;
            stroke: #fff;
            stroke-width: 3px;
            filter: drop-shadow(0 0 15px rgba(139, 92, 246, 1));
        }
    </style>

    <div class="min-h-screen relative overflow-hidden" x-data="{
                            selectedYear: '{{ $periodes->first()?->tahun_periode ?? date('Y') }}',
                            periodes: {{ $periodes->toJson() }},
                            get currentPeriode() {
                                return this.periodes.find(p => p.tahun_periode == this.selectedYear) || null;
                            }
                        }">

        <!-- Background Grid & Glow (Fixed to cover entire screen including behind navbar) -->
        <div class="fixed inset-0 z-0 pointer-events-none">
            <div
                class="absolute inset-0 bg-[linear-gradient(to_right,#1e293b_1px,transparent_1px),linear-gradient(to_bottom,#1e293b_1px,transparent_1px)] bg-[size:4rem_4rem] [mask-image:radial-gradient(ellipse_60%_50%_at_50%_0%,#000_70%,transparent_100%)] opacity-[0.15]">
            </div>
            <div
                class="absolute top-0 left-1/2 -translate-x-1/2 w-[1000px] h-[600px] bg-blue-600/20 rounded-full blur-[120px] opacity-40 mix-blend-screen animate-pulse">
            </div>
            <div
                class="absolute bottom-0 right-0 w-[800px] h-[600px] bg-violet-600/10 rounded-full blur-[100px] opacity-30 mix-blend-screen">
            </div>
        </div>

        <!-- Header -->
        <div class="relative pt-12 text-center z-10">
            <div
                class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-violet-900/30 border border-violet-500/30 text-violet-300 text-sm font-medium mb-6 backdrop-blur-sm">
                <span class="w-2 h-2 rounded-full bg-violet-400 animate-pulse"></span>
                HIMAFORTIC Timeline
            </div>
            <h1 class="text-5xl md:text-7xl font-extrabold text-white mb-6 tracking-tight">
                Our <span class="text-transparent bg-clip-text bg-gradient-to-r from-violet-400 to-blue-400">Legacy</span>
            </h1>
            <p class="text-lg text-slate-400 max-w-2xl mx-auto">
                Exploring the milestones and leadership that shaped our journey.
            </p>
        </div>

        <!-- Roadmap SVG Section -->
        <div class="relative py-8 overflow-hidden z-10">
            <div class="max-w-6xl mx-auto px-4 relative">

                <!-- Mobile View (Vertical) -->
                <div class="md:hidden space-y-6 relative">
                    <div class="absolute left-[11px] top-4 bottom-4 w-0.5 bg-slate-800"></div>
                    <template x-for="periode in periodes" :key="periode.id">
                        <div @click="selectedYear = periode.tahun_periode" class="relative pl-10 cursor-pointer group">

                            <div class="absolute left-0 top-1 w-6 h-6 rounded-full border-2 transition-all duration-300 z-10"
                                :class="selectedYear == periode.tahun_periode ? 'bg-violet-600 border-white shadow-[0_0_15px_rgba(139,92,246,0.8)]' : 'bg-slate-900 border-slate-600 group-hover:border-violet-400'">
                            </div>

                            <div class="p-4 rounded-xl border transition-all duration-300 backdrop-blur-sm"
                                :class="selectedYear == periode.tahun_periode ? 'bg-violet-900/20 border-violet-500/50' : 'bg-slate-900/40 border-slate-800 hover:border-slate-600'">
                                <span class="text-xl font-bold block"
                                    :class="selectedYear == periode.tahun_periode ? 'text-white' : 'text-slate-400'"
                                    x-text="periode.tahun_periode"></span>
                                <span class="text-xs text-slate-500 uppercase tracking-wider"
                                    x-text="selectedYear == periode.tahun_periode ? 'Active' : 'View Details'"></span>
                            </div>
                        </div>
                    </template>
                </div>

                <!-- Desktop View (Winding SVG) -->
                <div class="hidden md:block relative h-[400px] w-full">
                    <svg class="absolute inset-0 w-full h-full" viewBox="0 0 1000 400" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <!-- Base Path (Dim) -->
                        <path
                            d="M50 200 C 160 200, 160 100, 275 100 S 390 200, 500 200 S 610 300, 725 300 S 840 200, 950 200"
                            stroke="#1e293b" stroke-width="4" stroke-linecap="round" />

                        <!-- Glowing Path (Animated) -->
                        <path
                            d="M50 200 C 160 200, 160 100, 275 100 S 390 200, 500 200 S 610 300, 725 300 S 840 200, 950 200"
                            stroke="url(#gradient)" stroke-width="4" stroke-linecap="round" class="roadmap-path-glow" />

                        <defs>
                            <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="0%">
                                <stop offset="0%" stop-color="#8b5cf6" />
                                <stop offset="100%" stop-color="#3b82f6" />
                            </linearGradient>
                        </defs>

                        <!-- Nodes -->
                        @php
                            $coordinates = [
                                ['x' => 50, 'y' => 200],
                                ['x' => 275, 'y' => 100],
                                ['x' => 500, 'y' => 200],
                                ['x' => 725, 'y' => 300],
                                ['x' => 950, 'y' => 200],
                            ];
                        @endphp

                        @foreach($periodes->take(5) as $index => $periode)
                            @if(isset($coordinates[$index]))
                                <g @click="selectedYear = '{{ $periode->tahun_periode }}'" class="node-glow cursor-pointer">
                                    <circle cx="{{ $coordinates[$index]['x'] }}" cy="{{ $coordinates[$index]['y'] }}" r="12"
                                        :class="selectedYear == '{{ $periode->tahun_periode }}' ? 'node-active' : 'fill-slate-900 stroke-slate-500 stroke-2'" />
                                    <text x="{{ $coordinates[$index]['x'] }}" y="{{ $coordinates[$index]['y'] + 40 }}"
                                        text-anchor="middle" class="font-bold text-sm fill-slate-400"
                                        :class="selectedYear == '{{ $periode->tahun_periode }}' ? 'fill-white' : ''">{{ $periode->tahun_periode }}</text>
                                </g>
                            @endif
                        @endforeach
                    </svg>
                </div>
            </div>
        </div>

        <!-- Details Section -->
        <div class="relative py-12 z-10 min-h-[500px]">
            <div class="max-w-5xl mx-auto px-4">
                <template x-if="currentPeriode">
                    <div class="bg-slate-900/50 backdrop-blur-xl rounded-3xl shadow-2xl overflow-hidden border border-slate-800"
                        x-transition:enter="transition ease-out duration-500"
                        x-transition:enter-start="opacity-0 transform translate-y-8"
                        x-transition:enter-end="opacity-100 transform translate-y-0">

                        <!-- Content Grid -->
                        <div class="grid grid-cols-1 lg:grid-cols-2">
                            <!-- Image Side -->
                            <div class="relative h-64 lg:h-auto bg-slate-800">
                                <template x-if="currentPeriode.foto">
                                    <img :src="'/storage/' + currentPeriode.foto"
                                        class="absolute inset-0 w-full h-full object-cover opacity-80 hover:opacity-100 transition duration-500">
                                </template>
                                <template x-if="!currentPeriode.foto">
                                    <div class="absolute inset-0 flex items-center justify-center text-slate-600">
                                        <span class="text-lg font-medium">No Photo Available</span>
                                    </div>
                                </template>
                                <!-- Overlay Gradient -->
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent to-transparent">
                                </div>

                                <div class="absolute bottom-0 left-0 p-8">
                                    <h2 class="text-4xl font-bold text-white mb-2"
                                        x-text="'Periode ' + currentPeriode.tahun_periode"></h2>
                                    <div class="h-1 w-24 bg-gradient-to-r from-violet-500 to-blue-500 rounded-full">
                                    </div>
                                </div>
                            </div>

                            <!-- Info Side -->
                            <div class="p-8 lg:p-12 space-y-8">
                                <!-- Description -->
                                <div>
                                    <h3
                                        class="text-lg font-bold text-violet-400 mb-4 flex items-center gap-2 uppercase tracking-wider text-sm">
                                        <i class="fas fa-star"></i>
                                        Overview
                                    </h3>
                                    <div class="prose prose-invert prose-slate text-slate-300"
                                        x-html="currentPeriode.deskripsi || 'Belum ada deskripsi untuk periode ini.'">
                                    </div>
                                </div>

                                <!-- Leaders -->
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 pt-6 border-t border-slate-800">
                                    <!-- Ketua -->
                                    <div class="flex items-center gap-4 group">
                                        <div
                                            class="w-16 h-16 rounded-full bg-slate-800 overflow-hidden flex-shrink-0 border-2 border-slate-700 group-hover:border-violet-500 transition duration-300">
                                            <template x-if="currentPeriode.ketua && currentPeriode.ketua.foto">
                                                <img :src="'/storage/' + currentPeriode.ketua.foto"
                                                    class="w-full h-full object-cover">
                                            </template>
                                            <template x-if="!currentPeriode.ketua || !currentPeriode.ketua.foto">
                                                <div class="w-full h-full flex items-center justify-center text-slate-600">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </template>
                                        </div>
                                        <div>
                                            <div class="text-xs font-bold text-violet-400 uppercase tracking-wider mb-1">
                                                Ketua</div>
                                            <div class="font-bold text-white group-hover:text-violet-300 transition"
                                                x-text="currentPeriode.ketua ? currentPeriode.ketua.nama : '-'"></div>
                                        </div>
                                    </div>

                                    <!-- Wakil -->
                                    <div class="flex items-center gap-4 group">
                                        <div
                                            class="w-16 h-16 rounded-full bg-slate-800 overflow-hidden flex-shrink-0 border-2 border-slate-700 group-hover:border-blue-500 transition duration-300">
                                            <template x-if="currentPeriode.wakil && currentPeriode.wakil.foto">
                                                <img :src="'/storage/' + currentPeriode.wakil.foto"
                                                    class="w-full h-full object-cover">
                                            </template>
                                            <template x-if="!currentPeriode.wakil || !currentPeriode.wakil.foto">
                                                <div class="w-full h-full flex items-center justify-center text-slate-600">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </template>
                                        </div>
                                        <div>
                                            <div class="text-xs font-bold text-blue-400 uppercase tracking-wider mb-1">
                                                Wakil
                                                Ketua</div>
                                            <div class="font-bold text-white group-hover:text-blue-300 transition"
                                                x-text="currentPeriode.wakil ? currentPeriode.wakil.nama : '-'"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>

                <!-- Empty State -->
                <template x-if="!currentPeriode">
                    <div class="text-center py-20 bg-slate-900/30 rounded-3xl border border-slate-800 border-dashed">
                        <div
                            class="w-20 h-20 bg-slate-800 rounded-full flex items-center justify-center mx-auto mb-6 text-slate-500">
                            <i class="fas fa-history text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-2">Data Belum Tersedia</h3>
                        <p class="text-slate-500">Belum ada catatan sejarah untuk tahun <span x-text="selectedYear"></span>.
                        </p>
                    </div>
                </template>
            </div>
        </div>
    </div>
@endsection
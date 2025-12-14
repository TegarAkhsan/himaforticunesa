@extends('layouts.navbar')

@section('title', 'History & Timeline - HIMAFORTIC UNESA')
@section('description', 'Jejak langkah kepemimpinan dan sejarah Himpunan Mahasiswa Manajemen Informatika (HIMAFORTIC) UNESA dari masa ke masa.')

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

        /* Marquee Animation */
        @keyframes scrollLeft {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        @keyframes scrollRight {
            0% {
                transform: translateX(-50%);
            }

            100% {
                transform: translateX(0);
            }
        }

        .animate-scroll-left {
            animation: scrollLeft 40s linear infinite;
        }

        .animate-scroll-right {
            animation: scrollRight 40s linear infinite;
        }

        .animate-scroll-left:hover,
        .animate-scroll-right:hover {
            animation-play-state: paused;
        }

        .marquee-mask {
            mask-image: linear-gradient(to right, transparent, black 10%, black 90%, transparent);
            -webkit-mask-image: linear-gradient(to right, transparent, black 10%, black 90%, transparent);
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
                                                                                    },
                                                                                    get gallery() {
                                                                                        const p = this.currentPeriode;
                                                                                        if (!p) return [];

                                                                                        let allPhotos = [];

                                                                                        // 1. Uploaded Gallery
                                                                                        if (p.galleries && p.galleries.length > 0) {
                                                                                            allPhotos.push(...p.galleries.map(g => ({ path: g.image_path, caption: g.caption })));
                                                                                        }

                                                                                        // 2. Program Kerja Photos (Legacy)
                                                                                        if (p.departemen) {
                                                                                            p.departemen.forEach(dep => {
                                                                                                if (dep.program_kerja) {
                                                                                                    dep.program_kerja.forEach(proker => {
                                                                                                        if (proker.foto_program) {
                                                                                                            proker.foto_program.forEach(fp => {
                                                                                                                if (fp.foto1) allPhotos.push({ path: fp.foto1, caption: proker.nama });
                                                                                                                if (fp.foto2) allPhotos.push({ path: fp.foto2, caption: proker.nama });
                                                                                                                if (fp.foto3) allPhotos.push({ path: fp.foto3, caption: proker.nama });
                                                                                                            });
                                                                                                        }
                                                                                                    });
                                                                                                }
                                                                                            });
                                                                                        }

                                                                                        // Shuffle
                                                                                        return allPhotos.sort(() => 0.5 - Math.random());
                                                                                    },
                                                                            get staff1() {
                                                                                const all = this.staff;
                                                                                const mid = Math.ceil(all.length / 2);
                                                                                return all.slice(0, mid);
                                                                            },
                                                                            get staff2() {
                                                                                const all = this.staff;
                                                                                const mid = Math.ceil(all.length / 2);
                                                                                return all.slice(mid);
                                                                            },
                                                                            get staff() {
                                                                                const p = this.currentPeriode;
                                                                                if (!p) return [];
                                                                                let members = [];

                                                                                // 1. Add Leaders
                                                                                if (p.ketua) members.push({ name: p.ketua.nama, photo: p.ketua.foto, position: 'Ketua Himpunan', nim: p.ketua.nim });
                                                                                if (p.wakil) members.push({ name: p.wakil.nama, photo: p.wakil.foto, position: 'Wakil Ketua', nim: p.wakil.nim });

                                                                                // 2. Add Department Members
                                                                                if (p.departemen && p.departemen.length > 0) {
                                                                                    p.departemen.forEach(dep => {
                                                                                        if (dep.anggota && dep.anggota.length > 0) {
                                                                                            dep.anggota.forEach(ang => {
                                                                                                if(ang.mahasiswa) {
                                                                                                    members.push({
                                                                                                        name: ang.mahasiswa.nama,
                                                                                                        photo: ang.mahasiswa.foto,
                                                                                                        position: ang.jabatan || 'Anggota ' + dep.nama,
                                                                                                        nim: ang.mahasiswa.nim
                                                                                                    });
                                                                                                }
                                                                                            });
                                                                                        }
                                                                                    });
                                                                                }

                                                                                return members;
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

        <!-- Details Section (Hero Style) -->
        <div class="relative py-20 z-10 min-h-[600px] flex items-center">
            <div class="max-w-7xl mx-auto px-4 w-full">
                <template x-if="currentPeriode">
                    <div class="flex flex-col md:flex-row gap-12 lg:gap-20 items-center"
                        x-transition:enter="transition ease-out duration-700" x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100">

                        <!-- Left Column: Typography & Description -->
                        <div class="w-full md:w-1/2 order-1 relative z-10 min-w-0">
                            <!-- Decorative Label -->
                            <div
                                class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-violet-900/30 border border-violet-500/30 backdrop-blur-md mb-6">
                                <span class="w-1.5 h-1.5 rounded-full bg-green-400 animate-pulse"></span>
                                <span
                                    class="text-xs font-semibold text-violet-200 tracking-wide uppercase">Kepengurusan</span>
                            </div>

                            <!-- Massive Typography (Consolidated) -->
                            <h1
                                class="text-5xl md:text-7xl lg:text-8xl font-black text-white leading-tight tracking-tighter mb-4 break-words">
                                HIMAFORTIC
                                <span
                                    class="block text-transparent bg-clip-text bg-gradient-to-r from-violet-400 via-blue-400 to-green-400"
                                    x-text="currentPeriode.tahun_periode"></span>
                            </h1>

                            <!-- Description -->
                            <div class="w-full max-w-none prose prose-lg prose-invert text-slate-300 leading-relaxed mb-10 border-l-4 border-violet-500/50 pl-6 break-words"
                                x-html="currentPeriode.deskripsi || 'Belum ada deskripsi untuk periode ini.'">
                            </div>
                        </div>

                        <!-- Right Column: Floating Cards (Visuals) -->
                        <div
                            class="w-full md:w-1/2 order-2 relative h-[500px] lg:h-[600px] flex items-center justify-center lg:justify-end">

                            <!-- Abstract Background Elements & Strong Glow -->
                            <div class="absolute inset-0 z-0">
                                <!-- Strong Central Glow -->
                                <div
                                    class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[300px] md:w-[400px] h-[300px] md:h-[400px] bg-violet-600/40 rounded-full blur-[120px] animate-pulse mix-blend-screen">
                                </div>
                                <div
                                    class="absolute top-1/4 right-0 w-[200px] h-[200px] bg-blue-500/30 rounded-full blur-[90px]">
                                </div>
                                <!-- Dotted pattern -->
                                <div
                                    class="absolute inset-0 bg-[radial-gradient(#ffffff1a_1px,transparent_1px)] [background-size:20px_20px] opacity-20">
                                </div>
                            </div>

                            <!-- Connecting Line (Curved SVG) - visible on MD+ -->
                            <svg class="hidden md:block absolute inset-0 w-full h-full pointer-events-none z-0 opacity-60"
                                viewBox="0 0 600 600" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M100 150 C 200 150, 250 300, 350 450" stroke="url(#lineGrad)" stroke-width="2"
                                    stroke-dasharray="10 10" />
                                <defs>
                                    <linearGradient id="lineGrad" x1="0" y1="0" x2="1" y2="1">
                                        <stop offset="0%" stop-color="#8b5cf6" />
                                        <stop offset="100%" stop-color="#3b82f6" />
                                    </linearGradient>
                                </defs>
                            </svg>

                            <!-- Ketua Card (Top Left - Floating) -->
                            <div
                                class="absolute top-4 md:top-10 left-0 md:left-10 lg:left-20 z-20 hover:z-30 transition-all duration-500 hover:scale-105 group perspective">
                                <template x-if="currentPeriode.ketua">
                                    <div
                                        class="relative w-56 md:w-72 bg-slate-900/80 backdrop-blur-xl rounded-3xl p-4 border border-violet-500/30 shadow-[0_0_50px_rgba(139,92,246,0.2)] transform rotate-[-3deg] hover:rotate-0 transition-all duration-500">
                                        <!-- Glow behind card -->
                                        <div class="absolute inset-0 bg-violet-600/20 blur-2xl -z-10 rounded-3xl"></div>

                                        <!-- Photo (Full Color) -->
                                        <div
                                            class="aspect-[4/5] w-full rounded-2xl overflow-hidden mb-4 bg-slate-800 relative shadow-inner">
                                            <img :src="currentPeriode.ketua.foto ? '/storage/' + currentPeriode.ketua.foto : 'https://ui-avatars.com/api/?name=' + currentPeriode.ketua.nama"
                                                class="w-full h-full object-cover transition-all duration-500">
                                            <div
                                                class="absolute bottom-0 inset-x-0 h-24 bg-gradient-to-t from-slate-900 to-transparent">
                                            </div>
                                            <div class="absolute bottom-3 left-3">
                                                <span
                                                    class="px-2 py-1 bg-violet-600/90 text-white text-[10px] font-bold uppercase rounded-md tracking-wider shadow-lg border border-violet-400/20">Ketua</span>
                                            </div>
                                        </div>
                                        <!-- Name -->
                                        <h3 class="text-white font-bold text-base md:text-lg leading-tight mb-1"
                                            x-text="currentPeriode.ketua.nama"></h3>
                                        <p class="text-violet-300 text-[10px] md:text-xs font-mono"
                                            x-text="currentPeriode.ketua.nim"></p>

                                        <!-- Decorative Badge -->
                                        <div
                                            class="absolute -top-4 -right-4 w-10 h-10 md:w-12 md:h-12 bg-gradient-to-br from-violet-500 to-fuchsia-600 rounded-full flex items-center justify-center text-white font-bold shadow-lg border-4 border-[#0b1121]">
                                            <i class="fas fa-crown"></i>
                                        </div>
                                    </div>
                                </template>
                            </div>

                            <!-- Wakil Card (Bottom Right - Floating) -->
                            <div
                                class="absolute bottom-4 md:bottom-10 right-0 md:right-4 lg:right-10 z-10 hover:z-30 transition-all duration-500 hover:scale-105 group perspective">
                                <template x-if="currentPeriode.wakil">
                                    <div
                                        class="relative w-56 md:w-72 bg-slate-900/80 backdrop-blur-xl rounded-3xl p-4 border border-blue-500/30 shadow-[0_0_50px_rgba(59,130,246,0.2)] transform rotate-[3deg] hover:rotate-0 transition-all duration-500">
                                        <!-- Glow behind card -->
                                        <div class="absolute inset-0 bg-blue-600/20 blur-2xl -z-10 rounded-3xl"></div>

                                        <!-- Photo (Full Color) -->
                                        <div
                                            class="aspect-[4/5] w-full rounded-2xl overflow-hidden mb-4 bg-slate-800 relative shadow-inner">
                                            <img :src="currentPeriode.wakil.foto ? '/storage/' + currentPeriode.wakil.foto : 'https://ui-avatars.com/api/?name=' + currentPeriode.wakil.nama"
                                                class="w-full h-full object-cover transition-all duration-500">
                                            <div
                                                class="absolute bottom-0 inset-x-0 h-24 bg-gradient-to-t from-slate-900 to-transparent">
                                            </div>
                                            <div class="absolute bottom-3 left-3">
                                                <span
                                                    class="px-2 py-1 bg-blue-600/90 text-white text-[10px] font-bold uppercase rounded-md tracking-wider shadow-lg border border-blue-400/20">Wakil</span>
                                            </div>
                                        </div>
                                        <!-- Name -->
                                        <h3 class="text-white font-bold text-base md:text-lg leading-tight mb-1"
                                            x-text="currentPeriode.wakil.nama"></h3>
                                        <p class="text-blue-300 text-[10px] md:text-xs font-mono"
                                            x-text="currentPeriode.wakil.nim"></p>
                                    </div>
                                </template>
                            </div>

                        </div>
                    </div>
                </template>

                <!-- Empty State -->
                <template x-if="!currentPeriode">
                    <div class="flex flex-col items-center justify-center h-[500px] text-center">
                        <div class="text-6xl text-slate-700 mb-4"><i class="fas fa-ghost"></i></div>
                        <h2 class="text-3xl font-bold text-slate-500">Pilih Tahun Periode</h2>
                        <p class="text-slate-600">Silakan pilih tahun di timeline untuk melihat sejarah.</p>
                    </div>
                </template>
            </div>
        </div>

        <!-- ================= TEAM SECTION ================= -->
        <div class="relative z-10 py-24 border-t border-white/5 bg-[#020617]">
            <template x-if="currentPeriode">
                <div class="max-w-7xl mx-auto px-4" x-data="{ shown: false }"
                    x-init="new IntersectionObserver((e,o)=>{if(e[0].isIntersecting){shown=true;o.disconnect()}}).observe($el)">

                    <div class="flex flex-col md:flex-row justify-between items-end mb-12"
                        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'"
                        class="transition-all duration-1000 ease-out">
                        <div>
                            <h2 class="text-4xl font-bold font-outfit text-white mb-2">Fungsionaris</h2>
                            <p class="text-slate-400">The dedicated team behind the vision.</p>
                        </div>
                        <div class="h-1 w-32 bg-gradient-to-r from-blue-500 to-transparent mt-4 md:mt-0"></div>
                    </div>

                    <!-- Marquee / Carousel Section -->
                    <div class="relative w-full overflow-hidden marquee-mask" x-show="staff.length > 0">

                        <!-- Row 1: Scroll Left (First Half) -->
                        <div class="flex gap-4 mb-4 animate-scroll-left w-max hover:[animation-play-state:paused] group/marquee"
                            x-show="staff1.length > 0">
                            <template x-for="i in 2">
                                <div class="flex gap-4">
                                    <template x-for="(member, index) in staff1" :key="'staff1-' + index">
                                        <div
                                            class="relative w-72 h-24 bg-slate-800/50 border border-white/5 rounded-2xl flex items-center p-3 gap-4 hover:bg-slate-800 transition-colors group/card shrink-0">
                                            <div
                                                class="w-16 h-16 rounded-xl overflow-hidden border border-white/10 group-hover/card:border-blue-500 transition-colors shrink-0">
                                                <img :src="member.photo ? '/storage/' + member.photo : 'https://ui-avatars.com/api/?name=' + member.name + '&background=random'"
                                                    class="w-full h-full object-cover">
                                            </div>
                                            <div class="overflow-hidden">
                                                <h4 class="text-white font-bold text-sm truncate" x-text="member.name"></h4>
                                                <p class="text-slate-400 text-xs truncate" x-text="member.position"></p>
                                                <p class="text-slate-600 text-[10px] truncate mt-1" x-text="member.nim"></p>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </template>
                        </div>

                        <!-- Row 2: Scroll Right (Second Half) -->
                        <div class="flex gap-4 animate-scroll-right w-max hover:[animation-play-state:paused] group/marquee"
                            x-show="staff2.length > 0">
                            <template x-for="i in 2">
                                <div class="flex gap-4">
                                    <template x-for="(member, index) in staff2" :key="'staff2-' + index">
                                        <div
                                            class="relative w-72 h-24 bg-slate-800/50 border border-white/5 rounded-2xl flex items-center p-3 gap-4 hover:bg-slate-800 transition-colors group/card shrink-0">
                                            <div
                                                class="w-16 h-16 rounded-xl overflow-hidden border border-white/10 group-hover/card:border-violet-500 transition-colors shrink-0">
                                                <img :src="member.photo ? '/storage/' + member.photo : 'https://ui-avatars.com/api/?name=' + member.name + '&background=random'"
                                                    class="w-full h-full object-cover">
                                            </div>
                                            <div class="overflow-hidden">
                                                <h4 class="text-white font-bold text-sm truncate" x-text="member.name"></h4>
                                                <p class="text-slate-400 text-xs truncate" x-text="member.position"></p>
                                                <p class="text-slate-600 text-[10px] truncate mt-1" x-text="member.nim"></p>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </template>
                        </div>
                    </div>

                    <!-- Empty State -->
                    <div x-show="staff.length === 0"
                        class="text-center py-12 border border-dashed border-white/10 rounded-2xl bg-white/5">
                        <i class="fas fa-users-slash text-4xl text-slate-600 mb-4"></i>
                        <p class="text-slate-500">Data fungsionaris belum tersedia.</p>
                    </div>
                </div>
            </template>
        </div>

        <!-- ================= GALLERY SECTION (FADE IN) ================= -->
        <div class="relative z-10 py-24 border-t border-white/5 bg-[#020617]">
            <template x-if="currentPeriode">
                <div class="max-w-7xl mx-auto px-4" x-data="{ shown: false }"
                    x-init="new IntersectionObserver((e,o)=>{if(e[0].isIntersecting){shown=true;o.disconnect()}}).observe($el)">

                    <div class="flex flex-col md:flex-row justify-between items-end mb-12"
                        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'"
                        class="transition-all duration-1000 ease-out">
                        <div>
                            <h2 class="text-4xl font-bold font-outfit text-white mb-2">Our Gallery</h2>
                            <p class="text-slate-400">Captured moments from this period.</p>
                        </div>
                        <div class="h-1 w-32 bg-gradient-to-r from-violet-500 to-transparent mt-4 md:mt-0"></div>
                    </div>

                    <!-- Marquee / Carousel Section -->
                    <div class="relative w-full overflow-hidden marquee-mask" x-show="gallery.length > 0">

                        <!-- Row 1: Scroll Left -->
                        <div
                            class="flex gap-4 mb-4 animate-scroll-left w-max hover:[animation-play-state:paused] group/marquee">
                            <!-- Duplicate loop for seamless infinite scroll -->
                            <template x-for="i in 2">
                                <div class="flex gap-4">
                                    <template x-for="(photo, index) in gallery" :key="'row1-' + index">
                                        <div
                                            class="relative w-64 h-40 md:w-80 md:h-52 rounded-xl overflow-hidden flex-shrink-0 border border-white/10 group/card">
                                            <img :src="'/storage/' + photo.path"
                                                class="w-full h-full object-cover transition duration-500 grayscale group-hover/card:grayscale-0 group-hover/card:scale-110">

                                            <!-- Caption Overlay -->
                                            <div
                                                class="absolute inset-x-0 bottom-0 p-3 bg-gradient-to-t from-black/90 to-transparent translate-y-full group-hover/card:translate-y-0 transition duration-300">
                                                <p class="text-xs text-white font-medium truncate"
                                                    x-text="photo.caption || 'Himafortic Gallery'"></p>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </template>
                        </div>

                        <!-- Row 2: Scroll Right -->
                        <div
                            class="flex gap-4 animate-scroll-right w-max hover:[animation-play-state:paused] group/marquee">
                            <template x-for="i in 2">
                                <div class="flex gap-4">
                                    <template x-for="(photo, index) in gallery" :key="'row2-' + index">
                                        <div
                                            class="relative w-64 h-40 md:w-80 md:h-52 rounded-xl overflow-hidden flex-shrink-0 border border-white/10 group/card">
                                            <img :src="'/storage/' + photo.path"
                                                class="w-full h-full object-cover transition duration-500 grayscale group-hover/card:grayscale-0 group-hover/card:scale-110">

                                            <div
                                                class="absolute inset-x-0 bottom-0 p-3 bg-gradient-to-t from-black/90 to-transparent translate-y-full group-hover/card:translate-y-0 transition duration-300">
                                                <p class="text-xs text-white font-medium truncate"
                                                    x-text="photo.caption || 'Himafortic Gallery'"></p>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </template>
                        </div>
                    </div>

                    <!-- Empty State -->
                    <div x-show="gallery.length === 0"
                        class="text-center py-12 border border-dashed border-white/10 rounded-2xl bg-white/5">
                        <i class="fas fa-images text-4xl text-slate-600 mb-4"></i>
                        <p class="text-slate-500">Belum ada dokumentasi untuk periode ini.</p>
                    </div>
                </div>
            </template>
        </div>
    </div>
@endsection
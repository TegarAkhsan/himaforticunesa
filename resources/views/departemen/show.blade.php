@extends('layouts.navbar')

@section('content')
    <!-- Main Container -->
    <div class="relative min-h-screen overflow-hidden text-slate-200 selection:bg-cyan-500/30"
        x-data="{ activeProgram: null }">

        <!-- Ambient Background Effects -->
        <div class="fixed inset-0 z-0 pointer-events-none">
            <div
                class="absolute inset-0 bg-[linear-gradient(to_right,#80808012_1px,transparent_1px),linear-gradient(to_bottom,#80808012_1px,transparent_1px)] bg-[size:24px_24px]">
            </div>
            <div
                class="absolute top-[-20%] left-[-10%] w-[800px] h-[800px] bg-blue-600/10 rounded-full blur-[150px] animate-pulse">
            </div>
            <div
                class="absolute bottom-[-20%] right-[-10%] w-[800px] h-[800px] bg-cyan-500/10 rounded-full blur-[150px] animate-pulse delay-1000">
            </div>
            <div
                class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-indigo-900/10 rounded-full blur-[120px]">
            </div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

            <!-- Hero Header -->
            <div class="relative mb-16 rounded-[2.5rem] overflow-hidden border border-white/10 shadow-2xl group">

                <!-- Background Image -->
                @if($departemen->foto)
                    <div class="absolute inset-0">
                        <img src="{{ asset('storage/' . $departemen->foto) }}" alt="{{ $departemen->nama }}"
                            class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-r from-[#020617] via-[#020617]/90 to-transparent"></div>
                    </div>
                @else
                    <div class="absolute inset-0 bg-[#0f172a]">
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-900/20 to-purple-900/20"></div>
                    </div>
                @endif

                <div class="relative z-10 p-8 md:p-16 flex flex-col md:flex-row items-center gap-8 md:gap-12 min-h-[400px]">

                    <!-- Text Content -->
                    <div class="flex-1 text-center md:text-left">
                        <div
                            class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-500/20 border border-blue-500/30 text-blue-300 text-xs font-bold tracking-wider uppercase mb-6 backdrop-blur-md">
                            <span class="w-2 h-2 rounded-full bg-blue-400 animate-pulse"></span>
                            Departemen HIMAFORTIC
                        </div>
                        <h1 class="text-5xl md:text-7xl font-black tracking-tight text-white mb-6 leading-tight">
                            {{ $departemen->nama }}
                        </h1>
                        <div
                            class="h-1.5 w-32 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full mb-8 mx-auto md:mx-0">
                        </div>
                        <div class="prose prose-lg prose-invert max-w-2xl text-slate-300 leading-relaxed">
                            {!! $departemen->deskripsi !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12">

                <!-- Main Content Area -->
                <div class="lg:col-span-8 space-y-16">

                    <!-- Program Kerja Section -->
                    <section>
                        <div class="flex items-center justify-between mb-8">
                            <h2 class="text-2xl font-bold text-white flex items-center gap-3">
                                <span
                                    class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-600 to-cyan-600 flex items-center justify-center shadow-lg shadow-blue-500/20">
                                    <i class="fas fa-rocket text-white text-sm"></i>
                                </span>
                                Program Kerja
                            </h2>
                            <span class="text-sm text-slate-500 font-medium">{{ $departemen->programKerja->count() }}
                                Program</span>
                        </div>

                        @if ($departemen->programKerja->isEmpty())
                            <div class="p-12 rounded-3xl border border-dashed border-slate-700 bg-slate-800/30 text-center">
                                <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-slate-800 flex items-center justify-center">
                                    <i class="fas fa-calendar-times text-2xl text-slate-600"></i>
                                </div>
                                <h3 class="text-lg font-semibold text-slate-400">Belum ada program kerja</h3>
                                <p class="text-slate-500 text-sm mt-1">Program kerja akan segera ditambahkan.</p>
                            </div>
                        @else
                            <div class="space-y-6">
                                @foreach ($departemen->programKerja as $program)
                                    @php
                                        // Prepare data for JS
                                        $programData = [
                                            'nama' => $program->nama,
                                            'deskripsi' => $program->deskripsi,
                                            'tanggal_mulai' => $program->tanggal_mulai,
                                            'tanggal_fmt_d' => \Carbon\Carbon::parse($program->tanggal_mulai)->format('d'),
                                            'tanggal_fmt_m' => \Carbon\Carbon::parse($program->tanggal_mulai)->format('M'),
                                            'tanggal_fmt_full' => \Carbon\Carbon::parse($program->tanggal_mulai)->format('d F Y'),
                                            'fotoUtama' => $program->fotoProgram->first() && $program->fotoProgram->first()->foto1 ? asset('storage/' . $program->fotoProgram->first()->foto1) : null,
                                            'gallery' => []
                                        ];

                                        if ($program->fotoProgram && $program->fotoProgram->count() > 0) {
                                            foreach ($program->fotoProgram as $fp) {
                                                if ($fp->foto1 && $fp->foto1 != $program->fotoProgram->first()->foto1)
                                                    $programData['gallery'][] = asset('storage/' . $fp->foto1); // Avoid duplicating main image if wanted, or just add all
                                                // Actually let's just add all secondary images if needed, or based on the previous logic
                                                // The previous logic was: if photo exists, show it.
                                                // Let's simpler: add all provided photos to gallery list for the modal
                                            }
                                            // Re-populate gallery properly based on the loop logic used in the view before (foto1, foto2, foto3)
                                            $gallery = [];
                                            foreach ($program->fotoProgram as $fp) {
                                                if ($fp->foto1)
                                                    $gallery[] = asset('storage/' . $fp->foto1);
                                                if ($fp->foto2)
                                                    $gallery[] = asset('storage/' . $fp->foto2);
                                                if ($fp->foto3)
                                                    $gallery[] = asset('storage/' . $fp->foto3);
                                            }
                                            $programData['gallery'] = $gallery;
                                        }
                                    @endphp

                                    <div>
                                        <div @click="activeProgram = {{ json_encode($programData) }}"
                                            class="cursor-pointer group relative bg-[#0f172a] rounded-3xl border border-white/5 hover:border-blue-500/30 overflow-hidden transition-all duration-300 hover:shadow-[0_0_30px_rgba(59,130,246,0.1)]">
                                            <div class="grid md:grid-cols-12 gap-0">
                                                <!-- Image -->
                                                <div class="md:col-span-5 relative h-64 md:h-auto overflow-hidden">
                                                    @php $fotoUtama = $program->fotoProgram->first(); @endphp
                                                    @if ($fotoUtama && $fotoUtama->foto1)
                                                        <img src="{{ asset('storage/' . $fotoUtama->foto1) }}"
                                                            alt="{{ $program->nama }}"
                                                            class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700">
                                                    @else
                                                        <div class="w-full h-full bg-slate-800 flex items-center justify-center">
                                                            <i class="fas fa-image text-3xl text-slate-600"></i>
                                                        </div>
                                                    @endif
                                                    <div
                                                        class="absolute inset-0 bg-gradient-to-t from-[#0f172a] via-transparent to-transparent opacity-80 md:opacity-40">
                                                    </div>

                                                    <!-- Date Badge -->
                                                    <div class="absolute top-4 left-4">
                                                        <div
                                                            class="px-3 py-1.5 rounded-lg bg-black/60 backdrop-blur-md border border-white/10 flex flex-col items-center text-center">
                                                            <span
                                                                class="text-xs font-bold text-blue-400 uppercase">{{ \Carbon\Carbon::parse($program->tanggal_mulai)->format('M') }}</span>
                                                            <span
                                                                class="text-lg font-bold text-white leading-none">{{ \Carbon\Carbon::parse($program->tanggal_mulai)->format('d') }}</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Content -->
                                                <div class="md:col-span-7 p-6 md:p-8 flex flex-col">
                                                    <h3
                                                        class="text-xl font-bold text-white mb-3 group-hover:text-blue-400 transition-colors">
                                                        {{ $program->nama }}
                                                    </h3>

                                                    <div
                                                        class="prose prose-invert prose-sm text-slate-400 line-clamp-2 mb-6 flex-1">
                                                        {!! $program->deskripsi !!}
                                                    </div>

                                                    <div
                                                        class="flex items-center justify-between pt-4 border-t border-white/5 mt-auto">
                                                        <div class="flex items-center gap-2 text-xs text-slate-500">
                                                            <i class="far fa-clock"></i>
                                                            <span>
                                                                {{ \Carbon\Carbon::parse($program->tanggal_mulai)->diffForHumans() }}
                                                            </span>
                                                        </div>

                                                        <!-- Gallery Indicators -->
                                                        @if ($program->fotoProgram && $program->fotoProgram->count() > 0)
                                                            <div class="flex -space-x-2">
                                                                @foreach ($program->fotoProgram as $foto)
                                                                    @foreach (['foto2', 'foto3'] as $fotoField)
                                                                        @if ($foto->$fotoField)
                                                                            <div
                                                                                class="w-6 h-6 rounded-full border border-[#0f172a] overflow-hidden">
                                                                                <img src="{{ asset('storage/' . $foto->$fotoField) }}"
                                                                                    class="w-full h-full object-cover">
                                                                            </div>
                                                                        @endif
                                                                    @endforeach
                                                                @endforeach
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </section>

                    <!-- Anggota Section -->
                    <section>
                        <div class="flex items-center justify-between mb-8">
                            <h2 class="text-2xl font-bold text-white flex items-center gap-3">
                                <span
                                    class="w-10 h-10 rounded-xl bg-gradient-to-br from-purple-600 to-pink-600 flex items-center justify-center shadow-lg shadow-purple-500/20">
                                    <i class="fas fa-users text-white text-sm"></i>
                                </span>
                                Anggota Departemen
                            </h2>
                        </div>

                        <!-- Ketua Card -->
                        @if ($departemen->ketua)
                            <div class="mb-10">
                                <div
                                    class="relative group p-[1px] rounded-3xl bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500">
                                    <div
                                        class="bg-[#0f172a] rounded-[1.4rem] p-6 md:p-8 flex flex-col md:flex-row items-center gap-6 md:gap-8 relative overflow-hidden">
                                        <!-- Glow Effect -->
                                        <div
                                            class="absolute top-0 right-0 w-64 h-64 bg-purple-500/10 rounded-full blur-[80px] pointer-events-none">
                                        </div>

                                        <div class="relative shrink-0">
                                            <div
                                                class="w-32 h-32 md:w-40 md:h-40 rounded-full p-1 bg-gradient-to-br from-white/20 to-transparent">
                                                <img src="{{ asset('storage/' . $departemen->ketua->foto) }}"
                                                    alt="{{ $departemen->ketua->nama }}"
                                                    class="w-full h-full rounded-full object-cover border-4 border-[#0f172a]">
                                            </div>
                                            <div
                                                class="absolute -bottom-2 left-1/2 -translate-x-1/2 px-4 py-1 bg-gradient-to-r from-purple-600 to-pink-600 rounded-full text-[10px] font-bold text-white shadow-lg border border-white/20 whitespace-nowrap tracking-wider uppercase">
                                                Ketua Departemen
                                            </div>
                                        </div>

                                        <div class="text-center md:text-left">
                                            <h3 class="text-2xl font-bold text-white mb-2">{{ $departemen->ketua->nama }}</h3>
                                            <p class="text-purple-400 font-medium mb-4">{{ $departemen->ketua->nim }}</p>
                                            <div class="flex justify-center md:justify-start gap-3">
                                                @if ($departemen->ketua->instagram)
                                                    <a href="{{ $departemen->ketua->instagram }}" target="_blank"
                                                        class="w-10 h-10 rounded-xl bg-white/5 hover:bg-purple-500 hover:text-white flex items-center justify-center transition-all duration-300">
                                                        <i class="fab fa-instagram"></i>
                                                    </a>
                                                @endif
                                                @if ($departemen->ketua->linkedin)
                                                    <a href="{{ $departemen->ketua->linkedin }}" target="_blank"
                                                        class="w-10 h-10 rounded-xl bg-white/5 hover:bg-blue-600 hover:text-white flex items-center justify-center transition-all duration-300">
                                                        <i class="fab fa-linkedin-in"></i>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Staff Grid -->
                        @php
                            // Filter staff (exclude ketua)
                            $staffMembers = $departemen->anggota->filter(function ($anggota) use ($departemen) {
                                return $anggota->mahasiswa && $anggota->mahasiswa->id !== $departemen->ketua_id;
                            });
                        @endphp

                        @if ($staffMembers->isNotEmpty())
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                @foreach ($staffMembers as $anggota)
                                    <div
                                        class="group relative p-[1px] rounded-2xl bg-gradient-to-br from-white/10 to-white/5 hover:from-blue-500 hover:to-purple-500 transition-all duration-500">
                                        <div
                                            class="relative h-full bg-[#0f172a] rounded-[0.9rem] p-5 flex items-center gap-5 overflow-hidden">
                                            <!-- Hover Glow -->
                                            <div
                                                class="absolute inset-0 bg-gradient-to-r from-blue-500/0 via-blue-500/0 to-blue-500/0 group-hover:from-blue-500/10 group-hover:to-purple-500/10 transition-all duration-500">
                                            </div>

                                            <div class="relative shrink-0">
                                                <div
                                                    class="w-16 h-16 rounded-full p-0.5 bg-gradient-to-br from-white/20 to-transparent group-hover:from-blue-400 group-hover:to-purple-400 transition-all duration-500">
                                                    <img src="{{ asset('storage/' . $anggota->mahasiswa->foto) }}"
                                                        alt="{{ $anggota->mahasiswa->nama }}"
                                                        class="w-full h-full rounded-full object-cover border-2 border-[#0f172a]">
                                                </div>
                                            </div>

                                            <div class="relative min-w-0 flex-1">
                                                <h4
                                                    class="font-bold text-white text-base mb-1 truncate group-hover:text-blue-300 transition-colors">
                                                    {{ $anggota->mahasiswa->nama }}
                                                </h4>
                                                <p class="text-xs text-slate-500 mb-2">{{ $anggota->mahasiswa->nim }}</p>
                                                <span
                                                    class="inline-flex px-2 py-0.5 rounded text-[10px] font-medium bg-white/5 text-slate-300 border border-white/10 group-hover:border-blue-500/30 group-hover:text-blue-200 transition-colors">
                                                    {{ $anggota->jabatan }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="p-8 rounded-2xl border border-dashed border-slate-700 bg-slate-800/30 text-center">
                                <p class="text-slate-500 text-sm">Belum ada staff yang terdaftar di departemen ini.</p>
                            </div>
                        @endif
                    </section>

                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-4">
                    <div class="sticky top-24 space-y-6">

                        <!-- Other Departments -->
                        <div class="bg-[#0f172a]/80 backdrop-blur-xl rounded-3xl border border-white/10 p-6 shadow-xl">
                            <h3 class="text-lg font-bold text-white mb-6 flex items-center gap-2">
                                <i class="fas fa-sitemap text-cyan-400"></i>
                                Departemen Lain
                            </h3>

                            <div class="space-y-3">
                                @php
                                    $departemenLainnya = \App\Models\Departemen::where('id', '!=', $departemen->id)
                                        ->inRandomOrder()
                                        ->take(5)
                                        ->get();
                                @endphp

                                @foreach ($departemenLainnya as $dep)
                                    <a href="{{ route('departemen.show', $dep->slug) }}"
                                        class="flex items-center gap-4 p-3 rounded-2xl hover:bg-white/5 transition-all duration-300 group border border-transparent hover:border-white/5">
                                        <div
                                            class="w-10 h-10 rounded-xl bg-slate-800 flex items-center justify-center text-slate-500 group-hover:text-cyan-400 group-hover:bg-cyan-500/10 transition-colors shrink-0">
                                            @if($dep->foto)
                                                <img src="{{ asset('storage/' . $dep->foto) }}"
                                                    class="w-full h-full object-cover rounded-xl">
                                            @else
                                                <i class="fas fa-building text-xs"></i>
                                            @endif
                                        </div>
                                        <div class="min-w-0">
                                            <h4
                                                class="text-sm font-semibold text-slate-300 group-hover:text-white truncate transition-colors">
                                                {{ $dep->nama }}
                                            </h4>
                                            <p class="text-xs text-slate-500 truncate">Lihat Detail</p>
                                        </div>
                                        <i
                                            class="fas fa-chevron-right text-xs text-slate-600 group-hover:text-cyan-400 ml-auto transition-colors"></i>
                                    </a>
                                @endforeach
                            </div>

                            <div class="mt-6 pt-4 border-t border-white/5">
                                <a href="{{ route('departemen.index') }}"
                                    class="block w-full py-3 rounded-xl bg-white/5 hover:bg-blue-600 text-center text-sm font-bold text-slate-300 hover:text-white transition-all duration-300">
                                    Lihat Semua Departemen
                                </a>
                            </div>
                        </div>

                        <!-- Stats Card -->
                        <div
                            class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-blue-600 to-cyan-600 p-6 text-white shadow-lg">
                            <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full blur-2xl -mr-10 -mt-10">
                            </div>

                            <h4 class="font-bold text-lg mb-6 relative z-10">Statistik Departemen</h4>

                            <div class="grid grid-cols-2 gap-4 relative z-10">
                                <div class="bg-black/20 rounded-2xl p-4 backdrop-blur-sm">
                                    <div class="text-3xl font-black mb-1">{{ $departemen->programKerja->count() }}</div>
                                    <div class="text-xs text-blue-100 opacity-80">Program Kerja</div>
                                </div>
                                <div class="bg-black/20 rounded-2xl p-4 backdrop-blur-sm">
                                    <div class="text-3xl font-black mb-1">{{ $departemen->anggota->count() }}</div>
                                    <div class="text-xs text-blue-100 opacity-80">Total Anggota</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <!-- Global Detail Modal -->
        <template x-teleport="body">
            <div x-show="activeProgram" class="fixed inset-0 overflow-y-auto" style="z-index: 99999; display: none;"
                aria-labelledby="modal-title" role="dialog" aria-modal="true">

                <!-- Backdrop -->
                <div x-show="activeProgram" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                    class="fixed inset-0 transition-opacity" style="background-color: rgba(0, 0, 0, 0.95); z-index: -1;"
                    @click="activeProgram = null">
                </div>

                <div class="relative z-10 flex min-h-screen items-center justify-center p-4 text-center sm:p-0">
                    <div x-show="activeProgram" x-transition:enter="ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave="ease-in duration-200"
                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        @click.away="activeProgram = null"
                        class="relative transform overflow-hidden rounded-3xl bg-[#0f172a] border border-white/10 text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-4xl"
                        style="z-index: 99999;">

                        <!-- Close Button -->
                        <button @click="activeProgram = null"
                            class="absolute top-4 right-4 p-2 rounded-full bg-black/50 text-white hover:bg-red-500 transition-colors border border-white/10 backdrop-blur group"
                            style="z-index: 100000;">
                            <i class="fas fa-times text-xl group-hover:rotate-90 transition-transform"></i>
                        </button>

                        <!-- Modal Content -->
                        <div class="bg-[#0f172a]" x-if="activeProgram">
                            <!-- Hero Image -->
                            <div class="relative h-72 md:h-96 w-full group overflow-hidden">
                                <template x-if="activeProgram.fotoUtama">
                                    <img :src="activeProgram.fotoUtama" :alt="activeProgram.nama"
                                        class="w-full h-full object-cover">
                                </template>
                                <template x-if="!activeProgram.fotoUtama">
                                    <div class="w-full h-full bg-slate-800 flex items-center justify-center relative">
                                        <div
                                            class="absolute inset-0 opacity-20 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]">
                                        </div>
                                        <i class="fas fa-rocket text-8xl text-slate-700/50"></i>
                                        <div class="absolute inset-0 bg-gradient-to-t from-[#0f172a] to-transparent">
                                        </div>
                                    </div>
                                </template>
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-[#0f172a] via-[#0f172a]/20 to-transparent opacity-90">
                                </div>

                                <!-- Content Overlay -->
                                <div class="absolute bottom-0 left-0 p-8 w-full z-20">
                                    <div class="flex flex-wrap items-center gap-3 mb-4">
                                        <span
                                            class="px-3 py-1 rounded-full bg-blue-600/30 border border-blue-500/30 text-blue-300 text-xs font-bold uppercase tracking-wider backdrop-blur-md shadow-lg">
                                            Program Kerja
                                        </span>
                                        <span
                                            class="px-3 py-1 rounded-full bg-slate-700/60 border border-white/10 text-white text-xs font-bold flex items-center gap-2 backdrop-blur-md shadow-lg">
                                            <i class="far fa-calendar-alt text-blue-400"></i>
                                            <span x-text="activeProgram.tanggal_fmt_full"></span>
                                        </span>
                                    </div>
                                    <h2 x-text="activeProgram.nama"
                                        class="text-3xl md:text-5xl font-black text-white leading-tight mb-2 drop-shadow-[0_2px_10px_rgba(0,0,0,0.5)]">
                                    </h2>
                                </div>
                            </div>

                            <div class="p-8 md:p-10 space-y-8 relative z-10 bg-[#0f172a]">
                                <!-- Description -->
                                <div class="prose prose-lg prose-invert max-w-none text-white font-normal leading-relaxed"
                                    x-html="activeProgram.deskripsi">
                                </div>

                                <!-- Gallery Grid -->
                                <template x-if="activeProgram.gallery && activeProgram.gallery.length > 0">
                                    <div class="border-t border-white/10 pt-8 mt-8">
                                        <h3 class="text-xl font-bold text-white mb-6 flex items-center gap-2">
                                            <i class="fas fa-images text-blue-400"></i>
                                            Galeri Kegiatan
                                        </h3>
                                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                            <template x-for="img in activeProgram.gallery">
                                                <div
                                                    class="aspect-video rounded-xl overflow-hidden border border-white/5 group/img relative cursor-pointer hover:shadow-xl transition-all">
                                                    <img :src="img"
                                                        class="w-full h-full object-cover transition-transform duration-700 group-hover/img:scale-110">
                                                    <div
                                                        class="absolute inset-0 bg-blue-600/0 group-hover/img:bg-blue-600/10 transition-colors duration-300">
                                                    </div>
                                                </div>
                                            </template>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>
@endsection
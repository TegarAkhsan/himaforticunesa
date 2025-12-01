@extends('layouts.navbar')

@section('content')
    <div class="min-h-screen text-white overflow-hidden relative font-sans selection:bg-blue-500/30">

        <!-- Background Elements -->
        <div class="fixed inset-0 z-0 pointer-events-none">
            <div
                class="absolute top-[-10%] left-[-10%] w-[700px] h-[700px] bg-blue-600/20 rounded-full blur-[120px] animate-pulse">
            </div>
            <div
                class="absolute bottom-[-10%] right-[-10%] w-[700px] h-[700px] bg-purple-600/20 rounded-full blur-[120px] animate-pulse delay-1000">
            </div>
            <div
                class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-indigo-900/10 rounded-full blur-[100px]">
            </div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

            <!-- Hero Section -->
            <div class="text-center mb-24 relative">
                <div
                    class="inline-flex items-center gap-2 mb-6 px-4 py-2 rounded-full border border-blue-500/30 bg-blue-500/10 backdrop-blur-md shadow-[0_0_15px_rgba(59,130,246,0.2)]">
                    <i class="fas fa-bolt text-blue-400 text-xs"></i>
                    <span class="text-blue-300 text-sm font-bold tracking-wider uppercase">Portal Kompetisi
                        & Edukasi</span>
                    <i class="fas fa-bolt text-blue-400 text-xs"></i>
                </div>
                <h1 class="text-5xl md:text-7xl font-extrabold mb-8 tracking-tight leading-tight">
                    <span
                        class="bg-clip-text text-transparent bg-gradient-to-r from-blue-200 via-indigo-400 to-purple-400 drop-shadow-[0_0_10px_rgba(99,102,241,0.3)]">
                        Level Up Your Skills
                    </span>
                </h1>
                <p class="text-slate-300 text-lg md:text-xl max-w-3xl mx-auto leading-relaxed font-light">
                    Temukan berbagai kompetisi bergengsi dan pelatihan eksklusif untuk mengasah kemampuan
                    teknologimu
                    bersama <span class="text-white font-semibold">HIMAFORTIC</span>.
                </p>
            </div>

            <!-- Lomba Section -->
            <div class="mb-32">
                <div class="flex items-center justify-between mb-12 border-b border-white/10 pb-6">
                    <div class="flex items-center gap-4">
                        <div
                            class="p-4 bg-gradient-to-br from-blue-500/20 to-purple-600/20 rounded-2xl border border-blue-500/30 shadow-[0_0_20px_rgba(59,130,246,0.15)]">
                            <i class="fas fa-rocket text-3xl text-blue-400"></i>
                        </div>
                        <div>
                            <h2 class="text-3xl font-bold text-white">Kompetisi Terbaru</h2>
                            <p class="text-slate-400 text-sm mt-1">Tantang dirimu dalam berbagai kompetisi
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div
                            class="p-4 bg-gradient-to-br from-emerald-500/20 to-teal-600/20 rounded-2xl border border-emerald-500/30 shadow-[0_0_20px_rgba(16,185,129,0.15)]">
                            <i class="fas fa-chalkboard-teacher text-3xl text-emerald-400"></i>
                        </div>
                        <div>
                            <h2 class="text-3xl font-bold text-white">Pelatihan & Workshop</h2>
                            <p class="text-slate-400 text-sm mt-1">Tingkatkan skill dengan mentor ahli</p>
                        </div>
                    </div>
                    <a href="#"
                        class="group hidden md:flex items-center gap-2 text-slate-400 hover:text-white transition-colors px-4 py-2 rounded-full hover:bg-white/5">
                        Lihat Semua <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    @forelse($lombas as $lomba)
                        <!-- Dynamic Card -->
                        <div class="group relative overflow-hidden rounded-3xl border border-white/10 shadow-2xl">
                            <div class="absolute inset-0 bg-slate-900 z-0"></div>
                            <div class="absolute inset-0 bg-cover bg-center opacity-30 group-hover:opacity-40 transition-opacity duration-500 transform group-hover:scale-105"
                                style="background-image: url('{{ $lomba->image ? asset('storage/' . $lomba->image) : 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80' }}')">
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t from-[#020617] via-[#020617]/90 to-transparent">
                            </div>

                            <div class="relative z-10 p-8 h-full flex flex-col justify-end min-h-[300px]">
                                <div class="mb-auto flex justify-between items-start">
                                    <span
                                        class="px-3 py-1 {{ $lomba->jenis == 'Kompetisi' ? 'bg-blue-500/20 text-blue-400 border-blue-500/30' : 'bg-emerald-500/20 text-emerald-400 border-emerald-500/30' }} text-xs font-bold rounded-full border backdrop-blur-md uppercase">
                                        {{ $lomba->jenis }}
                                    </span>
                                    @if($lomba->status == 'Open')
                                        <span
                                            class="px-3 py-1 bg-green-500/20 text-green-400 text-xs font-bold rounded-full border border-green-500/30 backdrop-blur-md">OPEN</span>
                                    @elseif($lomba->status == 'Closed')
                                        <span
                                            class="px-3 py-1 bg-red-500/20 text-red-400 text-xs font-bold rounded-full border border-red-500/30 backdrop-blur-md">CLOSED</span>
                                    @else
                                        <span
                                            class="px-3 py-1 bg-yellow-500/20 text-yellow-400 text-xs font-bold rounded-full border border-yellow-500/30 backdrop-blur-md">SOON</span>
                                    @endif
                                </div>

                                <h3 class="text-3xl font-bold mb-3 text-white group-hover:text-blue-400 transition-colors mt-8">
                                    {{ $lomba->nama_lomba }}
                                </h3>
                                <p class="text-slate-300 text-sm mb-8 line-clamp-2 leading-relaxed">
                                    {{ $lomba->deskripsi }}
                                </p>

                                <div class="flex items-center justify-between pt-6 border-t border-white/10">
                                    <div class="flex items-center gap-6 text-sm text-slate-300">
                                        <span class="flex items-center gap-2 bg-white/5 px-3 py-1.5 rounded-lg"><i
                                                class="far fa-calendar-alt {{ $lomba->jenis == 'Kompetisi' ? 'text-blue-400' : 'text-emerald-400' }}"></i>
                                            {{ $lomba->tanggal_pelaksanaan ? $lomba->tanggal_pelaksanaan->format('d M Y') : 'TBA' }}</span>
                                        <span class="flex items-center gap-2 bg-white/5 px-3 py-1.5 rounded-lg"><i
                                                class="fas fa-map-marker-alt {{ $lomba->jenis == 'Kompetisi' ? 'text-blue-400' : 'text-emerald-400' }}"></i>
                                            {{ $lomba->lokasi }}</span>
                                    </div>
                                    @if($lomba->link_pendaftaran && $lomba->status == 'Open')
                                        <a href="{{ $lomba->link_pendaftaran }}" target="_blank"
                                            class="w-12 h-12 rounded-full {{ $lomba->jenis == 'Kompetisi' ? 'bg-blue-600 hover:bg-blue-500 shadow-blue-600/30' : 'bg-emerald-600 hover:bg-emerald-500 shadow-emerald-600/30' }} text-white flex items-center justify-center shadow-lg transition-all transform hover:scale-110">
                                            <i class="fas fa-arrow-right"></i>
                                        </a>
                                    @else
                                        <button disabled
                                            class="w-12 h-12 rounded-full bg-slate-700 text-slate-500 flex items-center justify-center cursor-not-allowed">
                                            <i class="fas fa-lock"></i>
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-12">
                            <p class="text-slate-400">Belum ada kompetisi atau pelatihan yang tersedia saat ini.
                            </p>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
@endsection
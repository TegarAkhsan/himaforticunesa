@extends('layouts.app')

@section('content')
<section class="relative py-20 overflow-hidden bg-gradient-to-br from-blue-900 via-blue-800 to-indigo-900">
    <div class="absolute top-0 left-0 w-full h-full">
        <div class="absolute top-10 left-10 w-20 h-20 bg-blue-400/20 rounded-full mix-blend-soft-light filter blur-xl animate-pulse"></div>
        <div class="absolute top-40 right-10 w-24 h-24 bg-cyan-400/20 rounded-full mix-blend-soft-light filter blur-xl animate-pulse animation-delay-2000"></div>
        <div class="absolute bottom-20 left-20 w-16 h-16 bg-indigo-400/20 rounded-full mix-blend-soft-light filter blur-xl animate-pulse animation-delay-4000"></div>
    </div>
    
    <div class="relative max-w-6xl mx-auto px-4 text-center">
        <div class="inline-block mb-4">
            <span class="text-xs font-semibold tracking-wider text-blue-200 uppercase bg-blue-700/50 backdrop-blur-sm px-4 py-2 rounded-full border border-blue-500/30">
                Departemen HIMAFORTIC
            </span>
        </div>
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 text-white">
            {{ $departemen->nama }}
        </h1>
        <p class="text-lg md:text-xl text-blue-100 max-w-2xl mx-auto leading-relaxed">
            Struktur, Anggota, dan Program Kerja Departemen HIMAFORTIC
        </p>
        <div class="mt-8 flex justify-center space-x-3">
            <div class="w-2 h-2 bg-blue-300 rounded-full animate-bounce"></div>
            <div class="w-2 h-2 bg-cyan-300 rounded-full animate-bounce animation-delay-200"></div>
            <div class="w-2 h-2 bg-indigo-300 rounded-full animate-bounce animation-delay-400"></div>
        </div>
    </div>
</section>

<section class="py-16 bg-gradient-to-b from-slate-50 to-blue-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            
            <!-- Main Content (Left - 3/4 width) -->
            <div class="lg:col-span-3">
                <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-2xl overflow-hidden border border-blue-100/50">

                    {{-- Hero Image --}}
                    @if ($departemen->foto)
                        <div class="relative bg-blue-50 flex items-center justify-center h-auto md:h-[400px] lg:h-[500px] overflow-hidden">
                            <img src="{{ asset('storage/' . $departemen->foto) }}" 
                                alt="{{ $departemen->nama }}" 
                                class="w-full h-auto object-contain transition duration-700 transform hover:scale-105">
                            
                            <!-- Gradient Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-blue-900/20 to-transparent pointer-events-none"></div>

                            <!-- Label -->
                            <div class="absolute bottom-6 left-6">
                                <span class="text-white text-sm font-semibold bg-blue-600/90 backdrop-blur-sm px-4 py-2 rounded-full border border-white/20">
                                    Departemen {{ $departemen->nama }}
                                </span>
                            </div>
                        </div>
                    @endif


                    <div class="p-6 md:p-8 lg:p-12">
                        {{-- Department Info --}}
                        <div class="text-center mb-12">
                            <div class="flex items-center justify-center space-x-2 mb-6">
                                <div class="w-3 h-0.5 bg-blue-500 rounded-full"></div>
                                <div class="w-3 h-0.5 bg-cyan-500 rounded-full"></div>
                                <div class="w-3 h-0.5 bg-indigo-500 rounded-full"></div>
                            </div>
                            <h2 class="text-3xl md:text-4xl font-bold bg-gradient-to-r from-blue-800 to-cyan-700 bg-clip-text text-transparent mb-6">
                                {{ $departemen->nama }}
                            </h2>
                            <div class="max-w-5xl mx-auto">
                                <p class="text-slate-700 text-lg leading-relaxed text-justify md:text-justify">
                                    {{ strip_tags($departemen->deskripsi) }}
                                </p>
                            </div>
                        </div>

{{-- === PROGRAM KERJA DEPARTEMEN === --}}
<div class="mb-16">
    <h3 class="text-2xl md:text-3xl font-bold text-center text-slate-800 mb-8 md:mb-12">
        <span class="bg-gradient-to-r from-blue-600 to-cyan-500 bg-clip-text text-transparent">
            Program Kerja Departemen
        </span>
    </h3>

    @if ($departemen->programKerja->isEmpty())
        <div class="text-center py-12 bg-slate-50 rounded-2xl border-2 border-dashed border-slate-200">
            <div class="w-20 h-20 mx-auto mb-4 text-slate-400">
                <i class="fas fa-calendar-check text-5xl"></i>
            </div>
            <p class="text-slate-500 text-lg italic">Belum ada program kerja yang tercatat.</p>
        </div>
    @else
        <div class="space-y-8">
            @foreach ($departemen->programKerja as $program)
                <div class="group bg-gradient-to-br from-white to-blue-50 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden border border-blue-100 hover:border-blue-200">
                    {{-- Foto utama --}}
                    @php
                        $fotoUtama = $program->fotoProgram->first();
                    @endphp

                    @if ($fotoUtama && $fotoUtama->foto1)
                        <div class="relative h-64 md:h-72 lg:h-80 overflow-hidden">
                            <img src="{{ asset('storage/' . $fotoUtama->foto1) }}" 
                                 alt="{{ $program->nama }}" 
                                 class="w-full h-full object-cover transform group-hover:scale-105 transition duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-blue-900/30 to-transparent"></div>
                            <div class="absolute top-4 right-4">
                                <span class="text-white text-xs font-semibold bg-blue-600/90 backdrop-blur-sm px-3 py-1 rounded-full">
                                    Program Kerja
                                </span>
                            </div>
                        </div>
                    @endif

                    <div class="p-6 md:p-8">
                        <h4 class="text-2xl md:text-3xl font-bold text-blue-900 mb-4 group-hover:text-blue-800 transition-colors">
                            {{ $program->nama }}
                        </h4>

                        <div class="flex items-center text-slate-600 mb-6">
                            <i class="fa-regular fa-calendar text-blue-600 mr-3 text-lg"></i>
                            <span class="text-sm md:text-base">
                                {{ \Carbon\Carbon::parse($program->tanggal_mulai)->translatedFormat('d F Y') }}
                                –
                                {{ \Carbon\Carbon::parse($program->tanggal_selesai)->translatedFormat('d F Y') }}
                            </span>
                        </div>

                        <div class="text-slate-700 leading-relaxed text-justify md:text-justify prose max-w-none">
                            {!! $program->deskripsi !!}
                        </div>

                        {{-- Galeri foto --}}
                        @if ($program->fotoProgram && $program->fotoProgram->count() > 0)
                            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 mt-6">
                                @foreach ($program->fotoProgram as $foto)
                                    @foreach (['foto2', 'foto3'] as $fotoField)
                                        @if ($foto->$fotoField)
                                            <div class="relative group/image overflow-hidden rounded-xl">
                                                <img src="{{ asset('storage/' . $foto->$fotoField) }}" 
                                                     alt="Foto {{ $program->nama }}" 
                                                     class="w-full h-32 object-cover transform group-hover/image:scale-110 transition duration-500">
                                                <div class="absolute inset-0 bg-black/0 group-hover/image:bg-black/20 transition duration-300"></div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        {{-- === COMING SOON === --}}
        @if ($departemen->programKerja->count() < 2)
            <div class="mt-12 text-center">
                <p class="text-2xl md:text-3xl font-bold text-slate-400 italic animate-pulse">
                    Nantikan Program Kerja Lainnya
                </p>
                <p class="text-2xl md:text-3xl font-bold text-slate-400 italic animate-pulse">
                    🚀 Coming Soon...
                </p>
            </div>
        @endif
    @endif
</div>


                        {{-- Ketua Departemen --}}
                        @if ($departemen->ketua)
                            <div class="mb-16">
                                <h3 class="text-2xl md:text-3xl font-bold text-center text-slate-800 mb-8 md:mb-12">
                                    <span class="bg-gradient-to-r from-blue-600 to-cyan-500 bg-clip-text text-transparent">
                                        Ketua Departemen
                                    </span>
                                </h3>
                                
                                <div class="flex flex-col items-center">
                                    <div class="relative group mb-6">
                                        <div class="absolute -inset-4 bg-gradient-to-r from-blue-500 to-cyan-400 rounded-full blur opacity-25 group-hover:opacity-75 transition duration-300"></div>
                                        <img src="{{ asset('storage/' . $departemen->ketua->foto) }}" 
                                             alt="{{ $departemen->ketua->nama }}" 
                                             class="relative w-32 h-32 md:w-40 md:h-40 rounded-full object-cover border-4 border-white shadow-xl z-10 transform group-hover:scale-105 transition duration-300">
                                        <div class="absolute -bottom-2 -right-2 w-10 h-10 bg-gradient-to-r from-blue-600 to-cyan-500 rounded-full border-4 border-white flex items-center justify-center shadow-lg">
                                            <i class="fas fa-crown text-white text-sm"></i>
                                        </div>
                                    </div>
                                    
                                    <div class="text-center max-w-md mx-auto">
                                        <h4 class="text-2xl md:text-3xl font-bold text-slate-800 mb-2">{{ $departemen->ketua->nama }}</h4>
                                        <p class="text-blue-600 font-semibold text-lg mb-4">{{ $departemen->ketua->nim }}</p>
                                        <div class="flex justify-center gap-6">
                                            @if ($departemen->ketua->instagram)
                                                <a href="{{ $departemen->ketua->instagram }}" target="_blank" 
                                                   class="p-3 bg-gradient-to-r from-pink-500 to-purple-600 text-white rounded-full shadow-lg hover:shadow-xl transform hover:scale-110 transition duration-300">
                                                    <i class="fa-brands fa-instagram text-xl"></i>
                                                </a>
                                            @endif
                                            @if ($departemen->ketua->linkedin)
                                                <a href="{{ $departemen->ketua->linkedin }}" target="_blank" 
                                                   class="p-3 bg-gradient-to-r from-blue-600 to-blue-800 text-white rounded-full shadow-lg hover:shadow-xl transform hover:scale-110 transition duration-300">
                                                    <i class="fa-brands fa-linkedin text-xl"></i>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        {{-- Anggota Departemen --}}
                        <div class="mb-12">
                            <h3 class="text-2xl md:text-3xl font-bold text-center text-slate-800 mb-8 md:mb-12">
                                <span class="bg-gradient-to-r from-cyan-600 to-blue-500 bg-clip-text text-transparent">
                                    Anggota Departemen
                                </span>
                            </h3>

                            @if ($departemen->anggota->isEmpty())
                                <div class="text-center py-12 bg-slate-50 rounded-2xl border-2 border-dashed border-slate-200">
                                    <div class="w-20 h-20 mx-auto mb-4 text-slate-400">
                                        <i class="fas fa-users text-5xl"></i>
                                    </div>
                                    <p class="text-slate-500 text-lg italic">Belum ada anggota yang terdaftar.</p>
                                </div>
                            @else
                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                                    @foreach ($departemen->anggota as $anggota)
                                        @if ($anggota->mahasiswa && $anggota->mahasiswa->id !== $departemen->ketua_id)
                                            <div class="group bg-gradient-to-br from-white to-blue-50 rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 border border-blue-100">
                                                <div class="relative">
                                                    <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
                                                        <span class="bg-gradient-to-r from-cyan-500 to-blue-500 text-white px-4 py-1 rounded-full text-xs font-semibold shadow-lg whitespace-nowrap">
                                                            {{ $anggota->jabatan }}
                                                        </span>
                                                    </div>
                                                    
                                                    <div class="relative mt-6">
                                                        <div class="absolute -inset-2 bg-gradient-to-r from-cyan-400 to-blue-500 rounded-full blur opacity-20 group-hover:opacity-30 transition duration-300"></div>
                                                        <img src="{{ asset('storage/' . $anggota->mahasiswa->foto) }}" 
                                                             alt="{{ $anggota->mahasiswa->nama }}" 
                                                             class="relative w-24 h-24 md:w-28 md:h-28 mx-auto rounded-full object-cover border-4 border-white shadow-lg z-10">
                                                    </div>
                                                </div>
                                                
                                                <div class="text-center mt-6">
                                                    <h4 class="text-xl font-bold text-slate-800 group-hover:text-slate-900 transition-colors mb-2">
                                                        {{ $anggota->mahasiswa->nama }}
                                                    </h4>
                                                    <p class="text-cyan-600 font-semibold text-sm mb-4">{{ $anggota->mahasiswa->nim }}</p>
                                                    <div class="flex justify-center gap-4">
                                                        @if ($anggota->mahasiswa->instagram)
                                                            <a href="{{ $anggota->mahasiswa->instagram }}" target="_blank" 
                                                               class="p-2 bg-gradient-to-r from-pink-500 to-purple-600 text-white rounded-full shadow hover:shadow-md transform hover:scale-110 transition duration-300">
                                                                <i class="fa-brands fa-instagram text-sm"></i>
                                                            </a>
                                                        @endif
                                                        @if ($anggota->mahasiswa->linkedin)
                                                            <a href="{{ $anggota->mahasiswa->linkedin }}" target="_blank" 
                                                               class="p-2 bg-gradient-to-r from-blue-600 to-blue-800 text-white rounded-full shadow hover:shadow-md transform hover:scale-110 transition duration-300">
                                                                <i class="fa-brands fa-linkedin text-sm"></i>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        {{-- Back Button --}}
                        <div class="text-center">
                            <a href="{{ route('departemen.index') }}" 
                               class="inline-flex items-center space-x-3 bg-gradient-to-r from-blue-700 to-cyan-600 text-white px-8 py-4 rounded-2xl shadow-lg hover:shadow-xl transform hover:scale-105 transition duration-300 font-semibold group">
                                <i class="fas fa-arrow-left group-hover:-translate-x-1 transition-transform duration-300"></i>
                                <span>Kembali ke Daftar Departemen</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar (Right - 1/4 width) -->
            <div class="lg:col-span-1">
                <div class="sticky top-8 space-y-8">

                    <!-- Departemen Lainnya Section -->
                    <div class="bg-white rounded-2xl shadow-xl border border-blue-100 overflow-hidden">
                        <!-- Section Header -->
                        <div class="bg-gradient-to-r from-blue-600 to-cyan-600 p-6">
                            <h3 class="text-white font-bold text-lg flex items-center gap-2">
                                <i class="fas fa-users text-cyan-300"></i>
                                Departemen Lainnya
                            </h3>
                            <p class="text-blue-100 text-sm mt-1">Kenali juga departemen HIMAFORTIC lainnya</p>
                        </div>

                        <!-- Departemen List -->
                        <div class="p-1 max-h-[600px] overflow-y-auto custom-scrollbar">
                            @php
                                $departemenLainnya = \App\Models\Departemen::where('id', '!=', $departemen->id)
                                    ->inRandomOrder()
                                    ->take(3)
                                    ->get();
                            @endphp

                            @forelse ($departemenLainnya as $dep)
                                <a href="{{ route('departemen.show', $dep->id) }}" 
                                   class="group block p-4 hover:bg-blue-50 rounded-xl transition-all duration-300 border-b border-slate-100 last:border-b-0">
                                    <div class="flex gap-4">
                                        <!-- Thumbnail -->
                                        @if($dep->foto)
                                            <div class="flex-shrink-0 relative">
                                                <img src="{{ asset('storage/' . $dep->foto) }}"
                                                     alt="{{ $dep->nama }}"
                                                     class="w-16 h-16 rounded-xl object-cover shadow-md group-hover:shadow-lg transition-all duration-300 group-hover:scale-105">
                                                <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent rounded-xl"></div>
                                            </div>
                                        @else
                                            <div class="flex-shrink-0 w-16 h-16 bg-gradient-to-br from-blue-400 to-cyan-400 rounded-xl flex items-center justify-center text-white shadow-md">
                                                <i class="fas fa-building text-lg"></i>
                                            </div>
                                        @endif

                                        <!-- Content -->
                                        <div class="flex-1 min-w-0">
                                            <h4 class="font-semibold text-slate-800 group-hover:text-blue-700 transition-colors line-clamp-2 leading-tight mb-1 text-sm">
                                                {{ $dep->nama }}
                                            </h4>
                                            <p class="text-xs text-slate-500 line-clamp-2">
                                                {{ Str::limit(strip_tags($dep->deskripsi), 60) }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            @empty
                                <div class="p-6 text-center text-slate-500">
                                    <i class="fas fa-inbox text-3xl text-slate-300 mb-3"></i>
                                    <p class="text-sm">Tidak ada departemen lainnya</p>
                                </div>
                            @endforelse
                        </div>

                        <!-- View All Button -->
                        <div class="p-4 border-t border-slate-100">
                            <a href="{{ route('departemen.index') }}" 
                               class="w-full bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-600 hover:to-cyan-600 text-white font-semibold py-3 px-4 rounded-xl transition-all duration-300 transform hover:-translate-y-0.5 shadow-lg hover:shadow-xl flex items-center justify-center gap-2 text-sm">
                                <i class="fas fa-list"></i>
                                Lihat Semua Departemen
                            </a>
                        </div>
                    </div>

                    <!-- Quick Stats -->
                    <div class="bg-gradient-to-br from-blue-500 to-cyan-500 rounded-2xl p-6 text-white shadow-xl">
                        <h4 class="font-bold text-lg mb-4 flex items-center gap-2">
                            <i class="fas fa-chart-bar"></i>
                            Statistik
                        </h4>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center">
                                <span class="text-blue-100 text-sm">Total Program</span>
                                <span class="font-bold text-white">{{ $departemen->programKerja->count() }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-blue-100 text-sm">Total Anggota</span>
                                <span class="font-bold text-white">{{ $departemen->anggota->count() }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-blue-100 text-sm">Status</span>
                                <span class="font-bold text-green-300 text-sm">Aktif</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
@keyframes pulse {
    0%, 100% { opacity: 0.7; }
    50% { opacity: 0.4; }
}
.animate-pulse {
    animation: pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}
.animation-delay-200 {
    animation-delay: 0.2s;
}
.animation-delay-400 {
    animation-delay: 0.4s;
}
.animation-delay-2000 {
    animation-delay: 2s;
}
.animation-delay-4000 {
    animation-delay: 4s;
}

/* Custom scrollbar for sidebar */
.custom-scrollbar::-webkit-scrollbar {
    width: 4px;
}
.custom-scrollbar::-webkit-scrollbar-track {
    background: #f1f5f9;
    border-radius: 10px;
}
.custom-scrollbar::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 10px;
}
.custom-scrollbar::-webkit-scrollbar-thumb:hover {
    background: #94a3b8;
}

/* Text justification */
.text-justify {
    text-align: justify;
    text-justify: inter-word;
    hyphens: auto;
}

/* Line clamp utilities */
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Responsive adjustments */
@media (max-width: 1024px) {
    .lg\:col-span-3 {
        grid-column: span 4 / span 4;
    }
    .lg\:col-span-1 {
        grid-column: span 4 / span 4;
    }
}

@media (max-width: 640px) {
    .text-justify {
        text-align: left;
        text-justify: auto;
    }
}

/* Smooth scrolling */
html {
    scroll-behavior: smooth;
}
</style>
@endsection





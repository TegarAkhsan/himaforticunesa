@extends('layouts.app')

@section('content')

@php
    // Ambil foto terbaru dari database
    $latestFoto = \App\Models\Himafortic::latest('tahun_periode')->first();
@endphp

<!-- HEADER SECTION -->
<div class="relative w-full h-[450px] sm:h-[520px] md:h-[600px] lg:h-[700px] flex items-center justify-center text-center overflow-hidden">

    {{-- Background dari Database --}}
    @if($latestFoto && $latestFoto->foto)
        <img src="{{ asset('storage/' . $latestFoto->foto) }}" 
             alt="HIMAFORTIC Latest Photo"
             class="absolute inset-0 w-full h-full object-cover object-center z-0">
    @else
        {{-- Background fallback pakai warna #1C3998 --}}
        <div class="absolute inset-0 bg-[#1C3998] z-0"></div>
    @endif

    {{-- Overlay biru transparan pakai warna #1C3998 --}}
    <div class="absolute inset-0 bg-[#1C3998]/60 mix-blend-multiply z-10"></div>

    {{-- Gradasi putih ke bawah --}}
    <div class="absolute bottom-0 left-0 w-full h-48 bg-gradient-to-t from-white via-white/80 to-transparent z-20"></div>

    {{-- Teks di atas gambar --}}
    <div class="relative z-30 px-4 sm:px-6 md:px-10 text-white max-w-4xl mx-auto">
        <h1 class="text-3xl sm:text-5xl md:text-6xl font-extrabold tracking-tight mb-2 sm:mb-4">
            HIMAFORTIC
        </h1>
        <h1 class="text-3xl sm:text-5xl md:text-6xl font-extrabold tracking-tight mb-4">
            <span class="text-[#AECBFF]">JOURNEY</span>
        </h1>
        <p class="mt-4 sm:mt-6 text-base sm:text-lg md:text-xl text-[#DCE5FF] leading-relaxed">
            A journey through HIMAFORTIC's leadership, innovation, and milestones — 
            celebrating our growth and achievements over the years.
        </p>
    </div>
</div>



<!-- HISTORY LIST SECTION -->
<section class="py-16 sm:py-20 bg-gradient-to-b from-white to-blue-50/20">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16 sm:space-y-20">

        @php
            $periodes = \App\Models\Himafortic::with(['ketua', 'wakil'])
                        ->orderByDesc('tahun_periode')
                        ->get();
        @endphp

        @foreach($periodes as $periode)
        <article class="bg-white/90 backdrop-blur-sm shadow-lg rounded-3xl overflow-hidden border border-blue-100/60 transition hover:shadow-2xl hover:-translate-y-1 duration-300">
            <div class="p-6 sm:p-8 md:p-12">

                <!-- Header Periode -->
                <div class="text-center mb-8 md:mb-10">
                    <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold bg-gradient-to-r from-blue-800 to-cyan-700 bg-clip-text text-transparent mb-2">
                        HIMAFORTIC {{ $periode->tahun_periode }}
                    </h2>
                    <div class="w-20 sm:w-24 h-1 bg-gradient-to-r from-blue-500 to-cyan-400 rounded-full mx-auto"></div>
                </div>

                <!-- Deskripsi & Foto -->
                <div class="relative text-slate-700 leading-relaxed text-justify">
                    @if($periode->foto)
                        <div class="relative md:float-right md:ml-6 mb-6 group flex justify-center md:justify-end">
                            <div class="absolute -inset-2 bg-gradient-to-r from-blue-400 to-cyan-400 rounded-lg blur opacity-25 group-hover:opacity-50 transition duration-300"></div>
                            <img src="{{ asset('storage/' . $periode->foto) }}" 
                                 alt="Foto Periode {{ $periode->tahun_periode }}" 
                                 class="relative w-full sm:w-3/4 md:w-72 lg:w-80 h-auto rounded-lg shadow-md object-cover z-10 group-hover:scale-105 transition duration-300">
                        </div>
                    @endif

                    @if($periode->deskripsi)
                        <div class="prose max-w-none">
                            {!! $periode->deskripsi !!}
                        </div>
                    @else
                        <p class="italic text-slate-400">No description available for this period.</p>
                    @endif

                    <div class="clear-both"></div>
                </div>

                <!-- Ketua & Wakil -->
                <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 gap-6 md:gap-10">
                    <!-- Ketua -->
                    <div class="flex items-center gap-4 sm:gap-5 bg-gradient-to-r from-blue-50 to-white border border-blue-100/70 rounded-2xl p-4 sm:p-5 shadow-sm hover:shadow-md transition">
                        <div class="relative w-20 h-20 sm:w-24 sm:h-24 rounded-full overflow-hidden group flex-shrink-0">
                            @if($periode->ketua && $periode->ketua->foto)
                                <img src="{{ asset('storage/' . $periode->ketua->foto) }}" 
                                    alt="Ketua Himpunan" 
                                    class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-blue-400 to-cyan-400 flex items-center justify-center text-white">
                                    <i class="fas fa-user text-2xl sm:text-3xl"></i>
                                </div>
                            @endif
                        </div>
                        <div>
                            <h3 class="text-base sm:text-lg font-bold text-slate-800">Ketua Himpunan</h3>
                            <p class="text-slate-600 text-sm sm:text-base">{{ $periode->ketua->nama ?? '—' }}</p>
                            <p class="text-xs sm:text-sm text-slate-500">NIM: {{ $periode->ketua->nim ?? '—' }}</p>
                        </div>
                    </div>

                    <!-- Wakil -->
                    <div class="flex items-center gap-4 sm:gap-5 bg-gradient-to-r from-cyan-50 to-white border border-cyan-100/70 rounded-2xl p-4 sm:p-5 shadow-sm hover:shadow-md transition">
                        <div class="relative w-20 h-20 sm:w-24 sm:h-24 rounded-full overflow-hidden group flex-shrink-0">
                            @if($periode->wakil && $periode->wakil->foto)
                                <img src="{{ asset('storage/' . $periode->wakil->foto) }}" 
                                    alt="Wakil Ketua Himpunan" 
                                    class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-cyan-400 to-blue-400 flex items-center justify-center text-white">
                                    <i class="fas fa-user text-2xl sm:text-3xl"></i>
                                </div>
                            @endif
                        </div>
                        <div>
                            <h3 class="text-base sm:text-lg font-bold text-slate-800">Wakil Ketua Himpunan</h3>
                            <p class="text-slate-600 text-sm sm:text-base">{{ $periode->wakil->nama ?? '—' }}</p>
                            <p class="text-xs sm:text-sm text-slate-500">NIM: {{ $periode->wakil->nim ?? '—' }}</p>
                        </div>
                    </div>
                </div>

            </div>
        </article>
        @endforeach

        {{-- === COMING SOON === --}}
        @if ($periodes->count() < 2)
            <div class="text-center mt-12 sm:mt-16">
                <p class="text-xl sm:text-2xl md:text-3xl font-bold text-slate-400 italic animate-pulse">
                    Nantikan History Lainnya 🚀 Coming Soon...
                </p>
            </div>
        @endif
    </div>
</section>

@endsection

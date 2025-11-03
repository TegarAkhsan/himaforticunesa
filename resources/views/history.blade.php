@extends('layouts.app')

@section('content')

 <!-- Header -->
<div class="bg-gradient-to-br from-blue-800 to-blue-950 text-white relative overflow-hidden">
    {{-- Animasi titik-titik di background untuk kesan modern --}}
    <div class="absolute inset-0 z-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=\'100\' height=\'100\' viewBox=\'0 0 100 100\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Ccircle cx=\'50\' cy=\'50\' r=\'10\' fill=\'%23ffffff\' fill-opacity=\'0.05\'/%3E%3C/svg%3E'); background-size: 20px 20px;"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 text-center">
        <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold tracking-tight text-white mb-4">
            Himafortic
        </h1>
        <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold tracking-tight text-white mb-4">
            <span class="text-blue-300">Journey</span>
        </h1>
        <p class="mt-6 max-w-3xl mx-auto text-lg text-blue-200">
            A journey through HIMAFORTIC's leadership, innovation, and milestones — celebrating our growth and achievements over the years.
        </p>
    </div>
</div>

<!-- History List Section -->
<section class="py-20 bg-gradient-to-b from-white to-blue-50/20">
    <div class="max-w-6xl mx-auto px-6 space-y-20">

        @php
            $periodes = \App\Models\Himafortic::with(['ketua', 'wakil'])
                        ->orderByDesc('tahun_periode')
                        ->get();
        @endphp

        @foreach($periodes as $periode)
        <article class="bg-white/90 backdrop-blur-sm shadow-lg rounded-3xl overflow-hidden border border-blue-100/60 transition hover:shadow-2xl hover:-translate-y-1 duration-300">
            <div class="p-8 md:p-12">

                <!-- Header -->
                <div class="text-center mb-10">
                    <h2 class="text-3xl font-extrabold bg-gradient-to-r from-blue-800 to-cyan-700 bg-clip-text text-transparent mb-2">
                        HIMAFORTIC {{ $periode->tahun_periode }}
                    </h2>
                    <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-cyan-400 rounded-full mx-auto"></div>
                </div>

                <!-- Deskripsi & Foto Periode -->
                <div class="relative text-slate-700 leading-relaxed text-justify">
                    @if($periode->foto)
                        <div class="relative float-right ml-6 mb-4 group">
                            <div class="absolute -inset-2 bg-gradient-to-r from-blue-400 to-cyan-400 rounded-lg blur opacity-25 group-hover:opacity-50 transition duration-300"></div>
                            <img src="{{ asset('storage/' . $periode->foto) }}" 
                                alt="Foto Periode {{ $periode->tahun_periode }}" 
                                class="relative w-72 h-auto rounded-lg shadow-md object-cover z-10 group-hover:scale-105 transition duration-300">
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
                <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 gap-10">
                    <!-- Ketua -->
                    <div class="flex items-center gap-5 bg-gradient-to-r from-blue-50 to-white border border-blue-100/70 rounded-2xl p-5 shadow-sm hover:shadow-md transition">
                        <div class="relative w-24 h-24 rounded-full overflow-hidden group">
                            @if($periode->ketua && $periode->ketua->foto)
                                <img src="{{ asset('storage/' . $periode->ketua->foto) }}" 
                                    alt="Ketua Himpunan" 
                                    class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-blue-400 to-cyan-400 flex items-center justify-center text-white">
                                    <i class="fas fa-user text-3xl"></i>
                                </div>
                            @endif
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-slate-800">Ketua Himpunan</h3>
                            <p class="text-slate-600">{{ $periode->ketua->nama ?? '—' }}</p>
                            <p class="text-sm text-slate-500">NIM: {{ $periode->ketua->nim ?? '—' }}</p>
                        </div>
                    </div>

                    <!-- Wakil -->
                    <div class="flex items-center gap-5 bg-gradient-to-r from-cyan-50 to-white border border-cyan-100/70 rounded-2xl p-5 shadow-sm hover:shadow-md transition">
                        <div class="relative w-24 h-24 rounded-full overflow-hidden group">
                            @if($periode->wakil && $periode->wakil->foto)
                                <img src="{{ asset('storage/' . $periode->wakil->foto) }}" 
                                    alt="Wakil Ketua Himpunan" 
                                    class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-cyan-400 to-blue-400 flex items-center justify-center text-white">
                                    <i class="fas fa-user text-3xl"></i>
                                </div>
                            @endif
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-slate-800">Wakil Ketua Himpunan</h3>
                            <p class="text-slate-600">{{ $periode->wakil->nama ?? '—' }}</p>
                            <p class="text-sm text-slate-500">NIM: {{ $periode->wakil->nim ?? '—' }}</p>
                        </div>
                    </div>
                </div>

            </div>
        </article>
        @endforeach

        {{-- === COMING SOON === --}}
        @if ($periodes->count() < 2)
            <div class="text-center mt-16">
                <p class="text-2xl md:text-3xl font-bold text-slate-400 italic animate-pulse">
                    Nantikan History Lainnya
                </p>
                <p class="text-2xl md:text-3xl font-bold text-slate-400 italic animate-pulse">
                    🚀 Coming Soon...
                </p>
            </div>
        @endif
    </div>
</section>


@endsection

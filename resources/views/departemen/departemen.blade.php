@extends('layouts.app')

@section('content')

 <!-- Header -->
<div class="bg-gradient-to-br from-blue-800 to-blue-950 text-white relative overflow-hidden">
    {{-- Animasi titik-titik di background untuk kesan modern --}}
    <div class="absolute inset-0 z-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=\'100\' height=\'100\' viewBox=\'0 0 100 100\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Ccircle cx=\'50\' cy=\'50\' r=\'10\' fill=\'%23ffffff\' fill-opacity=\'0.05\'/%3E%3C/svg%3E'); background-size: 20px 20px;"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 text-center">
        <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold tracking-tight text-white mb-4">
            About
        </h1>
        <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold tracking-tight text-white mb-4">
            <span class="text-blue-300">Himafortic</span>
        </h1>
        <p class="mt-6 max-w-3xl mx-auto text-lg text-blue-200">
            The Student Association of D4 Informatics Management a place where innovation, leadership, 
            and collaboration grow to shape future technology professionals.
        </p>
    </div>
</div>

<!-- Periode Sekarang -->
@if($periode)
<section class="py-16 bg-gradient-to-b from-white to-blue-50/30">
    <div class="max-w-6xl mx-auto px-4 text-center">
        <div class="mb-8">
            <h2 class="text-3xl md:text-4xl font-bold bg-gradient-to-r from-blue-800 to-cyan-700 bg-clip-text text-transparent mb-3">
                HIMAFORTIC {{ $periode->tahun_periode }}
            </h2>
            <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-cyan-400 rounded-full mx-auto"></div>
        </div>

        {{-- Ketua dan Wakil (diletakkan di bawah judul) --}}
        <div class="flex justify-center gap-10 md:gap-16 flex-wrap mb-10">
            {{-- Ketua --}}
            <div class="text-center group">
                <div class="relative inline-block mb-3">
                    @if($periode->ketua && $periode->ketua->foto)
                        <div class="absolute -inset-2 bg-gradient-to-r from-blue-400 to-cyan-400 rounded-full blur opacity-25 group-hover:opacity-50 transition duration-300"></div>
                        <img src="{{ asset('storage/' . $periode->ketua->foto) }}" 
                            alt="Chairman" 
                            class="relative w-20 h-20 rounded-full object-cover border-2 border-white shadow-md z-10 transform group-hover:scale-105 transition duration-300">
                    @else
                        <div class="w-20 h-20 rounded-full bg-gradient-to-br from-blue-400 to-cyan-400 flex items-center justify-center text-white shadow-md">
                            <i class="fas fa-user text-lg"></i>
                        </div>
                    @endif
                </div>
                <h3 class="font-semibold text-base text-slate-800">{{ $periode->ketua->nama ?? '—' }}</h3>
                <p class="text-xs bg-gradient-to-r from-blue-600 to-cyan-500 bg-clip-text text-transparent font-medium mt-1">Ketua Himpunan</p>
            </div>

            {{-- Wakil --}}
            <div class="text-center group">
                <div class="relative inline-block mb-3">
                    @if($periode->wakil && $periode->wakil->foto)
                        <div class="absolute -inset-2 bg-gradient-to-r from-cyan-400 to-blue-400 rounded-full blur opacity-25 group-hover:opacity-50 transition duration-300"></div>
                        <img src="{{ asset('storage/' . $periode->wakil->foto) }}" 
                            alt="Vice Chairman" 
                            class="relative w-20 h-20 rounded-full object-cover border-2 border-white shadow-md z-10 transform group-hover:scale-105 transition duration-300">
                    @else
                        <div class="w-20 h-20 rounded-full bg-gradient-to-br from-cyan-400 to-blue-400 flex items-center justify-center text-white shadow-md">
                            <i class="fas fa-user text-lg"></i>
                        </div>
                    @endif
                </div>
                <h3 class="font-semibold text-base text-slate-800">{{ $periode->wakil->nama ?? '—' }}</h3>
                <p class="text-xs bg-gradient-to-r from-cyan-500 to-blue-500 bg-clip-text text-transparent font-medium mt-1">Wakil Ketua Himpunan</p>
            </div>
        </div>

        {{-- Foto + Deskripsi --}}
        @if($periode->foto || $periode->deskripsi)
        <div class="max-w-5xl mx-auto text-left text-slate-700 leading-relaxed bg-white/80 backdrop-blur-sm rounded-2xl p-8 shadow-lg border border-blue-100/50">
            @if($periode->foto)
            <div class="relative float-right ml-6 mb-4 group">
                <div class="absolute -inset-2 bg-gradient-to-r from-blue-400 to-cyan-400 rounded-lg blur opacity-25 group-hover:opacity-50 transition duration-300"></div>
                <img src="{{ asset('storage/' . $periode->foto) }}" 
                    alt="Period Photo {{ $periode->tahun_periode }}" 
                    class="relative w-72 h-auto rounded-lg shadow-md object-cover z-10 transform group-hover:scale-105 transition duration-300">
            </div>
            @endif

            @if($periode->deskripsi)
            <div class="text-justify prose prose-lg max-w-none">
                {!! $periode->deskripsi !!}
            </div>
            @endif
            <div class="clear-both"></div>
        </div>
        @endif
    </div>
</section>
@endif


<!-- Departments Section -->
<section class="py-16 bg-gradient-to-b from-slate-50 to-blue-50/50 border-t border-blue-100/40">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Section Header -->
    <div class="text-center mb-12">
      <div class="inline-flex items-center justify-center space-x-2 mb-4">
        <div class="w-3 h-0.5 bg-blue-400 rounded-full"></div>
        <div class="w-3 h-0.5 bg-cyan-400 rounded-full"></div>
        <div class="w-3 h-0.5 bg-indigo-400 rounded-full"></div>
      </div>
      <h2 class="text-3xl md:text-4xl font-bold bg-gradient-to-r from-blue-800 to-cyan-700 bg-clip-text text-transparent mb-4">
        Departemen HIMAFORTIC
      </h2>
      <p class="text-slate-600 text-base md:text-lg max-w-2xl mx-auto">
        Berbagai departemen yang berperan penting dalam menjalankan program kerja HIMAFORTIC.
      </p>
    </div>

    <!-- Departments Grid (5 columns on large screens) -->
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-6">
      @foreach ($departemen as $item)
      <div
        class="group bg-white/90 backdrop-blur-sm rounded-xl shadow-md hover:shadow-lg transition-all duration-500 transform hover:-translate-y-2 border border-blue-100/50 overflow-hidden">
        <!-- Department Image -->
        @if ($item->foto)
        <div class="relative h-32 overflow-hidden">
          <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}"
            class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700">
          <div class="absolute inset-0 bg-gradient-to-t from-blue-900/20 to-transparent"></div>
        </div>
        @else
        <div
          class="w-full h-32 bg-gradient-to-br from-blue-100 to-cyan-100 flex items-center justify-center text-slate-500">
          <i class="fas fa-building text-2xl text-blue-400"></i>
        </div>
        @endif

        <!-- Department Content -->
        <div class="p-4 text-center">
          <h3 class="text-base font-bold text-slate-800 mb-2 group-hover:text-blue-700 transition-colors">
            {{ $item->nama }}
          </h3>
            <p class="text-slate-600 text-xs mb-3 leading-snug line-clamp-2">
                {{ \Illuminate\Support\Str::limit(strip_tags($item->deskripsi), 70, '...') }}
            </p>

          <a href="{{ url('/departemen/' . $item->id) }}"
            class="inline-flex items-center justify-center space-x-1 bg-gradient-to-r from-blue-500 to-cyan-500 text-white px-3 py-1.5 rounded-md text-xs font-semibold hover:shadow-md transform hover:scale-105 transition duration-300 group/btn">
            <span>Detail</span>
            <i class="fas fa-arrow-right group-hover/btn:translate-x-1 transition-transform duration-300 text-[10px]"></i>
          </a>
        </div>
      </div>
      @endforeach
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

/* Line clamp utility */
.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Smooth scrolling */
html { 
    scroll-behavior: smooth; 
}

/* Text justification */
.text-justify {
    text-align: justify;
    text-justify: inter-word;
    hyphens: auto;
}

/* Responsive adjustments */
@media (max-width: 640px) {
    .text-justify {
        text-align: left;
        text-justify: auto;
    }
}
</style>
@endsection

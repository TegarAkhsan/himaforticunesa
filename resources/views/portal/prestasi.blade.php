@extends('layouts.navbar')

@section('content')
    <div class="min-h-screen text-white overflow-hidden relative font-sans selection:bg-amber-500/30">

        <!-- Background Elements -->
        <div class="fixed inset-0 z-0 pointer-events-none">
            <div
                class="absolute top-[-10%] right-[-5%] w-[600px] h-[600px] bg-amber-600/20 rounded-full blur-[120px] animate-pulse">
            </div>
            <div
                class="absolute bottom-[-10%] left-[-5%] w-[600px] h-[600px] bg-blue-900/20 rounded-full blur-[120px] animate-pulse delay-1000">
            </div>
            <div class="absolute top-[40%] left-[30%] w-[300px] h-[300px] bg-purple-600/10 rounded-full blur-[100px]">
            </div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

            <!-- Hero Section -->
            <div class="text-center mb-24 relative">
                <div
                    class="inline-flex items-center gap-2 mb-6 px-4 py-2 rounded-full border border-amber-500/30 bg-amber-500/10 backdrop-blur-md shadow-[0_0_15px_rgba(245,158,11,0.2)]">
                    <i class="fas fa-star text-amber-400 text-xs"></i>
                    <span class="text-amber-300 text-sm font-bold tracking-wider uppercase">Hall of
                        Fame</span>
                    <i class="fas fa-star text-amber-400 text-xs"></i>
                </div>
                <h1 class="text-5xl md:text-7xl font-extrabold mb-8 tracking-tight leading-tight">
                    <span
                        class="bg-clip-text text-transparent bg-gradient-to-r from-amber-200 via-yellow-400 to-amber-600 drop-shadow-[0_0_10px_rgba(251,191,36,0.3)]">
                        Our Achievements
                    </span>
                </h1>
                <p class="text-slate-300 text-lg md:text-xl max-w-3xl mx-auto leading-relaxed font-light">
                    Jejak prestasi gemilang dan kontribusi nyata <span class="text-white font-semibold">HIMAFORTIC</span>
                    dalam kancah nasional dan internasional.
                </p>
            </div>

            <!-- Prestasi Organisasi Section -->
            <div class="mb-32">
                <div class="flex items-center gap-4 mb-12 border-b border-white/10 pb-6">
                    <div
                        class="p-4 bg-gradient-to-br from-amber-500/20 to-orange-600/20 rounded-2xl border border-amber-500/30 shadow-[0_0_20px_rgba(245,158,11,0.15)]">
                        <i class="fas fa-trophy text-3xl text-amber-400"></i>
                    </div>
                    <div>
                        <h2 class="text-3xl font-bold text-white">Prestasi Organisasi</h2>
                        <p class="text-slate-400 text-sm mt-1">Penghargaan yang diraih oleh himpunan</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                    @forelse($prestasiOrganisasi as $prestasi)
                        <!-- Org Achievement -->
                        <div class="group relative">
                            <div
                                class="absolute -inset-1 bg-gradient-to-r from-amber-500 to-orange-600 rounded-3xl opacity-20 blur-lg group-hover:opacity-60 transition duration-500">
                            </div>
                            <div
                                class="relative h-full bg-[#0f172a]/80 backdrop-blur-xl border border-white/10 rounded-3xl p-8 hover:bg-[#1e293b]/90 transition-all duration-300 flex flex-col md:flex-row gap-8 items-center md:items-start transform group-hover:-translate-y-1">
                                <div
                                    class="w-28 h-28 flex-shrink-0 bg-gradient-to-br from-amber-400 to-orange-600 rounded-2xl flex flex-col items-center justify-center shadow-lg shadow-amber-500/30 rotate-3 group-hover:rotate-0 transition-transform duration-300">
                                    <span
                                        class="text-4xl font-black text-white drop-shadow-md">{{ $prestasi->peringkat }}</span>
                                    <span
                                        class="text-xs font-bold text-white/90 uppercase tracking-widest mt-1">{{ $prestasi->tingkat }}</span>
                                </div>
                                <div class="text-center md:text-left">
                                    <h3 class="text-2xl font-bold mb-3 text-white group-hover:text-amber-400 transition-colors">
                                        {{ $prestasi->judul }}
                                    </h3>
                                    <p class="text-slate-300 mb-5 leading-relaxed">{{ $prestasi->deskripsi }}
                                    </p>
                                    <div
                                        class="inline-flex items-center gap-2 px-3 py-1 bg-white/5 rounded-lg border border-white/10 text-sm text-slate-300">
                                        <i class="far fa-calendar-alt text-amber-400"></i>
                                        {{ $prestasi->tanggal ? $prestasi->tanggal->format('F Y') : '-' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-12">
                            <p class="text-slate-400">Belum ada prestasi organisasi yang tercatat.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Prestasi Anggota Section -->
            <div>
                <div class="flex items-center gap-4 mb-12 border-b border-white/10 pb-6">
                    <div
                        class="p-4 bg-gradient-to-br from-blue-500/20 to-indigo-600/20 rounded-2xl border border-blue-500/30 shadow-[0_0_20px_rgba(59,130,246,0.15)]">
                        <i class="fas fa-users text-3xl text-blue-400"></i>
                    </div>
                    <div>
                        <h2 class="text-3xl font-bold text-white">Prestasi Anggota</h2>
                        <p class="text-slate-400 text-sm mt-1">Kebanggaan dari mahasiswa HIMAFORTIC</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse($prestasiAnggota as $anggota)
                        <!-- Member Achievement -->
                        <div
                            class="group bg-[#0f172a]/60 backdrop-blur-md border border-white/5 rounded-2xl overflow-hidden hover:bg-[#1e293b] hover:border-amber-500/30 transition-all duration-300 hover:shadow-[0_0_30px_rgba(245,158,11,0.1)] flex flex-col h-full">

                            <!-- Image Section -->
                            <div class="h-40 w-full overflow-hidden relative">
                                <div class="absolute inset-0 bg-gradient-to-t from-[#0f172a] to-transparent z-10 opacity-60">
                                </div>
                                @if($anggota->foto_mahasiswa)
                                    <img src="{{ asset('storage/' . $anggota->foto_mahasiswa) }}"
                                        alt="{{ $anggota->judul_kompetisi }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full bg-slate-800 flex items-center justify-center">
                                        <i class="fas fa-trophy text-4xl text-slate-600"></i>
                                    </div>
                                @endif
                            </div>

                            <!-- Content Section -->
                            <div class="p-5 flex-1 flex flex-col">
                                <h3
                                    class="text-lg font-bold text-white leading-tight mb-3 group-hover:text-amber-400 transition-colors">
                                    {{ $anggota->judul_kompetisi }}
                                </h3>

                                <div class="mb-4 space-y-2">
                                    <!-- Rank -->
                                    <span
                                        class="inline-block px-2.5 py-0.5 bg-amber-500/10 text-amber-400 text-xs font-bold rounded border border-amber-500/20">
                                        {{ $anggota->peringkat }}
                                    </span>

                                    <!-- Organizer -->
                                    <div class="flex items-center gap-2 text-xs text-slate-400">
                                        <i class="fas fa-university text-slate-500"></i>
                                        <span>{{ $anggota->penyelenggara }}</span>
                                    </div>
                                </div>

                                <div class="mt-auto pt-3 border-t border-white/5">
                                    <div class="flex items-center justify-between mb-2">
                                        <h4 class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Tim Mahasiswa
                                        </h4>
                                        <span
                                            class="text-[10px] font-medium text-slate-600 bg-slate-800 px-2 py-0.5 rounded-full">
                                            {{ $anggota->angkatan }}
                                        </span>
                                    </div>

                                    <ul class="list-disc list-outside pl-4 space-y-1">
                                        @php
                                            $names = explode(',', $anggota->nama_mahasiswa);
                                        @endphp
                                        @foreach($names as $name)
                                            <li class="text-sm text-slate-300 leading-snug">
                                                {{ trim($name) }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-12">
                            <p class="text-slate-400">Belum ada prestasi anggota yang tercatat.</p>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
@endsection
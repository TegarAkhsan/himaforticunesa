@extends('layouts.navbar')

@section('content')
    <div class="min-h-screen bg-[#020617] text-slate-200 pt-32 pb-20 px-4 relative overflow-hidden">

        <!-- Background Effects -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
            <div
                class="absolute top-[-10%] left-[-10%] w-[600px] h-[600px] bg-purple-600/10 rounded-full blur-[120px] animate-pulse">
            </div>
            <div
                class="absolute bottom-[-10%] right-[-10%] w-[600px] h-[600px] bg-blue-600/10 rounded-full blur-[120px] animate-pulse delay-1000">
            </div>
        </div>

        <div class="max-w-3xl mx-auto relative z-10">

            <!-- Header -->
            <div class="text-center mb-12">
                <div
                    class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-purple-500/10 border border-purple-500/20 text-purple-400 text-xs font-bold tracking-wider uppercase mb-6">
                    <i class="fas fa-user-secret"></i>
                    Advokasi Mahasiswa
                </div>
                <h1 class="text-4xl md:text-5xl font-black text-white mb-6 tracking-tight">
                    Suara Anda, <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-400">Prioritas
                        Kami</span>
                </h1>
                <p class="text-slate-400 text-lg leading-relaxed max-w-2xl mx-auto">
                    Sampaikan aspirasi, keluhan, atau saran Anda untuk kemajuan HIMAFORTIC.
                    Identitas Anda dijamin <span class="text-white font-bold">100% AMAN & ANONIM</span>.
                </p>
            </div>

            <!-- Form Card -->
            <div
                class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-3xl p-8 md:p-10 shadow-2xl relative group">
                <div
                    class="absolute -inset-1 bg-gradient-to-r from-purple-500 to-pink-500 rounded-[1.6rem] opacity-20 blur group-hover:opacity-30 transition duration-500">
                </div>

                <div class="relative">
                    @if(session('success'))
                        <div
                            class="mb-8 p-4 rounded-xl bg-green-500/10 border border-green-500/20 text-green-400 flex items-center gap-3">
                            <i class="fas fa-check-circle text-xl"></i>
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif

                    <form action="{{ route('advokasi.store') }}" method="POST">
                        @csrf

                        <div class="mb-8">
                            <label for="message"
                                class="block text-sm font-bold text-slate-300 mb-3 uppercase tracking-wider">
                                Pesan Anda
                            </label>
                            <div class="relative">
                                <textarea name="message" id="message" rows="8"
                                    class="w-full bg-[#0f172a] border border-white/10 rounded-2xl p-5 text-slate-200 focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500 transition-all placeholder:text-slate-600 resize-none"
                                    placeholder="Tuliskan aspirasi atau keluhan Anda di sini... (Minimal 10 karakter)"
                                    required></textarea>
                                <div class="absolute bottom-4 right-4 text-slate-600 text-xs">
                                    <i class="fas fa-lock mr-1"></i> Terenkripsi & Anonim
                                </div>
                            </div>
                            @error('message')
                                <p class="mt-2 text-red-400 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit"
                            class="w-full py-4 px-6 rounded-xl bg-gradient-to-r from-purple-600 to-pink-600 text-white font-bold text-lg shadow-lg shadow-purple-500/25 hover:shadow-purple-500/40 hover:scale-[1.02] transition-all duration-300 flex items-center justify-center gap-3 group">
                            <span>Kirim Pesan Anonim</span>
                            <i class="fas fa-paper-plane group-hover:translate-x-1 transition-transform"></i>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Security Badge -->
            <div class="mt-12 flex justify-center gap-8 text-slate-500 text-sm font-medium">
                <div class="flex items-center gap-2">
                    <i class="fas fa-shield-alt text-purple-500"></i>
                    <span>Tanpa Log Data</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="fas fa-user-slash text-pink-500"></i>
                    <span>Identitas Tersembunyi</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="fas fa-lock text-blue-500"></i>
                    <span>Privasi Terjamin</span>
                </div>
            </div>

        </div>
    </div>
@endsection
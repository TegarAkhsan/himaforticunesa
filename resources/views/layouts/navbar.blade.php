@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SEO Meta Tags -->
    <title>@yield('title', 'HIMAFORTIC UNESA - Himpunan Mahasiswa Manajemen Informatika')</title>
    <meta name="description"
        content="@yield('description', 'Website resmi Himpunan Mahasiswa Manajemen Informatika (HIMAFORTIC) UNESA. Wadah aspirasi, pengembangan potensi, dan inovasi mahasiswa Vokasi UNESA.')">
    <meta name="keywords"
        content="HIMAFORTIC, UNESA, Manajemen Informatika, Organisasi Mahasiswa, Teknologi, Vokasi, Surabaya, Coding, Web Development">
    <meta name="author" content="HIMAFORTIC Dev Team">
    <meta name="robots" content="index, follow">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'HIMAFORTIC UNESA')">
    <meta property="og:description"
        content="@yield('description', 'Website resmi Himpunan Mahasiswa Manajemen Informatika (HIMAFORTIC) UNESA.')">
    <meta property="og:image" content="@yield('og_image', asset('assets/logo-himafortic.png'))">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="@yield('title', 'HIMAFORTIC UNESA')">
    <meta property="twitter:description"
        content="@yield('description', 'Website resmi Himpunan Mahasiswa Manajemen Informatika (HIMAFORTIC) UNESA.')">
    <meta property="twitter:image" content="@yield('og_image', asset('assets/logo-himafortic.png'))">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Montserrat:wght@400;500;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Navbar fixed dengan tinggi yang tepat */
        nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            height: 80px;
            /* Increased height for better spacing */
            transition: all 0.3s ease;
        }

        /* Main content harus memiliki padding top sebesar tinggi navbar */
        main {
            flex: 1;
            padding-top: 80px;
            /* Match navbar height */
            min-height: calc(100vh - 80px);
            display: flex;
            flex-direction: column;
        }

        /* ... (rest of CSS) ... */
    </style>
</head>

<body
    class="{{ (request()->is('history') || request()->routeIs('portal.*') || request()->is('departemen*')) ? 'bg-[#020617]' : 'bg-gray-50' }} text-slate-800 font-sans antialiased">

    @php
        $isDarkPage = request()->is('history') || request()->routeIs('portal.*') || request()->is('departemen*');
        $navClass = $isDarkPage
            ? 'fixed top-4 left-4 right-4 z-50 bg-[#020617]/80 backdrop-blur-xl border border-white/10 rounded-2xl transition-all duration-300'
            : 'fixed top-4 left-4 right-4 z-50 bg-white/70 backdrop-blur-xl border border-white/20 shadow-[0_8px_30px_rgb(0,0,0,0.04)] rounded-2xl transition-all duration-300';
        $textClass = $isDarkPage ? 'text-slate-300 hover:text-white' : 'text-slate-600 hover:text-blue-600';
        $activeClass = $isDarkPage ? 'text-white' : 'text-blue-600';
        $logoTextClass = $isDarkPage ? 'text-white' : 'text-slate-800';
        $mobileBtnClass = $isDarkPage ? 'text-slate-300 hover:text-white' : 'text-slate-600 hover:text-blue-600';
    @endphp

    <nav class="{{ $navClass }}">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center"> <!-- Reduced height slightly for floating look -->
                <!-- Logo -->
                <a href="{{ url('/') }}" class="flex-shrink-0 flex items-center gap-3">
                    <img src="{{ asset('assets/logo-himafortic.png') }}" alt="HIMAFORTIC Logo"
                        class="h-8 w-auto object-contain"> <!-- Slightly smaller logo -->
                    <span class="font-bold text-lg tracking-tight {{ $logoTextClass }}">HIMAFORTIC</span>
                </a>

                <!-- Tombol Mobile -->
                <button id="mobile-menu-btn" type="button"
                    class="md:hidden {{ $mobileBtnClass }} focus:outline-none p-3 min-h-[44px] min-w-[44px] flex items-center justify-center transition-colors">
                    <i class="fas fa-bars fa-lg"></i>
                </button>

                <!-- Menu Desktop -->
                <div class="hidden md:flex md:items-center md:space-x-8">
                    <a href="{{ url('/') }}"
                        class="text-sm font-medium transition-colors {{ request()->is('/') ? $activeClass : $textClass }}">Homepage</a>

                    <!-- Dropdown Departemen -->
                    <div class="relative group">
                        <a href="{{ url('departemen') }}"
                            class="flex items-center gap-1 text-sm font-medium transition-colors {{ request()->is('departemen*') ? $activeClass : $textClass }}">
                            Departemen <i class="fas fa-chevron-down text-[10px] ml-1 opacity-50"></i>
                        </a>
                        <ul
                            class="absolute left-0 mt-4 w-56 bg-white border border-slate-100 rounded-2xl shadow-xl opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all duration-300 z-10 overflow-hidden">
                            @if(isset($departemen) && $departemen->count() > 0)
                                @foreach ($departemen as $item)
                                    <li><a href="{{ url('departemen/' . $item->slug) }}"
                                            class="block px-6 py-3 text-sm text-slate-600 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200">{{ $item->nama }}</a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>

                    <a href="{{ url('history') }}"
                        class="text-sm font-medium transition-colors {{ request()->is('history') ? $activeClass : $textClass }}">History</a>
                    <a href="{{ url('berita') }}"
                        class="text-sm font-medium transition-colors {{ request()->is('berita') ? $activeClass : $textClass }}">Artikel</a>
                    <a href="{{ url('merchandise') }}"
                        class="text-sm font-medium transition-colors {{ request()->is('merchandise') ? $activeClass : $textClass }}">Merchandise</a>

                    <a href="{{ route('portal.lomba') }}"
                        class="text-sm font-medium transition-colors {{ request()->routeIs('portal.lomba') ? $activeClass : $textClass }}">Portal
                        Lomba</a>

                    <a href="{{ route('portal.prestasi') }}"
                        class="text-sm font-medium transition-colors {{ request()->routeIs('portal.prestasi') ? $activeClass : $textClass }}">Prestasi</a>

                    <a href="{{ route('advokasi.index') }}"
                        class="text-sm font-medium transition-colors {{ request()->routeIs('advokasi.index') ? $activeClass : $textClass }}">Advokasi</a>

                    <!-- Dropdown Dokumen -->
                    <div class="relative group">
                        <button type="button"
                            class="bg-blue-600 text-white text-sm font-bold flex items-center gap-2 px-6 py-2.5 rounded-full hover:bg-blue-700 transition-all duration-300 shadow-lg shadow-blue-600/20 hover:shadow-blue-600/30">
                            Dokumen <i class="fas fa-chevron-down text-[10px]"></i>
                        </button>
                        <ul
                            class="absolute right-0 mt-4 w-64 bg-white border border-slate-100 rounded-2xl shadow-xl opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all duration-300 z-10 overflow-hidden">
                            @if(isset($files) && $files->count() > 0)
                                @foreach ($files as $file)
                                    @php
                                        $namaTanpaEkstensi = pathinfo($file->nama_file, PATHINFO_FILENAME);
                                    @endphp
                                    <li>
                                        <a href="{{ route('file.download', $file->id) }}"
                                            class="flex justify-between items-center px-6 py-3 text-sm text-slate-600 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200 group/item">
                                            <span>{{ $namaTanpaEkstensi }}</span>
                                            <i class="fas fa-download text-xs opacity-50 group-hover/item:opacity-100"></i>
                                        </a>
                                    </li>
                                @endforeach
                            @else
                                <li>
                                    <p class="px-6 py-3 text-sm text-slate-400 italic">Belum ada file</p>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Menu Mobile -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-slate-100 shadow-xl">
            <div class="px-4 py-4 space-y-2">
                <a href="{{ url('/') }}"
                    class="block px-4 py-3 text-slate-600 hover:text-blue-600 hover:bg-blue-50 font-medium rounded-xl transition-colors">Homepage</a>

                <div class="border-t border-slate-100 pt-2 mt-2">
                    <p class="text-slate-400 font-bold mb-2 px-4 text-xs uppercase tracking-wider">Departemen</p>
                    <div class="space-y-1">
                        @if(isset($departemen) && $departemen->count() > 0)
                            @foreach ($departemen as $item)
                                <a href="{{ url('departemen/' . $item->slug) }}"
                                    class="block px-4 py-3 text-slate-600 hover:text-blue-600 hover:bg-blue-50 rounded-xl ml-2 transition-colors text-sm">{{ $item->nama }}</a>
                            @endforeach
                        @endif
                    </div>
                </div>

                <a href="{{ url('history') }}"
                    class="block px-4 py-3 text-slate-600 hover:text-blue-600 hover:bg-blue-50 font-medium rounded-xl transition-colors">History</a>
                <a href="{{ url('berita') }}"
                    class="block px-4 py-3 text-slate-600 hover:text-blue-600 hover:bg-blue-50 font-medium rounded-xl transition-colors">Artikel</a>
                <a href="{{ url('merchandise') }}"
                    class="block px-4 py-3 text-slate-600 hover:text-blue-600 hover:bg-blue-50 font-medium rounded-xl transition-colors">Merchandise</a>
                <a href="{{ route('portal.lomba') }}"
                    class="block px-4 py-3 text-slate-600 hover:text-blue-600 hover:bg-blue-50 font-medium rounded-xl transition-colors">Portal
                    Lomba</a>
                <a href="{{ route('portal.prestasi') }}"
                    class="block px-4 py-3 text-slate-600 hover:text-blue-600 hover:bg-blue-50 font-medium rounded-xl transition-colors">Prestasi</a>
                <a href="{{ route('advokasi.index') }}"
                    class="block px-4 py-3 text-slate-600 hover:text-blue-600 hover:bg-blue-50 font-medium rounded-xl transition-colors">Advokasi</a>

                <div class="border-t border-slate-100 pt-2 mt-2">
                    <p class="text-slate-400 font-bold mb-2 px-4 text-xs uppercase tracking-wider">Dokumen</p>
                    <div class="space-y-1">
                        @if(isset($files) && $files->count() > 0)
                            @foreach ($files as $file)
                                @php
                                    $namaTanpaEkstensi = pathinfo($file->nama_file, PATHINFO_FILENAME);
                                @endphp
                                <a href="{{ route('file.download', $file->id) }}"
                                    class="flex justify-between items-center px-4 py-3 text-slate-600 hover:text-blue-600 hover:bg-blue-50 rounded-xl ml-2 transition-colors text-sm">
                                    <span>{{ $namaTanpaEkstensi }}</span>
                                    <i class="fas fa-download text-xs opacity-50"></i>
                                </a>
                            @endforeach
                        @else
                            <p class="text-slate-400 italic px-4 py-3 ml-2 text-sm">Belum ada file</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const btn = document.getElementById('mobile-menu-btn');
            const menu = document.getElementById('mobile-menu');

            if (btn && menu) {
                // Toggle mobile menu dengan animasi smooth
                btn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    const isHidden = menu.classList.contains('hidden');

                    if (isHidden) {
                        // Buka menu
                        menu.classList.remove('hidden');
                        setTimeout(() => {
                            menu.style.maxHeight = '80vh';
                        }, 10);
                    } else {
                        // Tutup menu
                        menu.style.maxHeight = '0';
                        setTimeout(() => {
                            menu.classList.add('hidden');
                        }, 300);
                    }
                });

                // Menutup menu jika klik di luar
                document.addEventListener('click', (e) => {
                    if (!menu.contains(e.target) && !btn.contains(e.target) && !menu.classList.contains('hidden')) {
                        menu.style.maxHeight = '0';
                        setTimeout(() => {
                            menu.classList.add('hidden');
                        }, 300);
                    }
                });

                // Close menu ketika link di klik (untuk navigasi)
                menu.addEventListener('click', (e) => {
                    if (e.target.tagName === 'A') {
                        menu.style.maxHeight = '0';
                        setTimeout(() => {
                            menu.classList.add('hidden');
                        }, 300);
                    }
                });

                // Handle escape key
                document.addEventListener('keydown', (e) => {
                    if (e.key === 'Escape' && !menu.classList.contains('hidden')) {
                        menu.style.maxHeight = '0';
                        setTimeout(() => {
                            menu.classList.add('hidden');
                        }, 300);
                    }
                });

                // Auto close pada resize (jika kembali ke desktop)
                window.addEventListener('resize', () => {
                    if (window.innerWidth >= 768 && !menu.classList.contains('hidden')) {
                        menu.style.maxHeight = '0';
                        setTimeout(() => {
                            menu.classList.add('hidden');
                        }, 300);
                    }
                });
            }
        });
    </script>

    <!-- Main content dengan wrapper -->
    <main>
        <div class="content-wrapper">
            @yield('content')
        </div>

        <!-- Footer ditempatkan di dalam main tapi setelah content -->

        <footer class="relative w-full bg-[#020617] text-white mt-auto border-t border-white/5 z-40">
            <!-- Background Glow -->
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-blue-600/10 rounded-full blur-[100px] pointer-events-none">
            </div>
            <div
                class="absolute bottom-0 right-1/4 w-96 h-96 bg-purple-600/10 rounded-full blur-[100px] pointer-events-none">
            </div>

            <div class="relative z-10 max-w-7xl mx-auto px-6 pt-16 pb-8">
                <div class="grid grid-cols-1 md:grid-cols-12 gap-12 mb-12">
                    <!-- Brand Section -->
                    <div class="md:col-span-5 space-y-6">
                        <a href="{{ url('/') }}" class="flex items-center gap-3 group">
                            <div class="relative">
                                <div
                                    class="absolute inset-0 bg-blue-500 blur-lg opacity-20 group-hover:opacity-40 transition-opacity">
                                </div>
                                <img src="{{ asset('assets/logo-himafortic.png') }}" alt="HIMAFORTIC Logo"
                                    class="relative h-10 w-auto object-contain">
                            </div>
                            <span
                                class="font-bold text-2xl tracking-tight bg-clip-text text-transparent bg-gradient-to-r from-white to-slate-400">HIMAFORTIC</span>
                        </a>
                        <p class="text-slate-400 leading-relaxed text-sm max-w-md">
                            Himpunan Mahasiswa D4 Manajemen Informatika Universitas Negeri Surabaya. Berkomitmen
                            mengembangkan potensi mahasiswa dalam teknologi informasi dan inovasi digital.
                        </p>
                        <div class="flex gap-4">
                            <a href="https://www.instagram.com/himafortic_unesa" target="_blank"
                                class="w-10 h-10 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-slate-400 hover:bg-gradient-to-br hover:from-purple-600 hover:to-pink-600 hover:text-white hover:border-transparent transition-all duration-300 group">
                                <i class="fab fa-instagram text-lg group-hover:scale-110 transition-transform"></i>
                            </a>
                            <a href="https://www.tiktok.com/@himafortic_unesa" target="_blank"
                                class="w-10 h-10 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-slate-400 hover:bg-gradient-to-br hover:from-slate-800 hover:to-black hover:text-white hover:border-transparent transition-all duration-300 group">
                                <i class="fab fa-tiktok text-lg group-hover:scale-110 transition-transform"></i>
                            </a>
                            <a href="https://www.linkedin.com" target="_blank"
                                class="w-10 h-10 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-slate-400 hover:bg-gradient-to-br hover:from-blue-600 hover:to-cyan-600 hover:text-white hover:border-transparent transition-all duration-300 group">
                                <i class="fab fa-linkedin-in text-lg group-hover:scale-110 transition-transform"></i>
                            </a>
                            <a href="mailto:himaforticunesa@gmail.com"
                                class="w-10 h-10 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-slate-400 hover:bg-gradient-to-br hover:from-red-500 hover:to-orange-500 hover:text-white hover:border-transparent transition-all duration-300 group">
                                <i class="fas fa-envelope text-lg group-hover:scale-110 transition-transform"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div class="md:col-span-3">
                        <h5 class="text-white font-bold mb-6 text-lg relative inline-block">
                            Menu Utama
                            <span class="absolute -bottom-2 left-0 w-1/2 h-1 bg-blue-500 rounded-full"></span>
                        </h5>
                        <ul class="space-y-3">
                            <li><a href="{{ url('/') }}"
                                    class="text-slate-400 hover:text-blue-400 transition-colors text-sm flex items-center gap-2"><i
                                        class="fas fa-chevron-right text-xs opacity-50"></i> Homepage</a></li>
                            <li><a href="{{ url('departemen') }}"
                                    class="text-slate-400 hover:text-blue-400 transition-colors text-sm flex items-center gap-2"><i
                                        class="fas fa-chevron-right text-xs opacity-50"></i> Departemen</a></li>
                            <li><a href="{{ url('history') }}"
                                    class="text-slate-400 hover:text-blue-400 transition-colors text-sm flex items-center gap-2"><i
                                        class="fas fa-chevron-right text-xs opacity-50"></i> History</a></li>
                            <li><a href="{{ url('berita') }}"
                                    class="text-slate-400 hover:text-blue-400 transition-colors text-sm flex items-center gap-2"><i
                                        class="fas fa-chevron-right text-xs opacity-50"></i> Artikel</a></li>
                            <li><a href="{{ url('merchandise') }}"
                                    class="text-slate-400 hover:text-blue-400 transition-colors text-sm flex items-center gap-2"><i
                                        class="fas fa-chevron-right text-xs opacity-50"></i> Merchandise</a></li>
                        </ul>
                    </div>

                    <!-- Contact Info -->
                    <div class="md:col-span-4">
                        <h5 class="text-white font-bold mb-6 text-lg relative inline-block">
                            Hubungi Kami
                            <span class="absolute -bottom-2 left-0 w-1/2 h-1 bg-purple-500 rounded-full"></span>
                        </h5>
                        <ul class="space-y-4">
                            <li class="flex items-start gap-3 text-slate-400 text-sm group">
                                <div
                                    class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center flex-shrink-0 group-hover:bg-blue-500/20 group-hover:text-blue-400 transition-all">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <span class="leading-relaxed">Gedung K5 Ruang 09, Kampus Ketintang, Universitas Negeri
                                    Surabaya,
                                    Jl. Ketintang, Surabaya, Jawa Timur</span>
                            </li>
                            <li class="flex items-center gap-3 text-slate-400 text-sm group">
                                <div
                                    class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center flex-shrink-0 group-hover:bg-green-500/20 group-hover:text-green-400 transition-all">
                                    <i class="fab fa-whatsapp"></i>
                                </div>
                                <a href="https://wa.me/6281234648067" target="_blank"
                                    class="hover:text-white transition-colors">0812-3135-5159 (Deplu)</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Bottom Bar -->
                <div class="pt-8 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-4">
                    <p class="text-slate-500 text-sm text-center md:text-left">
                        &copy; {{ date('Y') }} <span class="text-slate-300 font-semibold">HIMAFORTIC</span>. All rights
                        reserved.
                    </p>
                    <div class="flex gap-6 text-sm text-slate-500">
                        <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                        <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
                    </div>
                </div>
            </div>
        </footer>
    </main>

    <!-- Global Audio Player (Floating Widget) -->
    <div x-data="audioPlayer()" x-init="init()" class="fixed bottom-8 left-8 z-50 print:hidden">
        <audio x-ref="audio" loop>
            <source src="{{ asset('assets/music.mp3') }}" type="audio/mp3">
        </audio>

        <button @click="toggle()"
            class="w-14 h-14 rounded-full flex items-center justify-center transition-all duration-300 shadow-[0_8px_30px_rgba(0,0,0,0.12)] border border-white/20 backdrop-blur-md group hover:scale-110 active:scale-95"
            :class="isPlaying ? 'bg-violet-600/90 text-white shadow-violet-500/40 ring-4 ring-violet-500/20' : 'bg-white/80 text-slate-600 hover:text-violet-600 hover:bg-white'">

            <div class="relative flex items-center justify-center w-full h-full">
                <!-- Icon -->
                <i class="fas text-xl transition-all duration-300" :class="isPlaying ? 'fa-pause' : 'fa-music'"></i>

                <!-- Ripple Effect when playing -->
                <div x-show="isPlaying"
                    class="absolute inset-0 rounded-full border-2 border-white/30 animate-ping opacity-75"></div>
            </div>

            <!-- Tooltip -->
            <span
                class="absolute left-full ml-4 px-3 py-1 bg-slate-800 text-white text-xs rounded-lg opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap pointer-events-none">
                <span x-text="isPlaying ? 'Pause Music' : 'Play Music'"></span>
            </span>
        </button>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('audioPlayer', () => ({
                isPlaying: false,

                init() {
                    const audio = this.$refs.audio;
                    audio.volume = 0.5; // Set default volume

                    // Check local storage
                    const savedState = localStorage.getItem('musicPlaying');

                    if (savedState === 'true') {
                        // Attempt to autoplay if previously playing
                        // Note: Browsers may block unrelated autoplay, but we try
                        const playPromise = audio.play();

                        if (playPromise !== undefined) {
                            playPromise.then(_ => {
                                this.isPlaying = true;
                            }).catch(error => {
                                console.log('Autoplay prevented by browser policy');
                                this.isPlaying = false;
                                localStorage.setItem('musicPlaying', 'false');
                            });
                        }
                    }
                },

                toggle() {
                    const audio = this.$refs.audio;
                    if (this.isPlaying) {
                        audio.pause();
                        this.isPlaying = false;
                        localStorage.setItem('musicPlaying', 'false');
                    } else {
                        audio.play();
                        this.isPlaying = true;
                        localStorage.setItem('musicPlaying', 'true');
                    }
                }
            }))
        });
    </script>

</body>

</html>
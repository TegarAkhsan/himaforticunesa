@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HIMAFORTIC UNESA</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
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
            height: 64px;
        }

        /* Main content harus memiliki padding top sebesar tinggi navbar */
        main {
            flex: 1;
            padding-top: 64px; /* Sesuaikan dengan tinggi navbar */
            min-height: calc(100vh - 64px);
            display: flex;
            flex-direction: column;
        }

        /* Container untuk content yang bisa discroll */
        .content-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        /* Mobile menu styling */
        #mobile-menu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }

        #mobile-menu:not(.hidden) {
            max-height: 80vh; /* Maksimal 80% viewport height */
            overflow-y: auto; /* Bisa discroll jika kontennya panjang */
        }

        /* Pastikan semua link dan button di mobile memiliki ukuran touch yang cukup */
        #mobile-menu a {
            min-height: 44px;
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        /* Improve mobile menu button */
        #mobile-menu-btn {
            cursor: pointer;
            transition: all 0.2s ease;
        }

        #mobile-menu-btn:hover {
            background-color: #f3f4f6;
            border-radius: 6px;
        }

        /* Styling untuk mobile menu items */
        #mobile-menu a:hover {
            background-color: #eff6ff;
            color: #2563eb;
        }

        /* Focus states untuk accessibility */
        #mobile-menu-btn:focus {
            outline: 2px solid #3b82f6;
            outline-offset: 2px;
        }

        /* Footer styling */
        footer {
            margin-top: auto;
            flex-shrink: 0;
        }

        /* Pastikan content di main bisa tumbuh */
        main > *:not(footer) {
            flex: 1;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800">

<nav class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo -->
            <a href="{{ url('/') }}" class="flex-shrink-0 flex items-center">
                <img src="{{ asset('assets/logo-himafortic.png') }}" alt="HIMAFORTIC Logo" class="h-10 w-auto object-contain">
            </a>

            <!-- Tombol Mobile -->
            <button id="mobile-menu-btn" type="button" class="md:hidden text-gray-700 focus:outline-none p-3 min-h-[44px] min-w-[44px] flex items-center justify-center">
                <i class="fas fa-bars fa-lg"></i>
            </button>

            <!-- Menu Desktop -->
            <div class="hidden md:flex md:items-center md:space-x-6">
                <a href="{{ url('/') }}" class="text-gray-700 hover:text-blue-600 font-medium {{ request()->is('/') ? 'text-blue-600' : '' }}">Homepage</a>

                <!-- Dropdown Departemen -->
                <div class="relative group">
                    <a href="{{ url('departemen') }}" class="flex items-center gap-1 text-gray-700 hover:text-blue-600 font-medium {{ request()->is('departemen*') ? 'text-blue-600' : '' }}">
                        Departemen <i class="fas fa-chevron-down text-xs"></i>
                    </a>
                    <ul class="absolute left-0 mt-2 w-48 bg-white shadow-lg rounded-md opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all duration-300 z-10 border border-gray-100">
                        @if(isset($departemen) && $departemen->count() > 0)
                            @foreach ($departemen as $item)
                                <li><a href="{{ url('departemen/' . $item->id) }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200">{{ $item->nama }}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </div>

                <a href="{{ url('history') }}" class="text-gray-700 hover:text-blue-600 font-medium {{ request()->is('history') ? 'text-blue-600' : '' }}">History</a>
                <a href="{{ url('berita') }}" class="text-gray-700 hover:text-blue-600 font-medium {{ request()->is('berita') ? 'text-blue-600' : '' }}">Artikel</a>
                <a href="{{ url('merchandise') }}" class="text-gray-700 hover:text-blue-600 font-medium {{ request()->is('merchandise') ? 'text-blue-600' : '' }}">Merchandise</a>

                <!-- Dropdown Dokumen -->
                <div class="relative group">
                    <button type="button" class="text-white bg-blue-600 font-medium flex items-center gap-1 px-4 py-2 rounded-md hover:bg-blue-700 transition-colors duration-200">
                        Dokumen <i class="fas fa-chevron-down text-xs"></i>
                    </button>
                    <ul class="absolute left-0 mt-2 w-56 bg-white shadow-lg rounded-md opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all duration-300 z-10 border border-gray-100">
                        @if(isset($files) && $files->count() > 0)
                            @foreach ($files as $file)
                                @php
                                    $namaTanpaEkstensi = pathinfo($file->nama_file, PATHINFO_FILENAME);
                                @endphp
                                <li>
                                    <a href="{{ route('file.download', $file->id) }}" class="flex justify-between px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200">
                                        <span>{{ $namaTanpaEkstensi }}</span>
                                        <i class="fas fa-download text-sm text-gray-500 group-hover:text-blue-600"></i>
                                    </a>
                                </li>
                            @endforeach
                        @else
                            <li><p class="px-4 py-2 text-gray-400 italic">Belum ada file</p></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Menu Mobile -->
    <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-200 shadow-lg">
        <div class="px-4 py-3 space-y-1">
            <a href="{{ url('/') }}" class="block px-3 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 font-medium rounded-md transition-colors">Homepage</a>

            <div class="border-t border-gray-100 pt-2">
                <p class="text-gray-500 font-semibold mb-2 px-3 text-sm">Departemen</p>
                <div class="space-y-1">
                    @if(isset($departemen) && $departemen->count() > 0)
                        @foreach ($departemen as $item)
                            <a href="{{ url('departemen/' . $item->id) }}" class="block px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-md ml-2 transition-colors">{{ $item->nama }}</a>
                        @endforeach
                    @endif
                </div>
            </div>

            <a href="{{ url('history') }}" class="block px-3 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 font-medium rounded-md transition-colors">History</a>
            <a href="{{ url('berita') }}" class="block px-3 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 font-medium rounded-md transition-colors">Artikel</a>
            <a href="{{ url('merchandise') }}" class="block px-3 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 font-medium rounded-md transition-colors">Merchandise</a>

            <div class="border-t border-gray-100 pt-2">
                <p class="text-gray-500 font-semibold mb-2 px-3 text-sm">Dokumen</p>
                <div class="space-y-1">
                    @if(isset($files) && $files->count() > 0)
                        @foreach ($files as $file)
                            @php
                                $namaTanpaEkstensi = pathinfo($file->nama_file, PATHINFO_FILENAME);
                            @endphp
                            <a href="{{ route('file.download', $file->id) }}" class="flex justify-between items-center px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-md ml-2 transition-colors">
                                <span>{{ $namaTanpaEkstensi }}</span>
                                <i class="fas fa-download text-xs text-gray-500"></i>
                            </a>
                        @endforeach
                    @else
                        <p class="text-gray-400 italic px-4 py-3 ml-2">Belum ada file</p>
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
    <footer class="bg-gradient-to-r from-[#0a1a2e] to-[#1a365d] mt-auto">
        <div class="max-w-7xl mx-auto p-6 text-white">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="md:col-span-2">
                    <h5 class="text-[#d4af37] font-bold mb-3 tracking-widest">HIMAFORTIC</h5>
                    <p class="text-gray-300">HIMAFORTIC Merupakan himpunan mahasiswa D4 Manajemen Informatika Universitas Negeri Surabaya. Kami berkomitmen untuk mengembangkan potensi mahasiswa dalam bidang teknologi informasi.</p>
                </div>
                <div>
                    <h5 class="text-[#d4af37] font-bold mb-3 tracking-widest">Contact</h5>
                    <ul class="text-gray-300 space-y-2">
                        <li><a href="https://wa.me/6281234648067" target="_blank" class="flex items-center gap-2 hover:text-yellow-400 transition-colors"><i class="fab fa-whatsapp"></i>081234648067</a></li>
                        <li><a class="flex items-center gap-2 hover:text-yellow-400 transition-colors"><i class="fas fa-envelope"></i>himaforticunesa</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="text-[#d4af37] font-bold mb-3 tracking-widest">Sosial Media</h5>
                    <div class="flex gap-4 text-gray-300">
                        <a href="https://www.tiktok.com/@himafortic_unesa?_r=1&_t=ZS-915kVkxBZo8" target="_blank" rel="noopener noreferrer" class="hover:text-yellow-400 transition-colors">
                            <i class="fab fa-tiktok fa-lg"></i>
                        </a>
                        <a href="https://www.instagram.com/himafortic_unesa?igsh=MXQ4cWg0cG1jcGI1MA==" target="_blank" rel="noopener noreferrer" class="hover:text-yellow-400 transition-colors">
                            <i class="fab fa-instagram fa-lg"></i>
                        </a>
                        <a href="" target="_blank" rel="noopener noreferrer" class="hover:text-yellow-400 transition-colors">
                            <i class="fab fa-linkedin fa-lg"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="text-center text-gray-400 mt-8 pt-6 border-t border-gray-700">© HIMAFORTIC 2025</div>
        </div>
    </footer>
</main>

</body>
</html>
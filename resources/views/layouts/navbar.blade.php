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

</head>
<body class="bg-gray-100 text-gray-800">

<nav class="bg-white shadow-md fixed w-full z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('assets/logo-himafortic.png') }}" alt="HIMAFORTIC Logo" class="h-10 w-auto object-contain">
                </a>
            </div>
            <div class="hidden md:flex md:items-center md:space-x-6">
                <a href="{{ url('/') }}" class="text-gray-700 hover:text-blue-600 font-medium {{ request()->is('/') ? 'text-blue-600' : '' }}">Homepage</a>
                
                {{-- INI BAGIAN YANG DIUBAH --}}
                <div class="relative group">
                    <a href="{{ url('departemen') }}" class="text-gray-700 hover:text-blue-600 font-medium flex items-center gap-1 {{ request()->is('departemen*') ? 'text-blue-600' : '' }}">
                        Departemen <i class="fas fa-chevron-down text-xs"></i>
                    </a>
                    <ul class="absolute left-0 mt-2 w-48 bg-white shadow-lg rounded-md opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all z-10">
                        @if(isset($departemen) && $departemen->count() > 0)
                            @foreach ($departemen as $item)
                                <li><a href="{{ url('departemen/' . $item->id) }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">{{ $item->nama }}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                {{-- AKHIR BAGIAN YANG DIUBAH --}}

                <a href="{{ url('history') }}" class="text-gray-700 hover:text-blue-600 font-medium {{ request()->is('history') ? 'text-blue-600' : '' }}">History</a>
                <a href="{{ url('berita') }}" class="text-gray-700 hover:text-blue-600 font-medium {{ request()->is('berita') ? 'text-blue-600' : '' }}">Artikel</a>
                <a href="{{ url('merchandise') }}" class="text-gray-700 hover:text-blue-600 font-medium {{ request()->is('merchandise') ? 'text-blue-600' : '' }}">Merchandise</a>
            </div>
            <div class="flex items-center md:hidden">
                <button id="mobile-menu-btn" class="text-gray-600 focus:outline-none"><i class="fas fa-bars fa-lg"></i></button>
            </div>
        </div>
    </div>
    {{-- Kode menu mobile Anda di sini... --}}
</nav>

<main class="pt-16">
    @yield('content')
</main>

<footer class="bg-gradient-to-r from-[#0a1a2e] to-[#1a365d]">

    <div class="max-w-7xl mx-auto p-6 text-white">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="md:col-span-2">
                <h5 class="text-[#d4af37] font-bold mb-3 tracking-widest">HIMAFORTIC</h5>
                <p class="text-gray-300">HIMAFORTIC Merupakan himpunan mahasiswa D4 Manajemen Informatika Universitas Negeri Surabaya. Kami berkomitmen untuk mengembangkan potensi mahasiswa dalam bidang teknologi informasi.</p>
            </div>
            <div>
                <h5 class="text-[#d4af37] font-bold mb-3 tracking-widest">Contact</h5>
                <ul class="text-gray-300 space-y-2">
                    <li><a href="https://wa.me/6281234648067" target="_blank" class="flex items-center gap-2 hover:text-yellow-400"><i class="fab fa-whatsapp"></i>081234648067</a></li>
                    <li><a href="mailto:himaforticunesa@gmail.com" class="flex items-center gap-2 hover:text-yellow-400"><i class="fas fa-envelope"></i>himaforticunesa@gmail.com</a></li>
                </ul>
            </div>
            <div>
                <h5 class="text-[#d4af37] font-bold mb-3 tracking-widest">Sosial Media</h5>
                <div class="flex gap-4 text-gray-300"><a href="#" class="hover:text-yellow-400"><i class="fab fa-tiktok fa-lg"></i></a><a href="#" class="hover:text-yellow-400"><i class="fab fa-instagram fa-lg"></i></a><a href="#" class="hover:text-yellow-400"><i class="fab fa-linkedin fa-lg"></i></a></div>
            </div>
        </div>
        <div class="text-center text-gray-400 mt-8 pt-6 border-t border-gray-700">© HIMAFORTIC 2025</div>
    </div>
</footer>

<script>
    const btn = document.getElementById('mobile-menu-btn');
    const menu = document.getElementById('mobile-menu');
    if (btn && menu) {
        btn.addEventListener('click', () => { menu.classList.toggle('hidden'); });
    }
</script>

</body>
</html>
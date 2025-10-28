@extends('layouts.navbar')
@section('content')

<style>
    .scroll-reveal {
      opacity: 0;
      transform: translateY(30px);
      transition: opacity 0.6s ease-out, transform 0.6s ease-out;
      will-change: opacity, transform;
    }

    .scroll-reveal.is-visible {
      opacity: 1;
      transform: translateY(0);
    }
</style>



<!-- Hero Section -->
<section id="home" class="relative min-h-screen flex items-center justify-center overflow-hidden bg-slate-50">
  <!-- Content -->
  <div class="relative z-10 text-center px-6 sm:px-8">
  <img src="{{ asset('assets/docker-icon.png') }}" class="orbit-icon" alt="Docker">
  <img src="{{ asset('assets/python-icon.png') }}" class="orbit-icon" alt="Python">
  <img src="{{ asset('assets/react-icon.png') }}" class="orbit-icon" alt="React">
  <img src="{{ asset('assets/css-icon.png') }}" class="orbit-icon" alt="CSS">
  <img src="{{ asset('assets/nodejs-icon.png') }}" class="orbit-icon" alt="Node.js">
  <img src="{{ asset('assets/postgresql-icon.png') }}" class="orbit-icon" alt="PostgreSQL">
    <h1 class="text-6xl md:text-7xl font-extrabold text-blue-900 tracking-tight mb-6">
      HIMAFORTIC 
    </h1>
    <h1 class="text-6xl md:text-7xl font-extrabold text-blue-900 tracking-tight mb-6">
      UNESA
    </h1>
    <div class="w-56 h-1 mx-auto bg-gradient-to-r from-blue-600 via-cyan-400 to-blue-600 rounded-full mb-8"></div>
    <p class="max-w-3xl mx-auto text-lg md:text-xl text-slate-600 leading-relaxed">
      Memberdayakan mahasiswa melalui teknologi, inovasi, dan komunitas. 
      Bergabunglah dengan kami dalam membentuk masa depan transformasi digital.
    </p>
  </div>
</section>

<section id="about" class="relative overflow-hidden bg-gradient-to-br from-slate-50 to-blue-50/30 py-24">
  <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
    <!-- Deskripsi di sebelah kiri -->
    <div class="space-y-6 text-center md:text-left scroll-reveal">
      <h2 class="text-4xl md:text-5xl font-bold text-slate-800 leading-tight">
        Filosofi <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-cyan-500 to-indigo-600">HIMAFORTIC</span>
      </h2>
        <p class="text-lg text-slate-600 leading-relaxed text-justify">
        Bentuk logo diambil dari ciri khas dari 
        <span class="font-semibold text-blue-700">HTML</span> 
        tag markup language dan dimodifikasi dengan huruf 
        M dan I yang melambangkan Manajemen Informatika.
        Tulisan yang berada di bawah logo menggambarkan bahwa HIMAFORTIC 
        mewadahi ide kreatif dan inovatif seluruh mahasiswa D4 Manajemen Informatika
        </p>
    </div>

    <!-- Logo HIMAFORTIC dengan efek ledakan partikel -->
    <div class="relative flex justify-center items-center scroll-reveal">
      <div class="relative w-80 h-80 md:w-[500px] md:h-[500px] flex items-center justify-center">
        <!-- Explosion container -->
        <div id="explosionContainer" class="absolute inset-0 z-30"></div>
        <!-- Glow effect behind logo -->
        <div class="absolute inset-0 bg-gradient-to-r from-blue-400/20 to-cyan-400/20 rounded-full blur-3xl animate-pulse-slow"></div>
        <!-- Main orbit container -->
        <div class="absolute inset-0">
          <!-- Orbit rings dengan animasi masuk -->
          <div class="orbit-ring absolute inset-0 border-2 border-blue-200/30 rounded-full"></div>
          <div class="orbit-ring absolute inset-8 border border-cyan-200/20 rounded-full"></div>
          <div class="orbit-ring absolute inset-16 border border-indigo-200/10 rounded-full"></div>
          <!-- Orbiting icons dengan efek ledakan -->
          <div class="orbit-icon-container" style="--orbit-radius: 180px; --orbit-speed: 40s; --explosion-delay: 0s;">
            <img src="{{ asset('assets/python-icon.png') }}" class="orbit-icon" alt="Python">
          </div>
          <div class="orbit-icon-container" style="--orbit-radius: 180px; --orbit-speed: 35s; --start-angle: 60deg; --explosion-delay: 0.2s;">
            <img src="{{ asset('assets/react-icon.png') }}" class="orbit-icon" alt="React">
          </div>
          <div class="orbit-icon-container" style="--orbit-radius: 180px; --orbit-speed: 45s; --start-angle: 120deg; --explosion-delay: 0.4s;">
            <img src="{{ asset('assets/docker-icon.png') }}" class="orbit-icon" alt="Docker">
          </div>
          <div class="orbit-icon-container" style="--orbit-radius: 180px; --orbit-speed: 38s; --start-angle: 180deg; --explosion-delay: 0.6s;">
            <img src="{{ asset('assets/css-icon.png') }}" class="orbit-icon" alt="CSS">
          </div>
          <div class="orbit-icon-container" style="--orbit-radius: 180px; --orbit-speed: 42s; --start-angle: 240deg; --explosion-delay: 0.8s;">
            <img src="{{ asset('assets/nodejs-icon.png') }}" class="orbit-icon" alt="Node.js">
          </div>
          <div class="orbit-icon-container" style="--orbit-radius: 180px; --orbit-speed: 37s; --start-angle: 300deg; --explosion-delay: 1s;">
            <img src="{{ asset('assets/postgresql-icon.png') }}" class="orbit-icon" alt="PostgreSQL">
          </div>
          
          <!-- Inner orbit icons -->
          <div class="orbit-icon-container" style="--orbit-radius: 120px; --orbit-speed: 25s; --start-angle: 30deg; --explosion-delay: 1.2s;">
            <img src="{{ asset('assets/csharp-icon.png') }}" class="orbit-icon orbit-icon-small" alt="C#">
          </div>
        </div>

        <!-- Logo HIMAFORTIC di tengah dengan efek glow dan trigger ledakan -->
        <div class="relative z-20 group cursor-pointer" id="logoTrigger">
        
          <img src="{{ asset('assets/logo-himafortic.png') }}" 
               alt="HIMAFORTIC Logo" 
               class="relative w-48 h-48 md:w-60 md:h-60 object-contain z-10 drop-shadow-2xl transform group-hover:scale-105 transition-transform duration-500">
        </div>
        <!-- Floating particles background -->
        <div class="absolute inset-0">
          <div class="particle" style="--delay: 0s; --duration: 8s; --size: 4px; --color: rgb(59 130 246); top: 20%; left: 30%;"></div>
          <div class="particle" style="--delay: 1s; --duration: 10s; --size: 3px; --color: rgb(6 182 212); top: 60%; left: 20%;"></div>
          <div class="particle" style="--delay: 2s; --duration: 12s; --size: 5px; --color: rgb(139 92 246); top: 80%; left: 70%;"></div>
          <div class="particle" style="--delay: 3s; --duration: 9s; --size: 4px; --color: rgb(59 130 246); top: 40%; left: 80%;"></div>
          <div class="particle" style="--delay: 4s; --duration: 11s; --size: 3px; --color: rgb(6 182 212); top: 10%; left: 60%;"></div>
        </div>
      </div>
    </div>

  </div>
</section>


    <!-- About Section -->
<section id="about" class="py-20 lg:py-28 px-4 sm:px-6 lg:px-8 bg-slate-50 overflow-hidden">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">
                <span class="gradient-text">About</span> HIMAFORTIC
            </h2>
            <div class="w-24 h-1 bg-gradient-to-r from-primary to-secondary mx-auto mb-6"></div>
            <p class="text-lg text-slate-600 max-w-3xl mx-auto leading-relaxed">
                HIMAFORTIC is a student organization dedicated to fostering technological innovation and digital transformation among students.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 lg:gap-20 items-center">
            <div class="relative" data-aos="fade-right" data-aos-delay="200">
                <div class="relative w-full h-full">
                    <img src="../../../assets/logo-himafortic.png" alt="About HIMAFORTIC" class="rounded-xl shadow-2xl w-full h-auto object-cover">
                        <div class="absolute -bottom-5 -right-5 border-2 border-blue-600 px-6 py-3 rounded-lg font-medium text-blue-600 transition duration-300 hover:bg-blue-600 hover:text-white transform rotate-3 hover:-translate-y-1">
                            <div class="text-4xl font-bold">3+</div>
                            <div class="text-sm font-semibold tracking-wider">YEARS EXP</div>
                        </div>
                </div>
            </div>

            <div data-aos="fade-left" data-aos-delay="300">
                <h3 class="text-2xl lg:text-3xl font-bold mb-4 text-slate-800">Our Vision & Mission</h3>
                <p class="text-slate-600 mb-8 leading-relaxed">
                    Terwujudnya Himpunan Mahasiswa Manajemen Informatika sebagai wadah inklusif, adaptif
                    dan pengemban amanat intelektual yang bertanggung jawab untuk meningkatkan program studi dan
                    institusi.
                </p>
                <div class="space-y-5">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 mt-1">
                            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-primary/20 to-secondary/20 flex items-center justify-center ring-4 ring-primary/10">
                                <i class="fas fa-check text-primary"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="text-slate-700 font-medium">Membangun komunikasi yang transparan, kolaboratif, dan berfungsi sebagai penyalur aspirasi serta pemecah masalah mahasiswa.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0 mt-1">
                            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-primary/20 to-secondary/20 flex items-center justify-center ring-4 ring-primary/10">
                                <i class="fas fa-check text-primary"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="text-slate-700 font-medium">Menginisiasi kegiatan yang meningkatkan kompetensi hardskills dan softskills mahasiswa serta menghasilkan karya yang berkontribusi pada peningkatan mutu program studi.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0 mt-1">
                            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-primary/20 to-secondary/20 flex items-center justify-center ring-4 ring-primary/10">
                                <i class="fas fa-check text-primary"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="text-slate-700 font-medium">Menginisiasi kegiatan yang relevan dengan tridarma perguruan tinggi.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0 mt-1">
                            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-primary/20 to-secondary/20 flex items-center justify-center ring-4 ring-primary/10">
                                <i class="fas fa-check text-primary"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="text-slate-700 font-medium">Mendorong partisipasi mahasiswa dalam berbagai kegiatan himpunan dan program studi.</p>
                        </div>
                    </div>
                </div>

                    <button class="mt-10 group inline-flex items-center gap-2 border-2 border-blue-600 px-6 py-3 rounded-lg font-medium text-blue-600 transition duration-300 hover:bg-blue-600 hover:text-white transform hover:-translate-y-1">
                        Learn More About Us
                        <i class="fas fa-arrow-right transition-transform duration-300 group-hover:translate-x-1"></i>
                    </button>
            </div>
        </div>
    </div>
</section>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 800, 
    once: true,    
  });
</script>

    <!-- Struktur -->
{{-- ========================= STRUKTUR ========================= --}}
<section id="struktur" class="bg-[#f8f9fa] py-20 font-montserrat">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 scroll-reveal">
            <h2 class="text-4xl md:text-5xl font-bold text-[#2c3e50] font-playfair">Struktur Organisasi</h2>
            <p class="mt-4 text-lg text-slate-500">Periode Kepengurusan 2025 - 2026</p>
        </div>

        {{-- TIER 1: KETUA, WAKIL, SEKRETARIS, BENDAHARA --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 max-w-6xl mx-auto mb-16">
            @foreach ([
                'ketua' => 'Ketua Himpunan',
                'wakil' => 'Wakil Ketua Himpunan',
                'sekretaris' => 'Sekretaris',
                'bendahara' => 'Bendahara'
            ] as $role => $title)
                @if(!empty($struktur[$role]))
                    @php $person = $struktur[$role]; @endphp
                    <div class="col-span-1 scroll-reveal">
                        <div class="bg-white rounded-2xl shadow-lg border border-slate-200/80 h-full flex flex-col">
                            <div class="h-56 bg-gradient-to-t from-slate-50 to-slate-200 flex items-center justify-center rounded-t-2xl p-4">
                                <img src="{{ $person->foto ? asset('storage/' . $person->foto) : asset('images/default-user.png') }}"
                                    class="w-36 h-36 object-cover rounded-full shadow-xl border-4 border-white">
                            </div>
                            <div class="p-6 flex-grow flex flex-col">
                                {{-- Aksen warna emas diubah menjadi biru --}}
                                <div class="border-l-4 border-blue-600 pl-4 mb-4">
                                    <h3 class="text-xl font-bold text-[#2c3e50] font-playfair">{{ $person->mahasiswa->nama }}</h3>
                                    <p class="text-slate-600 font-medium">{{ $title }}</p>
                                </div>
                                <div class="mt-auto pt-4">
                                    {{-- Tombol disesuaikan dengan style "Acara Kami" --}}
                                    <button class="w-full group inline-flex items-center justify-center gap-2 open-modal-btn border-2 border-blue-600 px-6 py-2 rounded-lg font-medium text-blue-600 transition duration-300 hover:bg-blue-600 hover:text-white transform hover:-translate-y-1"
                                        data-modal-target="#modal-{{ $role }}">
                                        Lihat Detail
                                        <i class="fas fa-arrow-right transition-transform duration-300 group-hover:translate-x-1"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        {{-- === DEPARTEMEN === --}}
        <div class="text-center mb-12 scroll-reveal">
            <h3 class="text-3xl font-bold text-[#2c3e50] font-playfair mb-4">Ketua Departemen</h3>
            <p class="text-lg text-slate-600 max-w-2xl mx-auto">Para pemimpin visioner yang mengarahkan setiap departemen menuju inovasi dan keunggulan.</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($struktur['ketua_departemen'] as $item)
                <div class="col-span-1 scroll-reveal">
                    <div class="bg-white rounded-xl shadow-md border h-full flex flex-col transition-all duration-300 hover:-translate-y-2 hover:shadow-xl text-center p-6">
                        <img src="{{ $item->foto ? asset('storage/' . $item->foto) : asset('images/default-user.png') }}" class="w-24 h-24 mx-auto object-cover rounded-full shadow-md border-4 border-white mb-4">
                        <div class="flex-grow flex flex-col">
                            <h5 class="text-lg font-bold text-[#2c3e50] font-playfair">{{ $item->mahasiswa->nama }}</h5>
                            <p class="text-sm text-slate-500">{{ $item->departemen->nama }}</p>
                                <div class="mt-auto pt-4">
                                    {{-- Tombol disesuaikan dengan style "Acara Kami" --}}
                                    <div class="mt-auto pt-4">
                                        {{-- Tombol disesuaikan dengan style "Acara Kami" --}}
                                        <button class="w-full open-modal-btn border-2 border-blue-600 px-4 py-1.5 rounded-lg font-medium text-sm text-blue-600 transition duration-300 hover:bg-blue-600 hover:text-white"
                                            data-modal-target="#modal-departemen-{{ $item->id }}">
                                            Detail
                                        </button>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ================== MODAL KETUA, WAKIL, SEKRETARIS, BENDAHARA ================== --}}
@foreach ([
    'ketua' => 'Ketua Himpunan',
    'wakil' => 'Wakil Ketua Himpunan',
    'sekretaris' => 'Sekretaris',
    'bendahara' => 'Bendahara'
] as $role => $title)
    @if(!empty($struktur[$role]))
        @php $person = $struktur[$role]; @endphp
        <div id="modal-{{ $role }}" class="fixed inset-0 bg-black bg-opacity-60 hidden items-center justify-center z-50 p-4 transition-opacity duration-300 opacity-0">
            <div class="bg-white rounded-2xl shadow-2xl w-full max-w-3xl transform transition-transform duration-300 scale-95">
                {{-- Header modal diubah menjadi biru --}}
                <div class="modal-header flex justify-between items-center p-4 bg-blue-600 text-white rounded-t-2xl">
                    <h5 class="text-2xl font-playfair">{{ $person->mahasiswa->nama }}</h5>
                    <button class="close-modal-btn text-2xl hover:text-gray-300">&times;</button>
                </div>
                <div class="modal-body p-6 grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="md:col-span-1">
                        <img src="{{ $person->foto ? asset('storage/' . $person->foto) : asset('images/default-user.png') }}"
                            class="w-full h-auto object-cover rounded-xl shadow-lg">
                    </div>
                    <div class="md:col-span-2">
                        <p class="mb-4 text-lg font-medium text-[#2c3e50]">{{ $title }}</p>
                        <div class="grid grid-cols-2 gap-4 border-t pt-2">
                            <div>
                                <p class="text-xs text-slate-400">Email</p>
                                <p class="font-semibold">{{ $person->mahasiswa->email ?? '-' }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-slate-400">No. HP</p>
                                <p class="font-semibold">{{ $person->mahasiswa->no_hp ?? '-' }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-slate-400">Instagram</p>
                                <p class="font-semibold text-pink-600">
                                    {{ $person->mahasiswa->instagram ? '@' . ltrim(str_replace(['https://instagram.com/', 'http://instagram.com/', '@'], '', $person->mahasiswa->instagram), '/') : '-' }}
                                </p>
                            </div>
                        </div>

                        <div class="mt-4 flex gap-3">
                            @if($person->mahasiswa->instagram)
                                <a href="{{ $person->mahasiswa->instagram }}" target="_blank" class="text-pink-600 hover:text-pink-700 text-2xl"><i class="fab fa-instagram"></i></a>
                            @endif
                            @if($person->mahasiswa->linkedin)
                                <a href="{{ $person->mahasiswa->linkedin }}" target="_blank" class="text-blue-600 hover:text-blue-700 text-2xl"><i class="fab fa-linkedin"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer p-4 bg-slate-50 rounded-b-2xl text-right">
                    <button class="close-modal-btn bg-slate-200 text-slate-800 font-semibold rounded-lg px-6 py-2 hover:bg-slate-300 transition-colors">Tutup</button>
                </div>
            </div>
        </div>
    @endif
@endforeach



{{-- ================== MODAL KETUA DEPARTEMEN ================== --}}
@foreach ($struktur['ketua_departemen'] as $item)
<div id="modal-departemen-{{ $item->id }}" class="fixed inset-0 bg-black bg-opacity-60 hidden items-center justify-center z-50 p-4 transition-opacity duration-300 opacity-0">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-3xl transform transition-transform duration-300 scale-95">
        {{-- Header modal diubah menjadi biru --}}
        <div class="modal-header flex justify-between items-center p-4 bg-blue-600 text-white rounded-t-2xl">
            <h5 class="text-2xl font-playfair">{{ $item->mahasiswa->nama }}</h5>
            <button class="close-modal-btn text-2xl hover:text-gray-300">&times;</button>
        </div>
        <div class="modal-body p-6 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="md:col-span-1">
                <img src="{{ $item->foto ? asset('storage/' . $item->foto) : asset('images/default-user.png') }}" class="w-full h-auto object-cover rounded-xl shadow-lg">
            </div>
            <div class="md:col-span-2">
                <p class="mb-4 text-lg font-medium text-[#2c3e50]">{{ $item->departemen->nama }}</p>
                <div class="grid grid-cols-2 gap-4 border-t pt-2">
                    <div>
                        <p class="text-xs text-slate-400">Email</p>
                        <p class="font-semibold">{{ $item->mahasiswa->email ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400">No. HP</p>
                        <p class="font-semibold">{{ $item->mahasiswa->no_hp ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400">Instagram</p>
                        <p class="font-semibold text-pink-600">
                            {{ $item->mahasiswa->instagram ? '@' . ltrim(str_replace(['https://instagram.com/', 'http://instagram.com/', '@'], '', $item->mahasiswa->instagram), '/') : '-' }}
                        </p>
                    </div>
                </div>
                <div class="mt-4 flex gap-3">
                    @if($item->mahasiswa->instagram)
                        <a href="{{ $item->mahasiswa->instagram }}" target="_blank" class="text-pink-600 hover:text-pink-700 text-2xl"><i class="fab fa-instagram"></i></a>
                    @endif
                    @if($item->mahasiswa->linkedin)
                        <a href="{{ $item->mahasiswa->linkedin }}" target="_blank" class="text-blue-600 hover:text-blue-700 text-2xl"><i class="fab fa-linkedin"></i></a>
                    @endif
                </div>
            </div>
        </div>
        <div class="modal-footer p-4 bg-slate-50 rounded-b-2xl text-right">
            <button class="close-modal-btn bg-slate-200 text-slate-800 font-semibold rounded-lg px-6 py-2 hover:bg-slate-300 transition-colors">Tutup</button>
        </div>
    </div>
</div>

@endforeach

{{-- ================== STYLE & SCRIPT ================== --}}


<script>
document.addEventListener("DOMContentLoaded", () => {
    const openBtns=document.querySelectorAll('.open-modal-btn');
    const closeBtns=document.querySelectorAll('.close-modal-btn');
    const openModal=(m)=>{m?.classList.remove('hidden');m.classList.add('flex');setTimeout(()=>{m.classList.remove('opacity-0');m.querySelector('.transform').classList.remove('scale-95')},10);}
    const closeModal=(m)=>{m?.classList.add('opacity-0');m.querySelector('.transform').classList.add('scale-95');setTimeout(()=>{m.classList.add('hidden');m.classList.remove('flex')},300);}
    openBtns.forEach(b=>b.addEventListener('click',()=>openModal(document.querySelector(b.getAttribute('data-modal-target')))));
    closeBtns.forEach(b=>b.addEventListener('click',()=>closeModal(b.closest('.fixed'))));
    document.querySelectorAll('.fixed').forEach(m=>m.addEventListener('click',e=>{if(e.target===m)closeModal(m)}));
    const revealEls=document.querySelectorAll('.scroll-reveal');
    const obs=new IntersectionObserver(entries=>{entries.forEach(e=>{if(e.isIntersecting){e.target.classList.add('is-visible');obs.unobserve(e.target)}})},{threshold:0.1});
    revealEls.forEach(el=>obs.observe(el));
});
</script>


<!-- Enhanced Animations and Styles -->
<style>
/* Animation delays */
.animation-delay-200 { animation-delay: 0.2s; }
.animation-delay-400 { animation-delay: 0.4s; }

/* Slow pulse animation */
@keyframes pulse-slow {
  0%, 100% { opacity: 0.3; }
  50% { opacity: 0.6; }
}
.animate-pulse-slow {
  animation: pulse-slow 4s ease-in-out infinite;
}

/* Orbit ring entrance animation */
.orbit-ring {
  opacity: 0;
  transform: scale(0.8);
  animation: ring-entrance 2s ease-out forwards;
}

@keyframes ring-entrance {
  0% {
    opacity: 0;
    transform: scale(0.8);
  }
  100% {
    opacity: 1;
    transform: scale(1);
  }
}

.orbit-ring:nth-child(1) { animation-delay: 0.5s; }
.orbit-ring:nth-child(2) { animation-delay: 0.7s; }
.orbit-ring:nth-child(3) { animation-delay: 0.9s; }

/* Realistic orbital movement with explosion effect */
.orbit-icon-container {
  position: absolute;
  top: 50%;
  left: 50%;
  opacity: 0;
  animation: 
    orbit-entrance 0.8s ease-out forwards,
    orbit var(--orbit-speed, 40s) linear infinite;
  animation-delay: var(--explosion-delay, 0s), calc(var(--explosion-delay, 0s) + 0.8s);
  transform: rotate(var(--start-angle, 0deg)) translateX(var(--orbit-radius, 180px)) rotate(calc(-1 * var(--start-angle, 0deg)));
}

@keyframes orbit-entrance {
  0% {
    opacity: 0;
    transform: scale(0) rotate(var(--start-angle, 0deg)) translateX(0) rotate(calc(-1 * var(--start-angle, 0deg)));
  }
  70% {
    opacity: 1;
    transform: scale(1.2) rotate(var(--start-angle, 0deg)) translateX(var(--orbit-radius, 180px)) rotate(calc(-1 * var(--start-angle, 0deg)));
  }
  100% {
    opacity: 1;
    transform: scale(1) rotate(var(--start-angle, 0deg)) translateX(var(--orbit-radius, 180px)) rotate(calc(-1 * var(--start-angle, 0deg)));
  }
}

@keyframes orbit {
  0% {
    transform: rotate(var(--start-angle, 0deg)) translateX(var(--orbit-radius, 180px)) rotate(calc(-1 * var(--start-angle, 0deg)));
  }
  100% {
    transform: rotate(calc(var(--start-angle, 0deg) + 360deg)) translateX(var(--orbit-radius, 180px)) rotate(calc(-1 * var(--start-angle, 0deg) - 360deg));
  }
}

/* Enhanced icon styles with explosion effects */
.orbit-icon {
  width: 50px;
  height: 50px;
  object-fit: contain;
  filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.2));
  animation: float-3d 6s ease-in-out infinite;
  transition: all 0.3s ease;
  border-radius: 12px;
  background: rgba(255, 255, 255, 0.9);
  padding: 8px;
  box-shadow: 
    0 8px 25px rgba(0, 0, 0, 0.1),
    inset 0 1px 0 rgba(255, 255, 255, 0.6);
  position: relative;
  z-index: 10;
}

.orbit-icon-small {
  width: 40px;
  height: 40px;
  padding: 6px;
}

.orbit-icon:hover {
  transform: scale(1.3) rotate(15deg);
  filter: drop-shadow(0 12px 24px rgba(0, 0, 0, 0.4));
  background: rgba(255, 255, 255, 1);
  z-index: 20;
}

/* Explosion particle styles */
.explosion-particle {
  position: absolute;
  border-radius: 50%;
  pointer-events: none;
  z-index: 25;
  animation: explosion-animation 1.5s ease-out forwards;
}

@keyframes explosion-animation {
  0% {
    opacity: 1;
    transform: translate(0, 0) scale(1);
  }
  20% {
    opacity: 0.8;
    transform: translate(var(--tx-1, 0px), var(--ty-1, 0px)) scale(1.2);
  }
  50% {
    opacity: 0.6;
    transform: translate(var(--tx-2, 0px), var(--ty-2, 0px)) scale(0.8);
  }
  80% {
    opacity: 0.3;
    transform: translate(var(--tx-3, 0px), var(--ty-3, 0px)) scale(0.6);
  }
  100% {
    opacity: 0;
    transform: translate(var(--tx-4, 0px), var(--ty-4, 0px)) scale(0);
  }
}

/* 3D floating effect */
@keyframes float-3d {
  0%, 100% { 
    transform: 
      translateY(0px) 
      rotateX(0deg) 
      rotateY(0deg);
    filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.2));
  }
  25% { 
    transform: 
      translateY(-8px) 
      rotateX(5deg) 
      rotateY(5deg);
    filter: drop-shadow(0 6px 12px rgba(0, 0, 0, 0.25));
  }
  50% { 
    transform: 
      translateY(-4px) 
      rotateX(0deg) 
      rotateY(10deg);
    filter: drop-shadow(0 8px 16px rgba(0, 0, 0, 0.3));
  }
  75% { 
    transform: 
      translateY(-6px) 
      rotateX(-5deg) 
      rotateY(5deg);
    filter: drop-shadow(0 6px 12px rgba(0, 0, 0, 0.25));
  }
}

/* Floating particles */
.particle {
  position: absolute;
  background: var(--color);
  border-radius: 50%;
  width: var(--size);
  height: var(--size);
  animation: particle-float var(--duration) ease-in-out infinite;
  animation-delay: var(--delay);
  opacity: 0.6;
}

@keyframes particle-float {
  0%, 100% {
    transform: translate(0, 0) scale(1);
    opacity: 0.3;
  }
  25% {
    transform: translate(20px, -30px) scale(1.2);
    opacity: 0.6;
  }
  50% {
    transform: translate(-15px, -50px) scale(0.8);
    opacity: 0.4;
  }
  75% {
    transform: translate(25px, -20px) scale(1.1);
    opacity: 0.7;
  }
}

/* Scroll reveal animation */
.scroll-reveal {
  opacity: 0;
  transform: translateY(30px);
  transition: all 0.8s ease;
}

.scroll-reveal.revealed {
  opacity: 1;
  transform: translateY(0);
}

/* Logo trigger animation */
#logoTrigger {
  transition: all 0.3s ease;
}

#logoTrigger:active {
  transform: scale(0.95);
}

/* Responsive adjustments */
@media (max-width: 768px) {
  .orbit-icon {
    width: 40px;
    height: 40px;
    padding: 6px;
  }
  
  .orbit-icon-small {
    width: 32px;
    height: 32px;
    padding: 4px;
  }
  
  .orbit-icon-container[style*="--orbit-radius: 180px"] {
    --orbit-radius: 120px;
  }
  
  .orbit-icon-container[style*="--orbit-radius: 120px"] {
    --orbit-radius: 80px;
  }
}
</style>

<script>
// Scroll reveal functionality
document.addEventListener('DOMContentLoaded', function() {
  const scrollReveals = document.querySelectorAll('.scroll-reveal');
  
  const revealOnScroll = () => {
    scrollReveals.forEach(element => {
      const elementTop = element.getBoundingClientRect().top;
      const windowHeight = window.innerHeight;
      
      if (elementTop < windowHeight - 100) {
        element.classList.add('revealed');
      }
    });
  };
  
  // Initial check
  revealOnScroll();
  
  // Check on scroll
  window.addEventListener('scroll', revealOnScroll);
});

// Explosion effect functionality
document.addEventListener('DOMContentLoaded', function() {
  const logoTrigger = document.getElementById('logoTrigger');
  const explosionContainer = document.getElementById('explosionContainer');
  const orbitIcons = document.querySelectorAll('.orbit-icon');
  
  // Create explosion effect
  function createExplosion(x, y, color = '#3b82f6') {
    const particleCount = 30;
    
    for (let i = 0; i < particleCount; i++) {
      const particle = document.createElement('div');
      particle.className = 'explosion-particle';
      
      // Random properties for each particle
      const angle = Math.random() * Math.PI * 2;
      const distance = 50 + Math.random() * 100;
      const size = 2 + Math.random() * 6;
      const duration = 0.8 + Math.random() * 0.7;
      
      // Calculate random trajectory points
      const tx1 = Math.cos(angle) * distance * 0.3;
      const ty1 = Math.sin(angle) * distance * 0.3;
      const tx2 = Math.cos(angle) * distance * 0.6;
      const ty2 = Math.sin(angle) * distance * 0.6;
      const tx3 = Math.cos(angle) * distance * 0.8;
      const ty3 = Math.sin(angle) * distance * 0.8;
      const tx4 = Math.cos(angle) * distance;
      const ty4 = Math.sin(angle) * distance;
      
      // Set particle styles
      particle.style.cssText = `
        --tx-1: ${tx1}px;
        --ty-1: ${ty1}px;
        --tx-2: ${tx2}px;
        --ty-2: ${ty2}px;
        --tx-3: ${tx3}px;
        --ty-3: ${ty3}px;
        --tx-4: ${tx4}px;
        --ty-4: ${ty4}px;
        left: ${x}px;
        top: ${y}px;
        width: ${size}px;
        height: ${size}px;
        background: ${color};
        animation-duration: ${duration}s;
      `;
      
      explosionContainer.appendChild(particle);
      
      // Remove particle after animation
      setTimeout(() => {
        if (particle.parentNode) {
          particle.parentNode.removeChild(particle);
        }
      }, duration * 1000);
    }
  }
  
  // Trigger explosion on logo click
  logoTrigger.addEventListener('click', function(e) {
    const rect = logoTrigger.getBoundingClientRect();
    const x = rect.width / 2;
    const y = rect.height / 2;
    
    // Create multiple explosions with different colors
    createExplosion(x, y, '#3b82f6'); // Blue
    setTimeout(() => createExplosion(x, y, '#06b6d4'), 100); // Cyan
    setTimeout(() => createExplosion(x, y, '#8b5cf6'), 200); // Purple
    
    // Add shake effect to logo
    logoTrigger.style.animation = 'shake 0.5s ease-in-out';
    setTimeout(() => {
      logoTrigger.style.animation = '';
    }, 500);
  });
  
  // Add interactive hover effects for orbit icons
  orbitIcons.forEach(icon => {
    icon.addEventListener('mouseenter', function() {
      this.style.animationPlayState = 'paused';
      // Create small explosion on hover
      const rect = this.getBoundingClientRect();
      const containerRect = explosionContainer.getBoundingClientRect();
      const x = rect.left + rect.width / 2 - containerRect.left;
      const y = rect.top + rect.height / 2 - containerRect.top;
      createExplosion(x, y, '#fbbf24'); // Yellow explosion
    });
    
    icon.addEventListener('mouseleave', function() {
      this.style.animationPlayState = 'running';
    });
    
    // Click explosion for icons
    icon.addEventListener('click', function(e) {
      e.stopPropagation();
      const rect = this.getBoundingClientRect();
      const containerRect = explosionContainer.getBoundingClientRect();
      const x = rect.left + rect.width / 2 - containerRect.left;
      const y = rect.top + rect.height / 2 - containerRect.top;
      createExplosion(x, y, '#ef4444'); // Red explosion
    });
  });
});

// Shake animation for logo
const style = document.createElement('style');
style.textContent = `
  @keyframes shake {
    0%, 100% { transform: translateX(0) scale(1.05); }
    10%, 30%, 50%, 70%, 90% { transform: translateX(-4px) scale(1.05); }
    20%, 40%, 60%, 80% { transform: translateX(4px) scale(1.05); }
  }
`;
document.head.appendChild(style);
</script>
@endsection

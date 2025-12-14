@extends('layouts.navbar')
@section('content')

  <style>
    /* Override main padding to remove white space at top */
    main {
      padding-top: 0 !important;
    }

    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');

    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
      background-color: #ffffff;
      color: #1e293b;
      /* Slate 800 */
      overflow-x: hidden;
    }

    .bg-grid-pattern {
      background-image:
        linear-gradient(rgba(37, 99, 235, 0.05) 1px, transparent 1px),
        linear-gradient(90deg, rgba(37, 99, 235, 0.05) 1px, transparent 1px);
      background-size: 40px 40px;
    }

    .floating-icon {
      position: absolute;
      filter: drop-shadow(0 10px 15px rgba(0, 0, 0, 0.1));
      animation: float 6s ease-in-out infinite;
      z-index: 0;
      transition: all 0.3s ease;
    }

    .floating-icon:hover {
      transform: scale(1.1) !important;
      filter: drop-shadow(0 20px 25px rgba(37, 99, 235, 0.2));
      z-index: 10;
    }

    @keyframes float {

      0%,
      100% {
        transform: translateY(0px) rotate(0deg);
      }

      50% {
        transform: translateY(-20px) rotate(5deg);
      }
    }

    .text-gradient-blue {
      background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .card-hover {
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .card-hover:hover {
      transform: translateY(-5px);
      box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }

    .btn-primary {
      background-color: #2563eb;
      color: white;
      border-radius: 0.75rem;
      font-weight: 600;
      transition: all 0.2s ease;
      box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.2);
    }

    .btn-primary:hover {
      background-color: #1d4ed8;
      box-shadow: 0 10px 15px -3px rgba(37, 99, 235, 0.3);
      transform: translateY(-1px);
    }

    /* Scroll Animations */
    .reveal {
      opacity: 0;
      transform: translateY(30px);
      transition: all 0.8s ease-out;
    }

    .reveal.active {
      opacity: 1;
      transform: translateY(0);
    }

    .reveal-delay-100 {
      transition-delay: 0.1s;
    }

    .reveal-delay-200 {
      transition-delay: 0.2s;
    }

    .reveal-delay-300 {
      transition-delay: 0.3s;
    }
  </style>

  <!-- Hero Section -->
  <section
    class="relative min-h-screen flex flex-col items-center justify-center px-4 pt-40 overflow-hidden bg-white bg-grid-pattern">

    <!-- Floating Icons -->
    <img src="{{ asset('assets/react-icon.png') }}" class="floating-icon w-16 md:w-20 top-[15%] left-[10%]"
      style="animation-delay: 0s;">
    <img src="{{ asset('assets/python-icon.png') }}" class="floating-icon w-14 md:w-16 top-[25%] left-[25%]"
      style="animation-delay: 1s;">
    <img src="{{ asset('assets/docker-icon.png') }}" class="floating-icon w-16 md:w-24 top-[15%] right-[10%]"
      style="animation-delay: 2s;">
    <img src="{{ asset('assets/nodejs-icon.png') }}" class="floating-icon w-14 md:w-16 top-[30%] right-[25%]"
      style="animation-delay: 3s;">
    <img src="{{ asset('assets/postgresql-icon.png') }}" class="floating-icon w-16 md:w-20 bottom-[20%] left-[15%]"
      style="animation-delay: 1.5s;">
    <img src="{{ asset('assets/css-icon.png') }}" class="floating-icon w-12 md:w-14 bottom-[35%] left-[5%]"
      style="animation-delay: 0.5s;">
    <img src="{{ asset('assets/csharp-icon.png') }}" class="floating-icon w-14 md:w-18 bottom-[25%] right-[15%]"
      style="animation-delay: 2.5s;">

    <!-- Content -->
    <div class="relative z-10 text-center max-w-4xl mx-auto space-y-6 reveal active">
      <div
        class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-50 text-blue-600 text-sm font-bold tracking-wide border border-blue-100">
        <span class="w-2 h-2 rounded-full bg-blue-600 animate-pulse"></span>
        HIMAFORTIC UNESA
      </div>

      <h1 class="text-5xl md:text-7xl lg:text-8xl font-extrabold tracking-tight text-slate-900 leading-tight">
        Innovate with <br>
        <span class="text-gradient-blue">Technology</span>
      </h1>

      <p class="text-lg md:text-xl text-slate-500 max-w-2xl mx-auto leading-relaxed">
        Himpunan Mahasiswa Manajemen Informatika Universitas Negeri Surabaya.
        Mewujudkan generasi digital yang kreatif, inovatif, dan berdaya saing.
      </p>

      <div class="flex flex-col sm:flex-row gap-4 justify-center items-center pt-8">
        <a href="#about" class="btn-primary px-8 py-4 text-lg flex items-center gap-2">
          Explore Our Vision
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
          </svg>
        </a>
        <a href="#departemen"
          class="px-8 py-4 rounded-xl font-semibold text-slate-600 hover:text-blue-600 hover:bg-blue-50 transition-all border border-slate-200 hover:border-blue-200">
          Lihat Departemen
        </a>
      </div>
    </div>
  </section>

  <!-- Stats Section -->
  <section class="py-16 bg-white border-y border-slate-100">
    <div class="max-w-7xl mx-auto px-4">
      <div class="grid grid-cols-2 md:grid-cols-4 gap-8 reveal">
        <div class="text-center space-y-2">
          <div class="text-4xl md:text-5xl font-bold text-blue-600">8</div>
          <div class="text-sm font-semibold text-slate-400 uppercase tracking-wider">Departemen</div>
        </div>
        <div class="text-center space-y-2">
          <div class="text-4xl md:text-5xl font-bold text-blue-600">50+</div>
          <div class="text-sm font-semibold text-slate-400 uppercase tracking-wider">Pengurus</div>
        </div>
        <div class="text-center space-y-2">
          <div class="text-4xl md:text-5xl font-bold text-blue-600">20+</div>
          <div class="text-sm font-semibold text-slate-400 uppercase tracking-wider">Program Kerja</div>
        </div>
        <div class="text-center space-y-2">
          <div class="text-4xl md:text-5xl font-bold text-blue-600">100%</div>
          <div class="text-sm font-semibold text-slate-400 uppercase tracking-wider">Dedikasi</div>
        </div>
      </div>
    </div>
  </section>

  <!-- Vision & Mission Section -->
  <section id="about" class="py-24 px-4 bg-slate-50">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
      <!-- Logo Visual -->
      <div class="relative flex justify-center reveal">
        <div
          class="relative w-full max-w-md aspect-square bg-white rounded-[3rem] shadow-xl flex items-center justify-center p-12 border border-slate-100">
          <img src="{{ asset('assets/logo-himafortic.png') }}" alt="Logo Himafortic"
            class="w-full h-full object-contain drop-shadow-2xl">
          <!-- Decorative Elements -->
          <div class="absolute -top-4 -right-4 w-24 h-24 bg-blue-100 rounded-full -z-10"></div>
          <div class="absolute -bottom-4 -left-4 w-32 h-32 bg-blue-50 rounded-full -z-10"></div>
        </div>
      </div>

      <!-- Text Content -->
      <div class="space-y-8 reveal reveal-delay-200">
        <div>
          <h2 class="text-blue-600 font-bold tracking-wide uppercase text-sm mb-2">Our Vision & Mission</h2>
          <h3 class="text-4xl md:text-5xl font-bold text-slate-900 leading-tight mb-6">
            Mewujudkan Himpunan yang <br>
            <span class="text-blue-600">Inklusif & Adaptif</span>
          </h3>
          <p class="text-slate-500 text-lg leading-relaxed mb-8">
            Terwujudnya Himpunan Mahasiswa Manajemen Informatika sebagai wadah inklusif, adaptif, dan pengemban amanat
            intelektual yang bertanggung jawab untuk meningkatkan program studi dan institusi.
          </p>
        </div>

        <div class="space-y-6">
          <!-- Mission Item 1 -->
          <div class="flex gap-4">
            <div class="flex-shrink-0 w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
            </div>
            <div>
              <h4 class="font-bold text-lg text-slate-900">Komunikasi Transparan</h4>
              <p class="text-slate-500 text-sm">Membangun komunikasi yang transparan, kolaboratif, dan berfungsi sebagai
                penyalur aspirasi.</p>
            </div>
          </div>
          <!-- Mission Item 2 -->
          <div class="flex gap-4">
            <div class="flex-shrink-0 w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z">
                </path>
              </svg>
            </div>
            <div>
              <h4 class="font-bold text-lg text-slate-900">Kompetensi Hard & Soft Skills</h4>
              <p class="text-slate-500 text-sm">Menginisiasi kegiatan yang meningkatkan kompetensi mahasiswa serta
                menghasilkan karya.</p>
            </div>
          </div>
          <!-- Mission Item 3 -->
          <div class="flex gap-4">
            <div class="flex-shrink-0 w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                </path>
              </svg>
            </div>
            <div>
              <h4 class="font-bold text-lg text-slate-900">Tridarma Perguruan Tinggi</h4>
              <p class="text-slate-500 text-sm">Menginisiasi kegiatan yang relevan dengan pendidikan, penelitian, dan
                pengabdian.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Philosophy Section -->
  <section class="py-32 px-4 bg-gradient-to-br from-blue-600 to-indigo-700 relative overflow-hidden">
    <!-- Background Effects -->
    <div
      class="absolute top-0 right-0 w-[800px] h-[800px] bg-white/10 rounded-full blur-[120px] -translate-y-1/2 translate-x-1/3">
    </div>
    <div
      class="absolute bottom-0 left-0 w-[600px] h-[600px] bg-violet-500/20 rounded-full blur-[100px] translate-y-1/3 -translate-x-1/4">
    </div>
    <div
      class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20 brightness-100 contrast-150 mix-blend-overlay">
    </div>

    <div class="max-w-7xl mx-auto relative z-10">
      <!-- Section Header -->
      <div class="text-center mb-20 reveal">
        <div
          class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 border border-white/20 text-white text-sm font-bold tracking-wide uppercase mb-6 backdrop-blur-sm">
          <span class="w-1.5 h-1.5 rounded-full bg-blue-200 animate-pulse"></span>
          Filosofi Logo
        </div>
        <h2 class="text-4xl md:text-6xl font-black text-white leading-tight tracking-tight">
          Makna di Balik <br>
          <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-100 to-indigo-100">Identitas Kami</span>
        </h2>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-center">
        <!-- Left Bubbles -->
        <div class="space-y-8 order-2 lg:order-1 reveal">
          <!-- Bubble 1 -->
          <div class="relative group">
            <div
              class="absolute inset-0 bg-gradient-to-r from-white/20 to-white/10 rounded-2xl blur opacity-20 group-hover:opacity-40 transition-opacity duration-500">
            </div>
            <div
              class="relative bg-white/10 backdrop-blur-xl border border-white/20 p-6 rounded-2xl rounded-tr-none transform transition-all duration-300 hover:-translate-y-1 hover:bg-white/15">
              <div
                class="absolute -right-2 top-0 w-4 h-4 bg-white/10 border-t border-r border-white/20 transform rotate-45">
              </div>
              <h4 class="text-blue-100 font-bold mb-2 flex items-center gap-2">
                <i class="fas fa-code"></i> Simbol HTML
              </h4>
              <p class="text-blue-50 text-sm leading-relaxed">
                Bentuk logo diambil dari ciri khas <span class="text-white font-mono font-bold">&lt;HTML&gt;</span> tag
                markup language, melambangkan dasar teknologi web.
              </p>
            </div>
          </div>

          <!-- Bubble 2 -->
          <div class="relative group">
            <div
              class="absolute inset-0 bg-gradient-to-r from-white/20 to-white/10 rounded-2xl blur opacity-20 group-hover:opacity-40 transition-opacity duration-500">
            </div>
            <div
              class="relative bg-white/10 backdrop-blur-xl border border-white/20 p-6 rounded-2xl rounded-tr-none transform transition-all duration-300 hover:-translate-y-1 hover:bg-white/15">
              <div
                class="absolute -right-2 top-0 w-4 h-4 bg-white/10 border-t border-r border-white/20 transform rotate-45">
              </div>
              <h4 class="text-indigo-100 font-bold mb-2 flex items-center gap-2">
                <i class="fas fa-lightbulb"></i> Kreatif
              </h4>
              <p class="text-blue-50 text-sm leading-relaxed">
                Mencerminkan pola pikir tanpa batas untuk menciptakan inovasi baru yang bermanfaat.
              </p>
            </div>
          </div>
        </div>

        <!-- Center Logo -->
        <div class="order-1 lg:order-2 flex justify-center reveal reveal-delay-200 perspective-1000 py-10 lg:py-0">
          <div class="relative group transform transition-transform duration-700 hover:rotate-y-12 hover:rotate-x-6">
            <!-- Glowing Rings -->
            <div
              class="absolute inset-0 bg-white/30 rounded-full blur-[80px] opacity-30 group-hover:opacity-50 transition-opacity duration-500">
            </div>

            <!-- Glass Card -->
            <div
              class="relative w-72 h-72 md:w-80 md:h-80 bg-white/10 backdrop-blur-2xl rounded-[3rem] border border-white/20 shadow-2xl flex items-center justify-center p-10 transform transition-all duration-500 group-hover:scale-105 group-hover:border-white/30">
              <!-- Inner Glow -->
              <div
                class="absolute inset-0 rounded-[3rem] bg-gradient-to-br from-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
              </div>

              <img src="{{ asset('assets/logo-himafortic.png') }}" alt="Logo Philosophy"
                class="w-full h-full object-contain drop-shadow-[0_0_30px_rgba(255,255,255,0.3)] transform transition-transform duration-700 group-hover:scale-110 group-hover:rotate-3">
            </div>

            <!-- Floating Elements -->
            <div
              class="absolute -top-4 -right-4 w-12 h-12 bg-blue-400 rounded-xl rotate-12 opacity-80 blur-sm animate-float">
            </div>
            <div
              class="absolute -bottom-6 -left-6 w-16 h-16 bg-indigo-400 rounded-full opacity-60 blur-md animate-float-delayed">
            </div>
          </div>
        </div>

        <!-- Right Bubbles -->
        <div class="space-y-8 order-3 reveal">
          <!-- Bubble 3 -->
          <div class="relative group">
            <div
              class="absolute inset-0 bg-gradient-to-r from-white/20 to-white/10 rounded-2xl blur opacity-20 group-hover:opacity-40 transition-opacity duration-500">
            </div>
            <div
              class="relative bg-white/10 backdrop-blur-xl border border-white/20 p-6 rounded-2xl rounded-tl-none transform transition-all duration-300 hover:-translate-y-1 hover:bg-white/15">
              <div
                class="absolute -left-2 top-0 w-4 h-4 bg-white/10 border-t border-l border-white/20 transform -rotate-45">
              </div>
              <h4 class="text-blue-100 font-bold mb-2 flex items-center gap-2">
                <i class="fas fa-layer-group"></i> Huruf M & I
              </h4>
              <p class="text-blue-50 text-sm leading-relaxed">
                Modifikasi bentuk logo membentuk huruf <span class="text-white font-bold">M</span> dan <span
                  class="text-white font-bold">I</span>, singkatan dari <strong class="text-white">Manajemen
                  Informatika</strong>.
              </p>
            </div>
          </div>

          <!-- Bubble 4 -->
          <div class="relative group">
            <div
              class="absolute inset-0 bg-gradient-to-r from-white/20 to-white/10 rounded-2xl blur opacity-20 group-hover:opacity-40 transition-opacity duration-500">
            </div>
            <div
              class="relative bg-white/10 backdrop-blur-xl border border-white/20 p-6 rounded-2xl rounded-tl-none transform transition-all duration-300 hover:-translate-y-1 hover:bg-white/15">
              <div
                class="absolute -left-2 top-0 w-4 h-4 bg-white/10 border-t border-l border-white/20 transform -rotate-45">
              </div>
              <h4 class="text-indigo-100 font-bold mb-2 flex items-center gap-2">
                <i class="fas fa-rocket"></i> Inovatif
              </h4>
              <p class="text-blue-50 text-sm leading-relaxed">
                HIMAFORTIC menjadi wadah untuk mengembangkan solusi teknologi yang berdampak nyata.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Departments Section -->
  <section id="departemen" class="py-24 px-4 bg-slate-50">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-16 reveal">
        <h2 class="text-blue-600 font-bold tracking-wide uppercase text-sm mb-2">Struktur Organisasi</h2>
        <h3 class="text-4xl md:text-5xl font-bold text-slate-900">Departemen Kami</h3>
        <p class="text-slate-500 mt-4 max-w-2xl mx-auto">
          Berbagai departemen yang bersinergi untuk menjalankan program kerja dan mencapai visi misi himpunan.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @if(isset($departemen) && $departemen->count() > 0)
          @foreach($departemen as $dept)
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 card-hover group reveal">
              <div
                class="w-14 h-14 bg-blue-50 rounded-xl flex items-center justify-center text-blue-600 mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
                <!-- Placeholder Icon based on ID or Name logic could be added here -->
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                  </path>
                </svg>
              </div>
              <h4 class="text-xl font-bold text-slate-900 mb-2">{{ $dept->nama }}</h4>
              <p class="text-slate-500 text-sm line-clamp-3 mb-4">
                {{ strip_tags($dept->deskripsi ?? 'Deskripsi departemen belum tersedia.') }}
              </p>
              <a href="{{ url('departemen/' . $dept->slug) }}"
                class="inline-flex items-center text-blue-600 font-semibold text-sm hover:text-blue-700">
                Lihat Detail <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
              </a>
            </div>
          @endforeach
        @else
          <div class="col-span-full text-center py-12 text-slate-500">
            Belum ada data departemen.
          </div>
        @endif
      </div>
    </div>
  </section>

  <!-- Q&A Section -->
  <section class="py-24 px-4 bg-white border-t border-slate-100">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-16 reveal">
        <h2 class="text-blue-600 font-bold tracking-wide uppercase text-sm mb-2">Tanya Jawab</h2>
        <h3 class="text-4xl md:text-5xl font-bold text-slate-900">Diskusi Terbuka</h3>
        <p class="text-slate-500 mt-4 max-w-2xl mx-auto">
          Lihat pertanyaan yang sering diajukan atau kirimkan pertanyaan Anda sendiri.
        </p>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
        <!-- Questions List -->
        <div class="space-y-6 reveal">
          @if(isset($publicQuestions) && $publicQuestions->count() > 0)
            @foreach($publicQuestions as $q)
              <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100 hover:border-blue-200 transition-colors">
                <div class="flex items-start gap-4">
                  <div
                    class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold">
                    Q
                  </div>
                  <div class="space-y-2 flex-1">
                    <h4 class="font-bold text-slate-900 text-lg">{{ $q->question }}</h4>
                    <p class="text-sm text-slate-400">
                      Oleh <span class="font-medium text-slate-600">{{ $q->asker_name ?? 'Anonim' }}</span> •
                      {{ $q->created_at->diffForHumans() }}
                    </p>
                    @if($q->answer)
                      <div class="mt-4 pt-4 border-t border-slate-200">
                        <div class="flex items-start gap-3">
                          <div
                            class="flex-shrink-0 w-8 h-8 rounded-full bg-green-100 flex items-center justify-center text-green-600 font-bold text-xs">
                            A
                          </div>
                          <p class="text-slate-600 leading-relaxed">{{ $q->answer }}</p>
                        </div>
                      </div>
                    @endif
                  </div>
                </div>
              </div>
            @endforeach
          @else
            <div class="text-center py-12 bg-slate-50 rounded-2xl border border-dashed border-slate-200 text-slate-400">
              Belum ada pertanyaan yang dipublikasikan.
            </div>
          @endif
        </div>

        <!-- Ask Question Form -->
        <div class="reveal reveal-delay-200">
          <div class="bg-white rounded-3xl p-8 shadow-xl border border-slate-100 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-blue-50 rounded-full -translate-y-1/2 translate-x-1/3"></div>

            <h4 class="text-2xl font-bold text-slate-900 mb-6 relative z-10">Ajukan Pertanyaan</h4>

            @if(session('success'))
              <div class="mb-6 p-4 rounded-xl bg-green-50 border border-green-100 text-green-600 flex items-center gap-3">
                <i class="fas fa-check-circle"></i>
                <p>{{ session('success') }}</p>
              </div>
            @endif

            <form action="{{ route('questions.store') }}" method="POST" class="space-y-6 relative z-10">
              @csrf
              <div>
                <label for="asker_name" class="block text-sm font-bold text-slate-700 mb-2">Nama (Opsional)</label>
                <input type="text" name="asker_name" id="asker_name"
                  class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all outline-none"
                  placeholder="Boleh dikosongkan untuk anonim">
              </div>
              <div>
                <label for="question" class="block text-sm font-bold text-slate-700 mb-2">Pertanyaan Anda</label>
                <textarea name="question" id="question" rows="4"
                  class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all outline-none resize-none"
                  placeholder="Tulis pertanyaan Anda di sini..." required></textarea>
              </div>
              <button type="submit"
                class="w-full py-4 bg-blue-600 text-white font-bold rounded-xl hover:bg-blue-700 transition-colors shadow-lg shadow-blue-600/20">
                Kirim Pertanyaan
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Call to Action -->
  <section class="py-20 px-4">
    <div
      class="max-w-5xl mx-auto bg-blue-600 rounded-[2.5rem] p-12 md:p-20 text-center relative overflow-hidden shadow-2xl shadow-blue-600/30 reveal">
      <!-- Decorative Circles -->
      <div class="absolute top-0 left-0 w-64 h-64 bg-white/10 rounded-full -translate-x-1/2 -translate-y-1/2 blur-3xl">
      </div>
      <div class="absolute bottom-0 right-0 w-96 h-96 bg-white/10 rounded-full translate-x-1/3 translate-y-1/3 blur-3xl">
      </div>

      <div class="relative z-10">
        <h2 class="text-3xl md:text-5xl font-bold text-white mb-6">Siap Bergabung?</h2>
        <p class="text-blue-100 max-w-xl mx-auto mb-10 text-lg">
          Jadilah bagian dari perubahan dan kembangkan potensimu bersama HIMAFORTIC UNESA.
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center">
          <a href="https://www.instagram.com/himafortic_unesa" target="_blank"
            class="px-8 py-4 bg-white text-blue-600 rounded-xl font-bold hover:bg-blue-50 transition-colors shadow-lg">
            Hubungi Kami
          </a>
          <a href="#departemen"
            class="px-8 py-4 bg-blue-700 text-white rounded-xl font-bold hover:bg-blue-800 transition-colors border border-blue-500">
            Lihat Proker
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Floating Chat Widget -->
  <div class="fixed bottom-8 right-8 z-50 flex flex-col items-end gap-4 pointer-events-none">

    <!-- Chat Menu -->
    <div id="chat-menu"
      class="flex flex-col gap-3 transition-all duration-300 transform translate-y-10 opacity-0 pointer-events-auto invisible">
      @if(isset($contactPeople))
        @foreach($contactPeople as $contact)
          <a href="https://wa.me/{{ $contact->whatsapp_number }}?text=Halo%20{{ $contact->name }},%20saya%20ingin%20bertanya%20mengenai%20{{ $contact->category }}"
            target="_blank"
            class="flex items-center gap-3 bg-white pl-4 pr-2 py-2 rounded-full shadow-lg hover:shadow-xl transition-all hover:scale-105 group border border-slate-100">
            <span class="text-sm font-bold text-slate-600 group-hover:text-blue-600">{{ $contact->category }}</span>
            <div
              class="w-10 h-10 rounded-full bg-green-500 flex items-center justify-center text-white shadow-md group-hover:bg-green-600 transition-colors">
              <i class="fab fa-whatsapp text-lg"></i>
            </div>
          </a>
        @endforeach
      @endif
    </div>

    <!-- Main Button -->
    <button id="chat-toggle"
      class="pointer-events-auto w-16 h-16 bg-blue-600 hover:bg-blue-700 text-white rounded-full shadow-2xl shadow-blue-600/40 flex items-center justify-center transition-all duration-300 hover:scale-110 focus:outline-none group">
      <i class="fas fa-comments text-2xl group-hover:rotate-12 transition-transform duration-300"></i>
    </button>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const reveals = document.querySelectorAll('.reveal');

      function reveal() {
        for (let i = 0; i < reveals.length; i++) {
          const windowHeight = window.innerHeight;
          const elementTop = reveals[i].getBoundingClientRect().top;
          const elementVisible = 150;

          if (elementTop < windowHeight - elementVisible) {
            reveals[i].classList.add('active');
          }
        }
      }

      window.addEventListener('scroll', reveal);
      reveal(); // Trigger once on load

      // Chat Widget Toggle
      const chatToggle = document.getElementById('chat-toggle');
      const chatMenu = document.getElementById('chat-menu');
      let isChatOpen = false;

      if (chatToggle && chatMenu) {
        chatToggle.addEventListener('click', () => {
          isChatOpen = !isChatOpen;
          if (isChatOpen) {
            chatMenu.classList.remove('translate-y-10', 'opacity-0', 'invisible');
            chatToggle.classList.add('rotate-90', 'bg-red-500', 'hover:bg-red-600');
            chatToggle.classList.remove('bg-blue-600', 'hover:bg-blue-700');
            chatToggle.innerHTML = '<i class="fas fa-times text-2xl"></i>';
          } else {
            chatMenu.classList.add('translate-y-10', 'opacity-0', 'invisible');
            chatToggle.classList.remove('rotate-90', 'bg-red-500', 'hover:bg-red-600');
            chatToggle.classList.add('bg-blue-600', 'hover:bg-blue-700');
            chatToggle.innerHTML = '<i class="fas fa-comments text-2xl group-hover:rotate-12 transition-transform duration-300"></i>';
          }
        });
      }
    });
  </script>

@endsection
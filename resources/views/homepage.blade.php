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

<section id="home" class="relative min-h-screen flex items-center justify-center overflow-hidden bg-slate-50">
  <!-- Icons Container -->
  <div class="absolute inset-0 z-0" id="home-icons-container"></div>

  <!-- Content -->
  <div class="relative z-10 text-center px-6 sm:px-8">
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

  <style>
    /* Animasi pop-up smooth tanpa mantul */
    @keyframes home-popup {
      0% {
        transform: scale(0.5) translate(0, 0);
        opacity: 0;
        filter: blur(12px);
      }
      20% {
        transform: scale(1.1) translate(var(--tx), var(--ty));
        opacity: 0.7;
        filter: blur(6px);
      }
      40% {
        transform: scale(1) translate(var(--tx), var(--ty));
        opacity: 0.9;
        filter: blur(3px);
      }
      60% {
        transform: scale(1) translate(var(--tx), var(--ty));
        opacity: 1;
        filter: blur(1px);
      }
      80% {
        transform: scale(1) translate(var(--tx), var(--ty));
        opacity: 1;
        filter: blur(0px);
      }
      100% {
        transform: scale(1) translate(var(--tx), var(--ty));
        opacity: 1;
        filter: blur(0px);
      }
    }
    
    /* Animasi floating smooth dengan scaling */
    @keyframes home-float {
      0%, 100% {
        transform: translate(var(--tx), var(--ty)) translateY(0px) scale(var(--scale));
      }
      50% {
        transform: translate(var(--tx), var(--ty)) translateY(-8px) scale(calc(var(--scale) * 1.1));
      }
    }
    
    /* Animasi drift horizontal yang halus */
    @keyframes home-drift {
      0%, 100% {
        transform: translate(var(--tx), var(--ty)) translateX(0px) scale(var(--scale));
      }
      50% {
        transform: translate(var(--tx), var(--ty)) translateX(var(--drift-x, 5px)) scale(var(--scale));
      }
    }
    
    .home-popup-icon {
      position: absolute;
      width: 60px;
      height: 60px;
      animation: 
        home-popup 1.8s cubic-bezier(0.25, 0.1, 0.25, 1) forwards,
        home-float 6s ease-in-out infinite,
        home-drift 10s ease-in-out infinite;
      animation-delay: var(--delay), calc(var(--delay) + 1.8s), calc(var(--delay) + 1.8s);
      opacity: 0;
      z-index: 5;
      border-radius: 14px;
      padding: 10px;
      box-shadow: 
        0 8px 25px rgba(0, 0, 0, 0.12),
        0 4px 12px rgba(0, 0, 0, 0.08);
      object-fit: contain;
      transition: all 0.4s ease;
      will-change: transform, opacity;
      background: transparent;
    }
    
    .home-popup-icon:hover {
      transform: translate(var(--tx), var(--ty)) scale(calc(var(--scale) * 1.3)) !important;
      box-shadow: 
        0 15px 35px rgba(0, 0, 0, 0.18),
        0 8px 20px rgba(0, 0, 0, 0.12);
      z-index: 20;
      animation-play-state: paused;
    }
    
    @media (max-width: 768px) {
      .home-popup-icon {
        width: 48px;
        height: 48px;
        padding: 8px;
        border-radius: 12px;
      }
    }

    @media (max-width: 480px) {
      .home-popup-icon {
        width: 42px;
        height: 42px;
        padding: 7px;
      }
    }

    /* Area aman untuk teks */
    .text-safe-zone {
      position: relative;
      z-index: 10;
    }

    /* Pastikan teks tetap di atas ikon */
    .relative.z-10 {
      z-index: 20 !important;
    }
  </style>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Home section icons
      const homeIcons = [
        { src: "{{ asset('assets/docker-icon.png') }}", alt: "Docker" },
        { src: "{{ asset('assets/python-icon.png') }}", alt: "Python" },
        { src: "{{ asset('assets/react-icon.png') }}", alt: "React" },
        { src: "{{ asset('assets/css-icon.png') }}", alt: "CSS" },
        { src: "{{ asset('assets/nodejs-icon.png') }}", alt: "Node.js" },
        { src: "{{ asset('assets/postgresql-icon.png') }}", alt: "PostgreSQL" },
      ];
      
      const homeContainer = document.getElementById('home-icons-container');
      const containerRect = homeContainer.getBoundingClientRect();
      const centerX = containerRect.width / 2;
      const centerY = containerRect.height / 2;

      // Array untuk menyimpan posisi ikon yang sudah ditempatkan
      const placedIcons = [];
      
      // JARAK MINIMUM YANG LEBIH KETAT
      const MIN_DISTANCE_BETWEEN_ICONS = 180; // Jarak minimum yang sangat ketat
      const ICON_SIZE = 60; // Ukuran ikon dalam px
      const SAFE_MARGIN = 20; // Margin tambahan untuk keamanan

      // Area yang harus dihindari (posisi teks) - diperluas
      const avoidZones = [
        // Area HIMAFORTIC (atas) - diperluas
        { x: centerX - 280, y: centerY - 200, width: 560, height: 140 },
        // Area UNESA (tengah) - diperluas
        { x: centerX - 200, y: centerY - 60, width: 400, height: 140 },
        // Area garis pembatas - diperluas
        { x: centerX - 180, y: centerY + 90, width: 360, height: 15 },
        // Area deskripsi (bawah) - diperluas
        { x: centerX - 380, y: centerY + 130, width: 760, height: 160 }
      ];
      
      // Fungsi untuk mengecek apakah posisi bertabrakan dengan area teks
      function isPositionSafe(x, y, size = ICON_SIZE) {
        for (const zone of avoidZones) {
          const iconLeft = x - size/2 - SAFE_MARGIN;
          const iconRight = x + size/2 + SAFE_MARGIN;
          const iconTop = y - size/2 - SAFE_MARGIN;
          const iconBottom = y + size/2 + SAFE_MARGIN;
          
          const zoneLeft = zone.x;
          const zoneRight = zone.x + zone.width;
          const zoneTop = zone.y;
          const zoneBottom = zone.y + zone.height;
          
          // Cek tabrakan dengan margin tambahan
          if (iconRight > zoneLeft && iconLeft < zoneRight && 
              iconBottom > zoneTop && iconTop < zoneBottom) {
            return false;
          }
        }
        return true;
      }
      
      // Fungsi untuk mengecek jarak dengan ikon lain - LEBIH KETAT
      function isFarEnoughFromOtherIcons(x, y) {
        for (const placedIcon of placedIcons) {
          const distance = Math.sqrt(
            Math.pow(x - placedIcon.x, 2) + Math.pow(y - placedIcon.y, 2)
          );
          
          // Perhitungan jarak yang lebih ketat dengan mempertimbangkan ukuran ikon
          const requiredDistance = MIN_DISTANCE_BETWEEN_ICONS + (ICON_SIZE / 2);
          
          if (distance < requiredDistance) {
            return false;
          }
        }
        return true;
      }
      
      // Fungsi untuk menghitung jarak dari pusat teks
      function calculateDistanceFromText(x, y) {
        const textCenterX = centerX;
        const textCenterY = centerY;
        return Math.sqrt(Math.pow(x - textCenterX, 2) + Math.pow(y - textCenterY, 2));
      }
      
      // Fungsi untuk menghitung skala berdasarkan jarak
      function calculateScale(distance) {
        // Semakin dekat dengan teks, semakin kecil (0.1 - 1.8)
        const minDistance = 50;
        const maxDistance = 800;
        const minScale = 0.1;
        const maxScale = 1.8;
        
        if (distance <= minDistance) return minScale;
        if (distance >= maxDistance) return maxScale;
        
        // Interpolasi linear
        return minScale + (maxScale - minScale) * ((distance - minDistance) / (maxDistance - minDistance));
      }
      
      // ALGORITMA BARU: Grid-based positioning dengan collision avoidance
      function getStrictlySeparatedPosition(index, total) {
        const maxAttempts = 200; // Lebih banyak percobaan untuk hasil yang lebih baik
        
        // Hitung grid yang optimal
        const gridCols = Math.ceil(Math.sqrt(total * 1.5)); // Lebih banyak kolom untuk distribusi yang lebih baik
        const gridRows = Math.ceil(total / gridCols);
        
        const cellWidth = containerRect.width / gridCols;
        const cellHeight = containerRect.height / gridRows;
        
        let attempts = 0;
        
        while (attempts < maxAttempts) {
          // Coba posisi berdasarkan grid terlebih dahulu
          const gridX = index % gridCols;
          const gridY = Math.floor(index / gridCols);
          
          // Posisi kandidat di tengah cell dengan variasi kecil
          let candidateX = (gridX + 0.5) * cellWidth;
          let candidateY = (gridY + 0.5) * cellHeight;
          
          // Tambahkan variasi acak untuk menghindari pattern yang kaku
          if (attempts > 0) {
            candidateX += (Math.random() - 0.5) * cellWidth * 0.6;
            candidateY += (Math.random() - 0.5) * cellHeight * 0.6;
          }
          
          // Pastikan posisi tidak terlalu dekat dengan border
          const borderMargin = ICON_SIZE + 40;
          if (candidateX < borderMargin || candidateX > containerRect.width - borderMargin ||
              candidateY < borderMargin || candidateY > containerRect.height - borderMargin) {
            attempts++;
            continue;
          }
          
          // Cek apakah posisi aman dari teks
          if (!isPositionSafe(candidateX, candidateY)) {
            attempts++;
            continue;
          }
          
          // Cek apakah posisi cukup jauh dari ikon lain - PENTING!
          if (!isFarEnoughFromOtherIcons(candidateX, candidateY)) {
            attempts++;
            continue;
          }
          
          // Nilai drift
          const driftX = (Math.random() - 0.5) * 10;
          
          // Hitung skala berdasarkan jarak dari teks
          const distanceFromText = calculateDistanceFromText(candidateX, candidateY);
          const scale = calculateScale(distanceFromText);
          
          // Simpan posisi ikon yang berhasil ditempatkan
          placedIcons.push({ x: candidateX, y: candidateY });
          
          return { 
            tx: candidateX - centerX, 
            ty: candidateY - centerY,
            driftX: `${driftX}px`,
            scale: scale
          };
        }
        
        // FALLBACK: Algorithm dengan force-directed approach
        console.log(`Using fallback algorithm for icon ${index}`);
        return getForceDirectedPosition(index, total);
      }
      
      // ALGORITMA FALLBACK: Force-directed placement
      function getForceDirectedPosition(index, total) {
        const maxFallbackAttempts = 100;
        
        for (let attempt = 0; attempt < maxFallbackAttempts; attempt++) {
          // Coba posisi di area yang kurang padat
          const candidateX = Math.random() * (containerRect.width - 120) + 60;
          const candidateY = Math.random() * (containerRect.height - 120) + 60;
          
          // Cek semua constraint
          const borderMargin = ICON_SIZE + 30;
          if (candidateX < borderMargin || candidateX > containerRect.width - borderMargin ||
              candidateY < borderMargin || candidateY > containerRect.height - borderMargin) {
            continue;
          }
          
          if (!isPositionSafe(candidateX, candidateY)) {
            continue;
          }
          
          if (!isFarEnoughFromOtherIcons(candidateX, candidateY)) {
            continue;
          }
          
          const driftX = (Math.random() - 0.5) * 8;
          const distanceFromText = calculateDistanceFromText(candidateX, candidateY);
          const scale = calculateScale(distanceFromText);
          
          placedIcons.push({ x: candidateX, y: candidateY });
          
          return { 
            tx: candidateX - centerX, 
            ty: candidateY - centerY,
            driftX: `${driftX}px`,
            scale: scale
          };
        }
        
        // ULTIMATE FALLBACK: Posisi di sudut dengan jarak maksimal
        const corners = [
          { x: 80, y: 80 },
          { x: containerRect.width - 80, y: 80 },
          { x: 80, y: containerRect.height - 80 },
          { x: containerRect.width - 80, y: containerRect.height - 80 }
        ];
        
        const corner = corners[index % corners.length];
        const distanceFromText = calculateDistanceFromText(corner.x, corner.y);
        const scale = calculateScale(distanceFromText);
        
        placedIcons.push({ x: corner.x, y: corner.y });
        
        return {
          tx: corner.x - centerX,
          ty: corner.y - centerY,
          driftX: '0px',
          scale: scale
        };
      }
      
      // Acak urutan ikon
      function shuffleArray(array) {
        const shuffled = [...array];
        for (let i = shuffled.length - 1; i > 0; i--) {
          const j = Math.floor(Math.random() * (i + 1));
          [shuffled[i], shuffled[j]] = [shuffled[j], shuffled[i]];
        }
        return shuffled;
      }
      
      // Tambahkan ikon dengan animasi smooth tanpa mantul
      const shuffledIcons = shuffleArray(homeIcons);
      shuffledIcons.forEach((icon, index) => {
        setTimeout(() => {
          const img = document.createElement('img');
          img.src = icon.src;
          img.alt = icon.alt;
          img.className = 'home-popup-icon';
          
          const position = getStrictlySeparatedPosition(index, shuffledIcons.length);
          img.style.setProperty('--tx', `${position.tx}px`);
          img.style.setProperty('--ty', `${position.ty}px`);
          img.style.setProperty('--drift-x', position.driftX);
          img.style.setProperty('--scale', position.scale);
          img.style.setProperty('--delay', `${index * 0.25}s`);
          
          // Posisikan di tengah container (pusat pop-up)
          img.style.left = `${centerX - 30}px`;
          img.style.top = `${centerY - 30}px`;
          
          homeContainer.appendChild(img);
          
        }, index * 250);
      });
      
      // Tambahkan efek hover pada teks
      const heroTexts = document.querySelectorAll('h1');
      heroTexts.forEach(text => {
        text.addEventListener('mouseenter', function() {
          this.style.transform = 'scale(1.02)';
          this.style.transition = 'transform 0.3s ease';
        });
        
        text.addEventListener('mouseleave', function() {
          this.style.transform = 'scale(1)';
        });
      });

      // Tambahkan class safe zone ke elemen teks
      const contentDiv = document.querySelector('.relative.z-10');
      if (contentDiv) {
        contentDiv.classList.add('text-safe-zone');
      }
    });
  </script>
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
        <div id="about-explosionContainer" class="absolute inset-0 z-30"></div>
        <!-- Glow effect behind logo -->
        <div class="absolute inset-0 bg-gradient-to-r from-blue-400/20 to-cyan-400/20 rounded-full blur-3xl animate-pulse-slow"></div>
        <!-- Main orbit container -->
        <div class="absolute inset-0">
          <!-- Orbit rings dengan animasi masuk -->
          <div class="about-orbit-ring absolute inset-0 border-2 border-blue-200/30 rounded-full"></div>
          <div class="about-orbit-ring absolute inset-8 border border-cyan-200/20 rounded-full"></div>
          <div class="about-orbit-ring absolute inset-16 border border-indigo-200/10 rounded-full"></div>
          <!-- Orbiting icons dengan efek ledakan -->
          <div class="about-orbit-icon-container" style="--about-orbit-radius: 180px; --about-orbit-speed: 40s; --about-explosion-delay: 0s;">
            <img src="{{ asset('assets/python-icon.png') }}" class="about-orbit-icon" alt="Python">
          </div>
          <div class="about-orbit-icon-container" style="--about-orbit-radius: 180px; --about-orbit-speed: 35s; --about-start-angle: 60deg; --about-explosion-delay: 0.2s;">
            <img src="{{ asset('assets/react-icon.png') }}" class="about-orbit-icon" alt="React">
          </div>
          <div class="about-orbit-icon-container" style="--about-orbit-radius: 180px; --about-orbit-speed: 45s; --about-start-angle: 120deg; --about-explosion-delay: 0.4s;">
            <img src="{{ asset('assets/docker-icon.png') }}" class="about-orbit-icon" alt="Docker">
          </div>
          <div class="about-orbit-icon-container" style="--about-orbit-radius: 180px; --about-orbit-speed: 38s; --about-start-angle: 180deg; --about-explosion-delay: 0.6s;">
            <img src="{{ asset('assets/css-icon.png') }}" class="about-orbit-icon" alt="CSS">
          </div>
          <div class="about-orbit-icon-container" style="--about-orbit-radius: 180px; --about-orbit-speed: 42s; --about-start-angle: 240deg; --about-explosion-delay: 0.8s;">
            <img src="{{ asset('assets/nodejs-icon.png') }}" class="about-orbit-icon" alt="Node.js">
          </div>
          <div class="about-orbit-icon-container" style="--about-orbit-radius: 180px; --about-orbit-speed: 37s; --about-start-angle: 300deg; --about-explosion-delay: 1s;">
            <img src="{{ asset('assets/postgresql-icon.png') }}" class="about-orbit-icon" alt="PostgreSQL">
          </div>
          
          <!-- Inner orbit icons -->
          <div class="about-orbit-icon-container" style="--about-orbit-radius: 120px; --about-orbit-speed: 25s; --about-start-angle: 30deg; --about-explosion-delay: 1.2s;">
            <img src="{{ asset('assets/csharp-icon.png') }}" class="about-orbit-icon about-orbit-icon-small" alt="C#">
          </div>
        </div>

        <!-- Logo HIMAFORTIC di tengah dengan efek glow dan trigger ledakan -->
        <div class="relative z-20 group cursor-pointer" id="about-logoTrigger">
          <img src="{{ asset('assets/logo-himafortic.png') }}" 
               alt="HIMAFORTIC Logo" 
               class="relative w-48 h-48 md:w-60 md:h-60 object-contain z-10 drop-shadow-2xl transform group-hover:scale-105 transition-transform duration-500">
        </div>
        <!-- Floating particles background -->
        <div class="absolute inset-0">
          <div class="about-particle" style="--about-delay: 0s; --about-duration: 8s; --about-size: 4px; --about-color: rgb(59 130 246); top: 20%; left: 30%;"></div>
          <div class="about-particle" style="--about-delay: 1s; --about-duration: 10s; --about-size: 3px; --about-color: rgb(6 182 212); top: 60%; left: 20%;"></div>
          <div class="about-particle" style="--about-delay: 2s; --about-duration: 12s; --about-size: 5px; --about-color: rgb(139 92 246); top: 80%; left: 70%;"></div>
          <div class="about-particle" style="--about-delay: 3s; --about-duration: 9s; --about-size: 4px; --about-color: rgb(59 130 246); top: 40%; left: 80%;"></div>
          <div class="about-particle" style="--about-delay: 4s; --about-duration: 11s; --about-size: 3px; --about-color: rgb(6 182 212); top: 10%; left: 60%;"></div>
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



<!-- Enhanced Animations and Styles untuk About Section -->
<style>
/* Animation delays */
.animation-delay-200 { animation-delay: 0.2s; }
.animation-delay-400 { animation-delay: 0.4s; }

/* Slow pulse animation */
@keyframes about-pulse-slow {
  0%, 100% { opacity: 0.3; }
  50% { opacity: 0.6; }
}
.animate-pulse-slow {
  animation: about-pulse-slow 4s ease-in-out infinite;
}

/* Orbit ring entrance animation untuk about */
.about-orbit-ring {
  opacity: 0;
  transform: scale(0.8);
  animation: about-ring-entrance 2s ease-out forwards;
}

@keyframes about-ring-entrance {
  0% {
    opacity: 0;
    transform: scale(0.8);
  }
  100% {
    opacity: 1;
    transform: scale(1);
  }
}

.about-orbit-ring:nth-child(1) { animation-delay: 0.5s; }
.about-orbit-ring:nth-child(2) { animation-delay: 0.7s; }
.about-orbit-ring:nth-child(3) { animation-delay: 0.9s; }

/* Realistic orbital movement dengan explosion effect untuk about */
.about-orbit-icon-container {
  position: absolute;
  top: 50%;
  left: 50%;
  opacity: 0;
  animation: 
    about-orbit-entrance 0.8s ease-out forwards,
    about-orbit var(--about-orbit-speed, 40s) linear infinite;
  animation-delay: var(--about-explosion-delay, 0s), calc(var(--about-explosion-delay, 0s) + 0.8s);
  transform: rotate(var(--about-start-angle, 0deg)) translateX(var(--about-orbit-radius, 180px)) rotate(calc(-1 * var(--about-start-angle, 0deg)));
}

@keyframes about-orbit-entrance {
  0% {
    opacity: 0;
    transform: scale(0) rotate(var(--about-start-angle, 0deg)) translateX(0) rotate(calc(-1 * var(--about-start-angle, 0deg)));
  }
  70% {
    opacity: 1;
    transform: scale(1.2) rotate(var(--about-start-angle, 0deg)) translateX(var(--about-orbit-radius, 180px)) rotate(calc(-1 * var(--about-start-angle, 0deg)));
  }
  100% {
    opacity: 1;
    transform: scale(1) rotate(var(--about-start-angle, 0deg)) translateX(var(--about-orbit-radius, 180px)) rotate(calc(-1 * var(--about-start-angle, 0deg)));
  }
}

@keyframes about-orbit {
  0% {
    transform: rotate(var(--about-start-angle, 0deg)) translateX(var(--about-orbit-radius, 180px)) rotate(calc(-1 * var(--about-start-angle, 0deg)));
  }
  100% {
    transform: rotate(calc(var(--about-start-angle, 0deg) + 360deg)) translateX(var(--about-orbit-radius, 180px)) rotate(calc(-1 * var(--about-start-angle, 0deg) - 360deg));
  }
}

/* Enhanced icon styles dengan explosion effects untuk about */
.about-orbit-icon {
  width: 50px;
  height: 50px;
  object-fit: contain;
  filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.2));
  animation: about-float-3d 6s ease-in-out infinite;
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

.about-orbit-icon-small {
  width: 40px;
  height: 40px;
  padding: 6px;
}

.about-orbit-icon:hover {
  transform: scale(1.3) rotate(15deg);
  filter: drop-shadow(0 12px 24px rgba(0, 0, 0, 0.4));
  background: rgba(255, 255, 255, 1);
  z-index: 20;
}

/* Explosion particle styles untuk about */
.about-explosion-particle {
  position: absolute;
  border-radius: 50%;
  pointer-events: none;
  z-index: 25;
  animation: about-explosion-animation 1.5s ease-out forwards;
}

@keyframes about-explosion-animation {
  0% {
    opacity: 1;
    transform: translate(0, 0) scale(1);
  }
  20% {
    opacity: 0.8;
    transform: translate(var(--about-tx-1, 0px), var(--about-ty-1, 0px)) scale(1.2);
  }
  50% {
    opacity: 0.6;
    transform: translate(var(--about-tx-2, 0px), var(--about-ty-2, 0px)) scale(0.8);
  }
  80% {
    opacity: 0.3;
    transform: translate(var(--about-tx-3, 0px), var(--about-ty-3, 0px)) scale(0.6);
  }
  100% {
    opacity: 0;
    transform: translate(var(--about-tx-4, 0px), var(--about-ty-4, 0px)) scale(0);
  }
}

/* 3D floating effect untuk about */
@keyframes about-float-3d {
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

/* Floating particles untuk about */
.about-particle {
  position: absolute;
  background: var(--about-color);
  border-radius: 50%;
  width: var(--about-size);
  height: var(--about-size);
  animation: about-particle-float var(--about-duration) ease-in-out infinite;
  animation-delay: var(--about-delay);
  opacity: 0.6;
}

@keyframes about-particle-float {
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

/* Logo trigger animation untuk about */
#about-logoTrigger {
  transition: all 0.3s ease;
}

#about-logoTrigger:active {
  transform: scale(0.95);
}

/* Responsive adjustments untuk about */
@media (max-width: 768px) {
  .about-orbit-icon {
    width: 40px;
    height: 40px;
    padding: 6px;
  }
  
  .about-orbit-icon-small {
    width: 32px;
    height: 32px;
    padding: 4px;
  }
  
  .about-orbit-icon-container[style*="--about-orbit-radius: 180px"] {
    --about-orbit-radius: 120px;
  }
  
  .about-orbit-icon-container[style*="--about-orbit-radius: 120px"] {
    --about-orbit-radius: 80px;
  }
}
</style>

<script>
// Explosion effect functionality untuk about section
document.addEventListener('DOMContentLoaded', function() {
  const aboutLogoTrigger = document.getElementById('about-logoTrigger');
  const aboutExplosionContainer = document.getElementById('about-explosionContainer');
  const aboutOrbitIcons = document.querySelectorAll('.about-orbit-icon');
  
  // Create explosion effect untuk about
  function createAboutExplosion(x, y, color = '#3b82f6') {
    const particleCount = 30;
    
    for (let i = 0; i < particleCount; i++) {
      const particle = document.createElement('div');
      particle.className = 'about-explosion-particle';
      
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
        --about-tx-1: ${tx1}px;
        --about-ty-1: ${ty1}px;
        --about-tx-2: ${tx2}px;
        --about-ty-2: ${ty2}px;
        --about-tx-3: ${tx3}px;
        --about-ty-3: ${ty3}px;
        --about-tx-4: ${tx4}px;
        --about-ty-4: ${ty4}px;
        left: ${x}px;
        top: ${y}px;
        width: ${size}px;
        height: ${size}px;
        background: ${color};
        animation-duration: ${duration}s;
      `;
      
      aboutExplosionContainer.appendChild(particle);
      
      // Remove particle after animation
      setTimeout(() => {
        if (particle.parentNode) {
          particle.parentNode.removeChild(particle);
        }
      }, duration * 1000);
    }
  }
  
  // Trigger explosion on about logo click
  aboutLogoTrigger.addEventListener('click', function(e) {
    const rect = aboutLogoTrigger.getBoundingClientRect();
    const containerRect = aboutExplosionContainer.getBoundingClientRect();
    const x = rect.left + rect.width / 2 - containerRect.left;
    const y = rect.top + rect.height / 2 - containerRect.top;
    
    // Create multiple explosions with different colors
    createAboutExplosion(x, y, '#3b82f6'); // Blue
    setTimeout(() => createAboutExplosion(x, y, '#06b6d4'), 100); // Cyan
    setTimeout(() => createAboutExplosion(x, y, '#8b5cf6'), 200); // Purple
    
    // Add shake effect to logo
    aboutLogoTrigger.style.animation = 'about-shake 0.5s ease-in-out';
    setTimeout(() => {
      aboutLogoTrigger.style.animation = '';
    }, 500);
  });
  
  // Add interactive hover effects for about orbit icons
  aboutOrbitIcons.forEach(icon => {
    icon.addEventListener('mouseenter', function() {
      this.style.animationPlayState = 'paused';
      // Create small explosion on hover
      const rect = this.getBoundingClientRect();
      const containerRect = aboutExplosionContainer.getBoundingClientRect();
      const x = rect.left + rect.width / 2 - containerRect.left;
      const y = rect.top + rect.height / 2 - containerRect.top;
      createAboutExplosion(x, y, '#fbbf24'); // Yellow explosion
    });
    
    icon.addEventListener('mouseleave', function() {
      this.style.animationPlayState = 'running';
    });
    
    // Click explosion for about icons
    icon.addEventListener('click', function(e) {
      e.stopPropagation();
      const rect = this.getBoundingClientRect();
      const containerRect = aboutExplosionContainer.getBoundingClientRect();
      const x = rect.left + rect.width / 2 - containerRect.left;
      const y = rect.top + rect.height / 2 - containerRect.top;
      createAboutExplosion(x, y, '#ef4444'); // Red explosion
    });
  });
});

// Shake animation untuk about logo
const aboutStyle = document.createElement('style');
aboutStyle.textContent = `
  @keyframes about-shake {
    0%, 100% { transform: translateX(0) scale(1.05); }
    10%, 30%, 50%, 70%, 90% { transform: translateX(-4px) scale(1.05); }
    20%, 40%, 60%, 80% { transform: translateX(4px) scale(1.05); }
  }
`;
document.head.appendChild(aboutStyle);

// Scroll reveal functionality
document.addEventListener('DOMContentLoaded', function() {
  const scrollReveals = document.querySelectorAll('.scroll-reveal');
  
  const revealOnScroll = () => {
    scrollReveals.forEach(element => {
      const elementTop = element.getBoundingClientRect().top;
      const windowHeight = window.innerHeight;
      
      if (elementTop < windowHeight - 100) {
        element.classList.add('is-visible');
      }
    });
  };
  
  // Initial check
  revealOnScroll();
  
  // Check on scroll
  window.addEventListener('scroll', revealOnScroll);
});
</script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 800, 
    once: true,    
  });
</script>
@endsection

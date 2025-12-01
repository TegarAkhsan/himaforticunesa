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
    <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-extrabold text-blue-900 tracking-tight mb-4 sm:mb-6">
      HIMAFORTIC 
    </h1>
    <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-extrabold text-blue-900 tracking-tight mb-4 sm:mb-6">
      UNESA
    </h1>
    <div class="w-40 sm:w-48 md:w-56 h-1 mx-auto bg-gradient-to-r from-blue-600 via-cyan-400 to-blue-600 rounded-full mb-6 sm:mb-8"></div>
    <p class="max-w-2xl sm:max-w-3xl mx-auto text-base sm:text-lg md:text-xl text-slate-600 leading-relaxed sm:leading-relaxed px-2 sm:px-0">
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
    
    /* Animasi drift horizontal halus */
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
    
    /* Responsive adjustments for icons */
    @media (max-width: 1024px) {
      .home-popup-icon {
        width: 55px;
        height: 55px;
        padding: 9px;
        border-radius: 13px;
      }
    }
    
    @media (max-width: 768px) {
      .home-popup-icon {
        width: 48px;
        height: 48px;
        padding: 8px;
        border-radius: 12px;
      }
    }

    @media (max-width: 640px) {
      .home-popup-icon {
        width: 44px;
        height: 44px;
        padding: 7px;
        border-radius: 11px;
      }
    }

    @media (max-width: 480px) {
      .home-popup-icon {
        width: 40px;
        height: 40px;
        padding: 6px;
        border-radius: 10px;
      }
    }
    
    @media (max-width: 380px) {
      .home-popup-icon {
        width: 36px;
        height: 36px;
        padding: 5px;
        border-radius: 9px;
      }
    }

    /* Text safe zone */
    .text-safe-zone {
      position: relative;
      z-index: 10;
    }

    .relative.z-10 {
      z-index: 20 !important;
    }
    
    /* Additional responsive utilities */
    @media (max-width: 640px) {
      #home {
        min-height: 80vh;
      }
    }
    
    @media (max-width: 480px) {
      #home {
        min-height: 70vh;
      }
    }
  </style>

  <script>
    // Variabel global untuk menyimpan data ikon
    let iconsData = null;
    let resizeTimeout = null;

    document.addEventListener('DOMContentLoaded', function() {
      initializeIcons();
      setupResizeHandler();
    });

    function initializeIcons() {
      const homeContainer = document.getElementById('home-icons-container');
      
      // Home section icons
      const homeIcons = [
        { src: "{{ asset('assets/docker-icon.png') }}", alt: "Docker" },
        { src: "{{ asset('assets/python-icon.png') }}", alt: "Python" },
        { src: "{{ asset('assets/react-icon.png') }}", alt: "React" },
        { src: "{{ asset('assets/css-icon.png') }}", alt: "CSS" },
        { src: "{{ asset('assets/nodejs-icon.png') }}", alt: "Node.js" },
        { src: "{{ asset('assets/postgresql-icon.png') }}", alt: "PostgreSQL" },
      ];

      // Simpan data ikon untuk digunakan ulang
      iconsData = {
        homeIcons: homeIcons,
        homeContainer: homeContainer
      };

      placeIcons();
    }

    function placeIcons() {
      const { homeIcons, homeContainer } = iconsData;
      
      // Hapus ikon lama jika ada
      homeContainer.innerHTML = '';

      const containerRect = homeContainer.getBoundingClientRect();
      const centerX = containerRect.width / 2;
      const centerY = containerRect.height / 2;

      // Hitung ukuran layar untuk menentukan parameter
      const isMobile = window.innerWidth < 768;
      const isSmallMobile = window.innerWidth < 480;
      
      // Array untuk menyimpan posisi ikon yang sudah ditempatkan
      const placedIcons = [];
      
      // Parameter yang menyesuaikan dengan ukuran layar
      const MIN_DISTANCE_BETWEEN_ICONS = isSmallMobile ? 120 : (isMobile ? 150 : 180);
      const ICON_SIZE = isSmallMobile ? 36 : (isMobile ? 48 : 60);
      const SAFE_MARGIN = isSmallMobile ? 15 : (isMobile ? 18 : 20);

      // Area yang harus dihindari menyesuaikan dengan ukuran layar
      const textScale = isSmallMobile ? 0.5 : (isMobile ? 0.7 : 1);
      const avoidZones = [
        { 
          x: centerX - 280 * textScale, 
          y: centerY - 200 * textScale, 
          width: 560 * textScale, 
          height: 140 * textScale 
        },
        { 
          x: centerX - 200 * textScale, 
          y: centerY - 60 * textScale, 
          width: 400 * textScale, 
          height: 140 * textScale 
        },
        { 
          x: centerX - 180 * textScale, 
          y: centerY + 90 * textScale, 
          width: 360 * textScale, 
          height: 15 
        },
        { 
          x: centerX - 380 * textScale, 
          y: centerY + 130 * textScale, 
          width: 760 * textScale, 
          height: 160 * textScale 
        }
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
      
      // Fungsi untuk mengecek jarak dengan ikon lain
      function isFarEnoughFromOtherIcons(x, y) {
        for (const placedIcon of placedIcons) {
          const distance = Math.sqrt(
            Math.pow(x - placedIcon.x, 2) + Math.pow(y - placedIcon.y, 2)
          );
          
          // Perhitungan jarak yang lebih ketat
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
      
      // Skala yang menyesuaikan dengan ukuran layar
      function calculateScale(distance) {
        const minDistance = isSmallMobile ? 30 : (isMobile ? 40 : 50);
        const maxDistance = isSmallMobile ? 300 : (isMobile ? 500 : 800);
        const minScale = 0.1;
        const maxScale = isSmallMobile ? 1.2 : (isMobile ? 1.5 : 1.8);
        
        if (distance <= minDistance) return minScale;
        if (distance >= maxDistance) return maxScale;
        
        // Interpolasi linear
        return minScale + (maxScale - minScale) * ((distance - minDistance) / (maxDistance - minDistance));
      }
      
      // Algoritma positioning yang lebih ketat
      function getStrictlySeparatedPosition(index, total) {
        const maxAttempts = isSmallMobile ? 250 : (isMobile ? 200 : 150);
        
        // Grid yang lebih adaptif untuk layar kecil
        const gridCols = isSmallMobile ? 4 : (isMobile ? 3 : Math.ceil(Math.sqrt(total * 1.5)));
        const gridRows = Math.ceil(total / gridCols);
        
        const cellWidth = containerRect.width / gridCols;
        const cellHeight = containerRect.height / gridRows;
        
        let attempts = 0;
        
        while (attempts < maxAttempts) {
          // Coba posisi berdasarkan grid terlebih dahulu
          const gridX = index % gridCols;
          const gridY = Math.floor(index / gridCols);
          
          // Posisi kandidat di tengah cell dengan variasi yang lebih kecil di layar kecil
          const variation = isSmallMobile ? 0.2 : (isMobile ? 0.4 : 0.6);
          let candidateX = (gridX + 0.5) * cellWidth;
          let candidateY = (gridY + 0.5) * cellHeight;
          
          // Tambahkan variasi acak untuk menghindari pattern yang kaku
          if (attempts > 0) {
            candidateX += (Math.random() - 0.5) * cellWidth * variation;
            candidateY += (Math.random() - 0.5) * cellHeight * variation;
          }
          
          // Pastikan posisi tidak terlalu dekat dengan border (lebih ketat di layar kecil)
          const borderMargin = isSmallMobile ? ICON_SIZE + 20 : (isMobile ? ICON_SIZE + 30 : ICON_SIZE + 40);
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
          
          // Cek apakah posisi cukup jauh dari ikon lain
          if (!isFarEnoughFromOtherIcons(candidateX, candidateY)) {
            attempts++;
            continue;
          }
          
          // Nilai drift yang lebih kecil di layar kecil
          const driftX = (Math.random() - 0.5) * (isSmallMobile ? 4 : (isMobile ? 6 : 8));
          
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
        return getForceDirectedPosition(index, total);
      }
      
      // Fallback yang lebih ketat
      function getForceDirectedPosition(index, total) {
        const maxFallbackAttempts = isSmallMobile ? 150 : (isMobile ? 120 : 100);
        
        for (let attempt = 0; attempt < maxFallbackAttempts; attempt++) {
          // Coba posisi di area yang kurang padat dengan margin yang lebih aman
          const margin = isSmallMobile ? 80 : (isMobile ? 100 : 120);
          const candidateX = Math.random() * (containerRect.width - margin * 2) + margin;
          const candidateY = Math.random() * (containerRect.height - margin * 2) + margin;
          
          // Cek semua constraint
          const borderMargin = isSmallMobile ? ICON_SIZE + 15 : (isMobile ? ICON_SIZE + 20 : ICON_SIZE + 30);
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
          
          const driftX = (Math.random() - 0.5) * (isSmallMobile ? 3 : (isMobile ? 4 : 6));
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
        
        // ULTIMATE FALLBACK: Posisi di sudut dengan jarak yang aman
        const cornerDistance = isSmallMobile ? 50 : (isMobile ? 60 : 80);
        const corners = [
          { x: cornerDistance, y: cornerDistance },
          { x: containerRect.width - cornerDistance, y: cornerDistance },
          { x: cornerDistance, y: containerRect.height - cornerDistance },
          { x: containerRect.width - cornerDistance, y: containerRect.height - cornerDistance },
          { x: containerRect.width * 0.25, y: containerRect.height * 0.75 },
          { x: containerRect.width * 0.75, y: containerRect.height * 0.25 }
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
          
          // Pusat dengan offset yang menyesuaikan
          const iconCenterOffset = isSmallMobile ? 18 : (isMobile ? 24 : 30);
          img.style.left = `${centerX - iconCenterOffset}px`;
          img.style.top = `${centerY - iconCenterOffset}px`;
          
          homeContainer.appendChild(img);
          
        }, index * 250);
      });
    }

    function setupResizeHandler() {
      // Handle window resize dengan debounce
      window.addEventListener('resize', function() {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(function() {
          if (iconsData) {
            console.log('Window resized, repositioning icons...');
            placeIcons();
          }
        }, 250); // Debounce 250ms
      });
    }

    // Hover effect untuk teks
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

    // Safe zone untuk teks
    const contentDiv = document.querySelector('.relative.z-10');
    if (contentDiv) {
      contentDiv.classList.add('text-safe-zone');
    }
  </script>
</section>



<!-- Filosofi Section dengan Logo di Kanan -->
<section id="filosofi" class="relative overflow-hidden bg-gradient-to-br from-slate-50 to-blue-50/30 py-20 md:py-28 lg:py-32">
  <div class="max-w-[90rem] mx-auto px-6 sm:px-10 lg:px-16 grid grid-cols-1 md:grid-cols-2 gap-16 lg:gap-20 items-center">
    <!-- Deskripsi di sebelah kiri -->
    <div class="space-y-8 text-center md:text-left scroll-reveal">
      <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-slate-800 leading-tight">
        Filosofi <span class="text-blue-700">HIMAFORTIC</span>
      </h2>
      <p class="text-lg md:text-xl text-slate-600 leading-relaxed text-justify md:text-left">
        Bentuk logo diambil dari ciri khas dari 
        <span class="font-semibold text-blue-700">HTML</span> 
        tag markup language dan dimodifikasi dengan huruf 
        M dan I yang melambangkan Manajemen Informatika.
        Tulisan yang berada di bawah logo menggambarkan bahwa HIMAFORTIC 
        mewadahi ide kreatif dan inovatif seluruh mahasiswa D4 Manajemen Informatika.
      </p>
    </div>

    <!-- Logo HIMAFORTIC dengan efek orbit -->
    <div class="relative flex justify-center items-center scroll-reveal filosofi-logo-container">
      <div class="relative w-[320px] h-[320px] sm:w-[360px] sm:h-[360px] md:w-[420px] md:h-[420px] lg:w-[550px] lg:h-[550px] flex items-center justify-center">
        
        <!-- Container untuk orbit icons -->
        <div class="absolute inset-0 filosofi-orbit-wrapper" id="filosofi-orbit-container">
          <!-- Orbit rings -->
          <div class="filosofi-orbit-ring filosofi-orbit-ring-1"></div>
          <div class="filosofi-orbit-ring filosofi-orbit-ring-2"></div>
          <div class="filosofi-orbit-ring filosofi-orbit-ring-3"></div>
        </div>
        
        <!-- Logo HIMAFORTIC di tengah -->
        <div class="relative z-20 group cursor-pointer filosofi-center-logo" id="filosofi-logoTrigger">
          <img src="{{ asset('assets/logo-himafortic.png') }}" 
            alt="HIMAFORTIC Logo" 
            class="relative w-24 h-24 sm:w-28 sm:h-28 md:w-32 md:h-32 lg:w-36 lg:h-36 object-contain z-10 drop-shadow-2xl transform group-hover:scale-105 transition-transform duration-500">
        </div>
        
        <!-- Floating particles -->
        <div class="absolute inset-0">
          <div class="filosofi-particle" style="--filosofi-delay: 0s; --filosofi-duration: 8s; --filosofi-size: 4px; --filosofi-color: rgb(59 130 246); top: 20%; left: 30%;"></div>
          <div class="filosofi-particle" style="--filosofi-delay: 1s; --filosofi-duration: 10s; --filosofi-size: 3px; --filosofi-color: rgb(6 182 212); top: 60%; left: 20%;"></div>
          <div class="filosofi-particle" style="--filosofi-delay: 2s; --filosofi-duration: 12s; --filosofi-size: 5px; --filosofi-color: rgb(139 92 246); top: 80%; left: 70%;"></div>
          <div class="filosofi-particle" style="--filosofi-delay: 3s; --filosofi-duration: 9s; --filosofi-size: 4px; --filosofi-color: rgb(59 130 246); top: 40%; left: 80%;"></div>
          <div class="filosofi-particle" style="--filosofi-delay: 4s; --filosofi-duration: 11s; --filosofi-size: 3px; --filosofi-color: rgb(6 182 212); top: 10%; left: 60%;"></div>
        </div>
      </div>
    </div>
  </div>

  <style>
    /* Filosofi Section Styles */
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

    /* Container logo untuk responsif */
    .filosofi-logo-container {
      margin-top: 2rem;
    }

    @media (max-width: 768px) {
      .filosofi-logo-container {
        margin-top: 3rem;
        margin-bottom: 1rem;
      }
    }

    @media (max-width: 640px) {
      .filosofi-logo-container {
        margin-top: 4rem;
        margin-bottom: 2rem;
      }
    }

    /* FIX: Container orbit yang tepat di tengah */
    .filosofi-orbit-wrapper {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 100%;
      height: 100%;
      pointer-events: none;
      z-index: 5;
    }

    /* Orbit ring styles - DIKOREKSI UNTUK ORBIT YANG PAS DENGAN PUTARAN */
    .filosofi-orbit-ring {
      position: absolute;
      border-radius: 50%;
      opacity: 0;
      animation: filosofi-ring-entrance 2s ease-out forwards;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

    .filosofi-orbit-ring-1 {
      width: 100%;
      height: 100%;
      border: 2px solid rgba(59, 130, 246, 0.15);
      animation-delay: 0.5s;
    }

    .filosofi-orbit-ring-2 {
      width: 80%;
      height: 80%;
      border: 1px solid rgba(6, 182, 212, 0.1);
      animation-delay: 0.7s;
    }

    .filosofi-orbit-ring-3 {
      width: 60%;
      height: 60%;
      border: 1px solid rgba(139, 92, 246, 0.05);
      animation-delay: 0.9s;
    }

    @keyframes filosofi-ring-entrance {
      0% {
        opacity: 0;
        transform: translate(-50%, -50%) scale(0.8);
      }
      100% {
        opacity: 1;
        transform: translate(-50%, -50%) scale(1);
      }
    }

    /* FIX: Orbit icon container yang tepat dengan radius yang disesuaikan */
    .filosofi-orbit-icon-container {
      position: absolute;
      top: 50%;
      left: 50%;
      opacity: 0;
      animation: 
        filosofi-orbit-entrance 0.8s ease-out forwards,
        filosofi-orbit var(--filosofi-orbit-speed, 40s) linear infinite;
      animation-delay: var(--filosofi-explosion-delay, 0s), calc(var(--filosofi-explosion-delay, 0s) + 0.8s);
      transform: rotate(var(--filosofi-start-angle, 0deg)) translateX(var(--filosofi-orbit-radius, 140px)) rotate(calc(-1 * var(--filosofi-start-angle, 0deg)));
      transform-origin: center;
    }

    @keyframes filosofi-orbit-entrance {
      0% {
        opacity: 0;
        transform: scale(0) rotate(var(--filosofi-start-angle, 0deg)) translateX(0) rotate(calc(-1 * var(--filosofi-start-angle, 0deg)));
      }
      70% {
        opacity: 1;
        transform: scale(1.2) rotate(var(--filosofi-start-angle, 0deg)) translateX(var(--filosofi-orbit-radius, 140px)) rotate(calc(-1 * var(--filosofi-start-angle, 0deg)));
      }
      100% {
        opacity: 1;
        transform: scale(1) rotate(var(--filosofi-start-angle, 0deg)) translateX(var(--filosofi-orbit-radius, 140px)) rotate(calc(-1 * var(--filosofi-start-angle, 0deg)));
      }
    }

    @keyframes filosofi-orbit {
      0% {
        transform: rotate(var(--filosofi-start-angle, 0deg)) translateX(var(--filosofi-orbit-radius, 140px)) rotate(calc(-1 * var(--filosofi-start-angle, 0deg)));
      }
      100% {
        transform: rotate(calc(var(--filosofi-start-angle, 0deg) + 360deg)) translateX(var(--filosofi-orbit-radius, 140px)) rotate(calc(-1 * var(--filosofi-start-angle, 0deg) - 360deg));
      }
    }

    /* FIX: Logo tengah yang benar-benar di pusat */
    .filosofi-center-logo {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 20;
    }

    /* Enhanced icon styles - DIKECILKAN UNTUK ORBIT YANG LEBIH LUAS */
    .filosofi-orbit-icon {
      width: 44px;
      height: 44px;
      object-fit: contain;
      filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.2));
      animation: filosofi-float-3d 6s ease-in-out infinite;
      transition: all 0.3s ease;
      border-radius: 10px;
      background: rgba(255, 255, 255, 0.95);
      padding: 6px;
      box-shadow: 
        0 8px 25px rgba(0, 0, 0, 0.15),
        inset 0 1px 0 rgba(255, 255, 255, 0.8);
      position: relative;
      z-index: 10;
      border: 1px solid rgba(255, 255, 255, 0.5);
    }

    .filosofi-orbit-icon-small {
      width: 36px;
      height: 36px;
      padding: 5px;
    }

    .filosofi-orbit-icon:hover {
      transform: scale(1.3) rotate(15deg);
      filter: drop-shadow(0 12px 24px rgba(0, 0, 0, 0.4));
      background: rgba(255, 255, 255, 1);
      z-index: 20;
      animation-play-state: paused;
    }

    /* 3D floating effect */
    @keyframes filosofi-float-3d {
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
    .filosofi-particle {
      position: absolute;
      background: var(--filosofi-color);
      border-radius: 50%;
      width: var(--filosofi-size);
      height: var(--filosofi-size);
      animation: filosofi-particle-float var(--filosofi-duration) ease-in-out infinite;
      animation-delay: var(--filosofi-delay);
      opacity: 0.4;
    }

    @keyframes filosofi-particle-float {
      0%, 100% {
        transform: translate(0, 0) scale(1);
        opacity: 0.2;
      }
      25% {
        transform: translate(20px, -30px) scale(1.2);
        opacity: 0.5;
      }
      50% {
        transform: translate(-15px, -50px) scale(0.8);
        opacity: 0.3;
      }
      75% {
        transform: translate(25px, -20px) scale(1.1);
        opacity: 0.6;
      }
    }

    /* Logo trigger animation */
    #filosofi-logoTrigger {
      transition: all 0.3s ease;
    }

    #filosofi-logoTrigger:active {
      transform: translate(-50%, -50%) scale(0.95);
    }

    /* Responsive adjustments - ORBIT PAS DENGAN PUTARAN DI SEMUA UKURAN */
    @media (max-width: 1024px) {
      .filosofi-orbit-icon {
        width: 40px;
        height: 40px;
        padding: 5px;
        border-radius: 9px;
      }
      
      .filosofi-orbit-icon-small {
        width: 32px;
        height: 32px;
        padding: 4px;
      }

      /* Logo HIMAFORTIC lebih kecil */
      .filosofi-center-logo img {
        width: 80px !important;
        height: 80px !important;
      }
    }
    
    @media (max-width: 768px) {
      .filosofi-orbit-icon {
        width: 36px;
        height: 36px;
        padding: 4px;
        border-radius: 8px;
      }
      
      .filosofi-orbit-icon-small {
        width: 28px;
        height: 28px;
        padding: 3px;
      }

      /* Container lebih besar untuk orbit yang lebih luas */
      .filosofi-logo-container > div {
        width: 300px !important;
        height: 300px !important;
      }

      /* Logo HIMAFORTIC lebih kecil di mobile */
      .filosofi-center-logo img {
        width: 70px !important;
        height: 70px !important;
      }
    }

    @media (max-width: 640px) {
      .filosofi-orbit-icon {
        width: 32px;
        height: 32px;
        padding: 3px;
        border-radius: 7px;
      }
      
      .filosofi-orbit-icon-small {
        width: 26px;
        height: 26px;
        padding: 2px;
      }

      /* Container lebih besar untuk orbit yang lebih luas */
      .filosofi-logo-container > div {
        width: 280px !important;
        height: 280px !important;
      }

      /* Logo HIMAFORTIC lebih kecil */
      .filosofi-center-logo img {
        width: 65px !important;
        height: 65px !important;
      }
    }

    @media (max-width: 480px) {
      .filosofi-orbit-icon {
        width: 30px;
        height: 30px;
        padding: 3px;
        border-radius: 6px;
      }
      
      .filosofi-orbit-icon-small {
        width: 24px;
        height: 24px;
        padding: 2px;
      }

      /* Container lebih besar untuk orbit yang lebih luas */
      .filosofi-logo-container > div {
        width: 260px !important;
        height: 260px !important;
      }

      /* Logo HIMAFORTIC lebih kecil */
      .filosofi-center-logo img {
        width: 60px !important;
        height: 60px !important;
      }
    }

    @media (max-width: 380px) {
      /* Extra small devices */
      .filosofi-logo-container > div {
        width: 240px !important;
        height: 240px !important;
      }

      .filosofi-orbit-icon {
        width: 28px;
        height: 28px;
        padding: 2px;
        border-radius: 6px;
      }
      
      .filosofi-orbit-icon-small {
        width: 22px;
        height: 22px;
        padding: 2px;
      }

      /* Logo HIMAFORTIC lebih kecil */
      .filosofi-center-logo img {
        width: 55px !important;
        height: 55px !important;
      }
    }

    /* Ensure proper z-index stacking */
    #filosofi {
      position: relative;
      z-index: 1;
    }

    #filosofi .relative.z-20 {
      z-index: 20;
    }
  </style>

  <script>
    // Filosofi section JavaScript
    document.addEventListener('DOMContentLoaded', function() {
      initializeFilosofiOrbit();
      setupFilosofiScrollReveal();
    });

    let filosofiOrbitData = null;

    function initializeFilosofiOrbit() {
      const orbitContainer = document.getElementById('filosofi-orbit-container');
      
      // Filosofi section icons
      const filosofiIcons = [
        { src: "{{ asset('assets/docker-icon.png') }}", alt: "Docker", speed: "40s", delay: "0s", size: "normal" },
        { src: "{{ asset('assets/python-icon.png') }}", alt: "Python", speed: "40s", delay: "0.2s", size: "normal" },
        { src: "{{ asset('assets/react-icon.png') }}", alt: "React", speed: "40s", delay: "0.4s", size: "normal" },
        { src: "{{ asset('assets/css-icon.png') }}", alt: "CSS", speed: "40s", delay: "0.6s", size: "normal" },
        { src: "{{ asset('assets/nodejs-icon.png') }}", alt: "Node.js", speed: "40s", delay: "0.8s", size: "normal" },
        { src: "{{ asset('assets/postgresql-icon.png') }}", alt: "PostgreSQL", speed: "40s", delay: "1s", size: "normal" },
        { src: "{{ asset('assets/csharp-icon.png') }}", alt: "C#", speed: "40s", delay: "1.2s", size: "normal" }
      ];

      // Simpan data orbit untuk digunakan ulang
      filosofiOrbitData = {
        filosofiIcons: filosofiIcons,
        orbitContainer: orbitContainer
      };
      
      // Hitung sudut untuk setiap ikon
      const total = filosofiIcons.length;
      filosofiIcons.forEach((icon, i) => {
        icon.angle = `${(360 / total) * i}deg`;
      });
      
      createOrbitIcons();
    }

    function createOrbitIcons() {
      const { filosofiIcons, orbitContainer } = filosofiOrbitData;
      
      // Hapus ikon lama jika ada
      const existingIcons = orbitContainer.querySelectorAll('.filosofi-orbit-icon-container');
      existingIcons.forEach(icon => icon.remove());

      // Dapatkan ukuran container untuk perhitungan responsif
      const containerWidth = orbitContainer.offsetWidth;
      const containerHeight = orbitContainer.offsetHeight;
      
      // Gunakan ukuran terkecil untuk memastikan orbit tetap bulat sempurna
      const containerSize = Math.min(containerWidth, containerHeight);
      
      const isMobile = window.innerWidth < 768;
      const isSmallMobile = window.innerWidth < 480;
      const isLargeScreen = window.innerWidth >= 1024;

      // PERHITUNGAN RADIUS YANG PAS DENGAN ORBIT RING TERLUAR
      // Radius = (ukuran container / 2) - (ukuran ikon / 2) - margin
      let orbitRadius;
      
      if (isSmallMobile) {
        // Untuk mobile kecil: radius = (container/2) - (icon/2) - 10px margin
        orbitRadius = (containerSize / 2) - 15 - 10;
      } else if (isMobile) {
        // Untuk mobile: radius = (container/2) - (icon/2) - 12px margin
        orbitRadius = (containerSize / 2) - 18 - 12;
      } else if (isLargeScreen) {
        // Untuk desktop: radius = (container/2) - (icon/2) - 15px margin
        orbitRadius = (containerSize / 2) - 22 - 15;
      } else {
        // Default: radius = (container/2) - (icon/2) - 12px margin
        orbitRadius = (containerSize / 2) - 20 - 12;
      }

      console.log('Orbit Calculation:', {
        containerSize,
        orbitRadius,
        isMobile,
        isSmallMobile,
        isLargeScreen
      });

      // Tambahkan ikon orbit dengan animasi
      filosofiIcons.forEach((icon, index) => {
        const iconContainer = document.createElement('div');
        iconContainer.className = 'filosofi-orbit-icon-container';
        
        // Terapkan radius yang sudah dihitung - PASTIKAN POSITIF
        const finalRadius = Math.max(orbitRadius, 60); // Minimum radius 60px
        iconContainer.style.setProperty('--filosofi-orbit-radius', `${finalRadius}px`);
        iconContainer.style.setProperty('--filosofi-orbit-speed', icon.speed);
        iconContainer.style.setProperty('--filosofi-start-angle', icon.angle);
        iconContainer.style.setProperty('--filosofi-explosion-delay', icon.delay);

        const img = document.createElement('img');
        img.src = icon.src;
        img.alt = icon.alt;
        
        // Terapkan ukuran ikon berdasarkan ukuran layar
        if (icon.size === 'small') {
          img.className = 'filosofi-orbit-icon filosofi-orbit-icon-small';
        } else {
          img.className = 'filosofi-orbit-icon';
        }
        
        // Hover effects
        img.addEventListener('mouseenter', function() {
          this.style.animationPlayState = 'paused';
        });
        
        img.addEventListener('mouseleave', function() {
          this.style.animationPlayState = 'running';
        });

        iconContainer.appendChild(img);
        orbitContainer.appendChild(iconContainer);
      });

      // Update orbit rings untuk menyesuaikan dengan radius ikon
      updateOrbitRings(orbitRadius, containerSize);
    }

    function updateOrbitRings(orbitRadius, containerSize) {
      // Hitung persentase orbit ring berdasarkan radius ikon
      const ring1Percentage = ((orbitRadius + 25) / (containerSize / 2)) * 100;
      const ring2Percentage = ((orbitRadius + 15) / (containerSize / 2)) * 100;
      const ring3Percentage = ((orbitRadius + 5) / (containerSize / 2)) * 100;

      // Update orbit rings
      const ring1 = document.querySelector('.filosofi-orbit-ring-1');
      const ring2 = document.querySelector('.filosofi-orbit-ring-2');
      const ring3 = document.querySelector('.filosofi-orbit-ring-3');

      if (ring1) ring1.style.width = ring1.style.height = `${Math.min(ring1Percentage, 95)}%`;
      if (ring2) ring2.style.width = ring2.style.height = `${Math.min(ring2Percentage, 85)}%`;
      if (ring3) ring3.style.width = ring3.style.height = `${Math.min(ring3Percentage, 75)}%`;

      console.log('Orbit Rings Updated:', {
        ring1: `${Math.min(ring1Percentage, 95)}%`,
        ring2: `${Math.min(ring2Percentage, 85)}%`,
        ring3: `${Math.min(ring3Percentage, 75)}%`
      });
    }

    function setupFilosofiScrollReveal() {
      const filosofiScrollReveals = document.querySelectorAll('#filosofi .scroll-reveal');
      
      const revealOnScroll = () => {
        filosofiScrollReveals.forEach(element => {
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
      
      // Setup resize handler untuk responsif
      setupFilosofiResizeHandler();
    }

    function setupFilosofiResizeHandler() {
      let resizeTimeout;
      
      window.addEventListener('resize', function() {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(function() {
          if (filosofiOrbitData) {
            console.log('Window resized, updating filosofi orbit...');
            createOrbitIcons();
          }
        }, 250);
      });
    }

    // Hover effect untuk logo filosofi
    const filosofiLogoTrigger = document.getElementById('filosofi-logoTrigger');
    if (filosofiLogoTrigger) {
      filosofiLogoTrigger.addEventListener('mouseenter', function() {
        this.style.transform = 'translate(-50%, -50%) scale(1.05)';
      });
      
      filosofiLogoTrigger.addEventListener('mouseleave', function() {
        this.style.transform = 'translate(-50%, -50%) scale(1)';
      });
    }

    // Fallback: mulai animasi setelah section terlihat
    setTimeout(() => {
      const filosofiSection = document.getElementById('filosofi');
      if (filosofiSection) {
        const rect = filosofiSection.getBoundingClientRect();
        if (rect.top < window.innerHeight && rect.bottom > 0) {
          const animatedElements = filosofiSection.querySelectorAll('.scroll-reveal');
          animatedElements.forEach(el => {
            if (!el.classList.contains('is-visible')) {
              el.classList.add('is-visible');
            }
          });
        }
      }
    }, 1000);

    // Inisialisasi ulang orbit setelah halaman selesai dimuat
    window.addEventListener('load', function() {
      setTimeout(() => {
        if (filosofiOrbitData) {
          createOrbitIcons();
        }
      }, 500);
    });
  </script>
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

                <a href="{{ url('/departemen') }}" 
                  class="mt-10 group inline-flex items-center gap-2 border-2 border-blue-600 px-6 py-3 rounded-lg font-medium text-blue-600 transition duration-300 hover:bg-blue-600 hover:text-white transform hover:-translate-y-1">
                    Learn More About Us
                    <i class="fas fa-arrow-right transition-transform duration-300 group-hover:translate-x-1"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<style>
/* Media queries untuk responsive design */
@media (max-width: 640px) {
    /* Untuk mobile yang sangat kecil */
    #about .absolute {
        transform: scale(0.8) rotate(3deg);
        right: -8px;
        bottom: -8px;
    }
}

@media (max-width: 480px) {
    /* Untuk mobile extra small */
    #about .absolute {
        transform: scale(0.7) rotate(3deg);
        right: -12px;
        bottom: -12px;
    }
    
    #about .text-2xl {
        font-size: 1.5rem;
        line-height: 1;
    }
    
    #about .text-xs {
        font-size: 0.65rem;
    }
    
    #about .px-3 {
        padding-left: 0.5rem;
        padding-right: 0.5rem;
    }
    
    #about .py-2 {
        padding-top: 0.375rem;
        padding-bottom: 0.375rem;
    }
}

/* Pastikan badge tidak keluar dari container */
#about .relative {
    overflow: visible;
}

/* Hover effects tetap smooth */
#about .absolute:hover {
    transform: scale(0.9) rotate(0deg) translateY(-2px);
}

@media (min-width: 768px) {
    #about .absolute:hover {
        transform: scale(1.05) rotate(0deg) translateY(-4px);
    }
}
</style>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 800, 
    once: true,    
  });
</script>

    <!-- Struktur -->
<!-- Struktur -->
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
                                <div class="border-l-4 border-blue-600 pl-4 mb-4">
                                    <h3 class="text-xl font-bold text-[#2c3e50] font-playfair">{{ $person->mahasiswa->nama }}</h3>
                                    <p class="text-slate-600 font-medium">{{ $title }}</p>
                                </div>
                                <div class="mt-auto pt-4">
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
            <p class="text-lg text-slate-600 max-w-2xl mx-auto">Inspirational leaders driving every department toward innovation and excellence.</p>
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
                                <button class="w-full open-modal-btn border-2 border-blue-600 px-4 py-1.5 rounded-lg font-medium text-sm text-blue-600 transition duration-300 hover:bg-blue-600 hover:text-white"
                                    data-modal-target="#modal-departemen-{{ $item->id }}">
                                    Detail
                                </button>
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
            <div class="bg-white rounded-2xl shadow-2xl w-full max-w-sm md:max-w-md lg:max-w-2xl mx-auto transform transition-transform duration-300 scale-95 max-h-[85vh] overflow-y-auto modal-responsive">
                {{-- Header modal --}}
                <div class="modal-header flex justify-between items-center p-4 md:p-6 bg-blue-600 text-white rounded-t-2xl sticky top-0 z-10">
                    <h5 class="text-xl md:text-2xl font-playfair">{{ $person->mahasiswa->nama }}</h5>
                    <button class="close-modal-btn text-2xl hover:text-gray-300 transition-colors">&times;</button>
                </div>
                <div class="modal-body p-4 md:p-6 grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6">
                    <div class="md:col-span-1">
                        <img src="{{ $person->foto ? asset('storage/' . $person->foto) : asset('images/default-user.png') }}"
                            class="w-full h-auto max-w-xs mx-auto object-cover rounded-xl shadow-lg modal-image">
                    </div>
                    <div class="md:col-span-2">
                        <p class="mb-4 text-lg font-medium text-[#2c3e50]">{{ $title }}</p>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 border-t pt-4">
                            <div>
                                <p class="text-xs text-slate-400">Nama</p>
                                <p class="font-semibold text-sm md:text-base">{{ $person->mahasiswa->nama ?? '-' }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-slate-400">NIM</p>
                                <p class="font-semibold text-sm md:text-base">{{ $person->mahasiswa->nim ?? '-' }}</p>
                            </div>
                        </div>
                        <div class="mt-6 flex gap-4 justify-center md:justify-start">
                            @if($person->mahasiswa->instagram)
                                <a href="{{ $person->mahasiswa->instagram }}" target="_blank" class="text-pink-600 hover:text-pink-700 text-2xl transition-colors">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            @endif
                            @if($person->mahasiswa->linkedin)
                                <a href="{{ $person->mahasiswa->linkedin }}" target="_blank" class="text-blue-600 hover:text-blue-700 text-2xl transition-colors">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer p-4 md:p-6 bg-slate-50 rounded-b-2xl text-center md:text-right">
                    <button class="close-modal-btn bg-slate-200 text-slate-800 font-semibold rounded-lg px-6 py-2 hover:bg-slate-300 transition-colors text-sm md:text-base">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    @endif
@endforeach

{{-- ================== MODAL KETUA DEPARTEMEN ================== --}}
@foreach ($struktur['ketua_departemen'] as $item)
<div id="modal-departemen-{{ $item->id }}" class="fixed inset-0 bg-black bg-opacity-60 hidden items-center justify-center z-50 p-4 transition-opacity duration-300 opacity-0">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-sm md:max-w-md lg:max-w-2xl mx-auto transform transition-transform duration-300 scale-95 max-h-[85vh] overflow-y-auto modal-responsive">
        {{-- Header modal --}}
        <div class="modal-header flex justify-between items-center p-4 md:p-6 bg-blue-600 text-white rounded-t-2xl sticky top-0 z-10">
            <h5 class="text-xl md:text-2xl font-playfair">{{ $item->mahasiswa->nama }}</h5>
            <button class="close-modal-btn text-2xl hover:text-gray-300 transition-colors">&times;</button>
        </div>
        <div class="modal-body p-4 md:p-6 grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6">
            <div class="md:col-span-1">
                <img src="{{ $item->foto ? asset('storage/' . $item->foto) : asset('images/default-user.png') }}" 
                    class="w-full h-auto max-w-xs mx-auto object-cover rounded-xl shadow-lg modal-image">
            </div>
            <div class="md:col-span-2">
                <p class="mb-4 text-lg font-medium text-[#2c3e50]">{{ $item->departemen->nama }}</p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 border-t pt-4">
                    <div>
                        <p class="text-xs text-slate-400">Nama</p>
                        <p class="font-semibold text-sm md:text-base">{{ $item->mahasiswa->nama ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400">NIM</p>
                        <p class="font-semibold text-sm md:text-base">{{ $item->mahasiswa->nim ?? '-' }}</p>
                    </div>
                </div>
                <div class="mt-6 flex gap-4 justify-center md:justify-start">
                    @if($item->mahasiswa->instagram)
                        <a href="{{ $item->mahasiswa->instagram }}" target="_blank" class="text-pink-600 hover:text-pink-700 text-2xl transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                    @endif
                    @if($item->mahasiswa->linkedin)
                        <a href="{{ $item->mahasiswa->linkedin }}" target="_blank" class="text-blue-600 hover:text-blue-700 text-2xl transition-colors">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="modal-footer p-4 md:p-6 bg-slate-50 rounded-b-2xl text-center md:text-right">
            <button class="close-modal-btn bg-slate-200 text-slate-800 font-semibold rounded-lg px-6 py-2 hover:bg-slate-300 transition-colors text-sm md:text-base">
                Tutup
            </button>
        </div>
    </div>
</div>
@endforeach

<style>
/* Responsive modal styles untuk layar kecil */
@media (max-width: 768px) {
    .modal-responsive {
        max-width: 95% !important;
        max-height: 85vh !important;
        margin: 10px auto !important;
    }
    
    .modal-body {
        grid-template-columns: 1fr !important;
        padding: 1rem !important;
        gap: 1rem !important;
    }
    
    .modal-body img.modal-image {
        max-width: 150px !important;
        margin: 0 auto;
    }
    
    .modal-header,
    .modal-footer {
        padding: 1rem !important;
    }
    
    .modal-header h5 {
        font-size: 1.25rem !important;
    }
    
    /* Perkecil padding dan margin untuk layar kecil */
    .modal-body .grid.grid-cols-1.sm\:grid-cols-2 {
        gap: 0.75rem !important;
    }
    
    .modal-body .border-t.pt-4 {
        padding-top: 1rem !important;
    }
    
    .modal-body .mt-6 {
        margin-top: 1rem !important;
    }
    
    /* Perkecil font untuk layar kecil */
    .modal-body p.text-lg {
        font-size: 1rem !important;
    }
    
    .modal-body .font-semibold {
        font-size: 0.875rem !important;
    }
}

/* Untuk layar sangat kecil (mobile) */
@media (max-width: 480px) {
    .modal-responsive {
        max-width: 98% !important;
        max-height: 80vh !important;
    }
    
    .modal-body img.modal-image {
        max-width: 120px !important;
    }
    
    .modal-header h5 {
        font-size: 1.1rem !important;
    }
    
    .modal-body {
        padding: 0.75rem !important;
    }
    
    .modal-footer button {
        padding: 0.5rem 1rem !important;
        font-size: 0.875rem !important;
    }
}

/* Untuk layar normal (sedikit lebih kecil dari sebelumnya) */
@media (min-width: 769px) {
    .modal-responsive {
        max-width: 85% !important;
    }
}

@media (min-width: 1024px) {
    .modal-responsive {
        max-width: 700px !important; /* Diperkecil dari 800px menjadi 700px */
    }
}

/* Untuk layar sangat besar */
@media (min-width: 1280px) {
    .modal-responsive {
        max-width: 750px !important; /* Sedikit lebih besar tapi tetap lebih kecil dari sebelumnya */
    }
}

/* Scroll reveal animation */
.scroll-reveal {
    opacity: 0;
    transform: translateY(30px);
    transition: opacity 0.6s ease-out, transform 0.6s ease-out;
}

.scroll-reveal.is-visible {
    opacity: 1;
    transform: translateY(0);
}

/* Smooth transitions for modals */
.fixed {
    transition: opacity 0.3s ease;
    padding-top: 80px; /* Tambahan padding untuk semua ukuran layar */
    align-items: flex-start; /* Pastikan modal tidak tertutup navbar */
}

.transform {
    transition: transform 0.3s ease;
}

/* Prevent body scroll when modal is open */
body.modal-open {
    overflow: hidden;
}

/* Pastikan modal container memiliki cukup ruang dari atas */
.modal-container {
    padding-top: 80px;
}

/* Tambahan margin untuk modal di semua ukuran */
.modal-responsive {
    margin-top: 20px;
    margin-bottom: 20px;
}
</style>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const openBtns = document.querySelectorAll('.open-modal-btn');
    const closeBtns = document.querySelectorAll('.close-modal-btn');
    
    const openModal = (m) => {
        if (!m) return;
        
        // Prevent body scroll
        document.body.classList.add('modal-open');
        
        m.classList.remove('hidden');
        m.classList.add('flex');
        
        setTimeout(() => {
            m.classList.remove('opacity-0');
            const transformElement = m.querySelector('.transform');
            if (transformElement) {
                transformElement.classList.remove('scale-95');
            }
            
            // Scroll ke atas modal untuk memastikan terlihat
            m.scrollTop = 0;
        }, 10);
    }
    
    const closeModal = (m) => {
        if (!m) return;
        
        m.classList.add('opacity-0');
        const transformElement = m.querySelector('.transform');
        if (transformElement) {
            transformElement.classList.add('scale-95');
        }
        
        setTimeout(() => {
            m.classList.add('hidden');
            m.classList.remove('flex');
            
            // Restore body scroll
            document.body.classList.remove('modal-open');
        }, 300);
    }
    
    // Open modal event
    openBtns.forEach(b => {
        b.addEventListener('click', (e) => {
            e.preventDefault();
            const target = b.getAttribute('data-modal-target');
            openModal(document.querySelector(target));
        });
    });
    
    // Close modal events
    closeBtns.forEach(b => {
        b.addEventListener('click', () => {
            closeModal(b.closest('.fixed'));
        });
    });
    
    // Close modal when clicking outside
    document.querySelectorAll('.fixed').forEach(m => {
        m.addEventListener('click', (e) => {
            if (e.target === m) {
                closeModal(m);
            }
        });
    });
    
    // Close modal with Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            const openModal = document.querySelector('.fixed:not(.hidden)');
            if (openModal) {
                closeModal(openModal);
            }
        }
    });
    
    // Scroll reveal functionality
    const revealEls = document.querySelectorAll('.scroll-reveal');
    const obs = new IntersectionObserver(entries => {
        entries.forEach(e => {
            if (e.isIntersecting) {
                e.target.classList.add('is-visible');
                obs.unobserve(e.target);
            }
        });
    }, { threshold: 0.1 });
    
    revealEls.forEach(el => obs.observe(el));
});
</script>


<script>
document.addEventListener("DOMContentLoaded", () => {
    const openBtns = document.querySelectorAll('.open-modal-btn');
    const closeBtns = document.querySelectorAll('.close-modal-btn');
    
    const openModal = (m) => {
        if (!m) return;
        
        // Prevent body scroll
        document.body.classList.add('modal-open');
        
        m.classList.remove('hidden');
        m.classList.add('flex');
        
        setTimeout(() => {
            m.classList.remove('opacity-0');
            const transformElement = m.querySelector('.transform');
            if (transformElement) {
                transformElement.classList.remove('scale-95');
            }
            
            // Scroll ke atas modal untuk memastikan terlihat
            m.scrollTop = 0;
        }, 10);
    }
    
    const closeModal = (m) => {
        if (!m) return;
        
        m.classList.add('opacity-0');
        const transformElement = m.querySelector('.transform');
        if (transformElement) {
            transformElement.classList.add('scale-95');
        }
        
        setTimeout(() => {
            m.classList.add('hidden');
            m.classList.remove('flex');
            
            // Restore body scroll
            document.body.classList.remove('modal-open');
        }, 300);
    }
    
    // Open modal event
    openBtns.forEach(b => {
        b.addEventListener('click', (e) => {
            e.preventDefault();
            const target = b.getAttribute('data-modal-target');
            openModal(document.querySelector(target));
        });
    });
    
    // Close modal events
    closeBtns.forEach(b => {
        b.addEventListener('click', () => {
            closeModal(b.closest('.fixed'));
        });
    });
    
    // Close modal when clicking outside
    document.querySelectorAll('.fixed').forEach(m => {
        m.addEventListener('click', (e) => {
            if (e.target === m) {
                closeModal(m);
            }
        });
    });
    
    // Close modal with Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            const openModal = document.querySelector('.fixed:not(.hidden)');
            if (openModal) {
                closeModal(openModal);
            }
        }
    });
    
    // Scroll reveal functionality
    const revealEls = document.querySelectorAll('.scroll-reveal');
    const obs = new IntersectionObserver(entries => {
        entries.forEach(e => {
            if (e.isIntersecting) {
                e.target.classList.add('is-visible');
                obs.unobserve(e.target);
            }
        });
    }, { threshold: 0.1 });
    
    revealEls.forEach(el => obs.observe(el));
});
</script>


@endsection

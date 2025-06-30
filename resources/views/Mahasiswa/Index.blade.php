<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard KP - USB YPKP</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
    .slide-down-enter {
      opacity: 0;
      transform: scaleY(0);
      transform-origin: top;
    }
    .slide-down-enter-active {
      opacity: 1;
      transform: scaleY(1);
      transition: all 0.3s ease-in-out;
    }
    .slide-down-leave {
      opacity: 1;
      transform: scaleY(1);
    }
    .slide-down-leave-active {
      opacity: 0;
      transform: scaleY(0);
      transition: all 0.3s ease-in-out;
    }
  </style>
</head>
<body class="bg-black text-slate-800">

  <!-- Top Bar -->
  <div class="bg-transparent text-transparent px-5 py-2 text-sm flex justify-between">
    <div class="social">
      <!-- Sosial Media -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <script src="{{ asset('js/slider.js') }}" defer></script>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>

  <!-- Top Bar -->
  <div class="top-bar">
    <div class="social">
    
      
    
    </div>
    
  </div>

  <!-- Navbar -->
   <header class="bg-transparent px-5 py-4 shadow-md">
    <div class="flex justify-between items-center">
      <div class="text-white text-2xl font-bold">USB<span class="text-red-700">YPKP</span></div>
      <div class="hidden md:flex items-center gap-4">
    <nav id="mobile-menu" class="hidden md:flex flex-col md:flex-row mt-2 md:mt-0 gap-4 text-white font-semibold transition-all duration-300 ease-in-out">
      @auth
        <span class="text-white">Halo, {{ Auth::user()->name }}</span>
      <a href="{{ route('logout') }}" class="btn btn-outline-danger">Logout</a>    <nav id="mobile-menu" class="hidden md:flex flex-col md:flex-row mt-2 md:mt-0 gap-4 text-white font-semibold transition-all duration-300 ease-in-out">
      <a href="{{ route('login') }}">Login</a>
      <a href="/pengajuan">Pengajuan</a>
      <a href="/tracking">Tracking Surat</a>
        </form>
      @else
        <a href="{{ route('login') }}">Login</a>
        <a href="/pengajuan">Pengajuan</a>
        <a href="/tracking">Tracking Surat</a>
      @endauth
            <button id="menu-toggle" class="md:hidden text-white focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
          <path d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>

    </nav>
  </header>

  <!-- Hero Slider -->
<<<<<<< HEAD
  <div class="relative h-[100vh] overflow-hidden" id="slider-container">
    <div class="absolute w-full h-full slider fade">
      <img src="{{ asset('hero1.jpg') }}" alt="Hero Image 1" class="w-full h-full object-cover brightness-50">
      <div class="absolute inset-0 flex flex-col justify-center items-center text-white text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Sistem Pengajuan KP</h1>
        <p class="text-lg md:text-xl mb-4">Proses mudah, cepat, dan terintegrasi</p>
        <a href="{{ route('login') }}" class="bg-white text-blue-900 px-6 py-3 rounded font-bold">Mulai Sekarang</a>
      </div>
    </div>
    <div class="absolute w-full h-full slider fade hidden">
      <img src="{{ asset('hero2.jpg') }}" alt="Hero Image 2" class="w-full h-full object-cover brightness-50">
      <div class="absolute inset-0 flex flex-col justify-center items-center text-white text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Lacak Surat Kerja praktekmu</h1>
        <p class="text-lg md:text-xl mb-4">Langsung dari dashboard mahasiswa</p>
        <a href="{{ route('login') }}" class="bg-white text-blue-900 px-6 py-3 rounded font-bold">Login</a>
      </div>
    </div>
    <div class="absolute w-full h-full slider fade hidden">
      <img src="{{ asset('hero3.jpg') }}" alt="Hero Image 3" class="w-full h-full object-cover brightness-50">
      <div class="absolute inset-0 flex flex-col justify-center items-center text-white text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Unduh Surat PDF</h1>
        <p class="text-lg md:text-xl mb-4">Cetak surat kapan pun, di mana pun</p>
        <a href="{{ route('login') }}" class="bg-white text-blue-900 px-6 py-3 rounded font-bold">Akses Sekarang</a>
=======
  <div class="slider-container">
    <div class="slider fade">
      <img src="{{ asset('hero1.jpg') }}" alt="Hero Image 1">
      <div class="hero-text">
        <h1>Sistem Pengajuan KP</h1>
        <p>Proses mudah, cepat, dan terintegrasi</p>
        <a href="{{ route('login') }}" class="cta-button">Mulai Sekarang</a>
      </div>
    </div>
    <div class="slider fade">
      <img src="{{ asset('hero2.jpg') }}" alt="Hero Image 2">
      <div class="hero-text">
        <h1>Lacak Surat Kerja praktekmu</h1>
        <p>Langsung dari dashboard mahasiswa</p>
        <a href="{{ route('login') }}" class="cta-button">Login</a>
      </div>
    </div>
    <div class="slider fade">
      <img src="{{ asset('hero3.jpg') }}" alt="Hero Image 3">
      <div class="hero-text">
        <h1>Unduh Surat PDF</h1>
        <p>Cetak surat kapan pun, di mana pun</p>
        <a href="{{ route('login') }}" class="cta-button">Akses Sekarang</a>
>>>>>>> 3c6ec3943f35a8bf49a3bed63e84e73a6fda1bdc
      </div>
    </div>
  </div>

<<<<<<< HEAD
  <!-- Parallax Section -->
  <section class="bg-fixed bg-cover bg-center text-white text-center py-32 px-6" style="background-image: url('{{ asset('hero3.jpg') }}');">
    <div class="bg-black bg-opacity-50 max-w-3xl mx-auto p-8 rounded-lg">
      <h2 class="text-2xl md:text-3xl font-bold mb-4">Profil Website</h2>
=======
  <!-- Konten Parallax -->
  <section class="parallax-section">
    <div class="content-box">
      <h2>Profil Website</h2>
>>>>>>> 3c6ec3943f35a8bf49a3bed63e84e73a6fda1bdc
      <p>Sistem ini dirancang untuk memudahkan mahasiswa dalam mengurus surat kerja praktik secara digital. Semua proses diawasi dan dikontrol oleh admin untuk memastikan validitas dan kecepatan layanan.</p>
    </div>
  </section>

<<<<<<< HEAD
  <!-- Features Section -->
  <section class="bg-gray-600 py-16 px-5 flex flex-col md:flex-row flex-wrap justify-center gap-10 text-white">
    <div class="text-center max-w-xs">
      <img src="{{ asset('icon-form.png') }}" alt="" class="w-16 mx-auto mb-3">
      <h3 class="text-xl font-bold mb-1">Isi Form</h3>
      <p>Pengajuan cukup dari HP atau laptop</p>
    </div>
    <div class="text-center max-w-xs">
      <img src="{{ asset('icon-tracking.png') }}" alt="" class="w-16 mx-auto mb-3">
      <h3 class="text-xl font-bold mb-1">Tracking</h3>
      <p>Lihat status surat kapan saja</p>
    </div>
    <div class="text-center max-w-xs">
      <img src="{{ asset('icon-pdf.png') }}" alt="" class="w-16 mx-auto mb-3">
      <h3 class="text-xl font-bold mb-1">Download PDF</h3>
=======
  <section class="features">
    <div class="feature">
      <img src="{{ asset('icon-form.png') }}" alt="">
      <h3>Isi Form</h3>
      <p>Pengajuan cukup dari HP atau laptop</p>
    </div>
    <div class="feature">
      <img src="{{ asset('icon-tracking.png') }}" alt="">
      <h3>Tracking</h3>
      <p>Lihat status surat kapan saja</p>
    </div>
    <div class="feature">
      <img src="{{ asset('icon-pdf.png') }}" alt="">
      <h3>Download PDF</h3>
>>>>>>> 3c6ec3943f35a8bf49a3bed63e84e73a6fda1bdc
      <p>Surat siap cetak langsung</p>
    </div>
  </section>

<<<<<<< HEAD
  <!-- Footer -->
  <footer class="bg-gray-500 text-white text-center py-6 mt-10">
=======
  <footer>
>>>>>>> 3c6ec3943f35a8bf49a3bed63e84e73a6fda1bdc
    <p>&copy; 2025 Sistem KP - USB YPKP</p>
    <p>Dikembangkan oleh Mahasiswa TI</p>
  </footer>

<<<<<<< HEAD
  <script>
    // SLIDER
    let slideIndex = 0;
    const slides = document.querySelectorAll('.slider');

    function showSlides() {
      slides.forEach((slide) => slide.classList.add('hidden'));
      slideIndex++;
      if (slideIndex > slides.length) slideIndex = 1;
      slides[slideIndex - 1].classList.remove('hidden');
    }

    showSlides();
    setInterval(showSlides, 5000);

    // NAVBAR TOGGLE with animation
    const toggleBtn = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
 
    toggleBtn.addEventListener('click', () => {
      if (mobileMenu.classList.contains('hidden')) {
        mobileMenu.classList.remove('hidden');
        mobileMenu.classList.add('slide-down-enter');
        setTimeout(() => {
          mobileMenu.classList.add('slide-down-enter-active');
          mobileMenu.classList.remove('slide-down-enter');
        }, 10);
      } else {
        mobileMenu.classList.add('slide-down-leave');
        mobileMenu.classList.add('slide-down-leave-active');
        setTimeout(() => {
          mobileMenu.classList.remove('slide-down-leave', 'slide-down-leave-active');
          mobileMenu.classList.add('hidden');
        }, 300);
      }
    });
  </script>
=======
>>>>>>> 3c6ec3943f35a8bf49a3bed63e84e73a6fda1bdc
</body>
</html>

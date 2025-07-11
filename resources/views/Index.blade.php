<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard KP - USB YPKP</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <script src="{{ asset('js/slider.js') }}" defer></script>
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
<body class="bg-black text-white overflow-x-hidden">

  <!-- Navbar -->
  <header class="bg-transparent px-5 py-4 shadow-md flex justify-between items-center">
    <div class="text-white text-2xl font-bold">USB<span class="text-red-700">YPKP</span></div>
    <div class="hidden md:flex items-center gap-4">
      <nav class="flex gap-4 text-white font-semibold">
    @auth
        <span>Halo, {{ Auth::user()->name }}</span>

        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="hover:text-red-500 bg-transparent border-none p-0 m-0 cursor-pointer">
                Logout
            </button>
        </form>
    @else
        <a href="{{ route('login') }}" class="hover:text-red-500">Login</a>
    @endauth

    <a href="/pengajuan" class="hover:text-red-500">Pengajuan</a>
    <a href="/tracking" class="hover:text-red-500">Tracking Surat</a>
</nav>

    </div>
    <button id="menu-toggle" class="md:hidden text-white">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path d="M4 6h16M4 12h16M4 18h16"/>
      </svg>
    </button>
  </header>

 <!-- Mobile Menu -->
<nav id="mobile-menu" class="hidden flex-col md:hidden gap-4 text-center text-white font-semibold bg-black px-5 py-4">
    @auth
      <span>Halo, {{ Auth::user()->name }}</span>

      <a href="#" class="hover:text-red-500"
         onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();">
         Logout
      </a>

      <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>
    @else
      <a href="{{ route('login') }}" class="hover:text-red-500">Login</a>
    @endauth

    <a href="/pengajuan" class="hover:text-red-500">Pengajuan</a>
    <a href="/tracking" class="hover:text-red-500">Tracking Surat</a>
</nav>


  <!-- Hero Slider -->
  <div class="relative w-screen h-screen overflow-hidden" id="slider-container">
    <div class="absolute w-full h-full slider fade">
      <img src="{{ asset('hero1.jpg') }}" class="w-full h-full object-cover brightness-50" alt="Hero 1">
      <div class="absolute inset-0 flex flex-col justify-center items-center text-center px-4">
        <h1 class="text-3xl md:text-5xl font-bold mb-4">Sistem Pengajuan KP</h1>
        <p class="text-lg md:text-xl mb-4">Proses mudah, cepat, dan terintegrasi</p>
        <a href="{{ route('login') }}" class="bg-white text-blue-900 px-6 py-3 rounded font-bold">Mulai Sekarang</a>
      </div>
    </div>
    <div class="absolute w-full h-full slider fade hidden">
      <img src="{{ asset('hero2.jpg') }}" class="w-full h-full object-cover brightness-50" alt="Hero 2">
      <div class="absolute inset-0 flex flex-col justify-center items-center text-center px-4">
        <h1 class="text-3xl md:text-5xl font-bold mb-4">Lacak Surat Kerja Praktekmu</h1>
        <p class="text-lg md:text-xl mb-4">Langsung dari dashboard mahasiswa</p>
        <a href="{{ route('login') }}" class="bg-white text-blue-900 px-6 py-3 rounded font-bold">Login</a>
      </div>
    </div>
    <div class="absolute w-full h-full slider fade hidden">
      <img src="{{ asset('hero3.jpg') }}" class="w-full h-full object-cover brightness-50" alt="Hero 3">
      <div class="absolute inset-0 flex flex-col justify-center items-center text-center px-4">
        <h1 class="text-3xl md:text-5xl font-bold mb-4">Unduh Surat PDF</h1>
        <p class="text-lg md:text-xl mb-4">Cetak surat kapan pun, di mana pun</p>
        <a href="{{ route('login') }}" class="bg-white text-blue-900 px-6 py-3 rounded font-bold">Akses Sekarang</a>
      </div>
    </div>
  </div>

  <!-- Profil -->
  <section class="bg-fixed bg-cover bg-center text-white text-center py-32 px-6" style="background-image: url('{{ asset('hero3.jpg') }}');">
    <div class="bg-black bg-opacity-50 max-w-3xl mx-auto p-8 rounded-lg">
      <h2 class="text-2xl md:text-3xl font-bold mb-4">Profil Website</h2>
      <p>Sistem ini dirancang untuk memudahkan mahasiswa dalam mengurus surat kerja praktik secara digital. Semua proses diawasi dan dikontrol oleh admin untuk memastikan validitas dan kecepatan layanan.</p>
    </div>
  </section>

  <!-- Fitur -->
  <section class="bg-gray-800 py-16 px-5 flex flex-col md:flex-row flex-wrap justify-center gap-10 text-white">
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
      <p>Surat siap cetak langsung</p>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-gray-900 text-white text-center py-6 mt-10">
    <p>&copy; 2025 Sistem KP - USB YPKP</p>
    <p>Dikembangkan oleh Mahasiswa TI</p>
  </footer>

  <!-- Script Slider & Navbar -->
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      let slideIndex = 0;
      const slides = document.querySelectorAll('.slider');

      function showSlides() {
        slides.forEach(slide => slide.classList.add('hidden'));
        slideIndex = (slideIndex + 1 > slides.length) ? 1 : slideIndex + 1;
        slides[slideIndex - 1].classList.remove('hidden');
      }

      showSlides();
      setInterval(showSlides, 5000);

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
    });
  </script>
</body>
</html>

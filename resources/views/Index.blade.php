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
  </style>
</head>
<body class="bg-white text-gray-800 overflow-x-hidden">

<!-- Navbar -->
<header class="bg-gray-900 px-5 py-4 shadow-md flex justify-between items-center text-white">
  <div class="text-xl font-bold">USB<span class="text-red-600">YPKP</span></div>

  <!-- Desktop Menu -->
  <nav class="hidden md:flex gap-4 text-sm font-semibold">
    @auth
      <span>Halo, {{ Auth::user()->name }}</span>
      <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="hover:text-red-500">Logout</button>
      </form>
    @else
      <a href="{{ route('login') }}" class="hover:text-red-500">Login</a>
    @endauth
    <a href="/pengajuan" class="hover:text-red-500">Pengajuan</a>
    <a href="/tracking" class="hover:text-red-500">Tracking Surat</a>
  </nav>

   <!-- Tombol Selalu Muncul -->
  <a href="/input" 
     class="flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded text-sm ml-4">
    <!-- Ikon -->
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
    </svg>
    <!-- Teks hanya muncul di desktop -->
    <span class="hidden md:inline">Input Tempat KP</span>
  </a>

  <!-- Hamburger Button -->
  <button id="menu-toggle" class="md:hidden">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
      <path d="M4 6h16M4 12h16M4 18h16"/>
    </svg>
  </button>
</header>

<!-- Mobile Menu -->
<nav id="mobile-menu"
     class="hidden md:hidden flex flex-col gap-4 text-center bg-gray-900 text-white
            transition-all duration-300 ease-out transform opacity-0 -translate-y-2 py-0">
  @auth
    <span>Halo, {{ Auth::user()->name }}</span>
    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();" class="hover:text-red-500">Logout</a>
    <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
  @else
    <a href="{{ route('login') }}" class="hover:text-red-500">Login</a>
  @endauth
  <a href="/pengajuan" class="hover:text-red-500">Pengajuan</a>
  <a href="/tracking" class="hover:text-red-500">Tracking Surat</a>
</nav>

<script>
document.addEventListener('DOMContentLoaded', () => {
  const btn  = document.getElementById('menu-toggle');
  const menu = document.getElementById('mobile-menu');

  btn.addEventListener('click', () => {
    const isHidden = menu.classList.contains('hidden');

    if (isHidden) {
      // BUKA MENU
      menu.classList.remove('hidden');
      void menu.offsetWidth; // Reflow biar animasi jalan
      menu.classList.remove('opacity-0', '-translate-y-2', 'py-0');
      menu.classList.add('opacity-100', 'translate-y-0', 'py-4');
    } else {
      // TUTUP MENU
      menu.classList.add('opacity-0', '-translate-y-2', 'py-0');
      menu.classList.remove('opacity-100', 'translate-y-0', 'py-4');
      menu.addEventListener('transitionend', () => {
        menu.classList.add('hidden');
      }, { once: true });
    }
  });
});
</script>


  <!-- Hero Section -->
  <section class="relative w-full h-[60vh] flex items-center justify-center bg-gray-200 text-center">
    <div>
      <h1 class="text-3xl md:text-4xl font-bold mb-2">Sistem Pengajuan KP</h1>
      <p class="text-gray-600 mb-4">Proses mudah, cepat, dan terintegrasi</p>
      <a href="{{ route('login') }}" class="bg-gray-900 text-white px-5 py-2 rounded">Mulai Sekarang</a>
    </div>
  </section>

  <!-- Profil -->
  <section class="text-center py-16 px-6">
    <h2 class="text-2xl font-bold mb-4">Profil Website</h2>
    <p class="max-w-2xl mx-auto text-gray-700">
      Sistem ini dirancang untuk memudahkan mahasiswa dalam mengurus surat kerja praktik secara digital.
      Semua proses diawasi dan dikontrol oleh admin untuk memastikan validitas dan kecepatan layanan.
    </p>
  </section>

 <!-- Fitur -->
<section class="bg-gray-100 py-12 px-5 flex flex-col md:flex-row justify-center gap-10">
  
  <!-- Isi Form -->
  <div class="text-center max-w-xs">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mx-auto text-gray-800 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10m-10 4h6m-6 4h6M4 7h16v14H4V7z" />
    </svg>
    <h3 class="text-lg font-bold mb-1">Isi Form</h3>
    <p class="text-gray-600">Pengajuan cukup dari HP atau laptop</p>
  </div>

  <!-- Tracking -->
  <div class="text-center max-w-xs">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mx-auto text-gray-800 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2a4 4 0 018 0v2m-4-4a4 4 0 100-8 4 4 0 000 8z" />
    </svg>
    <h3 class="text-lg font-bold mb-1">Tracking</h3>
    <p class="text-gray-600">Lihat status surat kapan saja</p>
  </div>

  <!-- Download PDF -->
  <div class="text-center max-w-xs">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mx-auto text-gray-800 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
    </svg>
    <h3 class="text-lg font-bold mb-1">Download PDF</h3>
    <p class="text-gray-600">Surat siap cetak langsung</p>
  </div>

</section>


  <!-- Footer -->
  <footer class="bg-gray-900 text-white text-center py-6 mt-10 text-sm">
    <p>&copy; 2025 Sistem KP - USB YPKP</p>
    <p>Dikembangkan oleh Mahasiswa TI</p>
  </footer>

  <!-- Script Menu Mobile -->
  <script>
    document.getElementById('menu-toggle').addEventListener('click', () => {
      document.getElementById('mobile-menu').classList.toggle('hidden');
    });
  </script>
</body>
</html>

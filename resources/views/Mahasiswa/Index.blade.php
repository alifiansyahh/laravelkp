<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard KP - USB YPKP</title>
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
  <header class="navbar">
    <div class="logo">USB<span>YPKP</span></div>
    <nav>
      <ul>
        <li><a href="{{ route('login') }}">Login</a></li>
        <li><a href="/pengajuan">Pengajuan</a></li>
        <li><a href="/tracking">Tracking Surat</a></li>
      </ul>
    </nav>
  </header>

  <!-- Hero Slider -->
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
      </div>
    </div>
  </div>

  <!-- Konten Parallax -->
  <section class="parallax-section">
    <div class="content-box">
      <h2>Profil Website</h2>
      <p>Sistem ini dirancang untuk memudahkan mahasiswa dalam mengurus surat kerja praktik secara digital. Semua proses diawasi dan dikontrol oleh admin untuk memastikan validitas dan kecepatan layanan.</p>
    </div>
  </section>

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
      <p>Surat siap cetak langsung</p>
    </div>
  </section>

  <footer>
    <p>&copy; 2025 Sistem KP - USB YPKP</p>
    <p>Dikembangkan oleh Mahasiswa TI</p>
  </footer>

</body>
</html>

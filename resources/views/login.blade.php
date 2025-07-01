<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login - Sistem KP</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            poppins: ['Poppins', 'sans-serif']
          }
        }
      }
    }
  </script>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(to bottom right, #0f172a, #1e293b);
    }
  </style>
</head>
<body class="flex items-center justify-center min-h-screen px-4">

  <div class="bg-white/20 backdrop-blur-lg text-white p-8 rounded-2xl shadow-xl w-full max-w-md space-y-6 border border-white/30">
    <h2 class="text-3xl font-bold text-center">Login</h2>

    @if (session('error'))
      <div class="bg-red-500/80 p-3 rounded text-sm">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('login.proses') }}" class="space-y-5">
      @csrf

      <!-- Username -->
      <div class="relative">
        <input type="text" name="email" placeholder="Username / NPM"
               class="w-full py-3 pl-12 pr-4 bg-white/20 text-white placeholder-white border border-white/30 rounded-lg focus:outline-none focus:ring-2 focus:ring-white" required />
        <span class="absolute left-4 top-3.5 text-white">
          <i class="fas fa-user"></i>
        </span>
      </div>

     
      <div class="relative">
        <input type="password" name="password" placeholder="Password" id="password"
               class="w-full py-3 pl-12 pr-10 bg-white/20 text-white placeholder-white border border-white/30 rounded-lg focus:outline-none focus:ring-2 focus:ring-white" required />
        <span class="absolute left-4 top-3.5 text-white">
          <i class="fas fa-lock"></i>
        </span>
        <span toggle="#password" class="fas fa-eye absolute right-4 top-3.5 cursor-pointer text-white toggle-password"></span>
      </div>

     
      <div>
        <select name="role" required
                class="w-full py-3 px-4 bg-white/20 text-white border border-white/30 rounded-lg focus:outline-none focus:ring-2 focus:ring-white">
          <option value="">-- Pilih Role --</option>
          <option value="mahasiswa">Mahasiswa</option>
          <option value="admin">Admin</option>
        </select>
      </div>

      <!-- Remember & Forgot -->
      <div class="flex items-center justify-between text-sm text-white">
        <label class="flex items-center gap-2">
          <input type="checkbox" class="accent-white" />
          Remember me
        </label>
        <a href="#" class="hover:underline">Forgot Password?</a>
      </div>

      <!-- Login Button -->
      <button type="submit" class="w-full py-3 bg-white text-black font-semibold rounded-lg hover:bg-gray-200 transition">
        Login
      </button>

      <p class="text-center text-sm text-white">Belum punya akun? <a href="{{ route('register') }}" class="font-semibold underline">Daftar di sini</a></p>
    </form>
  </div>

  <script>
    document.querySelector('.toggle-password').addEventListener('click', function () {
      const input = document.querySelector('#password');
      const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
      input.setAttribute('type', type);
      this.classList.toggle('fa-eye');
      this.classList.toggle('fa-eye-slash');
    });
  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>
</body>
</html>

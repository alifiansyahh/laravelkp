<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Register - Sistem KP</title>
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
    <h3 class="text-3xl font-bold text-center">Daftar Akun</h3>

    @if ($errors->any())
      <div class="bg-red-500/80 p-4 rounded text-sm animate__animated animate__shakeX">
        <ul class="mb-0 pl-4 list-disc">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('register.proses') }}" class="space-y-5">
      @csrf

      <!-- Nama -->
      <div>
        <label class="block mb-1 font-medium" for="name">Nama Lengkap</label>
        <input type="text" name="name" class="w-full py-3 px-4 bg-white/20 text-white placeholder-white border border-white/30 rounded-lg focus:outline-none focus:ring-2 focus:ring-white" required />
      </div>

      <!-- Email -->
      <div>
        <label class="block mb-1 font-medium" for="email">Email</label>
        <input type="email" name="email" class="w-full py-3 px-4 bg-white/20 text-white placeholder-white border border-white/30 rounded-lg focus:outline-none focus:ring-2 focus:ring-white" required />
      </div>

      <!-- Password -->
      <div>
        <label class="block mb-1 font-medium" for="password">Kata Sandi</label>
        <input type="password" name="password" class="w-full py-3 px-4 bg-white/20 text-white placeholder-white border border-white/30 rounded-lg focus:outline-none focus:ring-2 focus:ring-white" required />
      </div>

      <!-- Password Confirmation -->
      <div>
        <label class="block mb-1 font-medium" for="password_confirmation">Konfirmasi Kata Sandi</label>
        <input type="password" name="password_confirmation" class="w-full py-3 px-4 bg-white/20 text-white placeholder-white border border-white/30 rounded-lg focus:outline-none focus:ring-2 focus:ring-white" required />
      </div>

      <button type="submit" class="w-full py-3 bg-white text-black font-semibold rounded-lg hover:bg-gray-200 transition">
        Daftar
      </button>
    </form>
  </div>

</body>
</html>

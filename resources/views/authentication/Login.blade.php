<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Pengajuan KP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="login-box">
        <h3>Login Sistem KP</h3>

        @if (session('error'))
            <div class="alert alert-danger animate__animated animate__shakeX">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('login.proses') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email/NPM</label>
                <input type="text" name="email" class="form-control" required autofocus>
            </div>

            <div class="mb-3 position-relative">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" name="password" class="form-control" id="password" required>
                <span toggle="#password" class="fas fa-eye toggle-password"></span>
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Login Sebagai</label>
                <select id="role" name="role" class="form-select" required>
                    <option value="">-- Pilih Role --</option>
                    <option value="mahasiswa">Mahasiswa</option>
                    <option value="admin">Admin</option>
                </select>
            </div>

            <div class="mb-3 text-end">
                <small>Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></small>
            </div>

            <button type="submit" class="btn btn-primary w-100">Login</button>
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
</body>
</html>

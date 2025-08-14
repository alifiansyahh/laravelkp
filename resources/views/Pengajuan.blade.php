<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengajuan Kerja Praktik</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: #f3f4f6;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .form-wrapper {
            background: white;
            padding: 2.5rem;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            max-width: 480px;
            width: 100%;
        }

        h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: #111827;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #374151;
        }

        input[type="text"],
        input[type="tel"],
        input[type="date"] {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 1rem;
            transition: border 0.3s;
        }

        input:focus {
            outline: none;
            border-color: #3b82f6;
        }

        button[type="submit"] {
            width: 100%;
            padding: 0.75rem;
            font-size: 1rem;
            font-weight: 600;
            background-color: #3b82f6;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #2563eb;
        }

        @media (max-width: 600px) {
            .form-wrapper {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="form-wrapper">
        <h2>Pengajuan Kerja Praktik</h2>
        <form action="{{ route('pengajuan.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="npm">NPM</label>
                <input type="text" id="npm" name="npm" required>
            </div>
            <div class="form-group">
                <label for="prodi">Program Studi</label>
                <input type="text" id="prodi" name="prodi" required>
            </div>
            <div class="form-group">
                <label for="hp">Nomor HP</label>
                <input type="tel" id="hp" name="hp" required pattern="[0-9]{10,15}" placeholder="08xxxxxxxxxx">
            </div>
            <div class="form-group">
                <label for="perusahaan">Perusahaan Tujuan</label>
                <input type="text" id="perusahaan" name="perusahaan" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat Perusahaan</label>
                <input type="text" id="alamat" name="alamat" required>
            </div>
            <div class="form-group">
                <label for="tanggal_pengajuan">Tanggal Pengajuan</label>
                <input type="date" id="tanggal_pengajuan" name="tanggal_pengajuan" required>
            </div>
            <button type="submit">Ajukan</button>
        </form>
    </div>

    @if (session('success'))
    <script>
        Swal.fire({
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 3000,
            timerProgressBar: true
        }).then(() => {
            window.location.href = "{{ route('tracking') }}";
        });
    </script>
    @endif
</body>
</html>

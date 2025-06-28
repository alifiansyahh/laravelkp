<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengajuan Kerja Praktik</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/pengajuan.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

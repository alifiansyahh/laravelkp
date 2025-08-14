<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Pengajuan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h3>Verifikasi Pengajuan</h3>
    <form method="POST" action="{{ route('pengajuan.verifikasi.store', $pengajuan->id) }}">
        @csrf

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" class="form-control" value="{{ $pengajuan->nama }}" disabled>
        </div>

        <div class="mb-3">
            <label>Nomor Surat</label>
            <input type="number" name="nomor_surat" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Setujui dan Simpan</button>
        <a href="{{ route('pengajuan.list') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>

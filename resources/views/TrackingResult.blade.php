<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Tracking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card p-4 shadow-sm">
        <h3 class="mb-4 text-center">Hasil Pengajuan</h3>

        <table class="table table-bordered">
            <tr>
                <th>Nama</th>
                <td>{{ $pengajuan->nama }}</td>
            </tr>
            <tr>
                <th>NPM</th>
                <td>{{ $pengajuan->npm }}</td>
            </tr>
            <tr>
                <th>Perusahaan</th>
                <td>{{ $pengajuan->perusahaan }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>
                    <strong class="text-{{ $pengajuan->status == 'disetujui' ? 'success' : 'warning' }}">
                        {{ ucfirst($pengajuan->status) }}
                    </strong>
                </td>
            </tr>
        </table>

        @if ($pengajuan->status == 'disetujui')
            <a href="{{ route('pengajuan.cetak', $pengajuan->id) }}" class="btn btn-success w-100 mt-3">Cetak Surat</a>
        @endif
    </div>
</div>
</body>
</html>

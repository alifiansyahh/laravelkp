<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tracking Surat KP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card p-4 shadow-sm">
        <h3 class="mb-4 text-center">Cek Status Pengajuan KP</h3>

        @if (session('status'))
            <div class="alert alert-info">
                {{ session('status') }}
            </div>
        @endif

        <form method="GET" action="{{ route('tracking.result') }}">
            <div class="mb-3">
                <label for="npm" class="form-label">Masukkan NPM Anda</label>
                <input type="text" name="npm" class="form-control" placeholder="Contoh: 2117051000" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Cek Status</button>
        </form>
    </div>
</div>
</body>
</html>

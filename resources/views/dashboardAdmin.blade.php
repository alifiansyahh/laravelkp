<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
    <div class="container dashboard-container">
        <div class="dashboard-box">
            <h2 class="text-center mb-4">Selamat Datang, Admin 👋</h2>

            @if (session('success'))
                <div class="alert alert-success animate__animated animate__fadeInDown">{{ session('success') }}</div>
            @endif

            <h5 class="mb-3">Daftar Pengajuan Mahasiswa</h5>

            <div class="table-responsive">
                <table class="table table-bordered table-hover table-light">
                    <thead class="table-primary">
                        <tr>
                            <th>Nama</th>
                            <th>NPM</th>
                            <th>Perusahaan</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pengajuans as $p)
                        <tr>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->npm }}</td>
                            <td>{{ $p->perusahaan }}</td>
                            <td>{{ $p->tanggal_pengajuan }}</td>
                            <td>
                                @if ($p->status == 'disetujui')
                                    <span class="badge bg-success">Disetujui</span>
                                @else
                                    <span class="badge bg-warning text-dark">Menunggu</span>
                                @endif
                            </td>
                            <td>
                                @if ($p->status !== 'disetujui')
                                <form action="{{ route('pengajuan.setujui', $p->id) }}" method="POST" onsubmit="return confirm('Setujui pengajuan ini?')">
                                    @csrf
                                    <button class="btn btn-sm btn-success">Setujui</button>
                                </form>
                                @else
                                    <button class="btn btn-sm btn-secondary" disabled>Sudah disetujui</button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('logout') }}" class="btn btn-outline-danger">Logout</a>
            </div>
        </div>
    </div>
</body>
</html>

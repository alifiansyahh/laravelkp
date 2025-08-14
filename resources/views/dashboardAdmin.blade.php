<!DOCTYPE html>
<html lang="id">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
    .pagination .page-link {
        color: #0d6efd;
    }
    .pagination .page-item.active .page-link {
        background-color: #0d6efd;
        border-color: #0d6efd;
        color: #fff;
    }
    </style>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f0f4f8;
        }

        .dashboard-container {
            margin-top: 50px;
        }

        .dashboard-box {
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .table thead {
            background-color: #007BFF;
            color: white;
        }

        .btn-primary {
            background-color: #0d6efd;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
        }

        .btn-outline-danger:hover {
            background-color: #dc3545;
            color: white;
        }

        .badge {
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <div class="container dashboard-container">
        <div class="dashboard-box">
            <h2 class="text-center mb-4 text-primary">👨‍💼 Dashboard Admin</h2>

            @if (session('success'))
                <div class="alert alert-success animate__animated animate__fadeInDown">{{ session('success') }}</div>
            @endif

            <h5 class="mb-3 fw-semibold">📄 Daftar Pengajuan Mahasiswa</h5>
            <form method="GET" action="{{ route('pengajuan.list') }}" class="row g-3 mb-4">
    <div class="col-md-9">
        <input type="text" name="search" class="form-control" placeholder="Cari nama atau NPM..." value="{{ request('search') }}">
    </div>
    <div class="col-md-3">
        <button type="submit" class="btn btn-primary w-100">
            <i class="fas fa-search me-1"></i> Cari
        </button>
    </div>
</form>


            <div class="table-responsive">
                <table class="table table-hover align-middle text-center">
                    <thead>
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
                                    <span class="badge bg-success"><i class="fas fa-check-circle me-1"></i>Disetujui</span>
                                @else
                                    <span class="badge bg-warning text-dark"><i class="fas fa-clock me-1"></i>Menunggu</span>
                                @endif
                            </td>
                            <td>
                                @if ($p->status !== 'disetujui')
                                <a href="{{ route('pengajuan.verifikasi', $p->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-check-circle me-1"></i> Verifikasi
                                </a>
                                @else
                                    <button class="btn btn-sm btn-secondary" disabled>
                                        <i class="fas fa-lock"></i> Sudah
                                    </button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center mt-4">
                {{ $pengajuans->withQueryString()->links() }}
                </div>

            </div>

            <div class="text-center mt-4">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

                <a href="#" class="btn btn-outline-danger px-4 py-2 fw-semibold"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt me-2"></i>Logout
                </a>
            </div>
        </div>
    </div>
</body>
</html>

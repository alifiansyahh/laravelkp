<!DOCTYPE html>
<html>
<head>
    <title>Data Pengajuan</title>
</head>
<body>
    <h2>Data Pengajuan Kerja Praktik</h2>
    <table border="1" cellpadding="8">
        <tr>
            <th>Nama</th>
            <th>NIM</th>
            <th>perusahaan</th>
            <th>alamat</th>
            <th>Tanggal</th>
        </tr>
        @foreach ($data as $p)
            <tr>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->nim }}</td>
                <td>{{ $p->perusahaan}}</td>
                <td>{{ $p->alamat}}</td>
                <td>{{ $p->tanggal_pengajuan }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Surat Pengajuan</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; }
        h2 { text-align: center; }
        .content { margin-top: 40px; }
    </style>
</head>
<body>
    <h2>SURAT PENGAJUAN KERJA PRAKTIK</h2>

    <div class="content">
        <p>Kepada Yth,</p>
        <p>Pimpinan {{ $pengajuan->perusahaan }}</p>
        <p>{{ $pengajuan->alamat }}</p>

        <p>Dengan hormat,</p>
        <p>Sehubungan dengan kegiatan perkuliahan program Teknik Informatika jenjang</p>
        <p>Strata satu S1 Fakultas Teknik Universitas sangga buana YPKP Bandung Akademik</p>
        <p>2024/2025, maka setiap mahasiswa diwajibkan untuk melakukan Kerja Praktek,besama ini</p>
        <p>kami mohon kesediaan Bapak/Ibu untuk memberi ijin melakukan Kerja Praktek pada tanggal</p>
        <p>{{$pengajuan->tanggal_pengajuan}} ditempat perusahaan yang Bapak/Ibu pimpin</p>
        <p>Adapun mahasiswa kami yang melakukan kerja praktek adalah:</p>

        <ul>
            <li>Nama: {{ $pengajuan->nama }}</li>
            <li>NIM: {{ $pengajuan->npm }}</li>
            <li>Program Studi: {{ $pengajuan->prodi }}</li>
        </ul>

    
        <p>Demikian surat ini kami sampaikan, atas perhatian dan kerjasamanya kami ucapkan terima kasih.</p>

        <br><br>
        <p>bandung</p>
        <p>ketua jurusan </p>
        <p>teknik informatika</p>
        <br><br>
        <p>Gunawan,ST.,M.Kom.,MOS.</p>
        <p>NIK : 432 200 126</p>
        <p>Tanggal Pengajuan: {{ \Carbon\Carbon::parse($pengajuan->tanggal_pengajuan)->translatedFormat('d F Y') }}</p>
    </div>
</body>
</html>

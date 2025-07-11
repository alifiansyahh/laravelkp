<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Permohonan Izin Kerja Praktik</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 14px;
            margin: 40px;
        }
        .header {
            text-align: center;
            border-bottom: 3px solid black;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }
        .logo {
            float: left;
            width: 80px;
        }
        .title {
            text-align: center;
        }
        .content {
            margin-top: 20px;
        }
        .tabel-mahasiswa {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        .tabel-mahasiswa th, .tabel-mahasiswa td {
            border: 1px solid #000;
            padding: 6px;
            text-align: center;
        }
        .signature {
            margin-top: 40px;
            float: right;
            text-align: left;
        }
        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }
        a {
            color: black;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="clearfix">
    <img src="{{ public_path('logo-ypkp.png') }}" class="logo">
    <div class="title">
        <h3>Yayasan Pendidikan Keuangan dan Perbankan</h3>
        <h2>UNIVERSITAS SANGGA BUANA</h2>
        <h3>Fakultas Teknik</h3>
        <p>Terakreditasi BAN-PT</p>
        <p>Jl. PHH. Mustofa No.68 Kota Bandung 40124</p>
        <p>Website: www.usbypkp.ac.id | Email: info@usbypkp.ac.id | Telp. (022) 720-9110</p>
    </div>
</div>

<hr style="border: 1.5px solid black;">

<div class="content">
    <table style="width: 100%; margin-bottom: 15px;">
        <tr>
            <td style="width: 20%;">Nomor</td>
            <td>: {{ str_pad($surat->nomor_surat, 3, '0', STR_PAD_LEFT) }}/R/USH YPKP/{{ date('m') }}/{{ date('Y') }}</td>

        </tr>
        <tr>
            <td>Lampiran</td>
            <td>: -</td>
        </tr>
        <tr>
            <td>Perihal</td>
            <td>: <strong>Surat Permohonan Izin Kerja Praktik</strong></td>
        </tr>
    </table>

    <p>Kepada Yth.</p>
    <p><strong>{{ $pengajuan->perusahaan }}</strong></p>
    <p>{{ $pengajuan->alamat }}</p>

    <p>Dengan hormat,</p>

    <p>
        Sehubungan dengan kegiatan perkuliahan program Studi Teknik Informatika jenjang Strata Satu (S1)
        Fakultas Teknik Universitas Sangga Buana (USB) YPKP Bandung Akademik 2024/2025, maka setiap mahasiswa
        diwajibkan untuk melakukan Kerja Praktik. Bersama ini kami mohon kesediaan Bapak/Ibu untuk memberikan izin
        melakukan Kerja Praktik pada tanggal
        {{ \Carbon\Carbon::parse($pengajuan->tanggal_pengajuan)->translatedFormat('d F Y') }} di tempat/perusahaan yang Bapak/Ibu pimpin.
    </p>

    <p>Adapun mahasiswa kami yang melakukan kerja praktik adalah:</p>

    <table class="tabel-mahasiswa">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Mahasiswa</th>
                <th>NPM</th>
                <th>No. Telepon</th>
                <th>Jurusan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>{{ $pengajuan->nama }}</td>
                <td>{{ $pengajuan->npm }}</td>
                <td>{{ $pengajuan->no_telp }}</td>
                <td>{{ $pengajuan->prodi }}</td>
            </tr>
        </tbody>
    </table>

    <p style="margin-top: 20px;">
        Demikian hal ini kami sampaikan. Atas perhatian dan kerja samanya diucapkan terima kasih.
    </p>

    <div class="signature">
        <p>Bandung, {{ \Carbon\Carbon::parse($pengajuan->tanggal_pengajuan)->translatedFormat('d F Y') }}</p>
        <p>Ketua Jurusan</p>
        <p>Teknik Informatika</p>
        <br><br><br>
        <p><strong>Gunawan, ST., M.Kom., MOS.</strong></p>
        <p>NIK: 432 200 126</p>
    </div> 
</div>

</body>
</html>

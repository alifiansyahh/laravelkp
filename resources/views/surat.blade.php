<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Surat Permohonan Izin Kerja Praktik</title>
  <style>
    @page {
      size: A4;
      margin: 2cm;
    }

    body {
      margin: 40px;
      font-family: 'Times New Roman', Times, serif;
      font-size: 13px;
    }

    .kop-surat {
      display: flex;
      align-items: flex-start; /* sejajarkan ke atas */
      border-bottom: 3px solid black;
      padding-bottom: 10px;
      margin-bottom: 20px;
    }

    .kop-logo {
      width: 90px;
      height: auto;
      margin-right: 15px;
    }

    .kop-text {
      display: flex;
      flex-direction: column;
      justify-content: flex-start;
      line-height: 1.4;
    }

    .kop-text span {
      display: block;
      white-space: nowrap;
    }

    .usb {
      color: #1a237e;
      font-weight: bold;
      font-size: 15px;
    }

    .universitas {
      color: #d32f2f;
      font-weight: bold;
      font-size: 20px;
      letter-spacing: 1.5px;
    }

    .fakultas {
      color: #1a237e;
      font-weight: bold;
      font-size: 15px;
    }

    .akreditasi {
      color: #000;
      font-size: 13px;
    }

    .ypkp {
      color: #1a237e;
      font-weight: bold;
      font-size: 15px;
    }
    /* === ISI SURAT === */
    .info-surat table {
      width: 100%;
      margin-bottom: 10px;
    }

    .info-surat td {
      vertical-align: top;
      padding: 2px 0;
    }

    .tabel-mahasiswa {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }

    .tabel-mahasiswa th,
    .tabel-mahasiswa td {
      border: 1px solid #000;
      padding: 5px;
      font-size: 12px;
      text-align: center;
    }

    .signature {
      width: 250px;
      text-align: left;
      float: right;
      margin-top: 20px;
    }

    .content p {
      margin: 6px 0;
    }
  </style>
</head>
<body>

<!-- === KOP SURAT === -->
<div class="kop-surat">
  <img src="{{ public_path('Ypkp-logo.png') }}" alt="Logo USB YPKP" class="kop-logo">

  <div class="kop-text">
    <span class="usb">USB</span>
    <span class="universitas">UNIVERSITAS SANGGA BUANA</span>
    <span class="fakultas">Fakultas Teknik</span>
    <span class="akreditasi">Terakreditasi BAN-PT</span>
    <span class="ypkp">YPKP</span>
  </div>
</div>

<!-- === ISI SURAT === -->
<div class="content">
  <div class="info-surat">
    <table>
      <tr>
        <td style="width: 22%;">Nomor</td>
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
  </div>

  <p>Dengan hormat,</p>

  <p>
    Sehubungan dengan kegiatan perkuliahan Program Studi Teknik Informatika jenjang Strata Satu (S1)
    Fakultas Teknik Universitas Sangga Buana (USB) YPKP Bandung tahun akademik 2024/2025, maka setiap mahasiswa
    diwajibkan untuk melaksanakan Kerja Praktik. Bersama surat ini kami mohon kesediaan Bapak/Ibu untuk memberikan
    izin pelaksanaan Kerja Praktik yang akan dilakukan pada tanggal
    <strong>{{ \Carbon\Carbon::parse($pengajuan->tanggal_pengajuan)->translatedFormat('d F Y') }}</strong>
    di perusahaan yang Bapak/Ibu pimpin.
  </p>

  <p>Adapun mahasiswa yang akan melaksanakan Kerja Praktik adalah sebagai berikut:</p>

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
        <td>{{ $pengajuan->hp }}</td>
        <td>{{ $pengajuan->prodi }}</td>
      </tr>
    </tbody>
  </table>

  <p>
    Demikian surat permohonan ini kami sampaikan. Atas perhatian dan kerja sama yang diberikan,
    kami ucapkan terima kasih.
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

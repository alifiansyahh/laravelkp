<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Input Tempat KP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">

    <div class="max-w-lg mx-auto bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-4">Input Tempat KP</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('inputkp.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block font-semibold mb-1">Nama Perusahaan</label>
                <input type="text" name="nama_perusahaan" class="w-full border px-3 py-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Alamat</label>
                <textarea name="alamat" class="w-full border px-3 py-2 rounded" required></textarea>
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Bidang Usaha</label>
                <input type="text" name="bidang_usaha" class="w-full border px-3 py-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Kontak</label>
                <input type="text" name="kontak" class="w-full border px-3 py-2 rounded">
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Telepon</label>
                <input type="text" name="telepon" class="w-full border px-3 py-2 rounded">
            </div>

            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                Simpan
            </button>
        </form>
    </div>

</body>
</html>

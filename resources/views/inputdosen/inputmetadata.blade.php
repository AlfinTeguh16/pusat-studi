<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Add Meta Data</title>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-md mx-auto bg-white p-8 rounded shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Add Meta Data</h2>
        <form action="{{ route('storeMetaData') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="nidn" value="{{ Auth::user()->nidn }}">
            <input type="hidden" name="nama" value="{{ Auth::user()->nama }}">
            {{-- <div class="mb-4">
                <label for="nama" class="block text-sm font-medium text-gray-600">Nama</label>
                <input type="text" name="nama" id="nama" class="mt-1 p-2 w-full border rounded-md">
            </div> --}}
            <div class="mb-4">
                <label for="judul" class="block text-sm font-medium text-gray-600">Judul</label>
                <input type="text" name="judul" id="judul" class="mt-1 p-2 w-full border rounded-md">
            </div>
            <div class="mb-4">
                <label for="gambar" class="block text-sm font-medium text-gray-600">Gambar</label>
                <input type="file" name="gambar" id="gambar" accept="image/*" class="mt-1 p-2 w-full border rounded-md">
            </div>
            <div class="mb-4">
                <label for="deskripsi" class="block text-sm font-medium text-gray-600">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="4" class="mt-1 p-2 w-full border rounded-md"></textarea>
            </div>
            <div class="mb-4">
                <label for="3d_objek" class="block text-sm font-medium text-gray-600">3D Objek</label>
                <input type="text" name="3d_objek" id="3d_objek" class="mt-1 p-2 w-full border rounded-md">
            </div>
            <div class="mb-4">
                <label for="nama_benda" class="block text-sm font-medium text-gray-600">Nama Benda</label>
                <input type="text" name="nama_benda" id="nama_benda" class="mt-1 p-2 w-full border rounded-md">
            </div>
            <div class="mb-4">
                <label for="tahun_pembuatan" class="block text-sm font-medium text-gray-600">Tahun Pembuatan</label>
                <input type="date" name="tahun_pembuatan" id="tahun_pembuatan" class="mt-1 p-2 w-full border rounded-md">
            </div>
            <div class="mb-4">
                <label for="periode_pembuatan_awal" class="block text-sm font-medium text-gray-600">Periode Pembuatan Awal</label>
                <input type="date" name="periode_pembuatan_awal" id="periode_pembuatan_awal" class="mt-1 p-2 w-full border rounded-md">
            </div>
            <div class="mb-4">
                <label for="periode_pembuatan_akhir" class="block text-sm font-medium text-gray-600">Periode Pembuatan Akhir</label>
                <input type="date" name="periode_pembuatan_akhir" id="periode_pembuatan_akhir" class="mt-1 p-2 w-full border rounded-md">
            </div>
            <div class="mb-4">
                <label for="provinsi" class="block text-sm font-medium text-gray-600">Provinsi</label>
                <input type="text" name="provinsi" id="provinsi" class="mt-1 p-2 w-full border rounded-md">
            </div>
            <div class="mb-4">
                <label for="kabupaten" class="block text-sm font-medium text-gray-600">Kabupaten</label>
                <input type="text" name="kabupaten" id="kabupaten" class="mt-1 p-2 w-full border rounded-md">
            </div>
            <div class="mb-4">
                <label for="kecamatan" class="block text-sm font-medium text-gray-600">Kecamatan</label>
                <input type="text" name="kecamatan" id="kecamatan" class="mt-1 p-2 w-full border rounded-md">
            </div>
            <div class="mb-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>

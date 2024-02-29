<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Edit Meta Data</title>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-md mx-auto bg-white p-8 rounded shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Edit Meta Data</h2>
        <form action="{{ route('editMetaData', ['id' => $metaData->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="nidn" value="{{ Auth::user()->nidn }}">
            <input type="hidden" name="nama" value="{{ Auth::user()->nama }}">

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

            <div>
                <div>
                  <div class="grid min-h-[140px] w-full place-items-center overflow-x-scroll rounded-lg p-6 lg:overflow-visible">
                    <div class="flex divide-x divide-gray-800 row">
                      <button id="button_3d"
                              class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg bg-gray-900 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none rounded-r-none border-r-0"
                              type="button" onclick="showForm('model_3d')">
                        3d Model
                      </button>
                      <button id="button_video"
                              class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg bg-gray-900 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none rounded-r-none border-r-0 rounded-l-none"
                              type="button" onclick="showForm('video')">
                        Video
                      </button>
                      <button id="button_link"
                              class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg bg-gray-900 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none rounded-l-none"
                              type="button" onclick="showForm('link')">
                        URL Lain
                      </button>
                    </div>
                  </div>
                </div>
                <div id="formContainer">

                  <div class="mb-4" id="model_3d_form" style="display: none;">
                    <label for="model_3d" class="block text-sm font-medium text-gray-600">3D Model</label>
                    <input type="text" name="model_3d" id="model_3d" class="mt-1 p-2 w-full border rounded-md">
                  </div>

                  <div class="mb-4" id="video_form" style="display: none;">
                    <label for="video" class="block text-sm font-medium text-gray-600">Video</label>
                    <input type="file" name="video" id="video" accept="video/*" class="mt-1 p-2 w-full border rounded-md">
                  </div>

                  <div class="mb-4" id="link_form" style="display: none;">
                    <label for="link" class="block text-sm font-medium text-gray-600">URL Lain</label>
                    <input type="text" name="link" id="link" class="mt-1 p-2 w-full border rounded-md">
                  </div>

                </div>
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


    <script>
        function showForm(formId) {
          // Menyembunyikan semua formulir
          document.getElementById('model_3d_form').style.display = 'none';
          document.getElementById('video_form').style.display = 'none';
          document.getElementById('link_form').style.display = 'none';

          // Menampilkan formulir yang sesuai dengan tombol yang diklik
          document.getElementById(formId + '_form').style.display = 'block';
        }
      </script>
</body>
</html>

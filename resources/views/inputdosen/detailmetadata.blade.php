
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Detail Meta Data</title>

    <script type="text/javascript" src="https://static.sketchfab.com/api/sketchfab-viewer-1.12.1.js"></script>
</head>
<body class="bg-red-100">
    <section class="flex  flex-col items-center justify-center w-full px-4 py-8 space-y-8 bg-gray-00 rounded-md border-gray-200 shadow-md">
        <div class="max-w-4xl w-full">
            <div class="text-center">
                <a href="{{ url('/metadata') }}" class="inline-block px-6 py-3 text-lg font-semibold text-white bg-red-500 rounded hover:bg-red-700 focus:outline-none focus:ring focus:ring-red-300">
                    Kembali
                </a>
            </div>

            <h2 class="text-3xl font-bold text-center">{{ $metaData->judul }}</h2>
            <h2 class="text-xl text-center">{{ $metaData->nidn }}</h2>
            <h2 class="text-xl text-center">{{ $metaData->nama }}</h2>

            @if($metaData->gambar)
            <img src="{{ asset('storage/' . $metaData->gambar) }}" alt="Gambar Metadata" class="w-full max-w-full mx-auto mb-4 rounded-lg shadow-lg">
            @else
            <p class="text-gray-500 text-center">Tidak ada gambar tersedia</p>
            @endif

            <h2 class="text-2xl font-bold">{{ $metaData->deskripsi }}</h2>

            <div id="sketchfab-viewer" class="mb-8 border rounded-lg overflow-hidden"></div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="p-4 bg-white rounded-lg shadow-md">
                    <h2 class="text-xl font-bold mb-2">Nama Benda: {{ $metaData->nama_benda }}</h2>
                    <h2 class="text-xl mb-2">Tahun Pembuatan: {{ $metaData->tahun_pembuatan }}</h2>
                    <h2 class="text-xl mb-2">Periode Pembuatan Awal: {{ $metaData->periode_pembuatan_awal }}</h2>
                    <h2 class="text-xl mb-2">Periode Pembuatan Akhir: {{ $metaData->periode_pembuatan_akhir }}</h2>
                </div>
                <div class="p-4 bg-white rounded-lg shadow-md">
                    <h2 class="text-xl font-bold mb-2">Provinsi: {{ $metaData->provinsi }}</h2>
                    <h2 class="text-xl mb-2">Kabupaten: {{ $metaData->kabupaten }}</h2>
                    <h2 class="text-xl mb-2">Kecamatan: {{ $metaData->kecamatan }}</h2>
                </div>
            </div>
        </div>

    </section>
    <footer class="bg-gray-800 text-white py-12">
        <div class="container mx-auto flex flex-col md:flex-row items-center justify-center">
            <div class="md:w-1/3 text-center md:text-left mb-4 md:mb-0">
                <h3 class="text-xl font-semibold">Tentang Kami</h3>
                <p class="mt-2">Kami adalah perusahaan yang bergerak di bidang teknologi informasi yang berkomitmen untuk memberikan solusi terbaik bagi pelanggan kami.</p>
            </div>
            <div class="md:w-1/3 text-center mb-4 md:mb-0">
                <h3 class="text-xl font-semibold">Hubungi Kami</h3>
                <p class="mt-2">Alamat: Jl. Contoh No. 123, Kota, Negara<br>
                Email: info@contoh.com<br>
                Telepon: (123) 456-7890</p>
            </div>
            <div class="md:w-1/3 text-center md:text-right">
                <h3 class="text-xl font-semibold">Ikuti Kami</h3>
                <div class="mt-2 flex justify-center md:justify-end">
                    <a href="#" class="mr-4"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="mr-4"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="mr-4"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="mr-4"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
        </div>
        {{-- <div class="mt-8 text-center">
            <p>&copy; 2024 Contoh Perusahaan. All Rights Reserved.</p>
        </div> --}}
    </footer>




<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        var viewerContainer = document.getElementById('sketchfab-viewer');
        var uid = '{{ $metaData->model_3d }}';

        var iframe = document.createElement('iframe');
        iframe.src = '';
        iframe.allow = 'autoplay; fullscreen; vr';
        iframe.setAttribute('xr-spatial-tracking', true);
        iframe.setAttribute('execution-while-out-of-viewport', true);
        iframe.setAttribute('execution-while-not-rendered', true);
        iframe.setAttribute('web-share', true);
        iframe.setAttribute('allowfullscreen', true);
        iframe.setAttribute('mozallowfullscreen', true);
        iframe.setAttribute('webkitallowfullscreen', true);

        viewerContainer.appendChild(iframe);

        var client = new Sketchfab(iframe);

        client.init(uid, {
            success: function onSuccess(api) {
                api.start();
                api.addEventListener('viewerready', function () {
                    // API is ready to use
                    // Insert your code here
                    console.log('Viewer is ready');
                });
            },
            error: function onError() {
                console.log('Viewer error');
            }
        });
    });
</script>

</body>
</html>

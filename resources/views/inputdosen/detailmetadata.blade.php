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
<body>

    <section class="flex flex-col w-auto p-3 space-y-4 border rounded-sm border-slate-200">
        <div class="mt-4">
            <a href="{{ url('/metadata') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                Kembali
            </a>
        </div>

        <h2 class="text-3xl font-bold mb-4">{{ $metaData->judul }}</h2>
        <h2 class="text-xl mb-2">{{ $metaData->nidn }}</h2>
        <h2 class="text-xl mb-2">{{ $metaData->nama }}</h2>

        @if($metaData->gambar)
        <img src="{{ asset('storage/' . $metaData->gambar) }}" alt="Gambar Metadata" class="max-w-80 mb-4 rounded-lg shadow-lg">
        @else
        <p class="text-gray-500">Tidak ada gambar tersedia</p>
        @endif

        <h2 class="text-2xl font-bold mb-4">{{ $metaData->deskripsi }}</h2>

        <div id="sketchfab-viewer" class="mb-8 border rounded-lg overflow-hidden"></div>

        <div class="grid grid-cols-2 gap-4">

            <div>
                <h2 class="text-xl mb-2">Nama Benda : {{ $metaData->nama_benda }}</h2>
                <h2 class="text-xl mb-2">Tahun Pembuatan : {{ $metaData->tahun_pembuatan }}</h2>
                <h2 class="text-xl mb-2">Periode Pembuatan Awal : {{ $metaData->periode_pembuatan_awal }}</h2>
                <h2 class="text-xl mb-2">Periode Pembuatan Akhir : {{ $metaData->periode_pembuatan_akhir }}</h2>
            </div>

            <div>
                <h2 class="text-xl mb-2">Provinsi : {{ $metaData->provinsi }}</h2>
                <h2 class="text-xl mb-2">Kabupaten : {{ $metaData->kabupaten }}</h2>
                <h2 class="text-xl mb-2">Kecamatan : {{ $metaData->kecamatan }}</h2>
            </div>

        </div>

    </section>


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

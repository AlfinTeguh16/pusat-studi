@extends('inputdosen.master')
@section('judul')
    Detail Meta Data
@endsection

@section('script')

@endsection

@section('style')

@endsection

@section('content')
<button data-drawer-target="cta-button-sidebar" data-drawer-toggle="cta-button-sidebar" aria-controls="cta-button-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
    <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
 </button>
<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <div class="container">
            <a href="{{ url('/dashboard') }}" class="btn-back">
                <i class="ph ph-arrow-left"></i>
            </a>
        </div>
        <section class="flex  flex-col items-center justify-center w-full px-4 py-8 space-y-8 bg-gray-00 rounded-md border-gray-200 shadow-md">
            <div class="max-w-4xl w-full">

                <h2 class="text-3xl font-bold text-center">{{ $metaData->judul }}</h2>
                <h2 class="text-xl text-center">{{ $metaData->nidn }}</h2>
                <h2 class="text-xl text-center">{{ $metaData->nama }}</h2>

                @if($metaData->gambar)
                <img src="{{ asset('storage/' . $metaData->gambar) }}" alt="Gambar Metadata" class="w-full max-w-full mx-auto mb-4 rounded-lg shadow-lg">
                @else
                <p class="text-gray-500 text-center">Tidak ada gambar tersedia</p>
                @endif
                <h2 class="text-2xl font-bold">{{ $metaData->deskripsi }}</h2>

                @if ($metaData->video)
                <video width="320" height="240" controls>
                    <source src="{{ asset('storage/' . $metaData->video) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                @endif

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
    </div>
 </div>

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
@endsection

@extends('inputdosen.master')
@section('judul')
    Detail Meta Data
@endsection


@section('style')
<style>.container {
    position: relative;
}
.btn-back {
    display: inline-block;
    padding: 10px 30px;
    font-size: 16px;
    font-weight: bold;
    text-decoration: none;
    color: white;
    background-color: rgb(101, 93, 93);
    border-radius: 5px;
    transition: background-color 0.3s ease;
    position: absolute;
    top: 10px; /* Atur jarak dari atas */
    left: 10px; /* Atur jarak dari kiri */
}
.btn-back:hover {
    background-color: darkred;
}

</style>

<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }

    .sidebar {
        height: 100%;
        width: 250px;
        position: fixed;
        top: 0;
        left: 0;
        background-color: #333;
        padding-top: 20px;
    }

    .sidebar a {
        padding: 10px 20px;
        text-decoration: none;
        font-size: 20px;
        color: white;
        display: block;
    }

    .sidebar a:hover {
        background-color: #555;
    }

    .content {
        margin-left: 250px;
        padding: 20px;
    }
</style>
<style>
    #sketchfab-viewer iframe {
        width: 320px;
        height: 175px;
    }
</style>
@endsection

@section('content')

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

                <div class="border rounded-lg overflow-hidden shadow-lg">
                    @if($metaData->gambar)
                        <img src="{{ asset('storage/' . $metaData->gambar) }}" class="w-full max-w-full mx-auto mb-4 rounded-lg">

                    @endif
                </div>

                <form>
                    <textarea class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" rows="5">{{ $metaData->deskripsi }}</textarea>
                </form>


                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="mb-8 border overflow-hidden">
                        <div id="sketchfab-viewer" class="flex justify-center items-center h-full"></div>
                    </div>

                    @if ($metaData->video)
                    <div class="mb-8 border overflow-hidden flex justify-center items-center">
                        <video width="320" height="240" controls>
                            <source src="{{ asset('storage/' . $metaData->video) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    @endif
                </div>

                <div class="mb-8 border overflow-hidden">
                    <div class="text-center">
                        @if($metaData->link)
                            <a href="{{ $metaData->link }}" class="flex items-center justify-center text-blue-500 hover:text-blue-700 transition-colors duration-300">
                                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                                <span class="border-b border-gray-500">Tautan ke Situs</span>
                            </a>
                        @endif
                    </div>
                </div>



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

 @if($metaData->model_3d !== null)
 <div id="sketchfab-viewer" class="mb-8 border rounded-lg overflow-hidden"></div>

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
 @endif
@endsection

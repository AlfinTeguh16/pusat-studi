@extends('home.master')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
    <title>Detail Event</title>
</head>

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
        width: 100%;
        height: 500px;
    }
</style>
@endsection

@section('content')

<div class="p-4 ">
    <div class="">
        <div class="p-4 ">
            <a href="{{ url('/product')}}" class="p-2 bg-slate-300 hover:bg-slate-700 rounded-md font-medium hover:text-white delay-150"><i class="ph-bold ph-caret-left"></i>  Kembali</a>
        </div>

        <section class="border rounded border-solid border-gray-200 bg-gray-100 shadow-lg p-4 sm:w-3/5 mx-auto">
            <h1 class="text-2xl font-bold mb-4">{{ $event->judul }}</h1>

            <div id="productContainer" class="flex flex-col w-full">
                @foreach($eventItems as $data)
                    <div class="mb-4">
                        <label class="font-semibold">{{ ucwords(str_replace('_', ' ', $data->label)) }}</label>
                        <div class="mt-2">
                            @if($data->jenis == 'imageTitle')
                                <img src="{{ asset($data->content) }}" alt="preview" class="w-full h-auto object-cover">
                            @elseif($data->jenis == 'videoTitle')
                                <video controls class="w-full h-auto object-cover">
                                    <source src="{{ asset($data->content) }}" type="video/mp4">
                                </video>
                            @elseif($data->jenis == 'link')
                                <a href="{{ $data->content }}" class="flex items-center justify-center p-2 bg-blue-500 hover:bg-blue-700 hover:shadow-lg rounded-lg text-white transition-colors duration-300">
                                    <span class="border-b border-gray-500">Kunjungi URL</span>
                                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            @else
                                <p>{{ $data->content }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- <section class="flex  flex-col items-center justify-center w-full px-4 py-8 space-y-8 bg-gray-00 rounded-md border-gray-200 shadow-md">
            <div class="max-w-4xl w-full">

                <h2 class="text-3xl font-bold text-center">{{ $karya->judul }}</h2>
                <h2 class="text-xl text-center">{{ $metaData->nidn }}</h2>
                <h2 class="text-xl text-center">{{ $metaData->nama }}</h2>

                <div class=" overflow-hidden  w-full mb-4">
                    @if($metaData->gambar)
                        <img src="{{ asset('storage/' . $metaData->gambar) }}" class="shadow-lg border w-full  mx-auto rounded-lg">

                    @endif
                </div>

                <div class="px-4">
                    <p class="text-justify">{{ $metaData->deskripsi }}</p>
                </div>

                @if($metaData->model_3d !== null)
                    <h1 class="font-bold">Model 3D</h1>
                    <div id="sketchfab-viewer" class="mb-4 border h-full rounded-lg overflow-hidden"></div>

                    <script type="text/javascript">
                        document.addEventListener("DOMContentLoaded", function () {
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

                @if ($metaData->video !== null)
                <h1 class="font-bold">Video</h1>
                    <div class="mb-8 border rounded-lg overflow-hidden flex justify-center items-center">
                        <video width="100%" height="500px" controls>
                            <source src="{{ asset('storage/' . $metaData->video) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                @endif

                @if ($metaData->link !== null)
                    <a href="{{ $metaData->link }}" class="flex items-center justify-center p-2 bg-blue-500 hover:bg-blue-700 hover:shadow-lg rounded-lg text-white transition-colors duration-300">
                        <span class="border-b border-gray-500">Tautan ke Situs</span>
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                @endif

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
                    <div class="p-4 bg-white rounded-lg shadow-md">
                        <h2 class="text-xl mb-2">Nama Benda: {{ $metaData->nama_benda }}</h2>
                        <h2 class="text-xl mb-2">Tahun Pembuatan: {{ $metaData->tahun_pembuatan }}</h2>

                        <h2 class="text-xl mb-2">Periode Pembuatan Awal: {{ $metaData->periode_pembuatan_awal }}</h2>
                        <h2 class="text-xl mb-2">Periode Pembuatan Akhir: {{ $metaData->periode_pembuatan_akhir }}</h2>
                    </div>
                    <div class="p-4 bg-white rounded-lg shadow-md">
                        <h2 class="text-xl mb-2">Provinsi: {{ $metaData->provinsi }}</h2>
                        <h2 class="text-xl mb-2">Kabupaten: {{ $metaData->kabupaten }}</h2>
                        <h2 class="text-xl mb-2">Kecamatan: {{ $metaData->kecamatan }}</h2>
                    </div>
                </div>
            </div>

        </section> --}}
    </div>
 </div>

@endsection

@extends('users.master')

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Meta Data</title>
</head>

@section('style')

<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }

    .container {
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

@endsection

@section('content')

<div class="p-4 sm:ml-64">
    <div class="">
        <div class="p-4 ">
            <a href="{{ url('/metadata')}}" class="p-2 bg-slate-300 hover:bg-slate-700 rounded-md font-medium hover:text-white delay-150"><i class="ph-bold ph-caret-left"></i>  Kembali</a>
        </div>

        <section class="border rounded border-solid border-gray-200 bg-gray-100 shadow-lg p-4 sm:w-3/5 mx-auto">
            <h1 class="text-2xl font-bold mb-4">{{ $karya->judul }}</h1>
            {{-- <h1 class="text-2xl font-bold mb-4">{{ $username->username }}</h1> --}}

            <div id="metaDataContainer" class="flex flex-col w-full">
                @foreach($metadata as $data)
                    <div class="mb-4">
                        <label class="font-semibold">{{ ucwords(str_replace('_', ' ', $data->label)) }}</label>
                        <div class="mt-2">
                            @if($data->jenis == 'imageTitle')
                                <img src="{{ asset($data->content) }}" alt="preview" class="w-full h-auto object-cover">
                            @elseif($data->jenis == 'videoTitle')
                                <video controls class="w-full h-auto object-cover">
                                    <source src="{{ asset($data->content) }}" type="video/mp4">
                                </video>
                            @elseif($data->jenis == 'model_3d')
                                <div id="sketchfab-viewer" class="mb-4 border h-full w-full rounded-lg overflow-hidden"></div>
                                <script type="text/javascript">
                                    document.addEventListener("DOMContentLoaded", function () {
                                        var viewerContainer = document.getElementById('sketchfab-viewer');
                                        var uid = '{{ $data->content }}';

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
                                        
                                        iframe.classList.add('aspect-video', 'w-full');
                                        
                                        viewerContainer.appendChild(iframe);

                                        var client = new Sketchfab(iframe);

                                        client.init(uid, {
                                            success: function onSuccess(api) {
                                                api.start();
                                                api.addEventListener('viewerready', function () {
                                                });
                                            },
                                            error: function onError() {
                                                console.log('Viewer error');
                                            }
                                        });
                                    });
                                </script>
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

    </div>
 </div>



@endsection

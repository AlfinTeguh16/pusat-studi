{{-- @extends('master') --}}
<head>
    @vite('resources/css/app.css')
    <title>User Meta Data</title>
</head>

@foreach($metaData as $data)
<section class=" flex flex-auto max-w-full">

    <div class="flex m-3 border rounded-lg border-slate-800 bg-slate-500 w-full h-32 p-4 transition-transform transform hover:scale-105">
        <a href="{{ route('metadata.view', $data->id) }}" class="flex flex-col justify-between w-full">

            <div class="mb-2 flex">
                <h2 class="text-white text-lg font-semibold">{{ $data->judul }}</h2>
            </div>

            <div class="flex flex-col items-start text-white">
                <p class="text-sm">{{ $data->tahun_pembuatan }}</p>
                <p class="text-sm">{{ $data->nama }}</p>
            </div>

        </a>
    </div>
</section>
@endforeach

{{-- @extends('master') --}}
<head>
    @vite('resources/css/app.css')
    <title>User Meta Data</title>
</head>

@foreach($metaData as $data)
    <div class="border rounded-lg border-slate-800 bg-slate-500 w-40 h-40 p-4 transition-transform transform hover:scale-105">
        <a href="{{ route('metadata.view', $data->id) }}" class="flex flex-col justify-between h-full">

            <div class="mb-2">
                <h2 class="text-white text-lg font-semibold">{{ $data->judul }}</h2>
            </div>

            <div class="flex flex-col items-start text-white">
                <p class="text-sm">{{ $data->tahun_pembuatan }}</p>
                <p class="text-sm">{{ $data->nama }}</p>
            </div>

        </a>
    </div>
@endforeach

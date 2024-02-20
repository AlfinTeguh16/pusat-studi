{{-- @extends('master') --}}
<head>
    @vite('resources/css/app.css')
    <title>User Meta Data</title>
</head>

<!-- Tampilkan daftar data -->
@foreach($metaData as $data)
    <!-- Card atau elemen tampilan lainnya -->
    <div class="border rounded-sm border-slate-800 bg-slate-500 w-40 h-40">
        <a href="{{ route('metadata.view', $data->id) }}">
            <div class="flex flex-col flex-wrap">
                <div>
                    <h2>{{ $data->judul }}</h2>
                </div>
                <div class="flex-col content-between">
                    <p>{{ $data->tahun_pembuatan }}</p>
                    <p>{{ $data->nama }}</p>
                </div>
            </div>

            <!-- Tambahkan elemen tampilan lainnya seperti gambar, deskripsi, dll. -->
        </a>
    </div>
@endforeach

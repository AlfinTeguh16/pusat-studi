@extends('inputdosen.master')
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
<body class="p-3">
    <h2>{{ $event->judul }}</h2>
    @if($event->gambar)
        <img src="{{ asset('storage/' . $event->gambar) }}" alt="Gambar events" class="w-full aspect-video mx-auto m-4 rounded-lg shadow-lg">
    @else
        <p class="text-gray-500 text-center">Tidak ada gambar tersedia</p>
    @endif

    <h2 class="">{{ $event->deskripsi }}</h2>

    @if($event->sub_gambar)
        <img src="{{ asset('storage/' . $event->sub_gambar) }}" alt="sub_Gambar events" class="w-full mx-auto m-4 rounded-lg shadow-lg">
    @else
        <p class="text-gray-500 text-center">Tidak ada sub_gambar tersedia</p>
    @endif

    <div>
        <p><i class="ph-fill ph-map-pin-line"></i> Tempat :
        <span>{{ $event->tempat }}</span></p>
    </div>
    <div>
        <p><i class="ph-fill ph-map-pin-line"></i> Mulai :
        <span>{{ $event->tanggal_selesai }}</span></p>
    </div>
    <div>
        <p><i class="ph-fill ph-map-pin-line"></i> Selesai :
        <span>{{ $event->tanggal_selesai }}</span></p>
    </div>
</body>
@endsection

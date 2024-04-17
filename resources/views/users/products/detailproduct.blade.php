@extends('users.master')
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
    <title>Detail Produk</title>
</head>
<body class="pr-3 sm:ml-64">

<section class="flex flex-col justify-start">
<div class="max-w-4xl flex flex-col justify-center mx-auto">

    <div class="p-4 ">
        <a href="{{ url('/product')}}" class="p-2 bg-slate-300 hover:bg-slate-700 rounded-md font-medium hover:text-white delay-150"><i class="ph-bold ph-caret-left"></i>  Kembali</a>
    </div>

   <div class=" font-bold flex justify-center p-4 w-full">
       <h2>{{ $product->judul }}</h2>
   </div>
   <div class="mx-auto my-5 p-4 rounded-lg sm:max-w-6xl flex justify-center items-center w-full">
        @if($product->gambar)
            <img src="{{ asset('storage/' . $product->gambar) }}" alt="Gambar Produk" class="aspect-video object-contain rounded-lg">
        @else
            <p class="text-gray-500 text-center">Tidak ada gambar tersedia</p>
        @endif
    </div>

    <div class="px-4">
        <p class="text-justify">{{ $product->deskripsi }}</p>
    </div>

    <div class="mx-auto my-5 p-4 rounded-lg sm:max-w-6xl flex justify-center items-center w-full">
        @if($product->sub_gambar)
        <img src="{{ asset('storage/' . $product->sub_gambar) }}" alt="sub_Gambar Produk" class="aspect-video object-contain rounded-lg ">
        @else
        <p class="text-gray-500 text-center">Tidak ada sub_gambar tersedia</p>
        @endif
    </div>

    <div class="flex justify-center align-middle p-2 mr-1font-semibold  w-full">
        <a href="{{ $product->link }}" class="flex flex-row justify-center items-center p-2  rounded-md bg-blue-500 hover:bg-blue-700 text-white ">
            <span class="flex font-semibold">Kunjungi Produk</span>
            <i class="ph-bold ph-caret-right"></i>
        </a>
    </div>
</div>
</section>
</body>
@endsection

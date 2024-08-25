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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Meta Data</title>

<style>
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
        top: 10px;
        left: 10px;
    }
    .btn-back:hover {
        background-color: darkred;
    }

</style>
</head>
<body>

<div class="mt-16 p-4">
    <div class="w-full flex flex-row items-center my-2">
        <form method="GET" action="{{ route('showMetaData') }}" class="flex items-center">
            <input type="text" name="query" placeholder="Cari Meta Data" class="flex justify-start rounded-md px-3 py-2">
            <button type="submit" class="flex bg-slate-400 hover:bg-slate-600 active:bg-slate-600 rounded-md py-3 px-3 mx-1">
                <i class="ph-bold ph-magnifying-glass"></i>
            </button>
            @if(request()->has('query'))
                <a href="{{ route('showMetaData') }}" class="flex bg-slate-400 hover:bg-slate-600 active:bg-slate-600 rounded-md py-3 px-3"><i class="ph-bold ph-arrow-counter-clockwise" ></i></a>
            @endif
        </form>
    </div>
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <div class="container py-2">
            <a href="{{ url('/') }}" class="btn-back">
                <i class="ph ph-arrow-left"></i>
            </a>
        </div>
        <section class="flex justify-center w-full mt-10">
            <div class="flex flex-row justify-evenly flex-wrap">
                @foreach($karyas as $data)
                    <div class="flex flex-col aspect-[4/3] max-w-72 border shadow-lg rounded-xl my-4 mx-4 bg-gray-100 hover:shadow-xl justify-center">
                        <a href="{{ route('viewMetaData', $data->id) }}">
                            <div class="overflow-hidden h-fit">
                                @if($data->imageTitle)
                                    <img src="{{ asset( $data->imageTitle) }}"
                                        class="object-cover rounded-t-lg h-48 w-96">
                                @endif
                            </div>
                            <h2 class="flex justify-center font-medium px-4 py-2">{{ $data->judul }}</h2>
                        </a>

                        <div class="w-full">
                            <div class="flex justify-end align-middle rounded-md p-2 font-semibold w-full">
                                <a href="{{ route('viewMetaData', $data->id) }}"
                                    class="flex flex-row bg-blue-500 hover:bg-blue-700 justify-center text-white items-center p-2 w-full rounded-md">
                                    <span class="flex font-semibold">Lihat</span>
                                    <i class="ph-bold ph-caret-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
</div>
<div class="flex justify-end m-4 ">
    {{ $karyas->appends(request()->query())->links() }}
</div>



</body>
</html>
@endsection

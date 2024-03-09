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
</head>
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
<body>
<div class="mt-16 p-4">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <div class="container">
            <a href="{{ url('/') }}" class="btn-back">
                <i class="ph ph-arrow-left"></i>
            </a>
        </div>
        <section class="flex flex-row flex-wrap justify-center mt-10">
            @foreach($metaData as $data)
            <div class="flex flex-col aspect-[4/3] max-w-72 border shadow-lg rounded-xl my-4 mx-2 bg-gray-100 hover:shadow-xl">
                <a href="{{ route('viewMetaData', $data->id) }}">

                        <div class=" overflow-hidden h-fit">
                            @if($data->gambar)
                                <img src="{{ asset('storage/' . $data->gambar) }}"
                                class=" object-cover rounded-t-lg h-48 w-96" >
                            @endif
                        </div>

                    <h2 class="flex justify-center font-medium px-4 py-2 " >{{ $data->judul }}</h2>
                </a>

                <div class="w-full">
                    <div class="flex justify-end align-middle rounded-md p-2 font-semibold  w-full">
                        <a href="{{ route('viewMetaData', $data->id) }}"
                            class="flex flex-row bg-sky-400 hover:bg-sky-600 justify-center items-center p-2 w-full rounded-md">
                            <span class="flex font-semibold">Lihat</span>
                            <i class="ph-bold ph-caret-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach

            </section>
    </div>

</div>


<div class="flex justify-end m-4 ">
    {{ $metaData->appends(request()->query())->links() }}
</div>


</body>
</html>
@endsection

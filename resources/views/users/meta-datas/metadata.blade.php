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
    <title>Meta Data</title>
</head>
<body class="p-3 sm:ml-64 sm:mt-16">
    <section class="flex w-full justify-end">
        <div class="flex justify-center align-middle rounded-md p-2 mr-1 bg-green-700 hover:bg-green-900 text-white font-semibold  w-fit">
            <a href="{{ route('viewStoreMetaData') }}" class="flex flex-row justify-center items-center">
                <i class="ph-bold ph-plus"></i>
                <span class="flex font-semibold">Buat Meta Data</span>
            </a>
        </div>
    </section>

    {{-- <div class="w-full flex flex-row items-center">
        <form method="GET" action="{{ route('searchMetaData') }}" class="flex items-center">
            <input type="text" name="query" placeholder="Cari Meta Data" class="flex justify-start rounded-md px-3 py-2">

            <button type="submit" class="flex bg-slate-400 hover:bg-slate-600 active:bg-slate-600 rounded-md py-3 px-3 mx-1">
                <i class="ph-bold ph-magnifying-glass"></i>
            </button>

            @if(request()->has('query'))
                <a href="{{ route('searchMetaData') }}" class="flex bg-slate-400 hover:bg-slate-600 active:bg-slate-600 rounded-md py-3 px-3"><i class="ph-bold ph-arrow-counter-clockwise"></i></a>
            @endif
        </form>
    </div> --}}


    <section id="showDataMetaData">
        <div>
            @php
            $metaDataFound = false;
            @endphp

            @foreach ($karyas as $data)
                @if ($data->users_id === Auth::user()->id)
                    @php
                    $metaDataFound = true;
                    @endphp
                    <div id="successCard" class="hidden bg-green-200 p-4 rounded-md shadow-md z-50">
                        <div class="flex justify-center align-middle">
                            <p class="text-green-800">Meta Data berhasil dihapus!</p>
                        </div>
                    </div>
                    <div class="w-full flex flex-row rounded-md bg-gray-200 p-3 my-2 hover:bg-gray-300 hover:duration-150 hover:shadow-xl">
                        <a href="{{ route('metadata.show', $data->id) }}">
                            <div class="flex justify-start flex-col">
                                <div class="flex">
                                    <h2 class="font-semibold">{{ $data->judul }}</h2>
                                </div>
                                <div class="flex">
                                    <p id="deskripsi" class="deskripsi">{{ $data->description }}</p>
                                </div>
                            </div>
                            <div class="flex justify-end w-full items-center">
                                <button class="rounded-md bg-sky-400 hover:bg-sky-600 py-2 px-3 mr-1"><i class="ph-bold ph-eye"></i></button>
                                <a href="{{ route('editMetaData', $data->id) }}" class="rounded-md bg-amber-400 hover:bg-amber-600 py-2 px-3 mr-1"><i class="ph-bold ph-pencil-simple-line"></i></a>
                                <form action="{{ route('deleteMetaData', $data->id) }}" method="post" onsubmit="return confirmAndShowCard('successCard')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="rounded-md bg-red-400 hover:bg-red-600 py-2 px-3">
                                        <i class="ph-bold ph-trash-simple"></i>
                                    </button>
                                </form>
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach

            {{-- Menampilkan pesan jika meta data tidak ditemukan --}}
            @if (!$metaDataFound)
                <div class="w-full flex flex-col rounded-md bg-gray-200 p-3 my-2 hover:bg-gray-300 hover:duration-150 hover:shadow-xl">
                    <p class="text-center text-red-500">Anda belum membuat Meta Data</p>
                </div>
            @endif
        </div>

        <div class="mt-4">
            {{ $karyas->appends(request()->query())->links() }}
        </div>
    </section>


    <script>
        // Ambil semua elemen dengan kelas "deskripsi"
        var deskripsiElements = document.querySelectorAll(".deskripsi");

        // Iterasi melalui setiap elemen dan potong teks jika lebih dari 20 karakter
        deskripsiElements.forEach(function (elem) {
            var deskripsiTeks = elem.textContent;

            if (deskripsiTeks.length > 20) {
                var potonganDeskripsi = deskripsiTeks.slice(0, 200);
                elem.textContent = potonganDeskripsi + "...";
            }
            // Jika kurang dari 20 karakter, biarkan teks asli tanpa ellipsis
        });
    </script>

<script>
    function confirmAndShowCard(cardId) {
        if (confirm('Yakin akan menghapus data?')) {
            // If user confirms, show the success card
            document.getElementById(cardId).classList.remove('hidden');
            return true; // Allow form submission
        } else {
            return false; // Prevent form submission
        }
    }
</script>

</body>

@endsection

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
    <title>Event</title>
</head>
<body class="p-3 sm:ml-64 sm:mt-16">
    <section class="flex w-full justify-end">
        <div class="flex justify-center align-middle rounded-md p-2 mr-1 bg-cyan-600 hover:bg-cyan-700 font-semibold text-white w-fit">
            <a href="{{ route('viewStoreEvent') }}" class="flex flex-row justify-center items-center">
                <i class="ph-bold ph-circles-three-plus"></i>
                <span class="flex font-semibold">Buat Event</span>
            </a>
        </div>
    </section>

    <div class="w-full flex flex-row items-center mb-4">
        <form method="GET" action="{{ route('searchEvent') }}" class="flex items-center">
            <input type="text" name="query" value="{{ request()->input('query') }}" placeholder="Cari Event" class="flex justify-start rounded-md px-3 py-2">
            <button type="submit" class="flex bg-slate-400 hover:bg-slate-600 active:bg-slate-600 rounded-md py-3 px-3 mx-1">
                <i class="ph-bold ph-magnifying-glass"></i>
            </button>

            @if(request()->has('query'))
                <a href="{{ route('searchEvent') }}" class="flex bg-slate-400 hover:bg-slate-600 active:bg-slate-600 rounded-md py-3 px-3">
                    <i class="ph-bold ph-arrow-counter-clockwise"></i>
                </a>
            @endif
        </form>
    </div>


    <section id="showDataEvents">
        <div>
            @php
            $eventFound = false;
            @endphp

            @foreach ($events as $data)
                @if ($data->users_id === Auth::user()->id)
                    @php
                    $eventFound = true;
                    @endphp
                    <div id="successCard" class="hidden bg-green-200 p-4 rounded-md shadow-md z-50">
                        <div class="flex justify-center align-middle">
                            <p class="text-green-800">Event berhasil dihapus!</p>
                        </div>
                    </div>
                    <div class="w-full flex flex-row rounded-md bg-gray-200 p-3 my-2 hover:bg-gray-300 hover:duration-150 hover:shadow-xl">
                        <a href="{{ route('event.show', $data->id) }}">
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
                                <a href="{{ route('event.edit', $data->id) }}" class="rounded-md bg-amber-400 hover:bg-amber-600 py-2 px-3 mr-1"><i class="ph-bold ph-pencil-simple-line"></i></a>
                                <form action="{{ route('deleteEvent', $data->id) }}" method="post" onsubmit="return confirmAndShowCard('successCard')">
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
            @if (!$eventFound)
                <div class="w-full flex flex-col rounded-md bg-gray-200 p-3 my-2 hover:bg-gray-300 hover:duration-150 hover:shadow-xl">
                    <p class="text-center text-red-500">Anda belum membuat Event</p>
                </div>
            @endif
        </div>

        <div class="mt-4">
            {{ $events->appends(request()->query())->links() }}
        </div>
    </section>


    <script>
        var deskripsiElements = document.querySelectorAll(".deskripsi");

        // potong teks deskripsi jika lebih dari 20 karakter
        deskripsiElements.forEach(function (elem) {
            var deskripsiTeks = elem.textContent;

            if (deskripsiTeks.length > 20) {
                var potonganDeskripsi = deskripsiTeks.slice(0, 200);
                elem.textContent = potonganDeskripsi + "...";
            }

        });
    </script>

<script>
    function confirmAndShowCard(cardId) {
        if (confirm('Yakin akan menghapus data?')) {
            document.getElementById(cardId).classList.remove('hidden');
            return true;
        } else {
            return false;
        }
    }
</script>

</body>

@endsection

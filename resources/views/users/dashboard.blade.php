@extends('users.master')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <title>Dashboard</title>
</head>
<body class="p-3 sm:ml-64">
    <section id="profileSection" class="w-full h-60 my-2">
        <div class="border rounded-md shadow-md border-gray-200 bg-white flex">
            <div class="flex align-middle justify-center p-3 max-h-40 max-w-40 aspect-square ">
                @if(Auth::user()->profile_picture)
                    <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Foto Profil Saat Ini" class="object-cover aspect-square rounded-sm">
                @else
                    <p>Foto Profil tidak tersedia</p>
                @endif
            </div>
            <div class="flex flex-col sm:flex-row w-full">
                <div class="flex flex-col sm:flex-row justify-start flex-wrap w-full basis-auto">
                    <div class="flex flex-col ">
                        <div class="flex m-2 font-bold ">
                            <h2>{{ Auth::user()->username }}</h2>
                        </div>
                        <div class="flex m-2">
                            <p>{{ Auth::user()->nidn }}</p>
                        </div>
                    </div>
                </div>
                <div class="flex sm:justify-end m-2 w-full">
                    {{ Auth::user()->email }}
                </div>
                <div class="flex basis-1/2 justify-end m-2 w-auto h-fit sm:w-40 sm:align-bottom">
                    <button onclick="openUpdateForm()" class="p-1 text-white rounded bg-red-500 hover:bg-red-800"><i class="ph-bold ph-user"></i>Ganti Profile</button>
                </div>
            </div>
        </div>
    </section>

    <div id="updateFormModal" class="fixed top-0 left-0 w-full h-full overflow-auto bg-black bg-opacity-50 hidden ">
        <div class="modal-content bg-white mx-auto my-20 p-8 border rounded-lg border-gray-800 w-1/2">
            <span class="close text-gray-700 float-right text-2xl font-bold cursor-pointer" onclick="closeUpdateForm()" >&times;</span>

            <form action="{{ route('updateProfile') }}" method="post" enctype="multipart/form-data"
                class="space-y-4">
                @csrf
                @method('patch')

                {{-- <label for="nidn" class="block mt-10">NIDN:</label> --}}
                <input type="hidden" name="nidn" value="{{ old('nidn', $user->nidn) }}"
                    class="w-full p-2 mt-2 mb-4 box-border  border-2 rounded-md">

                <label for="nama" class="block">Nama</label>
                <input type="text" name="username" value="{{ old('username', $user->username) }}"
                    class="w-full p-2 mt-2 mb-4 box-border border-2 rounded-md">

                <label for="email" class="block">Email</label>
                <input type="text" name="email" value="{{ old('email', $user->email) }}"
                    class="w-full p-2 mt-2 mb-4 box-border  border-2 rounded-md">

                <label for="profile_picture" class="block">Foto Profil</label>
                <input type="file" name="profile_picture" class="w-full p-2 mt-2 mb-4 box-border  border-2 rounded-md">

                <label for="password" class="block">Password</label>
                <input type="password" name="password" placeholder="Isi hanya jika ingin mengganti password"
                    class="w-full p-2 mt-2 mb-4 box-border  border-2 rounded-md">

                <label for="password_confirmation" class="block">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" placeholder="Ketik ulang password" class="w-full p-2 mt-2 mb-4 box-border  border-2 rounded-md">

                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white p-2 px-4 border-none rounded cursor-pointer w-full">
                    Perbarui Profil
                </button>
            </form>
        </div>
    </div>

    <section class="flex flex-row justify-end w-full mb-2 sm:mb-4">
        <div class="flex flex-row justify-end">
            <div class=" flex justify-center align-middle rounded-md p-2 mr-1 bg-green-700 hover:bg-green-900 font-semibold text-white w-fit">
                <a href="{{ route('viewStoreMetaData') }}" class="flex flex-row justify-center items-center">
                  <i class="ph-bold ph-plus"></i>
                  <span class="flex">Meta Data</span>
                </a>
              </div>
            <div class=" flex justify-center align-middle rounded-md p-2 mr-1 bg-amber-500 hover:bg-amber-600 font-semibold text-white w-fit">
                <a href="{{ route('viewStoreEvent') }}" class="flex flex-row justify-center items-center">
                  <i class="ph-bold ph-calendar-plus"></i>
                  <span class="flex">Event</span>
                </a>
              </div>
            <div class=" flex justify-center align-middle rounded-md p-2 mr-1 bg-cyan-600 hover:bg-cyan-700 font-semibold text-white w-fit">
                <a href="{{ route('viewStoreProduct') }}" class="flex flex-row justify-center items-center">
                  <i class="ph-bold ph-circles-three-plus"></i>
                  <span class="flex">Produk</span>
                </a>
              </div>
        </div>
    </section>


    <section id="metaDataSection" class="mx-2 p-2 border-2 border-dashed border-gray-100 bg-white  rounded-lg">
        <h2 class="flex align-middle my-1 basis-1/2 justify-between font-bold">Meta Data Anda <a href="{{ url('metadata') }}" class="px-2 py-1 text-white rounded-md bg-blue-500 hover:bg-blue-700 hover:duration-300"><i class="ph ph-caret-right"></i></a></h2>

        @php
        $dataFound = false;
        @endphp

        @foreach ($karyas as $data)
            @if ($data->users_id === Auth::user()->id)
                @php
                $dataFound = true;
                @endphp
                <div class="w-full flex flex-col rounded-md bg-gray-200 p-3 my-2 hover:bg-gray-300 hover:duration-150 hover:shadow-xl">
                    <a href="{{ route('metadata.show', $data->id) }}">
                        <div class="flex justify-start flex-col">
                            <div class="flex">
                                <h2 class="font-semibold">{{ $data->judul }}</h2>
                            </div>
                                <div class="flex">
                                    <p class="deskripsi">{{ $data->description }}</p>
                                </div>
                        </div>
                    </a>
                </div>
            @endif
        @endforeach

        @if (!$dataFound)
            <div class="w-full flex flex-col rounded-md bg-gray-200 p-3 my-2 hover:bg-gray-300 hover:duration-150 hover:shadow-xl">
                <p class="text-center text-red-500">Anda belum membuat Meta Data</p>
            </div>
        @endif
    </section>

    {{-- <section id="DataSection" class="flex flex-col sm:flex-row p-1">
        <div class=" flex flex-col border-2 m-1 border-dashed border-gray-100 p-2 rounded-lg sm:w-screen bg-white h-fit">
            <h2 class="flex align-middle my-1 basis-1/2 justify-between font-bold">Produk Anda <a href="{{ url('product') }}" class="px-2 py-1 max-h-8 text-white rounded-md bg-blue-500 hover:bg-blue-700 hover:duration-300"><i class="ph ph-caret-right"></i></a></h2>
            <div class="flex flex-col ">
                @php
                $dataFound = false;
                @endphp
                @foreach ($product as $data)
                    @if ($data->nidn === Auth::user()->nidn)
                        @php
                        $dataFound = true;
                        @endphp
                        <div class="w-full flex flex-col rounded-md bg-gray-200 p-3 my-1 hover:bg-gray-300 hover:duration-150 hover:shadow-xl">
                            <a href="{{ route('detailProduct', $data->id) }}">
                                <div class="flex justify-start flex-col">
                                    <div class="flex">
                                        <h2 class="font-semibold">{{ $data->judul }}</h2>
                                    </div>
                                    <div class="flex">
                                        <p id="deskripsi" class="deskripsi">{{ $data->deskripsi }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
                @endforeach

                @if (!$dataFound)
                    <div class="w-full flex flex-col rounded-md bg-gray-200 p-3 my-1 hover:bg-gray-300 hover:duration-150 hover:shadow-xl">
                        <p class="text-center text-red-500">Anda belum membuat Produk</p>
                    </div>
                @endif
            </div>
        </div>

        <div class="bg-white flex flex-col m-1 border-2 border-dashed border-gray-100 p-2 rounded-lg sm:w-screen h-fit">
            <div class="flex flex-col ">
                <h2 class="flex align-middle my-1 basis-1/2 justify-between font-bold">Event Anda <a href="{{ url('event') }}" class="px-2 py-1 max-h-8  text-white rounded-md bg-blue-500 hover:bg-blue-700 hover:duration-300"><i class="ph ph-caret-right"></i></a></h2>
                @php
                $dataFound = false;
                @endphp
                @foreach ($event as $data)
                    @if ($data->nidn === Auth::user()->nidn)
                        @php
                        $dataFound = true;
                        @endphp
                        <div class="w-full flex flex-col rounded-md bg-gray-200 p-3 m-1 hover:bg-gray-300 hover:duration-150 hover:shadow-xl">
                            <a href="{{ route('detailEvent', $data->id) }}">
                                <div class="flex justify-start flex-col">
                                    <div class="flex">
                                        <h2 class="font-semibold">{{ $data->judul }}</h2>
                                    </div>
                                    <div class="flex">
                                        <p id="deskripsi" class="deskripsi">{{ $data->deskripsi }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
                @endforeach

                @if (!$dataFound)
                    <div class="w-full flex flex-col rounded-md bg-gray-200 p-3 m-1 hover:bg-gray-300 hover:duration-150 hover:shadow-xl">
                        <p class="text-center text-red-500">Anda belum membuat Event</p>
                    </div>
                @endif
            </div>
        </div>
    </section> --}}





    <script>
        function openUpdateForm() {
            document.getElementById('updateFormModal').style.display = 'block';
        }

        function closeUpdateForm() {
            document.getElementById('updateFormModal').style.display = 'none';
        }
    </script>

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


</body>
</html>
@endsection

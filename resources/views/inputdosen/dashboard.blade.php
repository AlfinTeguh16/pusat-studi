@extends('home.master')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20,400,0,0" />
    <title>Dashboard</title>
</head>
<body class="px-3 bg-gray-50">
    <section id="profileSection" class="w-full h-60 my-2">
        <div class="border rounded-md shadow-md border-gray-200 bg-white flex">
            <div class="flex align-middle justify-center p-3 max-h-40 max-w-40">
                @if(Auth::user()->foto_profile)
                    <img src="{{ asset('storage/' . $user->foto_profile) }}" alt="Foto Profil Saat Ini" class="rounded-sm">
                @else
                    <p>Foto Profil tidak tersedia</p>
                @endif
            </div>
            <div class="flex w-full">
                <div class="flex flex-col justify-start w-full">
                    <div class="m-2 font-bold">
                        <h2>{{ Auth::user()->nama }}</h2>
                    </div>
                    <div class="m-2">
                        <p>{{ Auth::user()->nidn }}</p>
                    </div>
                </div>
                <div class="flex justify-end m-2">
                    {{ Auth::user()->email }}
                </div>
                <div class="flex justify-center align-middle m-2">
                    <button onclick="openUpdateForm()" class="p-1 text-white rounded bg-red-500 hover:bg-red-800">Ganti Profile</button>
                </div>
            </div>
        </div>
    </section>

    <div id="updateFormModal" class="fixed top-0 left-0 w-full h-full overflow-auto bg-black bg-opacity-50 hidden">
        <div class="modal-content bg-white mx-auto my-20 p-8 border border-gray-800 w-1/2">
            <span class="close text-gray-700 float-right text-2xl font-bold cursor-pointer" onclick="closeUpdateForm()" >&times;</span>

            <form action="{{ route('updateProfile') }}" method="post" enctype="multipart/form-data"
                class="space-y-4">
                @csrf
                @method('patch')

                <label for="nidn" class="block mt-10">NIDN:</label>
                <input type="text" name="nidn" value="{{ old('nidn', $user->nidn) }}" required
                    class="w-full p-2 mt-2 mb-4 box-border">

                <label for="nama" class="block">Nama:</label>
                <input type="text" name="nama" value="{{ old('nama', $user->nama) }}" required
                    class="w-full p-2 mt-2 mb-4 box-border">

                <label for="email" class="block">Email:</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                    class="w-full p-2 mt-2 mb-4 box-border">

                <label for="foto_profile" class="block">Foto Profil:</label>
                <input type="file" name="foto_profile" class="w-full p-2 mt-2 mb-4 box-border">

                <label for="password" class="block">Password:</label>
                <input type="password" name="password" placeholder="Isi hanya jika ingin mengganti password"
                    class="w-full p-2 mt-2 mb-4 box-border">

                <label for="password_confirmation" class="block">Konfirmasi Password:</label>
                <input type="password" name="password_confirmation" class="w-full p-2 mt-2 mb-4 box-border">

                <button type="submit" class="bg-green-500 text-white p-2 px-4 border-none rounded cursor-pointer hover:bg-green-600">
                    Perbarui Profil
                </button>
            </form>
        </div>
    </div>

    <section>
        <div class=" align-middle rounded-md p-2 bg-green-700 after:bg-green-900 font-semibold text-white w-fit">
            <a href="{{ route('viewStoreMetaData') }}">
                {{-- <span class="font-bold text-2xl">+</span> --}}
                Tambah Meta Data
            </a>
        </div>
    </section>

    <section id="metaDataSection">
        @foreach ($metaData as $data)
            @if ($data->nidn === Auth::user()->nidn) {{-- Menampilkan hanya data dari user yang sedang login --}}
                <div class="w-full flex flex-col rounded-md bg-gray-200 p-3 my-2 hover:bg-gray-400">
                    <a href="{{ route('userMetaData', $data->id) }}">
                        <div class="flex justify-start flex-col">
                            <div class="flex">
                                <h2 class="font-semibold">{{ $data->judul }}</h2>
                            </div>
                            <div class="flex">
                                <p id="deskripsi" class="deskripsi">{{ $data->deskripsi }}</p>
                            </div>
                        </div>
                        <div class="flex justify-end w-full">
                            <button class="p-2 rounded-md bg-red-400 hover:bg-red-600"><span class="material-symbols-outlined">chevron_right</span></button>
                        </div>
                    </a>
                </div>
            @endif
        @endforeach
    </section>



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
                var potonganDeskripsi = deskripsiTeks.slice(0, 300);
                elem.textContent = potonganDeskripsi + "...";
            }
            // Jika kurang dari 20 karakter, biarkan teks asli tanpa ellipsis
        });
    </script>


</body>
</html>

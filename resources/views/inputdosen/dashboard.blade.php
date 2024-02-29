{{-- @extends('master') --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Dashboard</title>
</head>
<body class="px-3 bg-gray-50">
    <section id="profileSection" class="w-full h-60 my-2">
        <div class="border rounded-md shadow-md border-gray-200 bg-white flex">
            <div class="flex align-middle justify-center p-3">
                @if(Auth::user()->foto_profile)
                    <img src="{{ asset('storage/' . $user->foto_profile) }}" alt="Foto Profil Saat Ini">
                @else
                    <p>Foto Profil tidak tersedia</p>
                @endif
            </div>
            <div class="flex w-full">
                <div class="flex flex-col justify-start w-full">
                    <div class="m-2 font-bold">
                        {{-- nama --}}
                        <h2>{{ Auth::user()->nama }}</h2>
                    </div>
                    <div class="m-2">
                        {{-- nidn --}}
                        <p>{{ Auth::user()->nidn }}</p>
                    </div>
                </div>
                <div class="flex justify-end m-2">
                    {{-- email --}}
                    {{ Auth::user()->email }}
                </div>
                <div class="flex justify-center align-middle m-2">
                    {{-- button ganti profile --}}
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
        <div>
            <button class=" justify-items-center rounded-md p-2 bg-green-700 after:bg-green-900 font-semibold text-white "><span class="material-symbols-outlined">add</span>Tambah Meta Data</button>
        </div>
    </section>

    <section id="metaDataSection">
        @foreach ($metaData as $data)
        <div class="w-full flex flex-row rounded-md bg-gray-200 p-3 my-2 hover:bg-gray-400">
            <a href="{{ route('userMetaData', $data->id) }}">
            <div class="flex justify-start flex-col w-full">
                <div class="flex">
                    <h2 class="font-semibold">{{ $data->judul }}</h2>
                </div>
                <div>
                    <p id="deskripsi">{{ $data->deskripsi }}</p>
                </div>
            </div>
            <div class="flex justify-end w-full">
                <button class="p-2 rounded-md bg-red-400 hover:bg-red-600"><span class="material-symbols-outlined">chevron_right</span></button>
            </div>
        </div>
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
        // Ambil elemen dengan id "deskripsi"
        var deskripsiElement = document.getElementById("deskripsi");

        // Ambil teks dari elemen
        var deskripsiTeks = deskripsiElement.textContent;

        // Potong teks menjadi 20 karakter
        var potonganDeskripsi = deskripsiTeks.slice(0, 20);

        // Tambahkan teks potongan kembali ke elemen
        deskripsiElement.textContent = potonganDeskripsi + "...";
    </script>

</body>
</html>

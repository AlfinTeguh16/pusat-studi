@extends('inputdosen.master')
@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Masukan Data Produk</title>
</head>

<body>


    <section class="w-screen ">

        <div class="flex justify-center bg-gray-50 sm:w-fit sm:shadow-2xl sm:rounded-2xl sm:p-4 mx-auto ">

            <div class="flex flex-col justify-center sm:w-fit sm:bg-gray-50 sm:rounded-2xl sm:border-2 sm:p-9 sm:border-dashed">
                <h2 class="text-2xl font-semibold mb-4">Buat Produk</h2>

                <div id="successCard" class="hidden items-center bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded relative">
                    <strong class="font-bold">Success!</strong>
                    <span class="block" id="successMessage"></span>
                    <button type="button" onclick="hideSuccessCard()" class="ml-auto">
                        <i class="ph-fill ph-x"></i>
                        <title>Close</title>
                    </button>
                </div>



                <form id="createEventForm" action="{{ route('createProduct') }}" method="post" enctype="multipart/form-data"
                class="flex justify-center flex-col p-3">
                    @csrf

                    <input type="hidden" name="nidn" value="{{ Auth::user()->nidn }}">
                    <input type="hidden" name="nama" value="{{ Auth::user()->nama }}">

                    <label for="judul" class="font-semibold">Judul</label>
                    <input type="text" id="judul" name="judul" placeholder="Masukan Judul"
                    class="my-2 border-solid border-gray-500 border-2 hover:bg-gray-100 focus:bg-gray-100 focus:shadow-lg hover:shadow-xl rounded-md p-2" required>

                    <label for="gambar">Gambar</label>
                    <input type="file" id="gambar" name="gambar" accept="image/*"
                    class="my-2 border-solid border-gray-500 border-2 hover:bg-gray-100 focus:bg-gray-100 focus:shadow-lg hover:shadow-xl rounded-md p-2">

                    <label for="sub_gambar">Sub Gambar</label>
                    <input type="file" id="sub_gambar" name="sub_gambar" accept="image/*"
                    class="my-2 border-solid border-gray-500 border-2 hover:bg-gray-100 focus:bg-gray-100 focus:shadow-lg hover:shadow-xl rounded-md p-2">

                    <label for="deskripsi">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" placeholder="Masukan Deskripsi"
                    class="my-2 border-solid border-gray-500 border-2 hover:bg-gray-100 focus:bg-gray-100 focus:shadow-lg hover:shadow-xl rounded-md p-2" required></textarea>

                    <label for="link">URL</label>
                    <input type="text" id="link" name="link" placeholder="Masukan URL atau Link"
                    class="my-2 border-solid border-gray-500 border-2 hover:bg-gray-100 focus:bg-gray-100 focus:shadow-lg hover:shadow-xl rounded-md p-2">

                    <button type="button" onclick="submitForm()"
                    class="bg-blue-500 hover:bg-blue-700 rounded-md p-2 text-white font-semibold hover:shadow-lg my-2">
                    Submit</button>
                </form>
            </div>
        </div>
    </section>




<script>
    function showSuccessCard(message) {
        $('#successMessage').text(message);
        $('#successCard').removeClass('hidden');
    }

    function hideSuccessCard() {
        $('#successCard').addClass('hidden');
    }
</script>

<script>
    function submitForm() {
        var form = document.getElementById('createEventForm');
        var formData = new FormData(form);

        $.ajax({
            type: 'POST',
            url: '{{ route("createEvent") }}',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                showSuccessCard(response.success);
                // Tambahkan logika untuk menampilkan card atau pesan sukses lainnya di sini
            },
            error: function(error) {
                // Menanggapi kesalahan
                $('#errorMessage').text('Error creating event: ' + error.responseJSON.error);
                $('#errorMessage').show();
                // Tambahkan logika untuk menampilkan pesan kesalahan atau melakukan hal lainnya di sini
            }
        });
    }
</script>

</body>

@endsection

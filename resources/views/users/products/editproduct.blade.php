@extends('users.master')
@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Ubah Data Produk</title>
</head>

<body class="p-8 sm:ml-64">

    <div class="p-4">
        <a href="{{ url('/dashboard')}}" class="p-2 bg-slate-300 hover:bg-slate-700 rounded-md font-medium hover:text-white delay-150"><i class="ph-bold ph-caret-left"></i> Kembali</a>
    </div>

    <section class="border rounded border-solid border-gray-200 bg-gray-100 shadow-lg p-4 sm:w-3/5 mx-auto ">
        <button onclick="openInputForm()" class="p-2 rounded bg-green-700 hover:bg-green-900 text-white"><span><i class="ph ph-rows-plus-bottom"></i></span>Form</button>

        <div id="inputFormModal" onclick="closeInputForm()"  class="fixed top-0 left-0 w-full h-full overflow-auto bg-gray-500 bg-opacity-50 hidden ">

                <div class="modal-content bg-white mx-auto my-20 p-4 border rounded-lg border-gray-800 w-fit">

                    <div class="h-fit w-60 flex flex-col justify-end">
                        <h1 class="font-bold">Tambah Form</h1>
                    </div>

                    <div class="flex flex-col justify-start">
                        <button id="formButton" onclick="addForm('Gambar', 'file', 'imageTitle'); closeInputForm();" class="p-2 my-1  hover:bg-blue-100 rounded hover:font-semibold">Gambar</button>
                        <button id="formButton" onclick="addForm('Video', 'file', 'videoTitle'); closeInputForm();" class="p-2 my-1  hover:bg-blue-100 rounded hover:font-semibold">Video</button>
                        <button id="formButton" onclick="addForm('URL', 'text', 'link'); closeInputForm();" class="p-2 my-1  hover:bg-blue-100 rounded hover:font-semibold">URL</button>
                        <button id="formButton" onclick="addForm('Deskripsi', 'text', 'description'); closeInputForm();" class="p-2 my-1  hover:bg-blue-100 rounded hover:font-semibold">Deskripsi</button>
                    </div>

                </div>

        </div>

        <form id="updateDataForm" method="post" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col mb-4">
                <label for="judul" class="font-medium">Masukan Judul</label>
                <input type="text" name="judul" id="judul" class="rounded border-2 border-gray-300 focus:bg-gray-200 active:border-blue-400 active:border-solid active:border-2" value="{{ $product->judul }}">
            </div>

            <div id="product" class="flex flex-col w-full">
                @foreach($productItems as $data)
                    <label class="font-semibold">{{ ucwords(str_replace('_', ' ', $data->jenis)) }}</label>
                    @if($data->jenis == 'imageTitle' || $data->jenis == 'videoTitle')
                        <div class="flex items-center">
                            <input id="{{ $data->jenis }}" type="file" name="product[]" placeholder="{{ $data->content }}" class="rounded-md border border-gray-300 focus:outline-none focus:border-blue-500 focus:bg-blue-50 bg-white flex-grow w-full mb-2 p-4">
                            <input type="hidden" name="jenis[]" value="{{ $data->jenis }}">
                            <button type="button" onclick="removeForm(this)" class="ml-2 px-2 py-1 bg-red-500 text-white rounded hover:bg-red-700 hover:shadow-lg"><i class="ph ph-x"></i></button>
                        </div>
                        @if($data->jenis == 'imageTitle')
                            <img src="{{ asset($data->content) }}" alt="preview" class="w-32 h-32 object-cover mb-2">
                        @elseif($data->jenis == 'videoTitle')
                            <video controls class="w-32 h-32 object-cover mb-2">
                                <source src="{{ asset($data->content) }}" type="video/mp4">
                            </video>
                        @endif
                    @else
                        <div class="flex items-center">
                            <input id="{{ $data->jenis }}" type="text" name="product[]" class="rounded-md border border-gray-300 focus:outline-none focus:border-blue-500 focus:bg-blue-50 bg-white flex-grow w-full mb-2 p-4" value="{{ $data->content }}">
                            <input type="hidden" name="jenis[]" value="{{ $data->jenis }}">
                            <button type="button" onclick="removeForm(this)" class="ml-2 px-2 py-1 bg-red-500 text-white rounded hover:bg-red-700 hover:shadow-lg"><i class="ph ph-x"></i></button>
                        </div>
                    @endif
                @endforeach
            </div>

            <button id="submitForm" type="button" class="p-2 bg-blue-500 w-full rounded text-white">Update Product</button>
        </form>
    </section>

    {{-- <div id="successPopUp" class="flex flex-col justify-center p-8 m-auto z-20 align-middle rounded bg-gray-100 border-gray-200 shadow-lg w-full max-w-md" style="display: none;">
        <section class="flex justify-center my-10 sm:my-20 ">
            <h1 class="font-semibold text-lg sm:text-xl">Data Behasil Dibuat!</h1>
        </section>
        <section class="felx-row mx-auto">
            <a href="/input" class="p-2 sm:p-3 mx-2 text-sm sm:text-base font-medium text-white bg-blue-500 hover:bg-blue-700 hover:shadow-lg border rounded-lg">
                <span> Buat Data Lagi </span>
            </a>
            <a href="/dashboard" class="p-2 sm:p-3 mx-2 text-sm sm:text-base font-medium text-white bg-gray-400 hover:bg-gray-500 hover:shadow-lg border rounded-lg">
                Kembali Ke Dashboard
            </a>
        </section>
    </div> --}}

<script>
    function openInputForm() {
        document.getElementById('inputFormModal').style.display = 'block';
    }
    function closeInputForm() {
        document.getElementById('inputFormModal').style.display = 'none';
    }
</script>

<script>

    function addForm(formName, type, name) {
            let formClasses = "rounded-md border border-gray-300 focus:outline-none focus:border-blue-500 focus:bg-blue-50 bg-white flex-grow w-full mb-2 p-4";
            let formLabel = '<label class="font-semibold">'+ formName +'</label>';
            let deleteButton = '<button type="button" onclick="removeForm(this)" class="ml-2 px-2 py-1 bg-red-500 text-white rounded hover:bg-red-700 hover:shadow-lg"><i class="ph ph-x"></i></button>';
            let form = '<div class="flex items-center">' +
                '<input id="' + name + '" type="' + type + '" name="product[]" class="'+ formClasses +'">' +
                '<input type="hidden" name="jenis[]" value="' + name + '">' +
                '<input type="hidden" name="label[]" value="' + formName + '">' +
                deleteButton +
                '</div>';

            $('#product').append(formLabel);
            $('#product').append(form);
        }

        function removeForm(button) {
            $(button).parent().prev().remove();
            $(button).parent().remove();
        }



        $(document).ready(function () {
            $('#submitForm').on('click', function (event) {
                event.preventDefault();
                let formData = new FormData();
                formData.append('judul', $('#judul').val());

                $('input[name="product[]"]').each(function (index, element) {
                    if (element.type === 'file' && element.files.length > 0) {
                        formData.append('product[' + index + ']', element.files[0]);
                    } else {
                        formData.append('product[' + index + ']', $(element).val());
                    }
                });

                $('input[name="label[]"]').each(function (index, element) {
                    formData.append('label[]', $(element).val());
                });
                $('input[name="jenis[]"]').each(function (index, element) {
                    formData.append('jenis[]', $(element).val());
                });

                formData.append('_token', '{{ csrf_token() }}');

                $.ajax({
                    url: '{{ route("product.update", ['id' => $product->id]) }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        alert('Data berhasil diupdate!');
                    },
                    error: function (response) {
                        alert('Terjadi kesalahan!');
                    }
                });
            });
        });


</script>

</body>

@endsection

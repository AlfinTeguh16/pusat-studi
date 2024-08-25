@extends('users.master')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Meta Data</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
                        <button id="formButton" onclick="addForm('Model 3D', 'text', 'model_3d'); closeInputForm();" class="p-2 my-1  z-10 hover:bg-blue-100 rounded hover:font-semibold">Model 3D</button>
                        <button id="formButton" onclick="addForm('Gambar', 'file', 'imageTitle'); closeInputForm();" class="p-2 my-1  hover:bg-blue-100 rounded hover:font-semibold">Gambar</button>
                        <button id="formButton" onclick="addForm('Video', 'file', 'videoTitle'); closeInputForm();" class="p-2 my-1  hover:bg-blue-100 rounded hover:font-semibold">Video</button>
                        <button id="formButton" onclick="addForm('URL', 'text', 'link'); closeInputForm();" class="p-2 my-1  hover:bg-blue-100 rounded hover:font-semibold">URL</button>
                        <button id="formButton" onclick="addForm('Deskripsi', 'text', 'description'); closeInputForm();" class="p-2 my-1  hover:bg-blue-100 rounded hover:font-semibold">Deskripsi</button>
                        <button id="formButton" onclick="addForm('Tahun Pembuatan', 'number', 'manufactureYear'); closeInputForm();" class="p-2 my-1  hover:bg-blue-100 rounded hover:font-semibold">Tahun pembuatan</button>
                        <button id="formButton" onclick="addForm('Periode Pembuatan Awal', 'date', 'manufactureStart'); closeInputForm();" class="p-2 my-1  hover:bg-blue-100 rounded hover:font-semibold">Periode Pembuatan Awal</button>
                        <button id="formButton" onclick="addForm('Periode Pembuatan Akhir', 'date', 'manufactureFinish'); closeInputForm();" class="p-2 my-1  hover:bg-blue-100 rounded hover:font-semibold">Periode Pembuatan Akhir</button>
                        <button id="formButton" onclick="addForm('Nama Pencipta', 'text', 'creatorName'); closeInputForm();" class="p-2 my-1  hover:bg-blue-100 rounded hover:font-semibold">Nama Pencipta</button>
                        <button id="formButton" onclick="addForm('Negara Asal Pencipta', 'text', 'creatorNationality'); closeInputForm();" class="p-2 my-1  hover:bg-blue-100 rounded hover:font-semibold">Negara Asal Pencipta</button>
                        <button id="formButton" onclick="addForm('Gaya Pencipta', 'text', 'creatorStyle'); closeInputForm();" class="p-2 my-1  hover:bg-blue-100 rounded hover:font-semibold">Gaya Pencipta</button>
                        <button id="formButton" onclick="addForm('Ornamen Objek', 'text', 'objectOrnament'); closeInputForm();" class="p-2 my-1  hover:bg-blue-100 rounded hover:font-semibold">Ornamen Objek</button>
                        <button id="formButton" onclick="addForm('Lebar Objek', 'number', 'objectWidth'); closeInputForm();" class="p-2 my-1  hover:bg-blue-100 rounded hover:font-semibold">Lebar Objek</button>
                        <button id="formButton" onclick="addForm('Tinggi Objek', 'number', 'objectHeight'); closeInputForm();" class="p-2 my-1  hover:bg-blue-100 rounded hover:font-semibold">Tinggi Objek</button>
                        <button id="formButton" onclick="addForm('Volume Objek', 'number', 'objectVolume'); closeInputForm();" class="p-2 my-1  hover:bg-blue-100 rounded hover:font-semibold">Volume Objek</button>
                        <button id="formButton" onclick="addForm('Bahan Utama', 'text', 'mainMaterial'); closeInputForm();" class="p-2 my-1  hover:bg-blue-100 rounded hover:font-semibold">Bahan Utama</button>
                        <button id="formButton" onclick="addForm('Bahan Tambahan', 'text', 'additionalMaterial'); closeInputForm();" class="p-2 my-1  hover:bg-blue-100 rounded hover:font-semibold">Bahan Tambahan</button>
                        <button id="formButton" onclick="addForm('Teknik Pembuatan', 'text', 'creationTechnique'); closeInputForm();" class="p-2 my-1  hover:bg-blue-100 rounded hover:font-semibold">Teknik Pembuatan</button>
                        <button id="formButton" onclick="addForm('Negara Objek', 'text', 'objectNation'); closeInputForm();" class="p-2 my-1  hover:bg-blue-100 rounded hover:font-semibold">Negara Objek</button>
                        <button id="formButton" onclick="addForm('Provinsi Objek', 'text', 'objectProvince'); closeInputForm();" class="p-2 my-1  hover:bg-blue-100 rounded hover:font-semibold">Provinsi Objek</button>
                    </div>

                </div>

        </div>

        <form id="updateMetaDataForm" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col mb-4">
                <label for="judul" class="font-medium">Masukan Judul</label>
                <input type="text" name="judul" id="judul" class="rounded border-2 border-gray-300 focus:bg-gray-200 active:border-blue-400 active:border-solid active:border-2" value="{{ $karya->judul }}">
            </div>

            <div id="metaForm" class="flex flex-col w-full">
                @foreach($metadatas as $data)
                    <label class="font-semibold">{{ ucwords(str_replace('_', ' ', $data->jenis)) }}</label>
                    <input type="hidden" name="label[]" value="{{ $data->label }}">
                    @if($data->jenis == 'imageTitle' || $data->jenis == 'videoTitle')
                        <div class="flex items-center">
                            <input id="{{ $data->jenis }}" type="file" name="metadata[]" value="{{ $data->content }}" class="rounded-md border border-gray-300 focus:outline-none focus:border-blue-500 focus:bg-blue-50 bg-white flex-grow w-full mb-2 p-4">
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
                            <input id="{{ $data->jenis }}" type="text" name="metadata[]" class="rounded-md border border-gray-300 focus:outline-none focus:border-blue-500 focus:bg-blue-50 bg-white flex-grow w-full mb-2 p-4" value="{{ $data->content }}">
                            <input type="hidden" name="jenis[]" value="{{ $data->jenis }}">
                            <button type="button" onclick="removeForm(this)" class="ml-2 px-2 py-1 bg-red-500 text-white rounded hover:bg-red-700 hover:shadow-lg"><i class="ph ph-x"></i></button>
                        </div>
                    @endif
                @endforeach
            </div>

            <button id="submitForm" type="buton" onclick="disableButton()" class="p-2 bg-blue-500 w-full rounded text-white transision delay-500 duration-300">Update Meta Data</button>

        </form>
    </section>

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
                '<input id="' + name + '" type="' + type + '" name="metadata[]" class="'+ formClasses +'">' +
                '<input type="hidden" name="jenis[]" value="' + name + '">' +
                '<input type="hidden" name="label[]" value="' + formName + '">' +
                deleteButton +
                '</div>';

            $('#metaForm').append(formLabel);
            $('#metaForm').append(form);
        }

        function removeForm(button) {
            $(button).parent().prev().remove();
            $(button).parent().remove();
        }

        function disableButton(){
            var button = document.getElementById("submitForm");
            button.classList.remove('bg-blue-500');
            button.classList.add('bg-blue-300');
            button.classList.add('delay-100');
            button.classList.add('ease-in');
            button.classList.remove();
            button.disabled = true;
        }

        $(document).ready(function () {
            $('#submitForm').on('click', function (event) {
                event.preventDefault();
                let formData = new FormData();
                formData.append('judul', $('#judul').val());

                $('input[name="metadata[]"]').each(function (index, element) {
                    if (element.type === 'file' && element.files.length > 0) {
                        formData.append('metadata[' + index + ']', element.files[0]);
                    } else {
                        formData.append('metadata[' + index + ']', $(element).val());
                    }
                });

                $('input[name="label[]"]').each(function (index, element) {
                    formData.append('label[' + index + ']', $(element).val());
                });
                $('input[name="jenis[]"]').each(function (index, element) {
                    formData.append('jenis[' + index + ']', $(element).val());
                });

                formData.append('_token', '{{ csrf_token() }}');
                formData.append('_method', 'POST');

                $.ajax({
                    url: '{{ route("metaData.update", ['id' => $karya->id]) }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {

                        $('#response-message').text(response.message);

                        $('#response-message').removeClass('hidden');
                        $('#response-message').addClass('block');
                        $('#response-message').fadeIn().delay(3000).fadeOut();
                    },
                    error: function (response) {
                        $('#response-message').text('Error occurred!');

                        $('#response-message').removeClass('hidden').addClass('flex');

                        $('#response-message').fadeIn().delay(3000).fadeOut();
                    }
                });
            });
        });



</script>
@endsection

@extends('admins.master')
@section('content')

<section class="p-3 sm:ml-64">

    <div class="p-4">
        <div class="container mx-auto py-6">
            <h1 class="text-3xl font-bold mb-8 text-center">Carousel</h1>

            <div class="flex justify-start mt-10">
                <button id="tambahCarouselBtn" class="px-4 py-2 bg-green-700 text-white rounded-md hover:bg-green-800">
                    Tambah Carousel <i class="ph-bold ph-slideshow"></i>
                </button>
            </div>

            <div id="formTambahCarousel" class="fixed inset-0 items-center justify-center bg-black bg-opacity-50 z-10 hidden">
                <div class="bg-white p-6 rounded-lg shadow-lg w-1/2 max-w-md relative">
                    <form method="POST" action="{{ route('dashboard-content.store') }}" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        <input type="file" id="file-upload-carousel" name="image" class="file-upload-input w-0.5 h-0.5 opacity-0 absolute z-[-1]" required>
                        <label for="file-upload-carousel" class="file-upload-label block w-full px-4 py-2 bg-gray-400 text-white font-semibold text-lg cursor-pointer rounded-md hover:bg-gray-500 text-center">
                            Pilih Gambar Dari File
                        </label>
                        <input type="hidden" name="imgtype" value="carousel">
                        <button type="submit" class="block w-full px-4 py-2 bg-blue-600 rounded-md text-white hover:bg-blue-700 text-center">
                            Tambah Gambar
                        </button>
                    </form>
                    <button id="closeModalBtnCarousel" class="absolute top-2 right-2 text-gray-600 hover:text-gray-800">
                        <i class="ph-bold ph-x"></i>
                    </button>
                </div>
            </div>

            <div class="border border-gray-100 shadow-lg rounded-lg p-4 mt-4">
                <div class="container mx-auto py-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 m-4">
                        @foreach ($carousel as $data)
                        <div class="gallery-card bg-white rounded-lg shadow-md overflow-hidden transition duration-300 transform hover:scale-105">
                            <img src="{{ asset($data->image) }}" alt="Gallery Image" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-500">{{ $data->updated_at }}</span>
                                    <div class="button-group">
                                        <button class="text-blue-500 hover:text-blue-700" onclick="openEditModal({{ $data->id }}, '{{ $data->imageDescription }}')">Edit</button>
                                        <button class="text-red-500 hover:text-red-700" onclick="openDeleteModal({{ $data->id }})">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="p-4">
        <div class="container mx-auto py-6">
            <h1 class="text-3xl font-bold mb-8 text-center">About</h1>
        
            @if($about)
                <div id="updateAbout" class="bg-white p-6 rounded-lg shadow-lg w-full relative">
                    <form method="POST" action="{{ route('dashboard-content.update', $about->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="flex flex-col md:flex-row gap-3">
                            <div class="flex md:flex-col md:w-1/2">
                                <div class="relative w-full ">
                                    <img id="aboutImage" src="{{ asset($about->image) }}" alt="About Image" class="border border-solid rounded-xl aspect-square w-full">
                                    <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 text-white text-xl font-bold opacity-0 hover:opacity-100 cursor-pointer border rounded-xl" id="hoverText">
                                        Ubah Gambar
                                    </div>
                                    <input type="file" id="fileInput" name="image" class="hidden" onchange="previewImage(event)">
                                </div>
                                <button id="aboutXlBtn" type="submit" class="p-2 mt-4 w-full border rounded-md bg-green-700 hover:bg-green-800 text-white hidden md:block">Ubah</button>
                            </div>
                            <input type="hidden" name="imgtype" value="about">
                            <textarea name="imageDescription" id="description" class="border border-solid rounded-xl aspect-square md:w-1/2 focus:bg-gray-100 p-1" placeholder="Masukan Deskripsi">{{ $about->imageDescription }}</textarea>
                            <button type="submit" class="p-2 w-full border rounded-md bg-green-700 hover:bg-green-800 text-white md:hidden">Ubah</button>
                        </div>
                    </form>
                </div>
            @else
                <div id="createAbout" class="bg-white p-6 rounded-lg shadow-lg w-full relative">
                    <form method="POST" action="{{ route('dashboard-content.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-col md:flex-row gap-3">
                            <div class="relative md:w-full">
                                <img id="aboutImage" src="" alt="About Image" class="border border-solid rounded-xl aspect-square w-full">
                                <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 text-white text-xl font-bold opacity-0 hover:opacity-100 cursor-pointer border rounded-xl" id="hoverText">
                                    Masukan Gambar
                                </div>
                                <input type="file" id="fileInput" name="image" class="hidden" onchange="previewImage(event)">
                            </div>
                            <input type="hidden" name="imgtype" value="about">
                            <textarea name="imageDescription" id="description" class="border border-solid rounded-xl aspect-square md:w-1/2 focus:bg-gray-100 p-1" placeholder="Masukan Deskripsi"></textarea>
                            <button id="aboutXlBtn" type="submit" class="p-2 mt-4 w-full border rounded-md bg-green-700 hover:bg-green-800 text-white hidden md:block">Simpan</button>
                            <button type="submit" class="p-2 w-full border rounded-md bg-green-700 hover:bg-green-800 text-white md:hidden">Simpan</button>
                        </div>
                    </form>
                </div>
            @endif

        </div>
    </div>

    <div class="p-4">
        <div class="container mx-auto py-6">
            <h1 class="text-3xl font-bold mb-8 text-center">Gallery</h1>

            <div class="flex justify-start mt-10">
                <button id="tambahGambarBtn" class="px-4 py-2 bg-green-700 text-white rounded-md hover:bg-green-800">
                    Tambah Gambar <i class="ph-bold ph-images"></i>
                </button>
            </div>

            <div id="formTambahGambar" class="fixed inset-0 items-center justify-center bg-black bg-opacity-50 z-10 hidden">
                <div class="bg-white p-6 rounded-lg shadow-lg w-1/2 max-w-md relative">
                    <form method="POST" action="{{ route('dashboard-content.store') }}" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        <input type="file" id="file-upload" name="image" class="file-upload-input w-0.5 h-0.5 opacity-0 absolute z-[-1]" required>
                        <label for="file-upload" class="file-upload-label block w-full px-4 py-2 bg-gray-400 text-white font-semibold text-lg cursor-pointer rounded-md hover:bg-gray-500 text-center">
                            Pilih Gambar Dari File
                        </label>
                        <input type="textarea" name="imageDescription" placeholder="Masukan Keterangan Gambar" class="rounded border focus:border-blue-300 focus:border-solid w-full p-2">
                        <input type="hidden" name="imgtype" value="gallery">
                        <button type="submit" class="block w-full px-4 py-2 bg-blue-600 rounded-md text-white hover:bg-blue-700 text-center">
                            Tambah Gambar
                        </button>
                    </form>
                    <button id="closeModalBtn" class="absolute top-2 right-2 text-gray-600 hover:text-gray-800">
                        <i class="ph-bold ph-x"></i>
                    </button>
                </div>
            </div>

            <div class="border border-gray-100 shadow-lg rounded-lg p-4 mt-4">
                <div class="container mx-auto py-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 m-4">
                        @foreach ($gallery as $data)
                        <div class="gallery-card bg-white rounded-lg shadow-md overflow-hidden transition duration-300 transform hover:scale-105">
                            <img src="{{ asset($data->image) }}" alt="Gallery Image" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <div>
                                    <p id="deskripsi-{{ $data->id }}" class="deskripsi">{{ $data->imageDescription }}</p>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-500">{{ $data->updated_at }}</span>
                                    <div class="button-group">
                                        <button class="text-blue-500 hover:text-blue-700" onclick="openEditModal({{ $data->id }}, '{{ $data->imageDescription }}')">Edit</button>
                                        <button class="text-red-500 hover:text-red-700" onclick="openDeleteModal({{ $data->id }})">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="p-4">
        <div class="container mx-auto py-6">
            <h1 class="text-3xl font-bold mb-8 text-center">Team</h1>

            <div class="flex justify-start mt-10">
                <button id="tambahTeamBtn" class="px-4 py-2 bg-green-700 text-white rounded-md hover:bg-green-800">
                    Tambah Gambar <i class="ph-bold ph-users-three"></i>
                </button>
            </div>

            <div id="formTambahTeam" class="fixed inset-0 items-center justify-center bg-black bg-opacity-50 z-10 hidden">
                <div class="bg-white p-6 rounded-lg shadow-lg w-1/2 max-w-md relative">
                    <form method="POST" action="{{ route('dashboard-content.store') }}" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        <input type="file" id="file-upload-Team" name="image" class="file-upload-input w-0.5 h-0.5 opacity-0 absolute z-[-1]" required>
                        <label for="file-upload-Team" class="file-upload-label block w-full px-4 py-2 bg-gray-400 text-white font-semibold text-lg cursor-pointer rounded-md hover:bg-gray-500 text-center">
                            Pilih Gambar Dari File
                        </label>
                        <input type="textarea" name="imageDescription" placeholder="Masukan Keterangan Gambar" class="rounded border focus:border-blue-300 focus:border-solid w-full p-2">
                        <input type="textarea" name="team" placeholder="Masukan Departemen" class="rounded border focus:border-blue-300 focus:border-solid w-full p-2">
                        <input type="hidden" name="imgtype" value="team">
                        <button type="submit" class="block w-full px-4 py-2 bg-blue-600 rounded-md text-white hover:bg-blue-700 text-center">
                            Tambah Gambar
                        </button>
                    </form>
                    <button id="closeModalBtnTeam" class="absolute top-2 right-2 text-gray-600 hover:text-gray-800">
                        <i class="ph-bold ph-x"></i>
                    </button>
                </div>
            </div>

            <div class="border border-gray-100 shadow-lg rounded-lg p-4 mt-4">
                <div class="container mx-auto py-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 m-4">
                        @foreach ($team as $data)
                        <div class="gallery-card bg-white rounded-lg shadow-md overflow-hidden transition duration-300 transform hover:scale-105">
                            <img src="{{ asset($data->image) }}" alt="Gallery Image" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <div>
                                    <p id="deskripsi-{{ $data->id }}" class="deskripsi">{{ $data->imageDescription }}</p>
                                </div>
                                <div>
                                    <p class="font-semibold">{{ $data->team }}</p>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-500">{{ $data->updated_at }}</span>
                                    <div class="button-group">
                                        <button class="text-blue-500 hover:text-blue-700" onclick="openEditModalTeam({{ $data->id }}, '{{ $data->imageDescription }}' , '{{$data->team}}')">Edit</button>
                                        <button class="text-red-500 hover:text-red-700" onclick="openDeleteModal({{ $data->id }})">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div id="editModal" class="fixed inset-0 items-center justify-center bg-black bg-opacity-50 z-10 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-1/2 max-w-md relative">
            <form id="editForm" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')
                <input type="hidden" id="editId" name="id">
                <input type="file" id="editFileUpload" name="image" class="file-upload-input w-0.5 h-0.5 opacity-0 absolute z-[-1]">
                <label for="editFileUpload" class="file-upload-label block w-full px-4 py-2 bg-blue-600 text-white font-semibold text-lg cursor-pointer rounded-md hover:bg-blue-700 text-center">
                    Pilih Gambar Dari File
                </label>
                <input type="text" id="editDescription" name="imageDescription" class="block w-full px-4 py-2 border rounded-md" required>
                <button type="submit" class="block w-full px-4 py-2 bg-green-600 rounded-md text-white hover:bg-green-700 text-center">
                    Update Gambar
                </button>
            </form>
            <button id="closeEditModalBtn" class="absolute top-2 right-2 text-gray-600 hover:text-gray-800">
                <i class="ph-bold ph-x"></i>
            </button>
        </div>
    </div>

    <!-- Edit Modal Team -->
    <div id="editModalTeam" class="fixed inset-0 items-center justify-center bg-black bg-opacity-50 z-10 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-1/2 max-w-md relative">
            <form id="editFormTeam" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')
                <input type="hidden" id="editIdTeam" name="id">
                <input type="file" id="editFileUploadTeam" name="image" class="file-upload-input w-0.5 h-0.5 opacity-0 absolute z-[-1]">
                <label for="editFileUploadTeam" class="file-upload-label block w-full px-4 py-2 bg-blue-600 text-white font-semibold text-lg cursor-pointer rounded-md hover:bg-blue-700 text-center">
                    Pilih Gambar Dari File
                </label>
                <input type="text" id="editDescriptionTeam" name="imageDescription" placeholder="Masukan Nama" class="block w-full px-4 py-2 border rounded-md">
                <input type="text" id="editDepartmentTeam" name="team" placeholder="Masukan Departemen" class="rounded border focus:border-blue-300 focus:border-solid w-full p-2">
                <button type="submit" class="block w-full px-4 py-2 bg-green-600 rounded-md text-white hover:bg-green-700 text-center">
                    Update Gambar
                </button>
            </form>
            <button id="closeEditModalBtnTeam" class="absolute top-2 right-2 text-gray-600 hover:text-gray-800">
                <i class="ph-bold ph-x"></i>
            </button>
        </div>
    </div>

    <!-- Delete Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 items-center justify-center hidden">
        <div class="bg-white rounded-lg p-8">
            <h2 class="text-2xl font-semibold mb-4">Apakah Yakin Akan Menghapus Data?</h2>
            <div class="flex justify-end space-x-4">
                <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded-md" onclick="closeDeleteModal()">Tidak</button>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md">Ya</button>
                </form>
            </div>
        </div>
    </div>

</section>

<script>
    // Modal for Gallery
    var modalGallery = document.getElementById("formTambahGambar");
    var btnGallery = document.getElementById("tambahGambarBtn");
    var closeBtnGallery = document.getElementById("closeModalBtn");

    btnGallery.onclick = function() {
        modalGallery.classList.remove("hidden");
        modalGallery.classList.add("flex");
    }

    closeBtnGallery.onclick = function() {
        modalGallery.classList.add("hidden");
        modalGallery.classList.remove("flex");
    }

    window.onclick = function(event) {
        if (event.target == modalGallery) {
            modalGallery.classList.add("hidden");
        }
    }

    // Modal for Carousel
    var modalCarousel = document.getElementById("formTambahCarousel");
    var btnCarousel = document.getElementById("tambahCarouselBtn");
    var closeBtnCarousel = document.getElementById("closeModalBtnCarousel");

    btnCarousel.onclick = function() {
        modalCarousel.classList.remove("hidden");
        modalCarousel.classList.add("flex");
    }

    closeBtnCarousel.onclick = function() {
        modalCarousel.classList.add("hidden");
        modalCarousel.classList.remove("flex");
    }

    window.onclick = function(event) {
        if (event.target == modalCarousel) {
            modalCarousel.classList.add("hidden");
        }
    }

    // Modal for Team
    var modalTeam = document.getElementById("formTambahTeam");
    var btnTeam = document.getElementById("tambahTeamBtn");
    var closeBtnTeam = document.getElementById("closeModalBtnTeam");

    btnTeam.onclick = function() {
        modalTeam.classList.remove("hidden");
        modalTeam.classList.add("flex");
    }

    closeBtnTeam.onclick = function() {
        modalTeam.classList.add("hidden");
        modalTeam.classList.remove("flex");
    }

    window.onclick = function(event) {
        if (event.target == modalTeam) {
            modalTeam.classList.add("hidden");
        }
    }

    function openEditModal(id, description) {
        var form = document.getElementById('editForm');
        form.action = '/dashboard-content/' + id;

        document.getElementById('editId').value = id;
        document.getElementById('editDescription').value = description;

        var modal = document.getElementById('editModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function openEditModalTeam(id, description, department) {
        var form = document.getElementById('editFormTeam');
        form.action = '/dashboard-content/' + id;

        document.getElementById('editIdTeam').value = id;
        document.getElementById('editDescriptionTeam').value = description;
        document.getElementById('editDepartmentTeam').value = department;

        var modal = document.getElementById('editModalTeam');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeEditModal() {
        var modal = document.getElementById('editModal');
        modal.classList.add('hidden');
    }

    function closeEditModalTeam() {
        var modal = document.getElementById('editModalTeam');
        modal.classList.add('hidden');
    }

    var closeEditBtn = document.getElementById('closeEditModalBtn');
    closeEditBtn.onclick = function() {
        closeEditModal();
    }

    var closeEditBtnTeam = document.getElementById('closeEditModalBtnTeam');
    closeEditBtnTeam.onclick = function() {
        closeEditModalTeam();
    }

    window.onclick = function(event) {
        var modal = document.getElementById('editModal');
        if (event.target == modal) {
            closeEditModal();
        }

        var modalTeam = document.getElementById('editModalTeam');
        if (event.target == modalTeam) {
            closeEditModalTeam();
        }
    }

    function openDeleteModal(imageId) {
        const deleteForm = document.getElementById('deleteForm');
        deleteForm.action = `/dashboard-content/${imageId}`;
        document.getElementById('deleteModal').classList.remove('hidden');
        document.getElementById('deleteModal').classList.add('flex');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }

    var deskripsiElements = document.querySelectorAll(".deskripsi");

    deskripsiElements.forEach(function (elem) {
        var deskripsiTeks = elem.textContent;

        if (deskripsiTeks.length > 200) {
            var potonganDeskripsi = deskripsiTeks.slice(0, 200);
            elem.textContent = potonganDeskripsi + "...";
        }
    });

    var judulElements = document.querySelectorAll(".judul");

    judulElements.forEach(function (elem) {
        var judulTeks = elem.textContent;

        if (judulTeks.length > 200) {
            var potonganJudul = judulTeks.slice(0, 200);
            elem.textContent = potonganJudul + "...";
        }
    });


    document.getElementById('hoverText').onclick = function() {
                document.getElementById('fileInput').click();
            };
        
            function previewImage(event) {
                const reader = new FileReader();
                reader.onload = function() {
                    const output = document.getElementById('aboutImage');
                    output.src = reader.result;
                };
                reader.readAsDataURL(event.target.files[0]);
            }
        
            // Auto-hide success message after a few seconds
            window.onload = function() {
                const successPopup = document.getElementById('successPopup');
                if (successPopup) {
                    setTimeout(() => {
                        successPopup.style.display = 'none';
                    }, 3000); // Hide after 3 seconds
                }
            };
</script>
@endsection

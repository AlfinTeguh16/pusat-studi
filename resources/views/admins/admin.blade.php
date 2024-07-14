@extends('admins.master')

@section('content')
<div class="p-3 sm:ml-64">
    <div class="border border-gray-300 rounded-lg p-4">
        <div class="container mx-auto py-6">
            <h1 class="text-3xl font-bold mb-8 text-center">Gallery</h1>

            <div class="flex justify-start mt-10">
                <button id="tambahGambarBtn" class="px-4 py-2 bg-green-700 text-white rounded-md hover:bg-green-800">
                    Tambah Gambar <i class="ph-bold ph-file-image"></i> 
                </button>
            </div>
            
            
            <!-- Modal -->
            <div id="formTambahGambar" class="fixed inset-0 items-center justify-center bg-black bg-opacity-50 z-10 hidden">
                <div class="bg-white p-6 rounded-lg shadow-lg w-1/2 max-w-md relative">
                    <form method="POST" action="{{ route('galery.store') }}" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        <input type="file" id="file-upload" name="image" class="file-upload-input w-0.5 h-0.5 opacity-0 absolute z-[-1]" required>
                        <label for="file-upload" class="file-upload-label block w-full px-4 py-2 bg-gray-400 text-white font-semibold text-lg cursor-pointer rounded-md hover:bg-gray-500 text-center">
                            Pilih Gambar Dari File
                        </label>
                        <input type="textarea" name="imageDescription" placeholder="Masukan Keterangan Gambar" class="rounded border focus:border-blue-300 focus:border-solid w-full p-2">
                        <button type="submit" class="block w-full px-4 py-2 bg-blue-600 rounded-md text-white hover:bg-blue-700 text-center">
                            Tambah Gambar
                        </button>
                    </form>
                    <button id="closeModalBtn" class="absolute top-2 right-2 text-gray-600 hover:text-gray-800">
                        <i class="ph-bold ph-x"></i>
                    </button>
                </div>
            </div>
            

            <div class="border border-gray-300 rounded-lg p-4 mt-4">
                <div class="container mx-auto py-6">
                    
                <!-- Gallery -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 m-4">
                    @foreach ($galery as $data)
                    <!-- Example of an image card -->
                    <div class="gallery-card bg-white rounded-lg shadow-md overflow-hidden transition duration-300 transform hover:scale-105">
                        <img src="{{ asset($data->image) }}" alt="Galery Image" class="w-full h-48 object-cover">
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
                    <!-- End example -->
                   
            </div>
        </div>
    </div>

    <div class="border border-gray-300 rounded-lg p-4 mt-8">
        <div class="container mx-auto py-6">
            <h1 class="text-3xl font-bold mb-8 text-center">User Activity</h1>

            <!-- Activity Table -->
            <div class="overflow-x-auto bg-white rounded-lg shadow-md">
                <table class="w-full whitespace-nowrap">
                    <thead>
                        <tr class="text-left font-bold">
                            <th class="px-6 py-3 text-sm uppercase tracking-wider">Username</th>
                            <th class="px-6 py-3 text-sm uppercase tracking-wider">Aktivitas</th>
                            <th class="px-6 py-3 text-sm uppercase tracking-wider">Tanggal Upload</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($userActivities as $data)
                        <tr>
                            <td class="border px-6 py-4">{{ $data->username }}</td>
                            <td class="border px-6 py-4">{{ $data->activity }}</td>
                            <td class="border px-6 py-4">{{ $data->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $userActivities->links() }}
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div id="editModal" class="fixed inset-0  items-center justify-center bg-black bg-opacity-50 z-10 hidden">
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

    <!-- Delete Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-gray-800 bg-opacity-50  items-center justify-center hidden">
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
</div>

<script>
    document.getElementById('file-upload').addEventListener('change', function() {
        var fileName = this.files[0].name;
        document.querySelector('.file-upload-label').textContent = fileName;
    });
</script>


<script>

    var modal = document.getElementById("formTambahGambar");
    var btn = document.getElementById("tambahGambarBtn");
    var closeBtn = document.getElementById("closeModalBtn");

    btn.onclick = function() {
        modal.classList.remove("hidden");
        modal.classList.add("flex");
    }

    closeBtn.onclick = function() {
        modal.classList.add("hidden");
        modal.classList.remove("flex");
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.classList.add("hidden");
        }
    }
</script>

<script>
    function openEditModal(id, description) {
        // Set form action URL
        var form = document.getElementById('editForm');
        form.action = '/galery/' + id;

        // Set form values
        document.getElementById('editId').value = id;
        document.getElementById('editDescription').value = description;

        // Show modal
        var modal = document.getElementById('editModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeEditModal() {
        var modal = document.getElementById('editModal');
        modal.classList.add('hidden');
    }

    // Get the <span> element that closes the modal
    var closeBtn = document.getElementById('closeEditModalBtn');

    // When the user clicks on <span> (x), close the modal
    closeBtn.onclick = function() {
        closeEditModal();
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        var modal = document.getElementById('editModal');
        if (event.target == modal) {
            closeEditModal();
        }
    }
</script>

<script>
    function openDeleteModal(imageId) {
        const deleteForm = document.getElementById('deleteForm');
        deleteForm.action = `/galery/${imageId}`;
        document.getElementById('deleteModal').classList.remove('hidden');
        document.getElementById('deleteModal').classList.add('flex');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }
</script>

<script>

    var deskripsiElements = document.querySelectorAll(".deskripsi");


    deskripsiElements.forEach(function (elem) {
        var deskripsiTeks = elem.textContent;

        if (deskripsiTeks.length > 20) {
            var potonganDeskripsi = deskripsiTeks.slice(0, 200);
            elem.textContent = potonganDeskripsi + "...";
        }

    });

    var judulElements = document.querySelectorAll(".judul");


    judulElements.forEach(function (elem) {
        var judulTeks = elem.textContent;

        if (judulTeks.length > 10) {
            var potonganJudul = judulTeks.slice(0, 200);
            elem.textContent = potonganJudul + "...";
        }

    });
</script>

@endsection

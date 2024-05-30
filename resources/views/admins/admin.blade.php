@extends('admins.master')

@section('content')
<div class="p-3 sm:ml-64">
    <div class="border border-gray-300 rounded-lg p-4">
        <div class="container mx-auto py-6">
            <h1 class="text-3xl font-bold mb-8 text-center">Gallery</h1>
            <div>
                <form method="POST" action="{{ route('galery.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="image" placeholder="Tambah Gambar Ke Galery" required>
                    <button type="submit">
                        Tambah Gambar
                    </button>
                </form>
            </div>

            <div class="border border-gray-300 rounded-lg p-4 mt-4">
                <!-- Gallery -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($galery as $data)
                    <!-- Example of an image card -->
                    <div class="gallery-card bg-white rounded-lg shadow-md overflow-hidden transition duration-300 transform hover:scale-105">
                        <img src="{{ asset( $data->image) }}" alt="Galery Image" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-500">{{ $data->updated_at }}</span>
                                <div class="button-group">
                                    <button class="text-blue-500 hover:text-blue-700" onclick="openEditModal({{ $data->id }})">Edit</button>
                                    <button class="text-red-500 hover:text-red-700" onclick="openDeleteModal({{ $data->id }})">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End example -->
                    @endforeach
                </div>
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
    <div id="editModal" class="fixed inset-0 bg-gray-800 bg-opacity-50  items-center justify-center hidden">
        <div class="bg-white rounded-lg p-8">
            <h2 class="text-2xl font-semibold mb-4">Edit Image</h2>
            <form id="editForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="file" id="editImage" name="image" accept="image/*" class="block w-full text-sm text-gray-700 border border-gray-300 rounded-md">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Save Changes</button>
            </form>
        </div>
    </div>

    <!-- Delete Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-gray-800 bg-opacity-50  items-center justify-center hidden">
        <div class="bg-white rounded-lg p-8">
            <h2 class="text-2xl font-semibold mb-4">Are you sure you want to delete this image?</h2>
            <div class="flex justify-end space-x-4">
                <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded-md" onclick="closeDeleteModal()">No</button>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function openEditModal(imageId) {
        const editForm = document.getElementById('editForm');
        editForm.action = `/galery/${imageId}`;
        document.getElementById('editImageId').value = imageId;
        document.getElementById('editModal').classList.remove('hidden');
        document.getElementById('editModal').classList.add('flex');
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }

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
@endsection

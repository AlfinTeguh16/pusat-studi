@extends('admin.master')

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
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <style>
    /* Custom CSS untuk galeri */
    .gallery-card {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .gallery-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .gallery-card .button-group button {
      transition: color 0.3s ease;
    }

    .gallery-card .button-group button:hover {
      color: rgba(59, 130, 246);
    }
  </style>
</head>
<body class="p-3 sm:ml-64">

        <div class="border border-gray-300 rounded-lg p-4">
            <div class="container mx-auto py-6">
                <h1 class="text-3xl font-bold mb-8 text-center">Gallery</h1>

                <div class="border border-gray-300 rounded-lg p-4">
                    <!-- Create Form -->
                <div class="mb-8">
                    <h2 class="text-lg font-semibold mb-2">Add Image</h2>
                    <form action="#" method="POST" enctype="multipart/form-data" class="space-y-2">
                      <div class="flex items-center space-x-4">
                        <input type="file" id="image" name="image" accept="image/*" class="flex-grow">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300">Upload</button>
                      </div>
                    </form>
                  </div>
                </div>

                <div class="border border-gray-300 rounded-lg p-4">

                <!-- Gallery -->
                <div class="grid grid-cols-3 gap-8">
                    <!-- Example of an image card -->
                    <div class="gallery-card bg-white rounded-lg shadow-md overflow-hidden transition duration-300 transform hover:scale-105">
                      <img src="{{ asset('asset/images/galery2.JPG') }}" alt="Example Image" class="w-full h-48 object-cover">
                      <div class="p-4">
                        <h3 class="text-lg font-semibold mb-2">Image Title</h3>
                        <div class="flex justify-between items-center">
                          <span class="text-sm text-gray-500">Uploaded on May 9, 2024</span>
                          <div class="button-group">
                            <button class="text-blue-500 hover:text-blue-700">Edit</button>
                            <button class="text-red-500 hover:text-red-700">Delete</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- End example -->
                     <!-- Example of an image card -->
                     <div class="gallery-card bg-white rounded-lg shadow-md overflow-hidden transition duration-300 transform hover:scale-105">
                      <img src="{{ asset('asset/images/desa-batuan-A.jpg') }}" alt="Example Image" class="w-full h-48 object-cover">
                      <div class="p-4">
                        <h3 class="text-lg font-semibold mb-2">Image Title</h3>
                        <div class="flex justify-between items-center">
                          <span class="text-sm text-gray-500">Uploaded on May 9, 2024</span>
                          <div class="button-group">
                            <button class="text-blue-500 hover:text-blue-700">Edit</button>
                            <button class="text-red-500 hover:text-red-700">Delete</button>
                          </div>
                        </div>
                      </div>
                    </div>
                     <!-- Example of an image card -->
                     <div class="gallery-card bg-white rounded-lg shadow-md overflow-hidden transition duration-300 transform hover:scale-105">
                      <img src="{{ asset('asset/images/galery4.JPG') }}" alt="Example Image" class="w-full h-48 object-cover">
                      <div class="p-4">
                        <h3 class="text-lg font-semibold mb-2">Image Title</h3>
                        <div class="flex justify-between items-center">
                          <span class="text-sm text-gray-500">Uploaded on May 9, 2024</span>
                          <div class="button-group">
                            <button class="text-blue-500 hover:text-blue-700">Edit</button>
                            <button class="text-red-500 hover:text-red-700">Delete</button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- You can replicate the above structure for each image in your gallery -->
                  </div>
                </div>
          </div>
                  </div>


    <div class="border border-gray-300 rounded-lg p-4">
        <div class="container mx-auto py-6">
            <h1 class="text-3xl font-bold mb-8 text-center">User Activity</h1>

            <!-- Activity Table -->
            <div class="overflow-x-auto bg-white rounded-lg shadow-md">
              <table class="w-full whitespace-nowrap">
                <thead>
                  <tr class="text-left font-bold">
                    <th class="px-6 py-3 text-sm uppercase tracking-wider">Nama User</th>
                    <th class="px-6 py-3 text-sm uppercase tracking-wider">Aktivitas</th>
                    <th class="px-6 py-3 text-sm uppercase tracking-wider">Tanggal Upload</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Data -->
                  <tr>
                    <td class="border px-6 py-4">John Doe</td>
                    <td class="border px-6 py-4">Upload File</td>
                    <td class="border px-6 py-4">2024-05-09</td>
                  </tr>
                  <tr>
                    <td class="border px-6 py-4">Jane Smith</td>
                    <td class="border px-6 py-4">Upload Image</td>
                    <td class="border px-6 py-4">2024-05-08</td>
                  </tr>
                  <!-- End Data -->
                </tbody>
              </table>
            </div>

            <!-- Pagination -->
            <div class="flex justify-center items-center mt-8">
              <a href="#" class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600">1</a>
              <a href="#" class="px-3 py-1 bg-gray-200 text-gray-700 rounded-md ml-2 hover:bg-gray-300">2</a>
              <a href="#" class="px-3 py-1 bg-gray-200 text-gray-700 rounded-md ml-2 hover:bg-gray-300">3</a>
              <!-- Previous Button -->
              <a href="#" class="px-3 py-1 bg-gray-200 text-gray-700 rounded-md ml-2 hover:bg-gray-300">&laquo;</a>
              <!-- Next Button -->
              <a href="#" class="px-3 py-1 bg-gray-200 text-gray-700 rounded-md ml-2 hover:bg-gray-300">&raquo;</a>
            </div>
          </div>
    </div>




</body>
</html>
@endsection

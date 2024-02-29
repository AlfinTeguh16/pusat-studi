<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Pusat Studi</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Include Glider.js for carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/glide.min.js"></script>
    <script type="text/javascript" src="https://static.sketchfab.com/api/sketchfab-viewer-1.12.1.js"></script>
    <style>
        /* Custom Styles */
        .navbar-bg {
            background-color: transparent;
            transition: background-color 0.2s ease;
        }
        .nav-link {
            color: #fff;
        }
        .nav-link:hover {
            color: #cbd5e0;
        }
        .carousel-container {
            position: relative;
        }
        .section {
            padding: 100px 0;
            text-align: center;
        }
        .section h2 {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .section p {
            font-size: 1.2rem;
            color: #555;
        }
    </style>

        <style>
            /* Tambahkan transisi untuk perubahan warna */
            .navbar {
            transition: background-color 0.3s ease; /* Ubah 0.3s sesuai kebutuhan Anda */
            width: 100%; /* Atur lebar navbar menjadi 100% */
            }

            /* Atur gaya untuk navbar yang di-scroll */
            .navbar.scrolled {
            background-color: rgba(181, 30, 30, 0.7); /* Warna hitam dengan transparansi */
            height: 10px; /* Sesuaikan tinggi navbar yang diinginkan */
            }
        </style>
 @yield('style')
</head>
<body>
@yield('content')
<nav class="navbar bg-transparent py-4 fixed top-0 w-full z-10" id="navbar">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-7">
              <!-- Logo -->
              <div class="flex-shrink-0">
                <a href="#" class="text-white font-bold text-lg">Logo</a>
              </div>
            <div class="hidden md:block">
                <div class="container mx-auto flex justify-between items-center">

                    <ul class="hidden md:flex flex-wrap space-x-4">
                        <li><a href="#home" class="nav-link">Home</a></li>
                        <li><a href="#about" class="nav-link">About</a></li>
                        <li><a href="#event" class="nav-link">Event</a></li>
                        <li><a href="#gallery" class="nav-link">Gallery</a></li>
                        <li><a href="#team" class="nav-link">Team</a></li>
                        <li><a href="#meta" class="nav-link">Meta Data</a></li>
                        <li><a href="#contact" class="nav-link">Contact</a></li>
                        <li><a href="/login" class="nav-link">Login</a></li>
                    </ul>
                </div>
            </div>
             <!-- Tombol Menu untuk Mobile -->
             <div class="md:hidden">
                <button class="text-white focus:outline-none">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                  </svg>
                </button>
              </div>
        </div>
    </div>
    </nav>

    {{-- <div>
        @extends('home.pusatstudi')
    </div> --}}
     {{-- scroll --}}
     <script>window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
          var navbar = document.getElementById("navbar");
          if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            navbar.classList.add("bg-black");
          } else {
            navbar.classList.remove("bg-black");
          }
        }
        </script>
        <script>
            const readMoreButton = document.getElementById('read-more');
            const additionalDescription = document.getElementById('additional-description');

            readMoreButton.addEventListener('click', function() {
                additionalDescription.classList.toggle('hidden');
                if (additionalDescription.classList.contains('hidden')) {
                    readMoreButton.textContent = 'Read More';
                } else {
                    readMoreButton.textContent = 'Read Less';
                }
            });
        </script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
@yield('script')
</body>
</html>

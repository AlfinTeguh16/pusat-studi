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
        <script src="https://unpkg.com/@phosphor-icons/web"></script>
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
        /* .section {
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
        } */
    </style>

 @yield('style')
</head>
<body>
@yield('content')
<nav id="navbar" class=" font-sans bg-white fixed w-full z-20 top-0 start-0 border-b border-gray-200 drop-shadow-lg ">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="{{ url('/') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="{{ asset('asset/images/Vertical-Logo-instiki-1024x1024.png') }}" alt="" class="max-w-12 max-h-12">
        <img src="{{ asset('asset/images/pusat-studi-logo.png') }}" alt="" class=" filter invert max-h-10 w-32 sm:w-44 md:w-48 lg:w-52 ">
    </a>
    <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
        @if (Auth::check())
        @if (Auth::user()->level == 1)
            <button type="button" onclick="window.location.href='/dashboard'" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center">Dashboard</button>
        @elseif (Auth::user()->level == 2)
            <button type="button" onclick="window.location.href='/admin'" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center">Admin</button>
        @endif
    @else
        <button type="button" onclick="window.location.href='/login'" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center">Login</button>
    @endif
    

        <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 " aria-controls="navbar-sticky" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
          </svg>
      </button>
    </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
      <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border  rounded-lg  md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 ">
        <li>
          <a href="{{ url('/') }}" id="navtext" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0" aria-current="page">Home</a>
        </li>
        <li>
          <a href="#about" id="navtext" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0">About</a>
        </li>
        <li>
            <a href="#gallery" id="navtext" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 ">Gallery</a>
        </li>
        <li>
            <a href="#team" id="navtext" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 ">Team</a>
        </li>
        <li>
          <a href="{{ url('/meta') }}" id="navtext" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 ">Meta Data</a>
        </li>
        <li>
          <a href="{{ url('/events') }}" id="navtext" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 ">Event</a>
        </li>
        <li>
          <a href="{{ url('/products') }}" id="navtext" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 ">Produk</a>
        </li>
        <li>
          <a href="#contact" id="navtext" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 ">Contact</a>
        </li>
      </ul>
    </div>
    </div>
  </nav>

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

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const navbarToggle = document.querySelector("[data-collapse-toggle]");
                const navbar = document.getElementById("navbar-sticky");

                navbarToggle.addEventListener("click", function() {
                    const expanded = this.getAttribute("aria-expanded") === "true";

                    // Toggle menu visibility
                    navbar.classList.toggle("hidden", !expanded);
                    navbarToggle.setAttribute("aria-expanded", !expanded);
                });

                // Close the menu when clicking outside of it
                document.addEventListener("click", function(event) {
                    const isClickInsideNavbar = navbar.contains(event.target);
                    const isClickOnNavbarToggle = navbarToggle.contains(event.target);

                    if (!isClickInsideNavbar && !isClickOnNavbarToggle) {
                        navbar.classList.add("hidden");
                        navbarToggle.setAttribute("aria-expanded", "false");
                    }
                });
            });
        </script>
        <script>document.addEventListener("DOMContentLoaded", function() {
            const navbar = document.querySelector('nav');

            // Mengubah kelas navbar ketika halaman digulir
            window.addEventListener('scroll', function() {
                if (window.scrollY > 50) {
                    navbar.classList.add('navbar-scrolled');
                    navbar.classList.remove('navbar-transparent');
                } else {
                    navbar.classList.add('navbar-transparent');
                    navbar.classList.remove('navbar-scrolled');
                }
            });
        });
        </script>

    {{-- <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script> --}}
@yield('script')
</body>
</html>

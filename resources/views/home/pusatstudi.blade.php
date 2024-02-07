<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Contoh Landing Page dengan Tailwind CSS">
    <title>Landing Page</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Include Glider.js for carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/glide.min.js"></script>
    <style>
        /* Custom Styles */
        .navbar-bg {
            background-color: #1a202c;
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
    </style>
</head>
<body class="bg-gray-100">

    <!-- Header with Carousel and Navbar -->
    <header class="carousel-container">
        <!-- Navbar -->
        <nav class="navbar-bg py-4 absolute w-full z-10">
            <div class="container mx-auto flex justify-between items-center">
                <div>
                    <span class="text-2xl font-bold text-white">HURUF BALI</span>
                </div>
                <div class="hidden md:block">
                    <ul class="flex space-x-4">
                        <li><a href="#" class="nav-link">Home</a></li>
                        <li><a href="#" class="nav-link">About</a></li>
                        <li><a href="#" class="nav-link">Event Gallery</a></li>
                        <li><a href="#" class="nav-link">Team</a></li>
                        <li><a href="#" class="nav-link">Meta Data</a></li>
                        <li><a href="#" class="nav-link">Contact</a></li>
                        <li><a href="/login" class="nav-link">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Carousel -->
        <div class="glide h-screen">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    <li class="glide__slide">
                        <img class="object-cover object-center w-full h-auto max-h-screen" src="asset/images/latarmerah.jpg" alt="Slide 1">
                    </li>
                    <li class="glide__slide">
                        <img class="object-cover object-center w-full h-auto max-h-96" src="https://via.placeholder.com/800x400?text=Slide+2" alt="Slide 2">
                    </li>
                    <li class="glide__slide">
                        <img class="object-cover object-center w-full h-auto max-h-96" src="https://via.placeholder.com/800x400?text=Slide+3" alt="Slide 3">
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <!-- Initialize Glide.js for carousel -->
    <script>
        new Glide('.glide', {
            type: 'carousel',
            autoplay: 2000,
            hoverpause: true,
            perView: 1,
            animationDuration: 1000,
            animationTimingFunc: 'ease'
        }).mount();
    </script>
</body>
</html>

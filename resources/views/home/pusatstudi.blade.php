
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website</title>
    <!-- Tambahkan link CSS Tailwind -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Tambahkan link CSS Owl Carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
</head>

<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-blue-500 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo atau judul website -->
            <a href="#" class="text-white text-lg font-bold">Logo/Brand</a>

            <!-- Menu Navbar -->
            <div class="flex space-x-4">
                <a href="#about" class="text-white">About Us</a>
                <a href="#team" class="text-white">Team</a>
                <a href="#gallery" class="text-white">Gallery</a>
                <a href="#contact" class="text-white">Contact</a>
            </div>
        </div>
    </nav>

    <!-- Carousel Landing Page -->
    <div class="owl-carousel owl-theme">
        <div class="item"><img src="image1.jpg" alt="Image 1"></div>
        <div class="item"><img src="image2.jpg" alt="Image 2"></div>
        <div class="item"><img src="image3.jpg" alt="Image 3"></div>
    </div>

    <!-- About Us -->
    <section id="about" class="py-12">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold mb-6">About Us</h2>
            <!-- Isi tentang kami di sini -->
        </div>
    </section>

    <!-- Team -->
    <section id="team" class="py-12 bg-gray-200">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold mb-6">Team</h2>
            <!-- Daftar tim di sini -->
        </div>
    </section>

    <!-- Galeri -->
    <section id="gallery" class="py-12">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold mb-6">Gallery</h2>
            <!-- Galeri gambar di sini -->
        </div>
    </section>

    <!-- Contact -->
    <section id="contact" class="py-12 bg-gray-200">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold mb-6">Contact</h2>
            <!-- Formulir kontak atau informasi kontak di sini -->
        </div>
    </section>

    <!-- Tambahkan script Owl Carousel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        // Inisialisasi Owl Carousel
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
    </script>

</body>

</html>

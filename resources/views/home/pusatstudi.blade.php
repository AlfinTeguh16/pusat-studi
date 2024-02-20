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
            background-color: rgba(0, 0, 0, 0.7); /* Warna hitam dengan transparansi */
            height: 10px; /* Sesuaikan tinggi navbar yang diinginkan */
            }
        </style>

</head>

<body class="bg-gray-100">

<!-- Header with Carousel and Navbar -->
<header class="carousel-container relative">
    {{-- Navbar --}}
    <nav class="navbar bg-transparent py-4 fixed top-0 w-full z-10" id="navbar">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-16">
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

    <!-- Carousel -->
    <div class="glide h-screen">
        <div class="glide__track" data-glide-el="track">
            <ul class="glide__slides">
                <li class="glide__slide relative">
                    <img class="object-cover object-center w-full h-auto max-h-screen" src="asset/images/1.jpg"
                        alt="Slide 1">
                    <div class="absolute inset-0 bg-red-500 opacity-50"></div>
                    <div class="absolute inset-0 flex flex-col justify-center items-center text-center">
                        <h1 class="text-white text-4xl md:text-6xl font-bold mb-4">Welcome to Huruf Bali</h1>
                        <p class="text-white text-lg md:text-xl mb-8">Discover the beauty of Balinese culture</p>
                        <a href="#about" class="btn btn-primary text-lg font-semibold py-3 px-6 rounded-full transition duration-300 ease-in-out bg-transparent border-2 border-white hover:bg-white hover:text-blue-500">Learn More</a>
                    </div>
                </li>
                <!-- Tambahkan slide lainnya di sini -->
            </ul>
        </div>
    </div>
</header>


    <!-- About Section -->
    <section id="about" class="section bg-gray-100 py-16">
        <div class="container mx-auto">
            <div class="flex flex-col lg:flex-row items-center justify-between">
                <!-- Gambar di sebelah kiri -->
                <div class="w-full lg:w-1/2 mb-8 lg:mb-0 lg:mr-12">
                    <img src="asset/images/wayang.jpg" alt="About Image" class="w-full h-auto rounded-lg shadow-md">
                </div>
                <!-- Deskripsi di sebelah kanan -->
                <div class="w-full lg:w-1/2 px-4 lg:px-0">
                    <h2 class="text-4xl lg:text-5xl font-bold mb-6 text-center lg:text-left">About Us</h2>
                    <p class="text-lg text-gray-800 leading-relaxed mb-6">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eget tortor a turpis pharetra faucibus. Nullam auctor sagittis tortor, vitae fermentum enim volutpat a. Donec sit amet elit a orci iaculis finibus. Duis vehicula augue ac ex sagittis, non fermentum odio hendrerit. Proin lacinia lorem a eros interdum, sit amet fermentum sapien blandit.
                    </p>
                    <p class="text-lg text-gray-800 leading-relaxed mb-6">
                        Phasellus posuere mattis ipsum, in aliquet eros facilisis vel. Phasellus tincidunt magna ut velit rutrum feugiat. Nulla facilisi. Aenean vitae est eget velit varius fermentum. Fusce at est lacus. Praesent nec neque sem. Proin vehicula, tortor a laoreet pharetra, ipsum dolor porttitor magna, non tincidunt eros ex sit amet risus.
                    </p>
                    <p class="text-lg text-gray-800 leading-relaxed mb-6">
                        Praesent elementum interdum nisi. Duis suscipit purus id gravida hendrerit.
                    </p>
                    <div class="text-center lg:text-left">
                        <a href="#" class="text-blue-500 font-semibold hover:text-blue-700 transition duration-300">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <!-- Event Section -->
   <!-- Event Section -->
<section id="event" class="section bg-gray-200 py-16">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold text-center mb-8">Upcoming Events</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Event 1 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                <img src="asset/images/wayang.jpg" alt="Event 1" class="w-full h-64 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-bold mb-2">Event Title 1</h3>
                    <p class="text-gray-700">Date: January 10, 2024</p>
                    <p class="text-gray-700">Location: City Hall</p>
                    <p class="mt-2">Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris rutrum vitae lacus non placerat.</p>
                </div>
            </div>
            <!-- Event 2 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                <img src="asset/images/wayang.jpg" alt="Event 2" class="w-full h-64 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-bold mb-2">Event Title 2</h3>
                    <p class="text-gray-700">Date: February 15, 2024</p>
                    <p class="text-gray-700">Location: Convention Center</p>
                    <p class="mt-2">Description: Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.</p>
                </div>
            </div>
            <!-- Event 3 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                <img src="asset/images/wayang.jpg" alt="Event 3" class="w-full h-64 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-bold mb-2">Event Title 3</h3>
                    <p class="text-gray-700">Date: March 20, 2024</p>
                    <p class="text-gray-700">Location: Community Center</p>
                    <p class="mt-2">Description: Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos.</p>
                </div>
            </div>
            <!-- Repeat Events as needed -->
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section id="gallery" class="section bg-gray-100 py-16">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold text-center mb-8">Gallery</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <!-- Gallery Item 1 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                <img src="asset/images/wayang.jpg" alt="Gallery Image 1" class="w-full h-64 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-bold mb-2">Image Title</h3>
                    <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>
            <!-- Gallery Item 2 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                <img src="asset/images/wayang.jpg" alt="Gallery Image 2" class="w-full h-64 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-bold mb-2">Image Title</h3>
                    <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>
            <!-- Gallery Item 3 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                <img src="asset/images/wayang.jpg" alt="Gallery Image 3" class="w-full h-64 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-bold mb-2">Image Title</h3>
                    <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>
            <!-- Repeat Gallery Items as needed -->
        </div>
    </div>
</section>


   <!-- Team Section -->
<section id="team" class="section bg-gray-100 py-16">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold text-center mb-8">Our Team</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            <!-- Team Member 1 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                <img src="asset/images/wayang.jpg" alt="Team Member 1" class="w-full h-64 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-bold mb-2">John Doe</h3>
                    <p class="text-gray-700">CEO</p>
                </div>
            </div>
            <!-- Team Member 2 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                <img src="asset/images/wayang.jpg" alt="Team Member 2" class="w-full h-64 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-bold mb-2">Jane Doe</h3>
                    <p class="text-gray-700">CTO</p>
                </div>
            </div>
            <!-- Team Member 3 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                <img src="asset/images/wayang.jpg" alt="Team Member 3" class="w-full h-64 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-bold mb-2">Alice Smith</h3>
                    <p class="text-gray-700">Designer</p>
                </div>
            </div>
            <!-- Team Member 4 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                <img src="asset/images/wayang.jpg" alt="Team Member 4" class="w-full h-64 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-bold mb-2">Bob Johnson</h3>
                    <p class="text-gray-700">Developer</p>
                </div>
            </div>
            <!-- Repeat Team Members as needed -->
        </div>
    </div>
</section>


    <!-- Meta Data Section -->
    <section id="meta" class="section bg-white">
        <div class="container mx-auto">
            <h2>Meta Data</h2>
            <p>This is the Meta Data section. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="section bg-gray-200">
            <div class="container mx-auto">
                <div class="text-center">
                    <h2 class="text-3xl font-semibold text-gray-800">Kritik dan Saran</h2>
                    <h3 class="text-lg text-gray-600">Terimakasih.</h3>
                </div>
                <!-- Form -->
                <form id="contactForm" class="mt-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex flex-col">
                            <!-- Name input -->
                            <input class="form-input border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-500" id="name" type="text" placeholder="Your Name *" required>
                            <div class="text-red-500 mt-1 text-sm hidden" id="name-error">A name is required.</div>
                        </div>
                        <div class="flex flex-col">
                            <!-- Email input -->
                            <input class="form-input border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-500" id="email" type="email" placeholder="Your Email *" required>
                            <div class="text-red-500 mt-1 text-sm hidden" id="email-error">An email is required.</div>
                            <div class="text-red-500 mt-1 text-sm hidden" id="email-error-invalid">Email is not valid.</div>
                        </div>
                        <div class="flex flex-col">
                            <!-- Phone number input -->
                            <input class="form-input border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-500" id="phone" type="tel" placeholder="Your Phone *" required>
                            <div class="text-red-500 mt-1 text-sm hidden" id="phone-error">A phone number is required.</div>
                        </div>
                        <div class="flex flex-col">
                            <!-- Message input -->
                            <textarea class="form-textarea border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-500" id="message" placeholder="Your Message *" required></textarea>
                            <div class="text-red-500 mt-1 text-sm hidden" id="message-error">A message is required.</div>
                        </div>
                    </div>
                    <!-- Submit Button-->
                    <div class="text-center mt-8">
                        <button class="btn btn-primary btn-xl text-uppercase py-3 px-8 rounded-md bg-blue-500 text-white focus:outline-none disabled" id="submitButton" type="submit">Send Message</button>
                    </div>
                </form>
                <!-- Submit success message-->
                <div class="hidden" id="submitSuccessMessage">
                    <div class="text-center text-green-500 mt-4">Form submission successful!</div>
                </div>
                <!-- Submit error message-->
                <div class="hidden" id="submitErrorMessage">
                    <div class="text-center text-red-500 mt-4">Error sending message!</div>
                </div>
            </div>

    </section>
    <footer class="bg-gray-800 text-white py-12">
        <div class="container mx-auto flex flex-col md:flex-row items-center justify-center">
            <div class="md:w-1/3 text-center md:text-left mb-4 md:mb-0">
                <h3 class="text-xl font-semibold">Tentang Kami</h3>
                <p class="mt-2">Kami adalah perusahaan yang bergerak di bidang teknologi informasi yang berkomitmen untuk memberikan solusi terbaik bagi pelanggan kami.</p>
            </div>
            <div class="md:w-1/3 text-center mb-4 md:mb-0">
                <h3 class="text-xl font-semibold">Hubungi Kami</h3>
                <p class="mt-2">Alamat: Jl. Contoh No. 123, Kota, Negara<br>
                Email: info@contoh.com<br>
                Telepon: (123) 456-7890</p>
            </div>
            <div class="md:w-1/3 text-center md:text-right">
                <h3 class="text-xl font-semibold">Ikuti Kami</h3>
                <div class="mt-2 flex justify-center md:justify-end">
                    <a href="#" class="mr-4"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="mr-4"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="mr-4"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="mr-4"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
        </div>
        <div class="mt-8 text-center">
            <p>&copy; 2024 Contoh Perusahaan. All Rights Reserved.</p>
        </div>
    </footer>


    <!-- Initialize Glide.js for carousel -->
    <script>
        new Glide('.glide', {
            type: 'carousel',
            autoplay: 3000,
            hoverpause: true,
            perView: 1,
            animationDuration: 1000,
            animationTimingFunc: 'ease'
        }).mount();
    </script>

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

</body>

</html>

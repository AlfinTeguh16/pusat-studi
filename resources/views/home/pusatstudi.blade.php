@extends('home.master')
@section('judul')
@endsection

@section('script')
<script>
    // JavaScript initialization for Glide.js
    new Glide('.glide', {
        type: 'carousel',
        startAt: 0,
        perView: 1,
        autoplay: 5000,
        hoverpause: true
    }).mount();
</script>
@endsection

@section('style')

@endsection

@section('content')
    <!-- Header with Carousel and Navbar -->
    <header class="carousel-container relative">
        <!-- Carousel -->
        <div class="glide">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    <li class="glide__slide relative">
                        <img class="object-cover object-center w-full h-auto max-h-screen" src="asset/images/1.jpg"
                            alt="Slide 1">
                    </li>
                    <li class="glide__slide relative">
                        <img class="object-cover object-center w-full h-auto max-h-screen" src="asset/images/2.jpg"
                            alt="Slide 2">
                    </li>
                    <li class="glide__slide relative">
                        <img class="object-cover object-center w-full h-auto max-h-screen" src="asset/images/3.jpg"
                            alt="Slide 3">
                    </li>
                    <!-- Add more slides here -->
                </ul>
            </div>
        </div>
        <div class="absolute inset-0 bg-red-500 opacity-50"></div>
        <div class="absolute inset-0 flex flex-col justify-center items-center text-center">
            <h1 class="text-white text-4xl md:text-6xl font-bold mb-4">Pusat Studi Digitalisasi</h1>
            <p class="text-white text-4xl md:text-6xl font-bold mb-8">Budaya Bali</p>
            <a href="#about" class="btn btn-primary text-lg font-semibold py-3 px-6 rounded-full transition duration-300 ease-in-out bg-transparent border-2 border-white text-white hover:bg-white hover:text-blue-500">Learn More</a>
        </div>
    </header>



    <!-- About Section -->
    <section id="about" class="section bg-white">
        <div class="container mx-auto">
            <h2>About Us</h2>
            <div class="flex flex-col lg:flex-row items-center justify-between border border-gray-300 rounded-lg p-6">
                <!-- Gambar di sebelah kiri -->
                <div class="w-full lg:w-1/2 mb-8 lg:mb-0 lg:mr-12">
                    <img src="asset/images/about.jpg" alt="About Image" class="w-full h-auto rounded-lg shadow-md">
                </div>
                <!-- Deskripsi di sebelah kanan -->
                <div class="md:w-1/2 p-4">
                    <div class="max-w-lg mx-auto text-justify text-sm">
                        <p class="text-gray-600 mb-4 ">Keanekaragaman budaya yang ada di Indonesia merupakan salah satu kebanggaan warisan kebudayaan yang turun temurun oleh berbagai suku dan etnis. Kebudayaan bisa diwarisi jika dipelajari dan disosialisasikan dengan baik ke masyarakat. Kekuatan yang terbesar yang dimiliki Indonesia terletak pada kekayaan budaya beragam. Dalam melestarikan budaya, peran pemerintah dan masyarakat sudah sepatutnya dikembangkan. Digitalisasi budaya merupakan suatu langkah untuk mempertahankan warisan budaya agar tetap ada, dikenal, dan mampu diterapkan dalam setiap aspek kehidupan. Pusat Studi Digitalisasi Budaya Bali merupakan lintas keilmuan yang bergerak dalam merancang, meneliti, mengkaji dan mempublikasikan berbagai temuan berbasis budaya yang sejalan dengan visi dan misi dari STMIK STIKOM Indonesia. Pengajuan Pusat Studi Digitalisasi Budaya Bali mengacu pada Peraturan Menteri Riset Dan Sastra Bali Serta Penyelenggaraan Bulan Bahasa Bali</p>
                        <p class="text-gray-600">Peluang – peluang penelitian yang mampu diterapkan dalam digitalisasi warisan budaya antara lain: 1. Digitalisasi naskah dan lontar kuno, bangunan, tarian, benda pusaka, artfak, ke dalam berbagai media. 2. Melakukan kajian dan analisis terhadap penerapan teknologi dalam digitalisasi warisan budaya sehingga diharapkan hasil kajian mampu menjadi kebijakan yang bermanfaat untuk masyarakat dalam menjaga warisan budaya. 3. Mengadakan Seminar Nasional atau International, sosialisasi, pelatihan dan publikasi terkait ruang lingkup pusat studi Digitalisasi Budaya Bali.

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

   <!-- Event Section -->
   <section id="meta" class="flex items-center justify-center py-4 md:py-8 flex-wrap">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center mb-8">Event</h2>
            <div class="center">
                <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 overflow-x-auto">
                        @foreach ($event as $data)
                        {{-- @if ($data->nidn === Auth::user()->nidn) --}}
                            <div class="w-full flex flex-col rounded-md bg-gray-200 p-3 my-2 hover:bg-gray-400 hover:duration-150 hover:shadow-xl">
                                <a href="{{ route('detailEvent', $data->id) }}">
                                    <div class="flex justify-start flex-col">
                                        <div class="flex">
                                            <h2 class="font-semibold">{{ $data->judul }}</h2>
                                        </div>
                                    </div>
                                    @if($data->gambar)
                                        <div class="relative w-full h-0 aspect-w-16 aspect-h-9 mb-4">
                                        <img src="{{ asset('storage/' . $data->gambar) }}" class="absolute inset-0 w-full h-full object-cover rounded-lg">
                                        </div>
                                    @endif

                                    <div class="flex">
                                        <p id="deskripsi" class="deskripsi">{{ $data->deskripsi }}</p>
                                    </div>
                                    <div class="flex justify-start w-full">
                                        <a href="{{ route('viewMetaData', $data->id) }}"
                                            class="flex flex-row bg-sky-400 hover:bg-sky-600 justify-center items-center p-2 w-full rounded-md">
                                            <span class="flex font-semibold">Lihat</span>
                                            <i class="ph-bold ph-caret-right"></i>
                                        </a>
                                    </div>

                                </a>
                            </div>
                        {{-- @endif --}}
                    @endforeach

                    </div>
                    <div class="flex justify-center items-center">
                        <div class="text-center mt-8">
                        <a href="/events" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Lihat lebih banyak</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


<!-- Gallery Section -->
<section id="gallery" class="section bg-gray-100 py-16">


<div class="grid grid-cols-2 md:grid-cols-3 gap-4">
    <div>
        <img class="h-auto max-w-full rounded-lg" src="asset/images/galery1.jpg" alt="">
    </div>
    <div>
        <img class="h-auto max-w-full rounded-lg" src="asset/images/galery3.jpg" alt="">
    </div>
    <div>
        <img class="h-auto max-w-full rounded-lg" src="asset/images/galery2.jpg" alt="">
    </div>
    <div>
        <img class="h-auto max-w-full rounded-lg" src="asset/images/galery4.jpg" alt="">
    </div>
    <div>
        <img class="h-auto max-w-full rounded-lg" src="asset/images/galery5.jpg" alt="">
    </div>
    <div>
        <img class="h-auto max-w-full rounded-lg" src="asset/images/galery6.jpg" alt="">
    </div>
    <div>
        <img class="h-auto max-w-full rounded-lg" src="asset/images/galery7.jpg" alt="">
    </div>
    <div>
        <img class="h-auto max-w-full rounded-lg" src="asset/images/galery8.jpg" alt="">
    </div>
    <div>
        <img class="h-auto max-w-full rounded-lg" src="asset/images/galery9.jpg" alt="">
    </div>
    <div>
        <img class="h-auto max-w-full rounded-lg" src="asset/images/galery10.jpg" alt="">
    </div>
    <div>
        <img class="h-auto max-w-full rounded-lg" src="asset/images/galery12.jpg" alt="">
    </div>
    <div>
        <img class="h-auto max-w-full rounded-lg" src="asset/images/galery11.jpg" alt="">
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
                <img src="asset/images/about.jpg" alt="Team Member 1" class="w-full h-64 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-bold mb-2">John Doe</h3>
                    <p class="text-gray-700">CEO</p>
                </div>
            </div>
            <!-- Team Member 2 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                <img src="asset/images/about.jpg" alt="Team Member 2" class="w-full h-64 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-bold mb-2">Jane Doe</h3>
                    <p class="text-gray-700">CTO</p>
                </div>
            </div>
            <!-- Team Member 3 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                <img src="asset/images/about.jpg" alt="Team Member 3" class="w-full h-64 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-bold mb-2">Alice Smith</h3>
                    <p class="text-gray-700">Designer</p>
                </div>
            </div>
            <!-- Team Member 4 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                <img src="asset/images/about.jpg" alt="Team Member 4" class="w-full h-64 object-cover">
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
    <section id="meta" class="flex items-center justify-center py-4 md:py-8 flex-wrap">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center mb-8">Meta Data</h2>
            <div class="center">
                <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 overflow-x-auto">
                        @foreach ($metaData as $data)
                        {{-- @if ($data->nidn === Auth::user()->nidn) --}}
                            <div class="w-full flex flex-col rounded-md bg-gray-200 p-3 my-2 hover:bg-gray-400 hover:duration-150 hover:shadow-xl">
                                <a href="{{ route('userMetaData', $data->id) }}">
                                    <div class="flex justify-start flex-col">
                                        <div class="flex">
                                            <h2 class="font-semibold">{{ $data->judul }}</h2>
                                        </div>
                                    </div>
                                    @if($data->gambar)
                                        <div class="relative w-full h-0 aspect-w-16 aspect-h-9 mb-4">
                                        <img src="{{ asset('storage/' . $data->gambar) }}" class="absolute inset-0 w-full h-full object-cover rounded-lg">
                                        </div>
                                    @endif

                                    <div class="flex">
                                        <p id="deskripsi" class="deskripsi">{{ $data->deskripsi }}</p>
                                    </div>
                                    <div class="flex justify-start w-full">
                                        <a href="{{ route('viewMetaData', $data->id) }}"
                                            class="flex flex-row bg-sky-400 hover:bg-sky-600 justify-center items-center p-2 w-full rounded-md">
                                            <span class="flex font-semibold">Lihat</span>
                                            <i class="ph-bold ph-caret-right"></i>
                                        </a>
                                    </div>

                                </a>
                            </div>
                        {{-- @endif --}}
                    @endforeach

                    </div>
                    <div class="flex justify-center items-center">
                        <div class="text-center mt-8">
                          <a href="/meta" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Lihat lebih banyak</a>
                        </div>
                      </div>
                </div>
            </div>

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

            <div class="md:w-1/3 text-center mb-4 md:mb-0">
                <h3 class="text-xl font-semibold">Hubungi Kami</h3>
                <p class="mt-2">Alamat: Jl. Tukad Pakerisan No.97, Panjer, Denpasar Selatan, Kota Denpasar, Bali 80225<br>
                Email: info@contoh.com<br>
                Telepon: (123) 456-7890</p>
            </div>

        </div>

    </footer>


    <script>
        // Ambil semua elemen dengan kelas "deskripsi"
        var deskripsiElements = document.querySelectorAll(".deskripsi");

        // Iterasi melalui setiap elemen dan potong teks jika lebih dari 20 karakter
        deskripsiElements.forEach(function (elem) {
            var deskripsiTeks = elem.textContent;

            if (deskripsiTeks.length > 20) {
                var potonganDeskripsi = deskripsiTeks.slice(0, 200);
                elem.textContent = potonganDeskripsi + "...";
            }
            // Jika kurang dari 20 karakter, biarkan teks asli tanpa ellipsis
        });
    </script>
@endsection

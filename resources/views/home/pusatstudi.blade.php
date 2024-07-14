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
                        <img class="object-cover object-center w-full h-auto max-h-screen" src="asset/images/Gedung-Depan-INSTIKI.jpg"
                            alt="Slide 1">
                    </li>
                    <li class="glide__slide relative">
                        <img class="object-cover object-center w-full h-auto max-h-screen" src="asset/images/P1200116.JPG"
                            alt="Slide 2">
                    </li>
                    <li class="glide__slide relative">
                        <img class="object-cover object-center w-full h-auto max-h-screen" src="asset/images/P1200116.JPG"
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
            <a href="#about" class="btn btn-primary text-lg font-semibold py-3 px-6 rounded-full transition duration-200 ease-in-out bg-transparent border-2 border-white text-white hover:bg-white hover:text-blue-500">Learn More</a>
        </div>
    </header>



    <!-- About Section -->
    <section id="about" class="section bg-white my-5">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center mb-8">About Us</h2>
            <div class="flex flex-col lg:flex-row items-center justify-between border border-gray-300 rounded-lg p-6">
                <!-- Gambar di sebelah kiri -->
                <div class="w-full lg:w-1/2 mb-8 lg:mb-0 lg:mr-12">
                    <img src="asset/images/about.webp" alt="About Image" class="w-full h-auto rounded-lg shadow-md">
                </div>
                <!-- Deskripsi di sebelah kanan -->
                <div class="md:w-1/2 p-4">
                    <div class="max-w-lg mx-auto text-justify text-sm">
                        <p class="text-gray-600 mb-4 ">Keanekaragaman budaya yang ada di Indonesia merupakan salah satu kebanggaan warisan kebudayaan yang turun temurun oleh berbagai suku dan etnis. Kebudayaan bisa diwarisi jika dipelajari dan disosialisasikan dengan baik ke masyarakat. Kekuatan yang terbesar yang dimiliki Indonesia terletak pada kekayaan budaya beragam. Dalam melestarikan budaya, peran pemerintah dan masyarakat sudah sepatutnya dikembangkan. Digitalisasi budaya merupakan suatu langkah untuk mempertahankan warisan budaya agar tetap ada, dikenal, dan mampu diterapkan dalam setiap aspek kehidupan. Pusat Studi Digitalisasi Budaya Bali merupakan lintas keilmuan yang bergerak dalam merancang, meneliti, mengkaji dan mempublikasikan berbagai temuan berbasis budaya yang sejalan dengan visi dan misi dari STMIK STIKOM Indonesia. Pengajuan Pusat Studi Digitalisasi Budaya Bali mengacu pada Peraturan Menteri Riset Dan Sastra Bali Serta Penyelenggaraan Bulan Bahasa Bali</p>
                        <p class="text-gray-600">Peluang - peluang penelitian yang mampu diterapkan dalam digitalisasi warisan budaya antara lain: 1. Digitalisasi naskah dan lontar kuno, bangunan, tarian, benda pusaka, artfak, ke dalam berbagai media. 2. Melakukan kajian dan analisis terhadap penerapan teknologi dalam digitalisasi warisan budaya sehingga diharapkan hasil kajian mampu menjadi kebijakan yang bermanfaat untuk masyarakat dalam menjaga warisan budaya. 3. Mengadakan Seminar Nasional atau International, sosialisasi, pelatihan dan publikasi terkait ruang lingkup pusat studi Digitalisasi Budaya Bali.

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

   <!-- Event Section -->
   {{-- <section id="meta" class="flex items-center justify-center py-4 md:py-8 flex-wrap">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center mb-8">Event</h2>
            <div class="center">
                <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 overflow-x-auto">
                        @foreach ($event as $data)

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

                                <div class="flex flex-grow">
                                    <p id="deskripsi" class="deskripsi">{{ $data->deskripsi }}</p>
                                </div>

                                <div class="flex justify-between items-end w-full mt-auto">
                                    <a href="{{ route('viewMetaData', $data->id) }}" class="flex flex-row bg-sky-400 hover:bg-sky-600 justify-center items-center p-2 w-full rounded-md">
                                        <span class="flex font-semibold">Lihat</span>
                                        <i class="ph-bold ph-caret-right"></i>
                                    </a>
                                </div>
                            </a>
                        </div>

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
    </section> --}}


<!-- Gallery Section -->
<section id="gallery" class="bg-gray-100 rounded-xl py-10 px-4 sm:px-6 lg:px-10 my-4 mx-4">
    <h2 class="text-3xl font-bold text-center mb-8">Galeri</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach ($galery as $data)
        <div class="overflow-hidden rounded-lg bg-gray-50 shadow-md">
            <img class="w-full h-auto object-cover" src="{{ $data->image }}" alt="">
            <p id="deskripsi-{{ $data->id }}" class="deskripsi text-justify p-4">{{ $data->imageDescription }}</p>
        </div>
        @endforeach
    </div>
</section>


   <!-- Team Section -->
<section id="team" class=" bg-gray-100 rounded-xl py-10 my-4 mx-4">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold text-center mb-8">Our Team</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            <!-- Team Member 1 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                <img src={{ asset('asset/images/about.webp') }} alt="Team Member 1" class="w-full h-64 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-bold mb-2">John Doe</h3>
                    <p class="text-gray-700">CEO</p>
                </div>
            </div>
            <!-- Team Member 2 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                <img src={{ asset('asset/images/about.webp') }} alt="Team Member 2" class="w-full h-64 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-bold mb-2">Jane Doe</h3>
                    <p class="text-gray-700">CTO</p>
                </div>
            </div>
            <!-- Team Member 3 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                <img src={{ asset('asset/images/about.webp') }} alt="Team Member 3" class="w-full h-64 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-bold mb-2">Alice Smith</h3>
                    <p class="text-gray-700">Designer</p>
                </div>
            </div>
            <!-- Team Member 4 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                <img src={{ asset('asset/images/about.webp') }} alt="Team Member 4" class="w-full h-64 object-cover">
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
                <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg ">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 overflow-x-auto">
                        @foreach ($karyas as $data)

                        <div class="w-full flex flex-col rounded-md bg-gray-200 p-3 my-2 hover:bg-gray-400 hover:duration-150 hover:shadow-xl">
                            <a href="{{ route('getMetaData', $data->id) }}">
                                <div class="flex justify-start flex-col">
                                    <div class="flex ">
                                        <h2 id="judul" class="judul font-semibold">{{ $data->judul }}</h2>
                                    </div>
                                </div>
                                @if($data->imageTitle)
                                <div class="relative w-full h-0 aspect-w-16 aspect-h-9 mb-4">
                                    <img src="{{ asset( $data->imageTitle) }}" class="absolute inset-0 w-full h-full object-cover rounded-lg">
                                </div>
                                @endif

                                <div class="flex flex-grow">
                                    <p id="deskripsi" class="deskripsi">{{ $data->description }}</p>
                                </div>

                                <div class="flex justify-between items-end w-full mt-auto">
                                    <a href="{{ route('viewMetaData', $data->id) }}" class="flex flex-row bg-sky-400 hover:bg-sky-600 justify-center items-center p-2 w-full rounded-md">
                                        <span class="flex font-semibold">Lihat</span>
                                        <i class="ph-bold ph-caret-right"></i>
                                    </a>
                                </div>
                            </a>
                        </div>

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

    <footer class="bg-gray-800 text-white py-12">
        <div class="container mx-auto flex flex-col md:flex-row items-center justify-center">

            <div class="md:w-1/3 text-center mb-4 md:mb-0">
                <h3 class="text-xl font-semibold">Hubungi Kami</h3>
                <p class="mt-2">Alamat: Jl. Tukad Pakerisan No.97, Panjer, Denpasar Selatan, Kota Denpasar, Bali 80225<br>
                Email: humas@instiki.ac.id<br>
                Telepon: +62 361-256-995</p>
            </div>

        </div>

    </footer>


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

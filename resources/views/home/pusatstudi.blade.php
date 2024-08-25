@extends('home.master')

@section('script')
<script>
    new Glide('.glide', {
        type: 'carousel',
        startAt: 0,
        perView: 1,
        autoplay: 5000,
        hoverpause: true
    }).mount();
</script>
@endsection


@section('content')


    <header class="carousel-container relative">
        <!-- Carousel -->
        <div class="glide">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    
                    @foreach ($carousel as $item)
                        <li class="glide__slide relative">
                            <img class="object-cover object-center w-full h-auto max-h-screen" src="{{ asset($item->image) }}" alt="{{ $item->title }}">
                        </li>
                    @endforeach
                   
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
                @if($about)
                    <div class="w-full lg:w-1/2 mb-8 lg:mb-0 lg:mr-12">
                        <img src="{{ asset($about->image) }}" alt="About Image" class="w-full h-auto rounded-lg shadow-md">
                    </div>
    
                    <div class="md:w-1/2 p-4">
                        <div class="max-w-lg mx-auto text-justify text-sm">
                            <p>{{ $about->imageDescription }}</p>
                        </div>
                    </div>
                @else
                    <div class="w-full text-center">
                        <p>No About Us content available.</p>
                    </div>
                @endif
            </div>
        </div>
    </section>
    

   <!-- Product Section -->
   <section id="events" class="flex items-center justify-center py-4 md:py-8 flex-wrap">

        @php
        $dataFound = false;
        @endphp
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center mb-8">Event</h2>
            <div class="center">
                <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg ">
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 overflow-x-auto">
                        @foreach ($events as $data)

                        @php
                        $dataFound = true;
                        @endphp

                        <div class="w-full flex flex-col rounded-md bg-gray-100 p-3 my-2 hover:bg-gray-200 hover:duration-150 hover:shadow-xl">
                            <a href="{{ route('getMetaData', $data->id) }}">
                                <div class="flex justify-start flex-col">
                                    <div class="flex ">
                                        <h2 id="judul" class="judul font-semibold">{{ $data->judul }}</h2>
                                    </div>
                                </div>
                                @if($data->imageTitle)
                                <div class="relative aspect-square mb-4">
                                    <img src="{{ asset( $data->imageTitle) }}" class="absolute inset-0 w-full h-full object-cover rounded-lg">
                                </div>
                                @endif

                                <div class="flex flex-grow my-2">
                                    <p id="deskripsi" class="deskripsi">{{ $data->description }}</p>
                                </div>

                                <div class="flex justify-between items-end w-full mt-auto">
                                    <a href="{{ route('viewGuestProduct', $data->id) }}" class="flex flex-row bg-sky-400 hover:bg-sky-600 justify-center items-center p-2 w-full rounded-md text-white">
                                        <span class="flex font-semibold">Lihat</span>
                                        <i class="ph-bold ph-caret-right"></i>
                                    </a>
                                </div>
                            </a>
                        </div>
                        @if (!$dataFound)
                            <div class="w-full flex flex-col justify-center rounded-md bg-gray-200 p-3 my-2 hover:bg-gray-300 hover:duration-150 hover:shadow-xl">
                                <p class="text-center text-red-500">Belum Ada Data Product</p>
                            </div>
                        @endif
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


<!-- Gallery Section -->
<section id="gallery" class="bg-gray-100 rounded-xl py-10 px-4 sm:px-6 lg:px-10 my-4 mx-4">
    
    <h2 class="text-3xl font-bold text-center mb-8">Galeri</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 ">

        @php
        $dataFound = false;
        @endphp

        @foreach ($gallery as $data)
 
            @php
            $dataFound = true;
            @endphp
            <div class="overflow-hidden rounded-lg bg-gray-50 shadow-md">
                <img class="w-full h-auto object-cover" src="{{ $data->image }}" alt="">
                <p id="deskripsi-{{ $data->id }}" class="deskripsi text-justify p-4">{{ $data->imageDescription }}</p>
            </div>
        @endforeach
        @if (!$dataFound)
            <div class="w-full flex flex-col justify-center rounded-md bg-gray-200 p-3 my-2 hover:bg-gray-300 hover:duration-150 hover:shadow-xl">
                <p class="text-center text-red-500">Belum Ada Data Galeri</p>
            </div>
        @endif
    </div>
</section>


   <!-- Team Section -->
<section id="team" class=" bg-gray-100 rounded-xl py-10 my-4 mx-4">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold text-center mb-8">Team</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 p-4">
            @php
            $dataFound = false;
            @endphp

            @foreach ($team as $data)

            @php
            $dataFound = true;
            @endphp

                <div class="bg-white rounded-lg overflow-hidden shadow-md">
                    <img src="{{ $data->image }}" alt="Team Member" class="w-full h-64 object-cover">
                    <div class="p-4">
                        <p class="text-gray-700 text-center font-bold">{{ $data->team }}</p>
                        <h3 class="text-xl  mb-2 text-center"> {{  $data->imageDescription  }} </h3>
                    </div>
                </div>

            @endforeach
            @if (!$dataFound)
                <div class="w-full flex flex-col justify-center rounded-md bg-gray-200 p-3 my-2 hover:bg-gray-300 hover:duration-150 hover:shadow-xl">
                    <p class="text-center text-red-500">Belum Ada Data Team</p>
                </div>
            @endif

            
        </div>
    </div>
</section>


    <!-- Meta Data Section -->
    <section id="meta" class="flex items-center justify-center py-4 md:py-8 flex-wrap">

        @php
        $dataFound = false;
        @endphp
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center mb-8">Meta Data</h2>
            <div class="center">
                <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg ">
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 overflow-x-auto">
                        @foreach ($karyas as $data)

                        @php
                        $dataFound = true;
                        @endphp

                        <div class="w-full flex flex-col rounded-md bg-gray-100 p-3 my-2 hover:bg-gray-200 hover:duration-150 hover:shadow-xl">
                            <a href="{{ route('getMetaData', $data->id) }}">
                                <div class="flex justify-start flex-col">
                                    <div class="flex ">
                                        <h2 id="judul" class="judul font-semibold">{{ $data->judul }}</h2>
                                    </div>
                                </div>
                                @if($data->imageTitle)
                                <div class="relative aspect-square mb-4">
                                    <img src="{{ asset( $data->imageTitle) }}" class="absolute inset-0 w-full h-full object-cover rounded-lg">
                                </div>
                                @endif

                                <div class="flex flex-grow my-2">
                                    <p id="deskripsi" class="deskripsi">{{ $data->description }}</p>
                                </div>

                                <div class="flex justify-between items-end w-full mt-auto">
                                    <a href="{{ route('viewMetaData', $data->id) }}" class="flex flex-row bg-sky-400 hover:bg-sky-600 justify-center items-center p-2 w-full rounded-md text-white">
                                        <span class="flex font-semibold ">Lihat</span>
                                        <i class="ph-bold ph-caret-right"></i>
                                    </a>
                                </div>
                            </a>
                        </div>
                        @if (!$dataFound)
                            <div class="w-full flex flex-col justify-center rounded-md bg-gray-200 p-3 my-2 hover:bg-gray-300 hover:duration-150 hover:shadow-xl">
                                <p class="text-center text-red-500">Belum Ada Meta Data</p>
                            </div>
                        @endif
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

    <!-- Product Section -->
    <section id="product" class="flex items-center justify-center py-4 md:py-8 flex-wrap">

        @php
        $dataFound = false;
        @endphp
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center mb-8">Product</h2>
            <div class="center">
                <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg ">
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 overflow-x-auto">
                        @foreach ($products as $data)

                        @php
                        $dataFound = true;
                        @endphp

                        <div class="w-full flex flex-col rounded-md bg-gray-100 p-3 my-2 hover:bg-gray-200 hover:duration-150 hover:shadow-xl">
                            <a href="{{ route('getMetaData', $data->id) }}">
                                <div class="flex justify-start flex-col">
                                    <div class="flex ">
                                        <h2 id="judul" class="judul font-semibold">{{ $data->judul }}</h2>
                                    </div>
                                </div>
                                @if($data->imageTitle)
                                <div class="relative aspect-square mb-4">
                                    <img src="{{ asset( $data->imageTitle) }}" class="absolute inset-0 w-full h-full object-cover rounded-lg">
                                </div>
                                @endif

                                <div class="flex flex-grow my-2">
                                    <p id="deskripsi" class="deskripsi">{{ $data->description }}</p>
                                </div>

                                <div class="flex justify-between items-end w-full mt-auto">
                                    <a href="{{ route('viewGuestProduct', $data->id) }}" class="flex flex-row bg-sky-400 hover:bg-sky-600 justify-center items-center p-2 w-full rounded-md text-white">
                                        <span class="flex font-semibold">Lihat</span>
                                        <i class="ph-bold ph-caret-right"></i>
                                    </a>
                                </div>
                            </a>
                        </div>
                        @if (!$dataFound)
                            <div class="w-full flex flex-col justify-center rounded-md bg-gray-200 p-3 my-2 hover:bg-gray-300 hover:duration-150 hover:shadow-xl">
                                <p class="text-center text-red-500">Belum Ada Data Product</p>
                            </div>
                        @endif
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

            if (judulTeks.length > 20) {
                var potonganJudul = judulTeks.slice(0, 200);
                elem.textContent = potonganJudul + "...";
            }

        });
    </script>
@endsection

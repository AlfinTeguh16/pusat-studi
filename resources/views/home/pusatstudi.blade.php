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
            <h1 class="text-white text-4xl md:text-6xl font-bold mb-4">Welcome to Huruf Bali</h1>
            <p class="text-white text-lg md:text-xl mb-8">Discover the beauty of Balinese culture</p>
            <a href="#about" class="btn btn-primary text-lg font-semibold py-3 px-6 rounded-full transition duration-300 ease-in-out bg-transparent border-2 border-white hover:bg-white hover:text-blue-500">Learn More</a>
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
                    <div class="max-w-lg mx-auto">
                        <p class="text-gray-600 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce nec lacus vel quam cursus lacinia. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nullam viverra dolor in elit suscipit, in varius elit gravida.</p>
                        <p class="text-gray-600">Duis faucibus interdum dui nec fermentum. Fusce eu risus nec libero volutpat maximus. In eu lacus sit amet eros vehicula volutpat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

   <!-- Event Section -->
   <section id="event" class="flex items-center justify-center py-4 md:py-8 flex-wrap">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold text-center mb-8">Upcoming Events</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 overflow-x-auto">
            <!-- Event 1 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                <img src="asset/images/event1.jpg" alt="Event 1" class="w-full h-64 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-bold mb-2">Event Title 1</h3>
                    <p class="text-gray-700">Date: January 10, 2024</p>
                    <p class="text-gray-700">Location: City Hall</p>
                    <p class="mt-2">Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris rutrum vitae lacus non placerat.</p>
                </div>
            </div>
            <!-- Event 2 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                <img src="asset/images/event2.jpg" alt="Event 2" class="w-full h-64 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-bold mb-2">Event Title 2</h3>
                    <p class="text-gray-700">Date: February 15, 2024</p>
                    <p class="text-gray-700">Location: Convention Center</p>
                    <p class="mt-2">Description: Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.</p>
                </div>
            </div>
            <!-- Event 3 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                <img src="asset/images/event3.jpg" alt="Event 3" class="w-full h-64 object-cover">
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


<div class="flex items-center justify-center py-4 md:py-8 flex-wrap">
    <button type="button" class="text-blue-700 hover:text-white border border-blue-600 bg-white hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:bg-gray-900 dark:focus:ring-blue-800">All categories</button>
    <button type="button" class="text-gray-900 border border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800">Shoes</button>
    <button type="button" class="text-gray-900 border border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800">Bags</button>
    <button type="button" class="text-gray-900 border border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800">Electronics</button>
    <button type="button" class="text-gray-900 border border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800">Gaming</button>
</div>
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
                        @if ($data->nidn === Auth::user()->nidn)
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
                        @endif
                    @endforeach

                    </div>
                    <div class="flex justify-center items-center">
                        <div class="text-center mt-8">
                          <a href="/meta" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Show Meta Data</a>
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
@endsection

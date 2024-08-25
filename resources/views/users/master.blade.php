<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script type="text/javascript" src="https://static.sketchfab.com/api/sketchfab-viewer-1.12.1.js"></script>

</head>
<body>
<section class="font-sans">

    <button data-drawer-target="cta-button-sidebar" data-drawer-toggle="cta-button-sidebar" aria-controls="cta-button-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 ">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
      <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
      <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
  </button>
  </button>

  <div class="container">

    <div id="response-message" class=" hidden fixedtop-0 justify-center mt-4 bg-green-700 text-white text-center px-4 py-2 rounded z-50 transition-opacity duration-500 ease-in-out">
        <i id='successIcons' class="ph-fill ph-check-fat"> </i> 
    </div>
    {{-- @if (session('success'))
        <div id="successPopup" class="fixed top-0 left-1/2 transform -translate-x-1/2 mt-4 bg-green-700 text-white px-4 py-2 rounded z-50 opacity-0 transition-opacity duration-500 ease-in-out">
            <i class="ph-fill ph-check-fat text-green-500">{{ session('success') }}</i>
        </div>
    @endif --}}
    @yield('content')
  </div>

 <aside id="cta-button-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-red-600 ">
       <ul class="space-y-2 font-medium">
          <li>
             <a href="/dashboard" class="flex items-center p-2 text-white hover:text-red-600 rounded-lg  hover:bg-red-200 group">
                <svg class="w-5 h-5 text-white transition duration-75  group-hover:text-red-600 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                   <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                   <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Dashboard</span>
            </a>
          </li>
          <li>
             <a href="/metadata" class="flex items-center p-2 text-white hover:text-red-600 rounded-lg  hover:bg-red-200  group">
                <svg class="flex-shrink-0 w-5 h-5 text-white transition duration-75  group-hover:text-red-600 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                    <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Meta Data</span>

             </a>
          </li>
          <li>
             <a href="/event" class="flex items-center p-2 text-white hover:text-red-600 rounded-lg  hover:bg-red-200  group">
                <svg class="flex-shrink-0 w-5 h-5 text-white transition duration-75  group-hover:text-red-600 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                   <path d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Event</span>
             </a>
          </li>
          <li>
             <a href="/product" class="flex items-center p-2 text-white hover:text-red-600 rounded-lg  hover:bg-red-200  group">
                <svg class="flex-shrink-0 w-5 h-5 text-white transition duration-75  group-hover:text-red-600 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                   <path d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Products</span>
             </a>
          </li>
          <li>
             <a href="/" class="flex items-center p-2 text-white hover:text-red-600 rounded-lg  hover:bg-red-200  group">
                <svg class="flex-shrink-0 w-5 h-5 text-white transition duration-75  group-hover:text-red-600 " xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" viewBox="0 0 256 256">
                    <path d="M224,115.55V208a16,16,0,0,1-16,16H168a16,16,0,0,1-16-16V168a8,8,0,0,0-8-8H112a8,8,0,0,0-8,8v40a16,16,0,0,1-16,16H48a16,16,0,0,1-16-16V115.55a16,16,0,0,1,5.17-11.78l80-75.48.11-.11a16,16,0,0,1,21.53,0,1.14,1.14,0,0,0,.11.11l80,75.48A16,16,0,0,1,224,115.55Z"></path>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Home</span>
            </a>
          </li>
          <li>
             <a href="/logout" class="flex items-center p-2 text-white hover:text-red-600 rounded-lg  hover:bg-red-200  group">
                <svg class="flex-shrink-0 w-5 h-5 text-white transition duration-75  group-hover:text-red-600 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Log Out</span>
             </a>
          </li>
       </ul>
    </div>
 </aside>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var successPopup = document.getElementById("successPopup");

        if (successPopup) {
            setTimeout(function() {
                successPopup.classList.remove('opacity-0');
                successPopup.classList.add('opacity-100');
            }, 100);

            setTimeout(function() {
                successPopup.classList.remove('opacity-100');
                successPopup.classList.add('opacity-0');
            }, 3000); 

            setTimeout(function() {
                successPopup.remove();
            }, 3500);
        }
    });

    document.addEventListener("DOMContentLoaded", function() {
        const sidebarToggle = document.querySelectorAll("[data-drawer-toggle]");
    const sidebar = document.getElementById("cta-button-sidebar");
    const body = document.querySelector("body");

    sidebarToggle.forEach(function(toggle) {
        toggle.addEventListener("click", function(event) {
            event.stopPropagation();
            const target = document.getElementById(this.getAttribute("data-drawer-target"));
            const drawerToggle = this.getAttribute("data-drawer-toggle");

            if (target) {
                target.classList.toggle("hidden");
                document.getElementById(drawerToggle).classList.toggle("hidden");
                sidebar.classList.toggle("-translate-x-full");
                sidebar.classList.toggle("sm:translate-x-0");
            }
        });
    });

    function closeSidebar() {
        const screenWidth = window.innerWidth;
        if (screenWidth <= 640) { // Hanya tutup sidebar saat mode mobile atau tablet
            sidebar.classList.add("-translate-x-full");
            sidebar.classList.remove("sm:translate-x-0");
            sidebar.querySelectorAll("[data-drawer-target]").forEach(function(item) {
                item.classList.add("hidden");
            });
        }
    }

    body.addEventListener("click", function(event) {
        const isClickInsideSidebar = sidebar.contains(event.target);
        const screenWidth = window.innerWidth;
        if (!isClickInsideSidebar && screenWidth <= 640) { // Tutup sidebar saat mode mobile atau tablet dan klik dilakukan di luar area sidebar
            closeSidebar();
        }
    });

    function showSidebar() {
        const screenWidth = window.innerWidth;
        if (screenWidth <= 640) { // Tampilkan sidebar saat mode mobile atau tablet
            sidebar.classList.remove("-translate-x-full");
            sidebar.classList.add("sm:translate-x-0");
        }
    }

    // Fungsi untuk menampilkan sidebar saat mode tablet atau desktop
    function handleResize() {
        const screenWidth = window.innerWidth;
        if (screenWidth > 640) { // Pastikan sidebar tetap terbuka saat mode desktop aktif
            showSidebar();
        } else {
            closeSidebar();
        }
    }

    // Tampilkan sidebar saat halaman dimuat
    handleResize();

    // Event listener untuk menampilkan sidebar saat ukuran layar berubah menjadi tablet atau desktop
    window.addEventListener("resize", handleResize);
});

</script>

@yield('script')
</body>
</html>

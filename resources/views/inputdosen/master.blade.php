<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Detail Meta Data</title>

    <script type="text/javascript" src="https://static.sketchfab.com/api/sketchfab-viewer-1.12.1.js"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <style>.container {
        position: relative;
    }
    .btn-back {
        display: inline-block;
        padding: 10px 30px;
        font-size: 16px;
        font-weight: bold;
        text-decoration: none;
        color: white;
        background-color: rgb(101, 93, 93);
        border-radius: 5px;
        transition: background-color 0.3s ease;
        position: absolute;
        top: 10px; /* Atur jarak dari atas */
        left: 10px; /* Atur jarak dari kiri */
    }
    .btn-back:hover {
        background-color: darkred;
    }
    </style>
        <style>
            body {
                margin: 0;
                padding: 0;
                font-family: Arial, sans-serif;
            }

            .sidebar {
                height: 100%;
                width: 250px;
                position: fixed;
                top: 0;
                left: 0;
                background-color: #333;
                padding-top: 20px;
            }

            .sidebar a {
                padding: 10px 20px;
                text-decoration: none;
                font-size: 20px;
                color: white;
                display: block;
            }

            .sidebar a:hover {
                background-color: #555;
            }

            .content {
                margin-left: 250px;
                padding: 20px;
            }
        </style>


 @yield('style')
</head>
<body class="bg-grey-900">
@yield('content')
<button data-drawer-target="cta-button-sidebar" data-drawer-toggle="cta-button-sidebar" aria-controls="cta-button-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
    <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
 </button>

 <aside id="cta-button-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
       <ul class="space-y-2 font-medium">
          <li>
             <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                   <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                   <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                </svg>
                <span class="ms-3">Home</span>
             </a>
          </li>
          <li>
             <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                   <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Meta Data</span>

             </a>
          </li>
          <li>
             <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                   <path d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Ivent</span>
             </a>
          </li>
          <li>
             <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                   <path d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Products</span>
             </a>
          </li>
          <li>
             <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Log Out</span>
             </a>
          </li>
       </ul>
    </div>
 </aside>

 <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        var viewerContainer = document.getElementById('sketchfab-viewer');
        var uid = '{{ $metaData->model_3d }}';

        var iframe = document.createElement('iframe');
        iframe.src = '';
        iframe.allow = 'autoplay; fullscreen; vr';
        iframe.setAttribute('xr-spatial-tracking', true);
        iframe.setAttribute('execution-while-out-of-viewport', true);
        iframe.setAttribute('execution-while-not-rendered', true);
        iframe.setAttribute('web-share', true);
        iframe.setAttribute('allowfullscreen', true);
        iframe.setAttribute('mozallowfullscreen', true);
        iframe.setAttribute('webkitallowfullscreen', true);

        viewerContainer.appendChild(iframe);

        var client = new Sketchfab(iframe);

        client.init(uid, {
            success: function onSuccess(api) {
                api.start();
                api.addEventListener('viewerready', function () {
                    // API is ready to use
                    // Insert your code here
                    console.log('Viewer is ready');
                });
            },
            error: function onError() {
                console.log('Viewer error');
            }
        });
    });
</script>
<script>
    function openNav() {
        document.getElementById("mySidebar").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
    }

    function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
    }
</script>
<script>
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
            sidebar.classList.add("-translate-x-full");
            sidebar.classList.remove("sm:translate-x-0");
            sidebar.querySelectorAll("[data-drawer-target]").forEach(function(item) {
                item.classList.add("hidden");
            });
        }

        body.addEventListener("click", function(event) {
            const isClickInsideSidebar = sidebar.contains(event.target);
            if (!isClickInsideSidebar) {
                closeSidebar();
            }
        });

        function showSidebar() {
            sidebar.classList.remove("-translate-x-full");
            sidebar.classList.add("sm:translate-x-0");
        }

        // Fungsi untuk menampilkan sidebar saat mode tablet atau desktop
        function handleResize() {
            const screenWidth = window.innerWidth;
            if (screenWidth > 640) { // Ganti nilai 640 dengan breakpoint tablet yang Anda inginkan
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

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
@yield('script')
</body>
</html>
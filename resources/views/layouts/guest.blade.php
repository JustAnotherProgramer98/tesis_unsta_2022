<!DOCTYPE html>
<html>
    
  <script src="{{ asset('js/init-alpine.js') }}"></script>
  <script src="https://cdn.tailwindcss.com/"></script>
  <script src='https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js'></script>
  <script defer src="https://unpkg.com/alpinejs@3.2.3/dist/cdn.min.js"></script>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="shortcut icon" href="./assets/img/favicon.ico" />
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/creativetimofficial/tailwind-starter-kit/compiled-tailwind.min.css"/>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.21.1/sweetalert2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
  <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
  <link type="text/css" rel="stylesheet" href="{{ asset('css/image-uploader.css') }}">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />

    <section class="relative mx-auto"> <!-- Cabecera de la Pagina -->
        <!-- navbar -->
        <nav class="flex justify-between bg-gray-800 text-white w-full ">
            <div class="px-5 xl:px-12 py-6 flex w-full items-center">
                <a class="text-3xl font-bold font-heading" href="#">
                    <!-- <img class="h-9" src="logo.png" alt="logo"> -->
                    Logo Here.
                </a>
                <!-- Nav Links -->
                <ul class="hidden md:flex px-4 mx-auto font-semibold font-heading space-x-12">
                    <li><a class="hover:text-gray-200" href="{{ route('experiencies.index') }}">Home</a></li>
                    
                    <li><a class="hover:text-gray-200" href="{{ route('experiencies.shop') }}">Shop</a></li>
                    <li><a class="hover:text-gray-200" href="#">Contact Us</a></li>
                </ul>
                <!-- Header Icons -->
                <div class="hidden xl:flex space-x-5 items-center">
                    <a class="hover:text-gray-200" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </a>
                    <a class="flex items-center hover:text-gray-200" href="cart_shop">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span class="flex absolute -mt-5 ml-4">
                            <span
                                class="animate-ping absolute inline-flex h-3 w-3 rounded-full bg-pink-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-3 w-3 bg-pink-500">
                            </span>
                        </span>
                    </a>

                    <!-- Sign In / Register  test    -->
                    <div class="absolute relative inline-block text-left dropdown z-999">
                        <button class="flex items-center hover:text-gray-200" 
                                type="button" aria-haspopup="true" aria-expanded="true" aria-controls="headlessui-menu-items-117">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <svg class="w-5 h-5 ml-2 -mr-1" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                        
                        <div class="opacity-0 invisible dropdown-menu transition-all duration-300 transform origin-top-right -translate-y-2 scale-95">
                            <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none" aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                                <div class="px-4 py-3">
                                    @if (Auth::user())        
                                        <p class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left">{{Auth::user()->email}}</p>
                                    @else
                                        <a href="{{ route('login') }}" tabindex="0" class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left"  role="menuitem" >Signed in as</a>
                                    @endif
                                </div>
                                <div class="py-1">
                                    <a href="javascript:void(0)" tabindex="0" class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left"  role="menuitem" >Account settings</a>
                                    <a href="javascript:void(0)" tabindex="1" class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left"  role="menuitem" >Support</a>
                                    <span role="menuitem" tabindex="-1" class="flex justify-between w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 cursor-not-allowed opacity-50" aria-disabled="true">New feature (soon)</span>
                                    <a href="javascript:void(0)" tabindex="2" class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left" role="menuitem" >License</a>
                                </div>
                                <div class="py-1">
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button>    
                                            <span class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left">Cerrar sesion</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> <!-- FIN Sign In / Register  test    -->

                </div>
            </div>
            <!-- Responsive navbar -->
            <a class="xl:hidden flex mr-6 items-center" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <span class="flex absolute -mt-5 ml-4">
                    <span class="animate-ping absolute inline-flex h-3 w-3 rounded-full bg-pink-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-3 w-3 bg-pink-500">
                    </span>
                </span>
            </a>
            <a class="navbar-burger self-center mr-12 xl:hidden" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </a>
        </nav>
    </section> <!-- FIN  Cabecera de a Pagina -->

  </head>
  <body class="text-gray-800 antialiased">
    @yield("content")
    
    <footer class="relative bg-gray-800 pt-8 pb-6">
        <div class="container mx-auto flex flex-col flex-wrap items-center justify-between">
            <ul class="flex mx-auto text-white text-center">
                <li class="p-2 cursor-pointer hover:underline">Terms & Conditions</li>
                <li class="p-2 cursor-pointer hover:underline">Privacy</li>
                <li class="p-2 cursor-pointer hover:underline">Cookies</li>
            </ul>
            <ul class="flex mx-auto text-white text-center">
                <li class="p-2 cursor-pointer"><svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-white"
                        width="24" height="24" viewBox="0 0 24 24">
                        <path
                            d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z" />
                    </svg></li>
                <li class="p-2 cursor-pointer"><svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-white"
                        width="24" height="24" viewBox="0 0 24 24">
                        <path
                            d="M21.231 0h-18.462c-1.529 0-2.769 1.24-2.769 2.769v18.46c0 1.531 1.24 2.771 2.769 2.771h18.463c1.529 0 2.768-1.24 2.768-2.771v-18.46c0-1.529-1.239-2.769-2.769-2.769zm-9.231 7.385c2.549 0 4.616 2.065 4.616 4.615 0 2.549-2.067 4.616-4.616 4.616s-4.615-2.068-4.615-4.616c0-2.55 2.066-4.615 4.615-4.615zm9 12.693c0 .509-.413.922-.924.922h-16.152c-.511 0-.924-.413-.924-.922v-10.078h1.897c-.088.315-.153.64-.2.971-.05.337-.081.679-.081 1.029 0 4.079 3.306 7.385 7.384 7.385s7.384-3.306 7.384-7.385c0-.35-.031-.692-.081-1.028-.047-.331-.112-.656-.2-.971h1.897v10.077zm0-13.98c0 .509-.413.923-.924.923h-2.174c-.511 0-.923-.414-.923-.923v-2.175c0-.51.412-.923.923-.923h2.174c.511 0 .924.413.924.923v2.175z"
                            fillRule="evenodd" clipRule="evenodd" />
                    </svg></li>
                <li class="p-2 cursor-pointer"><svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-white"
                        width="24" height="24" viewBox="0 0 24 24">
                        <path
                            d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                    </svg></li>
            </ul>
            <div class="flex mx-auto text-white text-center">
                Copyright Business Name © 2021
            </div>
        </div>
    </footer>
    <script src="{{asset('js/custom.js')}}"></script>
  </body>

  <script>
    function toggleNavbar(collapseID) {
      document.getElementById(collapseID).classList.toggle("hidden");
      document.getElementById(collapseID).classList.toggle("block");
    }
  </script>

  <script src="https://unpkg.com/@popperjs/core@2"></script>
    <style>
        .dropdown:focus-within .dropdown-menu {
        opacity:1;
        transform: translate(0) scale(1);
        visibility: visible;
        }
    </style>
    <script src="chrome-extension://kgejglhpjiefppelpmljglcjbhoiplfn/shadydom.js"></script>
            <script>
                if (!window.ShadyDOM) window.ShadyDOM = { force: true, noPatch: true };
            </script>
</html>

<nav class="flex justify-between bg-paleta_tesis_azul text-white w-full">
    <div class="flex h-auto w-1/5 bg-gradient-to-r from-paleta_tesis_blanco via-paleta_tesis_blanco to-paleta_tesis_azul sm:flex sm:items-center pl-4">
        <a class="text-3xl font-bold font-heading" href="{{route('experiencies.index')}}">
            <img class="" src="{{ asset('images/Turistear3.png') }}" alt="logo">
        </a>
        <p class="ml-4 text-2xl font-thin text-paleta_tesis_azul">turiste<span style='color: #3F72AF'>AR</span></p>
    </div>
    <div class="px-5 xl:px-12 py-6 flex w-full items-center">
        
        <!-- Nav Links -->
        <ul class="hidden md:flex px-4 mx-auto font-semibold font-heading space-x-12">
            
            <li>
                <a class="hover:text-gray-200 " href="{{ route('experiencies.index') }}">
                    <div class="flex flex-col justify-center transition ease-in-out duration-100 hover:-translate-y-1 hover:scale-125">
                        <i class="text-paleta_tesis_blanco text-center mb-2 fal fa-home-alt"></i>Home
                    </div>
                </a>
            </li>

            <li>
                <a class="hover:text-gray-200 " href="{{ route('experiencies.shop') }}">
                    <div class="flex flex-col justify-center transition ease-in-out duration-100 hover:-translate-y-1 hover:scale-125">
                        <i class="text-paleta_tesis_blanco text-center mb-2  fal fa-gift"></i>Experiencias
                    </div>
                </a>
            </li>
            <li>
                <a class="hover:text-gray-200 " href="{{ route('contact_us') }}">
                    <div class="flex flex-col justify-center transition ease-in-out duration-100 hover:-translate-y-1 hover:scale-125">
                        <i class="text-paleta_tesis_blanco text-center mb-2  far fa-envelope"></i>Contacto
                    </div>
                </a>
            </li>
        </ul>
        <!-- Header Icons -->
        <div class="hidden xl:flex space-x-5 items-center">
            <a class="flex items-center hover:text-gray-200 transition ease-in-out duration-100 hover:-translate-y-1 hover:scale-125" href="{{ route('cart.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <span class="flex absolute -mt-5 ml-4">
                    @if (Session::has('cart'))
                        <span class="animate-ping absolute inline-flex h-3 w-3 rounded-full bg-paleta_tesis_gris opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-paleta_tesis_celeste"></span>
                    @endif
                </span>
            </a>

            <!-- Sign In / Register  test    -->
            <div style="z-index: 20;" class=" relative inline-block text-left dropdown ">
                <button class="flex items-center hover:text-gray-200" type="button" aria-haspopup="true"
                    aria-expanded="true" aria-controls="headlessui-menu-items-117">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <svg class="w-5 h-5 ml-2 -mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>

                <div class="opacity-0 invisible dropdown-menu transition-all duration-300 transform origin-top-right -translate-y-2 scale-95">
                    @if (Auth::user())
                    <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                        aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                        <div class="px-4 py-3">
                            <p class="text-gray-700 text-sm leading-5">Hola, {{ Auth::user()->name }}</p>
                             
                        </div>
                        <div class="py-1">
                            <a href="{{ route('hosts.profile') }}" tabindex="0"
                                class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left"
                                role="menuitem">Mi perfil</a>
                            <a href="{{ route('edit.user',Auth::user()) }}" tabindex="1"
                                class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left"
                                role="menuitem">Informacion personal</a>
                            <span role="menuitem" tabindex="-1"
                                class="flex justify-between w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 cursor-not-allowed opacity-50"
                                aria-disabled="true">New feature (soon)</span>
                            <a href="javascript:void(0)" tabindex="2"
                                class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left"
                                role="menuitem">License</a>
                        </div>
                        <div class="py-1">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button>
                                    <span
                                        class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left">Cerrar
                                        sesion</span>
                                </button>
                            </form>
                        </div>
                    </div>
                    @else    
                    <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                        aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                        
                        <div class="py-1">
                            <a href="{{ route('login') }}" class="hover:bg-slate-300 text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left" role="menuitem"><i class="fas fa-door-open"></i>Iniciar sesion</a>
                            <a href="{{ route('register') }}" class="hover:bg-slate-300 text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left" role="menuitem"><i class="far fa-address-card"></i>Registrarse</a>
                        </div>
                    </div>
                    @endif
                </div>
            </div> <!-- FIN Sign In / Register  test    -->

        </div>
    </div>
    <!-- Responsive navbar -->
    <a class="xl:hidden flex mr-6 items-center" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
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
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </a>
</nav>
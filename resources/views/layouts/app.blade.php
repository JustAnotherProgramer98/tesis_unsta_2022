<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'No leido del Env') }}</title>

    <link rel="stylesheet" href="{{ asset('css/tailwind.output.css') }}" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="{{ asset('js/init-alpine.js') }}"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.21.1/sweetalert2.min.css"
        rel="stylesheet" />
    <link type="text/css" rel="stylesheet" href="{{ asset('css/image-uploader.css') }}">

</head>

<body>
    @include('sidebar_desktop')
    @include('sidebar_mobile')
    <div class="flex flex-col w-full">
        <div
            class="bg-white dark:bg-gray-800 container flex items-center justify-between p-4 mx-auto text-purple-600 dark:text-purple-300">
            <!-- Mobile hamburger -->
            <button class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple"
                @click="toggleSideMenu" aria-label="Menu">
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <!-- Search input -->
            @yield('title_of_tab')
            <ul class="flex items-center flex-shrink-0 space-x-6">
                <!-- Theme toggler -->
                <li class="flex">
                    <span class="pr-4">Modo noche </span>
                    <button class="rounded-md focus:outline-none focus:shadow-outline-purple" @click="toggleTheme"
                        aria-label="Toggle color mode">
                        <template x-if="!dark">
                            <i class="fas fa-moon"></i>
                        </template>
                        <template x-if="dark">
                            <i class="fas fa-sun"></i>
                        </template>
                    </button>
                </li>
                <!-- Profile menu -->
                <li class="relative">
                    <button
                        class="align-middle rounded-full text-white bg-purple-500 h-10 w-10 focus:shadow-outline-purple focus:outline-none"
                        @click="toggleProfileMenu" @keydown.escape="closeProfileMenu" aria-label="Account"
                        aria-haspopup="true">{{ (Auth::user()->name[0]).'-'.Auth::user()->surname[0] }}
                    </button>
                    <template x-if="isProfileMenuOpen">
                        <ul x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0" @click.away="closeProfileMenu"
                            @keydown.escape="closeProfileMenu"
                            class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700"
                            aria-label="submenu">
                            <li class="flex">
                                <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                                    href="#">
                                    <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                        </path>
                                    </svg>
                                    <span>Perfil</span>
                                </a>
                            </li>
                            <li class="flex">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button
                                        class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                                        href="#">
                                        <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path
                                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                            </path>
                                        </svg>
                                        <span>Cerrar sesion</span>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </template>
                </li>
            </ul>
        </div>
        {{-- Conenido de las paginas --}}
        @yield('content')

    </div>
    </div>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/image-uploader.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.21.1/sweetalert2.min.js"></script>
</body>

</html>

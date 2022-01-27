<div
    class="fixed flex flex-col top-14 left-0 w-14 hover:w-64 md:w-64 bg-blue-900 dark:bg-gray-900 h-full text-white transition-all duration-300 border-none z-10 sidebar">
    <div class="overflow-y-auto overflow-x-hidden flex flex-col justify-between flex-grow">
        <ul class="flex flex-col py-4 space-y-1">
            <li class="bg-gray-700 px-5 hidden md:block">
                <div class="flex flex-row items-center h-8 justify-between ">
                    <div class="text-sm font-light tracking-wide text-gray-400 uppercase">Modo oscuro</div>
                    <svg width="24" height="24"
                        class="mr-4 fill-current text-white-700 group-hover:text-gray-500 group-focus:text-gray-700 dark:text-gray-700 dark:group-hover:text-gray-500 dark:group-focus:text-gray-700"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                </div>

            </li>
            <br>
            <small class="mx-auto text-center">Acciones del sistema</small>
            <hr class="border-1 border-white w-2/5 mx-auto">
            <li>

                <a href="{{ route('admin.panel') }}"
                    class="@if (request()->routeIs('admin.panel')) bg-blue-800 border-blue-500 @endif relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent dark:hover:border-gray-800 pr-6">
                    <span class="inline-flex justify-center items-center ml-4">
                        <i class="fas fa-tasks"></i>
                    </span>
                    <span class="ml-2 text-sm tracking-wide truncate">Panel de control</span>
                </a>
            </li>
            <li>
                <a href="{{ route('experiencies.index.admin') }}"
                    class="@if (request()->routeIs('experiencies.index.admin')) bg-blue-800 border-blue-500 @endif relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                    <span class="inline-flex justify-center items-center ml-4">
                        <i class="fas fa-campground"></i>
                    </span>
                    <span class="ml-2 text-sm tracking-wide truncate">Experiencias</span>
                </a>
            </li>
            <li>
                <a href="{{ route('places.index.admin') }}"
                    class="@if (request()->routeIs('places.index.admin')) bg-blue-800 border-blue-500 @endif relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                    <span class="inline-flex justify-center items-center ml-4">
                        <i class="fas fa-map-marked-alt"></i>
                    </span>
                    <span class="ml-2 text-sm tracking-wide truncate">Lugares</span>
                </a>
            </li>
            <li>
                <a href="#"
                    class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                    <span class="inline-flex justify-center items-center ml-4">
                        <i class="fas fa-list"></i>
                    </span>
                    <span class="ml-2 text-sm tracking-wide truncate">Categorias</span>
                </a>
            </li>
            <li>
                <a href="#"
                    class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                    <span class="inline-flex justify-center items-center ml-4">
                        <i class="fas fa-comment-dollar"></i>
                    </span>
                    <span class="ml-2 text-sm tracking-wide truncate">Codigos de descuento</span>
                </a>
            </li>
            <li>
                <a href="{{ route('sales.index.admin') }}"
                    class="@if (request()->routeIs('sales.index.admin')) bg-blue-800 border-blue-500 @endif relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                    <span class="inline-flex justify-center items-center ml-4">
                        <i class="fas fa-dollar-sign"></i>
                    </span>
                    <span class="ml-2 text-sm tracking-wide truncate">Ventas</span>
                </a>
            </li>
            <li>
                <a href="#"
                    class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                    <span class="inline-flex justify-center items-center ml-4">
                        <i class="fas fa-users"></i>
                    </span>
                    <span class="ml-2 text-sm tracking-wide truncate">Usuarios</span>
                </a>
            </li>
            <br>
            <br>
            <br>

            <small class="border-1 border-white w-2/5 mx-auto">Area personal</small>
            <hr class="border-1 border-white w-2/5 mx-auto">
            <li>
                <a href="#"
                    class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                    <span class="inline-flex justify-center items-center ml-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </span>
                    <span class="ml-2 text-sm tracking-wide truncate">Profile</span>
                </a>
            </li>
        </ul>
        <p class="mb-14 px-5 py-3 hidden md:block text-center text-xs">Tesis UNSTA 2022 -Ingenieria Informatica</p>
    </div>
</div>

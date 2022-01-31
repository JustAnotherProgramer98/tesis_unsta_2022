<div class="flex h-screen bg-gray-50 dark:bg-purple-600" :class="{ 'overflow-hidden': isSideMenuOpen }">
      <!-- Desktop sidebar -->
      {{-- color de toda la barra --}}
      <aside class="z-20 h-full hidden w-max overflow-y-auto bg-gray-200 dark:bg-gray-800 md:block flex-shrink-0"
      >
        <div class="py-4 text-gray-600 dark:text-gray-400">
          <p class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200">Tesis unsta</p>
          <ul class="mt-6">
            <li class="relative px-6 py-3">
              @if ((request()->routeIs('admin.panel')))
                <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>  
              @endif
              <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100" href="{{ route('admin.panel') }}">
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                  ></path>
                </svg>
                <span class="ml-4">Panel principal</span>
              </a>
            </li>
          </ul>
          <ul>
            <li class="relative px-6 py-3">
              <button class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                @click="togglePagesExperience" aria-haspopup="true">
                <span class="inline-flex justify-center items-center">
                  <i class="fas fa-campground"></i>
                </span>
                <span class="ml-4 text-sm tracking-wide truncate">Experiencias</span>
                <svg
                  class="w-4 h-4 ml-auto"
                  aria-hidden="true"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                >
                  <path
                    fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd"
                  ></path>
                </svg>
              </button>
              <template x-if="isPagesExperiencesOpen">
                <ul
                  x-transition:enter="transition-all ease-in-out duration-300"
                  x-transition:enter-start="opacity-25 max-h-0"
                  x-transition:enter-end="opacity-100 max-h-xl"
                  x-transition:leave="transition-all ease-in-out duration-300"
                  x-transition:leave-start="opacity-100 max-h-xl"
                  x-transition:leave-end="opacity-0 max-h-0"
                  class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                  aria-label="submenu">

                  <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                    <a href="{{ route('experiencies.index.admin') }}"
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                    <span class="inline-flex justify-center items-center">
                      
                    </span>
                    <span class="@if (request()->routeIs('experiencies.index.admin')) text-purple-500 italic @endif ml-4 text-sm tracking-wide truncate">Experiencias</span>
                  </a>
                  </li>
                  <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                    <a href="{{ route('experiencies.assing.admin') }}"
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                    <span class="inline-flex justify-center items-center">
                      
                    </span>
                    <span class="@if (request()->routeIs('experiencies.assing.admin')) text-purple-500 italic @endif ml-4 text-sm tracking-wide truncate">Asignar categoria</span>
                  </li>
                </ul>
              </template>
            </li>
            <li class="relative px-6 py-3">
              @if ((request()->routeIs('places.index.admin')))
              <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>  
              @endif
              <a href="{{ route('places.index.admin') }}"
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
               <span class="inline-flex justify-center items-center">
                        <i class="fas fa-map-marked-alt"></i>
                    </span>
                    <span class="ml-4 text-sm tracking-wide truncate">Lugares</span>
              </a>
            </li>
            <li class="relative px-6 py-3">
              @if ((request()->routeIs('categories.index.admin')))
              <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>  
              @endif
              <a href="{{ route('categories.index.admin') }}"
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                <span class="inline-flex justify-center items-center">
                <i class="fas fa-list"></i>
                </span>
                <span class="ml-4 text-sm tracking-wide truncate">Categorias</span>
              </a>
            </li>
            <li class="relative px-6 py-3">
              <a href="buttons.html"
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
              <span class="inline-flex justify-center items-center">
                <i class="fas fa-comment-dollar"></i>
            </span>
            <span class="ml-4 text-sm tracking-wide truncate">Codigos de descuento</span>
              </a>
            </li>
            <li class="relative px-6 py-3">
              @if ((request()->routeIs('sales.index.admin')))
              <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>  
              @endif
              <a href="{{ route('sales.index.admin') }}"
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                <span class="inline-flex justify-center items-center">
                  <i class="fas fa-dollar-sign"></i>
                </span>
            <span class="ml-4 text-sm tracking-wide truncate">Ventas</span>
              </a>
            </li>
            <li class="relative px-6 py-3">
              <button class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                @click="togglePagesUser" aria-haspopup="true">
                <span class="inline-flex justify-center items-center">
                  <i class="fas fa-users"></i>
                </span>
                <span class="ml-4 text-sm tracking-wide truncate">Usuarios</span>
                <svg
                  class="w-4 h-4 ml-auto"
                  aria-hidden="true"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                >
                  <path
                    fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd"
                  ></path>
                </svg>
              </button>
              <template x-if="isPagesUsersOpen">
                <ul
                  x-transition:enter="transition-all ease-in-out duration-300"
                  x-transition:enter-start="opacity-25 max-h-0"
                  x-transition:enter-end="opacity-100 max-h-xl"
                  x-transition:leave="transition-all ease-in-out duration-300"
                  x-transition:leave-start="opacity-100 max-h-xl"
                  x-transition:leave-end="opacity-0 max-h-0"
                  class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                  aria-label="submenu">

                  <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                    <a class="w-full" href="pages/login.html">Todos los usuarios</a>
                  </li>
                  <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                    <a class="w-full" href="pages/login.html">Clientes</a>
                  </li>
                  <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                    <a class="w-full" href="pages/create-account.html">
                      Anfitriones
                    </a>
                  </li>
                  <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                    <a class="w-full" href="pages/forgot-password.html">
                      Usuarios borrados
                    </a>
                  </li>
                </ul>
              </template>
            </li>
          </ul>
        </div>
      </aside>
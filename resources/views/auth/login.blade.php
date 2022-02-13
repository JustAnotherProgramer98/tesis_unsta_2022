<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Windmill Dashboard</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset('css/tailwind.output.css') }}" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="{{ asset('js/init-alpine.js') }}"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>
  <body>
    <div class="flex items-center min-h-screen p-6  bg-paleta_tesis_gris dark:bg-gray-900">
      <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-paleta_tesis_blanco rounded-lg dark:bg-gray-800">
        <div class="flex flex-col overflow-y-auto md:flex-row">
          <div class="h-32 md:h-auto md:w-1/2">
            <img
              aria-hidden="true"
              class="object-cover w-full h-full dark:hidden"
              src="{{ asset('images/plane-with-marker.jpg') }}"
              alt="Office"
            />
          </div>
          <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">
              <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                Inciar Sesion
              </h1>
              @if ($errors->any())
              <div class="bg-gray-700 text-white text-2xl">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
              @endif
              <label class="block text-sm">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                <span class="text-gray-700 dark:text-gray-400">Email</span>
                <input name="email" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:bg-paleta_tesis_blanco focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
              </label>
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Contraseña</span>
                <input name="password" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:bg-paleta_tesis_blanco focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" type="password"/>
              </label>

              <!-- You should use a button here, as the anchor is only used for the example  -->
              <button class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-paleta_tesis_blanco transition-colors duration-150 bg-paleta_tesis_azul border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none ">
                Ingresar
              </button>
            </form> 
              <hr class="my-8" />

              <p class="mt-4">
                <a class="text-sm font-medium text-paleta_tesis_celeste dark:text-paleta_tesis_azul hover:underline hover:text-paleta_tesis_azul" href="./forgot-password.html">
                  Olvidaste tu contraseña?
                </a>
              </p>
              <p class="mt-1">
                <a
                  class="text-sm font-medium text-paleta_tesis_celeste dark:text-paleta_tesis_azul hover:underline hover:text-paleta_tesis_azul"
                  href="./create-account.html"
                >
                  Create un usuario!
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

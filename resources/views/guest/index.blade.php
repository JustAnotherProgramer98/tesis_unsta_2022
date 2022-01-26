<!DOCTYPE html>
<html lang="en">
<script src="https://cdn.tailwindcss.com/"></script>
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
<link rel="stylesheet"
    href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <section class="relative mx-auto">
        <!-- navbar -->
        <nav class="flex justify-between bg-gray-900 text-white w-full">
            <div class="px-5 xl:px-12 py-6 flex w-full items-center">
                <a class="text-3xl font-bold font-heading" href="#">
                    <!-- <img class="h-9" src="logo.png" alt="logo"> -->
                    Logo Here.
                </a>
                <!-- Nav Links -->
                <ul class="hidden md:flex px-4 mx-auto font-semibold font-heading space-x-12">
                    <li><a class="hover:text-gray-200" href="#">Home</a></li>
                    <li><a class="hover:text-gray-200" href="#">About</a></li>
                    <li><a class="hover:text-gray-200" href="#">Shop</a></li>
                    <li><a class="hover:text-gray-200" href="#">Contact Us</a></li>
                </ul>
                <!-- Header Icons -->
                <div class="hidden xl:flex items-center space-x-5 items-center">
                    <a class="hover:text-gray-200" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </a>
                    <a class="flex items-center hover:text-gray-200" href="#">
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
                    <!-- Sign In / Register      -->
                    <a class="flex items-center hover:text-gray-200" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </a>

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
    </section>
</head>

<body>
    <section class="relative  bg-blueGray-50">
        <!-- Main tittle with the photo -->
        <div class="relative pt-16 pb-32 flex content-center items-center justify-center min-h-screen-75">
            <div class="absolute top-0 w-full h-full bg-center bg-cover" style="
                    background-image: url('https://images.unsplash.com/photo-1557804506-669a67965ba0?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=1267&amp;q=80');
                ">
                <span id="blackOverlay" class="w-full h-full absolute opacity-75 bg-black"></span>
            </div>
            <div class="container relative mx-auto">
                <div class="items-center flex flex-wrap">
                    <div class="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">
                        <div class="pr-12">
                            <h1 class="text-white font-semibold text-5xl">
                                Viví una experiencia creada por verdaderos expertos
                            </h1>
                            <p class="mt-4 text-lg text-blueGray-200">
                                Disponible en mas de 100 paises alrededor del mundo
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden h-70-px"
                style="transform: translateZ(0px)">
                <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                    <polygon class="text-blueGray-200 fill-current" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>
    </section>
    <section>
        <!-- This is the Relevant Experience  -->
        <div class="min-h-screen">
            <p class="text-center text-4xl font-semibold py-4">Experiencias Destacadas</p>
            <div class="p-4 gap-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 select-none">
                @foreach ($experiences->take(4) as $experiencie)
                    <div
                        class="w-full cursor-pointer rounded-md shadow-md shadow-gray-200 hover:shadow-blue-400/80 hover:shadow-2xl hover:bg-gray-50">
                        <img class="aspect-video bg-cover w-full rounded-t-md min-h-40"
                            src="https://laravelnews.imgix.net/images/tailwindcss.png?ixlib=php-3.3.1" />
                        <div class="p-4">
                            <span class="text-blue-600 font-normal text-base">News</span>
                              <p class="text-red-500">  @foreach ($experiencie->categories as $category) {{ $category->title }} - @endforeach</p>
                            
                            <p class="font-semibold text-xl py-2">{{ $experiencie->title }}</p>
                            <p class="font-light text-gray-700 text-justify line-clamp-3">{{ $experiencie->description }}</p>
                            <div class="flex flex-wrap mt-10 space-x-4 align-bottom">
                                <img class="w-10 h-10 rounded-full"
                                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRAPdvF3u9YGCmWQZDGug3Jy2Eqrb4XuoOQbjozL6ObMiSl_2AvFQGSdpuqNPgADM37GJQ&usqp=CAU" />
                                <div class="flex flex-col space-y-0">
                                    <p class="font-semibold text-base">@djpfs (Github)</p>
                                    <p class="font-light text-sm">20 de Dezembro de 2021</p>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </section>

    <section>
        <!-- Description with a photo -->
        <div class="bg-indigo-600">
            <div class="lg:grid lg:grid-cols-2">
                <div class="py-24 px-10 lg:px-0 max-w-3xl lg:max-w-md mx-auto">
                    <h2 class="text-4xl tracking-tight font-extrabold text-gray-100">
                        <span class="block">¿Estas listo para la aventura?</span>
                        <span class="block">Registrate gratis y empeza a disfrutar tu vida.</span>
                    </h2>
                    <p class="text-gray-300 mt-5">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to make a type specimen book.
                    </p>
                    <div class="inline-block shadow mt-5">
                        <a href="#"
                            class="inline-block py-3 px-4 bg-white hover:bg-indigo-100 text-indigo-500 font-medium border border-transparent rounded-md">Sign
                            up for free</a>
                    </div>
                </div>
                <div class="lg:relative lg:mt-16">
                    <img class="lg:absolute lg:inset-0 h-60 w-full lg:h-full object-cover object-center lg:rounded-tl-md"
                        src="https://images.pexels.com/photos/2559941/pexels-photo-2559941.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260"
                        alt="Woman workcation on the beach">
                </div>
            </div>
        </div>
    </section>

    <!-- Text with 3 categories -->
    <section class="bg-white dark:bg-gray-900">
        <div class="container px-6 py-10 mx-auto">
            <h1 class="text-3xl font-semibold text-gray-800 capitalize lg:text-4xl dark:text-white">Explora!! <br></h1>

            <p class="mt-4 text-gray-500 xl:mt-6 dark:text-gray-300">
                Con nosotros se verifica la calidad de las experiencias
            </p>

            <div class="grid grid-cols-1 gap-8 mt-8 xl:mt-12 xl:gap-12 md:grid-cols-2 xl:grid-cols-3">
                <div class="p-8 space-y-3 border-2 border-blue-400 dark:border-blue-300 rounded-xl">
                    <span class="inline-block text-blue-500 dark:text-blue-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z" />
                        </svg>
                    </span>

                    <h1 class="text-2xl font-semibold text-gray-700 capitalize dark:text-white">Expertos Locales</h1>

                    <p class="text-gray-500 dark:text-gray-300">
                        Organizadas por personas locales que aman lo que hacen y el lugar donde viven.
                    </p>

                </div>

                <div class="p-8 space-y-3 border-2 border-blue-400 dark:border-blue-300 rounded-xl">
                    <span class="inline-block text-blue-500 dark:text-blue-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z" />
                        </svg>
                    </span>

                    <h1 class="text-2xl font-semibold text-gray-700 capitalize dark:text-white">Grupos Chicos</h1>

                    <p class="text-gray-500 dark:text-gray-300">
                        Como los grupos son chicos, nunca te vas a perder entre la multitud.
                    </p>

                </div>

                <div class="p-8 space-y-3 border-2 border-blue-400 dark:border-blue-300 rounded-xl">
                    <span class="inline-block text-blue-500 dark:text-blue-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                        </svg>
                    </span>

                    <h1 class="text-2xl font-semibold text-gray-700 capitalize dark:text-white">Altos estándares</h1>

                    <p class="text-gray-500 dark:text-gray-300">
                        Revisamos todas las experiencias para comprobar que ofrezcan una perspectiva única en el tema.
                    </p>

                </div>
            </div>
        </div>
    </section>

    <!-- Photos Team -->
    <section class="bg-white dark:bg-gray-900">
        <div class="container px-6 py-10 mx-auto">
            <div class="xl:flex xl:items-center xL:-mx-4">
                <div class="xl:w-1/2 xl:mx-4">
                    <h1 class="text-3xl font-semibold text-gray-800 capitalize lg:text-4xl dark:text-white">Nuestro
                        Equipo</h1>

                    <p class="max-w-2xl mt-4 text-gray-500 dark:text-gray-300">
                        Somos 2 alumnos en su ultimo año de la carrera de Ingenieria Informatica, en la Universidad del
                        Norte Santo Tomas de Aquino.
                        Este proyecto esta diseñado como exposición para el proyecto final.
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-8 mt-8 xl:mt-0 xl:mx-4 xl:w-1/2 md:grid-cols-2">
                    <div>
                        <img class="object-cover rounded-xl h-64 w-full"
                            src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80"
                            alt="">

                        <h1 class="mt-4 text-2xl font-semibold text-gray-700 capitalize dark:text-white">Santiago
                            Evangelista</h1>

                        <p class="mt-2 text-gray-500 capitalize dark:text-gray-300">Full stack developer</p>
                    </div>

                    <div>
                        <img class="object-cover rounded-xl h-64 w-full"
                            src="https://images.unsplash.com/photo-1499470932971-a90681ce8530?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80"
                            alt="">

                        <h1 class="mt-4 text-2xl font-semibold text-gray-700 capitalize dark:text-white">Matias Nicolas
                            Morales</h1>

                        <p class="mt-2 text-gray-500 capitalize dark:text-gray-300">Graphic Designer</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

<!-- This is the footer -->
<div class="bg-gray-900">
    <footer class="flex flex-wrap items-center justify-between p-3 m-auto">

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
</div>

</html>

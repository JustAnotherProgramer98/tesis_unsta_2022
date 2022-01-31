<!DOCTYPE html>
<html lang="en">
    <script src="https://cdn.tailwindcss.com/"></script>
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <section class="relative mx-auto">
            <!-- navbar -->
        <nav class="flex justify-between bg-gray-900 text-white w-screen">
        <div class="px-5 xl:px-12 py-6 flex w-full items-center">
            <a class="text-3xl font-bold font-heading" href="#">
                <!-- <img class="h-9" src="logo.png" alt="logo"> -->
            Logo Here.
            </a>
                <!-- Nav Links -->
            <ul class="hidden md:flex px-4 mx-auto font-semibold font-heading space-x-12">
            <li><a class="hover:text-gray-200" href="http://127.0.0.1:8000/">Home</a></li>
            
            <li><a class="hover:text-gray-200" href="http://127.0.0.1:8000/shop">Shop</a></li>
            <li><a class="hover:text-gray-200" href="#">Contact Us</a></li>
            </ul>
                <!-- Header Icons -->
            <div class="hidden xl:flex items-center space-x-5 items-center">
                <a class="hover:text-gray-200" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
                </a>
                <a class="flex items-center hover:text-gray-200" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                <span class="flex absolute -mt-5 ml-4">
                    <span class="animate-ping absolute inline-flex h-3 w-3 rounded-full bg-pink-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-3 w-3 bg-pink-500">
                    </span>
                    </span>
                </a>
                <!-- Sign In / Register      -->
                <a class="flex items-center hover:text-gray-200" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </a>
                
            </div>
        </div>
            <!-- Responsive navbar -->
            <a class="xl:hidden flex mr-6 items-center" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            <span class="flex absolute -mt-5 ml-4">
                <span class="animate-ping absolute inline-flex h-3 w-3 rounded-full bg-pink-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-3 w-3 bg-pink-500">
                </span>
            </span>
            </a>
            <a class="navbar-burger self-center mr-12 xl:hidden" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                        <h1 class="text-white font-semibold text-5xl ">
                            Encuentra tu Experiencia Ideal   
                        </h1> <br>
                        <!-- component -->
                        <div class="">
                            <div class="inline-flex flex-col justify-center relative text-gray-500">
                                <div class="relative">
                                    <input type="text" value= "Gar"class="p-2 pl-8 rounded border border-gray-200 bg-gray-200 focus:bg-white focus:outline-none focus:ring-2 focus:ring-yellow-600 focus:border-transparent" placeholder="search..." />
                                    <svg class="w-4 h-4 absolute left-2.5 top-3.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    </svg>
                                </div>
                                <h3 class="mt-2 text-sm">Ubicaciones:</h3>
                                <ul class="bg-white border border-gray-100 w-full mt-2 ">
                                    <li class="pl-8 pr-2 py-1 border-b-2 border-gray-100 relative cursor-pointer hover:bg-yellow-50 hover:text-gray-900">
                                        <svg class="stroke-current absolute w-4 h-4 left-2 top-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        <b>Gar</b>dameer - Italië
                                    </li>
                                    <li class="pl-8 pr-2 py-1 border-b-2 border-gray-100 relative cursor-pointer hover:bg-yellow-50 hover:text-gray-900">
                                        <svg class="stroke-current absolute w-4 h-4 left-2 top-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        <b>Gar</b>da - Veneto - Italië
                                    </li>
                                    <li class="pl-8 pr-2 py-1 border-b-2 border-gray-100 relative cursor-pointer hover:bg-yellow-50 hover:text-gray-900">
                                        <svg class="stroke-current absolute w-4 h-4 left-2 top-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                        </svg>
                                        <b>Gar</b>da Hotel - Italië
                                    </li>
                                    <li class="pl-8 pr-2 py-1 border-gray-100 relative cursor-pointer hover:bg-yellow-50 hover:text-gray-900">
                                        <svg class="stroke-current absolute w-4 h-4 left-2 top-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                        </svg>
                                        <b>Gar</b>dena Resort - Italië
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden h-70-px" style="transform: translateZ(0px)">
                <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                    <polygon class="text-blueGray-200 fill-current" points="2560 0 2560 100 0 100"></polygon>
                </svg>
                </div>
        </div>
    </section>       
     
    <!-- For Categorys -->
<main class="py-12 md:px-20 sm:px-14 px-6 border-b-2 border-gray-200 mb-5">
    <p class="text-center text-4xl font-semibold py-4">Por Categorias</p>

    @foreach ($category->take(-1) as $categories)
    <div class="sm:flex items-center shadow-md">
      <div class="md:px-10 sm:px-5">
        <h1 class="text-gray-800 font-bold text-2xl my-2"> {{ $categories->title }}</h1>
        <p class="text-gray-700 mb-2 md:mb-6">{{ $categories->description }}</p>
        <div class="flex justify-between mb-2">
          <span class="font-thin text-sm">May 20th 2020</span>
          <span class="sm:block hidden mb-2 text-gray-800 font-bold">Read more</span>
        </div>
      </div>
      <div>
        <img class="bg-cover" src="https://images.unsplash.com/photo-1527689368864-3a821dbccc34?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="" />
      </div>
    </div>
      @endforeach

    <div class="mt-6 md:flex space-x-6">
      
      @foreach ($category->take(3) as $categories)
      <div>
        <img src="https://images.unsplash.com/photo-1497493292307-31c376b6e479?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1171&q=80" alt="">
        <div>
          <h1 class="mt-3 text-gray-800 text-2xl font-bold my-2"> {{ $categories->title }} </h1>
          <p class="text-gray-700 mb-2"> {{ $categories->description }}</p>
          <div class="flex justify-between mt-4">
            <span class="font-thin text-sm">May 20th 2020</span>
            <span class="mb-2 text-gray-800 font-bold">Read more</span>
          </div>
        </div>
      </div>
      @endforeach

    </div>
  </main>

  <!-- For Places -->
  <main class="py-12 md:px-20 sm:px-14 px-6">
    <p class="text-center text-4xl font-semibold py-4">Por Lugares</p>
    
    @foreach ($places->take(-1) as $place)
    <div class="sm:flex items-center shadow-md">
      <div class="md:px-10 sm:px-5">
        <h1 class="text-gray-800 font-bold text-2xl my-2"> {{ $place->province }}</h1>
        <p class="text-gray-700 mb-2 md:mb-6">{{ $place->city }} corregir que la foto se quede del lado derecho sin que se estire</p>
        <div class="flex justify-between mb-2">
          <span class="font-thin text-sm">May 20th 2020</span>
          <span class="sm:block hidden mb-2 text-gray-800 font-bold">Read more</span>
        </div>
      </div>
      <div>
        <img class="bg-cover" src="https://images.unsplash.com/photo-1527689368864-3a821dbccc34?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="" />
      </div>
    </div>
      @endforeach

    <div class="mt-6 md:flex space-x-6">
      
      @foreach ($places->take(3) as $place)
      <div>
        <img src="https://images.unsplash.com/photo-1497493292307-31c376b6e479?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1171&q=80" alt="">
        <div>
          <h1 class="mt-3 text-gray-800 text-2xl font-bold my-2"> {{ $place->province }} </h1>
          <p class="text-gray-700 mb-2">{{ $place->city }}</p>
          <div class="flex justify-between mt-4">
            <span class="font-thin text-sm">May 20th 2020</span>
            <span class="mb-2 text-gray-800 font-bold">Read more</span>
          </div>
        </div>
      </div>
      @endforeach

    </div>
    
  </main>
</body>
</html>
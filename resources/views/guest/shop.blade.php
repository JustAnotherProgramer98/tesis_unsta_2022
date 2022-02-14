@extends('layouts.guest')
@section('content')     
<body class="overflow-x-hidden">
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
    <section>
            <!-- component -->
            <p class="text-center text-4xl font-semibold py-4"><br> Por Categorías</p>
            <div tabindex="0" class="focus:outline-none border-b-2 border-gray-200 mb-5">
                <!-- Remove py-8 -->
                <div class="mx-auto container py-8">
                                        
                    <div class="flex flex-wrap items-center lg:justify-between justify-center">
                        <!-- Card Categorias -->
                        @forelse ($category as $categories)
                        <a class="cursor-pointer rounded-md shadow-md shadow-gray-200 hover:shadow-dark-400/80 hover:shadow-2xl hover:bg-gray-50" href="s">
                            <div tabindex="0" class="focus:outline-none mx-2 w-72 xl:mb-0 mb-8">
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
                            </div>
                        </a>
                        @empty
                        <div class="w-full md:w-4/12 mx-auto px-4 text-center">
                            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                              <div class="px-4 py-5 flex-auto">
                                <div class="text-white p-3 text-center inline-flex items-center justify-center w-max h-max mb-5 shadow-lg rounded-full bg-blue-400">
                                  <span class="inline-block  text-blue-500 dark:text-blue-400">
                                        <i class="text-6xl text-white far fa-sad-tear"></i>
                                  </span>
                                </div>
                                <h6 class="text-xl font-semibold">Malas noticias</h6>
                                <p class="mt-2 mb-4 text-gray-600">
                                        No hay categorias aprobadas aun
                                </p>
                              </div>
                            </div>
                          </div>
                            @endforelse
                        <!-- Card Categorias Ends -->
                    </div> 
                </div>  
            </div>
            <script>
                if (!window.ShadyDOM) window.ShadyDOM = { force: true, noPatch: true };
            </script>
    </section>

  <!-- For Places -->
    <section>
            <!-- component -->
            <p class="text-center text-4xl font-semibold py-4"><br> Por Lugares</p>
            <div tabindex="0" class="focus:outline-none">
                <!-- Remove py-8 -->
                <div class="mx-auto container py-8">
                    <div class="flex flex-wrap items-center lg:justify-between justify-center">
                        <!-- Card 1 -->
                        @forelse ($category as $categories)
                        <a class="cursor-pointer rounded-md shadow-md shadow-gray-200 hover:shadow-dark-400/80 hover:shadow-2xl hover:bg-gray-50" href="s">
                            <div tabindex="0" class="focus:outline-none mx-2 w-72 xl:mb-0 mb-8">
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
                            </div>
                        </a>
                        @empty
                        <div class="w-full md:w-4/12 mx-auto px-4 text-center">
                            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                              <div class="px-4 py-5 flex-auto">
                                <div class="text-white p-3 text-center inline-flex items-center justify-center w-max h-max mb-5 shadow-lg rounded-full bg-green-400">
                                  <span class="inline-block  text-blue-500 dark:text-blue-400">
                                        <i class="text-6xl text-white far fa-sad-tear"></i>
                                  </span>
                                </div>
                                <h6 class="text-xl font-semibold">Malas noticias</h6>
                                <p class="mt-2 mb-4 text-gray-600">
                                        No hay lugares aprobados aun
                                </p>
                              </div>
                            </div>
                          </div>
                            @endforelse
                        <!-- Card 1 Ends -->
                      </div>    
                </div>  
            </div>
            <script>
                if (!window.ShadyDOM) window.ShadyDOM = { force: true, noPatch: true };
            </script>
    </section>
</body>
@endsection 
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
                    <div class="w-full lg:w-9/12 px-4 ml-auto mr-auto text-center">
                    <div class="pr-12">
                        <h1 class="text-white font-semibold text-5xl whitespace-nowrap">
                            Encuentra tu Experiencia Ideal   
                        </h1> <br>
                        <!-- component -->
                        <form action="{{ route('experiencies.product_shop') }}" method="GET" autocomplete="off">
                            <div class="w-9/12 inline-flex flex-col justify-center relative text-gray-500">
                                <div class="relative">

                                        <input name="search" value="{{ old('search') }}" type="text" class="w-full p-2 pl-8 rounded border border-gray-200 bg-gray-200 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Buscar experiencia..."/>
                                        <svg class="w-4 h-4 absolute left-2.5 top-3.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                        </svg>
                                    </div>
                                <br>
                                <p>o podes buscar por</p>
                                <div class="w-full inline-flex flex-row gap-4 mt-8">
                                    <section class="flex w-full flex-col">
                                        <label for="category" class="text-white font-semibold text-2xl whitespace-nowrap">Categorias</label>
                                        <select id="category" class="w-full p-2 pl-8 rounded border border-gray-200 bg-gray-200 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" name="category">
                                            <option selected value="X">Selecciona una opcion</option>
                                            @forelse ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                            @empty
                                                <option selected value="X">No hay categorias en la base de datos</option>
                                            @endforelse
    
                                        </select>
                                    </section>
                                    <section class="flex w-full flex-col">
                                        <label for="place" class="text-white font-semibold text-2xl whitespace-nowrap">Lugares</label>
                                        <select class="w-full p-2 pl-8 rounded border border-gray-200 bg-gray-200 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" name="place">
                                            <option selected value="X">Selecciona una opcion</option>
                                            @forelse ($places as $place)
                                            <option value="{{ $place->id }}">{{ $place->city->name }}</option>
                                            @empty
                                            <option selected value="X">No hay lugares en la base de datos</option>
                                            @endforelse
                                            
                                        </select>
                                    </section>
                                    <button  class="p-4 my-6 bg-paleta_tesis_gris hover:bg-blue-500 text-paleta_tesis_celeste font-semibold hover:text-white border border-blue-500 hover:border-transparent rounded">Buscar</button>
                                </div>
                            </div>
                        </form>
                        
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
     
    <section>
        <div class="flex mx-auto place-content-center">
            <p class="mt-8 text-center text-4xl text-paleta_tesis_celeste">Nuestras experiencias recomendadas</p>
            

        </div>
        <div  class="parent w-4/5 mx-auto mt-8 flex snap-x overflow-x-auto py-14">
            @forelse ($experiences as $experience)
            <div class="shrink-0 w-2/5  mx-4 ">
                    <div  class="relative h-80 bg-no-repeat cursor-pointer bg-paleta_tesis_blanco rounded-xl  ">
                        <img class="h-full w-full object-contain" src="https://images.unsplash.com/photo-1604999565976-8913ad2ddb7c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=320&h=160&q=80" alt="">
                        <p class="absolute bottom-5 text-2xl text-paleta_tesis_blanco bg-paleta_tesis_azul">Titulo: {{ $experience->title }}</p>
                        <p class="absolute bottom-0  text-paleta_tesis_blanco bg-paleta_tesis_azul">Por: {{ $experience->host->name.' '.$experience->host->surname }}</p>
                    </div>
                </div>
            @empty
                <p>No podemos reocmendarte experiendicas ahora</p>
            @endforelse
          </div>
    </section>
    <section>
        <!-- For Categorys -->
            <!-- component -->
            <p class="text-center text-4xl font-semibold py-4"><br> Por categorías</p>
            <div tabindex="0" class="focus:outline-none border-b-2 border-gray-200 mb-5">
                <!-- Remove py-8 -->
                <div class="mx-auto container py-8">
                                        
                    <div class="flex flex-wrap items-center lg:justify-between justify-center">
                        <!-- Card Categorias -->
                        @forelse ($categories as $category)
                        <a class="cursor-pointer rounded-md shadow-md shadow-gray-200 hover:shadow-dark-400/80 hover:shadow-2xl hover:bg-gray-50" href="s">
                            <div tabindex="0" class="focus:outline-none mx-2 w-72 xl:mb-0 mb-8">
                                <div>
                                    <img src="https://images.unsplash.com/photo-1497493292307-31c376b6e479?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1171&q=80" alt="">
                                    <div>
                                        <h1 class="mt-3 text-gray-800 text-2xl font-bold my-2"> {{ $category->title }} </h1>
                                        <p class="text-gray-700 mb-2"> {{ $category->description }}</p>
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
                        @forelse ($places as $place)
                        <a class="cursor-pointer rounded-md shadow-md shadow-gray-200 hover:shadow-dark-400/80 hover:shadow-2xl hover:bg-gray-50" href="s">
                            <div tabindex="0" class="focus:outline-none mx-2 w-72 xl:mb-0 mb-8">
                                <div>
                                    <img src="https://images.unsplash.com/photo-1497493292307-31c376b6e479?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1171&q=80" alt="">
                                    <div>
                                        <h1 class="mt-3 text-gray-800 text-2xl font-bold my-2"> {{ Str::limit($place->city->province->country->name.', '.$place->city->province->name, 25, '...') }}</h1>
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
                        <!-- Card 2 Ends -->
                      </div>    
                </div>  
            </div>
    </section>
</body>
<script>

</script>
@endsection 
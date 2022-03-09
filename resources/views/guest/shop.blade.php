@extends('layouts.guest')
@section('content')     
<body class="overflow-x-hidden">
    <section class="relative  bg-blueGray-50">
        <!-- Main tittle with the photo -->
        <div class="relative pt-16 pb-32 flex content-center items-center justify-center min-h-screen-75">
            
                <div class="absolute top-0 w-full h-full bg-paleta_tesis_azul">
                <span class="w-full h-full absolute opacity-75 bg-paleta_tesis_celeste"></span>
                </div>
                <div class="container relative mx-auto">
                <div class="items-center flex flex-wrap">
                    <div class="w-full lg:w-9/12 px-4 ml-auto mr-auto text-center">
                    <div class="pr-12">
                        <h1 class="text-white font-semibold text-5xl lg:whitespace-nowrap">Encuentra tu Experiencia Ideal   </h1> <br>
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
                                <p class="text-white">o podes buscar por</p>
                                <div class="w-full inline-sm:grid sm:grid-flow-row sm:auto-rows-max lg:flex lg:flex-row gap-4 mt-8">
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
                                    <button  class="transition-colors duration-700 p-4 my-6 bg-paleta_tesis_gris hover:bg-blue-500 text-paleta_tesis_celeste font-semibold hover:text-white border border-blue-500 hover:border-transparent rounded">Buscar</button>
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
     
<div class="bg-gradient-to-t from bg-paleta_tesis_gris via-paleta_tesis_blanco">
    <section>
        <div class="flex mx-auto place-content-center">
            <p class="mt-8 text-center text-4xl text-paleta_tesis_celeste">Nuestras experiencias recomendadas</p>
            

        </div>
        <div  class="parent w-4/5 mx-auto mt-8 flex snap-x overflow-x-auto py-14">
            @forelse ($experiences as $experience)
            <div class="shrink-0 w-2/5  mx-4 ">
                <a style="width: 22%" class="" href="{{ route('guest.product',$experience) }}">
                    <div class="focus:outline-none  xl:mb-0 mb-8 bg-white transition ease-in-out duration-110  hover:-translate-y-1 hover:scale-125 cursor-pointer rounded-md shadow-2xl hover:shadow-dark-400/80 hover:shadow-2xl  hover:bg-blue-200">
                        <div class="rounded-t-lg text-center {{ $experience->images->first() ? 'bg-transparent' : 'bg-gray-200' }}"> 
                            @if ($experience->images->first())
                                <img width="600px" height="600px" class=" m-4 mx-auto" src="{{asset('storage/'.$experience->images->first()->url)}}" alt="{{ $experience->images->first()->alt }}">
                            @else
                                <img width="300px" height="300px" class="rounded-3xl m-4 mx-auto" src="{{asset('images/Turistear.png')}}" alt="">                                
                            @endif
                            <div class="{{ $experience->images->first() ? '' : 'bg-white' }}">
                                <h1 class="mt-3 text-gray-800 text-2xl font-bold my-2"> {{ $experience->title }} </h1>
                                <p class="text-gray-700 mb-2"> {{ Str::limit($experience->description, 25, '...')  }}</p>
                                <div class="flex justify-between mt-4 m-3 ">
                                    <p class="text-sm font-thin text-paleta_tesis_azul mb-4">Aprobada por turiste<span style='color: #3F72AF'>AR</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                </div>
            @empty
            <div class="w-full md:w-4/12 mx-auto px-4 my-10 text-center">
                <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                  <div class="px-4 py-5 flex-auto">
                    <div class="text-white p-3 text-center inline-flex items-center justify-center w-max h-max mb-5 shadow-lg rounded-full bg-paleta_tesis_azul">
                      <span class="inline-block  text-blue-500 dark:text-blue-400">
                        <i class="fal fa-mountain text-6xl text-white"></i>
                      </span>
                    </div>
                    <h6 class="text-xl font-semibold">No tenemos recomendaciones</h6>
                    <p class="mt-8 mx-auto text-center italic">No podemos recomendarte experiencias ahora</p>
                  </div>
                </div>
              </div>
                
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
                                        
                    <div class="sm:grid sm:grid-flow-row sm:auto-rows-max lg:flex lg:flex-row items-center gap-8 justify-center">
                        <!-- Card Categorias -->
                        @forelse ($categories->take(4) as $category)
                        <a style="width: 22%" class="transition ease-in-out duration-110  hover:-translate-y-1 hover:scale-125 cursor-pointer rounded-md shadow-2xl hover:shadow-dark-400/80 hover:shadow-2xl bg-paleta_tesis_blanco hover:bg-blue-200" href="{{route('experiencies.by.category',$category)}}">
                            <div tabindex="0" class="focus:outline-none  xl:mb-0 mb-8">
                                <div class="rounded-t-lg"> 
                                    <img class="rounded-t-lg" src="{{asset($category->images->first()->url)}}" alt="{{ $category->images->first()->url }}">
                                    <div class="m-3">
                                        <h1 class="mt-3 text-gray-800 text-2xl font-bold my-2 lg:whitespace-nowrap"> {{ $category->title }} </h1>
                                        <p class="text-gray-700 mb-2 font-bold"> {{$category->description}}</p>
                                        <div class="flex justify-between mt-4">
                                            <p class="text-sm font-thin text-paleta_tesis_azul">Aprobada por turiste<span style='color: #3F72AF'>AR</span></p>
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
                    <div class="sm:grid sm:grid-flow-row sm:auto-rows-max lg:flex lg:flex-row items-center gap-8 justify-center">
                        <!-- Card 1 -->
                        @forelse ($places->take(8) as $place)
                        <a style="width: 22%" class="transition ease-in-out duration-110  hover:-translate-y-1 hover:scale-125 cursor-pointer rounded-md shadow-2xl hover:shadow-dark-400/80 hover:shadow-2xl bg-paleta_tesis_blanco hover:bg-blue-200" href="{{route('experiencies.by.place',$place)}}">
                            <div tabindex="0" class="focus:outline-none  xl:mb-0 mb-8">
                                <div class="rounded-t-lg"> 
                                    <img class="rounded-t-lg h-72 w-full" src="{{asset($place->images->first()->url)}}" alt="{{ $place->images->first()->url }}">
                                    <div class="m-3">
                                        <h1 class="mt-3 text-gray-800 text-2xl font-bold my-2"> {{ Str::limit($place->city->province->name.', '.$place->city->name, 20, '...') }}</h1>
                                        <div class="flex justify-between mt-4">
                                            <p class="text-sm font-thin text-paleta_tesis_azul">Aprobada por turiste<span style='color: #3F72AF'>AR</span></p>
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
</div>
</body>
<script>

</script>
@endsection 
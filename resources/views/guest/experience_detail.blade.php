@extends('layouts.guest')
@section('content')   
<main class="my-8">
    <div class="container mx-auto px-6">
        
        <div class="md:flex md:items-center">
                    
            <div class="md:flex-1 px-4">
                <div x-data="{ image: 1 }" x-cloak>
                    <div class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4">
                        <div x-show="image === 1" class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4 flex items-center justify-center">
                            <span class="text-5xl">1</span>
                        </div>

                        <div x-show="image === 2" class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4 flex items-center justify-center">
                            <span class="text-5xl">2</span>
                        </div>

                        <div x-show="image === 3" class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4 flex items-center justify-center">
                            <span class="text-5xl">3</span>
                        </div>

                        <div x-show="image === 4" class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4 flex items-center justify-center">
                            <span class="text-5xl">4</span>
                        </div>
                    </div>

                    <div class="flex -mx-2 mb-4">
                        <template x-for="i in 4">
                            <div class="flex-1 px-2">
                                <button x-on:click="image = i" :class="{ 'ring-2 ring-indigo-300 ring-inset': image === i }" class="focus:outline-none w-full rounded-lg h-24 md:h-32 bg-gray-100 flex items-center justify-center">
                                    <span x-text="i" class="text-2xl"></span>
                                </button>
                            </div>
                        </template>
                    </div>
                    
                </div>
            </div>

            <div class="md:flex-1 px-4">
                <h2 class="text-sm title-font text-gray-500 tracking-widest"> @foreach ($experience->categories as $category) {{ $category->title }}  @endforeach </h2>
                <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{ $experience->title }}</h1>
                <h2 class="mt-4 text-gray-800 text-2xl font-bold my-2">Anfitrion: <a class="text-paleta_tesis_celeste bg-paleta_tesis_gris rounded-md p-2 font-thin hover:text-paleta_tesis_gris" href="{{ route('user.detail',$experience->host) }}">{{ $experience->host->name.' '.$experience->host->surname }}</a></h2>
                
                <div class="flex mb-4">
                    <span class="flex items-center">
                        <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                        </svg>
                        <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                        </svg>
                        <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                        </svg>
                        <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                        </svg>
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                        </svg>
                        <span class="text-gray-600 ml-3">{{ count($experience->comments) > 0 ? count($experience->comments).' reseñas' : 'La experiencia aun no tiene reseñas , animate a ser el primero!' }} </span>
                    </span>
                </div>
                <p class="leading-relaxed">{{$experience->description}}</p>
                
                <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-200 mb-5">
                    <div class="flex ml-6 items-center">
                        <span class="mr-3">Participantes</span>
                        <div class="relative">
                            <select name="quantity_clients" class="rounded border appearance-none border-gray-400 py-2 focus:outline-none focus:border-red-500 text-base pl-3 pr-10">
                                 @for ($i=1;$experience->quantity_clients != $i;$i++)<option value="{{ $i }}">{{ $i }}</option>@endfor
                                
                            </select>
                            <span class="absolute right-0 top-0 h-full w-10 text-center text-gray-600 pointer-events-none flex items-center justify-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4" viewBox="0 0 24 24">
                                <path d="M6 9l6 6 6-6"></path>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="flex">
                    <span class="title-font font-medium text-2xl text-gray-900">Precio: ${{$experience->price}}</span>
                    <button class="flex ml-auto text-paleta_tesis_blanco bg-paleta_tesis_azul border-0 py-2 px-6 focus:outline-none hover:bg-paleta_tesis_celeste rounded">Comprar</button>
                    <button class="flex ml-3    text-paleta_tesis_gris bg-paleta_tesis_celeste border-0 py-2 px-6 focus:outline-none hover:bg-paleta_tesis_azul rounded">Agregar al carrito</button>
                </div>
            </div>
        </div>
        



        <div class="mt-16">
            <h3 class="text-paleta_tesis_gris text-2xl font-medium border-b border-b-paleta_tesis_azul">Más experiencias <span class="text-paleta_tesis_azul"> que recomendamos</span> </h3>
            
            <div class="mt-4 flex flex-row gap-8 place-content-center bg-gradient-to-b from-paleta_tesis_gris via-paleta_tesis_blanco">
                @foreach ($experiences as $experience)
                <div class="focus:outline-none mx-2 w-96 xl:mb-0 m-6 shadow-2xl">
                    <a href="{{ route('guest.product',$experience) }}">
                        <div>
                            @if ($experience->images->first())
                                <img width="400px" height="400px" class="focus:outline-none w-full rounded-3xl" src="{{asset('storage/'.$experience->images->first()->url)}}" alt="{{ $experience->images->first()->alt }}">
                                @else
                                <img width="400px" height="400px"   class="focus:outline-none w-full h-44 rounded-3xl m-4" src="{{asset('images/Turistear.png')}}" alt="Logo por defecto">
                            @endif
                            
                        </div>
                    </a>
                    <div class="bg-paleta_tesis_blanco">
                        <div class="p-4">
                            <div class="flex items-center">
                                <h2 tabindex="0" class="focus:outline-none text-lg font-semibold">{{$experience->title}}</h2>
                            </div>
                            <p tabindex="0" class="focus:outline-none text-xs text-gray-600 mt-2">{{Str::limit($experience->description, 20, '...') }}</p>
                            
                            <div class="flex items-center justify-between py-4">
                                <h2 tabindex="0" class="focus:outline-none text-indigo-700 text-xs font-semibold">
                                    {{ $experience->place->city->name }} - {{$experience->place->city->province->name}}
                                </h2>
                                <h3 tabindex="0" class="focus:outline-none text-indigo-700 text-xl font-semibold"></h3>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
         
    </div>
</main>
@endsection
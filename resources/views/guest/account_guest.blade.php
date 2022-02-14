@extends('layouts.guest')
@section('content')  

    <main class="profile-page">
      <section class="relative block" style="height: 500px;">
        <div
          class="absolute top-0 w-full h-full bg-center bg-cover"
          style='background-image: url("https://images.unsplash.com/photo-1499336315816-097655dcfbda?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=2710&amp;q=80");'
        >
          <span
            id="blackOverlay"
            class="w-full h-full absolute opacity-50 bg-black"
          ></span>
        </div>
        <div
          class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden"
          style="height: 70px;"
        >
          <svg
            class="absolute bottom-0 overflow-hidden"
            xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="none"
            version="1.1"
            viewBox="0 0 2560 100"
            x="0"
            y="0"
          >
            <polygon
              class="text-gray-300 fill-current"
              points="2560 0 2560 100 0 100"
            ></polygon>
          </svg>
        </div>
      </section>

    <section class="relative py-16 bg-gray-300">
        <div class="container mx-auto px-4">
            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64">
                <div class="px-6">
                    <div class="flex flex-wrap justify-center">
                        <div class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center">
                            <div class="relative">
                                <img
                                src="https://thumbs.dreamstime.com/z/icono-de-cuenta-personal-dise%C3%B1o-elementos-creativos-la-colecci%C3%B3n-iconos-pixel-perfecto-para-web-aplicaciones-software-uso-146958683.jpg" 
                                class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16"
                                style="max-width: 150px;"/>
                            </div>
                        </div>
                
                        <div class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center">
                            <span class="text-gray-800 dark:text-slate-400 text-md">Miembro desde</span>
                            <h2 class="text-gray-800 dark:text-slate-100 text-2xl font-semibold">{{($user->created_at)->format('d-m-Y')}}</h2>                                     
                        </div>

                        <div class="w-full lg:w-4/12 px-4 lg:order-1">
                            <div class="flex justify-center py-4 lg:pt-4 pt-8">
                                    <div class="mr-4 p-3 text-center">
                                        <span
                                        class="text-xl font-bold block uppercase tracking-wide text-gray-700"
                                        >4.5</span
                                        ><span class="text-sm text-gray-500">Estrellas</span>
                                    </div>
                                    <div class="mr-4 p-3 text-center">
                                            <div onclick="openNewTab(event, 'index')">
                                                <span class="text-xl font-bold block uppercase tracking-wide text-gray-700">
                                                    {{count($user->experiences)}}</span>
                                                <span class="text-sm text-gray-500">Experiencias</span>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-12">
                            <h3 class="text-4xl font-semibold leading-normal mb-2 text-gray-800 mb-2">
                            {{$user->surname}}, {{$user->name}} 
                            </h3>
                            <div class="text-sm leading-normal mt-0 mb-2 text-gray-500 font-bold uppercase">
                                <i class="fas fa-map-marker-alt mr-2 text-lg text-gray-500"></i>
                                {{$user->province}}, {{$user->country}}
                            </div>
                            <div class="mb-2 text-gray-700 mt-10">
                            <i class="fas fa-briefcase mr-2 text-lg text-gray-500"></i
                            >Agente de turismo - Turismo Tuc
                            </div>
                            <div class="mb-2 text-gray-700">
                            <i class="fas fa-university mr-2 text-lg text-gray-500"></i
                            >Universidad del Norte Santo Tomas de Aquino
                            </div>
                        </div>
                        <div class="mt-10 py-10 border-t border-gray-300 text-center">
                            <div class="flex flex-wrap justify-center">
                                <div class="w-full lg:w-9/12 px-4">
                                    <p class="mb-4 text-lg leading-relaxed text-gray-800">
                                    Hola a todos!!
                                    Mi nombre es Carlos y organizo experiencias para todas las edades: 
                                    Desde un festín con sándwiches con un experto hasta caminatas por los mejores senderos de Tucumán.
                                    No vivo con un lema, pero creo que ayuda ser un buen tipo y, por lo general, el karma regresa para ayudarte a largo plazo.
                                    No puedo esperar a conocerte pronto.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="py-6"><!-- comentarios -->
                            <!-- review items -->
                                        
                            <div class="mx-auto bg-white shadow-lg rounded-lg my-500 px-3 py-3 max-w-screen-sm w-full border">
                                <h1 class="ml-2 font-bold uppercase flex flex-wrap mt-12 justify-center"> Ultimos comentarios de sus experiencias </h1>
                                <div class="mb-1 tracking-wide px-4 py-4" >
                                    <h2 class="text-gray-800 font-semibold mt-1">67 Users reviews</h2>
                                    <div class="border-b -mx-8 px-8 pb-3">
                                        <div class="flex items-center mt-1">
                                            <div class=" w-1/5 text-indigo-500 tracking-tighter">
                                                <span>5 star</span>
                                            </div>
                                            <div class="w-3/5">
                                                <div class="bg-gray-300 w-full rounded-lg h-2">
                                                    <div class=" w-7/12 bg-indigo-600 rounded-lg h-2"></div>
                                                </div>
                                            </div>
                                            <div class="w-1/5 text-gray-700 pl-3">
                                                <span class="text-sm">51%</span>
                                            </div>
                                        </div><!-- first -->
                                        <div class="flex items-center mt-1">
                                            <div class="w-1/5 text-indigo-500 tracking-tighter">
                                                <span>4 star</span>
                                            </div>
                                            <div class="w-3/5">
                                                <div class="bg-gray-300 w-full rounded-lg h-2">
                                                    <div class="w-1/5 bg-indigo-600 rounded-lg h-2"></div>
                                                </div>
                                            </div>
                                            <div class="w-1/5 text-gray-700 pl-3">
                                                <span class="text-sm">17%</span>
                                            </div>
                                        </div><!-- second -->
                                        <div class="flex items-center mt-1">
                                            <div class="w-1/5 text-indigo-500 tracking-tighter">
                                                <span>3 star</span>
                                            </div>
                                            <div class="w-3/5">
                                                <div class="bg-gray-300 w-full rounded-lg h-2">
                                                    <div class=" w-3/12 bg-indigo-600 rounded-lg h-2"></div>
                                                </div>
                                            </div>
                                            <div class="w-1/5 text-gray-700 pl-3">
                                                <span class="text-sm">19%</span>
                                            </div>
                                        </div><!-- thierd -->
                                        <div class="flex items-center mt-1">
                                            <div class=" w-1/5 text-indigo-500 tracking-tighter">
                                                <span>2 star</span>
                                            </div>
                                            <div class="w-3/5">
                                                <div class="bg-gray-300 w-full rounded-lg h-2">
                                                    <div class=" w-1/5 bg-indigo-600 rounded-lg h-2"></div>
                                                </div>
                                            </div>
                                            <div class="w-1/5 text-gray-700 pl-3">
                                                <span class="text-sm">8%</span>
                                            </div>
                                        </div><!-- 4th -->
                                        <div class="flex items-center mt-1">
                                            <div class="w-1/5 text-indigo-500 tracking-tighter">
                                                <span>1 star</span>
                                            </div>
                                            <div class="w-3/5">
                                                <div class="bg-gray-300 w-full rounded-lg h-2">
                                                    <div class=" w-2/12 bg-indigo-600 rounded-lg h-2"></div>
                                                </div>
                                            </div>
                                            <div class="w-1/5 text-gray-700 pl-3">
                                                <span class="text-sm">5%</span>
                                            </div>
                                        </div><!-- 5th -->
                                    </div>
                                </div>
                                <!-- component -->
                            @foreach($user->experiences->take(4) as $experience)
                            
                            <div class="flex flex-wrap mt-12 justify-center">
                                <!-- {{ $experience->comments->first() ? '$experience->comments->first()->body' : '' }} -->
                                <div class="flex-shrink-0"> <!-- Imagen del usuario de la review -->
                                    <div class="inline-block relative">
                                    <div class="relative w-16 h-16 rounded-full overflow-hidden">
                                        <img class="absolute top-0 left-0 w-full h-full bg-cover object-fit object-cover" src="https://picsum.photos/id/646/200/200" alt="Profile picture">
                                        <div class="absolute top-0 left-0 w-full h-full rounded-full shadow-inner"></div>
                                    </div>
                                    <svg class="fill-current text-white bg-green-600 rounded-full p-1 absolute bottom-0 right-0 w-6 h-6 -mx-1 -my-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M19 11a7.5 7.5 0 0 1-3.5 5.94L10 20l-5.5-3.06A7.5 7.5 0 0 1 1 11V3c3.38 0 6.5-1.12 9-3 2.5 1.89 5.62 3 9 3v8zm-9 1.08l2.92 2.04-1.03-3.41 2.84-2.15-3.56-.08L10 5.12 8.83 8.48l-3.56.08L8.1 10.7l-1.03 3.4L10 12.09z"/>
                                    </svg>
                                    </div>
                                </div> <!--FIN  Imagen del usuario de la review -->
                            
                                <div class="ml-6">
                                    <p class="flex items-baseline">
                                    
                                    
                                    <span class="text-gray-600 font-bold">Nombre del que escribio la review.</span>
                                    <span class="ml-2 text-green-600 text-xs">Verified Buyer</span>
                                    </p>
                                    <div class="flex items-center mt-1"> <!-- Estrellass de la review -->
                                    <svg class="w-4 h-4 fill-current text-yellow-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                    <svg class="w-4 h-4 fill-current text-yellow-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                    <svg class="w-4 h-4 fill-current text-yellow-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                    <svg class="w-4 h-4 fill-current text-yellow-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                    <svg class="w-4 h-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                    </div> <!--FIN  Estrellass de la review -->
                                    
                                    <div class="mt-3"> <!-- Cuerpo de la review -->
                                    <span class="font-bold">Sapien consequat eleifend!</span>
                                    <p class="mt-1">body</p>
                                    </div><!-- FIN  Cuerpo de la review -->

                                    <div class="flex items-center justify-between mt-4 text-sm text-gray-600 fill-current"> <!-- Botones para compartir de la review -->
                                    <button class="flex items-center">
                                        <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M5.08 12.16A2.99 2.99 0 0 1 0 10a3 3 0 0 1 5.08-2.16l8.94-4.47a3 3 0 1 1 .9 1.79L5.98 9.63a3.03 3.03 0 0 1 0 .74l8.94 4.47A2.99 2.99 0 0 1 20 17a3 3 0 1 1-5.98-.37l-8.94-4.47z"/></svg>
                                        <span class="ml-2">Share</span>
                                    </button>
                                    <div class="flex items-center">
                                        <span>Was this review helplful?</span>
                                        <button class="flex items-center ml-6">
                                        <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M11 0h1v3l3 7v8a2 2 0 0 1-2 2H5c-1.1 0-2.31-.84-2.7-1.88L0 12v-2a2 2 0 0 1 2-2h7V2a2 2 0 0 1 2-2zm6 10h3v10h-3V10z"/></svg>
                                        <span class="ml-2">56</span>
                                        </button>
                                        <button class="flex items-center ml-4">
                                        <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M11 20a2 2 0 0 1-2-2v-6H2a2 2 0 0 1-2-2V8l2.3-6.12A3.11 3.11 0 0 1 5 0h8a2 2 0 0 1 2 2v8l-3 7v3h-1zm6-10V0h3v10h-3z"/></svg>
                                        <span class="ml-2">10</span>
                                        </button>
                                    </div>
                                    </div> <!-- FIN  Botones para compartir de la review -->
                                </div>
                            </div><!-- End component -->
                            @endforeach
                            </div> <!-- FIN review items -->

                        </div><!-- fin comentarios -->

                </div>
            </div>
        </div>
    </section>

    </main>
    @endsection 
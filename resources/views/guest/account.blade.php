@extends('layouts.guest')
@section('content')     
    <main class="profile-page">
      <section class="relative block" style="height: 500px;">
        <div
          class="absolute top-0 w-full h-full bg-center bg-cover"
          style='background-image: url("https://images.unsplash.com/photo-1499336315816-097655dcfbda?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=2710&amp;q=80"); z-index:-10'
        >
          <span id="blackOverlay" class="w-full h-full absolute opacity-50 bg-black"></span>
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
          <div
            class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64"
          >
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
               
                <div class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center"> <!-- Botones del lado derecho de la foto -->
                  
                    <span class="text-gray-800 dark:text-slate-400 text-md">Miembro desde</span>
                    <h2 class="text-gray-800 dark:text-slate-100 text-2xl font-semibold">{{($user->created_at)->format('d-m-Y')}}</h2>
                    
                </div> <!-- FIN Botoes del lado derecho de la foto --> 

                  <div class="w-full lg:w-4/12 px-4 lg:order-1"> <!-- Botones del lado izquierdo de la foto --> 
                    <div class="flex justify-center py-4 lg:pt-4 pt-8">
                      <div class="mr-4 p-3 text-center">
                        <span
                          class="text-xl font-bold block uppercase tracking-wide text-gray-700"
                          >4.5</span
                          ><span class="text-sm text-gray-500">Estrellas</span>
                      </div>

                      <div class="mr-4 p-3 text-center" onclick="openNewTab(event, 'index')">
                          <span class="text-xl font-bold block uppercase tracking-wide text-gray-700">{{count($user->experiences)}}</span>
                          <span class="text-sm text-gray-500">Experiencias</span>
                      </div>

                      <div class="mr-4 p-3 text-center" onclick="openNewTab(event, 'sales')">
                      
                        @php
                            $balance=0;
                          foreach ($user->experiences as $experience) {
                            foreach ($experience->sales as $sale) {
                              if ($sale->status=='1') {
                                $balance=$balance+$sale->amount;
                              }
                            }
                          }
                        @endphp
                        <span class="text-xl font-bold block uppercase tracking-wide text-gray-700">$ {{ $balance }}</span>
                        <span class="text-sm text-gray-500">Ganancias</span>
                      </div>

                    </div>
                  </div> <!-- FIN Botoes del lado izquierdo de la foto --> 
              </div>

              <div class="text-center mt-12">
                <h3
                  class="text-4xl font-semibold leading-normal text-gray-800 mb-2"
                >
                  {{$user->surname}}, {{$user->name}} 
                </h3>
                <div
                  class="text-sm leading-normal mt-0 mb-2 text-gray-500 font-bold uppercase"
                >
                  <i
                    class="fas fa-map-marker-alt mr-2 text-lg text-gray-500"
                  ></i>
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

              <!-- Tabla de valores -->              
              <div id="index" class="tabcontent block py-8 pb-20 px-4 margin-left: 30px;margin-right: 30px">
                <br>
                <div class="flex gap-4 my-4 ">
                  <div class="relative w-1/2">
                      <input type="text" class="w-full p-2 pl-8 rounded border border-gray-200 bg-gray-200 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="     Buscar experiencia..." />
                      <svg class="w-4 h-4 absolute left-2.5 top-3.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                      </svg>
                  </div>
                  <button style="margin-top: auto;margin-bottom: auto" onclick="openNewTab(event, 'create')"
                  class="mb-4 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Crear una experiencia </button>
                      <button style="margin-top: auto;margin-bottom: auto" id="button-popover" class="rounded-full border-2 border-blue-500 shadow-lg h-8 w-8" aria-describedby="tooltip">?</button>
                      <div id="tooltip" role="tooltip"> Hace click en las primeras 3 columnas y mira el detalle de lo que quieras
                          <div id="arrow" data-popper-arrow></div>
                      </div>
                </div>
                @include('components.hosts.host_experience_table')
                
              </div> <!-- Fin de Tabla de valores -->
              @include('host.sales_index')
              @include('host.create_experience')
              @include('host.show_experience')

            </div>
          </div>
        </div>
      </section>
    </main>
@endsection    
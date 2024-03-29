@extends('layouts.guest')
@section('content')     
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

{{-- //Get how many stars I have --}}
      @php
      $numerber_of_reviews = $one_star_review = $two_star_review = $three_star_review= $four_star_review = $five_star_review =0;

      foreach (Auth::user()->experiences as $experience) {
          $numerber_of_reviews=$numerber_of_reviews+count($experience->comments);
          foreach ($experience->comments as $comment) {
              switch ($comment->stars) {
                  case (1):
                  $one_star_review++;
                      break;
                  case (2):
                  $two_star_review++;
                      break;
                  case (3):
                  $three_star_review++;
                      break;
                  case (4):
                  $four_star_review++;
                      break;
                  case (5):
                  $five_star_review++;
                      break;
                  default:
                      break;
                  }
              }
          }
          $numer_of_starts=($one_star_review*1)+($two_star_review*2)+($three_star_review*3)+($four_star_review*4)+($five_star_review*5);
      @endphp

    <main class="profile-page">
      <section class="relative block" style="height: 500px;">
        {{-- Imagen de fondo --}}
        {{-- @if (Auth::user()->images->first()) --}}
        
        <div class="absolute top-0 w-full h-full bg-center bg-cover"
          style='background-image: url("https://images.unsplash.com/photo-1499336315816-097655dcfbda?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=2710&amp;q=80"); z-index:-10'>
          <span id="blackOverlay" class="w-full h-full absolute opacity-50 bg-black"></span>
        </div>
      {{-- @else
        <div class="absolute top-0 w-full h-full bg-center bg-cover"
          style='background-image: url("{{asset('storage/'.Auth::user()->images->first()->url)}}"); z-index:-10'>
          <span id="blackOverlay" class="w-full h-full absolute opacity-50 bg-black"></span>
        </div>
          @endif --}}
        <div
          class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden"
          style="height: 70px;">
          <svg
            class="absolute bottom-0 overflow-hidden"
            xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="none"
            version="1.1"
            viewBox="0 0 2560 100"
            x="0"
            y="0">
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
                    @if (Auth::user()->images->first())
                    <img src="{{asset('storage/'.Auth::user()->images->first()->url)}}" alt="{{ Auth::user()->images->first()->alt }}" 
                      class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-32 -ml-20 lg:-ml-16"
                      style="max-width: 150px;"/>
                    
                    @else
                    <img
                    src="https://thumbs.dreamstime.com/z/icono-de-cuenta-personal-dise%C3%B1o-elementos-creativos-la-colecci%C3%B3n-iconos-pixel-perfecto-para-web-aplicaciones-software-uso-146958683.jpg" 
                    class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-32 -ml-20 lg:-ml-16"
                    style="max-width: 150px;"/>
                    @endif
                    
                  </div>
                </div>
               
                <div class="flex flex-col w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center"> <!-- Botones del lado derecho de la foto -->
                  <br>
                  <p class="text-gray-800 dark:text-slate-400 text-md">Estado de la cuenta
                    @switch(Auth::user()->status)
                  @case(0)
                      <span
                          class="cursor-default px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">Inactiva
                      </span>
                  @break
                  @case(1)
                      <span
                          class="cursor-default px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">Activa
                      </span>
                  @break
                  @default
                      <span
                          class="cursor-default px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full">
                          Pendiente de aprobacion</span>
                  @endswitch
                  </p>
                  <br>
                  
                  <p class="text-gray-800 dark:text-slate-400 text-md">Miembro desde</p>
                  <h2 class="text-gray-800 dark:text-slate-100 text-2xl font-semibold">{{(Auth::user()->created_at)->format('d-m-Y')}}</h2>
                  

                  
                </div> <!-- FIN Botoes del lado derecho de la foto --> 
                {{-- En caso de ser Admin o Anfitrion --}}
                @if (Auth::user()->role->name!="Cliente")
                  <div class="w-full lg:w-4/12 px-4 lg:order-1"> <!-- Botones del lado izquierdo de la foto --> 
                    <div class="flex justify-center py-4 lg:pt-4 pt-8">
                      <div class="mr-4 p-3 text-center bg-gray-200 rounded-md shadow-xl hover:bg-gray-400" onclick="openNewTab(event, 'comments')">
                        <span class="text-xl font-bold block uppercase tracking-wide text-gray-700">{{ $numer_of_starts }}</span>
                        <span class="text-sm text-gray-500">Estrellas</span>
                      </div>

                      <div class="mr-4 p-3 text-center bg-gray-200 rounded-md shadow-xl hover:bg-gray-400" onclick="openNewTab(event, 'index')">
                          <span class="text-xl font-bold block uppercase tracking-wide text-gray-700">{{count(Auth::user()->experiences)}}</span>
                          <span class="text-sm text-gray-500">Experiencias</span>
                      </div>

                      <div class="mr-4 p-3 text-center bg-gray-200 rounded-md shadow-xl hover:bg-gray-400" onclick="openNewTab(event, 'sales')">
                      
                        @php
                            $balance=0;
                          foreach (Auth::user()->experiences as $experience) {
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
                  </div>
                  {{-- En caso de ser Cliente--}}
                  @else
                  <div class="w-full lg:w-4/12 px-4 lg:order-1"> <!-- Botones del lado izquierdo de la foto --> 
                    <div class="flex justify-center py-4 lg:pt-4 pt-8">
                      <div class="mr-4 p-3 text-center bg-gray-200 rounded-md shadow-xl hover:bg-gray-400" onclick="openNewTab(event, 'index')">
                          <span class="text-xl font-bold block uppercase tracking-wide text-gray-700">{{count(Auth::user()->sales)}}</span>
                          <span class="text-sm text-gray-500">Experiencias totales</span>
                      </div>
                    </div>
                  </div>
                  @endif <!-- FIN Botoes del lado izquierdo de la foto --> 
              </div>

              <div class="text-center mt-12">
                <p>Cuenta:
                      @switch(Auth::user()->role->name)
                      @case('Admin')
                          <span
                              class="cursor-default px-2 py-1 font-semibold leading-tight text-sky-700 bg-sky-100 rounded-full dark:text-sky-100 dark:bg-sky-700">Admin
                          </span>
                      @break
                      @case('Anfitrion')
                          <span
                              class="cursor-default px-2 py-1 font-semibold leading-tight text-purple-700 bg-purple-100 rounded-full dark:bg-purple-700 dark:text-purple-100">Anfitrion
                          </span>
                      @break
                      @default
                          <span style="background-color: #6495ed" class="cursor-default px-2 py-1 font-semibold leading-tight text-gray-200 rounded-full">Cliente</span>
                  @endswitch
                </p>
                <h3 class="text-4xl font-semibold leading-normal text-gray-800 mb-2">
                  {{Auth::user()->surname}}, {{Auth::user()->name}} 
                </h3>
                <div class="text-sm leading-normal mt-0 mb-2 text-gray-500 font-bold uppercase">
                  <i class="fas fa-map-marker-alt mr-2 text-lg text-gray-500"></i>
                  {{Auth::user()->province}}, {{Auth::user()->country}}
                </div>
                
                    <div class="text-sm leading-normal mt-0 mb-2  font-bold uppercase">
                       {{Auth::user()->introducing_me ?? 'Aun no te describiste para la gente de turistear...'}}
                    </div>  
                
                
                <div class="mb-2 text-gray-700 mt-10">
                  <i class="fas fa-briefcase mr-2 text-lg text-gray-500"></i>
                  Agente de turismo - Turismo Tuc
                </div>
                <div class="mb-2 text-gray-700">
                  <i class="fas fa-university mr-2 text-lg text-gray-500"></i>
                  Universidad del Norte Santo Tomas de Aquino
                </div>
              </div>

              <!-- Tabla de valores -->  
              {{-- Tablas en caso de ser Anfitrion o Admin --}}
              @if (Auth::user()->role->name!="Cliente")
              @if ($errors->any())
              <div class="text-center bg-blue-800 text-lg  text-white italic">
                  <ul>
                      @foreach ($errors->all() as $error)
                      <li>{{$error}}</li>
                      @endforeach
                  </ul>
              </div>
              @endif
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
                  @include('host.comments')

                  {{-- Tabla en caso de ser Cliente --}}
                  @else
                  @if ($errors->any())
                      <div class="">
                        @foreach ($errors->all() as $error)
                          <h4 class="pl-4 text-red-700 rounded-md bg-red-100 m-4 p-2 shadow-lg  text-2xl "><i class="pr-4 fas fa-times text-red-700 text-2xl"></i>{{$error}}</h4>
                        @endforeach
                      </div>
                  @endif
                  @if (\Session::has('commented'))
                    <h4 class="pl-4 text-green-700 rounded-md bg-green-100 m-4 p-2 shadow-lg  text-2xl "><i class="pr-4 fas fa-check text-green-700 text-2xl"></i>{{Session::get('commented')}}</h4>
                  @endif
                  <div class="block py-8 pb-20 px-4 margin-left: 30px;margin-right: 30px">
                      <br>
                      @include('components.guests.experience_table')
                  </div>
                      @include('components.guests.modal_comment')
                @endif
            </div>
          </div>
        </div>
      </section>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.21.1/sweetalert2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    
    <script>
      $(document).ready(function() {
        $('.input-images').imageUploader({
          label: 'Arrastra o hace click para subir las imagenes',
          imagesInputName: 'images'
        });


          //Estrellas:
          var xValues = ["1 estrella", "2 estrellas","3 estrellas","4 estrellas","5 estrellas"];
          var yValues = [@json($five_star_review),@json($four_star_review),@json($three_star_review),@json($two_star_review),@json($one_star_review)];
          var barColors = ["#789395","#94B49F","#398AB9","#1C658C","#F1E0AC"];

          new Chart("rates_and_stars", {
          type: "pie",
          data: {
              labels: xValues,
              datasets: [{
              backgroundColor: barColors,
              data: yValues
              }]
          },
          options: {
              title: {
              display: true,
              responsive:true,
              text: "Estrellas del usuario"
              }
          }
          });
    });
  
  
    </script>
@endsection    
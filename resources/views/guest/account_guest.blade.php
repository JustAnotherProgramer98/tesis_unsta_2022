@extends('layouts.guest')
@section('content')  
<style>
    html{
        scroll-behavior: smooth;
    }
</style>
@php
$numerber_of_reviews = $one_star_review = $two_star_review = $three_star_review= $four_star_review = $five_star_review =0;

foreach ($user->experiences as $experience) {
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
    if($numerber_of_reviews == 0){
        $numer_of_starts=(($one_star_review*1)+($two_star_review*2)+($three_star_review*3)+($four_star_review*4)+($five_star_review*5));
    } else{
        $numer_of_starts=(($one_star_review*1)+($two_star_review*2)+($three_star_review*3)+($four_star_review*4)+($five_star_review*5))/$numerber_of_reviews;
    }
@endphp


    <main class="profile-page">

        
        <section class="relative block" style="height: 500px;">
        <div class="absolute top-0 w-full h-full bg-center bg-cover"
          style='background-image: url("https://images.unsplash.com/photo-1499336315816-097655dcfbda?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=2710&amp;q=80");'>
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
        <button style="z-index: 999;display: none" onclick="backToTop()" class="animate-bounce bg-paleta_tesis_blanco border border-paleta_tesis_celeste rounded-xl fixed bottom-5 right-8 outline-none p-3 " id="GoToTop">Subir</button>
        <div class="container mx-auto px-4">
            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64">
                <div class="px-6">
                    <div class="flex flex-wrap justify-center">
                        <div class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center">
                            <div class="relative">
                                @if ($user->images->first())
                                <img src="{{asset('storage/'.$user->images->first()->url)}}" alt="{{ $user->images->first()->alt }}" 
                                  class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16"
                                  style="max-width: 150px;"/>
                                
                                @else
                                <img
                                src="https://thumbs.dreamstime.com/z/icono-de-cuenta-personal-dise%C3%B1o-elementos-creativos-la-colecci%C3%B3n-iconos-pixel-perfecto-para-web-aplicaciones-software-uso-146958683.jpg" 
                                class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16"
                                style="max-width: 150px;"/>
                                @endif
                            </div>
                        </div>
                
                        <div class="flex flex-col w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center"> <!-- Botones del lado derecho de la foto -->
                            <br>
                            <p class="text-gray-800 dark:text-slate-400 text-md">Estado de la cuenta
                              @switch($user->status)
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
                            <h2 class="text-gray-800 dark:text-slate-100 text-2xl font-semibold">{{($user->created_at)->format('d-m-Y')}}</h2>
                            
          
                            
                          </div> <!-- FIN Botoes del lado derecho de la foto --> 

                        <div class="w-full lg:w-4/12 px-4 lg:order-1">
                            <div class="flex justify-center py-4 lg:pt-4 pt-8">
                                    <div class="mr-4 p-3 text-center border-2 border-paleta_tesis_azul rounded-xl">
                                        <span
                                        class="text-xl font-bold block uppercase tracking-wide text-gray-700">{{ $numer_of_starts }}</span><span class="text-sm text-gray-500">Estrellas totales</span>
                                    </div>
                                    <a href="#reseñas">
                                    <div class="mr-4 p-3 text-center bg-paleta_tesis_azul rounded-xl">
                                            <div>
                                                <span class="text-xl font-bold block uppercase tracking-wide text-paleta_tesis_blanco">{{count($user->experiences)}}</span>
                                                <span class="text-sm text-paleta_tesis_blanco">Experiencias</span>
                                            </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-12">
                            <p>Cuenta:
                                    @switch($user->role->name)
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
                            <h3 class="text-4xl font-semibold leading-normal text-gray-800 mb-2">{{$user->surname}}, {{$user->name}} </h3>
                            <div class="text-sm leading-normal mt-0 mb-2 text-gray-500 font-bold uppercase">
                                <i class="fas fa-map-marker-alt mr-2 text-lg text-gray-500"></i>
                                {{$user->province}}, {{$user->country}}
                            </div>
                           
                        </div>
                        <div class="mt-10 py-10 border-t border-gray-300 text-center">
                            <div class="flex flex-wrap justify-center">
                                <div class="w-full lg:w-9/12 px-4">
                                    <p class="mb-4 text-lg leading-relaxed text-gray-800">
                                        {{ $user->introducing_me ?? ''  }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @include('components.user_reviews',['user'=>$user])

                </div>
            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

<script>
    //Get the button
var mybutton = document.getElementById("GoToTop");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function backToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
   //Estrellas:
   var xValues = ["5 estrella", "4 estrellas","3 estrellas","2 estrellas","1 estrellas"];
          var yValues = [@json($five_star_review),@json($four_star_review),@json($three_star_review),@json($two_star_review),@json($one_star_review)];
          var barColors = ["#789395","#FA58B6","#7A0BC0","#270082","#1A1A40"];

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
</script>
    </main>
    @endsection 
@extends('layouts.guest')
@section('content')    
<body>
<!-- Main tittle with the photo -->
    <section class="relative  bg-blueGray-50">
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
                                Conocé lo mágico de cada lugar. ¿Qué estás esperando? 
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

<!-- Project information -->
    <section class="pb-20 bg-gray-300 -mt-24">
        <div class="container mx-auto px-4">
          <div class="flex flex-wrap">

            <div class="lg:pt-12 pt-6 w-full md:w-4/12 px-4 text-center">
              <div
                class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg"
              >
                <div class="px-4 py-5 flex-auto">
                  <div
                    class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-red-400"
                  >
                    <span class="inline-block text-blue-500 dark:text-blue-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                            stroke="white">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z" />
                        </svg>
                    </span>
                  </div>
                  
                  <h6 class="text-xl font-semibold">Expertos Locales</h6>
                  <p class="mt-2 mb-4 text-gray-600">
                    Organizadas por personas locales que aman lo que hacen y el lugar donde viven.
                  </p>
                </div>
              </div>
            </div>

            <div class="w-full md:w-4/12 px-4 text-center">
              <div
                class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg"
              >
                <div class="px-4 py-5 flex-auto">
                  <div
                    class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-blue-400"
                  >
                    <span class="inline-block text-blue-500 dark:text-blue-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                            stroke="white">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z" />
                        </svg>
                    </span>
                  </div>
                  <h6 class="text-xl font-semibold">Grupos Chicos</h6>
                  <p class="mt-2 mb-4 text-gray-600">
                  Como los grupos son chicos, nunca te vas a perder entre la multitud.
                  </p>
                </div>
              </div>
            </div>
            
            <div class="pt-6 w-full md:w-4/12 px-4 text-center">
              <div
                class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg"
              >
                <div class="px-4 py-5 flex-auto">
                  <div
                    class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-green-400"
                  >
                    <span class="inline-block text-blue-500 dark:text-blue-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                            stroke="white">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                        </svg>
                    </span>
                  </div>
                  <h6 class="text-xl font-semibold">Altos Estandáres</h6>
                  <p class="mt-2 mb-4 text-gray-600">
                  Revisamos todas las experiencias para comprobar que ofrezcan una perspectiva única en el tema.
                  </p>
                </div>
              </div>
            </div>
          </div>
          
          <div class="flex flex-wrap items-center mt-32">
            <div class="w-full md:w-5/12 px-4 mr-auto ml-auto">
              <div
                class="text-gray-600 p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-gray-100"
              >
                <i class="fas fa-user-friends text-xl"></i>
              </div>
              <h3 class="text-3xl mb-2 font-semibold leading-normal">
                ¡Vive, Crea y Comparte Experiencias!
              </h3>
              <p
                class="text-lg font-light leading-relaxed mt-4 mb-4 text-gray-700"
              >
                Sabemos la difícil tarea de realizar un viaje y explorar al máximo todas sus aventuras y paisajes.
              </p>
              <p
                class="text-lg font-light leading-relaxed mt-0 mb-4 text-gray-700"
              >
                Por eso confiamos en nuestros expertos locales para poder garantizarte una verdadera y genuina experiencia. 
                
              </p>
              <p
                class="text-lg font-light leading-relaxed mt-0 mb-4 text-gray-700"
              >
                ¡Deja que ellos te guíen por los mejores lugares!
              </p>
            </div>
            <div class="w-full md:w-4/12 px-4 mr-auto ml-auto">
              <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-700"
              >
                <img
                  alt="..."
                  src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=1051&amp;q=80"
                  class="w-full align-middle rounded-t-lg"
                />
                <blockquote class="relative p-8 mb-4">
                  <svg
                    preserveAspectRatio="none"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 583 95"
                    class="absolute left-0 w-full block"
                    style="height: 95px; top: -94px;"
                  >
                    <polygon
                      points="-30,95 583,95 583,65"
                      class="text-gray-700 fill-current"
                    ></polygon>
                  </svg>
                  <h4 class="text-xl font-bold text-white">
                    Servicios de Primer Nivel
                  </h4>
                  <p class="text-md font-light mt-2 text-white">
                    Paseos en botes por los mejores ríos de Neuquén, guías turísticas por las calles de Buenos Aires,
                    Prueba los mejores vinos de Mendoza y muchísimos más.
                  </p>
                </blockquote>
              </div>
            </div>
          </div>
        </div>
    </section>
      
<!-- This is the Relevant Experience  -->
<section>
@if(count($experiences)>1)
        <div class="min-h-screen">
            <p class="text-center text-4xl font-semibold py-4"><br> Experiencias Destacadas</p>
            <div class="p-4 gap-4 select-none flex mx-auto">
                @foreach ($experiences->take(4) as $experiencie)
                  <x-experience-card :experiencie=$experiencie></x-experience-card>
                @endforeach
            </div>
        </div>
    
    @else
      <div class="min-h-max m-4"> 
          <p class="text-center text-4xl font-semibold py-4"><br><i class="text-6xl far fa-meh-blank"></i> <br> Parece que no hay experiencias aprobadas...</p>
      </div>
      @endif
  </section>

<!-- Description with a photo -->
    <section>
        <div class="bg-gray-800">
            <div class="lg:grid lg:grid-cols-2">
                <div class="py-24 px-10 lg:px-0 max-w-3xl lg:max-w-md mx-auto">
                    <h2 class="text-4xl tracking-tight font-extrabold text-gray-100">
                        <span class="block">¿Estás listo para la aventura?</span>
                        <span class="block">Registrate gratis y empezá a disfrutar tu vida.</span>
                    </h2>
                    <p class="text-gray-300 mt-5">
                        Sigue experimentando a travez del mundo con nuestra ayuda. 
                        Con tan solo un click. 
                    </p>
                    <div class="inline-block shadow mt-5">
                        <a href="#"
                            class="inline-block py-3 px-4 bg-white hover:bg-indigo-100 text-indigo-500 font-medium border border-transparent rounded-md">Registrarse</a>
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

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.21.1/sweetalert2.min.js"></script>


@if (session('status'))
<script>
  Swal.fire({  
  text: 'Tu perfil fue creado correctamente , busca tu experiencia ideal!',
  title: "<h1 style='color:#112D4E '>Te damos la bienvenida a Turiste<span style='color: #3F72AF'>AR</span>!</h1>",
  
  imageUrl: "{{ asset('images/Turistear.png') }}",
  imageWidth: 300,
  imageHeight: 100,
  imageAlt: 'Turistear logo',
  confirmButtonText: 'Adelante!',
  background:'#F9F7F7',
  margin: '5em',
  confirmButtonColor: '#112D4E',
  width: 600,
})
 </script>
@elseif (session('host'))
<script>
  Swal.fire({  
    title: "<h1 style='color:#112D4E '>Te damos la bienvenida a Turiste<span style='color: #3F72AF'>AR</span>!</h1>",
  text: 'Tu cuenta sera verificada por el administrador y te notificaremos cualquier novedad a tu correo!',
  
  imageUrl: "{{ asset('images/Turistear.png') }}",
  imageWidth: 300,
  imageHeight: 100,
  imageAlt: 'Turistear logo',
  confirmButtonText: 'Adelante!',
  background:'#F9F7F7',
  margin: '5em',
  confirmButtonColor: '#112D4E',
  width: 600,
})
 </script>

@endif
@endsection 
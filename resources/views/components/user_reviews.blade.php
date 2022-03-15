@if (count($user->experiences) != 0)

    <div id="reseñas" class="py-2">
        <!-- comentarios -->
        <!-- review items -->
        <div class="mx-auto bg-white shadow-lg rounded-lg my-500 px-3 py-3 w-9/12 border">
            <h1 class="ml-2 font-bold uppercase flex flex-wrap mt-12 justify-center"> Valoracion promedio de experiencias
            </h1>
            <div class="mb-1 tracking-wide px-4 py-4">
                <h2 class="text-gray-800 font-semibold mt-1">Cantidad de valoraciones: {{ $numerber_of_reviews }}</h2>
                <div class="px-8 pb-3">
                    <canvas class="mx-auto" id="rates_and_stars" style="width:100%;max-width:600px"></canvas>
                </div>
            </div>
            <!-- component -->
            @forelse($user->experiences as $experience)
                <div class="mt-12 bg-paleta_tesis_blanco border-b-2 border-b-paleta_tesis_celeste">
                    <p class="text-paleta_tesis_azul ">Experiencia: <b>{{ $experience->title }}</b> </p>
                </div>

                @if (count($experience->comments) == 0)
                    <div class="px-4 py-5 flex-auto text-center">
                        <div
                            class="{{ $loop->iteration % 2 == 0 ? 'bg-blue-400' : 'bg-green-400' }} text-white p-3 text-center inline-flex items-center justify-center w-max h-max mb-5 shadow-lg rounded-full ">
                            <span class="text-white inline-block   dark:text-blue-400">
                                <i class="text-6xl far fa-sad-tear"></i>
                            </span>
                        </div>
                        <h6 class="text-xl font-semibold">Malas noticias</h6>
                        <p class="mt-2 mb-4 text-black">Esta experiencia no tiene comentarios</p>
                    </div>
                @endif

                @forelse ($experience->comments->take(-6) as $comment)
                    <div class="flex flex-wrap mt-12 justify-center">
                        <div class="flex-shrink-0">
                            <!-- Imagen del usuario de la review -->
                            <div class="inline-block relative">
                                <div class="relative w-16 h-16 rounded-full overflow-hidden">
                                    @if ($comment->user)    
                                        @if (count($comment->user->images) != 0)
                                        <img class="absolute top-0 left-0 w-full h-full bg-cover object-fit object-cover"
                                        src="{{ $comment->user->images->url }}" alt="Profile picture">
                                        <div class="absolute top-0 left-0 w-full h-full rounded-full shadow-inner">
                                        </div>
                                    @else
                                        <img class="absolute top-0 left-0 w-full h-full bg-cover object-fit object-cover"
                                            src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png"
                                            alt="Profile picture">
                                        <div class="absolute top-0 left-0 w-full h-full rounded-full shadow-inner">
                                        </div>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!--FIN  Imagen del usuario de la review -->
                        <div class="ml-6">
                            <p class="flex items-baseline">
                                <span
                                    class="text-gray-600 font-bold">{{ $comment->user->name . ' ' . $comment->user->surname }}</span>
                                <span class="ml-2 text-green-600 text-xs">{{ $comment->user->role->name }} en
                                    turisteAR</span>
                            </p>
                            <div class="flex items-center mt-1">
                                <!-- Estrellass de la review -->

                                @switch($comment->stars)
                                    @case(1)
                                        <div class='flex'>
                                            <svg class="w-4 h-4 fill-current text-yellow-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path
                                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                            </svg>
                                            <svg class="w-4 h-4 fill-current text-gray-400"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path
                                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                            </svg>
                                            <svg class="w-4 h-4 fill-current text-gray-400"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path
                                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                            </svg>
                                            <svg class="w-4 h-4 fill-current text-gray-400"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path
                                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                            </svg>
                                            <svg class="w-4 h-4 fill-current text-gray-400"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path
                                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                            </svg>
                                        </div>
                                    @break
                                    @case(2)
                                        <div class='flex'>
                                            <svg class="w-4 h-4 fill-current text-yellow-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path
                                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                            </svg>
                                            <svg class="w-4 h-4 fill-current text-yellow-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path
                                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                            </svg>
                                            <svg class="w-4 h-4 fill-current text-gray-400"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path
                                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                            </svg>
                                            <svg class="w-4 h-4 fill-current text-gray-400"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path
                                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                            </svg>
                                            <svg class="w-4 h-4 fill-current text-gray-400"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path
                                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                            </svg>
                                        </div>
                                    @break
                                    @case(3)
                                        <div class='flex'>
                                            <svg class="w-4 h-4 fill-current text-yellow-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path
                                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                            </svg>
                                            <svg class="w-4 h-4 fill-current text-yellow-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path
                                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                            </svg>
                                            <svg class="w-4 h-4 fill-current text-yellow-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path
                                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                            </svg>
                                            <svg class="w-4 h-4 fill-current text-gray-400"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path
                                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                            </svg>
                                            <svg class="w-4 h-4 fill-current text-gray-400"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path
                                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                            </svg>
                                        </div>
                                    @break
                                    @case(4)
                                        <div class='flex'>
                                            <svg class="w-4 h-4 fill-current text-yellow-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path
                                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                            </svg>
                                            <svg class="w-4 h-4 fill-current text-yellow-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path
                                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                            </svg>
                                            <svg class="w-4 h-4 fill-current text-yellow-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path
                                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                            </svg>
                                            <svg class="w-4 h-4 fill-current text-yellow-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path
                                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                            </svg>
                                            <svg class="w-4 h-4 fill-current text-gray-400"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path
                                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                            </svg>
                                        </div>
                                    @break
                                    @case(5)
                                        <div class='flex'>
                                            <svg class="w-4 h-4 fill-current text-yellow-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path
                                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                            </svg>
                                            <svg class="w-4 h-4 fill-current text-yellow-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path
                                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                            </svg>
                                            <svg class="w-4 h-4 fill-current text-yellow-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path
                                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                            </svg>
                                            <svg class="w-4 h-4 fill-current text-yellow-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path
                                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                            </svg>
                                            <svg class="w-4 h-4 fill-current text-yellow-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path
                                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                            </svg>
                                        </div>
                                    @break

                                    @default
                                        <p>Parece que no hay una clasificacion : (</p>
                                @endswitch
                            </div>
                            <!--FIN  Estrellass de la review -->
                            <div class="mt-3">
                                <!-- Cuerpo de la review -->
                                <span>{{ $comment->body }}</span>

                            </div><!-- FIN  Cuerpo de la review -->
                            <div class="flex items-center justify-between mt-4 text-sm text-gray-600 fill-current">
                                <!-- Botones para compartir de la review -->
                                <button class="flex items-center">
                                    <i class="fab fa-whatsapp text-xl text-green-700"></i>
                                    <a target="_blank" href="https://api.whatsapp.com/send?text=Hola,%20vi%20este%20comentario:{{$comment->body}}%20en%20Turistear!%20,%20dejado%20por%20{{$comment->user->name.' '.$comment->user->surname}}%20para%20la%20experiencia%20{{$comment->experience->title }}%20y%20queria%20compartirtelo%20">
                                        <span class="ml-2">Compartir via whatsapp</span>
                                    </a>
                                </button>
                            </div> <!-- FIN  Botones para compartir de la review -->
                        </div>
                    </div><!-- End component -->
                    @empty
                    @endforelse
                    @empty
                        <p>Aun no tenes comentarios de tus experiencias, y si creamos unos cupones?</p>
                    @endforelse
                </div> <!-- FIN review items -->
                <br>
            </div><!-- fin comentarios -->
            <br>
        @else
            <div class="px-4 py-5 flex-auto">
                <div
                    class="text-white p-3 text-center inline-flex items-center justify-center w-max h-max mb-5 shadow-lg rounded-full bg-blue-400">
                    <span class="inline-block  text-blue-500 dark:text-blue-400">
                        <i class="text-6xl bg-paleta_tesis_celeste far fa-sad-tear"></i>
                    </span>
                </div>
                <h6 class="text-xl font-semibold">Malas noticias</h6>
                <p class="mt-2 mb-4 text-paleta_tesis_blanco">
                    Aun no tienes valoraciones
                </p>
            </div>

        @endif

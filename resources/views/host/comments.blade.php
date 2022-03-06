<div id="comments" class="tabcontent hidden px-4">
    <br>
    <div class="w-full overflow-x-auto mt-8"> {{-- inicio tabla de comentarios --}}
    
        @if (count(Auth::user()->experiences) != 0)
            
            <div class="py-2"><!-- comentarios -->
                <!-- review items -->
                <div class="mx-auto bg-white shadow-lg rounded-lg my-500 px-3 py-3 w-9/12 border">
                    <h1 class="ml-2 font-bold uppercase flex flex-wrap mt-12 justify-center"> Valoracion promedio de experiencias </h1>
                    <div class="mb-1 tracking-wide px-4 py-4" >
                        <h2 class="text-gray-800 font-semibold mt-1">Cantidad de valoraciones: {{ $numerber_of_reviews }}</h2>
                        <div class="px-8 pb-3">
                            <div class="flex items-center mt-1">
                                <div class=" w-1/5 text-indigo-500 tracking-tighter">
                                    <span>5 estrellas</span>
                                </div>
                                <div class="w-3/5">
                                    <div class="bg-gray-300 w-full rounded-lg h-2">
                                        <div class=" w-7/12 bg-indigo-600 rounded-lg h-2"></div>
                                    </div>
                                </div>
                                <div class="w-1/5 text-gray-700 pl-3">
                                    <span class="text-sm">{{ $five_star_review }}</span>
                                </div>
                            </div><!-- first -->
                            <div class="flex items-center mt-1">
                                <div class="w-1/5 text-indigo-500 tracking-tighter">
                                    <span>4 estrellas</span>
                                </div>
                                <div class="w-3/5">
                                    <div class="bg-gray-300 w-full rounded-lg h-2">
                                        <div class="w-1/5 bg-indigo-600 rounded-lg h-2"></div>
                                    </div>
                                </div>
                                <div class="w-1/5 text-gray-700 pl-3">
                                    <span class="text-sm">{{ $four_star_review }}</span>
                                </div>
                            </div><!-- second -->
                            <div class="flex items-center mt-1">
                                <div class="w-1/5 text-indigo-500 tracking-tighter">
                                    <span>3 estrellas</span>
                                </div>
                                <div class="w-3/5">
                                    <div class="bg-gray-300 w-full rounded-lg h-2">
                                        <div class=" w-3/12 bg-indigo-600 rounded-lg h-2"></div>
                                    </div>
                                </div>
                                <div class="w-1/5 text-gray-700 pl-3">
                                    <span class="text-sm">{{ $three_star_review }}</span>
                                </div>
                            </div><!-- thierd -->
                            <div class="flex items-center mt-1">
                                <div class=" w-1/5 text-indigo-500 tracking-tighter">
                                    <span>2 estrellas</span>
                                </div>
                                <div class="w-3/5">
                                    <div class="bg-gray-300 w-full rounded-lg h-2">
                                        <div class=" w-1/5 bg-indigo-600 rounded-lg h-2"></div>
                                    </div>
                                </div>
                                <div class="w-1/5 text-gray-700 pl-3">
                                    <span class="text-sm">{{ $two_star_review }}</span>
                                </div>
                            </div><!-- 4th -->
                            <div class="flex items-center mt-1">
                                <div class="w-1/5 text-indigo-500 tracking-tighter">
                                    <span>1 estrellas</span>
                                </div>
                                <div class="w-3/5">
                                    <div class="bg-gray-300 w-full rounded-lg h-2">
                                        <div class=" w-2/12 bg-indigo-600 rounded-lg h-2"></div>
                                    </div>
                                </div>
                                <div class="w-1/5 text-gray-700 pl-3">
                                    <span class="text-sm">{{ $one_star_review }}</span>
                                </div>
                            </div><!-- 5th -->
                        </div>
                    </div>
                    <!-- component -->
                    @forelse(Auth::user()->experiences as $experience)
                    <div class="mt-12 bg-paleta_tesis_blanco border-b-2 border-b-paleta_tesis_celeste">
                        <p class="text-paleta_tesis_azul ">Experiencia: <b>{{ $experience->title }}</b> </p>
                    </div>
                        
                       @if (count($experience->comments)==0)
                           
                       <div class="px-4 py-5 flex-auto text-center">
                           <div class="{{ ($loop->iteration%2==0) ? 'bg-blue-400' : 'bg-green-400' }} text-white p-3 text-center inline-flex items-center justify-center w-max h-max mb-5 shadow-lg rounded-full ">
                               <span class="text-white inline-block   dark:text-blue-400">
                                   <i class="text-6xl far fa-sad-tear"></i>
                                </span>
                            </div>
                            <h6 class="text-xl font-semibold">Malas noticias</h6>
                            <p class="mt-2 mb-4 text-black">Esta experiencia no tiene comentarios</p>
                        </div>
                        @endif 
                        
                        @forelse ($experience->comments->take(-4) as $comment)
                        <div class="flex flex-wrap mt-12 justify-center">
                            <div class="flex-shrink-0"> <!-- Imagen del usuario de la review -->
                                <div class="inline-block relative">
                                    <div class="relative w-16 h-16 rounded-full overflow-hidden">
                                        @if(count($comment->user->images)!=0)
                                            @if ($comment->user->images)
                                                <img class="absolute top-0 left-0 w-full h-full bg-cover object-fit object-cover" src="{{asset('storage/'.$comment->user->images->first()->url)}}" alt="{{asset('storage/'.$comment->user->images->first()->alt)}}">
                                                <div class="absolute top-0 left-0 w-full h-full rounded-full shadow-inner"></div>
                                            @endif
                                        @else
                                            <img class="absolute top-0 left-0 w-full h-full bg-cover object-fit object-cover" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" alt="Profile picture">
                                            <div class="absolute top-0 left-0 w-full h-full rounded-full shadow-inner"></div>
                                        @endif
                                    </div>
                                </div>
                            </div> <!--FIN  Imagen del usuario de la review -->
                            <div class="ml-6">
                                <p class="flex items-baseline">
                                    <a href="{{ route('user.detail',$comment->user) }}"><span class="text-gray-600 font-bold">{{ $comment->user->name.' '.$comment->user->surname }}</span></a>
                                    <span class="ml-2 text-green-600 text-xs">{{  $comment->user->role->name }} en turisteAR</span>
                                </p>
                                <div class="flex items-center mt-1"> <!-- Estrellass de la review -->
                                  
                                         @switch($comment->stars)
                                            @case(1)
                                            <div class='flex'>
                                                <svg class="w-4 h-4 fill-current text-yellow-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                                <svg class="w-4 h-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                                <svg class="w-4 h-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                                <svg class="w-4 h-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                                <svg class="w-4 h-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            </div>
                                            @break
                                            @case(2)
                                            <div class='flex'>
                                                <svg class="w-4 h-4 fill-current text-yellow-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                                <svg class="w-4 h-4 fill-current text-yellow-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                                <svg class="w-4 h-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                                <svg class="w-4 h-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                                <svg class="w-4 h-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            </div>
                                            @break
                                            @case(3)
                                            <div class='flex'>
                                                <svg class="w-4 h-4 fill-current text-yellow-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                                <svg class="w-4 h-4 fill-current text-yellow-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                                <svg class="w-4 h-4 fill-current text-yellow-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                                <svg class="w-4 h-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                                <svg class="w-4 h-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            </div>
                                            @break
                                            @case(4)
                                            <div class='flex'>
                                                <svg class="w-4 h-4 fill-current text-yellow-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                                <svg class="w-4 h-4 fill-current text-yellow-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                                <svg class="w-4 h-4 fill-current text-yellow-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                                <svg class="w-4 h-4 fill-current text-yellow-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                                <svg class="w-4 h-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            </div>
                                            @break
                                            @case(5)<div class='flex'>
                                                <svg class="w-4 h-4 fill-current text-yellow-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                                <svg class="w-4 h-4 fill-current text-yellow-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                                <svg class="w-4 h-4 fill-current text-yellow-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                                <svg class="w-4 h-4 fill-current text-yellow-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                                <svg class="w-4 h-4 fill-current text-yellow-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            </div>
                                            @break
    
                                             @default
                                            <p>Parece que no hay una clasificacion : (</p>
                                         @endswitch
                                </div> <!--FIN  Estrellass de la review -->
                                <div class="mt-3"> <!-- Cuerpo de la review -->
                                    <span>{{ $comment->body }}</span>
                                    
                                </div><!-- FIN  Cuerpo de la review -->
                                <div class="flex items-center justify-between mt-4 text-sm text-gray-600 fill-current"> <!-- Botones para compartir de la review -->
                                    <button class="flex items-center">
                                        <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M5.08 12.16A2.99 2.99 0 0 1 0 10a3 3 0 0 1 5.08-2.16l8.94-4.47a3 3 0 1 1 .9 1.79L5.98 9.63a3.03 3.03 0 0 1 0 .74l8.94 4.47A2.99 2.99 0 0 1 20 17a3 3 0 1 1-5.98-.37l-8.94-4.47z"/></svg>
                                        <span class="ml-2">Compartir</span>
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
            <div class="text-white p-3 text-center inline-flex items-center justify-center w-max h-max mb-5 shadow-lg rounded-full bg-blue-400">
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
    </div> {{-- fin tabla de experiencia --}}
</div>